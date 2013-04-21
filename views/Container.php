<?php
/*
 * Creation Log 
 * File Name - Container.php 
 * Description -  
 * Version - 1.0 
 * Created by - Anirudh Pandita 
 * Created on - April 17, 2013
*****************************************************************
*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Use Template</title>
<script type="text/javascript" src="<?php echo SITE_URL;?>/assets/js/jquery/jquery.js"> </script>

<link type="text/css" rel="stylesheet"	href="<?php echo SITE_URL;?>/assets/style/EngineView.css">

<script type="text/javascript"	src="<?php echo SITE_URL;?>/assets/js/TemplateView.js"> </script>

</head>

<body>
<div id="main">

<div id="head">
<a href="<?php echo SITE_URL; ?>/index.php">Home</a><br>			
		</div>
			<div id="pageHead"><h2>Generate Class files using tables present</h2></div>
			<form id="frm" name="frm" action="index.php?controller=Controller&method=onTableSubmit" method="post" >
			<div id="selectTable">
			Choose table 
			<select name="tableName">
			<?php if(isset($tableList)) {?>
				<?php foreach ($tableList as $key=>$value) {?>
				<option value =<?php echo $value["Tables_in_ulearndb"];?>> 
				<?php echo $value["Tables_in_ulearndb"];?>
				</option>
				<?php }?>
			<?php } else {?>
			<option> No data</option>
			<?php }?>
		</select>
	</div>
	<input type="submit" value="Generate class file"> 
	</form>
		<?php if(isset($pageName)) {
			
				switch ($pageName) {
				case "MainPage":
				require_once SITE_PATH. '/views/MainView.php';
				break;
				case "ResultPage":
				require_once SITE_PATH. '/views/Result.php';
				break;
				default :
					
				}				
		}?>
		</div>
		
</body>
</html>