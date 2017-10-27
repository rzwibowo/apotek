<section class="section">
	<div class="container">

		<table class="table">
			<thead>
				<tr>
					<th>No.</th>
					<th>Kode jabatan</th>
					<th>Nama Jabatan</th>
					<th>Tindakan</th>
				</tr>
			</thead>

			<?php
				$no=1;
				foreach($jabatan as $row){
			?>
			<tbody>
				<tr>
					<td><?php echo $no++ ?></td>
					<td><?php echo $row->kd_jbt ?></td>
					<td><?php echo $row->nama_jbt ?></td>
					<td>
                        <?php echo anchor('gol_obat/edit/'.$row->kd_jbt,'<i class="fa fa-pencil" aria-hidden="true"></i>','class="button is-info"'); ?>
                    </td>
				</tr>
			</tbody>
			<?php }	?>
		</table>
        <nav class="level">
            <div class="level-right">
                <div class="level-item">
                    <?php echo anchor('jabatan/add_jabatan','<i class="fa fa-plus" aria-hidden="true"></i> &nbsp; Tambah Data','class="button is-primary"'); ?>
                </div>
            </div>
        </nav>
	</div>
</section>
