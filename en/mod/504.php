<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel=stylesheet type="text/css" href="css.css">
<title>Mabinogi Equipment Upgrade - Mabibook.com</title>
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
  </tr>
  <tr>
    <td width="780" height="700" valign="top">
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

<script language="JavaScript" type="text/JavaScript">
<!--
//【变数宣告】------------------------------------------------------------------------------------
w_hit = 0;

//Array格 Style： = [min,max,cri,bal,miw,maw,dur,e1,e2,e3,e4,e5,e6];
w_raw = [5,22,20,55,25,100,11,1800,0,0,0,0,0];
w_add = [0,0,0,0,0,0,0,0,0,0,0,0,0];
w_bef = [0,0,0,0,0,0,0,0,0,0,0,0,0];
w_ad2 = [0,0,0,0,0,0,0,0,0,0,0,0,0];
w_aft = [0,0,0,0,0,0,0,0,0,0,0,0,0];
w_sat = [0,0,0,0,0,0,0,0,0,0,0,0,0];
w_equ = [0,0,0,0,0,0,0,0,0,0,0,0,0];
w_emp = [0,0,0,0,0,0,0,0,0,0,0,0,0];

//Array格 Style： = [str,dex,wil,luk,min,max,cri,bal,miw,maw];
w_pre = [0,0,0,0,0,0,0,0,0,0];
w_suf = [0,0,0,0,0,0,0,0,0,0];


//改造处方
menu_ea = 1;
menu_md = [0,,,,,];
menu_na = ["Range","","","","",""];
menu_0 = [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];	order_0 = [true,true,true,true,true];
menu_1 = [0,0,0,1,0,0,0,0,0,0,0,0,0,7,300,"Bow Back Refinement 1"];	order_1 = [true,true,true,true,true];
menu_2 = [0,0,0,2,0,0,0,0,0,0,0,0,0,10,600,"Bow Back Refinement 2"];	order_2 = [true,true,true,true,false];
menu_3 = [0,0,0,3,0,0,0,0,0,0,0,0,0,13,900,"Bow Back Refinement 3"];	order_3 = [true,true,true,false,false];
menu_4 = [0,0,0,4,0,0,0,0,0,0,0,0,0,16,1500,"Bow Back Refinement 4"];	order_4 = [true,true,false,false,false];
menu_5 = [0,1,0,-1,0,0,0,0,0,0,0,0,0,5,600,"Bow String Strengthening 1"];	order_5 = [true,true,true,true,true];
menu_6 = [0,2,0,-2,0,0,0,0,0,0,0,0,0,11,1600,"Bow String Strengthening 2"];	order_6 = [false,true,true,true,true];
menu_7 = [0,3,0,-3,0,0,0,0,0,0,0,0,0,25,3600,"Bow String Strengthening 3"];	order_7 = [false,false,true,true,true];
menu_8 = [0,4,0,-4,0,0,0,0,0,0,0,0,0,37,6600,"Bow String Strengthening 4"];	order_8 = [false,false,false,true,true];
menu_9 = [0,5,0,-5,0,0,0,0,0,0,0,0,0,47,10600,"Bow String Strengthening 5"];	order_9 = [false,false,false,false,true];
menu_10 = [3,0,0,0,0,0,0,0,0,0,0,0,0,20,3000,"Sight Change"];	order_10 = [true,true,true,true,false];
menu_11 = [0,0,4,0,0,0,0,0,0,0,0,0,0,20,2500,"Bow Tip Enhancement"];	order_11 = [false,true,true,false,false];
menu_12 = [5,-5,0,0,0,0,0,0,0,0,0,0,0,30,3000,"Oiling"];	order_12 = [true,false,false,false,false];
menu_13 = [0,5,0,5,-10,0,0,100,0,0,0,0,0,70,18000,"Aranwen's Enhancement"];	order_13 = [true,false,false,false,false];
menu_14 = [5,0,5,-5,-10,0,0,0,0,0,0,0,0,65,12000,"Ferghus' Modification"];	order_14 = [false,false,false,true,true];
menu_am = 14;

//Area例格 Style = [name,order0,order1,order2,order3,order4,6,7存order条列,8存能力,9存价格,10存熟练]
example_1 = ["177 Style",13,10,10,10,9,"Common Style","","",0,0];
example_2 = ["190 Style",13,6,7,8,9,"High DamageDamage","","",0,0];
example_3 = ["194 Style",13,10,10,8,9,"High DamageDamage","","",0,0];
example_4 = ["194-2 Style",13,11,11,8,9,"High DamageDamage","","",0,0];
example_5 = ["199 Style",13,11,7,8,9,"High DamageDamage","","",0,0];
example_6 = ["218 Style",13,6,7,14,9,"High DamageDamage","","",0,0];
example_7 = ["222 Style",13,11,11,14,9,"Common Style","","",0,0];
example_8 = ["227 Style",13,11,7,14,9,"Common Style","","",0,0];
example_9 = ["240 Style",13,10,10,14,14,"Damage","","",0,0];
example_10 = ["240-2 Style",13,11,11,14,14,"Cri","","",0,0];
example_11 = ["*0 Style",0,0,0,0,0,"My File","→","Dam:",0,0];
example_12 = ["*0 Style",0,0,0,0,0,"My File","→","Dam:",0,0];
example_13 = ["*0 Style",0,0,0,0,0,"My File","→","Dam:",0,0];
example_14 = ["*0 Style",0,0,0,0,0,"My File","→","Dam:",0,0];
example_15 = ["*0 Style",0,0,0,0,0,"My File","→","Dam:",0,0];
example_16 = ["*0 Style",0,0,0,0,0,"My File","→","Dam:",0,0];
example_17 = ["*0 Style",0,0,0,0,0,"My File","→","Dam:",0,0];
example_18 = ["*0 Style",0,0,0,0,0,"My File","→","Dam:",0,0];
example_19 = ["*0 Style",0,0,0,0,0,"My File","→","Dam:",0,0];
example_20 = ["*0 Style",0,0,0,0,0,"My File","→","Dam:",0,0];
example_21 = ["*0 Style",0,0,0,0,0,"My File","→","Dam:",0,0];
example_am = 21;
example_arr = new Array(21);
example_arr2 = new Array(21);
example_ave = new Array(21);
example_avc = new Array(21);

exmode =true;
enlist = ["力量","敏捷","意志","幸运","Low DamageDamage","High DamageDamage","Cri","损害Balance","Low DamageInjury","High DamageInjury"];
dolist = ["min","max","cri","bal","miw","maw","dur","e1","e2","e3","e4","e5","e6"];
rklist = ["1","2","3","4","5","6","7","8","9","A","B","C","D","E","F"];
checkbox_order=[0,0,0,0,0];
checkbox_temp=[0,0,0,0,0];
cri_skill = 0.5;
w_tmp = [0,0,0,0,0];
temp = 0;
temp_a = 0;
temp_b = 0;
temp_key = 0;
temp_max = 0;

for (i=1;i<=example_am;i++){
	Str = "";
	for (j=1;j<=5;j++) {
		Str = Str + "→";
		if (eval("example_"+i+'[j]')!=0) {
			Str = Str + eval("menu_"+eval("example_"+i+'[j]')+"[15]");
		} else {
			Str = Str + "x";
		}
	}
	eval("example_"+i+"[7] = Str.substr(1)");
}
for (i=1;i<=example_am;i++){
	example_arr[i-1] = i;
}

//【记录处理】------------------------------------------------------------------------------------
nolist = ["1","2","3","4","5","6","7","8","9","10"];
MC_ID = "0101";
MC_Temp = 0;
MC2_Temp = 0;
MC3_Temp = 0;
//起始+除错
function Start_Memory_Card(){
	k=0;
	//从Cookie输出表单(改造单元)
	arrCookie = document.cookie.split("; ");
	for(i=0;i<arrCookie.length;i++){
		//改造单元
		if(arrCookie[i].substr(0,11)=="MgbRF3W"+MC_ID){
			temp = example_am - 10 + eval(arrCookie[i].substr(11,1));
			arrCookie2 = (arrCookie[i].split("="))[1].split("/");
			//验证除错开始
			if (eval("order_"+arrCookie2[0]+"[0]==true")&&eval("order_"+arrCookie2[1]+"[1]==true")&&eval("order_"+arrCookie2[2]+"[2]==true")&&eval("order_"+arrCookie2[3]+"[3]==true")&&eval("order_"+arrCookie2[4]+"[4]==true")) {
				//资料合法
				eval("example_"+temp+"[0]='*'+"+(eval("menu_"+arrCookie2[0]+"[13]") + eval("menu_"+arrCookie2[1]+"[13]") + eval("menu_"+arrCookie2[2]+"[13]") + eval("menu_"+arrCookie2[3]+"[13]") + eval("menu_"+arrCookie2[4]+"[13]"))+"+' Style'");
				for(j=1;j<6;j++){
					eval("example_"+temp+"[j]=arrCookie2[j-1]")
				}
				Str = "";
				for (j=1;j<=5;j++) {
					Str = Str + "→";
					if (eval("example_"+temp+'[j]')!=0) {
						Str = Str + eval("menu_"+eval("example_"+temp+'[j]')+"[15]");
					} else {
						Str = Str + "x";
					}
				}
				eval("example_"+temp+"[7] = Str.substr(1)");
				eval("example_"+temp+"[6] = 'My File"+nolist[eval(arrCookie[i].substr(11,1))]+"'");
			} else {
				//资料过期，执行Del
				var expires = new Date();
				expires.setTime(expires.getTime() - 1000);
				document.cookie = "MgbRF3W" + MC_ID + arrCookie[i].substr(11,1) + "=0/0/0/0/0 ; expires=" + expires.toGMTString();
				k++;
			}
		}
		//素质单元
		if(arrCookie[i].substr(0,7)=="MgbRF3C"){
			temp = eval(arrCookie[i].substr(7,1));
			arrCookie2 = (arrCookie[i].split("="))[1].split("/");
			chrsat.mc2_sel.options[temp+1].text = "(" + nolist[temp] + ") " + arrCookie2[0] + "/" + arrCookie2[1] + "/" + arrCookie2[2] + "/" + arrCookie2[3] + " : " + rklist[arrCookie2[4]-1] + "/" + rklist[arrCookie2[5]-1];
		}
		//Enchant 单元
		if(arrCookie[i].substr(0,7)=="MgbRF3E"){
			temp = eval(arrCookie[i].substr(7,2));
			arrCookie2 = (arrCookie[i].split("="))[1].split("/");
			chrsat.mc3_sel.options[temp+1].text = "(" + ((temp+1)<10?"0"+(temp+1):(temp+1)) + ") 力" + arrCookie2[0] + ".敏" + arrCookie2[1] + ".意" + arrCookie2[2] + ".幸" + arrCookie2[3] + " / Low" + arrCookie2[4] + ".High" + arrCookie2[5] + ".Cri" + arrCookie2[6] + ".Balance" + arrCookie2[7] + ".Low" + arrCookie2[8] + ".High" + arrCookie2[9];
		}
	}
	if (k>0) { alert("The data is upgraded.All save data is clear."); }
	//印出表单
	j=0;
	for(i=0;i<10;i++){
		if (eval("example_"+(example_am-10+i)+"[1]!=0")||eval("example_"+(example_am-10+i)+"[2]!=0")||eval("example_"+(example_am-10+i)+"[3]!=0")||eval("example_"+(example_am-10+i)+"[4]!=0")||eval("example_"+(example_am-10+i)+"[5]!=0")) {
			exset.mc_sel.options[i+1].text = "(" + nolist[i] + ")　" + eval("example_"+(example_am-10+i)+"[0].substr(1)");
			j++;
		} else {
			exset.mc_sel.options[i+1].text = "(" + nolist[i] + ")　---";
		}
	}
	exset.mc_sel.options[0].text = "Upgrades Save Card (" + j + "/10)";
	Reform_6();


}

