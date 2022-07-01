<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $title?></title>
	<!-- panggil css print -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/print.css') ?>"
	media="screen">
	<!-- panggil css print -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/print.css') ?>"
	media="print">
</head>
<body onload="print()">
	<div class="cetak">
		<h1>CETAK DATA OBAT <?php echo $penjualan->nama_penjualan?></h1>
		
		<table class="table table-striped">
			
				<tr>
					<td width="25%">Nama Obat</td>
					<td>: <?php echo $penjualan->nama_penjualan?></td>
				</tr>
				<tr>
					<td>Stok</td>
					<td>: <?php echo $penjualan->stok?></td>
				</tr>
				<tr>
					<td>Penyimpanan</td>
					<td>: <?php echo $penjualan->penyimpanan?></td>
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
		</table>
	</div>
</body>
</html>