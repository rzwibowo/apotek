<template>
  <div class="PajakController">
    <div class="page-head text-center">
      <h1>Daftar Pajak</h1>
    </div>
    <div class="table-responsive">
      <table class="table table-hover" style="margin: 0 auto">
        <thead>
          <tr>
            <th>No.</th>
            <th>Nama Pajak</th>
            <th>Besar Pajak</th>
            <th>Status</th>
            <th></th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td></td>
            <td><input v-on:keyup="ChangeFilter(FilterModel.NamaPajak)" class="form-control" name="NamaPajak" v-model="FilterModel.NamaPajak" type="text" maxlength="30"></td>
            <td><input v-on:keyup="ChangeFilterDropdown(FilterModel.BesarPajak)" class="form-control" name="BesarPajak" v-model="FilterModel.BesarPajak" type="text" maxlength="30"></td>
            <td><select name="Status" v-on:change="ChangeFilterDropdown(FilterModel.Status)" class="form-control" v-model="FilterModel.Status">
                  <option value="">Pilih</option>
                  <option value="1">Aktif</option>
                  <option value="0">Non Aktif</option>
                </select>
            </td>
            <td></td>

          </tr>
          <tr v-for="(Pajaks,index) in Pajaks">
            <td>{{index + 1}}</td>
            <td><a  v-on:click="ViewPajak(Pajaks.IdPajak)" href="#">{{Pajaks.NamaPajak}}</a></td>
            <td>{{Pajaks.BesarPajak}} %</td>
            <td>{{Pajaks.Status == "1"? "Aktif":"Non Aktif"}}</td>
            <td class="text-center">
              <a  v-on:click="EditPajak(Pajaks.IdPajak)"  class="btn btn-outline-warning"><i class="fa fa-pencil" aria-hidden="true"></i></a>
              <a  v-on:click="ViewPajak(Pajaks.IdPajak)" class="btn btn-outline-info"> <i class="fa fa-info" aria-hidden="true"></i></a>
            </td>
          </tr>
        </tbody>
        <tfoot>
          <tr>
            <td colspan="3">
            </td>
            <td class="text-right">
              <button class="btn btn-primary" v-on:click="AddPajak"> <i class="fa fa-plus" aria-hidden="true"></i> Tambah Data</button>
            </td>
          </tr>
        </tfoot>
      </table>
    </div>
    <!--Form modal-->
    <div class="modal fade" id="ModalPajakForm" tabindex="-1" role="dialog" aria-labelledby="modalFormLabel" aria-hidden="true" style="margin:auto;">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalFormLabel">Edit Pajak {{Pajak.NamaPajak}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <div class="form-group row required">
                <label class="col-form-label col-sm-5">Pajak</label>
                <div class="col-sm-6">
                  <input class="form-control" name="NamaPajak" v-model="Pajak.NamaPajak" type="text"  maxlength="30">
                </div>
              </div>
              <div class="form-group row required">
                <label class="col-form-label col-sm-5">Besar Pajak (%)</label>
                <div class="col-sm-6">
                  <input class="form-control" name="Besarpajak" v-model="Pajak.BesarPajak" type="number"  maxlength="30">
                </div>
              </div>
              <div class="form-group row required">
                <label class="col-form-label col-sm-5">Status</label>
                <div class="col-sm-6">
                  <div class="form-check form-check-inline">
                    <label class="form-check-label">
                      <input class="form-check-input" type="radio" name="Status" v-model="Pajak.Status" value="1"  > Aktif
                    </label>
                  </div>
                  <div class="form-check form-check-inline">
                    <label class="form-check-label">
                      <input class="form-check-input" type="radio" name="Status" v-model="Pajak.Status" value="0" > Non Aktif
                    </label>
                  </div>
                </div>
              </div>
              <div class="form-group row required">
                <label class="col-form-label col-sm-5">Keterangan</label>
                <div class="col-sm-6">
                  <textarea class="form-control" name="Keterangan" v-model="Pajak.Keterangan" rows="4"></textarea>
                </div>
              </div>

            </form>
          </div>
          <div class="modal-footer">
            <button type="button" v-on:click="CloseModal('ModalPajakForm')" class="btn btn-secondary">Tutup</button>
            <button type="button" v-on:click="SaveDataPajak" class="btn btn-primary">Simpan</button>
            <!--v-on:click="CloseModal" -->
          </div>
        </div>
      </div>
    </div>
    <!--end Form Modal-->
    <!--end View Modal-->
    <div class="modal fade" id="ModalPajakView" tabindex="-1" role="dialog" aria-labelledby="modalFormLabel" aria-hidden="true" style="margin:auto;">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalFormLabel">Detail Pajak {{Pajak.NamaPajak}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <div class="form-group row">
                <label class="col-form-label col-sm-5">Nama Pajak</label>
                <div class="col-sm-6">
                  <input readonly class="form-control-plaintext datatampil" :value="Pajak.NamaPajak">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-form-label col-sm-5">BesarPajak</label>
                <div class="col-sm-6">
                  <label class="form-control-plaintext datatampil">{{Pajak.BesarPajak}} %</label>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-form-label col-sm-5">Status</label>
                <div class="col-sm-6">
                  <label class="form-control-plaintext datatampil">{{Pajak.Status == "1"? "Aktif":"Non Aktif"}}</label>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-form-label col-sm-5">Keterangan</label>
                <div class="col-sm-6">
                  <label class="form-control-plaintext datatampil">{{Pajak.Keterangan}}</label>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-form-label col-sm-5">Tanggal Dibuat</label>
                <div class="col-sm-6">
                  <label class="form-control-plaintext datatampil">{{Pajak.TanggalDiBuat | formatDate}}</label>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-form-label col-sm-5">Tanggal Diubah</label>
                <div class="col-sm-6">
                  <label class="form-control-plaintext datatampil">{{Pajak.TanggalDiUbah | formatDate}}</label>
                </div>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" v-on:click="CloseModal('ModalPajakView')" class="btn btn-secondary">Tutup</button>
            <!--v-on:click="CloseModal" -->
          </div>
        </div>
      </div>
    </div>
    <!--end View Modal -->
  </div>
</template>
<script src="../App/Pajak.js"></script>
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
