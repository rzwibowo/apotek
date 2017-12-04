<template>
  <div class="GolonganController">
    <div class="page-head text-center">
      <h1>Daftar Golongan</h1>
    </div>
    <div class="table-responsive">
      <table class="table table-hover" style="margin: 0 auto">
        <thead>
          <tr>
            <th>No.</th>
            <th>Kode Golongan</th>
            <th>Nama Golongan</th>
            <th></th>
          </tr>
        </thead>

        <tbody>
          <tr v-for="(Golongans,index) in Golongans">
            <td>{{index + 1}}</td>
            <td>{{Golongans.KodeGolongan}}</td>
            <td><a  v-on:click="ViewGolongan(Golongans.IdGolongan)" href="#">{{Golongans.Golongan}}</a></td>
            <td class="text-center">
              <a  v-on:click="EditGolongan(Golongans.IdGolongan)"  class="btn btn-outline-warning"><i class="fa fa-pencil" aria-hidden="true"></i></a>
              <a  v-on:click="ViewGolongan(Golongans.IdGolongan)" class="btn btn-outline-info"> <i class="fa fa-info" aria-hidden="true"></i></a>
            </td>
          </tr>
        </tbody>
        <tfoot>
          <tr>
            <td colspan="3">
            </td>
            <td class="text-right">
              <button class="btn btn-primary" v-on:click="AddGolongan"> <i class="fa fa-plus" aria-hidden="true"></i> Tambah Data</button>
            </td>
          </tr>
        </tfoot>
      </table>
    </div>
    <!--Form modal-->
    <div class="modal fade" id="ModalGolonganForm" tabindex="-1" role="dialog" aria-labelledby="modalFormLabel" aria-hidden="true" style="margin:auto;">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalFormLabel">Edit Golongan {{Golongan.Golongan}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <div class="form-group row">
                <label class="col-form-label col-sm-5">Kode Golongan</label>
                <div class="col-sm-6">
                  <input class="form-control" name="kode_Golongan" v-model="Golongan.KodeGolongan" type="text"  maxlength="30">
                </div>
              </div>

              <div class="form-group row">
                <label class="col-form-label col-sm-5">Golongan</label>
                <div class="col-sm-6">
                  <input class="form-control" name="Golongan" v-model="Golongan.Golongan" type="text" placeholder="Ketik Nama Golongan" maxlength="30">
                </div>
              </div>

            </form>
          </div>
          <div class="modal-footer">
            <button type="button" v-on:click="CloseModal('ModalGolonganForm')" class="btn btn-secondary">Tutup</button>
            <button type="button" v-on:click="SaveDataGolongan" class="btn btn-primary">Simpan</button>
            <!--v-on:click="CloseModal" -->
          </div>
        </div>
      </div>
    </div>
    <!--end Form Modal-->
    <!--end View Modal-->
    <div class="modal fade" id="ModalGolonganView" tabindex="-1" role="dialog" aria-labelledby="modalFormLabel" aria-hidden="true" style="margin:auto;">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalFormLabel">Detail Golongan {{Golongan.Golongan}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <div class="form-group row">
                <label class="col-form-label col-sm-5">Kode Golongan</label>
                <div class="col-sm-6">
                  <input readonly class="form-control-plaintext datatampil" :value="Golongan.KodeGolongan">
                </div>
              </div>

              <div class="form-group row">
                <label class="col-form-label col-sm-5">Nama Golongan</label>
                <div class="col-sm-6">
                  <input readonly class="form-control-plaintext datatampil" :value="Golongan.Golongan">
                </div>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" v-on:click="CloseModal('ModalGolonganView')" class="btn btn-secondary">Tutup</button>
            <!--v-on:click="CloseModal" -->
          </div>
        </div>
      </div>
    </div>
    <!--end View Modal -->
  </div>
</template>
<script src="../App/Golongan.js"></script>
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
