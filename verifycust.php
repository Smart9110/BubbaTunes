<head>
<style>
document.addEventListener("deviceready", onDeviceReady, false);
function onDeviceReady() {
    window.open = cordova.InAppBrowser.open;
}

var ref = cordova.InAppBrowser.open('http://192.168.1.3:3000/start.html', '_blank', 'location=yes');



</style>
</head>

<body>
	

	<div data-role="page" class="ui-content">
	<div data-role="header" data-position="fixed">
		 <h1>VerifyCustomer Page</h1>
		</div> 


<?php
   session_start();

   include("mylibrary/login.php");
   login();

   $email = $_POST['email'];
   $password = $_POST['password1'];

   $query = "SELECT * from customers where email = '$email' and password = PASSWORD('$password')";
   $result = mysql_query($query);
   $row = mysql_num_rows($result);

   if ($row)
   {
      $row = mysql_fetch_array($result, MYSQL_ASSOC);
      $custid = $row['custid'];
      $_SESSION['cust'] = $custid;
      header("Location:start.html");
   } else
   {
      echo "<h2>Sorry, Unable to verify customer</h2>\n";
      echo "<a href=\"http://192.168.1.4:3000/memberslogin.html\">Go back to check out</a>\n";
      echo "<a href=\"#\" onclick=cordova.InAppBrowser.open('http://192.168.1.3:3000/memberslogin.html',  '_blank', 'location=yes');\>Go back to check out</a>\n";

   }
?>



</div>