<div class="page-header">
    <h1>Detail Supplier <?php echo $supplier[0]->NamaSupplier;?></h1>
</div>

<div class="form-group row">
    <label class="col-form-label col-sm-3">Nama Supplier</label>
    <div class="col-sm-4">
        <input type="text" readonly class="form-control-plaintext" value="<?php echo $supplier[0]->NamaSupplier;?>"/>
    </div>
</div>
<div class="form-group row">
    <label class="col-form-label col-sm-3">Nomor Telepon</label>
    <div class="col-sm-4">
        <input type="text" readonly class="form-control-plaintext" value="<?php echo $supplier[0]->NomorTelepon;?>"/>
    </div>
</div>
<div class="form-group row">
    <label class="col-form-label col-sm-3">Alamat</label>
    <div class="col-sm-4">
        <input type="text" readonly class="form-control-plaintext" value="<?php echo $supplier[0]->Alamat;?>"/>
    </div>
</div>
<div class="form-group row">
    <label class="col-form-label col-sm-3">Status</label>
    <div class="col-sm-4">
        <input type="text" readonly class="form-control-plaintext" value="<?php echo ($supplier[0]->Status == 1 ? "Aktif":"Non Aktif");?>"/>
    </div>
</div>
<div class="form-group row">
    <button class="btn btn-primary" onclick="goBack()"> Kembali</button>
</div>
