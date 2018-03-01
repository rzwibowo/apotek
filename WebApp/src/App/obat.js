
import axios from 'axios'
import Aut from '../App/Aut.js'

export default {
  name: 'ObatController',
  created(){
    this.GetDataObat()
  },
  mixins: [Aut],
  data () {
    return {
      Obats: [],
      errors: [],
      KategoriObats:[],
      Satuan:[],
      Obat: {
        IdObat: Number,
        IdKategori: Number,
        IdSatuan:Number,
        NamaObat: String,
        StokObat: Number,
        HargaSatuan:Number,
        TanggalKadaluarsa:Date,
        KodeObat:String,
        DiBuatOlah:Number,
        DiUbahOleh:Number,
        TanggalDiBuat:Date,
        TanggalDiUbah:Date,
      },
      FilterModel:{
        IdObat: "",
        NamaObat: "",
        NamaKategori: "",
        NamaSatuan:"",
        StokObat: "",
        HargaSatuan:"",
        TanggalKadaluarsa:"",
        KodeObat:"",
      },
    }
  },
  methods: {
    GetDataObat () {
      axios.post('http://localhost/apotek/WebService/index.php/api/obat/GetDataObat/',{
        body: this.Filter()
      }).then(response => {
        // JSON responses are automatically parsed.
        this.Obats = response.data;
        //console.log(response);
      })
      .catch(e => {
        this.errors.push(e)
      })
    },
    SaveDataObat(){
      this.Obat.DiUbahOleh = this.GetIdUser()
      axios.post('http://localhost/apotek/webService/index.php/api/obat/SaveDataObat', {
        body: this.Obat
      })
      .then(response => {
        //        console.log(response.data);
        this.CloseModal('ModalObatForm');
        this.GetDataObat();
      })
      .catch(e => {
        this.errors.push(e)
      })
    },
    GetDataKategoriObat () {
      axios.get('http://localhost/apotek/webService/index.php/api/Kategori/GetKategoriAll')
      .then(response => {
        // JSON responses are automatically parsed.
        this.KategoriObats = response.data;
      })
      .catch(e => {
        this.errors.push(e)
      })
    },
    GetDataSatuanObat () {
      axios.get('http://localhost/apotek/webService/index.php/api/Satuan/GetSatuanAll')
      .then(response => {
        // JSON responses are automatically parsed.
        this.Satuan = response.data;
      })
      .catch(e => {
        this.errors.push(e)
      })
    },
    EditObat(IdObat){
      this.GetDataKategoriObat();
      this.GetDataSatuanObat()
      this.GetDataById(IdObat,true);
      this.OpenModal('ModalObatForm');
    },
    ViewObat(IdObat){
      this.GetDataKategoriObat();
      this.GetDataById(IdObat,false);
      this.OpenModal('ModalObatView');
    },
    GetDataById(IdObat,IsEdit){
      this.Obat= { },
      axios.get('http://localhost/apotek/WebService/index.php/api/obat/GatDataObatById/'+IdObat+'/'+IsEdit)
      .then(response => {
        // JSON responses are automatically parsed.
        this.Obat = response.data;
      })
      .catch(e => {
        this.errors.push(e)
      })
    },
    AddObat(){
      this.GetDataKategoriObat();
      this.GetDataSatuanObat();
      this.Obat= {
        IdObat: null,
        IdKategori: "",
        IdSatuan:"",
        NamaObat: null,
        StokObat: null,
        HargaSatuan:null,
        TanggalKadaluarsa:null,
        KodeObat:null,
        DiBuatOlah:this.GetIdUser(),
        DiUbahOleh:this.GetIdUser(),
        TanggalDiBuat:Date,
        TanggalDiUbah:Date,
      },
      this.OpenModal ('ModalObatForm');
    },
    Filter(){
      var FilterParam = {};
      if(this.FilterModel.KodeObat !== "" && this.FilterModel.KodeObat !== null ){
        FilterParam.KodeObat =this.FilterModel.KodeObat;
      }
      if(this.FilterModel.NamaObat !== null && this.FilterModel.NamaObat !== "" ){
        FilterParam.NamaObat =this.FilterModel.NamaObat;
      }
      if(this.FilterModel.NamaKategori !== null && this.FilterModel.NamaKategori !== "" ){
        FilterParam.NamaKategori = this.FilterModel.NamaKategori;
      }
      if(this.FilterModel.NamaSatuan !== null && this.FilterModel.NamaSatuan !== "" ){
        FilterParam.NamaSatuan = this.FilterModel.NamaSatuan;
      }
      if(this.FilterModel.StokObat !== null && this.FilterModel.StokObat !== "" ){
        FilterParam.StokObat = this.FilterModel.StokObat;
      }
      if(this.FilterModel.HargaSatuan !== null && this.FilterModel.HargaSatuan !== "" ){
        FilterParam.HargaSatuan=this.FilterModel.HargaSatuan;
      }
      if(this.FilterModel.TanggalKadaluarsa !== null && this.FilterModel.TanggalKadaluarsa !== "" ){
        FilterParam.TanggalKadaluarsa =this.FilterModel.TanggalKadaluarsa;
      }
      return FilterParam;
    },
    ChangeFilter(Param){
      if(Param.length > 2){
        this.GetDataObat();
      }else if(Param.length == 0){
          this.GetDataObat();
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
