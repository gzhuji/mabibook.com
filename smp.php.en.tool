<?php
########################################
#
# PHP版的Google Sitemap 生成器 ver 0.1
# 注意：必须对当前目录有写的权限
#
########################################

#网站根域名
$WebRoot = "http://mabibook.com/";
#XML文件名称
$XMLFile = "sitemaps.xml";
#要建虑的目录[区分大小写]，注意：前面加号是因为0在PHP中表示假，这样取子串位置时就不会返回假
#以本程序所在的目录为当前目录，即扫描的根目录，所以目录前面不用加上"/"
$FilterDir = "+|app|bbs|bbslogo|bh|dev|font|images|p|pin|Scripts|smil|smil|swf|t|tool|tu|up|upcalc|w|weather|wp|tw|dun|";
#要索引的文件扩展名[小写]
$IndexFileExt = "+|txt|";
#XML头部
$XMLText = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n<urlset xmlns=\"http://www.google.com/schemas/sitemap/0.84\">\n";
#XML尾部

//$forend="<url>\n<loc>".$GLOBALS["WebRoot"]."index.php</loc>\n</url>\n<url>\n<loc>".$GLOBALS["WebRoot"]."mod/mrlong.php</loc>\n</url>\n<url>\n<loc>".$GLOBALS["WebRoot"]."mod/</loc>\n</url>\n<url>\n<loc>".$GLOBALS["WebRoot"]."mod/c.php</loc>\n</url>\n<url>\n<loc>".$GLOBALS["WebRoot"]."mod/</loc>\n</url>\n<url>\n<loc>".$GLOBALS["WebRoot"]."mod/m.php</loc>\n</url>\n<url>\n<loc>".$GLOBALS["WebRoot"]."mod/npc.php</loc>\n</url>\n<url>\n<loc>".$GLOBALS["WebRoot"]."shop/</loc>\n</url>\n<url>\n<loc>".$GLOBALS["WebRoot"]."shop/iapp.php</loc>\n</url>\n<url>\n<loc>".$GLOBALS["WebRoot"]."shop/s.php</loc>\n</url>\n<url>\n<loc>".$GLOBALS["WebRoot"]."shop/d.php</loc>\n</url>\n<url>\n<loc>".$GLOBALS["WebRoot"]."shop/z.php</loc>\n</url>\n<url>\n<loc>".$GLOBALS["WebRoot"]."shop/h.php</loc>\n</url>\n<url>\n<loc>".$GLOBALS["WebRoot"]."w</loc>\n</url>\n";

$XMLEndText = $forend."</urlset>";

#公用函数库：

echo "开始构建文件XML索引...";
DealFP(".");
$XMLText .= $XMLEndText;
makeFile($XMLFile,$XMLText);
echo "ok".$num."<br><br>";
$url = $WebRoot.$XMLFile;
echo "<a href=".$url.">打开</a>:".$url;

#新建文件
function makeFile($fileName, $text){
$fp = fopen($fileName, "w+");
fwrite($fp, $text);
fclose($fp);
}

/**
* 将指定内容添加到XML中
* $f 含相对路径的文件名称
* $dt 日期时间型
*/
function addToXML($f, $dt){



$f=str_replace("/db.txt","",$f);
$f=str_replace("en/shop/res/","",$f);





$so="index";
$str=$f;
$pos=strpos($str,$so);
if($pos===false)

{
$f=str_replace("/","-",$f);



$s = "<url>\n<loc>".$GLOBALS["WebRoot"]."en/shop/iknow.php?h=".$f."</loc>\n<lastmod>".$dt."</lastmod>\n</url>\n";

}


	else
	{$s = "";}


//$s=str_replace("iknow.php?h=up.ok","index.html",$s);


$GLOBALS["XMLText"] .= $s;
}

/**
* 遍历指定的目录以及子目录，将符合条件的文件加入XML
* $p 指定的目录
*/
function DealFP($p){
$FilterDir = $GLOBALS["FilterDir"];
$IndexFileExt = $GLOBALS["IndexFileExt"];

$handle=opendir($p);
if ($p==".") $path = "";
else $path = $p."/";
while ($file = readdir($handle))
{
    $d = filetype($path.$file);
    if ((($d=='file')||($d=='dir'))&&($file!='.')&&($file!='..'))
    {
        $pf = $path.$file;
        //echo "[".$d."]".$pf."<br>";
        if ($d=='dir')
        {
          if (!(strpos($FilterDir, "|".$pf."|")))
          {
            DealFP($pf);
          }
        }else{
          $ext = "|".strtolower(substr($file, strrpos($file, ".")+1))."|";
          
          if (strpos($IndexFileExt, $ext))
          {
            $d = filemtime($pf);
            $dt = date("Y-m-d",$d);
            addToXML($pf, $dt);
			
          }
        }
    }
}
closedir($handle); 
}




?>
