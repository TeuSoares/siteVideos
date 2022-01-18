<?php
session_start();
if(!isset($_SESSION["nomeUsuario"])){
    header("location:login.php?origem=login");
    exit;
}

include("Banco-SQL.php");

// EXCLUIR
if(isset($_GET["acao"])){
    if($_GET["acao"]=="excluir" and is_numeric($_GET["idVideo"])){
        $idVideo = $_GET["idVideo"];
        $sql = "DELETE FROM videos WHERE IdVideo=$idVideo";
        $conexao->query($sql);
    }
}

$sql = "SELECT * FROM videos";
$resultado = $conexao->query($sql);  

$tabela = "
<table class='tabela2'>
    <tr>
        <th>ID</th>
        <th>Compositor</th>
        <th>Genêro</th>
        <th>Música</th>
        <th>#</th>
    </tr>    
";

while($linha = mysqli_fetch_array($resultado)){             // Criando a condição para visualizar os dados do banco na página
    $idVideo = $linha["IdVideo"];
    $compositor = $linha["compositor"];
    $musica = $linha["musica"];
    $genero = $linha["genero"];

    $edita = "<a href='addVideo.php?idVideo=$idVideo'><i class='fas fa-edit'></i></a>";  
    $exclui = "<a href='?acao=excluir&idVideo=$idVideo' onclick='return deletar(); return false;'><i class='far fa-trash-alt'></i></a>";   

    $tabela.="
    <tr>
        <td>$idVideo</td>
        <td>$compositor</td>
        <td>$genero</td>
        <td>$musica</td>
        <td>$edita / $exclui</td>
    </tr> 
    ";
}
$tabela.="</table>";


?>
<!DOCTYPE html>
<html lang="pt-br">
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <title>Site de Vídeos</title>
<body class="pagADM">
    <?php
        include("topo.php");
        ?>

    <section>
        <article>
            <h1>Gerenciamentos de Vídeos</h1>
            
            <?php echo $tabela; ?>
        </article>   
    </section>

</body>
</html>