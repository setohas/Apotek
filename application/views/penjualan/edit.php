<?php 
echo form_open (base_url('penjualan/edit/'.$penjualan->kode_penjualan));
?>

<div class="form-group row">
  <label for="nama_pembeli" class="col-sm-3 text-right">Nama Pembeli</label>
  <div class="col-sm-6">
    <input type="text" name="nama_pembeli" class="form-control" placeholder="Nama Pembeli" value="<?php echo set_value('nama_pembeli') ?>" required>
  </div>
</div>

<div class="form-group row">
  <label for="tanggal_jual" class="col-sm-3 text-right">Tanggal Pembelian</label>
  <div class="col-sm-6">
    <input type="text" name="tanggal_jual" class="form-control tanggal" placeholder="Tanggal Pembelian" value="<?php echo set_value('tanggal_jual') ?>" required>
  </div>
</div>

<div class="form-group row">
  <label for="nama_obat" class="col-sm-3 text-right">Nama Obat</label>
  <div class="col-sm-6">
    <select name="nama_obat" class="form-control select2" required>
      <option value=""> Obat Yang Dijual </option>
      <!-- Ambil data obat dari controller -->
      <?php foreach($obat as $obat){ ?>
        <option value=" <<?php echo $obat->id_obat ?>"><?php echo $obat->nama_obat ?></option>
      <<?php } ?>
    </select>
  </div>
</div>

<div class="form-group row">
  <label for="banyak" class="col-sm-3 text-right">Banyak Pembelian</label>
  <div class="col-sm-6">
    <input type="number" name="banyak" class="form-control" placeholder="Banyak Pembelian" value="<?php echo set_value('banyak') ?>" required>
  </div>
</div>

<div class="form-group row">
  <label for="simpan" class="col-sm-3 col-form-label"></label>
  <div class="col-sm-9">
    <button type="submit" name="submit" class="btn btn-success btn-lg">
     <i class="fa fa-save"></i> Simpan Data Pasien
   </button>
   <a href="<?php echo base_url('penjualan') ?>" class="btn btn-info btn-lg">
     <i class="fa fa-backward"></i> Batal
   </a>
 </div>
</div>

<?php 
echo form_close();
 ?>