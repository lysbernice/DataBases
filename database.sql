use site_cars;

create table users_table(
    id_user int not null auto_increment primary key,
    nom varchar (255) not null,
    adresse varchar (255) not null,
    numero_telephone int not null,
    username varchar (255) not null,
    mot_de_passe text not null
);
create table produit(
    id_prod int not null auto_increment primary key,
    Nom_prod varchar(255) not null,
    prix int not null
);

create table payment_lumicash(
    id_pay_lumi int not null auto_increment primary key,
    Numero_de_votre_Sim int not null,
    Kabanga int not null,
    Shiramw_igitigiri_c_amahera int not null,
    Servisi_ya_lumicash varchar(255) not null

);

create table payment_carte(
    id_carte int not null auto_increment primary key,
    Nom varchar(255) not null,
    CVV int not null,
    N_de_la_carte_bancaire int not null,
    Date_d_expiration int not null

);