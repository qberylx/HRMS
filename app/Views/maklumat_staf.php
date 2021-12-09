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
                        Perincian Staf
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?=base_url("/peribadi/senaraistaf")?>"><i class="fa fa-angle-left"></i> Kembali</a></li>
                    </ol>
                </section>
				<section class="content">
				<!-- Default box -->
				<?=$alert?>
				<div class="box box-primary">
					<div class="box-header with-border">
					<h3 class="box-title">Maklumat Staf</h3>
					</div>
					<div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <strong><i class="fa fa-asterisk margin-r-5"></i> ID User</strong>
                                <p class="text-muted">
                                <?=$staf->id_user?>
                                </p>
                            <hr>
                            </div>
                            <div class="col-md-6">
                                <strong><i class="fa fa-user margin-r-5"></i> Nama</strong>
                                <p class="text-muted">
                                <?=$staf->name?>
                                </p>
                            <hr>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <strong><i class="fa fa-id-card-o margin-r-5"></i> IC</strong>
                                <p class="text-muted">
                                <?=$staf->ic?>
                                </p>
                            <hr>
                            </div>
                            <div class="col-md-6">
                                <strong><i class="fa fa-envelope margin-r-5"></i> Emel</strong>
                                <p class="text-muted">
                                <?=$staf->email?>
                                </p>
                            <hr>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <strong><i class="fa fa-phone margin-r-5"></i> No. Telefon</strong>
                                <p class="text-muted">
                                <?=$staf->contact_no?>
                                </p>
                            <hr>
                            </div>
                            <div class="col-md-6">
                                <strong><i class="fa fa-universal-access"></i> Tahap Akses</strong>
                                <p class="text-muted">
                                <?=$staf->access_name?>
                                </p>
                            <hr>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <strong><i class="fa fa-building"></i> Jabatan</strong>
                                <p class="text-muted">
                                <?=$staf->name_bi?>
                                </p>
                            <hr>
                            </div>
                            <div class="col-md-6">
                                <strong><i class="fa fa-certificate"></i> Status</strong>
                                <p class="text-muted">
                                <?php
                                    if ($staf->active_flag == TRUE) {
                                        echo "AKTIF";

                                    }else{
                                        echo "TIDAK AKTIF";
                                    }
                                ?>
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
					<h3 class="box-title">Gambar Staf</h3>
					</div>
					<div class="box-body">
                        
                        <div class="row">
                            <div class="col-md-12">
                                <strong><i class="fa fa-image margin-r-5"></i> Lampiran</strong>
                                    <br /><br />
                                <div class="row">
                                        
                                
                                <div class="col-sm-3">
                                <a href="javascript:void(0)" class="img-lampiran">
                                    <img class="img-thumbnail" style="max-width: 40%" src="<?=base_url("public/avatar/".$staf->file_name)?>" alt="<?=$staf->file_name?>">
                                </a>
                                </div>
                            
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
						<?=form_open_multipart("peribadi/update_application")?>
                            <div class="form-group">
                            <label><strong><i class="fa fa-asterisk margin-r-5"></i> ID User</strong></label>
                                <input type="text" class="form-control" name="txt_iduser" id="txt_iduser" value="<?=$staf->id_user?>" readonly>
                            </div>
                        
                            <div class="form-group">
                            <label><strong><i class="fa fa-certificate"></i> Status</strong></label>
                                <select class="form-control" name="statusdok"  id="statusdok">
                                    <!--<option value="">Sila Pilih</option>-->
                                    <option value="1" <?php if($staf->active_flag==TRUE) echo 'selected="selected"'; ?>>AKTIF</option>
                                    <option value="0" <?php if($staf->active_flag==FALSE) echo 'selected="selected"'; ?>>TIDAK AKTIF</option>
                                    
                                </select>
                            </div>

                            
                            <div class="form-group">
                            <label><strong><i class="fa fa-building"></i> Department</strong></label>
                                <select class="form-control" name="sel_dept"  id="sel_dept">
                                    <option value="0">Tiada</option>
                                    <?php foreach ($senaraidept as $val) { ?>                         
                                            <option value="<?php echo $val->id; ?>"<?php if($staf->id_dept==$val->id) echo 'selected="selected"'; ?>><?php echo $val->name_bm; ?></option>
                                    <?php } ?>
                                        
                                </select>
                            </div>

                            <div class="form-group">
                            <label><strong><i class="fa fa-universal-access"></i> Access Level</strong></label>
                                    <select class="form-control" name="acc_level"  id="acc_level">
                                        <option value="0">Tiada</option>
                                        <?php foreach ($acclvl_list as $accllvl) { ?>                         
                                                <option value="<?php echo $accllvl->id; ?>"<?php if($staf->accesslevel_id==$accllvl->id) echo 'selected="selected"'; ?>><?php echo $accllvl->access_name; ?></option>
                                        <?php } ?>
                                                                                
                                    </select>
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
