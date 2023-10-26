<?php

    // $hostname = "localhost";
    // $username = "root";
    // $password = "";
    // $dbname = "bookstore";

    // $connection = mysqli_connect($hostname, $username, $password, $dbname);
    // if (!$connection)
    // {
    //     die("Błąd połączenia!" . mysqli_connect_error());
    // }

    class dbConfig 
    {
        protected $hostname;
        protected $username;
        protected $password;
        protected $dbname;

        function dbConfig() 
        {
            $this -> hostname = "localhost";
            $this -> username = "root";
            $this -> password = "";
            $this -> dbname = "bookstore";

        }


    }

?>