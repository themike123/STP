<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CuentaUsuario
 *
 * @author USUARIO
 */
class CuentaUsuario {
    private $id, $id_Usuario, $id_Universidad, $username, $password, $email, $nombreUsuario, $telefono, $Universidad;

    function __construct($id, $id_Usuario, $id_Universidad, $username, $password, $email, $nombreUsuario, $telefono, $Universidad) {
        $this->id = $id;
        $this->id_Usuario = $id_Usuario;
        $this->id_Universidad = $id_Universidad;
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->nombreUsuario = $nombreUsuario;
        $this->telefono = $telefono;
        $this->Universidad = $Universidad;
    }


    public function getId() {
        return $this->id;
    }

    public function getId_Usuario() {
        return $this->id_Usuario;
    }

    public function getId_Universidad() {
        return $this->id_Universidad;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getNombreUsuario() {
        return $this->nombreUsuario;
    }

    public function getTelefono() {
        return $this->telefono;
    }

    public function getUniversidad() {
        return $this->Universidad;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setId_Usuario($id_Usuario) {
        $this->id_Usuario = $id_Usuario;
    }

    public function setId_Universidad($id_Universidad) {
        $this->id_Universidad = $id_Universidad;
    }

    public function setUsername($username) {
        $this->username = $username;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setNombreUsuario($nombreUsuario) {
        $this->nombreUsuario = $nombreUsuario;
    }

    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    public function setUniversidad($Universidad) {
        $this->Universidad = $Universidad;
    }


    

}