//从表单Save到Cookie(改造单元)
function Save_Reform(){
	if (MC_Temp>=1) {
		temp = example_am - 10 + MC_Temp - 1;
		var expires = new Date();
		expires.setTime(expires.getTime() + 60 * 24 * 60 * 60 * 1000);
		document.cookie = "MgbRF3W" + MC_ID + (MC_Temp-1) + "=" + checkbox_order[0] + "/" + checkbox_order[1] + "/" + checkbox_order[2] + "/" + checkbox_order[3] + "/" + checkbox_order[4] + " ; expires=" + expires.toGMTString();
		temp_a = (eval("menu_"+checkbox_order[0]+"[13]") + eval("menu_"+checkbox_order[1]+"[13]") + eval("menu_"+checkbox_order[2]+"[13]") + eval("menu_"+checkbox_order[3]+"[13]") + eval("menu_"+checkbox_order[4]+"[13]"));
		eval("example_"+temp+"=['*'+"+temp_a+"+' Style',"+checkbox_order[0]+","+checkbox_order[1]+","+checkbox_order[2]+","+checkbox_order[3]+","+checkbox_order[4]+"]");
		if (temp_a>0) {
			exset.mc_sel.options[MC_Temp].text = "(" + nolist[MC_Temp-1] + ")　" + eval("example_"+temp+"[0].substr(1)");
			Str = "";
			for (j=1;j<=5;j++) {
				Str = Str + "→";
				if (eval("example_"+temp+'[j]')!=0) {
					Str = Str + eval("menu_"+eval("example_"+temp+'[j]')+"[15]");
				} else {
					Str = Str + "x";
				}
			}
			eval("example_"+temp+"[7] = Str.substr(1)");
			eval("example_"+temp+"[6] = 'My File"+nolist[MC_Temp-1]+"'");
		} else {
			exset.mc_sel.options[MC_Temp].text = "(" + nolist[MC_Temp-1] + ")　---";
		}
		Update_Reform();
	}
}

//DelCookie(改造单元)
function Delete_Reform(){
	if (MC_Temp>=1) {
		var expires = new Date();
		expires.setTime(expires.getTime() - 1000);
		document.cookie = "MgbRF3W" + MC_ID + (MC_Temp-1) + "=0/0/0/0/0 ; expires=" + expires.toGMTString();
		eval("example_"+(example_am - 10 + MC_Temp - 1)+"=['*0 Style',0,0,0,0,0]");
		exset.mc_sel.options[MC_Temp].text = "(" + nolist[MC_Temp-1] + ")　---";
		Update_Reform();
	}
}

//更新Upgrades总笔数
function Update_Reform(){
	j=0;
	for(i=0;i<10;i++){
		if (eval("example_"+(example_am-10+i)+"[1]!=0")||eval("example_"+(example_am-10+i)+"[2]!=0")||eval("example_"+(example_am-10+i)+"[3]!=0")||eval("example_"+(example_am-10+i)+"[4]!=0")||eval("example_"+(example_am-10+i)+"[5]!=0")) {
			j++;
		}
	}
	exset.mc_sel.options[0].text = "Upgrades Save Card (" + j + "/10)";
	Reform_6();
}

//从表单Save到Cookie(素质单元)

//从CookieLoad到表单(素质单元)


//【数值处理】------------------------------------------------------------------------------------
//正值叫增加 | 负值叫减少 | 零为不变化
function Add_Text(val){
	if (val>0) {
		return "增加 " + val + " 点";
	} else if (val<0) {
		return "减少 " + Math.abs(val) + " 点";
	} else {
		return "不变化"
	}
}

//阵列负值归零
function Array_Plus(arrayname){
	for (k=0;k<=5;k++){
		//Dura bility及特殊值不取正值
		eval(arrayname+"[k] = Math.max("+arrayname+"[k],0)");
	}
}

//Special upgrade格 Style输出
function Ex_Menu(val,md){
	if(md==0) {return val;}
	if(md==1) {return (val>0?"+" + val:val);}
	if(md==2) {return "-" + val.toFixed(2) + "s";}
	if(md==3) {return "+" + val + "%";}
	if(md==4) {return "×" + Math.min(val,100).toPrecision(3);}
	if(md==5) {return val + "%";}
}

//计算Damage
function C_Average(min_dmg,max_dmg,bal,ple){
	bal = Math.min(bal,100);
	min_dmg = Math.min(min_dmg,max_dmg);
	ave_dmg = (max_dmg - min_dmg) * bal /100 + min_dmg;
	ave_dmg = ave_dmg * ple;
	return (Math.round(ave_dmg*100)/100).toFixed(2);
}

//计算Cri
function C_Cri(ave_dmg,max_dmg,cri,ple){
	cri = Math.min(cri,30);
	avecri_dmg = (max_dmg*(cri/100)*cri_skill) + ave_dmg;
	avecri_dmg = avecri_dmg * ple;
	return (Math.round(avecri_dmg*100)/100).toFixed(2);
}

//【选单控制】------------------------------------------------------------------------------------
//选单off
function Off_Checkbox(nowselect,orderplace){
	checkbox_order[orderplace] = nowselect;
	/*if (nowselect==0) {
		for (i=1;i<=menu_am;i++){
			if (eval("order_"+i+"[orderplace]"))  { eval("document.reform.r"+i+"_"+orderplace+".disabled = false;") }
		}
	} else {
		for (i=1;i<=menu_am;i++){
			if (eval("order_"+i+"[orderplace]"))  { eval("document.reform.r"+i+"_"+orderplace+".disabled = true;") }
		}
		eval("document.reform.r"+nowselect+"_"+orderplace+".disabled = false;")
	}*/
	if (nowselect!=0) {
		for (i=1;i<=menu_am;i++){
			if (eval("order_"+i+"[orderplace]"))  { eval("document.reform.r"+i+"_"+orderplace+".checked = false;") }
		}
		eval("document.reform.r"+nowselect+"_"+orderplace+".checked = true;")
	}
	Reform_3();
}

//选单重置
function Reset_All(){
	checkbox_order=[0,0,0,0,0];
	/*/for (i=1;i<=menu_am;i++){
		for (j=0;j<=4;j++){
			if (eval("order_"+i+"[j]"))  { eval("document.reform.r"+i+"_"+j+".checked = false;") }
		}
	}*/
	Reform_3();
}

//加成设定重置


