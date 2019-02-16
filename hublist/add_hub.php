<?php
if ((get_cookie('GS_ADMIN_USERNAME') != '')) {

function add_hub_process() {

    if( isset( $_POST['submit'] ) ) {
  
        // Save submitted data
        $hub_data['Name'] = $_POST['Name'];
	$hub_data['Topic'] = $_POST['Topic'];
        $hub_data['Description'] = $_POST['Description'];
        $hub_data['Protocol'] = $_POST['Protocol'];
	$hub_data['Contact'] = $_POST['Contact'];
        $hub_data['Software'] = $_POST['Software'];
	$hub_data['Owner'] = $_POST['Owner'];
	$hub_data['Support'] = $_POST['Support'];
        $hub_data['Address'] = $_POST['Address'];
        $hub_data['Port'] = $_POST['Port'];
        $hub_data['Country'] = $_POST['Country'];
        $hub_data['Users'] = $_POST['Users'];
        $hub_data['Shared'] = $_POST['Shared'];
	$hub_data['User_limit'] = $_POST['User_limit'];
	$hub_data['Share_Limit'] = $_POST['Share_Limit'];
	$hub_data['Slot_Limit'] = $_POST['Slot_Limit'];
	$hub_data['Hub_Limit'] = $_POST['Hub_Limit'];
	$hub_data['Reliability'] = $_POST['Reliability'];
	$hub_data['Vote'] = $_POST['Vote'];
        $hub_data['Status'] = $_POST['Status'];
        $hub_data['Enabled'] = $_POST['Enabled'];
        $hub_data['Pinger'] = $_POST['Pinger'];
        $hub_data['Pinger_Count'] = $_POST['Pinger_Count'];
        $hub_data['Pinger_Failed'] = $_POST['Pinger_Failed'];
        $hub_data['X'] = $_POST['X'];
        $hub_data['User'] = $_POST['User'];        
        $hub_data['adddate'] = $_POST['adddate'];
        $hub_data['Last_Ping'] = $_POST['Last_Ping'];
        if ($hub_data['Name'] !='' && $hub_data['Address'] !='' && $hub_data['Port'] != ''){
        $result = hub_create( $hub_data );
        } else {echo '<p class="error">Hub Name, Address and Port required.</p>';}
    }
    
    //$hub_settings = hub_read_settings();
    echo '<h3><strong>ADC NMDC Hublist</strong></h3>';
    
    if( isset( $result ) ) {
        if( $result == true ) { 
         h_log('Added hub ' . $hub_data['Name'] . ' -- ' . date('d-m-Y H:i:s'));
            echo '<p class="updated">Settings saved.</p>';
        } elseif( $result == false ) { 
         h_log('Failed to add hub ' . $hub_data['Name'] . ' -- ' . date('d-m-Y H:i:s'));
            echo '<p class="error">Error saving data. Check permissions.</p>';
        }
    }
    ?>
    <form method="post" action="<?php echo $_SERVER ['REQUEST_URI']; ?>">
	<div style="border:1px solid #ccc; padding: 10px; height:auto; align: center;">
         <h3>Add Hub</h3>
	        <div style="width:20%; float:left;"> 
			<label for="Enabled">Enable Hub<br /><br /></label>
            <select name="Enabled" id="Enabled">
            <option value="Enabled">Enabled</option>
            <option value="Disabled">Disabled</option></select><br /></div>
			<div style="width:20%; float:left;"> 
        <label for="Protocol"> Protocol<br /><br /></label>
            <select name="Protocol" id="Protocol">
            <option value="dchub://">DCHUB</option>
            <option value="adc://">ADC</option>
            <option value="adcs://">ADCS</option></select><br /></div>
         <div style="width:20%; float:left;">   
        <label for="X"> Include in XML<br /><br /></label>
            <select name="X" id="X">
            <option value="Enabled">Enabled</option>
            <option value="Disabled">Disabled</option></select><br /><br /></div> 
         <div style="width:20%; float:left;">   
        <label for="Software"> Software<br /><br /></label>
            <select name="Software" id="Software">
            <option value="VerliHub">VerliHub</option>
            <option value="FlexHub">FlexHub</option>
            <option value="Potax">Potax</option></select><br /><br /></div>
          <div style="width:20%; float:left;">   
        <label for="Pinger"> Pinger<br /><br /></label>
            <select name="SPinger" id="Pinger">
            <option value="Enabled">Enabled</option>
            <option value="Disabled">Disabled</option>
            <option value="Potax">Potax</option></select><br /><br /></div>
				<div style="clear:both;"></div>	 
        <p><label for="Name">Name<br /></label>
            <input name="Name" id="Name" class="text" value="" style="width: 98%;" /></p>
        <p><label for="Topic">Topic<br /></label>
            <input name="Topic" id="Topic" class="text" value="" style="width: 98%;" /></p>              
        <p><label for="Description">Description<br /></label>
            <textarea style="resize: none; padding: 5px; width:98%; height: 45px;" name="Description" id="Description" ></textarea></p>
         <p><label for="Address">Address : Port<br /></label>
            <input name="Address" id="Address" class="text" value="" style="width: 86%;" /> : <input name="Port" id="Port" class="text" value="" style="width: 8%;" maxlength="5" size="5" /></p>            
			<p><label for="Contact">Contact<br /></label>
            <input name="Contact" id="Contact" class="text" value="" style="width: 98%;" /></p>
			<div>
			<div style="width: 49%; float: left; margin: 0 16px 0 0;">
			<p><label for="Support">Support<br /></label>
            <input name="Support" id="Support" class="text" value="" style="width: 97%;" /></p>            
			</div>
			<div style="width: 48%; float: Left;">
			<p><label for="Owner">Owner<br /></label>
            <input name="Owner" id="Owner" class="text" value="" style="width: 97%;" /></p>            
			</div>
			<div style="clear: both;"></div>
			</div>
			<div>
			<div style="width: 23%; float: left; margin: 0 8px 0 0;">
			<p><label for="User_limit"> User Limit<br /></label>
            <input name="User_limit" id="User_limit" class="text" value="" style="width: 97%;" /></p>            
			</div>
			<div style="width: 23%; float: left; margin: 0 8px 0 8px;">
			<p><label for="Share_Limit">Share Limit<br /></label>
            <input name="Share_Limit" id="Share_Limit" class="text" value="" style="width: 97%;" /></p>            
			</div>
			<div style="width: 23%; float: left; margin: 0 8px 0 8px;">
			<p><label for="Slot_Limit">Slot limit<br /></label>
            <input name="Slot_Limit" id="Slot_Limit" class="text" value="" style="width: 97%;" /></p>            
			</div>
			<div style="width: 22%; float: left; margin: 0 0 0 8px;">
			<p><label for="Hub_Limit">Hub Limit<br /></label>
            <input name="Hub_Limit" id="Hub_Limit" class="text" value="" style="width: 97%;" /></p>            
			</div>
			<div style="clear: both;"></div>
			</div>
			<p><label for="Country">Country<br /></label>
            <select name="Country" id="Country"> <?php
            $dir = GSPLUGINPATH . HUBLIST_IMG;
                foreach (scandir($dir) as $file) 
		{
		    if ($file != "." && $file != ".." && $file != ".htaccess" ) {
		    $rf = strtoupper(basename ($file, '.png'));
		    echo '<option value="'.$file.'">'.$rf.'</option>';
		    }
		  }            
?>            
            </select>  &nbsp;&nbsp; <strong>User :</strong> <input name="User" id="User" class="text" value="<?php if ((get_cookie('GS_ADMIN_USERNAME') != '')) { echo 'Admin'; } else { echo ''; } ?>" <?php if ((get_cookie('GS_ADMIN_USERNAME') != '')) { echo 'readonly="readonly"'; } else { echo ''; } ?> style="width: 25%;" /></p>            
          		
            </div>
			<input type="hidden" name="adddate" id="adddate" value="<?php echo date('d/m/Y H:i'); ?>" readonly="readonly">
         <p></p>
        <p><input type="submit" id="submit" class="button" value="<?php i18n('BTN_SAVESETTINGS'); ?>" name="submit" /> &nbsp;&nbsp; <a class="button" href="load.php?id=hublist&hubs_view"> Return </a></p>
        
    </form>
    <?php

	}
	$data = add_hub_process();
		echo $data;
}