<?php

class Type extends DB
{
    //mengambil semua data type dari databae
    function getType()
    {
        $query = "SELECT * FROM typem";

        //memanggil fungsi dari db untuk eksekusi query
        return $this->execute($query);
    }

    //mengambil data type berdasarkan id
    function getTypeById($id)
    {
        $query = "SELECT * FROM typem WHERE id_type=$id";
        return $this->execute($query);
    }

    //menambahkan data type baru
    function addType($data)
    {
        $name_type = $data['name_type'];

        $query = "INSERT INTO typem VALUES ('', '$name_type')";

        // Mengeksekusi query
        return $this->execute($query);
    }

    //memperbarui data type berdasarkan id
    function updateType($data)
    {
        $id = $data['id_type'];
        $name_type = $data['name_type'];

        $query = "UPDATE typem SET name_type='$name_type' WHERE id_type=$id";

        // Mengeksekusi query
        return $this->execute($query);
    }

    //menghapus data type dari database berdasarkan id tertentu
    function deleteType($id)
    {
        //cek apakah id type masih digunakan dalam data member
        $queryMember = "SELECT COUNT(*) as total FROM members WHERE id_type = $id";
        $this->execute($queryMember);
        $rowMember = $this->getResult();
        $memberCount = $rowMember['total'];

        //jika id type masih digunakan dalam data member, kembalikan pesan kesalahan
        if ($memberCount > 0) {
            echo "<script>alert('Type Member tidak dapat dihapus karena masih digunakan dalam data Member.');</script>";
            return false;
        }
        else{
            $query = "DELETE FROM typem WHERE id_type=$id";
            //memanggil fungsi dari db untuk eksekusi query
            $this->execute($query);
            return true;
        }
    }
}

?>