//Area例代入
function Exp_Sub(o0,o1,o2,o3,o4){
	checkbox_order=[o0,o1,o2,o3,o4];
	//clear all
	/*for (i=1;i<=menu_am;i++){
		for (j=0;j<=4;j++){
			if (eval("order_"+i+"[j]"))  { eval("document.reform.r"+i+"_"+j+".disabled = false;") }
			if (eval("order_"+i+"[j]"))  { eval("document.reform.r"+i+"_"+j+".checked  = false;") }
		}
	}
	//0
	if (o0>0) {
		for (i=1;i<=menu_am;i++){
			if (eval("order_"+i+"[0]"))  { eval("document.reform.r"+i+"_0.disabled = true;") }
		}
		eval("document.reform.r"+o0+"_0.disabled = false;")
		eval("document.reform.r"+o0+"_0.checked  = true;")
	}
	//1
	if (o1>0) {
		for (i=1;i<=menu_am;i++){
			if (eval("order_"+i+"[1]"))  { eval("document.reform.r"+i+"_1.disabled = true;") }
		}
		eval("document.reform.r"+o1+"_1.disabled = false;")
		eval("document.reform.r"+o1+"_1.checked  = true;")
	}
	//2
	if (o2>0) {
		for (i=1;i<=menu_am;i++){
			if (eval("order_"+i+"[2]"))  { eval("document.reform.r"+i+"_2.disabled = true;") }
		}
		eval("document.reform.r"+o2+"_2.disabled = false;")
		eval("document.reform.r"+o2+"_2.checked  = true;")
	}
	//3
	if (o3>0) {
		for (i=1;i<=menu_am;i++){
			if (eval("order_"+i+"[3]"))  { eval("document.reform.r"+i+"_3.disabled = true;") }
		}
		eval("document.reform.r"+o3+"_3.disabled = false;")
		eval("document.reform.r"+o3+"_3.checked  = true;")
	}
	//4
	if (o4>0) {
		for (i=1;i<=menu_am;i++){
			if (eval("order_"+i+"[4]"))  { eval("document.reform.r"+i+"_4.disabled = true;") }
		}
		eval("document.reform.r"+o4+"_4.disabled = false;")
		eval("document.reform.r"+o4+"_4.checked  = true;")
	}*/
	for (i=1;i<=menu_am;i++){
		for (j=0;j<=4;j++){
			if (eval("order_"+i+"[j]"))  { eval("document.reform.r"+i+"_"+j+".checked  = false;") }
		}
	}
	if (o0>0) { eval("document.reform.r"+o0+"_0.checked  = true;") }
	if (o1>0) { eval("document.reform.r"+o1+"_1.checked  = true;") }
	if (o2>0) { eval("document.reform.r"+o2+"_2.checked  = true;") }
	if (o3>0) { eval("document.reform.r"+o3+"_3.checked  = true;") }
	if (o4>0) { eval("document.reform.r"+o4+"_4.checked  = true;") }
	Reform_3();
}

//自动更新Area例
function Exp_Mode(bl){
	exmode = bl;
	if (bl) {
		document.exset.exbutton.disabled = true;
		Reform_6();
	} else {
		document.exset.exbutton.disabled = false;
	}
}

//【计算流程】------------------------------------------------------------------------------------
//set add
function Reform_1(md){
	if(md==1) {
		switch (eval(weaponadd.st_add0.value)){
			case 0:  w_tmp = [0,0,0,0,0];	break;	//No
			case 1:  w_tmp = [0,1,0,1,2];	break;	//D-
			case 2:  w_tmp = [0,1,1,2,3];	break;	//D
			case 3:  w_tmp = [1,1,1,2,3];	break;	//D+
			case 4:  w_tmp = [1,1,1,3,4];	break;	//C
			case 5:  w_tmp = [1,1,2,4,4];	break;	//C+
			case 6:  w_tmp = [1,2,2,4,4];	break;	//B
			case 7:  w_tmp = [1,2,3,5,5];	break;	//B+
			case 8:  w_tmp = [2,2,3,6,5];	break;	//A
			case 9:  w_tmp = [2,2,4,7,5];	break;	//A+
			case 10: w_tmp = [2,2,4,8,5];	break;	//S
			case 11: w_tmp = [2,2,5,9,5];	break;	//S+
			case 12: w_tmp = [2,2,5,10,5];	break;	//X
			default: w_tmp = [0,0,0,0,0];
		}
	} else if(md==2) {
		w_tmp[0] = eval(weaponadd.st_add1.value);
		w_tmp[1] = eval(weaponadd.st_add2.value);
		w_tmp[2] = eval(weaponadd.st_add3.value);
		w_tmp[3] = eval(weaponadd.st_add4.value);
		w_tmp[4] = eval(weaponadd.st_add5.value);
	} else {
		w_tmp = [0,0,0,0,0];
	}
	if (confirm('IF Set to\nLow DamageDamage→'+Add_Text(w_tmp[0])+'\nHigh DamageDamage→'+Add_Text(w_tmp[1])+'\nCri　→'+Add_Text(w_tmp[2])+'\nBalance　→'+Add_Text(w_tmp[3])+'\nDura bility　→'+Add_Text(w_tmp[4])+'')) {
		w_add[0] = w_tmp[0];
		w_add[1] = w_tmp[1];
		w_add[2] = w_tmp[2];
		w_add[3] = w_tmp[3];
		w_add[6] = w_tmp[4];
	}
	Reform_2();
}

//raw+add-->bef
function Reform_2(){
	for (i=0;i<=6;i++){
		w_bef[i] = w_raw[i] + w_add[i];
		document.getElementById('bef_'+dolist[i]).innerHTML = w_bef[i];
	}
	for (i=7;i<=6+menu_ea;i++){
		w_bef[i] = w_raw[i] + w_add[i];
		document.getElementById('bef_'+dolist[i]).innerHTML = Ex_Menu(w_bef[i],menu_md[i-7]);
	}
	document.getElementById('bef_ave').innerHTML = C_Average(w_bef[0],w_bef[1],w_bef[3],1);
	if (w_hit>0) {document.getElementById('bef_aven').innerHTML = C_Average(w_bef[0],w_bef[1],w_bef[3],w_hit+1);}
	Reform_3();
}

//bef+ad2+ref-->aft
function Reform_3(){
	for (i=0;i<=6;i++){
		w_aft[i] = w_bef[i] + eval("menu_"+checkbox_order[0]+"[i]");
		Array_Plus('w_aft');
		w_aft[i] = w_aft[i] + eval("menu_"+checkbox_order[1]+"[i]");
		Array_Plus('w_aft');
		w_aft[i] = w_aft[i] + eval("menu_"+checkbox_order[2]+"[i]");
		Array_Plus('w_aft');
		w_aft[i] = w_aft[i] + eval("menu_"+checkbox_order[3]+"[i]");
		Array_Plus('w_aft');
		w_aft[i] = w_aft[i] + eval("menu_"+checkbox_order[4]+"[i]");
		Array_Plus('w_aft');
		document.getElementById('aft_'+dolist[i]).innerHTML = w_aft[i];
		document.getElementById('def_'+dolist[i]).innerHTML = w_aft[i] - w_bef[i];
	}
	for (i=7;i<=6+menu_ea;i++){
		if (menu_md[i-7]==4) {
		w_aft[i] = w_bef[i] * Math.max(eval("menu_"+checkbox_order[0]+"[i]"),1);
		Array_Plus('w_aft');
		w_aft[i] = w_aft[i] * Math.max(eval("menu_"+checkbox_order[1]+"[i]"),1);
		Array_Plus('w_aft');
		w_aft[i] = w_aft[i] * Math.max(eval("menu_"+checkbox_order[2]+"[i]"),1);
		Array_Plus('w_aft');
		w_aft[i] = w_aft[i] * Math.max(eval("menu_"+checkbox_order[3]+"[i]"),1);
		Array_Plus('w_aft');
		w_aft[i] = w_aft[i] * Math.max(eval("menu_"+checkbox_order[4]+"[i]"),1);
		Array_Plus('w_aft');
		document.getElementById('aft_'+dolist[i]).innerHTML = Ex_Menu(w_aft[i],menu_md[i-7]);
		document.getElementById('def_'+dolist[i]).innerHTML = Ex_Menu((w_aft[i]-w_bef[i])+1,menu_md[i-7]);
		} else {
		w_aft[i] = w_bef[i] + eval("menu_"+checkbox_order[0]+"[i]");
		Array_Plus('w_aft');
		w_aft[i] = w_aft[i] + eval("menu_"+checkbox_order[1]+"[i]");
		Array_Plus('w_aft');
		w_aft[i] = w_aft[i] + eval("menu_"+checkbox_order[2]+"[i]");
		Array_Plus('w_aft');
		w_aft[i] = w_aft[i] + eval("menu_"+checkbox_order[3]+"[i]");
		Array_Plus('w_aft');
		w_aft[i] = w_aft[i] + eval("menu_"+checkbox_order[4]+"[i]");
		Array_Plus('w_aft');
		document.getElementById('aft_'+dolist[i]).innerHTML = Ex_Menu(w_aft[i],menu_md[i-7]);
		document.getElementById('def_'+dolist[i]).innerHTML = Ex_Menu(w_aft[i]-w_bef[i],menu_md[i-7]);
		}
	}
	document.getElementById('def_pra').innerHTML = eval("menu_"+checkbox_order[0]+"[13]") + eval("menu_"+checkbox_order[1]+"[13]") + eval("menu_"+checkbox_order[2]+"[13]") + eval("menu_"+checkbox_order[3]+"[13]") + eval("menu_"+checkbox_order[4]+"[13]");
	document.getElementById('def_pri').innerHTML = eval("menu_"+checkbox_order[0]+"[14]") + eval("menu_"+checkbox_order[1]+"[14]") + eval("menu_"+checkbox_order[2]+"[14]") + eval("menu_"+checkbox_order[3]+"[14]") + eval("menu_"+checkbox_order[4]+"[14]");
	document.getElementById('aft_ave').innerHTML = C_Average(w_aft[0],w_aft[1],w_aft[3],1);
	if (w_hit>0) {document.getElementById('aft_aven').innerHTML = C_Average(w_aft[0],w_aft[1],w_aft[3],w_hit+1);}
	Reform_4();
}

//aft+sat-->equ
function Reform_4(){
	for (i=0;i<=6+menu_ea;i++){
		w_equ[i] = w_aft[i] + w_sat[i];
	}
	Array_Plus('w_equ');

	//High Injury压Low Injury
	//w_equ[0] = Math.min(w_equ[0],w_equ[1])
	//Balance上限80%
	w_equ[3] = Math.min(w_equ[3],80)
	//Low Injury上限100%
	w_equ[4] = Math.min(w_equ[4],100)
	//High Injury上限100%
	w_equ[5] = Math.min(w_equ[5],100)
	//High负压Low负
	//w_equ[4] = Math.min(w_equ[4],w_equ[5])

	for (i=0;i<=6;i++){
		document.getElementById('equ_'+dolist[i]).innerHTML = w_equ[i];
	}
	for (i=7;i<=6+menu_ea;i++){
		document.getElementById('equ_'+dolist[i]).innerHTML = Ex_Menu(w_equ[i],menu_md[i-7]);
	}
	temp = C_Average(w_equ[0],w_equ[1],w_equ[3],1);
	document.getElementById('equ_ave').innerHTML = temp;
	if (w_hit>0) {document.getElementById('equ_aven').innerHTML = C_Average(w_equ[0],w_equ[1],w_equ[3],w_hit+1);}
	document.getElementById('equ_avecri').innerHTML = C_Cri(eval(temp),w_equ[1],w_equ[2],1);
	if (w_hit>0) {document.getElementById('equ_avecrin').innerHTML = C_Cri(eval(temp),w_equ[1],w_equ[2],w_hit+1);}
}

