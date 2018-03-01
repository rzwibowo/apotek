
import axios from 'axios'
import Aut from '../App/Aut.js'

export default {
  name: 'PembelianController',
  created(){
   console.log(this.GetCokies());
    if(this.GetCokies() == true){
       this.GetDataPembelian();
    }
  },
  mixins: [Aut],
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
