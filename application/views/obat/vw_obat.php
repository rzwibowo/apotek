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
			<?php
				$no=$this->uri->segment('3')+1;
				foreach($obat as $row){
			?>
			<tr>
				<td><?php echo $no++ ?></td>
				<td><?php echo $row->kode_obat ?></td>
				<td><?php echo $row->nama_obat ?></td>
				<td><?php echo $row->golongan ?></td>
				<td><?php echo $row->stok_obat ?></td>
				<td><?php echo $row->harga_satuan ?></td>
				<td><?php echo $row->tgl_kadaluarsa ?></td>
				<td class="text-center">
					<?php echo anchor('obat/edit/'.$row->id_obat,'<i class="fa fa-pencil" aria-hidden="true"></i>','class="btn btn-outline-warning"'); ?>
					<?php echo anchor('obat/view/'.$row->id_obat,'<i class="fa fa-info" aria-hidden="true"></i>','class="btn btn-outline-info"'); ?>
				</td>
			</tr>
			<?php }	?>
		</tbody>
		<tfoot>
			<tr>
				<td colspan="7">
					<?php echo $this->pagination->create_links(); ?>
				</td>
				<td class="text-right">
					<?php echo anchor('obat/add_obat','<i class="fa fa-plus" aria-hidden="true"></i> &nbsp; Tambah Data','class="btn btn-primary"'); ?>
				</td>
			</tr>
		</tfoot>
	</table>
</div>

<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modalForm">Buka Modal Form</button>
<div class="modal fade" id="modalForm" tabindex="-1" role="dialog" aria-labelledby="modalFormLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalFormLabel">Form di dalam modal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
			<label class="col-form-label">Data Pertama</label>
			<input type="text" class="form-control" name="dataPtm">
		</div>
		<div class="form-group">
		<label class="col-form-label">Data Kedua</label>
			<input type="text" class="form-control" name="dataKda">
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="button" class="btn btn-primary">Simpan</button>
      </div>
    </div>
  </div>
</div>
<!-- <div class="pull-right">
</div> -->

