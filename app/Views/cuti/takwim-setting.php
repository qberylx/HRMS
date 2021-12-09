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
                        <div class="box-header with-border">
                        <h3 class="box-title">Takwim Setting</h3>
                        </div>
                        <div class="box-body">
                            <?=form_open_multipart("cuti/application")?>
                                
                                <div class="form-group">
                                <label><i class="fa fa-calendar-check-o"></i> Leave Name</label>
                                    <input type="text" class="form-control" name="leave_name" id="leave_name">
                                </div>
                            
                                <!-- Date -->
                                <div class="form-group">
                                    <label>Date:</label>

                                    <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control pull-right datepicker" id="leave_date" name="leave_date" autocomplete="off">
                                    </div>
                                    <!-- /.input group -->
                                </div>
                                <!-- /.form group -->
                                
                                <div class="form-group">
                                <label>Leave Type: </label>
                                    <select class="form-control" name="leave_type"  id="leave_type">
                                        <?php
                                            foreach ($jenistakwim as $val) {
                                                echo '<option value="'.$val->code.'">'.$val->description.'</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                                
                                
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-block btn-primary">Submit</button>
                                </div>
                            </form>
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
</html>
