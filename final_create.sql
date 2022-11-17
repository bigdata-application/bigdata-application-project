create database team06;

use team06;


create table user (
 user_idx int not null auto_increment primary key, 
 user_name varchar(20) not null unique, 
 user_pw varchar(20) not null
);

create table genre (
    genre_id int not null AUTO_INCREMENT PRIMARY key,
    genre_name varchar(20)
);


create table mv_info (
mvcode int not null,
movie_name_kor varchar(100) not null,
earned_money bigint not null,
audience int not null,
nation varchar(5) not null,
genre varchar(100) not null,
movie_name_En varchar(100) not null,
primary key(mvcode)
);

create table audience_num_by_day (
id int not null auto_increment,
day varchar(5) not null,
audience_num bigint not null,
nation varchar(5) not null,
primary key(id)
);

CREATE TABLE FOOD_NAME_LIST (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    food_name VARCHAR(30)
);

create table user_prefer_food_vote (
 id int not null auto_increment primary key, 
 user_idx int not null,
 food_name_id int not null,
 foreign key (user_idx) references user(user_idx),
 foreign key (food_name_id) references food_name_list(id)
); 

CREATE TABLE nation (
	nation_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	nation_name VARCHAR(10)
);

CREATE TABLE audience_range (
	range_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	audience_range VARCHAR(50) NOT NULL
);



create table prefer_food_ranking_comment (
 id int not null auto_increment primary key, 
 user_idx int not null, 
 content varchar(100) not null, 
 foreign key (user_idx) references user(user_idx)
);


CREATE TABLE GENRE_RANKING_BY_NATION_COMMENT (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    user_idx INT NOT NULL,
    nation_id INT,
    genre_id INT not null,
    content VARCHAR(100) NOT NULL,
    FOREIGN KEY(user_idx) REFERENCES USER(user_idx),
    FOREIGN KEY(nation_id) REFERENCES NATION(nation_id),
	FOREIGN KEY(genre_id) REFERENCES genre(genre_id)
);



create table audience_range_comment(
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    user_idx INT NOT NULL,
    range_id INT,
    nation_id INT,
    content VARCHAR(100) NOT NULL,
	FOREIGN KEY (user_idx) references user(user_idx),
    FOREIGN KEY (range_id) references audience_range(range_id),
	FOREIGN KEY (nation_id) references nation(nation_id)
);

create table audience_ranking_by_day_comment (
	id int not null auto_increment primary key,
	user_idx int not null,
	content varchar(100),
	FOREIGN KEY(user_idx) REFERENCES USER(user_idx)
);


CREATE INDEX mv_info_genre
On mv_info (genre);

CREATE INDEX audience_num_by_day_nation
On audience_num_by_day (nation);
