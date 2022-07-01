<?php
//form open
echo form_open(base_url('pemasok/tambah'));
?>

<div class="form-group row">
  <label for="nama_pemasok" class="col-sm-3 col-form-label">Nama Pemasok</label>
  <div class="col-sm-9">
    <input type="text" class="form-control" name="nama_pemasok" placeholder="Nama Pemasok" value="<?php echo set_value('nama_pemasok') ?>" required>
  </div>
</div>

<div class="form-group row">
  <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
  <div class="col-sm-9">
    <textarea type="text" name="alamat" class="form-control" placeholder="Alamat" value="<?php echo set_value("alamat") ?>" required></textarea>
  </div>
</div>

<div class="form-group row">
  <label for="telepon" class="col-sm-3 col-form-label">No Telepon</label>
  <div class="col-sm-9">
    <input type="text" class="form-control" name="telepon" placeholder="No Telepon" value="<?php echo set_value('telepon') ?>" required>
  </div>
</div> 

<div class="form-group row">
  <label for="simpan" class="col-sm-3 col-form-label"></label>
  <div class="col-sm-9">
    <button type="submit" name="submit" class="btn btn-success btn-lg">
     <i class="fa fa-save"></i> Simpan Data Pasien
   </button>
   <a href="<?php echo base_url('pemasok') ?>" class="btn btn-info btn-lg">
     <i class="fa fa-backward"></i> Kembali
   </a>
 </div>
</div>

<?php 
//form close
echo form_close();
?>