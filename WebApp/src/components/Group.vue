<template>
  <div class="GroupController">
    <div class="page-head text-center">
      <h1>Daftar Group</h1>
    </div>
    <div class="table-responsive">
      <table class="table table-hover" style="margin: 0 auto">
        <thead>
          <tr>
            <th>No.</th>
            <th>Nama Group</th>
            <th></th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td></td>
            <td><input v-on:keyup="ChangeFilter(FilterModel.NamaGroup)" class="form-control" name="NamaGroup" v-model="FilterModel.NamaGroup" type="text" maxlength="30"></td>
            <td></td>

          </tr>
          <tr v-for="(Groups,index) in Groups">
            <td>{{index + 1}}</td>
            <td><a  v-on:click="ViewGroup(Groups.IdGroup)" href="#">{{Groups.NamaGroup}}</a></td>
            <td class="text-center">
              <a  v-on:click="EditGroup(Groups.IdGroup)"  class="btn btn-outline-warning"><i class="fa fa-pencil" aria-hidden="true"></i></a>
              <a  v-on:click="ViewGroup(Groups.IdGroup)" class="btn btn-outline-info"> <i class="fa fa-info" aria-hidden="true"></i></a>
            </td>
          </tr>
        </tbody>
        <tfoot>
          <tr>
            <td colspan="3">
            </td>
            <td class="text-right">
              <button class="btn btn-primary" v-on:click="AddGroup"> <i class="fa fa-plus" aria-hidden="true"></i> Tambah Data</button>
            </td>
          </tr>
        </tfoot>
      </table>
    </div>
    <!--Form modal-->
    <div class="modal fade" id="ModalGroupForm" tabindex="-1" role="dialog" aria-labelledby="modalFormLabel" aria-hidden="true" style="margin:auto;">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalFormLabel">Edit Group {{Group.NamaGroup}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <div class="form-group row required">
                <label class="col-form-label col-sm-5">Nama Group</label>
                <div class="col-sm-6">
                  <input class="form-control" name="NamaGroup" v-model="Group.NamaGroup" type="text"  maxlength="30">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-form-label col-sm-5">Keterangan</label>
                <div class="col-sm-6">
                  <textarea class="form-control" name="Keterangan" v-model="Group.Keterangan" rows="4"> </textarea>
                </div>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" v-on:click="CloseModal('ModalGroupForm')" class="btn btn-secondary">Tutup</button>
            <button type="button" v-on:click="SaveDataGroup" class="btn btn-primary">Simpan</button>
            <!--v-on:click="CloseModal" -->
          </div>
        </div>
      </div>
    </div>
    <!--end Form Modal-->
    <!--end View Modal-->
    <div class="modal fade" id="ModalGroupView" tabindex="-1" role="dialog" aria-labelledby="modalFormLabel" aria-hidden="true" style="margin:auto;">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalFormLabel">Detail Group {{Group.NamaGroup}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <div class="form-group row">
                <label class="col-form-label col-sm-5">Nama Group</label>
                <div class="col-sm-6">
                  <label class="form-control-plaintext datatampil">{{Group.NamaGroup}}</label>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-form-label col-sm-5">Keterangan</label>
                <div class="col-sm-6">
                  <label class="form-control-plaintext datatampil">{{Group.Keterangan}}</label>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-form-label col-sm-5">Tanggal Dibuat</label>
                <div class="col-sm-6">
                  <label class="form-control-plaintext datatampil">{{Group.TanggalDiBuat | formatDate}}</label>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-form-label col-sm-5">Tanggal Diubah</label>
                <div class="col-sm-6">
                  <label class="form-control-plaintext datatampil">{{Group.TanggalDiUbah | formatDate}}</label>
                </div>
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" v-on:click="CloseModal('ModalGroupView')" class="btn btn-secondary">Tutup</button>
            <!--v-on:click="CloseModal" -->
          </div>
        </div>
      </div>
    </div>
    <!--end View Modal -->
  </div>
</template>
<script src="../App/Group.js"></script>
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
