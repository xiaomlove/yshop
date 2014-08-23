#用户模块

create database ys_shop;

#用户表
create table ys_user (
	user_id int unsigned primary key auto_increment,
	user_name varchar(20) not null,
	user_real_name varchar(20),
	user_type tinyint unsigned not null,
	user_gender tinyint unsigned not null,
	user_salt varchar(20) not null,
	user_password  varchar(20) not null,
	user_email varchar(20) not null,
	user_phone varchar(20),
	user_qq varchar(20),
	user_birthday int unsigned,
	user_cost_credits mediumint unsigned not null default 0,
	user_credit_credits mediumint unsigned not null default 0,
	user_role_key varchar(10) not null,
	user_role_time int unsigned not null,
	user_is_disabled tinyint unsigned not null default 0,
	user_is_validated tinyint unsigned not null default 0,
	user_last_login_ip varchar(32) not null ,
	user_last_login_time int unsigned not null,
	user_login_count mediumint unsigned not null default 0,
	user_register_ip varchar(32) not null,
	user_register_time int unsigned not null
) engine=InnoDB default charset=utf8;



#用户关注表
create table ys_user_focus (
	user_focus_id smallint unsigned primary key auto_increment,
	user_id int unsigned not null,
	item_id int unsigned not null,
	user_focus_time int unsigned not null,
	user_focus_price decimal(10,2) not null,
	item_news_list varchar(64)
) engine=InnoDB default charset=utf8;


#用户角色表
create table ys_user_role (
	user_role_id tinyint unsigned primary key auto_increment,
	user_role_type tinyint unsigned not null,
	user_role_key varchar(20) not null,
	user_role_name varchar(20) not null,
	user_role_credits mediumint unsigned not null,
	user_role_duration mediumint unsigned not null,
	user_role_expire_credits smallint unsigned not null,
	user_role_add_time int unsigned not null,
	user_role_modify_time int unsigned not null
	
) engine=InnoDB default charset=utf8;


#角色权限（值）表
create table ys_role_rule (
	role_rule_id smallint unsigned primary key auto_increment,
	user_role_key varchar(20) not null,
	rule_id smallint unsigned not null,
	role_rule_value varchar(128) not null,
	role_rule_add_time int unsigned not null,
	role_rule_modify_time int unsigned not null	
	
) engine=InnoDB default charset=utf8;



#权限名表
create table ys_rule (
	rule_id smallint unsigned primary key auto_increment,
	rule_name varchar(128) not null,
	rule_type tinyint unsigned not null,
	rule_pid smallint unsigned not null,
	rule_add_time int unsigned not null,
	rule_modify_time int unsigned not null
	
) engine=InnoDB default charset=utf8;


#用户登陆日志表
create table ys_user_loginlog (
	user_loginlog_id int unsigned primary key auto_increment,
	user_id int unsigned not null,
	user_login_time int unsigned not null,
	user_login_ip varchar(32) not null,
	user_login_address varchar(128) not null
	
) engine=InnoDB default charset=utf8;



#评分表
create table ys_rate (
	rate_id int unsigned primary key auto_increment,
	item_id int unsigned not null,
	user_id int unsigned not null,
	user_type tinyint unsigned not null,
	rate_value decimal(2,1) not null,
	rate_add_time int unsigned not null,
	rate_modify_time int unsigned not null
	
) engine=InnoDB default charset=utf8;



#商品咨询评论内容表
create table ys_item_ask_comment (
	item_ask_comment_id int unsigned primary key auto_increment,
	item_id int unsigned not null,
	item_ask_comment_type tinyint unsigned not null,
	item_ask_comment_pid int unsigned not null,
	item_ask_comment_user_id int unsigned not null,
	item_ask_comment_title varchar(20) not null,
	item_ask_comment_content text not null,
	item_ask_comment_good_count smallint unsigned not null default 0,
	item_ask_comment_bad_count smallint unsigned not null default 0,
	item_ask_comment_add_time int unsigned not null,
	item_ask_comment_modify_time int unsigned not null
	
) engine=InnoDB default charset=utf8;

#-------------------------------------------------------------------------


#商品模块

#品牌表
create table ys_brand (
	brand_id mediumint unsigned primary key auto_increment,
	brand_name varchar(20) not null,
	brand_english_name varchar(20),
	brand_description text,
	brand_logo_img varchar(100),
	brand_home_url varchar(100),
	brand_add_time int unsigned not null,
	brand_modify_time int unsigned not null
	
) engine=InnoDB default charset=utf8;


#分类表
create table ys_item_category (
	item_category_id mediumint unsigned primary key auto_increment,
	item_category_pid smallint unsigned not null,
	item_category_name varchar(30) not null,
	item_category_description text,
	item_category_sort smallint unsigned not null default 100,
	item_category_add_time int unsigned not null,
	item_category_modify_time int unsigned not null
	
) engine=InnoDB default charset=utf8;


#分类品牌表
create table ys_item_category_brand (
	item_category_brand_id mediumint unsigned primary key auto_increment,
	item_category_id smallint unsigned not null,
	brand_id smallint unsigned not null,	
	item_category_brand_sort smallint unsigned not null default 100,
	item_category_brand_add_time int unsigned not null
	
	
) engine=InnoDB default charset=utf8;


