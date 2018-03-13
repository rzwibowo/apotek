<template>
  <div class="PembelianController">
    <div class="page-head text-center">
      <h1>Daftar Pembelian</h1>
    </div>
    <div class="table-responsive">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>No.</th>
            <th>Tanggal Pembelian</th>
            <th>Nama Supplier</th>
            <th>Jumlah Obat</th>
            <th>Total Harga Beli</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(Pembelians,index) in Pembelians" :key="index">
            <td>{{index + 1}}</td>
            <td>{{Pembelians.TanggalPembelian | formatDate}}</td>
            <td>{{Pembelians.NamaSupplier}}</td>
            <td class="jml">{{Pembelians.TotalJumlahObat}}</td>
            <td class="harga">{{Pembelians.TotalHargaBeli}}</td>
            <td class="text-center">
              <a  v-on:click="GoPage('/PembelianForm/'+Pembelians.IdPembelian)"  class="btn btn-outline-warning"><i class="fa fa-pencil" aria-hidden="true"></i></a>
              <a  v-on:click="GoPage('/PembelianView/'+Pembelians.IdPembelian)" class="btn btn-outline-info"> <i class="fa fa-info" aria-hidden="true"></i></a>
            </td>
          </tr>
        </tbody>
        <tfoot>
          <tr>
            <td colspan="5">
            </td>
            <td class="text-right">
              <button class="btn btn-primary" v-on:click="GoPage('/PembelianForm/')"> <i class="fa fa-plus" aria-hidden="true"></i> Pembelian Baru</button>
            </td>
          </tr>
        </tfoot>
      </table>
    </div>
</div>
</template>
<script src="../App/Pembelian.js"></script>
<!-- Add "scoped" attribute to limit CSS to this component only -->
<style>
  td.jml{
    text-align: right;
  }

body .modal {
  /* new custom width */
  width: 100%;
  /* must be half of the width, minus scrollbar on the left (30px) */
  margin-left: 0px;
}
</style>
