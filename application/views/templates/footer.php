<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Sistem Informasi Akademik Terpadu SMK Muhammaiyah 1 Genteng <?= date('Y'); ?></span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url('auth/logout') ?>">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/') ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="<?= base_url('assets/') ?>jquery-ui/jquery-ui.min.js"></script> Load file plugin js jquery-ui
    <script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/') ?>js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="<?= base_url('assets/')?>datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/')?>datatables/dataTables.bootstrap4.min.js"></script>

<script>
    $(document).ready(function() {
        $('.input-tanggal').datepicker({
            dateFormat: 'yy-mm-dd' // Set format tanggalnya jadi yyyy-mm-dd
        });

        $('#form-tanggal, #form-bulan, #form-tahun').hide(); // Sebagai default kita sembunyikan form filter tanggal, bulan & tahunnya

        $('#filter').change(function(){ // Ketika user memilih filter
            if($(this).val() == '1'){ // Jika filter nya 1 (per tanggal)
                $('#form-bulan, #form-tahun').hide(); // Sembunyikan form bulan dan tahun
                $('#form-tanggal').show(); // Tampilkan form tanggal
            }else if($(this).val() == '2'){ // Jika filter nya 2 (per bulan)
                $('#form-tanggal').hide(); // Sembunyikan form tanggal
                $('#form-bulan, #form-tahun').show(); // Tampilkan form bulan dan tahun
            }else{ // Jika filternya 3 (per tahun)
                $('#form-tanggal, #form-bulan').hide(); // Sembunyikan form tanggal dan bulan
                $('#form-tahun').show(); // Tampilkan form tahun
            }

            $('#form-tanggal input, #form-bulan select, #form-tahun select').val(''); // Clear data pada textbox tanggal, combobox bulan & tahun
  $('#dataTable').DataTable();
  $('#dataTable1').DataTable()
  $('#dataTable2').DataTable()
  $('#dataTable3').DataTable()
  $('#dataTable4').DataTable()
  $('#dataTable5').DataTable()
  $('#dataTable6').DataTable()
  $('#dataTable7').DataTable()
  $('#dataTable8').DataTable()
  $('#dataTable9').DataTable()
  $('#dataTable10').DataTable()
  $('#dataTable11').DataTable()
  $('#dataTable12').DataTable()
  $('#dataTable13').DataTable()
  $('#dataTable14').DataTable()
  $('#dataTable15').DataTable()
  $('#dataTable16').DataTable()
});
$('.custom-file-input').on('change', function() {
    let fileName = $(this).val().split('\\').pop();
    $(this).next('.custom-file-label').addClass("selected").html(fileName);
})

$('.form-check-input').on('click', function() {
    const menuId = $(this).data('menu');
    const roleId = $(this).data('role');

    $.ajax({
        url: "<?= base_url('admin/changeaccess'); ?>",
        type: 'post',
        data: {
            menuId: menuId,
            roleId: roleId
        },
        success: function() {
            document.location.href = "<?= base_url('admin/roleaccess/'); ?>" + roleId;
        }
    });
});
</script>

</body>
</html>