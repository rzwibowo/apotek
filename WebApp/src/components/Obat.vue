<template>
  <div class="ObatController">
    <div class="page-head text-center">
	<h1>Daftar Obat</h1>
</div>
<div class="table-responsive">
	<table class="table table-hover">
		<thead>
			<tr>
				<th>No.</th>
				<th>Kode Obat</th>
				<th>Nama Obat</th>
				<th>Golongan</th>
				<th>Stok</th>
				<th>Harga Satuan</th>
				<th>Tanggal Kadaluarsa</th>
				<th></th>
			</tr>
		</thead>

		<tbody>
			<tr v-for="(obat,index) in Obat['obat']">
        <td>{{index + 1}}</td>
        <td>{{obat.kode_obat}}</td>
        <td>{{obat.nama_obat}}</td>
        <td>{{obat.golongan}}</td>
        <td>{{obat.stok_obat}}</td>
        <td>{{obat.harga_satuan}}</td>
        <td>{{obat.tgl_kadaluarsa}}</td>
				<td class="text-center">
          <a href="#"  class="btn btn-outline-warning"><i class="fa fa-pencil" aria-hidden="true"></i></a>
					<a href="#"  class="btn btn-outline-info"> <i class="fa fa-info" aria-hidden="true"></i></a>
				</td>
			</tr>
		</tbody>
		<tfoot>
			<tr>
				<td colspan="7">
				</td>
				<td class="text-right">
					<button class="btn btn-primary" v-on:click="GetDataObat"> <i class="fa fa-plus" aria-hidden="true"></i> Tambah Data</button>
				</td>
			</tr>
		</tfoot>
	</table>
</div>
</div>
</template>
<script src="../App/obat.js"></script>
<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
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
</style>
