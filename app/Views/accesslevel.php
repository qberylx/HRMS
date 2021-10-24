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
                        <h3 class="box-title">Access Level</h3>
                        </div>
                        <div class="box-body">
                            <?=form_open("utilities/submit_accesslevel")?>
                                <div class="form-group">
                                    <label>Access Name</label>
                                    <input type="text" class="form-control" name="accessName" id="accessName">
                                </div>
                                
                                <div class="pull-right" role="group">
                                    <button type="submit" class="btn btn-primary">Add Menu</button>
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
                        <h3 class="box-title">Access Level List</h3>
                        </div>
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-bordered">
                                <tbody><tr>
                                        <th>#</th>
                                        <th>Access Name</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                    <?php
                                        $count = 1;
                                        foreach ($accesslvl_list as $val) {
                                    ?>
                                        <tr>
                                            <td><?=$count?></td>
                                            <td><?=$val->access_name?></td>
                                            <td class="text-center">
                                                <a type="button" href="<?=site_url('utilities/del_accesslevel/'.$val->id)?>" class="btn btn-danger btn-xs"><i class="fa fa-remove"></i></a>
                                            </td>
                                        </tr>
                                    <?php
                                        $count++;
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
