<html>
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel=stylesheet type="text/css" href="css.css">
<title>洛奇小册子 - 洛奇武器改造/装备模拟器</title>
</head>

<body topmargin="0" leftmargin="0" background="bg_out.gif">



 <br> <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="960" height="100%">
    <tr>
      <td width="40" rowspan="3">　</td>
      <td width="920" bgcolor="#FFFFFF" height="80" style="border:#ccc solid 1px;">
<?php
include("notices.html")
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
<span id="menutag" style="text-align:center;"></span>
<?php
include("menu.txt")
?></td>
    <td width="780" height="25" bgcolor="#808080"></td>
  </tr>
  <tr>
    <td width="780" height="700" valign="top">

<script language="JavaScript" type="text/JavaScript">
<!--
var armor_000 = [0,2,0,0,0,16];
var armor_raw = [0,2,0,0,0,16];
var armor_add = [0,0,0,0,0,0];
var armor_acc = [0,0,0,0,0,0];
var armor_tmp = [0,0,0,0,0,0,0,0];
var armor_chr = [0,0,0,0,0,0,0];
var armor_def = [0,0,0,0,0,0,0,0];
var checkbox_order = [0,0,0,0,0];
var dolist = ["def","pro","hpd","npd","mpd","dur","pra","pri"];

var list_0 = [0,0,0,0,0,0,0,0,"无"];
var list_1 = [2,0,0,0,0,0,60,23800,"强化表面"];		var order_1 = [true,false,false,false,false];
var list_2 = [0,0,5,0,0,0,24,8800,"特殊改造 1"];		var order_2 = [true,true,false,false,false];
var list_3 = [0,0,0,5,0,0,22,9300,"特殊改造 2"];		var order_3 = [true,true,false,false,false];
var list_4 = [0,0,0,0,5,0,20,9700,"特殊改造 3"];		var order_4 = [true,true,false,false,false];


function Off_Checkbox(nowselect,orderplace){
	checkbox_order[orderplace] = nowselect;
	if (nowselect==0) {
		for (i=1;i<=4;i++){
			if (eval("order_"+i+"[orderplace]"))  { eval("document.reform.r"+i+"_"+orderplace+".disabled = false;") }
		}
	} else {
		for (i=1;i<=4;i++){
			if (eval("order_"+i+"[orderplace]"))  { eval("document.reform.r"+i+"_"+orderplace+".disabled = true;") }
		}
		eval("document.reform.r"+nowselect+"_"+orderplace+".disabled = false;")
	}
	Count();
}

function Reset_All(){
	checkbox_order=[0,0,0,0,0];
	for (i=1;i<=4;i++){
		for (j=0;j<=4;j++){
			if (eval("order_"+i+"[j]"))  { eval("document.reform.r"+i+"_"+j+".disabled = false;") }
		}
	}
	armor_add = [0,0,0,0,0,0];
	for (i=0;i<=5;i++){
		armor_raw[i] = armor_000[i] + armor_add[i];
	}
	Count();
}


function Set_Raw_Value(){
	var addpplst = eval(reform.st_add.value);

	if (addpplst == 0)  {armor_add = [0,0,0,0,0,0];}	//无
	if (addpplst == 1)  {armor_add = [0,0,0,0,0,1];}	//C、C+、B
	if (addpplst == 2)  {armor_add = [0,0,0,0,0,2];}	//B+
	if (addpplst == 3)  {armor_add = [0,0,0,0,0,3];}	//A
	if (addpplst == 4)  {armor_add = [1,0,0,0,0,4];}	//A+、S
	if (addpplst == 5)  {armor_add = [1,0,0,0,0,5];}	//S+、X

	for (i=0;i<=5;i++){
		armor_raw[i] = armor_000[i] + armor_add[i];
	}
	Count();
	Set_EX_Value();
}



