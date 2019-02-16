<?php
//hublist configuration
$hublist_data_file = GSDATAOTHERPATH . HUBLIST_DIR . 'hublist_settings.xml';
//$hublist_settings = hublist_read_settings();
function hublist_read_settings() {    
    global $hublist_data_file;    
    if( file_exists( $hublist_data_file ) ) {        
        $data = getXML( $hublist_data_file );
        $hublist_settings['Enable_Hublist'] = $data->Enable_Hublist;
        $hublist_settings['Enable_ADC'] = $data->Enable_ADC;
        $hublist_settings['Enable_NMDC'] = $data->Enable_NMDC;
        $hublist_settings['Generate_XML'] = $data->Generate_XML;
        $hublist_settings['Secure_Settings'] = $data->Secure_Settings;
        $hublist_settings['Hublist_Name'] = $data->Hublist_Name;
        $hublist_settings['Hublist_Message'] = $data->Hublist_Message;        
    } else {
        $hublist_settings['Enable_Hublist'] = null;
        $hublist_settings['Enable_ADC'] = null;
	$hublist_settings['Enable_NMDC'] = null;
	$hublist_settings['Generate_XML'] = null;
	$hublist_settings['Secure_Settings'] = null;
        $hublist_settings['Hublist_Name'] = null;
        $hublist_settings['Hublist_Message'] = null;        
        hublist_save_settings( $hublist_settings );        
    }    
    $hublist_settings['site_root'] = '/';    
    return $hublist_settings;    
}

function hublist_save_settings( $settings ) {    
    global $hublist_data_file;    
    $xml = @new simpleXMLElement( '<hublist_settings></hublist_settings>' );       
    $xml->addChild( 'Enable_Hublist', $settings['Enable_Hublist'] );
    $xml->addChild( 'Enable_ADC', $settings['Enable_ADC'] );
    $xml->addChild( 'Enable_NMDC', $settings['Enable_NMDC'] );
    $xml->addChild( 'Generate_XML', $settings['Generate_XML'] );
    $xml->addChild( 'Secure_Settings', $settings['Secure_Settings'] );
    $xml->addChild( 'Hublist_Name', $settings['Hublist_Name'] );
    $xml->addChild( 'Hublist_Message', $settings['Hublist_Message'] );    
    return $xml->asXML( $hublist_data_file );   
}

//users
function userString($length = 12) {
	$ustr = "";
	$characters = array_merge(range('a','z'), range('A','Z'), range('0','9'));
	$max = count($characters) - 1;
	for ($i = 0; $i < $length; $i++) {
		$rand = mt_rand(0, $max);
		$ustr .= $characters[$rand];
	}
	return $ustr;
}
$userrand = userString();

function users_create( $user ) {
    global $userrand;
    $user_file = GSDATAOTHERPATH . HUBLIST_DIR . HUBLIST_USERS_DIR . 'user-'.$userrand.'.xml';
	$xml = @new simpleXMLExtended('<?xml version="1.0" encoding="UTF-8" ' . 'standalone="yes"?>' . '<users></users>');       
    $xml->addChild( 'id_user', 'user-'.$userrand.'.xml' );
	$xml->addChild('Name', NULL);
	$xml->Name->addCData( $user['Name'] );
	$xml->addChild('Password', NULL);
	$xml->Password->addCData( $user['Password'] );
	$xml->addChild('Email', NULL);
	$xml->Email->addCData( $user['Email'] ); 
    $xml->addChild( 'Active', $user['Active'] ); 
    return $xml->asXML( $user_file );    
}


$husr = $_GET['husr'];
$users_data_file = GSDATAOTHERPATH . HUBLIST_DIR . HUBLIST_USERS_DIR . $husr; 
//$hl_user = users_read();
function users_read() {    
    global $users_data_file;    
    if( file_exists( $users_data_file ) ) {        
        $data = getXML( $users_data_file );
        $hl_user['id_user'] = $data->id_user;
        $hl_user['Name'] = $data->Name;
        $hl_user['Password'] = $data->Password;
        $hl_user['Email'] = $data->Email;   
        $hl_user['Active'] = $data->Active;  
    } else {
        $hl_user['id_user'] = null;
        $hl_user['Name'] = null;
        $hl_user['Password'] = null;
        $hl_user['Email'] = null;
        $hl_user['Active'] = null;  
        users_save( $hl_user );   
    }   
    $hl_user['site_root'] = '/';    
    return $hl_user;   
}

