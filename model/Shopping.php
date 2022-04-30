<?php

class shopping_model{
    public $id;
    public $amount;
    public $buyer;
    public $buyer_email;
    public $buyer_ip;
    public $receipt_id;
    public $note;
    public $city;
    public $phone;
    public $hash_key;
    public $entry_at;
    public $entry_by;

    public function __construct($id,$amount,$buyer,$buyer_email,$buyer_ip,$receipt_id,$note,$city,$phone,$hash_key,$entry_at,$entry_by) {
        $this->id = $id;
        $this->amount = $amount;
        $this->buyer = $buyer;
        $this->buyer_email = $buyer_email;
        $this->buyer_ip = $buyer_ip;
        $this->receipt_id = $receipt_id;
        $this->note = $note;
        $this->city = $city;
        $this->phone = $phone;
        $this->hash_key = $hash_key;
        $this->entry_at = $entry_at;
        $this->entry_by = $entry_by;
    }

    public static function all(){
        $list = [];
        $db = Db::getInstance();
        $result = mysqli_query($db,'SELECT * FROM shoppings');

        while($row = mysqli_fetch_assoc($result)){
            $list[] = new shopping_model($row['id'],$row['amount'],$row['buyer'],$row['buyer_email'],$row['buyer_ip'],
                $row['receipt_id'],$row['note'],$row['city'],$row['phone'],$row['hash_key'],$row['entry_at'],
                $row['entry_by']);
        }

        return $list;
    }

    public static function add($amount,$buyer,$buyer_email,$buyer_ip,$receipt_id,$note,$city,$phone,$hash_key,$entry_at,$entry_by) {

        require_once '../db.php';
        $db = Db::getInstance();
        $result = mysqli_query($db,"Insert into shoppings (amount,buyer,buyer_email,buyer_ip,receipt_id,note,city,phone,hash_key,entry_at,entry_by) Values( 
                ('$amount'),('$buyer'),('$buyer_email'),('$buyer_ip'),('$receipt_id'),('$note'),('$city'),('$phone'),
                ('$hash_key'),('$entry_at'),('$entry_by'))");
        $id=mysqli_insert_id($db);
        return new shopping_model($id,$amount,$buyer,$buyer_email,$buyer_ip,$receipt_id,$note,$city,$phone,$hash_key,$entry_at,$entry_by);
    }

    public static function getItems($shopping_id){
        $itemIds = [];
        $items = [];

        $db = Db::getInstance();
        $result = mysqli_query($db,"SELECT * FROM shopping_items where shopping_id = '$shopping_id'");
        while($row = mysqli_fetch_assoc($result)){
            if(isset($row['id'])){
                array_push($itemIds, $row['id']);
            }
        }

        if(count($itemIds) > 0){
            $result = mysqli_query($db,"SELECT * FROM items where id IN (" . implode(',', $itemIds) . ")");
            while($row = mysqli_fetch_assoc($result)){
                array_push($items, $row['name']);
            }
        }

        return $items;
    }

    public static function fetchData($from,$to,$query){
        require_once '../db.php';
        $db = Db::getInstance();
        $list = [];
        $result = '';

        if(!empty($from) && !empty($to)){
            if(!empty($query)){
                $result = mysqli_query($db,"SELECT * FROM shoppings where id = '$query' AND entry_at BETWEEN '$from' AND '$to'");
            }else{
                $result = mysqli_query($db,"SELECT * FROM shoppings where entry_at BETWEEN '$from' AND '$to'");
            }
        }elseif(!empty($query)){
            $result = mysqli_query($db,"SELECT * FROM shoppings where id = '$query'");
        }else{
             $result = mysqli_query($db,'SELECT * FROM shoppings');
        }

         while($row = mysqli_fetch_assoc($result)){
            $list[] = new shopping_model($row['id'],$row['amount'],$row['buyer'],$row['buyer_email'],$row['buyer_ip'],
                $row['receipt_id'],$row['note'],$row['city'],$row['phone'],$row['hash_key'],$row['entry_at'],
                $row['entry_by']);
        }

        return $list;
    }

}
?>