
import axios from 'axios'

export default {
  name: 'PembelianFormController',
  created(){
    this.InitializeForm();
  },
  data () {
    return {
      errors: [],
      Obats: [],
      Suppliers: [],
      Pembelian: {
        IdPembelian:Number,
        TanggalPembelian:Date,
        IdSupplier:Number,
        TotalHargaBeli:Number,
        TotalJumlahObat:Number,
        StatusPembelian:Boolean,
        DetailPembelian:[]
      },
      DetailPembelian:{
        IdDetailPembelian:Number,
        IdPembelian:Number,
        IdObat:Number,
        JumlahObat:Number,
        HargaPembelian:Number,
        Status:Boolean
      },
    }
  },
  methods: {
    SaveDataPembelian(){
      this.PopuletDataDetail(true);
      axios.post('http://localhost/apotek/webService/index.php/api/Pembelian/SaveDataPembelian', {
        body: this.Pembelian
      })
      .then(response => {
        console.log(response);
        alert("Transaksi Berhasil");
          if(this.$route.params.IdPembelian !== undefined){
            window.history.back();
          }else {
          this.InitializeForm();
          }
        // this.CloseModal('ModalPembelianForm');
        // this.GetDataPembelian();
      })
      .catch(e => {
        this.errors.push(e)
      })
    },
    EditPembelian(IdPembelian){
      this.Pembelian= { };
      var DetailPembelianTemp =[];
      var ItemDetail = {};
      axios.get('http://localhost/apotek/WebService/index.php/api/Pembelian/GetDataPembelianById/'+IdPembelian+'/'+true)
      .then(response => {
        this.Pembelian = response.data;
        this.PopuletDataDetail(false);
      })
      .catch(e => {
        this.errors.push(e)
      });
    },
    ViewPembelian(IdPembelian){
      this.GetDataById(IdPembelian);
    },
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
    InitializeForm(){
      this.GetDataObat();
      this.GetDataSupplier();
      if(this.$route.params.IdPembelian !== undefined){
        this.EditPembelian(this.$route.params.IdPembelian);
      }else{
      this.Pembelian= {
        IdPembelian:null,
        TanggalPembelian:"",
        IdSupplier:"",
        TotalHargaBeli:null,
        TotalJumlahObat:null,
        StatusPembelian:0,
        DetailPembelian:[]
      }
    }
    },
    AddItem(){
      var DetailPembelian = {
        IdDetailPembelian:null,
        IdPembelian:this.Pembelian.IdPembelian !== undefined? this.Pembelian.IdPembelian : null,
        IdObat:"",
        JumlahObat:null,
        HargaPembelian:null,
        Status:0,
        IsEdit:1,
      }
      this.Pembelian.DetailPembelian.push(DetailPembelian);
    },
    GetDataObat(){
      axios.get('http://localhost/apotek/WebService/index.php/api/obat/GetDataObat')
      .then(response => {
        this.Obats = response.data;
      })
      .catch(e => {
        this.errors.push(e)
      })
    },
    GetObatByIdLocal(IdObat){
      var Obat = this.Obats.filter(x => x.IdObat == IdObat)[0];
      if(Obat !== undefined){
        return Obat.NamaObat;
      }
    },
    SaveItem(Index){
      this.Pembelian.DetailPembelian[Index].IsEdit=0;
      this.CalculateTotalHargaAndObat();
    },
    PopuletDataDetail(Save)
    {
      var DetailPembelianTemp =[];
      var ItemDetail = {};
      if(Save == true){
      this.Pembelian.DetailPembelian.forEach(function(Item,Index){
        ItemDetail = {
          IdDetailPembelian:Item.IdDetailPembelian,
          IdPembelian:Item.IdPembelian,
          IdObat:Item.IdObat,
          JumlahObat:Item.JumlahObat,
          HargaPembelian:Item.HargaPembelian,
          Status:Item.Status,
        }
        DetailPembelianTemp.push(ItemDetail);
      });
    }else{
      this.Pembelian.DetailPembelian.forEach(function(Item,Index){
        ItemDetail = {
          IdDetailPembelian:Item.IdDetailPembelian,
          IdPembelian:Item.IdPembelian,
          IdObat:Item.IdObat,
          JumlahObat:Item.JumlahObat,
          HargaPembelian:Item.HargaPembelian,
          Status:Item.Status,
          IsEdit:0,
        }
        DetailPembelianTemp.push(ItemDetail);
      });
    }
    this.Pembelian.DetailPembelian = DetailPembelianTemp;
  },
    CalculateTotalHargaAndObat(){
      var TotalHargaBeli=0;
      var TotalObat=0;
      this.Pembelian.DetailPembelian.forEach(function(Item, Index) {
        if(Item.IsEdit == 0){
          TotalObat += Number(Item.JumlahObat);
          TotalHargaBeli+= Number(Item.HargaPembelian) * Item.JumlahObat;
        }
      });
      this.Pembelian.TotalHargaBeli =TotalHargaBeli;
      this.Pembelian.TotalJumlahObat =TotalObat;
    },
    EditItem(Index){
      this.Pembelian.DetailPembelian[Index].IsEdit=1;
    },
    DeleteItem(Index){
      this.Pembelian.DetailPembelian.splice(Index,1);
      this.CalculateTotalHargaAndObat();
    },
    GoPage(path){
      this.$router.push(path);
    },
  },

}
