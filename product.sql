
--
-- Database: `phpcooker_script`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `product_id` int(20) NOT NULL AUTO_INCREMENT,
  `product_category_id` int(10) NOT NULL,
  `product_sku` varchar(80) NOT NULL,
  `product_name` varchar(120) NOT NULL,
  `product_brand` varchar(100) NOT NULL,
  `product_price` decimal(8,2) NOT NULL,
  `product_size` char(5) NOT NULL,
  `product_color` varchar(50) NOT NULL,
  `product_image` varchar(100) NOT NULL,
  `product_quantity` mediumint(5) NOT NULL,
  `product_status` enum('0','1') NOT NULL COMMENT '0-active,1-inactive',
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_category_id`, `product_sku`, `product_name`, `product_brand`, `product_price`, `product_size`, `product_color`, `product_image`, `product_quantity`, `product_status`) VALUES
(1, 1, 'FRD00F1', 'Sangria Collar 3/4Th Sleeves Embroidered Flared Anarkali', 'Sangria', '1750.00', 'M', 'Black', 'Sangria-Collar.jpg', 2, '1'),
(2, 1, 'FRD00F3', 'Aurelia Navy Blue Printed Cotton Kurta', 'Aurelia', '900.00', 'L', 'Blue', 'Aurelia-Navy-Blue-Printed-Cotton-Kurta.jpg', 1, '1'),
(3, 1, 'RO100', 'Biba White Printed Viscose Kurta', 'Biba', '900.00', 'S', 'White', 'Biba-White-Printed-Viscose-Kurta.jpg', 3, '1'),
(4, 1, 'HND0E1', 'Aurelia Yellow Printed Cotton Kurta', 'Aurelia', '700.00', 'M', 'Yellow', 'Aurelia-Yellow-Printed-Cotton-Kurta.jpg', 2, '1'),
(5, 1, 'MST0G1', 'Biba Blue Printed Kurta', 'Biba', '1040.00', 'S', 'Blue', 'Biba-Blue-Printed-Kurta.jpg', 5, '1'),
(6, 1, 'NS0A1', 'Aurelia Navy Blue Printed Cotton Kurta', 'Aurelia', '699.00', 'M', 'Blue', 'Aurelia-Navy-Blue-Printed-Cotton-Kurta1.jpg', 1, '1'),
(7, 1, 'NS2S1', 'Sangria Round Neck 3/4Th Sleeves Anarkali', 'Sangria', '999.00', 'M', 'Black', 'Sangria-Round-Neck-3-4Th-Sleeves-Anarkali-8650-797031003-1-catalog_s.jpg', 4, '1'),
(8, 1, 'HND1A2', 'Biba Dark Grey Solid Cotton Kurta', 'Biba', '1320.00', 'L', 'Black', 'Biba-Dark-Grey-Solid-Cotton-Kurta-1317-2851182-1-catalog_s.jpg', 1, '1'),
(9, 1, 'DGE0C1', 'Sangria Henley Neck Full Sleeves Printed Anarkali', 'Sangria', '650.00', 'L', 'White', 'Sangria-Henley-Neck-Full-Sleeves-Printed-Anarkali-6253-155890003-1-catalog_s.jpg', 3, '1'),
(10, 1, 'FRD01T3', 'Rangmanch By Pantaloons Off White Solid Cotton Blend Kurta', 'Rangmanch', '800.00', 'M', 'White', 'Rangmanch-By-Pantaloons-Off-White-Solid-Cotton-Blend-Kurta-7882-762960003-1-catalog_s.jpg', 3, '1');

