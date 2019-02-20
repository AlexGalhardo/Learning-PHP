BEGIN TRANSACTION;
CREATE TABLE system_group (
    id INTEGER PRIMARY KEY NOT NULL,
    name varchar(100));
INSERT INTO system_group VALUES(1,'Admin');
INSERT INTO system_group VALUES(2,'Standard');
INSERT INTO system_group VALUES(3,'Librarian');
INSERT INTO system_group VALUES(4,'Operator');
CREATE TABLE system_program (
    id INTEGER PRIMARY KEY NOT NULL,
    name varchar(100),
    controller varchar(100));
INSERT INTO system_program VALUES(1,'System Group Form','SystemGroupForm');
INSERT INTO system_program VALUES(2,'System Group List','SystemGroupList');
INSERT INTO system_program VALUES(3,'System Program Form','SystemProgramForm');
INSERT INTO system_program VALUES(4,'System Program List','SystemProgramList');
INSERT INTO system_program VALUES(5,'System User Form','SystemUserForm');
INSERT INTO system_program VALUES(6,'System User List','SystemUserList');
INSERT INTO system_program VALUES(7,'Common Page','CommonPage');
INSERT INTO system_program VALUES(8,'System PHP Info','SystemPHPInfoView');
INSERT INTO system_program VALUES(9,'System ChangeLog View','SystemChangeLogView');
INSERT INTO system_program VALUES(10,'Welcome View','WelcomeView');
INSERT INTO system_program VALUES(11,'System Sql Log','SystemSqlLogList');
INSERT INTO system_program VALUES(12,'System Profile View','SystemProfileView');
INSERT INTO system_program VALUES(13,'System Profile Form','SystemProfileForm');
INSERT INTO system_program VALUES(14,'System SQL Panel','SystemSQLPanel');
INSERT INTO system_program VALUES(15,'System Access Log','SystemAccessLogList');
INSERT INTO system_program VALUES(16,'System Message Form','SystemMessageForm');
INSERT INTO system_program VALUES(17,'System Message List','SystemMessageList');
INSERT INTO system_program VALUES(18,'System Message Form View','SystemMessageFormView');
INSERT INTO system_program VALUES(19,'System Notification List','SystemNotificationList');
INSERT INTO system_program VALUES(20,'System Notification Form View','SystemNotificationFormView');
INSERT INTO system_program VALUES(21,'System Document Category List','SystemDocumentCategoryFormList');
INSERT INTO system_program VALUES(22,'System Document Form','SystemDocumentForm');
INSERT INTO system_program VALUES(23,'System Document Upload Form','SystemDocumentUploadForm');
INSERT INTO system_program VALUES(24,'System Document List','SystemDocumentList');
INSERT INTO system_program VALUES(25,'System Shared Document List','SystemSharedDocumentList');
INSERT INTO system_program VALUES(26,'System Unit Form','SystemUnitForm');
INSERT INTO system_program VALUES(27,'System Unit List','SystemUnitList');
INSERT INTO system_program VALUES(28,'System Access stats','SystemAccessLogStats');
INSERT INTO system_program VALUES(29,'System Preference form','SystemPreferenceForm');
INSERT INTO system_program VALUES(30,'System Support form','SystemSupportForm');
INSERT INTO system_program VALUES(31,'Collections','CollectionFormList');
INSERT INTO system_program VALUES(32,'Classifications','ClassificationFormList');
INSERT INTO system_program VALUES(33,'Subject List','SubjectList');
INSERT INTO system_program VALUES(34,'Subject Form','SubjectForm');
INSERT INTO system_program VALUES(35,'Author List','AuthorList');
INSERT INTO system_program VALUES(36,'Author Form','AuthorForm');
INSERT INTO system_program VALUES(37,'Publisher List','PublisherList');
INSERT INTO system_program VALUES(38,'Publisher Form','PublisherForm');
INSERT INTO system_program VALUES(39,'Statuses','StatusFormList');
INSERT INTO system_program VALUES(40,'Categories','CategoryFormList');
INSERT INTO system_program VALUES(41,'City list','CityList');
INSERT INTO system_program VALUES(42,'City form','CityForm');
INSERT INTO system_program VALUES(43,'Member list','MemberList');
INSERT INTO system_program VALUES(44,'Member form','MemberForm');
INSERT INTO system_program VALUES(45,'Check in','CheckInForm');
INSERT INTO system_program VALUES(46,'Check out','CheckOutForm');
INSERT INTO system_program VALUES(47,'Loan report','LoanReport');
INSERT INTO system_program VALUES(48,'Member report','MemberReport');
INSERT INTO system_program VALUES(49,'Book report','BookReport');
INSERT INTO system_program VALUES(50,'Book form','BookForm');
INSERT INTO system_program VALUES(51,'Book list','BookList');
INSERT INTO system_program VALUES(52,'Item seek','ItemSeek');
INSERT INTO system_program VALUES(53,'System PHP Error','SystemPHPErrorLogView');
INSERT INTO system_program VALUES(54,'System Database Browser','SystemDatabaseExplorer');
INSERT INTO system_program VALUES(55,'System Table List','SystemTableList');
INSERT INTO system_program VALUES(56,'System Data Browser','SystemDataBrowser');
CREATE TABLE system_user (
    id INTEGER PRIMARY KEY NOT NULL,
    name varchar(100),
    login varchar(100),
    password varchar(100),
    email varchar(100),
    frontpage_id int, system_unit_id int references system_unit(id), active char(1),
    FOREIGN KEY(frontpage_id) REFERENCES system_program(id));
