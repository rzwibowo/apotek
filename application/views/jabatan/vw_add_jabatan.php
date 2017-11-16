<div class="page-head text-center">
    <h1>Tambah Data Jabatan</h1>
</div>

<div class="col-md-8 offset-md-2">
    <form action="<?php echo base_url().'index.php/jabatan/add_action'; ?>" method="post">
        <div class="form-group row">
            <label class="col-form-label col-sm-3">Kode Jabatan</label>
            <div class="col-sm-6">
                <input class="form-contol" name="kd_jbt" type="text" placeholder="Ketik Kode Jabatan" maxlength="4">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-form-label col-sm-3">Nama Jabatan</label>
            <div class="col-sm-6">
                <input type="text" name="nama_jbt" class="form-contol" placeholder="Ketik Nama Jabatan" maxlength="4">
            </div>
        </div>
        
        <nav>
            <button class="btn btn-outline-secondary pull-left" onclick="goBack()">Kembali</button>
            <input type="submit" class="btn btn-primary pull-right" value="Simpan">
        </nav>
    </form>
</div>