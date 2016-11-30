<?php include 'includes/config.php';?>
<?php include 'includes/header.php';?>
		<h1>Contact Us</h1> 

	    
<?php
//postback3.php

/*echo '<pre>';
var_dump ($_SERVER);
echo '</pre>';
die; */

//echo basename($_SERVER['PHP_SELF']);

//define('THIS_PAGE', basename($_SERVER['PHP_SELF']));

//echo THIS_PAGE;

//die;

/* 

' . XXX . '

*/

if(isset($_POST['FirstName']))
{
    //echo $_POST['FirstName'];
    /*echo '<pre>';
    var_dump($_POST);
    echo '</pre>';
    
    */
   
    
    $to      = 'vfilev01@seattlecentral.edu'; // this is where the messages from the contact form go to
    $subject = 'ITC240 Contact Form'; //subject of the email
    $message = process_post(); // message from the comment section in the contact form
    $replyTo = $_POST['Email']; // mail from the contact form
    $headers = 'From: noreply@seattlecentral.edu' . PHP_EOL . //what customers will see if they hover over; this indicates to the server this is not spam
    'Reply-To: ' . $replyTo . PHP_EOL . // here we set to whom to reply if we click reply from the received email.
    'X-Mailer: PHP/' . phpversion();

    mail($to, $subject, $message, $headers);
    
    echo '<p>
    <a href="' . THIS_PAGE . '">EXIT</a>
    
    </p>';  

  
}else{
    
    echo '
    <form action="' . THIS_PAGE . '" method="post">
First Name: <input type="text" name="FirstName" required="required" autofocus="autofocus" title="First Name is Required." placeholder="First Name goes here" /><br />
Email: <input type="email" name="Email" required="required" /><br />
Comments: <textarea name="Comments"></textarea> <br />
<input type="submit" value="Click Me" />
</form>
    ';
    }


//new function bellow

function process_post()
{//loop through POST vars and return a single string
    $myReturn = ''; //set to initial empty value

    foreach($_POST as $varName=> $value)
    {#loop POST vars to create JS array on the current page - include email
         $strippedVarName = str_replace("_"," ",$varName);#remove underscores
        if(is_array($_POST[$varName]))
         {#checkboxes are arrays, and we need to collapse the array to comma separated string!
             $myReturn .= $strippedVarName . ": " . implode(",",$_POST[$varName]) . PHP_EOL;
         }else{//not an array, create line
             $myReturn .= $strippedVarName . ": " . $value . PHP_EOL;
         }
    }
    return $myReturn;
}



?>

<?php include 'includes/footer.php'; ?>