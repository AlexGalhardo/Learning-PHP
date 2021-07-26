<?php $v->layout("_theme"); ?>

    <article class="post_page">
        <header class="post_page_header">
            <div class="post_page_hero">
                <h1>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloremque, iure!</h1>
                <img class="post_page_cover" alt="" title="" src="<?= theme("/assets/images/home-featured.jpg"); ?>"/>
                <div class="post_page_meta">
                    <div class="author">
                        <div><img src="<?= theme("/assets/images/avatar.jpg"); ?>"/></div>
                        <div class="name">Por: Robson V. Leite</div>
                    </div>
                    <div class="date">Dia 11/10/2018 - 14h22</div>
                </div>
            </div>
        </header>

        <div class="post_page_content">
            <div class="htmlchars">
                <h2>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A, architecto aut cupiditate doloremque
                    ducimus
                    error expedita illo nesciunt nulla quo.</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci doloribus quibusdam quis
                    repellendus,
                    similique totam.</p>

                <ul class="generic-list">
                    <li class="item">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto, asperiores.
                    </li>
                    <li class="item">Ducimus, eos minus. Amet asperiores, facilis laborum pariatur sequi voluptatibus.
                    </li>
                    <li class="item">Commodi cupiditate ea in incidunt laboriosam modi nostrum ullam voluptas?</li>
                    <li class="item">Dignissimos, exercitationem explicabo facilis iste pariatur praesentium repellendus
                    </li>
                </ul>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci consectetur quas temporibus veniam
                    voluptas. Dicta facere id incidunt ipsum neque rerum veritatis voluptatibus! Corporis cum
                    dignissimos,
                    laudantium nemo perspiciatis ut?</p>

                <h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias, vero.</h3>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus atque autem doloremque ea enim
                    exercitationem facilis fugit iste laboriosam magni odio repellendus saepe, sit tempore.</p>

                <ol>
                    <li>Lorem ipsum dolor sit.</li>
                    <li>Corporis esse possimus sit!</li>
                    <li>Consequatur delectus fuga qui.</li>
                </ol>

                <p>Aliquid architecto aspernatur assumenda, commodi consequuntur earum eum facilis inventore non
                    obcaecati
                    odit
                    officia quam qui quidem quos reprehenderit sapiente vitae. Consequuntur fugiat neque vel.</p>

                <img alt="" title="" src="<?= theme("/assets/images/home-featured.jpg"); ?>"/>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci, aliquam cupiditate labore natus
                    nostrum
                    soluta veniam? Amet, autem blanditiis consequuntur corporis culpa cumque cupiditate dolor earum eos
                    esse
                    explicabo, impedit laudantium nostrum omnis, optio pariatur porro qui recusandae reiciendis rem
                    sapiente
                    tenetur ut. Blanditiis doloremque ipsa quod sequi. Dolore, temporibus!</p>

                <p>Amet asperiores debitis impedit minus, nobis pariatur porro sunt suscipit vitae! Accusamus
                    consequuntur
                    debitis eos explicabo laudantium magnam nesciunt saepe unde? <a href="#">Lorem ipsum dolor.</a>
                    Distinctio
                    fugit inventore iste nesciunt,
                    nostrum odit perspiciatis saepe!</p>

                <p>Consequatur dolores error est fugiat inventore ipsa magnam nemo nesciunt, nobis numquam obcaecati
                    perferendis
                    quisquam ratione rem reprehenderit sequi temporibus. Accusantium autem beatae dolore doloremque
                    laborum
                    molestias, unde! Autem, veritatis.</p>
            </div>

            <aside class="social_share">
                <h3 class="social_share_title icon-heartbeat">Ajude seus amigos a controlar:</h3>
                <div class="social_share_medias">
                    <!--facebook-->
                    <div class="fb-share-button" data-href="<?= $data->url; ?>" data-layout="button_count"
                         data-size="large"
                         data-mobile-iframe="true">
                        <a target="_blank"
                           href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode($data->url); ?>"
                           class="fb-xfbml-parse-ignore">Compartilhar</a>
                    </div>

                    <!--twitter-->
                    <a href="https://twitter.com/share?ref_src=site" class="twitter-share-button" data-size="large"
                       data-text="<?= $data->title; ?>" data-url="<?= $data->url; ?>"
                       data-via="<?= str_replace("@", "", CONF_SOCIAL_TWITTER_CREATOR); ?>"
                       data-show-count="true">Tweet</a>
                </div>
            </aside>
        </div>

        <div class="post_page_related content">
            <section>
                <header class="post_page_related_header">
                    <h4>Veja também:</h4>
                    <p>Confira mais artigos relacionados e obtenha ainda mais dicas de controle para suas contas.</p>
                </header>

                <div class="blog_articles">
                    <?php for ($i = 0; $i <= 2; $i++): ?>
                        <?php $v->insert("blog-list"); ?>
                    <?php endfor; ?>
                </div>
            </section>
        </div>
    </article>


<?php $v->start("scripts"); ?>
<div id="fb-root"></div>
<script>(function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = 'https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v3.1&appId=267654637306249&autoLogAppEvents=1';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
<?php $v->end(); ?>