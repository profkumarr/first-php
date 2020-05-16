<?php
$con = new MySQLi("localhost", "root", "Cms_soft@1605", "simple");

if($con->connect_error)
{
  die("Failed".$con->connect_error);
}
else
{
  //echo "connected";
}

if(isset($_POST['name']))
{
  $msg = '';
  $sql = $con->query("INSERT INTO `student`( `name`, `regno`, `email`) 
    VALUES ('".$_POST['name']."',
            '".$_POST['regno']."', 
            '".$_POST['email']."')");
  
  if($sql == TRUE)
  {
    $msg = "Sucessfully Stored!";
  }
  else
  {
    $msg =  "Not Instered";
  }
}


?>
<!DOCTYPE html>
<html>
<head>
	<title>Student Information</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">

</head>
<body>
	<div class="container" style="padding-top: 30px;">
		<?php if(isset($msg))
        {?>
        <div class="alert alert-success" role="alert">
          <?php echo $msg;?>
            </div>
        <?php } ?>

		<div class="row">
			<div class="col-md-12">
				      <div class="alert alert-primary" role="alert">
              			A simple Database Connection
     					 </div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
		<form action="" method="POST">

            <div class="form-group">
              <label for="exampleInputEmail1">Name</label>
              <input type="text" class="form-control" name="name"  placeholder="Name">
                </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Register Number</label>
              <input type="text" class="form-control" name="regno" placeholder="Regno">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Email</label>
              <input type="email" class="form-control" name="email" placeholder="Email">
            </div>
 
  <button type="submit" class="btn btn-primary">Submit</button>
          </form>

<br>
<div class="row">
  <div class="col-md-12">
    <div class="alert alert-info" role="alert">
              Student Information
            </div>
            <br>

    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Regno</th>
      <th scope="col">Email</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    $sql = $con->query("SELECT * FROM student");
    $sl=1;
    while($row=$sql->fetch_assoc())
      {
        ?>
    <tr>
      <th scope="row"><?php echo $sl++;?></th>
      <td><?php echo $row['name'];?></td>
      <td><?php echo $row['regno'];?></td>
      <td><?php echo $row['email'];?></td>
    </tr>
    <?php } ?>
  </tbody>
</table>
  </div>
  </div>
</div>

</div>
</div>
</body>

	<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/bootstrap.min.js" ></script>
</body>
</html>