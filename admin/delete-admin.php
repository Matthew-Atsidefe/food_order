<?php
		include('../config/constants.php');
		//Get the ID of Admin to be deleted
		
		$id = $_GET['id'];

		//Create SQL Query to delete Admin
		$sql = "DELETE FROM tbl_admin WHERE id=$id";

		//Execute the Query
		$res = mysqli_query($conn, $sql);

		//Verify the execution of query
		if($res==true)
		{
			//create session var to display message

			$_SESSION['delete'] = "<div class='success'>Admin Deleted Successfully</div>";

			//Redirect to Manage Admin page
			header('location:'.SITEURL.'admin/manage-admin.php');


		}
		else
		{
			$_SESSION['delete']="<div class='error'>Faiiled to Delete Admin. Try Again Later.</div>";
			header('location:'.SITEURL.'admin/manage-admin.php');
		}
		//Redirect to manage Admin page with success/erro message

?>