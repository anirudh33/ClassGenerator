<?php
/*
 * Creation Log File Name - Controller.php
 * Description - Controller which handles all the flow 
 * Version - 1.0
 * Created by - Anirudh Pandita
 * Created on - April 15, 2013
 * *****************************************************************
*/
class Controller 
{
	
	/**
	 *Shows main view with list of tables to choose 
	 */
	public function showView() 
	{
		$pageName="MainPage";
		$obj= new ClassGenerator();
		if($obj->fetchTableNames()) {
			$tableList=$obj->getTableNames();
		}
		
		require_once SITE_PATH. '/views/Container.php';
		
	}
	
	/**
	 * Called when user clicks on generate class on
	 */
	public function onTableSubmit() 
	{
		$tableName=$_POST["tableName"];
		$obj= new ClassGenerator();
		$obj->generateClass($tableName);
		$this->showResultView($obj->getContentString());
		//echo $obj->getContentString();
	}
	
	public function showResultView($classContent)
	{

	$obj= new ClassGenerator();
		if($obj->fetchTableNames()) {
			$tableList=$obj->getTableNames();
		}
		$pageName="ResultPage";
		require_once SITE_PATH. '/views/Container.php';
		
	}
	
	
}