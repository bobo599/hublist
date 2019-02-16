<?php
if ((get_cookie('GS_ADMIN_USERNAME') != '')) {

function hublist_pinger_process() {
    //global $random;
    global $pinger_data_file;
    // Check for submitted data
    if( isset( $_POST['submit'] ) ) {
        
        // Save submitted data
        $pinger_data['Pinger_Message'] = $_POST['Pinger_Message'];
        $pinger_data['Nick'] = $_POST['Nick'];
        $pinger_data['Password'] = $_POST['Password'];
        $pinger_data['Pinger_Shared'] = $_POST['Pinger_Shared'];
        $pinger_data['Pinger_Time'] = $_POST['Pinger_Time'];
        $pinger_data['Max_Hubs'] = $_POST['Max_Hubs'];       
        $result = pinger_save_settings( $pinger_data );
        
    }
    
    $pinger_settings = pinger_read_settings();
    echo '<h3><strong>ADC NMDC Hublist</strong></h3>';
    
    if( isset( $result ) ) {
        if( $result == true ) { 
        h_log('Pinger setting changed  -- ' . date('d-m-Y H:i:s'));
            echo '<p class="updated">Settings saved.</p>';
        } elseif( $result == false ) { 
        h_log('Failed to change pinger setting  -- ' . date('d-m-Y H:i:s'));
            echo '<p class="error">Error saving data. Check permissions.</p>';
        }
    }
    ?>
    <form method="post" action="<?php echo $_SERVER ['REQUEST_URI']; ?>">
	<div style="border:1px solid #ccc; padding: 10px; height:auto; align: center;">
         <h3>Pinger Settings</h3>   
        <p><label for="Pinger_Message">Pinger Message<br /></label>
            <input name="Pinger_Message" id="Pinger_Message" class="text" value="<?php echo $pinger_settings['Pinger_Message']; ?>" style="width: 98%;" /></p>
           	<div>
			<div style="width: 22%; float: left; margin: 0 8px 0 0;">
			<p><label for="Nick">Nick<br /></label>
            <input name="Nick" id="Nick" class="text" value="<?php echo $pinger_settings['Nick']; ?>" style="width: 97%;" /></p>            
			</div>
			<div style="width: 22%; float: left; margin: 0 8px 0 8px;">
			<p><label for="Password">Password<br /></label>
            <input name="Password" id="Password" class="text" value="<?php echo $pinger_settings['Password']; ?>" style="width: 97%;" /></p>            
			</div>
			<div style="width: 15%; float: left; margin: 0 8px 0 8px;">
			<p><label for="Pinger_Shared">Pinger Shared<br /></label>
            <input name="Pinger_Shared" id="Pinger_Shared" class="text" value="<?php echo $pinger_settings['Pinger_Shared']; ?>" style="width: 97%;" /></p>            
			</div>
			<div style="width: 15%; float: left; margin: 0 8px 0 8px;">
			<p><label for="Pinger_Time">Pinger Time<br /></label>
            <input name="Pinger_Time" id="Pinger_Time" class="text" value="<?php echo $pinger_settings['Pinger_Time']; ?>" style="width: 97%;" /></p>            
			</div>
			<div style="width: 14%; float: left; margin: 0 0 0 8px;">
			<p><label for="Max_Hubs">Hubs Max<br /></label>
            <input name="Max_Hubs" id="Max_Hubs" class="text" value="<?php echo $pinger_settings['Max_Hubs']; ?>" style="width: 97%;" /></p>            
			</div>
			<div style="clear: both;"></div>
			</div>            
            </div>
         <p></p>
        <p><input type="submit" id="submit" class="button" value="<?php i18n('BTN_SAVESETTINGS'); ?>" name="submit" /> &nbsp;&nbsp; <a class="button" href="load.php?id=hublist&hubs_view" > Return </a></p>
        
    </form>
    <?php

	}
	$data = hublist_pinger_process();
		echo $data;
}