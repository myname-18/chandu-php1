s<!DOCTYPE html>
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
</head>

<body>

    <div id="myModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete data</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form method="post">
                    <h2>Employee Data</h2>
            
                  <input type="hidden" name="delete_sno" id="delete_sno">
                  <h4> 
                    Are You Sure you Want To Delete
                  </h4>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" id="cancel" name="cancel" onclick="fun()" class="btn btn-secondary" data-dismiss="modal" >NO</button>
                        <button type="submit"  name="deletedata"class="btn btn-primary">yes!! delete it.</button>
                    </div>
    </form>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    function fun(){
    window.location='index.php';
    }
</script>
</html>
<?php
include 'connect.php';
$sno = $_GET['sno'];
if(isset($_POST["deletedata"])){
	$sql = "DELETE FROM `data` WHERE `sno` = '$sno' ";
	$query = mysqli_query($connect,$sql);
        if(isset($query))
            {
                    echo "<script>alert('Success');</script>";
                    header('location:index.php');
            }
            else
            {
                    echo '<script>alert("Fail");</script>';
                    header('location:index.php');
            }
        }
?>