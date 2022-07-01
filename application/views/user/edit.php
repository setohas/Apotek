<?php 
//form edit open
echo form_open(base_url('user/edit/'.$user->id_user));
?>

<div class="form-group row">
                <label for="nama_user" class="col-sm-3 col-form-label">Nama User</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="nama_user" placeholder="Nama User" value="<?php echo $user->nama_user ?>" required>
                </div>
              </div>

          <div class="form-group row">
                <label for="email" class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-9">
                  <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo $user->email ?>" required>
                </div>
              </div> 

          <div class="form-group row">
                <label for="username" class="col-sm-3 col-form-label">Username</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="username" placeholder="Username" value="<?php echo $user->username ?>" required>
                </div>
              </div>   

          <div class="form-group row">
                <label for="password" class="col-sm-3 col-form-label">Password</label>
                <div class="col-sm-9">
                  <input type="password" class="form-control" name="password" placeholder="Password" value="<?php echo $user->password ?>">
                  <small class="text-danger">Min 6 atau Max 20 untuk ubah password atau kosong untuk password tetap.</small>
                </div>
              </div>

          <div class="form-group row">
                <label for="akses_level" class="col-sm-3 col-form-label">Jabatan</label>
                <div class="col-sm-9">
                  <select name="akses_level" class="form-control">
                    <option value="Apoteker">Apoteker</option>
                    <option value="Kepala Apoteker" <?php if($user->akses_level=="Kepala Apoteker") {echo "selected";}?>>Kepala Apoteker</option>
                  </select>
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
	          <a href="<?php echo base_url('user') ?>" class="btn btn-default">
	          	<i class="fa fa-backward"></i> Kembali
	          	</a> 
	        </div>
	      </div>

<?php
//form edit close
echo form_close();
?>