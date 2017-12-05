<template>
  <div class="ObatController">
    <div class="page-head text-center">
	<h1>Daftar Obat</h1>
</div>
<div class="table-responsive">
	<table class="table table-hover">
		<thead>
			<tr>
				<th>No.</th>
				<th>Kode Obat</th>
				<th>Nama Obat</th>
				<th>Golongan</th>
				<th>Stok</th>
				<th>Harga Satuan</th>
				<th>Tanggal Kadaluarsa</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
      <tr>
        <td></td>
        <td><input v-on:keyup="ChangeFilter(FilterModel.KodeObat)" class="form-control" name="KodeObat" v-model="FilterModel.KodeObat" type="text" maxlength="30"></td>
        <td><input v-on:keyup="ChangeFilter(FilterModel.NamaObat)" class="form-control" name="NamaObat" v-model="FilterModel.NamaObat" type="text" maxlength="30"></td>
        <td><input v-on:keyup="ChangeFilter(FilterModel.Golongan)" class="form-control" name="Golongan" v-model="FilterModel.Golongan" type="text" maxlength="30"></td>
        <td><input v-on:keyup="ChangeFilter(FilterModel.StokObat)" class="form-control" name="StokObat" v-model="FilterModel.StokObat" type="text" maxlength="30"></td>
        <td><input v-on:keyup="ChangeFilter(FilterModel.HargaSatuan)" class="form-control" name="HargaSatuan" v-model="FilterModel.HargaSatuan" type="text" maxlength="30"></td>
        <td><input v-on:change="ChangeFilter(FilterModel.TanggalKadaluarsa)" class="form-control" name="TanggalKadaluarsa" v-model="FilterModel.TanggalKadaluarsa" type="date" maxlength="30"></td>
      </tr>
			<tr v-for="(obats,index) in Obats">
        <td>{{index + 1}}</td>
        <td>{{obats.KodeObat}}</td>
        <td>{{obats.NamaObat}}</td>
        <td>{{obats.Golongan}}</td>
        <td>{{obats.StokObat}}</td>
        <td>{{obats.HargaSatuan}}</td>
        <td>{{obats.TanggalKadaluarsa  | formatDate }}</td>
				<td class="text-center">
          <a  v-on:click="EditObat(obats.IdObat)"  class="btn btn-outline-warning"><i class="fa fa-pencil" aria-hidden="true"></i></a>
					<a  v-on:click="ViewObat(obats.IdObat)" class="btn btn-outline-info"> <i class="fa fa-info" aria-hidden="true"></i></a>
				</td>
			</tr>
		</tbody>
		<tfoot>
			<tr>
				<td colspan="7">
				</td>
				<td class="text-right">
					<button class="btn btn-primary" v-on:click="AddObat"> <i class="fa fa-plus" aria-hidden="true"></i> Tambah Data</button>
				</td>
			</tr>
		</tfoot>
	</table>
</div>
<!--Form modal-->
<div class="modal fade" id="ModalObatForm" tabindex="-1" role="dialog" aria-labelledby="modalFormLabel" aria-hidden="true" style="margin:auto;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalFormLabel">Form Data Obat</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group row" v-show="Obat.KodeObat !==null">
              <label class="col-form-label col-sm-3">Kode Obat</label>
              <div class="col-sm-6">
                  <input class="form-control" name="kode_obat" v-model="Obat.KodeObat" type="text" disabled="true" maxlength="30">
              </div>
          </div>
            <div class="form-group row">
                <label class="col-form-label col-sm-3">Golongan Obat</label>
                <div class="col-sm-6">
                    <select name="Golongan" v-model="Obat.IdGolongan" class="form-control">
                      <option value=''>Pilih</option>
                      <option v-for="option in GolonganObats" :value="option.IdGolongan">{{option.Golongan}}</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-form-label col-sm-3">Nama Obat</label>
                <div class="col-sm-6">
                    <input class="form-control" name="NamaObat" v-model="Obat.NamaObat" type="text" placeholder="Ketik Nama Obat" maxlength="30">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-form-label col-sm-3">Stok Obat</label>
                <div class="col-sm-3">
                    <input class="form-control" name="stok_obat" v-model="Obat.StokObat" type="number" placeholder="Ketik Stok Obat" max="9999999999">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-form-label col-sm-3">Harga Satuan</label>
                <div class="col-sm-4">
                    <div class="input-group">
                        <span class="input-group-addon">Rp</span>
                        <input class="form-control" name="HargaSatuan" v-model="Obat.HargaSatuan" type="number" placeholder="Ketik Harga satuan" max="9999999999">
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-form-label col-sm-3">Tanggal Kadaluarsa</label>
                <div class="col-sm-4">
                    <input class="form-control" name="TanggalKadaluarsa" v-model="Obat.TanggalKadaluarsa" type="date" placeholder="Ketik Tanggal kadaluarsa">
                </div>
            </div>
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" v-on:click="CloseModal('ModalObatForm')" class="btn btn-secondary">Tutup</button>
        <button type="button" v-on:click="SaveDataObat" class="btn btn-primary">Simpan</button>
        <!--v-on:click="CloseModal" -->
      </div>
    </div>
  </div>
</div>
<!--end Form Modal-->
<!--end View Modal-->
<div class="modal fade" id="ModalObatView" tabindex="-1" role="dialog" aria-labelledby="modalFormLabel" aria-hidden="true" style="margin:auto;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalFormLabel">View Data Obat</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group row" v-show="Obat.KodeObat !==null">
              <label class="col-form-label col-sm-3">Kode Obat</label>
              <div class="col-sm-4">
                  <label class="col-form-label">{{Obat.KodeObat}}</label>
              </div>
          </div>
            <div class="form-group row">
                <label class="col-form-label col-sm-3">Nama Obat</label>
                <div class="col-sm-4">
                    <label class="col-form-label">{{Obat.NamaObat}}</label>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-form-label col-sm-3">Golongan Obat</label>
                <div class="col-sm-4">
                  <label class="col-form-label">{{Obat.Golongan}}</label>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-form-label col-sm-3">Stok Obat</label>
                <div class="col-sm-4">
                    <label class="col-form-label">{{Obat.StokObat}}</label>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-form-label col-sm-3">Harga Satuan</label>
                <div class="col-sm-4">
                    <label class="col-form-label">{{Obat.HargaSatuan}}</label>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-form-label col-sm-3">Tanggal Kadaluarsa</label>
                <div class="col-sm-4">
                  <label class="col-form-label">{{ Obat.TanggalKadaluarsa | formatDate }}</label>
                </div>
            </div>
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" v-on:click="CloseModal('ModalObatView')" class="btn btn-secondary">Tutup</button>
        <!--v-on:click="CloseModal" -->
      </div>
    </div>
  </div>
</div>
<!--end View Modal -->
</div>
</template>
<script src="../App/obat.js"></script>
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
