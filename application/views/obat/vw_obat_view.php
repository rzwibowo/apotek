<div class="section">
    <div class="container">
              <div class="field is-horizontal">
                  <div class="field-label is-normal">
                      <label class="label">Kode Obat</label>
                  </div>
                  <div class="field-body">
                      <div class="control">
                          <label class="label"><?php echo $obat[0]->kode_obat?></label>
                      </div>
                  </div>
              </div>
            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label">Golongan Obat</label>
                </div>
                <div class="field-body">
                    <div class="control">
                        <label class="label"><?php echo $obat[0]->golongan?></label>
                    </div>
                </div>
            </div>
            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label">Nama Obat</label>
                </div>
                <div class="field-body">
                    <div class="control">
                      <label class="label"> <?php echo $obat[0]->nama_obat?></label>
                    </div>
                </div>
            </div>
            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label">Stok Obat</label>
                </div>
                <div class="field-body">
                    <div class="control">
                        <label class="label"><?php echo $obat[0]->stok_obat?></label>
                    </div>
                </div>
            </div>
            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label">Harga Satuan</label>
                </div>
                <div class="field-body">
                    <div class="control">
                      <label class="label"><?php echo $obat[0]->harga_satuan?></label>
                    </div>
                </div>
            </div>
            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label">Tanggal Kadaluarsa</label>
                </div>
                <div class="field-body">
                    <div class="control">
                      <label class="label"><?php echo $obat[0]->tgl_kadaluarsa  ?></label>
                    </div>
                </div>
            </div>
            <div class="field is-horizontal">
                <div class="field-label">
                    <!-- Left empty for spacing -->
                </div>
                <div class="field-body">
                    <div class="field">
                        <div class="control">
                            <button class="button is-info" onclick="goBack()">Kembali</button>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
