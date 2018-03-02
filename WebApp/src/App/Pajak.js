
import axios from 'axios'
import Aut from '../App/Aut.js'

export default {
  name: 'PajakController',
  created(){
    this.GetDataPajak();
  },
  mixins: [Aut],
  data () {
    return {
      Pajaks: [],
      errors: [],
      Pajak: {
        IdPajak:Number,
        NamaPajak:String,
        BesarPajak:Number,
        Status:Boolean,
        Keterangan:String,
        DiBuatOleh:Number,
        DiUbahOleh:Number,
        TanggalDiBuat:Date,
        TanggalDiUbah:Date
      },
      FilterModel:{
        IdPajak:"",
        NamaPajak:"",
        BesarPajak:"",
        Status:"",
        Keterangan:"",
        DiBuatOleh:"",
        DiUbahOleh:"",
        TanggalDiBuat:"",
        TanggalDiUbah:""
      },
    }
  },
  methods: {
    GetDataPajak () {
      axios.post('http://localhost/apotek/WebService/index.php/api/Pajak/GetPajakAll',{
        body: this.Filter()
      }).then(response => {
        // JSON responses are automatically parsed.
        this.Pajaks = response.data;
      })
      .catch(e => {
        this.errors.push(e)
      })
    },
    SaveDataPajak(){
      this.Pajak.DiUbahOleh = this.GetIdUser()
      axios.post('http://localhost/apotek/webService/index.php/api/Pajak/SaveDataPajak', {
        body: this.Pajak
      })
      .then(response => {
           console.log(response.data);
        this.CloseModal('ModalPajakForm');
        this.GetDataPajak();
      })
      .catch(e => {
        this.errors.push(e)
      })
    },
    EditPajak(IdPajak){
      this.GetDataById(IdPajak);
      this.OpenModal('ModalPajakForm');
    },
    ViewPajak(IdPajak){
      this.GetDataById(IdPajak);
      this.OpenModal('ModalPajakView');
    },
    GetDataById(IdPajak){
      this.Pajak= { },
      axios.get('http://localhost/apotek/WebService/index.php/api/Pajak/GetDataPajakById/'+IdPajak)
      .then(response => {
        // JSON responses are automatically parsed.
        this.Pajak = response.data;
        console.log(this.Pajak);
      })
      .catch(e => {
        this.errors.push(e)
      })
    },
    AddPajak(){
      this.Pajak= {
        IdPajak:null,
        NamaPajak:null,
        BesarPajak:null,
        Status:1,
        Keterangan:null,
        DiBuatOleh:this.GetIdUser(),
        DiUbahOleh:this.GetIdUser(),
        TanggalDiBuat:null,
        TanggalDiUbah:null
      },
      this.OpenModal ('ModalPajakForm');
    },
    Filter(){
      var FilterParam = {};
      if(this.FilterModel.Status !== "" && this.FilterModel.Status !== null ){
        FilterParam.Status =this.FilterModel.Status;
      }
      if(this.FilterModel.NamaPajak !== null && this.FilterModel.NamaPajak !== "" ){
        FilterParam.NamaPajak =this.FilterModel.NamaPajak;
      }
      if(this.FilterModel.BesarPajak !== null && this.FilterModel.BesarPajak !== "" ){
        FilterParam.BesarPajak =this.FilterModel.BesarPajak;
      }
      return FilterParam;
    },
    ChangeFilter(Param){
      if(Param.length > 2){
        this.GetDataPajak();
      }else if(Param.length == 0){
          this.GetDataPajak();
      }
    },
    ChangeFilterDropdown(Param){
      if(Param.length > 0){
        this.GetDataPajak();
      }else if(Param.length == 0){
          this.GetDataPajak();
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
