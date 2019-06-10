drop database if exists gestion_stag;
create database if not exists gestion_stag;
use gestion_stag;

create table filiere(
   idFiliere int(4) auto_increment primary key, 
    nomFiliere varchar(50),
    niveau varchar(50)
);

create table stagiaire(
    idStagiaire int(4) auto_increment primary key,
    nom varchar(50),
    prenom varchar(50),
    civilite varchar(1),
    photo varchar(100),
    idFiliere int(4)
);

create table utilisateur(
     idUser int(4) auto_increment primary key, 
     login varchar(50),
     email varchar(255),
     role varchar(50),
     etat int(1),
     pwd varchar(255)

);

alter table stagiaire add constraint foreign key(idFiliere) references filiere(idFiliere);

insert into filiere(nomFiliere,niveau) values ('TSDI','Ingenieur'),('TSGE','Ingenieur'),('TGI','Ingenieur'),('TSGE','Ingenieur'),('TGI','Master'),('TSRI','Technicien'),('TCE','Master') ,('TSDI','Master'),('TSGE','Master'),('TGI','Doctorat'),('TCE','Master') ,('TSDI','Ingenieur'),('TSGE','Ingenieur'),('TGI','Doctorat'),('TSRI','Doctorat'),('TCE','Master'), ('TSDI','Master'),('TSGE','Ingenieur'),('TGI','Master'),('TSRI','Ingenieur'),('TGI','Doctorat'),('TSRI','Ingenieur'),('TCE','Doctorat');


insert into utilisateur(login,email,role,etat,pwd) values ('admin','user1@outlook.fr','VISITEUR',1,md5('123')),('user1','aymentoukebri@outlook.fr','ADMIN',0,md5('123')),('user2','user2@outlook.fr','VISITEUR',1,md5('123'));

insert into stagiaire(nom,prenom,civilite,photo,idFiliere) values
('toukebri','aymen','M','photo1.jpg',1),
('toukebri','adem','M','photo2.jpg',2),
('toukebri','ayoub','M','photo3.jpg',3),
('toukebri','aymen','M','photo1.jpg',1),
('toukebri','adem','M','photo2.jpg',2),
('tabai','wafed','M','photo3.jpg',3),
('toukebri','aymen','M','photo1.jpg',1),
('toukebri','adem','M','photo2.jpg',2),
('toukebri','ayoub','M','photo3.jpg',3),
('toukebri','aymen','M','photo1.jpg',1),
('toukebri','adem','M','photo2.jpg',2),
('tabai','wafed','M','photo3.jpg',3);
select * from filiere;
select * from utilisateur;
select * from stagiaire;
                            