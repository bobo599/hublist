<?php
if ((get_cookie('GS_ADMIN_USERNAME') != '')) {
    echo '<h3><strong>ADC NMDC Hublist</strong></h3>';
    
function showHubs() {

        foreach (scandir(GSDATAOTHERPATH . HUBLIST_DIR . HUBLIST_DATA_DIR) as $entry) 
	{
	if ($entry != "." && $entry != ".." && $entry != ".htaccess" ) {
        $hub_file = GSDATAOTHERPATH . HUBLIST_DIR . HUBLIST_DATA_DIR . $entry;

	if( file_exists( $hub_file ) ) {        
        $data = getXML( $hub_file );
        $hub['fl'] = $data->fl;
        $hub['Name'] = $data->Name;
	$hub['Description'] = $data->Description;
        $hub['Protocol'] = $data->Protocol;
        $hub['Software'] = $data->Software;
        $hub['Address'] = $data->Address;
        $hub['Port'] = $data->Port;
        $hub['Country'] = $data->Country;
        $hub['Users'] = $data->Users;
        $hub['Shared'] = $data->Shared;
        $hub['Status'] = $data->Status; 
        $hub['Enabled'] = $data->Enabled;
        $hub['Pinger'] = $data->Pinger; 
        $hub['Pinger_Count'] = $data->Pinger_Count; 
        $hub['X'] = $data->X;
        $hub['User'] = $data->User; 
        $hub['adddate'] = $data->adddate; 
        $hub['Last_Ping'] = $data->Last_Ping; 		
    }
	$rf = strtoupper(basename ($hub['Country'], '.png'));

	?>
	<div style="border:1px solid #999; padding: 4px; height:auto; align: center; border-radius: 3px 3px 3px 3px;">
	<div style="width: 30px; float:right; margin-right:3px;">
	<img style="border: 1px solid #ccc;" src="../data/uploads/images/<?php echo $hub['Country']; ?>" width="20" height="15" />
	</div>
	<div style="width: 98%;">
	&nbsp;&nbsp;<a style="text-decoration:none; font-size:1.1em;" href="load.php?id=hublist&hub_details&hub=<?php echo $hub['fl']; ?>"><?php echo $hub['Name']; ?></a>
	</div>
	<div style="width: 98%; padding: 5px;">
	<label for="Description">Description</label>
	<textarea style="resize: none; padding: 5px; width:98%; height: 40px; margin:auto;" readonly="readonly" ><?php echo $hub['Description']; ?></textarea>
	</div>
	<div style="width: 40%; float:left; color: blue;">
	&nbsp;&nbsp;<?php echo $hub['Address']; ?> : <?php echo $hub['Port']; ?>
	</div>
	<div style="width: 30px; float:right;">
	 <?php if ($hub['Enabled'] == 'Enabled') { echo '<span style="color: green; font-weight: bold;"> E </span>'; } else { echo '<span style="color: red; font-weight: bold;"> E </span>'; } ?>
	</div>
	<div style="width: 30px; float:right;">
	 <?php if ($hub['Status'] == 'active') { echo '<span style="color: green; font-weight: bold;"> S </span>'; } else { echo '<span style="color: red; font-weight: bold;"> S </span>'; } ?>
	</div>
	<div style="width: 30px; float:right;">
	 <?php if ($hub['Pinger'] == 'Enabled') { echo '<span style="color: green; font-weight: bold;"> P </span>'; } else { echo '<span style="color: red; font-weight: bold;"> P </span>'; } ?>
	</div>
	<div style="width: 30px; float:right;">
	 <?php if ($hub['X'] == 'Enabled') { echo '<span style="color: green; font-weight: bold;"> X </span>'; } else { echo '<span style="color: red; font-weight: bold;"> X </span>'; } ?>
	</div>
	<div style="width: 30px; float:right; margin-left:10px;">
	<span style=" font-weight:bold;"><?php echo $rf; ?></span>
	</div>
	<div style="width: 50px; float:right;">
	 <span style=" font-weight:bold;"><?php echo strtoupper($hub['Protocol']); ?></span>
	</div>
	<div style="clear:both;"> </div>
	</div>
	<p></p>
        <?php   
	
      }
    }

  }  
	$data = showHubs();
		echo $data;
}		