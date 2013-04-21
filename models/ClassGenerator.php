<?php
class ClassGenerator
{
	/**
	 * @var Stores the list of tables in current database
	 */
	private $_tableNames;
	
	/**
	 * @var Stores all the fields of a table, and each field contains 
	 * information about it
	 */
	private $_fieldsArray;
	protected static $conn;
	private $_contentString;
	
	/**
	 * @return the $_contentString
	 */
	public function getContentString()
	{
		return $this->_contentString;
	}

	/**
	 * @param field_type $_contentString
	 */
	public function setContentString($_contentString)
	{
		$this->_contentString = $_contentString;
	}

	/**
	 * @return the $_fieldsArray
	 */
	public function getFieldsArray()
	{
		return $this->_fieldsArray;
	}

	/**
	 * @param field_type $_fieldsArray
	 */
	public function setFieldsArray($_fieldsArray)
	{
		$this->_fieldsArray = $_fieldsArray;
	}

	/**
	 * @return the $_tableNames
	 */
	public function getTableNames()
	{
		return $this->_tableNames;
	}

	/**
	 * @param field_type $_tableNames
	 */
	public function setTableNames($_tableNames)
	{
		$this->_tableNames = $_tableNames;
	}
	
	public function __construct() {
	
		self::$conn=DBConnection::Connect ();
	}
	
	/**
	 *Fetches table names to be shown for which class is to be generated
	 */
	public function fetchTableNames()
	{
		$sql="show tables";
		$q=self::$conn->prepare($sql);
		$bool=$q->execute();
		$this->setTableNames($q->fetchAll(PDO::FETCH_ASSOC));
		return $bool;	
	}
	
	/**
	 * @param $tableName provided by user for which class has to be generated
	 * @return boolean if 
	 */
	public function generateClass($tableName)
	{		
		$elements='';
		$contents="class ".ucfirst($tableName).PHP_EOL."{".PHP_EOL;
		$bool = $this->fetchAllFieldsInfo ( $tableName );		
		$elements.=$this->generateElement();
		$contents.=$elements.PHP_EOL."}";
		
		$this->setContentString($contents);		
	}
	
	/**
	 * @param tableName
	 */private function fetchAllFieldsInfo($tableName)
	{
		$sql="desc $tableName";
		$q=self::$conn->prepare($sql);
		$bool=$q->execute();
		$this->setFieldsArray($q->fetchAll(PDO::FETCH_ASSOC));
		return $bool;
	}

	
	public function generateElement()
	{		
		$allElementsString='';
		foreach($this->getFieldsArray() as $key=>$field) {
				$object= new Element();
				$object->createElement($field);
				$allElementsString.=$object->__toString().PHP_EOL;
		}
		return $allElementsString;	
	}

	
	
}

?>