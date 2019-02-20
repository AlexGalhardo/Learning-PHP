--- ORACLE: alter session set NLS_DATE_FORMAT='rrrr-mm-dd';
CREATE TABLE category (
  id INTEGER PRIMARY KEY NOT NULL,
  name VARCHAR(200)
);

INSERT INTO category VALUES(1,'Frequente');
INSERT INTO category VALUES(2,'Casual');
INSERT INTO category VALUES(3,'Varejista');

CREATE TABLE state (
  id INTEGER PRIMARY KEY NOT NULL,
  name VARCHAR(200)
);

INSERT INTO state VALUES(1,'RS');
INSERT INTO state VALUES(2,'SP');

CREATE TABLE city (
  id INTEGER PRIMARY KEY NOT NULL,
  name VARCHAR(200),
  state_id INTEGER NOT NULL,
  FOREIGN KEY(state_id) REFERENCES state(id)
);

INSERT INTO city VALUES(1,'Lajeado','1');
INSERT INTO city VALUES(2,'Porto Alegre','1');
INSERT INTO city VALUES(3,'Caxias do Sul','1');
INSERT INTO city VALUES(4,'São Paulo','2');
INSERT INTO city VALUES(5,'Osasco','2');


CREATE TABLE skill (
  id INTEGER PRIMARY KEY NOT NULL,
  name VARCHAR(200)
);

INSERT INTO skill VALUES(1,'Leitura');
INSERT INTO skill VALUES(2,'Escrita');
INSERT INTO skill VALUES(3,'Comunicação');
INSERT INTO skill VALUES(4,'Criatividade');
INSERT INTO skill VALUES(5,'Relações');
INSERT INTO skill VALUES(6,'Organização');
INSERT INTO skill VALUES(7,'Liderança');


CREATE TABLE customer (
  id INTEGER PRIMARY KEY NOT NULL, 
  name VARCHAR(200), 
  address VARCHAR(200), 
  phone VARCHAR(200), 
  birthdate DATE, 
  status CHAR(1), 
  email VARCHAR(200), 
  gender CHAR(1), 
  category_id INTEGER NOT NULL, 
  city_id INTEGER NOT NULL, 
  FOREIGN KEY(city_id)     REFERENCES city(id), 
  FOREIGN KEY(category_id) REFERENCES category(id) 
);

