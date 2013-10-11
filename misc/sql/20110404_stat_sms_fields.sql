
alter table statistic_sms add column cost float(5,2) not null after msisdn;
update statistic_sms set cost = 73 where sms_number_id = (select id from sms_number where number = '5111');


alter table statistic_sms add column request text null;
alter table statistic_sms add column response text null;