<template>
  <div class="KotaController">
    <div class="page-head text-center">
      <h1>Daftar Kota</h1>
    </div>
    <div class="table-responsive">
      <table class="table table-hover" style="margin: 0 auto">
        <thead>
          <tr>
            <th>No.</th>
            <th>Nama Kota</th>
            <th></th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td></td>
            <td><input v-on:keyup="ChangeFilter(FilterModel.NamaKota)" class="form-control" name="NamaKota" v-model="FilterModel.NamaKota" type="text" maxlength="30"></td>
            <td></td>

          </tr>
          <tr v-for="(Kotas,index) in Kotas">
            <td>{{index + 1}}</td>
            <td><a  v-on:click="ViewKota(Kotas.IdKota)" href="#">{{Kotas.NamaKota}}</a></td>
            <td class="text-center">
              <a  v-on:click="EditKota(Kotas.IdKota)"  class="btn btn-outline-warning"><i class="fa fa-pencil" aria-hidden="true"></i></a>
              <a  v-on:click="ViewKota(Kotas.IdKota)" class="btn btn-outline-info"> <i class="fa fa-info" aria-hidden="true"></i></a>
            </td>
          </tr>
        </tbody>
        <tfoot>
          <tr>
            <td colspan="3">
            </td>
            <td class="text-right">
              <button class="btn btn-primary" v-on:click="AddKota"> <i class="fa fa-plus" aria-hidden="true"></i> Tambah Data</button>
            </td>
          </tr>
        </tfoot>
      </table>
    </div>
    <!--Form modal-->
    <div class="modal fade" id="ModalKotaForm" tabindex="-1" role="dialog" aria-labelledby="modalFormLabel" aria-hidden="true" style="margin:auto;">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalFormLabel">Edit Kota {{Kota.NamaKota}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <div class="form-group row">
                <label class="col-form-label col-sm-5">Nama Kota</label>
                <div class="col-sm-6">
                  <input class="form-control" name="Kota" v-model="Kota.NamaKota" type="text"  maxlength="30">
                </div>
              </div>

            </form>
          </div>
          <div class="modal-footer">
            <button type="button" v-on:click="CloseModal('ModalKotaForm')" class="btn btn-secondary">Tutup</button>
            <button type="button" v-on:click="SaveDataKota" class="btn btn-primary">Simpan</button>
            <!--v-on:click="CloseModal" -->
          </div>
        </div>
      </div>
    </div>
    <!--end Form Modal-->
    <!--end View Modal-->
    <div class="modal fade" id="ModalKotaView" tabindex="-1" role="dialog" aria-labelledby="modalFormLabel" aria-hidden="true" style="margin:auto;">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalFormLabel">Detail Kota {{Kota.NamaKota}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <div class="form-group row">
                <label class="col-form-label col-sm-5">Kode Kota</label>
                <div class="col-sm-6">
                  <input readonly class="form-control-plaintext datatampil" :value="Kota.KodeKota">
                </div>
              </div>

              <div class="form-group row">
                <label class="col-form-label col-sm-5">Nama Kota</label>
                <div class="col-sm-6">
                  <input readonly class="form-control-plaintext datatampil" :value="Kota.NamaKota">
                </div>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" v-on:click="CloseModal('ModalKotaView')" class="btn btn-secondary">Tutup</button>
            <!--v-on:click="CloseModal" -->
          </div>
        </div>
      </div>
    </div>
    <!--end View Modal -->
  </div>
</template>
<script src="../App/Kota.js"></script>
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
