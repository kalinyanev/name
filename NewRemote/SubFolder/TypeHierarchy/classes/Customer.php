<?php
include_once 'Person.php';
class Customer extends Person {
	private $custId;
	private $creditType;
	private $cardNum;
	private static $customerId = 1;
	
	/**
	 * @return unknown
	 */
	public static function getPersonCount() {
		return $this->personCount;
	}
	
	/**
	 * @param unknown_type $personCount
	 */
	public static function setPersonCount($personCount) {
		$this->personCount = $personCount;
	}
	
	// constractor
	function __construct($newFirstName, $newLastName, $newAge, $newGender, $newCreditType, $newCardNum) {
		parent::__construct ( $newFirstName, $newLastName, $newAge, $newGender );
		$this->custId = Customer::$customerId;
		$this->setCreditType ( $newCreditType );
		$this->setCardNum ( $newCardNum );
		Customer::$customerId ++;
	}
	//methods
	function getCustId() {
		return $this->custId;
	}
	function setCreditType($newCreditType) {
		if ($newCreditType == "Visa" || $newCreditType == "MasterCard")
			$this->creditType = $newCreditType; else
			$this->creditType = "Only Visa or MasterCard Exepted!";
	}
	function getCreditType() {
		return $this->creditType;
	}
	function setCardNum($newCardNum) {
		if (strlen ( $newCardNum ) == 8)
			$this->cardNum = $newCardNum; else
			$this->cardNum = ("Only 8 digits Card Number!");
	}
	function getCardNum() {
		return $this->cardNum;
	}
	function printData() {
		parent::printData ();
		echo ("<br><b>Custumer Id:</b>" . $this->getCustId () . "<br><b>Card Type:</b>" . $this->getCreditType () . "<br><b>Card No:</b>" . $this->getCardNum ());
	}
} 


