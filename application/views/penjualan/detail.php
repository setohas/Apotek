<p class="text-right">
	<a href="<?php echo base_url('penjualan/cetak/'.$penjualan->kode_penjualan) ?>" class="btn btn-success btn-sm target="_blank><i class="fa fa-print"> Cetak </i>
	</a>
	<a href="<?php echo base_url('penjualan')?>" class= "btn btn-info">
		<i class="fa fa-backward"></i> Kembali
	</a>
</p>

<hr>
<table class="table table-striped">
	<thead>
		<tr>
			<th width="25%">Nama Obat</th>
			<th>: <?php echo $penjualan->kode_penjualan?></th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>Stok</td>
			<td>: <?php echo $penjualan->date('d-m-y', strtotime (tanggal_jual))?></td>
		</tr>
		<tr>
			<td>Penyimpanan</td>
			<td>: <?php echo $detai_penjualan->Jumlah?></td>
		</tr>
		<tr>
			<td>Bentuk</td>
			<td>: <?php echo $penjualan->bentuk?></td>
		</tr>
		<tr>
			<td>Kadaluarsa</td>
			<td>: <?php echo date('d-m-y', strtotime ($penjualan->kadaluwarsa))?></td>
		</tr>
		<tr>
			<td>Deskripsi</td>
			<td>: <?php echo $penjualan->deskripsi?></td>
		</tr>
		<tr>
			<td>Harga Beli</td>
			<td>: Rp <?php echo number_format($penjualan->harga_beli)?></td>
		</tr>
		<tr>
			<td>Harga Jual</td>
			<td>: Rp <?php echo number_format($penjualan->harga_jual)?></td>
		</tr>
		<tr>
			<td>Pemasok</td>
			<td>: <?php echo $penjualan->nama_pemasok?></td>
		</tr>
	</tbody>
</table>