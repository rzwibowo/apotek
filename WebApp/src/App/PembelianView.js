
import axios from 'axios'

export default {
  name: 'PembelianViewController',
  created(){
    this.InitializeView();
  },
  data () {
    return {
      errors: [],
      Pembelian: {
        IdPembelian:Number,
        TanggalPembelian:Date,
        IdSupplier:Number,
        TotalHargaBeli:Number,
        TotalJumlahObat:Number,
        StatusPembelian:Boolean,
        DetailPembelian:[]
      },
      DetailPembelian:{
        IdDetailPembelian:Number,
        IdPembelian:Number,
        IdObat:Number,
        JumlahObat:Number,
        HargaPembelian:Number,
        Status:Boolean
      },
    }
  },
  methods: {
    GetDataById(IdPembelian){
      this.Pembelian= { },
      axios.get('http://localhost/apotek/WebService/index.php/api/Pembelian/GetDataPembelianById/'+IdPembelian+'/'+false)
      .then(response => {
        // JSON responses are automatically parsed.
        this.Pembelian = response.data;
      })
      .catch(e => {
        this.errors.push(e)
      });
    },
    InitializeView(){
      if(this.$route.params.IdPembelian !== undefined){
        this.GetDataById(this.$route.params.IdPembelian);
      }else{

      }
    },
    GoPage(path){
      this.$router.push(path);
    },
    },
}
