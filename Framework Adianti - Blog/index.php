<?php
define('THEME', 'theme1');
define('ROOT', getcwd());

chdir('admin');
require_once 'admin/init.php';
require_once 'lib/route/Route.php';

new TSession;

TTransaction::open('blog');

// render a category
Route::get('show_category', function($args)
{
    $partial_article    = file_get_contents(ROOT.'/templates/'.THEME.'/partials/article.html');
    $partial_category   = file_get_contents(ROOT.'/templates/'.THEME.'/partials/category.html');

    $category_id = (int) $args['category_id'];
    $category = isset($args['category_id']) ? $args['category_id'] : Category::getFirst();
    $categories = CategoryRender::render($category_id, $partial_category);
    $articles   = PostRender::renderForCategory($category_id, $partial_article);
    $category = new Category($category_id);
    
    render_content( ['articles' => $articles, 'category' => $categories] );
});

// render a post
Route::get('show_post', function($args)
{
    $partial_article  = file_get_contents(ROOT.'/templates/'.THEME.'/partials/article.html');
    $partial_category = file_get_contents(ROOT.'/templates/'.THEME.'/partials/category.html');

    $post_id  = isset($args['post_id']) ? (int) $args['post_id'] : NULL;
    $post = new Post($post_id);
    $articles = PostRender::renderPost(new Post($post_id), $partial_article);
    $categories = CategoryRender::render($post->category_id, $partial_category);

    render_content( ['articles' => $articles, 'category' => $categories] );
});

// default action
Route::get('', function($args)
{
    $category_id = 1;
    $year = !empty($args['year']) ? (int) $args['year'] : date('Y');
    
    Route::run('show_category', ['category_id'=> $category_id, 'year' => $year] );
});

// render page content
function render_content($replaces)
{
    $content = new Content(1);
    $layout_content = file_get_contents(ROOT.'/templates/'.THEME.'/layout.html');
    $layout_content = str_replace('{theme}', THEME, $layout_content);
    $layout_content = str_replace('{url}', $_SERVER['SCRIPT_NAME'], $layout_content);
    $layout_content = str_replace('{title}', $content->title, $layout_content);
    $layout_content = str_replace('{subtitle}', $content->subtitle, $layout_content);
    $layout_content = str_replace('{sidepanel}', $content->sidepanel, $layout_content);
    
    foreach ($replaces as $key => $value)
    {
        $layout_content = str_replace('{'.$key.'}', $value, $layout_content);
    }
    echo $layout_content;
}

TTransaction::close();
