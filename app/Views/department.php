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
                        <h3 class="box-title">Department</h3>
                        </div>
                        <div class="box-body">
                            <?=form_open_multipart("utilities/submit_department")?>
                                
                                <div class="form-group">
                                    <label>Nama (BM)</label>
                                    <input type="text" class="form-control" name="name_bm" id="name_bm">
                                </div>
                                <div class="form-group">
                                    <label>Nama (BI)</label>
                                    <input type="text" class="form-control" name="name_bi" id="name_bi">
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

                    <div class="box box-primary">
                        <div class="box-header with-border">
                        <h3 class="box-title">Senarai Menu</h3>
                        </div>
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-bordered">
                                <tbody><tr>
                                        <th>#</th>
                                        <th>Nama (BM)</th>
                                        <th>Nama (BI)</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                    <?php
                                        $i = 0;
                                        foreach ($senaraidept as $val) {
                                            $i++;
                                    ?>
                                        <tr>
                                            <td><?=$i?></td>
                                            <td><?=$val->name_bm?></td>
                                            <td><?=$val->name_bi?></td>
                                            <td class="text-center">
                                                <a type="button" href="<?=site_url('utilities/deldepartment/'.$val->id)?>" class="btn btn-danger"><i class="fa fa-remove"></i></a>
                                            </td>
                                        </tr>
                                    <?php
                                        }
                                    ?>
                                </tbody>
                            </table>
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
			<!-- /.content-wrapper -->

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