function Exp_Count(o0,o1,o2,o3,o4){
	checkbox_order=[o0,o1,o2,o3,o4];
	//clear all
	for (i=1;i<=4;i++){
		for (j=0;j<=4;j++){
			if (eval("order_"+i+"[j]"))  { eval("document.reform.r"+i+"_"+j+".disabled = false;") }
			if (eval("order_"+i+"[j]"))  { eval("document.reform.r"+i+"_"+j+".checked  = false;") }
		}
	}
	//0
	if (o0>0) {
		for (i=1;i<=4;i++){
			if (eval("order_"+i+"[0]"))  { eval("document.reform.r"+i+"_0.disabled = true;") }
		}
		eval("document.reform.r"+o0+"_0.disabled = false;")
		eval("document.reform.r"+o0+"_0.checked  = true;")
	}
	//1
	if (o1>0) {
		for (i=1;i<=4;i++){
			if (eval("order_"+i+"[1]"))  { eval("document.reform.r"+i+"_1.disabled = true;") }
		}
		eval("document.reform.r"+o1+"_1.disabled = false;")
		eval("document.reform.r"+o1+"_1.checked  = true;")
	}
	//2
	if (o2>0) {
		for (i=1;i<=4;i++){
			if (eval("order_"+i+"[2]"))  { eval("document.reform.r"+i+"_2.disabled = true;") }
		}
		eval("document.reform.r"+o2+"_2.disabled = false;")
		eval("document.reform.r"+o2+"_2.checked  = true;")
	}
	//3
	if (o3>0) {
		for (i=1;i<=4;i++){
			if (eval("order_"+i+"[3]"))  { eval("document.reform.r"+i+"_3.disabled = true;") }
		}
		eval("document.reform.r"+o3+"_3.disabled = false;")
		eval("document.reform.r"+o3+"_3.checked  = true;")
	}
	//4
	if (o4>0) {
		for (i=1;i<=4;i++){
			if (eval("order_"+i+"[4]"))  { eval("document.reform.r"+i+"_4.disabled = true;") }
		}
		eval("document.reform.r"+o4+"_4.disabled = false;")
		eval("document.reform.r"+o4+"_4.checked  = true;")
	}
	Count();
}

function Set_EX_Value(){
	document.all.exp_1.innerHTML=Get_Exp_Value(1,2,0,0,0);

	document.all.exp_2.innerHTML=Get_Exp_Value(2,2,0,0,0);
}

function Get_Exp_Value(o0,o1,o2,o3,o4){
	for (i=0;i<=4;i++){
		eval("armor_tmp[i] = armor_raw[i] + list_"+o0+"[i] + list_"+o1+"[i] + list_"+o2+"[i] + list_"+o3+"[i] + list_"+o4+"[i];")
	}
	eval("armor_tmp[5] = armor_raw[5] + list_"+o0+"[5] + list_"+o1+"[5] + list_"+o2+"[5] + list_"+o3+"[5] + list_"+o4+"[5];")
	eval("armor_tmp[7] = list_"+o0+"[7] + list_"+o1+"[7] + list_"+o2+"[7] + list_"+o3+"[7] + list_"+o4+"[7];")
	return "防:<b><u><font color='#663300'>"+(armor_chr[0]+armor_tmp[0])+"("+(armor_chr[0]+armor_tmp[0]+armor_chr[5])+")</font></u></b>、保:<b><u><font color='#9933FF'>"+(armor_chr[1]+armor_tmp[1])+".0("+(armor_chr[1]+armor_tmp[1]+armor_chr[6])+".0)</font></u></b>、近PD:<b><u><font color='#FF0000'>+"+(armor_chr[2]+armor_tmp[2])+"%</font></u></b>、远PD:<b><u><font color='#FF9900'>+"+(armor_chr[3]+armor_tmp[3])+"%</font></u></b>、魔PD:<b><u><font color='#0000FF'>+"+(armor_chr[4]+armor_tmp[4])+"%</font></u></b>　耐:<b><u><font color='#008000'>"+armor_tmp[5]+"</font></u></b>、价:<b><u><font color='#808000'>"+armor_tmp[7]+"</font></u></b>";
}

