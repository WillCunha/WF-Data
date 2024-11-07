<?php

namespace App\Core;


use App\Core\WFInstall;
use App\Core\Cookies;
use App\Admin\Menu;
use App\File\Write;
use App\Includes\JS;

/**
 * WF data Setup
 * 
 * @package WFdata
 * @since 3.2.0
 */

defined('ABSPATH' || exit);

/**
 * Classe principal do WF data
 * @class wfdata
 */

class WFdata
{

    /**
     * Versão
     * 
     * @var string 
     */
    public $version = '0.0.1';

    /**
     * Variavel do banco
     * 
     * 
     */
    public $db;

    /**
     * Variavel dos menus responsável por criar e aplicar os menus.
     * 
     * @var
     */
    public $menu;

    /**
     * Variavel dos Cookie responsável por criar ou atualizar os Cookies.
     * 
     * 
     */
    public $cookie;

    /**
     * Variavel dos scripts de Javascript.
     * 
     * 
     */
    public $javascript;

    /**
     * Variavel do Write Data responsável por escrever os pontos de HeatMap.
     */
    public $write;

    /**
     * Variavel Update responsável por atualizar os dados do Banco.
     */
    public $update;

    /**
     * Variavel Cron responsável por adicionar cron tasks
     * 
     */
    public $cron;

    /**
     * Pega o ID do Post e atualiza
     * 
     */
    public $post;

    

    public function __construct()
    {
        $this->menu = new Menu;
        $this->cookie = new Cookies;
        $this->javascript = new JS;
        $this->update = new Update;
        $this->write = new Write;
        $this->cron = new Cron;
        $this->post = new Post;
        
    }


    public function instala() {
        $this->db = new WFInstall;
        $this->db->install();
    }

    public function triggers(){

        //Executa quando inicia o wp-body
        add_action('wp_body_open', array($this->post, 'getid'));

        //Adiciona o menu na tela;
        add_action('admin_menu', array($this->menu, 'menus'), 10);

        //Arquivos JavaScript
        add_action('wp_enqueue_scripts', array($this->javascript, 'files'));

        // Controla a administração dos Cookies
        add_action('wp_ajax_cookie', array($this->cookie, 'isCookie'));
        add_action('wp_ajax_nopriv_cookie', array($this->cookie, 'isCookie'));

        //Atualiza o timestamp da página que o usuario está
        add_action('wp_ajax_dateTime', array($this->update, 'updateUserVisit'));
        add_action('wp_ajax_nopriv_dateTime', array($this->update, 'updateUserVisit'));

        //Alimenta o Heatmap
        add_action('wp_ajax_heatmapAction', array($this->write, 'writeHeatmapData'));
        add_action('wp_ajax_nopriv_heatmapAction', array($this->write, 'writeHeatmapData'));

        //Executa o Cron
        add_action('wp', array($this->cron, 'cronstarter'));
        add_action('cleanData', array($this->cron, 'cleanData'));

        

    }


}
