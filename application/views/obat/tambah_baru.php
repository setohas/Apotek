<?php
//form open
echo form_open(base_url('obat/tambah'));
?>

<div class="form-group row">
  <label for="nama_obat" class="col-sm-3 col-form-label">Nama Obat</label>
  <div class="col-sm-9">
    <input type="text" class="form-control" name="nama_obat" placeholder="Nama Obat" value="<?php echo set_value('nama_obat') ?>" required>
  </div>
</div>

<div class="form-group row">
  <label for="stok" class="col-sm-3 col-form-label">Stok</label>
  <div class="col-sm-9">
    <input type="number" class="form-control" name="stok" placeholder="Stok" value="" min="0"required>
  </div>
</div>

<div class="form-group row">
  <label for="penyimpanan" class="col-sm-3 col-form-label">Penyimpanan</label>
  <div class="col-sm-9">
    <input type="text" class="form-control" name="penyimpanan" placeholder="Penyimpanan" value="" required>
  </div>
</div> 

<div class="form-group row">
  <label for="bentuk" class="col-sm-3 col-form-label">Bentuk</label>
  <div class="col-sm-9">
    <select name="bentuk" class="form-control" required>
      <option value="">Pilih Bentuk Obat...</option>
      <option value="tablet">Tablet</option>
      <option value="kapsul">Kapsul</option>
      <option value="kaplet">Kaplet</option>
      <option value="pil">Pil</option>
      <option value="serbuk">Serbuk</option>
      <option value="suppositoria ">Suppositoria</option>
      <option value="oles">Oles</option>
      <option value="cair">Cair</option>
      <option value="suspensi">Suspensi</option>
      <option value="injeksi">Injeksi</option>
      <option value="tetes">Tetes</option>
      <option value="inhaler">Inhaler</option>
    </select>
  </div>
</div>   

<div class="form-group row">
  <label for="kadaluwarsa" class="col-sm-3 col-form-label">Kadaluwarsa</label>
  <div class="col-sm-9">
    <input type="text" class="form-control tanggal" name="kadaluwarsa" placeholder="dd-mm-yyyy" value="" required>
  </div>
</div>

<div class="form-group row">
  <label for="deskripsi" class="col-sm-3 col-form-label">Deskripsi</label>
  <div class="col-sm-9">
    <textarea name="deskripsi" class="form-control" placeholder="Deskripsi" <?php echo set_value('deskripsi')?>></textarea>
  </div>
</div>

<div class="form-group row">
  <label for="harga_beli" class="col-sm-3 col-form-label">Harga Beli (Rp)</label>
  <div class="col-sm-9">
    <input type="number" class="form-control" name="harga_beli" placeholder="Harga Beli" value="<?php echo set_value('harga_beli') ?>" required>
  </div>
</div>

<div class="form-group row">
  <label for="harga_jual" class="col-sm-3 col-form-label">Harga Jual (Rp)</label>
  <div class="col-sm-9">
    <input type="number" class="form-control" name="harga_jual" placeholder="Harga Jual" value="<?php echo set_value('harga_jual') ?>" required>
  </div>
</div>

<div class="form-group row">
  <label for="nama_pemasok" class="col-sm-3 col-form-label">Pemasok</label>
  <div class="col-sm-9">
    <select name="nama_pemasok" class="form-control" required>
      <option value=""> Pilih Pemasok... </option>
      <!-- Ambil data obat dari controller -->
      <?php foreach($pemasok as $pemasok){ ?>
        <option value="<?php echo $pemasok->nama_pemasok ?>">
          <?php echo $pemasok->nama_pemasok ?>
          </option>
      <?php } ?>
    </select>
  </div>
</div>

<div class="form-group row">
  <label for="simpan" class="col-sm-3 col-form-label"></label>
  <div class="col-sm-9">
    <button type="submit" name="submit" class="btn btn-success btn-lg">
     <i class="fa fa-save"></i> Simpan Data Pasien
   </button>
   <a href="<?php echo base_url('obat') ?>" class="btn btn-info btn-lg">
     <i class="fa fa-backward"></i> Kembali
   </a>
 </div>
</div>

<?php 
//form close
echo form_close();
?>