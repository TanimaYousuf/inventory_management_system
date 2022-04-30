<?php

class item_model{
	public $id;
    public $name;

    public function __construct($id,$name) {
        $this->id = $id;
        $this->name = $name;
    }
	public static function all(){
        $list = [];
        $db = Db::getInstance();
        $result = mysqli_query($db,'SELECT * FROM items');

        while($row = mysqli_fetch_assoc($result)){
            $list[] = new item_model($row['id'],$row['name']);
        }

        return $list;
    }
}

?>