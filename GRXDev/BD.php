<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BD
 *
 * @author JuanPablo
 */
class BD {
    private $localhost;
    private $user;
    private $pass;
    private $database;
    private $conexion = false;
    
    public function BD($direccion,$usuario,$contrasenia,$basedatos) 
    {
        $this->localhost = $direccion;
        $this->user = $usuario;
        $this->pass = $contrasenia;
        $this->database = $basedatos;
    }
   
    public function CheckConnection()
    {
         $enlace =  mysql_connect($this->localhost, $this->user, $this->pass);
         if (!$enlace) 
         {
             die('No pudo conectarse: ' . mysql_error());
         }
         echo 'Conectado satisfactoriamente';
         mysql_close($enlace);
    }
    
    public function GetMyConnection()
    {
        if( $this->conexion )
            return $this->conexion;
        $this->conexion = mysql_connect( $this->localhost, $this->user, $this->pass) or die('Could not connect to server.' );
        mysql_select_db($this->database, $this->conexion) or die('Could not select database.');
        return $this->conexion;
    }
    
    public function CleanUpDB()
    {
        if( $this->conexion != false )
            mysql_close($this->conexion);
        $this->conexion = false;
    }
    
    public function Query($cadena)
    {
        return $res = mysql_query($cadena, $this->GetMyConnection());
    }
    
    /*
     * Obtener todas las filas que devuelve una consulta
        $result = $datos->Query("SELECT * FROM Usuarios");
        while ($fila = mysql_fetch_array($result, MYSQL_NUM)) 
        {
           printf("ID: %s  Nombre: %s", $fila[0], $fila[1]);  
        }
     * mysql_free_result($resultado);
     */
}
