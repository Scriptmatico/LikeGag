<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="assets/ico/favicon.ico">
    <title><? wp_title();?></title>
	<?php wp_head(); ?>
	<?
    if(is_user_logged_in()){
    ?>
    <style type="text/css" media="screen">
        .blog-masthead  { margin-top: 32px !important; }
		
        @media screen and ( max-width: 782px ) {
            .blog-masthead  { margin-top: 46px !important; }
			
        }
    </style>
    <? 
    }
    ?>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>
  <body>
      
    <div class="blog-masthead navbar navbar-default navbar-fixed-top">
      <div class="container">
        
       <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<? echo get_site_url();?>"><? bloginfo( 'name' );?></a>
        </div>
        
        <div class="collapse navbar-collapse">
        
          
          
          <?php 
		  //display Left Menu
		  wp_nav_menu( array( 'theme_location' => 'leftmenu', 'container' => false,'menu_class' => 'nav navbar-nav',walker=> new Nfr_Menu_Walker() ) );
         
		 //Display Right Menu
          if(has_nav_menu('rightmenu')){
			wp_nav_menu( array( 'theme_location' => 'rightmenu', 'container' => false,'menu_class' => 'nav navbar-nav navbar-right',walker=> new Nfr_Menu_Walker() ) );
		  }
		  ?>
         
        </div> 
        
      </div>
    </div>