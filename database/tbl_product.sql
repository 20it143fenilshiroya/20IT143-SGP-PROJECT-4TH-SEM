CREATE TABLE IF NOT EXISTS `tbl_product` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `price` double(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `product_code` (`code`)
);

INSERT INTO `tbl_product` (`id`, `name`, `category`,`code`, `image`, `price`) VALUES
(1, 'DOLO 650', 'Tablets','DO650', 'product-images/Dolo 650.png', 150.00),
(2, 'Malidence', 'Tablets','MLDC2', 'product-images/malidens.png', 80.00),
(3, 'Norvasac', 'Tablets', 'Norv5','product-images/norvasac.jpg', 30.00),
(4, 'Pepcid', 'Tablets', 'Pc32','product-images/pepcid.jpg', 15.00),
(5, 'Revital H', 'Tablets', 'RVH10','product-images/revital H.png', 250.00),
(6, 'Tabacum 6C', 'Syrup', 'TB6C','product-images/tabacum 6c.jpg', 100.00),
(7, 'Zincovit', 'Tablets', 'ZinT','product-images/zincovit.png', 50.00),
(8, 'Zolgensama', 'inject.','ZolM4', 'product-images/zolgensama.jpg', 25.00);