INSERT INTO customer VALUES(1,'Andrei Zmievski','Rua Palo Alto','10 1234-5678','1980-01-01','S','contact@gmail.com','M',2,3);
INSERT INTO customer VALUES(2,'Rubens Prates','Rua Campinas, 123','84 4644-5678','1990-01-01','M','contact@gmail.com','M',1,4);
INSERT INTO customer VALUES(3,'Augusto Campos','Rua BRLinux, 343','84 1564-5345','1990-01-01','C','contact@gmail.com','M',1,4);
INSERT INTO customer VALUES(4,'Marcelio Leal','Rua Belém, 334','84 1124-3478','1990-01-01','C','contact@gmail.com','M',1,4);
INSERT INTO customer VALUES(5,'Manuel Lemos','Rua Osasco, 949','84 1164-5348','1990-01-01','M','contact@gmail.com','M',1,4);
INSERT INTO customer VALUES(6,'Fábio Locattelli','Rua Lachoda, 012','83 1223-5678','1990-01-01','M','contact@gmail.com','M',1,1);
INSERT INTO customer VALUES(7,'Leonardo Soldatelli','Rua Tramandaí, 234','83 1298-5628','1990-01-01','C','contact@gmail.com','M',1,2);
INSERT INTO customer VALUES(8,'Alberto Bengoa','Rua Porto, 23','83 1323-5548','1990-01-01','S','contact@gmail.com','M',1,2);
INSERT INTO customer VALUES(9,'Fábio Milani','Rua Canela, 34','83 1266-5666','1990-01-01','C','contact@gmail.com','M',1,3);
INSERT INTO customer VALUES(10,'Huberto Meyer','Rua Orchestra, 101','83 1234-5578','1990-01-01','S','contact@gmail.com','M',1,2);
INSERT INTO customer VALUES(11,'Rafael Pavin','Rua London, 34','83 1884-5338','1990-01-01','C','contact@gmail.com','M',1,2);
INSERT INTO customer VALUES(12,'Eduardo Bacchi','Rua Santa Maria, 202','83 1264-5662','1990-01-01','S','contact@gmail.com','M',1,3);
INSERT INTO customer VALUES(13,'Luciana Menezes','Rua Porto, 12','83 1243-5658','1990-01-01','M','contact@gmail.com','F',1,2);
INSERT INTO customer VALUES(14,'Tiago Menezes','Rua Porto, 34','83 1232-5348','1990-01-01','M','contact@gmail.com','M',1,2);
INSERT INTO customer VALUES(15,'João Hanna','Rua Porto, 55','83 1674-9878','1990-01-01','S','contact@gmail.com','M',1,2);
INSERT INTO customer VALUES(16,'Camila Kist','Rua Porto, 123','83 1256-1238','1990-01-01','S','contact@gmail.com','F',1,3);
INSERT INTO customer VALUES(17,'Sílvio Cazella','Rua Leopoldo, 46','83 1278-5238','1990-01-01','S','contact@gmail.com','M',1,2);
INSERT INTO customer VALUES(18,'Vinicius Ferreira','Rua Leopoldo, 34','83 1234-3278','1990-01-01','M','contact@gmail.com','M',1,3);
INSERT INTO customer VALUES(19,'Rafael Pitrovski','Rua Ivoti, 232','83 1784-5348','1990-01-01','M','contact@gmail.com','M',1,3);
INSERT INTO customer VALUES(20,'Gledson de Oliveira','Rua Porto, 12','83 1984-5218','1990-01-01','C','contact@gmail.com','M',1,2);
INSERT INTO customer VALUES(21,'Vinícius Ferla','Rua Petrópolis, 90','83 1211-5228','1990-01-01','M','contact@gmail.com','M',1,3);
INSERT INTO customer VALUES(22,'Karen Dall Oglio','Rua Porto, 12','83 1233-5558','1990-01-01','M','contact@gmail.com','F',1,2);
INSERT INTO customer VALUES(23,'Andrigo Dametto','Rua Lachoda, 343','83 1774-5448','1990-01-01','M','contact@gmail.com','M',1,1);
INSERT INTO customer VALUES(24,'Jéssica Käfer','Rua Lachoda, 90','83 1894-5628','1990-01-01','C','contact@gmail.com','F',1,1);
INSERT INTO customer VALUES(25,'Ari Stopassola','Rua Canela, 123','83 1259-5631','1990-01-01','C','contact@gmail.com','M',1,3);
INSERT INTO customer VALUES(26,'John Lennon','Rua Liverpool, 34','83 1208-5088','1990-01-01','M','contact@gmail.com','M',1,1);
INSERT INTO customer VALUES(27,'Amadeu Weirich','Rua Teutonia, 90','83 1404-5640','1990-01-01','C','contact@gmail.com','M',1,1);
INSERT INTO customer VALUES(28,'Julieta dos Santos','Rua Taquari, 34','83 1044-5408','1990-01-01','M','contact@gmail.com','F',1,1);
INSERT INTO customer VALUES(29,'Ana Paula Monteiro','Rua Rocavendas, 89','83 1234-5678','1990-01-01','M','contact@gmail.com','F',1,1);
INSERT INTO customer VALUES(30,'Ana Wolf','Rua Arroio, 23','83 1564-4578','1990-01-01','S','contact@gmail.com','F',1,1);
INSERT INTO customer VALUES(31,'Edson Funke','Rua Moinhos, 84','51 8111-3333','1990-01-01','S','contact@gmail.com','M',1,1);
INSERT INTO customer VALUES(32,'Luciano Greiner','Rua Porto, 34','83 1249-9498','1990-01-01','M','contact@gmail.com','M',1,2);
INSERT INTO customer VALUES(33,'Sâmara Petter','Rua Cruzeiro, 89','83 1229-2978','1990-01-01','S','contact@gmail.com','F',1,1);
INSERT INTO customer VALUES(34,'Júlia Haubert','Rua Lachoda, 56','83 1259-5598','1990-01-01','M','contact@gmail.com','F',1,1);
INSERT INTO customer VALUES(35,'Diego Feitosa','Rua São Paulo, 78','84 1279-9778','1990-01-01','S','contact@gmail.com','M',1,4);
INSERT INTO customer VALUES(36,'Rafael Sobis','Rua Titulos, 34','83 1236-5636','1990-01-01','M','contact@gmail.com','M',1,2);
INSERT INTO customer VALUES(37,'Marcelo Crosara','Rua Horizonte, 89','84 1209-5098','1990-01-01','M','contact@gmail.com','M',1,4);
INSERT INTO customer VALUES(38,'Augusto dos Reis','Rua Taquari, 78','83 1252-2578','1990-01-01','C','contact@gmail.com','M',1,1);
INSERT INTO customer VALUES(39,'Hugo Sacramento','Rua Belém, 123','84 1295-5958','1990-01-01','C','contact@gmail.com','M',1,4);
INSERT INTO customer VALUES(40,'Giovanni Dall Oglio','Rua da Conceicao','(51) 8111-2222','2013-02-15','S','giovanni@dalloglio.net','M',1,1);


