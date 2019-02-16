<?php
if ((get_cookie('GS_ADMIN_USERNAME') != '')) {


function hublist_ManageDB() {


      echo '<h3>Create Check Repair And Reset Database Folders</h3>';


     if( isset( $_POST['submit'] ) ) {
      h_log('Datda structure created  -- ' . date('d-m-Y H:i:s'));
      $file_ht = GSPLUGINPATH . HUBLIST_DIR . 'inc/htaccess.txt';
      if (!file_exists(GSDATAOTHERPATH . HUBLIST_DIR)) {
      mkdir(GSDATAOTHERPATH . HUBLIST_DIR, 0777, true);
      $h_fht = GSDATAOTHERPATH . HUBLIST_DIR . '.htaccess';
      copy($file_ht, $h_fht);
      echo '<p class="updated">Hublist dir Created.</p>';
      } else { echo '<p class="error">Hublist dir exist!</p>';}      
      if (!file_exists(GSDATAOTHERPATH . HUBLIST_DIR . HUBLIST_DATA_DIR)) {
      mkdir(GSDATAOTHERPATH . HUBLIST_DIR . HUBLIST_DATA_DIR, 0777, true);
      $hd_fht = GSDATAOTHERPATH . HUBLIST_DIR . HUBLIST_DATA_DIR . '.htaccess';
      copy($file_ht, $hd_fht);
      echo '<p class="updated">Hublist data dir Created.</p>';
      } else { echo '<p class="error">Hublist data dir exist!</p>';}
      if (!file_exists(GSDATAOTHERPATH . HUBLIST_DIR . HUBLIST_USERS_DIR)) {
      mkdir(GSDATAOTHERPATH . HUBLIST_DIR . HUBLIST_USERS_DIR, 0777, true);
      $hu_fht = GSDATAOTHERPATH . HUBLIST_DIR . HUBLIST_USERS_DIR . '.htaccess';
      copy($file_ht, $hu_fht);
      echo '<p class="updated">Hublist users dir Created.</p>';
      } else { echo '<p class="error">Hublist users dir exist!</p>';}
      if (!file_exists(GSDATAOTHERPATH . HUBLIST_DIR . HUBLIST_TRASH_DIR)) {
      mkdir(GSDATAOTHERPATH . HUBLIST_DIR . HUBLIST_TRASH_DIR, 0777, true);
      $ht_fht = GSDATAOTHERPATH . HUBLIST_DIR . HUBLIST_TRASH_DIR . '.htaccess';
      copy($file_ht, $ht_fht);
      echo '<p class="updated">Hublist trash dir Created.</p>';
      }  else { echo '<p class="error">Hublist trash dir exist!</p>';}
      
      }
      
     if( isset( $_POST['check'] ) ) { 
      h_log('Datda structure checked  -- ' . date('d-m-Y H:i:s'));
      if (file_exists(GSDATAOTHERPATH . HUBLIST_DIR)) {
      echo '<p class="updated">Hublist dir OK.</p>';
      } else { echo '<p class="error">Hublist dir not exist!</p>';} 
      if (file_exists(GSDATAOTHERPATH . HUBLIST_DIR . '.htaccess')) {
      echo '<p class="updated">Hublist dir htaccess OK.</p>';
      } else { echo '<p class="error">Hublist dir htaccess not exist!</p>';}       
      
      if (file_exists(GSDATAOTHERPATH . HUBLIST_DIR . HUBLIST_DATA_DIR)) {
      echo '<p class="updated">Hublist data dir OK.</p>';
      } else { echo '<p class="error">Hublist data dir not exist!</p>';} 
      if (file_exists(GSDATAOTHERPATH . HUBLIST_DIR . HUBLIST_DATA_DIR . '.htaccess')) {
      echo '<p class="updated">Hublist data dir htaccess OK.</p>';
      } else { echo '<p class="error">Hublist data dir htaccess not exist!</p>';}       
      
      if (file_exists(GSDATAOTHERPATH . HUBLIST_DIR . HUBLIST_USERS_DIR)) {
      echo '<p class="updated">Hublist users dir OK.</p>';
      } else { echo '<p class="error">Hublist users dir not exist!</p>';} 
      if (file_exists(GSDATAOTHERPATH . HUBLIST_DIR . HUBLIST_USERS_DIR . '.htaccess')) {
      echo '<p class="updated">Hublist users dir htaccess OK.</p>';
      } else { echo '<p class="error">Hublist users dir htaccess not exist!</p>';} 
      
      if (file_exists(GSDATAOTHERPATH . HUBLIST_DIR . HUBLIST_TRASH_DIR)) {
      echo '<p class="updated">Hublist trash dir OK.</p>';
      } else { echo '<p class="error">Hublist trash dir not exist!</p>';} 
      if (file_exists(GSDATAOTHERPATH . HUBLIST_DIR . HUBLIST_TRASH_DIR . '.htaccess')) {
      echo '<p class="updated">Hublist trash dir htaccess OK.</p>';
      } else { echo '<p class="error">Hublist trash dir htaccess not exist!</p>';} 
      
      }
      
     if( isset( $_POST['repair'] ) ) { 
      h_log('Repair Data structure  -- ' . date('d-m-Y H:i:s'));
      $file_ht = GSPLUGINPATH . HUBLIST_DIR . 'inc/htaccess.txt';
      if (!file_exists(GSDATAOTHERPATH . HUBLIST_DIR)) {
      mkdir(GSDATAOTHERPATH . HUBLIST_DIR, 0777, true); }
      if (!file_exists(GSDATAOTHERPATH . HUBLIST_DIR . '.htaccess')) {
      $h_fht = GSDATAOTHERPATH . HUBLIST_DIR . '.htaccess';
      copy($file_ht, $h_fht); }
      
      if (!file_exists(GSDATAOTHERPATH . HUBLIST_DIR . HUBLIST_DATA_DIR)) {
      mkdir(GSDATAOTHERPATH . HUBLIST_DIR . HUBLIST_DATA_DIR, 0777, true); }
      if (!file_exists(GSDATAOTHERPATH . HUBLIST_DIR . HUBLIST_DATA_DIR . '.htaccess')) {
      $hd_fht = GSDATAOTHERPATH . HUBLIST_DIR . HUBLIST_DATA_DIR . '.htaccess';
      copy($file_ht, $hd_fht); }
      
      if (!file_exists(GSDATAOTHERPATH . HUBLIST_DIR . HUBLIST_USERS_DIR)) {
      mkdir(GSDATAOTHERPATH . HUBLIST_DIR . HUBLIST_USERS_DIR, 0777, true); }
      if (!file_exists(GSDATAOTHERPATH . HUBLIST_DIR . HUBLIST_USERS_DIR . '.htaccess')) {
      $hu_fht = GSDATAOTHERPATH . HUBLIST_DIR . HUBLIST_USERS_DIR . '.htaccess';
      copy($file_ht, $hu_fht); }
      
      if (!file_exists(GSDATAOTHERPATH . HUBLIST_DIR . HUBLIST_TRASH_DIR)) {
      mkdir(GSDATAOTHERPATH . HUBLIST_DIR . HUBLIST_TRASH_DIR, 0777, true); }
      if (!file_exists(GSDATAOTHERPATH . HUBLIST_DIR . HUBLIST_TRASH_DIR . '.htaccess')) {
      $ht_fht = GSDATAOTHERPATH . HUBLIST_DIR . HUBLIST_TRASH_DIR . '.htaccess';
      copy($file_ht, $ht_fht); }   
      echo '<p class="updated">Hublist data structure Repaired ;-)</p>';
      }

    ?>
    <form method="post" action="<?php echo $_SERVER ['REQUEST_URI']; ?>">
        <p><input type="submit" id="submit" class="button" value="Create XML DB Folders" name="submit" /> &nbsp;&nbsp; <input type="submit" id="check" class="button" value="Check XML DB Folders" name="check" /> &nbsp;&nbsp; <input type="submit" id="repair" class="button" value="Repair XML DB Folders" name="repair" /> &nbsp;&nbsp; <a class="button" href="load.php?id=hublist&hubs_view" > Return </a></p>
    </form>     
     <?php
	}
	$data = hublist_ManageDB();
		echo $data;
}
   
   






