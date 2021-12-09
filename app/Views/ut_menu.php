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
                        <h3 class="box-title">Menu</h3>
                        </div>
                        <div class="box-body">
                            <?=form_open_multipart("submit/mainmenu")?>
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2">
                                    <div class="form-group">
                                        <label>Menu Name</label>
                                        <input type="text" class="form-control" name="namamenu" id="namamenu">
                                    </div>
                                    <div class="pull-right">
                                        <button type="submit" class="btn btn-block btn-primary">Add Menu</button>
                                    </div>
                                </div>
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
                                        <th>Order</th>
                                        <th>Menu Name</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                    <?php
                                        foreach ($senaraimenu as $val) {
                                    ?>
                                        <tr>
                                            <td><?=$val->urutan?></td>
                                            <td><?=$val->nama_menu?></td>
                                            <td class="text-center">
                                                <a type="button" href="<?=site_url('utilities/menu_up/'.$val->id)?>" class="btn btn-info"><i class="fa fa-arrow-up"></i></a>
                                                <a type="button" href="<?=site_url('utilities/menu_down/'.$val->id)?>" class="btn btn-warning"><i class="fa fa-arrow-down"></i></a>
                                                <a type="button" href="<?=site_url('utilities/menulvl1/'.$val->id)?>" class="btn btn-success"><i class="fa fa-plus"></i></a>
                                                <button type="button" value="<?=site_url('utilities/delmenu/'.$val->id)?>" class="btn btn-danger del-menu"><i class="fa fa-remove"></i></button>
                                            </td>
                                        </tr>
                                    <?php
                                        }
                                    ?>
                                </tbody>
                            </table>
                            <div class="modal modal-danger fade" id="confirm-modal-danger">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span></button>
                                    <h4 class="modal-title">Confirmation</h4>
                                    </div>
                                    <div class="modal-body">
                                    <p>Are you sure you want to delete this menu and submenu(s) under this menu?</p>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-outline pull-left" id="confirmCancel" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-outline" id="confirmOk">Confirm</button>
                                    </div>
                                </div>
                                <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
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