CREATE TABLE contact (
  id INTEGER PRIMARY KEY NOT NULL, 
  type VARCHAR(200), 
  value VARCHAR(200), 
  customer_id INTEGER NOT NULL, 
  FOREIGN KEY(customer_id) REFERENCES customer(id) 
);

INSERT INTO contact VALUES(1,'fone','78 2343-4545',4);
INSERT INTO contact VALUES(2,'fone','78 9494-0404',4);
INSERT INTO contact VALUES(3,'fone','78 2343-4545',4);
INSERT INTO contact VALUES(4,'fone','78 9494-0404',4);
INSERT INTO contact VALUES(5,'MSN','andrei@msn.com',1);
INSERT INTO contact VALUES(6,'ICQ','6232071023124',1);
INSERT INTO contact VALUES(7,'Gmail','andrei@gmail.com',1);


CREATE TABLE customer_skill (
  id INTEGER PRIMARY KEY NOT NULL, 
  customer_id INTEGER NOT NULL, 
  skill_id INTEGER NOT NULL, 
  FOREIGN KEY(customer_id) REFERENCES customer(id), 
  FOREIGN KEY(skill_id)    REFERENCES skill(id) 
);

INSERT INTO customer_skill VALUES(56,6,5);
INSERT INTO customer_skill VALUES(57,6,7);
INSERT INTO customer_skill VALUES(61,4,1);
INSERT INTO customer_skill VALUES(62,4,2);
INSERT INTO customer_skill VALUES(63,1,1);
INSERT INTO customer_skill VALUES(64,1,2);
INSERT INTO customer_skill VALUES(65,1,4);


