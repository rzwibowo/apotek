<template>
  <div id="app">
    <div class="container-fluid">
      <div class="row">
        <div  id="sidebar" v-bind:class="{ 'col-md-2': isActive, 'col-md-1': !isActive }" v-show="IsEnableNavbar">
          <div class="toggle-btn" v-on:click="toggleSidebar">
            <span></span>
            <span></span>
            <span></span>
          </div>
          <div class="list" v-show="isActive">
          <div class="item"><router-link to="/IdentitasApotik" > Identitas Apotik </router-link></div>
          <div class="item"><router-link to="/obat" >Obat</router-link></div>
          <div class="item"><router-link to="/Kategori" >Kategori</router-link></div>
          <div class="item"><router-link to="/supplier" >Supplier</router-link></div>
          <div class="item"><router-link to="/pembelian" >Pembelian</router-link></div>
          <div class="item"><router-link to="/priode" >Priode</router-link></div>
          <div class="item"><router-link to="/Kota" > Kota </router-link></div>
          <div class="item"><router-link to="/Bank" > Bank </router-link></div>
          <div class="item"><router-link to="/Pajak" > Pajak </router-link></div>
          <div class="item"><router-link to="/Satuan" > Satuan </router-link></div>
          <div class="item"><router-link to="/Group" > Group User </router-link></div>
          <div class="item"><router-link to="/Karyawan" > Karyawan </router-link></div>
          <div class="item"><router-link to="/StokOpname" > StokOpname </router-link></div>
          </div>
        </div>
        <div id="content" v-bind:class="{ 'col-md-10': isActive, 'col-md-11': !isActive }" >
          <router-view/>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
// import axios from 'axios'
export default {
  name: 'app',
  created () {
    this.GoAutorization()
    this.ClassTongel = ''
  },
  data () {
    return {
      IsEnableNavbar: Boolean,
      isActive: false
    }
  },
  methods: {
    GoAutorization () {
      this.IsEnableNavbar = false
      if (this.GetCokies() !== '' && this.GetCokies() !== null && this.GetCokies() !== 'undefined') {
        this.$router.push('/Index')
        this.IsEnableNavbar = true
      } else {
        this.IsEnableNavbar = false
        this.$router.push('/Aut')
      }
    },
    GetCokies () {
      return this.$cookies.get('tokenUserApp')
    },
    toggleSidebar () {
      this.isActive = !this.isActive
    }
  }
}
</script>

<style>
#app {
  /* display: flex; */
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  /* text-align: center; */
  color: #32383f;
  /* margin-top: 60px; */
}
 #sidebar {
  /* display: flex; */
  /* width: 17em; */
  background: #eee;
  background: with;
  /* height: 100vh; */
  /* position:absolute; */
   transition:all 300ms linear;
  /* top:0px; */
  /* left:-200px; */
  position: relative;
      max-height: 100vh;
    padding: 0;
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
div .container-fluid .row #sidebar {
  min-height: 599px;
}
#content{
  display: flex;
  align-items: stretch;
  flex-direction: column;
  transition:all 300ms linear;
}
#sidebar .toggle-btn {
position:absolute;
right: 10px;
/* top:10px; */
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
  /* margin-top: 50px; */
  overflow-y: scroll;
    max-height: 90%;
    margin-top: 3em;
}
#sidebar div.list div.item {
padding:15px 10px;
color:#fcfcfc;
text-transform:uppercase;
font-size:15px;
}
.item{
     transition:all 300ms linear;
}
</style>
