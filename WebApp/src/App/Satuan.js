
import axios from 'axios'
import Aut from '../App/Aut.js'

export default {
  name: 'SatuanController',
  created(){
    this.GetDataSatuan();
  },
  mixins: [Aut],
  data () {
    return {
      Satuans: [],
      errors: [],
      Satuan: {
        IdSatuan:Number,
        NamaSatuan:String,
        Keterangan:String,
        DiBuatOleh:Number,
        DiUbahOleh:Number,
        TanggalDiBuat:Date,
        TanggalDiUbah:Date,
      },
      FilterModel:{
        IdSatuan: "",
        NamaSatuan: "",
        Keterangan:"",
        DiBuatOleh:"",
        DiUbahOleh:"",
        TanggalDiBuat:"",
        TanggalDiUbah:"",
      },
    }
  },
  methods: {
    GetDataSatuan () {
      axios.post('http://localhost/apotek/WebService/index.php/api/Satuan/GetSatuanAll',{
        body: this.Filter()
      }).then(response => {
        // JSON responses are automatically parsed.
        this.Satuans = response.data;
      })
      .catch(e => {
        this.errors.push(e)
      })
    },
    SaveDataSatuan(){
      this.Satuan.DiUbahOleh = this.GetIdUser()
      axios.post('http://localhost/apotek/webService/index.php/api/Satuan/SaveDataSatuan', {
        body: this.Satuan
      })
      .then(response => {
           console.log(response.data);
        this.CloseModal('ModalSatuanForm');
        this.GetDataSatuan();
      })
      .catch(e => {
        this.errors.push(e)
      })
    },
    EditSatuan(IdSatuan){
      this.GetDataById(IdSatuan);
      this.OpenModal('ModalSatuanForm');
    },
    ViewSatuan(IdSatuan){
      this.GetDataById(IdSatuan);
      this.OpenModal('ModalSatuanView');
    },
    GetDataById(IdSatuan){
      this.Satuan= { },
      axios.get('http://localhost/apotek/WebService/index.php/api/Satuan/GetDataSatuanById/'+IdSatuan)
      .then(response => {
        // JSON responses are automatically parsed.
        this.Satuan = response.data;
        console.log(this.Satuan);
      })
      .catch(e => {
        this.errors.push(e)
      })
    },
    AddSatuan(){
      this.Satuan= {
        IdSatuan: null,
        NamaSatuan: null,
        Keterangan:null,
        DiBuatOleh:this.GetIdUser(),
        DiUbahOleh:this.GetIdUser(),
        TanggalDiBuat:Date,
        TanggalDiUbah:Date,
      },
      this.OpenModal ('ModalSatuanForm');
    },
    Filter(){
      var FilterParam = {};
      if(this.FilterModel.NamaSatuan !== null && this.FilterModel.NamaSatuan !== "" ){
        FilterParam.NamaSatuan =this.FilterModel.NamaSatuan;
      }
      return FilterParam;
    },
    ChangeFilter(Param){
      if(Param.length > 2){
        this.GetDataSatuan();
      }else if(Param.length == 0){
          this.GetDataSatuan();
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
