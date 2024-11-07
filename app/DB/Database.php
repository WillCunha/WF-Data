<?php

namespace App\DB;


Class Database
{

    /**
     * Variavel que contem o nome da tabela
     * 
     * @var string
     */
    public $table;


    public function add($values){

        global $wpdb;
        global $table_prefix;
        $table = $table_prefix . $this->table;
        
        $columns = array_keys($values);
        $values = array_values($values);
        
        $query = 'INSERT INTO '.$table.'  ('.implode(',', $columns).') VALUES ("'.implode('","', $values).'")';
        $wpdb->query($query);

        return;

    }

    public function update($where, $values){

        global $wpdb;
        global $table_prefix;
        $table = $table_prefix . $this->table;

        $columns = array_keys($values);
        $values = array_values($values);

        $query = $wpdb->prepare('UPDATE ' . $table . ' SET ' . implode(' = %s, ', $columns) . ' = %s WHERE ' . $where, $values);
        $wpdb->query($query);
    }

    public function updateMeta($idPost, $postMeta, $value){

        global $wpdb;
        global $table_prefix;
        $table = $table_prefix . $this->table;

       update_post_meta($idPost, $postMeta, $value);
    }



    public function selectWP($where, $order, $limit){

        global $wpdb;
        global $table_prefix;
        $table = $table_prefix . $this->table;


        $where = strlen($where) ? " WHERE " . $where : '' ;
        $order = strlen($order) ? " ORDER BY " . $order : '';
        $limit = strlen($limit) ? " LIMIT " . $limit : '';

        $query = 'SELECT * FROM ' . $table . $where . $order . $limit;
        $retorno = $wpdb->get_results($query);

        return $retorno;
    }
    public function selectWPCount($where, $column){

        global $wpdb;
        global $table_prefix;
        $table = $table_prefix . $this->table;


        $where = strlen($where) ? " WHERE " . $where : '' ;


        $query = 'SELECT COUNT('.$column.') FROM ' . $table . $where;
        $retorno = $wpdb->get_var($query);

        error_log($query);

        return $retorno;
    }

    public function delete($where){

        global $wpdb;
        global $table_prefix;
        $table = $table_prefix . $this->table; 

        $where = strlen($where) ? " WHERE " . $where : '';

        $query = 'DELETE FROM ' .$table . $where; 

        error_log("QUERY: " . $query);

        $wpdb->query($query);
    }
}
