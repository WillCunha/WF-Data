<?php

namespace App\Admin;

use App\Admin\Paginas;

Class Menu {

    /**
     * Classe que compoem as Páginas
     * 
     * @var
     */
    public $paginas;

    public function __construct(){
        $this->paginas = new Paginas;
    }

    /**
     * Menu lateral da página 'Admin'.
     * 
     * 
     */
    public function menus()
    {
        add_menu_page('WF data', 'WF Data', 'manage_options', 'wfdata', 'wf_data');
        add_submenu_page('wfdata', 'WF Data | Usuários', 'Usuários', 'manage_options', 'usuarios', array($this->paginas, 'usuarios'));
        add_submenu_page('wfdata', 'WF Data | Páginas', 'Páginas', 'manage_options', 'paginas', array($this->paginas, 'usuarios'));
        add_submenu_page('wfdata', 'WF Data | Produtos', 'Produtos', 'manage_options', 'produtos', array($this->paginas, 'produtos'));
    }

}

?>