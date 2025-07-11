<template>
  <div class="container mt-5" style="max-width: 400px;">
    <h2 class="mb-4 text-center">Login</h2>

    <form @submit.prevent="handleLogin">
      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input
          type="text"
          id="username"
          v-model="username"
          class="form-control"
          required
        />
      </div>

      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input
          type="password"
          id="password"
          v-model="password"
          class="form-control"
          required
        />
      </div>

      <button type="submit" class="btn btn-danger w-100" :disabled="loading">
        {{ loading ? "Logging in..." : "Login" }}
      </button>
    </form>

    <div v-if="errorMessage" class="alert alert-danger mt-3">
      {{ errorMessage }}
    </div>

    <div v-if="successMessage" class="alert alert-success mt-3">
      {{ successMessage }}
    </div>
  </div>
</template>

<script setup>
import { ref } from "vue";
import { useRouter } from "vue-router";

const username = ref("");
const password = ref("");
const loading = ref(false);
const errorMessage = ref("");
const successMessage = ref("");

const router = useRouter();

let users = [];

async function loadUsers() {
  try {
    const res = await fetch("/data.json");
    const data = await res.json();
    users = data.users || [];
  } catch (err) {
    console.error("Failed to load users from data.json", err);
  }
}

loadUsers();

async function handleLogin() {
  errorMessage.value = "";
  successMessage.value = "";
  loading.value = true;

  if (!username.value || !password.value) {
    errorMessage.value = "Please enter username and password.";
    loading.value = false;
    return;
  }

  const user = users.find(
    (u) => u.username === username.value && u.password === password.value
  );

  if (user) {
    successMessage.value = `Welcome, ${user.username}!`;
    localStorage.setItem("user", JSON.stringify(user));
    setTimeout(() => {
      router.push("/products");
    }, 1000);
  } else {
    errorMessage.value = "Invalid username or password.";
  }

  loading.value = false;
}
</script>
