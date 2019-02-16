<?php

$hublist_settings = hublist_read_settings();
if ($hublist_settings['Enable_Hublist'] == 'Enabled') {

$h_id = $_GET['h_id'];
//$fl = basename($rs);
$hub_f = GSDATAOTHERPATH . HUBLIST_DIR . HUBLIST_DATA_DIR . 'hub-'.$h_id.'.xml'; 
//$hub_settings = hub_edit_read();
function hub_r() {   
    global $hub_f;    
    if( file_exists( $hub_f ) ) {        
        $data = getXML( $hub_f );
        $hub['fl'] = $data->fl;
        $hub['Name'] = $data->Name;
        $hub['Topic'] = $data->Topic;
	$hub['Description'] = $data->Description;
        $hub['Protocol'] = $data->Protocol;
        $hub['Software'] = $data->Software;
	$hub['Contact'] = $data->Contact;
        $hub['Owner'] = $data->Owner;
        $hub['Support'] = $data->Support;
        $hub['Address'] = $data->Address;
	$hub['Port'] = $data->Port;
        $hub['Country'] = $data->Country;
        $hub['Users'] = $data->Users;
        $hub['Shared'] = $data->Shared;
	$hub['User_limit'] = $data->User_limit;
	$hub['Share_Limit'] = $data->Share_Limit;
	$hub['Slot_Limit'] = $data->Slot_Limit;
	$hub['Hub_Limit'] = $data->Hub_Limit;
	$hub['Reliability'] = $data->Reliability;
	$hub['Vote'] = $data->Vote;
        $hub['Status'] = $data->Status; 
        $hub['Enabled'] = $data->Enabled;
        $hub['Pinger'] = $data->Pinger; 
        $hub['Pinger_Count'] = $data->Pinger_Count;
	$hub['Pinger_Failed'] = $data->Pinger_Failed; 
        $hub['X'] = $data->X;
        $hub['User'] = $data->User; 
        $hub['adddate'] = $data->adddate; 
        $hub['Last_Ping'] = $data->Last_Ping; 		
    }
    $hub['site_root'] = '/';    
    return $hub;    
}


function getUserIP()
{
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }

    return $ip;
}

$user_ip = getUserIP();
//echo $user_ip; // Output IP address [Ex: 177.87.193.134]

$banned_settings = banned_read_settings();
$dat = simplexml_load_string($xml);
$dat = $banned_settings['Banned_IP'];
$values = explode(",", $dat);
foreach($values as $row)
{
 if ($user_ip == $row) {
  $banned_ip = TRUE; 
 }
}


if (isset($_GET['id'])){
    $h_id = str_replace ('..','',$_GET['id']);
    $h_id = str_replace ('/','',$h_id);
    $_id = lowercase($id);
} else {
    $h_id = "index";
}

if ($h_id=='hublist') {
    add_filter('content','hublistContent');
    function hublistContent() {
        //global $content;
include(GSPLUGINPATH . HUBLIST_DIR . 'front/hubs.php');
         $hubscontent = hubsContent();
        return  $hubscontent;
    }
}

if ($h_id=='details') {
    add_filter('content','hubDetails');
    function hubDetails() {
        //global $content;
include(GSPLUGINPATH . HUBLIST_DIR . 'front/details.php');
         $hubdetails = details_Hub();
        return  $hubdetails;
    }
  }
  
if ($h_id=='statistics') {
    add_filter('content','Statistic');
    function Statistic() {
        //global $content;
include(GSPLUGINPATH . HUBLIST_DIR . 'front/statistics.php');
         $stat_details = H_Statistics();
        return  $stat_details;
    }
   }
  }
 