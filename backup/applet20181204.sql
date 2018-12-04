-- MySQL dump 10.13  Distrib 5.7.23, for Linux (x86_64)
--
-- Host: localhost    Database: applet
-- ------------------------------------------------------
-- Server version	5.7.23

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `banner`
--

DROP TABLE IF EXISTS `banner`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL COMMENT 'Banner名称，通常作为标识',
  `description` varchar(255) DEFAULT NULL COMMENT 'Banner描述',
  `delete_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COMMENT='banner管理表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `banner`
--

LOCK TABLES `banner` WRITE;
/*!40000 ALTER TABLE `banner` DISABLE KEYS */;
INSERT INTO `banner` VALUES (1,'首页置顶','首页轮播图',NULL,NULL);
/*!40000 ALTER TABLE `banner` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `banner_item`
--

DROP TABLE IF EXISTS `banner_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `banner_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img_id` int(11) NOT NULL COMMENT '外键，关联image表',
  `key_word` varchar(100) NOT NULL COMMENT '执行关键字，根据不同的type含义不同',
  `type` tinyint(4) NOT NULL DEFAULT '1' COMMENT '跳转类型，可能导向商品，可能导向专题，可能导向其他。0，无导向；1：导向商品;2:导向专题',
  `delete_time` int(11) DEFAULT NULL,
  `banner_id` int(11) NOT NULL COMMENT '外键，关联banner表',
  `update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COMMENT='banner子项表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `banner_item`
--

LOCK TABLES `banner_item` WRITE;
/*!40000 ALTER TABLE `banner_item` DISABLE KEYS */;
INSERT INTO `banner_item` VALUES (1,65,'6',1,NULL,1,NULL),(2,2,'25',1,NULL,1,NULL),(3,3,'11',1,NULL,1,NULL),(5,1,'10',1,NULL,1,NULL);
/*!40000 ALTER TABLE `banner_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL COMMENT '分类名称',
  `topic_img_id` int(11) DEFAULT NULL COMMENT '外键，关联image表',
  `delete_time` int(11) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL COMMENT '描述',
  `update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COMMENT='商品类目';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (2,'果味',6,NULL,NULL,NULL),(3,'蔬菜',5,NULL,NULL,NULL),(4,'炒货',7,NULL,NULL,NULL),(5,'点心',4,NULL,NULL,NULL),(6,'粗茶',8,NULL,NULL,NULL),(7,'淡饭',9,NULL,NULL,NULL);
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `image`
--

DROP TABLE IF EXISTS `image`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) NOT NULL COMMENT '图片路径',
  `from` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1 来自本地，2 来自公网',
  `delete_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8mb4 COMMENT='图片总表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `image`
--

