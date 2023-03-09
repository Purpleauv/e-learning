<?php
	session_start(); 
	//Check whether the session variable SESS_MEMBER_ID is present or not
	if (!isset($_SESSION['ID']) || (trim($_SESSION['ID']) == '')) { ?>
		<script>
			window.location = "../../login.php";
		</script>
	<?php
	}
	$session_id=$_SESSION['ID'];
	$session_depart = $_SESSION['role'];
?>