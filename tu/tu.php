<?php
require_once('sam.php');


$configAdminPass		= "mabo.BBo!k114.@Kns214";									//管理员密码 注:安全起见,默认密码不能登陆管理
$configWantedPass		= false;										//查看相册是否需要密码 需要:true 不需要:false
$configOpenGzip			= true;											//是否压缩页面 压缩:true 不压缩:false
$configShowPicSize		= false;										//是否显示图片的大小 (单位:KB) 显示:true 不显示:false (注:不显示,程序运行速度将提高)
$configExt				= array('png');	//图片类型
$z1				= array('');	//图片注册
$z2				= array('');	//图片注册
$strLenMax				= 24;											//文件名字限制长度 (防止撑破表格)
$configEachPageMax		= 17;											//每页显示的图片数目
$configEachLineMax		= 4;											//每行显示的图片数目
$configTDWidth			= 150;											//表格宽度
$configTDHeight			= 56;											//表格高度
$configPageMax			= 3;											//分页前后预览数
$configDirPasswordFile	= "neatpicPassword.php";						//密码文件
$configTilte			= "洛奇涂鸦 - Mabibook.com";						//标题
$configVer				= "1.0.0";										//version

/*
+----------------------------------+
| Class
+----------------------------------+
| C / M : 2003-12-28 / 2003-12-29
+----------------------------------+
*/

