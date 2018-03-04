
import axios from 'axios'
import Aut from '../App/Aut.js'

export default {
  name: 'KaryawanController',
  created(){
    this.GetDataKaryawan();
  },
  mixins: [Aut],
  data () {
    return {
      Karyawans: [],
      errors: [],
      Groups:[],
      Karyawan: {
        IdKaryawan:Number,
        IdGroup:Number,
        NamaLengkap:String,
        UserName:String,
        Password:String,
        TanggalLahir:Date,
        JenisKelamin:Boolean,
        NoTelepon:String,
        NoTeleponDarurat:String,
        Alamat:String,
        IsApoteker:Boolean,
        NoRegistrasiApoteker:String,
        DiBuatOleh:Number,
        DiUbahOleh:Number,
        TanggalDiBuat:Date,
        TanggalDiUbah:Date,
      },
      FilterModel:{
        IdKaryawan:"",
        IdGroup:"",
        NamaLengkap:"",
        UserName:"",
        Password:"",
        TanggalLahir:"",
        JenisKelamin:"",
        NoTelepon:"",
        NoTeleponDarurat:"",
        Alamat:"",
        IsApoteker:"",
        NoRegistrasiApoteker:"",
        DiBuatOleh:"",
        DiUbahOleh:"",
        TanggalDiBuat:"",
        TanggalDiUbah:"",
        NamaGroup:"",
      },
    }
  },
  methods: {
    GetDataKaryawan () {
      axios.post('http://localhost/apotek/WebService/index.php/api/Karyawan/GetKaryawanAll',{
        body: this.Filter()
      }).then(response => {
        // JSON responses are automatically parsed.
        this.Karyawans = response.data;
      })
      .catch(e => {
        this.errors.push(e)
      })
    },
    SaveDataKaryawan(){
      this.Karyawan.DiUbahOleh = this.GetIdUser();
      this.Karyawan.UserName = this.Karyawan.NamaLengkap;
      axios.post('http://localhost/apotek/webService/index.php/api/Karyawan/SaveDataKaryawan', {
        body: this.Karyawan
      })
      .then(response => {
           console.log(response.data);
        this.CloseModal('ModalKaryawanForm');
        this.GetDataKaryawan();
      })
      .catch(e => {
        this.errors.push(e)
      })
    },
    EditKaryawan(IdKaryawan){
      this.GetDataById(IdKaryawan);
      this.OpenModal('ModalKaryawanForm');
    },
    ViewKaryawan(IdKaryawan){
      this.GetDataById(IdKaryawan);
      this.OpenModal('ModalKaryawanView');
    },
    GetDataById(IdKaryawan){
      this.Karyawan= { },
      axios.get('http://localhost/apotek/WebService/index.php/api/Karyawan/GetDataKaryawanById/'+IdKaryawan)
      .then(response => {
        // JSON responses are automatically parsed.
        this.Karyawan = response.data;
        console.log(this.Karyawan);
      })
      .catch(e => {
        this.errors.push(e)
      })
    },
    GetDaraGroup(){
      axios.get('http://localhost/apotek/WebService/index.php/api/GroupUser/GetGroupAll')
      .then(response => {
        // JSON responses are automatically parsed.
        this.Groups = response.data;
      })
      .catch(e => {
        this.errors.push(e)
      })
    },
    AddKaryawan(){
      this.GetDaraGroup();
      this.Karyawan= {
        IdKaryawan:null,
        IdGroup:"",
        NamaLengkap:null,
        UserName:null,
        Password:null,
        TanggalLahir:null,
        JenisKelamin:0,
        NoTelepon:null,
        NoTeleponDarurat:null,
        Alamat:null,
        IsApoteker:0,
        NoRegistrasiApoteker:null,
        DiBuatOleh:this.GetIdUser(),
        DiUbahOleh:this.GetIdUser(),
        TanggalDiBuat:null,
        TanggalDiUbah:null,
      },
      console.log(typeof this.Karyawan.IsApoteker);
      this.OpenModal ('ModalKaryawanForm');
    },
    Filter(){
      var FilterParam = {};
      if(this.FilterModel.NamaLengkap !== "" && this.FilterModel.NamaLengkap !== null ){
        FilterParam.NamaLengkap =this.FilterModel.NamaLengkap;
      }
      if(this.FilterModel.NamaGroup !== "" && this.FilterModel.NamaGroup !== null ){
        FilterParam.NamaGroup =this.FilterModel.NamaGroup;
      }
      if(this.FilterModel.NoTelepon !== "" && this.FilterModel.NoTelepon !== null ){
        FilterParam.NoTelepon =this.FilterModel.NoTelepon;
      }
      return FilterParam;
    },
    ChangeFilter(Param){
      if(Param.length > 2){
        this.GetDataKaryawan();
      }else if(Param.length == 0){
          this.GetDataKaryawan();
      }
    },
    ChangeFilterDropdown(Param){
      if(Param.length > 0){
        this.GetDataKaryawan();
      }else if(Param.length == 0){
          this.GetDataKaryawan();
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
