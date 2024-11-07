<?php

use App\DB\Database;


function exibeTexto()
{


    $busca = new Database;
    $busca->table = "wfdata_user";
    $resultado = $busca->selectWP("active = '1'", "ID DESC", 30);
    $html = "";

    foreach ($resultado as $key => $value) {

        $busca->table = "wfdata_pagevisited";
        $soma = $busca->selectWPCount("id_user = " . $value->ID, 'id_user');


        $dateStart = date('d/M/Y H:i:s', strtotime($value->start));
        $dateFinal = date('d/M/Y H:i:s', strtotime($value->last_time));

        $dateInicio = new DateTime($value->start);
        $dateEnd = new DateTime($value->last_time);
        $diff = $dateEnd->diff($dateInicio);


        $html .= '<div class="bloco-100 flex-line">';
        $html .= '<div class="bloco-100 line">';
        $html .= '<div class="bloco-14">';
        $html .= '<h4> Código: ' . $value->ID . '</h4>';
        if ($value->id_woocommerce == ''  || $value->id_woocommerce == 0) {
            $html .= '<p>Usuário não </br> registrado!</p>';
        } else {
            $html .= '<p>Código do WooCommerce: <span>' . $value->id_woocommerce . '</span></p>';
        }
        $html .= '</div>';
        $html .= '<div class="bloco-90 flex-column">';
        $html .= '<div class="bloco-100 flex-line">';
        $html .= '<div class="item-link">';
        $html .= '<a href="?idUser=' . $value->ID . '">Mapa de Calor</a>';
        $html .= '</div>';
        $html .= '<div class="item-link">';
        $html .= '<a href="?idUser=' . $value->ID . '">Relatório de Carrinho</a>';
        $html .= '</div>';
        $html .= '<div class="item-link">';
        $html .= '<a href="?idUser=' . $value->ID . '">Relatório de Páginas Visitadas</a>';
        $html .= '</div>';
        $html .= '<div class="item-link">';
        $html .= '<a href="?idUser=' . $value->ID . '">Relatório de Ultimas Compras</a>';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '<div class="bloco-100 flex-line">';
        $html .= '<div class="item-link">';
        $html .= 'Tempo médio gasto: <span>' . $diff->format('%a dia(s), %h hora(s) e %i minuto(s)') . '</span>';
        $html .= '</div>';
        $html .= '<div class="item-link">';
        $html .= 'Pimeiro acesso: <span>' . $dateStart . '</span>';
        $html .= '</div>';
        $html .= '<div class="item-link">';
        $html .= 'Último acesso: <span>' . $dateFinal . '</span>';
        $html .= '</div>';
        $html .= '<div class="item-link">';
        $html .= 'Acessos por dia: <span>' . $soma . '</span>';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '<div class="bloco-14">';

        $html .= '</div>';
        $html .= '</div>';
        $html .= '</div>';
    }

    echo $html;
}

function fillTable()
{
    $args = array(
        'post_type' => 'product',
        'posts_per_page' => '12'
    );

    $loop = new WP_Query($args);
    if ($loop->have_posts()) {
        while ($loop->have_posts()){
            $loop->the_post();
            $idProduto = $loop->post->ID;
            
            $busca = new Database;
            
            $busca->table = "wfdata_pagevisited";
            $ultimaView = $busca->selectWP('page_id LIKE "%' .$loop->post->post_name. '%"', 'ID DESC', '1' );
            $soma = $busca->selectWPCount("page_id LIKE  '%" . $loop->post->post_name . "%'", 'page_id');
            echo "<tr>";
            echo "<td><a href='http://localhost/projetowf/wp-admin/post.php?post=".$idProduto."8&action=edit' alt='Editar Produto' target='_blank'>".$idProduto."</td>";
            echo "<td>".$loop->post->post_title."</td>";
            if(empty($ultimaView)){
                $visualizacao = 0;
            }else{
               $visualizacao = date('d/M/Y H:i:s', strtotime($ultimaView['0']->last_time));
            }
            echo "<td> ".$visualizacao."</td>";
            echo "<td> ".$soma."</td>";
            echo "</tr>";
        }
    } else {
        echo __('Não ha produtos cadastrados!');
    }
    wp_reset_postdata();
}