INSERT INTO system_user VALUES(1,'Administrator','admin','21232f297a57a5a743894a0e4a801fc3','admin@admin.net',10,NULL,'Y');
INSERT INTO system_user VALUES(2,'User','user','ee11cbb19052e40b07aac0ca060c23ee','user@user.net',7,NULL,'Y');
INSERT INTO system_user VALUES(3,'Ana Librarian','ana','098f6bcd4621d373cade4e832627b4f6','ana@test.com',NULL,NULL,NULL);
INSERT INTO system_user VALUES(4,'Luciele Operator','luciele','098f6bcd4621d373cade4e832627b4f6','luciele@test.com',NULL,NULL,NULL);
CREATE TABLE system_user_group (
    id INTEGER PRIMARY KEY NOT NULL,
    system_user_id int,
    system_group_id int,
    FOREIGN KEY(system_user_id) REFERENCES system_user(id),
    FOREIGN KEY(system_group_id) REFERENCES system_group(id));
INSERT INTO system_user_group VALUES(1,1,1);
INSERT INTO system_user_group VALUES(2,2,2);
INSERT INTO system_user_group VALUES(3,1,2);
INSERT INTO system_user_group VALUES(8,3,2);
INSERT INTO system_user_group VALUES(9,3,3);
INSERT INTO system_user_group VALUES(10,4,2);
INSERT INTO system_user_group VALUES(11,4,4);
CREATE TABLE system_group_program (
    id INTEGER PRIMARY KEY NOT NULL,
    system_group_id int,
    system_program_id int,
    FOREIGN KEY(system_group_id) REFERENCES system_group(id),
    FOREIGN KEY(system_program_id) REFERENCES system_program(id));
