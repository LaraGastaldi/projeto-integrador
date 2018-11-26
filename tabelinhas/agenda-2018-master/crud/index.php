<?php

    $contatos_json  = file_get_contents('contatos.json');
    $contatos_array = json_decode($contatos_json, true);

//    echo '<pre>';
//    print_r($contatos_array);
//    echo '</pre>';

    if ( isset($_GET['acao']) ){

        //DELETE
        if ($_GET['acao'] == 'excluir'){
            echo 'tentou excluir o ' . $_GET['numero'];

            foreach ($contatos_array as $pos => $contato) {

                if ($contato['number'] == $_GET['numero']){
                    echo "encontrei o contato";
                    unset( $contatos_array[$pos] );
                    break;
                }else {
                    echo "nao foi esse contato <br>";
                }


            }

        }

        //UPDATE
        if ($_GET['acao'] == 'editar'){
            echo 'tentou editar o ' . $_GET['numero'];
        }


    }


?>

<table>

    <tr>
        <td>numero</td>
        <td>nome</td>
        <td>email</td>
        <td>editar</td>
        <td>excluir</td>
    </tr>

    <?php foreach ($contatos_array as $pessoa): ?>

        <tr>
            <td><?= $pessoa['number'] ?></td>
            <td><?= $pessoa['name'] ?></td>
            <td><?= $pessoa['email'] ?></td>
            <td><a href="?acao=editar&numero=<?= $pessoa['number'] ?>">editar</a></td>
            <td><a href="?acao=excluir&numero=<?= $pessoa['number'] ?>">excluir</a></td>
        </tr>
        
    <?php endforeach; ?>

</table>
