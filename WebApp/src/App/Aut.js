// import axios from 'axios'
export default {
  name: 'Aut',
  created () {
  },
  data () {
    return {
    }
  },
  methods: {
    GetCokies () {
      if (this.$cookies.get('tokenUserApp') !== '' && this.$cookies.get('tokenUserApp') !== null && this.$cookies.get('tokenUserApp') !== 'undefined') {
        return true
      } else {
        this.$router.go('/Index')
      }
<<<<<<< HEAD
    },
   GetIdUser(){
     return this.$cookies.get("tokenUserApp");
   }
  },
=======
    }
  }
>>>>>>> 255c13e49a290f1e8cf9f083d4ef4958cb5b8246
}
