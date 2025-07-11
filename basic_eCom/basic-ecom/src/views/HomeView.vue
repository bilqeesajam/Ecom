<template>
  <div class="home">
    
    <Landing msg="Welcome to Your Vue.js App"/>
  </div>
</template>

<script>
import Landing from '@/components/Landing.vue'

export default {
  name: 'HomeView',
  components: {
    Landing
  }
}
</script>
