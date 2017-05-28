
 <html>
 	<head>
 		<title>Address Book</title>
 	</head>
 	<body>
 	 <nav class="navbar navbar-default">
    <div class="topnav" style="background-color: #ddd;padding: 50px">
    </div>
 <nav class="navbar navbar-default">
    <div class="navbar-header" style="background-image: url('im.png');padding: 150px">
    
 <h2>Add Contact</h2>
 <p> 
 <form action="add.php" method=post> 
 <table>
 <tr><td>Name:</td><td><input type="text" name="name" /></td></tr> 
 <tr><td>Phone:</td><td><input type="text" name="phone" /></td></tr> 
 <tr><td>Email:</td><td><input type="text" name="email" /></td></tr> 
 <tr><td colspan="2" align="center"><input type="submit" name="add"/></td></tr>
 </table> 
 </form> <p>

</div>  
    </nav>  
    
 	</body> 
 </html> 
  <?php
  session_start();
 if(!$_SESSION['username'])
{

    header("Location: hi.php");//redirect to login page to secure the welcome page without login access.
} 
 
 $con=mysqli_connect("localhost", "root", "","heeba")or die(mysql_error()); 
 mysqli_select_db($con,"heeba")or die(mysql_error());
if(isset($_POST['add']))
{
    $name=$_POST['name'];
    $phone=$_POST['phone'];
 	$email=$_POST['email'];
  $sql=mysqli_query ($con,"INSERT INTO `address` (`name`, `phone`, `email`) VALUES ('$name', '$phone', '$email')");
  echo "<script>window.open('address.php','_self')</script>";
 }
 //mysqli_close($con);  
 	?>