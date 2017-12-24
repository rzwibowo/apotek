<script src="../App/Pembelian.js"></script>
<template>
  <div class="PembelianController">
    <div class="page-head text-center">
      <h1>Transaksi Pembelian</h1>
    </div>
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalFormLabel">Detail Transaksi Pembelian</h5>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group row">
            <label class="col-form-label col-sm-5">Tanggal Pembelian</label>
            <div class="col-sm-6">
                <label class="col-form-label col-sm-5">{{Pembelian.TanggalPembelian|formatDate}}</label>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-form-label col-sm-5">Nama Supplier</label>
            <div class="col-sm-6">
                <label class="col-form-label col-sm-5">Nama Supplier</label>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-form-label col-sm-5">Total Jumlah Obat</label>
            <div class="col-sm-3">
              <label class="col-form-label col-sm-5">{{Pembelian.TotalJumlahObat}}</label>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-form-label col-sm-5">Total Harga Beli</label>
            <div class="col-sm-6">
                <label class="col-form-label col-sm-5">Rp.{{Pembelian.TotalHargaBeli}}</label>
            </div>
          </div>
        </form>
        <div>
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Nama Obat</th>
                  <th>Jumlah Obat</th>
                  <th>Harga Pembelian</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="(detailpembelian,index) in Pembelian.DetailPembelian">
                  <td>{{index + 1}}</td>
                  <td>
                    {{detailpembelian.IdObat}}
                  </td>
                  <td>
                    {{detailpembelian.JumlahObat}}
                  </td>
                  <td>
                    {{detailpembelian.HargaPembelian}}
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" v-on:click="GoPage('/Pembelian')" class="btn btn-default">Kembali</button>
      </div>
    </div>
</div>
</template>

<script src="../App/PembelianView.js"></script>
<!-- Add "scoped" attribute to limit CSS to this component only -->
<style>
  td.jml{
    text-align: right;
  }
/*h1, h2 {
font-weight: normal;
}
ul {
list-style-type: none;
padding: 0;
}
li {
display: inline-block;
margin: 0 10px;
}
a {
color: #42b983;
}*/

body .modal {
  /* new custom width */
  width: 100%;
  /* must be half of the width, minus scrollbar on the left (30px) */
  margin-left: 0px;
}
</style>
