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
				<?= $validation->listErrors() ?>
				<?=$alert?>
				<div class="box box-primary">
					<div class="box-header with-border">
					<h3 class="box-title">Maklumat Permohonan</h3>
					</div>
					<div class="box-body">
						<?=form_open_multipart("home/index")?>
							<div class="form-group">
								<label>Nama Sistem</label>
								<select class="form-control" name="namaSistem"  id="namaSistem">
									<option value="">Sila Pilih</option>
									<?php
										foreach ($senaraisistem as $val) {
											echo '<option value="'.$val->id.'">'.$val->kod.' ('.$val->namasistem.')</option>';
										}
									?>
								</select>
							</div>
							<div class="form-group">
								<label>Modul</label>
								<select class="form-control" name="subModul"  id="subModul">
									<option value="">Sila Pilih</option>
								</select>
							</div>
							<div class="form-group">
								<label>Klasifikasi Permohonan</label>
								<div class="checkbox">
									<label>
									<input type="checkbox" name="klasimodul" value="1">
									Tambahbaik Modul
									</label>
								</div>

								<div class="checkbox">
									<label>
									<input type="checkbox" name="klasiproses" value="1">
									Tambahbaik Proses
									</label>
								</div>

								<div class="checkbox">
									<label>
									<input type="checkbox" name="klasiskrin" value="1">
									Tambahbaik Skrin
									</label>
								</div>

								<div class="checkbox">
									<label>
									<input type="checkbox" name="klasibug" value="1">
									Isu <i>Bug / Defect </i>
									</label>
								</div>

								<div class="checkbox">
									<label>
									<input type="checkbox" name="klasilaporan" value="1">
									Laporan
									</label>
								</div>
							</div>

							<div class="form-group">
								<label>Ulasan</label>
								<textarea class="form-control" rows="10" placeholder="Keterangan Aduan" name="ulasan"></textarea>
							</div>

							<div class="form-group">
								<label for="lampiran">Lampiran</label>
								<input type="file" name="lampiran[]" id="lampiran" class="custom-file-input" accept="image/*" multiple>
								<p class="help-block custom-file-label"></p>
								<p class="help-block">Sambil menekan butang <i>ctrl</i> untuk memilih lebih dari 1 lampiran</p>
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
