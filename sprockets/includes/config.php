<?php
//config.php

//this enables pages to know their own names
define('THIS_PAGE',basename($_SERVER['PHP_SELF']));
define('DEBUG',TRUE); #we want to see all errors

//this clears date errors of all sorts
date_default_timezone_set('America/Los_Angeles');

//This is inside of an H1 in the header.php file
$banner = 'Banner Goes Here';

$nav1['index.php'] = 'Main Page';
$nav1['template.php'] = 'Template Page';
$nav1['contact.php'] = 'Contact Us';
$nav1['customers.php'] = 'Customers';


switch(THIS_PAGE)
{
    case 'template.php':
        $title = 'Template Page';
    break;
    case 'contact.php':
        $title = 'Contact Page';
    break;    
    
    default:
        $title = THIS_PAGE;
        
}

//stores database login info
include 'credentials.php';




function makeLinks($nav)
{
    $myReturn = "";
    
    foreach($nav as $url => $text){
    
        
        if(THIS_PAGE == $url)
        {
           $myReturn .= '<li class="current"><a href="' . $url . '">' . $text . '</a></li>';
        }else{
          $myReturn .= '<li><a href="' . $url . '">' . $text . '</a></li>';
        }
        
        
        
        
        

    
    }
    
    
    return $myReturn;
}


function myerror($myFile, $myLine, $errorMsg)
{
    if(defined('DEBUG') && DEBUG)
    {
       echo "Error in file: <b>" . $myFile . "</b> on line: <b>" . $myLine . "</b><br />";
       echo "Error Message: <b>" . $errorMsg . "</b><br />";
       die();
    }else{
		echo "I'm sorry, we have encountered an error.  Would you like to buy some socks?";
		die();
    }
}