LOCK TABLES `image` WRITE;
/*!40000 ALTER TABLE `image` DISABLE KEYS */;
INSERT INTO `image` VALUES (1,'/banner-1a.png',1,NULL,NULL),(2,'/banner-2a.png',1,NULL,NULL),(3,'/banner-3a.png',1,NULL,NULL),(4,'/category-cake.png',1,NULL,NULL),(5,'/category-vg.png',1,NULL,NULL),(6,'/category-dryfruit.png',1,NULL,NULL),(7,'/category-fry-a.png',1,NULL,NULL),(8,'/category-tea.png',1,NULL,NULL),(9,'/category-rice.png',1,NULL,NULL),(10,'/product-dryfruit@1.png',1,NULL,NULL),(13,'/product-vg@1.png',1,NULL,NULL),(14,'/product-rice@6.png',1,NULL,NULL),(16,'/1@theme.png',1,NULL,NULL),(17,'/2@theme.png',1,NULL,NULL),(18,'/3@theme.png',1,NULL,NULL),(19,'/detail-1@1-dryfruit.png',1,NULL,NULL),(20,'/detail-2@1-dryfruit.png',1,NULL,NULL),(21,'/detail-3@1-dryfruit.png',1,NULL,NULL),(22,'/detail-4@1-dryfruit.png',1,NULL,NULL),(23,'/detail-5@1-dryfruit.png',1,NULL,NULL),(24,'/detail-6@1-dryfruit.png',1,NULL,NULL),(25,'/detail-7@1-dryfruit.png',1,NULL,NULL),(26,'/detail-8@1-dryfruit.png',1,NULL,NULL),(27,'/detail-9@1-dryfruit.png',1,NULL,NULL),(28,'/detail-11@1-dryfruit.png',1,NULL,NULL),(29,'/detail-10@1-dryfruit.png',1,NULL,NULL),(31,'/product-rice@1.png',1,NULL,NULL),(32,'/product-tea@1.png',1,NULL,NULL),(33,'/product-dryfruit@2.png',1,NULL,NULL),(36,'/product-dryfruit@3.png',1,NULL,NULL),(37,'/product-dryfruit@4.png',1,NULL,NULL),(38,'/product-dryfruit@5.png',1,NULL,NULL),(39,'/product-dryfruit-a@6.png',1,NULL,NULL),(40,'/product-dryfruit@7.png',1,NULL,NULL),(41,'/product-rice@2.png',1,NULL,NULL),(42,'/product-rice@3.png',1,NULL,NULL),(43,'/product-rice@4.png',1,NULL,NULL),(44,'/product-fry@1.png',1,NULL,NULL),(45,'/product-fry@2.png',1,NULL,NULL),(46,'/product-fry@3.png',1,NULL,NULL),(47,'/product-tea@2.png',1,NULL,NULL),(48,'/product-tea@3.png',1,NULL,NULL),(49,'/1@theme-head.png',1,NULL,NULL),(50,'/2@theme-head.png',1,NULL,NULL),(51,'/3@theme-head.png',1,NULL,NULL),(52,'/product-cake@1.png',1,NULL,NULL),(53,'/product-cake@2.png',1,NULL,NULL),(54,'/product-cake-a@3.png',1,NULL,NULL),(55,'/product-cake-a@4.png',1,NULL,NULL),(56,'/product-dryfruit@8.png',1,NULL,NULL),(57,'/product-fry@4.png',1,NULL,NULL),(58,'/product-fry@5.png',1,NULL,NULL),(59,'/product-rice@5.png',1,NULL,NULL),(60,'/product-rice@7.png',1,NULL,NULL),(62,'/detail-12@1-dryfruit.png',1,NULL,NULL),(63,'/detail-13@1-dryfruit.png',1,NULL,NULL),(65,'/banner-4a.png',1,NULL,NULL),(66,'/product-vg@4.png',1,NULL,NULL),(67,'/product-vg@5.png',1,NULL,NULL),(68,'/product-vg@2.png',1,NULL,NULL),(69,'/product-vg@3.png',1,NULL,NULL);
/*!40000 ALTER TABLE `image` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order`
--

DROP TABLE IF EXISTS `order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_no` varchar(20) NOT NULL COMMENT '订单号',
  `user_id` int(11) NOT NULL COMMENT '外键，用户id，注意并不是openid',
  `delete_time` int(11) DEFAULT NULL,
  `create_time` int(11) DEFAULT NULL,
  `total_price` decimal(6,2) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1:未支付， 2：已支付，3：已发货 , 4: 已支付，但库存不足',
  `snap_img` varchar(255) DEFAULT NULL COMMENT '订单快照图片',
  `snap_name` varchar(80) DEFAULT NULL COMMENT '订单快照名称',
  `total_count` int(11) NOT NULL DEFAULT '0',
  `update_time` int(11) DEFAULT NULL,
  `snap_items` text COMMENT '订单其他信息快照（json)',
  `snap_address` varchar(500) DEFAULT NULL COMMENT '地址快照',
  `prepay_id` varchar(100) DEFAULT NULL COMMENT '订单微信支付的预订单id（用于发送模板消息）',
  PRIMARY KEY (`id`),
  UNIQUE KEY `order_no` (`order_no`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order`
--

LOCK TABLES `order` WRITE;
/*!40000 ALTER TABLE `order` DISABLE KEYS */;
/*!40000 ALTER TABLE `order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_product`
--

DROP TABLE IF EXISTS `order_product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_product` (
  `order_id` int(11) NOT NULL COMMENT '联合主键，订单id',
  `product_id` int(11) NOT NULL COMMENT '联合主键，商品id',
  `count` int(11) NOT NULL COMMENT '商品数量',
  `delete_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`product_id`,`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_product`
--

LOCK TABLES `order_product` WRITE;
/*!40000 ALTER TABLE `order_product` DISABLE KEYS */;
/*!40000 ALTER TABLE `order_product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL COMMENT '商品名称',
  `price` decimal(6,2) NOT NULL COMMENT '价格,单位：分',
  `stock` int(11) NOT NULL DEFAULT '0' COMMENT '库存量',
  `delete_time` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `main_img_url` varchar(255) DEFAULT NULL COMMENT '主图ID号，这是一个反范式设计，有一定的冗余',
  `from` tinyint(4) NOT NULL DEFAULT '1' COMMENT '图片来自 1 本地 ，2公网',
  `create_time` int(11) DEFAULT NULL COMMENT '创建时间',
  `update_time` int(11) DEFAULT NULL,
  `summary` varchar(50) DEFAULT NULL COMMENT '摘要',
  `img_id` int(11) DEFAULT NULL COMMENT '图片外键',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (1,'芹菜 半斤',0.01,998,NULL,3,'/product-vg@1.png',1,NULL,NULL,NULL,13),(2,'梨花带雨 3个',0.01,984,NULL,2,'/product-dryfruit@1.png',1,NULL,NULL,NULL,10),(3,'素米 327克',0.01,996,NULL,7,'/product-rice@1.png',1,NULL,NULL,NULL,31),(4,'红袖枸杞 6克*3袋',0.01,998,NULL,6,'/product-tea@1.png',1,NULL,NULL,NULL,32),(5,'春生龙眼 500克',0.01,995,NULL,2,'/product-dryfruit@2.png',1,NULL,NULL,NULL,33),(6,'小红的猪耳朵 120克',0.01,997,NULL,5,'/product-cake@2.png',1,NULL,NULL,NULL,53),(7,'泥蒿 半斤',0.01,998,NULL,3,'/product-vg@2.png',1,NULL,NULL,NULL,68),(8,'夏日芒果 3个',0.01,995,NULL,2,'/product-dryfruit@3.png',1,NULL,NULL,NULL,36),(9,'冬木红枣 500克',0.01,996,NULL,2,'/product-dryfruit@4.png',1,NULL,NULL,NULL,37),(10,'万紫千凤梨 300克',0.01,996,NULL,2,'/product-dryfruit@5.png',1,NULL,NULL,NULL,38),(11,'贵妃笑 100克',0.01,994,NULL,2,'/product-dryfruit-a@6.png',1,NULL,NULL,NULL,39),(12,'珍奇异果 3个',0.01,999,NULL,2,'/product-dryfruit@7.png',1,NULL,NULL,NULL,40),(13,'绿豆 125克',0.01,999,NULL,7,'/product-rice@2.png',1,NULL,NULL,NULL,41),(14,'芝麻 50克',0.01,999,NULL,7,'/product-rice@3.png',1,NULL,NULL,NULL,42),(15,'猴头菇 370克',0.01,999,NULL,7,'/product-rice@4.png',1,NULL,NULL,NULL,43),(16,'西红柿 1斤',0.01,999,NULL,3,'/product-vg@3.png',1,NULL,NULL,NULL,69),(17,'油炸花生 300克',0.01,999,NULL,4,'/product-fry@1.png',1,NULL,NULL,NULL,44),(18,'春泥西瓜子 128克',0.01,997,NULL,4,'/product-fry@2.png',1,NULL,NULL,NULL,45),(19,'碧水葵花籽 128克',0.01,999,NULL,4,'/product-fry@3.png',1,NULL,NULL,NULL,46),(20,'碧螺春 12克*3袋',0.01,999,NULL,6,'/product-tea@2.png',1,NULL,NULL,NULL,47),(21,'西湖龙井 8克*3袋',0.01,998,NULL,6,'/product-tea@3.png',1,NULL,NULL,NULL,48),(22,'梅兰清花糕 1个',0.01,997,NULL,5,'/product-cake-a@3.png',1,NULL,NULL,NULL,54),(23,'清凉薄荷糕 1个',0.01,998,NULL,5,'/product-cake-a@4.png',1,NULL,NULL,NULL,55),(25,'小明的妙脆角 120克',0.01,999,NULL,5,'/product-cake@1.png',1,NULL,NULL,NULL,52),(26,'红衣青瓜 混搭160克',0.01,999,NULL,2,'/product-dryfruit@8.png',1,NULL,NULL,NULL,56),(27,'锈色瓜子 100克',0.01,998,NULL,4,'/product-fry@4.png',1,NULL,NULL,NULL,57),(28,'春泥花生 200克',0.01,999,NULL,4,'/product-fry@5.png',1,NULL,NULL,NULL,58),(29,'冰心鸡蛋 2个',0.01,999,NULL,7,'/product-rice@5.png',1,NULL,NULL,NULL,59),(30,'八宝莲子 200克',0.01,999,NULL,7,'/product-rice@6.png',1,NULL,NULL,NULL,14),(31,'深涧木耳 78克',0.01,999,NULL,7,'/product-rice@7.png',1,NULL,NULL,NULL,60),(32,'土豆 半斤',0.01,999,NULL,3,'/product-vg@4.png',1,NULL,NULL,NULL,66),(33,'青椒 半斤',0.01,999,NULL,3,'/product-vg@5.png',1,NULL,NULL,NULL,67);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_image`
--

DROP TABLE IF EXISTS `product_image`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img_id` int(11) NOT NULL COMMENT '外键，关联图片表',
  `delete_time` int(11) DEFAULT NULL COMMENT '状态，主要表示是否删除，也可以扩展其他状态',
  `order` int(11) NOT NULL DEFAULT '0' COMMENT '图片排序序号',
  `product_id` int(11) NOT NULL COMMENT '商品id，外键',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_image`
--

LOCK TABLES `product_image` WRITE;
/*!40000 ALTER TABLE `product_image` DISABLE KEYS */;
INSERT INTO `product_image` VALUES (4,19,NULL,1,11),(5,20,NULL,2,11),(6,21,NULL,3,11),(7,22,NULL,4,11),(8,23,NULL,5,11),(9,24,NULL,6,11),(10,25,NULL,7,11),(11,26,NULL,8,11),(12,27,NULL,9,11),(13,28,NULL,11,11),(14,29,NULL,10,11),(18,62,NULL,12,11),(19,63,NULL,13,11);
/*!40000 ALTER TABLE `product_image` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_property`
--

DROP TABLE IF EXISTS `product_property`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_property` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT '' COMMENT '详情属性名称',
  `detail` varchar(255) NOT NULL COMMENT '详情属性',
  `product_id` int(11) NOT NULL COMMENT '商品id，外键',
  `delete_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_property`
--

LOCK TABLES `product_property` WRITE;
/*!40000 ALTER TABLE `product_property` DISABLE KEYS */;
INSERT INTO `product_property` VALUES (1,'品名','杨梅',11,NULL,NULL),(2,'口味','青梅味 雪梨味 黄桃味 菠萝味',11,NULL,NULL),(3,'产地','火星',11,NULL,NULL),(4,'保质期','180天',11,NULL,NULL),(5,'品名','梨子',2,NULL,NULL),(6,'产地','金星',2,NULL,NULL),(7,'净含量','100g',2,NULL,NULL),(8,'保质期','10天',2,NULL,NULL);
/*!40000 ALTER TABLE `product_property` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `theme`
--

DROP TABLE IF EXISTS `theme`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `theme` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL COMMENT '专题名称',
  `description` varchar(255) DEFAULT NULL COMMENT '专题描述',
  `topic_img_id` int(11) NOT NULL COMMENT '主题图，外键',
  `delete_time` int(11) DEFAULT NULL,
  `head_img_id` int(11) NOT NULL COMMENT '专题列表页，头图',
  `update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COMMENT='主题信息表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `theme`
--

LOCK TABLES `theme` WRITE;
/*!40000 ALTER TABLE `theme` DISABLE KEYS */;
INSERT INTO `theme` VALUES (1,'专题栏位一','美味水果世界',16,NULL,49,NULL),(2,'专题栏位二','新品推荐',17,NULL,50,NULL),(3,'专题栏位三','做个干物女',18,NULL,18,NULL);
/*!40000 ALTER TABLE `theme` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `theme_product`
--

DROP TABLE IF EXISTS `theme_product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `theme_product` (
  `theme_id` int(11) NOT NULL COMMENT '主题外键',
  `product_id` int(11) NOT NULL COMMENT '商品外键',
  PRIMARY KEY (`theme_id`,`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='主题所包含的商品';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `theme_product`
--

LOCK TABLES `theme_product` WRITE;
/*!40000 ALTER TABLE `theme_product` DISABLE KEYS */;
INSERT INTO `theme_product` VALUES (1,2),(1,5),(1,8),(1,10),(1,12),(2,1),(2,2),(2,3),(2,5),(2,6),(2,16),(2,33),(3,15),(3,18),(3,19),(3,27),(3,30),(3,31);
/*!40000 ALTER TABLE `theme_product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `third_app`
--

DROP TABLE IF EXISTS `third_app`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `third_app` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `app_id` varchar(64) NOT NULL COMMENT '应用app_id',
  `app_secret` varchar(64) NOT NULL COMMENT '应用secret',
  `app_description` varchar(100) DEFAULT NULL COMMENT '应用程序描述',
  `scope` varchar(20) NOT NULL COMMENT '应用权限',
  `scope_description` varchar(100) DEFAULT NULL COMMENT '权限描述',
  `delete_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COMMENT='访问API的各应用账号密码表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `third_app`
--

LOCK TABLES `third_app` WRITE;
/*!40000 ALTER TABLE `third_app` DISABLE KEYS */;
INSERT INTO `third_app` VALUES (1,'starcraft','777*777','CMS','32','Super',NULL,NULL);
/*!40000 ALTER TABLE `third_app` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `openid` varchar(50) NOT NULL,
  `nickname` varchar(50) DEFAULT NULL,
  `extend` varchar(255) DEFAULT NULL,
  `delete_time` int(11) DEFAULT NULL,
  `create_time` int(11) DEFAULT NULL COMMENT '注册时间',
  `update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `openid` (`openid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_address`
--

DROP TABLE IF EXISTS `user_address`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL COMMENT '收获人姓名',
  `mobile` varchar(20) NOT NULL COMMENT '手机号',
  `province` varchar(20) DEFAULT NULL COMMENT '省',
  `city` varchar(20) DEFAULT NULL COMMENT '市',
  `country` varchar(20) DEFAULT NULL COMMENT '区',
  `detail` varchar(100) DEFAULT NULL COMMENT '详细地址',
  `delete_time` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL COMMENT '外键',
  `update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_address`
--

LOCK TABLES `user_address` WRITE;
/*!40000 ALTER TABLE `user_address` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_address` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-12-04  8:17:43
