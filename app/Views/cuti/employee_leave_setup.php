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
                        <h3 class="box-title">Employee's Leave Setting</h3>
                        </div>
                        <div class="box-body">
                            <form action="<?=site_url("cuti/leave_setting")?>" method="get" accept-charset="utf-8">
                                <div class="form-group">
                                    <label>Year</label>
                                    <select class="form-control" name="year"  id="year">
                                        <option value="2021" <?=isset($_GET['year']) && $_GET['year'] == '2021' ? 'selected' : '' ;?>>2021</option>
                                        <option value="2022" <?=isset($_GET['year']) && $_GET['year'] == '2022' ? 'selected' : '' ;?>>2022</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Department</label>
                                    <select class="form-control" name="dept"  id="dept">
                                        <option value="0">Tiada</option>
                                        <?php
                                            foreach ($senaraidept as $val) {
                                                $select = '';
                                                if (isset($_GET['dept'])) {
                                                    if ($_GET['dept'] == $val->id) {
                                                        $select = 'selected';
                                                    }
                                                };
                                                echo '<option value="'.$val->id.'" '.$select.'>'.$val->name_bm.'</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="pull-right" role="group">
                                    <button type="submit" class="btn btn-primary">Display</button>
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

                    <div class="box box-primary">
                        <div class="box-header with-border">
                        <h3 class="box-title">Employee's List</h3>
                        </div>
                        <div class="box-body">
                            <?=form_open("cuti/submit_leave_setting?".$uri)?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <th>Employee</th>
                                                    <th class="text-center">Leave Entitlement</th>
                                                    <th class="text-center">Current Leave Balance</th>
                                                    <th class="text-center">Last Year Leave Balance</th>
                                                </tr>
                                                <?php
                                                    foreach ($stafflist as $staff) {
                                                ?>
                                                    <tr>
                                                        <td>
                                                            <?php
                                                                echo $staff->name;
                                                                echo '<input type="hidden" value="'.$staff->id_user.'" name="userid[]" />'
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                                if (!$staff->lv_setting) {
                                                                    echo '<input type="text" class="form-control input-sm text-center" name="lv_entitle[]" value="0"  onkeypress="return isNumber(event)" onpaste="return false;"/>';
                                                                }else{
                                                                    echo '<input type="text" class="form-control input-sm text-center" name="lv_entitle[]" value="'.$staff->lv_setting->leave_entitle.'"  onkeypress="return isNumber(event)" onpaste="return false;"/>';
                                                                }
                                                            ?>
                                                        </td>
                                                        <td><?php
                                                                if (!$staff->lv_setting) {
                                                                    echo '<input type="text" class="form-control input-sm text-center" name="lv_curr[]" value="0"  onkeypress="return isNumber(event)" onpaste="return false;"/>';
                                                                }else{
                                                                    echo '<input type="text" class="form-control input-sm text-center" name="lv_curr[]" value="'.$staff->lv_setting->curr_yr_bal.'"  onkeypress="return isNumber(event)" onpaste="return false;"/>';
                                                                }
                                                            ?>
                                                        </td>
                                                        <td><?php
                                                                if (!$staff->lv_setting) {
                                                                    echo '<input type="text" class="form-control input-sm text-center" name="lv_lbalance[]" value="0"  onkeypress="return isNumber(event)" onpaste="return false;"/>';
                                                                }else{
                                                                    echo '<input type="text" class="form-control input-sm text-center" name="lv_lbalance[]" value="'.$staff->lv_setting->last_yr_bal.'"  onkeypress="return isNumber(event)" onpaste="return false;"/>';
                                                                }
                                                            ?>
                                                        </td>
                                                    </tr>
                                                <?php
                                                    }
                                                ?>
                                            </tbody>
                                        </table>  
                                    </div>
                                    <div class="col-md-12">
                                        <?php
                                            if ($stafflist) {
                                        ?>
                                            <div class="pull-right" role="group">
                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
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
