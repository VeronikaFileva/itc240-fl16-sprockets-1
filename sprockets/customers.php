<?php include 'includes/config.php';?>
<?php include 'includes/header.php';?>
		<h1>Customer Data</h1> 
<?php
$sql = "select * from test_Customers";


$iConn = @mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) or die(myerror(__FILE__,__LINE__,mysqli_connect_error())); //what error visible for developer but not for the user
$result = mysqli_query($iConn,$sql) or die(myerror(__FILE__,__LINE__,mysqli_error($iConn))); // error from which connection
if (mysqli_num_rows($result) > 0)//at least one record!
{//show results
	while ($row = mysqli_fetch_assoc($result))
    {
	   echo "<p>";
	//   echo "FirstName: <b>" . $row['FirstName'] . "</b><br />";
	  //we replaced the above line with a line showing us the first name and a link to their personal page
        echo '<a href="customer_view.php?id=' . $row['CustomerID'] . '">' . $row['FirstName'] . '</a>';
        
       echo "LastName: <b>" . $row['LastName'] . "</b><br />";
	   echo "Email: <b>" . $row['Email'] . "</b><br />";
	   echo "</p>";
    }
}else{//no records
	echo '<div align="center">What! No customers?  There must be a mistake!!</div>';
}


@mysqli_free_result($result); #releases web server memory and displays the result
@mysqli_close($iConn); #close connection to database

?>
<?php include 'includes/footer.php'; ?>