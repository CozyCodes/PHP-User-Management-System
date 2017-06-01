 <?php
session_start();
include_once 'connect.php';

if(!isset($_SESSION['user2']))
{
	header("Location: index.php");
}
$res=mysql_query("SELECT * FROM user WHERE user_id=".$_SESSION['user2']);
$userRow=mysql_fetch_array($res);
?>
 <?php 
error_reporting(0);
 ?>

 <?php
	$id=$_POST['txtid'];
	$txtname= $_GET["txtname"];
	// echo $id;
        include ("connect.php");
		$j = mysql_query("delete from user where user_name='".$txtname."'");
		$i = mysql_query("delete from student_admin where stud_admin_id=".$id);
		
        if($i==true && $j==true){
        echo '<META HTTP-EQUIV="Refresh" Content="0; URL=manage-stud-admin.php">';
        }
        // header('Location::index.php');
        //exit;
        //mysql_close();
    ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Delete Cottage</title>
<link rel="stylesheet" href="style.css" type="text/css" />
<style>
ul#menu {
    padding: 0;
}

ul#menu li {
    display: inline;
}

ul#menu li a {
    background-color: #9c4609;
    color: white;
    padding: 10px 20px;
    text-decoration: none;
    border-radius: 4px 4px 0 0;
}

ul#menu li a:hover {
    background-color: black;
}
</style>
</head>
<body>
<div id="header">
	<div id="left">
    <label>ADMIN PAGE</label>
    </div>
    <div id="right">
    	<div id="content">
        	hi' <?php echo $userRow['user_name']; ?>&nbsp;<a href="logout.php?logout">Sign Out</a>
        </div>
		    <div style="position:relative;right:800px;top:70px">  <ul id="menu">
    <li><a href="index.php">Home</a></li>
  <li><a href="edit-profile.php?txtid=<?php echo $userRow['user_name']?>;">Edit Profile</a></li>
  <li><a href="change_password.php">Change Password</a></li>
</ul>
    </div>
    </div>
</div><center>
      <form action="" method="post" enctype="multipart/form-data">
   		<table class="table">
		<tr>
                
                <?php
				$eid= $_GET["txtid"];
				
				// echo $eid;
					include ("connect.php");
					$g = mysql_query("select * from student_admin WHERE stud_admin_id = '".$eid."'");
					while($id=mysql_fetch_array($g))
					{
				?>
                <br><br><br><br><br>
				 <center><h1 style="color:black">DELETE USER</h1></center><br>
                	<th>Student ID</th>
                    <td><input type="text" name="txtid" value="<?php echo $id[0]; ?>" readonly="readonly" /></td>
                </tr>
              
                <tr>
                	<th>Student Username</th>
                    <td><input type="text" name="txtname" value="<?php echo $id[1]; ?>"  readonly="readonly" /></td>
                </tr>
				
				<tr>
                	<th>Student Name</th>
                    <td><input type="text" name="txtprice" value="<?php echo $id[2]; ?>"  readonly="readonly"/></td>
                </tr>  
				<tr>
                	<th>Student Email</th>
                    <td><input type="text" name="txtsumprice" value="<?php echo $id[3]; ?>"  readonly="readonly"/></td>
                </tr> 
				<tr>
                	<th>Student Address</th>
                    <td><input type="text" name="txtwinprice" value="<?php echo $id[5]; ?>"  readonly="readonly"/></td>
                </tr> 
					<tr>
                	<th>Student Phone</th>
                    <td><input type="text" name="txtsprprice" value="<?php echo $id[6]; ?>"  readonly="readonly"/></td>
                </tr> 
				  <?php
					}
				?>
  <tr>
                    <td><input type="submit" name="cmdadd" value="Delete" /></td>
     <!--               <td><input type="reset" name="cmdreset" value="Clear"/></td>  -->
                </tr>
   		</table>
   	 </form>
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
   	 </table>    

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
            document.getElementById('field').value="500";
    }
        else if(option=="winter"){
            document.getElementById('field').value="1000";
        }
 else if(option=="spring"){
            document.getElementById('field').value="1400";
        }
}
</script>
