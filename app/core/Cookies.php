<?php

namespace App\Core;

use App\DB\Database;
use App\Core\Update;


class Cookies
{

    /**
     * ID aleatório do Cookie que identificará o usuario
     * 
     * @var int
     */
    public $id;

    /**
     * Dados atuais do cookie
     * 
     * @var string
     */
    public $data;


    /**
     * Conteúdo geral do Cookie
     * 
     * @var string
     */
    public $cookie;

    /**
     * Prefixo da tabela do banco
     * 
     * @var string
     */
    public $prefixo;

    /**
     * Classe que contem o banco
     */
    public $banco;

    /**
     * Classe que contem a atualização de informações do Cookie
     * 
     * 
     */
    public $update;


    public function __construct()
    {
        $this->cookie = "wfdata";
    }

    public function criaCookie()
    {
        $id = rand(99999, 999999);
        $expire = time() + 22 * 54 * 60 * 60 * 60;
        $content = array(
            'id' => $id,
            'expire' => $expire,
        );
        setCookie('wfdata', json_encode($content), $expire, "/");
        $this->addBanco($id);
    }

    public function addBanco($id)
    {
        $banco = new Database();
        $banco->table = 'wfdata_user';
        $banco->add([
            "ID" => $id,
            'register' => 0,
            'active' => 0
        ]);
    }

    public function updateCookie($id, $pageName)
    {
        $this->update = new Update($id, $pageName);
        $this->update->addPageVisit();
    }

    public function isCookie()
    {
        if (!isset($_REQUEST['cookie'])) {
            $final = json_encode(['status' => 'guenta aew filhão']);
            return;
        } else {
            $i = 0;
            if ($i == 0) {
                $cookieId = $_REQUEST['cookie'];
                $pageName = $_REQUEST['pageName'];

                if ($cookieId == 'NULL') {
                    $i++;
                    $this->criaCookie();
                    $final = json_encode(['status' => 200]);
                } else {
                    $i++;
                    $this->updateCookie($cookieId, $pageName);
                    $final = json_encode(['status' => 200]);
                }
            } else {
                $final = json_encode(['status' => "função travada"]);
            }
        }

        return $final;
    }
}
