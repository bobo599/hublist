<?php
if ((get_cookie('GS_ADMIN_USERNAME') != '')) {
    echo '<h3><strong>ADC NMDC Hublist</strong></h3>';

function Trash() { 

    if( isset( $_POST['submit'] ) ) {
       h_log('All file in trash deleted  -- ' . date('d-m-Y H:i:s'));
      $files = glob(GSDATAOTHERPATH . HUBLIST_DIR . HUBLIST_TRASH_DIR . '*'); // get all file names
	foreach($files as $file){ // iterate files
	    if(is_file($file))
	    unlink($file); // delete file
      }
        
    }

?>
	  <div style="border:1px solid #ccc; padding: 10px; height:auto; align: center;">
	  <h3><strong>Trashed Files</strong></h3>
	<form method="post" action="<?php echo $_SERVER ['REQUEST_URI']; ?>">
	  <?php

        foreach (scandir(GSDATAOTHERPATH . HUBLIST_DIR . HUBLIST_TRASH_DIR) as $entry) 
	{
	if ($entry != "." && $entry != ".." && $entry != ".htaccess") {
        $trashed = GSDATAOTHERPATH . HUBLIST_DIR . HUBLIST_TRASH_DIR . $entry;

	if( file_exists( $trashed ) ) {        
        $data = getXML( $trashed );
        $item['Name'] = $data->Name;		
    }

	?>
	<div style="padding: 4px;">
	<div style="width:28%; float:left;" ><?php echo basename($trashed); ?></div><div style="width:70%; float:left;" ><?php echo $item['Name']; ?></div>
	<div style="clear:both;" ></div>
	</div>

        <?php	
      }
    }
  if( file_exists( $trashed ) ) {  
  ?><br />
    <p><input type="submit" id="submit" class="button" value="Empty Trash" name="submit" /></p>
  <?php } else { echo '<span style="color: green"> Trash is empty </span>'; } ?>
    </form> 
    </div>
  <?php
  }  
	$data = Trash();
		echo $data;
}