<div class="modal fade" id="modal-default">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah Pemasok Baru</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <div class="form-group row">
          <label for="nama_pemasok" class="col-sm-3 col-form-label">Nama Pemasok</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" name="nama_pemasok" placeholder="Nama Pemasok" value="<?php echo set_value("nama_pemasok") ?>" required>
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
            <input type="text" class="form-control" name="telepon" placeholder="No Telepon" value="<?php echo set_value("nama_pemasok") ?>" required>
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