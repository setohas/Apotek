<div class="card">
	<div class="card-header">
		<h3 class="card-title">Obat Kadaluwarsa</h3>
	</div>
	<div class="alert alert-danger">
		<h4><i class="fa fa-warning"></i> Peringatan!</h4> Obat sudah kadaluwarsa. Harap menambahkan obat yang baru.
	</div>
	<!-- /.card-header -->
	<div class="card-body">

		<table class="table table-bordered table-striped table-sm" id="tabel1">
			<thead>
				<tr>
					<th width="10%">NAMA OBAT</th>
					<th width="10%">STOK</th>
					<th width="10%">PENYIMPANAN</th>
					<th width="10%">BENTUK</th>
					<th width="10%">KADALUARSA</th>
					<th width="10%">DESKRIPSI</th>
					<th width="10%">HARGA BELI</th>
					<th width="10%">HARGA JUAL</th>
					<th width="10%">PEMASOK</th>
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
		<h3 class="card-title">Obat Mendekati Kadaluwarsa</h3>
	</div>
	<div class="alert alert-warning">
		<h4><i class="fa fa-warning"></i> Peringatan!</h4> Obat mendekati kadaluwarsa. Harap menambahkan obat yang baru.
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<table class="table table-bordered table-striped table-sm" id="tabel3">
			<thead>
				<tr>
					<th width="10%">NAMA OBAT</th>
					<th width="10%">STOK</th>
					<th width="10%">PENYIMPANAN</th>
					<th width="10%">BENTUK</th>
					<th width="10%">KADALUARSA</th>
					<th width="10%">DESKRIPSI</th>
					<th width="10%">HARGA BELI</th>
					<th width="10%">HARGA JUAL</th>
					<th width="10%">PEMASOK</th>
				</tr>
			</thead>
			<tbody>

				<?php foreach ($h_obat as $key => $obat){ ?>
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