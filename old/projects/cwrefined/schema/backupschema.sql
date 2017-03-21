--users table
DROP TABLE users; 
CREATE TABLE users(userid integer primary key, username varchar(20), password varchar(255), title varchar(3), firstname varchar(15), lastname varchar(15), email varchar(50), promoemails varchar(3), salt varchar(255));
insert into users VALUES(NULL, "test1", "correctthispasswordwithhash", "Mr", "firstname1test", "lastname1test", "testuser1@email.com", "on", NULL);

--bills table
DROP TABLE bills;
CREATE TABLE bills(billid integer primary key, billname varchar(30), totalcost double, ownerid integer, groupid integer, paid varchar(3), categ varchar(20), created datetime, lastedited datetime, due datetime);

--billgroups
DROP TABLE bgroups;
CREATE TABLE bgroups(groupid integer primary key, billid integer, groupname varchar(30),groupownerid integer, groupsize integer,eachcost double, gpass varchar(255), gsalt varchar(255));

--usertogroup table
DROP TABLE utog;
CREATE TABLE utog(userid integer, groupid integer, billid integer, paid varchar(3));

-- add 15 user columns????????????????????????
-- have another to check if each user had paid??????????????????????