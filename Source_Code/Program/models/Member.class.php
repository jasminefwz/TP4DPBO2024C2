<?php

class Member extends DB
{
    //mengambil data member dengan menggabungkan informasi type member dan hotel
    function getMember()
    {
        $query = "SELECT
        members.id_member,
        members.`name`,
        members.email,
        members.phone,
        members.join_date,
        typem.name_type,
        hotel.name_hotel
        FROM members
            JOIN typem ON members.id_type=typem.id_type 
            JOIN hotel ON members.id_hotel=hotel.id_hotel
        ORDER BY members.id_member ASC";

        //memanggil fungsi dari db untuk eksekusi query
        return $this->execute($query);
    }

    //mengambil data member berdasarkan id
    function getMemberById($id)
    {
        $query = "SELECT * FROM members JOIN typem ON members.id_type=typem.id_type JOIN hotel ON members.id_hotel=hotel.id_hotel WHERE id_member=$id";
        $this->execute($query);
        return $this->getResult();
    }

    //menambahkan data member baru
    function addMember($data)
    {
        $name = $data['name'];
        $email = $data['email'];
        $phone = $data['phone'];
        $join_date = $data['join_date'];
        $id_type = $data['id_type'];
        $id_hotel = $data['id_hotel'];

        $query = "INSERT INTO members VALUES ('', '$name', '$email', '$phone', '$join_date', '$id_type', '$id_hotel')";

        // Mengeksekusi query
        return $this->executeAffected($query);
    }

    //memperbarui data member berdasarkan id
    function updateMember($data)
    {
        $id = $data['id_member'];
        $name = $data['name'];
        $email = $data['email'];
        $phone = $data['phone'];
        $join_date = $data['join_date'];
        $id_type = $data['id_type'];
        $id_hotel = $data['id_hotel'];

        $query = "UPDATE members SET name='$name', email='$email', phone='$phone', join_date='$join_date',  id_type='$id_type', id_hotel='$id_hotel'
        WHERE id_member=$id";

        // Mengeksekusi query
        return $this->executeAffected($query);
    }

    //menghapus data member dari database berdasarkan id tertentu
    function deleteMember($id)
    {
        $query = "DELETE FROM members WHERE id_member = $id";

        // Mengeksekusi query
        return $this->executeAffected($query);
    }
}

?>