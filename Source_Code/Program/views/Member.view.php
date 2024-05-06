<?php

class MemberView {
    public function render($data){
        $title = "Member";
        $link = "index.php?add=true";

        $head = "
        <thead>
            <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>EMAIL</th>
                <th>PHONE</th>
                <th>JOINING DATE</th>
                <th>TYPE MEMBER</th>
                <th>HOTEL</th>
                <th>ACTIONS</th>
            </tr>
        </thead>";
        
        $no = 1;
        $dataMember = null;
        foreach($data['members'] as $val){
            list($id, $name, $email, $phone, $join_date, $name_type, $name_hotel) = $val;
            $dataMember .= "
            <tbody>
                <tr>
                    <th>" . $id . "</th>
                    <td>" . $name . "</td>
                    <td>" . $email . "</td>
                    <td>" . $phone . "</td>
                    <td>" . $join_date . "</td>
                    <td>" . $name_type . "</td>
                    <td>" . $name_hotel . "</td>
                    <td>
                        <a class='btn btn-success' href='index.php?id=" . $id . "'>Edit</a>
                        <a class='btn btn-danger' href='index.php?hapus=" . $id . "' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data?\")'>Delete</a>
                    </td>
                </tr>
            </tbody>
            ";
        }

        $tpl = new Template("templates/skin.html");

        $tpl->replace("MAIN_TITLE", $title);
        $tpl->replace("HEADER", $head);
        $tpl->replace("DATA_TABEL", $dataMember);
        $tpl->replace("DATA_LINK", $link);
        $tpl->write(); 
    }

    public function tambahMember($data){
        $title = "Add Member";
        $link = "index.php";
        $btn = "Add";
        $prev = "index.php";
        $btnn = "tambah";

        // Menginisialisasi variabel untuk menyimpan opsi dropdown
        $typeOptions = '';
        $hotelOptions = '';

        // Mengisi opsi dropdown dengan hasil query
        foreach ($data['typem'] as $type) {
            $typeOptions .= '<option value="' . $type['id_type'] . '">' . $type['name_type'] . '</option>';
        }
        
        foreach ($data['hotel'] as $hotel) {
            $hotelOptions .= '<option value="' . $hotel['id_hotel'] . '">' . $hotel['name_hotel'] . '</option>';
        }

        $form = '
        <div class="card-header bg-primary">
        <h1 class="text-white text-center">  Create New Member </h1>
        </div>
        <br>
        <label> NAME: </label>
        <input type="text" name="name" class="form-control"> <br>

        <label> EMAIL: </label>
        <input type="text" name="email" class="form-control"> <br>

        <label> PHONE: </label>
        <input type="text" name="phone" class="form-control"> <br>

        <label> JOIN DATE: </label>
        <input type="date" name="join_date" class="form-control"> <br>

        <label for="typem">TYPE MEMBER: </label>
        <select class="custom-select form-control" name="id_type">
        <option selected>Open this select type</option>
        ' . $typeOptions . '
        </select> <br>

        <label for="hotel">HOTEL: </label>
        <select class="custom-select form-control" name="id_hotel">
        <option selected>Open this select hotel</option>
        ' . $hotelOptions . '
        </select> <br>
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

    public function ubahMember($data){
        $title = "Update Member";
        $link = "index.php";
        $btn = "Update";
        $prev = "index.php";
        $btnn = "id";

        // Menginisialisasi variabel untuk menyimpan opsi dropdown
        $typeOptions = '';
        $hotelOptions = '';

        // Mengisi opsi dropdown dengan hasil query dan menetapkan nilai awal
        foreach ($data['typem'] as $type) {
            $selected = ($type['id_type'] == $data['member']['id_type']) ? 'selected' : '';
            $typeOptions .= '<option value="' . $type['id_type'] . '" ' . $selected . '>' . $type['name_type'] . '</option>';
        }

        foreach ($data['hotel'] as $hotel) {
            $selected = ($hotel['id_hotel'] == $data['member']['id_hotel']) ? 'selected' : '';
            $hotelOptions .= '<option value="' . $hotel['id_hotel'] . '" ' . $selected . '>' . $hotel['name_hotel'] . '</option>';
        }

        $form = '
        <input type="hidden" name="id_member" value="' . $data['member']['id_member'] . '">
        <div class="card-header bg-primary">
        <h1 class="text-white text-center">  Update Member </h1>
        </div>
        <br>
        <label> NAME: </label>
        <input type="text" name="name" class="form-control" value="' . $data['member']['name'] . '"> <br>

        <label> EMAIL: </label>
        <input type="text" name="email" class="form-control" value="' . $data['member']['email'] . '"> <br>

        <label> PHONE: </label>
        <input type="text" name="phone" class="form-control" value="' . $data['member']['phone'] . '"> <br>

        <label> JOIN DATE: </label>
        <input type="date" name="join_date" class="form-control" value="' . $data['member']['join_date'] . '"> <br>

        <label for="typem">TYPE MEMBER: </label>
        <select class="custom-select form-control" name="id_type">
        <option selected>Open this select type</option>
        ' . $typeOptions . '
        </select> <br>

        <label for="hotel">HOTEL: </label>
        <select class="custom-select form-control" name="id_hotel">
        <option selected>Open this select hotel</option>
        ' . $hotelOptions . '
        </select> <br>
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