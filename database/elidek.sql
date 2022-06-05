#DROP SCHEMA IF EXISTS elidek;
CREATE SCHEMA elidek;
use elidek;
create table scient_field (
title varchar(45),
primary key(title)
);
create table executive(
named varchar(25),
primary key(named)
);
create table programm(
title varchar(45),
address varchar(45),
primary key(title,address)
);
create table researcher(
named varchar(25),
birtday date,
sex varchar(7),
check(sex in('Male','Female')),
primary key(named)
);
create table organism(
title varchar(45),
summary varchar(10),
address varchar(45),
city varchar(45),
zipcod int,
primary key(title)
);
CREATE TABLE project (
title VARCHAR(45) NOT NULL ,
summary varchar(900) ,
started date not null,
ended date not null,
stemsname varchar(25),
programmstitle varchar(45),
researchersname varchar(25),
organismstitle varchar(45),
foreign key(stemsname) references executive(named),
foreign key(researchersname) references researcher(named),
foreign key(programmstitle) references programm(title),
foreign key(organismstitle) references organism(title),
primary key(title)
);
create table evaluates(
projectstitle varchar(45),
researchersname varchar(25),
happend date,
score int,
foreign key(projectstitle) references project(title),
foreign key(researchersname) references researcher(named),
primary key(projectstitle,researchersname)
);
create table worksonproject(
projectstitle varchar(45),
researchersname varchar(25),
foreign key(projectstitle) references project(title),
foreign key(researchersname) references researcher(named),
primary key(projectstitle,researchersname)
);
create table deliverd(
title varchar(45),
summary varchar(900),
projectstitle varchar(45),
primary key(title),
foreign key (projectstitle) references project(title)
);
create table projects_scient_field(
projectstitle varchar(45) not null,
scientsfieldtitle varchar(45) ,
foreign key (projectstitle) references project(title),
foreign key (scientsfieldtitle) references scient_field(title),
primary key(projectstitle,scientsfieldtitle)
);
create table organismsphone(
organismstitle varchar(45),
phone int,
foreign key(organismstitle) references organism(title),
primary key(organismstitle,phone)
);
create table worksfor(
named varchar(25),
title varchar(45),
started date,
foreign key(title) references organism(title),
foreign key(named) references researcher(named),
primary key(named,title)
);
create table company(
title varchar(45),
badget int ,
foreign key(title) references organism(title)
);
create table university(
title varchar(45),
badget int ,
foreign key(title) references organism(title)
);
create table reseachcenter(
title varchar(45),
badget int ,
foreign key(title) references organism(title)
);


