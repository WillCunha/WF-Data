<?php

include_once PACOTE . '/app/includes/functions.php';

?>
<style>
    span {
        color: #3c434a;
        font-weight: 600;
    }

    .bloco-100 {
        width: 98%;
    }

    .bloco-90 {
        width: 90%;
    }

    .bloco-80 {
        width: 80%;
    }

    .bloco-75 {
        width: 75%;
    }

    .bloco-50 {
        width: 50%;
    }

    .bloco-33 {
        width: 33%;
    }

    .bloco-20 {
        width: 20%;
    }

    .bloco-14 {
        width: 14%;
    }

    .bloco-10 {
        width: 10%;
    }

    .bloco-100 {
        display: flex;
        margin-bottom: 0.5%;
        max-height: fit-content !important;
    }

    .bloco-33 {
        display: block;
        padding: 2%;
        border-width: 1px;
        border-color: grey;
        border-style: solid;
    }

    .bloco-33::nth-child(01) {
        margin: 0 2%;
    }

    .bloco-20 {
        border-left-style: solid;
        border-left-width: 2px;
    }

    .bloco-90 {
        border-right-width: medium;
        border-right: solid;
        border-left-width: medium;
        border-left: solid;
    }

    .bloco-14 {
        display: flex;
        flex-direction: column;
        align-content: center;
        align-items: center;
        align-self: center;
        min-height: fit-content;
        text-align: center;
    }

    .flex-line {
        display: flex;
        max-height: 75px;
        min-height: 75px;
        flex-direction: row;
        align-content: center;
        align-items: center;
    }

    .flex-column {
        display: flex;
        flex-direction: column;
        align-content: center;
        align-items: center;
        align-self: center;
    }

    .flex a {
        text-decoration: underline;
        color: #3c434a;
        font-weight: 600;
    }

    .item-link {
        max-height: fit-content;
        overflow: hidden;
        border-right-style: solid;
        border-right-width: 2px;
        padding-right: 2%;
        padding-left: 2%;
    }

    .item-link:last-child {
        border: none;
    }

    .line {
        border-radius: 10px;
        border-width: 1px;
        border-color: grey;
        border-style: solid;
        min-height: 150px;
        max-height: 150px;
    }

    .item-link a {
        color: #3c434a;
        font-weight: 600;
        text-decoration: none;
    }
</style>

<h1>Usuários: </h1>
<p>Os usuários que não possuem registro no WooCoomerce são identificados por meio de <a href="#">Cookies</a>. Devido às legislações em vigor,
    é possível que seja negada a entrega dessas informações.
</p>

<?php

exibeTexto();

?>