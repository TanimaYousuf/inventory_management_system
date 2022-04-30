<?php

//a class for dealing with a object comment saving, reading and deleting it from the database
class shopping_item_model{
	public $id;
    public $shopping_id;
    public $item_id;

    public function __construct($id,$shopping_id,$item_id){
    	$this->id = $id;
        $this->shopping_id = $shopping_id;
        $this->item_id = $item_id;
    }

    public static function add($shopping_id,$item_id) {

        $db = Db::getInstance();
        $result = mysqli_query($db,"Insert into shopping_items (shopping_id, item_id) Values (('$shopping_id'),('$item_id'))");
        $id=mysqli_insert_id($db);
        return new shopping_item_model($id,$shopping_id,$item_id);
    }
}