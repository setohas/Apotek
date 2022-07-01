<?php
echo form_open(base_url('pemasok'), 'class="form-horizontal"');?>
<p>
	<button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#modal-default">
                  <i class=" fa fa-plus"></i> Tambah Pemasok
                </button>
</p>

<?php
include('tambah.php');
echo form_close();?>

<table class="table table-bordered table-striped table-sm" id="tabel2">
	<thead>
		<tr>
			<th width="5%">NO</th>
			<th width="20%">NAMA PEMASOK</th>
			<th width="40%">ALAMAT</th>
			<th width="20%">TELEPON</th>
			<th>ACTION</th>
		</tr>
	</thead>
	<tbody>

		<?php foreach ($pemasok as $key => $pemasok){ ?>
		<tr>
			<td><?php echo $key+1; ?></td>
			<td><?php echo $pemasok->nama_pemasok; ?></td>
			<td><?php echo $pemasok->alamat; ?></td>
			<td><?php echo $pemasok->telepon; ?></td>
			<td>
				<div class="btn-group">
					<a href="<?php echo base_url('pemasok/edit/'.$pemasok->id_pemasok) ?>" class="btn btn-warning btn-sm">
						<i class="fa fa-edit"> Edit
						</i>
					</a>

					<a href="<?php echo base_url('pemasok/delete/'.$pemasok->id_pemasok) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau menghapus data ini?')">
						<i class="fa fa-trash"> Hapus
						</i>
					</a>
				</div>
			</td>
		</tr>
	<?php } ?>
	</tbody>
</table>