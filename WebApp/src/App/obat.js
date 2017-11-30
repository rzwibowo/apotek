
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
    }
  },
  methods: {
    GetDataObat () {
      axios.get('http://localhost/apotek/WebService/index.php/api/obat/GetDataObat')
      .then(response => {
        // JSON responses are automatically parsed.
        this.Obats = response.data;
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
      this.Obat= {
        IdObat: null,
        IdGolongan: "",
        NamaObat: null,
        StokObat: null,
        HargaSatuan:null,
        TanggalKadaluarsa:null,
        KodeObat:null,
      },
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
      OpenModal ('ModalObatForm');
    },
    OpenModal (Modal){
      $('#'+Modal).modal('show');
    },
    CloseModal (Modal){
      $('#'+Modal).modal('hide');
    }
  },

}
