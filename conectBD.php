<?php

 class OperacionesMysql
    {
        private $_host = "localhost";
        private $_db_name = "temp";
        private $_user = "root";
        private $_pass = "";
        
         public function  conectar()
        {
            $con= mysqli_connect($this->_host, $this->_user, $this->_pass, $this->_db_name) or die ('No se conecta');
            return $con;
        }
        public function InsertarDato($temp,$hume,$fech,$hora)
        {

            $sql = "INSERT INTO medicion (temperatura,humedad,fecha,hora) VALUES ('$temp','$hume','$fech','$hora')";
            return $sql;
        }
    }
