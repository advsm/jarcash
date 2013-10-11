create table `payment_status` (
	`id` int(11) not null auto_increment primary key,
	`key` varchar(32) not null unique key,
	`name` varchar(64) not null
) Engine=InnoDB default charset=utf8;
insert into `payment_status` (`id`, `key`,`name`) values (1,'in_progress', 'В обработке');
insert into `payment_status` (`id`, `key`,`name`) values (2,'finished', 'Выполнен');

alter table `profile_payment` add column `status_id` int(11) not null;
update `profile_payment` set `status_id`=2;

alter table `profile_payment` add constraint `pp_ref_payment_status` foreign key (`status_id`) references `payment_status`(`id`);

