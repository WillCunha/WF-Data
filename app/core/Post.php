<?php

namespace App\Core;

use App\DB\Database;

Class Post {

    /**
     * Variavel que contenha o Banco
     * 
     */
    public $db;

    public function getid($idPost){
        
        $idPost = get_the_ID();
        if(empty($idPost)){
            $idPost = get_queried_object_id();
        }
        error_log($idPost);
        return $idPost;
    }

}