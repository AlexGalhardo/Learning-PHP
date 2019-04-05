/**
 * Principais comandos MySQL
 */

/**
 * Banco de Dados se conecta na porta 3306
 * Apache se conecta na porta 80
 * FTP se conecta na porta 21
 * Localhost se conecta na porta 127.0.0.1
 */

/**
 * Criar Banco de Dados
 */
CREATE DATABASE novo_banco_de_dados;



/**
 * Comando SELECT
 */
/**
 * Selecione os campos nome e emial da tabela usuarios
 */
SELECT nome, email FROM usuarios;
/**
 * Selecione tudo da tabela usuarios
 */
SELECT nome, email FROM usuarios;

SELECT * FROM estoque WHERE quantidade < 5;




/**
 * Comando INSERT
 */
/**
 * INSIRA DENTRO da tabela usuarios SETE nome ~, emial=~, senha = ~;
 */
/**
 * ESTE PADRÃO É NO MYSQL
 */
INSERT INTO usuarios SET nome = 'Cicrano', email = 'cicrano@gmail.com', senha = '123', data_nascimento = '2010-09-22';
/**
 * Padrão Internacional do comando INSERT no SQL
 */
INSERT INTO usuarios(nome, email, senha, data_nascimento) VALUES ('cicrano', 'cicrano@gmail', '123', '2010-09-23');




/**
 * Comando UPDATE
 */
/**
 * NÃO FAZER DESTE JEITO
 * Porque vai mudar a senha de todos os usuários!
 */
UPDATE usuarios SET senha = '999';
/**
 * CORRETO
 * Atualize a tabela usuarios, coloque a senha 999 ONDE o id é igual a 1
 */
UPDATE usuarios SET senha = '999' WHERE id = '1';
/**
 * Atualize a tabela usuarios, coloque o nome filano 2 onde o email é igual a cirano@gmail.com
 */
UPDATE usuarios SET nome = 'Filano 2' WHERE email = 'cicrano@gmail.com';




/**
 * Comando DELETE
 */
/**
 * Quando se deleta um dado, não tem mais como recuperar ele
 */
/**
 * DELETE DA TABELA USUARIOS o id 5
 */
DELETE FROM usuarios WHERE id = '5';
/**
 * Deletar todos os dados da tabela usuários
 */
DELETE * from usuarios;

DELETE msg FROM posts WHERE autor = 'FULANO';

DELETE FROM estoque WHERE quantidade <= 5;


/**
 * Filtrando dados com o Comando WHERE
 */
SELECT * FROM usuarios WHERE id = '1';
SELECT * FROM usuarios WHERE id = '1' OR id = '3';
/**
 * Comando clássico para verificar sistema de login
 */
SELECT * FROM usuarios where email = 'cicrano@gmail.com' AND senha = '999';
/**
 * LEMBRAR de usar parenteses em consultas com AND
 */
SELECT * FROM usuarios WHERE (email='cicrano@gmail.com' AND senha = '999') OR email = 'fulano@gmail.com';




/**
 * Comados LIKE, Between e IN
 */
/**
 * SELECIONE todos os usuarios da tabela usuarios que começem com com Boni~qualquer coisa 
 */
SELECT * FROM usuarios WHERE nome LIKE 'Boni%';
/**
 * SELECIONE todos os usuarios da tabela usuarios ONDE o nome termina com Boni
 */
SELECT * FROM usuarios WHERE nome LIKE '%Boni';
/**
 * SELECIONE da tabela usuarios onde o email possui b7web no meio
 */
SELECT * FROM usuarios WHERE email like '%b7web%';
/**
 * COMANDO BETWEEN é usado para buscar dadas por exemplo
 */
SELECT * FROM usuarios WHERE data_nascimento BETWEEN '2016-12-01' AND '2017-10-01';
/**
 * Selecione todos os usuarios com os ID entre 1 e 5;
 */
SELECT * FROM usuarios WHERE id IN (1, 5);




/**
 * Filtrando com HAVING
 */
/**
 * Qual a diferença entre os dois comandos?
 */
SELECT * FROM usuarios where id = '6';
SELECT * FROM usuarios HAVING id = '6';

SELECT (id+10) as soma FROM usuarios;
SELECT *, (id+10) FROM usuarios;
/**
 * O comando HAVING usa mais processamento
 *
 * Usado em poucas ocasiões, porque faz o filtro após o processamento dos dados
 */
