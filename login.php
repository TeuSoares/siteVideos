<?php
session_start();
$usuario = "";
$senha = "";
$erro = "";

include("Banco-SQL.php");


if(isset($_POST["acessar"])){
    
    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];

    $sql = "SELECT * FROM usuarios WHERE usuario='$usuario' and senha='$senha'";
    $resultado = $conexao->query($sql);

    while($linha = mysqli_fetch_array($resultado)){
        $usuario = $linha["usuario"];
        $senha = $linha["senha"];
        $_SESSION["nomeUsuario"] = $usuario;
        if(isset($_GET["origem"])){
            $origem = $_GET["origem"];
         }

        header("location:admVideo.php?origem=login");
        exit;
    }
        $erro = "Dados inválidos. Tente novamente.";
}

?>
<!DOCTYPE html>

<html lang="pt-br">
<head>
    <meta charset="utf-8"/>
    <title>Página modelo do site</title>
    <meta name="description" content="Descrição da página..."/>
    <link type="text/css" rel="stylesheet" href="style.css"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>
<body class="pagADM">
    <?php
        include("topo.php");
        ?>

        <article>
            <h1>Login</h1>
            
            <form name="form1" method="POST" action="">
            <div class="painelControl">
                <p class="adm-P">Usuario: <br>
                <input name="usuario" type="text" class="campo2"></p>
                
                <p class="adm-P">Senha: <br>
                <input name="senha" type="password" class="campo2"></p>

                <p class="adm-P">
                    <input name="acessar" class="botao" type="submit" value="Acessar">
                </p>
                <p><?php echo $erro; ?></p>
            </div>
        </form>
        
        </article>   

</body>
</html>