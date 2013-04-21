<?php
/*
 * Creation Log
* File Name - EngineView.php
* Description - Designing templates using this master
* Version - 1.0
* Created by - Anirudh Pandita
* Created on - April 15, 2013
*****************************************************************
*/
?>
<div id="result">
<form id="resultForm" action="index.php?controller=Controller&method=onGenerateFileClick" method="post">
	<textarea rows="25" cols="80">
	<?php echo $classContent;?>
	</textarea>
</form>
</div>