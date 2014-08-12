<?php
//PLUGIN MENU
add_action('admin_menu', 'fcwebmaintenance');

wp_enqueue_script('jquery');

function fcwebmaintenance()
{
//TOP LEVEL MENU
    add_menu_page('Admin Maintenance',
        'Admin Maintenance',
        'administrator',
        'fcwebmaintenance_option',
        'fcwebmaintenance_option_page',
        plugins_url('/images/logoicon.png', __FILE__),
        100
    );
}


// ADMIN VALUE
function fcwebmaintenance_option_page()
{
    global $wp_roles;
    $roles = $wp_roles->get_names();

    $fcwebSettings['pageTitle'] = "Website Under Maintenance";
    $fcwebSettings['companyName'] = "Company Name";
    $fcwebSettings['companylogo'] = "https://1.s3.envato.com/files/70926396/Untitled-1.png";
    $fcwebSettings['message'] = "We are doing a schedule maintenance";
    $fcwebSettings['template'] = "Under Maintenance";
    $fcwebSettings['youtubeid'] = "QNZOOSxfQn8";
    $fcwebSettings['socialpartkey'] = "block";
    $fcwebSettings['countdownpartkey'] = "block";
    $fcwebSettings['year'] = "2020";
    $fcwebSettings['month'] = "01";
    $fcwebSettings['day'] = "01";
    $fcwebSettings['hour'] = "01";
    $fcwebSettings['minute'] = "00";
    $fcwebSettings['status'] = "1";
    $fcwebSettings['contactEmail'] = "name@youremail.com";
    $fcwebSettings['contactNumber'] = "880123412345";
    $fcwebSettings['facebookLink'] = "http://www.facebook.com/freelancingcare";
    $fcwebSettings['twitterLink'] = "http://www.twitter.com/freelancingcare";
    $fcwebSettings['googleLink'] = "http://www.google.com/+Freelancingcare";
//DEFAULT DATA VARIABLES
    $templates = array();
    $templates[0]="Still_Image_Background";
    $templates[1]="Yoututbe_Video_Background";
    $templates[2]="CSS3_Background_Animation1";
    $templates[3]="CSS3_Background_Animation2";
    $templates[4]="CSS3_Background_Animation3";
    $templates[5]="Simple_Image_Background";

    $socialpartkey = array();
    $socialpartkey[0]="block";
    $socialpartkey[1]="none";
   
    $countdownpartkey = array();
    $countdownpartkey[0]="block";
    $countdownpartkey[1]="none";
   
	
    $months = array();
    $months[0]="January";
    $months[1]="February";
    $months[2]="March";
    $months[3]="April";
    $months[4]="May";
    $months[5]="June";
    $months[6]="July";
    $months[7]="August";
    $months[8]="September";
    $months[9]="October";
    $months[10]="November";
    $months[11]="December";
    $errorMessage = "";
//DEFAULT DATA VARIABLES
    if (isset($_POST['SaveSettings'])) {

        $fcwebSettings['pageTitle'] = trim($_POST['pageTitle']);
        $fcwebSettings['companyName'] = trim($_POST['companyName']);
        $fcwebSettings['companylogo'] = trim($_POST['companylogo']);
        $fcwebSettings['message'] = trim($_POST['message']);
        $fcwebSettings['template'] = trim($_POST['template']);
        $fcwebSettings['youtubeid'] = trim($_POST['youtubeid']);
        $fcwebSettings['socialpartkey'] = trim($_POST['socialpartkey']);
        $fcwebSettings['countdownpartkey'] = trim($_POST['countdownpartkey']);
        $fcwebSettings['year'] = trim($_POST['year']);
        $fcwebSettings['month'] = trim($_POST['month']);
        $fcwebSettings['day'] = trim($_POST['day']);
        $fcwebSettings['hour'] = trim($_POST['hour']);
        $fcwebSettings['minute'] = trim($_POST['minute']);
        $fcwebSettings['status'] = trim($_POST['status']);
        $fcwebSettings['contactEmail'] = trim($_POST['contactEmail']);
        $fcwebSettings['contactNumber'] = trim($_POST['contactNumber']);
        $fcwebSettings['facebookLink'] = trim($_POST['facebookLink']);
        $fcwebSettings['twitterLink'] = trim($_POST['twitterLink']);
        $fcwebSettings['googleLink'] = trim($_POST['googleLink']);
        foreach($roles as $temp){
            if($temp != "Administrator"){
                if (isset($_POST[$temp])) {
                    $fcwebSettings[$temp] = $_POST[$temp];
                }
            }
        }

        $chk = get_option('fcwebmaintenance_settings');

        if($errorMessage ==""){
            if($chk == false){
                add_option('fcwebmaintenance_settings', $fcwebSettings);
		echo '<div class="col-md-12 alert_message"><div class="alert alert-warning" role="alert">Settigns Added</div></div>';
            }
            else{
                update_option('fcwebmaintenance_settings', $fcwebSettings);
				echo '<div class="col-md-12 alert_message"><div class="alert alert-success" role="alert">Settigns Updated Successfully!</div></div>';
            }
        }
    }
    $chk = get_option('fcwebmaintenance_settings');

    if($chk == true){
        $fcwebSettings['pageTitle'] = $chk['pageTitle'];
        $fcwebSettings['companyName'] = $chk['companyName'];
        $fcwebSettings['companylogo'] = $chk['companylogo'];
        $fcwebSettings['message'] = $chk['message'];
        $fcwebSettings['template'] = $chk['template'];
        $fcwebSettings['youtubeid'] = $chk['youtubeid'];
        $fcwebSettings['socialpartkey'] = $chk['socialpartkey'];
        $fcwebSettings['countdownpartkey'] = $chk['countdownpartkey'];
        $fcwebSettings['year'] = $chk['year'];
        $fcwebSettings['month'] = $chk['month'];
        $fcwebSettings['day'] = $chk['day'];
        $fcwebSettings['hour'] = $chk['hour'];
        $fcwebSettings['minute'] = $chk['minute'];
        $fcwebSettings['status'] = $chk['status'];
        $fcwebSettings['contactEmail'] = $chk['contactEmail'];
        $fcwebSettings['contactNumber'] = $chk['contactNumber'];
        $fcwebSettings['facebookLink'] = $chk['facebookLink'];
        $fcwebSettings['twitterLink'] = $chk['twitterLink'];
        $fcwebSettings['googleLink'] = $chk['googleLink'];

        foreach($roles as $temp){
            if($temp != "Administrator"){
                if (isset($chk['status'])) {
                    $fcwebSettings[$temp] = $chk[$temp];
                }
            }
        }
    }
    if($errorMessage ==""){
        echo $errorMessage."";
    }

    $adminBody = '	<div class="col-md-6 fc_rampro_body">
    <form  class="form-horizontal" role="form" style="background: none repeat scroll 0 0 #FFFFFF;clear: both;display: block;margin-left: -20px;overflow: hidden;padding: 20px 20px 20px 40px;position: relative;
z-index: 6;" name="settings" action="" method="post">
 
<div class="panel panel-default panel-primary">
   <div class="panel-heading"><h1>Responsive Admin Maintenance PRO</h1></div>
  <div class="panel-body">
   <p>Please setup bellows settings properly to active awesome maintenance screen on your board</p>
  </div>
</div>
    <div class="panel panel-default panel-info">
   <div class="panel-heading">General Settings</div>
  <div class="panel-body">
 <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Plugin Switch</label>
    <div class="col-sm-10">
     <select name="status" id="status" class="form-control">';
    if ($fcwebSettings['status'] == "1") {
        $adminBody = $adminBody . '<option value="1" selected="selected">ON</option>
            	<option value="0">OFF</option>';
    } else {
        $adminBody = $adminBody . '  
  <option value="1">ON</option>
            	<option value="0" selected="selected">OFF</option>';
    }
    $adminBody = $adminBody . '</select>
    </div>
  </div>  
  <div class="form-group">
    <label for="pageTitle" class="col-sm-2 control-label">Page Title</label>
    <div class="col-sm-10">
<input type="text" name="pageTitle" class="form-control" placeholder="Page Title" id="pageTitle" value=\'' . $fcwebSettings['pageTitle'] . '\' />
    </div>
  </div>
   <div class="form-group">
    <label for="companyName" class="col-sm-2 control-label">Company Name</label>
    <div class="col-sm-10">
<input type="text" name="companyName" class="form-control" placeholder="Your Company Name" id="companyName" value=\'' . $fcwebSettings['companyName'] . '\' />
    </div>
  </div>    
  
  <div class="form-group">
    <label for="companylogo" class="col-sm-2 control-label">Company Logo Link</label>
    <div class="col-sm-10">
<input type="text" name="companylogo" class="form-control" placeholder="http://yourwebsite.com/YOUR_LOGO_URL.png" id="companylogo" value=\'' . $fcwebSettings['companylogo'] . '\' />
    </div>
  </div> 
  
     <div class="form-group">
    <label for="message" class="col-sm-2 control-label">Maintenance Note/Message</label>
    <div class="col-sm-10">
<input type="text"  class="form-control" name="message" id="message" value=\'' . $fcwebSettings['message'] . '\' />
</div>
  </div> 
   <div class="form-group">
    <label for="template" class="col-sm-2 control-label">Style</label>
    <div class="col-sm-10">
<select name="template" id="template" class="form-control">';
    foreach($templates as $temp){
        if ($fcwebSettings['template'] == $temp) {
            $adminBody = $adminBody . '<option value="'.$temp.'" selected="selected">'.$temp.'</option>';
        } else {
            $adminBody = $adminBody . '<option value="'.$temp.'">'.$temp.'</option>';
        }
    }
    $adminBody = $adminBody . '</select>
    </div>
  </div>
  
       <div class="form-group">
    <label for="youtubeid" class="col-sm-2 control-label" >Video ID <span style="font-size:9px">For Youtbe_Video_Background Template</span></label>
    <div class="col-sm-10"><input type="text" class="form-control" placeholder="video id place here"  name="youtubeid" id="youtubeid" value=\'' . $fcwebSettings['youtubeid'] . '\' />
    </div>
  </div> 
  
       <div class="form-group">
    <label for="socialpartkey" class="col-sm-2 control-label"> Social Area Display</label>
    <div class="col-sm-10">
		<div class="col-sm-1">
	<select name="socialpartkey" id="socialpartkey">';
	 foreach($socialpartkey as $temp){
            if ($fcwebSettings['socialpartkey'] == $temp) {
            $adminBody = $adminBody . '<option value="'.$temp.'" selected="selected">'.$temp.'</option>';
        } else {
            $adminBody = $adminBody . '<option value="'.$temp.'">'.$temp.'</option>';
        }
        }
    $adminBody = $adminBody . '</select>
    </div>	
    </div>
  </div>   
       
	   <div class="form-group">
    <label for="countdownpartkey" class="col-sm-2 control-label"> Countdown Display</label>
    <div class="col-sm-10">
		<div class="col-sm-1">
	<select name="countdownpartkey" id="countdownpartkey">';
	 foreach($countdownpartkey as $temp){
            if ($fcwebSettings['countdownpartkey'] == $temp) {
            $adminBody = $adminBody . '<option value="'.$temp.'" selected="selected">'.$temp.'</option>';
        } else {
            $adminBody = $adminBody . '<option value="'.$temp.'">'.$temp.'</option>';
        }
        }
    $adminBody = $adminBody . '</select>
    </div>	
    </div>
  </div> 
  
  
  
  
  </div>
  </div>

    <div class="panel panel-default panel-info">
   <div class="panel-heading">Access Control Settings</div>
  <div class="panel-body">
  
   <div class="form-group">
    <label class="col-sm-2 control-label">Roles To Deny</label>
    <div class="col-sm-10">
		';

    foreach($roles as $temp){
        if($temp != "Administrator"){
            if ($fcwebSettings[$temp] == $temp) {
                $adminBody = $adminBody . '<input type="checkbox" name="'.$temp.'" id="'.$temp.'" value="'.$temp.'" checked="checked" />'.$temp.'<br />';
            } else {
                $adminBody = $adminBody . '<input type="checkbox" name="'.$temp.'" id="'.$temp.'" value="'.$temp.'" />'.$temp.'<br />';
            }
        }
    }
    $adminBody = $adminBody . '		
  </div>   
  </div>  
  </div>  
  </div>  
  
  
  <div class="panel panel-default panel-info">
   <div class="panel-heading">Countdown Settings</div>
  <div class="panel-body">
  <div class="form-group">
    <label for="year" class="col-sm-2 control-label">Maintenance will over <span class="label label-danger">Required</span></label>
    <div class="col-sm-1 year_sec">
	<label for="year">Year</label>
     <select name="year" id="year"  class="form-control">';
    for($temp=date("Y");$temp<date("Y")+10;$temp++){
        if ($fcwebSettings['year'] == $temp) {
            $adminBody = $adminBody . '<option value="'.$temp.'" selected="selected">'.$temp.'</option>';
        } else {
            $adminBody = $adminBody . '<option value="'.$temp.'">'.$temp.'</option>';
        }
    }
    $adminBody = $adminBody . '</select>
    </div>    
	<div class="col-sm-1 month_sec">
	<label for="month">Month</label>
<select name="month" id="month">';
    foreach($months as $temp){
        if ($fcwebSettings['month'] == $temp) {
            $adminBody = $adminBody . '<option value="'.$temp.'" selected="selected">'.$temp.'</option>';
        } else {
            $adminBody = $adminBody . '<option value="'.$temp.'">'.$temp.'</option>';
        }
    }
    $adminBody = $adminBody . '</select>
    </div>	
	<div class="col-sm-1">
	<label for="day">Day</label>
<select name="day" id="day">';
    for($temp=1;$temp<32;$temp++){
        if ($fcwebSettings['day'] == $temp) {
            $adminBody = $adminBody . '<option value="'.$temp.'" selected="selected">'.$temp.'</option>';
        } else {
            $adminBody = $adminBody . '<option value="'.$temp.'">'.$temp.'</option>';
        }
    }
    $adminBody = $adminBody . '</select>
    </div>	
	<div class="col-sm-1">
	<label for="hour">Hour</label>
<select name="hour" id="hour">';
    for($temp=0;$temp<24;$temp++){
        if ($fcwebSettings['hour'] == $temp) {
            $adminBody = $adminBody . '<option value="'.$temp.'" selected="selected">'.$temp.'</option>';
        } else {
            $adminBody = $adminBody . '<option value="'.$temp.'">'.$temp.'</option>';
        }
    }
    $adminBody = $adminBody . '</select>
    </div>	
	<div class="col-sm-1">
	<label for="minute">Minute</label>
<select name="minute" id="minute">';
    for($temp=0;$temp<61;$temp++){
        if ($fcwebSettings['minute'] == $temp) {
            $adminBody = $adminBody . '<option value="'.$temp.'" selected="selected">'.$temp.'</option>';
        } else {
            $adminBody = $adminBody . '<option value="'.$temp.'">'.$temp.'</option>';
        }
    }
    $adminBody = $adminBody . '</select>
    </div>
  </div>  
  </div>  
  </div>  

  
  <div class="panel panel-default panel-info">
   <div class="panel-heading">Contact Details Settings</div>
  <div class="panel-body">
      <div class="form-group">
    <label for="email" class="col-sm-2 control-label">Email Address</label>
    <div class="col-sm-10">
<input type="email" class="form-control"  placeholder="Email Address" name="contactEmail" id="contactEmail" value=\'' . $fcwebSettings['contactEmail'] . '\' />
    </div>
  </div> 
     <div class="form-group">
    <label for="contactNumber" class="col-sm-2 control-label">Phone Number</label>
    <div class="col-sm-10"><input type="text" class="form-control" placeholder="8801234567890"  name="contactNumber" id="contactNumber" value=\'' . $fcwebSettings['contactNumber'] . '\' />
    </div>
  </div> 
     <div class="form-group">
    <label for="facebookLink" class="col-sm-2 control-label">Facebook URL</label>
    <div class="col-sm-10"><input type="text" class="form-control" placeholder="http://facebook.com/Freelancingcare"  name="facebookLink" id="facebookLink" value=\'' . $fcwebSettings['facebookLink'] . '\' />
    </div>
  </div>  
     <div class="form-group">
    <label for="twitterLink" class="col-sm-2 control-label">Twitter URL</label>
    <div class="col-sm-10"><input type="text" class="form-control" placeholder="http://twitter.com/Freelancingcare"  name="twitterLink" id="twitterLink" value=\'' . $fcwebSettings['twitterLink'] . '\' />
    </div>
  </div> 
      <div class="form-group">
    <label for="googleLink" class="col-sm-2 control-label">Google+ URL</label>
    <div class="col-sm-10"><input type="text" class="form-control" placeholder="http://google.com/+Freelancingcare"  name="googleLink" id="googleLink" value=\'' . $fcwebSettings['googleLink'] . '\' />
    </div>
  </div> 

  </div>
</div>

  
  
  <div class="panel panel-default panel-info">
   <div class="panel-heading">Save Your Settings </div>
  <div class="panel-body">
      <div class="form-group">
    <label for="#" class="col-sm-8 control-label">   <p><span style="color: #7c909a;font-size: 13px;font-weight: normal;">After "Save Settings" Open a new private window or different browser to check the site as maintenance mode</span></p></label>    
	<label for="#" class="col-sm-2 "> 
	<a class="btn btn-success" href="https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=MUTBMTPKTF76Q&lc=US&item_name=Responsive%20Admin%20Maintanence%20Pro%20Plugin&currency_code=USD&bn=PP%2dDonationsBF%3abtn_donateCC_LG%2egif%3aNonHosted" role="button"> Donate Me Coffee</a>
	</label>
    <div class="col-sm-2"><input type="SUBMIT" id="SaveSettings" name="SaveSettings" value="Save Settings" class="btn btn-primary" />
    </div>
  </div> 
    

  
  
  </div> 
  </div> 
	<div class="panel panel-default panel-info">
   <div class="panel-heading">Our Networks</div>
  <div class="panel-body">
      <div class="form-group">
  
	
	
	
	<label for="#" class="col-sm-2 "> <a class="btn btn-success" href="http://designingmarket.com" role="button"> Our Marketplace</a>
	</label>	
	
	<label for="#" class="col-sm-2 "> <a class="btn btn-success" href="http://facebook.com/groups/freelancingcare" role="button"> Our Group</a>
	</label>	

	
	<label for="#" class="col-sm-2 "> <a class="btn btn-success" href="http://freelancingcare.com" role="button"> Our Website</a>
	</label>	

			
	<label for="#" class="col-sm-2 "> <a class="btn btn-success" href="http://youtube.com/user/Tutorialtubes" role="button"> Free Tutorials</a>
	</label>	

		
		
	<label for="#" class="col-sm-2 "> <a class="btn btn-success" href="http://www.bluehost.com/track/freelancingcare" role="button"> Get Hosting</a>
	</label>	

	
	<label for="#" class="col-sm-2 "> <a class="btn btn-success" href="mailto:nirob.std@gmail.com" role="button"> Hire Developer</a>
	</label>	


    </div>
  </div> 


</form>
</div>
	
';
    echo $adminBody;
}

?>