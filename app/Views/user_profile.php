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
                        <h3 class="box-title">Maklumat Peribadi</h3>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <a href="javascript:void(0)" class="img-lampiran">
                                        <img class="img-thumbnail" style="max-width: 40%" src="<?=base_url("public/avatar/".$staf->file_name)?>" alt="<?=$staf->file_name?>">
                                    </a>
                                </div>
                                <div class="col-xs-8">
                                    <a href="<?=site_url("peribadi/changepassword")?>">I Want to Change Password</a><br>
                                </div>
                                
                            </div>
                            <br>
                            <?=form_open_multipart("peribadi/update_userprofile")?>
                            
                            
                                <div class="form-group">
                                    <label><strong><i class="fa fa-asterisk margin-r-5"></i> ID User</strong></label>
                                    <input type="text" class="form-control" name="txt_iduser" id="txt_iduser" value="<?=$staf->id_user?>" readonly>
                                </div>
                            
                                <div class="form-group">
                                    <label><strong><i class="fa fa-user margin-r-5"></i> Nama</strong></label>
                                    <input type="text" class="form-control" name="txt_nama" id="txt_nama" value="<?=$staf->name?>">
                                </div>

                                <div class="form-group">
                                    <label><strong><i class="fa fa-id-card-o margin-r-5"></i> IC/Passport</strong></label>
                                    <input type="text" class="form-control" name="txt_ic" id="txt_ic" value="<?=$staf->ic?>">
                                </div>
                                
                                <div class="form-group">
                                    <label><strong><i class="fa fa-phone margin-r-5"></i> No. Telefon</strong></label>
                                    <input type="text" class="form-control" name="txt_notel" id="txt_notel" value="<?=$staf->contact_no?>">
                                </div>

                                <div class="form-group">
                                    <label><strong><i class="fa fa-envelope margin-r-5"></i> Emel</strong></label>
                                    <input type="text" class="form-control" name="txt_emel" id="txt_emel" value="<?=$staf->email?>">
                                </div>

                                <div class="form-group">
                                    <label for="lampiran"><strong><i class="fa fa-image margin-r-5"></i> Gambar</strong></label>
                                    <input type="file" name="lampiran[]" id="lampiran" class="custom-file-input" accept="image/*" multiple>
                                    <p class="help-block custom-file-label"></p>
                                    <!--<p class="help-block">Sambil menekan butang <i>ctrl</i> untuk memilih lebih dari 1 lampiran</p>-->
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
