<?php include('partials/menu.php');?>

<div class="main-content">
	<div class="wrapper">
		<h1>Update Admin</h1>

		<br><br>

		<?php
			//Get tje ID of selected Admin
			$id=$_GET['id'];

			//Create SQL Query to get the details
			$sql="SELECT * FROM tbl_admin WHERE id=$id";

			//Execute whether the query
			$res=mysqli_query($conn, $sql);

			//check whether the query is executed
			if($res==TRUE)
			{
				//check availability of data
				$count = mysqli_num_rows($res);

				//check whether we have damin data or not
				if($count==1)
				{
					//Get the details
					$row=mysqli_fetch_assoc($res);

					$full_name = $row['full_name'];
					$username = $row['username'];

				}	
				else
				{
					//Redirect to manage admin page
					header('location:'.SITEURL.'admin/manage-admin.php');
				}
			}

		?>

		<form action="" method="POST">
			<table class="tbl-30">
				<tr>
					<td>Full Name:</td>
					<td><input type="text" name="full_name" value="<?php echo $full_name; ?>"></td>
				</tr>

				<tr>
					<td>Username:</td>
					<td><input type="text" name="username" value="<?php echo $username;?>"></td>
				</tr>

				<tr>
					<td colspan="2">
						<input type="hidden" name="id" value="<?php echo $id; ?>">
						<input type="submit" name="submit" value="Update Admin" class="btn-secondary">
					</td>
					
				</tr>
			</table>
		</form>


	</div>	
</div>
<?php
	//confirm submit buttin is clicked
	if(isset($_POST['submit']))
	{
		//Get values from form to update
		$id = $_POST['id'];
		$full_name = $_POST['full_name'];
		$username = $_POST['username'];

		//Create a SQL Query to update Admin
		$sql = "UPDATE tbl_admin SET
		full_name = '$full_name',
		username = '$username'
		WHERE id = '$id'
		";

		//Execute the query
		$res = mysqli_query($conn, $sql);

		//Check whether query executed successfully
		if($res==true)
		{
			//Query Executed and Admin Updated
			$_SESSION['update']="<div class='success'> Admin Updated Successfully.</div>";

			//Redirect to MAnage Admin
			header('location:'.SITEURL.'admin/manage-admin.php');
		}
		else
		{
			//Failed to update Admin
			$_SESSION['update']="<div class='error'> Failed to Delete Admin.</div>";

			//Redirect to MAnage Admin
			header('location:'.SITEURL.'admin/manage-admin.php');
		}
	}
?>

<?php include('partials/footer.php');?>