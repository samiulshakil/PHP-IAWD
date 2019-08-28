<?php
	require_once('functions/function.php');
	needLogged();
	if($_SESSION['role']=='1'){
	get_header();
	get_sidebar();
	get_bread();

	$id=$_GET['u'];
	$sel="SELECT * FROM cit_users WHERE user_id='$id'";
	$Q=mysqli_query($con,$sel);
	$data=mysqli_fetch_assoc($Q);

	if(!empty($_POST)){
		$eid=$_POST['eid'];
		$name=$_POST['name'];
		$phone=$_POST['phone'];
		$email=$_POST['email'];
		$role=$_POST['role'];
		$update="UPDATE cit_users SET user_name='$name', user_phone='$phone' WHERE user_id='$eid'";
			if(!empty($name)){
					if(mysqli_query($con,$update)){
						header('Location: view-user.php?v='.$eid);
					}else{
						echo "Opps!Update Failed.";
					}
			}else{
				echo "Opps!Please enter your name.";
			}
	}
?>
    <div class="col-md-12">
        <form class="form-horizontal" action="" method="post">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="col-md-9 heading_title">
                    Update User Information
                 </div>
                 <div class="col-md-3 text-right">
                    <a href="all-user.php" class="btn btn-sm btn btn-primary"><i class="fa fa-th"></i> All User</a>
                </div>
                <div class="clearfix"></div>
            </div>
          <div class="panel-body">
              <div class="form-group">
                <label for="" class="col-sm-3 control-label">Name</label>
                <div class="col-sm-8">
									<input type="hidden" name="eid" class="form-control" value="<?= $data['user_id'];?>">
                  <input type="text" name="name" class="form-control" value="<?= $data['user_name'];?>">
                </div>
              </div>
              <div class="form-group">
                <label for="" class="col-sm-3 control-label">Phone</label>
                <div class="col-sm-8">
                  <input type="text" name="phone" class="form-control" value="<?= $data['user_phone'];?>">
                </div>
              </div>
              <div class="form-group">
                <label for="" class="col-sm-3 control-label">Email</label>
                <div class="col-sm-8">
                  <input type="email" class="form-control" name="email" value="<?= $data['user_email'];?>">
                </div>
              </div>
              <div class="form-group">
                <label for="" class="col-sm-3 control-label">Username</label>
                <div class="col-sm-8">
                  <input type="text" name="username" class="form-control" value="<?= $data['user_username'];?>" disabled="disabled">
                </div>
              </div>
              <div class="form-group">
                <label for="" class="col-sm-3 control-label">User Role</label>
                <div class="col-sm-4">
                  <select class="form-control select_cus" name="role">
                      <option value="">Select Role</option>
											<?php
													$rsel="SELECT * FROM cit_roles";
													$qry=mysqli_query($con,$rsel);
													while($per=mysqli_fetch_assoc($qry)){
											?>
                      <option value="<?= $per['role_id'];?>"><?= $per['role_name'];?></option>
										<?php } ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="" class="col-sm-3 control-label">Upload</label>
                <div class="col-sm-8">
                  <input type="file" name="pic">
                </div>
              </div>
          </div>
          <div class="panel-footer text-center">
            <button class="btn btn-sm btn-primary">UPDATE</button>
          </div>
        </div>
        </form>
    </div><!--col-md-12 end-->
<?php
	get_footer();
}else{
	echo "Access Denied! You have no permission.";
}
?>
