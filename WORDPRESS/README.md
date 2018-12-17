<p align="center">
  <a href="https://wordpress.org/">
    <img src="wordpress.png" alt="" width=256 height=200>
  </a>

  <p align="center">
    Learning Wordpress to make awesome CMS systems :smile:
    <br>
  </p>

<br><br>

## References

 - Courses
    - [Origamid - Wordpress como CMS](https://www.origamid.com/curso/wordpress-como-cms)
 - Tutorials
    - Configure FTP Localhost
       - [Docs Transfer Files FTP](http://localhost/dashboard/docs/transfer-files-ftp.html)
 - Sites
    - [WP Beginner](https://www.wpbeginner.com/)
    - [WP Hierarchy](https://wphierarchy.com/)
    - [WP Cli](http://wp-cli.org/)
    - [ManageWP](https://managewp.com/)
 - Recommended Plugins
    - [WP Super Cache](https://wordpress.org/plugins/wp-super-cache/)
    - [StarRating](https://wordpress.org/plugins/yet-another-stars-rating/)
    - [All in One Schema rich snipptets](https://wordpress.org/plugins/all-in-one-schemaorg-rich-snippets/?utm_source=blog&utm_campaign=rc_blogpost)
    - [Advanced Custom Fields](https://www.advancedcustomfields.com/)
    - [AMP for WP – Accelerated Mobile Pages](https://br.wordpress.org/plugins/accelerated-mobile-pages/)
    - [Woocomerce](https://woocommerce.com)
    - [WPTouch](https://br.wordpress.org/plugins/wptouch)
    - [Yoast SEO Plugin](https://yoast.com/wordpress/plugins/seo/)
    - [Autoptimize](https://wordpress.org/plugins/autoptimize/)
    - [EWWW Image Optimizer](https://br.wordpress.org/plugins/ewww-image-optimizer/)
 - Themes
    - [ThemeForest](http://themeforest.net/category/wordpress)
    - [ThemeFuse](http://themefuse.com/)
 - Security
    - [Sucuri](https://sucuri.net/)
 - CDN
    - [CloudFlare]()
    - [StackPath](https://www.stackpath.com/)
 - Forum
    - [BBPress](https://bbpress.org/)
  - Checklist
    - [WP Security Checklist](https://wpsecuritychecklist.org/br/items/)

## Criando Temas Wordpress - Origamid
```
// Instalar o Wordpress

1 - Download do Wordpress (wordpress.org)

2 - Criar uma pasta do repositório de sites do MAMP

3 - Extrair os arquivos do Wordpress nela

4 - Criar um Banco de Dados no phpMyAdmin
Abra o phpMyAdmin > Databates > Escolha o nome > Clique em Create

5 - Criar o usuário do Banco de Dados
phpMyAdmin > Users > Add User > Nome, host(localhost), password.
Maque Check All em Global Privileges

6 - Acessar o site e instalar o Wordpress

7 - Criar o usuário do wordpress

// Após Instalar o Wordpress

1 - Copiar a pasta do site para wp-content/themes/

2 - Mudar o index.html para index.php

3 - Colocar/criar o arquivo style.css na raiz do tema
@import 'css/reset.css';

4 - Adicionar a descrição do tema no topo do style.css
/*
Theme Name: Rest
Theme URI: http://rest.com
Author: André Rafael
Author URI: http://origamid.com/
Description: Tema criado para o restaurante Rest
Version: 1.0
*/

5 - Ativar o tema no Wordpress

6 - Corrigir o caminho do style.css e outros caminhos se necessário
<?php echo get_stylesheet_directory_uri(); ?>
Essa função adiciona o caminho até a raiz do tema

7 - Separar o header e footer em arquivos header.php e footer.php
Adicionar antes de fechar o head: <?php wp_head(); ?>
Adicionar antes de fechar o body: <?php wp_footer(); ?>
Adicionar o header e footer nas páginas do site e mudá-las para .php
Com <?php get_header(); ?> e <?php get_footer(); ?>

8 - Começar a substituir o conteúdo por funções de Wordpress

<?php bloginfo('name'); ?>
Mostra o nome do blog

9 - Transformar as páginas em HTML, em templates de Páginas
A página index.php deve estar reservada para conteúdo genérico.
Adicionar o nome page- na frente de cada template de página para facilitar a organização.
<?php
// Template Name: Sobre

10 - Transformar as páginas em HTML, em templates de Páginas
A página index.php deve estar reservada para conteúdo genérico.
Adicionar o nome page- na frente de cada template de página para facilitar a organização.
<?php
// Template Name: Sobre
?>

11 - Adicionar o Loop
O Loop é utilizado para mostrar o conteúdo dos posts,
ele é inteligente o suficiente para saber se precisa mostrar apenas um ou uma sequência.

Adicionar o Loop as páginas e ao index.php

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	
	<?php the_title(); ?>
	<?php the_content(); ?>

<?php endwhile; else: ?>
<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>

12 - Advanced Custom Fields

Adicionar o Plugin Advanced Custom Fields Pro
(Nota: O Pro é pago e só pode ser utilizado nos arquivos do curso).
(Existem alternativas, mas a lógica é a mesma)

Iniciar a troca do conteúdo por fields, <?php the_field('nome_conteudo'); ?>
Adicionar o conteúdo a interface do Custom Fields.

13 - Repeater Field

<?php if(have_rows('nomedorepeater')): while(have_rows('nomedorepeater')) : the_row(); ?>
	
	the_sub_field('nomedocampo');

<?php endwhile; else : endif; ?>

14 - Pegar valores de outras páginas

<?php
	$contato = get_page_by_title('contato');
	the_field('telefone', $contato)
?>

15 - Terminar de adicionar os outros campos
<?php echo date("Y"); ?> (Mostrar a data)

16 - Adicionar campos para SEO
<title><?php bloginfo('name'); ?> - <?php wp_title(''); ?> <?php the_field('title_seo'); ?></title>
<meta name="description" content="<?php bloginfo('name'); ?> - <?php wp_title(''); ?> <?php the_field('description_seo'); ?>">

17 - Adicionar o Functions.php

// Funções para Limpar o Header
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'start_post_rel_link', 10, 0 );
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_styles', 'print_emoji_styles');

18 - Adicionar o Menu

// Habilitar Menus
add_theme_support('menus');

function register_my_menu() {
  register_nav_menu('header-menu',__( 'Header Menu' ));
}
add_action( 'init', 'register_my_menu' );

<?php
	$args = array(
		'menu' => 'principal',
		'container' => false
	);
	wp_nav_menu( $args );
?>
?>

```

