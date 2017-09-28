<section class="section">
	<div class="container">

		<table class="table">
			<thead>
				<tr>
					<th>No.</th>
					<th>Kode Golongan</th>
					<th>Nama Golongan</th>
					<th>Tindakan</th>
				</tr>
			</thead>

			<?php
				$no=1;
				foreach($gol_obat as $g){
			?>
			<tbody>
				<tr>
					<td><?php echo $no++ ?></td>
					<td><?php echo $g->kd_gol ?></td>
					<td><?php echo $g->golongan ?></td>
					<td>
                        <?php echo anchor('gol_obat/edit/'.$g->kd_gol,'<i class="fa fa-pencil" aria-hidden="true"></i>','class="button is-info"'); ?>
                        <?php echo anchor('gol_obat/delete/'.$g->kd_gol,'<i class="fa fa-trash" aria-hidden="true"></i>','class="button is-danger"'); ?>
                    </td>
				</tr>
			</tbody>
			<?php }	?>
		</table>
        <nav class="level">
            <div class="level-right">
                <div class="level-item">
                    <?php echo anchor('gol_obat/add_gol_obat','<i class="fa fa-plus" aria-hidden="true"></i> &nbsp; Tambah Data','class="button is-primary"'); ?>
                </div>
            </div>
        </nav>
	</div>
</section>