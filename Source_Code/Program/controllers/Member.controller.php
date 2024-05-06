<?php

include_once("connection.php");
include_once("models/Member.class.php");
include_once("views/Member.view.php");
include_once("models/Type.class.php");
include_once("models/Hotel.class.php");

class MemberController {
    private $member;
    private $type;
    private $hotel;

    function __construct(){
        $this->member = new Member(connection::$db_host, connection::$db_user, connection::$db_pass, connection::$db_name);
        $this->type = new Type(connection::$db_host, connection::$db_user, connection::$db_pass, connection::$db_name);
        $this->hotel = new Hotel(connection::$db_host, connection::$db_user, connection::$db_pass, connection::$db_name);
    }

    public function index() {
        $this->member->open();
        $this->member->getMember();
        
        $data = array(
            'members' => array(),
        );

        while($row = $this->member->getResult()){
        array_push($data['members'], $row);
        }

        $this->member->close();

        $view = new MemberView();
        $view->render($data);
    }

    function addMember($data){
        $this->member->open();
        $this->member->addMember($data);
        $this->member->close();
        
        //header("location:index.php");
    }

    function editMember($data){
        $this->member->open();
        $this->member->updateMember($data);
        $this->member->close();
        
        //header("location:index.php");
    }

    function deleteMember($id){
        $this->member->open();
        $this->member->deleteMember($id);
        $this->member->close();
        
        header("location:index.php");
    }

    function form(){
        $this->type->open();
        $this->type->getType();

        $this->hotel->open();
        $this->hotel->getHotel();
        
        $data = array(
            'typem' => array(),
            'hotel' => array()
        );

        while($row = $this->type->getResult()){
            array_push($data['typem'], $row);
        }

        while($row = $this->hotel->getResult()){
            array_push($data['hotel'], $row);
        }

        $this->type->close();
        $this->hotel->close();

        $view = new MemberView();
        $view->tambahMember($data);
    }

    function formedit($id){
        $this->member->open();

        $this->type->open();
        $this->type->getType();

        $this->hotel->open();
        $this->hotel->getHotel();

        $data = array(
            'member' => $this->member->getMemberbyId($id),
            'typem' => array(),
            'hotel' => array()
        );

        while($row = $this->type->getResult()){
            array_push($data['typem'], $row);
        }

        while($row = $this->hotel->getResult()){
            array_push($data['hotel'], $row);
        }

        $this->type->close();
        $this->hotel->close();
        $this->member->close();

        $view = new MemberView();
        $view->ubahMember($data);
    }
}

?>