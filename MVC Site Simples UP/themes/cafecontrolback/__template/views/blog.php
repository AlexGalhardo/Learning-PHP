<section class="blog_page">
    <header class="blog_page_header">
        <h1>BLOG</h1>
        <p>Confira nossas dicas para controlar melhor suas contas</p>
        <form name="search" action="" method="post" enctype="multipart/form-data">
            <label>
                <input type="text" name="s" placeholder="Encontre um artigo:"/>
                <button class="icon-search icon-notext"></button>
            </label>
        </form>
    </header>

    <!--BLOG-->
    <div class="blog_content container content">
        <div class="blog_articles">
            <?php
            for ($i = 0; $i <= 8; $i++):
                require __DIR__ . "/article.php";
            endfor;
            ?>
        </div>

        <nav class="paginator">
            <a class='paginator_item' title="Primeira página" href="?file=blog&page=1"><<</a>
            <span class="paginator_item paginator_active">1</span>
            <a class='paginator_item' title="Página 2" href="?file=blog&page=2">2</a>
            <a class='paginator_item' title="Página 3" href="?file=blog&page=3">3</a>
            <a class='paginator_item' title="Página 4" href="?file=blog&page=4">4</a>
            <a class='paginator_item' title="Última página" href="?file=blog&page=10">>></a>
        </nav>
    </div>
</section>

<?php require __DIR__ . "/optout.php"; ?>