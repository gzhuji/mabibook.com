
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

//-------------------------------------------------------------------
//  Mabinogi JS Clock  ver 4.4.0
//  Programed by wingchord
//  2006/09/04 LastUpDate
//  Copyright (C) 2001-2006 Spirit-Alliance , All rights reserved .
//  Copyright (C) 2005-2006 Mabinogi Guide Book , All rights reserved .
//-------------------------------------------------------------------

var PrintMode = 1;

//设定颜色
var color1 = "#66FFFF";		/*城镇*/
var color2 = "#99FF99";		/*原野*/
var color3 = "#FFBBBB";		/*地下城*/
var color4 = "#CCCCFF";		/*商人城镇地图*/
var color5 = "#FFFFAA";		/*商人原野地图*/
//设定星月门顺序
/*
var Moongate = new Array(21);
Moongate[0] = "敦巴伦".fontcolor(color1);
Moongate[1] = "盖尔茨".fontcolor(color2);
Moongate[2] = "皮卡".fontcolor(color3);
Moongate[3] = "玛斯".fontcolor(color3);
Moongate[4] = "艾明马恰".fontcolor(color1);
Moongate[5] = "艾明马恰".fontcolor(color1);
Moongate[6] = "克丽尔地下城".fontcolor(color3);
Moongate[7] = "拉比地下城".fontcolor(color3);
Moongate[8] = "克丽尔地下城".fontcolor(color3);
Moongate[9] = "班格".fontcolor(color1);
Moongate[10] = "皮卡".fontcolor(color3);
Moongate[11] = "敦巴伦".fontcolor(color1);
Moongate[12] = "迪尔科内尔".fontcolor(color1);
Moongate[13] = "迪尔科内尔".fontcolor(color1);
Moongate[14] = "赛尔地下城".fontcolor(color3);
Moongate[15] = "凯欧岛".fontcolor(color2);
Moongate[16] = "伊比地下城".fontcolor(color3);
Moongate[17] = "菲奥纳地下城".fontcolor(color3);
Moongate[18] = "班格".fontcolor(color1);
Moongate[19] = "杜加德走廊".fontcolor(color2);
Moongate[20] = "凯欧岛".fontcolor(color2);
*/
var Moongate = new Array(25);
Moongate[0] = "盖尔茨".fontcolor(color2);
Moongate[1] = "凯安港口".fontcolor(color1);
Moongate[2] = "班格".fontcolor(color1);
Moongate[3] = "克丽尔地下城".fontcolor(color3);
Moongate[4] = "伊比地下城".fontcolor(color3);
Moongate[5] = "菲奥纳地下城".fontcolor(color3);
Moongate[6] = "玛斯".fontcolor(color3);
Moongate[7] = "赛尔地下城".fontcolor(color3);
Moongate[8] = "凯安港口".fontcolor(color1);
Moongate[9] = "班格".fontcolor(color1);
Moongate[10] = "凯欧岛".fontcolor(color2);
Moongate[11] = "拉比地下城".fontcolor(color3);
Moongate[12] = "艾明马恰".fontcolor(color1);
Moongate[13] = "敦巴伦".fontcolor(color1);
Moongate[14] = "迪尔科内尔".fontcolor(color1);
Moongate[15] = "艾明马恰".fontcolor(color1);
Moongate[16] = "敦巴伦".fontcolor(color1);
Moongate[17] = "克丽尔地下城".fontcolor(color3);
Moongate[18] = "凯安港口".fontcolor(color1);
Moongate[19] = "迪尔科内尔".fontcolor(color1);
Moongate[20] = "凯欧岛".fontcolor(color2);
Moongate[21] = "皮卡".fontcolor(color3);
Moongate[22] = "皮卡".fontcolor(color3);
Moongate[23] = "杜加德走廊".fontcolor(color2);
Moongate[24] = "凯安港口".fontcolor(color1);
//设定流浪商人顺序
var Business = new Array(14);
Business[0] = "艾明马恰　大圣堂东南方的小岛".fontcolor(color4);
Business[1] = "山米尔平原　三叉路往西方的小屋".fontcolor(color5);
Business[2] = "盖尔茨丘陵　龙之遗迹东南方的小屋".fontcolor(color5);
Business[3] = "班格　巴里地下城入口旁".fontcolor(color4);
Business[4] = "敦巴伦　学校西南方的楼梯".fontcolor(color4);
Business[5] = "杜加德走廊　伐木场东北方的小屋".fontcolor(color5);
Business[6] = "迪尔科内尔　旅馆东南方".fontcolor(color4);
Business[7] = "杜加德走廊　伐木场东北方的小屋".fontcolor(color5);
Business[8] = "敦巴伦　东墙外的马铃薯田中".fontcolor(color4);
Business[9] = "盖尔茨丘陵　龙之遗迹东南方的小屋".fontcolor(color5);
Business[10] = "班格　酒店里".fontcolor(color4);
Business[11] = "山米尔平原　三叉路往西方的小屋".fontcolor(color5);
Business[12] = "艾明马恰　武器店西方的小巷".fontcolor(color4);
Business[13] = "凯欧岛　星月门的西北方".fontcolor(color5);
//露雅上班时间
var Rua = "0010010110111000000010100100010001001000100";

