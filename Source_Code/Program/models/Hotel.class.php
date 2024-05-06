<?php

class Hotel extends DB
{
    //mengambil semua data hotel dari databae
    function getHotel()
    {
        $query = "SELECT * FROM hotel";

        //memanggil fungsi dari db untuk eksekusi query
        return $this->execute($query);
    }

    //mengambil data hotel berdasarkan id
    function getHotelById($id)
    {
        $query = "SELECT * FROM hotel WHERE id_hotel=$id";
        return $this->execute($query);
    }

    //menambahkan data hotel baru
    function addHotel($data)
    {
        $name_hotel = $data['name_hotel'];

        $query = "INSERT INTO hotel VALUES ('', '$name_hotel')";

        // Mengeksekusi query
        return $this->executeAffected($query);
    }

    //memperbarui data hotel berdasarkan id
    function updateHotel($data)
    {
        $id = $data['id_hotel'];
        $name_hotel = $data['name_hotel'];

        $query = "UPDATE hotel SET name_hotel='$name_hotel' WHERE id_hotel=$id";

        // Mengeksekusi query
        return $this->executeAffected($query);
    }

    //menghapus data hotel dari database berdasarkan id tertentu
    function deleteHotel($id)
    {
        //cek apakah id hotel masih digunakan dalam data member
        $queryMember = "SELECT COUNT(*) as total FROM members WHERE id_hotel = $id";
        $this->execute($queryMember);
        $rowMember = $this->getResult();
        $memberCount = $rowMember['total'];

        //jika id hotel masih digunakan dalam data member, kembalikan pesan kesalahan
        if ($memberCount > 0) {
            echo "<script>alert('Hotel tidak dapat dihapus karena masih digunakan dalam data Member.');</script>";
            return false;
        }
        else{
            $query = "DELETE FROM hotel WHERE id_hotel=$id";
            //memanggil fungsi dari db untuk eksekusi query
            $this->executeAffected($query);
            return true;
        }
    }
}

?>