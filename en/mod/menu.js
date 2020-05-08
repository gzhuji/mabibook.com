<!--
var menu_arr = ["Back to index","Mabinogi Tool","Simulator","Ego Color","Gachapon","Gem Upgrade","Item Upgrade","Name Color","Mabinogi Game","Jigsaw Puzzle","Sliding Puzzle"];
var menu_url = ["/en","T","T","ego.php","rand.php","change.php","102.php","name.php","T","jigsaw2.php","jigsaw.php"];
var temp = "<table width=\"190\" border=\"0\" cellspacing=\"1\" cellpadding=\"5\">";
for (var i=0;i<menu_arr.length;i++) {

	if (menu_url[i]=="T") {
		temp += "<tr><td align=\"center\"><table width=\"150\" style=\"border-collapse: collapse\" bordercolor=\"#666666\" border=\"1\" cellspacing=\"0\" cellpadding=\"2\"><tr><td class=\"menu1\" align=center>"+menu_arr[i]+"</td></tr></table></td></tr>";
	
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