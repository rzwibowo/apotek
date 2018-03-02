
import axios from 'axios'
import Aut from '../App/Aut.js'

//import Toolsmenu from '@/components/TemplateModal1'

export default {
  name: 'PriodeController',
  created(){
   this.GatDataPriode();
  },
  mixins: [Aut],
  data () {
    return {
      Priodes: [],
      errors: [],
      Priode: {
        IdPriode:Number,
        NamaPriode:String,
        TanggalMulai:Date,
        TanggalAkhir:Date,
        Status:Boolean,
        DiBuatOleh:Number,
        DiUbahOleh:Number,
        TanggalDiBuat:Date,
        TanggalDiUbah:Date,
      },
      FilterModel: {
        IdPriode:"",
        NamaPriode:"",
        TanggalMulai:"",
        TanggalAkhir:"",
        Status:"",
        DiBuatOleh:"",
        DiUbahOleh:"",
        TanggalDiBuat:"",
        TanggalDiUbah:"",
      },
    }
  },
  methods: {
    GatDataPriode() {
      console.log("Test");
      axios.post('http://localhost/apotek/WebService/index.php/api/Priode/GetDataPriode/',{
        body: this.Filter()
      }).then(response => {
        // JSON responses are automatically parsed.
        this.Priodes = response.data;
        //console.log(response);
      })
      .catch(e => {
        this.errors.push(e)
      })
    },
    SaveDataPriode(){
      this.Priode.DiUbahOleh = this.GetIdUser()
      axios.post('http://localhost/apotek/webService/index.php/api/Priode/SaveDataPriode', {
        body: this.Priode
      })
      .then(response => {
        this.GatDataPriode()
        this.CloseModal('ModalPriodeForm')
      })
      .catch(e => {
        console.log(e);
        this.errors.push(e)
      })
    },
    EditPriode(IdPriode){
      this.GetDataById(IdPriode);
      this.OpenModal('ModalPriodeForm');
    },
    ViewPride(IdPriode){
      this.GetDataById(IdPriode);
      this.OpenModal('ModalPriodeView');
    },
    GetDataById(IdPriode,IsEdit){
      this.Priode= { },
      axios.get('http://localhost/apotek/WebService/index.php/api/Priode/GatDataPriodeById/'+IdPriode)
      .then(response => {
        // JSON responses are automatically parsed.
        this.Priode = response.data;
      })
      .catch(e => {
        this.errors.push(e)
      })
    },
    AddPriode(){
      this.Priode= {
        IdPriode:null,
        NamaPriode:null,
        TanggalMulai:null,
        TanggalAkhir:null,
        Status:null,
        DiBuatOleh:this.GetIdUser(),
        DiUbahOleh:this.GetIdUser(),
        TanggalDiBuat:null,
        TanggalDiUbah:null,
      },
      this.OpenModal ('ModalPriodeForm');
    },
    Filter(){
      var FilterParam = {};
      if(this.FilterModel.NamaPriode !== "" && this.FilterModel.NamaPriode !== null ){
        FilterParam.NamaPriode =this.FilterModel.NamaPriode;
      }
      if(this.FilterModel.TanggalMulai !== null && this.FilterModel.TanggalMulai !== "" ){
        console.log(this.FilterModel.TanggalMulai);
        FilterParam.TanggalMulai =this.FilterModel.TanggalMulai;
      }
      if(this.FilterModel.TanggalAkhir !== null && this.FilterModel.TanggalAkhir !== "" ){
        FilterParam.TanggalAkhir = this.FilterModel.TanggalAkhir;
      }
      if(this.FilterModel.Status !== null && this.FilterModel.Status !== "" ){
        FilterParam.Status = this.FilterModel.Status;
      }
      return FilterParam;
    },
    ChangeFilter(Param){
      console.log(this.FilterModel.TanggalMulai);
      if(Param.length > 2){
        this.GatDataPriode();
      }else if(Param.length == 0){
        this.GatDataPriode();
      }
    },
    ChangeFilterDropdown(Param){
      if(Param.length >= 1){
        this.GatDataPriode();
      }else if(Param.length == 0){
        this.GatDataPriode();
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
