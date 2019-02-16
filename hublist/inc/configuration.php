<?php
if ((get_cookie('GS_ADMIN_USERNAME') != '')) {
function hublist_admin_process() {
    global $random;
    global $hublist_data_file;
    global $SITEURL;
    // Check for submitted data
    if( isset( $_POST['submit'] ) ) {
        
        // Save submitted data
        $hublist_submitted_data['Enable_Hublist'] = $_POST['Enable_Hublist'];
        $hublist_submitted_data['Enable_ADC'] = $_POST['Enable_ADC'];
        $hublist_submitted_data['Enable_NMDC'] = $_POST['Enable_NMDC'];
        $hublist_submitted_data['Generate_XML'] = $_POST['Generate_XML'];
        $hublist_submitted_data['Secure_Settings'] = $_POST['Secure_Settings'];
        $hublist_submitted_data['Hublist_Name'] = $_POST['Hublist_Name'];
        $hublist_submitted_data['Hublist_Message'] = $_POST['Hublist_Message'];
        
        $result = hublist_save_settings( $hublist_submitted_data );
        
    }
    
    $hublist_settings = hublist_read_settings();
    echo '<h3><strong>ADC NMDC Hublist</strong></h3>';
    
    if( isset( $result ) ) {
        if( $result == true ) { 
        h_log('Hublist setting changed  -- ' . date('d-m-Y H:i:s'));
            echo '<p class="updated">Settings saved.</p>';
        } elseif( $result == false ) { 
        h_log('Failed to change Hublist setting  -- ' . date('d-m-Y H:i:s'));
            echo '<p class="error">Error saving data. Check permissions.</p>';
        }
    }
    ?>
    <form method="post" action="<?php echo $_SERVER ['REQUEST_URI']; ?>">
	<div style="border:1px solid #ccc; padding: 10px; height:auto; align: center;">
	 <h3>Hublist Settings</h3>
	<div style="padding: 10px; height:auto; align: center; margin-left:20px; display:block;">
         <div style="width:20%; float:left;"> <label for="Enable_Hublist">Enable Hublist<br /><br /></label>
            <select name="Enable_Hublist" id="Enable_Hublist">
            <option <?php if ($hublist_settings['Enable_Hublist'] == 'Enabled') { echo 'selected="selected"'; }?> value="Enabled">Enabled</option>
            <option <?php if ($hublist_settings['Enable_Hublist'] == 'Disabled') { echo 'selected="selected"'; }?> value="Disabled">Disabled</option></select><br />
            <?php if ($hublist_settings['Enable_Hublist'] == 'Enabled') { echo '<div style="margin:10px; width:70px; height:10px; border-radius:5px;background-color: green;"></div>'; } else { echo '<div style="margin:10px; width:70px; height:10px; border-radius:5px;background-color: orange;"></div>'; } ?></div>
         <div style="width:20%; float:left;">   
        <label for="Enable_ADC"> Enable ADC<br /><br /></label>
            <select name="Enable_ADC" id="Enable_ADC">
            <option <?php if ($hublist_settings['Enable_ADC'] == 'Enabled') { echo 'selected="selected"'; }?> value="Enabled">Enabled</option>
            <option <?php if ($hublist_settings['Enable_ADC'] == 'Disabled') { echo 'selected="selected"'; }?> value="Disabled">Disabled</option></select><br />
            <?php if ($hublist_settings['Enable_ADC'] == 'Enabled') { echo '<div style="margin:10px; width:70px; height:10px; border-radius:5px;background-color: green;"></div>'; } else { echo '<div style="margin:10px; width:70px; height:10px; border-radius:5px;background-color: orange;"></div>'; } ?></div>
         <div style="width:20%; float:left;">   
        <label for="Enable_NMDC"> Enable NMDC<br /><br /></label>
            <select name="Enable_NMDC" id="Enable_NMDC">
            <option <?php if ($hublist_settings['Enable_NMDC'] == 'Enabled') { echo 'selected="selected"'; }?> value="Enabled">Enabled</option>
            <option <?php if ($hublist_settings['Enable_NMDC'] == 'Disabled') { echo 'selected="selected"'; }?> value="Disabled">Disabled</option></select><br />
            <?php if ($hublist_settings['Enable_NMDC'] == 'Enabled') { echo '<div style="margin:10px; width:70px; height:10px; border-radius:5px;background-color: green;"></div>'; } else { echo '<div style="margin:10px; width:70px; height:10px; border-radius:5px;background-color: orange;"></div>'; } ?></div>
         <div style="width:20%; float:left;">   
        <label for="Generate_XML">Generate XML File<br /><br /></label>
            <select name="Generate_XML" id="Generate_XML">
            <option <?php if ($hublist_settings['Generate_XML'] == 'Enabled') { echo 'selected="selected"'; }?> value="Enabled">Enabled</option>
            <option <?php if ($hublist_settings['Generate_XML'] == 'Disabled') { echo 'selected="selected"'; }?> value="Disabled">Disabled</option></select><br />
            <?php if ($hublist_settings['Generate_XML'] == 'Enabled') { echo '<div style="margin:10px; width:70px; height:10px; border-radius:5px;background-color: green;"></div>'; } else { echo '<div style="margin:10px; width:70px; height:10px; border-radius:5px;background-color: orange;"></div>'; } ?></div>
         <div style="width:20%; float:left;">   
        <label for="Secure_Settings">Secure Settings<br /><br /></label>
            <select name="Secure_Settings" id="Secure_Settings">
            <option <?php if ($hublist_settings['Secure_Settings'] == 'Enabled') { echo 'selected="selected"'; }?> value="Enabled">Enabled</option>
            <option <?php if ($hublist_settings['Secure_Settings'] == 'Disabled') { echo 'selected="selected"'; }?> value="Disabled">Disabled</option></select><br />
            <?php if ($hublist_settings['Secure_Settings'] == 'Enabled') { echo '<div style="margin:10px; width:70px; height:10px; border-radius:5px;background-color: green;"></div>'; } else { echo '<div style="margin:10px; width:70px; height:10px; border-radius:5px;background-color: orange;"></div>'; } ?></div>           
          <div style="clear:both;"></div>
        <p><label for="Hublist_Name">Hublist Name<br /></label>
            <input name="Hublist_Name" id="Hublist_Name" class="text" value="<?php echo $hublist_settings['Hublist_Name']; ?>" style="width: 98%;" /></p>
        
        <p><label for="Hublist_Message">Hublist Message<br /></label>
            <input name="Hublist_Message" id="Hublist_Message" class="text" value="<?php echo $hublist_settings['Hublist_Message']; ?>" style="width: 98%;" /></p>
          </div>
          </div>
          <p></p>
        <p><input type="submit" id="submit" class="button" value="<?php i18n('BTN_SAVESETTINGS'); ?>" name="submit" /> &nbsp;&nbsp; <a class="button" href="load.php?id=hublist&hubs_view" > Return </a></p>
        
    </form>
    <?php
}
	$data = hublist_admin_process();
		echo $data;
}