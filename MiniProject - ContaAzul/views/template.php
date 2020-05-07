<html>
    <head>
        <meta charset="UTF-8">
        <title>Painel - <?php echo $viewData['company_name']; ?></title>
        <link href="<?php echo BASE_URL; ?>/assets/css/template.css" rel="stylesheet" />
        <script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/jquery-1.7.1.min.js"></script>
        <script type="text/javascript">var BASE_URL = '<?php echo BASE_URL; ?>';</script>
        <script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/script.js"></script>
    </head>
    <body>
    	<div class="leftmenu">
    		<div class="company_name">
    			<?php echo $viewData['company_name']; ?>
    		</div>
            <div class="menuarea">
                <ul>
                    <li><a href="<?php echo BASE_URL; ?>">Home</a></li>
                    <li><a href="<?php echo BASE_URL; ?>/permissions">Permissões</a></li>
                    <li><a href="<?php echo BASE_URL; ?>/users">Usuários</a></li>
                    <li><a href="<?php echo BASE_URL; ?>/clients">Clientes</a></li>
                    <li><a href="<?php echo BASE_URL; ?>/inventory">Estoque</a></li>
                    <li><a href="<?php echo BASE_URL; ?>/sales">Vendas</a></li>
                    <li><a href="<?php echo BASE_URL; ?>/purchases">Compras</a></li>
                    <li><a href="<?php echo BASE_URL; ?>/report">Relatórios</a></li>
                </ul>
            </div>
    	</div>
    	<div class="container">
    		<div class="top">
    			<div class="top_right"><a href="<?php echo BASE_URL.'/login/logout'; ?>">Sair</a></div>
    			<div class="top_right"><?php echo $viewData['user_email']; ?></div>    			
    		</div>
            <div class="area">
                <?php $this->loadViewInTemplate($viewName, $viewData); ?>
            </div> 
    	</div>
    </body>
</html>
