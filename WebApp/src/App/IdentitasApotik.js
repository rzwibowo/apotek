
import axios from 'axios'
import Aut from '../App/Aut.js'

export default {
  name: 'IdentitasApotikController',
  created(){
    this.IsEdit=false;
    this.Initialize();
  },
  mixins: [Aut],
  data () {
    return {
      Apotiks: [],
      errors: [],
      Kota:[],
      IsEdit:Boolean,
      Apotik: {
        IdApotik:Number,
        NamaApotik:String,
        AlamatApotik:String,
        IdKota:Number,
        NoRegistrasi:String,
        NamaPemilik:String,
        NoTelepon:String,
        Slogan:String,
        DiBuatOlah:Number,
        DiUbahOleh:Number,
        TanggalDiBuat:Date,
        TanggalDiUbah:Date
      },
    }
  },
  methods: {
    Initialize(){
      this.GetDataKota();
      this.Apotik= {
        IdApotik:"",
        NamaApotik:"",
        AlamatApotik:"",
        IdKota:"",
        NoRegistrasi:"",
        NamaPemilik:"",
        NoTelepon:"",
        Slogan:"",
        DiBuatOlah:"",
        DiUbahOleh:"",
        TanggalDiBuat:"",
        TanggalDiUbah:""
      }
      this.GetDataApotik();
    },
    GetDataApotik () {
      axios.get('http://localhost/apotek/WebService/index.php/api/IdentitasApotik/GetApotikAll')
      .then(response => {
        // JSON responses are automatically parsed.
        this.Apotik = response.data[0];
        this.Apotik.DiBuatOlah =  this.Apotik.DiBuatOlah == null || this.Apotik.DiBuatOlah == "" || this.Apotik.DiBuatOlah == 0 ? this.GetIdUser():  this.Apotik.DiBuatOlah;
      })
      .catch(e => {
        this.errors.push(e)
      })
    },
    SaveDataApotik(){
      this.IsEdit = false;
      this.Apotik.DiUbahOleh = this.GetIdUser();
      axios.post('http://localhost/apotek/webService/index.php/api/IdentitasApotik/SaveDataApotik', {
        body: this.Apotik
      })
      .then(response => {
           console.log(response.data);
        this.CloseModal('ModalApotikForm');
        this.GetDataApotik();
      })
      .catch(e => {
        this.errors.push(e)
      })
    },
    EditApotik(IdApotik){
      this.IsEdit=true;

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

  }
}
