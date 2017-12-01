
import axios from 'axios'

export default {
  name: 'GolonganController',
  created(){
    this.GetDataGolongan();
  },
  data () {
    return {
      Golongans: [],
      errors: [],
      Golongan: {
        IdGolongan: Number,
        KodeGolongan: String,
        Golongan: String,

      },
    }
  },
  methods: {
    GetDataGolongan () {
      axios.get('http://localhost/apotek/WebService/index.php/api/Golongan/GetGolonganAll')
      .then(response => {
        // JSON responses are automatically parsed.
        this.Golongans = response.data;
      })
      .catch(e => {
        this.errors.push(e)
      })
    },
    SaveDataGolongan(){
      axios.post('http://localhost/apotek/webService/index.php/api/Golongan/SaveDataGolongan', {
        body: this.Golongan
      })
      .then(response => {
           console.log(response.data);
        this.CloseModal('ModalGolonganForm');
        this.GetDataGolongan();
      })
      .catch(e => {
        this.errors.push(e)
      })
    },
    EditGolongan(IdGolongan){
      this.GetDataById(IdGolongan);
      this.OpenModal('ModalGolonganForm');
    },
    ViewGolongan(IdGolongan){
      this.GetDataById(IdGolongan);
      this.OpenModal('ModalGolonganView');
    },
    GetDataById(IdGolongan){
      this.Golongan= { },
      axios.get('http://localhost/apotek/WebService/index.php/api/Golongan/GetDataGolonganById/'+IdGolongan)
      .then(response => {
        // JSON responses are automatically parsed.
        this.Golongan = response.data;
        console.log(this.Golongan);
      })
      .catch(e => {
        this.errors.push(e)
      })
    },
    AddGolongan(){
      this.Golongan= {
        IdGolongan: null,
        KodeGolongan: null,
        Golongan: null,
      },
      this.OpenModal ('ModalGolonganForm');
    },
    OpenModal (Modal){
      $('#'+Modal).modal('show');
    },
    CloseModal (Modal){
      $('#'+Modal).modal('hide');
    }
  },

}
