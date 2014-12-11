<?php
//Turn errors on for dev purposes
ini_set('display_errors',1);  
error_reporting(E_ALL);

//Connect to database
$conn=mysqli_connect("localhost","4443","4443","RC_Store");
// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit;
}

//We emptied some previously populated tables as we were testing
//Be careful with these statements
//$result = $conn->query("truncate Products");
//$result = $conn->query("truncate Media");
//Require the html dom parsing library
require('html_dom.php');

//Grabs a single page, but YOU will need to change this
//to read from your rc_pages directory
$html = file_get_html('./rc_pages/airplanes_1.htm');

//Intialize empty array (not required by php, but good practice)
$content = array();

//Set counter to 0
$i = 0;

//Use a "pre" tag to make the "print_r" look more readable.
//echo "<pre>";
//echo $html
//echo "</pre>"
//foreach 'div.product-single-item' or a div tag that has the class 'product-single-item'
foreach($html->find('div.product-single-item') as $element){
    //Pull html attributes out of each tag with info pertaining to each product
	echo $element->find('a',0)->attr['href'];
	echo $element->find('img',0)->attr['alt'];
	echo $element->find('img',0)->attr['src'];
	echo $element->find('h5',0);
	echo trim($element->find('div.pricing',0)->plaintext);
	echo '</br>';
	
}
;

