<?php
$mess_arr = array();
$mess_arr = get_custom_page_data();
?>
<!DOCTYPE html>
<html lang="en">
  <head>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Title -->
    <title><?php echo $mess_arr['pageTitle']; ?></title>

    <!-- Themes style -->
        <?php echo '<link href="' . plugins_url( 'css/style.css' , __FILE__ ) . '" rel="stylesheet" type="text/css"  /> '; ?>
		
    <!-- Font Awesome core CSS -->
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">

    <!-- Google Web Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:300' rel='stylesheet' type='text/css'>
    <!-- JS -->
    <!--<script src="http://code.jquery.com/jquery-latest.js"></script>-->

    <?php do_action('options_style'); ?>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <!-- Modernizr Scripts -->
	<?php	echo '<script type="text/javascript" src="' . plugins_url( '../assets/js/modernizr-2.7.1.min.js' , __FILE__ ) . ' "></script> ';	?>
	<script>
	
		jQuery(document).ready(function(){
			jQuery("#countdown").countdown({
				date: "<?php echo $mess_arr['day'].' '.$mess_arr['month'].' '.$mess_arr['year'].' '.$mess_arr['hour'].':'.$mess_arr['minute'].':00'; ?>",
				format: "on"
			},
			
			function() {
				// callback function
			});
		});
	
	</script> 
		<style type="text/css">	
	.fc_social_part {display:<?php echo $mess_arr['socialpartkey']; ?> }
	#countdown {display:<?php echo $mess_arr['countdownpartkey']; ?> }
	</style>
 </head>
  <body>

    <!-- Jumbotron -->
    <div class="jumbotron">

      <div class="container">

        <!-- Title -->
        <h1><?php echo $mess_arr['companyName']; ?></h1>

        <!-- Description -->
        <p><?php echo $mess_arr['message']; ?></p>

      </div> <!-- /.container -->
      
      <!-- Start: The Countdown -->
      <div class="custom-container">

        <ul id="countdown">

          <li>
            <div class="days">00</div>
            <div class="textDays">Days</div>
          </li>

          <li>
            <div class="hours">00</div>
            <div class="textHours">Hours</div>
          </li>

          <li>
            <div class="minutes">00</div>
            <div class="textMinutes">Minutes</div>
          </li>

          <li>
            <div class="seconds">00</div>
            <div class="textSeconds">Seconds</div>
          </li>

        </ul> <!-- /#countdown -->

      </div> <!-- /.custom-container -->
      <!-- End: The Countdown -->


      <div class="custom-container">

        <div class="row">

      <div class="container fc_social_part">
        <!-- Title -->
        <h2 class="title-contact">Get in touch!</h2>

        <!-- Social Media -->
        <ul class="social-icons">

          <li><a href="<?php echo $mess_arr['twitterLink']; ?>"><i class="fa fa-twitter"></i></a></li>
          <li><a href="<?php echo $mess_arr['facebookLink']; ?>"><i class="fa fa-facebook"></i></a></li>
          <li><a href="<?php echo $mess_arr['googleLink']; ?>"><i class="fa fa-google-plus"></i></a></li>
          <li><a href="mailto:<?php echo $mess_arr['contactEmail']; ?>"><i class="fa fa-envelope-o"></i></a></li>
		  <li><a href="callto:<?php echo $mess_arr['contactNumber']; ?>"><i class="fa fa-phone"></i></a></li>

        </ul> <!-- /.social-icons -->
      </div> <!-- /.container -->
          <div class="col-md-3"></div> <!-- /.col-md-3 -->

        </div> <!-- /.row -->

      </div> <!-- /.custom-container -->

    </div> <!-- /.jumbotron -->
    <!-- Placed at the end of the document so the pages load faster -->
	<?php	echo '<script type="text/javascript" src="' . plugins_url( '../assets/js/bootstrap.min.js' , __FILE__ ) . ' "></script> ';	?>	
  </body>
</html>