<?php
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
            $this -> dbname = "TechStore";
        }
    }
?>