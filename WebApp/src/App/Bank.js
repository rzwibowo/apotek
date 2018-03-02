
import axios from 'axios'
import Aut from '../App/Aut.js'

export default {
  name: 'BankController',
  created(){
    this.GetDataBank();
  },
  mixins: [Aut],
  data () {
    return {
      Banks: [],
      errors: [],
      Bank: {
        IdBank: Number,
        NamaBank: String,
        DiBuatOlah:Number,
        DiUbahOleh:Number,
        TanggalDiBuat:Date,
        TanggalDiUbah:Date,
      },
      FilterModel:{
        IdBank:"",
        NamaBank:"",
        JenisKartu:"",
        DiBuatOlah:"",
        DiUbahOleh:"",
        TanggalDiBuat:"",
        TanggalDiUbah:"",
      },
    }
  },
  methods: {
    GetDataBank () {
      axios.post('http://localhost/apotek/WebService/index.php/api/Bank/GetBankAll',{
        body: this.Filter()
      }).then(response => {
        // JSON responses are automatically parsed.
        this.Banks = response.data;
      })
      .catch(e => {
        this.errors.push(e)
      })
    },
    SaveDataBank(){
      this.Bank.DiUbahOleh = this.GetIdUser()
      axios.post('http://localhost/apotek/webService/index.php/api/Bank/SaveDataBank', {
        body: this.Bank
      })
      .then(response => {
           console.log(response.data);
        this.CloseModal('ModalBankForm');
        this.GetDataBank();
      })
      .catch(e => {
        this.errors.push(e)
      })
    },
    EditBank(IdBank){
      this.GetDataById(IdBank);
      this.OpenModal('ModalBankForm');
    },
    ViewBank(IdBank){
      this.GetDataById(IdBank);
      this.OpenModal('ModalBankView');
    },
    GetDataById(IdBank){
      this.Bank= { },
      axios.get('http://localhost/apotek/WebService/index.php/api/Bank/GetDataBankById/'+IdBank)
      .then(response => {
        // JSON responses are automatically parsed.
        this.Bank = response.data;
        console.log(this.Bank);
      })
      .catch(e => {
        this.errors.push(e)
      })
    },
    AddBank(){
      this.Bank= {
        IdBank: null,
        NamaBank: null,
        JenisKartu:"",
        DiBuatOlah:this.GetIdUser(),
        DiUbahOleh:this.GetIdUser(),
        TanggalDiBuat:Date,
        TanggalDiUbah:Date,
      },
      this.OpenModal ('ModalBankForm');
    },
    Filter(){
      var FilterParam = {};
      if(this.FilterModel.JenisKartu !== "" && this.FilterModel.JenisKartu !== null ){
        FilterParam.JenisKartu =this.FilterModel.JenisKartu;
      }
      if(this.FilterModel.NamaBank !== null && this.FilterModel.NamaBank !== "" ){
        FilterParam.NamaBank =this.FilterModel.NamaBank;
      }
      return FilterParam;
    },
    ChangeFilter(Param){
      if(Param.length > 2){
        this.GetDataBank();
      }else if(Param.length == 0){
          this.GetDataBank();
      }
    },
    ChangeFilterDropdown(Param){
      if(Param.length > 0){
        this.GetDataBank();
      }else if(Param.length == 0){
          this.GetDataBank();
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