function Set_Chr(){
	var eqdefpplst = eval(chrsat.st_eqdef.options[chrsat.st_eqdef.selectedIndex].value);
	var eqpropplst = eval(chrsat.st_eqpro.options[chrsat.st_eqpro.selectedIndex].value);
	var defpplst = eval(chrsat.st_def.options[chrsat.st_def.selectedIndex].value);
	var propplst = eval(chrsat.st_pro.options[chrsat.st_pro.selectedIndex].value);
	var dskpplst = eval(chrsat.st_dsk.options[chrsat.st_dsk.selectedIndex].value);

	
	var shipplst = 35;
	

	if (dskpplst == 16) {baseskill=0; defskill=0; proskill=0;}
	if (dskpplst == 15) {baseskill=1; defskill=20; proskill=5;}
	if (dskpplst == 14) {baseskill=2; defskill=21; proskill=6;}
	if (dskpplst == 13) {baseskill=3; defskill=22; proskill=7;}
	if (dskpplst == 12) {baseskill=4; defskill=24; proskill=8;}
	if (dskpplst == 11) {baseskill=5; defskill=26; proskill=9;}
	if (dskpplst == 10) {baseskill=6; defskill=28; proskill=10;}
	if (dskpplst == 9) {baseskill=7; defskill=32; proskill=12;}
	if (dskpplst == 8) {baseskill=8; defskill=34; proskill=13;}
	if (dskpplst == 7) {baseskill=9; defskill=38; proskill=14;}
	if (dskpplst == 6) {baseskill=10; defskill=42; proskill=15;}
	if (dskpplst == 5) {baseskill=11; defskill=46; proskill=17;}
	if (dskpplst == 4) {baseskill=12; defskill=50; proskill=20;}
	if (dskpplst == 3) {baseskill=13; defskill=50; proskill=20;}
	if (dskpplst == 2) {baseskill=14; defskill=50; proskill=20;}
	if (dskpplst == 1) {baseskill=15; defskill=55; proskill=25;}
	
	if (dskpplst == 16) {
	document.all.def_skill.innerHTML=" ";
	} else {
	document.all.def_skill.innerHTML="→基本防御+"+baseskill+"、技能使用成功时防御+"+defskill+"、追加保护+"+proskill+"%";
	}

	armor_chr[0] = defpplst + eqdefpplst + baseskill;
	armor_chr[1] = propplst + eqpropplst;
	armor_chr[2] = eval(chrsat.st_eqhpd.options[chrsat.st_eqhpd.selectedIndex].value);
	armor_chr[3] = eval(chrsat.st_eqnpd.options[chrsat.st_eqnpd.selectedIndex].value);;
	armor_chr[4] = eval(chrsat.st_eqmpd.options[chrsat.st_eqmpd.selectedIndex].value);;
	armor_chr[5] = defskill + shipplst;
	armor_chr[6] = proskill;	

	Count();
	Set_EX_Value();
}


function Count(){
	for (i=0;i<=5;i++){
		eval("armor_acc[i] = armor_raw[i] + list_"+checkbox_order[0]+"[i] + list_"+checkbox_order[1]+"[i] + list_"+checkbox_order[2]+"[i] + list_"+checkbox_order[3]+"[i] + list_"+checkbox_order[4]+"[i];")
	}

	for (i=0;i<=5;i++){
		armor_def[i] = armor_acc[i] - armor_raw[i];
	}
	for (i=6;i<=7;i++){
		eval("armor_def[i] = list_"+checkbox_order[0]+"[i] + list_"+checkbox_order[1]+"[i] + list_"+checkbox_order[2]+"[i] + list_"+checkbox_order[3]+"[i] + list_"+checkbox_order[4]+"[i];")
	}
	for (i=0;i<=5;i++){
		eval("document.all."+dolist[i]+"_def.innerHTML=armor_def[i];")
		eval("document.all."+dolist[i]+"_raw.innerHTML=armor_raw[i];")
		eval("document.all."+dolist[i]+"_acc.innerHTML=armor_acc[i];")
	}
	document.all.pra_def.innerHTML=armor_def[6];
	document.all.pri_def.innerHTML=armor_def[7];
	
	document.all.def_equ.innerHTML=armor_chr[0]+armor_acc[0];
	document.all.pro_equ.innerHTML=armor_chr[1]+armor_acc[1];
	document.all.hpd_equ.innerHTML=armor_chr[2]+armor_acc[2];
	document.all.npd_equ.innerHTML=armor_chr[3]+armor_acc[3];
	document.all.mpd_equ.innerHTML=armor_chr[4]+armor_acc[4];	
	document.all.dur_equ.innerHTML=armor_acc[5];
	document.all.def_equ2.innerHTML=armor_chr[0]+armor_acc[0]+armor_chr[5];
	document.all.pro_equ2.innerHTML=armor_chr[1]+armor_acc[1]+armor_chr[6];
}

