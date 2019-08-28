<?php
	require_once('functions/function.php');
	needLogged();
	get_header();
	get_sidebar();
	get_bread();
?>
    <div class="col-md-12">
        Welcome Mr. <?= $_SESSION['name'];?>
    </div><!--col-md-12 end-->
<?php
	get_footer();
?>
