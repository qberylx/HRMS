<!DOCTYPE html>
<html>
	<?=$head?>
    
    <body class="hold-transition skin-blue sidebar-mini">
		<!-- Site wrapper -->
		<div class="wrapper">

			<?=$headermenu?>
            
			<!-- =============================================== -->

			<?=$sidemenu?>

			<!-- =============================================== -->

			<!-- Content Wrapper. Contains page content -->
			<div class="content-wrapper">
				<!-- Main content -->
				<section class="content">
				<!-- Default box -->
				    <?=$alert?>
                    <div class="box box-primary">
                    <div class="callout callout-danger">
                        <h4>Alert callout!</h4>

                        <p>Your Leave's Setting has not been set up yet. Please contact your administrator to set up your Leave's Setting first.</p>
                    </div>
                        
                        
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <span class="pull-right live-clock">
                                
                            </span>
                        </div>
                        <!-- /.box-footer-->
                    </div>
                    <!-- /.box -->

					

                    </section>
				<!-- /.content -->
            </div>
            <footer class="main-footer">
				<div class="pull-right hidden-xs">
				<b>Version</b> 2.4.0
				</div>
				<strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
				reserved.
			</footer>
			<?=$control_sidebar?>

			<!-- Add the sidebar's background. This div must be placed
				immediately after the control sidebar -->
			<div class="control-sidebar-bg"></div>
		</div>
		<!-- ./wrapper -->

		<?=$foot?>

	</body>
    <script>
        //$(document).ready(function(){
            //Dropzone.autoDiscover = false;

            Dropzone.options.fileupload  = {
                maxFiles: 1,
                autoProcessQueue: true,
                acceptedFiles:"image/*"
            
            }
            //);
            </script>
    </script>
</html>
