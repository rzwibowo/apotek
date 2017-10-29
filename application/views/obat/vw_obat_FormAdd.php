<div class="section">
    <div class="container">
        <form action="<?php echo base_url().'index.php/obat/add_action'; ?>" method="post">
            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label">Golongan Obat</label>
                </div>
                <div class="field-body">
                    <div class="control">
                        <div  class="select">
                            <select name="gol_obat">
                              <?php
                              foreach ($obat_gol as $row) {
                                echo "<option value='".$row->id_gol."'>".$row->golongan."</option>";
                              }
                               ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label">Nama Obat</label>
                </div>
                <div class="field-body">
                    <div class="control">
                        <div class="field">
                            <input class="input" name="nama_obat" type="text" placeholder="Ketik Nama Obat" maxlength="30">
                        </div>
                    </div>
                </div>
            </div>
            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label">Stok Obat</label>
                </div>
                <div class="field-body">
                    <div class="control">
                        <div class="field">
                            <input class="input" name="stok_obat" type="text" placeholder="Ketik Stok Obat" maxlength="30">
                        </div>
                    </div>
                </div>
            </div>
            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label">Harga Satuan</label>
                </div>
                <div class="field-body">
                    <div class="control">
                        <div class="field">
                            <input class="input" name="harga_satuan" type="text" placeholder="Ketik Harga satuan" maxlength="30">
                        </div>
                    </div>
                </div>
            </div>
            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label">Tanggal Kadaluarsa</label>
                </div>
                <div class="field-body">
                    <div class="control">
                        <div class="field">
                            <input class="input" name="tgl_kadaluarsa" type="text" placeholder="Ketik Tanggal kadaluarsa" maxlength="30">
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
                            <a class="button is-danger" onclick="goBack()">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
