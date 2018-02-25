<template>
  <div id="app">
    <!-- <div id="sidebar"  v-show="IsEnableNavbar">
      <ul>
        <router-link to="/obat" >Obat</router-link>
        <router-link to="/golongan" >Golongan</router-link>
        <router-link to="/supplier" >Supplier</router-link>
        <router-link to="/pembelian" >Pembelian</router-link>
        <router-link to="/priode" >Priode</router-link>
      </ul>
    </div> -->
    <!-- nyonto sidebar di -->
    <!-- https://codepen.io/thiagokpelo/pen/OgWKvy/?editors=0010 -->
    <!-- belum berhasil -->
    <!-- <div id="content">
      <button @click="toggleNav()" v-show="IsEnableNavbar">tugel</button>
      <router-view/>
    </div> -->
    <div id="sidebar"  v-bind:class="{ active: isActive }" v-show="IsEnableNavbar">
      <div class="toggle-btn" v-on:click="toggleSidebar">
        <span></span>
        <span></span>
        <span></span>
      </div>
      <div class="list">
      <div class="item"><router-link to="/obat" >Obat</router-link></div>
      <div class="item"><router-link to="/golongan" >Golongan</router-link></div>
      <div class="item"><router-link to="/supplier" >Supplier</router-link></div>
      <div class="item"><router-link to="/pembelian" >Pembelian</router-link></div>
      <div class="item"><router-link to="/priode" >Priode</router-link></div>
      </div>
    </div>
    <div id="content">
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
    this.ClassTongel = '';
  },
    data () {
    return {
      IsEnableNavbar:Boolean,
      isActive:false,
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
    },
    toggleSidebar(){
      this.isActive = !this.isActive;
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
  width: 17em;
  background: #5c9feb;
  height: 100vh;
  position:absolute;
  transition:all 300ms linear;
  top:0px;
  left:-200px;
}
#sidebar.active{
  /* display: block; */
  left:0px;
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
#sidebar .toggle-btn {
position:absolute;
left:220px;
top:10px;
}
#sidebar .toggle-btn span {
display:block;
width:30px;
height:5px;
background:#151719;
margin:5px 0px;
cursor:pointer;
}
#sidebar div.list{
  margin-top: 50px;
}
#sidebar div.list div.item {
padding:15px 10px;
border-bottom:1px solid #444;
color:#fcfcfc;
text-transform:uppercase;
font-size:15px;
}
</style>
