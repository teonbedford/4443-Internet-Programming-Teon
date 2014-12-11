<?php

if(isset($_POST['action'])){
	$RCBack = new RC_Backend();
	switch($_POST['action']){
		case 'GetShoppingCartItems':
			$data = $RCBack->GetShoppingCartItems($_POST['list_ids']);
			break;
		default: echo"what?";
	}
	echo json_encode($data);
}

class RC_Backend{
	var $Conn;
	
	function __construct(){
		$this->Conn = mysqli_connect("localhost","4443","4443","RC");
	}
	
	function GetShoppingCartItems($items){
		$result = $this->Conn->query("SELECT * FROM Products WHERE ProdID in ({$items})");
		$data = array();
		while ($row = $result->fetch_assoc()){	
			$data[] = $row;
		}
		return $data;
	}
}

class RC_Store{
	var $PageSize;
	var $CurrentPage;
	var $Conn;
	
	function __construct($page_size=20,$current_page=1){
		$this->PageSize = $page_size;
		$this->CurrentPage = $current_page;
		$this->Conn = mysqli_connect("localhost","root","Arashi5!","RC");
	}
	
	/** 
 	* Gets the current page number 
 	* @returns int
 	*/
	function GetCategories(){
		$result = $this->Conn->query("SELECT DISTINCT(Category) as category FROM Products");
		
		$categories = array();
		while ($row = $result->fetch_assoc()){
			$categories[] = $row['category'];
		}
		sort($categories);
		return $categories;
	}
	
	/** 
 	* Gets the current page number 
 	* @returns int
 	*/
	function GetCurrentPage(){
		return $this->CurrentPage;
	}
	
	/** 
 	* Gets the current page size 
 	* @returns int
 	*/
	function GetPageSize(){
		return $this->PageSize;
	}
	
	/** 
 	* Sets the page size 
 	* @param (int) size
 	* @returns (int)
 	*/	
	function SetPageSize($size){
		$this->PageSize = $size;
	}

	/** 
 	* Sets the current page
 	* @param (int) current
 	* @returns (int)
 	*/	
	function SetCurrentPage($current){
		$this->CurrentPage = $current;
	}

	/** 
 	* Returns the next page, after incrementing current page
 	* @returns (int)
 	*/	
	function NextPage(){
		$this->CurrentPage++;
		return $this->CurrentPage;
	}
	
	
}