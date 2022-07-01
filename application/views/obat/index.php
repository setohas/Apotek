<?php
echo form_open(base_url('obat'), 'class="form-horizontal"');?>
<p>
	<button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#modal-default">
                  <i class=" fa fa-plus"></i> Tambah Obat Baru
                </button>
</p>

<?php
include('tambah.php');
echo form_close();?>

<table class="table table-bordered table-striped table-sm" id="tabel2">
	<thead>
		<tr>
			<th width="15%">NAMA OBAT</th>
			<th width="10%">STOK</th>
			<th width="10%">PENYIMPANAN</th>
			<th width="10%">BENTUK</th>
			<th width="10%">KADALUARSA</th>
			<th width="15%">HARGA JUAL</th>
			<th width="10%">PEMASOK</th>
			<th>ACTION</th>
		</tr>
	</thead>
	<tbody>

		<?php foreach ($obat as $key => $obat){ ?>
		<tr>
			<td><?php echo $obat->nama_obat; ?></td>
			<td><?php echo $obat->stok; ?></td>
			<td><?php echo $obat->penyimpanan; ?></td>
			<td><?php echo $obat->bentuk; ?></td>
			<td><?php echo date('d-m-Y', strtotime ($obat->kadaluwarsa)); ?></td>
			<td> Rp <?php echo number_format($obat->harga_jual); ?></td>
			<td><?php echo $obat->nama_pemasok; ?></td>
			<td>
				<div class="btn-group">
					<a href="<?php echo base_url('obat/detail/'.$obat->id_obat) ?>" class="btn btn-info btn-sm">
						<i class="fa fa-laptop"> Detail </i>
					</a>

					<a href="<?php echo base_url('obat/edit/'.$obat->id_obat) ?>" class="btn btn-warning btn-sm">
						<i class="fa fa-edit"> Edit </i>
					</a>

					<a href="<?php echo base_url('obat/delete/'.$obat->id_obat) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau menghapus data ini?')">
						<i class="fa fa-trash"> Hapus </i>
					</a>
				</div>
			</td>
		</tr>
	<?php } ?>
	</tbody>
</table>