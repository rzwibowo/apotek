<div class="page-head text-center">
    <h1>Detail Golongan Obat <?php echo $gol_obat[0]->golongan; ?></h1>
</div>

<div class="form-group row">
    <label class="col-form-label col-md-3">Kode Golongan</label>
    <div class="col-md-9">
        <input type="text" readonly class="form-control-plaintext" value="<?php echo $gol_obat[0]->kd_gol; ?>"/>
    </div>
</div>
<div class="form-group row">
    <label class="col-form-label col-md-3">Nama Golongan</label>
    <div class="col-md-9">
        <input type="text" readonly class="form-control-plaintext" value="<?php echo $gol_obat[0]->golongan; ?>"/>
    </div>
</div>

<button class="btn btn-outline-secondary" onclick="goBack()">Kembali</button>
            
