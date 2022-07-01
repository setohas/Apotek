<div class="modal fade" id="modal-default">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah Obat Baru</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <div class="form-group row">
          <label for="nama_obat" class="col-sm-3 col-form-label">Nama Obat</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" name="nama_obat" placeholder="Nama Obat" value="<?php echo set_value('nama_obat') ?>" required>
          </div>
        </div>

        <div class="form-group row">
          <label for="stok" class="col-sm-3 col-form-label">Stok</label>
          <div class="col-sm-9">
            <input type="number" class="form-control" name="stok" placeholder="Stok" value="<?php echo set_value('stok') ?>" min="0" required>
          </div>
        </div>

        <div class="form-group row">
          <label for="penyimpanan" class="col-sm-3 col-form-label">Penyimpanan</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" name="penyimpanan" placeholder="Penyimpanan" value="<?php echo set_value('penyimpanan') ?>" required>
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
            <input type="text" class="form-control tanggal" name="kadaluwarsa" placeholder="dd-mm-yyyy" value="<?php echo set_value('kadaluwarsa') ?>" required>
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
            <select name="nama_pemasok" class="form-control select" required>
              <option value=""> Pilih Pemasok... </option>
              <!-- Ambil data obat dari controller -->
              <?php foreach($pemasok as $pemasok): ?>
                <option value="<?php echo $pemasok->nama_pemasok ?>">
                  <?php echo $pemasok->nama_pemasok ?>
                </option>
              <?php endforeach ?>
            </select>
          </div>
        </div>

      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">
          <i class="fa fa-times"></i> Tutup
        </button>
        <button type="submit" class="btn btn-primary">
          <i class="fa fa-save"></i> Simpan Data
        </button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>