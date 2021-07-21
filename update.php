<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#myModal").modal('show');
        });
    </script>
<style> 
.modal-body{
    background: linear-gradient(to top left, #ffffff 0%, #cc0000 100%);
}

</style>
</head>
<?php
include "connect.php";
$sno = $_GET['sno'];

	$sql = "SELECT * FROM `data` WHERE `sno` = '$sno' ";
	$query = mysqli_query($connect,$sql);
	
    if($row = mysqli_fetch_array($query)){
        echo $sno;
    $uid= $row["id"];
    $uname= $row["name"];
    $uaddress= $row["address"];
    $usalary= $row["salary"];
    }

?>

<body>
    <div id="myModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update data</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <p>update your details</p>
                    <form method="POST">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Name" name="Name" value="<?php echo $uname ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Id" name="Id" value="<?php echo $uid ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Address" name="Address" value="<?php echo $uaddress ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Salary" name="Salary" value="<?php echo $usalary ?>">
                        </div>
                        <button type="submit" name="update" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<?php
if(isset($_POST["update"])){
$upname=$_POST["Name"];
$upid=$_POST["Id"];
$upaddress=$_POST["Address"];
$upsalary=$_POST["Salary"];
$sqli = "UPDATE `data` SET `name` = '$upname',`address` = '$upaddress',`id` = '$upid',`salary` = '$upsalary' WHERE `sno` = '$sno'";
$queryy = mysqli_query($connect,$sqli);

	if(isset($queryy))
	{
			echo '<script>alert("Success");</script>';
			header('location:index.php');
	}
	else
	{
			echo '<script>alert("Fail");</script>';
			header('location:index.php');
	}
}


?>