<?php
//form open
echo form_open(base_url('user/tambah'));
?>

<div class="form-group row">
  <label for="nama_user" class="col-sm-3 col-form-label">Nama User</label>
  <div class="col-sm-9">
    <input type="text" class="form-control" name="nama_user" placeholder="Nama User" value="<?php echo set_value('nama_user') ?>" required>
  </div>
</div>

<div class="form-group row">
  <label for="email" class="col-sm-3 col-form-label">Email</label>
  <div class="col-sm-9">
    <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo set_value("email") ?>" required>
  </div>
</div> 

<div class="form-group row">
  <label for="username" class="col-sm-3 col-form-label">Username</label>
  <div class="col-sm-9">
    <input type="text" class="form-control" name="username" placeholder="Username" value="<?php echo set_value("username") ?>" required>
  </div>
</div>   

<div class="form-group row">
  <label for="password" class="col-sm-3 col-form-label">Password</label>
  <div class="col-sm-9">
    <input type="password" class="form-control" name="password" placeholder="Password" value="<?php echo set_value("password") ?>" required>
  </div>
</div>

<div class="form-group row">
  <label for="akses_level" class="col-sm-3 col-form-label">Jabatan</label>
  <div class="col-sm-9">
    <select name="akses_level" class="form-control">
      <option value="Apoteker">Apoteker</option>
      <option value="Kepala Apoterker">Kepala Apoteker</option>
    </select>
  </div>
</div>

<div class="form-group row">
  <label for="simpan" class="col-sm-3 col-form-label"></label>
  <div class="col-sm-9">
    <button type="submit" name="submit" class="btn btn-success btn-lg">
     <i class="fa fa-save"></i> Simpan Data Pasien
   </button>
   <a href="<?php echo base_url('user') ?>" class="btn btn-info btn-lg">
     <i class="fa fa-backward"></i> Kembali
   </a>
 </div>
</div>

<?php 
//form close
echo form_close();
?>