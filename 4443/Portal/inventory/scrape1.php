<?php

//Require the necessary library obtained from the link above
require('html_dom.php');

// Create DOM from URL or file
$html = file_get_html('http://www.rcplanet.com/');

//Use a "pre" tag to make the "print_r" look more readable.
echo "<pre>";

//Create an empty array
$content = array();

//Set counter to zero
$i = 0;

//Loop through the "Dom" of www.rcplanet.com and grab needed elements
foreach($html->find('div.product-single-item') as $element){
    $content[$i]['href'] = $element->children[0]->attr['href'];
    $content[$i]['alt'] = $element->children[0]->children[0]->attr['alt'];
    $content[$i]['src'] = $element->children[0]->children[0]->attr['src'];
   // $content[$i]['title'] = $element->children[0]->children[0]->attr['title'];
    $content[$i]['price'] = trim($element->find('div.pricing',0)->plaintext);
    $i++;
}

print_r($content);