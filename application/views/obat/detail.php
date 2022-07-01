<p class="text-right">
	<a href="<?php echo base_url('obat/cetak/'.$obat->id_obat) ?>" class="btn btn-success btn-sm target="_blank><i class="fa fa-print"> Cetak </i>
	</a>
	<a href="<?php echo base_url('obat')?>" class= "btn btn-info">
		<i class="fa fa-backward"></i> Kembali
	</a>
</p>

<hr>
<table class="table table-striped">
	<thead>
		<tr>
			<th width="25%">Nama Obat</th>
			<th>: <?php echo $obat->nama_obat?></th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>Stok</td>
			<td>: <?php echo $obat->stok?></td>
		</tr>
		<tr>
			<td>Penyimpanan</td>
			<td>: <?php echo $obat->penyimpanan?></td>
		</tr>
		<tr>
			<td>Bentuk</td>
			<td>: <?php echo $obat->bentuk?></td>
		</tr>
		<tr>
			<td>Kadaluarsa</td>
			<td>: <?php echo date('d-m-y', strtotime ($obat->kadaluwarsa))?></td>
		</tr>
		<tr>
			<td>Deskripsi</td>
			<td>: <?php echo $obat->deskripsi?></td>
		</tr>
		<tr>
			<td>Harga Beli</td>
			<td>: Rp <?php echo number_format($obat->harga_beli)?></td>
		</tr>
		<tr>
			<td>Harga Jual</td>
			<td>: Rp <?php echo number_format($obat->harga_jual)?></td>
		</tr>
		<tr>
			<td>Pemasok</td>
			<td>: <?php echo $obat->nama_pemasok?></td>
		</tr>
	</tbody>
</table>