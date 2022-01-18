<?php
include("BancodeDados.php");
include("funcoes.php");

$data = "";
$titulo = "";
$texto = "";
$foto = "";

if(isset($_GET["idNoticias"])){             // Existe?
    if(is_numeric($_GET["idNoticias"])){   // É numérico?
        $idNoticias = $_GET["idNoticias"];        // Recupera o valor do parâmetro
        $sql = "SELECT * FROM noticias WHERE idNoticias=$idNoticias";
        $resultado = $conexao->query($sql); 
        while($linha = mysqli_fetch_array($resultado)){
            $idNoticias = $linha["idNoticias"];
            $titulo = $linha["titulo"];
            $texto = $linha["texto"];
            $data = $linha["data"];
            $foto = $linha["foto"];

            $data = date("d/m/Y",strtotime($data));

            if($foto!=""){      //!= - Diferente
                $foto = "<img class='fotoNoticia' src='galeria/$foto'>";
            }

            $texto = str_replace("[foto]",$foto,$texto);    // Colocando foto no meio do texto
        }
    }
}else{
    header("location:index.php");
    exit;
}

// Notícias relacionadas
$complemento = "";
$novoTitulo = limpaTexto($titulo);
$palavras = explode(" ",$novoTitulo);   // Quebra um texto com um determinado diferencial, exemplo " ", que seria os espaços
foreach($palavras as $palavra){
    if($complemento!=""){
        $complemento.=" or ";
    }
    $complemento.="titulo like '%$palavra%' ";
}


$sql = "SELECT * FROM noticias WHERE $complemento ORDER BY rand()";    // rand() -> função do sql, usa para mostrar os resultados aleatorios
//echo $sql;
$resultado = $conexao->query($sql); 

$lista = "";
while($linha = mysqli_fetch_array($resultado)){             // Criando a condição para visualizar os dados do banco na página
    $idNoticias2 = $linha["idNoticias"];
    $titulo2 = $linha["titulo"];

    $lista.="<li><a href='verNoticia.php?idNoticias=$idNoticias2'>$titulo2</a></li>"; 
}
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
    <?php include("topo.php"); ?>

    <article>
        <div class="banner">
            <img src="img/V1.jpg" alt="">
            <div class="background-fundo">
                <img src="" alt="">
            </div>
        </div>

        <section>
            <div class="boxprincipal" id="caixaprincipal">
                <h2 class="boxH2">Compositor 1</h2>
                    <div class="box1 box"><a href="<?php echo $idVideo; ?>"></a></div>
                <h2 class="boxH2">Compositor 2</h2>
                    <div class="box2 box"></div>
                <h2 class="boxH2">Compositor 3</h2>
                    <div class="box3 box"></div>
                <h2 class="boxH2">Compositor 4</h2>
                    <div class="box4 box"></div>
                <h2 class="boxH2">Compositor 5</h2>
                    <div class="box5 box"></div>
                <div class="box6 box"><p class="box6-P"><a href="videos.php">MAIS VÍDEOS</a></p></div>
            </div>
        </section>

        <br>
        <h1><i class="fas fa-music"></i> &nbsp;Titulo do Vídeo</h1>
        <div class="container-video">
            <img src="img/foto-video.png" alt="">
        </div>
    </article>
    
</body>
</html>