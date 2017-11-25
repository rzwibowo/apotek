<div class="modal fade" id="modalForm" tabindex="-1" role="dialog" aria-labelledby="modalFormLabel" aria-hidden="true" style="margin:auto;">
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
            <div class="form-group row">
                <label class="col-form-label col-sm-3">Golongan Obat</label>
                <div class="col-sm-6">
                    <select name="gol_obat" class="form-control">
                        <!-- < ?php
                        foreach ($obat_gol as $row) {
                        ?>
                        <option value="< ?php echo $row->id_gol;?>" >< ?php echo $row->golongan ?></option>";
                        < ?php
                        }
                        ? > -->
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-form-label col-sm-3">Nama Obat</label>
                <div class="col-sm-6">
                    <input class="form-control" name="nama_obat" type="text" placeholder="Ketik Nama Obat" maxlength="30">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-form-label col-sm-3">Stok Obat</label>
                <div class="col-sm-3">
                    <input class="form-control" name="stok_obat" type="number" placeholder="Ketik Stok Obat" max="9999999999">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-form-label col-sm-3">Harga Satuan</label>
                <div class="col-sm-4">
                    <div class="input-group">
                        <span class="input-group-addon">Rp</span>
                        <input class="form-control" name="harga_satuan" type="number" placeholder="Ketik Harga satuan" max="9999999999">
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-form-label col-sm-3">Tanggal Kadaluarsa</label>
                <div class="col-sm-4">
                    <input class="form-control" name="tgl_kadaluarsa" type="date" placeholder="Ketik Tanggal kadaluarsa">
                </div>
            </div>
            <!-- <div class="form-group">
          <label class="col-form-label">Data Pertama</label>
          <input type="text" class="form-control" name="dataPtm">
        </div>
        <div class="form-group">
        <label class="col-form-label">Data Kedua</label>
          <input type="text" class="form-control" name="dataKda">
        </div> -->
      </div>
      <div class="modal-footer">
        <button type="button" v-on:click="CloseModal" class="btn btn-secondary">Tutup</button>
        <button type="button" v-on:click="CloseModal" class="btn btn-primary">Simpan</button>
      </div>
    </div>
  </div>
</div>
