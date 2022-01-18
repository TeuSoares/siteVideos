<?php

include("Banco-SQL.php");

$compositor = "";
$musica = "";
$link = "";
$foto = "";
$url = "";
$linkYoutube = "";

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

            if($foto!=""){      //!= - Diferente
                $foto = "<img src='photos/$foto'>";
            }

        }
    }
}


// Código das Box
$sql2 = "SELECT IdVideo,link,foto,compositor,musica FROM videos ORDER BY rand() LIMIT 5";
$resultado = $conexao->query($sql2); 
//echo $sql2;

$compositor2 = "";
$idVideo = "";
$video1 = "";
$nomeCompositor = "";
while($linha = mysqli_fetch_array($resultado)){             // Criando a condição para visualizar os dados do banco na página
    $idVideo = $linha["IdVideo"];
    $compositor2 = $linha["compositor"];
    $foto2 = $linha["foto"];

    if($foto2!=""){      //!= - Diferente
        $foto2 = "<img class='fotoVideo' src='photos/$foto2'>";
    }

    $nomeCompositor.="<div class='boxH2'><a class='boxH2' href='index.php?idVideo=$idVideo'>$compositor2</a></div>";
    $video1.="<a class='img-Id' href='index.php?idVideo=$idVideo'>$foto2</a>";
}


/*************************/


// Codigo Mais Vídeos */
$maisVideos = "";
$compositor1 ="";

if(isset($_GET["compositor"])){             // Existe?
        $compositor1 = $_GET["compositor"];        // Recupera o valor do parâmetro
        $sql3 = "SELECT * FROM videos WHERE compositor=$compositor1";
        $resultado = $conexao->query($sql3);  

        while($linha = mysqli_fetch_array($resultado)){
            $compositor = $linha["compositor"];
    }
}

$sql1 = "SELECT compositor FROM videos ORDER BY rand()";
$resultado = $conexao->query($sql1); 
//echo $sql2;

while($linha = mysqli_fetch_array($resultado)){             // Criando a condição para visualizar os dados do banco na página
    $compositor1 = $linha["compositor"];

    $maisVideos.="<div class='box6 box'><p class='box6-P'><a href='listaVideos.php?compositor=$compositor1'>MAIS VÍDEOS</a></p></div>";
}


/*************************/


// Código inicial da index(Start)
$musica3 = "";
$link3 = "";

$sql3 = "SELECT musica,link FROM videos ORDER BY rand()";
$resultado = $conexao->query($sql3); 
//echo $sql2;

while($linha = mysqli_fetch_array($resultado)){             // Criando a condição para visualizar os dados do banco na página
    $musica3 = $linha["musica"];
    $link3 = $linha["link"];

    if(isset($_GET["idVideo"])){
        $link3 = "";
        $musica3 = "";
    }else{
        $musica3 = $linha["musica"];
        $link3 = $linha["link"];
    }

}

$conexao->close();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <title>Site de Vídeos</title>
</head>
<body>
    <?php include("topo.php")?>

    <article>
        <div class="banner">
            <img src="img/bannerMax2.jpg" alt="">
            <div class="background-fundo">
                <img src="" alt="">
            </div>
        </div>

        <br><br>
        <section>
            <div class="boxprincipal" id="caixaprincipal">
                
                    <?php echo $video1; ?>
                    <?php echo $nomeCompositor; ?>
                    
                    <?php echo $maisVideos; ?>
            </div>
            
        </section>

        <br><br>
        <h1><i class="fas fa-music"></i> &nbsp;<?php echo $musica3; ?><?php echo $musica; ?></h1>
        <div class="container-video">
            <div class="boxVideo"><?php echo $link3; ?><?php echo $link; ?></div>
        </div>
    </article>
    
</body>
</html>