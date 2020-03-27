

<?php
	$servername="localhost";
	$username="root";
	$password="";
	$conn=mysqli_connect($servername,$username,$password);
	if(!$conn)
		die('Cannot connect'.mysqli_error($conn));



	$query="CREATE DATABASE IF NOT EXISTS creativebakery";
	$db=mysqli_query($conn,$query) or die ('cannot create database'.mysqli_connect_error());

	mysqli_select_db($conn,"creativebakery");

																		// =========================
																		// 		category table
																		// 	=======================


	$query="CREATE TABLE IF NOT EXISTS `category` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`category_name` varchar(255) NOT NULL,
	`category_description` varchar(535) NOT NULL,
	`creation_date` timestamp NOT NULL DEFAULT current_timestamp(),
	`update_date` timestamp NULL DEFAULT NULL,
	PRIMARY KEY(`id`)
)";
	$tblcategory=mysqli_query($conn,$query) or die ('cannot create table category'.mysqli_error($conn));


																		// =========================
																		// 		Order table
																		// 	=======================



	$query="CREATE TABLE IF NOT EXISTS `orders` (
	  `order_id` int(11) NOT NULL,
	  `user_id` int(11) NOT NULL,
	  `product_id` int(11) NOT NULL,
	  `quantity` int(11) NOT NULL,
	  `order_date` timestamp NOT NULL DEFAULT current_timestamp()
)";
	$tbloder=mysqli_query($conn,$query) or die ('cannot create table orders'.mysqli_error($conn));


																			// =========================
																			// 		 ordersTrack TABLE
																			// 	=======================




	$query="CREATE TABLE IF NOT EXISTS `order_track_history` (
		`id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `price` float NOT NULL,
  `status` varchar(255) NOT NULL,
  `remark` varchar(255) NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `paymet_method` varchar(255) NOT NULL,
  `delivery_time` varchar(255) NOT NULL,
	PRIMARY KEY(`id`)
)";
	$tbloderTrack=mysqli_query($conn,$query) or die ('cannot create table ordersTrack'.mysqli_error($conn));


																				// =========================
																				// 		 products TABLE
																				// 	=======================





		$query="CREATE TABLE IF NOT EXISTS `products` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`category_id` int(11) NOT NULL,
	`product_name` varchar(255) NOT NULL,
	`product_price` float NOT NULL,
	`product_quantity` int(11) NOT NULL,
	`product_description` varchar(535) NOT NULL,
	`product_image` longtext NOT NULL,
	`product_availability` tinyint(1) NOT NULL,
	`discount` float DEFAULT NULL,
	`post_date` timestamp NOT NULL DEFAULT current_timestamp(),
	`update_date` timestamp NULL DEFAULT NULL,
	PRIMARY KEY(`id`)
)";
		$tblproducts=mysqli_query($conn,$query) or die ('cannot create table products'.mysqli_error($conn));






																						// =========================
																						// 		 products review
																						// 	=======================





				$query="CREATE TABLE IF NOT EXISTS `product_review` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`product_id` int(11) NOT NULL,
	`ratings` int(11) NOT NULL,
	`user_name` varchar(255) NOT NULL,
	`summary` varchar(255) NOT NULL,
	`review` varchar(535) NOT NULL,
	`review_date` timestamp NOT NULL DEFAULT current_timestamp(),
	PRIMARY KEY(`id`)
)";
				$tblproductreviews=mysqli_query($conn,$query) or die ('cannot create table product reviews'.mysqli_error($conn));





																								// =========================
																								// 		 user table
																								// 	=======================





						$query="CREATE TABLE IF NOT EXISTS `user` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`first_name` varchar(255) NOT NULL,
	`last_name` varchar(255) NOT NULL,
	`email` varchar(255) NOT NULL,
	`contact_no` varchar(255) NOT NULL,
	`password` char(128) NOT NULL,
	`role` varchar(255) NOT NULL,
	`address` varchar(535) DEFAULT NULL,
	`register_date` timestamp NOT NULL DEFAULT current_timestamp(),
	`updated_date` timestamp NULL DEFAULT NULL,
	PRIMARY KEY(`id`)
)";
						$tbluser=mysqli_query($conn,$query) or die ('cannot create table user'.mysqli_error($conn));



																									// =========================
																									// 		 user log
																									// 	=======================





							$query="CREATE TABLE IF NOT EXISTS `user_log` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`user_email` varchar(255) NOT NULL,
	`user_ip` varchar(535) NOT NULL,
	`role` VARCHAR(255) NOT NULL,
	`login_time` timestamp NOT NULL DEFAULT current_timestamp(),
	`logout_time` timestamp NULL DEFAULT NULL,
	`status` tinyint(1) NOT NULL,
	PRIMARY KEY(`id`)
)";
							$tbluserlog=mysqli_query($conn,$query) or die ('cannot create table userlog'.mysqli_error($conn));



																																// =========================
																																// 		 Wishlist
																																// 	=======================




						$query="CREATE TABLE IF NOT EXISTS `wishlist` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`user_id` int(11) NOT NULL,
	`product_id` int(11) NOT NULL,
	`posting_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
	PRIMARY KEY(`id`)
)";
														$tblwishlist=mysqli_query($conn,$query) or die ('cannot create table wishlist'.mysqli_error($conn));



                                                                          // ======================
                                                                          // outlet
                                                                          // ======================




              $query="CREATE TABLE IF NOT EXISTS  `outlets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `outlet_name` varchar(255) NOT NULL,
  `outlet_description` varchar(535) NOT NULL,
  `outlet_province` varchar(255) NOT NULL,
  `outlet_address` varchar(535) NOT NULL,
  `outlet_location` point NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY(`id`)
)" ;


                            $tbloutlet=mysqli_query($conn,$query) or die ('cannot create table outlet'.mysqli_error($conn));


?>
