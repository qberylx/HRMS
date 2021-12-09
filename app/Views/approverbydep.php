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
                        <h3 class="box-title">Approver By Department</h3>
                        </div>
                        <div class="box-body">
                            <?php
                                if (isset($get->apply_dep_id)) {
                                    echo form_open("utilities/update_approver_by_department?id=".$_GET['id']);
                                }else{
                                    echo form_open("utilities/submit_approver_by_department");
                                }
                            ?>
                                <div class="form-group">
                                    <label>The Applicant</label>
                                    <select class="form-control" name="theapplicant"  id="theapplicant">
									<?php
										foreach ($senaraidept as $val) {
                                            $check = '';
                                            if (isset($get->apply_dep_id)) {
                                                if ($get->apply_dep_id == $val->id) {
                                                    $check = 'selected';
                                                }
                                            }
											echo '<option value="'.$val->id.'" '.$check.'>'.$val->name_bi.'</option>';
										}
									?>
								    </select>
                                </div>
                                <div class="form-group">
                                    <label>The Approver (Level 1)</label>
                                    <select class="form-control" name="lvl1approver"  id="lvl1approver">
									<?php
										foreach ($senaraidept as $val) {
                                            $check = '';
                                            if (isset($get->lvl1_approve_dep_id)) {
                                                if ($get->lvl1_approve_dep_id == $val->id) {
                                                    $check = 'selected';
                                                }
                                            }
											echo '<option value="'.$val->id.'" '.$check.'>'.$val->name_bi.'</option>';
										}
									?>
								    </select>
                                </div>
                                <div class="form-group">
                                    <label>The Approver (Level 2)</label>
                                    <select class="form-control" name="lvl2approver"  id="lvl2approver">
                                        <option value="0">None</option>
									<?php
										foreach ($senaraidept as $val) {
                                            $check = '';
                                            if (isset($get->lvl2_approve_dep_id)) {
                                                if ($get->lvl2_approve_dep_id == $val->id) {
                                                    $check = 'selected';
                                                }
                                            }
											echo '<option value="'.$val->id.'" '.$check.'>'.$val->name_bi.'</option>';
										}
									?>
								    </select>
                                </div>
                                <div class="pull-right" role="group">
                                    <?php
                                    if (isset($get->apply_dep_id)) {
                                        echo '<button type="submit" class="btn btn-primary">Update Approval</button>';
                                    }else{
                                        echo '<button type="submit" class="btn btn-primary">Add Approval</button>';
                                    }
                                    ?>
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
                        <h3 class="box-title">Access Level List</h3>
                        </div>
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th>#</th>
                                        <th>Applicant</th>
                                        <th>Approver Level 1</th>
                                        <th>Approver Level 2</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                    <?php
                                    $count = 1;
                                    foreach ($approver_list as $val) {
                                    ?>
                                        <tr>
                                            <td><?=$count?></td>
                                            <td><?=$val->applicant?></td>
                                            <td><?=$val->lvl1_approver?></td>
                                            <td><?=$val->lvl2_approver?></td>
                                            <td class="text-center">
                                                <a type="button" href="<?=site_url('utilities/approver_by_department?id='.$val->encode_id)?>" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                                <button type="button" value="<?=site_url('utilities/del_approver_department/'.$val->approver_id)?>" class="btn btn-danger del-menu"><i class="fa fa-remove"></i></button>
                                            </td>
                                        </tr>
                                    <?php
                                        $count++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <div class="modal modal-danger fade" id="confirm-modal-danger">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span></button>
                                    <h4 class="modal-title">Confirmation</h4>
                                    </div>
                                    <div class="modal-body">
                                    <p>Are you sure you want to delete this approver setting?</p>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-outline pull-left" id="confirmCancel" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-outline" id="confirmOk">Confirm</button>
                                    </div>
                                </div>
                                <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
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
