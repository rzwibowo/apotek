
import axios from 'axios'
import Aut from '../App/Aut.js'

export default {
  name: 'KotaController',
  created(){
    this.GetDataKota();
  },
  mixins: [Aut],
  data () {
    return {
      Kotas: [],
      errors: [],
      Kota: {
        IdKota: Number,
        NamaKota: String,
        DiBuatOleh:Number,
        DiUbahOleh:Number,
        TanggalDiBuat:Date,
        TanggalDiUbah:Date,
      },
      FilterModel:{
        IdKota: "",
        NamaKota: "",
        DiBuatOleh:"",
        DiUbahOleh:"",
        TanggalDiBuat:"",
        TanggalDiUbah:"",
      },
    }
  },
  methods: {
    GetDataKota () {
      axios.post('http://localhost/apotek/WebService/index.php/api/Kota/GetKotaAll',{
        body: this.Filter()
      }).then(response => {
        // JSON responses are automatically parsed.
        this.Kotas = response.data;
      })
      .catch(e => {
        this.errors.push(e)
      })
    },
    SaveDataKota(){
      this.Kota.DiUbahOleh = this.GetIdUser()
      axios.post('http://localhost/apotek/webService/index.php/api/Kota/SaveDataKota', {
        body: this.Kota
      })
      .then(response => {
           console.log(response.data);
        this.CloseModal('ModalKotaForm');
        this.GetDataKota();
      })
      .catch(e => {
        this.errors.push(e)
      })
    },
    EditKota(IdKota){
      this.GetDataById(IdKota);
      this.OpenModal('ModalKotaForm');
    },
    ViewKota(IdKota){
      this.GetDataById(IdKota);
      this.OpenModal('ModalKotaView');
    },
    GetDataById(IdKota){
      this.Kota= { },
      axios.get('http://localhost/apotek/WebService/index.php/api/Kota/GetDataKotaById/'+IdKota)
      .then(response => {
        // JSON responses are automatically parsed.
        this.Kota = response.data;
        console.log(this.Kota);
      })
      .catch(e => {
        this.errors.push(e)
      })
    },
    AddKota(){
      this.Kota= {
        IdKota: null,
        NamaKota: null,
        DiBuatOleh:this.GetIdUser(),
        DiUbahOleh:this.GetIdUser(),
        TanggalDiBuat:Date,
        TanggalDiUbah:Date,
      },
      this.OpenModal ('ModalKotaForm');
    },
    Filter(){
      var FilterParam = {};
      if(this.FilterModel.KodeKota !== "" && this.FilterModel.KodeKota !== null ){
        FilterParam.KodeKota =this.FilterModel.KodeKota;
      }
      if(this.FilterModel.NamaKota !== null && this.FilterModel.NamaKota !== "" ){
        FilterParam.NamaKota =this.FilterModel.NamaKota;
      }
      return FilterParam;
    },
    ChangeFilter(Param){
      if(Param.length > 2){
        this.GetDataKota();
      }else if(Param.length == 0){
          this.GetDataKota();
      }
    },
    OpenModal (Modal){
      $('#'+Modal).modal('show');
    },
    CloseModal (Modal){
      $('#'+Modal).modal('hide');
    }
  },

}
