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
					<h3 class="box-title">Senarai Aduan</h3>
					</div>
					<div class="box-body">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th class="text-center" style="width: 10px">#</th>
                                    <th class="text-center">Ulasan</th>
                                    <th class="text-center">Sistem</th>
                                    <th class="text-center">Modul</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Tindakan</th>
                                </tr>
                                <?php
                                    $count = 1;
                                    foreach ($senarai_aduan as $val) {
                                ?>
                                    <tr>
                                        <td><?=$count?>.</td>
                                        <td><?=$val->cm01_ulasan?></td>
                                        <td><?=$val->namasistem?></td>
                                        <td><?=substr($val->namamodul,0,50)?></td>
                                        <td><?=$val->butiranstatusdok?></td>
                                        <td class="text-center">
                                            <a href="<?=site_url("/home/complaint?id=".$val->id_encode)?>" type="button" class="btn btn-info">
                                                <i class="fa fa-pencil-square-o"></i>
                                            </a>
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
