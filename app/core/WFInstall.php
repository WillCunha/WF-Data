<?php 

namespace App\Core;

Class WFInstall
{

    public static function install(){

        global $table_prefix, $wpdb;
        $bancoUsers = $table_prefix . 'wfdata_user';
        $bancoHeatmap = $table_prefix . 'wfdata_heatmap';
        $bancoHeatmapUser = $table_prefix . 'wfdata_heatmapUser';
        $bancoCartActivity = $table_prefix . 'wfdata_cartActivity';
        $bancoPageVisited = $table_prefix . 'wfdata_pageVisited';

        $tables = "
        CREATE TABLE `$bancoUsers` (
            ID int(11) auto_increment,
            id_woocommerce int(11),
            age int(11),
            localization varchar(255),
            gender char(1),
            register tinyint(1),
            PRIMARY KEY (ID)
        );
        
        CREATE TABLE `$bancoHeatmap` (
            ID int(11)  auto_increment,
            data text(500),
            date_time timestamp,
            PRIMARY KEY (ID)
        );

        CREATE TABLE `$bancoHeatmapUser` (
            ID int(11)  auto_increment,
            id_user int(11),
            data text(500),
            date_time timestamp,
            PRIMARY KEY (ID)
        );
        CREATE TABLE `$bancoCartActivity` (
            ID int(11)  auto_increment,
            id_user int(11),
            id_item int(11),
            quantity int(11),
            buy boolean,
            date_time timestamp,
            PRIMARY KEY (ID)
        );
        CREATE TABLE `$bancoPageVisited` (
            ID int(11)  auto_increment,
            id_user int(11),
            page_id int(11),
            date_time timestamp,
            PRIMARY KEY (ID)
        );
        ";

        mkdir('../wp-content/uploads/wfdata', 0777);

        require_once('C:\xampp\htdocs\projetowf\wp-admin\upgrade.php');
        dbDelta($tables);

        

    }

}

?>