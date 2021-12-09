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
                <section class="content-header">
                    <h1>
                        Perincian Aduan
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?=base_url("/home/senaraiaduan")?>"><i class="fa fa-angle-left"></i> Kembali</a></li>
                    </ol>
                </section>
				<section class="content">
				<!-- Default box -->
				<?=$alert?>
				<div class="box box-primary">
					<div class="box-header with-border">
					<h3 class="box-title">Maklumat Pemohon</h3>
					</div>
					<div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <strong><i class="fa fa-asterisk margin-r-5"></i> No Staf</strong>
                                <p class="text-muted">
                                    testing
                                </p>
                            <hr>
                            </div>
                            <div class="col-md-6">
                                <strong><i class="fa fa-user margin-r-5"></i> Nama</strong>
                                <p class="text-muted">
                                    B.S. in Computer Science from the University of Tennessee at Knoxville
                                </p>
                            <hr>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <strong><i class="fa fa-phone margin-r-5"></i> No Telefon</strong>
                                <p class="text-muted">
                                    B.S. in Computer Science from the University of Tennessee at Knoxville
                                </p>
                            <hr>
                            </div>
                            <div class="col-md-6">
                                <strong><i class="fa fa-envelope margin-r-5"></i> Emel</strong>
                                <p class="text-muted">
                                    B.S. in Computer Science from the University of Tennessee at Knoxville
                                </p>
                            <hr>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <strong><i class="fa fa-building margin-r-5"></i> Syarikat</strong>
                                <p class="text-muted">
                                    B.S. in Computer Science from the University of Tennessee at Knoxville
                                </p>
                            <hr>
                            </div>
                            <div class="col-md-6">
                                <strong><i class="fa fa-black-tie margin-r-5"></i> Jawatan</strong>
                                <p class="text-muted">
                                    B.S. in Computer Science from the University of Tennessee at Knoxville
                                </p>
                            <hr>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <strong><i class="fa fa-cubes margin-r-5"></i> Jabatan</strong>
                                <p class="text-muted">
                                    B.S. in Computer Science from the University of Tennessee at Knoxville
                                </p>
                            <hr>
                            </div>
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

                <div class="box box-primary">
					<div class="box-header with-border">
					<h3 class="box-title">Maklumat Permohonan</h3>
					</div>
					<div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <strong><i class="fa fa-desktop margin-r-5"></i> Nama Sistem</strong>
                                <p class="text-muted">
                                    <?=$aduan->namasistem?>
                                </p>
                            <hr>
                            </div>
                            <div class="col-md-6">
                                <strong><i class="fa fa-cogs margin-r-5"></i> Modul</strong>
                                <p class="text-muted">
                                    <?=$aduan->namamodul?>
                                </p>
                            <hr>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <strong><i class="fa fa-calendar margin-r-5"></i> Tarikh</strong>
                                <p class="text-muted">
                                    <?=$aduan->cm01_datecreated?>
                                </p>
                            <hr>
                            </div>
                            <div class="col-md-6">
                                <strong><i class="fa fa-object-group margin-r-5"></i> Klasifikasi Permohonan</strong>
                                <p class="text-muted">
                                    <ul>
                                        <?=$aduan->cm01_klasimodul == 1 ? "<li>Tambahbaik Modul</li>" : "" ;?>
                                        <?=$aduan->cm01_klasiproses == 1 ? "<li>Tambahbaik Proses</li>" : "" ;?>
                                        <?=$aduan->cm01_klasiskrin == 1 ? "<li>Tambahbaik Skrin</li>" : "" ;?>
                                        <?=$aduan->cm01_klasibug== 1 ? "<li>Isu Bug / Defect</li>" : "" ;?>
                                        <?=$aduan->cm01_klasilaporan== 1 ? "<li>Laporan</li>" : "" ;?>
                                    </ul>
                                </p>
                            <hr>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <strong><i class="fa fa-edit margin-r-5"></i> Ulasan</strong>
                                <p class="text-muted">
                                    <?=$aduan->cm01_ulasan?>
                                </p>
                            <hr>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <strong><i class="fa fa-image margin-r-5"></i> Lampiran</strong>
                                    <br /><br />
                                    <div class="row">
                                        
                                <?php
                                    foreach ($lampiran as $img) {
                                ?>
                                    <div class="col-sm-3">
                                    <a href="javascript:void(0)" class="img-lampiran">
                                        <img class="img-thumbnail" style="max-width: 20%" src="<?=base_url("public/uploads/".$img->cm02_namadokumen)?>" alt="<?=$img->cm02_namadokumen?>">
                                    </a>
                                    </div>
                                <?php
                                    }
                                ?>
                                    </div>
                            </div>
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
                
                <div class="box box-success">
					<div class="box-header with-border">
					    <h3 class="box-title">Tindakan</h3>
					</div>
					<div class="box-body">
						<?=form_open_multipart("submit/application")?>
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control" name="statusdok"  id="statusdok">
                                    <option value="">Sila Pilih</option>
                                    <?php
                                        foreach ($status_tindakan as $val) {
                                            echo '<option value="'.$val->kod.'">'.$val->butiran.'</option>';
                                        }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Ulasan</label>
                                <textarea class="form-control" rows="10" placeholder="Keterangan Aduan" name="ulasan"></textarea>
                            </div>
                            
                            <div class="pull-right">
                                <button type="submit" class="btn btn-block btn-primary">Update</button>
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
