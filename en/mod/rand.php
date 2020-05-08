<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<META http-equiv=Content-Type content="text/html; charset=utf-8">
<HTML><HEAD><TITLE>Mabinogi Gachapon Simulator - Mabibook</TITLE>
<link rel=stylesheet type="text/css" href="cssrand.css">

<STYLE type=text/css>

BODY {
	BACKGROUND-COLOR: #58a1ca;font-family:Verdana;font-size:10px;
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
even_Count = 0;

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
		}else if (box_name == 4) {
			box = even;
			even_Count+=1;
			document.randombox.even_Count.value = even_Count;
		}
		
		if (document.randombox.narikin.checked) {
		
		if (box_name == 0){
		
			donate += 1000;
			document.randombox.donate.value = donate;
		}
		else if (box_name == 1){
		
			donate += 1000;
			document.randombox.donate.value = donate;
		}
		else if (box_name == 2){
		
			donate += 1000;
			document.randombox.donate.value = donate;
		}
		else if (box_name == 3){
		
			donate += 1000;
			document.randombox.donate.value = donate;
		}
		else if (box_name == 4){
		
			donate += 1000;
			document.randombox.donate.value = donate;
		}

		} else if (box_name == 0){
		
			point -= 1000;
			document.randombox.point.value = point;
		}
		else if (box_name == 1){
		
			point -= 1000;
			document.randombox.point.value = point;
		}
		else if (box_name == 2){
		
			point -= 1000;
			document.randombox.point.value = point;
		}
		else if (box_name == 3){
		
			point -= 1000;
			document.randombox.point.value = point;
		}
		else if (box_name == 4){
		
			point -= 1000;
			document.randombox.point.value = point;
		}

		output_log = "";
		var rand = Math.floor(Math.random() * box.length);
		var w = "&lt;SYSTEM&gt; :  Received [" + box[rand][0] + "]";
		if (box[rand][1] != "") w = w + "　<SPAN class='option'>(" + box[rand][1] + ")</SPAN>";
		log.unshift(w);

		for (i=0; i<log.length; i++) {
			output_log = output_log + log[i] + "<BR>";
		}
		document.getElementById('log').innerHTML = output_log;
		
	} else {
		if (! document.randombox.nao.checked) alert("No NX")
	}
}

function buy_point() {
	if (! document.randombox.nao.checked) alert("NX Added")
	if (document.randombox.value[0].checked) {point += 1000;  donate += 1000;}
	if (document.randombox.value[1].checked) {point += 5000; donate += 5000;}
	if (document.randombox.value[2].checked) {point += 10000; donate += 10000;}
	if (document.randombox.value[3].checked) {point += 30000;donate += 30000;}
	
	document.randombox.point.value = point;
	document.randombox.donate.value = donate;
}