SystemMSG = String.fromCharCode(119,105,110,100,111,119,46,115,116,97,116,117,115)+unescape("%3D%27%u746A%u5947%u6559%u6230%u624B%u518A-Mabinogi%20Guide%20Book%27");

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
	if ( ErinnSeason == 0 )   {ErinnSeason = "立春";}
	if ( ErinnSeason == 1 )   {ErinnSeason = "春分";}
	if ( ErinnSeason == 2 )   {ErinnSeason = "入夏";}
	if ( ErinnSeason == 3 )   {ErinnSeason = "立夏";}
	if ( ErinnSeason == 4 )   {ErinnSeason = "秋收";}
	if ( ErinnSeason == 5 )   {ErinnSeason = "秋收节";}
	if ( ErinnSeason == 6 )   {ErinnSeason = "山夏";}
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
	NormalPrint = "爱尔琳 " + ErinnSeason + " " + ErinnDay + " 日 " + ErinnHour + ":" + ErinnMinute + "　"
	//输出资料
	if (PrintMode==1)   {
		if ( MoonHour * 60 + MoonMinute <= 720 )   {
			NormalPrint = (NormalPrint + "星月门：现在→" + Moongate[MoonDay%Moongate.length] + "　下次→" + Moongate[(MoonDay+1)%Moongate.length]);}
		else   {
			NormalPrint = (NormalPrint + "星月门：即将→" + Moongate[(MoonDay+1)%Moongate.length] + "　下次→" + Moongate[(MoonDay+2)%Moongate.length]);}
	}
	if (PrintMode==2)   {
		NormalPrint = (NormalPrint + "流浪商人：" + Business[BunsDay]);
	}
	if (PrintMode==3)   {
		if ( MoonHour * 60 + MoonMinute <= 720 )   {
			NormalPrint = (NormalPrint + "露雅：正在→" + (Test(Rua.substr(RuaDay%43,1))?"上班".fontcolor("#66CCFF"):"休息".fontcolor("CCCCCC")) + "　明天→" + (Test(Rua.substr((RuaDay%43)+1,1))?"上班".fontcolor("#66CCFF"):"休息".fontcolor("CCCCCC")) + "　后天→" + (Test(Rua.substr((RuaDay%43)+2,1))?"上班".fontcolor("#66CCFF"):"休息".fontcolor("CCCCCC")));}
		else   {
			NormalPrint = (NormalPrint + "露雅：即将→" + (Test(Rua.substr((RuaDay%43)+1,1))?"上班".fontcolor("#66CCFF"):"休息".fontcolor("CCCCCC")) + "　明天→" + (Test(Rua.substr((RuaDay%43)+2,1))?"上班".fontcolor("#66CCFF"):"休息".fontcolor("CCCCCC")) + "　后天→" + (Test(Rua.substr((RuaDay%43)+3,1))?"上班".fontcolor("#66CCFF"):"休息".fontcolor("CCCCCC")));}
	}
	document.getElementById('mgbclock').innerHTML = NormalPrint;

	eval(SystemMSG);

	setTimeout("NowWatch()",250);
}

function ChangePrint(){
	if (PrintMode==3)   {
		PrintMode=1;}
	else  {
		PrintMode+=1;}
}

function Test(Num){
	if (Num==1)   {
		return true;}
	else  {
		return false;}
}

