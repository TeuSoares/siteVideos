<?php
session_start();
if(!isset($_SESSION["nomeUsuario"])){
     header("location:login.php?origem=login");
     exit;
}

include("Banco-SQL.php");

$idVideo = "";
$compositor = "";
$musica = "";
$link = "";
$foto = "";
$genero = "";

if(isset($_GET["idVideo"])){             // Existe?
    if(is_numeric($_GET["idVideo"])){   // É numérico?
        $idVideo = $_GET["idVideo"];        // Recupera o valor do parâmetro
        $sql = "SELECT * FROM videos WHERE IdVideo=$idVideo";
        $resultado = $conexao->query($sql); 
        while($linha = mysqli_fetch_array($resultado)){
            $idVideo = $linha["IdVideo"];
            $compositor = $linha["compositor"];
            $musica = $linha["musica"];
            $link = $linha["link"];
            $foto = $linha["foto"];
            $genero = $linha["genero"];
        }
    }
}
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
            <h1>Gerenciamento de Vídeos</h1>
            
        <form name="form1" method="POST" enctype="multipart/form-data" action="gravarVideo.php?idVideo=<?php echo $idVideo; ?>">
        <div class="painel-Adm">
            <p class="adm-P">Compositor: <br>
                <input name="compositor" type="text" class="campo" value="<?php echo $compositor; ?>">
            </p>
            <p class="adm-P">Genêro: <br>
                <input name="genero" type="text" class="campo" value="<?php echo $genero; ?>">
            </p>
            <br>
            <p class="adm-P">Música: <br>
                <input name="musica" class="campo" type="text" value="<?php echo $musica; ?>">
            </p>
            <br>
            <p class="adm-P">Link do Youtube: <br>
                <input name="link" type="text" class="campo" value="<?php echo $link; ?>">
            </p>
            <p class="adm-P">Foto: <br>
                <input name="foto" type="file"/>
            </p>
            <br>
            <p>
                <input name="gravar" type="submit" class="botao" value="Gravar Dados" onclick="return validar();">
            </p>
        </div>
        </form>
        </article>
          
    </section>

</body>
</html>