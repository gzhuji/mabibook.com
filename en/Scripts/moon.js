
<!--

//ʱ��У��
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

//�趨��ɫ
var color1 = "#66FFFF";		/*����*/
var color2 = "#99FF99";		/*ԭҰ*/
var color3 = "#FFBBBB";		/*���³�*/
var color4 = "#CCCCFF";		/*���˳����ͼ*/
var color5 = "#FFFFAA";		/*����ԭҰ��ͼ*/
//�趨������˳��
/*
var Moongate = new Array(21);
Moongate[0] = "�ذ���".fontcolor(color1);
Moongate[1] = "�Ƕ���".fontcolor(color2);
Moongate[2] = "Ƥ��".fontcolor(color3);
Moongate[3] = "��˹".fontcolor(color3);
Moongate[4] = "������ǡ".fontcolor(color1);
Moongate[5] = "������ǡ".fontcolor(color1);
Moongate[6] = "���������³�".fontcolor(color3);
Moongate[7] = "���ȵ��³�".fontcolor(color3);
Moongate[8] = "���������³�".fontcolor(color3);
Moongate[9] = "���".fontcolor(color1);
Moongate[10] = "Ƥ��".fontcolor(color3);
Moongate[11] = "�ذ���".fontcolor(color1);
Moongate[12] = "�϶����ڶ�".fontcolor(color1);
Moongate[13] = "�϶����ڶ�".fontcolor(color1);
Moongate[14] = "�������³�".fontcolor(color3);
Moongate[15] = "��ŷ��".fontcolor(color2);
Moongate[16] = "���ȵ��³�".fontcolor(color3);
Moongate[17] = "�ư��ɵ��³�".fontcolor(color3);
Moongate[18] = "���".fontcolor(color1);
Moongate[19] = "�żӵ�����".fontcolor(color2);
Moongate[20] = "��ŷ��".fontcolor(color2);
*/
var Moongate = new Array(25);
Moongate[0] = "�Ƕ���".fontcolor(color2);
Moongate[1] = "�����ۿ�".fontcolor(color1);
Moongate[2] = "���".fontcolor(color1);
Moongate[3] = "���������³�".fontcolor(color3);
Moongate[4] = "���ȵ��³�".fontcolor(color3);
Moongate[5] = "�ư��ɵ��³�".fontcolor(color3);
Moongate[6] = "��˹".fontcolor(color3);
Moongate[7] = "�������³�".fontcolor(color3);
Moongate[8] = "�����ۿ�".fontcolor(color1);
Moongate[9] = "���".fontcolor(color1);
Moongate[10] = "��ŷ��".fontcolor(color2);
Moongate[11] = "���ȵ��³�".fontcolor(color3);
Moongate[12] = "������ǡ".fontcolor(color1);
Moongate[13] = "�ذ���".fontcolor(color1);
Moongate[14] = "�϶����ڶ�".fontcolor(color1);
Moongate[15] = "������ǡ".fontcolor(color1);
Moongate[16] = "�ذ���".fontcolor(color1);
Moongate[17] = "���������³�".fontcolor(color3);
Moongate[18] = "�����ۿ�".fontcolor(color1);
Moongate[19] = "�϶����ڶ�".fontcolor(color1);
Moongate[20] = "��ŷ��".fontcolor(color2);
Moongate[21] = "Ƥ��".fontcolor(color3);
Moongate[22] = "Ƥ��".fontcolor(color3);
Moongate[23] = "�żӵ�����".fontcolor(color2);
Moongate[24] = "�����ۿ�".fontcolor(color1);
//�趨��������˳��
var Business = new Array(14);
Business[0] = "������ǡ����ʥ�ö��Ϸ���С��".fontcolor(color4);
Business[1] = "ɽ�׶�ƽԭ������·��������С��".fontcolor(color5);
Business[2] = "�Ƕ������ꡡ��֮�ż����Ϸ���С��".fontcolor(color5);
Business[3] = "��񡡰�����³������".fontcolor(color4);
Business[4] = "�ذ��ס�ѧУ���Ϸ���¥��".fontcolor(color4);
Business[5] = "�żӵ����ȡ���ľ����������С��".fontcolor(color5);
Business[6] = "�϶����ڶ����ùݶ��Ϸ�".fontcolor(color4);
Business[7] = "�żӵ����ȡ���ľ����������С��".fontcolor(color5);
Business[8] = "�ذ��ס���ǽ�������������".fontcolor(color4);
Business[9] = "�Ƕ������ꡡ��֮�ż����Ϸ���С��".fontcolor(color5);
Business[10] = "��񡡾Ƶ���".fontcolor(color4);
Business[11] = "ɽ�׶�ƽԭ������·��������С��".fontcolor(color5);
Business[12] = "������ǡ��������������С��".fontcolor(color4);
Business[13] = "��ŷ���������ŵ�������".fontcolor(color5);
//¶���ϰ�ʱ��
var Rua = "0010010110111000000010100100010001001000100";

