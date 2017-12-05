
import axios from 'axios'

export default {
  name: 'ObatController',
  created(){
    this.GetDataObat();
  },
  data () {
    return {
      Obats: [],
      errors: [],
      GolonganObats:[],
      Obat: {
        IdObat: Number,
        IdGolongan: Number,
        NamaObat: String,
        StokObat: Number,
        HargaSatuan:Number,
        TanggalKadaluarsa:Date,
        KodeObat:String,
      },
      FilterModel:{
        IdObat: "",
        NamaObat: "",
        Golongan: "",
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
    GetDataGolonganObat () {
      axios.get('http://localhost/apotek/webService/index.php/api/Golongan/GetGolonganAll')
      .then(response => {
        // JSON responses are automatically parsed.
        this.GolonganObats = response.data;
      })
      .catch(e => {
        this.errors.push(e)
      })
    },
    EditObat(IdObat){
      this.GetDataGolonganObat();
      this.GetDataById(IdObat,true);
      this.OpenModal('ModalObatForm');
    },
    ViewObat(IdObat){
      this.GetDataGolonganObat();
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
      this.GetDataGolonganObat();
      this.Obat= {
        IdObat: null,
        IdGolongan: "",
        NamaObat: null,
        StokObat: null,
        HargaSatuan:null,
        TanggalKadaluarsa:null,
        KodeObat:null,
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
      if(this.FilterModel.Golongan !== null && this.FilterModel.Golongan !== "" ){
        FilterParam.Golongan = this.FilterModel.Golongan;
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
