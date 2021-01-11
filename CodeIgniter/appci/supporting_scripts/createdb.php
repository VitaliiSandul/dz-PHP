<?php 

function connect(
    $host='localhost',
    $user='mysql',
    $pass='mysql',
    $dbname='users')
{
$link=mysqli_connect($host,$user,$pass) or die('connection error');
mysqli_select_db($link, $dbname) or die('DB open error');
mysqli_query($link, "set names 'utf8'");
return $link;
}


$link = connect();
$ct1='create table users(
id int not null auto_increment primary key, 
name varchar(64),
lastname varchar(64),
login varchar(64) unique, 
birthday datetime
)default charset="utf8"';

$ins1 = 
    '
        insert into users (name,lastname,login,birthday)
        values ("name1","lastname 1","user1","2000-12-01"),
        ("name2","lastname 2","user2","2000-11-02"),
        ("name3","lastname 3","user3","1999-10-03"),
        ("name4","lastname 4","user4","1998-09-04"),
        ("name5","lastname 5","user5","1997-08-05"),
        ("name6","lastname 6","user6","1996-07-06"),
        ("name7","lastname 7","user7","1995-06-07"),
        ("name8","lastname 8","user8","1994-05-08"),
        ("name9","lastname 9","user9","1993-04-09"), 
        ("name10","lastname 10","user10","1992-03-10")      
    ';  

mysqli_query($link, $ct1);
$err=mysqli_errno($link);
if ($err){
	echo 'Error code 1:'.$err.'<br>';
	exit();
}

mysqli_query($link, $ins1);
$err=mysqli_errno($link);
if ($err){
	echo 'Error code 1:'.$err.'<br>';
	exit();
}

?>