<?php
include_once("models/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/Type.controller.php");

$type = new TypeController();

if (isset($_GET['add'])) {
    //memanggil form add member
    $type->form();
}

else if (isset($_POST['tambah'])) {
  //memanggil add member
  $type->addType($_POST);
  echo "<script>
        alert('Data berhasil ditambah!');
        document.location.href = 'type.php';
        </script>";
}

else if (isset($_GET['id'])) {
    $id = $_GET['id'];
    //memanggil form edit type
    $type->formedit($id);
}
  
else if (isset($_POST['id'])) {
    //memanggil edit type
    $type->editType($_POST);
    echo "<script>
        alert('Data berhasil diubah!');
        document.location.href = 'type.php';
        </script>";
}

else if (!empty($_GET['hapus'])) {
    //memanggil hapus
    $id = $_GET['hapus'];
    $type->deleteType($id);
}

else{
    $type->index();
}
