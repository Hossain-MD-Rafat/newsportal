<?php 
error_reporting(E_ERROR | E_PARSE);


session_start();

$conn= new mysqli('localhost','root','','newsportal') or die(mysqli_error($conn));

$name='';
$email='';
$location='';
$update=false;
$id=0;

//Button pressed
if (isset($_POST['save'])){
	$name=$_POST['name'];
	$email=$_POST['email'];
	$location=$_POST['location'];
	$password=$_POST['password'];



	$conn->query("INSERT INTO data (name,email,password,type) VALUES ('$name','$email','$password','$location')") or 
	         die($mysqli->error);

                  $_SESSION['message']="New Reporter added!";
                  $_SESSION['msg_type']="Successed";

                  header("location: CRUD.php");
}

?>

 <!-- Delete button -->
<?php
if(isset($_GET['delete'])){
	$id=$_GET['delete'];
	$conn->query("DELETE FROM data WHERE id=$id")or die($conn->error());

                  $_SESSION['message']="Reporter Suspended!";
                  $_SESSION['msg_type']="Suspended";

                  header("location: CRUD.php");
}
?>

 <!-- Edit button -->
<?php
if(isset($_GET['edit'])){
	$id=$_GET['edit'];
	$update=true;
	$result= $conn->query("SELECT * FROM data WHERE id=$id") or die($conn->error());
	    if(count($result)==1){
	    	$row= $result->fetch_array();
	    	$name=$row['name'];
	    	$email=$row['email'];
	    	$location=$row['type'];
	    }
}
?>

<!-- Update button -->
<?php
if(isset($_POST['update'])){
	$id=$_POST['id'];
	$name=$_POST['name'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$location=$_POST['location'];
	

	$conn->query("UPDATE data SET name='$name', email='$email',password='$password',type='$location' WHERE id =$id")or die($conn->error);

	$_SESSION['message']="Reporter information has been updated!";
    $_SESSION['msg_type']="Updated";

    header('location:CRUD.php');
}
?>