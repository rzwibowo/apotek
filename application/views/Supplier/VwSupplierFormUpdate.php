<div class="page-header text-center">
    <h1>Ubah Data Supplier <?php echo $supplier[0]->NamaSupplier;?></h1>
</div>

<div class="col-md-8 offset-md-2">
    <form action="<?php echo base_url().'index.php/supplier/UpdateaAtion'; ?>" method="post">
    <input name="IdSupplier" type="hidden"  value="<?php echo $supplier[0]->IdSupplier;?>">
        <div class="form-group row">
            <label class="col-form-label col-sm-3">Nama Supplier</label>
            <div class="col-sm-6">
                <input class="form-control" name="NamaSupplier" type="text" placeholder="Ketik Nama Supplier" maxlength="30" value="<?php echo $supplier[0]->NamaSupplier;?>">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-form-label col-sm-3">Nomor Telepon</label>
            <div class="col-sm-6">
                <input class="form-control" name="NomorTelepon" type="text" placeholder="Ketik Nomor Telepon" maxlength="30" value="<?php echo $supplier[0]->NomorTelepon;?>">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-form-label col-sm-3">Alamat</label>
            <div class="col-sm-6">
                <textarea name="Alamat" rows="4"class="form-control"><?php echo $supplier[0]->Alamat;?></textarea>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-form-label col-sm-3">Status</label>
            <div class="col-sm-6">
                <div class="form-check form-check-inline">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="Status" value="true" <?php echo ($supplier[0]->Status == 1 ? "checked":"");?>>
                        Aktif
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="Status" value="false" <?php echo ($supplier[0]->Status == 0 ? "checked":"");?>>
                        Non Aktif
                    </label>
                </div>
            </div>
        </div>

        <nav>
            <button class="btn btn-outline-secondary pull-left" onclick="goBack()">Kembali</button>
            <input type="submit" class="btn btn-primary pull-right" value="Simpan">
        </nav>
    </form>
</div>