//set sat

//set example
function Reform_6(){
	for (j=1;j<=example_am;j++){
		for (i=0;i<=6;i++){
			w_emp[i] = w_bef[i] + eval("menu_"+eval("example_"+j+'[1]')+"[i]");
			Array_Plus('w_emp');
			w_emp[i] = w_emp[i] + eval("menu_"+eval("example_"+j+'[2]')+"[i]");
			Array_Plus('w_emp');
			w_emp[i] = w_emp[i] + eval("menu_"+eval("example_"+j+'[3]')+"[i]");
			Array_Plus('w_emp');
			w_emp[i] = w_emp[i] + eval("menu_"+eval("example_"+j+'[4]')+"[i]");
			Array_Plus('w_emp');
			w_emp[i] = w_emp[i] + eval("menu_"+eval("example_"+j+'[5]')+"[i]");
			Array_Plus('w_emp');
		}
		for (i=7;i<=6+menu_ea;i++){
			if (menu_md[i-7]==4) {
				w_emp[i] = w_bef[i] * Math.max(eval("menu_"+eval("example_"+j+'[1]')+"[i]"),1);
				Array_Plus('w_emp');
				w_emp[i] = w_emp[i] * Math.max(eval("menu_"+eval("example_"+j+'[2]')+"[i]"),1);
				Array_Plus('w_emp');
				w_emp[i] = w_emp[i] * Math.max(eval("menu_"+eval("example_"+j+'[3]')+"[i]"),1);
				Array_Plus('w_emp');
				w_emp[i] = w_emp[i] * Math.max(eval("menu_"+eval("example_"+j+'[4]')+"[i]"),1);
				Array_Plus('w_emp');
				w_emp[i] = w_emp[i] * Math.max(eval("menu_"+eval("example_"+j+'[5]')+"[i]"),1);
				Array_Plus('w_emp');
			} else {
				w_emp[i] = w_bef[i] + eval("menu_"+eval("example_"+j+'[1]')+"[i]");
				Array_Plus('w_emp');
				w_emp[i] = w_emp[i] + eval("menu_"+eval("example_"+j+'[2]')+"[i]");
				Array_Plus('w_emp');
				w_emp[i] = w_emp[i] + eval("menu_"+eval("example_"+j+'[3]')+"[i]");
				Array_Plus('w_emp');
				w_emp[i] = w_emp[i] + eval("menu_"+eval("example_"+j+'[4]')+"[i]");
				Array_Plus('w_emp');
				w_emp[i] = w_emp[i] + eval("menu_"+eval("example_"+j+'[5]')+"[i]");
				Array_Plus('w_emp');
		}
		}
		for (i=0;i<=6+menu_ea;i++){
			w_emp[i] = w_emp[i] + w_sat[i];
		}
		Array_Plus('w_emp');

		//High Injury压Low Injury
		//w_emp[0] = Math.min(w_emp[0],w_emp[1])
		//Balance上限80%
		w_emp[3] = Math.min(w_emp[3],80)
		//Low Injury上限100%
		w_emp[4] = Math.min(w_emp[4],100)
		//High Injury上限100%
		w_emp[5] = Math.min(w_emp[5],100)
		//High负压Low负
		//w_emp[4] = Math.min(w_emp[4],w_emp[5])

		example_ave[j-1] = C_Average(w_emp[0],w_emp[1],w_emp[3],1);
		example_avc[j-1] = C_Cri(eval(example_ave[j-1]),w_emp[1],w_emp[2],1);

		temp = eval("menu_"+eval("example_"+j+'[1]')+"[14]") + eval("menu_"+eval("example_"+j+'[2]')+"[14]") + eval("menu_"+eval("example_"+j+'[3]')+"[14]") + eval("menu_"+eval("example_"+j+'[4]')+"[14]") + eval("menu_"+eval("example_"+j+'[5]')+"[14]");
		eval("example_"+j+"[9] = temp");

		temp = eval("menu_"+eval("example_"+j+'[1]')+"[13]") + eval("menu_"+eval("example_"+j+'[2]')+"[13]") + eval("menu_"+eval("example_"+j+'[3]')+"[13]") + eval("menu_"+eval("example_"+j+'[4]')+"[13]") + eval("menu_"+eval("example_"+j+'[5]')+"[13]");
		eval("example_"+j+"[10] = temp");

		eval("example_"+j+"[8] = 'Dam:"+w_emp[0]+"~"+w_emp[1]+" | Cri:"+w_emp[2]+"% | Bal:"+w_emp[3]+"% | Inj:"+w_emp[4]+"%~"+w_emp[5]+"%'");
		for (i=7;i<=6+menu_ea;i++){
			if (w_emp[i]!=0) { eval("example_"+j+"[8] += ' | "+menu_na[i-7]+":"+Ex_Menu(w_emp[i],menu_md[i-7])+"'"); }
		}
		eval("example_"+j+"[8] += ' | Dur:<b><u><font color=#008000>"+w_emp[6]+"</font></u></b> | Cost:<b><u><font color=#808000>"+eval("example_"+j+"[9]")+"</font></u></b> | F:<b><u><font color=#0000FF>"+example_ave[j-1]+"</font></u></b> | H:<b><u><font color=#FF0000>"+example_avc[j-1]+"</font></u></b>'");
	}
		Reform_7();
}

//example mode
function Reform_7(){
	switch (eval(exset.exp_print.value)){
		case 1:
			for (i=1;i<=example_am;i++){
				example_arr[i-1] = i;
			}
			break;
		case 2:
			for (i=1;i<=example_am;i++){
				example_arr[i-1] = i;
				example_arr2[i-1] = eval("example_"+i+"[10]");
			}
			//Selection Sort
			for (i=0;i<example_am-1;i++){
				temp_max=0;
				for (j=i;j<example_am;j++){
					if(eval(example_arr2[j])>eval(temp_max)) {temp_key = j; temp_max = example_arr2[j];}
				}
				temp = example_arr[temp_key];
				example_arr[temp_key] = example_arr[i];
				example_arr[i] = temp;
				temp = example_arr2[temp_key];
				example_arr2[temp_key] = example_arr2[i];
				example_arr2[i] = temp;
			}
			break;
		case 3:
			for (i=1;i<=example_am;i++){
				example_arr[i-1] = i;
				example_arr2[i-1] = eval("example_"+i+"[9]");
			}
			//Selection Sort
			for (i=0;i<example_am-1;i++){
				temp_max=0;
				for (j=i;j<example_am;j++){
					if(eval(example_arr2[j])>eval(temp_max)) {temp_key = j; temp_max = example_arr2[j];}
				}
				temp = example_arr[temp_key];
				example_arr[temp_key] = example_arr[i];
				example_arr[i] = temp;
				temp = example_arr2[temp_key];
				example_arr2[temp_key] = example_arr2[i];
				example_arr2[i] = temp;
			}
			break;
		case 4:
			for (i=1;i<=example_am;i++){
				example_arr[i-1] = i;
				example_arr2[i-1] = example_ave[i-1];
			}
			//Selection Sort
			for (i=0;i<example_am-1;i++){
				temp_max=0;
				for (j=i;j<example_am;j++){
					if(eval(example_arr2[j])>eval(temp_max)) {temp_key = j; temp_max = example_arr2[j];}
				}
				temp = example_arr[temp_key];
				example_arr[temp_key] = example_arr[i];
				example_arr[i] = temp;
				temp = example_arr2[temp_key];
				example_arr2[temp_key] = example_arr2[i];
				example_arr2[i] = temp;
			}
			break;
		case 5:
			for (i=1;i<=example_am;i++){
				example_arr[i-1] = i;
				example_arr2[i-1] = example_avc[i-1];
			}
			//Selection Sort
			for (i=0;i<example_am-1;i++){
				temp_max=0;
				for (j=i;j<example_am;j++){
					if(eval(example_arr2[j])>eval(temp_max)) {temp_key = j; temp_max = example_arr2[j];}
				}
				temp = example_arr[temp_key];
				example_arr[temp_key] = example_arr[i];
				example_arr[i] = temp;
				temp = example_arr2[temp_key];
				example_arr2[temp_key] = example_arr2[i];
				example_arr2[i] = temp;
			}
			break;
	}
	Reform_8();
}

//print example
function Reform_8(){
	Str = "";
	for (j=1;j<=example_am;j++){
		i = example_arr[j-1];
		if (eval("example_"+i+"[1]!=0")||eval("example_"+i+"[2]!=0")||eval("example_"+i+"[3]!=0")||eval("example_"+i+"[4]!=0")||eval("example_"+i+"[5]!=0")) {
			checkbox_temp = [eval("example_"+i+'[1]'),eval("example_"+i+'[2]'),eval("example_"+i+'[3]'),eval("example_"+i+'[4]'),eval("example_"+i+'[5]')];
			Str = Str + "<tr>";
			Str = Str + "<td width='80' align='center' bgcolor='#DDDDDD' rowspan='2'><input type='button' value='"+eval("example_"+i+'[0]')+"' style='color: #000000; border: 1px solid #848284; padding-top: 3px; padding-bottom: 0px; background-color: #FFFFFF' onclick='Exp_Sub("+checkbox_temp[0]+","+checkbox_temp[1]+","+checkbox_temp[2]+","+checkbox_temp[3]+","+checkbox_temp[4]+")'></td>";
			Str = Str + "<td width='460' align='center' bgcolor='#DDDDDD'>"+eval("example_"+i+'[7]')+"</td>";
			Str = Str + "<td width='200' align='center' bgcolor='#DDDDDD'>"+eval("example_"+i+'[6]')+"</td></tr>";
			Str = Str + "<tr><td width='660' align='center' colspan='2'>"+eval("example_"+i+'[8]')+"</td></tr>";
		}
	}
	document.getElementById('example').innerHTML = "<table border='0' cellpadding='2' cellspacing='2' style='border-collapse: collapse' bordercolor='#111111' width='740'>" + Str + "</table>";
}

