<?php $v->layout("_theme"); ?>

<section class="blog_page">
    <header class="blog_page_header">
        <h1>BLOG</h1>
        <p>Confira nossas dicas para controlar melhor suas contas</p>
        <form name="search" action="<?= url("/blog"); ?>" method="post" enctype="multipart/form-data">
            <label>
                <input type="text" name="s" placeholder="Encontre um artigo:"/>
                <button class="icon-search icon-notext"></button>
            </label>
        </form>
    </header>

    <!--EMPTY CONTENT-->
    <div class="content content">
        <div class="empty_content">
            <img class="empty_content_cover" title="Empty Content" alt="Empty Content"
                 src="<?= theme("/assets/images/empty-content.jpg"); ?>"/>
            <h3 class="empty_content_title">Ooops, não temos conteúdo aqui :/</h3>
            <p class="empty_content_desc">Ainda estamos trabalhando, em breve teremos novidades para você :)</p>
            <a href="<?= url("/blog"); ?>" title="Blog"
               class="empty_content_btn gradient gradient-green gradient-hover radius">Voltar ao blog</a>
        </div>
    </div>

    <!--BLOG-->
    <div class="blog_content container content">
        <div class="blog_articles">
            <?php for ($i = 0; $i <= 8; $i++): ?>
                <?php $v->insert("blog-list"); ?>
            <?php endfor; ?>
        </div>

        <?= $paginator; ?>
    </div>
</section>