<template>
  <MyNavbar />
  <div>
    <router-view></router-view>
  </div>
  <MyFooter />
</template>

<script>
import MyNavbar from '@/components/Navbar.vue'
import MyFooter from '@/components/Footer.vue'
export default {
  name: 'App',
  components: { MyNavbar, MyFooter }
}
</script>

<style>
</style>
