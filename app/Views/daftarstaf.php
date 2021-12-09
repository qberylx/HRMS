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
                        <h3 class="box-title">Pendaftaran Staf</h3>
                        </div>
                        <div class="box-body">
                            <?=form_open_multipart("peribadi/application")?>
                                <div class="form-group">
                                <label><strong><i class="fa fa-asterisk margin-r-5"></i> ID User</strong></label>
                                    <input type="text" class="form-control" name="txt_iduser" id="txt_iduser">
								</div>
                                <div class="form-group">
                                <label><strong><i class="fa fa-envelope margin-r-5"></i> Emel</strong></label>
                                    <input type="text" class="form-control" name="txt_emel" id="txt_emel">
                                </div>
                                <div class="form-group">
                                <label><strong><i class="fa fa-building"></i> Department</strong></label>
                                    <select class="form-control" name="sel_dept"  id="sel_dept">
                                        <option value="0">Tiada</option>
                                        <?php
                                            foreach ($senaraidept as $val) {
                                                echo '<option value="'.$val->id.'">'.$val->name_bm.'</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                <label><strong><i class="fa fa-universal-access"></i> Access Level</strong></label>
                                    <select class="form-control" name="acc_level"  id="acc_level">
                                        <?php
                                            foreach ($acclvl_list as $accllvl) {
                                                echo '<option value="'.$accllvl->id.'">'.$accllvl->access_name.'</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                <label><strong><i class="fa fa-user margin-r-5"></i> Nama</strong></label>
                                    <input type="text" class="form-control" name="txt_nama" id="txt_nama">
                                </div>

								<div class="form-group">
                                <label><strong><i class="fa fa-id-card-o margin-r-5"></i> IC/Passport</strong></label>
                                <div id="myId"    ></div>
                                <input type="text" class="form-control" name="txt_ic" id="txt_ic">
                                </div>
								
								

								<!--<div class="form-group">
								<label for="lampiran"><strong><i class="fa fa-image margin-r-5"></i> Gambar</strong></label>
								<input type="file" name="lampiran[]" id="lampiran" class="custom-file-input" accept="image/*" multiple>
								<p class="help-block custom-file-label"></p>
								</div>-->

                                <!--<div class="form-group">
                                    <label for="lampiran"><strong><i class="fa fa-image margin-r-5"></i> Gambar </strong></label>
                                    <input type="file" name="lampiran[]" id="lampiran" class="dropzone" accept="image/*" >
                                </div>-->

                                <!--lampiran -->
                                <div class="box-body" >
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="lampiran"><strong><i class="fa fa-image margin-r-5"></i> Gambar </strong></label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div id="fileupload" name="fileupload" class="dropzone" action="<?=base_url("index.php/peribadi/fileupload/") ?>" >
                                                </div>
                                            </div>
                                        </div>
                                        
                                        
                                        
                                    </div>
                                    
                                </div>
                                
                                <div class="pull-right">
                                    <button type="submit" id="submit-all" class="btn btn-block btn-primary">Submit</button>
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
    <script>
        //$(document).ready(function(){
            //Dropzone.autoDiscover = false;

            Dropzone.options.fileupload  = {
                maxFiles: 1,
                autoProcessQueue: true,
                acceptedFiles:"image/*"
            
            }
            //);
            </script>
    </script>
</html>
