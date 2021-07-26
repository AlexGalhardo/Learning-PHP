<?php $v->layout("theme"); ?>

<!--FEATURED-->
<article class="home_featured">
    <div class="home_featured_content container content">
        <header class="home_featured_header">
            <h1>Contas a pagar e receber? Comece a controlar!</h1>
            <p>Cadastre-se, lance suas contas e conte com automações poderosas para gerenciar tudo enquanto você toma um
                bom café!</p>
            <p><span data-go=".home_optin"
                     class="home_featured_btn gradient gradient-green gradient-hover radius transition icon-check-square-o">Criar
                    minha conta e começar a controlar</span></p>
            <p class="features">Rápido | Simples | Gratuito</p>
        </header>
    </div>

    <div class="home_featured_app">
        <img src="<?= theme("/assets/images/home-app.jpg"); ?>" alt="CafeControl" title="CafeControl"/>
    </div>
</article>

<!--FEATURES-->
<div class="home_features">
    <section class="container content">
        <header class="home_features_header">
            <h2>O que você pode fazer com o CafeControl?</h2>
            <p>São 3 paços simples para você começar a controlar suas contas. É tudo muito fácil, veja:</p>
        </header>

        <div class="home_features_content">
            <article class="radius">
                <header>
                    <img alt="Contas a receber" title="Contas a receber"
                         src="<?= theme("/assets/images/home_receive.jpg"); ?>"/>
                    <h3>Contas a receber</h3>
                    <p>Cadastre seus recebíveis, use as automações para salários, contratos e recorrentes e comece a
                        controlar tudo que entra em sua conta. É rápido!</p>
                </header>
            </article>

            <article class="radius">
                <header>
                    <img alt="Contas a pagar" title="Contas a pagar"
                         src="<?= theme("/assets/images/home_pay.jpg"); ?>"/>
                    <h3>Contas a pagar</h3>
                    <p>Cadastre suas contas a pagar, despesas, use as automações para contas fixas e parcelamentos e
                        controle tudo que sai de sua conta. É simples!</p>
                </header>
            </article>

            <article class="radius">
                <header>
                    <img alt="Controle e relatórios" title="Controle e relatórios"
                         src="<?= theme("/assets/images/home_control.jpg"); ?>"/>
                    <h3>Controle e relatórios</h3>
                    <p>Contas e recebíveis cadastrados? Pronto, agora você tem tudo controlado enquanto toma um bom café
                        e acompanha os relatórios. É gratuito!</p>
                </header>
            </article>
        </div>
    </section>
</div>

<!--OPTIN-->
<article class="home_optin">
    <div class="home_optin_content container content">
        <header class="home_optin_content_flex">
            <h2>Cadastre-se no CaféControl e comece a controlar suas contas hoje mesmo</h2>
            <p>Receber e pagar é uma tarefa comum do dia a dia, o CafeControl é um gerenciador de contas simples, fácil
                e gratuito para ajudar você nessa tarefa.</p>
            <p>Com ele você lança suas contas, cria recorrências e conta com atuomações e relatórios poderosos que
                controlam tudo enquanto você toma um bom café.</p>
            <p>Pronto para começar a controlar?</p>
        </header>

        <div class="home_optin_content_flex">
            <span class="icon icon-check-square-o icon-notext"></span>
            <h4>Crie sua conta gratuitamente:</h4>
            <form action="<?= url("cadastro"); ?>" method="post" enctype="multipart/form-data">
                <input type="text" name="first_name" placeholder="Primeiro nome:"/>
                <input type="text" name="last_name" placeholder="Último nome:"/>
                <input type="email" name="email" placeholder="Melhor e-mail:"/>
                <input type="password" name="password" placeholder="Senha de acesso:"/>
                <button class="radius transition gradient gradient-green gradient-hover">Criar minha conta</button>
            </form>
        </div>
    </div>
</article>

<!--VIDEO-->
<article class="home_video">
    <div class="home_video_content container content">
        <header>
            <h2>Descubra o CafeControl</h2>
            <span data-modal=".home_video_modal" class="icon-play-circle-o icon-notext transition"></span>
        </header>
    </div>

    <div class="home_video_modal j_modal_close">
        <div class="home_video_modal_box">
            <div class="embed">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/lDZGl9Wdc7Y?rel=0&amp;showinfo=0"
                        frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</article>

<!--BLOG-->
<section class="blog">
    <div class="blog_content container content">
        <header class="blog_header">
            <h2>Nossos artigos</h2>
            <p>Confira nossas dicas para controlar melhor suas contas</p>
        </header>

        <div class="blog_articles">
            <?php for ($i = 0; $i <= 5; $i++): ?>
                <?php $v->insert("views/blog-post"); ?>
            <?php endfor; ?>
        </div>
    </div>
</section>