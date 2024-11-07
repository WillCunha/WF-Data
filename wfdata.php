<?php

/**
 * Plugin Name: WF Data
 * Plugin URI: https://wfsoft.com.br/
 * Description: Minerador de dados, o Data, módulo de dados da WF Soft, realiza a mineração de dados importantes para que sejam realizadas análises para então a melhora da eficiencia do e-commerce. 
 * Version: 0.0.1
 * Author: WF Soft
 * Author URI: https://wfsoft.com.br/data
 * Text Domain: wfSoft
 * Requires at least: 6.3
 * Requires PHP: 7.4
 *
 * @package wfSoft
 */


defined('ABSPATH') || exit;
define('PACOTE', dirname(__FILE__));

if (file_exists(dirname(__FILE__) . "/vendor/autoload.php")) {
    require_once dirname(__FILE__) . "/vendor/autoload.php";
} else {
    error_log("Há um erro nos arquivos do Composer.");
}

if (class_exists('App\\Init')) {
    $seiLa = new App\Init();
    register_activation_hook(__FILE__, 'install');
    register_deactivation_hook(__FILE__, 'unscheduled');
    $seiLa->register_services();
} else {
    error_log("Ocorreu um erro ao tentar instanciar o arqivo 'Init'.");
}

function install()
{
    $install = new App\Core\WFdata();
    $cron = new \App\Core\Cron();
    $install->instala();
    $cron->cronstarter();
}

function unschedule(){
    $timestamp = wp_next_scheduled('cleanData');
    wp_unschedule_event($timestamp, 'cleanData');
}
