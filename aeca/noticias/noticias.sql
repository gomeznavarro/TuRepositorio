create table noticias ( 
id_noticia int(4) auto_increment not null, 
autor varchar(255), 
titulo varchar(255), 
categoria varchar(255), 
fecha datetime not null, 
noticia blob, key(id_noticia) 
)