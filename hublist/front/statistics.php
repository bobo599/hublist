<?php

function H_Statistics() {
global $hublist_settings;
global $SITEURL;
	$i= 0;
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
<p>&nbsp;</p>
<h4>Latest 5 added Hub</h4>
<?php

        foreach (scandir(GSDATAOTHERPATH . HUBLIST_DIR . HUBLIST_DATA_DIR) as $entry) 
	{

	if ($entry != "." && $entry != ".." && $entry != ".htaccess" ) {
        $hub_file = GSDATAOTHERPATH . HUBLIST_DIR . HUBLIST_DATA_DIR . $entry;
	$i++;
	if( file_exists( $hub_file ) ) {        
        $data = getXML( $hub_file );
        $hub['fl'] = $data->fl;
        $hub['Name'] = $data->Name;
        $hub['Protocol'] = $data->Protocol;
        $hub['Address'] = $data->Address;
        $hub['Port'] = $data->Port;
        $hub['Country'] = $data->Country;
        $hub['Users'] = $data->Users;
        $hub['Shared'] = $data->Shared;
        $hub['Enabled'] = $data->Enabled;
        $hub['adddate'] = $data->adddate;
    } 
    
    //array_multisort($entry[], SORT_DESC, SORT_STRING);
    if ($hub['Enabled'] == 'Enabled') {
	$bbl = substr( basename($hub['fl'], '.xml'), 4);
	//$abl = substr( strtoupper($hub['Protocol']), 0, -3);
	?>
	<div class="col-md-12 border Mmarg">
	<div class="col-md-5"><a class="hbtn t11 decno green" href="<?php echo $SITEURL; ?>details?h_id=<?php echo $bbl; ?>"><?php echo $hub['Name']; ?></a></div>
	<div class="col-md-4"><a href="<?php echo $hub['Protocol']; ?><?php echo $hub['Address']; ?>:<?php echo $hub['Port']; ?>"><?php echo $hub['Address']; ?>:<?php echo $hub['Port']; ?></a></div>
	<div class="col-md-1"><img class="flags" style="border: 1px solid #ccc;" src="../data/uploads/images/<?php echo $hub['Country']; ?>" width="25" height="18" /></div>
	<div class="col-md-1"><?php echo $hub['Shared']; ?></div>
	<div class="col-md-1"><?php echo $hub['Users']; ?></div>
	<div class="clear"></div>
	</div>
        <?php 
        }
      }
	if($i == 5) break;
    } 
   } ?>
    <p>&nbsp;</p><p>&nbsp;</p>
    <?php
}
