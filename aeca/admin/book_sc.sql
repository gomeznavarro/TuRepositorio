
use Sql18226_1;

create table customers
( 
  customerid int unsigned not null auto_increment primary key,
  name char(40) not null,
  address char(40) not null,
  city char(20) not null,
  state char(20), 
  zip char(10),
  country char(20) not null
);

create table orders
( 
  orderid int unsigned not null auto_increment primary key,
  customerid int unsigned not null,
  amount float(6,2),
  date date not null,
  order_status char(10),
  ship_name char(40) not null,
  ship_address char(40) not null,
  ship_city char(20) not null,
  ship_state char(20), 
  ship_zip char(10),
  ship_country char(20) not null
);

create table books
(  
   isbn char(13) not null primary key,
   author char(30),
   title char(60),
   catid int unsigned, 
   price float(4,2) not null,
   description varchar(255)
);

create table categories
(
  catid int unsigned not null auto_increment primary key,
  catname char(40) not null
);
create table subcategories
(
 subcatid int unsigned not null auto_increment primary key,  
  subcatname char(40) not null,
  catid int  not null
);
create table shops
(
 shopid int unsigned not null auto_increment primary key,  
  shopname char(40) not null,
  subcatid int  not null
);

create table order_items
( 
  orderid int unsigned not null,
  isbn char(13) not null,
  item_price float(4,2) not null, 
  quantity tinyint unsigned not null,
  primary key (orderid, isbn)
);

create table admin
(
  username varchar(16) not null primary key,
  password varchar(41) not null
);