SystemMSG = String.fromCharCode(119,105,110,100,111,119,46,115,116,97,116,117,115)+unescape("%3D%27%u746A%u5947%u6559%u6230%u624B%u518A-Mabinogi%20Guide%20Book%27");

function NowWatch() {
	//ȡ��ʹ����ϵͳʱ��
	var Now = new Date();
	//ȡ��̨��ʱ��(+8)
	var TaipeiTime = Now.getTime();
	//������ʱ��У��(Day+14 Hour-16)
	var ErinnTime = TaipeiTime + (8*60*60*1000) + DifferenceTime;
	//ȡ�ð�����ʱ��
	var ErinnSeason = Math.floor((ErinnTime % (7*40*24*60*1.5*1000) / (40*24*60*1.5*1000)) + 4) % 7;
	var ErinnDay = Math.floor(ErinnTime % (40*24*60*1.5*1000) / (24*60*1.5*1000)) + 1;
	var ErinnHour = Math.floor((ErinnTime % (24*60*1.5*1000)) / (60*1.5*1000));
	var ErinnMinute = Math.floor((ErinnTime % (60*1.5*1000)) / (1.5*1000));
	if ( ErinnSeason == 0 )   {ErinnSeason = "����";}
	if ( ErinnSeason == 1 )   {ErinnSeason = "����";}
	if ( ErinnSeason == 2 )   {ErinnSeason = "����";}
	if ( ErinnSeason == 3 )   {ErinnSeason = "����";}
	if ( ErinnSeason == 4 )   {ErinnSeason = "����";}
	if ( ErinnSeason == 5 )   {ErinnSeason = "���ս�";}
	if ( ErinnSeason == 6 )   {ErinnSeason = "ɽ��";}
	if ( ErinnHour < 10 )   {ErinnHour = "0" + ErinnHour;}
	if ( ErinnMinute < 10 ) {ErinnMinute = "0" + ErinnMinute;}
	//ȡ�ð�ά��ʱ��
	var MoonTime = ErinnTime + (90000 * 6);
	var MoonDay = Math.floor(MoonTime % (Moongate.length*24*60*1.5*1000) / (24*60*1.5*1000));
	var MoonHour = Math.floor((MoonTime % (24*60*1.5*1000)) / (60*1.5*1000));
	var MoonMinute = Math.floor((MoonTime % (60*1.5*1000)) / (1.5*1000));
	//ȡ��¶��ʱ��
	var RuaDay = Math.floor(MoonTime % (43*24*60*1.5*1000) / (24*60*1.5*1000));
	//ȡ����������ʱ��
	var BunsDay = Math.floor(ErinnTime % (14*24*60*1.5*1000) / (24*60*1.5*1000));

	//������ʾ��ʽ
	NormalPrint = "������ " + ErinnSeason + " " + ErinnDay + " �� " + ErinnHour + ":" + ErinnMinute + "��"
	//�������
	if (PrintMode==1)   {
		if ( MoonHour * 60 + MoonMinute <= 720 )   {
			NormalPrint = (NormalPrint + "�����ţ����ڡ�" + Moongate[MoonDay%Moongate.length] + "���´Ρ�" + Moongate[(MoonDay+1)%Moongate.length]);}
		else   {
			NormalPrint = (NormalPrint + "�����ţ�������" + Moongate[(MoonDay+1)%Moongate.length] + "���´Ρ�" + Moongate[(MoonDay+2)%Moongate.length]);}
	}
	if (PrintMode==2)   {
		NormalPrint = (NormalPrint + "�������ˣ�" + Business[BunsDay]);
	}
	if (PrintMode==3)   {
		if ( MoonHour * 60 + MoonMinute <= 720 )   {
			NormalPrint = (NormalPrint + "¶�ţ����ڡ�" + (Test(Rua.substr(RuaDay%43,1))?"�ϰ�".fontcolor("#66CCFF"):"��Ϣ".fontcolor("CCCCCC")) + "�������" + (Test(Rua.substr((RuaDay%43)+1,1))?"�ϰ�".fontcolor("#66CCFF"):"��Ϣ".fontcolor("CCCCCC")) + "�������" + (Test(Rua.substr((RuaDay%43)+2,1))?"�ϰ�".fontcolor("#66CCFF"):"��Ϣ".fontcolor("CCCCCC")));}
		else   {
			NormalPrint = (NormalPrint + "¶�ţ�������" + (Test(Rua.substr((RuaDay%43)+1,1))?"�ϰ�".fontcolor("#66CCFF"):"��Ϣ".fontcolor("CCCCCC")) + "�������" + (Test(Rua.substr((RuaDay%43)+2,1))?"�ϰ�".fontcolor("#66CCFF"):"��Ϣ".fontcolor("CCCCCC")) + "�������" + (Test(Rua.substr((RuaDay%43)+3,1))?"�ϰ�".fontcolor("#66CCFF"):"��Ϣ".fontcolor("CCCCCC")));}
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

//ʱ��У��
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

//�趨��ɫ
var color1 = "#66FFFF";		/*����*/
var color2 = "#99FF99";		/*ԭҰ*/
var color3 = "#FFBBBB";		/*���³�*/
var color4 = "#CCCCFF";		/*���˳����ͼ*/
var color5 = "#FFFFAA";		/*����ԭҰ��ͼ*/
//�趨������˳��
/*
var Moongate = new Array(21);
Moongate[0] = "�ذ���".fontcolor(color1);
Moongate[1] = "�Ƕ���".fontcolor(color2);
Moongate[2] = "Ƥ��".fontcolor(color3);
Moongate[3] = "��˹".fontcolor(color3);
Moongate[4] = "������ǡ".fontcolor(color1);
Moongate[5] = "������ǡ".fontcolor(color1);
Moongate[6] = "���������³�".fontcolor(color3);
Moongate[7] = "���ȵ��³�".fontcolor(color3);
Moongate[8] = "���������³�".fontcolor(color3);
Moongate[9] = "���".fontcolor(color1);
Moongate[10] = "Ƥ��".fontcolor(color3);
Moongate[11] = "�ذ���".fontcolor(color1);
Moongate[12] = "�϶����ڶ�".fontcolor(color1);
Moongate[13] = "�϶����ڶ�".fontcolor(color1);
Moongate[14] = "�������³�".fontcolor(color3);
Moongate[15] = "��ŷ��".fontcolor(color2);
Moongate[16] = "���ȵ��³�".fontcolor(color3);
Moongate[17] = "�ư��ɵ��³�".fontcolor(color3);
Moongate[18] = "���".fontcolor(color1);
Moongate[19] = "�żӵ�����".fontcolor(color2);
Moongate[20] = "��ŷ��".fontcolor(color2);
*/
var Moongate = new Array(25);
Moongate[0] = "�Ƕ���".fontcolor(color2);
Moongate[1] = "�����ۿ�".fontcolor(color1);
Moongate[2] = "���".fontcolor(color1);
Moongate[3] = "���������³�".fontcolor(color3);
Moongate[4] = "���ȵ��³�".fontcolor(color3);
Moongate[5] = "�ư��ɵ��³�".fontcolor(color3);
Moongate[6] = "��˹".fontcolor(color3);
Moongate[7] = "�������³�".fontcolor(color3);
Moongate[8] = "�����ۿ�".fontcolor(color1);
Moongate[9] = "���".fontcolor(color1);
Moongate[10] = "��ŷ��".fontcolor(color2);
Moongate[11] = "���ȵ��³�".fontcolor(color3);
Moongate[12] = "������ǡ".fontcolor(color1);
Moongate[13] = "�ذ���".fontcolor(color1);
Moongate[14] = "�϶����ڶ�".fontcolor(color1);
Moongate[15] = "������ǡ".fontcolor(color1);
Moongate[16] = "�ذ���".fontcolor(color1);
Moongate[17] = "���������³�".fontcolor(color3);
Moongate[18] = "�����ۿ�".fontcolor(color1);
Moongate[19] = "�϶����ڶ�".fontcolor(color1);
Moongate[20] = "��ŷ��".fontcolor(color2);
Moongate[21] = "Ƥ��".fontcolor(color3);
Moongate[22] = "Ƥ��".fontcolor(color3);
Moongate[23] = "�żӵ�����".fontcolor(color2);
Moongate[24] = "�����ۿ�".fontcolor(color1);
//�趨��������˳��
var Business = new Array(14);
Business[0] = "������ǡ����ʥ�ö��Ϸ���С��".fontcolor(color4);
Business[1] = "ɽ�׶�ƽԭ������·��������С��".fontcolor(color5);
Business[2] = "�Ƕ������ꡡ��֮�ż����Ϸ���С��".fontcolor(color5);
Business[3] = "��񡡰�����³������".fontcolor(color4);
Business[4] = "�ذ��ס�ѧУ���Ϸ���¥��".fontcolor(color4);
Business[5] = "�żӵ����ȡ���ľ����������С��".fontcolor(color5);
Business[6] = "�϶����ڶ����ùݶ��Ϸ�".fontcolor(color4);
Business[7] = "�żӵ����ȡ���ľ����������С��".fontcolor(color5);
Business[8] = "�ذ��ס���ǽ�������������".fontcolor(color4);
Business[9] = "�Ƕ������ꡡ��֮�ż����Ϸ���С��".fontcolor(color5);
Business[10] = "��񡡾Ƶ���".fontcolor(color4);
Business[11] = "ɽ�׶�ƽԭ������·��������С��".fontcolor(color5);
Business[12] = "������ǡ��������������С��".fontcolor(color4);
Business[13] = "��ŷ���������ŵ�������".fontcolor(color5);
//¶���ϰ�ʱ��
var Rua = "0010010110111000000010100100010001001000100";

SystemMSG = String.fromCharCode(119,105,110,100,111,119,46,115,116,97,116,117,115)+unescape("%3D%27%u746A%u5947%u6559%u6230%u624B%u518A-Mabinogi%20Guide%20Book%27");

function NowWatch() {
	//ȡ��ʹ����ϵͳʱ��
	var Now = new Date();
	//ȡ��̨��ʱ��(+8)
	var TaipeiTime = Now.getTime();
	//������ʱ��У��(Day+14 Hour-16)
	var ErinnTime = TaipeiTime + (8*60*60*1000) + DifferenceTime;
	//ȡ�ð�����ʱ��
	var ErinnSeason = Math.floor((ErinnTime % (7*40*24*60*1.5*1000) / (40*24*60*1.5*1000)) + 4) % 7;
	var ErinnDay = Math.floor(ErinnTime % (40*24*60*1.5*1000) / (24*60*1.5*1000)) + 1;
	var ErinnHour = Math.floor((ErinnTime % (24*60*1.5*1000)) / (60*1.5*1000));
	var ErinnMinute = Math.floor((ErinnTime % (60*1.5*1000)) / (1.5*1000));
	if ( ErinnSeason == 0 )   {ErinnSeason = "����";}
	if ( ErinnSeason == 1 )   {ErinnSeason = "����";}
	if ( ErinnSeason == 2 )   {ErinnSeason = "����";}
	if ( ErinnSeason == 3 )   {ErinnSeason = "����";}
	if ( ErinnSeason == 4 )   {ErinnSeason = "����";}
	if ( ErinnSeason == 5 )   {ErinnSeason = "���ս�";}
	if ( ErinnSeason == 6 )   {ErinnSeason = "ɽ��";}
	if ( ErinnHour < 10 )   {ErinnHour = "0" + ErinnHour;}
	if ( ErinnMinute < 10 ) {ErinnMinute = "0" + ErinnMinute;}
	//ȡ�ð�ά��ʱ��
	var MoonTime = ErinnTime + (90000 * 6);
	var MoonDay = Math.floor(MoonTime % (Moongate.length*24*60*1.5*1000) / (24*60*1.5*1000));
	var MoonHour = Math.floor((MoonTime % (24*60*1.5*1000)) / (60*1.5*1000));
	var MoonMinute = Math.floor((MoonTime % (60*1.5*1000)) / (1.5*1000));
	//ȡ��¶��ʱ��
	var RuaDay = Math.floor(MoonTime % (43*24*60*1.5*1000) / (24*60*1.5*1000));
	//ȡ����������ʱ��
	var BunsDay = Math.floor(ErinnTime % (14*24*60*1.5*1000) / (24*60*1.5*1000));

	//������ʾ��ʽ
	NormalPrint = "������ " + ErinnSeason + " " + ErinnDay + " �� " + ErinnHour + ":" + ErinnMinute + "��"
	//�������
	if (PrintMode==1)   {
		if ( MoonHour * 60 + MoonMinute <= 720 )   {
			NormalPrint = (NormalPrint + "�����ţ����ڡ�" + Moongate[MoonDay%Moongate.length] + "���´Ρ�" + Moongate[(MoonDay+1)%Moongate.length]);}
		else   {
			NormalPrint = (NormalPrint + "�����ţ�������" + Moongate[(MoonDay+1)%Moongate.length] + "���´Ρ�" + Moongate[(MoonDay+2)%Moongate.length]);}
	}
	if (PrintMode==2)   {
		NormalPrint = (NormalPrint + "�������ˣ�" + Business[BunsDay]);
	}
	if (PrintMode==3)   {
		if ( MoonHour * 60 + MoonMinute <= 720 )   {
			NormalPrint = (NormalPrint + "¶�ţ����ڡ�" + (Test(Rua.substr(RuaDay%43,1))?"�ϰ�".fontcolor("#66CCFF"):"��Ϣ".fontcolor("CCCCCC")) + "�������" + (Test(Rua.substr((RuaDay%43)+1,1))?"�ϰ�".fontcolor("#66CCFF"):"��Ϣ".fontcolor("CCCCCC")) + "�������" + (Test(Rua.substr((RuaDay%43)+2,1))?"�ϰ�".fontcolor("#66CCFF"):"��Ϣ".fontcolor("CCCCCC")));}
		else   {
			NormalPrint = (NormalPrint + "¶�ţ�������" + (Test(Rua.substr((RuaDay%43)+1,1))?"�ϰ�".fontcolor("#66CCFF"):"��Ϣ".fontcolor("CCCCCC")) + "�������" + (Test(Rua.substr((RuaDay%43)+2,1))?"�ϰ�".fontcolor("#66CCFF"):"��Ϣ".fontcolor("CCCCCC")) + "�������" + (Test(Rua.substr((RuaDay%43)+3,1))?"�ϰ�".fontcolor("#66CCFF"):"��Ϣ".fontcolor("CCCCCC")));}
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
