<?php

namespace App\File;

use App\DB\Database;


/**
 * Classe responsável por gerar o HeatMap do usuario.
 * 
 * 
 */
class Write
{

    /**
     * Variavel que armazena o Eixo X
     * 
     * @var array
     */
    public $data;

    /**
     * Variavel que armazena o Cookie do Usuario
     * 
     * @var string
     */
    public $cookie;

    /**
     * Insere o pageX e pageY para medição geral do heatmap
     */
    public function writeHeatmapData()
    {


        if (isset($_REQUEST['data'])) {

            $this->data = $_REQUEST['data'];
            $this->cookie = $_REQUEST['idCookie'];

            $history = file_get_contents('../wp-content/uploads/wfdata/heatmap-' . $this->cookie . '.json');
            if (isset($history)) {
                $itens = json_decode($history);
                unset($hitory);
            }

            $itens[] = $this->data;

            $contentFinal = json_encode($itens);
            file_put_contents('../wp-content/uploads/wfdata/heatmap-' . $this->cookie . '.json', $contentFinal);
        }
    }
}
