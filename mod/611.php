﻿<html>
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
    <div align="center">
      <center>
      
<?php

include("top.html");

?>



<SCRIPT language=JavaScript type=text/JavaScript>
<!--
//【变数宣告】------------------------------------------------------------------------------------
w_hit = 3;

//Array格式： = [min,max,cri,bal,miw,maw,dur,e1,e2,e3,e4,e5,e6];
w_raw = [5,14,15,60,0,0,10,0,0,0,0,0,0];
w_add = [0,0,0,0,0,0,0,0,0,0,0,0,0];
w_bef = [0,0,0,0,0,0,0,0,0,0,0,0,0];
w_ad2 = [0,0,0,0,0,0,0,0,0,0,0,0,0];
w_aft = [0,0,0,0,0,0,0,0,0,0,0,0,0];
w_sat = [0,0,0,0,0,0,0,0,0,0,0,0,0];
w_equ = [0,0,0,0,0,0,0,0,0,0,0,0,0];
w_emp = [0,0,0,0,0,0,0,0,0,0,0,0,0];

//Array格式： = [str,dex,wil,luk,min,max,cri,bal,miw,maw];
w_pre = [0,0,0,0,0,0,0,0,0,0];
w_suf = [0,0,0,0,0,0,0,0,0,0];


//改造处方
menu_ea = 3;
menu_md = [3,5,3,,,];
menu_na = ["伤","耗","咏","","",""];
menu_0 = [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];	order_0 = [true,true,true,true,true];
menu_1 = [0,0,0,0,0,0,0,3,0,0,0,0,0,20,30000,"凝缩 1"];	order_1 = [true,true,true,true,false];
menu_2 = [0,0,0,0,0,0,0,4,0,0,0,0,0,30,50000,"凝缩 2"];	order_2 = [false,true,true,true,false];
menu_3 = [0,0,0,0,0,0,0,5,0,0,0,0,0,40,70000,"凝缩 3"];	order_3 = [false,false,true,true,false];
menu_4 = [0,0,0,0,0,0,0,6,0,0,0,0,0,50,90000,"凝缩 4"];	order_4 = [false,false,false,true,false];
menu_5 = [0,0,0,0,0,0,0,3,0,0,0,0,0,100,90000,"宝石改造"];	order_5 = [false,false,false,false,true];
menu_am = 5;

//范例格式 = [name,order0,order1,order2,order3,order4,6取向,7存order条列,8存能力,9存价格,10存熟练]
example_1 = ["*0式",0,0,0,0,0,"自订","→","攻:",0,0];
example_2 = ["*0式",0,0,0,0,0,"自订","→","攻:",0,0];
example_3 = ["*0式",0,0,0,0,0,"自订","→","攻:",0,0];
example_4 = ["*0式",0,0,0,0,0,"自订","→","攻:",0,0];
example_5 = ["*0式",0,0,0,0,0,"自订","→","攻:",0,0];
example_6 = ["*0式",0,0,0,0,0,"自订","→","攻:",0,0];
example_7 = ["*0式",0,0,0,0,0,"自订","→","攻:",0,0];
example_8 = ["*0式",0,0,0,0,0,"自订","→","攻:",0,0];
example_9 = ["*0式",0,0,0,0,0,"自订","→","攻:",0,0];
example_10 = ["*0式",0,0,0,0,0,"自订","→","攻:",0,0];
example_11 = ["*0式",0,0,0,0,0,"自订","→","攻:",0,0];
example_am = 11;
example_arr = new Array(11);
example_arr2 = new Array(11);
example_ave = new Array(11);
example_avc = new Array(11);

exmode =true;
enlist = ["力量","敏捷","意志","幸运","最小伤害","最大伤害","暴击率","损害平衡性","最小负伤率","最大负伤率"];
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
			Str = Str + "╳";
		}
	}
	eval("example_"+i+"[7] = Str.substr(1)");
}
for (i=1;i<=example_am;i++){
	example_arr[i-1] = i;
}

//【记录处理】------------------------------------------------------------------------------------
nolist = ["一","二","三","四","五","六","七","八","九","十"];
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
				eval("example_"+temp+"[0]='*'+"+(eval("menu_"+arrCookie2[0]+"[13]") + eval("menu_"+arrCookie2[1]+"[13]") + eval("menu_"+arrCookie2[2]+"[13]") + eval("menu_"+arrCookie2[3]+"[13]") + eval("menu_"+arrCookie2[4]+"[13]"))+"+'式'");
				for(j=1;j<6;j++){
					eval("example_"+temp+"[j]=arrCookie2[j-1]")
				}
				Str = "";
				for (j=1;j<=5;j++) {
					Str = Str + "→";
					if (eval("example_"+temp+'[j]')!=0) {
						Str = Str + eval("menu_"+eval("example_"+temp+'[j]')+"[15]");
					} else {
						Str = Str + "╳";
					}
				}
				eval("example_"+temp+"[7] = Str.substr(1)");
				eval("example_"+temp+"[6] = '自订"+nolist[eval(arrCookie[i].substr(11,1))]+"'");
			} else {
				//资料过期，执行删除
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
		//魔赋单元
		if(arrCookie[i].substr(0,7)=="MgbRF3E"){
			temp = eval(arrCookie[i].substr(7,2));
			arrCookie2 = (arrCookie[i].split("="))[1].split("/");
			chrsat.mc3_sel.options[temp+1].text = "(" + ((temp+1)<10?"0"+(temp+1):(temp+1)) + ") 力" + arrCookie2[0] + ".敏" + arrCookie2[1] + ".意" + arrCookie2[2] + ".幸" + arrCookie2[3] + " / 小" + arrCookie2[4] + ".大" + arrCookie2[5] + ".暴" + arrCookie2[6] + ".平" + arrCookie2[7] + ".小" + arrCookie2[8] + ".大" + arrCookie2[9];
		}
	}
	if (k>0) { alert("由于改造处方表有进行更新，或是您的资料发生了错误，故系统删除了您 "+k+" 笔的改造项目资料。\n\n※若是因为处方表的变更而出现了此讯息，请查询您其余未删除的资料，可能因为中间有插入了新的改造处方，而造成了记忆项目的改变。"); }
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
	exset.mc_sel.options[0].text = "改造项目记忆卡 (" + j + "/10)";
	Reform_6();


}

