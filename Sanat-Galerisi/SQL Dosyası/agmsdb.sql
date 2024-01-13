CREATE DATABASE agmsdb;
use agmsdb;

CREATE TABLE `tbladmin` (
  `ID` int(10) NOT NULL,
  `AdminName` varchar(45) DEFAULT NULL,
  `UserName` varchar(50) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `Password` varchar(120) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp(),
PRIMARY KEY (`ID`)	
);

INSERT INTO `tbladmin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`) VALUES
(1, 'Admin', 'admin', 5075075070, 'ebubekirerkayal@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '2024-01-05 06:21:53');


CREATE TABLE `tblartist` (
  `ID` int(10) NOT NULL,
  `Name` varchar(250) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(250) DEFAULT NULL,
  `Education` mediumtext DEFAULT NULL,
  `Award` mediumtext DEFAULT NULL,
  `Profilepic` varchar(250) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp(),
PRIMARY KEY (`ID`)
);


CREATE TABLE `tblartmedium` (
  `ID` int(5) NOT NULL,
  `ArtMedium` varchar(250) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp(),
PRIMARY KEY (`ID`)
);

INSERT INTO `tbladmin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`) VALUES
(1, 'Admin', 'admin', 5070910089, 'ebubekirerkayal@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '2024-01-05 12:11:14');


CREATE TABLE `tblcustomer` (
  `ID` int(10) NOT NULL,
  `CustomerNumber` varchar(10) NOT NULL,
  `FullName` varchar(120) DEFAULT NULL,
  `Email` varchar(250) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
PRIMARY KEY (`ID`),
  UNIQUE KEY `Unique_FullName` (`FullName`),
  UNIQUE KEY `Unique_Email` (`Email`),
  UNIQUE KEY `Unique_MobileNumber` (`MobileNumber`)
);


CREATE TABLE `tblarttype` (
  `ID` int(5) NOT NULL,
  `ArtType` varchar(250) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp(),
PRIMARY KEY (`ID`)
);



   CREATE TABLE `tblartproduct` (
  `ID` int(5) NOT NULL,
  `Title` varchar(250) DEFAULT NULL,
  `Dimension` varchar(250) DEFAULT NULL,
  `Orientation` varchar(100) DEFAULT NULL,
  `Size` varchar(100) DEFAULT NULL,
  `Artist` int(5) DEFAULT NULL,
  `ArtType` int(5) DEFAULT NULL,
  `ArtMedium` int(5) DEFAULT NULL,
  `SellingPricing` decimal(10,0) DEFAULT NULL,
  `Description` mediumtext DEFAULT NULL,
  `Image` varchar(250) DEFAULT NULL,
  `Image1` varchar(250) DEFAULT NULL,
  `Image2` varchar(250) DEFAULT NULL,
  `Image3` varchar(250) DEFAULT NULL,
  `Image4` varchar(250) DEFAULT NULL,
  `RefNum` int(10) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp(),
PRIMARY KEY (`ID`),
foreign key(Artist) references tblartist(ID),
foreign key(ArtType) references tblarttype(ID),
foreign key(ArtType) references tblartmedium(ID)
);

CREATE TABLE `tblenquiry` (
  `ID` int(10) NOT NULL,
  `EnquiryNumber` varchar(10) NOT NULL,
  `Artpdid` int(9) DEFAULT NULL,
  `FullName` varchar(120) DEFAULT NULL,
  `Email` varchar(250) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Message` varchar(250) DEFAULT NULL,
  `EnquiryDate` timestamp NULL DEFAULT current_timestamp(),
  `Status` varchar(10) DEFAULT NULL,
PRIMARY KEY (`ID`),
  CONSTRAINT `FK_tblenquiry_customer` FOREIGN KEY (`FullName`) REFERENCES `tblcustomer` (`FullName`),
  CONSTRAINT `FK_tblenquiry_email` FOREIGN KEY (`Email`) REFERENCES `tblcustomer` (`Email`),
  CONSTRAINT `FK_tblenquiry_mobile` FOREIGN KEY (`MobileNumber`) REFERENCES `tblcustomer` (`MobileNumber`)
);
DELIMITER $$
CREATE PROCEDURE `Eserler` ()   
BEGIN
SELECT * FROM tblartproduct;
END$$

DELIMITER $$
CREATE PROCEDURE `MusteriEkle` 
(`ID` INT(10), `CustomerNumber` VARCHAR(10), `FullName` VARCHAR(120), `Email` VARCHAR(250), `MobileNumber` BIGINT(10))   
BEGIN
    INSERT INTO tblcustomer
    VALUES  (ID, CustomerNumber, FullName, Email, MobileNumber);
END$$


DELIMITER $$
CREATE PROCEDURE `Musteriler` ()   
BEGIN
    SELECT 
        ID as ID,
        FullName as Adı,
        MobileNumber as Telefon , 
        Email as Mail   
    FROM tblcustomer;
END$$

DELIMITER $$
CREATE procedure `MusteriSil` 
(`musteri_numarası` VARCHAR(10))   
BEGIN
    DELETE FROM tblcustomer
    WHERE   CustomerNumber  = musteri_numarası;
END$$

DELIMITER $$
CREATE PROCEDURE `SanatciBilgileri`
 (IN `artistID` INT)   
BEGIN
    -- Belirli bir sanatçının bilgilerini getiren depolanan prosedür
    SELECT * FROM tblartist WHERE ID = artistID;
END$$

DELIMITER $$
CREATE PROCEDURE `Soru` ()  
 BEGIN

select * from tblenquiry;

END$$

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SanatciBul` (`Arama` VARCHAR(32))   BEGIN
    SELECT * FROM tblartist
    WHERE 
        ID      LIKE  CONCAT('%',arama,'%') OR
        Name     LIKE  CONCAT('%',arama,'%') OR
        MobileNumber   LIKE  CONCAT('%',arama,'%') OR
        Email     LIKE  CONCAT('%',arama,'%');
        
END$$	

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `UrunBul` (`Ara` VARCHAR(32))   BEGIN
    SELECT * FROM tblartproduct
    WHERE 
        ID       LIKE  CONCAT('%',Ara,'%') OR
        Title       LIKE  CONCAT('%',Ara,'%') OR
        Artist LIKE  CONCAT('%',Ara,'%') OR
        ArtType    LIKE  CONCAT('%',Ara,'%') OR
        ArtMedium     LIKE  CONCAT('%',Ara,'%') OR
        SellingPricing    LIKE  CONCAT('%',Ara,'%') OR
        Description    LIKE  CONCAT('%',Ara,'%') ;
END$$
DELIMITER $$
CREATE PROCEDURE `UrunEkle` 
(IN `p_Title` VARCHAR(250), IN `p_Dimension` VARCHAR(250), IN `p_Orientation` VARCHAR(100), IN `p_Size` VARCHAR(100), IN `p_Artist` INT(5), IN `p_ArtType` INT(5), IN `p_ArtMedium` INT(5), IN `p_SellingPricing` DECIMAL(10,0), IN `p_Description` MEDIUMTEXT, IN `p_Image` VARCHAR(250), IN `p_Image1` VARCHAR(250), IN `p_Image2` VARCHAR(250), IN `p_Image3` VARCHAR(250), IN `p_Image4` VARCHAR(250), IN `p_RefNum` INT(10), IN `p_CreationDate` TIMESTAMP)   
BEGIN
    INSERT INTO tblartproduct 
( Title, Dimension, Orientation, Size, Artist, ArtType, ArtMedium, SellingPricing, Description, Image, Image1, Image2, Image3, Image4, RefNum, CreationDat)
    VALUES 
( p_Title, p_Dimension, p_Orientation, p_Size, p_Artist, p_ArtType, p_ArtMedium, p_SellingPricing, p_Description, p_Image, p_Image1, p_Image2, p_Image3, p_Image4, p_RefNum, p_CreationDate);
END$$

DELIMITER $$
CREATE PROCEDURE `UrunSil` 
(`idsi` VARCHAR(64))  
 BEGIN
    DELETE FROM tblartproduct
    WHERE ID  = idsi;
END$$

DELIMITER $$
CREATE FUNCTION `ToplamEserSayisi` () RETURNS INT(11)  
BEGIN
    DECLARE totalArtCount INT;
    SELECT COUNT(*) INTO totalArtCount FROM tblartproduct;
    RETURN totalArtCount;
END$$

DELIMITER $$
CREATE TRIGGER `Eklemeden_Once` BEFORE INSERT ON `tblartproduct` FOR EACH ROW BEGIN
    DECLARE artistCount INT;

    -- Sanatçının var olup olmadığını kontrol et
    SELECT COUNT(*) INTO artistCount FROM tblartist WHERE ID = NEW.Artist;

    -- Eğer sanatçı bulunmuyorsa, ekleme işlemini iptal et
    IF artistCount = 0 THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Sanatçı bulunamadığı için ürün eklenemez';
    END IF;
END$$
DELIMITER ;

DELIMITER $$
CREATE TRIGGER `Eklemeden_Once_Resim` BEFORE INSERT ON `tblartproduct` FOR EACH ROW BEGIN
    -- Eğer ürün resmi boşsa, ekleme işlemini iptal et
    IF NEW.Image IS NULL THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Ürün eklerken resim eklemek zorunludur';
    END IF;
END
$$
DELIMITER ;

DELIMITER $$
CREATE TRIGGER `EserEklemeOncesi` AFTER INSERT ON `tblartproduct` FOR EACH ROW BEGIN
    -- Yeni bir sanat eseri eklenmişse
    INSERT INTO tblartmedium (ArtMedium, CreationDate)
    VALUES (NEW.ArtMedium, NOW());
END
$$
DELIMITER ;

DELIMITER $$
CREATE TRIGGER `Urun_Eklemeden_Once` BEFORE INSERT ON `tblartproduct` FOR EACH ROW BEGIN
    DECLARE productCount INT;

    -- Ürünün var olup olmadığını kontrol et
    SELECT COUNT(*) INTO productCount FROM tblartproduct WHERE ID = ProductID;

    -- Eğer ürün bulunmuyorsa, ekleme işlemini iptal et
    IF productCount = 0 THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Kaydedilmemiş ürün satılamaz';
    END IF;
END
$$
DELIMITER ;

DELIMITER $$
CREATE TRIGGER `Musteri_Yoksa` BEFORE INSERT ON `tblcustomer` FOR EACH ROW BEGIN
    DECLARE customerCount INT;

    -- Müşterinin var olup olmadığını kontrol et
    SELECT COUNT(*) INTO customerCount FROM tblcustomer WHERE ID = CustomerID;

    -- Eğer müşteri bulunmuyorsa, ekleme işlemini iptal et
    IF customerCount = 0 THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Kayıtlı olmayan müşterilere alım yapılamaz';
    END IF;
END
$$
DELIMITER ;	
