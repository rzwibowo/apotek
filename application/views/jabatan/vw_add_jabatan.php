<div class="section">
    <div class="container">
        <form action="<?php echo base_url().'index.php/jabatan/add_action'; ?>" method="post">
            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label">Kode Jabatan</label>
                </div>
                <div class="field-body">
                    <div class="control">
                        <div class="field">
                            <input class="input" name="kd_jbt" type="text" placeholder="Ketik Kode Jabatan" maxlength="4">
                        </div>
                    </div>
                </div>
            </div>
            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label">Nama Jabatan</label>
                </div>
                <div class="field-body">
                    <div class="control">
                        <div class="field">
                          <input type="text" name="nama_jbt" class="input" placeholder="Ketik Nama Jabatan" maxlength="4">
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
                          <?php echo anchor('jabatan/index','Kembali','class="button is-danger"'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