function Get_Cookie_Value(){
	sr = [1,2,3,4,5,6,7,8,9,"A","B","C","D","E","F","×"]
	mgbrf = ["尚未使用","尚未使用","尚未使用","尚未使用","尚未使用","尚未使用","尚未使用","尚未使用","尚未使用"];
	arrCookie = document.cookie.split("; ");
	for(i=0;i<arrCookie.length;i++){
		if(arrCookie[i].substr(0,5)=="MgbRF"&&arrCookie[i].substr(5,1)<10){
			mgbrf[arrCookie[i].substr(5,1)-1] = arrCookie[i].substr(7);
		}
	}

	for(i=1;i<10;i++){
		arrCookie = mgbrf[i-1].split(" ");
		if(arrCookie.length!=7){
			chrsat.chr_cookie.options[i].text = (i)+" : 尚未使用";
		} else {
			if(arrCookie[0]=="[1]"){
				chrsat.chr_cookie.options[i].text = (i)+" : [近武] 力量"+arrCookie[1]+" 敏捷"+arrCookie[2]+" 意志"+arrCookie[3]+" 幸运"+arrCookie[4]+" 精格"+sr[arrCookie[5]-1]+" 暴击"+sr[arrCookie[6]-1];
			} else if(arrCookie[0]=="[2]"){
				chrsat.chr_cookie.options[i].text = (i)+" : [远武] 力量"+arrCookie[1]+" 敏捷"+arrCookie[2]+" 意志"+arrCookie[3]+" 幸运"+arrCookie[4]+" 精远"+sr[arrCookie[5]-1]+" 暴击"+sr[arrCookie[6]-1];
			} else if(arrCookie[0]=="[3]"){
				chrsat.chr_cookie.options[i].text = (i)+" : [防具] 装防"+arrCookie[1]+" 装保"+arrCookie[2]+" 抵抗"+arrCookie[3]+" 自然"+arrCookie[4]+" 魔反"+arrCookie[5]+" 防御"+sr[arrCookie[6]-1];
			}
		}
	}
}

function Save_Cookie_Value(){
	var expires = new Date();
	expires.setTime(expires.getTime() + 30 * 24 * 60 * 60 * 1000);
	Snu = eval(chrsat.chr_cookie.options[chrsat.chr_cookie.selectedIndex].value);
	if(Snu>0){
		document.cookie = "MgbRF"+Snu+"=[3] "+eval(chrsat.st_eqdef.options[chrsat.st_eqdef.selectedIndex].value)+" "+eval(chrsat.st_eqpro.options[chrsat.st_eqpro.selectedIndex].value)+" "+eval(chrsat.st_eqhpd.options[chrsat.st_eqhpd.selectedIndex].value)+" "+eval(chrsat.st_eqnpd.options[chrsat.st_eqnpd.selectedIndex].value)+" "+eval(chrsat.st_eqmpd.options[chrsat.st_eqmpd.selectedIndex].value)+" "+eval(chrsat.st_dsk.options[chrsat.st_dsk.selectedIndex].value)+" ; expires=" + expires.toGMTString();
	}
	Get_Cookie_Value();
}

function Load_Cookie_Value(){
	Lnu = eval(chrsat.chr_cookie.options[chrsat.chr_cookie.selectedIndex].value);
	if(Lnu>0){
		arrCookie = mgbrf[Lnu-1].split(" ");
		if(arrCookie.length!=7){
			alert("选择位置尚未使用或资料有误，请重新写入资料");
		} else {
			if(arrCookie[0]=="[3]"){
				document.all.st_eqdef.value=arrCookie[1];
				document.all.st_eqpro.value=arrCookie[2];
				document.all.st_eqhpd.value=arrCookie[3];
				document.all.st_eqnpd.value=arrCookie[4];
				document.all.st_eqmpd.value=arrCookie[5];
				document.all.st_dsk.value=arrCookie[6];
				Set_Chr();
			} else if(arrCookie[0]=="[2]"){
				alert("该记忆位置为 远程武器 所使用");
			} else if(arrCookie[0]=="[1]"){
				alert("该记忆位置为 近战武器 所使用");
			}
		}
	}
}


function Get_Reform_Name(o0,o1,o2,o3,o4){
	eval("document.write(list_"+o0+"[8]+'→'+list_"+o1+"[8]);")
}
//-->
</script>

<div align="center">
  <center>
  <table border="0" cellpadding="2" cellspacing="2" style="border-collapse: collapse" bordercolor="#111111" width="760" height="100%">
  <tr>
    <td width="795" valign="top">
    <div align="center">
      <center>

    <?php
include("top.html")
?>



    <table border="0" cellpadding="2" cellspacing="2" style="border-collapse: collapse" bordercolor="#111111" width="740"><form name="reform">
      <tr>
        <td width="432" colspan="7">
        
       <?php
