<?php 
require_once "../model/Shopping.php";

$from = empty($_POST["from"]) ? null : date("Y-m-d", strtotime($_POST["from"]));
$to = empty($_POST["to"]) ? null : date("Y-m-d", strtotime($_POST["to"]));
$query = isset($_POST["query"]) ? $_POST["query"] : null;

$shoppings = shopping_model::fetchData($from,$to,$query);

//print_r($shoppings[0]->id);
//echo count($shoppings);

$output = "";

 foreach($shoppings as $shopping){
 	
	$itemOutput = "";
	$items = shopping_model::getItems($shopping->id);
    foreach($items as $item){
        $itemOutput .= "<p>".$item."</p>"; 
    }

    $output .= "<tr><td>".$shopping->id."</td><td>".$shopping->amount."</td><td>".$shopping->buyer."</td><td>"
			 	.$shopping->receipt_id."</td><td>".$itemOutput."</td><td>".$shopping->buyer_email."</td><td>"
			 	.$shopping->buyer_ip."</td><td>".$shopping->note."</td><td>".$shopping->city."</td><td>"
			 	.$shopping->phone."</td><td>".date("d M, Y",strtotime($shopping->entry_at))."</td><td>"
			 	.$shopping->entry_by."</td><td>".$shopping->hash_key."</td></tr>";
 }


echo $output;

?>