
import axios from 'axios'

export default {
  name: 'PenjualanFormController',
  created(){
    this.InitializeForm();
  },
  data () {
    return {
      errors: [],
      Obats: [],
      ListIdObat:[],
      ShowSearchObat:Boolean,
      CurrentDate:Date,
      TotalBayar:Number,
      TotalItemObat:Number,
      IdObatSelected:Number,
      Penjualan: {
        IdPenjualan:Number,
        TanggalJual:Date,
        IdPegawai:Number,
        TotalHargaJual:Number,
        TotalJumlahObat:Number,
        DetailPenjualan:[]
      },
      PenjualanDetail:{
        IdDetailJual:Number,
        IdPenjualan:Number,
        IdObat:Number,
        JumlahObat:Number,
        HargaSatuan:Number
      },
      PenjualanDetailOther:{
        IdDetailJual:Number,
        IdPenjualan:Number,
        IdObat:Number,
        JumlahObat:Number,
        HargaSatuan:Number,
        KodeObat:String,
        NamaObat:String,
        Diskon:Number,
        Total:Number,
      },
      FilterObatModel:{
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
    SaveDataPenjualan(){
      if(this.Penjualan.DetailPenjualan.length == 0 || this.Penjualan.DetailPenjualan.length == undefined || this.Penjualan.DetailPenjualan.length == null){
       alert("Belum ada data yang akan di simpan");
     }else if(this.PenjualanDetailOther.IdObat !== undefined){
       alert("Ada data yang belum di tambahkan");
     }else{
      this.PopuletDataDetail(true);
      axios.post('http://localhost/apotek/webService/index.php/api/Penjualan/SaveDataPenjualan', {
        body: this.Penjualan
      })
      .then(response => {
        console.log(response);
        //   alert("Transaksi Berhasil");
        // if(this.$route.params.IdPembelian !== undefined){
        //   window.history.back();
        // }else {
        alert("Transaksi Berhasil Disimpan");
        this.InitializeForm();
        //  }
      })
      .catch(e => {
        this.errors.push(e);
      })
      }
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
    InitializeForm(){
      this.GetDataObat();
      // if(this.$route.params.IdPembelian !== undefined){
      //   this.EditPembelian(this.$route.params.IdPembelian);
      // }else{
      this.ShowSearchObat= false;
      this.CurrentDate = new Date();
      this.TotalItemObat =0;
      this.TotalBayar =0;
      this.Penjualan= {
        IdPenjualan:null,
        TanggalJual:null,
        IdPegawai:null,
        TotalHargaJual:1000,
        TotalJumlahObat:3,
        DetailPenjualan:[]
      }
      this.PenjualanDetail={
        IdDetailJual:null,
        IdPenjualan:null,
        IdObat:null,
        JumlahObat:null,
        HargaSatuan:null
      }
      this.PenjualanDetailOther={
        IdDetailJual:null,
        IdPenjualan:null,
        IdObat:null,
        JumlahObat:null,
        HargaSatuan:null,
        KodeObat:null,
        NamaObat:null,
        Diskon:null,
        Total:null,
      }
    this.AddItemObat();
      //  }
    },
    AddItem(){
      if(this.PenjualanDetailOther.IdObat == null){
        alert("Obat Belum Di Pilih");
      }else if(this.PenjualanDetailOther.JumlahObat == null){
        alert("Jumlah Obat Belum Di input");
      }else{
    var IsExis =   this.Penjualan.DetailPenjualan.filter(x => x.IdObat == this.PenjualanDetailOther.IdObat)[0];
    var IndexIsExis = null;
    if(IsExis == undefined ){
      this.Penjualan.DetailPenjualan.push(this.PenjualanDetailOther);
    }else{
    IndexIsExis = this.Penjualan.DetailPenjualan.indexOf(IsExis);
    this.Penjualan.DetailPenjualan[IndexIsExis].JumlahObat = parseInt(this.Penjualan.DetailPenjualan[IndexIsExis].JumlahObat) + parseInt(this.PenjualanDetailOther.JumlahObat);
    }
      this.PenjualanDetailOther={};
      this.CalculateTotalHargaAndObat();
      }
    },
    AddItemObat(){
      this.Penjualan.DetailPenjualan.push(this.PenjualanDetailOther);
    },
    CancelAddItem(){
      this.PenjualanDetailOther={};
    },
    GetDataObat(){
      axios.post('http://localhost/apotek/WebService/index.php/api/obat/GetDataObat/',{
          body: this.FilterObat()
      }).then(response => {
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
      var DetailPenjualanTemp =[];
      var ItemDetail = {};
      if(Save == true){
        this.Penjualan.DetailPenjualan.forEach(function(Item,Index){
          ItemDetail = {
            IdDetailJual:null,
            IdPenjualan:null,
            IdObat:parseInt(Item.IdObat),
            JumlahObat:parseInt(Item.JumlahObat),
            HargaSatuan:parseInt(Item.HargaSatuan)
          }
          DetailPenjualanTemp.push(ItemDetail);
        });
      }
      // else{
      //   this.Pembelian.DetailPembelian.forEach(function(Item,Index){
      //     ItemDetail = {
      //       IdDetailPembelian:Item.IdDetailPembelian,
      //       IdPembelian:Item.IdPembelian,
      //       IdObat:Item.IdObat,
      //       JumlahObat:Item.JumlahObat,
      //       HargaPembelian:Item.HargaPembelian,
      //       Status:Item.Status,
      //       IsEdit:0,
      //     }
      //     DetailPembelianTemp.push(ItemDetail);
      //   });
      // }
      this.Penjualan.DetailPenjualan = DetailPenjualanTemp;
    },
    CalculateTotalHargaAndObat(){
      var TotalBayar=0;
      var TotalItem=0;
      this.Penjualan.DetailPenjualan.forEach(function(Item, Index) {
        TotalItem += Number(Item.JumlahObat);
        TotalBayar+= Number(Item.HargaSatuan) * Item.JumlahObat;
      });
      this.TotalBayar =TotalBayar;
      this.TotalItemObat =TotalItem;
    },
    EditItem(Index){
      this.Pembelian.DetailPembelian[Index].IsEdit=1;
    },
    DeleteItem(Index){
      this.Penjualan.DetailPenjualan.splice(Index,1);
      this.CalculateTotalHargaAndObat();
    },
    SelectedItemObat(IdObat){

      this.IdObatSelected = IdObat;
    },
    SearchObat(){
      this.ListIdObat = [];
      this.OpenModal('ModalSearchObat');
    },
    SelectedObat(){
      var Obat = this.Obats.filter(x => x.IdObat == this.IdObatSelected)[0];
      if(Obat !== undefined){
        this.PenjualanDetailOther={
          IdDetailJual:Obat.IdDetailJual,
          IdPenjualan:null,
          IdObat:Obat.IdObat,
          JumlahObat:null,
          HargaSatuan:Obat.HargaSatuan,
          KodeObat:Obat.KodeObat,
          NamaObat:Obat.NamaObat,
          Diskon:0,
          Total:0,
        }
        this.CloseModal('ModalSearchObat');
      }else {
        alert("Anda belum memilih obat");
      }

    },
    CalculateTotalDetailOther(){
      if(this.PenjualanDetailOther.IdObat !== undefined && this.PenjualanDetailOther.IdObat !== null){
        this.PenjualanDetailOther.Total= this.PenjualanDetailOther.JumlahObat == null ? 0: this.PenjualanDetailOther.JumlahObat * this.PenjualanDetailOther.HargaSatuan;
      }
    },
    FilterObat(){
      var FilterParam = {};
      if(this.FilterObatModel.KodeObat !== "" && this.FilterObatModel.KodeObat !== null ){
        FilterParam.KodeObat =this.FilterObatModel.KodeObat;
      }
      if(this.FilterObatModel.NamaObat !== null && this.FilterObatModel.NamaObat !== "" ){
        FilterParam.NamaObat =this.FilterObatModel.NamaObat;
      }
      if(this.FilterObatModel.Golongan !== null && this.FilterObatModel.Golongan !== "" ){
        FilterParam.Golongan = this.FilterObatModel.Golongan;
      }
      if(this.FilterObatModel.StokObat !== null && this.FilterObatModel.StokObat !== "" ){
        FilterParam.StokObat = this.FilterObatModel.StokObat;
      }
      if(this.FilterObatModel.HargaSatuan !== null && this.FilterObatModel.HargaSatuan !== "" ){
        FilterParam.HargaSatuan=this.FilterObatModel.HargaSatuan;
      }
      if(this.FilterObatModel.TanggalKadaluarsa !== null && this.FilterObatModel.TanggalKadaluarsa !== "" ){
        FilterParam.TanggalKadaluarsa =this.FilterObatModel.TanggalKadaluarsa;
      }
      return FilterParam;
    },
    ChangeFilterObat(Param){
        if(Param.length > 2){
          this.GetDataObat();
        }else if(Param.length == 0){
            this.GetDataObat();
        }
    },
    OpenSearchObat(IsOpen)
    {
       this.ShowSearchObat= IsOpen == true? false:true;
    },
    GoPage(path){
      this.$router.push(path);
    },
    OpenModal (Modal){
      $('#'+Modal).modal('show');
    },
    CloseModal (Modal){
      $('#'+Modal).modal('hide');
    }
  },

}
