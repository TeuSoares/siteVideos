<?php
$menu = "";

if(isset($_SESSION["nomeUsuario"])){
    $menu = "<a href='index.php'>Home Site</a>
            <a href='admVideo.php'>Gerenciar Vídeos</a>
            <a href='addVideo.php'>Inserir Vídeos</a>
            <a href='sair.php'>Sair</a>";
}else{
    $menu = "<a href='login.php'>Login</a>
            <a href='index.php'>Vídeos</a>
            <a href='listaVideos.php'>Lista de Vídeos</a>";
}
?>
<header class="header">
        <nav>
            <div class="menu1">
                <?php echo $menu; ?>
            </div>

        </nav>
</header>