CREATE TABLE product(
  id INTEGER PRIMARY KEY NOT NULL,
  description VARCHAR(200),
  stock REAL,
  sale_price REAL,
  unity VARCHAR(200),
  photo_path text
);
INSERT INTO "product" VALUES(1,'Pendrive 512Mb',10.0,57.6,'PC','files/images/1/pendrive.jpg');
INSERT INTO "product" VALUES(2,'HD 120 GB',20.0,180.0,'PC','files/images/2/hd.jpg');
INSERT INTO "product" VALUES(3,'SD CARD  512MB',4.0,35.0,'PC','files/images/3/sdcard.jpg');
INSERT INTO "product" VALUES(4,'SD CARD 1GB MINI',3.0,40.0,'PC','files/images/4/sdcard.jpg');
INSERT INTO "product" VALUES(5,'CAM. PHOTO I70 Silver',5.0,900.0,'PC','files/images/5/camera.jpg');
INSERT INTO "product" VALUES(6,'CAM. PHOTO DSC-W50 Silver',4.0,700.0,'PC','files/images/6/camera.jpg');
INSERT INTO "product" VALUES(7,'WEBCAM INSTANT VF0040SP',4.0,80.0,'PC','files/images/7/webcam.jpg');
INSERT INTO "product" VALUES(8,'CPU 775 CEL.D 360 3.46 533M',10.0,300.0,'PC',NULL);
INSERT INTO "product" VALUES(9,'Recorder DCR-DVD108',2.0,1400.0,'PC',NULL);
INSERT INTO "product" VALUES(10,'HD IDE  80G 7.200',8.0,160.0,'PC','files/images/10/hd.jpg');
INSERT INTO "product" VALUES(11,'Printer LASERJET 1018 USB 2.0',4.0,300.0,'PC','images/printer.jpg');
INSERT INTO "product" VALUES(12,'DDR 512MB 400MHZ PC3200',10.0,100.0,'PC',NULL);
INSERT INTO "product" VALUES(13,'DDR2 1024MB 533MHZ PC4200',5.0,170.0,'PC',NULL);
INSERT INTO "product" VALUES(14,'MONITOR LCD 19',2.0,800.0,'PC','images/monitor.jpg');
INSERT INTO "product" VALUES(15,'MOUSE USB OMC90S OPT.',10.0,40.0,'PC','images/mouse.jpg');
INSERT INTO "product" VALUES(16,'NB DV6108 CS 1.86/512/80/DVD',2.0,2500.0,'PC',NULL);
INSERT INTO "product" VALUES(17,'NB N220E/B DC 1.6/1/80/DVD',3.0,3400.0,'PC',NULL);
INSERT INTO "product" VALUES(18,'CAM. PHOTO DSC-W90 Silver',5.0,1200.0,'PC',NULL);
INSERT INTO "product" VALUES(19,'CART. 8767 black',20.0,50.0,'PC',NULL);
INSERT INTO "product" VALUES(20,'CD-R TUBE DE 100 52X 700MB',20.0,60.0,'PC',NULL);
INSERT INTO "product" VALUES(21,'DDR 1024MB 400MHZ PC3200',7.0,150.0,'PC',NULL);
INSERT INTO "product" VALUES(22,'MOUSE PS2 A7 Blue',20.0,15.0,'PC','');
INSERT INTO "product" VALUES(23,'SPEAKER AS-5100 White',5.0,180.0,'PC',NULL);
INSERT INTO "product" VALUES(24,'Keyb. USB AK-806',14.0,40.0,'PC',NULL);
CREATE TABLE sale (
  id INTEGER PRIMARY KEY NOT NULL,
  date date,
  total float,
  customer_id int,
  obs text,
  FOREIGN KEY(customer_id) REFERENCES customer(id)
);

INSERT INTO sale VALUES(1,'2015-03-14',505.0,1,'');
INSERT INTO sale VALUES(2,'2015-03-14',1945.0,2, '');
INSERT INTO sale VALUES(3,'2015-03-14',4880.0,3, '');
INSERT INTO sale VALUES(4,'2015-03-14',1060.0,4, '');
INSERT INTO sale VALUES(5,'2015-03-14',1890.0,5, '');
INSERT INTO sale VALUES(6,'2015-03-14',12900.0,6, '');
INSERT INTO sale VALUES(7,'2015-03-14',620.0,7, '');
INSERT INTO sale VALUES(8,'2015-03-14',495.0,8, '');
INSERT INTO sale VALUES(9,'2015-10-26',79.0,1, '');
INSERT INTO sale VALUES(10,'2015-10-26',40.0,4,'teste');


CREATE TABLE sale_item (
  id INTEGER PRIMARY KEY NOT NULL,
  sale_price float,
  amount float,
  discount float,
  total float,
  product_id int,
  sale_id int,
  FOREIGN KEY(product_id) REFERENCES product(id),
  FOREIGN KEY(sale_id) REFERENCES sale(id)
);

