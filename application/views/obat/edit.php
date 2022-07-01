<?php 
//form edit open
echo form_open(base_url('obat/edit/'.$obat->id_obat));
?>

<div class="form-group row">
  <label for="nama_obat" class="col-sm-3 col-form-label">Nama Obat</label>
  <div class="col-sm-9">
    <input type="text" class="form-control" name="nama_obat" placeholder="Nama Obat" value="<?php echo $obat->nama_obat ?>" required>
  </div>
</div>

<div class="form-group row">
  <label for="stok" class="col-sm-3 col-form-label">Stok</label>
  <div class="col-sm-9">
    <input type="number" class="form-control" name="stok" placeholder="Stok" value="<?php echo $obat->stok ?>" required>
  </div>
</div>

<div class="form-group row">
  <label for="penyimpanan" class="col-sm-3 col-form-label">Penyimpanan</label>
  <div class="col-sm-9">
    <input type="text" class="form-control" name="penyimpanan" placeholder="Penyimpanan" value="<?php echo $obat->penyimpanan ?>" required>
  </div>
</div> 

<div class="form-group row">
  <label for="bentuk" class="col-sm-3 col-form-label">Bentuk</label>
  <div class="col-sm-9">
    <select name="bentuk" class="form-control" required>
      <option value="">Pilih Bentuk Obat...</option>
      <option value="tablet"  <?php if($obat->bentuk=="tablet") {echo "selected";}?>>Tablet</option>
      <option value="kapsul"  <?php if($obat->bentuk=="kapsul") {echo "selected";}?>>Kapsul</option>
      <option value="kaplet"  <?php if($obat->bentuk=="kaplet") {echo "selected";}?>>Kaplet</option>
      <option value="pil"     <?php if($obat->bentuk=="pil") {echo "selected";}?>>pil</option>
      <option value="serbuk"  <?php if($obat->bentuk=="serbuk") {echo "selected";}?>>Serbuk</option>
      <option value="suppositoria " <?php if($obat->bentuk=="suppositoria") {echo "selected";}?>>Suppositoria</option>
      <option value="oles"    <?php if($obat->bentuk=="oles") {echo "selected";}?>>Oles</option>
      <option value="cair"    <?php if($obat->bentuk=="cair") {echo "selected";}?>>Cair</option>
      <option value="suspensi"<?php if($obat->bentuk=="suspensi") {echo "selected";}?>>Suspensi</option>
      <option value="injeksi  <?php if($obat->bentuk=="ijeksi") {echo "selected";}?>">Injeksi</option>
      <option value="tetes"   <?php if($obat->bentuk=="tetes") {echo "selected";}?>>Tetes</option>
      <option value="inhaler" <?php if($obat->bentuk=="inhaler") {echo "selected";}?>>Inhaler</option>
    </select>
  </div>
</div>   

<div class="form-group row">
  <label for="kadaluwarsa" class="col-sm-3 col-form-label">Kadaluwarsa</label>
  <div class="col-sm-9">
    <input type="text" class="form-control tanggal" name="kadaluwarsa" placeholder="dd-mm-yyyy" value="<?php echo date('d-m-y',strtotime($obat->kadaluwarsa)) ?>" required>
  </div>
</div>

<div class="form-group row">
  <label for="deskripsi" class="col-sm-3 col-form-label">Deskripsi</label>
  <div class="col-sm-9">
    <textarea name="deskripsi" class="form-control" placeholder="Deskripsi"><?php echo $obat->deskripsi ?></textarea>
  </div>
</div>

<div class="form-group row">
  <label for="harga_beli" class="col-sm-3 col-form-label">Harga Beli (Rp)</label>
  <div class="col-sm-9">
    <input type="number" class="form-control" name="harga_beli" placeholder="Harga Beli" value="<?php echo $obat->harga_beli ?>" required>
  </div>
</div>

<div class="form-group row">
  <label for="harga_jual" class="col-sm-3 col-form-label">Harga Jual (Rp)</label>
  <div class="col-sm-9">
    <input type="number" class="form-control" name="harga_jual" placeholder="Harga Jual" value="<?php echo $obat->harga_jual ?>" required>
  </div>
</div>

<div class="form-group row">
  <label for="nama_pemasok" class="col-sm-3 col-form-label">Pemasok</label>
  <div class="col-sm-9">
    <select name="nama_pemasok" class="form-control select" required>
      <option value=""> Pilih Pemasok... </option>
      <!-- Ambil data obat dari controller -->
      <?php foreach($pemasok as $pemasok){ ?>
        <option value="<?php echo $pemasok->nama_pemasok ?>" <?php if($pemasok->nama_pemasok==$obat->nama_pemasok){echo 'selected';} ?>>
          <?php echo $pemasok->nama_pemasok ?>
        </option>
      <?php } ?>
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
    <a href="<?php echo base_url('obat') ?>" class="btn btn-default">
      <i class="fa fa-backward"></i> Kembali
    </a> 
  </div>
</div>

<?php
//form edit close
echo form_close();
?>