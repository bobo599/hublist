<?php
       
	$c = new NMDCClient();
	$c->nick = "test pinger please be patient!";
	
	$h = new NMDCHub();
	$h->address = $_GET['address'];
	$h->port = $_GET['port'];
	
	login($h, $c);

	class NMDCClient 
	{
		var $nick;
	}

	class NMDCHub 
	{
		var $address;
		var $port;
	}
	
	function login(&$NMDCHub, &$NMDCClient) 
	{
		
		$handle = @fsockopen("tcp://" . $NMDCHub->address, $NMDCHub->port);
		echo "trying to connect to: " . $NMDCHub->address . ":" . $NMDCHub->port;
		if ($handle) 
		{
			echo "connected.";
			$message = fgets($handle, 1024);
			
			$message = substr($message, 6, -1);
			echo $message;
			fwrite($handle, "$Key " . lock2key($message) . "|$ValidateNick " . $NMDCClient->nick . "|");
			$message = fgets($handle, 1024);
			echo $message;
			fwrite($handle, "$Version 1.0091|$MyINFO $ALL " . $NMDCClient->nick . " <description>$ $<connection><flag>$<e-mail>$<sharesize>$|$GetNickList|");
			$message = fgets($handle, 1024);
			echo $message;
			

		}
	}
	
	function lock2key($_LOCK) 
	{
		$pk = stristr ($_LOCK, 'Pk=');
		$_LOCK = str_replace ($pk, '', $_LOCK);
		//$_LOCK = substr ($_LOCK, 0, -1);
		$lockLength = strlen ($_LOCK);
		$h = ord($_LOCK{0}) ^ ord( $_LOCK{ $lockLength - 1} ) ^ ord( $_LOCK{ $lockLength - 2} ) ^ 5;
	
		while ($h > 255) {$h = $h - 256;}
	
			$h = (($h<<4) & 240) | (($h>>4) & 15);
			$a = $h;
		
			if ($a == '126' or // '~'
				$a == '124' or // '|'
				$a == '96' or  // '`'
				$a == '36' or  // '$'
				$a == '5' or   // '^E'
				$a == '0')     // NUL
			{
		  		$LockToKey = "/%DCN";
	
		  		if ($a < 100)
					$LockToKey .="0";
		  		if ($a < 10)
					$LockToKey .="0";
		  		$LockToKey .= $a; // As a string integer
		  		$LockToKey .= "%/";	
			} 
			else 
			{
		  		$LockToKey = chr ($a);  // No transformation.
			}
	
	   		for ($j = 1; $j < strlen($_LOCK); $j++) {
		  		$h = ord($_LOCK{$j}) ^ ord($_LOCK{$j-1});
	
	   			while ($h > 255) {$h = $h - 256;}
	
		  			$h = (($h<<4) & 240) | (($h>>4) & 15);
		  			$a = $h;
		
					if ($a == '126' or // '~'
						$a == '124' or // '|'
						$a == '96' or  // '`'
						$a == '36' or  // '$'
						$a == '5' or   // '^E'
						$a == '0')     // NUL
					{
		  				$LockToKey .= "/%DCN";
	
		  				if ($a < 100)
							$LockToKey .="0";
		  				if ($a < 10)
							$LockToKey .="0";
		  					$LockToKey .= $a; // As a string integer
		  					$LockToKey .= "%/";	
						} 
						else {
		  					$LockToKey .= chr ($a);  // No transformation.
					}
	   			}
	
	   		return $LockToKey;
		}
	
	$data = login();
		echo $data;