//-->
</script>
    <table border="0" cellpadding="2" cellspacing="2" style="border-collapse: collapse" bordercolor="#111111" width="740">
      <tr>
        <td width="740" align="center" colspan="10">　</td>
      </tr>
      <tr>
        <td width="740" colspan="10"></td>
      </tr>
      <tr>
        <td width="740" colspan="10" bgcolor="#808080"><font color="#FFFFFF"></font></td>
      </tr>
      <tr>
        <td width="125" align="center" bgcolor="#EEEEEE">Name</td>
        <td width="94" align="center" bgcolor="#EEEEEE">Damage</td>
        <td width="47" align="center" bgcolor="#EEEEEE">Cri</td>
        <td width="47" align="center" bgcolor="#EEEEEE">Balance</td>
        <td width="94" align="center" bgcolor="#EEEEEE">Injury</td>
        <td width="47" align="center" bgcolor="#EEEEEE">Dura bility</td>
        <td width="47" align="center" bgcolor="#EEEEEE">Range</td>
        <td width="240" align="center" bgcolor="#EEEEEE" colspan="3">Repair Costs</td>
      </tr>
      <tr>
        <td width="740" align="center" colspan="10"><img border="0" src="linepic.gif"  width="100%" height="1"></td>
      </tr>
      <tr>
        <td width="125" align="center" bgcolor="#CCFFCC">Leather Long Bow</td>
        <td width="94" align="center" bgcolor="#EEFFEE">5 ~ 22</td>
        <td width="47" align="center" bgcolor="#EEFFEE">20%</td>
        <td width="47" align="center" bgcolor="#EEFFEE">55%</td>
        <td width="94" align="center" bgcolor="#EEFFEE">25% ~ 100%</td>
        <td width="47" align="center" bgcolor="#EEFFEE">11</td>
        <td width="47" align="center" bgcolor="#EEFFEE"><font color='#0000FF'>+1800</font></td><td width="80" align="center" bgcolor="#EEFFEE">　<br><font color="#993333">$ 67</font><br><a style='cursor: help' title='Ferghus | Elen'><u><font color="#AAAAAA">(90%)</font></u></a></td><td width="80" align="center" bgcolor="#EEFFEE">　<br><font color="#993333">$ 678</font><br><a style='cursor: help' title='Nerys | Osla | Nicca | Meles'><u><font color="#AAAAAA">(95%)</font></u></a></td><td width="80" align="center" bgcolor="#EEFFEE">　<br><font color="#993333">$ 1635</font><br><a style='cursor: help' title='Edern'><u><font color="#AAAAAA">(98%)</font></u></a></td>
      </tr>
      <tr>
        <td width="740" align="center" colspan="10">　</td>
      </tr>
    </table>
    <table border="0" cellpadding="2" cellspacing="2" style="border-collapse: collapse" bordercolor="#111111" width="740"><form name="weaponadd">
      <tr>
        <td width="740">
        <input type='button' value='Manual' style='color: #000000; border: 1px solid #848284; padding-top: 3px; padding-bottom: 0px; background"-color-"  #FFCCCC' OnClick="Reform_1(1);Reform_6()"> 
        <select size="1" id="st_add0" name="st_add0" disabled><option value="0" selected>【Low+0 High+0 Cri+0 Bal+0 Dur+0】</option><option value="1">D-【Low+0 High+1 Cri+0 Bal+1 Dur+2】</option><option value="2">Ｄ　【Low+0 High+1 Cri+1 Bal+2 Dur+3】</option><option value="3">D+【Low+1 High+1 Cri+1 Bal+2 Dur+3】</option><option value="4">C【Low+1 High+1 Cri+1 Bal+3 Dur+4】</option><option value="5">C+【Low+1 High+1 Cri+2 Bal+4 Dur+4】</option><option value="6">B【Low+1 High+2 Cri+2 Bal+4 Dur+4】</option><option value="7">B+【Low+1 High+2 Cri+3 Bal+5 Dur+5】</option><option value="8">A【Low+2 High+2 Cri+3 Bal+6 Dur+5】</option><option value="9">A+【Low+2 High+2 Cri+4 Bal+7 Dur+5】</option><option value="10">S【Low+2 High+2 Cri+4 Bal+8 Dur+5】</option><option value="11">S+【Low+2 High+2 Cri+5 Bal+9 Dur+5】</option><option value="12">X【Low+2 High+2 Cri+5 Bal+10 Dur+5】</option></select>
        　<input type='button' value='Monster' style='color: #000000; border: 1px solid #848284; padding-top: 3px; padding-bottom: 0px; background"-color-"  #FFCCCC' OnClick="Reform_1(2);Reform_6()"> 
        <select size="1" id="st_add1" name="st_add1"><option value="0" selected>Low</option><option value="1">+1</option><option value="2">+2</option><option value="3">+3</option></select>
        <select size="1" id="st_add2" name="st_add2"><option value="0" selected>High</option><option value="1">+1</option><option value="2">+2</option><option value="3">+3</option></select>
        <select size="1" id="st_add3" name="st_add3"><option value="0" selected>Cri</option><option value="1">+1</option><option value="2">+2</option><option value="3">+3</option></select>
        <select size="1" id="st_add4" name="st_add4"><option value="0" selected>Bal</option><option value="-6">-6</option><option value="-8">-8</option><option value="-10">-10</option><option value="-12">-12</option></select>
        <select size="1" id="st_add5" name="st_add5"><option value="0" selected>Dur</option><option value="1">+1</option><option value="2">+2</option><option value="3">+3</option><option value="4">+4</option></select>
        </td>
      </tr></form>
    </table>
    <table border="0" cellpadding="2" cellspacing="2" style="border-collapse: collapse" bordercolor="#111111" width="740"><form name="reform">
      <tr>
        <td width="740" colspan="12" bgcolor="#808080"><font color="#FFFFFF"></font></td>
      </tr>
      <tr>
        <td width="115" align="center" bgcolor="#EEEEEE">Upgrades</td>
        <td width="47" align="center" bgcolor="#EEEEEE"><a style="cursor: help" title="Low DamageDamage"><u>Low Damage</u></a></td>
        <td width="47" align="center" bgcolor="#EEEEEE"><a style="cursor: help" title="High DamageDamage"><u>High Damage</u></a></td>
        <td width="47" align="center" bgcolor="#EEEEEE"><a style="cursor: help" title="Cri"><u>Cri</u></a></td>
        <td width="47" align="center" bgcolor="#EEEEEE"><a style="cursor: help" title="Balance"><u>Balance</u></a></td>
        <td width="47" align="center" bgcolor="#EEEEEE"><a style="cursor: help" title="Low DamageInjury"><u>Low Injury</u></a></td>
        <td width="47" align="center" bgcolor="#EEEEEE"><a style="cursor: help" title="High DamageInjury"><u>High Injury</u></a></td>
        <td width="47" align="center" bgcolor="#EEEEEE"><a style="cursor: help" title="Dura bility"><u>Dura bility</u></a></td>
        <td width="47" align="center" bgcolor="#EEEEEE"><a style="cursor: help" title="Range"><u>Range</u></a></td>
        <td width="53" align="center" bgcolor="#EEEEEE">Pro ficiency</td>
        <td width="77" align="center" bgcolor="#EEEEEE">Upgrade costs</td>
        <td width="120" align="center" bgcolor="#EEEEEE">1&nbsp;&nbsp;2&nbsp;&nbsp;3&nbsp;&nbsp;4&nbsp;&nbsp;5</td>
      </tr>
      <tr>
        <td width="740" align="center" colspan="12"><img border="0" src="linepic.gif"  width="100%" height="1"></td>
      </tr>
      <tr>
        <td width="115" align="center" bgcolor="#EEEEEE"><a style="cursor: help" title="NPC:Ferghus | Nerys | 阿兰雯"><u>Bow Back Refinement 1</u></a></td>
        <td width="47" align="center" bgcolor="#EEEEEE"></td>
        <td width="47" align="center" bgcolor="#EEEEEE"></td>
        <td width="47" align="center" bgcolor="#EEEEEE"></td>
        <td width="47" align="center" bgcolor="#EEEEEE"><font color='#0000FF'>+1</font></td>
        <td width="47" align="center" bgcolor="#EEEEEE"></td>
        <td width="47" align="center" bgcolor="#EEEEEE"></td>
        <td width="47" align="center" bgcolor="#EEEEEE"></td>
        <td width="47" align="center" bgcolor="#EEEEEE"></td>
        <td width="53" align="center" bgcolor="#EEEEEE"><font color="#993333">7</font></td>
        <td width="77" align="center" bgcolor="#EEEEEE"><font color="#993333">$ 300</font></td>
        <td width="120" align="center" bgcolor="#EEEEEE"><input type="checkbox" name="r1_0" onClick="if(document.reform.r1_0.checked){Off_Checkbox(1,0);}else{Off_Checkbox(0,0);}"><input type="checkbox" name="r1_1" onClick="if(document.reform.r1_1.checked){Off_Checkbox(1,1);}else{Off_Checkbox(0,1);}"><input type="checkbox" name="r1_2" onClick="if(document.reform.r1_2.checked){Off_Checkbox(1,2);}else{Off_Checkbox(0,2);}"><input type="checkbox" name="r1_3" onClick="if(document.reform.r1_3.checked){Off_Checkbox(1,3);}else{Off_Checkbox(0,3);}"><input type="checkbox" name="r1_4" onClick="if(document.reform.r1_4.checked){Off_Checkbox(1,4);}else{Off_Checkbox(0,4);}"></td>
      </tr>
      <tr>
        <td width="115" align="center" bgcolor="#EEEEEE"><a style="cursor: help" title="NPC:Ferghus | Nerys | 阿兰雯"><u>Bow Back Refinement 2</u></a></td>
        <td width="47" align="center" bgcolor="#EEEEEE"></td>
        <td width="47" align="center" bgcolor="#EEEEEE"></td>
        <td width="47" align="center" bgcolor="#EEEEEE"></td>
        <td width="47" align="center" bgcolor="#EEEEEE"><font color='#0000FF'>+2</font></td>
        <td width="47" align="center" bgcolor="#EEEEEE"></td>
        <td width="47" align="center" bgcolor="#EEEEEE"></td>
        <td width="47" align="center" bgcolor="#EEEEEE"></td>
        <td width="47" align="center" bgcolor="#EEEEEE"></td>
        <td width="53" align="center" bgcolor="#EEEEEE"><font color="#993333">10</font></td>
        <td width="77" align="center" bgcolor="#EEEEEE"><font color="#993333">$ 600</font></td>
        <td width="120" align="center" bgcolor="#EEEEEE"><input type="checkbox" name="r2_0" onClick="if(document.reform.r2_0.checked){Off_Checkbox(2,0);}else{Off_Checkbox(0,0);}"><input type="checkbox" name="r2_1" onClick="if(document.reform.r2_1.checked){Off_Checkbox(2,1);}else{Off_Checkbox(0,1);}"><input type="checkbox" name="r2_2" onClick="if(document.reform.r2_2.checked){Off_Checkbox(2,2);}else{Off_Checkbox(0,2);}"><input type="checkbox" name="r2_3" onClick="if(document.reform.r2_3.checked){Off_Checkbox(2,3);}else{Off_Checkbox(0,3);}"><input type="checkbox" disabled></td>
      </tr>
      <tr>
        <td width="115" align="center" bgcolor="#EEEEEE"><a style="cursor: help" title="NPC:Ferghus | Nerys | 阿兰雯"><u>Bow Back Refinement 3</u></a></td>
        <td width="47" align="center" bgcolor="#EEEEEE"></td>
        <td width="47" align="center" bgcolor="#EEEEEE"></td>
        <td width="47" align="center" bgcolor="#EEEEEE"></td>
        <td width="47" align="center" bgcolor="#EEEEEE"><font color='#0000FF'>+3</font></td>
        <td width="47" align="center" bgcolor="#EEEEEE"></td>
        <td width="47" align="center" bgcolor="#EEEEEE"></td>
        <td width="47" align="center" bgcolor="#EEEEEE"></td>
        <td width="47" align="center" bgcolor="#EEEEEE"></td>
        <td width="53" align="center" bgcolor="#EEEEEE"><font color="#993333">13</font></td>
        <td width="77" align="center" bgcolor="#EEEEEE"><font color="#993333">$ 900</font></td>
        <td width="120" align="center" bgcolor="#EEEEEE"><input type="checkbox" name="r3_0" onClick="if(document.reform.r3_0.checked){Off_Checkbox(3,0);}else{Off_Checkbox(0,0);}"><input type="checkbox" name="r3_1" onClick="if(document.reform.r3_1.checked){Off_Checkbox(3,1);}else{Off_Checkbox(0,1);}"><input type="checkbox" name="r3_2" onClick="if(document.reform.r3_2.checked){Off_Checkbox(3,2);}else{Off_Checkbox(0,2);}"><input type="checkbox" disabled><input type="checkbox" disabled></td>
      </tr>
      <tr>
        <td width="115" align="center" bgcolor="#EEEEEE"><a style="cursor: help" title="NPC:Ferghus | Nerys | 阿兰雯"><u>Bow Back Refinement 4</u></a></td>
        <td width="47" align="center" bgcolor="#EEEEEE"></td>
        <td width="47" align="center" bgcolor="#EEEEEE"></td>
        <td width="47" align="center" bgcolor="#EEEEEE"></td>
        <td width="47" align="center" bgcolor="#EEEEEE"><font color='#0000FF'>+4</font></td>
        <td width="47" align="center" bgcolor="#EEEEEE"></td>
        <td width="47" align="center" bgcolor="#EEEEEE"></td>
        <td width="47" align="center" bgcolor="#EEEEEE"></td>
        <td width="47" align="center" bgcolor="#EEEEEE"></td>
        <td width="53" align="center" bgcolor="#EEEEEE"><font color="#993333">16</font></td>
        <td width="77" align="center" bgcolor="#EEEEEE"><font color="#993333">$ 1500</font></td>
        <td width="120" align="center" bgcolor="#EEEEEE"><input type="checkbox" name="r4_0" onClick="if(document.reform.r4_0.checked){Off_Checkbox(4,0);}else{Off_Checkbox(0,0);}"><input type="checkbox" name="r4_1" onClick="if(document.reform.r4_1.checked){Off_Checkbox(4,1);}else{Off_Checkbox(0,1);}"><input type="checkbox" disabled><input type="checkbox" disabled><input type="checkbox" disabled></td>
      </tr>
      <tr>
        <td width="115" align="center" bgcolor="#EEEEEE"><a style="cursor: help" title="NPC:Ferghus | Nerys | 阿兰雯"><u>Bow String Strengthening 1</u></a></td>
        <td width="47" align="center" bgcolor="#EEEEEE"></td>
        <td width="47" align="center" bgcolor="#EEEEEE"><font color='#0000FF'>+1</font></td>
        <td width="47" align="center" bgcolor="#EEEEEE"></td>
        <td width="47" align="center" bgcolor="#EEEEEE"><font color='#FF0000'>-1</font></td>
        <td width="47" align="center" bgcolor="#EEEEEE"></td>
        <td width="47" align="center" bgcolor="#EEEEEE"></td>
        <td width="47" align="center" bgcolor="#EEEEEE"></td>
        <td width="47" align="center" bgcolor="#EEEEEE"></td>
        <td width="53" align="center" bgcolor="#EEEEEE"><font color="#993333">5</font></td>
        <td width="77" align="center" bgcolor="#EEEEEE"><font color="#993333">$ 600</font></td>
        <td width="120" align="center" bgcolor="#EEEEEE"><input type="checkbox" name="r5_0" onClick="if(document.reform.r5_0.checked){Off_Checkbox(5,0);}else{Off_Checkbox(0,0);}"><input type="checkbox" name="r5_1" onClick="if(document.reform.r5_1.checked){Off_Checkbox(5,1);}else{Off_Checkbox(0,1);}"><input type="checkbox" name="r5_2" onClick="if(document.reform.r5_2.checked){Off_Checkbox(5,2);}else{Off_Checkbox(0,2);}"><input type="checkbox" name="r5_3" onClick="if(document.reform.r5_3.checked){Off_Checkbox(5,3);}else{Off_Checkbox(0,3);}"><input type="checkbox" name="r5_4" onClick="if(document.reform.r5_4.checked){Off_Checkbox(5,4);}else{Off_Checkbox(0,4);}"></td>
      </tr>
      <tr>
        <td width="115" align="center" bgcolor="#EEEEEE"><a style="cursor: help" title="NPC:Ferghus | Nerys | 阿兰雯"><u>Bow String Strengthening 2</u></a></td>
        <td width="47" align="center" bgcolor="#EEEEEE"></td>
        <td width="47" align="center" bgcolor="#EEEEEE"><font color='#0000FF'>+2</font></td>
        <td width="47" align="center" bgcolor="#EEEEEE"></td>
        <td width="47" align="center" bgcolor="#EEEEEE"><font color='#FF0000'>-2</font></td>
        <td width="47" align="center" bgcolor="#EEEEEE"></td>
        <td width="47" align="center" bgcolor="#EEEEEE"></td>
        <td width="47" align="center" bgcolor="#EEEEEE"></td>
        <td width="47" align="center" bgcolor="#EEEEEE"></td>
        <td width="53" align="center" bgcolor="#EEEEEE"><font color="#993333">11</font></td>
        <td width="77" align="center" bgcolor="#EEEEEE"><font color="#993333">$ 1600</font></td>
        <td width="120" align="center" bgcolor="#EEEEEE"><input type="checkbox" disabled><input type="checkbox" name="r6_1" onClick="if(document.reform.r6_1.checked){Off_Checkbox(6,1);}else{Off_Checkbox(0,1);}"><input type="checkbox" name="r6_2" onClick="if(document.reform.r6_2.checked){Off_Checkbox(6,2);}else{Off_Checkbox(0,2);}"><input type="checkbox" name="r6_3" onClick="if(document.reform.r6_3.checked){Off_Checkbox(6,3);}else{Off_Checkbox(0,3);}"><input type="checkbox" name="r6_4" onClick="if(document.reform.r6_4.checked){Off_Checkbox(6,4);}else{Off_Checkbox(0,4);}"></td>
      </tr>
      <tr>
        <td width="115" align="center" bgcolor="#EEEEEE"><a style="cursor: help" title="NPC:Ferghus | Nerys | 阿兰雯"><u>Bow String Strengthening 3</u></a></td>
        <td width="47" align="center" bgcolor="#EEEEEE"></td>
        <td width="47" align="center" bgcolor="#EEEEEE"><font color='#0000FF'>+3</font></td>
        <td width="47" align="center" bgcolor="#EEEEEE"></td>
        <td width="47" align="center" bgcolor="#EEEEEE"><font color='#FF0000'>-3</font></td>
        <td width="47" align="center" bgcolor="#EEEEEE"></td>
        <td width="47" align="center" bgcolor="#EEEEEE"></td>
        <td width="47" align="center" bgcolor="#EEEEEE"></td>
        <td width="47" align="center" bgcolor="#EEEEEE"></td>
        <td width="53" align="center" bgcolor="#EEEEEE"><font color="#993333">25</font></td>
        <td width="77" align="center" bgcolor="#EEEEEE"><font color="#993333">$ 3600</font></td>
        <td width="120" align="center" bgcolor="#EEEEEE"><input type="checkbox" disabled><input type="checkbox" disabled><input type="checkbox" name="r7_2" onClick="if(document.reform.r7_2.checked){Off_Checkbox(7,2);}else{Off_Checkbox(0,2);}"><input type="checkbox" name="r7_3" onClick="if(document.reform.r7_3.checked){Off_Checkbox(7,3);}else{Off_Checkbox(0,3);}"><input type="checkbox" name="r7_4" onClick="if(document.reform.r7_4.checked){Off_Checkbox(7,4);}else{Off_Checkbox(0,4);}"></td>
      </tr>
      <tr>
        <td width="115" align="center" bgcolor="#EEEEEE"><a style="cursor: help" title="NPC:Ferghus | Nerys | 阿兰雯"><u>Bow String Strengthening 4</u></a></td>
        <td width="47" align="center" bgcolor="#EEEEEE"></td>
        <td width="47" align="center" bgcolor="#EEEEEE"><font color='#0000FF'>+4</font></td>
        <td width="47" align="center" bgcolor="#EEEEEE"></td>
        <td width="47" align="center" bgcolor="#EEEEEE"><font color='#FF0000'>-4</font></td>
        <td width="47" align="center" bgcolor="#EEEEEE"></td>
        <td width="47" align="center" bgcolor="#EEEEEE"></td>
        <td width="47" align="center" bgcolor="#EEEEEE"></td>
        <td width="47" align="center" bgcolor="#EEEEEE"></td>
        <td width="53" align="center" bgcolor="#EEEEEE"><font color="#993333">37</font></td>
        <td width="77" align="center" bgcolor="#EEEEEE"><font color="#993333">$ 6600</font></td>
        <td width="120" align="center" bgcolor="#EEEEEE"><input type="checkbox" disabled><input type="checkbox" disabled><input type="checkbox" disabled><input type="checkbox" name="r8_3" onClick="if(document.reform.r8_3.checked){Off_Checkbox(8,3);}else{Off_Checkbox(0,3);}"><input type="checkbox" name="r8_4" onClick="if(document.reform.r8_4.checked){Off_Checkbox(8,4);}else{Off_Checkbox(0,4);}"></td>
      </tr>
      <tr>
        <td width="115" align="center" bgcolor="#EEEEEE"><a style="cursor: help" title="NPC:Ferghus | Nerys | 阿兰雯"><u>Bow String Strengthening 5</u></a></td>
        <td width="47" align="center" bgcolor="#EEEEEE"></td>
        <td width="47" align="center" bgcolor="#EEEEEE"><font color='#0000FF'>+5</font></td>
        <td width="47" align="center" bgcolor="#EEEEEE"></td>
        <td width="47" align="center" bgcolor="#EEEEEE"><font color='#FF0000'>-5</font></td>
        <td width="47" align="center" bgcolor="#EEEEEE"></td>
        <td width="47" align="center" bgcolor="#EEEEEE"></td>
        <td width="47" align="center" bgcolor="#EEEEEE"></td>
        <td width="47" align="center" bgcolor="#EEEEEE"></td>
        <td width="53" align="center" bgcolor="#EEEEEE"><font color="#993333">47</font></td>
        <td width="77" align="center" bgcolor="#EEEEEE"><font color="#993333">$ 10600</font></td>
        <td width="120" align="center" bgcolor="#EEEEEE"><input type="checkbox" disabled><input type="checkbox" disabled><input type="checkbox" disabled><input type="checkbox" disabled><input type="checkbox" name="r9_4" onClick="if(document.reform.r9_4.checked){Off_Checkbox(9,4);}else{Off_Checkbox(0,4);}"></td>
      </tr>
      <tr>
        <td width="115" align="center" bgcolor="#EEEEEE"><a style="cursor: help" title="NPC:Ferghus | Nerys | 阿兰雯"><u>Sight Change</u></a></td>
        <td width="47" align="center" bgcolor="#EEEEEE"><font color='#0000FF'>+3</font></td>
        <td width="47" align="center" bgcolor="#EEEEEE"></td>
        <td width="47" align="center" bgcolor="#EEEEEE"></td>
        <td width="47" align="center" bgcolor="#EEEEEE"></td>
        <td width="47" align="center" bgcolor="#EEEEEE"></td>
        <td width="47" align="center" bgcolor="#EEEEEE"></td>
        <td width="47" align="center" bgcolor="#EEEEEE"></td>
        <td width="47" align="center" bgcolor="#EEEEEE"></td>
        <td width="53" align="center" bgcolor="#EEEEEE"><font color="#993333">20</font></td>
        <td width="77" align="center" bgcolor="#EEEEEE"><font color="#993333">$ 3000</font></td>
        <td width="120" align="center" bgcolor="#EEEEEE"><input type="checkbox" name="r10_0" onClick="if(document.reform.r10_0.checked){Off_Checkbox(10,0);}else{Off_Checkbox(0,0);}"><input type="checkbox" name="r10_1" onClick="if(document.reform.r10_1.checked){Off_Checkbox(10,1);}else{Off_Checkbox(0,1);}"><input type="checkbox" name="r10_2" onClick="if(document.reform.r10_2.checked){Off_Checkbox(10,2);}else{Off_Checkbox(0,2);}"><input type="checkbox" name="r10_3" onClick="if(document.reform.r10_3.checked){Off_Checkbox(10,3);}else{Off_Checkbox(0,3);}"><input type="checkbox" disabled></td>
      </tr>
      <tr>
        <td width="115" align="center" bgcolor="#EEEEEE"><a style="cursor: help" title="NPC:Ferghus | Nerys | 阿兰雯"><u>Bow Tip Enhancement</u></a></td>
        <td width="47" align="center" bgcolor="#EEEEEE"></td>
        <td width="47" align="center" bgcolor="#EEEEEE"></td>
        <td width="47" align="center" bgcolor="#EEEEEE"><font color='#0000FF'>+4</font></td>
        <td width="47" align="center" bgcolor="#EEEEEE"></td>
        <td width="47" align="center" bgcolor="#EEEEEE"></td>
        <td width="47" align="center" bgcolor="#EEEEEE"></td>
        <td width="47" align="center" bgcolor="#EEEEEE"></td>
        <td width="47" align="center" bgcolor="#EEEEEE"></td>
        <td width="53" align="center" bgcolor="#EEEEEE"><font color="#993333">20</font></td>
        <td width="77" align="center" bgcolor="#EEEEEE"><font color="#993333">$ 2500</font></td>
        <td width="120" align="center" bgcolor="#EEEEEE"><input type="checkbox" disabled><input type="checkbox" name="r11_1" onClick="if(document.reform.r11_1.checked){Off_Checkbox(11,1);}else{Off_Checkbox(0,1);}"><input type="checkbox" name="r11_2" onClick="if(document.reform.r11_2.checked){Off_Checkbox(11,2);}else{Off_Checkbox(0,2);}"><input type="checkbox" disabled><input type="checkbox" disabled></td>
      </tr>
      <tr>
        <td width="115" align="center" bgcolor="#EEEEEE"><a style="cursor: help" title="NPC:Ferghus | Nerys | 阿兰雯"><u>Oiling</u></a></td>
        <td width="47" align="center" bgcolor="#EEEEEE"><font color='#0000FF'>+5</font></td>
        <td width="47" align="center" bgcolor="#EEEEEE"><font color='#FF0000'>-5</font></td>
        <td width="47" align="center" bgcolor="#EEEEEE"></td>
        <td width="47" align="center" bgcolor="#EEEEEE"></td>
        <td width="47" align="center" bgcolor="#EEEEEE"></td>
        <td width="47" align="center" bgcolor="#EEEEEE"></td>
        <td width="47" align="center" bgcolor="#EEEEEE"></td>
        <td width="47" align="center" bgcolor="#EEEEEE"></td>
        <td width="53" align="center" bgcolor="#EEEEEE"><font color="#993333">30</font></td>
        <td width="77" align="center" bgcolor="#EEEEEE"><font color="#993333">$ 3000</font></td>
        <td width="120" align="center" bgcolor="#EEEEEE"><input type="checkbox" name="r12_0" onClick="if(document.reform.r12_0.checked){Off_Checkbox(12,0);}else{Off_Checkbox(0,0);}"><input type="checkbox" disabled><input type="checkbox" disabled><input type="checkbox" disabled><input type="checkbox" disabled></td>
      </tr>
      <tr>
        <td width="115" align="center" bgcolor="#EEEEEE"><a style="cursor: help" title="NPC:阿兰雯"><u>Aranwen's Enhancement</u></a></td>
        <td width="47" align="center" bgcolor="#EEEEEE"></td>
        <td width="47" align="center" bgcolor="#EEEEEE"><font color='#0000FF'>+5</font></td>
        <td width="47" align="center" bgcolor="#EEEEEE"></td>
        <td width="47" align="center" bgcolor="#EEEEEE"><font color='#0000FF'>+5</font></td>
        <td width="47" align="center" bgcolor="#EEEEEE"><font color='#FF0000'>-10</font></td>
        <td width="47" align="center" bgcolor="#EEEEEE"></td>
        <td width="47" align="center" bgcolor="#EEEEEE"></td>
        <td width="47" align="center" bgcolor="#EEEEEE"><font color='#0000FF'>+100</font></td>
        <td width="53" align="center" bgcolor="#EEEEEE"><font color="#993333">70</font></td>
        <td width="77" align="center" bgcolor="#EEEEEE"><font color="#993333">$ 18000</font></td>
        <td width="120" align="center" bgcolor="#EEEEEE"><input type="checkbox" name="r13_0" onClick="if(document.reform.r13_0.checked){Off_Checkbox(13,0);}else{Off_Checkbox(0,0);}"><input type="checkbox" disabled><input type="checkbox" disabled><input type="checkbox" disabled><input type="checkbox" disabled></td>
      </tr>
      <tr>
        <td width="115" align="center" bgcolor="#EEEEEE"><a style="cursor: help" title="NPC:Ferghus"><u>Ferghus' Modification</u></a></td>
        <td width="47" align="center" bgcolor="#EEEEEE"><font color='#0000FF'>+5</font></td>
        <td width="47" align="center" bgcolor="#EEEEEE"></td>
        <td width="47" align="center" bgcolor="#EEEEEE"><font color='#0000FF'>+5</font></td>
        <td width="47" align="center" bgcolor="#EEEEEE"><font color='#FF0000'>-5</font></td>
        <td width="47" align="center" bgcolor="#EEEEEE"><font color='#FF0000'>-10</font></td>
        <td width="47" align="center" bgcolor="#EEEEEE"></td>
        <td width="47" align="center" bgcolor="#EEEEEE"></td>
        <td width="47" align="center" bgcolor="#EEEEEE"></td>
        <td width="53" align="center" bgcolor="#EEEEEE"><font color="#993333">65</font></td>
        <td width="77" align="center" bgcolor="#EEEEEE"><font color="#993333">$ 12000</font></td>
        <td width="120" align="center" bgcolor="#EEEEEE"><input type="checkbox" disabled><input type="checkbox" disabled><input type="checkbox" disabled><input type="checkbox" name="r14_3" onClick="if(document.reform.r14_3.checked){Off_Checkbox(14,3);}else{Off_Checkbox(0,3);}"><input type="checkbox" name="r14_4" onClick="if(document.reform.r14_4.checked){Off_Checkbox(14,4);}else{Off_Checkbox(0,4);}"></td>
      </tr>
      <tr>
        <td width="740" align="center" colspan="12"><img border="0" src="linepic.gif"  width="100%" height="1"></td>
      </tr>
      <tr>
        <td width="115" align="center" bgcolor="#CCCCFF" rowspan="2">Total</td>
        <td width="47" align="center" bgcolor="#CCCCFF">Low Damage</td>
        <td width="47" align="center" bgcolor="#CCCCFF">High Damage</td>
        <td width="47" align="center" bgcolor="#CCCCFF">Cri</td>
        <td width="47" align="center" bgcolor="#CCCCFF">Balance</td>
        <td width="47" align="center" bgcolor="#CCCCFF">Low Injury</td>
        <td width="47" align="center" bgcolor="#CCCCFF">High Injury</td>
        <td width="47" align="center" bgcolor="#CCCCFF">Dura bility</td>
        <td width="47" align="center" bgcolor="#CCCCFF">Range</td>
        <td width="53" align="center" bgcolor="#CCCCFF">Pro ficiency</td>
        <td width="77" align="center" bgcolor="#CCCCFF">Upgrade costs</td>
        <td width="120" align="center" rowspan="2"><input type="reset" VALUE="Clear" style='color: #000000; border: 1px solid #848284; padding-top: 3px; padding-bottom: 0px; background"-color-"  #DFDFFF' onClick="Reset_All()"></td>
      </tr>
      <tr>
        <td width="94" align="center" bgcolor="#EEEEFF" colspan="2"><span id=def_min></span> ~ <span id=def_max></span></td>
        <td width="47" align="center" bgcolor="#EEEEFF"><span id=def_cri></span>%</td>
        <td width="47" align="center" bgcolor="#EEEEFF"><span id=def_bal>%</td>
        <td width="94" align="center" bgcolor="#EEEEFF" colspan="2"><span id=def_miw></span>% ~ <span id=def_maw></span>%</td>
        <td width="47" align="center" bgcolor="#EEEEFF"><span id=def_dur></span></td>
        <td width="47" align="center" bgcolor="#EEEEFF"><span id=def_e1></span></td>
        <td width="53" align="center" bgcolor="#EEEEFF"><span id=def_pra></span></td>
        <td width="77" align="center" bgcolor="#EEEEFF">$ <span id=def_pri></span></td>
      </tr>
      <tr>
        <td width="740" align="center" colspan="12"><img border="0" src="linepic.gif"  width="100%" height="1"></td>
      </tr>
      <tr>
        <td width="115" align="center" bgcolor="#FFCCCC">Before</td>
        <td width="94" align="center" bgcolor="#FFEEEE" colspan="2"><span id=bef_min></span> ~ <span id=bef_max></span></td>
        <td width="47" align="center" bgcolor="#FFEEEE"><span id=bef_cri></span>%</td>
        <td width="47" align="center" bgcolor="#FFEEEE"><span id=bef_bal></span>%</td>
        <td width="94" align="center" bgcolor="#FFEEEE" colspan="2"><span id=bef_miw></span>% ~ <span id=bef_maw></span>%</td>
        <td width="47" align="center" bgcolor="#FFEEEE"><span id=bef_dur></span></td>
        <td width="47" align="center" bgcolor="#FFEEEE"><span id=bef_e1></span></td>
        <td width="250" align="center" bgcolor="#FFEEEE" colspan="3">Damage：<span id=bef_ave></span></td>
      </tr>
      <tr>
        <td width="115" align="center" bgcolor="#CCFFFF">After</td>
        <td width="94" align="center" bgcolor="#EEFFFF" colspan="2"><span id=aft_min></span> ~ <span id=aft_max></span></td>
        <td width="47" align="center" bgcolor="#EEFFFF"><span id=aft_cri></span>%</td>
        <td width="47" align="center" bgcolor="#EEFFFF"><span id=aft_bal></span>%</td>
        <td width="94" align="center" bgcolor="#EEFFFF" colspan="2"><span id=aft_miw></span>% ~ <span id=aft_maw></span>%</td>
        <td width="47" align="center" bgcolor="#EEFFFF"><span id=aft_dur></span></td>
        <td width="47" align="center" bgcolor="#EEFFFF"><span id=aft_e1></span></td>
        <td width="250" align="center" bgcolor="#EEFFFF" colspan="3">Damage：<span id=aft_ave></span></td>
      </tr>
      <tr>
        <td width="740" align="center" colspan="12"><img border="0" src="linepic.gif"  width="100%" height="1"></td>
      </tr>
      <tr>
        <td width="115" align="center" bgcolor="#FFCC99">Use</td>
        <td width="94" align="center" bgcolor="#FFE9D2" colspan="2"><span id=equ_min></span> ~ <span id=equ_max></span></td>
        <td width="47" align="center" bgcolor="#FFE9D2"><span id=equ_cri></span>%</td>
        <td width="47" align="center" bgcolor="#FFE9D2"><span id=equ_bal></span>%</td>
        <td width="94" align="center" bgcolor="#FFE9D2" colspan="2"><span id=equ_miw></span>% ~ <span id=equ_maw></span>%</td>
        <td width="47" align="center" bgcolor="#FFE9D2"><span id=equ_dur></span></td>
        <td width="47" align="center" bgcolor="#FFE9D2"><span id=equ_e1></span></td>
        <td width="250" align="center" bgcolor="#FFE9D2" colspan="3">Damage：<span id=equ_ave></span></td>
      </tr>
      <tr>
        <td width="490" align="center" colspan="9">　</td>
        <td width="250" align="center" bgcolor="#FFE9D2" colspan="3">Cri：<span id=equ_avecri></span></td>
      </tr></form>
    </table>
    <table border="0" cellpadding="2" cellspacing="2" style="border-collapse: collapse" bordercolor="#111111" width="740"><form name="chrsat">
      <tr>
        <td width="860">　</td>
      </tr></form>
    </table>
    <table border="0" cellpadding="2" cellspacing="2" style="border-collapse: collapse" bordercolor="#111111" width="740"><form name="exset">
      <tr>
        <td width="400"><select size="1" id="exp_print" name="exp_print" onChange="Reform_7()"><option value="1">Default</option><option value="2">By Pro ficiency</option><option value="3">By Upgrade costs</option><option value="4">By Damage</option><option value="5">By Cri</option></select> <input type='button' name='exbutton' value='Upgrade Data' style='color: #000000; border: 1px solid #848284; padding-top: 3px; padding-bottom: 0px; background"-color-"  #DDDDDD' onclick='Reform_6()' disabled> <input type="checkbox" name="exmode" onClick="(this.checked?Exp_Mode(true):Exp_Mode(false))" checked>Display Now</td>
        <td width="340" align="right"><select size='1' id='mc_sel' name='mc_sel'><option value='0'>Upgrades Save Card (0/10)</option><option value='1'></option><option value='2'></option><option value='3'></option><option value='4'></option><option value='5'></option><option value='6'></option><option value='7'></option><option value='8'></option><option value='9'></option><option value='10'></option></select> <input type="button" value="Save" style="color: #000000; border: 1px solid #848284; padding-top: 3px; padding-bottom: 0px; background-color: #CCFFFF" onClick="MC_Temp=eval(document.getElementById('mc_sel').value);Save_Reform();"> <input type="button" value="Del" style="color: #000000; border: 1px solid #848284; padding-top: 3px; padding-bottom: 0px; background-color: #CCFFFF" onClick="MC_Temp=eval(document.getElementById('mc_sel').value);Delete_Reform();"></td>
      </tr></form>
    </table>
    <span id=example></span>
<script Language="JavaScript">Reform_2();document.exset.exmode.checked=false;Exp_Mode(false);Start_Memory_Card();</script>
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