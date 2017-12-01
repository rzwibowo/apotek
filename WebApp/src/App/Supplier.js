
import axios from 'axios'

export default {
  name: 'SupplierController',
  created(){
    this.GetDataSupplier();
  },
  data () {
    return {
      Suppliers: [],
      errors: [],
      GolonganSuppliers:[],
      Supplier: {
        IdSupplier:Number,
        NamaSupplier:String,
        NomorTelepon:String,
        Status:Boolean,
        Alamat:String,
      },
    }
  },
  methods: {
    GetDataSupplier () {
      axios.get('http://localhost/apotek/WebService/index.php/api/Supplier/GetDataSupplier')
      .then(response => {
        // JSON responses are automatically parsed.
        this.Suppliers = response.data;
      })
      .catch(e => {
        this.errors.push(e)
      })
    },
    SaveDataSupplier(){

               console.log(this.Supplier);
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
      this.Supplier= {
        IdSupplier:null,
        NamaSupplier:null,
        NomorTelepon:null,
        Status:null,
        Alamat:null,
      },
      this.OpenModal ('ModalSupplierForm');
    },
    OpenModal (Modal){
      $('#'+Modal).modal('show');
    },
    CloseModal (Modal){
      $('#'+Modal).modal('hide');
    }
  },

}
