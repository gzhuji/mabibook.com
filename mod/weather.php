<html>
<head>
<meta http-equiv="Content-Language" content="zh-cn">
<meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=gb2312">
<title></title>
</head>
<body>
<form name=loading>
<P align=center><FONT face=Arial color=#0066ff size=2>loading...</FONT> <INPUT
style="PADDING-RIGHT: 0px; PADDING-LEFT: 0px; FONT-WEIGHT: bolder; PADDING-BOTTOM: 0px; COLOR: #0066ff; BORDER-TOP-style: none; PADDING-TOP: 0px; FONT-FAMILY: Arial; BORDER-RIGHT-style: none; BORDER-LEFT-style: none; BACKGROUND-COLOR: white; BORDER-BOTTOM-style: none"
size=20 name=chart> <BR><INPUT
style="BORDER-RIGHT: medium none; BORDER-TOP: medium none; BORDER-LEFT: medium none; COLOR: #0066ff; BORDER-BOTTOM: medium none; TEXT-ALIGN: center"
size=16 name=percent>
<SCRIPT>
var bar=0
var line="||"
var amount="||"
count()
function count(){
bar=bar+10
amount =amount + line
document.loading.chart.value=amount
document.loading.percent.value=bar+"%"
if (bar<99)
{setTimeout("count()",100);}
else
{window.location = "http://mabinogi.fws.tw/weather.php";}
}</SCRIPT>
</P></form>
</body>
</html>