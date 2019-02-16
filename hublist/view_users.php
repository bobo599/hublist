<?php
if ((get_cookie('GS_ADMIN_USERNAME') != '')) {
    echo '<h3><strong>ADC NMDC Hublist</strong></h3>';
    
function showUsers() { ?>
	  <div style="border:1px solid #ccc; padding: 10px; height:auto; align: center;">
	  <h3><strong>Hublist Users</strong></h3>
	  <?php

        foreach (scandir(GSDATAOTHERPATH . HUBLIST_DIR . HUBLIST_USERS_DIR) as $entry) 
	{
	if ($entry != "." && $entry != ".." && $entry != ".htaccess" ) {
        $user_file = GSDATAOTHERPATH . HUBLIST_DIR . HUBLIST_USERS_DIR . $entry;

   
    if( file_exists( $user_file ) ) {        
        $data = getXML( $user_file );
        $h_user['id_user'] = $data->id_user;
        $h_user['Name'] = $data->Name;
        $h_user['Email'] = $data->Email;   
        $h_user['Active'] = $data->Active;  		
    }

	?>
	<div style="border:1px solid #999; padding: 4px; align: center; border-radius: 3px 3px 3px 3px; margin-bottom:3px;">
	<div style="width: 55%; float:left;">
	&nbsp;&nbsp;<a style="text-decoration:none; font-size:1.1em;" href="load.php?id=hublist&edit_users&husr=<?php echo $h_user['id_user']; ?>"> <?php echo $h_user['Name']; ?></a>
	</div>
	<div style="width: 42%; float:left;">
	&nbsp;&nbsp;<?php echo $h_user['Email']; ?>
	</div>
	<div style="width: 2%; float:left;">
	&nbsp;&nbsp;<?php if ($h_user['Active'] == 'Enabled') {echo '<span style="color:green;">E</span>';} else {echo '<span style="color:red;">D</span>';} ?>
	</div>
	<div style="clear:both;"></div>
	</div>

        <?php   
	
      }
    }
  ?>
    </div>
  <?php
  }  
	$data = showUsers();
		echo $data;
}		