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
                        Kelulusan Permohonan Cuti
                    </h1>
                    
                </section>
				<section class="content">
				<!-- Default box -->
				<?=$alert?>
				<div class="box box-primary">
					<div class="box-header with-border">
					<h3 class="box-title">Maklumat Cuti Staf</h3>
                    </div>
					<div class="box-body">
                        <div class="row">
                            <div class="col-md-10 col-md-offset-0">
                                <div class="row">
                                    <div class="col-md-6">
                                        <strong>Nama</strong>
                                        <p class="text-muted">
                                        <?=$staf->name?>
                                        </p>
                                    <hr>
                                    </div>
                                    <div class="col-md-6">
                                        <strong>Tahun Semasa</strong>
                                        <p class="text-muted">
                                        <?=$curr_year?>
                                        </p>
                                    <hr>
                                    </div>
                                    
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <strong>Jumlah Cuti Layak</strong>
                                        <p class="text-muted">
                                        <?=(float)$lv_entitlement->leave_entitle?>
                                        </p>
                                    <hr>
                                    </div>
                                    <div class="col-md-6">
                                        <strong>Baki Cuti Tahun Semasa</strong>
                                        <p class="text-muted">
                                        <?=(float)$lv_entitlement->curr_yr_bal?>
                                        </p>
                                    <hr>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <strong>Baki Cuti Tahun Lepas (<?=$curr_year-1 ?>)</strong>
                                        <p class="text-muted">
                                        <?=(float)$lv_entitlement->last_yr_bal?>
                                        </p>
                                    <hr>
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

                <div class="box box-primary">
					<div class="box-header with-border">
					<h3 class="box-title">Maklumat Permohonan Cuti</h3>
                    </div>
					<div class="box-body">
                        <div class="row">
                            <div class="col-md-10 col-md-offset-0">
                                <div class="row">
                                    <div class="col-md-6">
                                        <strong>Jenis Cuti</strong>
                                        <p class="text-muted">
                                        <?=$appinfo->typedesc?>
                                        </p>
                                    <hr>
                                    </div>
                                    <div class="col-md-6">
                                        <strong>Status Permohonan</strong>
                                        <p class="text-muted">
                                        <?=$appinfo->statusdesc?>
                                        </p>
                                    <hr>
                                    </div>
                                    
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <strong>Tarikh Awal Cuti</strong>
                                        <p class="text-muted">
                                        <?php echo date("d/m/Y",strtotime($appinfo->startdate));?>
                                        </p>
                                    <hr>
                                    </div>
                                    <div class="col-md-6">
                                        <strong>Tarikh Akhir Cuti</strong>
                                        <p class="text-muted">
                                        <?php echo date("d/m/Y",strtotime($appinfo->enddate));?>
                                        </p>
                                    <hr>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <strong>Jumlah Cuti Yang Dipohon</strong>
                                        <p class="text-muted">
                                        <?=(float)$appinfo->daysoff?>
                                        </p>
                                    <hr>
                                    </div>
                                    <div class="col-md-6">
                                        <strong>Sebab Cuti</strong>
                                        <p class="text-muted">
                                        <?=$appinfo->reason?>
                                        </p>
                                    <hr>
                                    </div>
                                    
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <strong>Lokasi</strong>
                                        <p class="text-muted">
                                        <?=$appinfo->location?>
                                        </p>
                                    <hr>
                                    </div>
                                    <div class="col-md-6">
                                        <strong>No. Telefon</strong>
                                        <p class="text-muted">
                                        <?=$appinfo->contact_no?>
                                        </p>
                                    <hr>
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
                <?php
                if ($appinfo->leave_typecode=="04"){
                ?>
                    <div class="box box-primary">
                        <div class="box-header with-border">
                        <h3 class="box-title">Gambar MC</h3>
                        </div>
                        <div class="box-body">
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <strong><i class="fa fa-image margin-r-5"></i> Lampiran</strong>
                                        <br /><br />
                                    <div class="row">
                                            
                                    
                                    <div class="col-sm-3">
                                    <a href="<?=base_url("public/cuti/".$appinfo->lv_file_name)?>" class="img-lampiran" target="_blank">
                                        <img class="img-thumbnail" style="max-width: 100%" src="<?=base_url("public/cuti/".$appinfo->lv_file_name)?>" alt="<?=$appinfo->lv_file_name?>">
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
                <?php
                }
                ?>
                <div class="box box-success">
					<div class="box-header with-border">
					    <h3 class="box-title">Tindakan</h3>
					</div>
					<div class="box-body">
						<?=form_open_multipart("cuti/submit_approve_application")?>
                            <div class="row">
                                <div class="col-md-6 col-md-offset-0">
                                    <div class="form-group">
                                    <label> Status Permohonan Cuti</label>
                                        <select class="form-control" name="sel_status"  id="sel_status">
                                            <option value="">Pleace Choose Status</option>
                                            <option value="02">Approve</option>
                                            <option value="03">Not Approve</option>
                                        </select>
                                        
                                    </div>
                                    <div class="form-group">
                                        <label>Ulasan</label>
                                        <textarea class="form-control" rows="3" placeholder="Reason for leave..." name ="comment" id="comment"></textarea>
                                    </div>
                                    
                                    <input type="hidden" class="form-control" name="application_id" id="application_id" value="<?=$appinfo->id?>">
					
                                    
                                    <div class="pull-left" >
                                        <button type="submit" class="btn btn-block btn-primary">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    
                        <!-- /.box-body -->
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
        <script>
            
            $(document).on("change","#startdate,#enddate",function(){
                
                KiraTempoh();

            })

            function KiraTempoh(){
            var html = ""

            $.ajax({
                url: "../cuti/ajaxKiraCuti?startdate=" + $('#startdate').val() +"&enddate="+ $('#enddate').val(),
                type: 'GET',
                dataType: 'json', // added data type
                success: function(res) {
                    $("#daysoff").val(res.daysoff);
                    if (res.startdate_larger == true) {
                        $("#alertModalTitle").html("Date Alert");
                        $("#alertModalBody").html("Your start date cannot be bigger than the end date");
                        $("#alertModal").modal('show');
                    }
                }
            });
            }

        </script>
	</body>
</html>
