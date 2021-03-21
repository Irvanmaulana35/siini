<footer class="main-footer">
    <div class="pull-right hidden-xs"><b>Versi</b> 1.2</div><strong>Hak Cipta &copy; <?php echo date('Y'); ?> &nbsp;<a href="<?= base_URL() ?>">SIINI</a></strong>
</footer>
</div>

<script src="<?= base_URL() ?>public/plugins/jquery/dist/jquery.min.js"></script>
<script src="<?= base_URL() ?>public/plugins/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?= base_URL() ?>public/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="<?= base_URL() ?>public/plugins/fastclick/lib/fastclick.js"></script>
<script src="<?= base_URL() ?>public/js/adminlte.min.js"></script>
<script src="<?= base_URL() ?>public/plugins/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_URL() ?>public/plugins/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script>
    $(function() {
        $('#example1').DataTable();
        $('#example2').DataTable({
            'paging': true,
            'lengthChange': false,
            'searching': false,
            'ordering': true,
            'info': true,
            'autoWidth': false
        })
    })
</script>
<script src="<?= base_URL() ?>public/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="<?= base_URL() ?>public/plugins/iCheck/icheck.min.js"></script>
<!--Page script -->
<script>
    $(function() {
        Datepicker.$('#datepicker').datepicker({
            autoclose: true,
            format: "yyyy-mm-dd",
            orientation: "auto",
            todayBtn: true,
            todayHighlight: true
        });
    });
</script>

<script>
    $("#alert").fadeTo(3000, 500).slideUp(500, function() {
        $("#alert").alert('close');
    });
</script>
</body>

</html>