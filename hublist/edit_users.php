<?php

if ((get_cookie('GS_ADMIN_USERNAME') != '')) {

function hublist_users() {

    global $users_data_file;

    // Check for submitted data
    if( isset( $_POST['submit'] ) ) {
        
        // Save submitted data
        $user_data['id_user'] = $_POST['id_user'];
        $user_data['Name'] = $_POST['Name'];
        $user_data['Password'] = $_POST['Password'];
        $user_data['Email'] = $_POST['Email'];
        $user_data['Active'] = $_POST['Active'];       
        $result = users_save( $user_data );
        
    }
    
    $hl_user = users_read();
    
    if( isset( $_POST['delete'] ) ) {
    h_log('Deleted user ' . $hl_user['Name'] . ' -- ' . date('d-m-Y H:i:s'));
      rename(GSDATAOTHERPATH . HUBLIST_DIR . HUBLIST_USERS_DIR . $hl_user['id_user'], GSDATAOTHERPATH . HUBLIST_DIR . HUBLIST_TRASH_DIR . $hl_user['id_user']);
    }
    
    echo '<h3><strong>ADC NMDC Hublist</strong></h3>';
    
    if( isset( $result ) ) {
        if( $result == true ) { 
         h_log('Edit user ' . $user_data['Name'] . ' -- ' . date('d-m-Y H:i:s'));
            echo '<p class="updated">Settings saved.</p>';
        } elseif( $result == false ) { 
         h_log('Edit user failed ' . $user_data['Name'] . ' -- ' . date('d-m-Y H:i:s'));
            echo '<p class="error">Error saving data. Check permissions.</p>';
        }
    }
    ?>
    <form method="post" action="<?php echo $_SERVER ['REQUEST_URI']; ?>">
	<div style="border:1px solid #ccc; padding: 10px; height:auto; align: center;">
         <h3>Edit User | <?php echo $hl_user['id_user']; ?></h3>   
        <p><label for="Name">Name<br /></label>
            <input name="Name" id="Name" class="text" value="<?php echo $hl_user['Name']; ?>" style="width: 98%;" /></p>
         <p><label for="Password">Password<br /></label>
            <input name="Password" id="Password" class="text" value="<?php echo $hl_user['Password']; ?>" style="width: 98%;" /></p>
          <p><label for="Email">Email<br /></label>
            <input name="Email" id="Email" class="text" value="<?php echo $hl_user['Email']; ?>" style="width: 98%;" /></p>
            <p>
            <label for="Active"> Status<br /></label>
            <select name="Active" id="Active">
            <option <?php if ($hl_user['Active'] == 'Enabled') { echo 'selected="selected"'; }?> value="Enabled">Enabled</option>
            <option <?php if ($hl_user['Active'] == 'Disabled') { echo 'selected="selected"'; }?> value="Disabled">Disabled</option></select></p>
            <input type="hidden" name="id_user" id="id_user" class="text" value="<?php echo $hl_user['id_user']; ?>" style="width: 98%;" />
            </div>
         <p></p>
        <p><input type="submit" id="submit" class="button" value="<?php i18n('BTN_SAVESETTINGS'); ?>" name="submit" /> &nbsp;&nbsp; <input type="submit" id="delete" class="button" value="Delete" name="delete" /> &nbsp;&nbsp; <a class="button" href="load.php?id=hublist&users_view" > Return </a></p>
        
    </form>
    <?php

	}
	$data = hublist_users();
		echo $data;
}