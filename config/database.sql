CREATE DATABASE camagru;USE camagru;CREATE TABLE `like_picture` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_picture` int(11) NOT NULL,
  `login_like` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;CREATE TABLE `comment_picture` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_picture` int(11) NOT NULL,
  `login_comment` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;CREATE TABLE `user` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `email` VARCHAR(255) NOT NULL ,
  `password` VARCHAR(255) NOT NULL ,
  `login` VARCHAR(255) NOT NULL ,
  `cle` VARCHAR(255) NOT NULL,
  `actif` INT DEFAULT NULL,
  PRIMARY KEY (`id`)
)ENGINE = InnoDB;CREATE TABLE `picture` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `login_user` VARCHAR(255) NOT NULL ,
  `img` longtext NOT NULL,
  `nb` int(11) DEFAULT 0,
  PRIMARY KEY (`id`)) ENGINE = InnoDB;INSERT INTO `user` (`id`, `email`, `password`, `login`, `cle`, `actif`) VALUES
(2, 'benoit.corbel01@gmai.com', '6a4e012bd9583858a5a6fa15f58bd86a25af266d3a4344f1ec2018b778f29ba83be86eb45e6dc204e11276f4a99eff4e2144fbe15e756c2c88e999649aae7d94', 'admin', 'f1dd69b16b364fe865b0f48d48f631ca82c1d01e88e2fed140d6b51ea6b30134777460db2b77d6cd4d48ebb1962e8aac01fcc600147b4911b9a740dd120ea95c', 1);
