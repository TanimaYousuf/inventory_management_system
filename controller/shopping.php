<?php


class shopping{
//three simple actions

//return all the comments
    function index(){
        //use the model to get all the comments from the database
        $shoppings=shopping_model::all();
        require_once("view/shoppings/list.php");
    }
    function create(){
    	require_once 'model/Item.php';
    	$items = item_model::all();
    	require_once("view/shoppings/create.php");
	    
    }

}

?>