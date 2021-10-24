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
                                    <label>ID User</label>
                                    <input type="text" class="form-control" name="txt_iduser" id="txt_iduser">
								</div>
                                <div class="form-group">
                                    <label>Department</label>
                                    <select class="form-control" name="sel_dept"  id="sel_dept">
                                        <option value="0">Tiada</option>
                                        <?php
                                            foreach ($senaraidept as $val) {
                                                echo '<option value="'.$val->code.'">'.$val->name_bm.'</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Access Level</label>
                                    <select class="form-control" name="acc_level"  id="acc_level">
                                        <?php
                                            foreach ($acclvl_list as $accllvl) {
                                                echo '<option value="'.$accllvl->id.'">'.$accllvl->access_name.'</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" class="form-control" name="txt_nama" id="txt_nama">
                                </div>

								<div class="form-group">
                                    <label>IC/Passport</label>
                                    <input type="text" class="form-control" name="txt_ic" id="txt_ic">
                                </div>
								
								<div class="form-group">
                                    <label>Emel</label>
                                    <input type="text" class="form-control" name="txt_emel" id="txt_emel">
                                </div>

								<div class="form-group">
								<label for="lampiran">Gambar</label>
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

					<!--
                    <div class="box box-primary">
                        <div class="box-header with-border">
                        <h3 class="box-title">Senarai Staf</h3>
                        </div>
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover">
                                <tbody><tr>
                                        <th>Bil.</th>
                                        <th>ID User</th>
                                        <th>Nama</th>
										<th>Emel</th>
                                    </tr>
                                    <?php
										$i = 0;
                                        foreach ($senaraistaf as $val) {
											$i++;
                                    ?>
                                        <tr>
                                            <td><?=$i?></td>
											<td><?=$val->id_user?></td>
                                            <td><?=$val->name?></td>
                                            <td><?=$val->email?></td>
                                        </tr>
                                    <?php
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
						-->
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
