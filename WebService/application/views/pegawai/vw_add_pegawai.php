<div class="page-head text-center">
    <h1>Tambah Data Pegawai</h1>
</div>

<div class="col-md-8 offset-md-2">
    <form action="<?php echo base_url().'index.php/pegawai/add_action'; ?>" method="post">
        <div class="form-group row">
            <label class="col-form-label col-sm-3">Nama Pegawai</label>
            <div class="col-sm-6">
                <input class="form-control" name="nama_pgw" type="text" placeholder="Ketik Nama Pegawai" maxlength="4">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-form-label col-sm-3">Alamat	</label>
            <div class="col-sm-6">
                <textarea class="form-control" name="alamat" placeholder="Ketik Alamat Pegawai" maxlength="4"></textarea>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-form-label col-sm-3">Jenis Kelamin</label>
            <div class="col-sm-6">
                <div class="form-check form-check-inline">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="jenis_kel" value="L">
                        Laki - Laki
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="jenis_kel" value="P">
                        Perempuan
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-form-label col-sm-3">Jabatan</label>
            <div class="col-sm-6">
                <select name="kode_jbt" class="form-control">
                    <?php
                    foreach ($jabatan as $row) {
                        echo "<option value='".$row->kd_jbt."'>".$row->nama_jbt."</option>";
                        }
                    ?>
                </select>
            </div>
        </div>
        
        <nav>
            <button class="btn btn-outline-secondary pull-left" onclick="goBack()">Kembali</button>
            <input type="submit" class="btn btn-primary pull-right" value="Simpan">
        </nav>
    </form>
</div>

