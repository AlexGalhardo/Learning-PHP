BEGIN TRANSACTION;
CREATE TABLE post (id integer primary key not null, title varchar(100), body text, keywords varchar(200), category_id integer references category(id), date varchar(10));
CREATE TABLE category (id integer primary key not null, name varchar(100));
CREATE TABLE content (id integer primary key, title varchar(100), subtitle text, sidepanel text);
COMMIT;
