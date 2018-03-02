<template>
  <div class="SatuanController">
    <div class="page-head text-center">
      <h1>Daftar Satuan</h1>
    </div>
    <div class="table-responsive">
      <table class="table table-hover" style="margin: 0 auto">
        <thead>
          <tr>
            <th>No.</th>
            <th>Nama Satuan</th>
            <th></th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td></td>
            <td><input v-on:keyup="ChangeFilter(FilterModel.NamaSatuan)" class="form-control" name="NamaSatuan" v-model="FilterModel.NamaSatuan" type="text" maxlength="30"></td>
            <td></td>

          </tr>
          <tr v-for="(Satuans,index) in Satuans">
            <td>{{index + 1}}</td>
            <td><a  v-on:click="ViewSatuan(Satuans.IdSatuan)" href="#">{{Satuans.NamaSatuan}}</a></td>
            <td class="text-center">
              <a  v-on:click="EditSatuan(Satuans.IdSatuan)"  class="btn btn-outline-warning"><i class="fa fa-pencil" aria-hidden="true"></i></a>
              <a  v-on:click="ViewSatuan(Satuans.IdSatuan)" class="btn btn-outline-info"> <i class="fa fa-info" aria-hidden="true"></i></a>
            </td>
          </tr>
        </tbody>
        <tfoot>
          <tr>
            <td colspan="3">
            </td>
            <td class="text-right">
              <button class="btn btn-primary" v-on:click="AddSatuan"> <i class="fa fa-plus" aria-hidden="true"></i> Tambah Data</button>
            </td>
          </tr>
        </tfoot>
      </table>
    </div>
    <!--Form modal-->
    <div class="modal fade" id="ModalSatuanForm" tabindex="-1" role="dialog" aria-labelledby="modalFormLabel" aria-hidden="true" style="margin:auto;">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalFormLabel" v-show="Satuan.IdSatuan ==null ||Satuan.IdSatuan =='' ">Add Satuan</h5>
            <h5 class="modal-title" id="modalFormLabel" v-show="Satuan.IdSatuan ==!null ||Satuan.IdSatuan ==!'' ">Edit Satuan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <div class="form-group row required">
                <label class="col-form-label col-sm-5">Nama Satuan</label>
                <div class="col-sm-6">
                  <input class="form-control" name="Satuan" v-model="Satuan.NamaSatuan" type="text"  maxlength="30">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-form-label col-sm-5">Nama Satuan</label>
                <div class="col-sm-6">
                  <textarea class="form-control" name="Keterangan" v-model="Satuan.Keterangan" rows="4"></textarea>
                </div>
              </div>

            </form>
          </div>
          <div class="modal-footer">
            <button type="button" v-on:click="CloseModal('ModalSatuanForm')" class="btn btn-secondary">Tutup</button>
            <button type="button" v-on:click="SaveDataSatuan" class="btn btn-primary">Simpan</button>
            <!--v-on:click="CloseModal" -->
          </div>
        </div>
      </div>
    </div>
    <!--end Form Modal-->
    <!--end View Modal-->
    <div class="modal fade" id="ModalSatuanView" tabindex="-1" role="dialog" aria-labelledby="modalFormLabel" aria-hidden="true" style="margin:auto;">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalFormLabel">Detail Satuan {{Satuan.NamaSatuan}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <div class="form-group row">
                <label class="col-form-label col-sm-5">Nama Satuan</label>
                <div class="col-sm-6">
                  <input readonly class="form-control-plaintext datatampil" :value="Satuan.NamaSatuan">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-form-label col-sm-5">Tanggal Dibuat</label>
                <div class="col-sm-6">
                  <label class="form-control-plaintext datatampil">{{Satuan.TanggalDiBuat | formatDate}}</label>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-form-label col-sm-5">Tanggal Diubah</label>
                <div class="col-sm-6">
                  <label class="form-control-plaintext datatampil">{{Satuan.TanggalDiUbah | formatDate}}</label>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-form-label col-sm-5">Keterangan</label>
                <div class="col-sm-6">
                  <label class="form-control-plaintext datatampil">{{Satuan.Keterangan}}</label>
                </div>
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" v-on:click="CloseModal('ModalSatuanView')" class="btn btn-secondary">Tutup</button>
            <!--v-on:click="CloseModal" -->
          </div>
        </div>
      </div>
    </div>
    <!--end View Modal -->
  </div>
</template>
<script src="../App/Satuan.js"></script>
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