//从表单储存到Cookie(改造单元)
function Save_Reform(){
	if (MC_Temp>=1) {
		temp = example_am - 10 + MC_Temp - 1;
		var expires = new Date();
		expires.setTime(expires.getTime() + 60 * 24 * 60 * 60 * 1000);
		document.cookie = "MgbRF3W" + MC_ID + (MC_Temp-1) + "=" + checkbox_order[0] + "/" + checkbox_order[1] + "/" + checkbox_order[2] + "/" + checkbox_order[3] + "/" + checkbox_order[4] + " ; expires=" + expires.toGMTString();
		temp_a = (eval("menu_"+checkbox_order[0]+"[13]") + eval("menu_"+checkbox_order[1]+"[13]") + eval("menu_"+checkbox_order[2]+"[13]") + eval("menu_"+checkbox_order[3]+"[13]") + eval("menu_"+checkbox_order[4]+"[13]"));
		eval("example_"+temp+"=['*'+"+temp_a+"+'式',"+checkbox_order[0]+","+checkbox_order[1]+","+checkbox_order[2]+","+checkbox_order[3]+","+checkbox_order[4]+"]");
		if (temp_a>0) {
			exset.mc_sel.options[MC_Temp].text = "(" + nolist[MC_Temp-1] + ")　" + eval("example_"+temp+"[0].substr(1)");
			Str = "";
			for (j=1;j<=5;j++) {
				Str = Str + "→";
				if (eval("example_"+temp+'[j]')!=0) {
					Str = Str + eval("menu_"+eval("example_"+temp+'[j]')+"[15]");
				} else {
					Str = Str + "╳";
				}
			}
			eval("example_"+temp+"[7] = Str.substr(1)");
			eval("example_"+temp+"[6] = '自订"+nolist[MC_Temp-1]+"'");
		} else {
			exset.mc_sel.options[MC_Temp].text = "(" + nolist[MC_Temp-1] + ")　---";
		}
		Update_Reform();
	}
}

//删除Cookie(改造单元)
function Delete_Reform(){
	if (MC_Temp>=1) {
		var expires = new Date();
		expires.setTime(expires.getTime() - 1000);
		document.cookie = "MgbRF3W" + MC_ID + (MC_Temp-1) + "=0/0/0/0/0 ; expires=" + expires.toGMTString();
		eval("example_"+(example_am - 10 + MC_Temp - 1)+"=['*0式',0,0,0,0,0]");
		exset.mc_sel.options[MC_Temp].text = "(" + nolist[MC_Temp-1] + ")　---";
		Update_Reform();
	}
}

//更新改造项目总笔数
function Update_Reform(){
	j=0;
	for(i=0;i<10;i++){
		if (eval("example_"+(example_am-10+i)+"[1]!=0")||eval("example_"+(example_am-10+i)+"[2]!=0")||eval("example_"+(example_am-10+i)+"[3]!=0")||eval("example_"+(example_am-10+i)+"[4]!=0")||eval("example_"+(example_am-10+i)+"[5]!=0")) {
			j++;
		}
	}
	exset.mc_sel.options[0].text = "改造项目记忆卡 (" + j + "/10)";
	Reform_6();
}

//从表单储存到Cookie(素质单元)

//从Cookie读取到表单(素质单元)


//【数值处理】------------------------------------------------------------------------------------
//正值叫增加、负值叫减少、零为不变化
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
		//耐久度及特殊值不取正值
		eval(arrayname+"[k] = Math.max("+arrayname+"[k],0)");
	}
}

//特殊改造格式输出
function Ex_Menu(val,md){
	if(md==0) {return val;}
	if(md==1) {return (val>0?"+" + val:val);}
	if(md==2) {return "-" + val.toFixed(2) + "s";}
	if(md==3) {return "+" + val + "%";}
	if(md==4) {return "×" + Math.min(val,100).toPrecision(3);}
	if(md==5) {return val + "%";}
}

//计算期待伤害值
function C_Average(min_dmg,max_dmg,bal,ple){
	bal = Math.min(bal,100);
	min_dmg = Math.min(min_dmg,max_dmg);
	ave_dmg = (max_dmg - min_dmg) * bal /100 + min_dmg;
	ave_dmg = ave_dmg * ple;
	return (Math.round(ave_dmg*100)/100).toFixed(2);
}

