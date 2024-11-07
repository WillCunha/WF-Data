<?php

namespace App\Core;

use App\DB\Database;


class Update
{


    /**
     * ID do Cookie
     */
    public $cookieId;

    /**
     * URI da Página
     */
    public $pageName;

    /**
     * Data do update
     */
    public $datetime;

    /**
     * Class do banco
     * 
     */
    public $table;

    /**
     * Classe do banco
     * 
     */
    public $banco;

    /**
     * Variavel da hora local
     * 
     */
    public $local_time;

    /**
     * Pega a URI do Post
     */
    public $uri;

    public function __construct($id = null, $pageName = null)
    {
        $this->cookieId = $id;
        $this->pageName = $pageName;
        $this->banco = new Database;
    }


    public function addPageVisit()
    {


        $local_time = current_time('mysql');

        $this->banco->table = "wfdata_pagevisited";
        $this->banco->add([
            //"ID" => $randid,
            "id_user" => $this->cookieId,
            "page_id" => $this->pageName,
            "first_time" => $local_time,
            "last_time" => $local_time,
            "active" => 0
        ]);

        $local_time = current_time('mysql');
        $this->banco->table = "wfdata_user";
        $this->banco->update("id = " . $this->cookieId, [
            "last_time" => $local_time,
        ]);
    }

    //Update the time which user is accessing to  be able to check how many times he spends on the e-commerce
    //Also updates the 'id_woocommerce' in the table with the actual woocommerce ID.
    public function updateUserVisit()
    {

        if (isset($_REQUEST['cookie'])) {
            $this->cookieId = $_REQUEST['cookie'];
            $this->pageName = $_REQUEST['pageName'];
            $userId = get_current_user_id();

            $local_time = current_time('mysql');
            $this->banco->table = "wfdata_user";
            $this->banco->update("ID = " . $this->cookieId, [
                "last_time" => $local_time,
                "id_woocommerce" => $userId,
                "active" => 1,
            ]);
        }

        $this->buscaDados();
    }

    //Search the last data on the table based on cookie ID, and page name, so there is none duplicate value.
    public function buscaDados()
    {
        $this->banco->table = "wfdata_pagevisited";
        $busca = $this->banco->selectWP("id_user = " . $this->cookieId . " AND page_id = '" . $this->pageName . "'", "ID DESC", 1);

        $resultado = $busca['0']->ID;
        $this->updatePageVisit($resultado);
    }

    /*Update the page visit which the user is in that moment, to be able to tell how many times he spends on each page
    he access.
    */
    public function updatePageVisit($id)
    {
        $local_time = current_time('mysql');
        $this->banco->table = "wfdata_pagevisited";
        $this->banco->update("id = " . $id, [
            "last_time" => $local_time,
            "active" => 1,
        ]);
    }
}
