<?php

include_once PACOTE . '/app/includes/functions.php';

?>

<style>
    table.blueTable {
        border: 1px solid #1C6EA4;
        background-color: #EEEEEE;
        width: 100%;
        text-align: center;
        border-collapse: collapse;
    }

    table.blueTable td,
    table.blueTable th {
        border: 1px solid #AAAAAA;
        padding: 4px 2px;
    }

    table.blueTable tbody td {
        font-size: 12px;
    }

    table.blueTable tr:nth-child(even) {
        background: #D0E4F5;
    }

    table.blueTable thead {
        background: #1C6EA4;
        background: -moz-linear-gradient(top, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
        background: -webkit-linear-gradient(top, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
        background: linear-gradient(to bottom, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
        border-bottom: 2px solid #444444;
    }

    table.blueTable thead th {
        font-size: 15px;
        font-weight: bold;
        color: #FFFFFF;
        border-left: 2px solid #D0E4F5;
    }

    table.blueTable thead th:first-child {
        border-left: none;
    }

    table.blueTable tfoot {
        font-size: 14px;
        font-weight: bold;
        color: #FFFFFF;
        background: #D0E4F5;
        background: -moz-linear-gradient(top, #dcebf7 0%, #d4e6f6 66%, #D0E4F5 100%);
        background: -webkit-linear-gradient(top, #dcebf7 0%, #d4e6f6 66%, #D0E4F5 100%);
        background: linear-gradient(to bottom, #dcebf7 0%, #d4e6f6 66%, #D0E4F5 100%);
        border-top: 2px solid #444444;
    }

    table.blueTable tfoot td {
        font-size: 14px;
    }

    table.blueTable tfoot .links {
        text-align: right;
    }

    table.blueTable tfoot .links a {
        display: inline-block;
        background: #1C6EA4;
        color: #FFFFFF;
        padding: 2px 8px;
        border-radius: 5px;
    }
</style>


<table class="blueTable">
    <thead>
        <tr>
            <th>ID</th>
            <th>Descrição</th>
            <th>Última visualização</th>
            <th>N° de Acessos</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <td colspan="4">
                <div class="links"><a href="#">&laquo;</a> <a class="active" href="#">1</a> <a href="#">2</a> <a href="#">3</a> <a href="#">4</a> <a href="#">&raquo;</a></div>
            </td>
        </tr>
    </tfoot>
    <tbody>
        <?php

        fillTable();

        ?>
    </tbody>
    </tr>
</table>