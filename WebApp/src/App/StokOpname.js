
import axios from 'axios'
import Aut from '../App/Aut.js'

export default {
  name: 'StokOpnameController',
  created(){
    this.GetDataStokOpname();
  },
  mixins: [Aut],
  data () {
    return {
      StokOpnames: [],
      errors: [],
      Obats:[],
      Obat:{},
      StokOpname: {
        IdStokOpname:Number,
        IdObat:Number,
        StokOpname:Number,
        StokObat:Number,
        Keterangan:String,
        DiBuatOleh:Number,
        DiUbahOleh:Number,
        TanggalDiBuat:Date,
        TanggalDiUbah:Date,
      },
      FilterModel:{
        IdStokOpname:"",
        IdObat:"",
        StokOpname:"",
        StokObat:"",
        Keterangan:"",
        DiBuatOleh:"",
        DiUbahOleh:"",
        TanggalDiBuat:"",
        TanggalDiUbah:""
      },
    }
  },
  methods: {
    GetDataStokOpname () {
      axios.post('http://localhost/apotek/WebService/index.php/api/StokOpname/GetStokOpnameAll',{
        body: this.Filter()
      }).then(response => {
        // JSON responses are automatically parsed.
        this.StokOpnames = response.data;
      })
      .catch(e => {
        this.errors.push(e)
      })
    },
    SaveDataStokOpname(){
      this.StokOpname.DiUbahOleh = this.GetIdUser();
      this.StokOpname.StokObat = this.StokOpname.IdStokOpname == null? this.Obat.StokObat:this.StokOpname.StokObat;
      axios.post('http://localhost/apotek/webService/index.php/api/StokOpname/SaveDataStokOpname', {
        body: this.StokOpname
      })
      .then(response => {
           console.log(response.data);
        this.CloseModal('ModalStokOpnameForm');
        this.GetDataStokOpname();
      })
      .catch(e => {
        this.errors.push(e)
      })
    },
    EditStokOpname(IdStokOpname){
      this.GetDataObat();
      this.GetDataById(IdStokOpname,true);
      this.OpenModal('ModalStokOpnameForm');
    },
    ViewStokOpname(IdStokOpname){
      this.GetDataById(IdStokOpname,false);
      this.OpenModal('ModalStokOpnameView');
    },
    GetDataById(IdStokOpname,isEdit){
      var Url = '' ;
      if(isEdit== true){
          Url = 'http://localhost/apotek/WebService/index.php/api/StokOpname/GetDataStokOpnameById/';
      }else{
          Url = 'http://localhost/apotek/WebService/index.php/api/StokOpname/GetDataStokOpnameByIdView/';
      }
      this.StokOpname= { },
      axios.get(Url+IdStokOpname)
      .then(response => {
        // JSON responses are automatically parsed.
        this.StokOpname = response.data;
        this.GetObatLocal(this.StokOpname.IdObat);
      })
      .catch(e => {
        this.errors.push(e)
      })
    },
    AddStokOpname(){
      this.GetDataObat();
      this.Obat = {};
      this.StokOpname= {
        IdStokOpname:null,
        IdObat:"",
        StokOpname:null,
        StokObat:null,
        Keterangan:null,
        DiBuatOleh:this.GetIdUser(),
        DiUbahOleh:this.GetIdUser(),
        TanggalDiBuat:Date,
        TanggalDiUbah:Date
      },
      this.OpenModal ('ModalStokOpnameForm');
    },
    GetDataObat(){
      axios.get('http://localhost/apotek/WebService/index.php/api/Obat/GetDataObat')
      .then(response => {
        // JSON responses are automatically parsed.
        this.Obats = response.data;
      })
      .catch(e => {
        this.errors.push(e)
      })
    },
    GetObatLocal(IdObat){
      if(IdObat !== null || IdObat !== undefined){
      this.Obat =  this.Obats.filter(x => x.IdObat == IdObat)[0];
      }
    },
    Filter(){
      var FilterParam = {};

      if(this.FilterModel.TanggalDiBuat !== null && this.FilterModel.TanggalDiBuat !== ""  && this.FilterModel.TanggalDiBuat !== undefined ){
        FilterParam['StokOpname.TanggalDiBuat'] = this.FilterModel.TanggalDiBuat;
      }
      if(this.FilterModel.NamaObat !== null && this.FilterModel.NamaObat !== ""  && this.FilterModel.NamaObat !== undefined){
        FilterParam.NamaObat =this.FilterModel.NamaObat;
      }
      if(this.FilterModel.KodeObat !== "" && this.FilterModel.KodeObat !== null  && this.FilterModel.KodeObat !== undefined ){
        FilterParam.KodeObat =this.FilterModel.KodeObat;
      }
      if(this.FilterModel.NamaKategori !== "" && this.FilterModel.NamaKategori !== null  && this.FilterModel.NamaKategori !== undefined ){
        FilterParam.NamaKategori =this.FilterModel.NamaKategori;
      }
      if(this.FilterModel.StokObat !== "" && this.FilterModel.StokObat !== null ){
        FilterParam['StokOpname.StokObat'] =this.FilterModel.StokObat;
      }
      if(this.FilterModel.StokOpname !== "" && this.FilterModel.StokOpname !== null ){
        FilterParam.StokOpname =this.FilterModel.StokOpname;
      }
      return FilterParam;
    },
    ChangeFilter(Param){
      if(Param.length > 2){
        this.GetDataStokOpname();
      }else if(Param.length == 0){
          this.GetDataStokOpname();
      }
    },
    ChangeFilterNumber(Param){
      if(Param.length > 0){
        this.GetDataStokOpname();
      }else if(Param.length == 0){
          this.GetDataStokOpname();
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
