<?php
class PostRender
{
    /**
     * Render all posts from a category
     */
    static public function renderForCategory($category, $partial)
    {
        $posts = Post::listForCategory($category);
        $content = '';
        if ($posts)
        {
            foreach ($posts as $post)
            {
                $content .= self::renderPost($post, $partial);
            }
        }
        return $content;
    }
    
    /**
     * Render a given post
     */
    static public function renderPost($post, $partial)
    {
        $content = '';

        $postpartial = $partial;
        $date = substr($post->date,0,4).'-'.substr($post->date,4,2).'-'.substr($post->date,6,2);
        $postpartial = str_replace('{title}', $post->title, $postpartial);
        $postpartial = str_replace('{id}', $post->id, $postpartial);
        $postpartial = str_replace('{date}', $post->date, $postpartial);
        $postpartial = str_replace('{body}', $post->body, $postpartial);
        
        return $postpartial;
    }
}
