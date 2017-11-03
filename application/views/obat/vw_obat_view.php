<div class="page-header">
    <h1>Data Obat <?php echo $obat[0]->nama_obat?></h1>
</div>

<div class="form-group row">
    <label class="col-form-label col-md-3">Kode Obat</label>
    <div class="col-md-9">
        <input type="text" readonly class="form-control-plaintext" value="<?php echo $obat[0]->kode_obat?>"/>
    </div>
</div>

<div class="form-group row">
    <label class="col-form-label col-md-3">Golongan Obat</label>
    <div class="col-md-9">
        <input type="text" readonly class="form-control-plaintext" value="<?php echo $obat[0]->golongan?>"/>
    </div>
</div>

<div class="form-group row">
    <label class="col-form-label col-md-3">Nama Obat</label>
    <div class="col-md-9">
        <input type="text" readonly class="form-control-plaintext" value="<?php echo $obat[0]->nama_obat?>"/>
    </div>
</div>

<div class="form-group row">
    <label class="col-form-label col-md-3">Stok Obat</label>
    <div class="col-md-9">
        <input type="text" readonly class="form-control-plaintext" value="<?php echo $obat[0]->stok_obat?>"/>
    </div>
</div>

<div class="form-group row">
    <label class="col-form-label col-md-3">Harga Satuan</label>
    <div class="col-md-9">
        <input type="text" readonly class="form-control-plaintext" value="<?php echo $obat[0]->harga_satuan?>"/>
    </div>
</div>

<div class="form-group row">
    <label class="col-form-label col-md-3">Tanggal Kadaluarsa</label>
    <div class="col-md-9">
        <input type="text" readonly class="form-control-plaintext" value="<?php echo $obat[0]->tgl_kadaluarsa  ?>"/>
    </div>
</div>

<button class="btn btn-outline-secondary" onclick="goBack()">Kembali</button>