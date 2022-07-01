</div>
<!-- card header -->
</div>
<!-- card body -->
</div>
<!-- col-md-12 -->
</div>
<!-- /.row (main row) -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<footer class="main-footer">
  <strong><b>Jl. Taman Barat No. 18 RT 02 Taman Sidoarjo - </b> Tlp. 031 34027157 </strong>
  <div class="float-right d-none d-sm-inline-block">
    <a href="<?php base_url('dashboard') ?>">Apotek Sumber Jaya </a>Copyright&copy;2022
  </div>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo base_url() ?>assets/admin/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url() ?>assets/admin/plugins/jquery-ui/jquery-ui.min.js"></script>
<?php 
$sekarang = date('Y');
$jarak    = 40;
$dahulu   = $sekarang - $jarak;
$masa     = $sekarang + $jarak;
?>
<script>
  $( function() {
    $( ".tanggal" ).datepicker({
      "changeYear"  : true,
      "changeMonth" : true,
      "dateFormat"  : "dd-mm-yy",
      "yearRange"   : "<?php echo $dahulu ?>:<?php echo $masa ?>"
    });
  } );
</script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url() ?>assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo base_url() ?>assets/admin/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url() ?>assets/admin/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?php echo base_url() ?>assets/admin/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?php echo base_url() ?>assets/admin/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url() ?>assets/admin/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url() ?>assets/admin/plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url() ?>assets/admin/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url() ?>assets/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?php echo base_url() ?>assets/admin/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url() ?>assets/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?php echo base_url() ?>assets/admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>assets/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url() ?>assets/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url() ?>assets/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo base_url() ?>assets/admin/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url() ?>assets/admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo base_url() ?>assets/admin/plugins/jszip/jszip.min.js"></script>
<script src="<?php echo base_url() ?>assets/admin/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?php echo base_url() ?>assets/admin/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?php echo base_url() ?>assets/admin/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url() ?>assets/admin/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url() ?>assets/admin/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>assets/admin/dist/js/adminlte.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#tabel1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#tabel1_wrapper .col-md-6:eq(0)');
    $('#tabel2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
    $("#tabel3").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#tabel3_wrapper .col-md-6:eq(0)');
  });
</script>

<!-- Fungsi tambah item obat di penjualan -->
<script>
 let arrayObat = [];
 $('.form-obat table .btn-remove-item').on('click', function() {
  if (arrayObat.length == 0) return alert('Belum ada item obat dipilih!');
  arrayObat = [];
  $('.form-obat table tbody').html('');
  $('.form-obat #data_obat').val('');
  countGrandTotal();
})
 $('.form-obat .add-item-obat').on('click', function(e) {
  let id_obat = $('.form-obat #obat').val();
  if (! id_obat) return alert('Kode obat tidak valid');
  if (arrayObat.filter(item => item.id_obat == id_obat).length > 0) return alert('Data Obat Sudah Dipilih');
  if (arrayObat.length == 0) $('.form-obat table tbody .item-kosong').hide();
  $.getJSON(`../obat/getAjax/${id_obat}`, function(data, status, xhr) {
    let html = `
    <tr id="${data.id_obat}">
    <td><button data-id_obat="${data.id_obat}" type="button" class="btn-remove-obat btn btn-circle btn-danger btn-sm"><i class="fa fa-trash"></i></button></td>
    <td>${data.nama_obat}</td>
    <td>${data.bentuk}</td>
    <td>${data.stok}</td>
    <td>Rp. ${data.harga_jual}</td>
    <td width="100"><input data-harga_jual="${data.harga_jual}" data-id_obat="${data.id_obat}" type="number" class="form-control jumlah" value="1" min="1" max="${data.stok}"/></td>
    <td>Rp. ${data.harga_jual}</td>
    </tr>
    `;
    arrayObat.push({
      id_obat: data.id_obat,
      jumlah: 1,
      total: data.harga_jual
    });
    let grand_total = 0;
    arrayObat.forEach(val => grand_total = grand_total + parseInt(val.total));
    $('.form-obat table tbody').append(html)
    $('.form-obat table tfoot').show();
    $('.form-obat .grand-total').html(`<h4>Rp.${grand_total}</h4>`)
    $('#grandtotal').val(grand_total);
    $('.form-obat #data_obat').val(JSON.stringify(arrayObat));
  })
})
 $('.form-obat table').on('click', '.btn-remove-obat', function() {
  $(this).parent().parent().remove();
  let id_obat = $(this).data('id_obat');
  arrayObat = arrayObat.filter(e => e.id_obat != id_obat);
  $('.form-obat #data_obat').val(JSON.stringify(arrayObat));
  countGrandTotal();
})
 $('.form-obat table').on('change', '.jumlah', function() {
  let id_obat = $(this).data('id_obat');
  let jumlah = $(this).val();
  let harga_jual = $(this).data('harga_jual');
  let total = harga_jual * jumlah;
  $(`.form-obat #${id_obat} td:last`).html(`Rp.${total}`)
  objIndex = arrayObat.findIndex((obj => obj.id_obat == id_obat));
  arrayObat[objIndex].jumlah = jumlah;
  arrayObat[objIndex].total = total;
  countGrandTotal();
  $('.form-obat #data_obat').val(JSON.stringify(arrayObat));
})
 function countGrandTotal() {
  let grand_total = 0;
  arrayObat.forEach(val => grand_total = grand_total + parseInt(val.total));
  if (grand_total <= 0) {
    $('.form-obat table tfoot').hide();
    $('.form-obat table tbody .item-kosong').show();
  }
  $('.form-obat .grand-total').html(`<h4>Rp.${grand_total}</h4>`)
  $('#grandtotal').val(grand_total);
}
</script>
</body>
</html>
