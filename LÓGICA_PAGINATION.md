## Lógica Pagination
    TOTAL = 54
    10 itens por página
    quantidade de páginas = 54 / 10 = 5.4 Ou seja => 5 págnas inteiras
    e mais 4 itens na última página
    6 páginas total
    OFFSET = de onde eu começo?
    Na programação, sempre começamos pelo 0, mas aqui começaremos pelo 1
    OFFSET da página 2 = (10 * numero da página) = numero da página = (10*2) - 10 = 20 - 10 = 10
    
    EXEMPLO:
    $limit = 10; // 10 postagens por página
    $offset = intval($_GET['page']) * $limit - $limit;