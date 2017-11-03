<section class="section">
	<div class="container">

		<table class="table">
			<thead>
				<tr>
					<th>No.</th>
					<th>Tanggal Pembelian</th>
          <th>Supplier</th>
					<th>Total Harga Pembelian</th>
					<th>Total Jumlah Obat</th>
					<th>Status Pembelian</th>
				</tr>
			</thead>

			<?php
				$no=1;
				foreach($pembelian as $row){
			?>
			<tbody>
				<tr>
					<td><?php echo $no++ ?></td>
					<td><?php echo $row->TanggalPembelian ?></td>
					<td><?php echo $row->NamaSupplier ?></td>
					<td><?php echo $row->TotalHargaBeli ?></td>
					<td><?php echo $row->TotalJumlahObat ?></td>
					<td><?php echo $row->StatusPembelian ?></td>
					<td>
                        <?php echo anchor('pembelian/Edit/'.$row->IdPembelian,'<i class="fa fa-pencil" aria-hidden="true"></i>','class="button is-info"'); ?>
                        <?php echo anchor('pembelian/View/'.$row->IdPembelian,'<i class="fa fa-info" aria-hidden="true"></i>','class="button is-info"'); ?>
          </td>
				</tr>
			</tbody>
			<?php }	?>
		</table>
		<nav class="level">
				<div class="level-right">
						<div class="level-item">
								<?php echo anchor('pembelian/AddPembelian','<i class="fa fa-plus" aria-hidden="true"></i> &nbsp; Tambah Data','class="button is-primary"'); ?>
						</div>
				</div>
		</nav>
	</div>
</section>
