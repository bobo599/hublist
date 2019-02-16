<?php

if ((get_cookie('GS_ADMIN_USERNAME') != '')) {

function create_users() {

    if( isset( $_POST['submit'] ) ) {
        
        // Save submitted data

        $user_data['Name'] = $_POST['Name'];
        $user_data['Password'] = $_POST['Password'];
        $user_data['Email'] = $_POST['Email'];
        $user_data['Active'] = $_POST['Active'];       
        $result = users_create( $user_data );
        
    }
    echo '<h3><strong>ADC NMDC Hublist</strong></h3>';
    
    if( isset( $result ) ) {
        if( $result == true ) {
         h_log('Added user ' . $user_data['Name'] . ' -- ' . date('d-m-Y H:i:s'));
            echo '<p class="updated">Settings saved.</p>';
        } elseif( $result == false ) { 
            echo '<p class="error">Error saving data. Check permissions.</p>';
         h_log('Failed to add user ' . $user_data['Name'] . ' -- ' . date('d-m-Y H:i:s'));
        }
    }
    ?>
    <form method="post" action="<?php echo $_SERVER ['REQUEST_URI']; ?>">
	<div style="border:1px solid #ccc; padding: 10px; height:auto; align: center;">
         <h3>Hublist Users</h3>   
        <p><label for="Name">Name<br /></label>
            <input name="Name" id="Name" class="text" value="" style="width: 98%;" /></p>
         <p><label for="Password">Password<br /></label>
            <input name="Password" id="Password" class="text" value="" style="width: 98%;" /></p>
          <p><label for="Email">Email<br /></label>
            <input name="Email" id="Email" class="text" value="" style="width: 98%;" /></p>
            <p>
            <label for="Active"> Status<br /></label>
            <select name="Active" id="Active">
            <option value="Enabled">Enabled</option>
            <option value="Disabled">Disabled</option></select></p>             
            </div>
         <p></p>
        <p><input type="submit" id="submit" class="button" value="<?php i18n('BTN_SAVESETTINGS'); ?>" name="submit" /> &nbsp;&nbsp; <a class="button" href="load.php?id=hublist&users_view" > Return </a></p>
        
    </form>
    <?php

	}
	$data = create_users();
		echo $data;
}