INSERT INTO sale_item VALUES(1,40.0,1.0,0.0,40.0,1,1);
INSERT INTO sale_item VALUES(2,180.0,2.0,0.0,360.0,2,1);
INSERT INTO sale_item VALUES(3,35.0,3.0,0.0,105.0,3,1);
INSERT INTO sale_item VALUES(4,40.0,1.0,0.0,40.0,4,2);
INSERT INTO sale_item VALUES(5,900.0,2.0,0.0,1800.0,5,2);
INSERT INTO sale_item VALUES(6,35.0,3.0,0.0,105.0,3,2);
INSERT INTO sale_item VALUES(7,80.0,1.0,0.0,80.0,7,3);
INSERT INTO sale_item VALUES(8,300.0,2.0,0.0,600.0,8,3);
INSERT INTO sale_item VALUES(9,1400.0,3.0,0.0,4200.0,9,3);
INSERT INTO sale_item VALUES(10,160.0,1.0,0.0,160.0,10,4);
INSERT INTO sale_item VALUES(11,300.0,2.0,0.0,600.0,11,4);
INSERT INTO sale_item VALUES(12,100.0,3.0,0.0,300.0,12,4);
INSERT INTO sale_item VALUES(13,170.0,1.0,0.0,170.0,13,5);
INSERT INTO sale_item VALUES(14,800.0,2.0,0.0,1600.0,14,5);
INSERT INTO sale_item VALUES(15,40.0,3.0,0.0,120.0,15,5);
INSERT INTO sale_item VALUES(16,2500.0,1.0,0.0,2500.0,16,6);
INSERT INTO sale_item VALUES(17,3400.0,2.0,0.0,6800.0,17,6);
INSERT INTO sale_item VALUES(18,1200.0,3.0,0.0,3600.0,18,6);
INSERT INTO sale_item VALUES(19,50.0,1.0,0.0,50.0,19,7);
INSERT INTO sale_item VALUES(20,60.0,2.0,0.0,120.0,20,7);
INSERT INTO sale_item VALUES(21,150.0,3.0,0.0,450.0,21,7);
INSERT INTO sale_item VALUES(22,15.0,1.0,0.0,15.0,22,8);
INSERT INTO sale_item VALUES(23,180.0,2.0,0.0,360.0,23,8);
INSERT INTO sale_item VALUES(24,40.0,3.0,0.0,120.0,24,8);
INSERT INTO sale_item VALUES(25,40.0,2.0,1.0,79.0,1,9);
INSERT INTO sale_item VALUES(26,40.0,1.0,0.0,39.0,4,10);


CREATE TABLE trash_item (id INTEGER PRIMARY KEY NOT NULL, content text);
INSERT INTO trash_item values (1, 'Content #1');
INSERT INTO trash_item values (2, 'Content #2');
INSERT INTO trash_item values (3, 'Content #3');
INSERT INTO trash_item values (4, 'Content #4');
INSERT INTO trash_item values (5, 'Content #5');
INSERT INTO trash_item values (6, 'Content #6');
INSERT INTO trash_item values (7, 'Content #7');
INSERT INTO trash_item values (8, 'Content #8');
INSERT INTO trash_item values (9, 'Content #9');
INSERT INTO trash_item values (10, 'Content #10');
INSERT INTO trash_item values (11, 'Content #11');
INSERT INTO trash_item values (12, 'Content #12');
INSERT INTO trash_item values (13, 'Content #13');
INSERT INTO trash_item values (14, 'Content #14');
INSERT INTO trash_item values (15, 'Content #15');
INSERT INTO trash_item values (16, 'Content #16');
INSERT INTO trash_item values (17, 'Content #17');
INSERT INTO trash_item values (18, 'Content #18');
INSERT INTO trash_item values (19, 'Content #19');
INSERT INTO trash_item values (20, 'Content #20');


CREATE TABLE agenda_entry (
  id INTEGER PRIMARY KEY NOT NULL,
  entry_date date,
  start_hour int,
  duration int,
  title text,
  description text
);


CREATE TABLE calendar_event (
  id INTEGER PRIMARY KEY NOT NULL,
  start_time VARCHAR(200),
  end_time VARCHAR(200),
  title VARCHAR(200),
  description VARCHAR(200),
  color TEXT
);


CREATE TABLE test (
  id INTEGER PRIMARY KEY NOT NULL,
  name VARCHAR(200),
  state_id integer references state(id),
  city_id integer references city(id),
  customer_id integer references customer(id)
);

