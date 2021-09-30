<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name = "viewport" content="width=device-width,initial-scale=1.0">
    <!-- <meta name="description" content="GPA ELEVATOR is a one stop online platform that provide access to academic materials like pastpapers,lecture Notes and much more to all students in all universities in Uganda"> -->
    <meta name="keywords" content="cgpa,online academic materials,university students,college,past papers,lecture notes,gpa, gpa elevator,news trending at campus">
    <meta name="author" content="Moxtech Developers">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">


    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" integrity="sha384-1CmrxMRARb6aLqgBO7yyAxTOQE2AKb9GfXnEo760AUcUmFx3ibVJJAzGytlQcNXd" crossorigin="anonymous"></script>
    <title><?php the_title();?></title>
    <?php wp_head();?>


</head>

<div class="gpa__banner ">
  <!--***Home-page header starts here***-->
<header >


  <div class="container-fluid ">
    
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 gpa__logo_col">
        <section class="gpa__logo_section text-center">
          <div class="gpa__logo_wrapper text-center">
              <h1><?php if( the_custom_logo()): 
              the_custom_logo();?>
          
              <?php endif;?></h1>
          </div>
        </section>

      </div> <!--**end gpa__logo column**-->
      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 gpa__campus_food_wrapper">
       <?php get_template_part('/template-parts/campus-food');?>
      </div> 

      <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 gpa__register_user">
        <div class="">
            <a href="<?php echo home_url('/login');?>" id="login" >Login</a>
            <?php //if(is_loged_in()):?> 
            <!-- <a href="<?php //echo home_url('/login');?>" id="login" >Logout</a> -->
            <?php //else:?>
             <!-- <a href="<?php //echo home_url('/login');?>" id="login" >Login</a> -->
            <?php //endif;?>
        </div>
      </div>
   

      

      <!--***Home-page header Ends here***-->
    </div> <!--**gpa__header_row*-->
  </div> <!--**gpa__header_container*-->
        
  <div class="container-fluid main-menu-nav_bar" id="navbar">

    <?php get_template_part('/template-parts/navigation');?>

  </div>
</header>

<!-- <body <?php //body_class(); ?>> -->

    <?php 
    //if ( function_exists( 'wp_body_open' ) ) {
        //wp_body_open();
    //} else {
        //do_action( 'wp_body_open' );
    //}
    ?>
  <div class="container-fluid">
  