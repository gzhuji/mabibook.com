<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
<META http-equiv=Content-Type content="text/html; charset=utf-8">
<TITLE>MabiBook</TITLE>
<META content="A Fan site of Mabinogi" name=description>
<META content="mabibook,mabinogi" name=keywords>
<link rel="stylesheet" type="text/css" media="all" href="../images/main.css"/>
</HEAD>

<SCRIPT language=JavaScript type=text/JavaScript>
<!--

//时间校正
Now = new Date();
ServerTime = 18 * 360 + 37 * 60 + 23;
ClientTime = (Now.getHours()+Math.floor(Now.getTimezoneOffset()/60)+8)*360 + (Now.getMinutes()+Math.floor(Now.getTimezoneOffset()%60))*60 + Now.getSeconds();
DifferenceTime = (ServerTime-ClientTime)*1000;
if (DifferenceTime >= 82800) {DifferenceTime -= 86400;}
if (DifferenceTime <=-82800) {DifferenceTime += 86400;}
MabiServerTime = -64 * 1500;	
DifferenceTime += MabiServerTime;
DifferenceTime = 0;




//设定颜色
var color1 = "#336699";		/*城镇*/
var color2 = "#336699";		/*原野*/
var color3 = "#336699";		/*地下城*/
var color4 = "#336699";		/*商人城镇地图*/
var color5 = "#336699";		/*商人原野地图*/

var Moongate = new Array(24);

Moongate[0] = "Tir Chonaill".fontcolor(color2);
Moongate[1] = "Taillteann".fontcolor(color3);
Moongate[2] = "Emain Macha".fontcolor(color1);
Moongate[3] = "Tara".fontcolor(color1);
Moongate[4] = "Dunbarton".fontcolor(color1);
Moongate[5] = "Port of Ceann".fontcolor(color1);
Moongate[6] = "Bangor".fontcolor(color1);
Moongate[7] = "Emain Macha".fontcolor(color3);
Moongate[8] = "Tara".fontcolor(color1);
Moongate[9] = "Tir Chonaill".fontcolor(color1);
Moongate[10] = "Taillteann".fontcolor(color2);
Moongate[11] = "Ceo Island".fontcolor(color3);
Moongate[12] = "Emain Macha".fontcolor(color3);
Moongate[13] = "Tara".fontcolor(color2);
Moongate[14] = "Bangor".fontcolor(color2);
Moongate[15] = "Dunbarton".fontcolor(color1);
Moongate[16] = "Port of Ceann".fontcolor(color1);
Moongate[17] = "Tara".fontcolor(color3);
Moongate[18] = "Taillteann".fontcolor(color3);
Moongate[19] = "Tir Chonaill".fontcolor(color3);
Moongate[20] = "Dunbarton".fontcolor(color3);
Moongate[21] = "Bangor".fontcolor(color3);
Moongate[22] = "Tara".fontcolor(color1);
Moongate[23] = "Ceo Island".fontcolor(color1);


//设定流浪商人顺序
var Business = new Array(14);

Business[0] = "Dragon Ruins East".fontcolor(color5);
Business[1] = "Bangor Bar".fontcolor(color4);
Business[2] = "Dunbarton School Stairway".fontcolor(color4);
Business[3] = "Dugald Aisle Logging Camp Hut".fontcolor(color5);
Business[4] = "Outside Tir Chonaill Inn".fontcolor(color4);
Business[5] = "Dugald Aisle Logging Camp Hut".fontcolor(color5);
Business[6] = "Dunbarton East Potato Field".fontcolor(color4);
Business[7] = "Dragon Ruins East".fontcolor(color5);
Business[8] = "Bangor Bar".fontcolor(color4);
Business[9] = "Sen Mag West".fontcolor(color5);
Business[10] = "Emain Macha Weapon Shop".fontcolor(color4);
Business[11] = "Ceo island".fontcolor(color5);
Business[12] = "Emain Macha Island".fontcolor(color4);
Business[13] = "Sen Mag West".fontcolor(color5);

