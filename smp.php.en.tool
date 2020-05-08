<?php
########################################
#
# PHP���Google Sitemap ������ ver 0.1
# ע�⣺����Ե�ǰĿ¼��д��Ȩ��
#
########################################

#��վ������
$WebRoot = "http://mabibook.com/";
#XML�ļ�����
$XMLFile = "sitemaps.xml";
#Ҫ���ǵ�Ŀ¼[���ִ�Сд]��ע�⣺ǰ��Ӻ�����Ϊ0��PHP�б�ʾ�٣�����ȡ�Ӵ�λ��ʱ�Ͳ��᷵�ؼ�
#�Ա��������ڵ�Ŀ¼Ϊ��ǰĿ¼����ɨ��ĸ�Ŀ¼������Ŀ¼ǰ�治�ü���"/"
$FilterDir = "+|app|bbs|bbslogo|bh|dev|font|images|p|pin|Scripts|smil|smil|swf|t|tool|tu|up|upcalc|w|weather|wp|tw|dun|";
#Ҫ�������ļ���չ��[Сд]
$IndexFileExt = "+|txt|";
#XMLͷ��
$XMLText = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n<urlset xmlns=\"http://www.google.com/schemas/sitemap/0.84\">\n";
#XMLβ��

//$forend="<url>\n<loc>".$GLOBALS["WebRoot"]."index.php</loc>\n</url>\n<url>\n<loc>".$GLOBALS["WebRoot"]."mod/mrlong.php</loc>\n</url>\n<url>\n<loc>".$GLOBALS["WebRoot"]."mod/</loc>\n</url>\n<url>\n<loc>".$GLOBALS["WebRoot"]."mod/c.php</loc>\n</url>\n<url>\n<loc>".$GLOBALS["WebRoot"]."mod/</loc>\n</url>\n<url>\n<loc>".$GLOBALS["WebRoot"]."mod/m.php</loc>\n</url>\n<url>\n<loc>".$GLOBALS["WebRoot"]."mod/npc.php</loc>\n</url>\n<url>\n<loc>".$GLOBALS["WebRoot"]."shop/</loc>\n</url>\n<url>\n<loc>".$GLOBALS["WebRoot"]."shop/iapp.php</loc>\n</url>\n<url>\n<loc>".$GLOBALS["WebRoot"]."shop/s.php</loc>\n</url>\n<url>\n<loc>".$GLOBALS["WebRoot"]."shop/d.php</loc>\n</url>\n<url>\n<loc>".$GLOBALS["WebRoot"]."shop/z.php</loc>\n</url>\n<url>\n<loc>".$GLOBALS["WebRoot"]."shop/h.php</loc>\n</url>\n<url>\n<loc>".$GLOBALS["WebRoot"]."w</loc>\n</url>\n";

$XMLEndText = $forend."</urlset>";

#���ú����⣺

echo "��ʼ�����ļ�XML����...";
DealFP(".");
$XMLText .= $XMLEndText;
makeFile($XMLFile,$XMLText);
echo "ok".$num."<br><br>";
$url = $WebRoot.$XMLFile;
echo "<a href=".$url.">��</a>:".$url;

#�½��ļ�
function makeFile($fileName, $text){
$fp = fopen($fileName, "w+");
fwrite($fp, $text);
fclose($fp);
}

/**
* ��ָ��������ӵ�XML��
* $f �����·�����ļ�����
* $dt ����ʱ����
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
* ����ָ����Ŀ¼�Լ���Ŀ¼���������������ļ�����XML
* $p ָ����Ŀ¼
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
