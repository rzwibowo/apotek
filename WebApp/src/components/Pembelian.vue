<template>
  <div class="PembelianController">
    <div class="page-head text-center">
      <h1>Daftar Pembelian</h1>
    </div>
    <div class="table-responsive">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>No.</th>
            <th>Tanggal Pembelian</th>
            <th>Nama Supplier</th>
            <th>Jumlah Obat</th>
            <th>Total Harga Beli</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(Pembelians,index) in Pembelians">
            <td>{{index + 1}}</td>
            <td>{{Pembelians.TanggalPembelian | formatDate}}</td>
            <td>{{Pembelians.NamaSupplier}}</td>
            <td>{{Pembelians.TotalJumlahObat}}</td>
            <td>{{Pembelians.TotalHargaBeli}}</td>
            <td class="text-center">
              <a  v-on:click="EditPembelian(Pembelians.IdPembelian)"  class="btn btn-outline-warning"><i class="fa fa-pencil" aria-hidden="true"></i></a>
              <a  v-on:click="ViewPembelian(Pembelians.IdPembelian)" class="btn btn-outline-info"> <i class="fa fa-info" aria-hidden="true"></i></a>
            </td>
          </tr>
        </tbody>
        <tfoot>
          <tr>
            <td colspan="7">
            </td>
            <td class="text-right">
              <button class="btn btn-primary" v-on:click="AddPembelian"> <i class="fa fa-plus" aria-hidden="true"></i>Pembelian Baru</button>
            </td>
          </tr>
        </tfoot>
      </table>
    </div>
    <!--Form modal-->
    <div class="modal fade" id="ModalPembelianForm" tabindex="-1" role="dialog" aria-labelledby="modalFormLabel" aria-hidden="true" style="margin:auto;">
      <div class="modal-dialog" role="document">
        <div class="modal-content" style="width: 1300px; margin-left: -400px;">
          <div class="modal-header">
            <h5 class="modal-title" id="modalFormLabel">Form Data Pembelian</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <div class="form-group row">
                <label class="col-form-label col-sm-3">Tanggal Pembelian</label>
                <div class="col-sm-3">
                  <input class="form-control" name="NamaPembelian" v-model="Pembelian.TanggalPembelian" type="date">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-form-label col-sm-3">Nama Supplier</label>
                <div class="col-sm-4">
                  <select name="Golongan" v-model="Pembelian.IdSupplier" class="form-control">
                    <option value=''>Pilih</option>
                    <option v-for="option in Suppliers" :value="option.IdSupplier">{{option.NamaSupplier}}</option>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-form-label col-sm-3">Total Jumlah Obat</label>
                <div class="col-sm-3">
                  <input class="form-control" name="NomerTelepon" v-model="Pembelian.TotalJumlahObat" type="text"  disabled="true">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-form-label col-sm-3">Total Harga Beli</label>
                <div class="col-sm-3">
                  <input class="form-control" name="NomerTelepon" v-model="Pembelian.TotalHargaBeli" type="text" maxlength="30" disabled="true">
                </div>
              </div>

            </form>
            <div style="text-align:left">
              <button type="button" v-on:click="AddItem()" class="btn btn-primary">Tambah Item</button>
            </div>
            <div>
              <div class="table-responsive">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Nama Obat</th>
                      <th>Jumlah Obat</th>
                      <th>Harga Pembelian</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(detailpembelian,index) in Pembelian.DetailPembelian">
                      <td>{{index + 1}}</td>
                      <td v-show="detailpembelian.IsEdit==1">
                        <select name="Golongan" v-model="detailpembelian.IdObat" class="form-control">
                          <option value=''>Pilih</option>
                          <option v-for="option in Obats" :value="option.IdObat">{{option.NamaObat}}</option>
                        </select>
                      </td>
                      <td  v-show="detailpembelian.IsEdit==0">
                        {{GetObatByIdLocal(detailpembelian.IdObat)}}
                      </td>
                      <td  v-show="detailpembelian.IsEdit==1">
                        <input class="form-control" name="NomerTelepon" v-model="detailpembelian.JumlahObat" type="text" maxlength="30" >
                      </td>
                      <td  v-show="detailpembelian.IsEdit==0">
                        {{detailpembelian.JumlahObat}}
                      </td>
                      <td  v-show="detailpembelian.IsEdit==1">
                        <input class="form-control" name="NomerTelepon" v-model="detailpembelian.HargaPembelian" type="text" maxlength="30">
                      </td>
                      <td  v-show="detailpembelian.IsEdit==0">
                        {{detailpembelian.HargaPembelian}}
                      </td>
                      <td class="text-center">
                        <a  v-on:click="SaveItem(index)"  class="btn btn-outline-primary" v-show="detailpembelian.IsEdit==1"><i class="fa fa-save" aria-hidden="true"></i></a>
                        <a  v-on:click="EditItem(index)"  class="btn btn-outline-warning" v-show="detailpembelian.IsEdit==0"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                        <a  v-on:click="DeleteItem(index)" class="btn btn-outline-danger"> <i class="fa fa-trash" aria-hidden="true"></i></a>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" v-on:click="CloseModal('ModalPembelianForm')" class="btn btn-secondary">Tutup</button>
            <button type="button" v-on:click="SaveDataPembelian" class="btn btn-primary">Simpan</button>
            <!--v-on:click="CloseModal" -->
          </div>
        </div>
      </div>
    </div>
    <!--end Form Modal-->
    <!--end View Modal-->
    <!-- <div class="modal fade" id="ModalPembelianView" tabindex="-1" role="dialog" aria-labelledby="modalFormLabel" aria-hidden="true" style="margin:auto;">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
    <h5 class="modal-title" id="modalFormLabel">View Data Pembelian</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<div class="modal-body">
<form>
<div class="form-group row">
<label class="col-form-label col-sm-3">Nama Pembelian</label>
<div class="col-sm-4">
<label class="col-form-label">{{Pembelian.NamaPembelian}}</label>
</div>
</div>
<div class="form-group row">
<label class="col-form-label col-sm-3">Nomor Telepon</label>
<div class="col-sm-4">
<label class="col-form-label">{{Pembelian.NomorTelepon}}</label>
</div>
</div>

<div class="form-group row">
<label class="col-form-label col-sm-3">Status Pembelian</label>
<div class="col-sm-4">
<label class="col-form-label">{{Pembelian.Status ==1?"Aktife":"Non Aktif"}}</label>
</div>
</div>

<div class="form-group row">
<label class="col-form-label col-sm-3">Alamat</label>
<div class="col-sm-4">
<label class="col-form-label">{{Pembelian.Alamat}}</label>
</div>
</div>
</form>
</div>
<div class="modal-footer">
<button type="button" v-on:click="CloseModal('ModalPembelianView')" class="btn btn-secondary">Tutup</button>
</div>
</div>
</div>
</div> -->
<!--end View Modal -->
</div>
</template>
<script src="../App/Pembelian.js"></script>
<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
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