//-->

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

//-------------------------------------------------------------------
//  Mabinogi JS Clock  ver 4.4.0
//  Programed by wingchord
//  2006/09/04 LastUpDate
//  Copyright (C) 2001-2006 Spirit-Alliance , All rights reserved .
//  Copyright (C) 2005-2006 Mabinogi Guide Book , All rights reserved .
//-------------------------------------------------------------------

var PrintMode = 1;

//设定颜色
var color1 = "#66FFFF";		/*城镇*/
var color2 = "#99FF99";		/*原野*/
var color3 = "#FFBBBB";		/*地下城*/
var color4 = "#CCCCFF";		/*商人城镇地图*/
var color5 = "#FFFFAA";		/*商人原野地图*/
//设定星月门顺序
/*
var Moongate = new Array(21);
Moongate[0] = "敦巴伦".fontcolor(color1);
Moongate[1] = "盖尔茨".fontcolor(color2);
Moongate[2] = "皮卡".fontcolor(color3);
Moongate[3] = "玛斯".fontcolor(color3);
Moongate[4] = "艾明马恰".fontcolor(color1);
Moongate[5] = "艾明马恰".fontcolor(color1);
Moongate[6] = "克丽尔地下城".fontcolor(color3);
Moongate[7] = "拉比地下城".fontcolor(color3);
Moongate[8] = "克丽尔地下城".fontcolor(color3);
Moongate[9] = "班格".fontcolor(color1);
Moongate[10] = "皮卡".fontcolor(color3);
Moongate[11] = "敦巴伦".fontcolor(color1);
Moongate[12] = "迪尔科内尔".fontcolor(color1);
Moongate[13] = "迪尔科内尔".fontcolor(color1);
Moongate[14] = "赛尔地下城".fontcolor(color3);
Moongate[15] = "凯欧岛".fontcolor(color2);
Moongate[16] = "伊比地下城".fontcolor(color3);
Moongate[17] = "菲奥纳地下城".fontcolor(color3);
Moongate[18] = "班格".fontcolor(color1);
Moongate[19] = "杜加德走廊".fontcolor(color2);
Moongate[20] = "凯欧岛".fontcolor(color2);
*/
var Moongate = new Array(25);
Moongate[0] = "盖尔茨".fontcolor(color2);
Moongate[1] = "凯安港口".fontcolor(color1);
Moongate[2] = "班格".fontcolor(color1);
Moongate[3] = "克丽尔地下城".fontcolor(color3);
Moongate[4] = "伊比地下城".fontcolor(color3);
Moongate[5] = "菲奥纳地下城".fontcolor(color3);
Moongate[6] = "玛斯".fontcolor(color3);
Moongate[7] = "赛尔地下城".fontcolor(color3);
Moongate[8] = "凯安港口".fontcolor(color1);
Moongate[9] = "班格".fontcolor(color1);
Moongate[10] = "凯欧岛".fontcolor(color2);
Moongate[11] = "拉比地下城".fontcolor(color3);
Moongate[12] = "艾明马恰".fontcolor(color1);
Moongate[13] = "敦巴伦".fontcolor(color1);
Moongate[14] = "迪尔科内尔".fontcolor(color1);
Moongate[15] = "艾明马恰".fontcolor(color1);
Moongate[16] = "敦巴伦".fontcolor(color1);
Moongate[17] = "克丽尔地下城".fontcolor(color3);
Moongate[18] = "凯安港口".fontcolor(color1);
Moongate[19] = "迪尔科内尔".fontcolor(color1);
Moongate[20] = "凯欧岛".fontcolor(color2);
Moongate[21] = "皮卡".fontcolor(color3);
Moongate[22] = "皮卡".fontcolor(color3);
Moongate[23] = "杜加德走廊".fontcolor(color2);
Moongate[24] = "凯安港口".fontcolor(color1);
//设定流浪商人顺序
var Business = new Array(14);
Business[0] = "艾明马恰　大圣堂东南方的小岛".fontcolor(color4);
Business[1] = "山米尔平原　三叉路往西方的小屋".fontcolor(color5);
Business[2] = "盖尔茨丘陵　龙之遗迹东南方的小屋".fontcolor(color5);
Business[3] = "班格　巴里地下城入口旁".fontcolor(color4);
Business[4] = "敦巴伦　学校西南方的楼梯".fontcolor(color4);
Business[5] = "杜加德走廊　伐木场东北方的小屋".fontcolor(color5);
Business[6] = "迪尔科内尔　旅馆东南方".fontcolor(color4);
Business[7] = "杜加德走廊　伐木场东北方的小屋".fontcolor(color5);
Business[8] = "敦巴伦　东墙外的马铃薯田中".fontcolor(color4);
Business[9] = "盖尔茨丘陵　龙之遗迹东南方的小屋".fontcolor(color5);
Business[10] = "班格　酒店里".fontcolor(color4);
Business[11] = "山米尔平原　三叉路往西方的小屋".fontcolor(color5);
Business[12] = "艾明马恰　武器店西方的小巷".fontcolor(color4);
Business[13] = "凯欧岛　星月门的西北方".fontcolor(color5);
//露雅上班时间
var Rua = "0010010110111000000010100100010001001000100";

