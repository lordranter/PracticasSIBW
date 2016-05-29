<?php
class PaymentController{
	function PaymentController(){
		include 'bankAdapter.php';
	}
		
	function pay(){
		$bankAdapter = new BankAdapter();
		$result = false;
		if($bankAdapter->pay()){
			$result = true;
		}
		return $result;
	}
}
?>
