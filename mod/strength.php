<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="/advertise.css" rel="stylesheet" type="text/css">
<title>Mabinogi - 戰斗力計算模擬器ー</title>
<style>
<!--
	a:link,a:visited {color:#EBA000;text-decoration:none;}
	a:active,a:hover,a:focus {color:#8080C0;text-decoration:underline;}
	body,td {font-size:x-small}
	input {text-align:right}
	.disp {border:double 1px #cccccc;}
	.map {font-size:xx-small;color:#aaaaaa}
	.pow {font-size:xx-small;color:#aaaaaa}
	.text {padding:0.5em;border:dotted 1px #666666;color:#666666}
	.cate {margin-bottom:2px;padding:2px 4px;border:solid 1px #333333;background-color:#999;color:#ffffff;cursor:pointer}
	.rank {padding:2px 4px;line-height:1.2;vertical-align:top;width:33%}
	.boss {background-color:#ffeeee;border:solid 1px #6D2F2F}
	.awful {background-color:#fff3e6;border:solid 1px #885F32}
	.strong {background-color:#fffae6;border:solid 1px #897835}
	.normal {background-color:#f7f8e4;border:solid 1px #858931}
	.weak {background-color:#E5F5E0;border:solid 1px #407F2C}
	.weakest {background-color:#E0F5F4;border:solid 1px #2F7774}
-->
</style>

<script language="JavaScript">
<!--
var gCookieSaveDays = 60;
var aState = new Array('Life','Mana','Stamina','Str','Int','Dex','Will','Luck');
var aSkill = new Array('Melee_Combat_Mastery','Critical_Hit','Defense','Smash','Melee_Counterattack','WindMill','Ranged_Combat_Mastery','Magnum_Shot','Arrow_Revolver','Support_Shot','Magic_Mastery','Icebolt','Firebolt','Lightningbolt','IceSpear','Fireball','Thunder','Healing','Party_Healing','Meditation','Making_Mastery','Rest','FirstAid','Herbalism','Final_Hit','Mirage_Missile','Stomp');
var aMap = new Array('map_uf','map_ud','map_if','map_id','map_disp');
var aDisplay = new Array('Boss','Awful','Strong','Normal','Weak','Weakest');

var gName	= 0;	// 日本語名
var gPow	= 1;	// 戦闘力
var gMap	= 2;	// 出現マップ

var mob = new Array();
mob.push(new Array('亞克里奇','','梅托斯峡谷'));
mob.push(new Array('石板弓箭手','1900','発掘宝箱,邁茲平原遺跡（一般）'));
mob.push(new Array('冰光羽','1097','凱歐島,瑪斯（上級）,克里爾'));
mob.push(new Array('百眼巨人','3010','菲歐納（中級4人）,巴爾（最終）'));
mob.push(new Array('百眼巨人（黒色/水色/緑色）','','菲歐納（中級2人）'));
mob.push(new Array('黄色女妖','4000','拉比（上級2人/3人/無制限ソロ/無制限2～4人PT）'));
mob.push(new Array('火神','','倫迦砂漠（中央）,螞蟻地獄（中央）'));
mob.push(new Array('小鬼','1044','敦巴倫,巴里（一般/上級/精霊/黒/修練生用/米斯特礦山/女神破壊）,阿貝魯（紅/女神）'));
mob.push(new Array('小精靈','1510','走廊,敦巴倫,菲歐納（一般/中級）,巴里（褐色/黒/女神破壊）,阿貝魯（紅/女神）,拉比（競技場）'));
mob.push(new Array('豺狗','840','菲歐納（中級）'));
mob.push(new Array('艾斯拉斯','2490','巴里（G2）'));
mob.push(new Array('翡翠石巨人','','倫迦_砂漠遺跡（翡翠箭）'));
mob.push(new Array('食人魔','2400','龍遺跡東南'));
mob.push(new Array('狼紋砂漠蜘蛛','','穆游砂漠'));
mob.push(new Array('食人魔戦士','2630','巴里（米斯特礦山）'));
mob.push(new Array('食人魔戦士（小）','2980','巴里（一般/精霊）'));
mob.push(new Array('食人魔戦士（大）','3690','巴里（一般/精霊）'));
mob.push(new Array('黃色鬼蟻','720','螞蟻地獄'));
mob.push(new Array('紅色鬼蟻','820','螞蟻地獄'));
mob.push(new Array('白色鬼蟻','620','螞蟻地獄'));
mob.push(new Array('石板國王','','邁茲平原遺跡（發光石頭翼魔）'));
mob.push(new Array('寶箱怪王','1069','拉比（下級）,巴里（上級/艾斯拉斯）,阿貝魯（一般/緑/銀/黒/女神/黑珍珠）,巴爾（最終）'));
mob.push(new Array('石板皇后','','邁茲平原遺跡（閃光）'));
mob.push(new Array('食尸鬼（藍色）','4100','皮卡（一般）'));
mob.push(new Array('食尸鬼（藍色）','4500','皮卡（下級）'));
mob.push(new Array('食尸鬼（白色）','3810','皮卡（一般）'));
mob.push(new Array('食尸鬼（白色）','4260','皮卡（下級）'));
mob.push(new Array('格拉斯貝恩','9999','阿貝魯（女神）'));
mob.push(new Array('獨翼鳥','','卡魯森林'));
mob.push(new Array('骷髏幽靈','1600','邁茲平原遺跡'));
mob.push(new Array('蜥蜴巫師','','倫迦_砂漠遺跡（守護者）'));
mob.push(new Array('寶箱怪','819','塞爾（下級）,巴里（一般/下級/褐色/黒/修練生用/米斯特礦山/艾斯拉斯/女神破壊）,阿貝魯（紅/女神）'));
mob.push(new Array('披風老妖','3580','恐怖圖書館,皮卡（一般）'));
mob.push(new Array('凱茜法師','2200','倫達（賽連）'));
mob.push(new Array('凱特騎士','2200','倫達（下級）'));
mob.push(new Array('蝙蝠','468','阿貝魯,塞爾（一般/下級/黑暗騎士）,拉比（一般/下級）,瑪斯（一般/修練生用）,倫達（下級/賽連）,阿貝魯（緑/藍/銀/黒/女神）'));
mob.push(new Array('幽靈','5420','恐怖圖書館'));
mob.push(new Array('幽靈（德米里奇召喚）','3320','皮卡（一般）'));
mob.push(new Array('幽靈（女妖精召喚）','3000','皮卡（下級）'));
mob.push(new Array('幽靈裝甲','1090','瑪斯（馬魯斯RP）,阿貝魯（黒/女神）'));
mob.push(new Array('幽靈披風老妖','3800','皮卡（下級）'));
mob.push(new Array('黃寶石獵犬','','倫迦_砂漠遺跡（黃寶石箭）'));
mob.push(new Array('黃金哥布林','916','拉比（下級）'));
mob.push(new Array('黃金哥布林（強化）','1000','拉比（上級）'));
mob.push(new Array('紅地精','912','瑪斯（上級）'));
mob.push(new Array('石巨人（一般）','2548','発掘宝箱,凱歐島,塞爾（一般/黑暗騎士)'));
mob.push(new Array('石巨人（極小）','3548','塞爾（上級2人/上級3人/無制限）'));
mob.push(new Array('石巨人（黒色）','4430','凱歐島'));
mob.push(new Array('石巨人（深緑色）','2648','塞爾（下級/br）,阿貝魯（銀）'));
mob.push(new Array('石巨人（藍色）','3780','塞爾（中級1人/中級4人）'));
mob.push(new Array('石巨人（紅色）','3940','塞爾（中級2人/中級4人）'));
mob.push(new Array('石巨人（白色）','','塞爾（BOSS RUSH）'));
mob.push(new Array('寶箱怪','1316','皮卡（一般/下級）'));
mob.push(new Array('哥布林','631','塞爾（一般/黑暗騎士）,巴里（一般/黒/修練生用/米斯特礦山/女神破壊）,阿貝魯（一般/緑/女神/黑暗騎士）'));
mob.push(new Array('哥布射手','634','塞爾（一般/黑暗騎士）,巴里（一般/黒/修練生用/米斯特礦山/女神破壊）,阿貝魯（一般/緑/女神/黑暗騎士）'));
mob.push(new Array('哥布林戰士','','邁茲平原遺跡（輝く二刀流）'));
mob.push(new Array('哥布林ソードマン','','卡魯_森遺跡（二刀流）'));
mob.push(new Array('哥布林','1585','巴里（上級）'));
mob.push(new Array('哥布林弓箭手獵人','1640','巴里（上級）'));
mob.push(new Array('地精','822','瑪斯（一般/修練生用）,阿貝魯（女神）'));
mob.push(new Array('地精弓箭手','827','瑪斯（一般/修練生用）,阿貝魯（女神）'));
mob.push(new Array('山狗','859','雪原'));
mob.push(new Array('牛頭怪','1252','菲歐納（一般/中級）,巴里（下級/艾斯拉斯）,克里爾,巴爾（最終）'));
mob.push(new Array('牛頭怪（紫色）','1255','阿貝魯（中級2人）'));
	mob.push(new Array('黃色蜥蜴','1500','洛佩斯砂漠'));
mob.push(new Array('黃色大蜥蜴','1900','洛佩斯砂漠'));
mob.push(new Array('獨眼巨人','3245','倫達（一般/BR/女神修復）'));
mob.push(new Array('獨眼巨人（藍色）','3880','倫達（上級/BR）'));
mob.push(new Array('獨眼巨人（紅色）','','倫達（BR）'));
mob.push(new Array('魚人游俠','1600','倫達（賽連）'));
mob.push(new Array('魚人戰士','1200','倫達（下級/賽連）'));
mob.push(new Array('仙人掌蜥蜴','1500','穆游砂漠'));
mob.push(new Array('沙羅曼蛇','5000','倫迦砂漠,螞蟻地獄'));
mob.push(new Array('發光的石像小鬼','','卡魯_森遺跡'));
mob.push(new Array('遺跡寶箱怪','1000','倫迦_砂漠遺跡（紫水晶箭/翡翠箭/黃寶石箭/守護者）'));
mob.push(new Array('沙蟲怪','10000','穆游砂漠（中央）'));
mob.push(new Array('巨大小鬼','2920','菲歐納（中級4人）'));
mob.push(new Array('巨大食人魔','','龍遺跡'));
mob.push(new Array('巨大紅骷髏狼','2780','瑪斯（上級）'));
mob.push(new Array('巨大火光羽','2592','克里爾（一般）'));
mob.push(new Array('巨大無頭怪','2884','克里爾（一般）,巴爾（最終）'));
mob.push(new Array('巨大飛蛾','5000','皮卡（下級）'));
mob.push(new Array('怪物','3000','塞爾（上級3人/無制限）,拉比（上級無制限）'));
mob.push(new Array('巨大蠕蟲','1768','巴里（褐色）,巴爾（最終）'));
mob.push(new Array('巨大蠕蟲（亜種）','3240','巴里（上級無制限）'));
mob.push(new Array('巨大蠕蟲（変種小）','3580','巴爾（最終）'));
mob.push(new Array('巨大蠕蟲（変種大）','3320','巴爾（最終）'));
mob.push(new Array('豺狼','973','菲歐納（一般/中級）,克里爾（一般/覚醒）'));
mob.push(new Array('紫水晶獵犬','1400','倫迦_砂漠遺跡（紫水晶箭）'));
mob.push(new Array('骷髏','1118','拉比（一般）,倫達（一般/上級/女神修復）,阿貝魯（藍/黒/女神）'));
mob.push(new Array('骷髏（裝甲）','1456','拉比（下級）,阿貝魯（紅/女神）'));
mob.push(new Array('骷髏（重裝甲）','1400','拉比（上級）'));
mob.push(new Array('骷髏（重裝甲）','1348','阿貝魯（黒/女神）'));
mob.push(new Array('骷髏小鬼','1044','拉比（上級）'));
mob.push(new Array('骷髏船長','1815','倫達（上級/BR）'));
mob.push(new Array('骷髏幽靈','','卡魯_森遺跡'));
mob.push(new Array('骷髏炸彈人（強爆型/弱爆型）','1800','拉比（上級）'));
mob.push(new Array('骷髏海盜（藍色）','1649','倫達（一般/賽連/BR）'));
mob.push(new Array('骷髏海盜（紅色）','1351','倫達（一般/賽連/BR）'));
mob.push(new Array('骷髏地獄犬','1426','瑪斯（上級）'));
mob.push(new Array('骷髏蜘蛛','2200','拉比（上級）'));
mob.push(new Array('骷髏兵士','',''));
mob.push(new Array('石頭小鬼','1200','発掘宝箱,卡魯_森遺跡（一般/石頭小鬼的XX）'));
mob.push(new Array('石頭小鬼（強化）','','卡魯_森遺跡（光石頭小鬼）'));
mob.push(new Array('石頭翼魔','3000','邁茲平原遺跡（一般）'));
mob.push(new Array('石頭死尸','','卡魯_森遺跡（一般）'));
mob.push(new Array('石頭死尸（強化）','','卡魯_森遺跡（光石頭死尸の石像）'));
mob.push(new Array('石頭野牛','1100','卡魯_森遺跡（一般/石頭野牛）'));
mob.push(new Array('石頭野牛（強化）','','卡魯_森遺跡（光石頭野牛）'));
mob.push(new Array('石頭犬','900','卡魯_森遺跡（一般）'));
mob.push(new Array('石頭犬（強化）','','卡魯_森遺跡（發光石頭犬）'));
mob.push(new Array('石頭寶箱怪','','卡魯_森遺跡（全般）,邁茲平原遺跡（全般）'));
mob.push(new Array('小百眼巨人','2800','倫達（下級/上級）,巴爾（最終）'));
mob.push(new Array('小石巨人','2000','塞爾（初級/BR）'));
mob.push(new Array('小石巨人','2448','菲歐納（一般）'));
mob.push(new Array('小石巨人（強化）','3430','菲歐納（中級1人）'));
mob.push(new Array('小洞穴巨人','2184','瑪斯（上級）'));
mob.push(new Array('賽連','2864','倫達（賽連）'));
mob.push(new Array('死尸','2090','あの世（迪爾科內爾）'));
mob.push(new Array('黑暗骷髏','1286','巴里（艾斯拉斯）'));
mob.push(new Array('黑暗鼠人','1625','塞爾（上級）'));
mob.push(new Array('黑暗領主','1780','拉比（タルラークRP）,阿貝魯（女神）,巴爾（最終）'));
mob.push(new Array('小浣熊','279','走廊,敦巴倫'));
mob.push(new Array('殺人蜂','1200','巴里（上級）'));
mob.push(new Array('沙漠龍','30000','卡皮峡谷（南/中央）'));
mob.push(new Array('德米里奇','9020','皮卡（一般）'));
mob.push(new Array('黃寶石甲蟲','','倫迦_砂漠遺跡（黃寶石箭）'));
mob.push(new Array('寶箱怪','1066','倫達（一般/下級/上級/賽連/女神修復）,皮卡（一般）'));
mob.push(new Array('洞穴巨人','1720','阿貝魯'));
mob.push(new Array('馬魔王(夢魘)','2620','克里爾（覚醒）,阿貝魯（紅）,巴爾（最終）'));
mob.push(new Array('新綠鬼魔','3950','巴里（上級3人用/無制限）'));
mob.push(new Array('新粉鬼魔','3990','巴里（上級2人用/3人用/無制限）'));
mob.push(new Array('新黑鬼魔','4140','巴里（上級無制限）'));
mob.push(new Array('新藍鬼魔','4110','巴里（上級2人用/3人用/無制限）'));
mob.push(new Array('新白鬼魔','4140','巴里（上級無制限）'));
mob.push(new Array('諾（黄色/黒色）','1800','倫達（下級/賽連）'));
mob.push(new Array('骷髏詩人','1800','瑪斯（上級）'));
mob.push(new Array('骷髏詩人（召喚）','','塞爾（上級無制限）'));
mob.push(new Array('怪物','3580','塞爾（上級）,塞爾（BR）'));
mob.push(new Array('女妖精','9000','皮卡（下級）'));
mob.push(new Array('熊','','走廊'));
mob.push(new Array('粉色女妖','','拉比（上級無制限）'));
mob.push(new Array('火光羽','1097','凱歐島,瑪斯（上級）,克里爾（一般/覚醒）'));
mob.push(new Array('石板戰士','1800','発掘宝箱,邁茲平原遺跡（一般）'));
mob.push(new Array('發光石頭翼魔','4000','邁茲平原遺跡（石頭翼魔）'));
mob.push(new Array('飛劍','1097','菲歐納（一般）,巴里（下級/褐色/黒/艾斯拉斯/女神破壊）,阿貝魯（一般/緑/藍/紅/銀/黒/女神/黑暗騎士）,拉比（バトル螞蟻ーナ）'));
mob.push(new Array('飛劍（骸骨）','1442','倫達（下級/上級）'));
mob.push(new Array('飛劍（黒色）','1168','倫達（一般/下級/上級/賽連/女神修復）'));
mob.push(new Array('褐色幽靈仆人','2600','倫迦_砂漠遺跡（守護者の遺跡1F）'));
mob.push(new Array('褐色監獄幽靈','','梅托斯峡谷'));
mob.push(new Array('褐色蜥蜴巫師','2800','倫迦_砂漠遺跡（守護者）'));
mob.push(new Array('黑暗巫師','1790','巴里（褐色）,阿貝魯（女神）'));
mob.push(new Array('黑暗劍士','3810','走廊'));
mob.push(new Array('黑色獨翼鳥','500','卡皮峡谷,卡魯森林,'));
mob.push(new Array('黑色幽靈仆人','2900','倫迦_砂漠遺跡（守護者の遺跡2F）'));
mob.push(new Array('黑色女妖','1410','拉比（一般）'));
mob.push(new Array('黑色女妖（強化）','4000','拉比（上級2人/無制限ソロ/無制限5～8人PT）'));
mob.push(new Array('黑暗戰士','2362','走廊'));
mob.push(new Array('黑色蛇','','倫迦_砂漠遺跡（黃寶石箭）'));
mob.push(new Array('監獄飛劍','','梅托斯峡谷'));
mob.push(new Array('蓝色幽靈','5680','皮卡（一般）'));
mob.push(new Array('蓝色幽靈（強化）','6000','皮卡（下級）'));
mob.push(new Array('骷髏幽靈','1700','邁茲平原遺跡'));
mob.push(new Array('蓝色蛇','1400','倫迦_砂漠遺跡（紫水晶箭）'));
mob.push(new Array('蓝色監獄幽靈','','梅托斯峡谷'));
mob.push(new Array('蓝色鼠人','1200','塞爾（中級/黑暗騎士）'));
mob.push(new Array('蓝色蜥蜴巫師','3000','倫迦_砂漠遺跡（守護者）'));
mob.push(new Array('平原龙','','邁茲平原（北）'));
mob.push(new Array('發光石頭死尸','','卡魯_森遺跡（石頭）'));
mob.push(new Array('翡翠裝甲犬','','倫迦_砂漠遺跡（翡翠箭）'));
mob.push(new Array('狼人','1575','菲歐納（一般/中級）,巴里（下級）,克里爾（一般/覚醒）,阿貝魯（一般/紅/銀/黒/女神/黑暗騎士）'));
mob.push(new Array('笨重翼魔','2900','阿貝魯（緑/女神）,巴爾（最終）'));
mob.push(new Array('發光石頭死尸','','卡魯_森遺跡（石頭死尸）'));
mob.push(new Array('地獄犬','1826','瑪斯（一般）,阿貝魯（女神）'));
mob.push(new Array('毒哥布林','641','塞爾（一般/黑暗騎士）,巴里（一般/黒/修練生用/米斯特礦山/女神破壊）,阿貝魯（緑/女神）'));
mob.push(new Array('毒地精','876','瑪斯（一般/上級/修練生用）,阿貝魯（女神）'));
mob.push(new Array('毒骷髏兵士','2554','塞爾（上級2人）'));
mob.push(new Array('口袋鼠','747','瑪斯（一般）'));
mob.push(new Array('地獄戰馬','','梅托斯峡谷'));
mob.push(new Array('哈羅德（強化）','5000','皮卡（下級）'));
mob.push(new Array('哈羅德（一般）','4740','恐怖圖書館,皮卡（一般）'));
mob.push(new Array('白色獨翼鳥','500','卡皮峡谷,卡魯森林,フィリア（南東の海岸線）'));
mob.push(new Array('白色幽靈仆人','3200','倫迦_砂漠遺跡（守護者の遺跡3F）'));
mob.push(new Array('白色女妖','','拉比（上級無制限ソロ）'));
mob.push(new Array('骷髏幽靈','1800','邁茲平原遺跡'));
mob.push(new Array('白蛇','','倫迦_砂漠遺跡（翡翠箭）'));
mob.push(new Array('小地精（茶色/小）','','巴里（修練生用）'));
mob.push(new Array('小地精（茶色/大）','','巴里（修練生用）'));
mob.push(new Array('小地精（橙色）','','巴里（修練生用）'));
mob.push(new Array('寶箱怪','693','塞爾（初級/一般/黑暗騎士）,拉比（一般）,瑪斯（一般/修練生用）,菲歐納（一般）,巴里（一般/精霊/修練生用/米斯特礦山）,克里爾（一般/覚醒）'));
mob.push(new Array('金属骷髏','1540','塞爾（一般/中級1人用/黑暗騎士）,拉比（一般）,阿貝魯（女神）'));
mob.push(new Array('金属骷髏（裝甲）','1814','塞爾（下級/中級2人/中級4人）,拉比（下級）,阿貝魯（紅/黒/女神）'));
mob.push(new Array('金属骷髏（裝甲）','','拉比（上級）'));
mob.push(new Array('金属骷髏（笨重裝甲）','1786','阿貝魯（黒/女神）'));
mob.push(new Array('金属骷髏（召喚/裝甲）','1800','塞爾（上級無制限）'));
mob.push(new Array('金属バード骷髏','2664','瑪斯（上級）'));
mob.push(new Array('變狼狂（黄髪）','1840','阿貝魯（藍/女神）,巴爾（最終）'));
mob.push(new Array('變狼狂（紫髪）','2010','巴爾（最終）'));
mob.push(new Array('變狼狂（藍髪）','1945','阿貝魯（中級2人）,拉比（下級）,阿貝魯（藍/女神）,巴爾（最終）'));
mob.push(new Array('變狼狂（紅髪）','1880','阿貝魯（中級2人）,拉比（下級）,阿貝魯（藍/女神）,巴爾（最終）'));
mob.push(new Array('雷光羽','1097','凱歐島,克里爾（一般/覚醒）'));
mob.push(new Array('鼠人','849','塞爾（下級/中級）,阿貝魯（一般/緑/藍/紅/銀/黒/女神/黑暗騎士）'));
mob.push(new Array('紅色幽靈','6020','皮卡（一般）'));
mob.push(new Array('紅色幽靈（強化）','6500','皮卡（下級）'));
mob.push(new Array('紅色地精','1370','瑪斯（上級）'));
mob.push(new Array('紅色地精弓箭手','1834','瑪斯（上級）'));
mob.push(new Array('紅色女妖','2097','拉比（下級）'));
mob.push(new Array('紅色女妖（強化）','4000','拉比（上級3人/無制限/無制限2～4人PT）'));
mob.push(new Array('紅色骷髏','1274','拉比（一般）,阿貝魯（紅/女神）'));
mob.push(new Array('紅色骷髏（裝甲）','1635','拉比（下級）,阿貝魯（紅/黒/女神）'));
mob.push(new Array('紅色骷髏（裝甲）','','拉比（上級）'));
mob.push(new Array('紅色骷髏（笨重裝甲）','1526','阿貝魯（黒/女神）'));
mob.push(new Array('紅色骷髏（迷你）','1052','拉比（一般）,瑪斯（修練生用）'));
mob.push(new Array('紅色骷髏船長','2200','倫達（上級）'));
mob.push(new Array('紅色骷髏幽靈','1900','邁茲平原遺跡'));
mob.push(new Array('紅色骷髏海盜','1800','倫達（上級/BR）'));
mob.push(new Array('紅色骷髏海盜（大）','1800','倫達（上級/BR）'));
mob.push(new Array('紅色監獄幽靈','','梅托斯峡谷'));
mob.push(new Array('巨大雷光羽','1850','拉比'));
mob.push(new Array('盜墓者（強化）','','皮卡（下級）'));
mob.push(new Array('盜墓者（一般）','4000','皮卡（一般）'));
mob.push(new Array('遺跡守護者（一般）','1600','倫迦_砂漠遺跡（一般）'));
mob.push(new Array('遺跡守護者（強化）','5000','倫迦_砂漠遺跡（守護者）'));
mob.push(new Array('遺跡守護馬（一般）','1200','倫迦_砂漠遺跡（一般）'));
mob.push(new Array('遺跡守護馬（強化）','3000','倫迦_砂漠遺跡（守護者）'));
mob.push(new Array('黄金尾貓鼬','','邁茲平原'));
mob.push(new Array('黄金森蜥蜴','','卡魯森林'));
mob.push(new Array('牙が發光大肚蜘蛛','','卡魯_森遺跡（石像蜘蛛的牙）'));
mob.push(new Array('奇怪石頭小鬼','1500','卡魯_森遺跡（一般/石頭小鬼的××）'));
mob.push(new Array('奇怪石頭死尸','','卡魯_森遺跡（一般）'));
mob.push(new Array('奇怪石頭野牛','1300','卡魯_森遺跡（一般）'));
mob.push(new Array('奇怪石頭犬','1300','卡魯_森遺跡（一般）'));
mob.push(new Array('灰狼','400','初心者チュートリアル'));
	mob.push(new Array('灰狼','570','迪爾科內爾,走廊,敦巴倫'));
mob.push(new Array('灰色狐貍','463','迪爾科內爾,走廊,敦巴倫,'));
mob.push(new Array('灰色老鼠','349','敦巴倫,塞爾（初級/一般/黑暗騎士）,拉比（一般/下級）,瑪斯（一般/修練生用）,菲歐納（一般）,克里爾（一般/覚醒）,倫達（一般/下級/上級/女神修復）'));
mob.push(new Array('灰色監獄死尸','','梅托斯峡谷'));
mob.push(new Array('灰色狼人','1600','阿貝魯（中級）'));
mob.push(new Array('灰色角コブラ','1400','洛佩斯砂漠'));
mob.push(new Array('灰色岩蝎子','1100','洛佩斯砂漠'));
mob.push(new Array('灰色尾貓鼬','1000','邁茲平原,穆游砂漠'));
mob.push(new Array('灰色足沙漠狐','1000','穆游砂漠'));
mob.push(new Array('骸骨狼','1112','（ドラゴン遺跡近辺）,拉比（一般）,倫達（一般/女神修復）'));
mob.push(new Array('骸骨狼（強化）','1600','拉比（上級）'));
mob.push(new Array('角が發光石頭野牛','','卡魯_森遺跡（石頭野牛の角）'));
mob.push(new Array('角土豚','1100','邁茲平原'));
mob.push(new Array('褐色狐貍','265','迪爾科內爾,走廊,敦巴倫'));
mob.push(new Array('褐色狐貍','300','初心者チュートリアル'));
mob.push(new Array('褐色熊','1320','走廊,仙魔'));
mob.push(new Array('褐色鬼魔','594','巴里（下級/上級/精霊/褐色/艾斯拉斯）,阿貝魯（銀/女神）'));
mob.push(new Array('褐色老鼠','279','塞爾（初級）,阿貝魯（女神）'));
mob.push(new Array('褐色鬣狗','1000','穆游砂漠'));
mob.push(new Array('褐色熊','1802','敦巴倫,,仙魔'));
mob.push(new Array('褐蛇','591','塞爾（下級/中級）,菲歐納（一般/中級）,克里爾（一般/覚醒）,阿貝魯（一般/緑/紅/銀/女神/黑暗騎士）'));
mob.push(new Array('褐色遺跡翼魔','2800','倫迦_砂漠遺跡（守護者）'));
mob.push(new Array('褐色砂漠熊','','倫迦砂漠'));
mob.push(new Array('褐色森蘑菇蜘蛛','900','卡魯森林'));
mob.push(new Array('褐色森蜥蜴','1000','邁茲平原,卡魯森林'));
mob.push(new Array('褐色足沙漠狐','800','卡皮峡谷,穆游砂漠（東部/南部）'));
mob.push(new Array('鎌蜘蛛','1003','塞爾（下級/中級）,巴里（下級/褐色/艾斯拉斯）,阿貝魯（一般/緑/銀/黒/女神/黑暗騎士）'));
mob.push(new Array('吸血蝙蝠','1232','巴里（一般/下級/精霊/褐色/黒/修練生用/米斯特礦山/艾斯拉斯/女神破壊）,阿貝魯（一般/緑/女神/黑暗騎士）,皮卡（一般/下級）'));
mob.push(new Array('巨大熊','3074','走廊'));
mob.push(new Array('巨大蜘蛛','1688','阿貝魯（一般/下級/中級）'));
mob.push(new Array('巨大蝙蝠','1070','阿貝魯（下級）'));
mob.push(new Array('巨大豺狼','1200','菲歐納（中級）'));
mob.push(new Array('巨大骷髏','1298','瑪斯（一般）'));
mob.push(new Array('巨大黄金森蘑菇蜘蛛','','卡魯森林'));
mob.push(new Array('巨大黒狼','2680','迪爾科內爾'));
mob.push(new Array('巨大黒蜘蛛','3180','阿貝魯（中級4人）'));
mob.push(new Array('巨大黒蜘蛛','3470','阿貝魯（中級1人）'));
mob.push(new Array('巨大小角豬','','邁茲平原'));
mob.push(new Array('巨大森老鼠','910','菲歐納（中級）'));
mob.push(new Array('巨大紅蜘蛛','3180','阿貝魯（中級4人）'));
mob.push(new Array('巨大紅蜘蛛','3430','阿貝魯（下級/中級2人）'));
mob.push(new Array('巨大大角豬','','邁茲平原'));
mob.push(new Array('巨大白狼','2529','迪爾科內爾'));
mob.push(new Array('巨大白蜘蛛','3350','阿貝魯（中級2人/中級4人）'));
mob.push(new Array('巨大白熊','','仙魔平原'));
mob.push(new Array('犬','483','迪爾科內爾,走廊,敦巴倫,イメンマハ,邁茲平原'));
mob.push(new Array('肩飾りが發光石頭翼魔','','邁茲平原遺跡（石頭翼魔の肩飾り）'));
mob.push(new Array('肩飾りが發光石頭死尸','','卡魯_森遺跡（石頭死尸の肩飾り）'));
mob.push(new Array('優秀小鬼','536','巴里（一般）'));
mob.push(new Array('發光石頭小鬼','','卡魯_森遺跡（發光石頭小鬼）'));
mob.push(new Array('發光石頭翼魔','','邁茲平原遺跡（發光石頭翼魔）'));
mob.push(new Array('發光石頭死尸','','卡魯_森遺跡（發光石頭死尸の石像）'));
mob.push(new Array('發光石頭野牛','2600','卡魯_森遺跡（發光石頭野牛）'));
mob.push(new Array('發光石頭犬','','卡魯_森遺跡（發光石頭犬）'));
mob.push(new Array('黒犰狳','400','倫迦砂漠'));
mob.push(new Array('黒狼','705','迪爾科內爾'));
mob.push(new Array('黒熊老鼠','1000','倫達（上級/賽連）,皮卡（一般）'));
mob.push(new Array('黒蜘蛛','670','塞爾（一般/黑暗騎士）,瑪斯（一般/修練生用）,菲歐納（一般）,巴里（一般/黒/修練生用/米斯特礦山）,克里爾（一般/覚醒）,倫達（一般/女神修復）,阿貝魯（一般/緑/黑暗騎士）'));
mob.push(new Array('黒惡狼','933','走廊'));
mob.push(new Array('黒小浣熊','1284','敦巴倫'));
mob.push(new Array('黒色沙漠熊','1900','穆游砂漠,卡魯森林'));
mob.push(new Array('黒土豚','700','山脈'));
mob.push(new Array('黒老鼠','278','阿貝魯（一般/緑/紅/黑暗騎士）'));
mob.push(new Array('黒熊','2304','敦巴倫,,仙魔'));
mob.push(new Array('黒監獄死尸','','梅托斯峡谷'));
mob.push(new Array('黒蛇','1400','塞爾（中級）'));
mob.push(new Array('黒木乃伊仆人','3000','倫迦_砂漠遺跡（守護者の遺跡2F）'));
mob.push(new Array('黒豪豬','500','倫迦砂漠'));
mob.push(new Array('黒遺跡翼魔','3300','倫迦_砂漠遺跡（守護者）'));
mob.push(new Array('黒砂蝎子','750','倫迦砂漠'));
mob.push(new Array('黒砂漠熊','','倫迦砂漠'));
mob.push(new Array('黒砂漠蜘蛛','1500','穆游砂漠（日時計付近）'));
mob.push(new Array('黒耳食蟻獸','900','卡魯森林'));
mob.push(new Array('黒尾貓鼬','1300','邁茲平原'));
mob.push(new Array('黒森蘑菇蜘蛛','1900','卡魯森林'));
mob.push(new Array('黒森蜥蜴','1500','卡魯森林'));
mob.push(new Array('黒足沙漠狐','1700','穆游砂漠'));
mob.push(new Array('砂蝙蝠','375','阿貝魯（初級/一般）,阿貝魯（一般/緑/紅/銀/女神/黑暗騎士）'));
mob.push(new Array('沙漠千足蟲','650','エランス渓谷,フィリア（東）'));
mob.push(new Array('再次站立的石頭死尸','','邁茲平原遺跡（發光石頭翼魔）'));
mob.push(new Array('山犬','593','あの世（迪爾科內爾）'));
mob.push(new Array('變異蚯蚓','','巴里（上級）'));
mob.push(new Array('刺蜘蛛','1190','塞爾（下級）,拉比（下級）,巴里（下級/艾斯拉斯）,阿貝魯（一般/藍/紅/銀/女神/黑暗騎士）'));
mob.push(new Array('紫水晶甲蟲','1300','倫迦_砂漠遺跡（紫水晶箭）'));
mob.push(new Array('雌鶏','100','迪爾科內爾,走廊,敦巴倫,イメンマハ,邁茲平原'));
mob.push(new Array('牙齒發光石頭野牛','','卡魯_森遺跡（石頭野牛の歯）'));
mob.push(new Array('牙齒發光石頭犬','','卡魯_森遺跡（石頭犬の歯）'));
mob.push(new Array('耳朵發光石頭小鬼','','卡魯_森遺跡（石頭小鬼の耳）'));
mob.push(new Array('耳朵發光石頭犬','','卡魯_森遺跡（石頭犬の耳）'));
mob.push(new Array('縞鬣狗','1044','穆游砂漠'));
mob.push(new Array('召喚翼魔','1071','阿貝魯（女神）'));
mob.push(new Array('小翡翠甲蟲','700','倫迦_砂漠遺跡（一般）'));
mob.push(new Array('小蓝色蛇','1000','倫迦_砂漠遺跡一般'));
mob.push(new Array('小肺魚','950','倫迦砂漠'));
mob.push(new Array('小白蜘蛛','189','阿貝魯（初級/一般）,阿貝魯（藍/紅/女神）'));
mob.push(new Array('小野老鼠','160','阿貝魯（初級/一般）,阿貝魯（藍）'));
mob.push(new Array('小角豬','1100','ヌベス山脈'));
mob.push(new Array('小耳土豚','','ケルラ港（北）'));
mob.push(new Array('尾巴發光石頭野牛','','卡魯_森遺跡（石頭野牛の尾）'));
mob.push(new Array('尾巴發光石頭犬','','卡魯_森遺跡（石頭犬の尾）'));
mob.push(new Array('森林野豬','1160','菲歐納（中級）'));
mob.push(new Array('水玉模様砂漠蜘蛛','1900','穆游砂漠（北東部/南西部）'));
mob.push(new Array('正体不明仙人掌蜥蜴','2200','卡皮峡谷高台'));
mob.push(new Array('藍狼','913','阿貝魯（下級）'));
mob.push(new Array('藍熊','1604','阿貝魯（下級/中級）'));
mob.push(new Array('藍狼人','1600','菲歐納（中級）'));
mob.push(new Array('藍蛇','812','塞爾（下級/中級）,菲歐納（一般/中級）,克里爾（一般/覚醒）,阿貝魯（一般/緑/紅/銀/黒/女神/黑暗騎士）'));
mob.push(new Array('藍角コブラ','1600','倫迦砂漠'));
mob.push(new Array('藍黒蜘蛛','1005','阿貝魯（下級）'));
mob.push(new Array('藍砂蝎子','650','倫迦砂漠'));
mob.push(new Array('藍尾貓鼬','700','邁茲平原'));
mob.push(new Array('藍森蘑菇蜘蛛','1700','卡魯森林'));
mob.push(new Array('藍足沙漠狐','1300','穆游砂漠（北東部）'));
mob.push(new Array('紅狐貍','336','迪爾科內爾,走廊,敦巴倫,,モルバアイル'));
mob.push(new Array('紅熊','1552','走廊,敦巴倫,,仙魔,菲歐納（一般）,克里爾（一般/覚醒）'));
mob.push(new Array('紅蜘蛛','849','迪爾科內爾,敦巴倫,阿貝魯,塞爾（一般/黑暗騎士）,瑪斯（一般/修練生用）,菲歐納（一般）,巴里（一般/精霊/黒/修練生用/米斯特礦山/女神破壊）,克里爾（一般/覚醒）,倫達（一般/女神修復）'));
mob.push(new Array('紅老鼠','1360','塞爾（上級）'));
mob.push(new Array('紅熊','2072','敦巴倫,菲歐納（一般）,克里爾（一般/覚醒）'));
mob.push(new Array('紅木乃伊仆人','2500','倫迦_砂漠遺跡（守護者の遺跡1F）'));
mob.push(new Array('紅角コブラ','1800','洛佩斯砂漠'));
mob.push(new Array('紅褐色砂漠熊','','倫迦砂漠'));
mob.push(new Array('紅鎌蜘蛛','1660','塞爾（上級）'));
mob.push(new Array('紅黒蜘蛛','910','阿貝魯（下級/中級）'));
mob.push(new Array('紅黒熊','1570','菲歐納（中級）'));
mob.push(new Array('紅黒豪豬','','倫迦砂漠'));
mob.push(new Array('紅黒鎌蜘蛛','1600','塞爾（中級/黑暗騎士）'));
mob.push(new Array('紅砂蝎子','550','倫迦砂漠'));
mob.push(new Array('紅刺蜘蛛','1805','塞爾（上級）'));
mob.push(new Array('紅森蘑菇蜘蛛','1100','卡魯森林'));
mob.push(new Array('紅足沙漠狐','900','穆游砂漠（北部）,倫迦砂漠（中央）'));
mob.push(new Array('足發光大肚蜘蛛','','卡魯_森遺跡（石像蜘蛛的足）'));
mob.push(new Array('大角豬','1500','ヌベス山脈'));
mob.push(new Array('大耳食蟻獸','1100','卡魯森林'));
mob.push(new Array('大耳土豚','600','ヌベス山脈'));
mob.push(new Array('短い鬣鬣狗','1700','穆游砂漠'));
mob.push(new Array('長い鬣鬣狗','1900','穆游砂漠'));
mob.push(new Array('爪が發光石頭犬','','卡魯_森遺跡（石頭犬の爪）'));
mob.push(new Array('蹄子發光石頭野牛','','卡魯_森遺跡（石頭野牛の蹄）'));
mob.push(new Array('盗賊哥布林','1134','敦巴倫'));
mob.push(new Array('盗賊地精','857','敦巴倫,'));
mob.push(new Array('透明小鬼','1044','克里爾（一般/覚醒）'));
mob.push(new Array('洞窟瑪斯ク哥布林','900','螞蟻地獄'));
mob.push(new Array('洞窟ヤスデ','740','螞蟻地獄'));
mob.push(new Array('洞窟黄色蝙蝠','520','螞蟻地獄'));
mob.push(new Array('洞窟灰色蝙蝠','620','螞蟻地獄'));
mob.push(new Array('洞窟白蝙蝠','420','螞蟻地獄'));
mob.push(new Array('毒針岩蝎子','1700','洛佩斯砂漠'));
mob.push(new Array('毒針砂蝎子','950','倫迦砂漠'));
mob.push(new Array('毒袋を持つ大肚蜘蛛','','卡魯_森遺跡（石像蜘蛛的毒袋）'));
mob.push(new Array('乳牛','180','敦巴倫,走廊,イメンマハ,ケルラ港（北）,邁茲平原'));
mob.push(new Array('肺魚','1250','倫迦砂漠'));
mob.push(new Array('白犰狳','500','エランス渓谷'));
mob.push(new Array('白狼','829','迪爾科內爾'));
mob.push(new Array('白狼（大）','','拉比（バトル螞蟻ーナ）'));
mob.push(new Array('白食蟻獸','','卡魯森林'));
mob.push(new Array('白熊','','拉比（バトル螞蟻ーナ）'));
mob.push(new Array('白蜘蛛','200','初心者チュートリアル'));
mob.push(new Array('白蜘蛛','201','迪爾科內爾,敦巴倫,イメンマハ'));
mob.push(new Array('白蜘蛛','301','阿貝魯,阿貝魯（藍/女神）'));
mob.push(new Array('白惡狼','1015','走廊,'));
mob.push(new Array('白色沙漠熊','1700','穆游砂漠,卡魯森林'));
mob.push(new Array('白監獄死尸','','梅托斯峡谷'));
mob.push(new Array('白蛇','1086','塞爾（下級/中級）,菲歐納（一般/中級）,克里爾（一般/覚醒）,阿貝魯（一般/緑/紅/銀/黒/女神/黑暗騎士）'));
mob.push(new Array('白木乃伊仆人','3500','倫迦_砂漠遺跡（守護者の遺跡3F）'));
mob.push(new Array('白遺跡翼魔','3800','倫迦_砂漠遺跡（守護者）'));
mob.push(new Array('白岩蝎子','1300','洛佩斯砂漠'));
mob.push(new Array('白砂漠熊','','倫迦砂漠'));
mob.push(new Array('白砂漠蜘蛛','1300','穆游砂漠（北部）'));
mob.push(new Array('白耳食蟻獸','800','卡魯森林'));
mob.push(new Array('白縞砂漠蜘蛛','2100','穆游砂漠（北東部/南西部）'));
mob.push(new Array('白尾貓鼬','800','邁茲平原,倫迦砂漠'));
mob.push(new Array('白森蜥蜴','1300','卡魯森林'));
mob.push(new Array('髪飾りが發光石頭死尸','','卡魯_森遺跡（石頭死尸の髪飾り）'));
mob.push(new Array('鼻が發光石頭小鬼','','卡魯_森遺跡（石頭小鬼の鼻）'));
mob.push(new Array('宝石が發光石頭小鬼','','卡魯_森遺跡（石頭小鬼の宝石）'));
mob.push(new Array('亡霊砂漠ハンター（強）','','倫迦砂漠,螞蟻地獄'));
mob.push(new Array('亡霊砂漠ハンター（弱）','','倫迦砂漠,螞蟻地獄'));
mob.push(new Array('亡霊砂漠戦士（強）','1300','倫迦砂漠,螞蟻地獄'));
mob.push(new Array('亡霊砂漠戦士（弱）','800','倫迦砂漠,螞蟻地獄'));
mob.push(new Array('帽子が發光石頭小鬼','','卡魯_森遺跡（石頭小鬼の帽子）'));
mob.push(new Array('帽子飾りが發光石頭小鬼','','卡魯_森遺跡（石頭小鬼の帽子飾り）'));
mob.push(new Array('北極狐貍','123','クリス瑪斯フィールド'));
mob.push(new Array('眼睛發光石頭死尸','','卡魯_森遺跡（石頭死尸の目）'));
mob.push(new Array('野老鼠','341','阿貝魯,阿貝魯（一般/緑/藍/黒/女神/黑暗騎士）,拉比（タルラークRP）'));
mob.push(new Array('野生鴕鳥','695','邁茲平原,穆游砂漠'));
mob.push(new Array('野生馬','1300','邁茲平原,穆游砂漠'));
mob.push(new Array('雄鶏','150','迪爾科內爾,走廊,敦巴倫,イメンマハ,邁茲平原'));
mob.push(new Array('小哥布林','550','塞爾（初級）'));
mob.push(new Array('小哥布射手','580','塞爾（初級）'));
mob.push(new Array('小仙人掌蜥蜴','1500','穆游砂漠'));
mob.push(new Array('小小浣熊','46','走廊,精霊の森'));

mob.push(new Array('小毒哥布林','600','塞爾（初級）'));
mob.push(new Array('小灰色犰狳','200','フィリア（南）,倫迦砂漠'));
mob.push(new Array('小灰色犰狳','85','エルフチュートリアルフィールド'));
mob.push(new Array('小灰色狐貍','308','迪爾科內爾,走廊,敦巴倫,'));
mob.push(new Array('小灰色小浣熊','101',',敦巴倫'));
mob.push(new Array('小灰色尾貓鼬','','邁茲平原,倫迦砂漠'));
mob.push(new Array('小褐色狐貍','116','迪爾科內爾,走廊,敦巴倫'));
mob.push(new Array('小褐色惡狼','560','迪爾科內爾,走廊,敦巴倫,オスナサイル,'));
mob.push(new Array('小褐色熊','1272','敦巴倫,,仙魔'));
mob.push(new Array('小褐色豪豬','250','倫迦砂漠'));
mob.push(new Array('小褐色尾貓鼬','500','ヌベス山脈,倫迦砂漠'));
mob.push(new Array('小褐色足沙漠狐','116','倫迦砂漠'));
mob.push(new Array('小巨大蜘蛛','335','阿貝魯（初級）'));
mob.push(new Array('小黒犰狳','250','フィリア（南）,倫迦砂漠'));
mob.push(new Array('小黒惡狼','814','走廊'));
mob.push(new Array('小黒小浣熊','796','敦巴倫'));
mob.push(new Array('小黒色沙漠熊','1300','ヌベス山脈,卡魯森林'));
mob.push(new Array('小黒土豚','500','ヌベス山脈'));
mob.push(new Array('小黒熊','1702','敦巴倫,,仙魔'));
mob.push(new Array('小黒豪豬','300','倫迦砂漠'));
mob.push(new Array('小沙漠千足蟲','450','エランス渓谷,フィリア（東）'));
mob.push(new Array('小小角豬','700','ヌベス山脈'));
mob.push(new Array('小小耳土豚','','ケルラ港（北）'));
mob.push(new Array('小紅狐貍','271','迪爾科內爾,走廊,敦巴倫,'));
mob.push(new Array('小紅蜘蛛','303','阿貝魯（初級）'));
mob.push(new Array('小紅熊','1420','敦巴倫,菲歐納（一般）,克里爾（一般/覚醒）'));
mob.push(new Array('小紅黒豪豬','400','倫迦砂漠'));
mob.push(new Array('小大角豬','900','ヌベス山脈'));
mob.push(new Array('小大耳土豚','400','ヌベス山脈'));
mob.push(new Array('小洞窟ヤスデ','540','螞蟻地獄'));
mob.push(new Array('小白犰狳','300','フィリア（南）,倫迦砂漠'));
mob.push(new Array('小白惡狼','857','走廊,'));
mob.push(new Array('小白色沙漠熊','1000','ヌベス山脈,卡魯森林,エランス峡谷（北側）'));
mob.push(new Array('小白沙漠狐（小）','','穆游砂漠'));
mob.push(new Array('小白沙漠狐（大）','','穆游砂漠'));
mob.push(new Array('小白尾貓鼬','700','邁茲平原,倫迦砂漠'));
mob.push(new Array('小鬣土豚','','ヌベス山脈'));
mob.push(new Array('羊','130','迪爾科內爾,走廊,敦巴倫,イメンマハ,邁茲平原'));
mob.push(new Array('羊狼','1539','オスナサイル'));
mob.push(new Array('緑鬼魔','1113','巴里（下級/上級/褐色/艾斯拉斯）,菲歐納（一般/中級）,克里爾（一般/覚醒）,阿貝魯（銀/黒/女神）'));
mob.push(new Array('緑蛇','1850','塞爾（上級）'));
mob.push(new Array('緑角コブラ','1200','倫迦砂漠'));
mob.push(new Array('緑森蜥蜴','800','邁茲平原,卡魯森林'));
mob.push(new Array('古老的遺跡寶箱怪','','倫迦_砂漠遺跡（一般）'));
mob.push(new Array('古老的寶箱怪','281','阿貝魯（初級/一般）,阿貝魯（藍/紅/銀/女神）'));
mob.push(new Array('肚子發光大肚蜘蛛','','卡魯_森遺跡（石像蜘蛛的壺）'));
mob.push(new Array('鋏發光大肚蜘蛛','','卡魯_森遺跡（石像蜘蛛的鋏）'));
mob.push(new Array('鬣食蟻獸','1500','卡魯森林'));
mob.push(new Array('鬣土豚','900','邁茲平原'));

//mob.push(new Array('ナオ','0',''));
//mob.push(new Array('百眼巨人（菲歐納中級4人3階）','3245',''));
//mob.push(new Array('野豬','1160',''));
//mob.push(new Array('石巨人（塞爾下級）','2758',''));
//mob.push(new Array('石巨人（塞爾中級）','3548',''));
//mob.push(new Array('女妖クリステル','1240',''));
//mob.push(new Array('すごく強そうな褐色熊','2074',''));
//mob.push(new Array('石頭瑪斯ク','1000',''));
mob.push(new Array('紫水晶石巨人','2400','倫迦_砂漠遺跡（紫水晶箭）'));
//mob.push(new Array('翡翠マジック石巨人','','倫迦_砂漠遺跡（翡翠箭）'));
//mob.push(new Array('黃寶石マジック石巨人','','倫迦_砂漠遺跡（黃寶石箭）'));
//mob.push(new Array('白熊','2228',''));

mob.push(new Array('神秘箭石巨人','1800','倫迦_砂漠遺跡（守護者の遺跡）'));

mob.push(new Array('野犬','1000','ヌベス山脈'));
mob.push(new Array('黄色拉瑪','750','ヌベス山脈'));
mob.push(new Array('白頭拉瑪','850','ヌベス山脈'));
mob.push(new Array('褐色山羊','790','ヌベス山脈'));
mob.push(new Array('白山羊','1100','ヌベス山脈'));
mob.push(new Array('紅猞猁','1100','ヌベス山脈'));
mob.push(new Array('白猞猁','1300','ヌベス山脈'));
mob.push(new Array('arzusyuki','9999',''));

//影视界

mob.push(new Array('青铜枪兵(简单)', '960', '塔拉'));
mob.push(new Array('青铜弓箭手(简单)', '960', '塔拉'));
mob.push(new Array('青铜枪兵(中级)', '1920', '塔拉'));
mob.push(new Array('青铜弓箭手(中级)', '1920', '塔拉'));
mob.push(new Array('青铜枪兵(高级)', '2880', '塔拉'));
mob.push(new Array('青铜弓箭手(高级)', '2880', '塔拉'));
mob.push(new Array('青铜枪兵(困难)', '3840', '塔拉'));
mob.push(new Array('青铜弓箭手(困难)', '3840', '塔拉'));
mob.push(new Array('青铜队长(简单)', '1020', '塔拉'));
mob.push(new Array('青铜队长(中级)', '2040', '塔拉'));
mob.push(new Array('青铜队长(高级)', '3060', '塔拉'));
mob.push(new Array('青铜队长(困难)', '4080', '塔拉'));
mob.push(new Array('白银枪兵(简单)', '1040', '塔拉'));
mob.push(new Array('白银弓箭手(简单)', '1040', '塔拉'));
mob.push(new Array('白银枪兵(中级)', '2080', '塔拉'));
mob.push(new Array('白银弓箭手(中级)', '2080', '塔拉'));
mob.push(new Array('白银枪兵(高级)', '3120', '塔拉'));
mob.push(new Array('白银弓箭手(高级)', '3120', '塔拉'));
mob.push(new Array('白银枪兵(困难)', '4160', '塔拉'));
mob.push(new Array('白银弓箭手(困难)', '4160', '塔拉'));
mob.push(new Array('白银队长(简单)', '1105', '塔拉'));
mob.push(new Array('白银队长(中级)', '2210', '塔拉'));
mob.push(new Array('白银队长(高级)', '3315', '塔拉'));
mob.push(new Array('白银队长(困难)', '4420', '塔拉'));
mob.push(new Array('黄金枪兵(简单)', '1200', '塔拉'));
mob.push(new Array('黄金弓箭手(简单)', '1200', '塔拉'));
mob.push(new Array('黄金枪兵(中级)', '2400', '塔拉'));
mob.push(new Array('黄金弓箭手(中级)', '2400', '塔拉'));
mob.push(new Array('黄金枪兵(高级)', '3600', '塔拉'));
mob.push(new Array('黄金弓箭手(高级)', '3600', '塔拉'));
mob.push(new Array('黄金枪兵(困难)', '4800', '塔拉'));
mob.push(new Array('黄金弓箭手(困难)', '4800', '塔拉'));
mob.push(new Array('黄金队长(简单)', '1275', '塔拉'));
mob.push(new Array('黄金队长(中级)', '2550', '塔拉'));
mob.push(new Array('黄金队长(高级)', '3825', '塔拉'));
mob.push(new Array('黄金队长(困难)', '5100', '塔拉'));
mob.push(new Array('百变怪分身(简单)', '1200', '塔拉'));
mob.push(new Array('百变怪分身(中级)', '2400', '塔拉'));
mob.push(new Array('百变怪分身(高级)', '3600', '塔拉'));
mob.push(new Array('百变怪分身(困难)', '4800', '塔拉'));
mob.push(new Array('影子僵尸(简单)', '900', '塔拉'));
mob.push(new Array('影子僵尸(中级)', '1800', '塔拉'));
mob.push(new Array('影子僵尸(高级)', '2700', '塔拉'));
mob.push(new Array('影子僵尸(困难)', '3600', '塔拉'));
mob.push(new Array('小硫磺蜘蛛(简单)', '800', '塔拉'));
mob.push(new Array('小硫磺蜘蛛(中级)', '1600', '塔拉'));
mob.push(new Array('小硫磺蜘蛛(高级)', '2400', '塔拉'));
mob.push(new Array('小硫磺蜘蛛(困难)', '3200', '塔拉'));
mob.push(new Array('堕落的炼金术师(简单)', '1050', '塔拉'));
mob.push(new Array('堕落的炼金术师(中级)', '2010', '塔拉'));
mob.push(new Array('堕落的炼金术师(高级)', '3150', '塔拉'));
mob.push(new Array('堕落的炼金术师(困难)', '4200', '塔拉'));
mob.push(new Array('暗影弓箭手(简单)', '755', '塔汀'));
mob.push(new Array('暗影弓箭手(中级)', '1510', '塔汀'));
mob.push(new Array('暗影弓箭手(高级)', '2265', '塔汀'));
mob.push(new Array('暗影弓箭手(困难)', '3100', '塔汀'));
mob.push(new Array('暗影枪兵(简单)', '755', '塔汀'));
mob.push(new Array('暗影枪兵(中级)', '1510', '塔汀'));
mob.push(new Array('暗影枪兵(高级)', '2265', '塔汀'));
mob.push(new Array('暗影枪兵(困难)', '3100', '塔汀'));
mob.push(new Array('暗影战士(简单)', '800', '塔汀'));
mob.push(new Array('暗影战士(中级)', '1600', '塔汀'));
mob.push(new Array('暗影战士(高级)', '2400', '塔汀'));
mob.push(new Array('暗影战士(困难)', '3200', '塔汀'));
mob.push(new Array('暗影野猪(简单)', '725', '塔汀'));
mob.push(new Array('暗影野猪(中级)', '1550', '塔汀'));
mob.push(new Array('暗影野猪(高级)', '2320', '塔汀'));
mob.push(new Array('暗影野猪(困难)', '3300', '塔汀'));
mob.push(new Array('暗影角鹿(简单)', '800', '塔汀'));
mob.push(new Array('暗影角鹿(中级)', '1600', '塔汀'));
mob.push(new Array('暗影角鹿(高级)', '2400', '塔汀'));
mob.push(new Array('暗影角鹿(困难)', '3200', '塔汀'));

mob.sort(array_sort);

function init() {
	if (!document.all) {
		_state = document.getElementById('_state');
		_skill = document.getElementById('_skill');
		_strength = document.getElementById('_strength');
		Life = document.getElementById('Life');
		Mana = document.getElementById('Mana');
		Stamina = document.getElementById('Stamina');
		Str = document.getElementById('Str');
		Int = document.getElementById('Int');
		Dex = document.getElementById('Dex');
		Will = document.getElementById('Will');
		Luck = document.getElementById('Luck');
		Revise = document.getElementById('Revise');
		Boss = document.getElementById('Boss');
		Awful = document.getElementById('Awful');
		Strong = document.getElementById('Strong');
		Normal = document.getElementById('Normal');
		Weak = document.getElementById('Weak');
		Weakest = document.getElementById('Weakest');
	}
}

function main() {
	LoadCheckBox();
	setBase();
	setSkill();
	setStrength();
	enemy();
}

function array_sort(a,b) {
	a = a[1] ? eval(a[1]) : 0;
	b = b[1] ? eval(b[1]) : 0;
	return a-b;
}

function getBase() {
	var a = Life.value * 1 + Mana.value * 0.5 + Stamina.value * 0.5;
	var b = Str.value * 1 + Int.value * 0.2 + Dex.value * 0.1 + Will.value * 0.5 + Luck.value * 0.1;
	return a+b;
}

function getSkill() {
	var a = b = 0;
	for (var i=0;i<aSkill.length;i++)
		if (a < document.getElementById(aSkill[i]).value) {
			b = a;
			a = eval(document.getElementById(aSkill[i]).value);
		}
		else if (document.getElementById(aSkill[i]).value > b)
			b = eval(document.getElementById(aSkill[i]).value);
	return a+b/2;
}

function setBase() {
	_state.value = getBase();
}

function setSkill() {
	for (var i=0;i<aSkill.length;i++)
		document.getElementById(aSkill[i]+'_').value = document.getElementById(aSkill[i]).value;
	_skill.value = getSkill();
}

function setStrength() {
	_strength.value = eval(_state.value) + eval(_skill.value) + eval(Revise.value);
}

function load() {
	main();
}

function reset() {
	for (var i=0;i<aState.length;i++)
		document.getElementById(aState[i]).value = 0;
	for (var i=0;i<aSkill.length;i++)
		document.getElementById(aSkill[i]).selectedIndex = 0;
	for (var i=0;i<aMap.length-1;i++)
		document.getElementById(aMap[i]).checked = true;
	for (var i=0;i<aDisplay.length;i++)
		document.getElementById(aDisplay[i]).style.display = 'block';
	document.getElementById('map_disp').checked = false;
	Revise.value = 0;
	setBase();
	setSkill();
	setStrength();
	enemy();
}

function enemy() {
	var nodata = '滿足條件的怪物不存在~';
	var szBoss = '';
	var szAwful = '';
	var szStrong = '';
	var szNormal = '';
	var szWeak = '';
	var szWeakest = '';
	var mob = seach();
	for (var i=0;i<mob.length;i++) {
		var html = mob[i][gName];
		if (document.getElementById('map_disp').checked)
			html += '<span class="map"> (' + mob[i][gMap].replace(/_/,"") + ')</span>';
		html += '<span class="pow"> (' + mob[i][gPow] + ')</span>';
		html += '<br>';
		if (mob[i][gPow] == '')
			;
		else if (mob[i][gPow] >= _strength.value*3)
			szBoss += html;
		else if (mob[i][gPow] >= _strength.value*2)
			szAwful += html;
		else if (mob[i][gPow] >= _strength.value*1.4)
			szStrong += html;
		else if (mob[i][gPow] >= _strength.value*1)
			szNormal += html;
		else if (mob[i][gPow] >= _strength.value*0.8)
			szWeak += html;
		else
			szWeakest += html;
	}
	Boss.innerHTML = szBoss == '' ? nodata : szBoss;
	Awful.innerHTML = szAwful == '' ? nodata : szAwful;
	Strong.innerHTML = szStrong == '' ? nodata : szStrong;
	Normal.innerHTML = szNormal == '' ? nodata : szNormal;
	Weak.innerHTML = szWeak == '' ? nodata : szWeak;
	Weakest.innerHTML = szWeakest == '' ? nodata : szWeakest;
}

function SaveCheckBox() {
	var aCookieState = new Array();
	for (var i=0;i<aState.length;i++)
		aCookieState[i] = document.getElementById(aState[i]).value;
	setCookie('State',aCookieState.join(','),gCookieSaveDays);

	var aCookieSkill = new Array();
	for (var i=0;i<aSkill.length;i++)
		aCookieSkill[i] = document.getElementById(aSkill[i]).selectedIndex;
	setCookie('Skill',aCookieSkill.join(','),gCookieSaveDays);

	var aCookieMap = new Array();
	for (var i=0;i<aMap.length;i++)
		aCookieMap[i] = document.getElementById(aMap[i]).checked;
	setCookie('Map',aCookieMap.join(','),gCookieSaveDays);

	var aCookieDisplay = new Array();
	for (var i=0;i<aDisplay.length;i++)
		aCookieDisplay[i] = document.getElementById(aDisplay[i]).style.display;
	setCookie('Display',aCookieDisplay.join(','),gCookieSaveDays);

	setCookie('Revise',Revise.value,gCookieSaveDays);
}

function LoadCheckBox() {
	var aCookieState = getCookie('State').split(',');
	for (var i=0;i<aCookieState.length;i++)
		if (aCookieState[i] != '')
			document.getElementById(aState[i]).value = aCookieState[i];

	var aCookieSkill = getCookie('Skill').split(',');
	for (var i=0;i<aCookieSkill.length;i++)
		if (aCookieSkill[i] != '')
			document.getElementById(aSkill[i]).selectedIndex = aCookieSkill[i];

	var aCookieMap = getCookie('Map').split(',');
	if (aCookieMap != '')
		for (var i=0;i<aCookieMap.length;i++)
			document.getElementById(aMap[i]).checked = (aCookieMap[i] == 'true');

	var aCookieDisplay = getCookie('Display').split(',');
	if (aCookieDisplay != '')
		for (var i=0;i<aCookieDisplay.length;i++)
			document.getElementById(aDisplay[i]).style.display = aCookieDisplay[i] == "none" ? "none" : "block";

	var revise = getCookie('Revise');
	if (revise != '') Revise.value = revise;
}

function seach() {
	var aKeyword = new Array();
	for (var i=0;i<aMap.length;i++)
		if (document.getElementById(aMap[i]).checked)
			aKeyword = aKeyword.concat(document.getElementById(aMap[i]).value.split(","));

	var aHitList = new Array();
	for (var i=0;i<mob.length;i++)
		if (mob[i][gPow])
			for (var j=0;j<aKeyword.length;j++)
				if (mob[i][gMap].match(aKeyword[j])) {
					aHitList.push(mob[i]);
					break;
				}
	return aHitList;
}

function lyDisplay(name) {
	document.getElementById(name).style.display = document.getElementById(name).style.display == "none" ? "block" : "none";
}
-->
</script>
<link rel="stylesheet" type="text/css" href="http://img.shinobi.jp/tadaima/tdftad.css" /></head>
<body onLoad="init();main();">
<table>
	<tr>
		<td rowspan="2" valign="top">
			<table>
				<tr><td>战斗力</td><td><input type="text" size="3" id="Life" value="0" onChange="setBase();setStrength();enemy();">
<input type="hidden" size="3" id="Mana" value="0" onChange="setBase();setStrength();enemy();">
<input type="hidden" size="3" id="Stamina" value="0" onChange="setBase();setStrength();enemy();">
<input type="hidden" size="3" id="Str" value="0" onChange="setBase();setStrength();enemy();">
<input type="hidden" size="3" id="Int" value="0" onChange="setBase();setStrength();enemy();">
<input type="hidden" size="3" id="Dex" value="0" onChange="setBase();setStrength();enemy();">
<input type="hidden" size="3" id="Will" value="0" onChange="setBase();setStrength();enemy();">
<input type="hidden" size="3" id="Luck" value="0" onChange="setBase();setStrength();enemy();">
<input type="hidden" size="5" id="Revise" value="0" onChange="setStrength();enemy();"></td><td>&nbsp;&nbsp;&nbsp;输入需要查詢的戰斗力,然后點擊下旁邊空白區域^_^</td></tr>
			</table>
			

			</table>
		</td>
	</tr>
	<tr>
		<td align="right" valign="bottom">
		</td>
	</tr>
	<tr><td colspan="4">
		<table width="100%" border="0" cellpadding="0" cellspacing="0"><tr><td>
			<table style="visibility:hidden"><tr>
				<td>能力値</td><td><input type="text" size="4" id="_state" value="0" readonly class="disp"></td>
				<td>スキル</td><td><input type="text" size="4" id="_skill" value="0" readonly class="disp"></td>
				<td>戦闘力</td><td><input type="text" size="4" id="_strength" value="0" readonly class="disp"></td>
			</tr></table>
		</td><td align="right">
			<table border="0" cellpadding="0" cellspacing="0" style="visibility:hidden"><tr>
				<td><input onClick="enemy();" type="checkbox" id="map_disp"></td><td>出現場所表示&nbsp;&nbsp;</td>
				<td><input onClick="enemy();" type="checkbox" id="map_uf" value="シドスネッター,迪爾科內爾,精霊の森,走廊,敦巴倫,,オスナサイル,仙魔平原,イメンマハ,凱歐島,モルバアイル,あの世,クリス瑪斯フィールド" checked></td><td>ウルラF</td>
				<td><input onClick="enemy();" type="checkbox" id="map_ud" value="阿貝魯,塞爾,拉比,瑪斯,菲歐納,巴里,克里爾,倫達,皮卡,阿貝魯,バオル,恐怖圖書館,初心者チュートリアル" checked></td><td>ウルラD</td>
				<td><input onClick="enemy();" type="checkbox" id="map_if" value="ケルラ港,ヌベス山脈,邁茲平原,卡皮峡谷,穆游砂漠,卡魯森林,フィリア,エランス渓谷,倫迦砂漠,螞蟻地獄,洛佩斯砂漠,ナレス高原,梅托斯峡谷,エルフチュートリアルフィールド,発掘宝箱,巴雷斯,バルバ盆地,セルラ海岸,レウス川,ルナイ渓谷,シルバ森,地下トンネル,ソレア" checked></td><td>イリアF</td>
				<td><input onClick="enemy();" type="checkbox" id="map_id" value="卡魯_森遺跡,邁茲_平原遺跡,倫迦_砂漠遺跡,パルー遺跡" checked></td><td>イリアD</td>
			</tr></table>
		</td></tr></table>
	</td></tr>
</table>

<table cellspacing="3">
<!--
	<tr>
		<td class="list"><div class="cate" onclick="lyDisplay('Boss')">boss (3.0 ～ ∞)</div><div id="Boss" class="rank boss"></div></td>
		<td class="list"><div class="cate" onclick="lyDisplay('Awful')">awful (2.0 ～ 3.0)</div><div id="Awful" class="rank awful"></div></td>
		<td class="list"><div class="cate" onclick="lyDisplay('Strong')">strong (1.4 ～ 2.0)</div><div id="Strong" class="rank strong"></div></td>
	</tr>
	<tr>
		<td class="list"><div class="cate" onclick="lyDisplay('Normal')">normal (1.0 ～ 1.4)</div><div id="Normal" class="rank normal"></div></td>
		<td class="list"><div class="cate" onclick="lyDisplay('Weak')">weak (0.8 ～ 1.0)</div><div id="Weak" class="rank weak"></div></td>
		<td class="list"><div class="cate" onclick="lyDisplay('Weakest')">weakest (0.0 ～ 0.8)</div><div id="Weakest" class="rank weakest"></div></td>
	</tr>
-->
	<tr>
		<td class="cate" onClick="lyDisplay('Boss')">boss (3.0 ～ ∞)</td>
		<td class="cate" onClick="lyDisplay('Awful')">awful (2.0 ～ 3.0)</td>
		<td class="cate" onClick="lyDisplay('Strong')">strong (1.4 ～ 2.0)</td>
	</tr>
	<tr>
		<td class="rank boss"><div id="Boss"></div></td>
		<td class="rank awful"><div id="Awful"></div></td>
		<td class="rank strong"><div id="Strong"></div></td>
	</tr>
	<tr>
		<td class="cate" onClick="lyDisplay('Normal')">normal (1.0 ～ 1.4)</td>
		<td class="cate" onClick="lyDisplay('Weak')">weak (0.8 ～ 1.0)</td>
		<td class="cate" onClick="lyDisplay('Weakest')">weakest (0.0 ～ 0.8)</td>
	</tr>
	<tr>
		<td class="rank Normal"><div id="Normal"></div></td>
		<td class="rank Weak"><div id="Weak"></div></td>
		<td class="rank Weakest"><div id="Weakest"></div></td>
	</tr>
	<tr>
		<td colspan="3" class="text">
			翻譯:<a href="http://arzusyuki.blog124.fc2.com">arzusyuki</a> 数据更新:<a href="http://eiens.com/" >蓝泽雪</a> 更新日期: 2013.7.8 更新内容:影子怪物
		</td>
		</tr><tr>
		<td colspan="3" class="text">
			日文原版:<a href="http://mabi.nobody.jp/strength.html">Mabinogi - ちょっとしたもの</a>
		</td>
	</tr>
</table>
<!--
能力値 = 生命力*1 + マナ*0.5 + スタミナ*0.5 + Str*1 + Int*0.2 + Dex*0.1 + Will*0.5 + Luck*0.1
スキル = 最も戦闘力の高いスキル100% + 2番目に高いスキル50%

モンスターの戦闘力/キャラクターの戦闘力＝表示ランク<br>
(0.0 ～ 0.8) = weakest<br>
(0.8 ～ 1.0) = weak<br>
(1.0 ～ 1.4) = 表示なし（同レベル ）<br>
(1.4 ～ 2.0) = strong<br>
(2.0 ～ 3.0) = awful<br>
(3.0 ～ ∞) = boss<br>

小小浣熊		弱そう（-1000）
大理石			少し弱そう（-500）
豺狼		少し弱そう（-500）
アークリッチ	少し弱そう（-250）
不便の			ほんの少し弱そう（-100）
支障の			ほんの少し弱そう（-100）
害の			ほんの少し弱そう（-100）
障害の			ほんの少し弱そう（-100）
困難の			ほんの少し弱そう（-100）
緑の傷			少し強そう（+500）
黒い傷			強そう（+1000）
紅い傷			強そう（+1000）
-->

</body>
</html>