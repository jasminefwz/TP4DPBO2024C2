<?php
include_once("models/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/Member.controller.php");

$member = new MemberController();

if (isset($_GET['add'])) {
    //memanggil form add member
    $member->form();
}

else if (isset($_POST['tambah'])) {
  //memanggil add member
  $member->addMember($_POST);
  echo "<script>
        alert('Data berhasil ditambah!');
        document.location.href = 'index.php';
        </script>";
}

else if (isset($_GET['id'])) {
  $id = $_GET['id'];
  //memanggil form edit member
  $member->formedit($id);
}

else if (isset($_POST['id'])) {
    //memanggil edit member
    $member->editMember($_POST);
    echo "<script>
          alert('Data berhasil diubah!');
          document.location.href = 'index.php';
          </script>";
} 

else if (isset($_GET['hapus'])) {
    //memanggil hapus
    $id = $_GET['hapus'];
    $member->deleteMember($id);
}

else{
    $member->index();
}