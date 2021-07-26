<?php

namespace Source\Support;

use CoffeeCode\Paginator\Paginator;

/**
 * FSPHP | Class Pager
 *
 * @author Robson V. Leite <cursos@upinside.com.br>
 * @package Source\Support
 */
class Pager extends Paginator
{
    /**
     * Pager constructor.
     *
     * @param string $link
     * @param null|string $title
     * @param array|null $first
     * @param array|null $last
     */
    public function __construct(string $link, ?string $title = null, ?array $first = null, ?array $last = null)
    {
        parent::__construct($link, $title, $first, $last);
    }
}