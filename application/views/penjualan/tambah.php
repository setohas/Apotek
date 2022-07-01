<form action="" method="post" class="form-obat">
  <input type="text" name="data_obat" id="data_obat">

  <div class="form-group row">
    <label for="kode_penjualan" class="col-sm-3 text-right">Kode Penjualan</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" name="kode_penjualan" id="kode_penjualan" value="<?php echo $kode_penjualan ?>" readonly>
    </div>
  </div>

  <div class="form-group row">
    <label for="nama_pembeli" class="col-sm-3 text-right">Nama Pembeli</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" name="nama_pembeli" id="nama_pembeli" placeholder="Nama Pembeli" value="<?php echo set_value('nama_pembeli') ?>">
    </div>
  </div>

  <div class="form-group row">
    <label for="tanggal_jual" class="col-sm-3 text-right">Tanggal Transaksi</label>
    <div class="col-sm-5">
      <input type="text" class="form-control tanggal" name="tanggal_jual" placeholder="dd-mm-yyyy" value="<?php echo date('d-m-Y') ?>" required>
    </div>
  </div>

  <div class="form-group row">
    <label for="obat" class="col-sm-3 text-right">Obat</label>
    <div class="col-sm-6">
      <div class="input-group">
        <select class="custom-select" id="obat" aria-label="Example select with button addon">
          <option value="">Pilih Obat </option>
          <!-- Ambil Obat Jual -->
          <?php foreach($obat as $ob) : ?>
            <option value="<?php echo $ob->id_obat; ?>"><?php echo $ob->nama_obat; ?></option>
          <?php endforeach ?>
        </select>
        <div class="input-group-append">
          <button class="btn btn-primary add-item-obat" type="button" id="button-addon1">Tambah</button>
        </div>
      </div>
    </div>
  </div>
  <div class="table-responsive">
    <table class="table">
      <thead class="thead-success">
        <tr class="bg-dark text-white">
          <th scope="col">Opsi</th>
          <th scope="col">Nama Obat</th>
          <th scope="col">Bentuk</th>
          <th scope="col">Stok</th>
          <th scope="col">Harga</th>
          <th scope="col">Jumlah</th>
          <th scope="col">Total harga</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td colspan="7" class="item-kosong small" align="center">Belum ada item obat yang ditambahkan.</td>
        </tr>
        <tfoot style="display:none">
          <tr class="bg-light">
            <th colspan="6" class="text-right">Total Pembayaran : </th>
            <th><span class="grand-total" style=" color: blue;"></span></th>
          </tr>
          <td>
            <input type="hidden" id="grandtotal" name="grandtotal" type="text" class="form-control grandtotal " readonly>
          </td>

        </tfoot>
      </table>
    </div>
    <p class="text-center">
    <button type="submit" name="submit" class="btn btn-sm btn-success btn-lg"><i class="fa fa-save"></i> Simpan</button>
    </p>
  </form>