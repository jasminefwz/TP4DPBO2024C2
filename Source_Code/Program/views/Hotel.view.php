<?php

class HotelView {
    public function render($data){
        $title = "Hotel";
        $link = "hotel.php?add=true";

        $head = "
        <thead>
            <tr>
                <th>ID</th>
                <th>HOTEL</th>
                <th>ACTIONS</th>
            </tr>
        </thead>";
        
        $no = 1;
        $dataHotel = null;
        foreach($data as $val){
            list($id, $name_hotel) = $val;
            $dataHotel .= "
            <tbody>
                <tr>
                    <th>" . $id . "</th>
                    <td>" . $name_hotel . "</td>
                    <td>
                        <a class='btn btn-success' href='hotel.php?id=" . $id . "'>Edit</a>
                        <a class='btn btn-danger' href='hotel.php?hapus=" . $id . "' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data?\")'>Delete</a>
                    </td>
                </tr>
            </tbody>
            ";
        }

        $tpl = new Template("templates/skin.html");

        $tpl->replace("MAIN_TITLE", $title);
        $tpl->replace("HEADER", $head);
        $tpl->replace("DATA_TABEL", $dataHotel);
        $tpl->replace("DATA_LINK", $link);
        $tpl->write(); 
    }

    public function tambahHotel(){
        $title = "Add Hotel";
        $link = "hotel.php";
        $btn = "Add";
        $prev = "hotel.php";
        $btnn = "tambah";

        $form = '
        <div class="card-header bg-primary">
        <h1 class="text-white text-center">  Create New Hotel </h1>
        </div>
        <br>
        <label> HOTEL: </label>
        <input type="text" name="name_hotel" class="form-control"> <br>
        ';

        $tpl = new Template("templates/skinform.html");

        $tpl->replace("MAIN_TITLE", $title);
        $tpl->replace("DATA_LINK", $link);
        $tpl->replace("DATA_FORM", $form);
        $tpl->replace("DATA_BUTTON", $btn);
        $tpl->replace("PREV", $prev);
        $tpl->replace("BTNN", $btnn);
        $tpl->write();
    }

    public function ubahHotel($data){
        $title = "Update Hotel";
        $link = "hotel.php";
        $btn = "Update";
        $prev = "hotel.php";
        $btnn = "id";

        $form = '
        <input type="hidden" name="id_hotel" value="' . $data['hotel']['id_hotel'] . '">
        <div class="card-header bg-primary">
        <h1 class="text-white text-center">  Update Hotel </h1>
        </div>
        <br>
        <label> HOTEL: </label>
        <input type="text" name="name_hotel" class="form-control" value="' . $data['hotel']['name_hotel'] . '"> <br>
        ';

        $tpl = new Template("templates/skinform.html");

        $tpl->replace("MAIN_TITLE", $title);
        $tpl->replace("DATA_LINK", $link);
        $tpl->replace("DATA_FORM", $form);
        $tpl->replace("DATA_BUTTON", $btn);
        $tpl->replace("PREV", $prev);
        $tpl->replace("BTNN", $btnn);
        $tpl->write();
    }
}

?>