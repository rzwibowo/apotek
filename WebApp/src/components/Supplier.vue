<template>
  <div class="SupplierController">
    <div class="page-head text-center">
      <h1>Daftar Supplier</h1>
    </div>
    <div class="table-responsive">
      <table class="table table-hover" style="margin: 0 auto;">
        <thead>
          <tr>
            <th>No.</th>
            <th>Nama Supplier</th>
            <th>Email</th>
            <th>Nomor Telepon</th>
            <th>Nomor Hp</th>
            <th>Status</th>
            <th style="width: 35em">Alamat</th>
            <th></th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td></td>
            <td><input v-on:keyup="ChangeFilter(FilterModel.NamaSupplier)" class="form-control" name="NamaSupplier" v-model="FilterModel.NamaSupplier" type="text" maxlength="30"></td>
            <td><input v-on:keyup="ChangeFilter(FilterModel.Email)" class="form-control" name="Email" v-model="FilterModel.Email" type="text" maxlength="30"></td>
            <td><input v-on:keyup="ChangeFilter(FilterModel.NomorTelepon)" class="form-control" name="NomorTelepon" v-model="FilterModel.NomorTelepon" type="text" maxlength="30"></td>
            <td><input v-on:keyup="ChangeFilter(FilterModel.NoHp)" class="form-control" name="NoHp" v-model="FilterModel.NoHp" type="text" maxlength="30"></td>
            <td><input v-on:keyup="ChangeFilter(FilterModel.Status)" class="form-control" name="Status" v-model="FilterModel.Status" type="text" maxlength="30"></td>
            <td><input v-on:keyup="ChangeFilter(FilterModel.Alamat)" class="form-control" name="Alamat" v-model="FilterModel.Alamat" type="text" maxlength="30"></td>
            <td></td>
          </tr>
          <tr v-for="(suppliers,index) in Suppliers">
            <td>{{index + 1}}</td>
            <td><a  v-on:click="ViewSupplier(suppliers.IdSupplier)" href="#" >{{suppliers.NamaSupplier}}</a>
            <td>{{suppliers.Email}}</a>
            <td>{{suppliers.NomorTelepon}}</td>
            <td>{{suppliers.NoHp}}</td>
            <td>{{suppliers.Status ==1? "Aktif":"Non Aktif" }}</td>
            <td>{{suppliers.Alamat}}</td>
            <td class="text-center">
              <a  v-on:click="EditSupplier(suppliers.IdSupplier)"  class="btn btn-outline-warning"><i class="fa fa-pencil" aria-hidden="true"></i></a>
              <a  v-on:click="ViewSupplier(suppliers.IdSupplier)" class="btn btn-outline-info"> <i class="fa fa-info" aria-hidden="true"></i></a>
            </td>
          </tr>
        </tbody>
        <tfoot>
          <tr>
            <td colspan="5">
            </td>
            <td class="text-right">
              <button class="btn btn-primary" v-on:click="AddSupplier"> <i class="fa fa-plus" aria-hidden="true"></i> Tambah Data</button>
            </td>
          </tr>
        </tfoot>
      </table>
    </div>
    <!--Form modal-->
    <div class="modal fade" id="ModalSupplierForm" tabindex="-1" role="dialog" aria-labelledby="modalFormLabel" aria-hidden="true" style="margin:auto;">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalFormLabel">Edit Supplier {{Supplier.NamaSupplier}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <div class="form-group row required">
                <label class="col-form-label col-sm-5">Nama Supplier</label>
                <div class="col-sm-6">
                  <input class="form-control" name="NamaSupplier" v-model="Supplier.NamaSupplier" type="text"  maxlength="30">
                </div>
              </div>
              <div class="form-group row required">
                <label class="col-form-label col-sm-5">Nomor Telepon</label>
                <div class="col-sm-6">
                  <input class="form-control" name="NomerTelepon" v-model="Supplier.NomorTelepon" type="text" maxlength="30">
                </div>
              </div>

              <div class="form-group row required">
                <label class="col-form-label col-sm-5">Status</label>
                <div class="col-sm-6">
                  <div class="form-check form-check-inline">
                    <label class="form-check-label">
                      <input class="form-check-input" type="radio" name="Status" v-model="Supplier.Status" value="1" > Aktif
                    </label>
                  </div>
                  <div class="form-check form-check-inline">
                    <label class="form-check-label">
                      <input class="form-check-input" type="radio" name="Status" v-model="Supplier.Status" value="0" > Non Aktif
                    </label>
                  </div>
                </div>
              </div>
              <div class="form-group row required">
                <label class="col-form-label col-sm-5">Nomor Hp</label>
                <div class="col-sm-6">
                  <input class="form-control" name="NomorHp" v-model="Supplier.NoHp" type="text" maxlength="30">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-form-label col-sm-5">Contact Person</label>
                <div class="col-sm-6">
                  <input class="form-control" name="ContactPerson" v-model="Supplier.ContactPerson" type="text" maxlength="30">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-form-label col-sm-5">Email</label>
                <div class="col-sm-6">
                  <input class="form-control" name="Email" v-model="Supplier.Email" type="text" maxlength="30">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-form-label col-sm-5">Bank</label>
                <div class="col-sm-6">
                    <select name="IdBank" v-model="Supplier.IdBank" class="form-control">
                      <option value=''>Pilih</option>
                      <option v-for="option in Bank" :value="option.IdBank">{{option.NamaBank}}</option>
                    </select>
                </div>
              </div>
              <div class="form-group row required">
                <label class="col-form-label col-sm-5">Kota</label>
                <div class="col-sm-6">
                    <select name="IdKota" v-model="Supplier.IdKota" class="form-control">
                      <option value=''>Pilih</option>
                      <option v-for="option in Kota" :value="option.IdKota">{{option.NamaKota}}</option>
                    </select>
                </div>
              </div>
              <div class="form-group row required">
                <label class="col-form-label col-sm-5">Alamat</label>
                <div class="col-sm-6">
                  <textarea class="form-control" rows="5" id="Alamat" v-model="Supplier.Alamat" ></textarea>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-form-label col-sm-5">Website</label>
                <div class="col-sm-6">
                  <input class="form-control" name="Website" v-model="Supplier.Website" type="text" maxlength="30">
                </div>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" v-on:click="CloseModal('ModalSupplierForm')" class="btn btn-secondary">Tutup</button>
            <button type="button" v-on:click="SaveDataSupplier" class="btn btn-primary">Simpan</button>
            <!--v-on:click="CloseModal" -->
          </div>
        </div>
      </div>
    </div>
    <!--end Form Modal-->
    <!--end View Modal-->
    <div class="modal fade" id="ModalSupplierView" tabindex="-1" role="dialog" aria-labelledby="modalFormLabel" aria-hidden="true" style="margin:auto;">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalFormLabel">Detail Supplier {{Supplier.NamaSupplier}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <div class="form-group row">
                <label class="col-form-label col-sm-5">Nama Supplier</label>
                <div class="col-sm-6">
                  <input readonly class="form-control-plaintext datatampil" :value="Supplier.NamaSupplier">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-form-label col-sm-5">Nomor Telepon</label>
                <div class="col-sm-6">
                  <input readonly class="form-control-plaintext datatampil" :value="Supplier.NomorTelepon">
                </div>
              </div>

              <div class="form-group row">
                <label class="col-form-label col-sm-5">Status Supplier</label>
                <div class="col-sm-6">
                  <input readonly class="form-control-plaintext datatampil" :value="Supplier.Status ==1?'Aktif':'Non Aktif'">
                </div>
              </div>

              <div class="form-group row">
                <label class="col-form-label col-sm-5">Alamat</label>
                <div class="col-sm-6">
                  <p class="datatampil">{{Supplier.Alamat}}</p>
                </div>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" v-on:click="CloseModal('ModalSupplierView')" class="btn btn-secondary">Tutup</button>
            <!--v-on:click="CloseModal" -->
          </div>
        </div>
      </div>
    </div>
    <!--end View Modal -->
  </div>
</template>
<script src="../App/Supplier.js"></script>
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
