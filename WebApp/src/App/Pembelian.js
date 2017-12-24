
import axios from 'axios'

export default {
  name: 'PembelianController',
  created(){
    console.log(this.$route.name);
    this.GetDataPembelian();
  },
  data () {
    return {
      Pembelians: [],
      errors: []
    }
  },
  methods: {
    GetDataPembelian () {
      axios.get('http://localhost/apotek/WebService/index.php/api/Pembelian/GetDataPembelian')
      .then(response => {
        // JSON responses are automatically parsed.
        this.Pembelians = response.data;
      })
      .catch(e => {
        this.errors.push(e)
      })
    },
    GoPage(path){
      this.$router.push(path);
    },
}
}
