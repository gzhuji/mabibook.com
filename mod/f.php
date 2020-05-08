<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel=stylesheet type="text/css" href="css.css">
<title>洛奇捐款计算器 - 洛奇小册子</title>
<STYLE type=text/css>

BODY {
	FONT-SIZE: 12px; COLOR: #999999; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif
}




.style6 {
	font-size: 9px
}
</STYLE>
<script language="javascript" type="text/javascript">

function   formatNum(num)
{   
    if(!/^(\+|-)?(\d+)(\.\d+)?$/.test(num)){alert("wrong!");   return   num;}   
    var   a   =   RegExp.$1,   b   =   RegExp.$2,   c   =   RegExp.$3;   
    var   re   =   new   RegExp().compile("(\\d)(\\d{3})(,|$)");   
    while(re.test(b))   b   =   b.replace(re,   "$1,$2$3");   
    return   a   +""+   b   +""+   c;   
}




</script>

</head>

<body topmargin="0" leftmargin="0" background="bg_out.gif">



 <br> <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="960" height="100%">
    <tr>
      <td width="40" rowspan="3">　</td>
      <td width="920" bgcolor="#FFFFFF" height="80" style="border:#ccc solid 1px;">
<?php
include("noticeg.html");

 $myurl="https://www.okcoin.cn/api/v1/ticker.do?symbol=ltc_cny";

  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $myurl);
  curl_setopt($ch, CURLOPT_TIMEOUT, 5);
  curl_setopt($ch, CURLOPT_USERAGENT, _USERAGENT_);
  curl_setopt($ch, CURLOPT_REFERER,_REFERER_);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  $data = curl_exec($ch);
  curl_close($ch);

  echo  $data;

?>
</td>
  </tr>
    <tr>
      <td bgcolor="#FFFFFF" height="1">&nbsp;</td>
   </tr>

    <tr>
      <td width="920" valign="top">
<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="920" height="100%">
  <tr>
    <br><td width="140" align="center" valign="top" bgcolor="#eeeeee" rowspan="3">
<span style="text-align:center;">
<?php
include("../menu.html")
?>
</span>
<?php
include("menu.txt")
?>
</td>
  </tr>
  <tr>
    <td width="780" height="700" valign="top">
<div align="center">
  <center>
  <table border="0" cellpadding="2" cellspacing="2" style="border-collapse: collapse" bordercolor="#111111" width="760" height="100%">
  <tr>
    <td width="795" valign="top">

<?php
include("forgodp.html")
?>
 <center><br>
<?php
include("down.txt")
?>
<?php
include("footall.html")
?><br> </center>
    </td>
  </tr>
 </table>
 </center>
</div>    </td>
  </tr>

</table>  </td>
    </tr>
  </table> 
<span id=toptag></span>

</body>

</html>

<script type="text/javascript" src="menu.js"></script>
<?php
require_once 'enchtml.func.php';
ob_start();
?>

<script type="text/javascript" src="cal.js"></script>

<?php
$htmlstr = ob_get_contents();
ob_end_clean();
outhtml($htmlstr);
?>