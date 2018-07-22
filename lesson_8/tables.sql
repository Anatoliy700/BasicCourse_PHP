create table images
(
	id int auto_increment
		primary key,
	name varchar(127) not null,
	path varchar(127) not null,
	product_id int not null,
	constraint images___fk_product
		foreign key (product_id) references products (id)
			on delete cascade
)
;

create index images___fk_product
	on images (product_id)
;
__________________________________

create table order_product
(
	id int auto_increment
		primary key,
	id_product int not null,
	amount int not null,
	id_order int not null,
	constraint order_product___fk_products
		foreign key (id_product) references products (id)
			on delete cascade,
	constraint order_product___fk_orders
		foreign key (id_order) references orders (id)
			on delete cascade
)
;

create index order_product___fk_orders
	on order_product (id_order)
;

create index order_product___fk_products
	on order_product (id_product)
;

______________________________________


create table orders
(
	id int auto_increment
		primary key,
	id_user int not null,
	amountProducts int not null,
	total_price int not null,
	id_status int default '1' not null,
	constraint orders___fk_user
		foreign key (id_user) references users (id),
	constraint orders___fk_status
		foreign key (id_status) references status_order (id)
)
;

create index orders___fk_user
	on orders (id_user)
;

create index orders___fk_status
	on orders (id_status)
;

_______________________________________


create table products
(
	id int auto_increment
		primary key,
	title varchar(127) not null,
	description varchar(255) not null,
	price int not null
)
;

___________________________________



create table status_order
(
	id int auto_increment
		primary key,
	name varchar(30) not null
)
;

_____________________________



create table users
(
	id int auto_increment
		primary key,
	name varchar(50) not null,
	login varchar(50) not null,
	pass varchar(255) not null,
	access int default '0' not null,
	constraint users_login_uindex
		unique (login)
)
;

