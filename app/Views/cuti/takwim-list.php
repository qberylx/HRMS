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
					<h3 class="box-title">Senarai Takwim</h3>
					</div>
					<div class="box-body">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th class="text-center" style="width: 10px">#</th>
                                    <th class="text-center">Nama Cuti</th>
                                    <th class="text-center">Tarikh Cuti</th>
                                    <th class="text-center">Jenis Cuti</th>
                                    <th class="text-center">Tindakan</th>
                                </tr>
                                <?php
                                    $count = 1;
                                    foreach ($senarai_takwim as $val) {
                                ?>
                                    <tr>
                                        <td><?=$count?>.</td>
                                        <td><?=$val->leave_name?></td>
                                        <td class="text-center"><?php echo date("d/m/Y",strtotime($val->leave_date));?></td>
                                        <td class="text-center"><?=$val->description?></td>
                                        <td class="text-center">
											<a type="button" href="<?=site_url('cuti/delcuti/'.$val->id)?>" class="btn btn-danger"><i class="fa fa-remove"></i></a>
										</td>
                                    </tr>
                                <?php
                                    $count++;
                                    }
                                ?>
                            </tbody>
                        </table>
						<div class="pull-right">
							<?//= $pager?>
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
