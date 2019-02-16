<?php
if ((get_cookie('GS_ADMIN_USERNAME') != '')) {
function details_Hub() { 
    $hub_settings = hub_read();
    $dbl = substr( strtoupper($hub_settings['Protocol']), 0, -3);
    echo '<h3><strong>ADC NMDC Hublist</strong></h3>';
?>

	<div style="border:1px solid #ccc; padding: 10px;">
	       <h3>Details Hub | <?php echo $hub_settings['fl']; ?></h3>
		<div style="margin:10px;">
	<div style="width: 18%; font-weight: bold; color: blue; text-align: right; float:left;">Name:&nbsp;&nbsp;</div>
	<div style="width: 80%;  float:left; border: 1px solid #ccc; padding: 3px 0 2px 4px ;">&nbsp;<?php echo $hub_settings['Name']; ?></div>
	<div style="clear: both;"></div></div>
		<div style="margin:10px;">
	<div style="width: 18%; font-weight: bold; color: blue; text-align: right; float:left;">Topic:&nbsp;&nbsp;</div>
	<div style="width: 80%;  float:left; border: 1px solid #ccc; padding: 3px 0 2px 4px ;">&nbsp;<?php echo $hub_settings['Topic']; ?></div>
	<div style="clear: both;"></div></div>
		<div style="margin:10px;">
	<div style="width: 18%; font-weight: bold; color: blue; text-align: right; float:left;">Description:&nbsp;&nbsp;</div>
	<div style="width: 80%;  float:left; border: 1px solid #ccc; padding: 3px 0 2px 4px ;">&nbsp;<?php echo $hub_settings['Description']; ?></div>
	<div style="clear: both;"></div></div>
		<div style="margin:10px;">
	<div style="width: 18%; font-weight: bold; color: blue; text-align: right; float:left;">Protocol:&nbsp;&nbsp;</div>
	<div style="width: 80%;  float:left; border: 1px solid #ccc; padding: 3px 0 2px 4px ;">&nbsp;<?php echo $dbl; ?></div>
	<div style="clear: both;"></div></div>
		<div style="margin:10px;">
	<div style="width: 18%; font-weight: bold; color: blue; text-align: right; float:left;">Software:&nbsp;&nbsp;</div>
	<div style="width: 80%;  float:left; border: 1px solid #ccc; padding: 3px 0 2px 4px ;">&nbsp;<?php echo $hub_settings['Software']; ?></div>
	<div style="clear: both;"></div></div>
		<div style="margin:10px;">
	<div style="width: 18%; font-weight: bold; color: blue; text-align: right; float:left;">Contact:&nbsp;&nbsp;</div>
	<div style="width: 80%;  float:left; border: 1px solid #ccc; padding: 3px 0 2px 4px ;">&nbsp;<?php echo $hub_settings['Contact']; ?></div>
	<div style="clear: both;"></div></div>
		<div style="margin:10px;">
	<div style="width: 18%; font-weight: bold; color: blue; text-align: right; float:left;">Owner:&nbsp;&nbsp;</div>
	<div style="width: 80%;  float:left; border: 1px solid #ccc; padding: 3px 0 2px 4px ;">&nbsp;<?php echo $hub_settings['Owner']; ?></div>
	<div style="clear: both;"></div></div>
		<div style="margin:10px;">
	<div style="width: 18%; font-weight: bold; color: blue; text-align: right; float:left;">Support:&nbsp;&nbsp;</div>
	<div style="width: 80%;  float:left; border: 1px solid #ccc; padding: 3px 0 2px 4px ;">&nbsp;<?php echo $hub_settings['Support']; ?></div>
	<div style="clear: both;"></div></div>
			<div style="margin:10px;">
	<div style="width: 18%; font-weight: bold; color: blue; text-align: right; float:left;">Contact:&nbsp;&nbsp;</div>
	<div style="width: 80%;  float:left; border: 1px solid #ccc; padding: 3px 0 2px 4px ;">&nbsp;<?php echo $hub_settings['Contact']; ?></div>
	<div style="clear: both;"></div></div>
		<div style="margin:10px;">
	<div style="width: 18%; font-weight: bold; color: blue; text-align: right; float:left;">Address:&nbsp;&nbsp;</div>
	<div style="width: 80%;  float:left; border: 1px solid #ccc; padding: 3px 0 2px 4px ;">&nbsp;<?php echo $hub_settings['Protocol']; ?><?php echo $hub_settings['Address']; ?></div>
	<div style="clear: both;"></div></div>
		<div style="margin:10px;">
	<div style="width: 18%; font-weight: bold; color: blue; text-align: right; float:left;">Port:&nbsp;&nbsp;</div>
	<div style="width: 80%;  float:left; border: 1px solid #ccc; padding: 3px 0 2px 4px ;">&nbsp;<?php echo $hub_settings['Port']; ?></div>
	<div style="clear: both;"></div></div>
		<div style="margin:10px;">
	<div style="width: 18%; font-weight: bold; color: blue; text-align: right; float:left;">Country:&nbsp;&nbsp;</div>
	<div style="width: 80%;  float:left; border: 1px solid #ccc; padding: 3px 0 2px 4px ;"><?php echo strtoupper(basename ($hub_settings['Country'], '.png')); ?> &nbsp; <img style="border:1px solid #ccc" src="../data/uploads/images/<?php echo $hub_settings['Country']; ?>" width="16" height="10" /></div>
	<div style="clear: both;"></div></div>
	<div style="margin:10px;">
	<div style="width: 18%; font-weight: bold; color: blue; text-align: right; float:left;">Users:&nbsp;&nbsp;</div>
	<div style="width: 80%;  float:left; border: 1px solid #ccc; padding: 3px 0 2px 4px ;">&nbsp;<?php echo $hub_settings['Users']; ?></div>
	<div style="clear: both;"></div></div>
	<div style="margin:10px;">
	<div style="width: 18%; font-weight: bold; color: blue; text-align: right; float:left;">Shared:&nbsp;&nbsp;</div>
	<div style="width: 80%;  float:left; border: 1px solid #ccc; padding: 3px 0 2px 4px ;">&nbsp;<?php echo $hub_settings['Shared']; ?></div>
	<div style="clear: both;"></div></div>
	<div style="margin:10px;">
	<div style="width: 18%; font-weight: bold; color: blue; text-align: right; float:left;">Users Limit:&nbsp;&nbsp;</div>
	<div style="width: 80%;  float:left; border: 1px solid #ccc; padding: 3px 0 2px 4px ;">&nbsp;<?php echo $hub_settings['User_Limit']; ?></div>
	<div style="clear: both;"></div></div>
	<div style="margin:10px;">
	<div style="width: 18%; font-weight: bold; color: blue; text-align: right; float:left;">Share_Limit:&nbsp;&nbsp;</div>
	<div style="width: 80%;  float:left; border: 1px solid #ccc; padding: 3px 0 2px 4px ;">&nbsp;<?php echo $hub_settings['Share_Limit']; ?></div>
	<div style="clear: both;"></div></div>
	<div style="margin:10px;">
	<div style="width: 18%; font-weight: bold; color: blue; text-align: right; float:left;">Slot Limit:&nbsp;&nbsp;</div>
	<div style="width: 80%;  float:left; border: 1px solid #ccc; padding: 3px 0 2px 4px ;">&nbsp;<?php echo $hub_settings['Slot_Limit']; ?></div>
	<div style="clear: both;"></div></div>
	<div style="margin:10px;">
	<div style="width: 18%; font-weight: bold; color: blue; text-align: right; float:left;">Hub Limit:&nbsp;&nbsp;</div>
	<div style="width: 80%;  float:left; border: 1px solid #ccc; padding: 3px 0 2px 4px ;">&nbsp;<?php echo $hub_settings['Hub_Limit']; ?></div>
	<div style="clear: both;"></div></div>
	<div style="margin:10px;">
	<div style="width: 18%; font-weight: bold; color: blue; text-align: right; float:left;">Reliability:&nbsp;&nbsp;</div>
	<div style="width: 80%;  float:left; border: 1px solid #ccc; padding: 3px 0 2px 4px ;">&nbsp;<?php echo round(100 - ($hub_settings['Pinger_Failed'] / $hub_settings['Pinger_Count'] * 100)); ?>%</div>
	<div style="clear: both;"></div></div>
	<div style="margin:10px;">
	<div style="width: 18%; font-weight: bold; color: blue; text-align: right; float:left;">Pinger Count:&nbsp;&nbsp;</div>
	<div style="width: 80%;  float:left; border: 1px solid #ccc; padding: 3px 0 2px 4px ; color:green;">&nbsp;<?php echo $hub_settings['Pinger_Count']; ?></div>
	<div style="clear: both;"></div></div>
	<div style="margin:10px;">
	<div style="width: 18%; font-weight: bold; color: blue; text-align: right; float:left;">Pinger Failed:&nbsp;&nbsp;</div>
	<div style="width: 80%;  float:left; border: 1px solid #ccc; padding: 3px 0 2px 4px ; color:red;">&nbsp;<?php echo $hub_settings['Pinger_Failed']; ?></div>
	<div style="clear: both;"></div></div>
	<div style="margin:10px;">
	<div style="width: 18%; font-weight: bold; color: blue; text-align: right; float:left;">Vote:&nbsp;&nbsp;</div>
	<div style="width: 80%;  float:left; border: 1px solid #ccc; padding: 3px 0 2px 4px ;">&nbsp;<?php echo $hub_settings['Vote']; ?></div>
	<div style="clear: both;"></div></div>
	<p></p>
	<div style="margin:10px;">
	<div style="width: 18%; font-weight: bold; color: blue; text-align: right; float:left;">Hub:&nbsp;&nbsp;</div>
	<div style="width: 80%;  float:left; border: 1px solid #ccc; padding: 3px 0 2px 4px ;">&nbsp;<?php echo $hub_settings['Enabled']; ?></div>
	<div style="clear: both;"></div></div>
	<div style="margin:10px;">
	<div style="width: 18%; font-weight: bold; color: blue; text-align: right; float:left;">Pinger:&nbsp;&nbsp;</div>
	<div style="width: 80%;  float:left; border: 1px solid #ccc; padding: 3px 0 2px 4px ;">&nbsp;<?php echo $hub_settings['Pinger']; ?></div>
	<div style="clear: both;"></div></div>
	<div style="margin:10px;">
	<div style="width: 18%; font-weight: bold; color: blue; text-align: right; float:left;">Include in XML:&nbsp;&nbsp;</div>
	<div style="width: 80%;  float:left; border: 1px solid #ccc; padding: 3px 0 2px 4px ;">&nbsp;<?php echo $hub_settings['X']; ?></div>
	<div style="clear: both;"></div></div>
	<div style="margin:10px;">
	<div style="width: 18%; font-weight: bold; color: blue; text-align: right; float:left;">Added by:&nbsp;&nbsp;</div>
	<div style="width: 80%;  float:left; border: 1px solid #ccc; padding: 3px 0 2px 4px ;">&nbsp;<?php echo $hub_settings['User']; ?></div>
	<div style="clear: both;"></div></div>
	<div style="margin:10px;">
	<div style="width: 18%; font-weight: bold; color: blue; text-align: right; float:left;">Added Date:&nbsp;&nbsp;</div>
	<div style="width: 80%;  float:left; border: 1px solid #ccc; padding: 3px 0 2px 4px ;">&nbsp;<?php echo $hub_settings['adddate']; ?></div>
	<div style="clear: both;"></div></div>
	<div style="margin:10px;">
	<div style="width: 18%; font-weight: bold; color: blue; text-align: right; float:left;">File:&nbsp;&nbsp;</div>
	<div style="width: 80%;  float:left; border: 1px solid #ccc; padding: 3px 0 2px 4px ;">&nbsp;<?php echo $hub_settings['fl']; ?></div>
	<div style="clear: both;"></div></div>
	<div style="margin:10px;">
	<div style="width: 18%; font-weight: bold; color: blue; text-align: right; float:left;">Last Ping:&nbsp;&nbsp;</div>
	<div style="width: 80%;  float:left; border: 1px solid #ccc; padding: 3px 0 2px 4px ;">&nbsp;<?php echo $hub_settings['Last_ping']; ?></div>
	<div style="clear: both;"></div></div>
	<div style="margin:10px;">
	<div style="width: 18%; font-weight: bold; color: blue; text-align: right; float:left;">Status:&nbsp;&nbsp;</div>
	<div style="width: 80%;  float:left; border: 1px solid #ccc; padding: 3px 0 2px 4px ;">&nbsp;<?php echo $hub_settings['Status']; ?></div>
	<div style="clear: both;"></div></div>
	<p></p>
	<p>
	 &nbsp;&nbsp; <a class="button" href="load.php?id=hublist&edit_hub&hub=<?php echo $hub_settings['fl']; ?>">Edit</a> &nbsp;&nbsp; <a class="button" href="load.php?id=hublist&hub_ping&address=<?php echo $hub_settings['Address']; ?>&port=<?php echo $hub_settings['Port']; ?>">Ping</a> &nbsp;&nbsp; <a class="button" href="load.php?id=hublist&hubs_view">Return</a></p>
	  </div>  	    
            <?php
   }

$data = details_Hub();
		echo $data;
}		