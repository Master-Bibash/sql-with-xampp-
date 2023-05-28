use stuatten;
select * from tb_user ;


Delimiter //
CREATE PROCEDURE `put_usertable` (
in _fname varchar(20),
in _lname varchar(20),
in _mname varchar(20),
in _country varchar(20),
in _state varchar(20),
in _district varchar(20),
in _dob varchar(40),
in _age int(11),
in _gender varchar(5),
in _email varchar(20),
in _password varchar(20),
in _confirmpassword varchar(20)
)

BEGIN
INSERT INTO tb_user 
( Fname, Lname, Mname, Country, state, District, DOB, age, gender, email, password, confirmpassword)
values( _fname, _lname, _mname, _country, _state, _district, _dob, _age, _gender, _email, _password, _confirmpassword);

END  //
Delimiter //

use stuatten;
select * from tb_user;

