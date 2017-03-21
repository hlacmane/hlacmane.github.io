DROP TABLE users; 
CREATE TABLE users(userid integer primary key, shareduserid integer, username varchar(20), password varchar(255), title varchar(3), firstname varchar(15), lastname varchar(15), email varchar(50), promoemails varchar(3), salt varchar(255));
insert into users VALUES(NULL, NULL, "testuser1", "correctthispasswordwithhash", "Mr", "firstname1test", "lastname1test", "testuser1@email.com", "on", NULL);


DROP TABLE lists;
CREATE TABLE lists(listid integer primary key, userid integer, shareduserid integer, listname varchar(30), priority varchar(15), listcategory varchar(20), lastedited datetime);
insert into lists VALUES(NULL, 1, NULL, "testList1", "high", "categone", '2013-01-01 01:01:00');
insert into lists VALUES(NULL, 1, NULL, "testList2", "low", "categone", Datetime('now'));

DROP TABLE listitems;
CREATE TABLE listitems(listitemid integer primary key, userid integer, shareduserid integer, listid integer, itemtext text, doneornot varchar(3), lastediteditem datetime);
insert into listitems VALUES(NULL, 1, NULL, 1, "item1dsfbsdfdiosjfidjfisdsfdfpojk", 'yes' , Datetime('now'));



SELECT * FROM users INNER JOIN lists on lists.userid = users.userid;

SELECT * FROM lists INNER JOIN listitems on listitems.listid = lists.listid;
