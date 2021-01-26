<?php 

function connect(
    $host='localhost',
    $user='mysql',
    $pass='mysql',
    $dbname='taskmanager')
{
$link=mysqli_connect($host,$user,$pass) or die('connection error');
mysqli_select_db($link, $dbname) or die('DB open error');
mysqli_query($link, "set names 'utf8'");
return $link;
}

$link = connect();

$ct1='create table appusers(
userid int not null auto_increment primary key, 
firstname varchar(100) not null,
lastname varchar(100) not null,
email varchar(100) not null,
login varchar(100) not null unique,
password varchar(100) not null
)default charset="utf8"';


$ct2='create table apptasks(
taskid int not null auto_increment primary key, 
userid int, 
foreign key(userid) references appusers(userid),
title varchar(100) not null,
details varchar(250) not null,
creationdate datetime,
priority ENUM("Low","Medium","High") DEFAULT "Low",
status boolean not null default false
)default charset="utf8"';


$ins1 = 
    '
        insert into appusers (firstname,lastname,email,login,password)
        values ("Serg","Yarosh","yarosh@gmail.com","yarosh","yarosh"),
        ("Vitalii","Sandul","sandul@gmail.com","sandul","sandul"), 
        ("Alexey","Mukharovskiy","mukharovskiy@gmail.com","mukharovskiy","mukharovskiy")     
    ';  

$ins2 = 
    '
        insert into apptasks (userid,title,details,creationdate,status)
        values (1,"Task 1","Details of task 1","2020-11-02",false),
        (2,"Task 2","Details of task 2","2020-10-03",true),
        (3,"Task 3","Details of task 3","2021-01-10",false),
        (2,"Task 4","Details of task 4","2020-10-10",true)    
    '; 

mysqli_query($link, $ct1);
$err=mysqli_errno($link);
if ($err){
	echo 'Error code 1:'.$err.'<br>';
	exit();
}

mysqli_query($link, $ct2);
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

mysqli_query($link, $ins2);
$err=mysqli_errno($link);
if ($err){
	echo 'Error code 1:'.$err.'<br>';
	exit();
}

?>