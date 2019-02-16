<?php
function details_Hub() { 
global $hublist_settings;
$hub = hub_r();
$cbl = substr( strtoupper($hub['Protocol']), 0, -3);
?>
<h2><?php echo $hublist_settings['Hublist_Name']; ?></h2>
<h3><?php echo $hublist_settings['Hublist_Message']; ?></h3>
<?php 
  global $banned_ip;
  global $user_ip;
    if ($banned_ip == TRUE) {
    echo 'This IP '.$user_ip.' IS BANNED';
      } else {
?>
		<div >
	<div class="col-md-2 t11 tdx">Name:&nbsp;&nbsp;</div>
	<div class="col-md-8 border Dmarg">&nbsp;<?php echo $hub['Name']; ?></div>
	<div class="clear"></div></div>
		<div >
	<div class="col-md-2 t11 tdx">Topic:&nbsp;&nbsp;</div>
	<div class="col-md-8 border Dmarg">&nbsp;<?php echo $hub['Topic']; ?></div>
	<div class="clear"></div></div>
		<div >
	<div class="col-md-2 t11 tdx">Description:&nbsp;&nbsp;</div>
	<div class="col-md-8 border Dmarg">&nbsp;<?php echo $hub['Description']; ?></div>
	<div class="clear"></div></div>
		<div >
	<div class="col-md-2 t11 tdx">Protocol:&nbsp;&nbsp;</div>
	<div class="col-md-8 border Dmarg">&nbsp;<?php echo $cbl; ?></div>
	<div class="clear"></div></div>
		<div >
	<div class="col-md-2 t11 tdx">Software:&nbsp;&nbsp;</div>
	<div class="col-md-8 border Dmarg">&nbsp;<?php echo $hub['Software']; ?></div>
	<div class="clear"></div></div>
		<div >
	<div class="col-md-2 t11 tdx">Contact:&nbsp;&nbsp;</div>
	<div class="col-md-8 border Dmarg">&nbsp;<?php echo $hub['Contact']; ?></div>
	<div class="clear"></div></div>
		<div >
	<div class="col-md-2 t11 tdx">Owner:&nbsp;&nbsp;</div>
	<div class="col-md-8 border Dmarg">&nbsp;<?php echo $hub['Owner']; ?></div>
	<div class="clear"></div></div>
		<div >
	<div class="col-md-2 t11 tdx">Support:&nbsp;&nbsp;</div>
	<div class="col-md-8 border Dmarg">&nbsp;<?php echo $hub['Support']; ?></div>
	<div class="clear"></div></div>
			<div >
	<div class="col-md-2 t11 tdx">Contact:&nbsp;&nbsp;</div>
	<div class="col-md-8 border Dmarg">&nbsp;<?php echo $hub['Contact']; ?></div>
	<div class="clear"></div></div>
		<div >
	<div class="col-md-2 t11 tdx">Address:&nbsp;&nbsp;</div>
	<div class="col-md-8 border Dmarg">&nbsp;<?php echo $hub['Address']; ?></div>
	<div class="clear"></div></div>
		<div >
	<div class="col-md-2 t11 tdx">Port:&nbsp;&nbsp;</div>
	<div class="col-md-8 border Dmarg">&nbsp;<?php echo $hub['Port']; ?></div>
	<div class="clear"></div></div>
		<div >
	<div class="col-md-2 t11 tdx">Country:&nbsp;&nbsp;</div>
	<div class="col-md-8 border Dmarg"><?php echo strtoupper(basename ($hub['Country'], '.png')); ?> &nbsp; <img class="flags" src="../data/uploads/images/<?php echo $hub['Country']; ?>"  width="25" height="18" /></div>
	<div class="clear"></div></div>
	<div >
	<div class="col-md-2 t11 tdx">Users:&nbsp;&nbsp;</div>
	<div class="col-md-8 border Dmarg">&nbsp;<?php echo $hub['Users']; ?></div>
	<div class="clear"></div></div>
	<div >
	<div class="col-md-2 t11 tdx">Shared:&nbsp;&nbsp;</div>
	<div class="col-md-8 border Dmarg">&nbsp;<?php echo $hub['Shared']; ?></div>
	<div class="clear"></div></div>
	<div >
	<div class="col-md-2 t11 tdx">Users Limit:&nbsp;&nbsp;</div>
	<div class="col-md-8 border Dmarg">&nbsp;<?php echo $hub['User_Limit']; ?></div>
	<div class="clear"></div></div>
	<div >
	<div class="col-md-2 t11 tdx">Share_Limit:&nbsp;&nbsp;</div>
	<div class="col-md-8 border Dmarg">&nbsp;<?php echo $hub['Share_Limit']; ?></div>
	<div class="clear"></div></div>
	<div >
	<div class="col-md-2 t11 tdx">Slot Limit:&nbsp;&nbsp;</div>
	<div class="col-md-8 border Dmarg">&nbsp;<?php echo $hub['Slot_Limit']; ?></div>
	<div class="clear"></div></div>
	<div >
	<div class="col-md-2 t11 tdx">Hub Limit:&nbsp;&nbsp;</div>
	<div class="col-md-8 border Dmarg">&nbsp;<?php echo $hub['Hub_Limit']; ?></div>
	<div class="clear"></div></div>
	<div >
	<div class="col-md-2 t11 tdx">Reliability:&nbsp;&nbsp;</div>
	<div class="col-md-8 border Dmarg">&nbsp;<?php echo round(100 - ($hub['Pinger_Failed'] / $hub['Pinger_Count'] * 100)); ?>%</div>
	<div class="clear"></div></div>
	<div >
	<div class="col-md-2 t11 tdx">Pinger Count:&nbsp;&nbsp;</div>
	<div class="col-md-8 border Dmarg green">&nbsp;<?php echo $hub['Pinger_Count']; ?></div>
	<div class="clear"></div></div>
	<div >
	<div class="col-md-2 t11 tdx">Pinger Failed:&nbsp;&nbsp;</div>
	<div class="col-md-8 border Dmarg red">&nbsp;<?php echo $hub['Pinger_Failed']; ?></div>
	<div class="clear"></div></div>
	<div >
	<div class="col-md-2 t11 tdx">Vote:&nbsp;&nbsp;</div>
	<div class="col-md-8 border Dmarg">&nbsp;<?php echo $hub['Vote']; ?></div>
	<div class="clear"></div></div>
	<p></p>
	<div >
	<div class="col-md-2 t11 tdx">Hub:&nbsp;&nbsp;</div>
	<div class="col-md-8 border Dmarg">&nbsp;<?php echo $hub['Enabled']; ?></div>
	<div class="clear"></div></div>
	<div >
	<div class="col-md-2 t11 tdx">Pinger:&nbsp;&nbsp;</div>
	<div class="col-md-8 border Dmarg">&nbsp;<?php echo $hub['Pinger']; ?></div>
	<div class="clear"></div></div>
	<div >
	<div class="col-md-2 t11 tdx">Include in XML:&nbsp;&nbsp;</div>
	<div class="col-md-8 border Dmarg">&nbsp;<?php echo $hub['X']; ?></div>
	<div class="clear"></div></div>
	<div >
	<div class="col-md-2 t11 tdx">Added by:&nbsp;&nbsp;</div>
	<div class="col-md-8 border Dmarg">&nbsp;<?php echo $hub['User']; ?></div>
	<div class="clear"></div></div>
	<div >
	<div class="col-md-2 t11 tdx">Added Date:&nbsp;&nbsp;</div>
	<div class="col-md-8 border Dmarg">&nbsp;<?php echo $hub['adddate']; ?></div>
	<div class="clear"></div></div>
	<div >
	<div class="col-md-2 t11 tdx">Last Ping:&nbsp;&nbsp;</div>
	<div class="col-md-8 border Dmarg">&nbsp;<?php echo $hub['Last_ping']; ?></div>
	<div class="clear"></div></div>
	<div >
	<div class="col-md-2 t11 tdx">Status:&nbsp;&nbsp;</div>
	<div class="col-md-8 border Dmarg">&nbsp;<?php echo $hub['Status']; ?></div>
	<div class="clear"></div></div>	 	    
  <?php
   } ?>
   	<p>&nbsp;</p><p>&nbsp;</p> 
   	  <?php
  }