<?php

class TypeView {
    public function render($data){
        $title = "Type";
        $link = "type.php?add=true";

        $head = "
        <thead>
            <tr>
                <th>ID</th>
                <th>NAME TYPE</th>
                <th>ACTIONS</th>
            </tr>
        </thead>";
        
        $no = 1;
        $dataType = null;
        foreach($data as $val){
            list($id, $name_type) = $val;
            $dataType .= "
            <tbody>
                <tr>
                    <th>" . $id . "</th>
                    <td>" . $name_type . "</td>
                    <td>
                        <a class='btn btn-success' href='type.php?id=" . $id . "'>Edit</a>
                        <a class='btn btn-danger' href='type.php?hapus=" . $id . "' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data?\")'>Delete</a>
                    </td>
                </tr>
            </tbody>
            ";
        }

        $tpl = new Template("templates/skin.html");

        $tpl->replace("MAIN_TITLE", $title);
        $tpl->replace("HEADER", $head);
        $tpl->replace("DATA_TABEL", $dataType);
        $tpl->replace("DATA_LINK", $link);
        $tpl->write(); 
    }

    public function tambahType(){
        $title = "Add Type";
        $link = "type.php";
        $btn = "Add";
        $prev = "type.php";
        $btnn = "tambah";

        $form = '
        <div class="card-header bg-primary">
        <h1 class="text-white text-center">  Create New Type </h1>
        </div>
        <br>
        <label> NAME TYPE: </label>
        <input type="text" name="name_type" class="form-control"> <br>
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

    public function ubahType($data){
        $title = "Update Type";
        $link = "type.php";
        $btn = "Update";
        $prev = "type.php";
        $btnn = "id";

        $form = '
        <input type="hidden" name="id_type" value="' . $data['type']['id_type'] . '">
        <div class="card-header bg-primary">
        <h1 class="text-white text-center">  Update Type </h1>
        </div>
        <br>
        <label> NAME TYPE: </label>
        <input type="text" name="name_type" class="form-control" value="' . $data['type']['name_type'] . '"> <br>
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