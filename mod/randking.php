<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<META http-equiv=Content-Type content="text/html; charset=utf-8">
<HTML><HEAD><TITLE>洛奇摸蛋开箱模拟器 - 洛奇小册子</TITLE>
<link rel=stylesheet type="text/css" href="cssrand.css">

<STYLE type=text/css>

BODY {
	BACKGROUND-COLOR: #7b0410
}
TD {
	FONT-SIZE: 12px; COLOR: #ccc
}
.1 {
	PADDING-RIGHT: 3px; PADDING-LEFT: 3px; PADDING-BOTTOM: 3px; PADDING-TOP: 3px
}
.2 {
	PADDING-RIGHT: 10px; PADDING-LEFT: 10px; PADDING-BOTTOM: 10px; PADDING-TOP: 10px
}
INPUT.num {
	BORDER-RIGHT: 0px;
	BORDER-TOP: 0px;
	FONT-SIZE: 12px;
	OVERFLOW-X: visible;
	BORDER-LEFT: 0px;
	WIDTH: 2em;
	COLOR: #fff;
	BORDER-BOTTOM: 0px;
	BACKGROUND-COLOR: #268cb6;
	TEXT-ALIGN: center
}
.w1 {
	BORDER-RIGHT: #000 1px solid; BORDER-TOP: #000 0px solid; BORDER-LEFT: #000 0px solid; BORDER-BOTTOM: #000 1px solid
}
.w2 {
	BORDER-RIGHT: #000 1px solid; BORDER-TOP: #000 1px solid; BORDER-LEFT: #000 1px solid; BORDER-BOTTOM: #000 1px solid
}
.w3 {
	BORDER-RIGHT: #4c94d0 1px solid; BORDER-TOP: #3a84c0 1px solid; BORDER-LEFT: #3a84c0 1px solid; BORDER-BOTTOM: #4c94d0 1px solid
}
.w4 {
	BORDER-RIGHT: #268cb6 1px solid; BORDER-TOP: #73e7e7 1px solid; BORDER-LEFT: #268cb6 1px solid; BORDER-BOTTOM: #58b1ed 1px solid
}
.w5 {
	BORDER-RIGHT: #268cb6 1px solid; BORDER-TOP: #268cb6 1px solid; BORDER-LEFT: #268cb6 1px solid; BORDER-BOTTOM: #4891ce 1px solid
}
.w6 {
	BORDER-RIGHT: #4891ce 0px solid; BORDER-TOP: #4891ce 0px solid; BORDER-LEFT: #4891ce 0px solid; BORDER-BOTTOM: #4891ce 1px solid; BACKGROUND-COLOR: #268cb6
}
.space {
	PADDING-RIGHT: 5px; PADDING-LEFT: 5px; PADDING-BOTTOM: 5px; PADDING-TOP: 5px
}
.fieldout {
	BORDER-RIGHT: #0573a1 1px solid; BORDER-TOP: #0573a1 1px solid; BORDER-LEFT: #0573a1 1px solid; BORDER-BOTTOM: #0573a1 1px solid
}
.fieldin {
	BORDER-RIGHT: #026493 0px solid; BORDER-TOP: #026493 1px solid; BORDER-LEFT: #026493 1px solid; BORDER-BOTTOM: #026493 0px solid
}
.button {
	BORDER-LEFT-COLOR: #026494; BORDER-BOTTOM-COLOR: #021a49; COLOR: #fff; BORDER-TOP-COLOR: #026494; BACKGROUND-COLOR: #1583b3; BORDER-RIGHT-COLOR: #021a49
}
.chatfieldout {
	BORDER-RIGHT: #082a6a 1px solid; BORDER-TOP: #084785 1px solid; BORDER-LEFT: #084785 1px solid; BORDER-BOTTOM: #082a6a 1px solid
}
.chatfieldin {
	BORDER-RIGHT: #083976 0px solid; BORDER-TOP: #083976 1px solid; BORDER-LEFT: #083976 1px solid; BORDER-BOTTOM: #083976 0px solid; BACKGROUND-COLOR: #2c75b2
}
.chat {
	BORDER-RIGHT: 0px; BORDER-TOP: 0px; FONT-SIZE: 12px; BORDER-LEFT: 0px; COLOR: #fff; BORDER-BOTTOM: 0px; BACKGROUND-COLOR: #2c75b2
}
.chatlog {
	PADDING-RIGHT: 3px; OVERFLOW-Y: scroll; PADDING-LEFT: 3px; FONT-SIZE: 12px; PADDING-BOTTOM: 3px; COLOR: #ff8080; PADDING-TOP: 3px; SCROLLBAR-BASE-COLOR: #268cb6; HEIGHT: 25em
}
.option {
	FONT-SIZE: 12px; COLOR: #ccc
}
</STYLE>