//计算暴击理论值
function C_Critical(ave_dmg,max_dmg,cri,ple){
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


//范例代入
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

//自动更新范例
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
			case 0:  w_tmp = [0,0,0,0,0];	break;	//无
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
	if (confirm('是否确定要将原始性能加成设定为：\n最小伤害→'+Add_Text(w_tmp[0])+'\n最大伤害→'+Add_Text(w_tmp[1])+'\n暴击率　→'+Add_Text(w_tmp[2])+'\n平衡性　→'+Add_Text(w_tmp[3])+'\n耐久度　→'+Add_Text(w_tmp[4])+'')) {
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

	//大伤压小伤
	//w_equ[0] = Math.min(w_equ[0],w_equ[1])
	//平衡上限80%
	w_equ[3] = Math.min(w_equ[3],80)
	//小伤上限100%
	w_equ[4] = Math.min(w_equ[4],100)
	//大伤上限100%
	w_equ[5] = Math.min(w_equ[5],100)
	//大负压小负
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
	document.getElementById('equ_avecri').innerHTML = C_Critical(eval(temp),w_equ[1],w_equ[2],1);
	if (w_hit>0) {document.getElementById('equ_avecrin').innerHTML = C_Critical(eval(temp),w_equ[1],w_equ[2],w_hit+1);}
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

		//大伤压小伤
		//w_emp[0] = Math.min(w_emp[0],w_emp[1])
		//平衡上限80%
		w_emp[3] = Math.min(w_emp[3],80)
		//小伤上限100%
		w_emp[4] = Math.min(w_emp[4],100)
		//大伤上限100%
		w_emp[5] = Math.min(w_emp[5],100)
		//大负压小负
		//w_emp[4] = Math.min(w_emp[4],w_emp[5])

		example_ave[j-1] = C_Average(w_emp[0],w_emp[1],w_emp[3],1);
		example_avc[j-1] = C_Critical(eval(example_ave[j-1]),w_emp[1],w_emp[2],1);

		temp = eval("menu_"+eval("example_"+j+'[1]')+"[14]") + eval("menu_"+eval("example_"+j+'[2]')+"[14]") + eval("menu_"+eval("example_"+j+'[3]')+"[14]") + eval("menu_"+eval("example_"+j+'[4]')+"[14]") + eval("menu_"+eval("example_"+j+'[5]')+"[14]");
		eval("example_"+j+"[9] = temp");

		temp = eval("menu_"+eval("example_"+j+'[1]')+"[13]") + eval("menu_"+eval("example_"+j+'[2]')+"[13]") + eval("menu_"+eval("example_"+j+'[3]')+"[13]") + eval("menu_"+eval("example_"+j+'[4]')+"[13]") + eval("menu_"+eval("example_"+j+'[5]')+"[13]");
		eval("example_"+j+"[10] = temp");

		eval("example_"+j+"[8] = '攻:"+w_emp[0]+"~"+w_emp[1]+"、暴:"+w_emp[2]+"%、平:"+w_emp[3]+"%、伤:"+w_emp[4]+"%~"+w_emp[5]+"%'");
		for (i=7;i<=6+menu_ea;i++){
			if (w_emp[i]!=0) { eval("example_"+j+"[8] += '、"+menu_na[i-7]+":"+Ex_Menu(w_emp[i],menu_md[i-7])+"'"); }
		}
		eval("example_"+j+"[8] += '、耐:<b><u><font color=#008000>"+w_emp[6]+"</font></u></b>、价:<b><u><font color=#808000>"+eval("example_"+j+"[9]")+"</font></u></b>、期待:<b><u><font color=#0000FF>"+example_ave[j-1]+"</font></u></b>、理论:<b><u><font color=#FF0000>"+example_avc[j-1]+"</font></u></b>'");
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

<TABLE style="BORDER-COLLAPSE: collapse" borderColor=#111111 cellSpacing=2 cellPadding=2 width=740 border=0>
<TBODY>
<TR>
<TD align=middle width=740 colSpan=12>　</TD></TR>
<TR>
<TD width=740 colSpan=9></TD></TR>
<TR>
<TD width=740 bgColor=#808080 colSpan=9><FONT color=#ffffff>◆ 武器原始资讯</FONT></TD></TR>
<TR>
<TD align=middle width=125 bgColor=#eeeeee>武器名称</TD>
<TD align=middle width=108 bgColor=#eeeeee>伤害值</TD>
<TD align=middle width=54 bgColor=#eeeeee>暴击</TD>
<TD align=middle width=54 bgColor=#eeeeee>平衡</TD>
<TD align=middle width=108 bgColor=#eeeeee>负伤率</TD>
<TD align=middle width=54 bgColor=#eeeeee>耐久</TD>
<TD align=middle width=240 bgColor=#eeeeee colSpan=3>修理</TD></TR>
<TR>
<TD align=middle width=740 colSpan=12><IMG height=1 src="img/linepic.gif" width="100%" border=0></TD></TR>
<TR>
<TD align=middle width=125 bgColor=#ccffcc>吸收魔仗<BR>drain wand</TD>
<TD align=middle width=108 bgColor=#eeffee>5 ~ 14</TD>
<TD align=middle width=54 bgColor=#eeffee>15%</TD>
<TD align=middle width=54 bgColor=#eeffee>60%</TD>
<TD align=middle width=108 bgColor=#eeffee>0% ~ 0%</TD>
<TD align=middle width=54 bgColor=#eeffee>10</TD>
<TD align=middle width=222 bgColor=#eeffee>拉莎(迪尔科内尔)/菲诺拉(塔拉)/斯图尔特(敦巴伦)/赫富琳(克拉营地)/卡斯蒂娜(菲利亚)/吉莉恩(巴勒斯)</TD></TR></TBODY></TABLE>
<TABLE style="BORDER-COLLAPSE: collapse" borderColor=#111111 cellSpacing=2 cellPadding=2 width=740 border=0>
<FORM name=weaponadd>
<TBODY>
<TR>
<TD width=740><INPUT style="BORDER-RIGHT: #848284 1px solid; BORDER-TOP: #848284 1px solid; PADDING-BOTTOM: 0px; BORDER-LEFT: #848284 1px solid; COLOR: #000000; PADDING-TOP: 3px; BORDER-BOTTOM: #848284 1px solid; BACKGROUND-COLOR: #ffcccc" onclick=Reform_1(1);Reform_6() type=button value=打铁制品> <SELECT id=st_add0 disabled size=1 name=st_add0><OPTION value=0 selected>　　【小+0 大+0 暴+0 平+0 耐+0】</OPTION><OPTION value=1>Ｄ－【小+0 大+1 暴+0 平+1 耐+2】</OPTION><OPTION value=2>Ｄ　【小+0 大+1 暴+1 平+2 耐+3】</OPTION><OPTION value=3>Ｄ＋【小+1 大+1 暴+1 平+2 耐+3】</OPTION><OPTION value=4>Ｃ　【小+1 大+1 暴+1 平+3 耐+4】</OPTION><OPTION value=5>Ｃ＋【小+1 大+1 暴+2 平+4 耐+4】</OPTION><OPTION value=6>Ｂ　【小+1 大+2 暴+2 平+4 耐+4】</OPTION><OPTION value=7>Ｂ＋【小+1 大+2 暴+3 平+5 耐+5】</OPTION><OPTION value=8>Ａ　【小+2 大+2 暴+3 平+6 耐+5】</OPTION><OPTION value=9>Ａ＋【小+2 大+2 暴+4 平+7 耐+5】</OPTION><OPTION value=10>Ｓ　【小+2 大+2 暴+4 平+8 耐+5】</OPTION><OPTION value=11>Ｓ＋【小+2 大+2 暴+5 平+9 耐+5】</OPTION><OPTION value=12>Ｘ　【小+2 大+2 暴+5 平+10 耐+5】</OPTION></SELECT> 　<INPUT style="BORDER-RIGHT: #848284 1px solid; BORDER-TOP: #848284 1px solid; PADDING-BOTTOM: 0px; BORDER-LEFT: #848284 1px solid; COLOR: #000000; PADDING-TOP: 3px; BORDER-BOTTOM: #848284 1px solid; BACKGROUND-COLOR: #ffcccc" onclick=Reform_1(2);Reform_6() type=button value=魔物掉落> <SELECT id=st_add1 size=1 name=st_add1><OPTION value=0 selected>小</OPTION><OPTION value=1>+1</OPTION><OPTION value=2>+2</OPTION><OPTION value=3>+3</OPTION></SELECT> <SELECT id=st_add2 size=1 name=st_add2><OPTION value=0 selected>大</OPTION><OPTION value=1>+1</OPTION><OPTION value=2>+2</OPTION><OPTION value=3>+3</OPTION></SELECT> <SELECT id=st_add3 size=1 name=st_add3><OPTION value=0 selected>暴</OPTION><OPTION value=1>+1</OPTION><OPTION value=2>+2</OPTION><OPTION value=3>+3</OPTION></SELECT> <SELECT id=st_add4 size=1 name=st_add4><OPTION value=0 selected>平</OPTION><OPTION value=-6>-6</OPTION><OPTION value=-8>-8</OPTION><OPTION value=-10>-10</OPTION><OPTION value=-12>-12</OPTION></SELECT> <SELECT id=st_add5 size=1 name=st_add5><OPTION value=0 selected>耐</OPTION><OPTION value=1>+1</OPTION><OPTION value=2>+2</OPTION><OPTION value=3>+3</OPTION><OPTION value=4>+4</OPTION></SELECT> </TD></TR></FORM></TBODY></TABLE>
<TABLE style="BORDER-COLLAPSE: collapse" borderColor=#111111 cellSpacing=2 cellPadding=2 width=740 border=0>
<FORM name=reform>
<TBODY>
<TR>
<TD width=740 bgColor=#808080 colSpan=14><FONT color=#ffffff>◆ 改造详细选单</FONT></TD></TR>
<TR>
<TD align=middle width=115 bgColor=#eeeeee>改造项目</TD>
<TD align=middle width=38 bgColor=#eeeeee><A title=最小伤害 style="CURSOR: help"><U></U></A></TD>
<TD align=middle width=38 bgColor=#eeeeee><A title=最大伤害 style="CURSOR: help"><U></U></A></TD>
<TD align=middle width=38 bgColor=#eeeeee><A title=暴击率 style="CURSOR: help"><U></U></A></TD>
<TD align=middle width=38 bgColor=#eeeeee><A title=平衡性 style="CURSOR: help"><U></U></A></TD>
<TD align=middle width=38 bgColor=#eeeeee><A title=最小负伤率 style="CURSOR: help"><U></U></A></TD>
<TD align=middle width=38 bgColor=#eeeeee><A title=最大负伤率 style="CURSOR: help"><U></U></A></TD>
<TD align=middle width=38 bgColor=#eeeeee><A title=耐久度 style="CURSOR: help"><U>耐久</U></A></TD>
<TD align=middle width=38 bgColor=#eeeeee><A title=魔法伤害 style="CURSOR: help"><U>魔伤</U></A></TD>
<TD align=middle width=38 bgColor=#eeeeee><A title=施放魔法时的魔力消费量 style="CURSOR: help"><U>魔耗</U></A></TD>
<TD align=middle width=38 bgColor=#eeeeee><A title=施放魔法时的咏唱速度 style="CURSOR: help"><U>咏唱</U></A></TD>
<TD align=middle width=53 bgColor=#eeeeee>熟练度</TD>
<TD align=middle width=77 bgColor=#eeeeee>改造价格</TD>
<TD align=middle width=150 bgColor=#eeeeee>０&gt;１&gt;２&gt;３&gt;４</TD></TR>
<TR>
<TD align=middle width=740 colSpan=14><IMG height=1 src="img/linepic.gif" width="100%" border=0></TD></TR>
<TR>
<TD align=middle width=115 bgColor=#EEEEEE><A title=改造NPC：丽莎、史帝华、希布林、卡丝妮亚、姬琳 style="CURSOR: help"><U>凝缩 1</U></A></TD>
<TD align=middle width=38 bgColor=#ffffe0></TD>
<TD align=middle width=38 bgColor=#ffffe0></TD>
<TD align=middle width=38 bgColor=#ffffe0></TD>
<TD align=middle width=38 bgColor=#ffffe0></TD>
<TD align=middle width=38 bgColor=#ffffe0></TD>
<TD align=middle width=38 bgColor=#ffffe0></TD>
<TD align=middle width=38 bgColor=#ffffe0></TD>
<TD align=middle width=38 bgColor=#ffffe0><FONT color=#0000ff>+3%</FONT></TD>
<TD align=middle width=38 bgColor=#ffffe0></TD>
<TD align=middle width=38 bgColor=#ffffe0></TD>
<TD align=middle width=53 bgColor=#ffffe0><FONT color=#993333>20</FONT></TD>
<TD align=middle width=77 bgColor=#ffffe0><FONT color=#993333>$ 30000</FONT></TD>
<TD align=middle width=120 bgColor=#ffffe0>
<INPUT onclick=if(document.reform.r1_0.checked){Off_Checkbox(1,0);}else{Off_Checkbox(0,0);} type=checkbox name=r1_0>
<INPUT onclick=if(document.reform.r1_1.checked){Off_Checkbox(1,1);}else{Off_Checkbox(0,1);} type=checkbox name=r1_1>
<INPUT onclick=if(document.reform.r1_2.checked){Off_Checkbox(1,2);}else{Off_Checkbox(0,2);} type=checkbox name=r1_2>
<INPUT onclick=if(document.reform.r1_3.checked){Off_Checkbox(1,3);}else{Off_Checkbox(0,3);} type=checkbox name=r1_3>
<INPUT disabled type=checkbox></TD></TR>
<TR>
<TD align=middle width=115 bgColor=#EEEEEE><A title=改造NPC：丽莎、史帝华、希布林、卡丝妮亚、姬琳 style="CURSOR: help"><U>凝缩 2</U></A></TD>
<TD align=middle width=38 bgColor=#ffffe0></TD>
<TD align=middle width=38 bgColor=#ffffe0></TD>
<TD align=middle width=38 bgColor=#ffffe0></TD>
<TD align=middle width=38 bgColor=#ffffe0></TD>
<TD align=middle width=38 bgColor=#ffffe0></TD>
<TD align=middle width=38 bgColor=#ffffe0></TD>
<TD align=middle width=38 bgColor=#ffffe0></TD>
<TD align=middle width=38 bgColor=#ffffe0><FONT color=#0000ff>+4%</FONT></TD>
<TD align=middle width=38 bgColor=#ffffe0></TD>
<TD align=middle width=38 bgColor=#ffffe0></TD>
<TD align=middle width=53 bgColor=#ffffe0><FONT color=#993333>30</FONT></TD>
<TD align=middle width=77 bgColor=#ffffe0><FONT color=#993333>$ 50000</FONT></TD>
<TD align=middle width=120 bgColor=#ffffe0>
<INPUT disabled type=checkbox>
<INPUT onclick=if(document.reform.r2_1.checked){Off_Checkbox(2,1);}else{Off_Checkbox(0,1);} type=checkbox name=r2_1>
<INPUT onclick=if(document.reform.r2_2.checked){Off_Checkbox(2,2);}else{Off_Checkbox(0,2);} type=checkbox name=r2_2>
<INPUT onclick=if(document.reform.r2_3.checked){Off_Checkbox(2,3);}else{Off_Checkbox(0,3);} type=checkbox name=r2_3>
<INPUT disabled type=checkbox>
</TD></TR>
<TR>
<TD align=middle width=115 bgColor=#EEEEEE><A title=改造NPC：丽莎、史帝华、希布林、卡丝妮亚、姬琳 style="CURSOR: help"><U>凝缩 3</U></A></TD>
<TD align=middle width=38 bgColor=#ffffe0></TD>
<TD align=middle width=38 bgColor=#ffffe0></TD>
<TD align=middle width=38 bgColor=#ffffe0></TD>
<TD align=middle width=38 bgColor=#ffffe0></TD>
<TD align=middle width=38 bgColor=#ffffe0></TD>
<TD align=middle width=38 bgColor=#ffffe0></TD>
<TD align=middle width=38 bgColor=#ffffe0></TD>
<TD align=middle width=38 bgColor=#ffffe0><FONT color=#0000ff>+5%</FONT></TD>
<TD align=middle width=38 bgColor=#ffffe0></TD>
<TD align=middle width=38 bgColor=#ffffe0></TD>
<TD align=middle width=53 bgColor=#ffffe0><FONT color=#993333>40</FONT></TD>
<TD align=middle width=77 bgColor=#ffffe0><FONT color=#993333>$ 70000</FONT></TD>
<TD align=middle width=120 bgColor=#ffffe0>
<INPUT disabled type=checkbox>
<INPUT disabled type=checkbox>
<INPUT onclick=if(document.reform.r3_2.checked){Off_Checkbox(3,2);}else{Off_Checkbox(0,2);} type=checkbox name=r3_2>
<INPUT onclick=if(document.reform.r3_3.checked){Off_Checkbox(3,3);}else{Off_Checkbox(0,3);} type=checkbox name=r3_3>
<INPUT disabled type=checkbox>
</TD></TR>
<TR>
<TD align=middle width=115 bgColor=#EEEEEE><A title=改造NPC：丽莎、史帝华、希布林、卡丝妮亚、姬琳 style="CURSOR: help"><U>凝缩 4</U></A></TD>
<TD align=middle width=38 bgColor=#ffffe0></TD>
<TD align=middle width=38 bgColor=#ffffe0></TD>
<TD align=middle width=38 bgColor=#ffffe0></TD>
<TD align=middle width=38 bgColor=#ffffe0></TD>
<TD align=middle width=38 bgColor=#ffffe0></TD>
<TD align=middle width=38 bgColor=#ffffe0></TD>
<TD align=middle width=38 bgColor=#ffffe0></TD>
<TD align=middle width=38 bgColor=#ffffe0><FONT color=#0000ff>+6%</FONT></TD>
<TD align=middle width=38 bgColor=#ffffe0></TD>
<TD align=middle width=38 bgColor=#ffffe0></TD>
<TD align=middle width=53 bgColor=#ffffe0><FONT color=#993333>50</FONT></TD>
<TD align=middle width=77 bgColor=#ffffe0><FONT color=#993333>$ 90000</FONT></TD>
<TD align=middle width=120 bgColor=#ffffe0>
<INPUT disabled type=checkbox>
<INPUT disabled type=checkbox>
<INPUT disabled type=checkbox>
<INPUT onclick=if(document.reform.r4_3.checked){Off_Checkbox(4,3);}else{Off_Checkbox(0,3);} type=checkbox name=r4_3>
<INPUT disabled type=checkbox>
</TD></TR>

<TR>
<TD align=middle width=115 bgColor=#EEEEEE><A title=改造NPC：丽莎、史帝华、希布林、卡丝妮亚、姬琳 style="CURSOR: help"><U>宝石改造</U></A></TD>
<TD align=middle width=38 bgColor=#ffffe0></TD>
<TD align=middle width=38 bgColor=#ffffe0></TD>
<TD align=middle width=38 bgColor=#ffffe0></TD>
<TD align=middle width=38 bgColor=#ffffe0></TD>
<TD align=middle width=38 bgColor=#ffffe0></TD>
<TD align=middle width=38 bgColor=#ffffe0></TD>
<TD align=middle width=38 bgColor=#ffffe0></TD>
<TD align=middle width=38 bgColor=#ffffe0><FONT color=#0000ff>+3%</FONT></TD>
<TD align=middle width=38 bgColor=#ffffe0></TD>
<TD align=middle width=38 bgColor=#ffffe0></TD>
<TD align=middle width=53 bgColor=#ffffe0><FONT color=#993333>100</FONT></TD>
<TD align=middle width=77 bgColor=#ffffe0><FONT color=#993333>$ 90000</FONT></TD>
<TD align=middle width=120 bgColor=#ffffe0>
<INPUT disabled type=checkbox>
<INPUT disabled type=checkbox>
<INPUT disabled type=checkbox>
<INPUT disabled type=checkbox>
<INPUT onclick=if(document.reform.r5_4.checked){Off_Checkbox(5,4);}else{Off_Checkbox(0,4);} type=checkbox name=r5_4>

</TD></TR>

<TR>
<TD align=middle width=115 bgColor=#ccccff rowSpan=2>合计提升</TD>
<TD align=middle width=38 bgColor=#ccccff></TD>
<TD align=middle width=38 bgColor=#ccccff></TD>
<TD align=middle width=38 bgColor=#ccccff></TD>
<TD align=middle width=38 bgColor=#ccccff></TD>
<TD align=middle width=38 bgColor=#ccccff></TD>
<TD align=middle width=38 bgColor=#ccccff></TD>
<TD align=middle width=38 bgColor=#ccccff>耐久</TD>
<TD align=middle width=38 bgColor=#ccccff>魔伤</TD>
<TD align=middle width=38 bgColor=#ccccff>魔耗</TD>
<TD align=middle width=38 bgColor=#ccccff>咏唱</TD>
<TD align=middle width=53 bgColor=#ccccff>熟练值</TD>
<TD align=middle width=77 bgColor=#ccccff>改造价格</TD>
<TD align=middle width=120 rowSpan=2><INPUT style="BORDER-RIGHT: #848284 1px solid; BORDER-TOP: #848284 1px solid; PADDING-BOTTOM: 0px; BORDER-LEFT: #848284 1px solid; COLOR: #000000; PADDING-TOP: 3px; BORDER-BOTTOM: #848284 1px solid; BACKGROUND-COLOR: #dfdfff" onclick=Reset_All() type=reset value=重新设定></TD></TR>
<TR>
<TD align=middle width=76 bgColor=#eeeeff colSpan=2><SPAN id=def_min>0</SPAN>~ <SPAN id=def_max>0</SPAN></TD>
<TD align=middle width=38 bgColor=#eeeeff><SPAN id=def_cri>0</SPAN>%</TD>
<TD align=middle width=38 bgColor=#eeeeff><SPAN id=def_bal>0</SPAN></TD>
<TD align=middle width=76 bgColor=#eeeeff colSpan=2><SPAN id=def_miw>0</SPAN>% ~ <SPAN id=def_maw>0</SPAN>%</TD>
<TD align=middle width=38 bgColor=#eeeeff><SPAN id=def_dur>0</SPAN></TD>
<TD align=middle width=38 bgColor=#eeeeff><SPAN id=def_e1>0%</SPAN></TD>
<TD align=middle width=38 bgColor=#eeeeff><SPAN id=def_e2>0%</SPAN></TD>
<TD align=middle width=38 bgColor=#eeeeff><SPAN id=def_e3>0%</SPAN></TD>
<TD align=middle width=53 bgColor=#eeeeff><SPAN id=def_pra>0</SPAN></TD>
<TD align=middle width=77 bgColor=#eeeeff>$ <SPAN id=def_pri>0</SPAN></TD></TR>
<TR>
<TD align=middle width=740 colSpan=14><IMG height=1 src="img/linepic.gif" width="100%" border=0></TD></TR>
<TR>
<TD align=middle width=115 bgColor=#ffcccc>改造前数值</TD>
<TD align=middle width=76 bgColor=#ffeeee colSpan=2><SPAN id=bef_min>6</SPAN>~ <SPAN id=bef_max>10</SPAN></TD>
<TD align=middle width=38 bgColor=#ffeeee><SPAN id=bef_cri>13</SPAN>%</TD>
<TD align=middle width=38 bgColor=#ffeeee><SPAN id=bef_bal>40</SPAN>%</TD>
<TD align=middle width=76 bgColor=#ffeeee colSpan=2><SPAN id=bef_miw>0</SPAN>% ~ <SPAN id=bef_maw>0</SPAN>%</TD>
<TD align=middle width=38 bgColor=#ffeeee><SPAN id=bef_dur>11</SPAN></TD>
<TD align=middle width=38 bgColor=#ffeeee><SPAN id=bef_e1>0%</SPAN></TD>
<TD align=middle width=38 bgColor=#ffeeee><SPAN id=bef_e2>0%</SPAN></TD>
<TD align=middle width=38 bgColor=#ffeeee><SPAN id=bef_e3>0%</SPAN></TD>
<TD align=middle width=250 bgColor=#ffeeee colSpan=3>期待伤害值：<SPAN id=bef_ave>7.60</SPAN> * 4打 = <SPAN id=bef_aven>30.40</SPAN></TD></TR>
<TR>
<TD align=middle width=115 bgColor=#ccffff>改造后数值</TD>
<TD align=middle width=76 bgColor=#eeffff colSpan=2><SPAN id=aft_min>6</SPAN>~ <SPAN id=aft_max>10</SPAN></TD>
<TD align=middle width=38 bgColor=#eeffff><SPAN id=aft_cri>13</SPAN>%</TD>
<TD align=middle width=38 bgColor=#eeffff><SPAN id=aft_bal>40</SPAN>%</TD>
<TD align=middle width=76 bgColor=#eeffff colSpan=2><SPAN id=aft_miw>0</SPAN>% ~ <SPAN id=aft_maw>0</SPAN>%</TD>
<TD align=middle width=38 bgColor=#eeffff><SPAN id=aft_dur>11</SPAN></TD>
<TD align=middle width=38 bgColor=#eeffff><SPAN id=aft_e1>0%</SPAN></TD>
<TD align=middle width=38 bgColor=#eeffff><SPAN id=aft_e2>0%</SPAN></TD>
<TD align=middle width=38 bgColor=#eeffff><SPAN id=aft_e3>0%</SPAN></TD>
<TD align=middle width=250 bgColor=#eeffff colSpan=3>期待伤害值：<SPAN id=aft_ave>7.60</SPAN> * 4打 = <SPAN id=aft_aven>30.40</SPAN></TD></TR>
<TR>
<TD align=middle width=740 colSpan=14><IMG height=1 src="img/linepic.gif" width="100%" border=0></TD></TR>
<TR>
<TD align=middle width=115 bgColor=#ffcc99>武器装备后</TD>
<TD align=middle width=76 bgColor=#ffe9d2 colSpan=2><SPAN id=equ_min>6</SPAN>~ <SPAN id=equ_max>10</SPAN></TD>
<TD align=middle width=38 bgColor=#ffe9d2><SPAN id=equ_cri>13</SPAN>%</TD>
<TD align=middle width=38 bgColor=#ffe9d2><SPAN id=equ_bal>41</SPAN>%</TD>
<TD align=middle width=76 bgColor=#ffe9d2 colSpan=2><SPAN id=equ_miw>0</SPAN>% ~ <SPAN id=equ_maw>0</SPAN>%</TD>
<TD align=middle width=38 bgColor=#ffe9d2><SPAN id=equ_dur>11</SPAN></TD>
<TD align=middle width=38 bgColor=#ffe9d2><SPAN id=equ_e1>0%</SPAN></TD>
<TD align=middle width=38 bgColor=#ffe9d2><SPAN id=equ_e2>0%</SPAN></TD>
<TD align=middle width=38 bgColor=#ffe9d2><SPAN id=equ_e3>0%</SPAN></TD>
<TD align=middle width=250 bgColor=#ffe9d2 colSpan=3>期待伤害值：<SPAN id=equ_ave>7.64</SPAN> * 4打 = <SPAN id=equ_aven>30.56</SPAN></TD></TR>
<TR>
<TD align=middle width=490 colSpan=11>　</TD>
<TD align=middle width=250 bgColor=#ffe9d2 colSpan=3>暴击理论值：<SPAN id=equ_avecri>8.29</SPAN> * 4打 = <SPAN id=equ_avecrin>33.16</SPAN></TD></TR></FORM></TBODY></TABLE>
<TABLE style="BORDER-COLLAPSE: collapse" borderColor=#111111 cellSpacing=2 cellPadding=2 width=740 border=0>
<FORM name=chrsat>
<TBODY>
<TR>
<TD width=860 colSpan=2>　</TD></TR></FORM></TBODY></TABLE>
<TABLE style="BORDER-COLLAPSE: collapse" borderColor=#111111 cellSpacing=2 cellPadding=2 width=740 border=0>
<FORM name=exset>
<TBODY>
<TR>
<TD width=400><SELECT id=exp_print onchange=Reform_7() size=1 name=exp_print><OPTION value=1 selected>依照内订顺序排列</OPTION><OPTION value=2>依照熟练度排列</OPTION><OPTION value=3>依照改造价格排列</OPTION><OPTION value=4>依照期待伤害值排列</OPTION><OPTION value=5>依照暴击理论值排列</OPTION></SELECT> <INPUT style="BORDER-RIGHT: #848284 1px solid; BORDER-TOP: #848284 1px solid; PADDING-BOTTOM: 0px; BORDER-LEFT: #848284 1px solid; COLOR: #000000; PADDING-TOP: 3px; BORDER-BOTTOM: #848284 1px solid; BACKGROUND-COLOR: #dddddd" onclick=Reform_6() type=button value=手动更新范例 name=exbutton> <INPUT onclick=(this.checked?Exp_Mode(true):Exp_Mode(false)) type=checkbox name=exmode>即时更新范例</TD>
<TD align=right width=340><SELECT id=mc_sel size=1 name=mc_sel><OPTION value=0 selected>改造项目记忆卡 (0/10)</OPTION><OPTION value=1>(一)　---</OPTION><OPTION value=2>(二)　---</OPTION><OPTION value=3>(三)　---</OPTION><OPTION value=4>(四)　---</OPTION><OPTION value=5>(五)　---</OPTION><OPTION value=6>(六)　---</OPTION><OPTION value=7>(七)　---</OPTION><OPTION value=8>(八)　---</OPTION><OPTION value=9>(九)　---</OPTION><OPTION value=10>(十)　---</OPTION></SELECT> <INPUT style="BORDER-RIGHT: #848284 1px solid; BORDER-TOP: #848284 1px solid; PADDING-BOTTOM: 0px; BORDER-LEFT: #848284 1px solid; COLOR: #000000; PADDING-TOP: 3px; BORDER-BOTTOM: #848284 1px solid; BACKGROUND-COLOR: #ccffff" onClick="MC_Temp=eval(document.getElementById('mc_sel').value);Save_Reform();" type=button value=储存> <INPUT style="BORDER-RIGHT: #848284 1px solid; BORDER-TOP: #848284 1px solid; PADDING-BOTTOM: 0px; BORDER-LEFT: #848284 1px solid; COLOR: #000000; PADDING-TOP: 3px; BORDER-BOTTOM: #848284 1px solid; BACKGROUND-COLOR: #ccffff" onClick="MC_Temp=eval(document.getElementById('mc_sel').value);Delete_Reform();" type=button value=删除></TD></TR></FORM></TBODY></TABLE><SPAN id=example>
<TABLE style="BORDER-COLLAPSE: collapse" borderColor=#111111 cellSpacing=2 cellPadding=2 width=740 border=0>
<TBODY></TBODY></TABLE></SPAN>
<script Language="JavaScript">Reform_2();document.exset.exmode.checked=false;Exp_Mode(false);Start_Memory_Card();</script>
      </center>
    </div>   <center><br><br><br>

<?php
include("foot.html");
?><br> <br>
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
