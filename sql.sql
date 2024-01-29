#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: baskets
#------------------------------------------------------------

CREATE TABLE baskets(
        id_basket Int  Auto_increment  NOT NULL ,
        price     Int NOT NULL
	,CONSTRAINT baskets_PK PRIMARY KEY (id_basket)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: subscriptions
#------------------------------------------------------------

CREATE TABLE subscriptions(
        id_subscription Int  Auto_increment  NOT NULL ,
        status          Varchar (150) NOT NULL ,
        frequency       Varchar (150) NOT NULL ,
        start_date      Datetime NOT NULL ,
        end_date        Datetime NOT NULL ,
        id_basket       Int NOT NULL
	,CONSTRAINT subscriptions_PK PRIMARY KEY (id_subscription)

	,CONSTRAINT subscriptions_baskets_FK FOREIGN KEY (id_basket) REFERENCES baskets(id_basket)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: pickups
#------------------------------------------------------------

CREATE TABLE pickups(
        id_pickup     Int  Auto_increment  NOT NULL ,
        name          Varchar (150) NOT NULL ,
        address       Varchar (150) NOT NULL ,
        opening_hours Varchar (150) NOT NULL ,
        created_at    Datetime NOT NULL ,
        updated_at    Datetime NOT NULL ,
        deleted_at    Datetime NOT NULL
	,CONSTRAINT pickups_PK PRIMARY KEY (id_pickup)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: users
#------------------------------------------------------------

CREATE TABLE users(
        id_user         Int  Auto_increment  NOT NULL ,
        email           Varchar (200) NOT NULL ,
        password        Varchar (255) NOT NULL ,
        firstname       Varchar (150) NOT NULL ,
        lastname        Varchar (150) NOT NULL ,
        role_producer   Bool ,
        role_admin      Bool ,
        created_at      Datetime NOT NULL ,
        updated_at      Datetime NOT NULL ,
        deleted_at      Datetime ,
        id_subscription Int ,
        id_basket       Int NOT NULL ,
        id_pickup       Int
	,CONSTRAINT users_PK PRIMARY KEY (id_user)

	,CONSTRAINT users_subscriptions_FK FOREIGN KEY (id_subscription) REFERENCES subscriptions(id_subscription)
	,CONSTRAINT users_baskets0_FK FOREIGN KEY (id_basket) REFERENCES baskets(id_basket)
	,CONSTRAINT users_pickups1_FK FOREIGN KEY (id_pickup) REFERENCES pickups(id_pickup)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: orders
#------------------------------------------------------------

CREATE TABLE orders(
        id_order          Int  Auto_increment  NOT NULL ,
        status            Varchar (150) NOT NULL ,
        order_total_price Float NOT NULL ,
        order_tva         Float NOT NULL ,
        created_at        Datetime NOT NULL ,
        id_user           Int NOT NULL ,
        id_basket         Int NOT NULL ,
        id_pickup         Int NOT NULL
	,CONSTRAINT orders_PK PRIMARY KEY (id_order)

	,CONSTRAINT orders_users_FK FOREIGN KEY (id_user) REFERENCES users(id_user)
	,CONSTRAINT orders_baskets0_FK FOREIGN KEY (id_basket) REFERENCES baskets(id_basket)
	,CONSTRAINT orders_pickups1_FK FOREIGN KEY (id_pickup) REFERENCES pickups(id_pickup)
	,CONSTRAINT orders_baskets_AK UNIQUE (id_basket)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: producers_profiles
#------------------------------------------------------------

CREATE TABLE producers_profiles(
        id_producer_profile  Int  Auto_increment  NOT NULL ,
        company_name         Varchar (150) ,
        siret                Int ,
        producer_description Text ,
        producer_img_logo    Blob ,
        producer_img_cover   Blob ,
        phone                Varchar (50) ,
        address              Varchar (150) ,
        zip                  Varchar (5) ,
        city                 Varchar (5) ,
        created_at           Datetime NOT NULL ,
        updated_at           Datetime NOT NULL ,
        deleted_at           Datetime ,
        id_user              Int NOT NULL
	,CONSTRAINT producers_profiles_PK PRIMARY KEY (id_producer_profile)

	,CONSTRAINT producers_profiles_users_FK FOREIGN KEY (id_user) REFERENCES users(id_user)
	,CONSTRAINT producers_profiles_users_AK UNIQUE (id_user)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Types
#------------------------------------------------------------

CREATE TABLE Types(
        id_type   Int  Auto_increment  NOT NULL ,
        type_name Varchar (150) NOT NULL
	,CONSTRAINT Types_PK PRIMARY KEY (id_type)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: products
#------------------------------------------------------------

CREATE TABLE products(
        id_product     Int  Auto_increment  NOT NULL ,
        product_name   Varchar (150) NOT NULL ,
        description    Text NOT NULL ,
        bio_production Bool NOT NULL ,
        certification  Varchar (150) ,
        weight         Float NOT NULL ,
        weight_unit    Varchar (50) NOT NULL ,
        unit_price     Float NOT NULL ,
        tva            Float NOT NULL ,
        picture        Varchar (150) ,
        online         Bool NOT NULL ,
        created_at     Datetime NOT NULL ,
        updated_at     Datetime NOT NULL ,
        valid_at       Datetime ,
        deleted_at     Datetime ,
        id_user        Int NOT NULL ,
        id_type        Int NOT NULL
	,CONSTRAINT products_PK PRIMARY KEY (id_product)

	,CONSTRAINT products_users_FK FOREIGN KEY (id_user) REFERENCES users(id_user)
	,CONSTRAINT products_Types0_FK FOREIGN KEY (id_type) REFERENCES Types(id_type)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: reviews
#------------------------------------------------------------

CREATE TABLE reviews(
        id_review  Int  Auto_increment  NOT NULL ,
        created_at Datetime NOT NULL ,
        comment    Text NOT NULL ,
        rating     Int NOT NULL ,
        id_user    Int NOT NULL ,
        id_product Int NOT NULL
	,CONSTRAINT reviews_PK PRIMARY KEY (id_review)

	,CONSTRAINT reviews_users_FK FOREIGN KEY (id_user) REFERENCES users(id_user)
	,CONSTRAINT reviews_products0_FK FOREIGN KEY (id_product) REFERENCES products(id_product)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: baskets_products
#------------------------------------------------------------

CREATE TABLE baskets_products(
        id_product Int NOT NULL ,
        id_basket  Int NOT NULL ,
        quantity   Int NOT NULL
	,CONSTRAINT baskets_products_PK PRIMARY KEY (id_product,id_basket)





	=======================================================================
	   Désolé, il faut activer cette version pour voir la suite du script ! 
	=======================================================================
