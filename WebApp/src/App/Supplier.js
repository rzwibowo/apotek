
import axios from 'axios'
import Aut from '../App/Aut.js'

export default {
  name: 'SupplierController',
  created(){
    this.GetDataSupplier();
  },
  mixins: [Aut],
  data () {
    return {
      Suppliers: [],
      errors: [],
      Bank:[],
      Kota:[],
      Supplier: {
        IdSupplier:Number,
        NamaSupplier:String,
        NomorTelepon:String,
        Status:Boolean,
        Alamat:String,
        NoHp:String,
        ContactPerson:String,
        IdBank:Number,
        Email:String,
        IdKota:Number,
        Website:String,
        DiBuatOleh:Number,
        DiUbahOleh:Number,
        TanggalDiBuat:Date,
        TanggalDiUbah:Date,
      },
      FilterModel: {
        IdSupplier:"",
        NamaSupplier:"",
        NomorTelepon:"",
        Status:"",
        Alamat:"",
        NoHp:"",
        ContactPerson:"",
        IdBank:"",
        Email:"",
        IdKota:"",
        Website:"",
        DiBuatOleh:"",
        DiUbahOleh:"",
        TanggalDiBuat:"",
        TanggalDiUbah:"",
      },
    }
  },
  methods: {
    GetDataSupplier () {
      axios.post('http://localhost/apotek/WebService/index.php/api/Supplier/GetDataSupplier',{
        body: this.Filter()
      }).then(response => {
        // JSON responses are automatically parsed.
        this.Suppliers = response.data;
        //console.log(response);
      })
      .catch(e => {
        this.errors.push(e)
      })
    },
    SaveDataSupplier(){
      this.Supplier.DiUbahOleh = this.GetIdUser()
      axios.post('http://localhost/apotek/webService/index.php/api/Supplier/SaveDataSupplier', {
        body: this.Supplier
      })
      .then(response => {
        this.CloseModal('ModalSupplierForm');
        this.GetDataSupplier();
      })
      .catch(e => {
        this.errors.push(e)
      })
    },
    EditSupplier(IdSupplier){
      this.GetDataById(IdSupplier);
      this.OpenModal('ModalSupplierForm');
    },
    ViewSupplier(IdSupplier){
      this.GetDataById(IdSupplier);
      this.OpenModal('ModalSupplierView');
    },
    GetDataById(IdSupplier,IsEdit){
      this.Supplier= { },
      axios.get('http://localhost/apotek/WebService/index.php/api/Supplier/GatDataSupplierById/'+IdSupplier)
      .then(response => {
        // JSON responses are automatically parsed.
        this.Supplier = response.data;
      })
      .catch(e => {
        this.errors.push(e)
      })
    },
    AddSupplier(){
      this.GetDataBank()
      this.GetDataKota()
      this.Supplier= {
        IdSupplier:null,
        NamaSupplier:null,
        NomorTelepon:null,
        Status:null,
        Alamat:null,
        NoHp:null,
        ContactPerson:null,
        IdBank:"",
        Email:null,
        IdKota:"",
        Website:null,
        DiBuatOleh:this.GetIdUser(),
        DiUbahOleh:this.GetIdUser(),
        TanggalDiBuat:Date,
        TanggalDiUbah:Date,
      },
      this.OpenModal ('ModalSupplierForm');
    },
    GetDataKota(){
      axios.get('http://localhost/apotek/WebService/index.php/api/Kota/GetKotaAll')
      .then(response => {
        // JSON responses are automatically parsed.
        this.Kota = response.data;
      })
      .catch(e => {
        this.errors.push(e)
      })
    },
    GetDataBank(){
      axios.get('http://localhost/apotek/WebService/index.php/api/Bank/GetBankAll')
      .then(response => {
        // JSON responses are automatically parsed.
        this.Bank = response.data;
      })
      .catch(e => {
        this.errors.push(e)
      })
    },
    Filter(){
      var FilterParam = {};
      if(this.FilterModel.NamaSupplier !== "" && this.FilterModel.NamaSupplier !== null ){
        FilterParam.NamaSupplier =this.FilterModel.NamaSupplier;
      }
      if(this.FilterModel.Email !== null && this.FilterModel.Email !== "" ){
        FilterParam.Email =this.FilterModel.Email;
      }
      if(this.FilterModel.NomorTelepon !== null && this.FilterModel.NomorTelepon !== "" ){
        FilterParam.NomorTelepon = this.FilterModel.NomorTelepon;
      }
      if(this.FilterModel.NoHp !== null && this.FilterModel.NoHp !== "" ){
        FilterParam.NoHp = this.FilterModel.NoHp;
      }
      if(this.FilterModel.Status !== null && this.FilterModel.Status !== "" ){
        FilterParam.Status = this.FilterModel.Status;
      }
      if(this.FilterModel.Alamat !== null && this.FilterModel.Alamat !== "" ){
        FilterParam.Alamat=this.FilterModel.Alamat;
      }
      return FilterParam;
    },
    ChangeFilter(Param){
      if(Param.length > 2){
        this.GetDataSupplier();
      }else if(Param.length == 0){
          this.GetDataSupplier();
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
