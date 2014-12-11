<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Simple Sidebar - Assignment Portal</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/simple-sidebar.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	
	<!-- Button Style -->
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
</head>

<body>

    <div id="wrapper">

        <!-- Sidebar -->
        <!--<div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                        Assignment Portal
                    </a>
                </li>
                <li>
                    <a href="?content=dashboard">Dashboard</a>
                </li>
                <li>
                    <a href="?content=register">Register</a>
                </li>
                <li>
                    <a href="#">Overview</a>
                </li>
                <li>
                    <a href="#">Events</a>
                </li>
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
        </div> -->
		<div id="sidebar-wrapper" class="sidebar-nav">
		<ul class="sidebar-nav" style="background:black;">
			<a class="list-group-item" href="#" style="background:black;"><i style="color:black;">&nbsp;</i></a>
			<a class="list-group-item" href="#" style="background:black; color:white;"><i class="fa fa-home fa-fw fa-lg"></i>&nbsp; Home</a>
			<a class="list-group-item" href="#" style="background:black; color:white;"><i class="fa fa-book fa-fw fa-lg"></i>&nbsp; Library</a>
			<a class="list-group-item" href="#" style="background:black; color:white;"><i class="fa fa-pencil fa-fw fa-lg"></i>&nbsp; Applications</a>
			<a class="list-group-item" href="#" style="background:black; color:white;"><i class="fa fa-cog fa-fw fa-lg"></i>&nbsp; Settings</a>
		</ul>
		</div>

        <!-- /#sidebar-wrapper -->
		
		<!-- Static navbar -->
      <div class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <!-- <a class="navbar-brand" href="#">Project name</a> -->
			<a href="#menu-toggle" style="color:white;" id="menu-toggle"><i class="fa fa-bars fa-2x" id="menu-toggle"></i></a>
          </div>
          <div class="navbar-collapse collapse">
          
            <ul class="nav navbar-nav navbar-right" style="color:white;">
              <li>Login&nbsp;</li>
              <li class="fa fa-home fa-fw fa-1x"></li>
              <li class="fa fa-cog fa-fw fa-1x"></li>
			  <li class="fa fa-cog fa-fw fa-1x"></li>
            </ul> 
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </div>

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>Teon Bedford Assignment Portal</h1>
             
						 <?php
							switch($_GET['content'])
							{
								case 'register': include("partials/register.php");
								break;
								case 'dashboard': echo"your momma";
								break;
								case 'testing': include("partials/forms.php");
								break;
								default : include("partials/default.php");
							}
						?>
						
                        <!-- <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a> -->
						<!-- <a href="#menu-toggle" class="btn btn-default" id="menu-toggle"><i class="fa fa-bars fa-3x" id="menu-toggle"></i></a> -->
				   </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery Version 1.11.0 -->
    <script src="js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

</body>

</html>
