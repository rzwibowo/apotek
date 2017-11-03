<div class="section">
    <div class="container">
        <form action="<?php echo base_url().'index.php/supplier/UpdateaAtion'; ?>" method="post">
          <div class="field is-horizontal">
              <div class="field-body">
                  <div class="control">
                    <div class="field">
                        <input class="input" name="IdSupplier" type="hidden"  value="<?php echo $supplier[0]->IdSupplier;?>">
                    </div>
                </div>
              </div>
          </div>
            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label">Nama Supplier</label>
                </div>
                <div class="field-body">
                    <div class="control">
                      <div class="field">
                          <input class="input" name="NamaSupplier" type="text" placeholder="Ketik Nama Supplier" maxlength="30" value="<?php echo $supplier[0]->NamaSupplier;?>">
                      </div>
                  </div>
                </div>
            </div>
            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label">Nomor Telepon</label>
                </div>
                <div class="field-body">
                    <div class="control">
                        <div class="field">
                            <input class="input" name="NomorTelepon" type="text" placeholder="Ketik Nomor Telepon" maxlength="30" value="<?php echo $supplier[0]->NomorTelepon;?>">
                        </div>
                    </div>
                </div>
            </div>
            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label">Alamat</label>
                </div>
                <div class="field-body">
                    <div class="control">
                        <div class="field">
                          <textarea name="Alamat" rows="4"class="input"><?php echo $supplier[0]->Alamat;?></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label">Status</label>
                </div>
                <div class="field-body">
                    <div class="control">
                      <label class="radio">
                      <input type="radio" name="Status" value="true" <?php echo ($supplier[0]->Status == 1 ? "checked":"");?>>
                      Aktif
                      </label>
                      <label class="radio">
                      <input type="radio"  name="Status" value="false" <?php echo ($supplier[0]->Status == 0 ? "checked":"");?>>Non Aktif
                      </label>
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
                            <a class="button is-danger" onclick="goBack()">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
