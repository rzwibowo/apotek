<template>
  <div class="BankController">
    <div class="page-head text-center">
      <h1>Daftar Bank</h1>
    </div>
    <div class="table-responsive">
      <table class="table table-hover" style="margin: 0 auto">
        <thead>
          <tr>
            <th>No.</th>
            <th>Nama Bank</th>
            <th>Jenis Kartu</th>
            <th></th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td></td>
            <td><input v-on:keyup="ChangeFilter(FilterModel.NamaBank)" class="form-control" name="NamaBank" v-model="FilterModel.NamaBank" type="text" maxlength="30"></td>
            <td><select name="JenisKartu" v-on:change="ChangeFilterDropdown(FilterModel.JenisKartu)" class="form-control" v-model="FilterModel.JenisKartu">
                  <option value="">Pilih</option>
                  <option value="1">Kredit</option>
                  <option value="2">Debet</option>
                </select>
            </td>
            <td></td>

          </tr>
          <tr v-for="(Banks,index) in Banks">
            <td>{{index + 1}}</td>
            <td><a  v-on:click="ViewBank(Banks.IdBank)" href="#">{{Banks.NamaBank}}</a></td>
            <td>{{Banks.JenisKartu == "1"? "Credit":"Debet"}}</td>
            <td class="text-center">
              <a  v-on:click="EditBank(Banks.IdBank)"  class="btn btn-outline-warning"><i class="fa fa-pencil" aria-hidden="true"></i></a>
              <a  v-on:click="ViewBank(Banks.IdBank)" class="btn btn-outline-info"> <i class="fa fa-info" aria-hidden="true"></i></a>
            </td>
          </tr>
        </tbody>
        <tfoot>
          <tr>
            <td colspan="3">
            </td>
            <td class="text-right">
              <button class="btn btn-primary" v-on:click="AddBank"> <i class="fa fa-plus" aria-hidden="true"></i> Tambah Data</button>
            </td>
          </tr>
        </tfoot>
      </table>
    </div>
    <!--Form modal-->
    <div class="modal fade" id="ModalBankForm" tabindex="-1" role="dialog" aria-labelledby="modalFormLabel" aria-hidden="true" style="margin:auto;">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalFormLabel">Edit Bank {{Bank.NamaBank}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <div class="form-group row required">
                <label class="col-form-label col-sm-5">Nama Bank</label>
                <div class="col-sm-6">
                  <input class="form-control" name="Bank" v-model="Bank.NamaBank" type="text"  maxlength="30">
                </div>
              </div>
              <div class="form-group row required">
                <label class="col-form-label col-sm-5">Jenis Kartu</label>
                <div class="col-sm-6">
                <select name="JenisKartu"  v-model="Bank.JenisKartu" class="form-control">
                    <option value="">Pilih</option>
                    <option value="1">Kredit</option>
                    <option value="2">Debet</option>
                </select>
                </div>
              </div>

            </form>
          </div>
          <div class="modal-footer">
            <button type="button" v-on:click="CloseModal('ModalBankForm')" class="btn btn-secondary">Tutup</button>
            <button type="button" v-on:click="SaveDataBank" class="btn btn-primary">Simpan</button>
            <!--v-on:click="CloseModal" -->
          </div>
        </div>
      </div>
    </div>
    <!--end Form Modal-->
    <!--end View Modal-->
    <div class="modal fade" id="ModalBankView" tabindex="-1" role="dialog" aria-labelledby="modalFormLabel" aria-hidden="true" style="margin:auto;">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalFormLabel">Detail Bank {{Bank.NamaBank}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <div class="form-group row">
                <label class="col-form-label col-sm-5">Nama Bank</label>
                <div class="col-sm-6">
                  <input readonly class="form-control-plaintext datatampil" :value="Bank.NamaBank">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-form-label col-sm-5">Jenis Kartu</label>
                <div class="col-sm-6">
                  <label class="form-control-plaintext datatampil">{{Bank.JenisKartu == "1"? "Kredit":"Debet"}}</label>
                </div>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" v-on:click="CloseModal('ModalBankView')" class="btn btn-secondary">Tutup</button>
            <!--v-on:click="CloseModal" -->
          </div>
        </div>
      </div>
    </div>
    <!--end View Modal -->
  </div>
</template>
<script src="../App/Bank.js"></script>
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
