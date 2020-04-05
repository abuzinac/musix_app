# sipavanje baze
#C:\xampp\mysql\bin\mysql.exe -ubuzinac -pbuzinac --default_character_set=utf8 < C:\xampp\htdocs\musix_app\musix.sql


drop database if exists musix;
create database musix character set utf8 collate utf8_croatian_ci;

use musix;

create table albums
(
    id          int auto_increment
        primary key,
    title       varchar(250) not null,
    artist      int          null,
    genre       int          null,
    artworkPath varchar(500) null
);

create table artists
(
    id   int auto_increment
        primary key,
    name varchar(50) null
);

create table genres
(
    id   int auto_increment
        primary key,
    name varchar(50) not null
);

create table songs
(
    id         int auto_increment
        primary key,
    title      varchar(250) not null,
    artist     int          not null,
    album      int          null,
    genre      int          null,
    duration   varchar(8)   not null,
    path       varchar(500) null,
    albumOrder int          not null,
    plays      int          not null
);

create table users
(
    id         int auto_increment
        primary key,
    username   varchar(25)  not null,
    firstName  varchar(50)  not null,
    lastName   varchar(50)  not null,
    email      varchar(200) not null,
    password   varchar(32)  not null,
    signUpDate datetime     not null,
    profilePic varchar(500) not null
);

