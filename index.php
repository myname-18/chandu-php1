<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<title></title>
</head>
<style>
  .form-control
 {
background: linear-gradient(to bottom, #ffffff 0%, #0000ff 100%);

 }

  .form-group{
    text-shadow: 2px 2px 5px bold;
    text-transform: capitalize;
  }
  
  . {
    color:white;

  }
  .{
    color:white;

  }
  .bg{
    background: linear-gradient(to top left, #ffffff 0%, #993399 100%);
}
}



</style>
<body>
<?php
include "connect.php";
?>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">SUBMITION FORM</h3><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-person-fill" viewBox="0 0 16 16">
  <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zM11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0zm2 5.755V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1v-.245S4 12 8 12s5 1.755 5 1.755z"/>
</svg>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>   
      <div class="bg">
     <form  method="post">
      <div class="modal-body">
       <h2>Add New Employe </h2>
            <div class="form-group"> 
                    <label>Name</label>  
                      <input type="text" name="name" class="form-control"  value="" required>

                      <label>Id</label>  
                      <input type="text" name="id" class="form-control"  value="" required>

                   <label>Address</label>  
                     <input type="text" name="address" class="form-control" value="" required> 

                    <label>Salary</label>  
                     <input type="text" name="salary" class="form-control"  value="" required> 

                   </div>
        </div>
      <div class="modal-footer">
        <button  type="button" class="btn btn-dark">Close</button>
        <button type="submit" class="btn btn-primary">Save data</button>
      </div>
      </form></div>
</div>
 </div>
</div>
</div>
<!-- PHP INSERTION CODE --->
<?php
if(isset($_POST['submit'])){
      $name=$_POST["name"];
      $address=$_POST["address"];
      $id=$_POST["id"];
      $salary=$_POST["salary"];
      $query="INSERT INTO `data`(`name`,`id` ,`address`, `salary`) VALUES ('$name','$id','$address','$salary')";
      $sql = mysqli_query($connect, $query);
        if(isset($sql)){
          echo "<script>alert('Data inserted')</script>";
        }
    else{
        echo "<script>alert('data not inserted')</script>";
    }
  }
?>
<!--######################################################################################################################################################-->

<div class="container">
	<div class="jumbotron">
		<div class="card">
			<h2>EMPLOYEES DETAILS</h2>
		</div>
		<div class="card">
      
			<div class="card-body">
        
      <button type="button" name="insertdata" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                ADD DATA  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
  <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
  <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
</svg>
              
		
    
<div class="card">
  <div class="card-body">          
    <table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">sno</th>
      <th scope="col">Name</th>
      <th scope="col">Id</th>
      <th scope="col">Address</th>
      <th scope="col">Salary</th>
      <th scope="col">Editing</th>
      <th scope="col">Deleting</th>
    </tr>
  </thead>
  <tbody>
    <from method="POST">
     <?php 
    $sqli= "SELECT * FROM `data` ";
    $querry= mysqli_query($connect,$sqli);
     while($row=mysqli_fetch_array( $querry))
        {
    ?>
    <tr>
      <td name="tsno"><?php echo $row['sno'];?></td>
      <td name="tname" ><?php echo $row['name'];?></td>
      <td name="tid" ><?php echo $row['id'];?></td>
      <td name="taddress" ><?php echo $row['address'];?></td>
      <td name="tsalary" ><?php echo $row['salary'];?></td>
           
       <?php echo '<td>
        <button type="submit" name="update" id="update" class="btn btn-success " data-toggle="modal" data-target="#editmodal"><a href="update.php?sno='.$row['sno'].'">EDIT/UPDATE </a></button>
        </td>    
           '?>
         <?php echo '<td>
        <button   type="submit" name="delete" id="delete" class="btn btn-danger " data-toggle="modal" data-target="#"><a href="delete.php?sno='.$row['sno'].'">DELETE</a></button>
        </td>    
           '?>  
    </tr>
        </form>
  </tbody>
  <?php
        }
        ?>
</table>
  </div>
</div>
	</div>
</div>




<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

</body>

</html>

