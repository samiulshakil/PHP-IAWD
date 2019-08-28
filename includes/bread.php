<?php
      //print_r($_SERVER);
			//echo $_SERVER['PHP_SELF'];
			$link=explode('/',$_SERVER['PHP_SELF']);
			//print_r ($link);
			$page=$link[3];
			//echo $page;
?>
<div class="col-md-10 admin-part pd0">
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
      <li><a href="#">
        <?php
          if($page=='index.php'){echo "Dashboard";}
          elseif($page=='add-user.php'){echo "Registration";}
          elseif($page=='all-user.php'){echo "User List";}
          elseif($page=='view-user.php'){echo "View User";}
          elseif($page=='edit-user.php'){echo "Update User";}
          else{echo "No Page";}
        ?>
      </a></li>
    </ol>
