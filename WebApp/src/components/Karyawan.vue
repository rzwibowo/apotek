<template>
  <div class="KaryawanController">
    <div class="page-head text-center">
      <h1>Daftar Karyawan</h1>
    </div>
    <div class="table-responsive">
      <table class="table table-hover" style="margin: 0 auto">
        <thead>
          <tr>
            <th>No.</th>
            <th>Nama Karyawan</th>
            <th>No Telepon</th>
            <th>Group</th>
            <th></th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td></td>
            <td><input v-on:keyup="ChangeFilter(FilterModel.NamaKaryawan)" class="form-control" name="NamaKaryawan" v-model="FilterModel.NamaKaryawan" type="text" maxlength="30"></td>
            <td><input v-on:keyup="ChangeFilter(FilterModel.NamaGroup)" class="form-control" name="NamaGroup" v-model="FilterModel.NamaGroup" type="text" maxlength="30"></td>
            <td><input v-on:keyup="ChangeFilter(FilterModel.NoTelepon)" class="form-control" name="NoTelepon" v-model="FilterModel.NoTelepon" type="text" maxlength="30"></td>
          </tr>
          <tr v-for="(Karyawans,index) in Karyawans">
            <td>{{index + 1}}</td>
            <td><a  v-on:click="ViewKaryawan(Karyawans.IdKaryawan)" href="#">{{Karyawans.NamaLengkap}}</a></td>
            <td>{{Karyawans.NamaGroup}}</td>
            <td>{{Karyawans.NoTelepon}}</td>
            <td class="text-center">
              <a  v-on:click="EditKaryawan(Karyawans.IdKaryawan)"  class="btn btn-outline-warning"><i class="fa fa-pencil" aria-hidden="true"></i></a>
              <a  v-on:click="ViewKaryawan(Karyawans.IdKaryawan)" class="btn btn-outline-info"> <i class="fa fa-info" aria-hidden="true"></i></a>
            </td>
          </tr>
        </tbody>
        <tfoot>
          <tr>
            <td colspan="3">
            </td>
            <td class="text-right">
              <button class="btn btn-primary" v-on:click="AddKaryawan"> <i class="fa fa-plus" aria-hidden="true"></i> Tambah Data</button>
            </td>
          </tr>
        </tfoot>
      </table>
    </div>
    <!--Form modal-->
    <div class="modal fade" id="ModalKaryawanForm" tabindex="-1" role="dialog" aria-labelledby="modalFormLabel" aria-hidden="true" style="margin:auto;">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalFormLabel">Edit Karyawan {{Karyawan.NamaKaryawan}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <div class="form-group row required">
                <label class="col-form-label col-sm-5">Nama Lengkap</label>
                <div class="col-sm-6">
                  <input class="form-control" name="NamaLengkap" v-model="Karyawan.NamaLengkap" type="text"  maxlength="30">
                </div>
              </div>
              <div class="form-group row required">
                <label class="col-form-label col-sm-5">UserName</label>
                <div class="col-sm-6">
                  <input class="form-control" name="UserName" v-model="Karyawan.NamaLengkap" type="text"  maxlength="30" disabled="true">
                </div>
              </div>
              <div class="form-group row required">
                <label class="col-form-label col-sm-5">Group</label>
                <div class="col-sm-6">
                <select name="IdGroup" v-model="Karyawan.IdGroup" class="form-control">
                  <option value="">Pilih</option>
                    <option v-for="option in Groups" :value="option.IdGroup">{{option.NamaGroup}}</option>
                </select>
                </div>
              </div>
              <div class="form-group row required">
                <label class="col-form-label col-sm-5">Karyawan Apoteker</label>
                <div class="col-sm-6">
                  <div class="form-check form-check-inline">
                    <label class="form-check-label">
                      <input class="form-check-input" type="radio" v-model="Karyawan.IsApoteker"  value="1"> Ya
                    </label>
                  </div>
                  <div class="form-check form-check-inline">
                    <label class="form-check-label">
                      <input class="form-check-input" type="radio" v-model="Karyawan.IsApoteker" value="0" > Tidak
                    </label>
                  </div>
                </div>
              </div>
              <div class="form-group row required" v-show="Karyawan.IsApoteker == 1">
                <label class="col-form-label col-sm-5">No.Registrasi Apoteker</label>
                <div class="col-sm-6">
                  <input class="form-control" name="NoRegistrasiApoteker" v-model="Karyawan.NoRegistrasiApoteker" type="text"  maxlength="30">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-form-label col-sm-5">Tanggal Lahir</label>
                <div class="col-sm-6">
                  <input class="form-control" name="TanggalLahir" v-model="Karyawan.TanggalLahir" type="date"  maxlength="30">
                </div>
              </div>
              <div class="form-group row required">
                <label class="col-form-label col-sm-5">Jenis Kelamin</label>
                <div class="col-sm-7">
                  <div class="form-check form-check-inline">
                    <label class="form-check-label">
                      <input class="form-check-input" type="radio" v-model="Karyawan.JenisKelamin"  value="0"> Laki - Laki
                    </label>
                  </div>
                  <div class="form-check form-check-inline">
                    <label class="form-check-label">
                      <input class="form-check-input" type="radio" v-model="Karyawan.JenisKelamin" value="1" > Perempuan
                    </label>
                  </div>
                </div>
              </div>
              <div class="form-group row required">
                <label class="col-form-label col-sm-5">No Telepon</label>
                <div class="col-sm-6">
                  <input class="form-control" name="NoTelepon" v-model="Karyawan.NoTelepon" type="text"  maxlength="30">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-form-label col-sm-5">No Telepon Darurat</label>
                <div class="col-sm-6">
                  <input class="form-control" name="NoTeleponDarurat" v-model="Karyawan.NoTeleponDarurat" type="text"  maxlength="30">
                </div>
              </div>
              <div class="form-group row required">
                <label class="col-form-label col-sm-5">Alamat</label>
                <div class="col-sm-6">
                  <textarea class="form-control" name="Alamat" v-model="Karyawan.Alamat" rows="4"></textarea>
                </div>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" v-on:click="CloseModal('ModalKaryawanForm')" class="btn btn-secondary">Tutup</button>
            <button type="button" v-on:click="SaveDataKaryawan" class="btn btn-primary">Simpan</button>
            <!--v-on:click="CloseModal" -->
          </div>
        </div>
      </div>
    </div>
    <!--end Form Modal-->
    <!--end View Modal-->
    <div class="modal fade" id="ModalKaryawanView" tabindex="-1" role="dialog" aria-labelledby="modalFormLabel" aria-hidden="true" style="margin:auto;">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalFormLabel">Detail Karyawan {{Karyawan.NamaKaryawan}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <div class="form-group row">
                <label class="col-form-label col-sm-5">Nama Karyawan</label>
                <div class="col-sm-6">
                  <label class="form-control-plaintext datatampil">{{Karyawan.NamaLengkap}}</label>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-form-label col-sm-5">Tanggal Lahir</label>
                <div class="col-sm-6">
                  <label class="form-control-plaintext datatampil" v-show="Karyawan.TanggalLahir == null"> - - </label>
                  <label class="form-control-plaintext datatampil" v-show="Karyawan.TanggalLahir != null">{{Karyawan.TanggalLahir | formatDate}}</label>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-form-label col-sm-5">Jenis Kelamin</label>
                <div class="col-sm-6">
                  <label class="form-control-plaintext datatampil"> {{Karyawan.JenisKelamin == 0? "Laki-Laki":"Perempuan"}}</label>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-form-label col-sm-5">No.Telepon</label>
                <div class="col-sm-6">
                  <label class="form-control-plaintext datatampil">{{Karyawan.NoTelepon}}</label>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-form-label col-sm-5">No.Telepon Darurat</label>
                <div class="col-sm-6">
                  <label  class="form-control-plaintext datatampil">{{Karyawan.NoTeleponDarurat == null? " - - ": Karyawan.NoTeleponDarurat}}</label>
                </div>
              </div>
              <div class="form-group row" v-show="Karyawan.IsApoteker == 1">
                <label class="col-form-label col-sm-5">No Registrasi Apoteker</label>
                <div class="col-sm-6">
                  <label class="form-control-plaintext datatampil">{{Karyawan.NoRegistrasiApoteker}}</label>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-form-label col-sm-5">Alamat</label>
                <div class="col-sm-6">
                  <label class="form-control-plaintext datatampil">{{Karyawan.Alamat}}</label>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-form-label col-sm-5">Tanggal Dibuat</label>
                <div class="col-sm-6">
                  <label class="form-control-plaintext datatampil">{{Karyawan.TanggalDiBuat | formatDate}}</label>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-form-label col-sm-5">Tanggal Diubah</label>
                <div class="col-sm-6">
                  <label class="form-control-plaintext datatampil">{{Karyawan.TanggalDiUbah | formatDate}}</label>
                </div>
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" v-on:click="CloseModal('ModalKaryawanView')" class="btn btn-secondary">Tutup</button>
            <!--v-on:click="CloseModal" -->
          </div>
        </div>
      </div>
    </div>
    <!--end View Modal -->
  </div>
</template>
<script src="../App/Karyawan.js"></script>
<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
</style>
