<?php
include("Banco-SQL.php");

$idVideo = $_GET["idVideo"];
$compositor = $_POST["compositor"];
$musica = $_POST["musica"];
$link = $_POST["link"];
$genero = $_POST["genero"];

$link = str_replace("'","\'",$link);

$foto = $_FILES["foto"]["name"];            // Nome do arquivo
$foto_temp = $_FILES["foto"]["tmp_name"];  // Local onde ele está sendo gravado

if($foto!=""){
list($largura,$altura,$tipo) = getimagesize($foto_temp);    // Comando list(), usada para criar varias variaveis ao mesmo tempo
    if($tipo==1 or $tipo==2 or $tipo==3){   // 1 = GIF 2 = JPG 3 = PNG
        copy($foto_temp,"photos/$foto");   // Este comando esta transferindo o arquivo do local temporario que ele foi gravado para uma pasta definitiva

        include "wideImage2/lib/WideImage.php";
        $image = WideImage::load("photos/$foto");
        $resized = $image->resize(206, 170);
        $resized->saveToFile("photos/$foto");
    }
}

if(is_numeric($idVideo)){

    $sql = "UPDATE videos SET
    compositor='$compositor',genero='$genero',musica='$musica',link='$link'
    WHERE IdVideo=$idVideo";

    if($foto!=""){
        $sql2 = "UPDATE videos SET foto='$foto' WHERE IdVideo=$idVideo";
        $conexao->query($sql2);
    }

}else{
    $sql = "INSERT INTO videos(compositor,genero,musica,link,foto)
    VALUES
    ('$compositor','$genero','$musica','$link','$foto')";
}

$conexao->query($sql);
$conexao->close();

header("location:admVideo.php");
//echo $sql;
?>