<?php 
require_once("include/Function.IncludeFile.php")
?>
<?php
session_start();
?>
<!--
┌─ 深度学习(php) 拼图游戏  ────────────────────┐
│ 
│  感谢你使用 深度学习 排字游戏
│  本代码完全公开和免费，你可以任意复制、传播、修改和使用，
│  但不得公开发表代码 不得用做商业用途，不得向其他使用者收费。 
│
│ 
│  作者：吕海鹏
│                                         2009-6-10
│ 
└──────────────────  www.DeepTeach.com  ───┘
-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>深度学习(php) 拼图游戏</title>

<style type="text/css">
	body{font-size:12px;}
	a.tu{display:block;width:100px;height:100px; text-decoration:none;}

	<?php
	$i=0;
	for ($h=0 ; $h>= -300; $h-= 100){
		for ($l=0 ; $l>= -300 ; $l-= 100){
			$i++;
		echo("#pic" . $i . "{");
			echo("background-image:url(Waterlilies.jpg);");
			echo("background-position:" . $l . "px " . $h . "px;");
		echo("}");
		}
	}
	?>
</style>
</head>
<body>
    <?php echo index_top() ?>

<div align="center">
	<a href="JigsawPuzzle.php">开始新游戏</a>
	<hr />
</div>
<div style="width:900px;">
	 <div style="width:450px;float:left;">
		<img src="Waterlilies.jpg" width="400" height="400" />
	</div>
	 <div style="width:450px;float:left;">

		<?php
		$action=$_GET["action"];	//通过action参数来选择要调用的游戏函数

		if ($action=="" || $action=="start" ){
			start();	//调用 开始函数
		}
		if ($action=="see") {
			see();		//调用 显示函数
		}
		if ($action=="move" ){
			move();		//调用 处理函数
		}
		?>
	</div>
</div>

     <?php echo index_foot() ?>
</body>
</html>
<?php 
//======游戏初始化函数=================================
function start(){
	$shu=0;
	$linshi=0;
	for($h=0;$h<4; $h++){
		for($l=0;$l<4; $l++){
			$ges[$h][$l]=$shu;
			$shu++;
			//echo($ges[$h][$l]);
		}
	}
	
	for($ci=0;$ci<15;$ci++){
		 $h1= mt_rand(0,3);
		 $l1= mt_rand(0,3);

		 $h2= mt_rand(0,3);
		 $l2= mt_rand(0,3);

		 $linshi=$ges[$h1][$l1];
		$ges[$h1][$l1]=$ges[$h2][$l2];
		$ges[$h2][$l2]=$linshi;
	}
	/*
	for($h=0;$h<4; $h++){
		for($l=0;$l<4; $l++){
			echo($ges[$h][$l]);
		}
	}*/

	
	$_SESSION["ges"]=$ges;
	
	//response.Redirect("?action=see")	
	echo("<script type='text/javascript'>location.href='?action=see';</script>");
}

//======游戏界面显示函数=================================
function see(){

	$ges=$_SESSION["ges"];

	for ($h=0;$h<4; $h++){
		for ($l=0 ;$l<4; $l++){
		$kuan =false;
		?>
			 <div style="width:100px;height:100px;float:left;margin:1px;"  onmouseover="this.bgColor='#CCFFFF'" onmouseout="this.bgColor='#ffffff' " id="<?php	
			 if($ges[$h][$l]!=0){ 
			 echo( "pic" . $ges[$h][$l] );
			 }  
			 ?>"  >

				<?php
				if ($ges[$h][$l]!=0) {
					if ($h==0) {
						if ($ges[$h+1][$l]==0){
							$kuan=true;
						}
					}
					if ($h==3){
						if ($ges[$h-1][$l]==0){
							$kuan=true;
						}
					}
					if ($h>0 && $h<3) {
						if ($ges[$h+1][$l]==0){
							$kuan=true;
						}
						if( $ges[$h-1][$l]==0 ){
							$kuan=true;
						}
					}

					if ($l==0){
						if ($ges[$h][$l+1]==0){
							$kuan=true;
						}
					}
					if ($l==3 ){
						if( $ges[$h][$l-1]==0 ){
							$kuan=true;
						}
					}
					if( $l>0 && $l<3 ){
						if ($ges[$h][$l+1]==0 ){
							$kuan=true;
						}
						if ($ges[$h][$l-1]==0) {
							$kuan=true;
						}
					}					
					
					if ($kuan==true ){
				?>
					<a href="?h=<?php echo($h)?>&l=<?php echo($l) ?>&action=move" class="tu">
						<!--<h4><font color="#FFFF00"><%=$ges[$h][$l]%></font></h4>-->					
						&nbsp;&nbsp;
					</a>
				<?php
					}else{
					?>
						<!--<font color="#FFFFff"><%=$ges[$h][$l]%></font>-->
						&nbsp;&nbsp;
					<?php
					}
				}else{
				?>
					&nbsp;
				<?php } ?>
			</div>
		<?php
		}
	}

}
//======游戏处理函数=================================
function move(){
	$ges=$_SESSION["ges"];
	
	 $h=$_GET["h"];
	 $l=$_GET["l"];
	
	/*if ($h>0)  {
		if ($ges[$h-1][$l]==0) {
			$ges[$h-1][$l]=$ges[$h][$l];
			$ges[$h][$l]=0;
		}
	}
	if (h<3) {
		if ($ges[$h+1][$l]==0) {
			$ges[$h+1][$l]=$ges[$h][$l];
			$ges[$h][$l]=0;
		}
	}
	
	if (l>0) {
		if ($ges[$h][$l-1]==0) {
		$ges[$h][$l-1]=$ges[$h][$l];
		$ges[$h][$l]=0;
		}
	}
	
	if (l<3) {
		if ($ges[$h][$l+1]==0) {
			$ges[$h][$l+1]=$ges[$h][$l];
			$ges[$h][$l]=0;
		}
	}*/
	if (($h>0) && ($ges[$h-1][$l]==0))
{
	$ges[$h-1][$l]=$ges[$h][$l];
	$ges[$h][$l]=0;
}
if ($h<3 && $ges[$h+1][$l]==0)
{
	$ges[$h+1][$l]=$ges[$h][$l];
	$ges[$h][$l]=0;
}

if ($l>0 && $ges[$h][$l-1]==0)
{
	$ges[$h][$l-1]=$ges[$h][$l];
	$ges[$h][$l]=0;
}
if ($l<3 && $ges[$h][$l+1]==0)
{
	$ges[$h][$l+1]=$ges[$h][$l];
	$ges[$h][$l]=0;
}
	
	$_SESSION["ges"]=$ges;
	//response.Redirect("?action=see");
	echo("<script type='text/javascript'>location.href='?action=see';</script>");
	}
?>

