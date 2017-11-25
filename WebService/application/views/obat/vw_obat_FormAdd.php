<div class="page-head text-center">
    <h1>Tambah Data Obat</h1>
</div>

<div class="col-md-8 offset-md-2">
    <form action="<?php echo base_url().'index.php/obat/add_action'; ?>" method="post">
        <div class="form-group row">
            <label class="col-form-label col-sm-3">Golongan Obat</label>
            <div class="col-sm-6">
                <select name="gol_obat" class="form-control">
                    <?php
                    foreach ($obat_gol as $row) {
                    ?>
                    <option value="<?php echo $row->id_gol;?>" ><?php echo $row->golongan ?></option>";
                    <?php
                    }
                    ?>
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-form-label col-sm-3">Nama Obat</label>
            <div class="col-sm-6">
                <input class="form-control" name="nama_obat" type="text" placeholder="Ketik Nama Obat" maxlength="30">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-form-label col-sm-3">Stok Obat</label>
            <div class="col-sm-3">
                <input class="form-control" name="stok_obat" type="number" placeholder="Ketik Stok Obat" max="9999999999">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-form-label col-sm-3">Harga Satuan</label>
            <div class="col-sm-4">
                <div class="input-group">
                    <span class="input-group-addon">Rp</span>
                    <input class="form-control" name="harga_satuan" type="number" placeholder="Ketik Harga satuan" max="9999999999">
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-form-label col-sm-3">Tanggal Kadaluarsa</label>
            <div class="col-sm-4">
                <input class="form-control" name="tgl_kadaluarsa" type="date" placeholder="Ketik Tanggal kadaluarsa">
            </div>
        </div>

        <nav>
            <button class="btn btn-outline-secondary pull-left" onclick="goBack()">Kembali</button>
            <input type="submit" class="btn btn-primary pull-right" value="Simpan">
        </nav>
    </form>
</div>