function users_save( $user ) {    
    global $users_data_file;
    $xml = @new simpleXMLExtended('<?xml version="1.0" encoding="UTF-8" ' . 'standalone="yes"?>' . '<users></users>');       
    $xml->addChild( 'id_user', $user['id_user'] );
	$xml->addChild('Name', NULL);
	$xml->Name->addCData( $user['Name'] );
	$xml->addChild('Password', NULL);
	$xml->Password->addCData( $user['Password'] );
	$xml->addChild('Email', NULL);
	$xml->Email->addCData( $user['Email'] );  
    $xml->addChild( 'Active', $user['Active'] ); 
    return $xml->asXML( $users_data_file );    
}

//pinger
$pinger_data_file = GSDATAOTHERPATH . HUBLIST_DIR . 'pinger_settings.xml';
//$pinger_settings = pinger_read_settings();
function pinger_read_settings() {    
    global $pinger_data_file;    
    if( file_exists( $pinger_data_file ) ) {        
        $data = getXML( $pinger_data_file );
        $pinger_settings['Pinger_Message'] = $data->Pinger_Message;
        $pinger_settings['Nick'] = $data->Nick;
        $pinger_settings['Password'] = $data->Password;
        $pinger_settings['Pinger_Shared'] = $data->Pinger_Shared;
        $pinger_settings['Pinger_Time'] = $data->Pinger_Time;   
        $pinger_settings['Max_Hubs'] = $data->Max_Hubs;  
    } else {
        $pinger_settings['Pinger_Message'] = null;
        $pinger_settings['Nick'] = null;
        $pinger_settings['Password'] = null;
        $pinger_settings['Pinger_Shared'] = null;
        $pinger_settings['Pinger_Time'] = null;
        $pinger_settings['Max_Hubs'] = null;  
        pinger_save_settings( $pinger_settings );   
    }   
    $pinger_settings['site_root'] = '/';    
    return $pinger_settings;   
}

function pinger_save_settings( $pinger ) {    
    global $pinger_data_file;    
    $xml = @new simpleXMLExtended('<?xml version="1.0" encoding="UTF-8" ' . 'standalone="yes"?>' . '<pinger_settings></pinger_settings>');
    $xml->addChild('Pinger_Message', NULL);
    $xml->Pinger_Message->addCData( $pinger['Pinger_Message'] );
    $xml->addChild('Nick', NULL);
    $xml->Nick->addCData( $pinger['Nick'] );
    $xml->addChild('Password', NULL);
    $xml->Password->addCData( $pinger['Password'] );
    $xml->addChild( 'Pinger_Shared', $pinger['Pinger_Shared'] );
    $xml->addChild( 'Pinger_Time', $pinger['Pinger_Time'] );
    $xml->addChild( 'Max_Hubs', $pinger['Max_Hubs'] );
    return $xml->asXML( $pinger_data_file );
}

//banned
$banned_data_file = GSDATAOTHERPATH . HUBLIST_DIR . 'banned_settings.xml';
//$banned_settings = banned_read_settings();
function banned_read_settings() {
    global $banned_data_file;
    if( file_exists( $banned_data_file ) ) {
        $data = getXML( $banned_data_file );
        $banned_settings['Banned_IP_Range'] = $data->Banned_IP_Range;
        $banned_settings['Banned_IP'] = $data->Banned_IP;
    } else {
        $banned_settings['Banned_IP_Range'] = null;
        $banned_settings['Banned_IP'] = null;
        banned_save_settings( $banned_settings );   
    }
    $banned_settings['site_root'] = '/';
    return $banned_settings;    
}

function banned_save_settings( $banned ) {
    global $banned_data_file;
    $xml = @new simpleXMLElement( '<banned_settings></banned_settings>' );
    $xml->addChild( 'Banned_IP_Range', $banned['Banned_IP_Range'] );
    $xml->addChild( 'Banned_IP', $banned['Banned_IP'] );
    return $xml->asXML( $banned_data_file );  
}

//hub creation
function hubString($length = 16) {
	$hstr = "";
	$characters = array_merge(range('a','z'), range('A','Z'), range('0','9'));
	$max = count($characters) - 1;
	for ($i = 0; $i < $length; $i++) {
		$rand = mt_rand(0, $max);
		$hstr .= $characters[$rand];
	}
	return $hstr;
}
$hubrand = hubString();

