<article class="auth">
    <div class="auth_content container content">
        <header class="auth_header">
            <h1>Recuperar senha</h1>
            <p>Informe seu e-mail para receber um link de recuperação.</p>
        </header>

        <form class="auth_form" action="" method="post" enctype="multipart/form-data">
            <label>
                <div class="unlock-alt">
                    <span class="icon-envelope">Email:</span>
                    <span><a title="Recuperar senha" href="?file=auth-login">Voltar e entrar!</a></span>
                </div>
                <input type="email" name="email" placeholder="Informe seu e-mail:"/>
            </label>

            <button class="auth_form_btn transition gradient gradient-green gradient-hover">Recuperar</button>
        </form>
    </div>
</article>

<?php require __DIR__ . "/optout.php"; ?>