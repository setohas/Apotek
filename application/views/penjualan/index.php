<p>
	<a href="<?php echo base_url('penjualan/tambah') ?>" class="btn btn-success">
		<i class="fa fa-plus"></i> Tambah Penjualan
	</a>

</p>

<table class="table table-bordered table-striped table-sm" id="example2">
	<thead>
		<tr>
			<th width="10%">KODE</th>
			<th width="10%">TANGGAL</th>
			<th width="15%">JUMLAH</th>
			<th width="15%">TOTAL PENJUALAN</th>
			<th width="10%">NAMA PEMBELI</th>
			<th>ACTION</th>
		</tr>
	</thead>
	<tbody>

		<?php foreach ($penjualan as $key => $penjualan){ ?>
		<tr>
			<td><?php echo $penjualan->kode_penjualan; ?></td>
			<td><?php echo date('d-m-y', strtotime ($penjualan->tanggal_jual)); ?></td>
			<td><?php echo $penjualan->banyak; ?></td>
			<td> Rp <?php echo number_format($penjualan->grandtotal); ?></td>
			<td><?php echo $penjualan->nama_pembeli; ?></td>
			
			
			<td>
				<div class="btn-group">
					<a href="<?php echo base_url('penjualan/detail/'.$penjualan->kode_penjualan) ?>" class="btn btn-info btn-sm">
						<i class="fa fa-laptop"> Detail </i>
					</a>

					<a href="<?php echo base_url('penjualan/edit/'.$penjualan->kode_penjualan) ?>" class="btn btn-warning btn-sm">
						<i class="fa fa-edit"> Edit </i>
					</a>

					<a href="<?php echo base_url('penjualan/delete/'.$penjualan->kode_penjualan) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau menghapus data ini?')">
						<i class="fa fa-trash"> Hapus </i>
					</a>
				</div>
			</td>
		</tr>
	<?php } ?>
	</tbody>
</table>