function hub_create( $settings ) {
global $hubrand;    
 $hub_file = GSDATAOTHERPATH . HUBLIST_DIR . HUBLIST_DATA_DIR . 'hub-'.$hubrand.'.xml'; 
	$xml = @new simpleXMLExtended('<?xml version="1.0" encoding="UTF-8" ' . 'standalone="yes"?>' . '<hub_settings></hub_settings>');
    $xml->addChild( 'fl', 'hub-'.$hubrand.'.xml' );
    $xml->addChild('Name', NULL);
    $xml->Name->addCData( $settings['Name'] );
    $xml->addChild('Topic', NULL);
    $xml->Topic->addCData( $settings['Topic'] );
    $xml->addChild('Description', NULL);
    $xml->Description->addCData( $settings['Description'] );
    $xml->addChild('Protocol', $settings['Protocol']);
    //$xml->Protocol->addCData( $settings['Protocol'] );
    $xml->addChild( 'Software', $settings['Software'] );
    $xml->addChild( 'Contact', $settings['Contact'] );
    $xml->addChild( 'Owner', $settings['Owner'] );
    $xml->addChild( 'Support', $settings['Support'] );
    $xml->addChild( 'Address', $settings['Address'] );
    $xml->addChild( 'Port', $settings['Port'] );
    $xml->addChild( 'Country', $settings['Country'] );
    $xml->addChild( 'Users', $settings['Users'] ); 
    $xml->addChild( 'Shared', $settings['Shared'] );
    $xml->addChild( 'User_limit', $settings['User_limit'] );
    $xml->addChild( 'Share_Limit', $settings['Share_Limit'] );
    $xml->addChild( 'Slot_Limit', $settings['Slot_Limit'] );
    $xml->addChild( 'Hub_Limit', $settings['Hub_Limit'] );
    $xml->addChild( 'Reliability', $settings['Reliability'] );
    $xml->addChild( 'Vote', $settings['Vote'] );
    $xml->addChild( 'Status', $settings['Status'] );
    $xml->addChild( 'Enabled', $settings['Enabled'] );
    $xml->addChild( 'Pinger', $settings['Pinger'] );
    $xml->addChild( 'Pinger_Count', $settings['Pinger_Count'] );
    $xml->addChild( 'Pinger_Failed', $settings['Pinger_Failed'] );
    $xml->addChild( 'X', $settings['X'] );
    $xml->addChild( 'User', $settings['User'] );
    $xml->addChild( 'adddate', $settings['adddate'] );
    $xml->addChild( 'Last_Ping', $settings['Last_Ping'] );
    return $xml->asXML( $hub_file );   
}

//edit hub
$hub = $_GET['hub'];
//$fl = basename($rs);
$hub_file = GSDATAOTHERPATH . HUBLIST_DIR . HUBLIST_DATA_DIR . $hub; 
//$hub_settings = hub_edit_read();

