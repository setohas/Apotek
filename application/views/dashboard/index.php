 <!-- Small boxes (Stat box) -->
 <div class="row">
 	<div class="col-lg-3 col-6">
 		<!-- small box -->
 		<div class="small-box bg-success">
 			<div class="inner">
 				<h3><?php echo $obat->total ?></h3>

 				<p>Data Obat</p>
 			</div>
 			<div class="icon">
 				<i class="ion ion-medkit"></i>
 			</div>
 			<a href="<?php echo base_url('obat/tambah') ?>" class="small-box-footer">Tambah Obat <i class="fas fa-arrow-circle-right"></i></a>
 		</div>
 	</div>
 	<!-- ./col -->

 	<!-- ./col -->
 	<div class="col-lg-3 col-6">
 		<!-- small box -->
 		<div class="small-box bg-white">
 			<div class="inner">
 				<h3><?php echo $stok->total ?></h3>

 				<p>Jumlah Stok Obat</p>
 			</div>
 			<div class="icon">
 				<i class="ion ion-medkit"></i>
 			</div>
 			<a href="<?php echo base_url('obat') ?>" class="small-box-footer">Lihat Data Obat <i class="fas fa-arrow-circle-right"></i></a>
 		</div>
 	</div>
 	<!-- ./col --> 	

 	<div class="col-lg-3 col-6">
 		<!-- small box -->
 		<div class="small-box bg-info">
 			<div class="inner">
 				<h3><?php echo $pemasok->total ?></h3>

 				<p>Pemasok</p>
 			</div>
 			<div class="icon">
 				<i class="fas fa-users"></i>
 			</div>
 			<a href="<?php echo base_url('pemasok') ?>" class="small-box-footer"> Tambah Pemasok <i class="fas fa-arrow-circle-right"></i></a>
 		</div>
 	</div>
 	<!-- ./col -->

 	<div class="col-lg-3 col-6">
 		<!-- small box -->
 		<div class="small-box bg-success">
 			<div class="inner">
 				<h3><?php echo $user->total ?></h3>

 				<p>Pengguna</p>
 			</div>
 			<div class="icon">
 				<i class="ion ion-person"></i>
 			</div>
 			<a href="<?php echo base_url('user') ?>" class="small-box-footer">Data Pengguna <i class="fas fa-arrow-circle-right"></i></a>
 		</div>
 	</div>

 	<!-- ./col -->
 	<div class="col-lg-3 col-6">
 		<!-- small box -->
 		<div class="small-box bg-warning">
 			<div class="inner">
 				<p><?php echo $t_habis->total ?> Obat Habis</p>
 				<p><?php echo $th_habis->total ?> Obat Mendekati Habis</p>
 			</div>
 			<div class="icon">
 				<i class="fas fa-exclamation-triangle"></i>
 			</div>
 			<a href="<?php echo base_url('obat/habis') ?>" class="small-box-footer">Lihat Data Obat Habis <i class="fas fa-arrow-circle-right"></i></a>
 		</div>
 	</div>
 	<!-- ./col -->

 	<!-- ./col -->
 	<div class="col-lg-3 col-6">
 		<!-- small box -->
 		<div class="small-box bg-danger">
 			<div class="inner">
 				<p><?php echo $t_kadaluwarsa->total ?> Obat Kadaluwarsa</p>
 				<p><?php echo $th_kadaluwarsa->total ?> Obat Mendekati Kadaluwarsa</p>
 			</div>
 			<div class="icon">
 				<i class="fas fa-hospital"></i>
 			</div>
 			<a href="<?php echo base_url('obat/habis') ?>" class="small-box-footer">Lihat Data Obat Kadaluwarsa <i class="fas fa-arrow-circle-right"></i></a>
 		</div>
 	</div>
 	<!-- ./col -->

 </div>