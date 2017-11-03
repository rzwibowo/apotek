<section class="section">
	<div class="container">

		<table class="table">
			<thead>
				<tr>
					<th>No.</th>
					<th>Nama Supplier</th>
					<th>Nomor Telepon</th>
					<th>Alamat</th>
					<th>Status</th>
				</tr>
			</thead>

			<?php
				$no=1;
				foreach($supplier as $row){
			?>
			<tbody>
				<tr>
					<td><?php echo $no++ ?></td>
					<td><?php echo $row->NamaSupplier ?></td>
					<td><?php echo $row->NomorTelepon ?></td>
					<td><?php echo $row->Alamat ?></td>
					<td><?php echo ($row->Status==1? "Aktif":"Non Aktif"); ?></td>
					<td>
                        <?php echo anchor('supplier/Edit/'.$row->IdSupplier,'<i class="fa fa-pencil" aria-hidden="true"></i>','class="button is-info"'); ?>
                        <?php echo anchor('supplier/View/'.$row->IdSupplier,'<i class="fa fa-info" aria-hidden="true"></i>','class="button is-info"'); ?>
          </td>
				</tr>
			</tbody>
			<?php }	?>
		</table>
		<nav class="level">
				<div class="level-right">
						<div class="level-item">
								<?php echo anchor('supplier/AddSupplier','<i class="fa fa-plus" aria-hidden="true"></i> &nbsp; Tambah Data','class="button is-primary"'); ?>
						</div>
				</div>
		</nav>
	</div>
</section>
