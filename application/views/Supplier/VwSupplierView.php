<div class="section">
    <div class="container">
      <div class="form-horizontal">
           <div class="form-group">
               <label class="control-label col-sm-3">Nama Supplier</label>
               <div class="col-sm-4">
                  <label class="control-label"><?php echo $supplier[0]->NamaSupplier;?></label>
               </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3">Nomor Telepon</label>
                <div class="col-sm-4">
                   <label class="control-label"><?php echo $supplier[0]->NomorTelepon;?></label>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3">Alamat</label>
                <div class="col-sm-4">
                   <label class="control-label"><?php echo $supplier[0]->Alamat;?></label>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3">Alamat</label>
                <div class="col-sm-4">
                   <label class="control-label"><?php echo ($supplier[0]->Status == 1 ? "Aktif":"Non Aktif");?></label>
                </div>
            </div>
            <div class="form-group">
                <button class="btn btn-primary" onclick="goBack()"> Kembali</button>
            </div>
          </div>
</div>
