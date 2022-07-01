<div class="card">
	<div class="card-header">
		<h3 class="card-title">Stok Obat Habis</h3>
	</div>
	<div class="alert alert-danger">
		<h4><i class="fa fa-warning"></i> Peringatan!</h4> Obat sudah habis. Harap menambahkan obat yang baru.
	</div>
	<!-- /.card-header -->
	<div class="card-body">

		<table class="table table-bordered table-striped table-sm" id="tabel1">
			<thead>
				<tr>
					<th width="11%">NAMA OBAT</th>
					<th width="11%">STOK</th>
					<th width="11%">PENYIMPANAN</th>
					<th width="11%">BENTUK</th>
					<th width="11%">KADALUARSA</th>
					<th width="12%">DESKRIPSI</th>
					<th width="11%">HARGA BELI</th>
					<th width="11%">HARGA JUAL</th>
					<th width="11%">PEMASOK</th>
				</tr>
			</thead>
			<tbody>

				<?php foreach ($obat as $key => $obat){ ?>
					<tr>
						<td><?php echo $obat->nama_obat; ?></td>
						<td><?php echo $obat->stok; ?></td>
						<td><?php echo $obat->penyimpanan; ?></td>
						<td><?php echo $obat->bentuk; ?></td>
						<td><?php echo date('d-m-y', strtotime ($obat->kadaluwarsa)); ?></td>
						<td><?php echo $obat->deskripsi; ?></td>
						<td> Rp <?php echo number_format($obat->harga_beli); ?></td>
						<td> Rp <?php echo number_format($obat->harga_jual); ?></td>
						<td><?php echo $obat->nama_pemasok; ?></td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>

<div class="card">
	<div class="card-header">
		<h3 class="card-title">Stok Obat Kurang Dari 10</h3>
	</div>
	<div class="alert alert-warning">
		<h4><i class="fa fa-warning"></i> Peringatan!</h4> Obat hampir habis. Harap menambahkan obat yang baru.
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<table class="table table-bordered table-striped table-sm" id="tabel3">
			<thead>
				<tr>
					<th width="11%">NAMA OBAT</th>
					<th width="11%">STOK</th>
					<th width="11%">PENYIMPANAN</th>
					<th width="11%">BENTUK</th>
					<th width="11%">KADALUARSA</th>
					<th width="12%">DESKRIPSI</th>
					<th width="11%">HARGA BELI</th>
					<th width="11%">HARGA JUAL</th>
					<th width="11%">PEMASOK</th>
				</tr>
			</thead>
			<tbody>

				<?php foreach ($h_obat as $key => $h_obat){ ?>
					<tr>
						<td><?php echo $h_obat->nama_obat; ?></td>
						<td><?php echo $h_obat->stok; ?></td>
						<td><?php echo $h_obat->penyimpanan; ?></td>
						<td><?php echo $h_obat->bentuk; ?></td>
						<td><?php echo date('d-m-y', strtotime ($h_obat->kadaluwarsa)); ?></td>
						<td><?php echo $h_obat->deskripsi; ?></td>
						<td> Rp <?php echo number_format($h_obat->harga_beli); ?></td>
						<td> Rp <?php echo number_format($h_obat->harga_jual); ?></td>
						<td><?php echo $h_obat->nama_pemasok; ?></td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>