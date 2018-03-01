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
    }
  }
}