require_once 'enchtml.func.php';
ob_start();
?> 	
        
        </td>
        <td width="308" align="right" colspan="3"></td>
      </tr>
      <tr>
        <td width="740" colspan="10" bgcolor="#808080"><font color="#FFFFFF">◆ 龟甲盾牌  - 近防+35 远防+50 减伤15 抗暴10%</font></td>
      </tr>
      <tr>
        <td width="120" align="center" bgcolor="#EEEEEE">改造内容</td>
        <td width="52" align="center" bgcolor="#EEEEEE">防御</td>
        <td width="52" align="center" bgcolor="#EEEEEE">保护</td>
        <td width="52" align="center" bgcolor="#EEEEEE">近PD</td>
        <td width="52" align="center" bgcolor="#EEEEEE">远PD</td>
        <td width="52" align="center" bgcolor="#EEEEEE">魔PD</td>
        <td width="52" align="center" bgcolor="#EEEEEE">耐久</td>
        <td width="93" align="center" bgcolor="#EEEEEE">熟练值</td>
        <td width="105" align="center" bgcolor="#EEEEEE">改造价格</td>
        <td width="110" align="center" bgcolor="#EEEEEE">０&gt;１&gt;２&gt;３&gt;４</td>
      </tr>
      <tr>
        <td width="740" align="center" colspan="10"><img border="0" src="linepic.gif"  width="100%" height="1"></td>
      </tr>
      <tr>
        <td width="120" align="center" bgcolor="#EEEEEE">强化表面</td>
        <td width="52" align="center" bgcolor="#EEEEEE"><font color="#0000FF">+2</font></td>
        <td width="52" align="center" bgcolor="#EEEEEE"></td>
        <td width="52" align="center" bgcolor="#EEEEEE"></td>
        <td width="52" align="center" bgcolor="#EEEEEE"></td>
        <td width="52" align="center" bgcolor="#EEEEEE"></td>
        <td width="52" align="center" bgcolor="#EEEEEE"></td>
        <td width="93" align="center" bgcolor="#EEEEEE"><font color="#993333">60</font></td>
        <td width="105" align="center" bgcolor="#EEEEEE"><font color="#993333">23800</font></td>
        <td width="110" align="center" bgcolor="#EEEEEE"><input type="checkbox" name="r1_0" onClick="if(document.reform.r1_0.checked){Off_Checkbox(1,0);}else{Off_Checkbox(0,0);}"><input type="checkbox" disabled><input type="checkbox" disabled><input type="checkbox" disabled><input type="checkbox" disabled></td>
      </tr>
      <tr>
        <td width="120" align="center" bgcolor="#EEEEEE">特殊改造 1</td>
        <td width="52" align="center" bgcolor="#EEEEEE"></td>
        <td width="52" align="center" bgcolor="#EEEEEE"></td>
        <td width="52" align="center" bgcolor="#EEEEEE"><font color="#0000FF">+5%</font></td>
        <td width="52" align="center" bgcolor="#EEEEEE"></td>
        <td width="52" align="center" bgcolor="#EEEEEE"></td>
        <td width="52" align="center" bgcolor="#EEEEEE"></td>
        <td width="93" align="center" bgcolor="#EEEEEE"><font color="#993333">24</font></td>
        <td width="105" align="center" bgcolor="#EEEEEE"><font color="#993333">8800</font></td>
        <td width="110" align="center" bgcolor="#EEEEEE"><input type="checkbox" name="r2_0" onClick="if(document.reform.r2_0.checked){Off_Checkbox(2,0);}else{Off_Checkbox(0,0);}"><input type="checkbox" name="r2_1" onClick="if(document.reform.r2_1.checked){Off_Checkbox(2,1);}else{Off_Checkbox(0,1);}"><input type="checkbox" disabled><input type="checkbox" disabled><input type="checkbox" disabled></td>
      </tr>
      <tr>
        <td width="120" align="center" bgcolor="#EEEEEE">特殊改造 2</td>
        <td width="52" align="center" bgcolor="#EEEEEE"></td>
        <td width="52" align="center" bgcolor="#EEEEEE"></td>
        <td width="52" align="center" bgcolor="#EEEEEE"></td>
        <td width="52" align="center" bgcolor="#EEEEEE"><font color="#0000FF">+5%</font></td>
        <td width="52" align="center" bgcolor="#EEEEEE"></td>
        <td width="52" align="center" bgcolor="#EEEEEE"></td>
        <td width="93" align="center" bgcolor="#EEEEEE"><font color="#993333">22</font></td>
        <td width="105" align="center" bgcolor="#EEEEEE"><font color="#993333">9300</font></td>
        <td width="110" align="center" bgcolor="#EEEEEE"><input type="checkbox" name="r3_0" onClick="if(document.reform.r3_0.checked){Off_Checkbox(3,0);}else{Off_Checkbox(0,0);}"><input type="checkbox" name="r3_1" onClick="if(document.reform.r3_1.checked){Off_Checkbox(3,1);}else{Off_Checkbox(0,1);}"><input type="checkbox" disabled><input type="checkbox" disabled><input type="checkbox" disabled></td>
      </tr>
      <tr>
        <td width="120" align="center" bgcolor="#EEEEEE">特殊改造 3</td>
        <td width="52" align="center" bgcolor="#EEEEEE"></td>
        <td width="52" align="center" bgcolor="#EEEEEE"></td>
        <td width="52" align="center" bgcolor="#EEEEEE"></td>
        <td width="52" align="center" bgcolor="#EEEEEE"></td>
        <td width="52" align="center" bgcolor="#EEEEEE"><font color="#0000FF">+5%</font></td>
        <td width="52" align="center" bgcolor="#EEEEEE"></td>
        <td width="93" align="center" bgcolor="#EEEEEE"><font color="#993333">20</font></td>
        <td width="105" align="center" bgcolor="#EEEEEE"><font color="#993333">9700</font></td>
        <td width="110" align="center" bgcolor="#EEEEEE"><input type="checkbox" name="r4_0" onClick="if(document.reform.r4_0.checked){Off_Checkbox(4,0);}else{Off_Checkbox(0,0);}"><input type="checkbox" name="r4_1" onClick="if(document.reform.r4_1.checked){Off_Checkbox(4,1);}else{Off_Checkbox(0,1);}"><input type="checkbox" disabled><input type="checkbox" disabled><input type="checkbox" disabled></td>
      </tr>
      <tr>
        <td width="740" align="center" colspan="10"><img border="0" src="linepic.gif"  width="100%" height="1"></td>
      </tr>
      </tr>
      <tr>
        <td width="120" align="center" bgcolor="#CCCCFF" rowspan="2">合计提升</td>
        <td width="52" align="center" bgcolor="#CCCCFF">防御</td>
        <td width="52" align="center" bgcolor="#CCCCFF">保护</td>
        <td width="52" align="center" bgcolor="#CCCCFF">近PD</td>
        <td width="52" align="center" bgcolor="#CCCCFF">远PD</td>
        <td width="52" align="center" bgcolor="#CCCCFF">魔PD</td>
        <td width="52" align="center" bgcolor="#CCCCFF">耐久</td>
        <td width="93" align="center" bgcolor="#CCCCFF">熟练值</td>
        <td width="105" align="center" bgcolor="#CCCCFF">改造价格</td>
        <td width="110" align="center" rowspan="2"><input type="reset" VALUE="重新设定" onClick="Reset_All()"></td>
      </tr>
      <tr>
        <td width="52" align="center" bgcolor="#EEEEFF"><span id=def_def>0</span></td>
        <td width="52" align="center" bgcolor="#EEEEFF"><span id=pro_def>0</span>.0</td>
        <td width="52" align="center" bgcolor="#EEEEFF"><span id=hpd_def>0</span>%</td>
        <td width="52" align="center" bgcolor="#EEEEFF"><span id=npd_def>0</span>%</td>
        <td width="52" align="center" bgcolor="#EEEEFF"><span id=mpd_def>0</span>%</td>
        <td width="52" align="center" bgcolor="#EEEEFF"><span id=dur_def>0</span></td>
        <td width="93" align="center" bgcolor="#EEEEFF"><span id=pra_def>0</span></td>
        <td width="105" align="center" bgcolor="#EEEEFF"><span id=pri_def>0</span></td>
      </tr>
      <tr>
        <td width="740" align="center" colspan="10"><img border="0" src="linepic.gif"  width="100%" height="1"></td>
      </tr>
      <tr>
        <td width="120" align="center" bgcolor="#FFCCCC">改造前数值</td>
        <td width="52" align="center" bgcolor="#FFEEEE"><span id=def_raw>0</span></td>
        <td width="52" align="center" bgcolor="#FFEEEE"><span id=pro_raw>2</span>.0</td>
        <td width="52" align="center" bgcolor="#FFEEEE">+<span id=hpd_raw>0</span>%</td>
        <td width="52" align="center" bgcolor="#FFEEEE">+<span id=npd_raw>0</span>%</td>
        <td width="52" align="center" bgcolor="#FFEEEE">+<span id=mpd_raw>0</span>%</td>
        <td width="52" align="center" bgcolor="#FFEEEE"><span id=dur_raw>16</span></td>
        <td width="308" align="center" colspan="3">　</td>
      </tr>
      <tr>
        <td width="120" align="center" bgcolor="#CCFFFF">改造后数值</td>
        <td width="52" align="center" bgcolor="#EEFFFF"><span id=def_acc>0</span></td>
        <td width="52" align="center" bgcolor="#EEFFFF"><span id=pro_acc>2</span>.0</td>
        <td width="52" align="center" bgcolor="#EEFFFF">+<span id=hpd_acc>0</span>%</td>
        <td width="52" align="center" bgcolor="#EEFFFF">+<span id=npd_acc>0</span>%</td>
        <td width="52" align="center" bgcolor="#EEFFFF">+<span id=mpd_acc>0</span>%</td>
        <td width="52" align="center" bgcolor="#EEFFFF"><span id=dur_acc>16</span></td>
        <td width="308" align="center" colspan="3">　</td>
      </tr>
      <tr>
        <td width="740" align="center" colspan="10"><img border="0" src="linepic.gif"  width="100%" height="1"></td>
      </tr>
      <tr>
        <td width="120" align="center" bgcolor="#FFCC99">防具装备后</td>
        <td width="52" align="center" bgcolor="#FFE9D2"><span id=def_equ>0</span></td>
        <td width="52" align="center" bgcolor="#FFE9D2"><span id=pro_equ>2</span>.0</td>
        <td width="52" align="center" bgcolor="#FFE9D2">+<span id=hpd_equ>0</span>%</td>
        <td width="52" align="center" bgcolor="#FFE9D2">+<span id=npd_equ>0</span>%</td>
        <td width="52" align="center" bgcolor="#FFE9D2">+<span id=mpd_equ>0</span>%</td>
        <td width="52" align="center" bgcolor="#FFE9D2"><span id=dur_equ>16</span></td>
        <td width="308" align="center" colspan="3">　</td>
      </tr>
      <tr>
        <td width="120" align="center" bgcolor="#FFCC99">防御成功后</td>
        <td width="52" align="center" bgcolor="#FFE9D2"><span id=def_equ2>0</span></td>
        <td width="52" align="center" bgcolor="#FFE9D2"><span id=pro_equ2>2</span>.0</td>
        <td width="516" colspan="7"><font color="#CCCCCC"><span id=def_skill></span></font></td>
      </tr>
    </form></table>
    <table border="0" cellpadding="2" cellspacing="2" style="border-collapse: collapse" bordercolor="#111111" width="740"><form name="chrsat">
      <tr>
        <td width="740" colspan="5">　</td>
      </tr>
      <tr>
        <td>装备防御：<select size="1" id="st_eqdef" name="st_eqdef" onChange="Set_Chr(this)"><option value="-5">-5</option><option value="-4">-4</option><option value="-3">-3</option><option value="-2">-2</option><option value="-1">-1</option><option value="0" selected>0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option></select></td>
        <td>装备近PD：<select size="1" id="st_eqhpd" name="st_eqhpd" onChange="Set_Chr(this)"><option value="0" selected>+0%</option><option value="1">+1%</option><option value="2">+2%</option><option value="3">+3%</option><option value="4">+4%</option><option value="5">+5%</option><option value="6">+6%</option><option value="7">+7%</option><option value="8">+8%</option><option value="9">+9%</option><option value="10">+10%</option><option value="11">+11%</option><option value="12">+12%</option><option value="13">+13%</option><option value="14">+14%</option><option value="15">+15%</option><option value="16">+16%</option><option value="17">+17%</option><option value="18">+18%</option><option value="19">+19%</option><option value="20">+20%</option></select></td>
        <td>装备魔PD：<select size="1" id="st_eqmpd" name="st_eqmpd" onChange="Set_Chr(this)"><option value="0" selected>+0%</option><option value="1">+1%</option><option value="2">+2%</option><option value="3">+3%</option><option value="4">+4%</option><option value="5">+5%</option><option value="6">+6%</option><option value="7">+7%</option><option value="8">+8%</option><option value="9">+9%</option><option value="10">+10%</option><option value="11">+11%</option><option value="12">+12%</option><option value="13">+13%</option><option value="14">+14%</option><option value="15">+15%</option><option value="16">+16%</option><option value="17">+17%</option><option value="18">+18%</option><option value="19">+19%</option><option value="20">+20%</option></select></td>
        <td>魔赋防御：<select size="1" id="st_def" name="st_def" onChange="Set_Chr(this)"><option value="-10">-10</option><option value="-9">-9</option><option value="-8">-8</option><option value="-7">-7</option><option value="-6">-6</option><option value="-5">-5</option><option value="-4">-4</option><option value="-3">-3</option><option value="-2">-2</option><option value="-1">-1</option><option value="0" selected>0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option></select></td>
        <td>防御技能：<select size="1" id="st_dsk" name="st_dsk" onChange="Set_Chr(this)"><option value="16" selected>练习</option><option value="15">F</option><option value="14">E</option><option value="13">D</option><option value="12">C</option><option value="11">B</option><option value="10">A</option><option value="9">9</option><option value="8">8</option><option value="7">7</option><option value="6">6</option><option value="5">5</option><option value="4">4</option><option value="3">3</option><option value="2">2</option><option value="1">1</option></select></td>
      </tr>
      <tr>
        <td>装备保护：<select size="1" id="st_eqpro" name="st_eqpro" onChange="Set_Chr(this)"><option value="-5">-5</option><option value="-4">-4</option><option value="-3">-3</option><option value="-2">-2</option><option value="-1">-1</option><option value="0" selected>0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option></select></td>
        <td>装备远PD：<select size="1" id="st_eqnpd" name="st_eqnpd" onChange="Set_Chr(this)"><option value="0" selected>+0%</option><option value="1">+1%</option><option value="2">+2%</option><option value="3">+3%</option><option value="4">+4%</option><option value="5">+5%</option><option value="6">+6%</option><option value="7">+7%</option><option value="8">+8%</option><option value="9">+9%</option><option value="10">+10%</option><option value="11">+11%</option><option value="12">+12%</option><option value="13">+13%</option><option value="14">+14%</option><option value="15">+15%</option><option value="16">+16%</option><option value="17">+17%</option><option value="18">+18%</option><option value="19">+19%</option><option value="20">+20%</option></select></td>
        <td></td>
        <td>魔赋保护：<select size="1" id="st_pro" name="st_pro" onChange="Set_Chr(this)"><option value="-10">-10</option><option value="-9">-9</option><option value="-8">-8</option><option value="-7">-7</option><option value="-6">-6</option><option value="-5">-5</option><option value="-4">-4</option><option value="-3">-3</option><option value="-2">-2</option><option value="-1">-1</option><option value="0" selected>0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option></select></td>
        <td></td>
      </tr>
      <tr>
        <td width="740" align="right" colspan="5"><select size="1" id="chr_cookie" name="chr_cookie"><option value="0">装备改造计算机记忆卡</option><option value="1">1 : Loading</option><option value="2">2 : Loading</option><option value="3">3 : Loading</option><option value="4">4 : Loading</option><option value="5">5 : Loading</option><option value="6">6 : Loading</option><option value="7">7 : Loading</option><option value="8">8 : Loading</option><option value="9">9 : Loading</option></select>　<input type="button" value="写入" onClick="Save_Cookie_Value()"> <input type="button" value="读取" onClick="Load_Cookie_Value()"><font color="#FFFFFF">＿</font></td>
      </tr>
      <tr>
        <td width="740" align="center" colspan="5">　</td>
      </tr>
    </form></table>
    <table border="0" cellpadding="2" cellspacing="2" style="border-collapse: collapse" bordercolor="#111111" width="740">
      <tr>
        <td width="80" align="center" bgcolor="#DDDDDD" rowspan="2"><input type="button" value="60式" onClick="Exp_Count(1,2,0,0,0)"></td>
        <td width="460" align="center" bgcolor="#DDDDDD"><script Language="JavaScript">Get_Reform_Name(1,2,0,0,0);</script></td>
        <td width="200" align="center" bgcolor="#DDDDDD">防御重视取向</td>
      </tr>
      <tr>
        <td width="660" align="center" colspan="2"><span id=exp_1>(Loading...)</span></td>
      </tr>
      <tr>
        <td width="80" align="center" bgcolor="#DDDDDD" rowspan="2"><input type="button" value="80式" onClick="Exp_Count(2,2,0,0,0)"></td>
        <td width="460" align="center" bgcolor="#DDDDDD"><script Language="JavaScript">Get_Reform_Name(2,2,0,0,0);</script></td>
        <td width="200" align="center" bgcolor="#DDDDDD">近距离防御重视取向</td>
      </tr>
      <tr>
        <td width="660" align="center" colspan="2"><span id=exp_2>(Loading...)</span></td>
      </tr>
    </table>
    <table border="0" cellpadding="2" cellspacing="2" style="border-collapse: collapse" bordercolor="#111111" width="740">
      <tr>
        <td width="740" align="right"><b>※盾防加成是以当装备盾成功防御近距离攻击时所加成的防御</b></td>
      </tr>
    </table>
<script Language="JavaScript">Set_EX_Value();Get_Cookie_Value();</script>

</center>
    </div>   <center><br><br><br>

<?php
include("foot.html")
?><br> 
    <br> </center></td>
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
$htmlstr = ob_get_contents();
ob_end_clean();
outhtml($htmlstr);
?>