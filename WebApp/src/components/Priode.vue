
<template>
  <div class="PriodeController">
    <div class="page-head text-center">
      <h1>Daftar Priode</h1>
    </div>
    <div class="table-responsive">
      <table class="table table-hover" style="margin: 0 auto;">
        <thead>
          <tr>
            <th>No.</th>
            <th>Nama Priode</th>
            <th>Tanggal Mulai</th>
            <th>Tanggal Selesai</th>
            <th>Status</th>
            <th></th>
          </tr>
        </thead>

        <tbody>
        <tr>
          <td></td>
          <td><input v-on:keyup="ChangeFilter(FilterModel.NamaPriode)" class="form-control" name="NamaPriode" v-model="FilterModel.NamaPriode" type="text" maxlength="30"></a>
          <td><input v-on:change="ChangeFilter(FilterModel.TanggalMulai)" class="form-control" name="TanggalMulai" v-model="FilterModel.TanggalMulai" type="date" maxlength="30"></td>
          <td><input v-on:change="ChangeFilter(FilterModel.TanggalAkhir)" class="form-control" name="TanggalAkhir" v-model="FilterModel.TanggalAkhir" type="date" maxlength="30"></td>
          <td>
            <select name="Status" v-model="FilterModel.Status" class="form-control" v-on:change="ChangeFilterDropdown(FilterModel.Status)">
              <option value=''>Pilih</option>
              <option value="1">Aktif</option>
              <option value="0">Non Aktif</option>
            </select>
          </td>
          <td></td>
        </tr>
          <tr v-for="(Priodes,index) in Priodes">
            <td>{{index + 1}}</td>
            <td>{{Priodes.NamaPriode}}</a>
            <td>{{Priodes.TanggalMulai}}</td>
            <td>{{Priodes.TanggalAkhir}}</td>
            <td>{{Priodes.Status == 1? "Aktif":"Non Aktif"}}</td>
            <td class="text-center">
              <a  v-on:click="EditPriode(Priodes.IdPriode)"  class="btn btn-outline-warning"><i class="fa fa-pencil" aria-hidden="true"></i></a>
              <a  v-on:click="ViewPriode(Priodes.IdPriode)" class="btn btn-outline-info"> <i class="fa fa-info" aria-hidden="true"></i></a>
            </td>
          </tr>
        </tbody>
        <tfoot>
          <tr>
            <td colspan="5">
            </td>
            <td class="text-right">
              <button class="btn btn-primary" v-on:click="AddPriode"> <i class="fa fa-plus" aria-hidden="true"></i> Tambah Data</button>
            </td>
          </tr>
        </tfoot>
      </table>
    </div>
    <!--Form modal-->
    <div class="modal fade" id="ModalPriodeForm" tabindex="-1" role="dialog" aria-labelledby="modalFormLabel" aria-hidden="true" style="margin:auto;">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalFormLabel">Form Priode</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <div class="form-group row required">
                <label class="col-form-label col-sm-5 text-right">Nama Priode</label>
                <div class="col-sm-6">
                  <input class="form-control" name="NamaPriode" v-model="Priode.NamaPriode" type="text" maxlength="30">
                </div>
              </div>
              <div class="form-group row required">
                <label class="col-form-label col-sm-5 text-right">Tanggal Mulai</label>
                <div class="col-sm-6">
                  <input class="form-control" name="TanggalMulai" v-model="Priode.TanggalMulai" type="date"  maxlength="30">
                </div>
              </div>
              <div class="form-group row required">
                <label class="col-form-label col-sm-5 text-right">Tanggal Akhir</label>
                <div class="col-sm-6">
                  <input class="form-control" name="TanggalAkhir" v-model="Priode.TanggalAkhir" type="date" maxlength="30">
                </div>
              </div>

              <div class="form-group row required">
                <label class="col-form-label col-sm-5 text-right">Status</label>
                <div class="col-sm-6">
                  <div class="form-check form-check-inline">
                    <label class="form-check-label">
                      <input class="form-check-input" type="radio" name="Status" v-model="Priode.Status" value="1" > Aktif
                    </label>
                  </div>
                  <div class="form-check form-check-inline">
                    <label class="form-check-label">
                      <input class="form-check-input" type="radio" name="Status" v-model="Priode.Status" value="0" > Non Aktif
                    </label>
                  </div>
                </div>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" v-on:click="CloseModal('ModalPriodeForm')" class="btn btn-secondary">Tutup</button>
            <button type="button" v-on:click="SaveDataPriode" class="btn btn-primary">Simpan</button>
            <!--v-on:click="CloseModal" -->
          </div>
        </div>
      </div>
    </div>
    <!--end Form Modal-->
    <!--end View Modal-->
    <div class="modal fade" id="ModalPriodeView" tabindex="-1" role="dialog" aria-labelledby="modalFormLabel" aria-hidden="true" style="margin:auto;">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalFormLabel">Detail Priode {{Priode.NamaPriode}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <div class="form-group row">
                <label class="col-form-label col-sm-5 text-right">Nama Priode</label>
                <div class="col-sm-6">
                  <input readonly class="form-control-plaintext datatampil" :value="Priode.NamaPriode">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-form-label col-sm-5">Nomor Telepon</label>
                <div class="col-sm-6">
                  <input readonly class="form-control-plaintext datatampil" :value="Priode.NomorTelepon">
                </div>
              </div>

              <div class="form-group row">
                <label class="col-form-label col-sm-5">Status Priode</label>
                <div class="col-sm-6">
                  <input readonly class="form-control-plaintext datatampil" :value="Priode.Status ==1?'Aktif':'Non Aktif'">
                </div>
              </div>

              <div class="form-group row">
                <label class="col-form-label col-sm-5">Alamat</label>
                <div class="col-sm-6">
                  <p class="datatampil">{{Priode.Alamat}}</p>
                </div>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" v-on:click="CloseModal('ModalPriodeView')" class="btn btn-secondary">Tutup</button>
            <!--v-on:click="CloseModal" -->
          </div>
        </div>
      </div>
    </div>
    <!--end View Modal -->
  </div>

</template>
<script src="../App/Priode.js"></script>
