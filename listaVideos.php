<?php
include("Banco-SQL.php");

$compositor1 = "";
$foto = "";
$fotoB = "";
$nomeCompositor = "";
$idVideo = "";
$lista = "";
$genero = "";

if(isset($_GET["compositor"])){             // Existe?
        $compositor1 = $_GET["compositor"];        // Recupera o valor do parâmetro
        $sql = "SELECT * FROM videos WHERE compositor='$compositor1'";
        $resultado = $conexao->query($sql); 
        while($linha = mysqli_fetch_array($resultado)){
            $idVideo = $linha["IdVideo"];
            $compositor1 = $linha["compositor"];
            $foto = $linha["foto"];
            $genero = $linha["genero"];

            if($foto!=""){      //!= - Diferente
                $foto = "<img src='photos/$foto'>";
            }

            $nomeCompositor ="$compositor1";
            $fotoB.="<div class='thumb'><a class='img-Id' href='index.php?idVideo=$idVideo'>$foto</a></div>";
    }
}

$sql4 = "SELECT DISTINCT genero,compositor FROM videos WHERE genero='$genero'";
$resultado = $conexao->query($sql4); 
//echo $sql2;

while($linha = mysqli_fetch_array($resultado)){             // Criando a condição para visualizar os dados do banco na página
$compositor1 = $linha["compositor"];
$genero = $linha["genero"];

$lista.="<li><a href='listaVideos.php?compositor=$compositor1'>$compositor1</a></li>";
}


$generoMusical = "";
$generoH2 = "Escolha seu genêro musical";

if(isset($_GET["genero"])){             // Existe?
    $genero = $_GET["genero"];        // Recupera o valor do parâmetro
    $sql2 = "SELECT compositor FROM videos WHERE genero='$genero'";
    $resultado = $conexao->query($sql2); 
    while($linha = mysqli_fetch_array($resultado)){
        $compositor1 = $linha["compositor"];
        $genero = $linha["genero"];

        header("location:listaVideos.php?&compositor=$compositor1");
    }
}

$sql1 = "SELECT DISTINCT genero FROM videos";
$resultado = $conexao->query($sql1); 
//echo $sql1;

while($linha = mysqli_fetch_array($resultado)){             // Criando a condição para visualizar os dados do banco na página
$genero = $linha["genero"];

    if(isset($_GET["compositor"])){
        $generoMusical = "";
        $generoH2 = "";
    }else{
        $generoMusical.="<a class='generoMusical' href='listaVideos.php?genero=$genero'>$genero</a>";
        $generoH2 = "Escolha seu genêro musical";
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
    <?php
        include("topo.php");
    ?>

<br>
    <div class="banner">
            <img src="img/bannerMax.jpg" alt="">
            <div class="background-fundo">
                <img src="" alt="">
            </div>
    </div>

    <section class="sidebar">

    <div class="conteudo_lateral">
        <aside>
        <h2><i class="fas fa-music"></i>&nbsp;Mais Compositores</h2>
            <ul>
                <?php echo $lista; ?>
            </ul>
        </aside>
    </div>

        <article class="articleLista">
                <h2><?php echo $nomeCompositor; ?></h2>

                <h2><?php echo $generoH2; ?></h2>

            <div class="boxLista" id="listaBox">
                <?php echo $generoMusical; ?>

                <div class="fotosMusic">
                    <div class="box-image"> 
                        <?php echo $fotoB; ?>
                    </div>
                </div>

            </div>

        </article>

    </section>

</body>
</html>