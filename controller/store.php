<?php 
require_once '../model/Shopping.php';
require_once '../model/ShoppingItem.php';

session_start();

if(isset($_SESSION['timer'])){
	$timestamp = $_SESSION['timer'];
    if((time() - $timestamp) > 86400){
		$buyer_ip = $_SERVER['REMOTE_ADDR'];
		$hash_key = hash('sha512', $_POST["receipt_id"]);
		$entry_at = date('Y-m-d');

		$shopping = shopping_model::add($_POST["amount"],$_POST["buyer"],$_POST["buyer_email"],$buyer_ip,$_POST["receipt_id"],
		 	$_POST["note"],$_POST["city"],$_POST["phone"],$hash_key, $entry_at, $_POST['entry_by']);

		$items = $_POST['items'];

		foreach($items as $item){
			shopping_item_model::add($shopping->id, $item);
		}
		$_SESSION['timer'] = time();
		echo 'success';
	}else{
		echo 'error';
	}
}else{
	$buyer_ip = $_SERVER['REMOTE_ADDR'];
	$hash_key = hash('sha512', $_POST["receipt_id"]);
	$entry_at = date('Y-m-d');

	$shopping = shopping_model::add($_POST["amount"],$_POST["buyer"],$_POST["buyer_email"],$buyer_ip,$_POST["receipt_id"],
	 	$_POST["note"],$_POST["city"],$_POST["phone"],$hash_key, $entry_at, $_POST['entry_by']);

	$items = $_POST['items'];

	foreach($items as $item){
		shopping_item_model::add($shopping->id, $item);
	}
	$_SESSION['timer'] = time();
	echo 'success';
}
?>