<section class="about_page">
    <div class="about_page_content content">
        <header class="about_header">
            <h1>É simples, fácil e gratuito!</h1>
            <p>Com o CaféControl você controla suas contas a pagar e receber e conta com automações e relatórios
                podoresos
                para controlar tudo enquanto toma um bom café.</p>
        </header>

        <!--FEATURES-->
        <div class="about_page_steps">
            <article class="radius">
                <header>
                    <span class="icon icon-check-square-o icon-notext"></span>
                    <h3>Cadastre-se para começar</h3>
                    <p>Basta informar seus dados e confirmar seu cadastro para começar a usar GRATUITAMENTE os recursos
                        do
                        CaféControl.</p>
                </header>
            </article>

            <article class="radius">
                <header>
                    <span class="icon icon-leanpub icon-notext"></span>
                    <h3>Lance suas contas</h3>
                    <p>Cadastre suas despesas, contas a pagar e receber, recebíveis e recorrentes em uma interface
                        simples e
                        muito intuitiva.</p>
                </header>
            </article>

            <article class="radius">
                <header>
                    <span class="icon icon-coffee icon-notext"></span>
                    <h3>Obtenha o controle</h3>
                    <p>As automações do CaféControl se encarregam de gerar todos os dados necessários para você obter
                        controle simplificado.</p>
                </header>
            </article>
        </div>
    </div>

    <div class="about_page_media">
        <div class="about_media_video">
            <div class="embed">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/lDZGl9Wdc7Y?rel=0&amp;showinfo=0"
                        frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
            </div>
        </div>
    </div>

    <aside class="about_page_cta">
        <div class="about_page_cta_content container content">
            <h2>Ainda não está usando o CaféControl?</h2>
            <p>Com ele você tem todos os recursos necessários para controlar suas contas. Crie sua conta e comece a
                agora! É simples, fácil e gratuit...</p>
            <a href="?file=auth-register" title="Cadastre-se"
               class="about_page_cta_btn transition radius icon-check-square-o">Quero controlar</a>
        </div>
    </aside>
</section>

<section class="faq">
    <div class="faq_content content container">
        <header class="faq_header">
            <img class="title_image" title="Perguntas frequentes" alt="Perguntas frequentes"
                 src="assets/images/faq-title.jpg"/>
            <h3>Perguntas frequentes:</h3>
            <p>Confira as principais dúvidas e repostas sobre o CaféControl.</p>
        </header>
        <div class="faq_asks">
            <?php for ($i = 0; $i < 6; $i++): ?>
                <article class="faq_ask j_collapse">
                    <h4 class="j_collapse_icon icon-plus">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        Deserunt, soluta.</h4>
                    <div class="faq_ask_coll j_collapse_box">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus amet aperiam in pariatur
                            quaerat, qui saepe tenetur ut vero vitae.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio, repudiandae.</p>
                    </div>
                </article>
            <?php endfor; ?>
        </div>
    </div>
</section>

<?php require __DIR__ . "/optout.php"; ?>