
import axios from 'axios'


//import Toolsmenu from '@/components/TemplateModal1'
import test from '@/components/TemplateForm'

export default {
  name: 'PriodeController',
  components: {test},
  created(){
   this.GatDataPriode();
  },
  data () {
    return {
      Priodes: [],
      errors: [],
      Priode: {
        IdPriode:Number,
        PriodeName:String,
        StartDate:Date,
        EndDate:Date,
        Status:Boolean,
        Create:Date,
        Update:Date
      },
    }
  },
  methods: {
    GatDataPriode () {
      axios.get('http://localhost/apotek/WebService/index.php/api/Supplier/GetDataSupplier')
      .then(response => {
        // JSON responses are automatically parsed.
        this.Priodes = response.data;
      })
      .catch(e => {
        this.errors.push(e)
      })
    },
    SaveDataPriode(){
      axios.post('http://localhost/apotek/webService/index.php/api/Supplier/SaveDataSupplier', {
        body: this.Priode
      })
      .then(response => {
        this.CloseModal('ModalSupplierForm');
        this.GetDataPriode();
      })
      .catch(e => {
        this.errors.push(e)
      })
    },
    EditPriode(IdSupplier){
      this.GetDataById(IdSupplier);
      this.OpenModal('ModalSupplierForm');
    },
    ViewPride(IdSupplier){
      this.GetDataById(IdSupplier);
      this.OpenModal('ModalSupplierView');
    },
    GetDataById(IdSupplier,IsEdit){
      this.Priode= { },
      axios.get('http://localhost/apotek/WebService/index.php/api/Supplier/GatDataSupplierById/'+IdSupplier)
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
        IdPriode:Number,
        PriodeName:String,
        StartDate:Date,
        EndDate:Date,
        Status:Boolean,
        Create:Date,
        Update:Date
      },
      this.OpenModal ('ModalPriodeForm');
    },
    OpenModal (Modal){
      $('#'+Modal).modal('show');
    },
    CloseModal (Modal){
      $('#'+Modal).modal('hide');
    }
  },

}
