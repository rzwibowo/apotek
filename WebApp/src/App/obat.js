
import axios from 'axios'
 export default {
  name: 'ObatController',
  created(){
    this.GetDataObat();
  },
  data () {
    return {
      Obat: [],
      errors: []
    }
  },
  methods: {
      GetDataObat () {
      axios.get('http://localhost/apotek/WebService/index.php/api/obat/index')
    .then(response => {
      // JSON responses are automatically parsed.
      this.Obat = response.data;
    })
    .catch(e => {
      this.errors.push(e)
    })
      }
},


}
