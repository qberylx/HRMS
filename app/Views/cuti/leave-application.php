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
                        Permohonan Cuti
                    </h1>
                    
                </section>
				<section class="content">
				<!-- Default box -->
				<?=$alert?>
				<div class="box box-primary">
					<div class="box-header with-border">
					<h3 class="box-title">Kelayakan Cuti</h3>
					</div>
					<div class="box-body">
                        <div class="row">
                            <div class="col-md-10 col-md-offset-0">
                                <div class="row">
                                    <div class="col-md-6">
                                        <strong><i class="fa fa-user margin-r-5"></i> Nama</strong>
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

                <div class="box box-success">
					<div class="box-header with-border">
					    <h3 class="box-title">Butiran Permohonan</h3>
					</div>
					<div class="box-body">
						<?=form_open_multipart("cuti/submit_leave_application")?>
                            <div class="row">
                                <div class="col-md-6 col-md-offset-0">
                                    <div class="form-group">
                                        <label> Jenis</label>
                                        <select class="form-control" name="sel_leavetype"  id="sel_leavetype" onchange="myFunction()">
                                            <option value="">Pleace Choose Leave Type</option>
                                            <?php
                                                foreach ($jeniscuti as $val) {
                                                    echo '<option value="'.$val->code.'">'.$val->description.'</option>';
                                                }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="form-group" id="attach" style="display : none;">
                                        <label for="lampiran"> Gambar MC</label>
                                        <input type="file" name="lampiran[]" id="lampiran" class="custom-file-input" accept="image/*" multiple>
                                        <p class="help-block custom-file-label"></p>
                                        <!--<p class="help-block">Sambil menekan butang <i>ctrl</i> untuk memilih lebih dari 1 lampiran</p>-->
                                    </div>


                                    <div class="form-group">
                                        <label> Tarikh Mula:</label>

                                        <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" class="form-control pull-right datepicker" id="startdate" name="startdate" autocomplete="off" >
                                        </div>
                                        <!-- /.input group -->
                                    </div>

                                    <div class="form-group">
                                        <label> Tarikh Akhir:</label>

                                        <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" class="form-control pull-right datepicker" id="enddate" name="enddate" autocomplete="off" >
                                        </div>
                                        <!-- /.input group -->
                                    </div>

                                    <div class="form-group">
                                    <label>Jumlah Cuti</label>
                                        <input type="text" class="form-control" name="daysoff" id="daysoff" readonly >
                                    </div>

                                    <div class="form-group">
                                    <label>Lokasi</label>
                                        <input type="text" class="form-control" name="location" id="location" >
                                    </div>

                                    
                                    <div class="form-group">
                                    <label> No. Telefon</label>
                                            <input type="text" class="form-control" name="contactno" id="contactno" value="<?=$staf->contact_no?>">
                                    </div>

                                    <div class="form-group">
                                        <label>Sebab</label>
                                        <textarea class="form-control" rows="3" placeholder="Reason for leave..." name ="reason" id="reason"></textarea>
                                    </div>
                                
                                    
                                    
                                    
                                    
                                    
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
            function myFunction() {
                var x = document.getElementById("sel_leavetype").value;
                if(x == "04")//medical
                    document.getElementById("attach").style.display="block";
                else
                    document.getElementById("attach").style.display="none";
            }
            
            $( document ).ready(function() {
                $('#enddate').val('');
            });
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
