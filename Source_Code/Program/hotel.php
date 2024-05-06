<?php
include_once("models/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/Hotel.controller.php");

$hotel = new HotelController();

if (isset($_GET['add'])) {
    //memanggil form add hotel
    $hotel->form();
}

else if (isset($_POST['tambah'])) {
  //memanggil add hotel
  $hotel->addHotel($_POST);
  echo "<script>
        alert('Data berhasil ditambah!');
        document.location.href = 'hotel.php';
        </script>";
}

else if (isset($_GET['id'])) {
    $id = $_GET['id'];
    //memanggil form edit hotel
    $hotel->formedit($id);
}
  
else if (isset($_POST['id'])) {
      //memanggil edit hotel
      $hotel->editHotel($_POST);
      echo "<script>
            alert('Data berhasil diubah!');
            document.location.href = 'hotel.php';
            </script>";
}

else if (!empty($_GET['hapus'])) {
    //memanggil add
    $id = $_GET['hapus'];
    $hotel->deleteHotel($id);
}

else{
    $hotel->index();
}
