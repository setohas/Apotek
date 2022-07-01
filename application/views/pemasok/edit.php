<?php 
//form edit open
echo form_open(base_url('pemasok/edit/'.$pemasok->id_pemasok));
?>

<div class="form-group row">
  <label for="nama_pemasok" class="col-sm-3 col-form-label">Nama Pemasok</label>
  <div class="col-sm-9">
    <input type="text" class="form-control" name="nama_pemasok" placeholder="Nama Pemasok" value="<?php echo $pemasok->nama_pemasok ?>" required>
  </div>
</div>

<div class="form-group row">
  <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
  <div class="col-sm-9">
    <textarea type="text" name="alamat" class="form-control" placeholder="Alamat"  required><?php echo $pemasok->alamat ?></textarea>
  </div>
</div>

<div class="form-group row">
  <label for="telepon" class="col-sm-3 col-form-label">No Telepon</label>
  <div class="col-sm-9">
    <input type="text" class="form-control" name="telepon" placeholder="No Telepon" value="<?php echo $pemasok->telepon ?>" required>
  </div>
</div>

	      <div class="form-group row">
	        <label for="ok" class="col-sm-3 col-form-label"></label>
	        <div class="col-sm-9">
	        	<button type="submit" class="btn btn-primary">
	            <i class="fa fa-save"></i> Simpan Data
	          </button>
	          <button type="reset" class="btn btn-info">
	            <i class="fa fa-times"></i> Reset
	          </button>
	          <a href="<?php echo base_url('pemasok') ?>" class="btn btn-default">
	          	<i class="fa fa-backward"></i> Kembali
	          	</a> 
	        </div>
	      </div>

<?php
//form edit close
echo form_close();
?>