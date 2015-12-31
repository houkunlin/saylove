
CREATE TABLE IF NOT EXISTS `countlog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `num` int(11) NOT NULL DEFAULT '0',
  `txt` varchar(225) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

TRUNCATE TABLE `countlog`;
INSERT INTO `countlog` (`id`, `num`, `txt`) VALUES
(1, 0, '表白数目'),
(2, 0, '评论数目'),
(3, 0, '点赞数目');

CREATE TABLE IF NOT EXISTS `likenumlog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `toid` int(11) NOT NULL,
  `add_time` datetime DEFAULT NULL,
  `add_ip` varchar(20) DEFAULT NULL,
  `add_ua` varchar(225) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

TRUNCATE TABLE `likenumlog`;
CREATE TABLE IF NOT EXISTS `lovelist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `from` varchar(225) NOT NULL,
  `to` varchar(225) NOT NULL,
  `toemail` varchar(225) DEFAULT NULL,
  `content` text NOT NULL,
  `likenum` int(11) NOT NULL DEFAULT '0',
  `review` varchar(11) NOT NULL DEFAULT '0',
  `countnum` int(11) NOT NULL DEFAULT '0',
  `add_time` datetime DEFAULT NULL,
  `add_ip` varchar(20) DEFAULT NULL,
  `add_ua` varchar(225) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

TRUNCATE TABLE `lovelist`;
CREATE TABLE IF NOT EXISTS `reviewlog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `toid` int(11) NOT NULL,
  `content` varchar(225) NOT NULL,
  `add_time` datetime DEFAULT NULL,
  `add_ip` varchar(20) DEFAULT NULL,
  `add_ua` varchar(225) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

TRUNCATE TABLE `reviewlog`;