<SCRIPT language=JavaScript>

log = new Array();

point = 0;
donate = 0;

Simon_Count= 0;
Alexina_Count = 0;
Osla_Count = 0;
Malcolm_Count = 0;

function box_open(box_name) {

	if (point > 0 || document.randombox.narikin.checked) {

		if (box_name == 0) {
			box = Simon;
			Simon_Count+=1;
			document.randombox.Simon_Count.value = Simon_Count;
		} else if (box_name == 1) {
			box = Alexina;
			Alexina_Count+=1;
			document.randombox.Alexina_Count.value = Alexina_Count;
		} else if (box_name == 2) {
			box = Osla;
			Osla_Count+=1;
			document.randombox.Osla_Count.value = Osla_Count;
		} else if (box_name == 3) {
			box = Malcolm;
			Malcolm_Count+=1;
			document.randombox.Malcolm_Count.value = Malcolm_Count;
		}
		
		if (document.randombox.narikin.checked) {
		
		if (box_name == 0){
		
			donate += 50;
			document.randombox.donate.value = donate;
		}
		else if (box_name == 1){
		
			donate += 20;
			document.randombox.donate.value = donate;
		}
		else if (box_name == 2){
		
			donate += 10;
			document.randombox.donate.value = donate;
		}
		else if (box_name == 3){
		
			donate += 5;
			document.randombox.donate.value = donate;
		}

		} else if (box_name == 0){
		
			point -= 50;
			document.randombox.point.value = point;
		}
		else if (box_name == 1){
		
			point -= 20;
			document.randombox.point.value = point;
		}
		else if (box_name == 2){
		
			point -= 10;
			document.randombox.point.value = point;
		}
		else if (box_name == 3){
		
			point -= 5;
			document.randombox.point.value = point;
		}

		output_log = "";
		var rand = Math.floor(Math.random() * box.length);
		var w = "&lt;SYSTEM&gt; :  得到物品 [" + box[rand][0] + "]";
		if (box[rand][1] != "") w = w + "　<SPAN class='option'>(" + box[rand][1] + ")</SPAN>";
		log.unshift(w);

		for (i=0; i<log.length; i++) {
			output_log = output_log + log[i] + "<BR>";
		}
		document.getElementById('log').innerHTML = output_log;
		
	} else {
		if (! document.randombox.nao.checked) alert("没有点啦~")
	}
}

function buy_point() {
	if (! document.randombox.nao.checked) alert("充值成功~")
	if (document.randombox.value[0].checked) {point += 10;  donate += 10;}
	if (document.randombox.value[1].checked) {point += 100; donate += 100;}
	if (document.randombox.value[2].checked) {point += 400; donate += 400;}
	if (document.randombox.value[3].checked) {point += 1000;donate += 1000;}
	
	document.randombox.point.value = point;
	document.randombox.donate.value = donate;
}

