<!--
var menu_arr = ["返回首页","洛奇常用连接","天气预报","涂鸦图库","武器装备改造","宝石强化改造","洛奇称号数据","洛奇释放资料","洛奇拼图游戏","土豪捐款计算","摸蛋开箱模拟器","名字颜色模拟器","房屋广告板搜索","怪物战斗力计算","小册子问题反馈"];
var menu_url = ["/","T","weather.php","../tu/","102.php","change.php","title.php","ena.php","pin.php","forgod.php","rand.php","name.php","../dun","str.php","http://mabibook.com/bbs/forumdisplay.php?fid=8"];
var temp = "<table width=\"140\" border=\"0\" cellspacing=\"1\" cellpadding=\"5\">";
for (var i=0;i<menu_arr.length;i++) {

	if (menu_url[i]=="T") {
		temp += "<tr><td align=\"center\"><table width=\"120\" style=\"border-collapse: collapse\" bordercolor=\"#666666\" border=\"1\" cellspacing=\"0\" cellpadding=\"2\"><tr><td class=\"menu1\" align=center>"+menu_arr[i]+"</td></tr></table></td></tr>";
	/*} else if (menu_url[i]=="index.html") {
		if (document.URL.indexOf(menu_url[i])>-1||(document.URL=="http://mgb.sa.idv.tw/")) {
			temp += "<tr><td class=\"menu2\" id=\"menu"+i+"\" style=\"background-color: #BBBBBB\"><img src=\"menuarrow.gif\" width=\"12\" height=\"12\" />　<a class=\"mu\" href=\""+menu_url[i]+"\">"+menu_arr[i]+"</a></td></tr>";
		} else {
			temp += "<tr><td class=\"menu2\" id=\"menu"+i+"\" onMouseOut=\"Cbms("+i+",false)\" onMouseMove=\"Cbms("+i+",true)\"><img src=\"menuarrow.gif\" width=\"12\" height=\"12\" />　<a class=\"mu\" href=\""+menu_url[i]+"\">"+menu_arr[i]+"</a></td></tr>";
		}*/
	} else if (menu_url[i].length>0) {
		if (document.URL.indexOf(menu_url[i])>-1||(document.URL.indexOf(menu_url[i].substr(0,menu_url[i].length-5)+"-"))>-1) {
			temp += "<tr><td class=\"menu2\" id=\"menu"+i+"\" style=\"background-color: #BBBBBB\"><img src=\"menuarrow.gif\" width=\"12\" height=\"12\" />　<a class=\"mu\" href=\""+menu_url[i]+"\">"+menu_arr[i]+"</a></td></tr>";
		} else {
			temp += "<tr><td class=\"menu2\" id=\"menu"+i+"\"><img src=\"menuarrow.gif\" width=\"12\" height=\"12\" />　<a class=\"mu\" href=\""+menu_url[i]+"\">"+menu_arr[i]+"</a></td></tr>";
		}
	} else {
		temp += "<tr><td class=\"menu2\" id=\"menu"+i+"\" style=\"color: #999999\"><img src=\"menuarrow.gif\" width=\"12\" height=\"12\" />　"+menu_arr[i]+"</td></tr>";
	}
}
document.getElementById('menutag').innerHTML = temp+"</table>";


//-->