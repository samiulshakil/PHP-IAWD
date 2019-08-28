<?php
	require_once('functions/function.php');
	needLogged();
	if($_SESSION['role']=='1'){
	get_header();
	get_sidebar();
	get_bread();

	if(!empty($_POST)){
		$name=$_POST['name'];
		$phone=$_POST['phone'];
		$email=$_POST['email'];
		$username=$_POST['username'];
		$pw=md5($_POST['password']);
		$rpw=md5($_POST['repassword']);
		$role=$_POST['role'];
		$image=$_FILES['pic'];
		$imageName='User-'.time().rand(100000,1000000).rand(10000,100000).'.'.pathinfo($image['name'],PATHINFO_EXTENSION);
		$insert="INSERT INTO cit_users(user_name,user_phone,user_email,user_username,user_password,role_id,user_photo)
		VALUES('$name','$phone','$email','$username','$pw','$role','$imageName')";
			if(!empty($name)){
				if($pw==$rpw){
					if(mysqli_query($con,$insert)){
						move_uploaded_file($image['tmp_name'],'uploads/'.$imageName);
						echo "Success!User Registration Completed.";
					}else{
						echo "Opps!Registration Failed.";
					}
				}else{
					echo "Opps!Password did not match.";
				}
			}else{
				echo "Opps!Please enter your name.";
			}
	}
?>
    <div class="col-md-12">
        <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="col-md-9 heading_title">
                    User Registration
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
                  <input type="text" name="name" class="form-control" placeholder="">
                </div>
              </div>
              <div class="form-group">
                <label for="" class="col-sm-3 control-label">Phone</label>
                <div class="col-sm-8">
                  <input type="text" name="phone" class="form-control" placeholder="">
                </div>
              </div>
              <div class="form-group">
                <label for="" class="col-sm-3 control-label">Email</label>
                <div class="col-sm-8">
                  <input type="email" class="form-control" name="email" placeholder="">
                </div>
              </div>
              <div class="form-group">
                <label for="" class="col-sm-3 control-label">Username</label>
                <div class="col-sm-8">
                  <input type="text" name="username" class="form-control" placeholder="">
                </div>
              </div>
              <div class="form-group">
                <label for="" class="col-sm-3 control-label">Password</label>
                <div class="col-sm-8">
                  <input type="password" name="password" class="form-control" placeholder="">
                </div>
              </div>
              <div class="form-group">
                <label for="" class="col-sm-3 control-label">Re-Password</label>
                <div class="col-sm-8">
                  <input type="password" name="repassword" class="form-control" placeholder="">
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
            <button class="btn btn-sm btn-primary">REGISTRATION</button>
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
