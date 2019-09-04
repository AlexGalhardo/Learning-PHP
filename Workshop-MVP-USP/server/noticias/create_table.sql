CREATE TABLE noticias (
	id_noticia INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    editoria VARCHAR(30) NOT NULL,
    titulo VARCHAR(60) NOT NULL,
    conteudo VARCHAR(2000) NOT NULL,
    extensao_imagem VARCHAR(5) NOT NULL,
    data_hora DATETIME NOT NULL
);

mysql --host=us-cdbr-iron-east-04.cleardb.net --user=b65ecd061693a6 --password=b2ac0b7f --reconnect heroku_d0d539220a78eed < create_table.sql
