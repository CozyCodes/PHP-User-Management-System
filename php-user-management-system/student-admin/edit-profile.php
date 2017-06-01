 <?php
session_start();
include_once 'connect.php';

if(!isset($_SESSION['user1']))
{
	header("Location: index.php");
}
$res=mysql_query("SELECT * FROM user WHERE user_id=".$_SESSION['user1']);
$userRow=mysql_fetch_array($res);
?>
 <?php 
error_reporting(0);	
 ?>

	<?php   
        $id = $_GET["txtid"];
        $name = trim($_POST['txtname']);		
		$email = trim($_POST['txtemail']);
		$address = trim($_POST['txtaddress']);
		$phone = trim($_POST['txtphone']);				


        if(isset($_POST['cmdadd'])){
        // if(empty($name) ||  empty($address) || empty($phone))
        // {
            // echo "<center>Sorry please input data</center>";
        // }
//			else
	//	{
        include "connect.php";

	   // $i = mysql_query("update student_admin set stud_admin_name='".$_POST['txtname']."', stud_admin_email='".$_POST['txtemail']."', stud_admin_address='".trim($_POST['txtaddress'])."', stud_admin_phone='".$_POST['txtphone']."' where stud_admin_uname=".$_SESSION['name1']);
	 
// $i = mysql_query("update student_admin set stud_admin_email='".$_POST['txtemail']."', stud_admin_address='".trim($_POST['txtaddress'])."', stud_admin_phone='".$_POST['txtphone']."' where stud_admin_uname=".$_SESSION['name1']);
	$i  =   mysql_query("UPDATE student_admin set stud_admin_name='". $name."',stud_admin_address='". $address."',stud_admin_phone='". $phone."' WHERE stud_admin_uname='".$_SESSION["name1"]."'");
	// $i  =   mysql_query("UPDATE student_admin set stud_admin_name='". $name."' WHERE stud_admin_uname='".$_SESSION["name1"]."'");
	if($i==true){
		  ?>
		  <script>alert('Update Successful');</script>
		  <?php
        echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php">';
        }
        //if($i==true){
        //header('Location:index.php');
        //exit;
        //mysql_close();
        //}
   //     }
    }
    ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit Profile</title>
<link rel="stylesheet" href="style.css" type="text/css" />
<script type="text/javascript" src="js/jquery.js"></script>
<style>
ul#menu {
    padding: 0;
}

ul#menu li {
    display: inline;
}

ul#menu li a {
    background-color: black;
    color: white;
    padding: 10px 20px;
    text-decoration: none;
    border-radius: 4px 4px 0 0;
}

ul#menu li a:hover {
    background-color: orange;
}
</style>
</head>
<body>
<div id="header">
	<div id="left">
    <label>STUDENT ADMIN PAGE</label>
    </div>
    <div id="right">
    	<div id="content">
        		hi' <?php echo $userRow['user_name']; ?>&nbsp;<a href="student-admin-logout.php?logout">Sign Out</a>
        </div>
				    <div style="position:relative;right:800px;top:70px">  <ul id="menu">
  <li><a href="index.php">Home</a></li>
  <li><a href="edit-profile.php">Edit Profile</a></li>
   <li><a href="change_password.php">Change Password</a></li>
<!--   <li><a href="student.php">Student Page</a></li>  -->

</ul>
    </div>
    </div>
</div>

<center>
      <form action="" method="post" enctype="multipart/form-data">
   		<table class="table">
		<tr>
                
                <?php
				$eid= $_GET["txtid"];
				// echo $eid;
					include ("connect.php");
					$g = mysql_query("select * from student_admin WHERE stud_admin_uname = '".$_SESSION['name1']."'");
					while($id=mysql_fetch_array($g))
					{
				?>
                <br><br><br><br><br><br>
				<center><h1 style="color:black">Edit Profile</h3></center><br>
             <!--   	<th>Cottage ID</th>
                    <td><input type="text" name="txtid" value="<?php echo $id[0]; ?>" readonly="readonly" /></td>  -->
                </tr>
              
                <tr>
                	<th>Student Name</th>
                    <td><input type="text" name="txtname" value="<?php echo $id[2]; ?>" /></td>
                </tr>
				
				
				<tr>
                	<th>Student Email</th>
                    <td><input type="text" name="txtemail" value="<?php echo $id[3]; ?>" readonly="readonly" /></td>
                </tr>
				
				<tr>
                	<th>Student Address</th>
                    <td><input type="text" name="txtaddress" value="<?php echo $id[5]; ?>"  /></td>
                </tr>
				
				<tr>
                	<th>Student Phone</th>
                    <td><input type="text" name="txtphone" value="<?php echo $id[6]; ?>"  /></td>
                </tr>
				
				  <?php
					}
				?>
  <tr>
                    <td><input type="submit" name="cmdadd" value="Update" /></td>
     <!--               <td><input type="reset" name="cmdreset" value="Clear"/></td>  -->
                </tr>
   		</table>
   	 </form>

 <!--  	 <table class="table table-bordered table-hover">
   	 	 <thead>
   	 	 	 <tr>
   	 	 	 	 <th>ID</th>
   	 	 	 	 <th>PictureName</th>
   	 	 	 	 <th>Profile</th>
   	 	 	 	 <th>Action</th>
   	 	 	 </tr>
   	 	 </thead>
   	 	 <tbody>
   	 	 	 <?php 
   	 	 	 	$pic = mysql_query("SELECT * FROM tbpicture");
   	 	 	 	while($row = mysql_fetch_object($pic))
   	 	 	 	{
   	 	 	 		?>
   	 	 	 			<tr>
   	 	 	 			     <td><?= $row->p_id ?></td>
   	 	 	 			     <td><?= $row->picturename ?></td>
   	 	 	 			     <td><img src="img/<?= $row->profile ?>" style="width:100px;height:100px;"></td>
   	 	 	 			     <td><a href="edit.php?eid=<?= $row->id ?>">Edit</a>|<a onclick="return confirm('Are you sure?')" href="index.php?did=<?= $row->id ?>">Delete</a></td>
   	 	 	 			</tr>
   	 	 	 		<?php 
   	 	 	 	}
   	 	 	 ?>
   	 	 </tbody>
   	 </table>    -->

  </div>
</body>
</html>
     
<script type="text/javascript">
	$(function(){
		$("#images").change(function(){
            readURL(this);
	    });    
    });	

    function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blah').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}
</script>
<script type="text/javascript">
function changeValue(){
    var option=document.getElementById('filter').value;

    if(option=="summer"){
            document.getElementById('field').value="summer";
    }
        else if(option=="winter"){
            document.getElementById('field').value="winter";
        }
 else if(option=="spring"){
            document.getElementById('field').value="spring";
        }
}
</script>