function chat_enter(){
	if (document.chatwindow.chat.value == "魔法球") {box_open(0);}
	else if (document.chatwindow.chat.value == "七周年") {box_open(1);}
	else if (document.chatwindow.chat.value == "克鲁贞") {box_open(2);}
	else if (document.chatwindow.chat.value == "大杂烩") {box_open(3);}
	return false;
}

function reset_button(num) {
	if (num == 1) {
		point = 0;
		donate = 0;
		Simon_Count= 0;
		Alexina_Count = 0;
		Osla_Count = 0;
		Malcolm_Count = 0;
		log = new Array();
		document.getElementById('log').innerHTML = "";
		document.randombox.point.value = point;
		document.randombox.donate.value = donate;
		document.randombox.Simon_Count.value = Simon_Count;
		document.randombox.Alexina_Count.value = Alexina_Count;
		document.randombox.Osla_Count.value = Osla_Count;
		document.randombox.Malcolm_Count.value = Malcolm_Count;
	} else {
		log = new Array();
		document.getElementById('log').innerHTML = "";
	}
}

</SCRIPT>


<META content="MSHTML 6.00.2900.5848" name=GENERATOR></HEAD>
<BODY>
<TABLE height="100%" width="100%" bgColor=#4b97c2>
  <TBODY>
  <TR>
    <TD class=1 bgColor=#9bc7df>
      <TABLE height="100%" width="100%" bgColor=#ffffff>
        <TBODY>
        <TR>
          <TD class=2 vAlign=top>
           
            <TABLE align="center" cellPadding=10 cellSpacing=0>
              <TBODY>
              <TR>
                <TD vAlign=top><?php
include("../menu.html")
?>                  </TD>
                <TD vAlign=top><FORM name=randombox onSubmit="chat_enter(); return false">
                  <DIV class=w1>
                  <DIV class=w2>
                  <DIV class=w3>
                  <DIV class=w4>
                  <DIV class=w5>
                  <DIV class=w6>
                  <TABLE cellSpacing=0 cellPadding=0 width="100%">
                    <TBODY>
                    <TR>
                      <TD>
                        <TABLE cellSpacing=0 cellPadding=0>
                          <TBODY>
                          <TR>
                            <TD><IMG style="MARGIN-RIGHT: 3px" height=23 
                              src="images/shop.gif" width=22 
                            border=0></TD>
                            <TD><FONT size=-2>Buy Point</FONT><BR>游戏点数购买</TD></TR></TBODY></TABLE></TD></TR>
                    <TR>
                      <TD 
                      style="PADDING-RIGHT: 5px; PADDING-LEFT: 5px; PADDING-BOTTOM: 5px; PADDING-TOP: 5px">购买数量 

                        <DIV class=fieldout>
                        <DIV class=fieldin 
                        style="PADDING-RIGHT: 3px; PADDING-LEFT: 3px; PADDING-BOTTOM: 3px; PADDING-TOP: 3px">
<DIV onMouseOver="style.background='#036393'" style="CURSOR: pointer" onClick="document.randombox.value[0].checked=true" onMouseOut="style.background=''">
                        <INPUT type=radio CHECKED name=value>10点</DIV>
