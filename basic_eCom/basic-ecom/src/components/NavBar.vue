<template>
  <nav v-if="showNavbar" class="navbar navbar-expand-lg custom-navbar">
    <div class="container-fluid">
      <a class="navbar-brand font" href="#">LifeChoicesShop</a>
      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarNav"
        aria-controls="navbarNav"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <router-link to="/products" class="nav-link" active-class="active">Products</router-link>
          </li>
          <li class="nav-item">
            <router-link to="/cart" class="nav-link" active-class="active">Cart</router-link>
          </li>
        </ul>
        <ul class="navbar-nav">
          <li class="nav-item">
            <button @click="signOut" class="btn btn-outline-danger">Sign Out</button>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</template>

<style scoped>
.custom-navbar {
  background-color: black !important;
}

.custom-navbar .navbar-brand,
.custom-navbar .nav-link,
.custom-navbar .btn-outline-danger {
  color: rgb(223, 0, 45) !important;
}

.custom-navbar .btn-outline-danger {
  border-color: rgb(223, 0, 45) !important;
}

.custom-navbar .btn-outline-danger:hover {
  background-color: rgb(223, 0, 45) !important;
  color: black !important;
}

.custom-navbar .navbar-toggler-icon {
  background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgb(223,0,45)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
}

.font {
  font-family: 'Dancing Script', cursive;
  font-size: 2em;
  letter-spacing: 0.05em;
  line-height: 1.2;
  text-shadow: 0 0 8px rgba(220, 20, 60, 0.7);
}
</style>

<script>
export default {
  computed: {
    showNavbar() {
      // Hide navbar on home and login pages
      return !['/', '/login'].includes(this.$route.path);
    }
  },
  methods: {
    signOut() {
      this.$router.push('/');
    }
  }
};
</script>

<style scoped>
.custom-navbar {
  background-color: black !important;
}

.custom-navbar .navbar-brand,
.custom-navbar .nav-link,
.custom-navbar .btn-outline-danger {
  color: rgb(223, 0, 45) !important;
}

.custom-navbar .btn-outline-danger {
  border-color: rgb(223, 0, 45) !important;
}

.custom-navbar .btn-outline-danger:hover {
  background-color: rgb(223, 0, 45) !important;
  color: black !important;
}
</style>