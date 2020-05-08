<?php

/*
	[DISCUZ!] enchtml.func.php - Encrypt html script functions

	Version: 1.0.0
	Author: mfboy(lzh-0808@163.com)
	Copyright: For author
	Last Modified: 2006-2-3
*/

function outhtml($string) {

	$html = "";

	$html .= "<script language=\"JavaScript\"><!--\r\n";
	$html .= "function killErrors() {\r\nreturn true;\r\n}\r\n";
	$html .= "window.onerror = killErrors;\r\n//-->\r\n</script>\r\n\r\n";
	$html .= "<script language=\"JavaScript\"><!--\r\n";
	$html .= "var str = \"" . enchtml($string) . "\";\r\n";

	$html .= "str = str.replace(/%3C/g, \"<\");\r\nstr = str.replace(/%3E/g, \">\");\r\n";
	$html .= "str = str.replace(/%2C/g, \",\");\r\nstr = str.replace(/%3F/g, \"?\");\r\n";
	$html .= "str = str.replace(/%3B/g, \";\");\r\nstr = str.replace(/%3A/g, \":\");\r\n";
	$html .= "str = str.replace(/%27/g, \"'\");\r\nstr = str.replace(/%22/g, \"\\\"\");\r\n";
	$html .= "str = str.replace(/%7B/g, \"{\");\r\nstr = str.replace(/%7D/g, \"}\");\r\n";
	$html .= "str = str.replace(/%5B/g, \"[\");\r\nstr = str.replace(/%5D/g, \"]\");\r\n";
	$html .= "str = str.replace(/%60/g, \"`\");\r\nstr = str.replace(/%7E/g, \"~\");\r\n";
	$html .= "str = str.replace(/%21/g, \"!\");\r\nstr = str.replace(/%23/g, \"#\");\r\n";
	$html .= "str = str.replace(/%24/g, \"$\");\r\nstr = str.replace(/%26/g, \"&\");\r\n";
	$html .= "str = str.replace(/%28/g, \"(\");\r\nstr = str.replace(/%29/g, \")\");\r\n";
	$html .= "str = str.replace(/%3D/g, \"=\");\r\nstr = str.replace(/%5C/g, \"\\\\\");\r\n";
	$html .= "str = str.replace(/%7C/g, \"|\");\r\nstr = str.replace(/%20/g, \" \");\r\n";
	$html .= "document.write(str);\r\n//--></script>";
	

	
	die($html);

}

function enchtml($string) {


	$string = str_replace("<", "%3C", $string);
	$string = str_replace(">", "%3E", $string);
	$string = str_replace(",", "%2C", $string);
	$string = str_replace("?", "%3F", $string);
	$string = str_replace(";", "%3B", $string);
	$string = str_replace(":", "%3A", $string);
	$string = str_replace("'", "%27", $string);
	$string = str_replace("\"", "%22", $string);
	$string = str_replace("{", "%7B", $string);
	$string = str_replace("}", "%7D", $string);
	$string = str_replace("[", "%5B", $string);
	$string = str_replace("]", "%5D", $string);
	$string = str_replace("`", "%60", $string);
	$string = str_replace("~", "%7E", $string);
	$string = str_replace("!", "%21", $string);
	$string = str_replace("#", "%23", $string);
	$string = str_replace("$", "%24", $string);
	$string = str_replace("&", "%26", $string);
	$string = str_replace("(", "%28", $string);
	$string = str_replace(")", "%29", $string);
	$string = str_replace("=", "%3D", $string);
	$string = str_replace("\\", "%5C", $string);
	$string = str_replace("|", "%7C", $string);
	$string = str_replace(" ", "%20", $string);
	$string = str_replace("\n", "", $string);
	$string = str_replace("\r", "\";\r\nstr += \"", $string);
	
	return $string;

}

?>