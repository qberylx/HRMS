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
                        <h3 class="box-title">Tetapan Menu</h3>
                        </div>
                        <div class="box-body">
                            <?=form_open_multipart("submit/mainmenu")?>
                                <div class="form-group">
                                    <label>Nama Menu</label>
                                    <input type="text" class="form-control" name="namamenu" id="namamenu">
                                </div>
                                <div class="form-group">
                                    <label>Parent</label>
                                    <select class="form-control" name="menuParent"  id="menuParent">
                                        <option value="0">Tiada</option>
                                        <?php
                                            foreach ($senarailvl0 as $val) {
                                                echo '<option value="'.$val->id.'">'.$val->nama_menu.'</option>';
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>URL</label>
                                    <input type="text" class="form-control" name="menuURL" id="menuURL">
                                </div>

                                <div class="pull-right">
                                    <button type="submit" class="btn btn-block btn-primary">Add Menu</button>
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
                            <table class="table table-hover">
                                <tbody><tr>
                                        <th>Urutan</th>
                                        <th>Nama Menu</th>
                                        <th>URL</th>
                                    </tr>
                                    <?php
                                        foreach ($senaraimenu as $val) {
                                    ?>
                                        <tr>
                                            <td><?=$val->urutan?></td>
                                            <td><?=$val->nama_menu?></td>
                                            <td><?=$val->menu_url?></td>
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
