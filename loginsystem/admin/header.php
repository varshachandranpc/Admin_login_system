<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Admin | Manage Products</title>
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <link href="../assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="../assets/css/style.css" rel="stylesheet">
    <link href="../assets/css/style-responsive.css" rel="stylesheet">
  </head>
<style>
    h4.btn-style {
    padding-right: 20px;
    }
    .img-box .thumbnail img{

    }


        img {
            max-width: 100%;
            max-height: 200px;
            padding-top:10px;
        }
        h1 {
            color: green;
            margin:20px;
        }
       
       
        
    .thumbnail.text-center {
    border: 0px!important;
    }
    .thumbnail > img, .thumbnail a > img {
    
    display: initial;
    
    }
    .img-box > img {
      padding:20px;
       width:160px;
            height: 160px;
    }
    .default-image {
        padding:10px !;
    width:200px;
}
.text-center > img{
    padding:10px;
    border: 1px solid #ddd !important;
    width:300px;
}
.thumbnail.text-center.display-img > img {
    padding:10px;
    border: 1px solid #ddd !important;
    width:60px;
            height: 60px;
}
</style>

  <body>

  <section id="container" >
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <a href="#" class="logo"><b>Admin Dashboard</b></a>
            <div class="nav notify-row" id="top_menu">
               
                         
                   
                </ul>
            </div>
            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                    <li><a class="logout" href="../logout.php">Logout</a></li>
            	</ul>
            </div>
        </header>
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <ul class="sidebar-menu" id="nav-accordion">
              
              	  <p class="centered"><a href="#"><img src="../assets/img/ui-sam.jpg" class="img-circle" width="60"></a></p>
              	  <h5 class="centered"><?php echo $_SESSION['login'];?></h5>
              	  	
                  <li class="mt">
                      <a href="../change-password.php">
                          <i class="fa fa-file"></i>
                          <span>Change Password</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="manage-products.php" >
                          <i class="fa fa-users"></i>
                          <span>Manage Products</span>
                      </a>
                   
                  </li>
              
                 
              </ul>
          </div>
      </aside>
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> Manage Products</h3>