<DIV onMouseOver="style.background='#036393'"  style="CURSOR: pointer" onClick="document.randombox.value[1].checked=true" onMouseOut="style.background=''">
<INPUT type=radio name=value>100点</DIV>
<DIV onMouseOver="style.background='#036393'" style="CURSOR: pointer" onClick="document.randombox.value[2].checked=true" onMouseOut="style.background=''">
                        <INPUT type=radio name=value>400点</DIV>
                        <DIV onMouseOver="style.background='#036393'" style="CURSOR: pointer" onClick="document.randombox.value[3].checked=true" onMouseOut="style.background=''">
                        <INPUT type=radio name=value>1000点</DIV></DIV></DIV></TD></TR></TBODY></TABLE>
                        <INPUT class=button style="MARGIN: 3px" onclick=buy_point(); type=button value=买入></DIV></DIV></DIV></DIV></DIV></DIV>
                  <DIV class=space></DIV>
                  <DIV class=w1>
                  <DIV class=w2>
                  <DIV class=w3>
                  <DIV class=w4>
                  <DIV class=w5>
                  <DIV class=w6>
                  <TABLE cellSpacing=0 cellPadding=0 width="100%">
                    <TBODY>
                    <TR>
                      <TD>
                        <TABLE cellSpacing=0 cellPadding=0>
                          <TBODY>
                          <TR>
                            <TD><IMG style="MARGIN-RIGHT: 3px" height=23 
                              src="images/Message.gif" width=24 
                              border=0></TD>
                            <TD><FONT 
                          size=-2>Infomation</FONT><BR>当前点数</TD></TR></TBODY></TABLE></TD></TR>
                    <TR>
                      <TD 
                      style="PADDING-RIGHT: 5px; PADDING-LEFT: 5px; PADDING-BOTTOM: 5px; PADDING-TOP: 5px" 
                      align=middle>
                        <DIV class=fieldout>