//露雅上班时间
var Rua = "0010010110111000000010100100010001001000100";



function NowWatch() {
	//取得使用者系统时间
	var Now = new Date();
	//取得台北时间(+8)
	var TaipeiTime = Now.getTime();
	//爱尔琳时间校正(Day+14 Hour-16)
	var ErinnTime = TaipeiTime + (8*60*60*1000) + DifferenceTime;
	//取得爱尔琳时间
	var ErinnSeason = Math.floor((ErinnTime % (7*40*24*60*1.5*1000) / (40*24*60*1.5*1000)) + 4) % 7;
	var ErinnDay = Math.floor(ErinnTime % (40*24*60*1.5*1000) / (24*60*1.5*1000)) + 1;
	var ErinnHour = Math.floor((ErinnTime % (24*60*1.5*1000)) / (60*1.5*1000));
	var ErinnMinute = Math.floor((ErinnTime % (60*1.5*1000)) / (1.5*1000));
	if ( ErinnSeason == 0 )   {ErinnSeason = "";}
	if ( ErinnSeason == 1 )   {ErinnSeason = "";}
	if ( ErinnSeason == 2 )   {ErinnSeason = "";}
	if ( ErinnSeason == 3 )   {ErinnSeason = "";}
	if ( ErinnSeason == 4 )   {ErinnSeason = "";}
	if ( ErinnSeason == 5 )   {ErinnSeason = "";}
	if ( ErinnSeason == 6 )   {ErinnSeason = "";}
	if ( ErinnHour < 10 )   {ErinnHour = "0" + ErinnHour;}
	if ( ErinnMinute < 10 ) {ErinnMinute = "0" + ErinnMinute;}
	//取得艾维卡时间
	var MoonTime = ErinnTime + (90000 * 6);
	var MoonDay = Math.floor(MoonTime % (Moongate.length*24*60*1.5*1000) / (24*60*1.5*1000));
	var MoonHour = Math.floor((MoonTime % (24*60*1.5*1000)) / (60*1.5*1000));
	var MoonMinute = Math.floor((MoonTime % (60*1.5*1000)) / (1.5*1000));
	//取得露雅时间
	var RuaDay = Math.floor(MoonTime % (43*24*60*1.5*1000) / (24*60*1.5*1000));
	//取得流浪商人时间
	var BunsDay = Math.floor(ErinnTime % (14*24*60*1.5*1000) / (24*60*1.5*1000));

	//基本显示格式
	NormalPrint = "Now Mabinogi Time is  <font color=ff0000>" + ErinnHour + ":" + ErinnMinute + "</font>&nbsp;&nbsp;"
	//输出资料
	 {
		if ( MoonHour * 60 + MoonMinute <= 720 )   {
			NormalPrint = (NormalPrint + "<br><br>&nbsp;MoonGate to " + Moongate[MoonDay%Moongate.length] + "　next to " + Moongate[(MoonDay+1)%Moongate.length]);}
			
			
		else   {
			NormalPrint = (NormalPrint + "<br><br>&nbsp;MoonGate will to " + Moongate[(MoonDay+1)%Moongate.length] + "　next to " + Moongate[(MoonDay+2)%Moongate.length]);}
			  {
		NormalPrint = (NormalPrint + "<br><br>&nbsp;Price " + Business[BunsDay]);}
	}
	
	{
		if ( MoonHour * 60 + MoonMinute <= 720 )   {
			NormalPrint = (NormalPrint + "&nbsp;&nbsp;&nbsp;Rua" + (Test(Rua.substr(RuaDay%43,1))?" in".fontcolor("#66CCFF"):" rest".fontcolor("CCCCCC")) + "　next " + (Test(Rua.substr((RuaDay%43)+1,1))?" in".fontcolor("#66CCFF"):" rest".fontcolor("CCCCCC")) + "　next" + (Test(Rua.substr((RuaDay%43)+2,1))?" in".fontcolor("#66CCFF"):" rest".fontcolor("CCCCCC"))+ErinnSeason);}
		else   {
			NormalPrint = (NormalPrint + "&nbsp;&nbsp;&nbsp;Ruya will" + (Test(Rua.substr((RuaDay%43)+1,1))?" in".fontcolor("#66CCFF"):" rest".fontcolor("CCCCCC")) + "　next" + (Test(Rua.substr((RuaDay%43)+2,1))?" in".fontcolor("#66CCFF"):" rest".fontcolor("CCCCCC")) + "　next" + (Test(Rua.substr((RuaDay%43)+3,1))?" in".fontcolor("#66CCFF"):" rest".fontcolor("CCCCCC"))+ErinnSeason );}
	}
	
	
	document.getElementById('mgbclock').innerHTML = NormalPrint;



	setTimeout("NowWatch()",250);
}



