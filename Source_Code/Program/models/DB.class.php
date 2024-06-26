<?php

class DB
{
    // deklarasi variabel
    var $db_host = "";
    var $db_user = "";
    var $db_pass = "";
    var $db_name = "";
    var $db_link = "";
    var $result = 0;

    // constructor
    function __construct($db_host, $db_user, $db_pass, $db_name)
    {
        $this->db_host = $db_host;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
        $this->db_name = $db_name;
    }

    // menghubungkan dengan database
    function open()
    {
        $this->db_link = mysqli_connect($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
    }

    // eksekusi query dari parameter
    function execute($query)
    {
        $this->result = mysqli_query($this->db_link, $query);
        return $this->result;
    }

    // eksekusi query (insert update delete)
    function executeAffected($query = "")
    {
        // mengeksekusi query
        mysqli_query($this->db_link, $query);
        //mengembalikan nilai query
        return mysqli_affected_rows($this->db_link);
    }

    // mengambil hasil eksekusi
    function getResult()
    {
        return mysqli_fetch_array($this->result);
    }

    // close koneksi dengan db
    function close()
    {
        mysqli_close($this->db_link);
    }
}

?>