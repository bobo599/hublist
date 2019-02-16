<?php
	//$idh = $_SERVER['QUERY_STRING'];
	//$hub_edit_file = GSDATAOTHERPATH . HUBLIST_DIR . HUBLIST_DATA_DIR . $idh;
if ((get_cookie('GS_ADMIN_USERNAME') != '')) {
	
function edit_Hub() { 

	global $hub_file;	
	//global $hub_settings;
    if( isset( $_POST['submit'] ) ) {
        $hub_data['fl'] = $_POST['fl'];
        $hub_data['Name'] = $_POST['Name'];
	$hub_data['Topic'] = $_POST['Topic'];
        $hub_data['Description'] = $_POST['Description'];
        $hub_data['Protocol'] = $_POST['Protocol'];
	$hub_data['Contact'] = $_POST['Contact'];
        $hub_data['Software'] = $_POST['Software'];
	$hub_data['Contact'] = $_POST['Contact'];
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
        $results = hub_edit_save( $hub_data );
        } else {echo '<p class="error">Hub Name, Address and Port required.</p>';}

    }
    $hub_settings = hub_read();
    
    if( isset( $_POST['delete'] ) ) {
      h_log('Deleted hub ' . $hub_settings['Name'] . ' -- ' . date('d-m-Y H:i:s'));
      rename(GSDATAOTHERPATH . HUBLIST_DIR . HUBLIST_DATA_DIR . $hub_settings['fl'], GSDATAOTHERPATH . HUBLIST_DIR . HUBLIST_TRASH_DIR . $hub_settings['fl']);
    }
    
    echo '<h3><strong>ADC NMDC Hublist</strong></h3>';
   if( isset( $results ) ) {
        if( $results == true ) { 
        h_log('Edit hub ' . $hub_data['Name'] . ' -- ' . date('d-m-Y H:i:s'));
            echo '<p class="updated">Settings saved.</p>';
        } elseif( $results == false ) { 
        h_log('Failed to edit hub ' . $hub_data['Name'] . ' -- ' . date('d-m-Y H:i:s'));
            echo '<p class="error">Error saving data. Check permissions.</p>';
        }
    }

 ?> 
    <form method="post" action="<?php echo $_SERVER ['REQUEST_URI']; ?>">
	<div style="border:1px solid #ccc; padding: 10px; height:auto; align: center;">
         <h3>Edit Hub | <?php echo $hub_settings['fl']; ?></h3>
	        <div style="width:20%; float:left;"> 
	<label for="Enabled">Enable Hub<br /><br /></label>
            <select name="Enabled" id="Enabled">
            <option <?php if ($hub_settings['Enabled'] == 'Enabled') { echo 'selected="selected"'; }?> value="Enabled">Enabled</option>
            <option <?php if ($hub_settings['Enabled'] == 'Disabled') { echo 'selected="selected"'; }?> value="Disabled">Disabled</option></select><br /></div>
		<div style="width:20%; float:left;"> 
        <label for="Protocol"> Protocol<br /><br /></label>
            <select name="Protocol" id="Protocol">
            <option <?php if ($hub_settings['Protocol'] == 'dchub://') { echo 'selected="selected"'; }?> value="dchub://">DCHUB</option>
            <option <?php if ($hub_settings['Protocol'] == 'adc://') { echo 'selected="selected"'; }?> value="adc://">ADC</option>
            <option <?php if ($hub_settings['Protocol'] == 'adcs://') { echo 'selected="selected"'; }?> value="adcs://">ADCS</option></select><br /></div>
         <div style="width:20%; float:left;">   
        <label for="Software"> Software<br /><br /></label>
            <select name="Software" id="Software">
            <option <?php if ($hub_settings['Software'] == 'VerliHub') { echo 'selected="selected"'; }?> value="VerliHub">VerliHub</option>
            <option <?php if ($hub_settings['Software'] == 'FlexHub') { echo 'selected="selected"'; }?> value="FlexHub">FlexHub</option>
            <option <?php if ($hub_settings['Software'] == 'Potax') { echo 'selected="selected"'; }?> value="Potax">Potax</option></select><br /><br /></div> 
		<div style="width:20%; float:left;">   
        <label for="X"> Include in XML<br /><br /></label>
            <select name="X" id="X">
            <option <?php if ($hub_settings['X'] == 'Enabled') { echo 'selected="selected"'; }?> value="Enabled">Enabled</option>
            <option <?php if ($hub_settings['X'] == 'Disabled') { echo 'selected="selected"'; }?> value="Disabled">Disabled</option></select><br /><br /></div>
            <div style="width:20%; float:left;"> 
         <label for="Pinger"> Pinger<br /><br /></label>
            <select name="Pinger" id="Pinger">
            <option <?php if ($hub_settings['Pinger'] == 'Enabled') { echo 'selected="selected"'; }?> value="Enabled">Enabled</option>
            <option <?php if ($hub_settings['Pinger'] == 'Disabled') { echo 'selected="selected"'; }?> value="Disabled">Disabled</option></select><br /><br /></div>
		<div style="width:75px; float:left;"> 
	<label for="Country">Country<br /><br /></label>
            <select name="Country" id="Country"> 
            <option value="<?php echo $hub_settings['Country']; ?>"><?php echo strtoupper(basename ($hub_settings['Country'], '.png')); ?></option>
            <?php
            $dir = GSPLUGINPATH . HUBLIST_IMG;
                foreach (scandir($dir) as $file) 
		{
		    if ($file != "." && $file != ".." && $file != ".htaccess" && $file != $hub_settings['Country'] ) {
		    $rf = strtoupper(basename ($file, '.png'));
		    echo '<option value="'.$file.'">'.$rf.'</option>';
		    }
		  }            
?>            
            </select></div>
            		     <div style="width:10%; float:left;">            
		      <br /><br /><img style="border:1px solid #ccc" src="../data/uploads/images/<?php echo $hub_settings['Country']; ?>" width="35" height="27" /><br /></div>
		     <div style="width:20%; float:left;">            
                   <label for="User"> User</label>
		    &nbsp;&nbsp; <input name="User" id="User" class="text" value="<?php echo $hub_settings['User']; ?>" style="width: 200px;" /><br /><br /></div>

		    <div style="clear:both;"></div>	 
        <p><label for="Name">Name<br /></label>
            <input name="Name" id="Name" class="text" value="<?php echo $hub_settings['Name']; ?>" style="width: 98%;" /></p> 
	        <p><label for="Topic">Topic<br /></label>
            <input name="Topic" id="Topic" class="text" value="<?php echo $hub_settings['Topic']; ?>" style="width: 98%;" /></p>  		
        <p><label for="Description">Description<br /></label>
        <textarea style="resize: none; padding: 5px; width:98%; height: 45px;" name="Description" id="Description" ><?php echo $hub_settings['Description']; ?></textarea>
           </p>
        <p><label for="Address">Address : Port<br /></label>
            <input name="Address" id="Address" class="text" value="<?php echo $hub_settings['Address']; ?>" style="width: 86%;" /> <strong>:</strong> <input name="Port" id="Port" class="text" value="<?php echo $hub_settings['Port']; ?>" style="width: 8%;" maxlength="5" size="5" /></p>
				<p><label for="Contact">Contact<br /></label>
            <input name="Contact" id="Contact" class="text" value="<?php echo $hub_settings['Contact']; ?>" style="width: 98%;" /></p>
				<div>
			<div style="width: 49%; float: left; margin: 0 16px 0 0;">
			<p><label for="Support">Support<br /></label>
            <input name="Support" id="Support" class="text" value="<?php echo $hub_settings['Support']; ?>" style="width: 97%;" /></p>            
			</div>
			<div style="width: 48%; float: Left;">
			<p><label for="Owner">Owner<br /></label>
            <input name="Owner" id="Owner" class="text" value="<?php echo $hub_settings['Owner']; ?>" style="width: 97%;" /></p>            
			</div>
			<div style="clear: both;"></div>
			</div>
				<div>
			<div style="width: 23%; float: left; margin: 0 8px 0 0;">
			<p><label for="User_limit"> User Limit<br /></label>
			<input name="User_limit" id="User_limit" class="text" value="<?php echo $hub_settings['User_limit']; ?>" style="width: 97%;" /></p>            
			</div>
			<div style="width: 23%; float: left; margin: 0 8px 0 8px;">
			<p><label for="Share_Limit">Share Limit<br /></label>
			<input name="Share_Limit" id="Share_Limit" class="text" value="<?php echo $hub_settings['Share_Limit']; ?>" style="width: 97%;" /></p>            
			</div>
			<div style="width: 23%; float: left; margin: 0 8px 0 8px;">
			<p><label for="Slot_Limit">Slot limit<br /></label>
			<input name="Slot_Limit" id="Slot_Limit" class="text" value="<?php echo $hub_settings['Slot_Limit']; ?>" style="width: 97%;" /></p>            
			</div>
			<div style="width: 22%; float: left; margin: 0 0 0 8px;">
			<p><label for="Hub_Limit">Hub Limit<br /></label>
			<input name="Hub_Limit" id="Hub_Limit" class="text" value="<?php echo $hub_settings['Hub_Limit']; ?>" style="width: 97%;" /></p>            
			</div>
			<div style="clear: both;"></div>
			</div>
			
			<div>
			<div style="width: 18%; float: left; margin: 0 8px 0 0;">
			<p><label for="Users"> Users<br /></label>
			<input name="Users" id="Users" class="text" value="<?php echo $hub_settings['Users']; ?>" style="width: 97%;" /></p>            
			</div>
			<div style="width: 18%; float: left; margin: 0 8px 0 8px;">
			<p><label for="Shared">Shared<br /></label>
			<input name="Shared" id="Shared" class="text" value="<?php echo $hub_settings['Shared']; ?>" style="width: 97%;" /></p>            
			</div>
			<div style="width: 18%; float: left; margin: 0 8px 0 8px;">
			<p><label for="Vote">Vote<br /></label>
			<input name="Vote" id="Vote" class="text" value="<?php echo $hub_settings['Vote']; ?>" style="width: 97%;" /></p>            
			</div>
			<div style="width: 17%; float: left; margin: 0 8px 0 8px;">
			<p><label for="Reliability">Reliability<br /></label>
			<input name="Reliability" id="Reliability" class="text" value="<?php echo $hub_settings['Reliability']; ?>" style="width: 97%;" /></p>            
			</div>
			<div style="width: 17%; float: left; margin: 0 0 0 8px;">
			<p><label for="Status">Status<br /></label>
			<input name="Status" id="Status" class="text" value="<?php echo $hub_settings['Status']; ?>" style="width: 97%;" readonly="readonly" /></p>            
			</div>
			<div style="clear: both;"></div>
			</div>
       
			<span style="font-weight:bold;">Date add: </span><input class="text"  name="adddate" id="adddate" value="<?php echo $hub_settings['adddate']; ?>" style="width: 100px;" readonly="readonly" /> &nbsp;&nbsp; 
			<span style="font-weight:bold;">Last Ping: </span><input class="text"  name="Last_Ping" id="Last_Ping" value="<?php echo $hub_settings['Last_Ping']; ?>" style="width: 120px;" readonly="readonly" /> &nbsp;&nbsp; 
			<span style="font-weight:bold;">Hub File: </span><input class="text" name="fl" id="fl" value="<?php echo $hub_settings['fl']; ?>" style="width: 175px;" readonly="readonly" />
			<input type="hidden" class="text" name="Pinger_Count" id="Pinger_Count" value="<?php echo $hub_settings['Pinger_Count']; ?>" readonly="readonly" />
			<input type="hidden" class="text" name="Pinger_Failed" id="Pinger_Failed" value="<?php echo $hub_settings['Pinger_Failed']; ?>" readonly="readonly" />
			</div>
         <p></p>

        <p><input type="submit" id="submit" class="button" value="<?php i18n('BTN_SAVESETTINGS'); ?>" name="submit" /> &nbsp;&nbsp; <input type="submit" id="delete" class="button" value="Delete" name="delete" /> &nbsp;&nbsp; <a class="button" href="load.php?id=hublist&hubs_view" > Return </a></p>
        
    </form> 	    
            <?php
   }

$data = edit_Hub();
		echo $data;
}		