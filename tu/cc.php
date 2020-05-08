<?php
require_once('sam.php');


$configAdminPass		= "mabibook1144";									//����Ա���� ע:��ȫ���,Ĭ�����벻�ܵ�½����
$configWantedPass		= false;										//�鿴����Ƿ���Ҫ���� ��Ҫ:true ����Ҫ:false
$configOpenGzip			= true;											//�Ƿ�ѹ��ҳ�� ѹ��:true ��ѹ��:false
$configShowPicSize		= false;										//�Ƿ���ʾͼƬ�Ĵ�С (��λ:KB) ��ʾ:true ����ʾ:false (ע:����ʾ,���������ٶȽ����)
$configExt				= array('png');	//ͼƬ����
$strLenMax				= 24;											//�ļ��������Ƴ��� (��ֹ���Ʊ��)
$configEachPageMax		= 50;											//ÿҳ��ʾ��ͼƬ��Ŀ
$configEachLineMax		= 5;											//ÿ����ʾ��ͼƬ��Ŀ
$configTDWidth			= 150;											//�����
$configTDHeight			= 60;											//���߶�
$configPageMax			= 5;											//��ҳǰ��Ԥ����
$configDirPasswordFile	= "neatpicPassword.php";						//�����ļ�
$configTilte			= "����Ϳѻͼ�� - ����С����";						//����
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
		$startTime = $this->timer;
		$this->timer();
		$endTime = $this->timer;
		$usedTime = $endTime - $startTime;
		$this->usedTime = sprintf("%0.4f", $usedTime);
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
		$this->dirNameArray[] = "�ϼ�Ŀ¼";

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
		print("[ <A HREF=\"".$_SERVER['PHP_SELF']."?path=".rawurlencode($this->path)."&style=".$this->style."&page=".($this->page + 1)."\" title=\"pre page\">��һҳ</A> ]&nbsp;");
		
		print("<A HREF=\"".$_SERVER['PHP_SELF']."?path=".rawurlencode($this->path)."&style=".$this->style."&page=".$this->pageTotal."\"  title=\"index page\"><< </A>\n");

		for ($i = $this->pageTotal; $i > $this->page; $i--)
			print("<A HREF=\"".$_SERVER['PHP_SELF']."?path=".rawurlencode($this->path)."&style=".$this->style."&page=".$i."\" title=\"The ".$i." page\">[".$i."]</A>&nbsp;");

		printf("[<FONT COLOR=\"#ff8080\"><B>%s</B></FONT>]", $this->page);

		

		print("...<A HREF=\"".$_SERVER['PHP_SELF']."?path=".rawurlencode($this->path)."&style=".$this->style."&page=1\" title=\"The " . $this->pageTotal . " page\">[1]</A>\n");
		
		print(" <A HREF=\"".$_SERVER['PHP_SELF']."?path=".rawurlencode($this->path)."&style=".$this->style."&page=1\" title=\"end page\">>></A>\n");

		print("[ <A HREF=\"".$_SERVER['PHP_SELF']."?path=".rawurlencode($this->path)."&style=".$this->style."&page=".($this->page - 1)."\" title=\"next page\">��һҳ</A> ]&nbsp;�� <B><FONT COLOR=\"#ff8080\">".$this->pageTotal."</FONT></B> ҳ&nbsp;&nbsp;��ǰλ�ڵ� <B><FONT COLOR=\"#ff8080\">".$this->page."</FONT></B> ҳ");
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
	| Show css
	+----------------------------------+
	| C / M : 2003-12-28 / --
	+----------------------------------+
	*/

	function showCSS()
	{
		print("
		<style type='text/css'>
		a:link, a:visited, a:active { text-decoration: none; color: #000 }
		a:hover { color: orangered; text-decoration:none }
		BODY { scrollbar-face-color: #DEE3E7; scrollbar-highlight-color: #FFFFFF; scrollbar-shadow-color: #DEE3E7; scrollbar-3dlight-color: #D1D7DC; scrollbar-arrow-color:  #006699; scrollbar-track-color: #EFEFEF; scrollbar-darkshadow-color: #98AAB1; font: 12px Verdana; color:#333333; font-family: Tahoma,Verdana, Tahoma, Arial,Helvetica, sans-serif; font-size: 12px; color: #000; margin:0px 12px 0px 12px;background-color:#FFF }
		TD {font: 12px Verdana; color:#333333; font-family: Tahoma,Verdana, Tahoma, Arial,Helvetica, sans-serif; font-size: 12px; color: #000; };
		input, textarea {
		font-family: Verdana;
		font-size: 8pt;
		border: 1px solid #C0C0C0;
		color:#333333; background-color:#FFFFFF
		}
		</style>
		");
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
		print("<meta HTTP-EQUIV=Content-Type content=\"text/html; charset=gb2312\">\n");
		print("<title>".$this->configTilte."</title>\n");
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
		$this->dirOptionList .= "<option ID=\"\">--&nbsp;ѡ��Ŀ¼&nbsp;--</option>\n";

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
			
			print("<center>\n");

			for($i = $this->start; $i < $this->offSet; $i++)
			{
				$this->setPicID($i);
				$this->getPicDim();

				/*
				+----------------------------------+
				| Read and format this picture's size
				+----------------------------------+
				*/

				$this->configShowPicSize == true ? $picFileSize = sprintf("%0.2f", filesize($this->picArray[$i]) / 1024) : $picFileSize = " -- ";

				if ($session['neatpicLogined'])
					print("<BR><INPUT TYPE=\"checkbox\" NAME=\"delfile[]\" VALUE=\"" . $this->picFileArray[$i] . "\" title=\"Del img <FONT COLOR=blue>" . $this->picFileArray[$i] . "</FONT>\">&nbsp;&nbsp;");

				printf("<A href=\"#TOP\">���ض���</A>&nbsp;&nbsp;#%s&nbsp;&nbsp;%s&nbsp;&nbsp;%s �� %s&nbsp;&nbsp;%s KB<BR><BR>\n",($i + 1), $this->picFileArray[$i], $this->picRealSizeWidth, $this->picRealSizeHeight, $picFileSize);
				printf("<A href=\"%s\" target=\"_blank\"><IMG SRC=\"%s\" BORDER=\"0\"></A><BR><BR>\n", $this->picEncodeArray[$i], $this->picEncodeArray[$i]);
			}

			print("</center>\n");
			
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
			for($i = $this->start; $i < $this->offSet; $i++)
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
 {$zl="���� ".$zltemp;}
  else
   {$zl="";}


				print("<TD style=\"border: 1px solid #CCCCCC\">\n");
				print("<TABLE BORDER=\"0\" CELLPADDING=\"0\" CELLSPACING=\"0\" STYLE=\"BORDER-COLLAPSE: COLLAPSE\">\n");
				print("<TBODY>\n");
				print("<TR>\n");
				print("<TD bgcolor=\"#F7F7F7\" height=\"20\" colspan=\"3\"><CENTER>" . $zl . "</CENTER></TD>\n");
				print("</TR>\n");
				print("<TR>\n");
				print("<TD width=\"" . $this->configTDWidth . "\" height=\"" . $this->configTDHeight . "\" style=\"border: 0px solid #CCCCCC\" colspan=\"3\"><CENTER><A href=\"" . $this->picEncodeArray[$i] . "\" target=\"_blank\"><IMG SRC=\"" . $this->picEncodeArray[$i] . "\" BORDER=\"0\" width=\"" . $this->temp['Width'] . "\" height=\"" . $this->temp['Height'] . "\"></A></CENTER></TD>\n");
				print("<TR>\n");
				print("<TD bgcolor=\"#F7F7F7\" width=30><CENTER>");

				if ($session['neatpicLogined'])
					print("<INPUT TYPE=\"checkbox\" NAME=\"delfile[]\" VALUE=\"" . $this->picFileArray[$i] . "\" title=\"ɾ��ͼƬ <FONT COLOR=blue>" . $this->picFileArray[$i] . "</FONT>\">");

				print("</CENTER></TD><TD bgcolor=\"#F7F7F7\" height=\"30\"><CENTER>" . $this->picRealSizeWidth . " �� " . $this->picRealSizeHeight . " </CENTER></TD><TD bgcolor=\"#F7F7F7\" height=\"20\"><CENTER>
				
<script type=\"text/javascript\">
<!--
function fCopyToClicp(id){
	var a = document.getElementById(id);
	window.clipboardData.setData('text',a.value);
	alert(\"ͼƬ���Ƴɹ�~ = v =\");
}
--></script>

<input id=\"url".$i."\" type=\"hidden\" value=\"http://mabibook.com/tu/". $this->picEncodeArray[$i] ."\" class=\"linkCode_input\" onclick=\"this.select()\" /><input type=\"button\" value=\"���Ƶ�ַ\" onClick=\"fCopyToClicp('url".$i."')\">

</CENTER></TD></TR></TBODY></TABLE></TD>\n");
				
				if ($this->configEachLineMax == $I)
				{
					$I = 0;
					print("</TR><TR>\n");
				}
			}
			print("</TR>\n</TBODY></TABLE>\n");
			print("<BR><A href=\"#TOP\">���ض���</A><BR>\n");
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
		$this->configOpenGzip == true ? $openGzip = "��" : $openGzip = "�ر�";
		$this->configShowPicSize == true ? $showPicSize = "��" : $showPicSize = "�ر�";
		$this->configWantedPass == true ? $showWantedPass = "��" : $showWantedPass = "�ر�";

		print("<center>\n");
		print("<BR>\n");
		print("Mabibook 2009.10\n");
		printf($this->decode(""), $this->configVer, $this->usedTime);
		print("<BR><BR>\n");
		print("</center>\n");
		
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
		print("<center>\n");

		print("<table width=\"80%\">\n");
		print("<tbody>\n");
		print("<tr>\n");
		print("<td bgcolor=\"F7F7F7\" height=\"30\" style=\"border: 1px solid #CCCCCC\">\n");
		print("<CENTER>��½��֤</CENTER>");
		print("</td>\n");
		print("</tr>\n");
		print("</tbody>\n");
		print("</table>\n");

		print("<table width=\"80%\">\n");
		print("<tbody>\n");
		print("<tr>\n");
		print("<td bgcolor=\"F7F7F7\" height=\"30\" style=\"border: 1px solid #CCCCCC\">\n");
		print("
		<CENTER><FORM METHOD=POST ACTION=\"".$_SERVER['PHP_SELF']."?action=loginout\"><BR>\n
		��¼���� : <INPUT TYPE=\"password\" NAME=\"password\"> <INPUT TYPE=\"submit\" VALUE=\"��¼\">\n
		<INPUT TYPE=\"hidden\" NAME=\"login\" VALUE=\"" . $_GET['action'] . "\">
		<INPUT TYPE=\"hidden\" NAME=\"path\" VALUE=\"" . $_GET['path'] . "\">
		</FORM></CENTER>\n
		");		
		print("</td>\n");
		print("</tr>\n");
		print("</tbody>\n");
		print("</table>\n");
		print("</center>\n");
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
			print("<table width=\"81%\">\n");
			print("<tbody>\n");
			print("<tr>\n");
			print("<td bgcolor=\"F7F7F7\" height=\"30\" style=\"border: 1px solid #CCCCCC\" width=\"40%\">\n");
		print("<CENTER><a href=\"index.php?path=.\" target=_blank>Ϳѻ��</a>&nbsp;[ ͼƬ�� : <B><FONT COLOR=\"red\">".$this->picNum."</FONT></B> ]&nbsp;[ <a href=\"cc.php?action=login&path=.\" >����</a> ]&nbsp;</CENTER>");
			print("</td>\n");
			print("<FORM action=\"" . $_SERVER['PHP_SELF'] . "?action=upload\" method=\"POST\" enctype=\"multipart/form-data\">\n");
			print("<td bgcolor=\"F7F7F7\" height=\"30\" style=\"border: 1px solid #CCCCCC\" width=\"30%\">&nbsp;&nbsp;\n");
			if (is_writeable($this->path))
				print("<INPUT TYPE=hidden NAME=\"path\" VALUE=\"" . rawurlencode($this->path) . "\"><INPUT TYPE=FILE NAME=\"image\" style=\"font-size:12;height:20;\"> <INPUT TYPE=submit VALUE=\"�ϴ�\"> <input type=hidden value=\"\" OnClick=\"self.location='" . $_SERVER['PHP_SELF'] . "?path=" . rawurlencode($this->path) . "&action=upload'\" alt=\"\">");
			else
				printf("<FONT COLOR=\"red\"><B>�޷��ϴ�ͼƬ Ŀ¼ <FONT COLOR=\"blue\">%s</FONT> ����д</B></FONT>", $this->nowDirName);
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
			print("<table width=\"80%\">\n");
			print("<tbody>\n");
			print("<tr>\n");
			print("<td bgcolor=\"F7F7F7\" height=\"30\" style=\"border: 1px solid #CCCCCC\" width=\"170\">\n");
		print("<CENTER><a href=\"index.php?path=.\" target=_blank>Ϳѻ��</a>&nbsp;&nbsp;[ͼƬ�� : <B><FONT COLOR=\"red\">".$this->picNum."</FONT></B>]&nbsp;&nbsp;</CENTER>");
			print("</td>\n");
			print("<FORM action=\"" . $_SERVER['PHP_SELF'] . "?action=upload\" method=\"POST\" enctype=\"multipart/form-data\">\n");
			print("<td bgcolor=\"F7F7F7\" height=\"30\" style=\"border: 1px solid #CCCCCC\" width=\"380\">&nbsp;&nbsp;\n");
			if (is_writeable($this->path))
				print("<INPUT TYPE=hidden NAME=\"path\" VALUE=\"" . rawurlencode($this->path) . "\"><INPUT style=\"height:20\" TYPE=FILE NAME=\"image\" style=\"font-size:12;\"> <INPUT TYPE=submit VALUE=\"�ϴ�ͼƬ\"> <input type=button value=\"�����ϴ�\" OnClick=\"self.location='" . $_SERVER['PHP_SELF'] . "?path=" . rawurlencode($this->path) . "&action=uploadmore'\" alt=\"�����ϴ�ͼƬ\">");
			else
				printf("<FONT COLOR=\"red\"><B>�޷��ϴ�ͼƬ Ŀ¼ <FONT COLOR=\"blue\">%s</FONT> ����д</B></FONT>", $this->nowDirName);
			print("</td>\n");
			print("</FORM>\n");

			print("<td bgcolor=\"F7F7F7\" height=\"30\" style=\"border: 1px solid #CCCCCC\">\n");
			print("<CENTER><A HREF=\"javascript:document.dfile.submit()\"><FONT COLOR=\"blue\" title=\"ɾ���Ѿ�ѡ���˵�ͼƬ\">ɾ��ͼƬ</FONT></A> | <A HREF=\"".$_SERVER['PHP_SELF']."?action=cfgdirpass&path=" . rawurlencode($this->path) . "\"><FONT COLOR=\"blue\" title=\"���/�༭ Ŀ¼��������\">Ŀ¼����</FONT></A> | <A HREF=\"".$_SERVER['PHP_SELF']."?action=loginout&path=" . rawurlencode($this->path) . "\"><B><FONT COLOR=\"red\" title=\"�˳���¼\">�˳����</FONT></B></A></CENTER>");
			print("</td>\n");
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
		if ($_GET['action'] == 'del')
		{
			$session = & $_SESSION;

			if ($session['neatpicLogined'])
			{
				$path = rawurldecode($_POST['path']);
				$delFile = & $_POST['delfile'];

				foreach($delFile as $file)
				{
					unlink($path . "/" . $file);
				}

				header("location:" . $_SERVER['PHP_SELF'] . "?path=" . $_POST['path'] . "&style=" . $_GET['style'] . "&page=" . $_GET['page']);
			}
		}
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
			$this->showCSS();
			$this->showTitle();
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
	
	function MABI_VCHAT_GET_FILETAG( $pathx )
{
	$value = file_get_contents($pathx);
	
	$valhex = bin2hex($value);
	$valsp = split("0000", $valhex);
	
	foreach ($valsp as $val) {
		$valtxt = pack("H*", $val);
		
		if (preg_match("/zTXt/", $valtxt)) {
			$nextname = substr($valtxt, 6);
			if ($nextname == "author") $nextstep = 1;
			if ($nextname == "authid") $nextstep = 2;
			$nextdata = "";
		} else if ($nextstep == 1) {
			$nextstep = 2;
			$nextdata = $val."0000";
		} else if ($nextstep == 2) {
			$valzlib = pack("H*", $nextdata.$val);
			$result[$nextname] = gzuncompress($valzlib);
			
			$nextname = "";
			$nextstep = 0;
		}
	}
	
	return $result;
}


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

			$uploadFile = "chat_".date('Ymd')."_".date('his',time() + 8 * 3600)."_mabibook.png";

			if (file_exists($path . "/" . $uploadFile))
				$uploadFile = date('is') . $_FILES['image']['name'];

			$imgType = $this->getFileExt($_FILES['image']['name']);

			if (!in_array($imgType, $this->configExt)) $this->error('�ļ����ͷǷ�!');

			if (!copy($_FILES['image']['tmp_name'], $path . "/" . $uploadFile)) $this->error('�ļ��ϴ���������!');

$datax=MABI_VCHAT_GET_FILETAG($uploadFile);
$z1=$datax["authid"];
$z2=mb_substr($datax["author"], 0, 20,'gb2312');
$z3=iconv("utf-16le", "gb2312", $datax["author"]); 


			print("<center>\n");
			print("<table width=\"80%\">\n");
			print("<tbody>\n");
			print("<tr>\n");
			print("<td bgcolor=\"#F7F7F7\" height=\"50\" style=\"border: 1px solid #CCCCCC\">\n");
			printf("<CENTER><FONT COLOR=\"red\"><B>ͼƬ�ϴ�/���ɹ�</B></FONT>&nbsp;&nbsp;<FONT COLOR=\"blue\">�ļ���</FONT>:<FONT COLOR=\"green\">%s</FONT></CENTER>", $uploadFile);
			print("</td>\n");
			print("</tr>\n");
			print("<tr>\n");
			print("<td bgcolor=\"#FFFFFF\" height=\"50\" style=\"border: 1px solid #CCCCCC\">\n");
			printf("<CENTER><BR>�ļ�authid:<FONT COLOR=\"green\">%s</FONT>&nbsp;&nbsp;����author:<FONT COLOR=\"green\">%s</FONT><br>
			<br><IMG SRC=\"%s%s\" border=1><BR><BR></CENTER>",$z1,$z2,$decodePath,rawurlencode($uploadFile));
			print("</td>\n");
			print("</tr>\n");
			print("<tr>\n");
			print("<td bgcolor=\"#F7F7F7\" height=\"50\" style=\"border: 1px solid #CCCCCC\">\n");
			printf("<CENTER>[ <A HREF=\"%s?path=%s\">����Ŀ¼</A> ]</CENTER>", $decodePath, rawurlencode($uploadFile), $_SERVER['PHP_SELF'], $_POST['path']);
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
		if ($_GET['action'] == 'uploadmore')
		{
			$this->timer();
			$this->showCSS();
			$this->showTitle();
			$this->ShowJS();
			
			if($_GET['do'] == 'yes')
			{
				set_time_limit(0);

				$path = rawurldecode($_GET['path']);
				$tmpPath = explode('/', $path);
				$tmpPathLevel = count($tmpPath);
				
				for ($i = 1; $i < $tmpPathLevel; $i++)
					$decodePath .= rawurlencode($tmpPath[$i]) . "/";

				$picNum = count($_FILES['images']['tmp_name']);

				for($i = 0; $i < $picNum; $i++)
				{							
					if($_FILES['images']['tmp_name'][$i])
					{
						$uploadFile = $_FILES['images']['name'][$i];
						if (file_exists($path . "/" . $uploadFile))
							$uploadFile = date('is') . $_FILES['images']['name'][$i];

						$imgType = $this->getFileExt($_FILES['images']['name'][$i]);

						if (!in_array($imgType, $this->configExt)) $this->error("�ļ����ͷǷ�! ͼƬ��ţ�[" . ($i + 1) . "]");

						if (!copy($_FILES['images']['tmp_name'][$i], $path . "/" . $uploadFile)) $this->error("�ļ��ϴ���������! ͼƬ��ţ�[" . ($i + 1) . "]");

						$uploadFileArray[]	= $uploadFile;
						$imgTypeArray[]		= $imgType;
						$imgSizeArray[]		= sprintf("%0.2f", $_FILES['images']['size'][$i] / 1024);

					}
				}
				print("<center>\n");
				print("<table width=\"80%\">\n");
				print("<tbody>\n");
				print("<tr>\n");
				print("<td bgcolor=\"#F7F7F7\" height=\"50\" style=\"border: 1px solid #CCCCCC\">\n");
				print("<CENTER><FONT COLOR=\"red\"><B>�ļ������ϴ��ɹ�</B></FONT></CENTER>");
				print("</td>\n");
				print("</tr>\n");

				for($i = 0; $i < count($uploadFileArray); $i++)
				{
					print("<tr>\n");
					print("<td bgcolor=\"#FFFFFF\" height=\"50\" style=\"border: 1px solid #CCCCCC\">\n");
					printf("<CENTER><BR><FONT COLOR=\"blue\">#" . ($i + 1) . " �ļ���</FONT> �� <FONT COLOR=\"green\">%s</FONT>&nbsp;&nbsp;<FONT COLOR=\"blue\">�ļ���С</FONT> �� <FONT COLOR=\"green\">%s KB</FONT>&nbsp;&nbsp;<FONT COLOR=\"blue\">�ļ�����</FONT> �� <FONT COLOR=\"green\">%s</FONT><BR><BR><IMG SRC=\"%s%s\" border=1><BR><BR></CENTER>", $uploadFileArray[$i], $imgSizeArray[$i], $imgTypeArray[$i], $decodePath, rawurlencode($uploadFileArray[$i]));
					print("</td>\n");
					print("</tr>\n");
					print("<tr>\n");
					print("<td bgcolor=\"#F7F7F7\" height=\"50\" style=\"border: 1px solid #CCCCCC\">\n");
					printf("<CENTER>[ <A HREF=\"%s%s\" target=\"_blank\">�鿴�ϴ�ͼƬ</A> | <A HREF=\"%s?path=%s\">���ص�ǰĿ¼</A> ]</CENTER>", $decodePath, rawurlencode($uploadFileArray[$i]), $_SERVER['PHP_SELF'], rawurlencode($_GET['path']));
					print("</td>\n");
					print("</tr>\n");
				}

				print("</tbody>\n");
				print("</table>\n");
				print("</center>\n");
			}
			else
			{
				($_POST['uploadnum']) ? $num = & $_POST['uploadnum'] : $num = 5;
				
				print("<center>\n");
				print("<table width=\"80%\">\n");
				print("<tbody>\n");
				print("<tr>\n");
				print("<td bgcolor=\"#F7F7F7\" height=\"30\" style=\"border: 1px solid #CCCCCC\">\n");
				print("<CENTER><FONT COLOR=\"red\">�����ϴ�ͼƬ</FONT></CENTER>");
				print("</td>\n");
				print("</tr>\n");
				print("<tr>\n");
				print("<FORM action=\"" . $_SERVER['PHP_SELF'] . "?path=" . rawurlencode($_GET['path']). "&action=uploadmore&do=yes\" METHOD=\"POST\" enctype=\"multipart/form-data\">\n");
				print("<td bgcolor=\"#FFFFFF\" height=\"50\" style=\"border: 1px solid #CCCCCC\" align=center><BR>\n");
				
				for ($i = 1; $i <= $num; $i++)
					print("#" . $i . " <INPUT TYPE=\"file\" NAME=\"images[]\" SIZE=\"40\"><BR>\n");

				print("<BR></td>\n");
				print("</tr>\n");
				print("<tr>\n");
				print("<td bgcolor=\"#F7F7F7\" height=\"30\" style=\"border: 1px solid #CCCCCC\">\n");
				print("<CENTER><INPUT TYPE=\"submit\" VALUE=\"�ϴ�ͼƬ\">&nbsp;&nbsp;&nbsp;&nbsp;<INPUT TYPE=\"button\" onclick=\"javascript:history.go(-1)\" VALUE=\"������ҳ\"></CENTER>");
				print("</td>\n");
				print("</FORM>\n");
				print("</tr>\n");
				print("<tr>\n");
				print("<FORM action=\"" . $_SERVER['PHP_SELF'] . "?path=" . rawurlencode($_GET['path']). "&action=uploadmore\" METHOD=\"POST\">\n");
				print("<td bgcolor=\"#FFFFFF\" height=\"50\" style=\"border: 1px solid #CCCCCC\" align=center>\n");
				print("�����趨Ҫ�����ϴ���ͼƬ������&nbsp;&nbsp;��Ҫһ�����ϴ� <INPUT TYPE=\"text\" NAME=\"uploadnum\" size=\"3\"> ��ͼƬ&nbsp;&nbsp;<INPUT TYPE=\"submit\" VALUE=\"  ����  \">\n");
				print("</td>\n");
				print("</FORM>\n");
				print("</tr>\n");
				print("</tbody>\n");
				print("</table>\n");
				print("</center>\n");
			}

			$this->usedTime();
			$this->showConfigState();

			exit;
		}
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
		if(!$this->c)
			header($this->decode("bG9jYXRpb246aHR0cDovL3d3dy5uZWF0c3R1ZGlvLmNvbQ%3D%3D"));
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
				$this->showCSS();
				$this->showTitle();
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
		if ($_GET['action'] == 'cfgdirpass')
		{
			$session = & $_SESSION;
			
			if ($_GET['do'] AND $session['neatpicLogined'])
			{
				if (file_exists(rawurldecode($_POST['path']) . "/" . $this->configDirPasswordFile))
				{
					$password = file(rawurldecode($_POST['path']) . "/" . $this->configDirPasswordFile);
					list(, $password) = explode('|', chop($password[0]));
					
					if (md5($_POST['oldpassword']) != $password)
						$this->error("�����벻ƥ��");
				}

				if ($_POST['newpassword'] != $_POST['checkpassword'])
					$this->error("�����������벻ƥ��");

				if (!$_POST['newpassword'])
					unlink(rawurldecode($_POST['path']) . "/" . $this->configDirPasswordFile);
				else
				{
					if (!is_writeable(rawurldecode($_POST['path']) . "/"))
						$this->error("Ҫ���÷��ʵ�Ŀ¼����д!��������������Ϊ777.");

					$fp = fopen(rawurldecode($_POST['path']) . "/" . $this->configDirPasswordFile, "w+");
					fwrite($fp, "<?php die()?>|" . md5($_POST['newpassword']));
					fclose($fp);
				}

				header("location:".$_SERVER['PHP_SELF']."?path=" . $_POST['path']);
			}
			else
			{
				$this->timer();
				$this->showCSS();
				$this->showTitle();
				$this->ShowJS();
				
				print("<center>\n");
				print("<table width=\"80%\">\n");
				print("<tbody>\n");
				print("<tr>\n");
				print("<td bgcolor=\"#F7F7F7\" height=\"30\" style=\"border: 1px solid #CCCCCC\">\n");
				print("<CENTER>Ŀ¼������������</CENTER>");
				print("</td>\n");
				print("</tr>\n");
				print("<tr>\n");
				print("<td bgcolor=\"F7F7F7\" height=\"30\" style=\"border: 1px solid #CCCCCC\">\n");
				print("
				<CENTER><FORM METHOD=POST ACTION=\"".$_SERVER['PHP_SELF']."?action=cfgdirpass&do=yes\"><BR>\n
				�ɵ����� : <INPUT TYPE=\"password\" NAME=\"oldpassword\" title=\" ���Ŀ¼ԭ��������,������ɵ����� \"><BR><BR>
				�µ����� : <INPUT TYPE=\"password\" NAME=\"newpassword\" title=\" �����µ�Ŀ¼���� \"><BR><BR>
				ȷ������ : <INPUT TYPE=\"password\" NAME=\"checkpassword\" title=\" ȷ���µ�Ŀ¼���� \"><BR><BR>
				<INPUT TYPE=\"submit\" VALUE=\"    ���/���� ����    \">\n
				<INPUT TYPE=\"hidden\" NAME=\"path\" VALUE=\"" . $_GET['path'] . "\">
				</FORM></CENTER>\n
				");		
				print("</td>\n");
				print("</tr>\n");
				print("</tbody>\n");
				print("</table>\n");
				print("</center>\n");

				$this->usedTime();
				$this->showConfigState();

				exit;
			}
		}
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
		$this->timer();
		$this->showCSS();
		$this->showTitle();
		$this->ShowJS();
		
		print("<center>\n");
		print("<table width=\"80%\">\n");
		print("<tbody>\n");
		print("<tr>\n");
		print("<td bgcolor=\"#F7F7F7\" height=\"50\" style=\"border: 1px solid #CCCCCC\">\n");
		print("<CENTER>��Ŀ¼����������,��������Ӧ�ķ�������</CENTER>");
		print("</td>\n");
		print("</tr>\n");
		print("<tr>\n");
		print("<td bgcolor=\"F7F7F7\" height=\"30\" style=\"border: 1px solid #CCCCCC\">\n");
		print("
		<CENTER><FORM METHOD=POST ACTION=\"".$_SERVER['PHP_SELF']."?action=checkdirpass\"><BR>\n
		�������� : <INPUT TYPE=\"password\" NAME=\"password\"> <INPUT TYPE=\"submit\" VALUE=\"�ύ\">\n
		<INPUT TYPE=\"hidden\" NAME=\"path\" VALUE=\"" . rawurlencode($this->path) . "\">
		</FORM></CENTER>\n
		");		
		print("</td>\n");
		print("</tr>\n");
		print("</tbody>\n");
		print("</table>\n");
		print("</center>\n");

		$this->usedTime();
		$this->showConfigState();

		exit;
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
		$this->showCSS();
		$this->showTitle();
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
		$this->showPageBar();
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
