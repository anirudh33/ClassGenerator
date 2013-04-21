<?php
class Element
{
	/**
	 * @var Can be attribute or function
	 */
	private $_elementName;
	/**
	 * @var unknown
	 */
	private $_elementType;
	/**
	 * @var unknown
	 */
	private $_elementNull;
	/**
	 * @var unknown
	 */
	private $_elementDefault;
	/**
	 * @var unknown
	 */
	private $_elementExtra;
	/**
	 * @var unknown
	 */
	private $_elementComment;
	/**
	 * @var unknown
	 */
	private $_elementGetter;
	/**
	 * @var unknown
	 */
	private $_elementSetter;
	/**
	 * @var unknown
	 */
	private $_indentation="    ";
	
	/**
	 * @return the $_elementComment
	 */
	public function getElementComment()
	{
		return $this->_elementComment;
	}
	
	/**
	 * @return the $_elementGetter
	 */
	public function getElementGetter()
	{
		return $this->_elementGetter;
	}

	/**
	 * @return the $_elementSetter
	 */
	public function getElementSetter()
	{
		return $this->_elementSetter;
	}

	/**
	 * @param field_type $_elementComment
	 */
	public function setElementComment($_elementComment)
	{
		$this->_elementComment = $_elementComment;
	}

	/**
	 * @param field_type $_elementGetter
	 */
	public function setElementGetter($_elementGetter)
	{
		$this->_elementGetter = $_elementGetter;
	}

	/**
	 * @param field_type $_elementSetter
	 */
	public function setElementSetter($_elementSetter)
	{
		$this->_elementSetter = $_elementSetter;
	}
	
	/**
	 * @return the $_elementName
	 */
	public function getElementName()
	{
		return $this->_elementName;
	}

	/**
	 * @return the $_elementType
	 */
	public function getElementType()
	{
		return $this->_elementType;
	}

	/**
	 * @return the $_elementNull
	 */
	public function getElementNull()
	{
		return $this->_elementNull;
	}

	/**
	 * @return the $_elementDefault
	 */
	public function getElementDefault()
	{
		return $this->_elementDefault;
	}

	/**
	 * @return the $_elementExtra
	 */
	public function getElementExtra()
	{
		return $this->_elementExtra;
	}

	/**
	 * @param Can $_elementName
	 */
	public function setElementName($_elementName)
	{
		$this->_elementName = $_elementName;
	}

	/**
	 * @param field_type $_elementType
	 */
	public function setElementType($_elementType)
	{
		$this->_elementType = $_elementType;
	}

	/**
	 * @param field_type $_elementNull
	 */
	public function setElementNull($_elementNull)
	{
		$this->_elementNull = $_elementNull;
	}

	/**
	 * @param field_type $_elementDefault
	 */
	public function setElementDefault($_elementDefault)
	{
		$this->_elementDefault = $_elementDefault;
	}

	/**
	 * @param field_type $_elementExtra
	 */
	public function setElementExtra($_elementExtra)
	{
		$this->_elementExtra = $_elementExtra;
	}
	
	/**
	 * @return the $_indentation
	 */
	public function getIndentation()
	{
		return $this->_indentation;
	}
	
	/**
	 * @param string $_indentation
	 */
	public function setIndentation($_indentation)
	{
		$this->_indentation = $_indentation;
	}

	/**
	 * @param $element : array of various attributes of table field received
	 * Usage: creates a class attribute element using information provided 
	 */
	public function createElement($element) {
		$this->setElementName($element["Field"]);
		$this->setElementType($element["Type"]);
		$this->setElementNull($element["Null"]);
		$this->setElementDefault($element["Default"]);
		$this->setElementExtra($element["Extra"]);
		$this->createComment();
		$this->createGetter();
		$this->createSetter();
		
	}

	/**
	 *Creates comment block for attribute 
	 */
	public function createComment()
	{
		$this->setElementComment( $this->getIndentation()."/**".PHP_EOL.
				$this->getIndentation()." *@var Type:".$this->getElementType().PHP_EOL.
				$this->getIndentation()." */");
	
	}
	
	/**
	 *Creates comment block for getter 
	 */
	public function createGetterComment()
	{
		
	}
	
	/**
	 *Creates comment block fro setter 
	 */
	public function createSetterComment()
	{
		
	}
	
	/**
	 *Creates getter method for given attribute 
	 */
	public function createGetter()
	{
		$this->setElementGetter($this->getIndentation()."public function get".
				lcfirst($this->getElementName())." ()".PHP_EOL.
				$this->getIndentation()."{".PHP_EOL.
				$this->getIndentation().'return $this->_'.$this->getElementName().';'.PHP_EOL.
				$this->getIndentation()."}");
	}
	
	/**
	 *Creates setter method for given attribute 
	 */
	public function createSetter()
	{
		$this->setElementSetter($this->getIndentation()."public function set".
				lcfirst($this->getElementName()).' ($_'.$this->getElementName().')'.PHP_EOL.
				$this->getIndentation().'{'.PHP_EOL.
				$this->getIndentation().'$this->_'.$this->getElementName().
				'= $_'.$this->getElementName().';'.PHP_EOL.
				$this->getIndentation()."}");
	}	

	public function __toString()
	{
		return $this->getElementComment().PHP_EOL.$this->getIndentation().
		'private $_'.$this->getElementName().';'.PHP_EOL.PHP_EOL.
		$this->getElementGetter().PHP_EOL.PHP_EOL.
		$this->getElementSetter();
	}
	
}

?>