<DIV class=fieldin style="PADDING-RIGHT: 3px; PADDING-LEFT: 3px; PADDING-BOTTOM: 3px; PADDING-TOP: 3px">剩余点数<BR>
<INPUT class=num id=point style="FONT-WEIGHT: bold; WIDTH: 7em" readOnly value=0><BR>消费点数<BR>
<INPUT class=num id=donate style="FONT-WEIGHT: bold; WIDTH: 7em" readOnly value=0></DIV></DIV></TD></TR></TBODY></TABLE></DIV></DIV></DIV></DIV></DIV></DIV>
                  <DIV class=space></DIV>
                  <DIV class=w1>
                  <DIV class=w2>
                  <DIV class=w3>
                  <DIV class=w4>
                  <DIV class=w5>
                  <DIV class=w6>
                  <TABLE cellSpacing=0 cellPadding=0 width="100%">
                    <TBODY>
                    <TR>
                      <TD>
                        <TABLE cellSpacing=0 cellPadding=0>
                          <TBODY>
                          <TR>
                            <TD><IMG style="MARGIN-RIGHT: 3px" height=24 
                              src="images/inventory.gif" width=24 
                              border=0></TD>
                            <TD><FONT 
                          size=-2>Inventory</FONT><BR>摸蛋开箱</TD></TR></TBODY></TABLE></TD></TR>
                    <TR>
                      <TD 
                      style="PADDING-RIGHT: 5px; PADDING-LEFT: 5px; PADDING-BOTTOM: 5px; PADDING-TOP: 5px">
                        <DIV class=fieldout>
                        <DIV class=fieldin 
                        style="PADDING-RIGHT: 3px; PADDING-LEFT: 3px; PADDING-BOTTOM: 3px; PADDING-TOP: 3px">
                        <TABLE cellSpacing=0 cellPadding=3 border=0 width=105>
                          <TBODY>
                          <TR>
                            <TD width=75 onMouseOver="style.background='#036393'" 
                            style="CURSOR: pointer" onclick=box_open(0); 
                            onmouseout="style.background=''"> 魔法球</TD>
                            <TD width=45>: <INPUT class=num id=Simon_Count readOnly 
                              value=0></TD></TR>
                          <TR>
                            <TD onMouseOver="style.background='#036393'" 
                            style="CURSOR: pointer" onclick=box_open(1); 
                            onmouseout="style.background=''"> 七周年</TD>
                            <TD>: <INPUT class=num id=Alexina_Count readOnly 
                              value=0></TD></TR>
                          <TR>
                            <TD onMouseOver="style.background='#036393'" 
                            style="CURSOR: pointer" onclick=box_open(2); 
                            onmouseout="style.background=''"> 克鲁贞</TD>
                            <TD>: <INPUT class=num id=Osla_Count readOnly 
                              value=0></TD></TR>
                          <TR>
                            <TD onMouseOver="style.background='#036393'" 
                            style="CURSOR: pointer" onclick=box_open(3); 
                            onmouseout="style.background=''"> 大杂烩</TD>
                            <TD>: <INPUT class=num id=Malcolm_Count readOnly 
                              value=0></TD></TR></TBODY></TABLE></DIV></DIV></TD></TR></TBODY></TABLE></DIV></DIV></DIV></DIV></DIV></DIV><FONT 
                  color=#000 size=2><BR><INPUT id=nao type=checkbox 
                  CHECKED>关闭消费提示<BR><INPUT id=narikin type=checkbox>霸王摸蛋<BR><INPUT id=tijianyi type=checkbox value="ReadOnly" disabled=true><a href="http://mabibook.com/bbs/forum.php?mod=viewthread&tid=3391" target=_blank>按这里帮助补全摸蛋资料</a><BR></FONT></FORM></TD>
                <TD vAlign=top>
                  <FORM name=chatwindow onSubmit="chat_enter(); return false">
                  <DIV class=w1>
                  <DIV class=w2>
                  <DIV class=w3>
                  <DIV class=w4>
                  <DIV class=w5>
                  <DIV class=w6>
                  <TABLE cellSpacing=0 cellPadding=0>
                    <TBODY>
                    <TR>
                      <TD>
                        <TABLE cellSpacing=0 cellPadding=0>
                          <TBODY>
                          <TR>
                            <TD><IMG style="MARGIN-RIGHT: 3px" height=23 
                              src="images/Message.gif" width=24 
                              border=0></TD>
                            <TD><FONT size=-2>Message 
                          Log</FONT><BR>消息记录</TD></TR></TBODY></TABLE></TD></TR>
                    <TR>
                      <TD vAlign=top>
                        <DIV class=fieldout style="MARGIN: 3px">
                        <DIV class=fieldin>
                        <DIV class=chatlog id=log>
                         &#60;SYSTEM&#62; : 欢迎进入挑战模式 当前店货率20倍 挑战RP极限<br>

                        </DIV>
                        </DIV></DIV></TD></TR>
                    <TR>
                      <TD>
                        <DIV class=chatfieldout style="MARGIN: 3px">
                        <DIV class=chatfieldin><INPUT class=chat size=100 
                        name=chat 
                        onSubmit="chat_enter(); return false"></DIV></DIV></TD></TR></TBODY></TABLE></DIV></DIV></DIV></DIV></DIV></DIV><br>
                  <input class=button style="MARGIN: 3px" onClick=reset_button(0); type=button value=清空列表>　
                        <INPUT class=button style="MARGIN: 3px" onclick=reset_button(1); type=button value=全部清空>　
                        <input class=button style="MARGIN: 3px" value="普通模式" type="button" onClick="window.location='rand.php'"/></FORM><p align=center><br><script type="text/javascript"><!--
google_ad_client = "pub-4674532418886026";
/* 468x60, mbrand */
google_ad_slot = "1426495918";
google_ad_width = 468;
google_ad_height = 60;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script></p></TD></TR></TBODY></TABLE>
              <?php
include("footall.html")
?> </TD>
        </TR></TBODY></TABLE></TD></TR></TBODY></TABLE>
<?php
require_once 'enchtml.func.php';
ob_start();
?>

<script type="text/javascript" src="menu.js"></script>

<SCRIPT language=JavaScript src="images/Simonk.js"></SCRIPT>

<SCRIPT language=JavaScript src="images/Alexinak.js"></SCRIPT>

<SCRIPT language=JavaScript src="images/Oslak.js"></SCRIPT>

<SCRIPT language=JavaScript src="images/Malcolmk.js"></SCRIPT></BODY></HTML>
<?php
$htmlstr = ob_get_contents();
ob_end_clean();
outhtml($htmlstr);
?>