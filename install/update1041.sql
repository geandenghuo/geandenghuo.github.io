alter table if_order add number int after endTime;
update if_config set if_k = 'epay_id' where if_k = 'xq_id';
update if_config set if_k = 'epay_key' where if_k = 'xq_key';
update if_config set if_k = 'payapi' where if_k = 'paiapi';
DROP TABLE IF EXISTS `if_blacklist`;
CREATE TABLE `if_blacklist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `data` varchar(200) DEFAULT NULL,
  `remarks` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `if_syslog`;
CREATE TABLE `if_syslog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `log_name` varchar(20) DEFAULT NULL,
  `log_time` datetime DEFAULT NULL,
  `log_txt` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;