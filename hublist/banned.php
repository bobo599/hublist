<?php
if ((get_cookie('GS_ADMIN_USERNAME') != '')) {
function hublist_banned() {
    global $banned_data_file;
    global $SITEURL;
    // Check for submitted data
    if( isset( $_POST['submit'] ) ) {
        
        // Save submitted data
        $banned_submitted_data['Banned_IP_Range'] = $_POST['Banned_IP_Range'];
        $banned_submitted_data['Banned_IP'] = $_POST['Banned_IP'];
        
        $result = banned_save_settings( $banned_submitted_data );
        
    }
    
    $banned_settings = banned_read_settings();
    echo '<h3><strong>ADC NMDC Hublist</strong></h3>';
    
    if( isset( $result ) ) {
        if( $result == true ) { 
        h_log('Banned setting changed  -- ' . date('d-m-Y H:i:s'));
            echo '<p class="updated">Settings saved.</p>';
        } elseif( $result == false ) { 
        h_log('Failed to change banned setting  -- ' . date('d-m-Y H:i:s'));
            echo '<p class="error">Error saving data. Check permissions.</p>';
        }
    }
    ?>
    <form method="post" action="<?php echo $_SERVER ['REQUEST_URI']; ?>">
        <div style="border:1px solid #ccc; padding: 20px;">
        <h3>Banned IP Address</h3>
        <p><label for="Banned_IP">Banned IP comma separated<br /></label>
            <textarea name="Banned_IP" id="Banned_IP"  style="width:98%; height:80px; resize:none;"><?php echo $banned_settings['Banned_IP']; ?></textarea></p>
        <p><label for="Banned_IP_Range">Banned IP Range comma separated<br /></label>
            <textarea disabled name="Banned_IP_Range" id="Banned_IP_Range"  style="width:98%; height:80px; resize:none;"><?php echo $banned_settings['Banned_IP_Range']; ?></textarea></p>
        </div>
         <p></p>
        <p><input type="submit" id="submit" class="button" value="<?php i18n('BTN_SAVESETTINGS'); ?>" name="submit" /> &nbsp;&nbsp; <a class="button" href="load.php?id=hublist&hubs_view" > Return </a></p>
        
    </form>
    <?php
 }
	$data = hublist_banned();
		echo $data;		
}