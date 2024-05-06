<?php

include_once("connection.php");
include_once("models/Type.class.php");
include_once("views/Type.view.php");

class TypeController {
    private $type;

    function __construct(){
        $this->type = new Type(connection::$db_host, connection::$db_user, connection::$db_pass, connection::$db_name);
    }

    public function index() {
        $this->type->open();
        $this->type->getType();
        
        $data = array();

        while($row = $this->type->getResult()){
        array_push($data, $row);
        }

        $this->type->close();

        $view = new TypeView();
        $view->render($data);
    }

    function addType($data){
        $this->type->open();
        $this->type->addType($data);
        $this->type->close();
        
        //header("location:type.php");
    }

    function editType($data){
        $this->type->open();
        $this->type->updateType($data);
        $this->type->close();
        
        //header("location:type.php");
    }

    function deleteType($id){
        $this->type->open();
        $this->type->deleteType($id);
        $this->type->close();
        
        header("location:type.php");
    }

    function form(){
        $view = new TypeView();
        $view->tambahType();
    }

    function formedit($id){
        $this->type->open();

        $row = $this->type->getTypeById($id);
        $data = array(
            'type' => mysqli_fetch_assoc($row)
        );

        $this->type->close();

        $view = new TypeView();
        $view->ubahType($data);
    }
}

?>