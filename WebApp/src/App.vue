<template>
  <div id="app">
    <div id="sidebar"  v-show="IsEnableNavbar">
        <router-link to="/obat" >Obat</router-link>
        <router-link to="/golongan" >Golongan</router-link>
        <router-link to="/supplier" >Supplier</router-link>
        <router-link to="/pembelian" >Pembelian</router-link>
        <router-link to="/priode" >Priode</router-link>
    </div>
    <!-- nyonto sidebar di -->
    <!-- https://codepen.io/thiagokpelo/pen/OgWKvy/?editors=0010 -->
    <!-- belum berhasil -->
    <div id="content">
      <button @click="toggleNav()" v-show="IsEnableNavbar">tugel</button>
      <router-view/>
    </div>

  </div>
</template>

<script>
import axios from 'axios'
export default {
  name: 'app',
  created(){
    this.GoAutorization();
  },
    data () {
    return {
      IsEnableNavbar:Boolean
    }
  },
  methods: {
    GoAutorization(){
      this.IsEnableNavbar = false;
      if(this.GetCokies() !== "" && this.GetCokies() !== null && this.GetCokies() !== "undefined"){
          this.$router.push("/Index");
          this.IsEnableNavbar = true;
      }else{
        this.IsEnableNavbar = false;
          this.$router.push("/Aut");
      }
    },
    GetCokies(){
      return this.$cookies.get("tokenUserApp")
    }
  }
}
</script>

<style scoped>
#app {
  display: flex;
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  /* text-align: center; */
  color: #32383f;
  margin-top: 60px;
}
#sidebar {
  display: flex;
  width: 20em;
  background: #5c9feb;
  height: 100vh;
}
#sidebar.active{
  display: block;
}
#sidebar a{
  display: block;
  padding: 10px 5px;
  color: rgb(56, 56, 56);
}
#content{
  display: flex;
  align-items: stretch;
  flex-direction: column;
  width: 100vw;
}
</style>
