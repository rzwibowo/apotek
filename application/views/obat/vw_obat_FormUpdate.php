<div class="page-header text-center">
    <h1>Ubah Data Obat <?php echo $obat[0]->nama_obat;?></h1>
</div>

<div class="col-md-8 offset-md-2">
    <form action="<?php echo base_url().'index.php/obat/update_action'; ?>" method="post">
        <input class="form-control" name="id_obat" type="hidden" value="<?php echo $obat[0]->id_obat ?>">
        <div class="form-group row">
            <label class="col-form-label col-sm-3">Golongan Obat</label>
            <div class="col-sm-6">
                <select name="gol_obat" class="form-control">
                    <?php
                    foreach ($obat_gol as $row) {
                    ?>
                    <option value="<?php echo $row->id_gol;?>" <?php if($row->id_gol == $obat[0]->id_gol){echo "selected=\"selected\"";}?>><?php echo $row->golongan ?></option>";
                    <?php
                    }
                    ?>
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-form-label col-sm-3">Nama Obat</label>
            <div class="col-sm-6">
                <input class="form-control" name="nama_obat" type="text" placeholder="Ketik Nama Obat" maxlength="30" value="<?php echo $obat[0]->nama_obat; ?>">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-form-label col-sm-3">Stok Obat</label>
            <div class="col-sm-3">
                <input class="form-control" name="stok_obat" type="number" placeholder="Ketik Stok Obat" max="9999999999" value="<?php echo $obat[0]->stok_obat; ?>">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-form-label col-sm-3">Harga Satuan</label>
            <div class="col-sm-4">
                <div class="input-group">
                    <span class="input-group-addon">Rp</span>
                    <input class="form-control" name="harga_satuan" type="number" placeholder="Ketik Harga satuan" max="99999999999" value="<?php echo $obat[0]->harga_satuan; ?>">
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-form-label col-sm-3">Tanggal Kadaluarsa</label>
            <div class="col-sm-4">
                <input class="form-control" name="tgl_kadaluarsa" type="date" placeholder="Ketik Tanggal kadaluarsa" value="<?php echo $obat[0]->tgl_kadaluarsa;?>">
            </div>
        </div>
        
        <nav>
            <button class="btn btn-outline-secondary pull-left" onclick="goBack()">Kembali</button>
            <input type="submit" class="btn btn-primary pull-right" value="Simpan">
        </nav>
    </form>
</div>