#属性名表
create table ys_prop (
	prop_id mediumint unsigned primary key auto_increment,
	prop_pid smallint unsigned not null,
	item_category_id smallint unsigned not null,
	prop_name varchar(20) not null,
	prop_is_null tinyint unsigned not null,
	prop_is_input tinyint unsigned  not null,
	prop_is_select tinyint unsigned  not null,
	prop_is_color tinyint unsigned  not null,
	prop_is_textarea tinyint unsigned  not null,
	prop_is_checkbox tinyint unsigned  not null,
	prop_is_radio tinyint unsigned  not null,
	prop_is_search tinyint unsigned  not null,
	prop_is_sale tinyint unsigned  not null,
	prop_is_show tinyint unsigned  not null default 1,
	prop_sort smallint unsigned not null default 100,
	prop_add_time int unsigned not null,
	prop_modify_time int unsigned not null
	
) engine=InnoDB default charset=utf8;

#属性值表
create table ys_prop_value (
	prop_value_id mediumint unsigned primary key auto_increment,
	prop_id smallint unsigned not null,
	prop_value varchar(20) not null,
	prop_sort smallint unsigned not null default 100,
	
	prop_add_time int unsigned not null,
	prop_modify_time int unsigned not null
	
) engine=InnoDB default charset=utf8;


#品牌系列表
create table ys_brand_series (
	brand_series_id mediumint unsigned primary key auto_increment,
	brand_series_pid smallint unsigned not null,
	item_category_brand_id smallint unsigned not null,
	brand_series_name varchar(20) not null,
	brand_series_description text,
	brand_series_sort smallint unsigned not null default 100,
	
	brand_series_add_time int unsigned not null,
	brand_series_modify_time int unsigned not null
	
) engine=InnoDB default charset=utf8;


#系列下的既定属性表
create table ys_series_constant_prop (
	series_constant_prop_id smallint unsigned primary key auto_increment,
	brand_series_id mediumint unsigned not null, 
	series_constant_prop_name varchar(20) not null,
	prop_id_list varchar(128),
	series_constant_prop_add_time int unsigned not null,
	series_constant_prop_modify_time int unsigned not null
	
) engine=InnoDB default charset=utf8;



#商品表
create table ys_item (
	item_id int unsigned primary key auto_increment,
	item_category_id smallint unsigned not null,
	brand_id mediumint unsigned not null,
	brand_series_id mediumint unsigned not null, 
	item_name varchar(100) not null,
	item_description text not null,
	item_is_onsale tinyint not null default 1,
	item_is_deled tinyint not null default 0,
	freight_model_id smallint,
	item_sold_count mediumint not null default 0,
	item_comment_count mediumint not null default 0,
	item_focus_count mediumint not null default 0,
	item_view_count mediumint not null default 0,
	item_rate decimal(2,1) not null default 0,
	
	item_add_time int unsigned not null,
	item_modify_time int unsigned not null
	
) engine=InnoDB default charset=utf8;


#商品基本属性表
create table ys_item_prop (
	item_prop_id smallint unsigned primary key auto_increment,
	item_id int unsigned not null, 
	prop_id mediumint unsigned not null, 
	prop_value_id_list varchar(128),
	item_prop_is_sku tinyint unsigned not null default 0
	
) engine=InnoDB default charset=utf8;


#商品SKU表
create table ys_item_sku (
	item_sku_id smallint unsigned primary key auto_increment,
	item_id int unsigned not null, 
	prop_id_combine varchar(128) not null, 
	prop_value_id_combine varchar(256) not null, 
	item_sku_price decimal(10,2) not null,
	item_sku_number smallint not null,
	item_sku_product_code varchar(128),
	item_sku_bar_code varchar(128)
	
) engine=InnoDB default charset=utf8;


#商品成交记录表
create table ys_item_soldlog (
	item_soldlog_id smallint unsigned primary key auto_increment,
	item_id int unsigned not null,
	item_sold_name varchar(100) not null,
	item_sku_info varchar(64) not null,
	item_sold_price decimal(10,2) not null,
	item_sold_time int unsigned not null,
	item_promotion_id mediumint unsigned not null default 0
	
) engine=InnoDB default charset=utf8;



#组合套餐表
create table ys_item_package (
	item_package_id smallint unsigned primary key auto_increment,
	item_package_name varchar(64) not null,
	item_package_type tinyint unsigned not null,
	item_package_discount_rule varchar(32) not null,
	custom_item_package_key varchar(20) not null,
	item_package_add_time int unsigned not null,
	item_package_modify_time int unsigned not null
	
) engine=InnoDB default charset=utf8;


#自定义组合套餐规则表
create table ys_custom_item_package (
	custom_item_package_id smallint unsigned primary key auto_increment,
	custom_item_package_key varchar(20) not null,
	custom_item_package_value varchar(10) not null,
	item_id int unsigned not null
	
) engine=InnoDB default charset=utf8;


#商品价格变动表
create table ys_item_price_changelog (
	item_price_changelog_id mediumint unsigned primary key auto_increment,
	item_id int unsigned not null,
	item_name varchar(100) not null,
	item_price decimal(10,2) not null,
	item_price_changelog_add_time int not null
	
	
) engine=InnoDB default charset=utf8;