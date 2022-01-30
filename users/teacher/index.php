<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-success">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                    <a class="nav-link" href="./list/listwork.php">Gerenciar Atividades</a>
                    <a class="nav-link" href="./list/listworklevel.php">Gerenciar Nivel Das Atividades</a>
                    <a class="nav-link" href="./list/listworkcategory.php">Gerenciar Categoria Das Atividades</a>
                    <a class="nav-link" href="./list/listboard.php">Gerenciar Tabuleiros</a>
                    <a class="nav-link" href="./list/listbackgroundboard.php">Gerenciar Fundo Tabuleiro</a>
                    <a class="nav-link" href="./list/listimages.php">Gerenciar Imagens</a>
                    <a class="nav-link" href="../../login/historicoacesso.php?opcao=Logout">Logout</a>
                </div>
            </div>
        </div>
    </nav>
</header>
<main>
    <div class="container">
        <p>
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
        </p>
    </div>
</main>

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php';
?>