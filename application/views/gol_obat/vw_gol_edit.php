<div class="section">
    <div class="container">
        <?php foreach ($gol_obat as $g) { ?>
        <form action="<?php echo base_url().'index.php/gol_obat/update_action'; ?>" method="post">
            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label">Kode Golongan</label>
                </div>
                <div class="field-body">
                    <div class="control">
                        <div class="field">
                            <input class="input" name="kd_gol" type="text" value="<?php echo $g->kd_gol; ?>" maxlength="4">
                        </div>
                    </div>
                </div>
            </div>
            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label">Nama Golongan</label>
                </div>
                <div class="field-body">
                    <div class="control">
                        <div class="field">
                            <input class="input" name="golongan" type="text" value="<?php echo $g->golongan ?>" maxlength="30">
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
        <?php } ?>
    </div>
</div>
