<?php

    session_start();



    // Capturando o texto do formulário 
    if($_POST['titulo'] == '' || $_POST['categoria'] == '' || $_POST['descricao'] == ''){
        $_SESSION['campos'] = 'preencha todos os campos';
    }else{
        $titulo = str_replace('#', '-', $_POST['titulo']);
        $categoria = str_replace('#', '-', $_POST['categoria']);
        $descricao = str_replace('#', '-', $_POST['descricao']);
        
        // colocando as informações das variáveis e montando um texto
        $texto = $_SESSION['id'] . '#' . $titulo . '#' . $categoria . '#' . $descricao . '#' . $_SESSION['perfil_id'] . PHP_EOL;

        // abrindo o arquivo
        $arquivo = fopen('../../app_help_desk/chamados.txt', 'a');
    
        // escrevendo o texto no arquivo
        fwrite($arquivo, $texto); 

        // fechando o arquivo
        fclose($arquivo);

        //echo $texto;
        $_SESSION['campos'] = '';
    }

    header('Location: abrir_chamado.php');

    

    
?>