function Test(Num){
	if (Num==1)   {
		return true;}
	else  {
		return false;}
}

//-->
</SCRIPT>

<BODY leftMargin=0 topMargin=0 marginheight="0" marginwidth="0" onload=NowWatch()>
<DIV align=center>
<TABLE height="100%" cellSpacing=0 cellPadding=0 width="100%" border=0>
  <TBODY>
  <TR>
    <TD>
      <DIV align=center>
      <P class="style4"><br><a href="http://v.youku.com/v_show/id_XMTg3MDgyMDE2.html" target=_blank class="style4">Enjoy Your Own Fantasy Life~</a><br>

      </P>
        <TABLE cellSpacing=0 cellPadding=5 width="100%" border=0>
        <TBODY>
        <TR>
          <TD style="BORDER-RIGHT: #ddd 1px solid" vAlign=top align=right width="50%"><TABLE cellSpacing=0 cellPadding=5 width="375" border=0>
            <TBODY>
              <TR>
                <TD vAlign=top align=left colSpan=2 style="padding-top:10px;">
  <div align="center">
                   <script language=JavaScript src="/Scripts/show.js"></script>
 &nbsp;<BR>
                      <BR>

 	                     <table width="250" border="0">
                           <tr>
                             <td height="56" colspan="3"><p> Welcome to mabibook ....</p>                               </td>
                             </tr>
                           <tr>
                             <td width="9">&nbsp;</td>
                             <td width="132"><a href="/" class="style4">Mabibook.com</a><br>
                               <a href="/tw" class="style4">Mabibook.com/tw</a><br>
                               <a href="/en" class="style4">Mabibook.com/en</a><br></td>
                             <td width="95"><a href="/" class="style4">洛奇小册子</a><br>
                               <a href="/tw" class="style4">瑪奇小冊子</a><br>
                               <a href="/en" class="style4">Mabibook </a><br></td>
                           </tr>
                         </table>
 	                    <br>
 
                         <BR></center>
                            <?php
include("../offical.html")
?>  
     
                    <!--SpamDrain information--></TD>
              </TR>
            </TBODY>
          </TABLE><br><br></TD>
          <TD vAlign=top align=left width="59%"><TABLE width="100%" border=0 align="center" cellPadding=5 cellSpacing=0>
              <TBODY>
              <TR>
                <TD vAlign=top align=left colSpan=2 style="padding-top:0px;">
                <?php
include("head.html")
?>
                <BR>

                <br>
                  <!--SpamDrain information-->
<?php
include("tool.html")
?>
<br>

<?php
include("house.php")
?>
<br>
<?php
include("game.html")
?>
<br>


<?php
include("../link.html")
?>
<br>
<?php
include("linkend.html")
?>  

<br>  
          </TD>
              </TR></TBODY></TABLE></TD></TR></TBODY></TABLE></DIV></TD></TR></TBODY></TABLE>
</DIV>
</BODY></HTML>