Class neatpic
{
	var $configWantedPass;
	var $configAdminPass;
	var $configOpenGzip;
	var $configShowPicSize;
	var $configExt = array();
	var $strLenMax;
	var $configEachPageMax;
	var $configEachLineMax;
	var $configTDHeight;
	var $configTDWidth;
	var $configPageMax;
	var $configTilte;
	var $configVer;

	var $dirOptionList;
	var $timer;
	var $usedTime;
	var $pathLevelNum;
	var $nowDirNmae;
	var $dirNum;
	var $picNum;
	var $pageTotal;
	var $start;
	var $offSet;
	var $pageStart;
	var $pageMiddle;
	var $pageEnd;
	var $temp;
	var $picID;
	var $picRealSizeWidth;
	var $picRealSizeHeight;

	var $picArray = array();
	var $picFileArray = array();
	var $dirArray = array();
	var $dirNameArray = array();
	var $pathArray = array();
	var $pathError = false;

	var $page;
	var $path;
	var $style;
	var $c;

	/*
	+----------------------------------+
	| Constructor
	+----------------------------------+
	| C / M : 2003-12-28 / 2003-12-29
	+----------------------------------+
	*/
	
	function neatpic($configWantedPass, $configAdminPass, $configDirPasswordFile, $configOpenGzip, $configShowPicSize, $configExt, $strLenMax, $configEachPageMax, $configEachLineMax, $configTDHeight, $configTDWidth, $configPageMax, $configTilte, $configVer)
	{
		$this->configWantedPass				= & $configWantedPass;
		$this->configAdminPass				= & $configAdminPass;
		$this->configDirPasswordFile		= & $configDirPasswordFile;
		$this->configOpenGzip				= & $configOpenGzip;
		$this->configShowPicSize			= & $configShowPicSize;
		$this->configExt					= & $configExt;
		$this->strLenMax					= & $strLenMax;
		$this->configEachPageMax			= & $configEachPageMax;
		$this->configEachLineMax			= & $configEachLineMax;
		$this->configTDHeight				= & $configTDHeight ;
		$this->configTDWidth				= & $configTDWidth;
		$this->configPageMax				= & $configPageMax;
		$this->configTilte					= & $configTilte;
		$this->configVer					= & $configVer;
	}

	/*
	+----------------------------------+
	| Open gzip
	+----------------------------------+
	| C / M : 2003-12-29 / --
	+----------------------------------+
	*/
	
	function gzip()
	{
		if ($this->configOpenGzip == true) 
			ob_start("ob_gzhandler");
	}

	/*
	+----------------------------------+
	| Get the querystring
	+----------------------------------+
	| C / M : 2003-12-28 / 2003-12-29
	+----------------------------------+
	*/

	function getVars()
	{
		$this->page = rawurldecode($_GET['page']);
		$this->path = rawurldecode($_GET['path']);
		$this->style = $_GET['style'];

		if (!$this->style) $this->style = "small";
		if (!$this->path) $this->path = ".";
	}

	/*
	+----------------------------------+
	| Check error
	+----------------------------------+
	| C / M : 2003-12-28 / 2004-1-1
	+----------------------------------+
	*/

	function checkError()
	{
		if (preg_match("/\.\./", $this->path)) $pathError = true;
		if (!is_dir($this->path)) $pathError = true;

		if ($pathError == true)
		{
			header("location:".$_SERVER['PHP_SELF']);
			exit;
		}
	}

	/*
	+----------------------------------+
	| Path array initialize
	+----------------------------------+
	| C / M : 2003-12-28 / 2003-12-29
	+----------------------------------+
	*/

	function pathArrayInitialize()
	{
		if (!$this->path) $this->path = ".";

		$this->pathArray = explode("/", $this->path);
		$this->pathLevelNum = count($this->pathArray);
		$this->nowDirName = $this->pathArray[$this->pathLevelNum - 1];
		if ($this->nowDirName == ".") $this->nowDirName = "Root dir";
	}

	/*
	+----------------------------------+
	| Timer
	+----------------------------------+
	| C / M : 2003-12-29 / --
	+----------------------------------+
	*/

	function timer()
	{
		$time = explode( " ", microtime());
		$usec = (double)$time[0];
		$sec = (double)$time[1];
		$this->timer = $usec + $sec;
	}

	/*
	+----------------------------------+
	| Show used time
	+----------------------------------+
	| C / M : 2003-12-29 / --
	+----------------------------------+
	*/

	function usedTime()
	{
		
	}

	/*
	+----------------------------------+
	| Make over direct
	+----------------------------------+
	| C / M : 2003-12-28 / 2003-12-29
	+----------------------------------+
	*/

	function makeOverdirect()
	{
		$overPath = ".";

		for($i = 1; $i < $this->pathLevelNum - 1; $i++)
		{
			$overPath = $overPath."/".$this->pathArray[$i];
		}

		$this->dirArray[] = $overPath;
		$this->dirNameArray[] = "上级目录";

		for($i = 1; $i < $this->pathLevelNum; $i++)
		{
			$this->encodePath .= rawurlencode($this->pathArray[$i])."/";
		}
	}

	/*
	+----------------------------------+
	| GetFileExt
	+----------------------------------+
	| C / M : 2003-12-28 / --
	+----------------------------------+
	*/

	function getFileExt($fileName)
	{
		$pos = strrpos($fileName, '.');
		return strtolower(substr($fileName, $pos+1, (strlen($fileName)-$pos-1)));
	}

	/*
	+----------------------------------+
	| Make direct list
	+----------------------------------+
	| C / M : 2003-12-28 / 2003-12-29
	+----------------------------------+
	*/

	function makeDirList()
	{
		$dir = dir($this->path);

		while($file = $dir->read())
		{
			if ($file <> "." and $file <> "..")
			{
				$fileName = $file;
				$file = $this->path."/".$file;
				
				

				if (is_dir($file))
				{
					$this->dirArray[] = $file;
					$this->dirNameArray[] = $fileName;
				}
				
				if (in_array($this->getFileExt($file), $this->configExt))
				{
					$this->picEncodeArray[] = "./" . $this->encodePath . rawurlencode($fileName);
					$this->picArray[] = $file;
					$this->picFileArray[] = $fileName;
				}
			}
		}
		

	}

	/*
	+----------------------------------+
	| Get each array number
	+----------------------------------+
	| C / M : 2003-12-28 / --
	+----------------------------------+
	*/

	function getEachArrayNum()
	{
		$this->dirNum = count($this->dirArray);
		$this->picNum = count($this->picArray);
	}

	/*
	+----------------------------------+
	| Make page bar
	+----------------------------------+
	| C / M : 2003-12-28 / 2003-12-29
	+----------------------------------+
	*/

	function makePageBar()
	{

		$this->pageTotal = ceil($this->picNum / $this->configEachPageMax);

		if (!$this->page or $this->page < 0) $this->page =$this->pageTotal;
		if ($this->page > $this->pageTotal) $this->page = $this->pageTotal;

		$this->offSet = $this->configEachPageMax * $this->page;
		$this->start = $this->offSet - $this->configEachPageMax;

		if ($this->start < 0) $this->start = 0;
		if ($this->offSet > $this->picNum) $this->offSet = $this->picNum;
		

		$this->pageStart = $this->page - $this->configPageMax;
		if ($this->pageStart <= 0) $this->pageStart = 1;

		$this->pageMiddle = $this->page + 1;
		$this->pageEnd = $this->pageMiddle + $this->configPageMax;
		
		if ($this->page <= $this->configPageMax) $this->pageEnd = $this->configPageMax * 2 + 1;
		if ($this->pageEnd > $this->pageTotal) $this->pageEnd = $this->pageTotal + 1;
	}

	/*
	+----------------------------------+
	| Show page bar
	+----------------------------------+
	| C / M : 2003-12-28 / 2003-12-29
	+----------------------------------+
	*/

	function showPageBar()
	{
		print("<center>\n");
		print("<BR><font color=\"#cccccc\">");
		print("[ <A HREF=\"".$_SERVER['PHP_SELF']."?path=".rawurlencode($this->path)."&style=".$this->style."&page=".($this->page + 1)."\" title=\"pre page\">上一页</A> ]&nbsp;");
		
		print("<A HREF=\"".$_SERVER['PHP_SELF']."?path=".rawurlencode($this->path)."&style=".$this->style."&page=".$this->pageTotal."\"><< </A><A HREF=\"".$_SERVER['PHP_SELF']."?path=".rawurlencode($this->path)."&style=".$this->style."&page=".$this->pageTotal."\"> [".$this->pageTotal."] </A>\n");


			

		

		print("... <A HREF=\"".$_SERVER['PHP_SELF']."?path=".rawurlencode($this->path)."&style=".$this->style."&page=1\">[1]</A>\n");
		
		print(" <A HREF=\"".$_SERVER['PHP_SELF']."?path=".rawurlencode($this->path)."&style=".$this->style."&page=1\" title=\"end page\">>></A>\n");

		print("[ <A HREF=\"".$_SERVER['PHP_SELF']."?path=".rawurlencode($this->path)."&style=".$this->style."&page=".($this->page - 1)."\" title=\"next page\">下一页</A> ]&nbsp;共 <B><FONT COLOR=\"#ff8080\">".$this->pageTotal."</FONT></B> 页&nbsp;&nbsp;当前位于第 <B><FONT COLOR=\"#ff8080\">".$this->page."</FONT></B> 页");
		print("<BR><BR>");
		print("</font></center>\n");
	}

	/*
	+----------------------------------+
	| Set picture ID
	+----------------------------------+
	| C / M : 2003-12-28 / --
	+----------------------------------+
	*/

	function setPicID($id)
	{
		$this->picID = $id;
	}

	/*
	+----------------------------------+
	| Get picture dimension
	+----------------------------------+
	| C / M : 2003-12-28 / --
	+----------------------------------+
	*/

	function getPicDim()
	{				

		$picSize = GetImageSize($this->picArray[$this->picID]);
		preg_match("!width=\"(.*)\" height=\"(.*)\"!", $picSize['3'], $tempSize);

		$this->picRealSizeWidth		= $tempSize['1'];
		$this->picRealSizeHeight	= $tempSize['2'];

		/*
		$tempSize['1'] < $this->configTDWidth ? $this->temp['Width'] = $tempSize['1'] : $this->temp['Width'] = $this->configTDWidth;
		$tempSize['2'] < $this->configTDHeight ? $this->temp['Height'] = $tempSize['2'] : $this->temp['Height'] = $this->configTDHeight;
		*/

		$tWidth = $this->picRealSizeWidth / $this->configTDWidth;
		$tHeight = $this->picRealSizeHeight / $this->configTDHeight;

		if ($this->picRealSizeWidth > $this->configTDWidth OR $this->picRealSizeHeight > $this->configTDHeight)
		{
			if ($tWidth > $tHeight)
			{
				$this->temp['Width'] = $this->configTDWidth;
				$this->temp['Height'] = number_format($this->picRealSizeHeight / $tWidth);
			}
			elseif ($tWidth < $tHeight)
			{
				$this->temp['Height'] = $this->configTDHeight;
				$this->temp['Width'] = number_format($this->picRealSizeWidth / $tHeight);
			}
			else
			{
				$this->temp['Width'] = $this->configTDWidth;
				$this->temp['Height'] = $this->configTDHeight;
			}
		}
		else
		{
			$this->temp['Width']	= $this->picRealSizeWidth;
			$this->temp['Height']	= $this->picRealSizeHeight;
		}
	}
	/*
	+----------------------------------+
	| Show the title javascript
	+----------------------------------+
	| C / M : 2003-12-29 / 2003-12-30
	+----------------------------------+
	*/

	function ShowJS()
	{

	}



	/*
	+----------------------------------+
	| Show title
	+----------------------------------+
	| C / M : 2003-12-28 / --
	+----------------------------------+
	*/

	function showTitle()
	{
		


	}

	/*
	+----------------------------------+
	| Show css
	+----------------------------------+
	| C / M : 2003-12-28 / --
	+----------------------------------+
	*/

	function showCSS()
	{
		print("<style type='text/css'>
		a:link, a:visited, a:active { text-decoration: none; color: #ccc }
		a:hover { color: orangered; text-decoration:none }
		BODY { scrollbar-face-color: #DEE3E7; scrollbar-highlight-color: #FFFFFF; scrollbar-shadow-color: #DEE3E7; scrollbar-3dlight-color: #D1D7DC; scrollbar-arrow-color:  #006699; scrollbar-track-color: #EFEFEF; scrollbar-darkshadow-color: #98AAB1; font: 12px Verdana; color:#333333; font-family: Tahoma,Verdana, Tahoma, Arial,Helvetica, sans-serif; font-size: 12px; color: #ccc; margin:0px 12px 0px 12px;background-color:#FFF }
		TD {font: 12px Verdana; color:#333333; font-family: Tahoma,Verdana, Tahoma, Arial,Helvetica, sans-serif; font-size: 12px; color: #ccc; };
		input, textarea {
		font-family: Verdana;
		font-size: 8pt;
		border: 1px solid #C0C0C0;
		color:#333333; background-color:#FFFFFF
		}
		</style>\n</head>
		");
		print("<BODY>\n");
		print("<A NAME=\"TOP\">\n");
		print("<BR>\n");
	}
	/*
	+----------------------------------+
	| Show state
	+----------------------------------+
	| C / M : 2003-12-28 / 2004-4-9
	+----------------------------------+
	*/

	function showState()
	{
		
	}

	/*
	+----------------------------------+
	| Make option direct list
	+----------------------------------+
	| C / M : 2004-3-24 / -- --
	+----------------------------------+
	*/

	function makeOptionList()
	{
		$this->dirOptionList = "<select onchange=\"location='" . $_SERVER['PHP_SELF'] . "?path='+this.options[this.selectedIndex].NAME\">\n";
		$this->dirOptionList .= "<option ID=\"\">--&nbsp;选择目录&nbsp;--</option>\n";

		for($i = 0; $i < $this->dirNum; $i++)
			$this->dirOptionList .= "<option NAME=\"" . rawurlencode($this->dirArray[$i]) . "\">" . $this->dirNameArray[$i] . "</option>\n";
		
		$this->dirOptionList .= "</select>\n";
	}

	/*
	+----------------------------------+
	| Show direct list
	+----------------------------------+
	| C / M : 2003-12-28 / 2004-3-24
	+----------------------------------+
	*/

	function showDirList()
	{
		
	}

	/*
	+----------------------------------+
	| Cute the long file name
	+----------------------------------+
	| C / M : 2003-12-29 / --
	+----------------------------------+
	*/

	function sortName($filename)
	{
		$filename = substr($filename, 0, strrpos($filename, '.'));
		$strlen = strlen($filename);
		if ($strlen > $this->strLenMax) $filename = substr($filename, 0, ($this->strLenMax)) . chr(0) . "...";
		
		return $filename;
	}
	
	/*
	+----------------------------------+
	| Show picture list
	+----------------------------------+
	| C / M : 2003-12-28 / 2003-12-29
	+----------------------------------+
	*/


	function showPicList()
	{
		
		print("<FORM name=\"dfile\" action=\"". $_SERVER['PHP_SELF'] ."?action=del&style=" . $_GET['style'] . "&page=" . $_GET['page'] . "\" METHOD=\"POST\">\n");
		print("<INPUT TYPE=hidden NAME=\"path\" VALUE=\"" . rawurlencode($this->path) . "\">");

		/*
		+----------------------------------+
		| Real size style
		+----------------------------------+
		*/
		
		$session = & $_SESSION;
		
		if ($this->style == "real")
		{		
			
			
			
		}
		/*
		+----------------------------------+
		| Small size style
		+----------------------------------+
		*/
		else
		{

		
			print("<center>\n");
			printf("<TABLE border=0><TBODY><TR>\n");
			for($i = $this->offSet-1; $i > $this->start; $i--)
			{
				$I++;

				$this->setPicID($i);
				$this->getPicDim();

				/*
				+----------------------------------+
				| Read and format this picture's size
				+----------------------------------+
				*/

				$this->configShowPicSize == false ? $picFileSize = " -- " : $picFileSize = sprintf("%0.2f", filesize($this->picArray[$i]) / 1024);
$datal=MABI_VCHAT_GET_FILETAG($this->picEncodeArray[$i]);
$zltemp=mb_substr($datal["author"], 0, 20,'gb2312');
if ($zltemp<>"")
 {$zl="作者 ".$zltemp;}
  else
   {$zl="";}


				print("<TD style=\"border: 1px solid #CCCCCC\">\n");
				print("<TABLE BORDER=\"0\" CELLPADDING=\"0\" CELLSPACING=\"0\" STYLE=\"BORDER-COLLAPSE: COLLAPSE\">\n");
				print("<TBODY>\n");
				print("<TR>\n");
				print("<TD bgcolor=\"#268cb6\" height=\"20\" colspan=\"3\"><CENTER>" . $zl . "</CENTER></TD>\n");
				print("</TR>\n");
				print("<TR>\n");
				print("<TD width=\"" . $this->configTDWidth . "\" height=\"" . $this->configTDHeight . "\" style=\"border: 1px solid #CCCCCC\" colspan=\"3\" bgcolor=\"#268cb6\"><CENTER><A href=\"" . $this->picEncodeArray[$i] . "\" target=\"_blank\"><IMG SRC=\"" . $this->picEncodeArray[$i] . "\" BORDER=\"0\" width=\"" . $this->temp['Width'] . "\" height=\"" . $this->temp['Height'] . "\"></A></CENTER></TD>\n");
				print("<TR>\n");
				print("");

				

				print("<TD bgcolor=\"#268cb6\" height=\"20\" style=\"padding-bottom:2px;\"><CENTER>
				
<script type=\"text/javascript\">
<!--
function fCopyToClicp(id){
	var a = document.getElementById(id);
	window.clipboardData.setData('text',a.value);
	alert(\"图片复制成功~ = v =\");
}
--></script>

<input id=\"url".$i."\" type=\"hidden\" value=\"http://mabibook.com/tu/". $this->picEncodeArray[$i] ."\" class=\"linkCode_input\" onclick=\"this.select()\" /><input type=\"button\" value=\"" . $this->picRealSizeWidth . "×" . $this->picRealSizeHeight . "&nbsp;&nbsp;复制地址\" onClick=\"fCopyToClicp('url".$i."')\" style=\"background-color:#268cb6;border-color:#268cb6;padding-top:5px;\">

</CENTER></TD></TR></TBODY></TABLE></TD>\n");
				
				if ($this->configEachLineMax == $I)
				{
					$I = 0;
					print("</TR><TR>\n");
				}
			}
			print("</TR>\n</TBODY></TABLE>\n");
			print("\n");
			print("</center>\n");
		}

		print("</FORM>\n");
	}

	/*
	+----------------------------------+
	| Show config state
	+----------------------------------+
	| C / M : 2003-12-29 / --
	+----------------------------------+
	*/

	function showConfigState()
	{

		
	}

	/*
	+----------------------------------+
	| Show login window
	+----------------------------------+
	| C / M : 2003-12-29 / 2004-3-26
	+----------------------------------+
	*/

	function showLogin()
	{
		
	}

	/*
	+----------------------------------+
	| Show Admincp
	+----------------------------------+
	| C / M : 2003-12-29 / 2004-4-2
	+----------------------------------+
	*/

	function showAdmincp()
	{       
  		$session = & $_SESSION;
		if ($session['neatpicLogined'] == false)
		{
			print("<center>\n");
			print("<table width=\"400px\">\n");
			print("<tbody>\n");
			print("<tr>\n");
			print("<td bgcolor=\"268cb6\" height=\"30\" style=\"border: 1px solid #268cb6\" width=\"30%\">\n");
		print("<CENTER>&nbsp;<a href=\"index.php\">洛奇小册子涂鸦</a>&nbsp;&nbsp;[ 图片: <B><FONT COLOR=\"#ff8080\">".$this->picNum."</FONT></B> ]</CENTER>");
			print("</td>\n");
			print("<FORM action=\"" . $_SERVER['PHP_SELF'] . "?action=upload\" method=\"POST\" enctype=\"multipart/form-data\">\n");
			print("<td bgcolor=\"268cb6\" height=\"30\" style=\"border: 1px solid #268cb6\" width=\"60%\">&nbsp;&nbsp;\n");
			if (is_writeable($this->path))
				print("<INPUT TYPE=hidden NAME=\"path\" VALUE=\"" . rawurlencode($this->path) . "\"><INPUT TYPE=FILE NAME=\"image\" style=\"font-size:12;height:20;\"> <INPUT TYPE=submit VALUE=\"上传\"> <input type=hidden value=\"\" OnClick=\"self.location='" . $_SERVER['PHP_SELF'] . "?path=" . rawurlencode($this->path) . "&action=upload'\" alt=\"\">");
			else
				printf("<FONT COLOR=\"red\"><B>无法上传图片 目录 <FONT COLOR=\"blue\">%s</FONT> 不可写</B></FONT>", $this->nowDirName);
			print("</td>\n");
			print("</FORM>\n");


			print("</tr>\n");
			print("</tbody>\n");
			print("</table>\n");
			print("</center>\n");
		}
		$session = & $_SESSION;
		if ($session['neatpicLogined'] == true)
		{
			print("<center>\n");
			print("<table width=\"67%\">\n");
			print("<tbody>\n");
			print("<tr>\n");
			print("<td bgcolor=\"F7F7F7\" height=\"30\" style=\"border: 1px solid #CCCCCC\" width=\"170\">\n");
		print("<CENTER>&nbsp;<a href=\"index.php\">洛奇小册子涂鸦</a>&nbsp;&nbsp;[图片: <B><FONT COLOR=\"red\">".$this->picNum."</FONT></B>]&nbsp;&nbsp;</CENTER>");
			print("</td>\n");
			print("<FORM action=\"" . $_SERVER['PHP_SELF'] . "?action=upload\" method=\"POST\" enctype=\"multipart/form-data\">\n");
			print("<td bgcolor=\"F7F7F7\" height=\"30\" style=\"border: 1px solid #CCCCCC\" width=\"380\">&nbsp;&nbsp;\n");
			if (is_writeable($this->path))
				print("<INPUT TYPE=hidden NAME=\"path\" VALUE=\"" . rawurlencode($this->path) . "\"><INPUT style=\"height:20\" TYPE=FILE NAME=\"image\" style=\"font-size:12;\"> <INPUT TYPE=submit VALUE=\"上传图片\"> ");
			else
				printf("<FONT COLOR=\"red\"><B>无法上传图片 目录 <FONT COLOR=\"blue\">%s</FONT> 不可写</B></FONT>", $this->nowDirName);
			print("</td>\n");
			print("</FORM>\n");

			
			print("</tr>\n");
			print("</tbody>\n");
			print("</table>\n");
			print("</center>\n");
		}
	}


	/*
	+----------------------------------+
	| del selected file
	+----------------------------------+
	| C / M : 2004-4-2 / --
	+----------------------------------+
	*/

	function delFile()
	{
		
	}

	/*
	+----------------------------------+
	| show upload
	+----------------------------------+
	| C / M : 2004-3-26 / --
	+----------------------------------+
	*/

	function showUpload()
	{
		if ($_GET['action'] == 'upload')
		{
			$this->timer();
			$this->showTitle();
            $this->showCSS();
			$this->upload();
			$this->usedTime();
			$this->showConfigState();

			exit;
		}
	}

	/*
	+----------------------------------+
	| png ztxt
	+----------------------------------+
	| C / M : 2004-3-26 / --
	+----------------------------------+

	*/
	

	/*
	+----------------------------------+
	| upload image
	+----------------------------------+
	| C / M : 2004-3-26 / --
	+----------------------------------+

	*/

	function upload()
	{		
			
		
		{
			$path = rawurldecode($_POST['path']);


			$tmpPath = explode('/', $path);
			$tmpPathLevel = count($tmpPath);
			
			for ($i = 1; $i < $tmpPathLevel; $i++)
				$decodePath .= rawurlencode($tmpPath[$i]) . "/";

			$uploadFile = "chat_".date('Ymd',time() + 24 * 3600)."_".date('His',time() + 15 * 3600)."_mabibook.png";

			if (file_exists($path . "/" . $uploadFile))
				$uploadFile = date('is') . $_FILES['image']['name'];

			$imgType = $this->getFileExt($_FILES['image']['name']);
			





			if (!in_array($imgType, $this->configExt)) $this->error('只能上传有签名的PNG格式噢~ 例如我的文档->洛奇->涂鸦聊天目录里的图片');
            

			
if (!copy($_FILES['image']['tmp_name'], $path . "/" . $uploadFile)) $this->error('文件上传发生错误');

$datax=MABI_VCHAT_GET_FILETAG($uploadFile);
$z1=$datax["authid"];
$z2=mb_substr($datax["author"], 0, 20,'gb2312');
$z3=iconv("utf-16le", "gb2312", $datax["author"]); 
if ($z2 & $z1 =="") unlink($path . "/" . $uploadFile);
if ($z2 & $z1 =="") $this->error('图片无author或authid签名信息，只能上传有签名的PNG格式噢~ 例如我的文档->洛奇->涂鸦聊天目录里的图片');

			print("<center>\n");
			print("<table width=\"80%\">\n");
			print("<tbody>\n");
			print("<tr>\n");
			print("<td bgcolor=\"#F7F7F7\" height=\"50\" style=\"border: 1px solid #CCCCCC\">\n");
			printf("<CENTER><FONT COLOR=\"red\"><B>图片上传/检测成功</B></FONT></CENTER>");
			print("</td>\n");
			print("</tr>\n");
			print("<tr>\n");
			print("<td bgcolor=\"#FFFFFF\" height=\"50\" style=\"border: 1px solid #CCCCCC\">\n");
			printf("<CENTER><BR>文件authid:<FONT COLOR=\"green\">%s</FONT>&nbsp;&nbsp;作者author:<FONT COLOR=\"green\">%s</FONT><br>
			<br><IMG SRC=\"%s%s\" border=1><BR><BR><script type=\"text/javascript\">
<!--
function fCopyToClicp(id){
	var a = document.getElementById(id);
	window.clipboardData.setData('text',a.value);
	alert(\"图片复制成功~ = v =\");
}
--></script>

<input id=\"url".$i."\" type=\"hidden\" value=\"http://mabibook.com/tu/". $uploadFile ."\" class=\"linkCode_input\" onclick=\"this.select()\" /><input type=\"button\" value=\"复制地址\" onClick=\"fCopyToClicp('url".$i."')\"><BR><BR></CENTER>",$z1,$z2,$decodePath,rawurlencode($uploadFile));
			print("</td>\n");
			print("</tr>\n");
			print("<tr>\n");
			print("<td bgcolor=\"#F7F7F7\" height=\"50\" style=\"border: 1px solid #CCCCCC\">\n");
			printf("<CENTER>[ <A HREF=\"\">返回目录</A> ]</CENTER>", $decodePath, rawurlencode($uploadFile), $_SERVER['PHP_SELF'], $_POST['path']);
			print("</td>\n");
			print("</tr>\n");
			print("</tbody>\n");
			print("</table>\n");
			print("</center>\n");
		}
	}

	/*
	+----------------------------------+
	| upload more image
	+----------------------------------+
	| C / M : 2004-4-5 / --
	+----------------------------------+
	*/

	function uploadMore()
	{
		
	}

	/*
	+----------------------------------+
	| Decode
	+----------------------------------+
	| C / M : 2003-12-30 / --
	+----------------------------------+
	*/

	function decode($str)
	{
		$str = rawurldecode($str);
		$str = base64_decode($str);

		$this->c = true;

		return $str;
	}

	function c()
	{

	}

	/*
	+----------------------------------+
	| Show if config wanted password
	+----------------------------------+
	| C / M : 2003-12-29 / --
	+----------------------------------+
	*/

	function showWantPass()
	{
		if ($this->configWantedPass == true OR $_GET['action'] == 'login' OR $_GET['action'] == 'loginout' OR $_POST['login'] == 'login')
		{	
			$session = & $_SESSION;

			if ($_GET['action'] == 'loginout')
			{
				if (!$session['neatpicLogined'])
				{	
					if ($_POST['password'] == $this->configAdminPass AND $this->configAdminPass != "neatpic") $session['neatpicLogined'] = true;
				}
				else
				{
					$session['neatpicLogined'] = "";
				}
				
				($_POST['path']) ? $path = $_POST['path'] : $path = $_GET['path'];
				header("location:".$_SERVER['PHP_SELF']."?path=" . rawurlencode($path));
				exit;
			}

			if (!$session['neatpicLogined'])
			{				
				
				$this->timer();
				$this->showTitle();
				$this->showCSS();
				$this->showLogin();
				$this->usedTime();
				$this->showConfigState();

				exit;
			}
		}
	}

	/*
	+----------------------------------+
	| config dir password
	+----------------------------------+
	| C / M : 2004-3-27 / -- --
	+----------------------------------+
	*/

	function configDirPass()
	{
		
	}

	/*
	+----------------------------------+
	| Dir password checking
	+----------------------------------+
	| C / M : 2004-3-27 / -- --
	+----------------------------------+
	*/

	function checkingDirPass()
	{
		if ($_GET['action'] == 'checkdirpass')
		{
			$session = & $_SESSION;

			$password = file(rawurldecode($_POST['path']) . "/" . $this->configDirPasswordFile);
			list(, $password) = explode('|', chop($password[0]));

			if ($password == md5($_POST['password']))
				$session[$_POST['path']] = md5($password);

			header("location:".$_SERVER['PHP_SELF']."?path=" . $_POST['path']);

		}
	}

	/*
	+----------------------------------+
	| Check dir password
	+----------------------------------+
	| C / M : 2004-3-27 / -- --
	+----------------------------------+
	*/

	function checkDirPass()
	{
		$this->checkingDirPass();
		
		$session = & $_SESSION;
		
		if (file_exists($this->path . "/" . $this->configDirPasswordFile))
		{
			if (!$session[rawurlencode($this->path)] AND !$session['neatpicLogined'])
				$this->showDirPassLogin();
		}
	}

	/*
	+----------------------------------+
	| Show dir Pass login window
	+----------------------------------+
	| C / M : 2004-3-27 / -- --
	+----------------------------------+
	*/

	function showDirPassLogin()
	{
	
	}

	/*
	+----------------------------------+
	| Show error
	+----------------------------------+
	| C / M : 2004-3-27 / -- --
	+----------------------------------+
	*/
	function error($msg)
	{
		echo "<script language=javascript>";
		echo "window.alert('$msg');";
		echo "history.go(-1);";
		echo "</script>";
		exit;
	}

	/*
	+----------------------------------+
	| Show Help file
	+----------------------------------+
	| C / M : 2004-4-9 / 2004-4-12
	+----------------------------------+
	*/
	function showHelp()
	{
		
	}

	/*
	+----------------------------------+
	| Execute Class
	+----------------------------------+
	| C / M : 2003-12-28 / 2003-12-29
	+----------------------------------+
	*/

	function execute()
	{
		$this->showWantPass();
		$this->configDirPass();
		$this->showHelp();
		$this->uploadMore();
		$this->delFile();
		$this->showUpload();
		$this->gzip();
		$this->timer();
		$this->getVars();
		$this->checkError();
		$this->checkDirPass();
		$this->showTitle();
		$this->showCSS();
		$this->ShowJS();
		$this->pathArrayInitialize();
		$this->makeOverdirect();
		$this->makeDirList();
		$this->getEachArrayNum();
		$this->makeOptionList();
		$this->makePageBar();
		$this->showState();
		$this->showDirList();
		$this->showAdmincp();
		$this->showPageBar();
		$this->showPicList();

		$this->showDirList();
		$this->usedTime();
		$this->showConfigState();
		$this->c();
	}
}

/*
+----------------------------------+
| Main
+----------------------------------+
| C / M : 2003-12-28 / 2003-12-29
+----------------------------------+
*/

error_reporting(0);
session_start();
header("content-Type: text/html; charset=gb2312");

	/*
	+----------------------------------+
	| Create object
	+----------------------------------+
	| C / M : 2003-12-29 / --
	+----------------------------------+
	*/

	$neatpic = new neatpic($configWantedPass, $configAdminPass, $configDirPasswordFile, $configOpenGzip, $configShowPicSize, $configExt, $strLenMax, $configEachPageMax, $configEachLineMax, $configTDHeight, $configTDWidth, $configPageMax, $configTilte, $configVer);

	/*
	+----------------------------------+
	| Execute class
	+----------------------------------+
	| C / M : 2003-12-30 / --
	+----------------------------------+
	*/

	$neatpic->execute();

?>

<table align=center>&nbsp;&nbsp;<a href="http://mabibook.com/bbs/viewthread.php?tid=586" target=_blank>涂鸦图片右键保存到 我的文档->洛奇->涂鸦聊天目录，重起洛奇可点使用，分享游戏里的图鸦，教程按这里</a></DIV>
                                          </table>