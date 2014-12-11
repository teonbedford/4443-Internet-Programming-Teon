<?php
$conn=mysqli_connect("localhost","4443","4443","RC");
require('backend.php');

$RCstore = new RC_Store();

//Set the ps (page start) and cp (current page) vars.
//Check if they are set, if not, give them default values.
if(isset($_GET['ps']))
	$RCstore->SetPageSize($_GET['ps']);

if(isset($_GET['cp']))
	$RCstore->SetCurrentPage($_GET['cp']);
	
?>
 
<!DOCTYPE html>
<html lang="en">
 
<head>
 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
 
    <title>Shop Homepage - Start Bootstrap Template</title>
    <!-- jQuery -->
    <script src="js/jquery.js"></script>
 
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.cookie.js"></script>
	<link href="css/jquery-impromptu.css"	rel="stylesheet">
	<script src="js/jquery-impromptu.js"></script>
	<script src="js/jquery.remodal.js"></script>
	
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
 
    <!-- Custom CSS -->
    <link href="css/shop-homepage.css" rel="stylesheet">
    <link href="css/jquery.remodal.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	<style>
	 .cart-top{
		font-size:22px;
		color:white;
		margin-top:10px;
	 }
	</style>
</head>
 
<body>
 
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Start Bootstrap</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#">About</a>
                    </li>
                    <li>
                        <a href="#">Services</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>
                </ul>
				<span class="glyphicon glyphicon-shopping-cart pull-right cart-top" id="show-cart"></span>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
 
    <!-- Page Content -->
    <div class="container">
 
        <div class="row">
 
            <div class="col-md-3">
                <p class="lead">Shop Name</p>
                <div class="list-group">
                    <a href="#" class="list-group-item">Category 1</a>
                    <a href="#" class="list-group-item">Category 2</a>
                    <a href="#" class="list-group-item">Category 3</a>
                </div>
            </div>
 
            <div class="col-md-9">
 
                <div class="row carousel-holder">
 
                    <div class="col-md-12">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img class="slide-image" src="http://placehold.it/800x300" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="http://placehold.it/800x300" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="http://placehold.it/800x300" alt="">
                                </div>
                            </div>
                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>
                    </div>
 
                </div>
				<?php

					$prev_page = $RCstore->GetCurrentPage()-1;
					$next_page = $RCstore->GetCurrentPage()+1;
					$start_row = ($RCstore->GetCurrentPage()-1)*$RCstore->GetPageSize();
					$end_row = $start_row + $RCstore->GetPageSize();
					
					$sql = "SELECT * FROM Products
							LIMIT $start_row,".$RCstore->GetPageSize();

					if(!$result = $conn->query($sql)){
						echo "error";
					}

				?>
				<div class="row">
				<div class="col-sm-3"></div>
				<div class="col-sm-6">
					<nav>
					  <ul class="pagination">
						<li><a href="<?php echo $_SERVER['PHP_SELF']."?cp=1"?>"><span aria-hidden="true">&laquo;&laquo;</span><span class="sr-only">Previous</span></a></li>
						<li><a href="<?php echo $_SERVER['PHP_SELF']."?cp=$prev_page"?>"><span aria-hidden="true">&laquo;</span><span class="sr-only">Previous</span></a></li>
						<li><a href="#">Products: <?php echo"{$start_row} - {$end_row}";?> </a></li>
						<li><a href="<?php echo $_SERVER['PHP_SELF']."?cp=$next_page"?>"><span aria-hidden="true">&raquo;</span><span class="sr-only">Next</span></a></li>
						<li><a href="<?php echo $_SERVER['PHP_SELF']."?cp=0"?>"><span aria-hidden="true">&raquo;&raquo;</span><span class="sr-only">Previous</span></a></li>
 
					  </ul>
					</nav>
				</div>
				<div class="col-sm-3"></div>
				</div><!-- end row -->
                <div class="row">
					<?php
					while ($row = $result->fetch_assoc()){
					echo '
                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <a href="" class="img-modal" data="'.$row['ProdID'].'"><img src="http://systempause.net/homepage/thumbs/'.$row['ProdID'].'.png" alt=""></a>
                            <div class="caption">
                                <h4><a href=# data="'.$row['Name'].'"><span class="glyphicon glyphicon-shopping-cart shop-icon" data="'.$row['ProdID'].'"></span></a> $'.$row['Price'].'</h4>
                                <h4><a href="#">'.$row['Name'].'</a></h4>
                            </div>
                            <div class="ratings">
                                <p class="pull-right">15 reviews</p>
                                <p>
                                    <span class="glyphicon glyphicon-star" ></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                </p>
                            </div>
                        </div>
                    </div>';
					}
					?>
 
                </div>
 
            </div>
 
        </div>
		<div class="remodal" data-remodal-id="modal">
			<h1>Car Title</h1>
			<p>
			  <img src="http://systempause.net/homepage/thumbs/45.png">
			</p>
			<br>
			<a class="remodal-cancel" href="#">Cancel</a>
			<a class="remodal-confirm" href="#">OK</a>
		</div>
		<div class="remodal" data-remodal-id="modal-cart">
			<h1>Car Title</h1>
			<p>
			  <img src="http://systempause.net/homepage/thumbs/45.png">
			</p>
			<br>
			<a class="remodal-cancel" href="#">Cancel</a>
			<a class="remodal-confirm" href="#">OK</a>
		</div>
    <!-- /.container -->
 
    <div class="container">
 
        <hr>
 
        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
            </div>
        </footer>
    </div>
    </div>
    <!-- /.container -->
	<script>
		$(function() {

			 var items = [];
			$( ".img-modal" ).click(function(e) {
				e.preventDefault();
				console.log($(this).children().first().attr("src"));
				console.log($(this).attr("data"));
				$('.remodal img').attr("src",$(this).children().first().attr("src"));
				var inst = $.remodal.lookup[$('[data-remodal-id=modal]').data('remodal')];
				// open the modal
				inst.open();
			});
			
			$( ".shop-icon" ).click(function(e) {
				items.push($(this).attr("data"));
				console.log($(this).parent().attr("data"));
				e.preventDefault();
				$.prompt($(this).parent().attr("data") +" added to Shopping Cart!");
				$.cookie('items',items);
				console.log($.cookie());
			});
			
			$( "#show-cart" ).click(function(e) {
				e.preventDefault();
				$('.remodal img').attr("src",$(this).children().first().attr("src"));
				var inst = $.remodal.lookup[$('[data-remodal-id=modal-cart]').data('remodal')];
				// open the modal
				inst.open();
			});
		});
	</script>
</body>
 
</html>