<?php



function MABI_VCHAT_GET_FILETAG( $path )
{
	$value = file_get_contents($path);
	
	$valhex = bin2hex($value);
	$valsp = split("0000", $valhex);
	
	foreach ($valsp as $val) {
		$valtxt = pack("H*", $val);
		
		if (preg_match("/zTXt/", $valtxt)) {
			$nextname = substr($valtxt, 6);
			if ($nextname == "author") $nextstep = 1;
			if ($nextname == "authid") $nextstep = 2;
			$nextdata = "";
		} else if ($nextstep == 1) {
			$nextstep = 2;
			$nextdata = $val."0000";
		} else if ($nextstep == 2) {
			$valzlib = pack("H*", $nextdata.$val);
			$result[$nextname] = gzuncompress($valzlib);
			
			$nextname = "";
			$nextstep = 0;
		}
	}
	
	return $result;
}

?>