<?php

include_once("connection.php");
include_once("models/Hotel.class.php");
include_once("views/Hotel.view.php");

class HotelController {
    private $hotel;

    function __construct(){
        $this->hotel = new Hotel(connection::$db_host, connection::$db_user, connection::$db_pass, connection::$db_name);
    }

    public function index() {
        $this->hotel->open();
        $this->hotel->getHotel();
        
        $data = array();

        while($row = $this->hotel->getResult()){
        array_push($data, $row);
        }

        $this->hotel->close();

        $view = new HotelView();
        $view->render($data);
    }

    function addHotel($data){
        $this->hotel->open();
        $this->hotel->addHotel($data);
        $this->hotel->close();
        
        //header("location:hotel.php");
    }

    function editHotel($data){
        $this->hotel->open();
        $this->hotel->updateHotel($data);
        $this->hotel->close();
        
        //header("location:hotel.php");
    }

    function deleteHotel($id){
        $this->hotel->open();
        $this->hotel->deleteHotel($id);
        $this->hotel->close();
        
        header("location:hotel.php");
    }

    function form(){
        $view = new HotelView();
        $view->tambahHotel();
    }

    function formedit($id){
        $this->hotel->open();

        $row = $this->hotel->getHotelById($id);
        $data = array(
            'hotel' => mysqli_fetch_assoc($row)
        );

        $this->hotel->close();

        $view = new HotelView();
        $view->ubahHotel($data);
    }
}

?>