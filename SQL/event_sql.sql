CREATE DEFINER=`root`@`localhost` EVENT `30minute` ON SCHEDULE EVERY 1800 SECOND STARTS '2018-06-04 00:00:00' ENDS '2019-05-04 00:00:00' 
ON COMPLETION NOT PRESERVE ENABLE DO INSERT INTO `discounts` (`id_discount`, `id_article`, `date_start`, `date_end`)
VALUES (NULL,(select id_article from articles ORDER BY RAND() LIMIT 1), CURRENT_TIME , current_timestamp + interval '1800' second )
