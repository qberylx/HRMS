<!-- jQuery 3 -->
<script src="<?=base_url("vendor/almasaeed2010/adminlte/")?>/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?=base_url("vendor/almasaeed2010/adminlte/")?>/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?=base_url("vendor/almasaeed2010/adminlte/")?>/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?=base_url("vendor/almasaeed2010/adminlte/")?>/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url("vendor/almasaeed2010/adminlte/")?>/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=base_url("vendor/almasaeed2010/adminlte/")?>/dist/js/demo.js"></script>
<!-- main javascript/jquery code -->
<script src="<?=base_url("assets/js/")?>/main.js"></script>
<script>
$(document).ready(function () {
    $('.sidebar-menu').tree()

    setInterval(clock, 1000);

    function clock() {
        var livetime = new Date().toString();
        $(".live-clock").html(livetime)
    }
})

$(document).on("change", ".custom-file-input", function() {
    var files = Array.from(this.files)
    var fileName = files.map(f =>{return f.name}).join(", ")
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>