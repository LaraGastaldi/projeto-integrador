<?php

    //abre o arquivo e atribui o conteúdo para a variável $usuarios
    $usuarios = file_get_contents('usuarios.json');

    //converte (decodifica) os dados no formato json para um array php
    $usuariosArray = json_decode($usuarios, true);

    //    echo "<pre>";
    //    print_r($usuariosArray);
    //    echo "</pre>";


    if (isset($_GET['acao']) and $_GET['acao'] == 'excluir'){

        $idContato = $_GET['idContato'];

        foreach ($usuariosArray as $pos => $contato){

            if ($contato['number'] == $idContato){
                echo "contato encontrado na posicao $pos";
                unset($usuariosArray[$pos]);
                $json = json_encode($usuariosArray, JSON_PRETTY_PRINT);
                file_put_contents('usuarios.json', $json);
                break;
            }
        }
    }

    if (isset($_GET['acao']) and $_GET['acao'] == 'cadastrar'){

        if ( empty($_POST['number']) ) { //se o campo number estiver vazio então, trata-se de um cadastro

            $contato = [
                "name" => $_POST['nome'],
                "email" => $_POST['email'],
                "number" => uniqid()
            ];

            $usuariosArray[] = $contato;
            $json = json_encode($usuariosArray, JSON_PRETTY_PRINT);
            file_put_contents('usuarios.json', $json);

        } else { //se não for um cadastro, então trata-se de uma edição


            foreach ($usuariosArray as $pos => $contato){

                if ($contato['number'] == $_POST['number']){

                    $usuariosArray[$pos]['name']  = $_POST['nome'];
                    $usuariosArray[$pos]['email'] = $_POST['email'];

                }
            }

            $json = json_encode($usuariosArray, JSON_PRETTY_PRINT);
            file_put_contents('usuarios.json', $json);

        }
    }


    if (isset($_GET['acao']) and $_GET['acao'] == 'editar'){

        echo "tentou editar o contato ". $_GET['idContato'];

        foreach ($usuariosArray as $contato){

            if ($contato['number'] == $_GET['idContato']){

                $contatoEncontrado = $contato;
                break;

            }
        }
    }




?>

<form method="post" action="?acao=cadastrar">

    <input type="hidden" name="number" value="<?= @$contatoEncontrado['number'] ?>">
    
    <input name="nome" value="<?= @$contatoEncontrado['name'] ?>" type="text" placeholder="nome contato">
    <input name="email" value="<?= @$contatoEncontrado['email'] ?>" type="text" placeholder="email">
    <input type="submit">
</form>



<table>
    <tr>
        <td>nome</td>
        <td>e-mail</td>
        <td>número</td>
        <td>editar</td>
        <td>excluir</td>
    </tr>

    <?php foreach ($usuariosArray as $pessoa): ?>
    <tr>
        <td><?= $pessoa['name'] ?></td>

        <td>
            <a href="#"> <?= $pessoa['email'] ?> </a>
        </td>

        <td><?= $pessoa['number'] ?></td>

        <td><a href="?acao=editar&idContato=<?= $pessoa['number'] ?>">editar</a> </td>

        <td><a href="?acao=excluir&idContato=<?= $pessoa['number'] ?>">excluir</a> </td>

    </tr>
    <?php endforeach; ?>
    
</table>