INSERT INTO system_group_program VALUES(30,1,1);
INSERT INTO system_group_program VALUES(31,1,2);
INSERT INTO system_group_program VALUES(32,1,3);
INSERT INTO system_group_program VALUES(33,1,4);
INSERT INTO system_group_program VALUES(34,1,5);
INSERT INTO system_group_program VALUES(35,1,6);
INSERT INTO system_group_program VALUES(36,1,8);
INSERT INTO system_group_program VALUES(37,1,9);
INSERT INTO system_group_program VALUES(38,1,11);
INSERT INTO system_group_program VALUES(39,1,14);
INSERT INTO system_group_program VALUES(40,1,15);
INSERT INTO system_group_program VALUES(41,1,21);
INSERT INTO system_group_program VALUES(42,1,26);
INSERT INTO system_group_program VALUES(43,1,27);
INSERT INTO system_group_program VALUES(44,1,28);
INSERT INTO system_group_program VALUES(45,1,29);
INSERT INTO system_group_program VALUES(46,2,10);
INSERT INTO system_group_program VALUES(47,2,12);
INSERT INTO system_group_program VALUES(48,2,13);
INSERT INTO system_group_program VALUES(49,2,16);
INSERT INTO system_group_program VALUES(50,2,17);
INSERT INTO system_group_program VALUES(51,2,18);
INSERT INTO system_group_program VALUES(52,2,19);
INSERT INTO system_group_program VALUES(53,2,20);
INSERT INTO system_group_program VALUES(54,2,22);
INSERT INTO system_group_program VALUES(55,2,23);
INSERT INTO system_group_program VALUES(56,2,24);
INSERT INTO system_group_program VALUES(57,2,25);
INSERT INTO system_group_program VALUES(58,2,30);
INSERT INTO system_group_program VALUES(88,3,31);
INSERT INTO system_group_program VALUES(89,3,32);
INSERT INTO system_group_program VALUES(90,3,33);
INSERT INTO system_group_program VALUES(91,3,34);
INSERT INTO system_group_program VALUES(92,3,35);
INSERT INTO system_group_program VALUES(93,3,36);
INSERT INTO system_group_program VALUES(94,3,37);
INSERT INTO system_group_program VALUES(95,3,38);
INSERT INTO system_group_program VALUES(96,3,39);
INSERT INTO system_group_program VALUES(97,3,40);
INSERT INTO system_group_program VALUES(98,3,41);
INSERT INTO system_group_program VALUES(99,3,42);
INSERT INTO system_group_program VALUES(100,3,43);
INSERT INTO system_group_program VALUES(101,3,44);
INSERT INTO system_group_program VALUES(102,3,45);
INSERT INTO system_group_program VALUES(103,3,46);
INSERT INTO system_group_program VALUES(104,3,47);
INSERT INTO system_group_program VALUES(105,3,48);
INSERT INTO system_group_program VALUES(106,3,49);
INSERT INTO system_group_program VALUES(107,3,50);
INSERT INTO system_group_program VALUES(108,3,51);
INSERT INTO system_group_program VALUES(109,3,52);
INSERT INTO system_group_program VALUES(110,4,40);
INSERT INTO system_group_program VALUES(111,4,41);
INSERT INTO system_group_program VALUES(112,4,42);
INSERT INTO system_group_program VALUES(113,4,43);
INSERT INTO system_group_program VALUES(114,4,44);
INSERT INTO system_group_program VALUES(115,4,45);
INSERT INTO system_group_program VALUES(116,4,46);
INSERT INTO system_group_program VALUES(117,4,47);
INSERT INTO system_group_program VALUES(118,4,48);
INSERT INTO system_group_program VALUES(119,4,49);
INSERT INTO system_group_program VALUES(120,4,52);
INSERT INTO system_group_program VALUES(121,1,53);
INSERT INTO system_group_program VALUES(122,1,54);
INSERT INTO system_group_program VALUES(123,1,55);
INSERT INTO system_group_program VALUES(124,1,56);
CREATE TABLE system_user_program (
    id INTEGER PRIMARY KEY NOT NULL,
    system_user_id int,
    system_program_id int,
    FOREIGN KEY(system_user_id) REFERENCES system_user(id),
    FOREIGN KEY(system_program_id) REFERENCES system_program(id));
INSERT INTO system_user_program VALUES(1,2,7);
CREATE TABLE system_unit (
    id INTEGER PRIMARY KEY NOT NULL,
    name varchar(100));
CREATE TABLE system_preference (
    id text,
    value text
);
CREATE TABLE system_user_unit (
    id INTEGER PRIMARY KEY NOT NULL,
    system_user_id int,
    system_unit_id int,
    FOREIGN KEY(system_user_id) REFERENCES system_user(id),
    FOREIGN KEY(system_unit_id) REFERENCES system_unit(id));
CREATE INDEX system_user_program_idx ON system_user(frontpage_id);
CREATE INDEX system_user_group_group_idx ON system_user_group(system_group_id);
CREATE INDEX system_user_group_user_idx ON system_user_group(system_user_id);
CREATE INDEX system_group_program_program_idx ON system_group_program(system_program_id);
CREATE INDEX system_group_program_group_idx ON system_group_program(system_group_id);
CREATE INDEX system_user_program_program_idx ON system_user_program(system_program_id);
CREATE INDEX system_user_program_user_idx ON system_user_program(system_user_id);
COMMIT;
