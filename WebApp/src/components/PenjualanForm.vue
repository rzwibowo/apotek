<template>
  <div class="PembelianController">
    <div class="page-head text-center">
      <h1>Penjualan</h1>
    </div>
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalFormLabel">Form Penjualan</h5>
        <b style="text-align:right">Tanggal : {{CurrentDate | formatDate}}</b>
      </div>
      <div class="modal-body">
        <div class="row" v-show="ShowSearchObat">
          <div class="col-sm-6">
            <div class="form-group row">
              <label class="col-form-label col-sm-3">Obat</label>
              <div class="col-sm-3">
                <button class="btn btn-primary"  v-on:click="SearchObat"> <i class="fa fa-info" aria-hidden="true"></i></button>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-form-label col-sm-3">Kode Obat</label>
              <div class="col-sm-6">
                <input class="form-control" name="KodeObat" v-model="PenjualanDetailOther.KodeObat" type="text" >
              </div>
            </div>
            <div class="form-group row">
              <label class="col-form-label col-sm-3">Nama Obat</label>
              <div class="col-sm-6">
                <input class="form-control" name="NamaObat" v-model="PenjualanDetailOther.NamaObat" type="text" disabled="true">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-form-label col-sm-3">Harga Obat</label>
              <div class="col-sm-6">
                <input class="form-control" name="HargaSatuan" v-model="PenjualanDetailOther.HargaSatuan" type="text" disabled="true" >
              </div>
            </div>
          </div>
          <div class="col-sm-6" >
            <div class="form-group row">
              <label class="col-form-label col-sm-3"></label>
              <div class="col-sm-3">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-form-label col-sm-3">Jumlah Obat</label>
              <div class="col-sm-3">
                <input class="form-control" name="JumlahObat" v-model="PenjualanDetailOther.JumlahObat" type="text" v-on:keyup="CalculateTotalDetailOther">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-form-label col-sm-3">Diskon</label>
              <div class="col-sm-6">
                <div class="input-group">
                  <input class="form-control" name="Diskon" v-model="PenjualanDetailOther.Diskon" type="text" disabled="true">
                  <span class="input-group-addon">%</span>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-form-label col-sm-3">Total</label>
              <div class="col-sm-6">
                <input class="form-control" name="Total" v-model="PenjualanDetailOther.Total" type="text" disabled="true">
              </div>
            </div>
          </div>
          <div class="col-sm-12" style="text-align:right;">
            <button type="button" v-on:click="AddItem()" class="btn btn-primary fa fa-plus"></button>
            <button type="button" v-on:click="CancelAddItem()" class="btn btn-default fa fa-minus"></button>
          </div>
        </div>
        <div style="text-align:left">
          <button type="button" v-on:click="OpenSearchObat(ShowSearchObat)" v-show="!ShowSearchObat" class="btn btn-primary">Cari Obat</button>
          <button type="button" v-on:click="OpenSearchObat(ShowSearchObat)"  v-show="ShowSearchObat" class="btn btn-primary">Tutup</button>
        </div>
        <br>
        <div>
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Kode Obat</th>
                  <th>Nama Obat</th>
                  <th>Jumlah Obat</th>
                  <th>Harga Obat</th>
                  <th>Total</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="(Item,index) in Penjualan.DetailPenjualan">
                  <td>{{index + 1}}</td>
                  <td>
                    <input class="form-control" name="KodeObat" v-model="Item.KodeObat" type="text" maxlength="30" disabled="true">
                  </td>
                  <td>
                    <input class="form-control" name="NamaObat" v-model="Item.NamaObat" type="text" maxlength="30" disabled="true">
                  </td>
                  <td>
                    <input class="form-control" name="JumlahObat" v-model="Item.JumlahObat" v-on:keyup="CalculateTotalHargaAndObat" type="text" maxlength="30" >
                  </td>
                  <td>
                    <input class="form-control" name="HargaSatuan" v-model="Item.HargaSatuan" type="text" maxlength="30" disabled="true">
                  </td>
                  <td>
                    <input class="form-control" name="Total" v-model="Item.Total" type="text" maxlength="30" disabled="true">
                  </td>
                  <td class="text-center">
                    <a  v-on:click="DeleteItem(index)" class="btn btn-outline-danger"> <i class="fa fa-close" aria-hidden="true"></i></a>
                  </td>
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td><b>Item :</b> {{TotalItemObat}}</td>
                  <td></td>
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td><b>Total :</b>Rp.{{TotalBayar}}</td>
                  <td></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" v-on:click="SaveDataPenjualan" class="btn btn-primary">Simpan</button>
        <button type="button" v-on:click="GoPage('/Pembelian/')" class="btn btn-secondary">Kembali</button>
        <!--v-on:click="CloseModal" -->
      </div>
    </div>
    <!--modal Search Obat -->
    <div class="modal fade" id="ModalSearchObat" tabindex="-1" role="dialog" aria-labelledby="modalFormLabel" aria-hidden="true" style="margin:auto;">
      <div class="modal-dialog" role="document">
        <div class="modal-content" style="width: 800px;">
          <div class="modal-header">
            <h5 class="modal-title" id="modalFormLabel">Search Obat</h5>
          </div>
          <div class="modal-body">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>No.</th>
                  <th></th>
                  <th>Kode Obat</th>
                  <th>Nama Obat</th>
                  <th>Jenis Obat</th>
                  <th>Kadaluarsa</th>
                  <th>Harga Satuan</th>
                  <th>Stok</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td></td>
                  <td></td>
                  <td> <input class="form-control" name="KodeObat" v-model="FilterObatModel.KodeObat" v-on:keyup="ChangeFilterObat(FilterObatModel.KodeObat)"  type="text" maxlength="30" ></td>
                  <td> <input class="form-control" name="NamaObat" v-model="FilterObatModel.NamaObat" v-on:keyup="ChangeFilterObat(FilterObatModel.NamaObat)"  type="text" maxlength="30" ></td>
                  <td> <input class="form-control" name="Golongan" v-model="FilterObatModel.Golongan" v-on:keyup="ChangeFilterObat(FilterObatModel.Golongan)" type="text" maxlength="30" ></td>
                  <td> <input class="form-control" name="TanggalKadaluarsa" v-model="FilterObatModel.TanggalKadaluarsa" v-on:change="ChangeFilterObat(FilterObatModel.TanggalKadaluarsa)" type="date" maxlength="30" ></td>
                  <td> <input class="form-control" name="HargaSatuan" v-model="FilterObatModel.HargaSatuan" v-on:keyup="ChangeFilterObat(FilterObatModel.HargaSatuan)" type="text" maxlength="30" ></td>
                  <td> <input class="form-control" name="StokObat" v-model="FilterObatModel.StokObat" v-on:keyup="ChangeFilterObat(FilterObatModel.StokObat)"  type="text" maxlength="30" ></td>
                </tr>
                <tr v-for="(Item,index) in Obats">
                  <td>{{index + 1}}</td>
                  <td><label><input type="radio" v-model="ListIdObat[Item.IdObat]" v-on:click="SelectedItemObat(Item.IdObat)" ></label></td>
                  <td>{{Item.KodeObat}} </td>
                  <td>{{Item.NamaObat}}</td>
                  <td>{{Item.Golongan}}</td>
                  <td>{{Item.TanggalKadaluarsa}}</td>
                  <td>{{Item.HargaSatuan}}</td>
                  <td>{{Item.StokObat}}</td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="modal-footer">
            <button type="button" v-on:click="SelectedObat()" class="btn btn-primary">Pilih</button>
            <button type="button" v-on:click="CloseModal('ModalSearchObat')" class="btn btn-secondary">Tutup</button>
            <!--v-on:click="CloseModal" -->
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script src="../App/PenjualanForm.js"></script>
<!-- Add "scoped" attribute to limit CSS to this component only -->
<style>
td.jml{
  text-align: right;
}
/*h1, h2 {
font-weight: normal;
}
ul {
list-style-type: none;
padding: 0;
}
li {
display: inline-block;
margin: 0 10px;
}
a {
color: #42b983;
}*/

body .modal {
  /* new custom width */
  width: 100%;
  /* must be half of the width, minus scrollbar on the left (30px) */
  margin-left: 0px;
}
</style>
