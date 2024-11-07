<?php


namespace App\Admin;

class Paginas {


    public function usuarios(){
        require_once __DIR__ . '../../templates/usuarios.php';
    }

    public function produtos(){
        require_once __DIR__ . '../../templates/products.php';

    }

    public function cria_post(){

    }

}

?>