function chat_enter(){
	if (document.chatwindow.chat.value == "Fashion") {box_open(0);}
	else if (document.chatwindow.chat.value == "Explore") {box_open(1);}
	else if (document.chatwindow.chat.value == "Soldier") {box_open(2);}
	else if (document.chatwindow.chat.value == "Product") {box_open(3);}
	else if (document.chatwindow.chat.value == "event") {box_open(4);}
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
		even_Count = 0;
		log = new Array();
		document.getElementById('log').innerHTML = "";
		document.randombox.point.value = point;
		document.randombox.donate.value = donate;
		document.randombox.Simon_Count.value = Simon_Count;
		document.randombox.Alexina_Count.value = Alexina_Count;
		document.randombox.Osla_Count.value = Osla_Count;
		document.randombox.Malcolm_Count.value = Malcolm_Count;
				document.randombox.even_Count.value = even_Count;
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
                <TD vAlign=top><span id="menutag" style="text-align:center;"></span><?php
include("menurnd.txt")
?>
                  </TD>
                <TD vAlign=top><FORM name=randombox onSubmit="chat_enter(); return false">
                  <DIV class=w1>
                  <DIV class=w2>
                  <DIV class=w3>
                  <DIV class=w4>
                  <DIV class=w5>
                  <DIV class=w6>
                  <TABLE cellSpacing=0 cellPadding=0 width="auto">
                    <TBODY>
                    <TR>
                      <TD width="120">
                        <TABLE cellSpacing=0 cellPadding=0>
                          <TBODY>
                          <TR>
                            <TD><IMG style="MARGIN-RIGHT: 3px" height=23 
                              src="images/shop.gif" width=22 
                            border=0></TD>
                            <TD><FONT size=-2></FONT>NX Shop</TD></TR></TBODY></TABLE></TD></TR>
                    <TR>
                      <TD 
                      style="PADDING-RIGHT: 5px; PADDING-LEFT: 5px; PADDING-BOTTOM: 5px; PADDING-TOP: 5px"><DIV class=fieldout>
                        <DIV class=fieldin 
                        style="PADDING-RIGHT: 3px; PADDING-LEFT: 3px; PADDING-BOTTOM: 3px; PADDING-TOP: 3px">
<DIV onMouseOver="style.background='#036393'" style="CURSOR: pointer" onClick="document.randombox.value[0].checked=true" onMouseOut="style.background=''">
                        <INPUT type=radio CHECKED name=value>1000</DIV>
<DIV onMouseOver="style.background='#036393'"  style="CURSOR: pointer" onClick="document.randombox.value[1].checked=true" onMouseOut="style.background=''">
<INPUT type=radio name=value>5000</DIV>
<DIV onMouseOver="style.background='#036393'" style="CURSOR: pointer" onClick="document.randombox.value[2].checked=true" onMouseOut="style.background=''">
                        <INPUT type=radio name=value>10000</DIV>
                        <DIV onMouseOver="style.background='#036393'" style="CURSOR: pointer" onClick="document.randombox.value[3].checked=true" onMouseOut="style.background=''">
                        <INPUT type=radio name=value>30000</DIV>
                        </DIV></DIV></TD></TR></TBODY></TABLE>
                        <INPUT class=button style="MARGIN: 3px" onclick=buy_point(); type=button value=BUY></DIV></DIV></DIV></DIV></DIV></DIV>
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
                          size=-2></FONT>Infomation</TD></TR></TBODY></TABLE></TD></TR>
                    <TR>
                      <TD 
                      style="PADDING-RIGHT: 5px; PADDING-LEFT: 5px; PADDING-BOTTOM: 5px; PADDING-TOP: 5px" 
                      align=middle>
                        <DIV class=fieldout>
<DIV class=fieldin style="PADDING-RIGHT: 3px; PADDING-LEFT: 3px; PADDING-BOTTOM: 3px; PADDING-TOP: 3px">Credit<BR>
<INPUT class=num id=point style="FONT-WEIGHT: bold; WIDTH: 7em" readOnly value=0><BR>Cost<BR>
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
                          size=-2></FONT>
                            Gachapon</TD>
                          </TR></TBODY></TABLE></TD></TR>
                    <TR>
                      <TD 
                      style="PADDING-RIGHT: 5px; PADDING-LEFT: 5px; PADDING-BOTTOM: 5px; PADDING-TOP: 5px">
                        <DIV class=fieldout>
                        <DIV class=fieldin style="PADDING-RIGHT: 3px; PADDING-LEFT: 3px; PADDING-BOTTOM: 3px; PADDING-TOP: 3px">
                        <TABLE cellSpacing=0 cellPadding=3 border=0 width=125>
                          <TBODY>
                          <!---->

                              
                          <TR>
<TD width=115 onMouseOver="style.background='#036393'" style="CURSOR: pointer" onclick=box_open(0); onMouseOut="style.background=''"><IMG height=24 src="images/Simon_Random_Box.gif" 
                              width=24 align=absMiddle border=0> Fashion</TD>
                            <TD width=45 >: <INPUT class=num id=Simon_Count readOnly 
                              value=0></TD></TR>
                          <TR>
                            <TD onMouseOver="style.background='#036393'" 
                            style="CURSOR: pointer" onclick=box_open(1); 
                            onmouseout="style.background=''"><img height=24 
                              src="images/Alexina_Random_Box.gif" 
                              width=24 align=absMiddle border=0> Explore</TD>
                            <TD>: <INPUT class=num id=Alexina_Count readOnly 
                              value=0></TD></TR>
                          <TR>
                            <TD onMouseOver="style.background='#036393'" 
                            style="CURSOR: pointer" onclick=box_open(2); 
                            onmouseout="style.background=''"><IMG height=24 
                              src="images/Osla_Random_Box.gif" width=24 
                              align=absMiddle border=0> Soldier</TD>
                            <TD>: <INPUT class=num id=Osla_Count readOnly 
                              value=0></TD></TR>
                          <TR>
                            <TD onMouseOver="style.background='#036393'" 
                            style="CURSOR: pointer" onclick=box_open(3); 
                            onmouseout="style.background=''"><IMG height=24 
                              src="images/Malcolm_Random_Box.gif" 
                              width=24 align=absMiddle border=0> Product</TD>
                            <TD>: <INPUT class=num id=Malcolm_Count readOnly 
                              value=0></TD></TR>
                              </TBODY></TABLE>
            </DIV></DIV></TD></TR></TBODY></TABLE></DIV></DIV></DIV></DIV></DIV></DIV>
            <FONT color=#000 size=2><BR>
            <INPUT id=nao type=checkbox CHECKED>Close Cost Message<BR>
            <INPUT id=narikin type=checkbox>Free to play</FONT></FORM></TD>
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
                            <TD><FONT size=-2></FONT>Message Log</TD></TR></TBODY></TABLE></TD></TR>
                    <TR>
                      <TD vAlign=top>
                        <DIV class="fieldout" style="MARGIN: 3px">
                        <DIV class="fieldin">
<DIV class="chatlog" id="log">
                         Gachapon Simulator is a game  ... 
                            
                           Buy NX at left, click Gachapon below to have fun ...<br>
                            <br>
                            2009.11.13 <br><br>
                            1.Exploration Gachapon updated to Oct.14<br>
                            </DIV>
                        </DIV></DIV></TD></TR>
                    <TR>
                      <TD>
                        <DIV class=chatfieldout style="MARGIN: 3px">
                        <DIV class=chatfieldin>
                        <INPUT class=chat size=95 name=chat onSubmit="chat_enter(); return false">
                        </DIV></DIV></TD></TR></TBODY></TABLE>
                  </DIV></DIV></DIV></DIV></DIV></DIV>
                        <br><INPUT class=button style="MARGIN: 3px" onclick=reset_button(0); type=button value="Clear List">　<INPUT class=button style="MARGIN: 3px" onclick=reset_button(1); type=button value="Clear All"></FORM><p align=center><br></p></TD></TR></TBODY></TABLE>
              <?php
include("footall.html")
?> </TD>
        </TR></TBODY></TABLE></TD></TR></TBODY></TABLE>
<?php
require_once 'enchtml.func.php';
ob_start();
?>

<script type="text/javascript" src="menu.js"></script>

<SCRIPT language=JavaScript src="images/Simon.js"></SCRIPT>

<SCRIPT language=JavaScript src="images/Alexina.js"></SCRIPT>

<SCRIPT language=JavaScript src="images/Osla.js"></SCRIPT>

<SCRIPT language=JavaScript src="images/Malcolm.js"></SCRIPT>
<SCRIPT language=JavaScript src="images/even.js"></SCRIPT></BODY></HTML>
<?php
$htmlstr = ob_get_contents();
ob_end_clean();
outhtml($htmlstr);
?>