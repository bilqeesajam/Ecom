<template>
  <div class="bg-black d-flex flex-column justify-content-center align-items-center min-vh-100 text-center p-4">
    <h1 class="display-4 hero-font text-danger">Welcome to LifeChoicesShop</h1>
    <p class="lead text-white">Discover the best deals tailored for you.</p>
    <button class="btn btn-danger btn-lg mt-3" @click="goToLogin">Login</button>
  </div>
</template>

<script>
export default {
  methods: {
    goToLogin() {
      this.$router.push('/login');
    }
  }
}
</script>

<style scoped>
.hero-font {
  font-family: 'Dancing Script', cursive;
  letter-spacing: 0.05em;
  line-height: 1.2;
  text-shadow: 0 0 8px rgba(220, 20, 60, 0.7);
}
</style>