/**
 * WHERE com coluna criado NÃO funciona
 *
 * WHERE é mais recomendado na maioria dos casos
 * WHERE faz um processamento de dados específico no dado, o HAVING faz o processamento em todos os dados
 */
SELECT *, (id+10) as soma FROM usuarios WHERE soma < 15; 
SELECT *, (id+10) as soma FROM usuarios HAVING soma < 15;





/**
 * COMANDOS Order BY e LIMIT
 */
/**
 * ORDENAR OS DADOS EM ORDEM ASCENDENTE, do menor para o maior
 */
SELECT * FROM usuarios ORDER BY data_nascimento ASC;
/**
 * ORDENAR os dados em ORDEM DESCENDENTE, do maior para o menos
 */
SELECT * FROM usuarios ORDER BY data_nascimento DESC;
/**
 * LIMITAR DADOS a 3 resultados
 */
SELECT * FROM usuarios ORDER BY data_nascimento DESC LIMIT 3;

/**
 * PULE O PRIMEIRO INDICE, E LIMITE AOS 2 DADOS SEGUINTES
 */
SELECT * FROM usuarios LIMIT 1,2;





/**
 * GROUP BY, sempre é usado para fazer contagems
 */
SELECT * FROM usuarios WHERE faixa_salarial = '1';
/**
 * Esse comando vai agrupar os dados em uma tabela contagem, indicado a quantidade de dados com a mesma faixa salarial
 */
SELECT COUNT(*) as contagem, faixa_salarial FROM usuarios GROUP BY faixa_salarial;





/**
 * RELACIONAMENTO ENTRE TABELAS
 */
1:N == relação 1 para muitos
1 categoria tem vários produtos
Exemplo: Faixa Salarial
Possuimos 1 tabela faixa_salarial, com 3 cateogiras: baixa, média, alta
Possui 1 tabela usuário, cada usuário pode conter apenas 1 faixa salarial
Na coluna salarial do usuários, fazemos uma relação (baixa, media, alta) com seus respectivos valores na tabela faixa salarial


1:1 == 1 item está relacionado a outro item
Sistema de login, cada usuáro possui token único
Cada token possui 1 usuário, cada usuário possui 1 token


N:N == vário pra vários
Um produto pode ter várias cores, assim como uma cor pode estar em vários produtos



/**
 * CONSULTA AVANÇADA COM JOIN
 */
/**
 * SELECIONE A TABELA USUARIOS com o campo NOME, 
 */
SELECT usuarios.nome, faixas.titulo FROM usuarios ... WHERE ... ORDER BY ... LIMIT ...;
/**
 * O INNER JOIN só mostra resultados que ouve sucesso,, que a relação entre as tabelas foram bem sucedidas
 * Mais usado
 */
SELECT usuarios.nome, faixas.titulo FROM usuarios INNER JOIN faixas ON faixas.id = usuarios.faixa_salarial;
/**
 * O LEFT JOIN mostra todos os resultados, independente se ouve sucesso ou não na relação entre as tabelas, da tabela a esquerda
 * Segundo mais usado
 */
SELECT usuarios.nome, faixas.titulo FROM usuarios LEFT JOIN faixas ON faixas.id = usuarios.faixa_salarial;
/**
 * O RIGHT JOIN mostra todos os resultados, independente se ouve sucesso ou não na relação entre as tabelas, da tabela a direita
 * MUITO POUCO USADO
 */
SELECT usuarios.nome, faixas.titulo FROM usuarios RIGHT JOIN faixas ON faixas.id = usuarios.faixa_salarial;



/**
 * Subconsultas ou SubQuerys
 */
/**
 * Efeito de processamento é exponencial, não é recomendado fazer este tipo de consultas
 */
SELECT usuarios.nome, (select faixas.titulo from faixas where faixas.id = usuarios.faixa_salarial) as faixa FROM usuarios; 




/**
 * Criação de Funções
 */
SELECT nome, email, CONTAR(nome) as contagem FROM USUARIOS;


CREATE FUNCTION contar(nome VARCHAR(100))
	RETURNS INT(10)
	BEGIN

		DECLARE qt INT(10);
		SET qt = LENGTH(nome);
		RETURN qt;

	END$$



/**
 * Criação de Views
 */
/**
 * Aconselhado quando se tem grandes volumes de informação,
 * para fazer uma consulta nos dados de maneira mais rápida
 */
CREATE VIEW usuariosprimeirafaixa AS 
	SELECT * FROM usuarios where faixa_salarial = '1';

