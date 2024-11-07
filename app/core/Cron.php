<?php

namespace App\Core;

use App\DB\Database;

class Cron {

    /**
     * Variavel que contem o banco
     */
    public $table;

    /**
     * Função que adiciona as tarefas do Cron
     */

     public function __construct()
     {
        $this->table = new Database;
     }

    public function cronstarter(){
        if(!wp_next_scheduled('cleanData')){
            wp_schedule_event(time(), 'daily', 'cleanData');
        }
    }

    public function cleanData(){
        $this->table->table = "wfdata_user";

        error_log("AÇÃO EXECUTADA");
        $this->table->delete("active = 0");
    }

    
}
