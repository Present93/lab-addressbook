<ht2ml>
 	<head>
 		<title>Address Book</title>
 	</head>
 	<body>
 	 <nav class="navbar navbar-default">
    <div class="topnav" style="background-image: url('im.png');padding: 150px">
    <div style= margin:20px;><a href="add.php"target="_blank">Add Contact</a>
    </div>
 <nav class="navbar navbar-default">
    <div class="navbar-header" style="background-color: #ddd;padding: 10px">
 
 	<?php
 // Connects to your Database
session_start();
 if(!$_SESSION['username'])
{

    header("Location: hi.php");//redirect to login page to secure the welcome page without login access.
} 
 
 $con=mysqli_connect("localhost", "root", "","heeba")or die(mysql_error()); 
 mysqli_select_db($con,"heeba")or die(mysql_error());
if(isset($_GET['mode']))
$mode= $_GET['mode'];
else
$mode="";	
if(isset($_GET['name']))
$name= $_GET['name'];
else
$name="";	
if(isset($_GET['phone']))
$phone= $_GET['phone'];
else
$phone="";	
if(isset($_GET['email']))
$email= $_GET['email'];
else
$email="";	
if(isset($_GET['id']))
$id= $_GET['id'];
else
$id="";	
$self = $_SERVER['PHP_SELF'];

 if ( $mode=="edit") 
 { 
 Print '<h2>Edit Contact</h2> 
 <p> 
 <form action=';
 echo $self; 
 Print '
 method=GET> 
 <table> 
 <tr><td>Name:</td><td><input type="text" value="'; 
 Print $name; 
 print '" name="name" /></td></tr> 
 <tr><td>Phone:</td><td><input type="text" value="'; 
 Print $phone; 
 print '" name="phone" /></td></tr> 
 <tr><td>Email:</td><td><input type="text" value="'; 
 Print $email; 
 print '" name="email" /></td></tr> 
 <tr><td colspan="2" align="center"><input type="submit" /></td></tr> 
 <input type=hidden name=mode value=edited> 
 <input type=hidden name=id value='; 
 Print $id; 
 print '> 
 </table> 
 </form> <p>'; 
 } 
 
 if ( $mode=="edited") 
 { 
 mysqli_query ($con,"UPDATE address SET name = '$name', phone = '$phone', email = '$email' WHERE id = $id"); 
 Print "Data Updated!<p>"; 
 } 

if ( $mode=="remove") 
 {
 mysqli_query ($con,"DELETE FROM address where id=$id");
 Print "Entry has been removed <p>";
 }

  $data = mysqli_query($con,"SELECT * FROM address ORDER BY name ASC") 
 or die(mysql_error()); 
 Print "<h2>Address Book</h2><p>"; 
 Print "<table border cellpadding=3>"; 
 Print "<tr><th width=100>Name</th><th width=100>Phone</th><th width=200>Email</th><th width=100 colspan=2>Admin</th></tr>";  
 while($info = mysqli_fetch_array( $data )) 
 { 
 Print "<tr><td>".$info['name'] . "</td> "; 
 Print "<td>".$info['phone'] . "</td> "; 
 Print "<td> <a href=mailto:".$info['email'] . ">" .$info['email'] . "</a></td>"; 
 Print "<td><a href=" .$_SERVER['PHP_SELF']. "?id=" . $info['id'] ."&name=" . $info['name'] . "&phone=" . $info['phone'] ."&email=" . $info['email'] . "&mode=edit>Edit</a></td>"; Print "<td><a href=" .$_SERVER['PHP_SELF']. "?id=" . $info['id'] ."&mode=remove>Remove</a></td></tr>"; 
 } 
 Print "</table>"; 
 
//Print "<td colspan=5 align=right><a href=" .$_SERVER['PHP_SELF']. "?mode=add>Add Contact</a></td>";
?>
</div>  
    </nav>  
    
 	</body> 
 </html> 