function hub_read() {   
    global $hub_file;    
    if( file_exists( $hub_file ) ) {        
        $data = getXML( $hub_file );
        $hub_settings['fl'] = $data->fl;
        $hub_settings['Name'] = $data->Name;
        $hub_settings['Topic'] = $data->Topic;
	$hub_settings['Description'] = $data->Description;
        $hub_settings['Protocol'] = $data->Protocol;
        $hub_settings['Software'] = $data->Software;
	$hub_settings['Contact'] = $data->Contact;
        $hub_settings['Owner'] = $data->Owner;
        $hub_settings['Support'] = $data->Support;
        $hub_settings['Address'] = $data->Address;
	$hub_settings['Port'] = $data->Port;
        $hub_settings['Country'] = $data->Country;
        $hub_settings['Users'] = $data->Users;
        $hub_settings['Shared'] = $data->Shared;
	$hub_settings['User_limit'] = $data->User_limit;
	$hub_settings['Share_Limit'] = $data->Share_Limit;
	$hub_settings['Slot_Limit'] = $data->Slot_Limit;
	$hub_settings['Hub_Limit'] = $data->Hub_Limit;
	$hub_settings['Reliability'] = $data->Reliability;
	$hub_settings['Vote'] = $data->Vote;
        $hub_settings['Status'] = $data->Status; 
        $hub_settings['Enabled'] = $data->Enabled;
        $hub_settings['Pinger'] = $data->Pinger; 
        $hub_settings['Pinger_Count'] = $data->Pinger_Count;
	$hub_settings['Pinger_Failed'] = $data->Pinger_Failed; 
        $hub_settings['X'] = $data->X;
        $hub_settings['User'] = $data->User; 
        $hub_settings['adddate'] = $data->adddate; 
        $hub_settings['Last_Ping'] = $data->Last_Ping; 		
    } else {
        $hub_settings['fl'] = null;
        $hub_settings['Name'] = null;
        $hub_settings['Topic'] = null;
	$hub_settings['Description'] = null;
        $hub_settings['Protocol'] = null;
        $hub_settings['Software'] = null;
	$hub_settings['Contact'] = null;
        $hub_settings['Owner'] = null;
        $hub_settings['Support'] = null;
        $hub_settings['Address'] = null;
	$hub_settings['Port'] = null;
        $hub_settings['Country'] = null;
        $hub_settings['Users'] = null;
        $hub_settings['Shared'] = null;
	$hub_settings['User_limit'] = null;
	$hub_settings['Share_Limit'] = null;
	$hub_settings['Slot_Limit'] = null;
	$hub_settings['Hub_Limit'] = null;
	$hub_settings['Reliability'] = null;
	$hub_settings['Vote'] = null;
        $hub_settings['Status'] = null; 
        $hub_settings['Enabled'] = null; 
        $hub_settings['Pinger'] = null; 
        $hub_settings['Pinger_Count'] = null;
	$hub_settings['Pinger_Failed'] = null; 	
        $hub_settings['X'] = null;
        $hub_settings['User'] = null;
        $hub_settings['adddate'] = null; 
        $hub_settings['Last_Ping'] = null;   
    }
    $hub_settings['site_root'] = '/';    
    return $hub_settings;    
}

//$idh = $hub_settings['fl'];
//$hub_file = GSDATAOTHERPATH . HUBLIST_DIR . HUBLIST_DATA_DIR . $idh; 
function hub_edit_save( $settings ) {
    global $hub_file;   
    $xml = @new simpleXMLExtended('<?xml version="1.0" encoding="UTF-8" ' . 'standalone="yes"?>' . '<hub_settings></hub_settings>');
    $xml->addChild( 'fl', $settings['fl'] );
    $xml->addChild('Name', NULL);
    $xml->Name->addCData( $settings['Name'] );
    $xml->addChild('Topic', NULL);
    $xml->Topic->addCData( $settings['Topic'] );
    $xml->addChild('Description', NULL);
    $xml->Description->addCData( $settings['Description'] );
    $xml->addChild('Protocol', $settings['Protocol']);
    //$xml->Protocol->addCData( $settings['Protocol'] );
    $xml->addChild( 'Software', $settings['Software'] );
    $xml->addChild( 'Contact', $settings['Contact'] );
    $xml->addChild( 'Owner', $settings['Owner'] );
    $xml->addChild( 'Support', $settings['Support'] );
    $xml->addChild( 'Address', $settings['Address'] );
    $xml->addChild( 'Port', $settings['Port'] );
    $xml->addChild( 'Country', $settings['Country'] );
    $xml->addChild( 'Users', $settings['Users'] ); 
    $xml->addChild( 'Shared', $settings['Shared'] );
    $xml->addChild( 'User_limit', $settings['User_limit'] );
    $xml->addChild( 'Share_Limit', $settings['Share_Limit'] );
    $xml->addChild( 'Slot_Limit', $settings['Slot_Limit'] );
    $xml->addChild( 'Hub_Limit', $settings['Hub_Limit'] );
    $xml->addChild( 'Reliability', $settings['Reliability'] );
    $xml->addChild( 'Vote', $settings['Vote'] );;
    $xml->addChild( 'Status', $settings['Status'] );
    $xml->addChild( 'Enabled', $settings['Enabled'] );
    $xml->addChild( 'Pinger', $settings['Pinger'] );
    $xml->addChild( 'Pinger_Count', $settings['Pinger_Count'] );
    $xml->addChild( 'Pinger_Failed', $settings['Pinger_Failed'] );
    $xml->addChild( 'X', $settings['X'] );
    $xml->addChild( 'User', $settings['User'] );
    $xml->addChild( 'adddate', $settings['adddate'] );
    $xml->addChild( 'Last_Ping', $settings['Last_Ping'] );
    return $xml->asXML( $hub_file );   
}