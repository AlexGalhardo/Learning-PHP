BEGIN TRANSACTION;
CREATE TABLE category (
    id integer NOT NULL PRIMARY KEY,
    description text NOT NULL
);
INSERT INTO category VALUES(1,'Bug');
INSERT INTO category VALUES(2,'New feature');
INSERT INTO category VALUES(3,'Improvement');
INSERT INTO category VALUES(4,'Task');
INSERT INTO category VALUES(5,'Support');
CREATE TABLE priority (
    id integer NOT NULL PRIMARY KEY,
    description text NOT NULL
);
INSERT INTO priority VALUES(1,'Low');
INSERT INTO priority VALUES(2,'Normal');
INSERT INTO priority VALUES(3,'High');
INSERT INTO priority VALUES(4,'Urgent');
CREATE TABLE status (
    id integer NOT NULL PRIMARY KEY,
    description text NOT NULL,
    final_state character(1)
, color text);
INSERT INTO status VALUES(1,'New','N','#4d993a');
INSERT INTO status VALUES(2,'In progress','N',NULL);
INSERT INTO status VALUES(3,'Waiting feedback','N','#ff8514');
INSERT INTO status VALUES(4,'Resolved','N',NULL);
INSERT INTO status VALUES(5,'Testing','N',NULL);
INSERT INTO status VALUES(6,'Deploy','N',NULL);
INSERT INTO status VALUES(7,'Closed','Y','#5761ba');
INSERT INTO status VALUES(8,'Rejected','Y','#ff1414');
CREATE TABLE project (
    id integer NOT NULL PRIMARY KEY,
    description text NOT NULL
);
INSERT INTO project VALUES(1,'Project A');
INSERT INTO project VALUES(2,'Project B');
CREATE TABLE project_member (id integer NOT NULL PRIMARY KEY, project_id integer, member_id integer, FOREIGN KEY (project_id) REFERENCES project(id));
INSERT INTO project_member VALUES(5,1,1);
INSERT INTO project_member VALUES(6,1,2);
INSERT INTO project_member VALUES(7,1,4);
INSERT INTO project_member VALUES(8,2,1);
INSERT INTO project_member VALUES(9,2,3);
CREATE TABLE issue (
    id integer NOT NULL PRIMARY KEY,
    id_user integer NOT NULL,
    id_status integer NOT NULL,
    id_project integer NOT NULL,
    id_priority integer NOT NULL,
    id_category integer NOT NULL,
    id_member integer,
    register_date date NOT NULL,
    close_date date,
    issue_time character(5),
    title text NOT NULL,
    description text NOT NULL,
    solution text,
    file text, close_time char(5),
    FOREIGN KEY (id_category) REFERENCES category(id),
    FOREIGN KEY (id_priority) REFERENCES priority(id),
    FOREIGN KEY (id_project) REFERENCES project(id),
    FOREIGN KEY (id_status) REFERENCES status(id)
);
CREATE TABLE note (
    id integer NOT NULL PRIMARY KEY,
    id_issue integer NOT NULL,
    id_user integer NOT NULL,
    note text,
    register_date date,
    register_time text,
    FOREIGN KEY (id_issue) REFERENCES issue(id)
);
COMMIT;
