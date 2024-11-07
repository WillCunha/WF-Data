<?php

namespace App;

use App\Core\WFdata;
use Error;

class Init
{

    /**
     * Classe que carrega a WFdata
     * 
     * @var
     */
    public $wfdata;

    public function __construct()
    {
        $this->wfdata = new WFdata;
    }

    public static function get_services() {}

    public function register_services()
    {
        $this->wfdata->triggers();
    }
}

