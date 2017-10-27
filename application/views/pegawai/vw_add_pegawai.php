<div class="section">
    <div class="container">
        <form action="<?php echo base_url().'index.php/pegawai/add_action'; ?>" method="post">
            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label">	Nama Pegawai
</label>
                </div>
                <div class="field-body">
                    <div class="control">
                        <div class="field">
                            <input class="input" name="nama_pgw" type="text" placeholder="Ketik Nama Pegawai" maxlength="4">
                        </div>
                    </div>
                </div>
            </div>
            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label">Alamat	</label>
                </div>
                <div class="field-body">
                    <div class="control">
                        <div class="field">
                            <textarea class="input" name="alamat" placeholder="Ketik Alamat Pegawai" maxlength="4"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label">Jenis Kelamin</label>
                </div>
                <div class="field-body">
                    <div class="control">
                        <div class="field">
                          <input type="radio" name="jenis_kel" value="L">Laki - Laki
                          <input type="radio" name="jenis_kel" value="P">Perempuan
                        </div>
                    </div>
                </div>
            </div>
            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label">Jabatan</label>
                </div>
                <div class="field-body">
                    <div class="control">
                        <div class="field">
                          <select name="kode_jbt">
                            <?php
                            foreach ($jabatan as $row) {
                              echo "<option value='".$row->kd_jbt."'>".$row->nama_jbt."</option>";
                              }
                            ?>

                          </select>
                        </div>
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
                            <input type="submit" class="button is-primary" value="Simpan">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
