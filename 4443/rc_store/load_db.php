<?php
//Turn errors on for dev purposes
ini_set('display_errors',1);  
error_reporting(E_ALL);

$path = './rc_pages/';
$dir = scandir($path);

array_shift($dir);
array_shift($dir);

//Connect to database
$conn=mysqli_connect("localhost","4443","4443","RC");
// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit;
}

//We emptied some previously populated tables as we were testing
//Be careful with these statements
$result = $conn->query("truncate Products");
$result = $conn->query("truncate Media");
//Require the html dom parsing library
require('html_dom.php');



//Set counter to 0
$i = 0;

foreach($dir as $page){
//Grabs a single page, but YOU will need to change this
//to read from your rc_pages directory
$html = file_get_html($path.$page);

//Intialize empty array (not required by php, but good practice)
$content = array();

//foreach 'div.product-single-item' or a div tag that has the class 'product-single-item'
foreach($html->find('div.product-single-item') as $element){
    //Pull html attributes out of each tag with info pertaining to each product
    $content[$i]['href'] = $element->find('a',0)->attr['href'];
    $content[$i]['alt'] = $element->find('img',0)->attr['alt'];
    $content[$i]['src'] = $element->find('img',0)->attr['src'];
    $content[$i]['title'] = $element->find('h5',0);

    //The price needed special treatment so we could store it as an actual "float", so 
    //we trimmed whitespace and the '$' off of the price.
    $content[$i]['price'] = trim($element->find('div.pricing',0)->plaintext);
    $content[$i]['price'] = trim($content[$i]['price'],"$");

    //Build our sql query with this iterations data
    $sql = "INSERT INTO `RC_Store`.`Products` (`ProdID`, `ShortTitle`, `Link`, `Price`) 
        VALUES ('{$i}','{$content[$i]['alt']}','{$content[$i]['href']}','{$content[$i]['price']}')";
    $result = $conn->query($sql);

    //getimagesize returns an array with 4 items
    //the list function pulls all 4 items out of the array, and puts them into variable names 
    list($width, $height, $type, $attr) = getimagesize($content[$i]['src']);
    $thumb = file_get_contents($content[$i]['src']);

    //Write the image to our local file system with a name of our choice
    file_put_contents("./thumbs/{$i}.png",$thumb);

    //Build another sql statement to store the image information. We are storing the image in a seperate
    //table to keep our database "normalized". This way we can store multiple images for a single product
    //without cramming it into a single table.
    $sql = "INSERT INTO `RC_Store`.`Media` (`ProdID`, `Type`, `Location`, `Width`,`Height`,`Size`) 
        VALUES ('{$i}','thumb','{$content[$i]['src']}','{$width}','{$height}','0')";
    $result = $conn->query($sql);
    $i++;
}
}
echo 'DONE....';
?>