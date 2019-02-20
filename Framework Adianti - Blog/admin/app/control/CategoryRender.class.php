<?php
class CategoryRender
{
    /**
     * Render the category index
     */
    static public function render($category_id, $partial)
    {
        $categories = Category::listAll();
        $content = '';
        if ($categories)
        {
            foreach ($categories as $category)
            {
                $postpartial = $partial;
                $postpartial = str_replace('{id}', $category->id, $postpartial);
                $postpartial = str_replace('{name}', $category->name, $postpartial);
                if ($category_id == $category->id)
                {
                    $postpartial = str_replace('{class}', 'current_page_item', $postpartial);
                }
                else
                {
                    $postpartial = str_replace('{class}', 'page_item', $postpartial);
                }
                $content .= $postpartial;
            }
        }
        return $content;
    }
}
