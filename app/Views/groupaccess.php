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
                        <h3 class="box-title">Group Access</h3>
                        </div>
                        <div class="box-body">
                            <?=form_open("utilities/groupaccess")?>
                            <div class="form-group">
								<label>Access Level</label>
								<select class="form-control" name="accesslevelID"  id="accesslevelID">
									<?php
										foreach ($accesslvls as $val) {
                                            $check = '';
                                            if (isset($_POST['accesslevelID'])) {
                                                if ($_POST['accesslevelID'] == $val->id) {
                                                    $check = 'selected';
                                                }
                                            }
											echo '<option value="'.$val->id.'" '.$check.'>'.$val->access_name.'</option>';
										}
									?>
								</select>
							</div>
                                
                                <div class="pull-right" role="group">
                                    <button type="submit" class="btn btn-primary">Display Access</button>
                                    <input type="hidden" value="<?=isset($_POST['accesslevelID']) ? $_POST['accesslevelID'] : '' ?>" name="hidaccesslvlID" id="hidaccesslvlID" >
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
                        <div class="box-body">
                            <div class="box-group" id="accordion">
                                <?php
                                    foreach ($groupaccess_data as $menu) {
                                ?>
                                    <div class="panel box box-success">
                                        <div class="box-header with-border">
                                            <h4 class="box-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?=$menu->id?>" class="collapsed" aria-expanded="false">
                                                    <?=$menu->nama_menu?> Menu
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapse<?=$menu->id?>" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                            <div class="box-body">
                                                <table class="table table-bordered">
                                                    <tr>
                                                        <th>Sub Menu</th>
                                                        <th class="text-center">Action</th>
                                                    </tr>
                                                    <?php
                                                        foreach ($menu->menulvl1 as $submenu) {
                                                    ?>
                                                    <tr>
                                                        <td>
                                                            <?=$submenu->menu_name?>
                                                        </td>
                                                        <td class="text-center">
                                                            <input type="checkbox" name="menulvl1_id[]" class="chk_menulvl1-groupaccess" value="<?=$submenu->id?>" <?=$submenu->have_access == true ? 'checked' : '' ?>>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                        }
                                                    ?>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                    }
                                ?>
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