SystemMSG = String.fromCharCode(119,105,110,100,111,119,46,115,116,97,116,117,115)+unescape("%3D%27%u746A%u5947%u6559%u6230%u624B%u518A-Mabinogi%20Guide%20Book%27");

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
	if ( ErinnSeason == 0 )   {ErinnSeason = "立春";}
	if ( ErinnSeason == 1 )   {ErinnSeason = "春分";}
	if ( ErinnSeason == 2 )   {ErinnSeason = "入夏";}
	if ( ErinnSeason == 3 )   {ErinnSeason = "立夏";}
	if ( ErinnSeason == 4 )   {ErinnSeason = "秋收";}
	if ( ErinnSeason == 5 )   {ErinnSeason = "秋收节";}
	if ( ErinnSeason == 6 )   {ErinnSeason = "山夏";}
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
	NormalPrint = "爱尔琳 " + ErinnSeason + " " + ErinnDay + " 日 " + ErinnHour + ":" + ErinnMinute + "　"
	//输出资料
	if (PrintMode==1)   {
		if ( MoonHour * 60 + MoonMinute <= 720 )   {
			NormalPrint = (NormalPrint + "星月门：现在→" + Moongate[MoonDay%Moongate.length] + "　下次→" + Moongate[(MoonDay+1)%Moongate.length]);}
		else   {
			NormalPrint = (NormalPrint + "星月门：即将→" + Moongate[(MoonDay+1)%Moongate.length] + "　下次→" + Moongate[(MoonDay+2)%Moongate.length]);}
	}
	if (PrintMode==2)   {
		NormalPrint = (NormalPrint + "流浪商人：" + Business[BunsDay]);
	}
	if (PrintMode==3)   {
		if ( MoonHour * 60 + MoonMinute <= 720 )   {
			NormalPrint = (NormalPrint + "露雅：正在→" + (Test(Rua.substr(RuaDay%43,1))?"上班".fontcolor("#66CCFF"):"休息".fontcolor("CCCCCC")) + "　明天→" + (Test(Rua.substr((RuaDay%43)+1,1))?"上班".fontcolor("#66CCFF"):"休息".fontcolor("CCCCCC")) + "　后天→" + (Test(Rua.substr((RuaDay%43)+2,1))?"上班".fontcolor("#66CCFF"):"休息".fontcolor("CCCCCC")));}
		else   {
			NormalPrint = (NormalPrint + "露雅：即将→" + (Test(Rua.substr((RuaDay%43)+1,1))?"上班".fontcolor("#66CCFF"):"休息".fontcolor("CCCCCC")) + "　明天→" + (Test(Rua.substr((RuaDay%43)+2,1))?"上班".fontcolor("#66CCFF"):"休息".fontcolor("CCCCCC")) + "　后天→" + (Test(Rua.substr((RuaDay%43)+3,1))?"上班".fontcolor("#66CCFF"):"休息".fontcolor("CCCCCC")));}
	}
	document.getElementById('mgbclock').innerHTML = NormalPrint;

	eval(SystemMSG);

	setTimeout("NowWatch()",250);
}

function ChangePrint(){
	if (PrintMode==3)   {
		PrintMode=1;}
	else  {
		PrintMode+=1;}
}

function Test(Num){
	if (Num==1)   {
		return true;}
	else  {
		return false;}
}

//-->
