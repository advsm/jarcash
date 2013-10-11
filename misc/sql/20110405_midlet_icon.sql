
alter table midlet add column icon varchar(32) not null after original_url;

set names utf8;
CREATE TABLE `midlet_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(32) NOT NULL unique key comment 'Ключ также является именем папки, в которой лежат скомпиленные классы мидлета',
  `version` varchar(32) not null comment 'Версия отображается внутри Манифеста мидлета',
  name varchar(32) not null comment 'Имя отображается при генерации мидлета адвертом',
  `description` text comment 'Общее описание и различия с предыдущей версией',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

insert into midlet_type set  `key` = 'waiting_1.0.0', version = '1.0.0', name='Задержка перед отправкой', description = 'После нажатия ОК происходит установленная вами задержка, делается запрос на первую СМС, потом снова задержка, и снова запрос на СМС.';



alter table midlet add column type_id int(11) null after description;
alter table midlet add foreign key (type_id) references midlet_type (id);
update midlet set type_id = (select id from midlet_type);
alter table midlet modify type_id int(11) not null after description;


alter table sms_billing add column prefix varchar(16) not null after url;
update sms_billing set prefix = '410+jarcash';
