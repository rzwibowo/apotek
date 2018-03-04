
import axios from 'axios'
import Aut from '../App/Aut.js'

export default {
  name: 'KategoriController',
  created(){
    this.GetDataKategori();
  },
  mixins: [Aut],
  data () {
    return {
      Kategoris: [],
      errors: [],
      Kategori: {
        IdKategori: Number,
        KodeKategori: String,
        NamaKategori: String,
        Keterangan:String,
        DiBuatOlah:Number,
        DiUbahOleh:Number,
        TanggalDiBuat:Date,
        TanggalDiUbah:Date,
      },
      FilterModel:{
        IdKategori: "",
        KodeKategori: "",
        NamaKategori: "",
        Keterangan:"",
        DiBuatOlah:"",
        DiUbahOleh:"",
        TanggalDiBuat:"",
        TanggalDiUbah:"",
      },
    }
  },
  methods: {
    GetDataKategori () {
      axios.post('http://localhost/apotek/WebService/index.php/api/Kategori/GetKategoriAll',{
        body: this.Filter()
      }).then(response => {
        // JSON responses are automatically parsed.
        this.Kategoris = response.data;
      })
      .catch(e => {
        this.errors.push(e)
      })
    },
    SaveDataKategori(){
      this.Kategori.DiUbahOleh = this.GetIdUser()
      axios.post('http://localhost/apotek/webService/index.php/api/Kategori/SaveDataKategori', {
        body: this.Kategori
      })
      .then(response => {
           console.log(response.data);
        this.CloseModal('ModalKategoriForm');
        this.GetDataKategori();
      })
      .catch(e => {
        this.errors.push(e)
      })
    },
    EditKategori(IdKategori){
      this.GetDataById(IdKategori);
      this.OpenModal('ModalKategoriForm');
    },
    ViewKategori(IdKategori){
      this.GetDataById(IdKategori);
      this.OpenModal('ModalKategoriView');
    },
    GetDataById(IdKategori){
      this.Kategori= { },
      axios.get('http://localhost/apotek/WebService/index.php/api/Kategori/GetDataKategoriById/'+IdKategori)
      .then(response => {
        // JSON responses are automatically parsed.
        this.Kategori = response.data;
        console.log(this.Kategori);
      })
      .catch(e => {
        this.errors.push(e)
      })
    },
    AddKategori(){
      this.Kategori= {
        IdKategori: null,
        KodeKategori: null,
        NamaKategori: null,
        Keterangan: null,
        DiBuatOlah:this.GetIdUser(),
        DiUbahOleh:this.GetIdUser(),
        TanggalDiBuat:Date,
        TanggalDiUbah:Date,
      },
      this.OpenModal ('ModalKategoriForm');
    },
    Filter(){
      var FilterParam = {};
      if(this.FilterModel.KodeKategori !== "" && this.FilterModel.KodeKategori !== null ){
        FilterParam.KodeKategori =this.FilterModel.KodeKategori;
      }
      if(this.FilterModel.NamaKategori !== null && this.FilterModel.NamaKategori !== "" ){
        FilterParam.NamaKategori =this.FilterModel.NamaKategori;
      }
      return FilterParam;
    },
    ChangeFilter(Param){
      if(Param.length > 2){
        this.GetDataKategori();
      }else if(Param.length == 0){
          this.GetDataKategori();
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
