<template>
  <!-- <nav>
    <router-link to="/">Home</router-link> |
    <router-link to="/about">About</router-link> 
  </nav> -->

  <NavBar />
  <router-view/>
</template>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}
</style>

<script>
import NavBar from './components/NavBar.vue' // ✅ adjust if folder name differs

export default {
  name: 'App',
  components: {
    NavBar
  }
}
</script>

