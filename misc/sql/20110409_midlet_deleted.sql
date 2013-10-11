
alter table midlet add column deleted tinyint unsigned not null default 0;

/** добавление новой колонки */
insert into admin_section_property set
  `key` = 'deleted',
  name = 'Удален?',
  description = null,
  section_id = (select id from admin_section where `key` = 'midlet'),
  show_in_list = 0,
  show_in_item = 1;  