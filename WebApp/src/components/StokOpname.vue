<template>
  <div class="StokOpnameController">
    <div class="page-head text-center">
      <h1>Daftar StokOpname</h1>
    </div>
    <div class="table-responsive">
      <table class="table table-hover" style="margin: 0 auto">
        <thead>
          <tr>
            <th>No.</th>
            <th>Tanggal Pencatatan</th>
            <th>Nama Obat</th>
            <th>Kode Obat</th>
            <th>Kategori Obat</th>
            <th>Stok Obat</th>
            <th>Stok Opname</th>
            <th></th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td></td>
            <td><input v-on:change="ChangeFilter(FilterModel.TanggalDiBuat)" class="form-control" name="TanggalDiBuat" v-model="FilterModel.TanggalDiBuat" type="date" maxlength="30"></td>
            <td><input v-on:keyup="ChangeFilter(FilterModel.NamaObat)" class="form-control" name="NamaObat" v-model="FilterModel.NamaObat" type="text" maxlength="30"></td>
            <td><input v-on:keyup="ChangeFilter(FilterModel.KodeObat)" class="form-control" name="KodeObat" v-model="FilterModel.KodeObat" type="text" maxlength="30"></td>
            <td><input v-on:keyup="ChangeFilter(FilterModel.NamaKategori)" class="form-control" name="NamaKategori" v-model="FilterModel.NamaKategori" type="text" maxlength="30"></td>
            <td><input v-on:keyup="ChangeFilterNumber(FilterModel.StokObat)" class="form-control" name="StokObat" v-model="FilterModel.StokObat" type="text" maxlength="30"></td>
            <td><input v-on:keyup="ChangeFilterNumber(FilterModel.StokOpname)" class="form-control" name="StokOpname" v-model="FilterModel.StokOpname" type="text" maxlength="30"></td>
            <td></td>

          </tr>
          <tr v-for="(StokOpnames,index) in StokOpnames">
            <td>{{index + 1}}</td>
            <td>{{StokOpnames.TanggalDiBuat | formatDate}}</td>
            <td>{{StokOpnames.NamaObat}}</td>
            <td>{{StokOpnames.KodeObat}}</td>
            <td>{{StokOpnames.NamaKategori}}</td>
            <td>{{StokOpnames.StokObat}}</td>
            <td>{{StokOpnames.StokOpname}}</td>
            <td class="text-center">
              <a  v-on:click="EditStokOpname(StokOpnames.IdStokOpname)"  class="btn btn-outline-warning"><i class="fa fa-pencil" aria-hidden="true"></i></a>
              <a  v-on:click="ViewStokOpname(StokOpnames.IdStokOpname)" class="btn btn-outline-info"> <i class="fa fa-info" aria-hidden="true"></i></a>
            </td>
          </tr>
        </tbody>
        <tfoot>
          <tr>
            <td colspan="3">
            </td>
            <td class="text-right">
              <button class="btn btn-primary" v-on:click="AddStokOpname"> <i class="fa fa-plus" aria-hidden="true"></i> Tambah Data</button>
            </td>
          </tr>
        </tfoot>
      </table>
    </div>
    <!--Form modal-->
    <div class="modal fade" id="ModalStokOpnameForm" tabindex="-1" role="dialog" aria-labelledby="modalFormLabel" aria-hidden="true" style="margin:auto;">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalFormLabel">Stok Opname</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <div class="form-group row required">
                <label class="col-form-label col-sm-5">Obat</label>
                <div class="col-sm-6">
                  <select name="Obat" v-model="StokOpname.IdObat" class="form-control" v-on:change="GetObatLocal(StokOpname.IdObat)">
                    <option value="">Pilih Obat</option>
                      <option v-for="option in Obats" :value="option.IdObat">{{option.NamaObat}}</option>
                  </select>
                </div>
              </div>
              <div class="form-group row" v-show="StokOpname.IdObat !== ''">
                <label class="col-form-label col-sm-5">Kode Obat</label>
                <div class="col-sm-6">
                  <label class="control-label">{{Obat.KodeObat}}</label>
                </div>
              </div>
              <div class="form-group row" v-show="StokOpname.IdObat !== ''">
                <label class="col-form-label col-sm-5">Nama Obat</label>
                <div class="col-sm-6">
                  <label class="control-label">{{Obat.NamaObat}}</label>
                </div>
              </div>
              <div class="form-group row" v-show="StokOpname.IdObat !== ''">
                <label class="col-form-label col-sm-5">Kategori Obat</label>
                <div class="col-sm-6">
                  <label class="control-label">{{Obat.NamaKategori}}</label>
                </div>
              </div>
              <div class="form-group row required" v-show="StokOpname.IdObat !== ''">
                <label class="col-form-label col-sm-5">Stok Opname</label>
                <div class="col-sm-6">
                  <input class="form-control" name="StokOpname" v-model="StokOpname.StokOpname" type="text"  maxlength="30">
                </div>
              </div>
              <div class="form-group row" v-show="StokOpname.IdObat !== ''">
                <label class="col-form-label col-sm-5">Keterangan</label>
                <div class="col-sm-6">
                  <textarea class="form-control" name="keterangan" v-model="StokOpname.Keterangan" rows="4"></textarea>
                </div>
              </div>

            </form>
          </div>
          <div class="modal-footer">
            <button type="button" v-on:click="CloseModal('ModalStokOpnameForm')" class="btn btn-secondary">Tutup</button>
            <button type="button" v-on:click="SaveDataStokOpname" class="btn btn-primary">Simpan</button>
            <!--v-on:click="CloseModal" -->
          </div>
        </div>
      </div>
    </div>
    <!--end Form Modal-->
    <!--end View Modal-->
    <div class="modal fade" id="ModalStokOpnameView" tabindex="-1" role="dialog" aria-labelledby="modalFormLabel" aria-hidden="true" style="margin:auto;">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalFormLabel">Detail StokOpname {{StokOpname.NamaStokOpname}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <div class="form-group row">
                <label class="col-form-label col-sm-5">Tanggal Pencatatan</label>
                <div class="col-sm-6">
                  <label class="form-control-plaintext datatampil">{{StokOpname.TanggalDiBuat | formatDate}}</label>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-form-label col-sm-5">Nama Obat</label>
                <div class="col-sm-6">
                  <label class="form-control-plaintext datatampil">{{StokOpname.NamaObat}}</label>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-form-label col-sm-5">Kode Obat</label>
                <div class="col-sm-6">
                  <label class="form-control-plaintext datatampil">{{StokOpname.KodeObat}}</label>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-form-label col-sm-5">Kategori Obat</label>
                <div class="col-sm-6">
                  <label class="form-control-plaintext datatampil">{{StokOpname.NamaKategori}}</label>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-form-label col-sm-5">Kategori Obat</label>
                <div class="col-sm-6">
                  <label class="form-control-plaintext datatampil">{{StokOpname.NamaKategori}}</label>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-form-label col-sm-5">Stok Obat</label>
                <div class="col-sm-6">
                  <label class="form-control-plaintext datatampil">{{StokOpname.StokObat}}</label>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-form-label col-sm-5">Stok Opname</label>
                <div class="col-sm-6">
                  <label class="form-control-plaintext datatampil">{{StokOpname.StokOpname}}</label>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-form-label col-sm-5">Keterangan</label>
                <div class="col-sm-6">
                  <label class="form-control-plaintext datatampil">{{StokOpname.Keterangan}}</label>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-form-label col-sm-5">Tanggal Diubah</label>
                <div class="col-sm-6">
                  <label class="form-control-plaintext datatampil">{{StokOpname.TanggalDiUbah | formatDate}}</label>
                </div>
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" v-on:click="CloseModal('ModalStokOpnameView')" class="btn btn-secondary">Tutup</button>
            <!--v-on:click="CloseModal" -->
          </div>
        </div>
      </div>
    </div>
    <!--end View Modal -->
  </div>
</template>
<script src="../App/StokOpname.js"></script>
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
</style>
