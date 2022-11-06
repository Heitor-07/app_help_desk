<?php

    session_start();

    $usuario_autendicado = false;
    $id_usuario = null;
    $perfil_usuario_id = null;


    // usuários do sistema
    $usuario_app = array(
        array('id' => 1, 'email' => 'adm@test.com.br', 'senha' => '123456', 'perfil_usuario' => 1),
        array('id' => 2, 'email' => 'heitor@gmail.com', 'senha' => '123456', 'perfil_usuario' => 2),
        array('id' => 3,'email' => 'joao@test.com.br', 'senha' => '123456', 'perfil_usuario' => 2),
        array('id' => 4,'email' => 'maria@gmail.com', 'senha' => '123456', 'perfil_usuario' => 2),
    );

    /* echo '<pre>';
        print_r($usuario_app);
    echo '</pre>'; */

      foreach ($usuario_app as $user) {
        # code...
        if($_POST['email'] == $user['email'] && $_POST['senha'] == $user['senha']){
            $usuario_autendicado = true;
            $id_usuario = $user['id'];
            $perfil_usuario_id = $user['perfil_usuario'];
        }
    }
    
    if($usuario_autendicado){
        $_SESSION['autenticado'] = 'SIM';
        $_SESSION['id'] = $id_usuario;
        $_SESSION['perfil_id'] = $perfil_usuario_id;
        header('Location: home.php');
    }else{
        $_SESSION['autenticado'] = 'NAO';
        header('Location: index.php?login=erro');
    }
    

?>