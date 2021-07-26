<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("05.06 - Desmistificando transações");

require __DIR__ . "/../source/autoload.php";

use Source\Database\Connect;

/*
 * [ transaction ] https://pt.wikipedia.org/wiki/Transa%C3%A7%C3%A3o_em_base_de_dados
 *
 * [ Atomicidade ] Resumo: Todas as ações que compõem a unidade de trabalho da transação
 * devem ser concluídas com sucesso, para que seja efetivada.
 *
 * [ Consistência ] Resumo: Todas as regras e restrições definidas no banco de dados devem
 * ser obedecidas. (relacionamentos, tipos, restrições, etc.)
 *
 * [ Isolamento ] Resumo: Cada transação funciona completamente à parte de outras estações e
 * todas as operações são parte de uma transação única.
 *
 * [ Durabilidade ] Resumo: Os efeitos de uma transação em caso de sucesso (commit) devem
 * persistir no banco de dados (Uma transação só tem sentido se houver gravação)
 */
fullStackPHPClassSession("transaction", __LINE__);

try {
    Connect::getInstance()->beginTransaction();

    Connect::getInstance()->query("
        INSERT INTO users (first_name, last_name, email, document) 
        VALUES ('Robson', 'Leite', 'cursos@upinside.com.br', 2983729783);
    ");

    $userId = Connect::getInstance()->lastInsertId();

    Connect::getInstance()->query("
        INSERT INTO users_address (user_id, street, number, complement)
        VALUES ('{$userId}', 'Rua da Up', 2837, 'Sala 208');
    ");

    Connect::getInstance()->commit();
    echo "<p class='trigger accept'>Cadastro com sucesso!</p>";
} catch (PDOException $exception) {
    Connect::getInstance()->rollBack();
    var_dump($exception);
}









