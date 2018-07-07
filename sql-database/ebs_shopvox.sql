-- phpMyAdmin SQL Dump
-- version 4.7.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 07, 2018 at 11:05 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ebs_shopvox`
--

-- --------------------------------------------------------

--
-- Table structure for table `all_cashiers`
--

CREATE TABLE `all_cashiers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `all_cashiers`
--

INSERT INTO `all_cashiers` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Hemanth', '2018-07-07 06:32:55', '0000-00-00 00:00:00'),
(2, 'Hemanth', '2018-07-07 06:33:00', '0000-00-00 00:00:00'),
(3, 'Hemanth', '2018-07-07 06:33:04', '0000-00-00 00:00:00'),
(4, 'Hemanth', '2018-07-07 06:33:08', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `all_suppliers`
--

CREATE TABLE `all_suppliers` (
  `id` int(11) NOT NULL,
  `supplier_name` varchar(250) DEFAULT NULL,
  `supplier_address` text,
  `contact_person` varchar(250) DEFAULT NULL,
  `contact_number` varchar(200) DEFAULT NULL,
  `note` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `all_suppliers`
--

INSERT INTO `all_suppliers` (`id`, `supplier_name`, `supplier_address`, `contact_person`, `contact_number`, `note`, `created_at`, `updated_at`) VALUES
(25, 'hell', '#141 narasipura layout', 'Ejaz Anwar', '9886991200,547745747', 'nbhshhhwhhew', '2018-01-10 16:47:52', '2018-01-10 16:47:52'),
(26, 'Bunty bhai', '#141 narasipura layout', 'Ejaz Anwar', '9886991200,547745747', 'ggggggggggggggg', '2018-01-10 16:50:06', '2018-01-10 16:50:06'),
(27, 'hana prints', '#141 narasipura layout', 'rizavan kutta', '9886991200,547745747', 'ndfhdfhdfhd', '2018-07-07 05:45:26', '2018-01-12 09:48:39'),
(28, 'hana prints 2', '#141 cubbon pet bangalore', 'imran kutta', '56595976976976', 'very good company', '2018-07-07 05:45:37', '2018-01-30 13:24:10');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(11) NOT NULL,
  `company_name` varchar(250) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(250) NOT NULL,
  `gstin_uin` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `company_name`, `address`, `email`, `gstin_uin`) VALUES
(1, 'EBS LPA', 'VR PURA', 'rr@gmail.com', '555RRRTN'),
(2, 'DST ', 'VR PURA', 'tt@gmail.com', '22PNB'),
(3, 'Saaaan prints', 'VR PURA', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `customer_payment`
--

CREATE TABLE `customer_payment` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(250) DEFAULT NULL,
  `company_name` varchar(250) DEFAULT NULL,
  `email` varchar(120) DEFAULT NULL,
  `phone` varchar(90) DEFAULT NULL,
  `product_bought` text,
  `balance_sheet` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `total_balance` double DEFAULT NULL,
  `total_amount` double DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `total_recieved_amount` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_payment`
--

INSERT INTO `customer_payment` (`id`, `customer_id`, `customer_name`, `company_name`, `email`, `phone`, `product_bought`, `balance_sheet`, `created_at`, `total_balance`, `total_amount`, `updated_at`, `total_recieved_amount`) VALUES
(1, 9, 'dsndfbbd', 'ggssss', 'email@gmail.com,email@gmail.com', 'fdnbdfbd,fdnbdfbd,fdnbdfbd', '<table class=\"table table-bordered\" id=\"showQuotation\">\n	                    	<thead>\n	                    		<tr><th>Product Name</th>\n	                    		<th>Price</th> \n	                    		<th>Quantity</th>\n	                    		<th>Amount</th> \n	                    	</tr></thead>\n\n	                    	<tbody>\n	                    		 \n	                    	<tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">flex board naga dhaga</td><td contenteditable=\"false\" class=\"priceChangeField\">300</td><td contenteditable=\"false\" class=\"quantityChangeField\">4</td><td contenteditable=\"false\">1200</td></tr><tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">sign board</td><td contenteditable=\"false\" class=\"priceChangeField\">200</td><td contenteditable=\"false\" class=\"quantityChangeField\">4</td><td contenteditable=\"false\">800</td></tr><tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">wrestling board</td><td contenteditable=\"false\" class=\"priceChangeField\">400</td><td contenteditable=\"false\" class=\"quantityChangeField\">1</td><td contenteditable=\"false\">400</td></tr></tbody>\n	                    <tbody>\n	                    		 \n	                    	<tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">wrestling board</td><td contenteditable=\"false\" class=\"priceChangeField\">400</td><td contenteditable=\"false\" class=\"quantityChangeField\">1</td><td contenteditable=\"false\">400</td></tr><tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">sign board</td><td contenteditable=\"false\" class=\"priceChangeField\">200</td><td contenteditable=\"false\" class=\"quantityChangeField\">1</td><td contenteditable=\"false\">200</td></tr></tbody><tbody>\n	                    		 \n	                    	<tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">wrestling board</td><td contenteditable=\"false\" class=\"priceChangeField\">400</td><td contenteditable=\"false\" class=\"quantityChangeField\">3</td><td contenteditable=\"false\">1200</td></tr><tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">flex board naga dhaga</td><td contenteditable=\"false\" class=\"priceChangeField\">300</td><td contenteditable=\"false\" class=\"quantityChangeField\">2</td><td contenteditable=\"false\">600</td></tr><tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">sign board</td><td contenteditable=\"false\" class=\"priceChangeField\">200</td><td contenteditable=\"false\" class=\"quantityChangeField\">6</td><td contenteditable=\"false\">1200</td></tr></tbody><tbody>\n	                    		 \n	                    	<tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">cigratte flake</td><td contenteditable=\"false\" class=\"priceChangeField\">999</td><td contenteditable=\"false\" class=\"quantityChangeField\">3</td><td contenteditable=\"false\">2997</td></tr><tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">arjun web</td><td contenteditable=\"false\" class=\"priceChangeField\">999</td><td contenteditable=\"false\" class=\"quantityChangeField\">1</td><td contenteditable=\"false\">999</td></tr><tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">sign board</td><td contenteditable=\"false\" class=\"priceChangeField\">200</td><td contenteditable=\"false\" class=\"quantityChangeField\">1</td><td contenteditable=\"false\">200</td></tr></tbody><tbody>\n	                    		 \n	                    	<tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">cigratte flake</td><td contenteditable=\"false\" class=\"priceChangeField\">999</td><td contenteditable=\"false\" class=\"quantityChangeField\">2</td><td contenteditable=\"false\">1998</td></tr><tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">wrestling board</td><td contenteditable=\"false\" class=\"priceChangeField\">400</td><td contenteditable=\"false\" class=\"quantityChangeField\">4</td><td contenteditable=\"false\">1600</td></tr><tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">flex board naga dhaga</td><td contenteditable=\"false\" class=\"priceChangeField\">300</td><td contenteditable=\"false\" class=\"quantityChangeField\">4</td><td contenteditable=\"false\">1200</td></tr><tr id=\"lastTotalRow\"><td contenteditable=\"false\">total</td><td contenteditable=\"false\"></td><td contenteditable=\"false\"></td><td contenteditable=\"false\">14994</td></tr></tbody></table>', '<table class=\"table table-bordered\" id=\"paymentRecievedBy\">\n                            <thead>\n                              <tr><th>Cash Recieved By</th>\n                              <th>Through</th> \n                              <th>Recieved</th>\n                            </tr></thead>\n\n                            <tbody>\n                               \n                            <tr class=\"showAllTrans\"><td>Arjun</td><td>Account</td><td>5000</td></tr><tr class=\"showAllTrans\"><td>Arjun</td><td>Account</td><td>5000</td></tr><tr id=\"paymentLastTotalRow\"><td>Total Paid</td><td></td><td>10000</td></tr><tr id=\"balanceLastTotalRow\"><td>Balance Amount</td><td></td><td>4994</td></tr></tbody>\n                          </table>', '2018-01-02 06:29:28', 4994, 14994, '2018-01-02 06:29:28', 10000),
(2, 9, 'dsndfbbd', 'ggssss', 'email@gmail.com,email@gmail.com', 'fdnbdfbd,fdnbdfbd,fdnbdfbd', '<table class=\"table table-bordered\" id=\"showQuotation\">\n	                    	<thead>\n	                    		<tr><th>Product Name</th>\n	                    		<th>Price</th> \n	                    		<th>Quantity</th>\n	                    		<th>Amount</th> \n	                    	</tr></thead>\n\n	                    	<tbody>\n	                    		 \n	                    	<tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">flex board naga dhaga</td><td contenteditable=\"false\" class=\"priceChangeField\">300</td><td contenteditable=\"false\" class=\"quantityChangeField\">4</td><td contenteditable=\"false\">1200</td></tr><tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">sign board</td><td contenteditable=\"false\" class=\"priceChangeField\">200</td><td contenteditable=\"false\" class=\"quantityChangeField\">4</td><td contenteditable=\"false\">800</td></tr><tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">wrestling board</td><td contenteditable=\"false\" class=\"priceChangeField\">400</td><td contenteditable=\"false\" class=\"quantityChangeField\">1</td><td contenteditable=\"false\">400</td></tr></tbody>\n	                    <tbody>\n	                    		 \n	                    	<tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">wrestling board</td><td contenteditable=\"false\" class=\"priceChangeField\">400</td><td contenteditable=\"false\" class=\"quantityChangeField\">1</td><td contenteditable=\"false\">400</td></tr><tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">sign board</td><td contenteditable=\"false\" class=\"priceChangeField\">200</td><td contenteditable=\"false\" class=\"quantityChangeField\">1</td><td contenteditable=\"false\">200</td></tr></tbody><tbody>\n	                    		 \n	                    	<tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">wrestling board</td><td contenteditable=\"false\" class=\"priceChangeField\">400</td><td contenteditable=\"false\" class=\"quantityChangeField\">3</td><td contenteditable=\"false\">1200</td></tr><tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">flex board naga dhaga</td><td contenteditable=\"false\" class=\"priceChangeField\">300</td><td contenteditable=\"false\" class=\"quantityChangeField\">2</td><td contenteditable=\"false\">600</td></tr><tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">sign board</td><td contenteditable=\"false\" class=\"priceChangeField\">200</td><td contenteditable=\"false\" class=\"quantityChangeField\">6</td><td contenteditable=\"false\">1200</td></tr></tbody><tbody>\n	                    		 \n	                    	<tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">cigratte flake</td><td contenteditable=\"false\" class=\"priceChangeField\">999</td><td contenteditable=\"false\" class=\"quantityChangeField\">3</td><td contenteditable=\"false\">2997</td></tr><tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">arjun web</td><td contenteditable=\"false\" class=\"priceChangeField\">999</td><td contenteditable=\"false\" class=\"quantityChangeField\">1</td><td contenteditable=\"false\">999</td></tr><tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">sign board</td><td contenteditable=\"false\" class=\"priceChangeField\">200</td><td contenteditable=\"false\" class=\"quantityChangeField\">1</td><td contenteditable=\"false\">200</td></tr></tbody><tbody>\n	                    		 \n	                    	<tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">cigratte flake</td><td contenteditable=\"false\" class=\"priceChangeField\">999</td><td contenteditable=\"false\" class=\"quantityChangeField\">2</td><td contenteditable=\"false\">1998</td></tr><tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">wrestling board</td><td contenteditable=\"false\" class=\"priceChangeField\">400</td><td contenteditable=\"false\" class=\"quantityChangeField\">4</td><td contenteditable=\"false\">1600</td></tr><tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">flex board naga dhaga</td><td contenteditable=\"false\" class=\"priceChangeField\">300</td><td contenteditable=\"false\" class=\"quantityChangeField\">4</td><td contenteditable=\"false\">1200</td></tr><tr id=\"lastTotalRow\"><td contenteditable=\"false\">total</td><td contenteditable=\"false\"></td><td contenteditable=\"false\"></td><td contenteditable=\"false\">14994</td></tr></tbody></table>', '<table class=\"table table-bordered\" id=\"paymentRecievedBy\">\n                            <thead>\n                              <tr><th>Cash Recieved By</th>\n                              <th>Through</th> \n                              <th>Recieved</th>\n                            </tr></thead>\n\n                            <tbody>\n                               \n                            <tr class=\"showAllTrans\"><td>Ejaz</td><td>Account</td><td>6000</td></tr><tr class=\"showAllTrans\"><td>Ejaz</td><td>Cash</td><td>6000</td></tr><tr class=\"showAllTrans\"><td>Ejaz</td><td>Cash</td><td>6000</td></tr><tr class=\"showAllTrans\"><td>Ejaz</td><td>Account</td><td>6000</td></tr><tr id=\"paymentLastTotalRow\"><td>Total Paid</td><td></td><td>24000</td></tr><tr id=\"balanceLastTotalRow\"><td>Balance Amount</td><td></td><td>-9006</td></tr></tbody>\n                          </table>', '2018-01-02 06:31:33', 9006, 14994, '2018-01-02 06:31:33', 24000),
(3, 9, 'dsndfbbd', 'ggssss', 'email@gmail.com,email@gmail.com', 'fdnbdfbd,fdnbdfbd,fdnbdfbd', '<table class=\"table table-bordered\" id=\"showQuotation\">\n	                    	<thead>\n	                    		<tr><th>Product Name</th>\n	                    		<th>Price</th> \n	                    		<th>Quantity</th>\n	                    		<th>Amount</th> \n	                    	</tr></thead>\n\n	                    	<tbody>\n	                    		 \n	                    	<tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">flex board naga dhaga</td><td contenteditable=\"false\" class=\"priceChangeField\">300</td><td contenteditable=\"false\" class=\"quantityChangeField\">4</td><td contenteditable=\"false\">1200</td></tr><tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">sign board</td><td contenteditable=\"false\" class=\"priceChangeField\">200</td><td contenteditable=\"false\" class=\"quantityChangeField\">4</td><td contenteditable=\"false\">800</td></tr><tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">wrestling board</td><td contenteditable=\"false\" class=\"priceChangeField\">400</td><td contenteditable=\"false\" class=\"quantityChangeField\">1</td><td contenteditable=\"false\">400</td></tr></tbody>\n	                    <tbody>\n	                    		 \n	                    	<tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">wrestling board</td><td contenteditable=\"false\" class=\"priceChangeField\">400</td><td contenteditable=\"false\" class=\"quantityChangeField\">1</td><td contenteditable=\"false\">400</td></tr><tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">sign board</td><td contenteditable=\"false\" class=\"priceChangeField\">200</td><td contenteditable=\"false\" class=\"quantityChangeField\">1</td><td contenteditable=\"false\">200</td></tr></tbody><tbody>\n	                    		 \n	                    	<tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">wrestling board</td><td contenteditable=\"false\" class=\"priceChangeField\">400</td><td contenteditable=\"false\" class=\"quantityChangeField\">3</td><td contenteditable=\"false\">1200</td></tr><tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">flex board naga dhaga</td><td contenteditable=\"false\" class=\"priceChangeField\">300</td><td contenteditable=\"false\" class=\"quantityChangeField\">2</td><td contenteditable=\"false\">600</td></tr><tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">sign board</td><td contenteditable=\"false\" class=\"priceChangeField\">200</td><td contenteditable=\"false\" class=\"quantityChangeField\">6</td><td contenteditable=\"false\">1200</td></tr></tbody><tbody>\n	                    		 \n	                    	<tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">cigratte flake</td><td contenteditable=\"false\" class=\"priceChangeField\">999</td><td contenteditable=\"false\" class=\"quantityChangeField\">3</td><td contenteditable=\"false\">2997</td></tr><tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">arjun web</td><td contenteditable=\"false\" class=\"priceChangeField\">999</td><td contenteditable=\"false\" class=\"quantityChangeField\">1</td><td contenteditable=\"false\">999</td></tr><tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">sign board</td><td contenteditable=\"false\" class=\"priceChangeField\">200</td><td contenteditable=\"false\" class=\"quantityChangeField\">1</td><td contenteditable=\"false\">200</td></tr></tbody><tbody>\n	                    		 \n	                    	<tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">cigratte flake</td><td contenteditable=\"false\" class=\"priceChangeField\">999</td><td contenteditable=\"false\" class=\"quantityChangeField\">2</td><td contenteditable=\"false\">1998</td></tr><tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">wrestling board</td><td contenteditable=\"false\" class=\"priceChangeField\">400</td><td contenteditable=\"false\" class=\"quantityChangeField\">4</td><td contenteditable=\"false\">1600</td></tr><tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">flex board naga dhaga</td><td contenteditable=\"false\" class=\"priceChangeField\">300</td><td contenteditable=\"false\" class=\"quantityChangeField\">4</td><td contenteditable=\"false\">1200</td></tr><tr id=\"lastTotalRow\"><td contenteditable=\"false\">total</td><td contenteditable=\"false\"></td><td contenteditable=\"false\"></td><td contenteditable=\"false\">14994</td></tr></tbody></table>', '<table class=\"table table-bordered\" id=\"paymentRecievedBy\">\n                            <thead>\n                              <tr><th>Cash Recieved By</th>\n                              <th>Through</th> \n                              <th>Recieved</th>\n                            </tr></thead>\n\n                            <tbody>\n                               \n                            <tr class=\"showAllTrans\"><td>Arjun</td><td>Account</td><td>500</td></tr><tr class=\"showAllTrans\"><td>Arjun</td><td>Account</td><td>1500</td></tr><tr id=\"paymentLastTotalRow\"><td>Total Paid</td><td></td><td>2000</td></tr><tr id=\"balanceLastTotalRow\"><td>Balance Amount</td><td></td><td>12994</td></tr></tbody>\n                          </table>', '2018-01-02 12:09:05', 12994, 14994, '2018-01-02 12:09:05', 2000),
(4, 9, 'dsndfbbd', 'ggssss', 'email@gmail.com,email@gmail.com', 'fdnbdfbd,fdnbdfbd,fdnbdfbd', '<table class=\"table table-bordered\" id=\"showQuotation\">\n	                    	<thead>\n	                    		<tr><th>Product Name</th>\n	                    		<th>Price</th> \n	                    		<th>Quantity</th>\n	                    		<th>Amount</th> \n	                    	</tr></thead>\n\n	                    	<tbody>\n	                    		 \n	                    	<tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">flex board naga dhaga</td><td contenteditable=\"false\" class=\"priceChangeField\">300</td><td contenteditable=\"false\" class=\"quantityChangeField\">4</td><td contenteditable=\"false\">1200</td></tr><tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">sign board</td><td contenteditable=\"false\" class=\"priceChangeField\">200</td><td contenteditable=\"false\" class=\"quantityChangeField\">4</td><td contenteditable=\"false\">800</td></tr><tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">wrestling board</td><td contenteditable=\"false\" class=\"priceChangeField\">400</td><td contenteditable=\"false\" class=\"quantityChangeField\">1</td><td contenteditable=\"false\">400</td></tr></tbody>\n	                    <tbody>\n	                    		 \n	                    	<tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">wrestling board</td><td contenteditable=\"false\" class=\"priceChangeField\">400</td><td contenteditable=\"false\" class=\"quantityChangeField\">1</td><td contenteditable=\"false\">400</td></tr><tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">sign board</td><td contenteditable=\"false\" class=\"priceChangeField\">200</td><td contenteditable=\"false\" class=\"quantityChangeField\">1</td><td contenteditable=\"false\">200</td></tr></tbody><tbody>\n	                    		 \n	                    	<tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">wrestling board</td><td contenteditable=\"false\" class=\"priceChangeField\">400</td><td contenteditable=\"false\" class=\"quantityChangeField\">3</td><td contenteditable=\"false\">1200</td></tr><tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">flex board naga dhaga</td><td contenteditable=\"false\" class=\"priceChangeField\">300</td><td contenteditable=\"false\" class=\"quantityChangeField\">2</td><td contenteditable=\"false\">600</td></tr><tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">sign board</td><td contenteditable=\"false\" class=\"priceChangeField\">200</td><td contenteditable=\"false\" class=\"quantityChangeField\">6</td><td contenteditable=\"false\">1200</td></tr></tbody><tbody>\n	                    		 \n	                    	<tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">cigratte flake</td><td contenteditable=\"false\" class=\"priceChangeField\">999</td><td contenteditable=\"false\" class=\"quantityChangeField\">3</td><td contenteditable=\"false\">2997</td></tr><tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">arjun web</td><td contenteditable=\"false\" class=\"priceChangeField\">999</td><td contenteditable=\"false\" class=\"quantityChangeField\">1</td><td contenteditable=\"false\">999</td></tr><tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">sign board</td><td contenteditable=\"false\" class=\"priceChangeField\">200</td><td contenteditable=\"false\" class=\"quantityChangeField\">1</td><td contenteditable=\"false\">200</td></tr></tbody><tbody>\n	                    		 \n	                    	<tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">cigratte flake</td><td contenteditable=\"false\" class=\"priceChangeField\">999</td><td contenteditable=\"false\" class=\"quantityChangeField\">2</td><td contenteditable=\"false\">1998</td></tr><tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">wrestling board</td><td contenteditable=\"false\" class=\"priceChangeField\">400</td><td contenteditable=\"false\" class=\"quantityChangeField\">4</td><td contenteditable=\"false\">1600</td></tr><tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">flex board naga dhaga</td><td contenteditable=\"false\" class=\"priceChangeField\">300</td><td contenteditable=\"false\" class=\"quantityChangeField\">4</td><td contenteditable=\"false\">1200</td></tr><tr id=\"lastTotalRow\"><td contenteditable=\"false\">total</td><td contenteditable=\"false\"></td><td contenteditable=\"false\"></td><td contenteditable=\"false\">14994</td></tr></tbody></table>', '<table class=\"table table-bordered\" id=\"paymentRecievedBy\">\n                            <thead>\n                              <tr><th>Cash Recieved By</th>\n                              <th>Through</th> \n                              <th>Recieved</th>\n                            </tr></thead>\n\n                            <tbody>\n                               \n                            <tr class=\"showAllTrans\"><td>Arjun</td><td>Account</td><td>500</td></tr><tr class=\"showAllTrans\"><td>Arjun</td><td>Account</td><td>1500</td></tr><tr class=\"showAllTrans\"><td>Arjun</td><td>Account</td><td>2994</td></tr><tr id=\"paymentLastTotalRow\"><td>Total Paid</td><td></td><td>4994</td></tr><tr id=\"balanceLastTotalRow\"><td>Balance Amount</td><td></td><td>10000</td></tr></tbody>\n                          </table>', '2018-01-02 16:16:34', 10000, 14994, '2018-01-02 16:16:34', 4994),
(5, 11, 'dcndxnds', 'saddam bhai', 'dfddsj@gmail.com', '84398349934,4334878738', '<table class=\"table table-bordered\" id=\"showQuotation\">\n	                    	<thead>\n	                    		<tr><th>Product Name</th>\n	                    		<th>Price</th> \n	                    		<th>Quantity</th>\n	                    		<th>Amount</th> \n	                    	</tr></thead>\n\n	                    	<tbody>\n	                    		 \n	                    	<tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">arjun web</td><td contenteditable=\"false\" class=\"priceChangeField\">999</td><td contenteditable=\"false\" class=\"quantityChangeField\">2</td><td contenteditable=\"false\">1998</td></tr><tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">wrestling board</td><td contenteditable=\"false\" class=\"priceChangeField\">400</td><td contenteditable=\"false\" class=\"quantityChangeField\">2</td><td contenteditable=\"false\">800</td></tr><tr id=\"lastTotalRow\"><td contenteditable=\"false\">total</td><td contenteditable=\"false\"></td><td contenteditable=\"false\"></td><td contenteditable=\"false\">2798</td></tr></tbody>\n	                    </table>', NULL, '2018-01-05 10:29:38', NULL, 2798, '2018-01-05 10:29:38', NULL),
(6, 9, 'dsndfbbd', 'ggssss', 'email@gmail.com,email@gmail.com', 'fdnbdfbd,fdnbdfbd,fdnbdfbd', '<table class=\"table table-bordered\" id=\"showQuotation\">\n	                    	<thead>\n	                    		<tr><th>Product Name</th>\n	                    		<th>Price</th> \n	                    		<th>Quantity</th>\n	                    		<th>Amount</th> \n	                    	</tr></thead>\n\n	                    	<tbody>\n	                    		 \n	                    	<tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">flex board naga dhaga</td><td contenteditable=\"false\" class=\"priceChangeField\">300</td><td contenteditable=\"false\" class=\"quantityChangeField\">4</td><td contenteditable=\"false\">1200</td></tr><tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">sign board</td><td contenteditable=\"false\" class=\"priceChangeField\">200</td><td contenteditable=\"false\" class=\"quantityChangeField\">4</td><td contenteditable=\"false\">800</td></tr><tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">wrestling board</td><td contenteditable=\"false\" class=\"priceChangeField\">400</td><td contenteditable=\"false\" class=\"quantityChangeField\">1</td><td contenteditable=\"false\">400</td></tr></tbody>\n	                    <tbody>\n	                    		 \n	                    	<tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">wrestling board</td><td contenteditable=\"false\" class=\"priceChangeField\">400</td><td contenteditable=\"false\" class=\"quantityChangeField\">1</td><td contenteditable=\"false\">400</td></tr><tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">sign board</td><td contenteditable=\"false\" class=\"priceChangeField\">200</td><td contenteditable=\"false\" class=\"quantityChangeField\">1</td><td contenteditable=\"false\">200</td></tr></tbody><tbody>\n	                    		 \n	                    	<tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">wrestling board</td><td contenteditable=\"false\" class=\"priceChangeField\">400</td><td contenteditable=\"false\" class=\"quantityChangeField\">3</td><td contenteditable=\"false\">1200</td></tr><tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">flex board naga dhaga</td><td contenteditable=\"false\" class=\"priceChangeField\">300</td><td contenteditable=\"false\" class=\"quantityChangeField\">2</td><td contenteditable=\"false\">600</td></tr><tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">sign board</td><td contenteditable=\"false\" class=\"priceChangeField\">200</td><td contenteditable=\"false\" class=\"quantityChangeField\">6</td><td contenteditable=\"false\">1200</td></tr></tbody><tbody>\n	                    		 \n	                    	<tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">cigratte flake</td><td contenteditable=\"false\" class=\"priceChangeField\">999</td><td contenteditable=\"false\" class=\"quantityChangeField\">3</td><td contenteditable=\"false\">2997</td></tr><tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">arjun web</td><td contenteditable=\"false\" class=\"priceChangeField\">999</td><td contenteditable=\"false\" class=\"quantityChangeField\">1</td><td contenteditable=\"false\">999</td></tr><tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">sign board</td><td contenteditable=\"false\" class=\"priceChangeField\">200</td><td contenteditable=\"false\" class=\"quantityChangeField\">1</td><td contenteditable=\"false\">200</td></tr></tbody><tbody>\n	                    		 \n	                    	<tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">cigratte flake</td><td contenteditable=\"false\" class=\"priceChangeField\">999</td><td contenteditable=\"false\" class=\"quantityChangeField\">2</td><td contenteditable=\"false\">1998</td></tr><tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">wrestling board</td><td contenteditable=\"false\" class=\"priceChangeField\">400</td><td contenteditable=\"false\" class=\"quantityChangeField\">4</td><td contenteditable=\"false\">1600</td></tr><tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">flex board naga dhaga</td><td contenteditable=\"false\" class=\"priceChangeField\">300</td><td contenteditable=\"false\" class=\"quantityChangeField\">4</td><td contenteditable=\"false\">1200</td></tr></tbody><tbody>\n	                    		 \n	                    	<tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">wrestling board</td><td contenteditable=\"false\" class=\"priceChangeField\">400</td><td contenteditable=\"false\" class=\"quantityChangeField\">333</td><td contenteditable=\"false\">133200</td></tr><tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">wrestling board</td><td contenteditable=\"false\" class=\"priceChangeField\">400</td><td contenteditable=\"false\" class=\"quantityChangeField\">333</td><td contenteditable=\"false\">133200</td></tr><tr id=\"lastTotalRow\"><td contenteditable=\"false\">total</td><td contenteditable=\"false\"></td><td contenteditable=\"false\"></td><td contenteditable=\"false\">281394</td></tr></tbody></table>', '<table class=\"table table-bordered\" id=\"paymentRecievedBy\">\n                            <thead>\n                              <tr><th>Cash Recieved By</th>\n                              <th>Through</th> \n                              <th>Recieved</th>\n                            </tr></thead>\n\n                            <tbody>\n                               \n                            <tr class=\"showAllTrans\"><td>Arjun</td><td>Account</td><td>500</td></tr><tr class=\"showAllTrans\"><td>Arjun</td><td>Account</td><td>1500</td></tr><tr class=\"showAllTrans\"><td>Arjun</td><td>Account</td><td>2994</td></tr><tr class=\"showAllTrans\"><td>Arjun</td><td>Account</td><td>550</td></tr><tr id=\"paymentLastTotalRow\"><td>Total Paid</td><td></td><td>5544</td></tr><tr id=\"balanceLastTotalRow\"><td>Balance Amount</td><td></td><td>275850</td></tr></tbody>\n                          </table>', '2018-01-05 10:32:29', 275850, 281394, '2018-01-05 10:32:29', 5544),
(7, 12, 'Raj Laxmi', 'Raj Laxmi Clinic', 'raj@gmail.com', '9738889288', '<table class=\"table table-bordered\" id=\"showQuotation\">\n	                    	<thead>\n	                    		<tr><th>Product Name</th>\n	                    		<th>Price</th> \n	                    		<th>Quantity</th>\n	                    		<th>Amount</th> \n	                    	</tr></thead>\n\n	                    	<tbody>\n	                    		 \n	                    	<tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">sign board</td><td contenteditable=\"false\" class=\"priceChangeField\">200</td><td contenteditable=\"false\" class=\"quantityChangeField\">1</td><td contenteditable=\"false\">200</td></tr><tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">ghee</td><td contenteditable=\"false\" class=\"priceChangeField\">999</td><td contenteditable=\"false\" class=\"quantityChangeField\">2</td><td contenteditable=\"false\">1998</td></tr><tr id=\"lastTotalRow\"><td contenteditable=\"false\">total</td><td contenteditable=\"false\"></td><td contenteditable=\"false\"></td><td contenteditable=\"false\">2198</td></tr></tbody>\n	                    </table>', NULL, '2018-01-06 10:16:55', 1198, 2198, '2018-01-06 10:12:03', NULL),
(8, 13, 'Vasundra', 'Egg Dot', 'vasundra@gmail.com', '4858865288', '<table class=\"table table-bordered\" id=\"showQuotation\">\n	                    	<thead>\n	                    		<tr><th>Product Name</th>\n	                    		<th>Price</th> \n	                    		<th>Quantity</th>\n	                    		<th>Amount</th> \n	                    	</tr></thead>\n\n	                    	<tbody>\n	                    		 \n	                    	<tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">sign board</td><td contenteditable=\"false\" class=\"priceChangeField\">200</td><td contenteditable=\"false\" class=\"quantityChangeField\">1</td><td contenteditable=\"false\">200</td></tr><tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">wrestling board</td><td contenteditable=\"false\" class=\"priceChangeField\">400</td><td contenteditable=\"false\" class=\"quantityChangeField\">1</td><td contenteditable=\"false\">400</td></tr><tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">flex board naga dhaga</td><td contenteditable=\"false\" class=\"priceChangeField\">300</td><td contenteditable=\"false\" class=\"quantityChangeField\">1</td><td contenteditable=\"false\">300</td></tr><tr id=\"lastTotalRow\"><td contenteditable=\"false\">total</td><td contenteditable=\"false\"></td><td contenteditable=\"false\"></td><td contenteditable=\"false\">900</td></tr></tbody>\n	                    </table>', NULL, '2018-01-11 06:40:14', NULL, 900, '2018-01-11 06:40:14', NULL),
(9, 13, 'Vasundra', 'Egg Dot', 'vasundra@gmail.com', '4858865288', '<table class=\"table table-bordered\" id=\"showQuotation\">\n	                    	<thead>\n	                    		<tr><th>Product Name</th>\n	                    		<th>Price</th> \n	                    		<th>Quantity</th>\n	                    		<th>Amount</th> \n	                    	</tr></thead>\n\n	                    	<tbody>\n	                    		 \n	                    	<tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">sign board</td><td contenteditable=\"false\" class=\"priceChangeField\">200</td><td contenteditable=\"false\" class=\"quantityChangeField\">1</td><td contenteditable=\"false\">200</td></tr><tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">wrestling board</td><td contenteditable=\"false\" class=\"priceChangeField\">400</td><td contenteditable=\"false\" class=\"quantityChangeField\">1</td><td contenteditable=\"false\">400</td></tr><tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">flex board naga dhaga</td><td contenteditable=\"false\" class=\"priceChangeField\">300</td><td contenteditable=\"false\" class=\"quantityChangeField\">1</td><td contenteditable=\"false\">300</td></tr><tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">ss</td><td contenteditable=\"false\" class=\"priceChangeField\">90</td><td contenteditable=\"false\" class=\"quantityChangeField\">1</td><td contenteditable=\"false\">90</td></tr></tbody>\n	                    <tbody>\n	                    		 \n	                    	<tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">cigratte flake</td><td contenteditable=\"false\" class=\"priceChangeField\">999</td><td contenteditable=\"false\" class=\"quantityChangeField\">2</td><td contenteditable=\"false\">1998</td></tr><tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">sign board</td><td contenteditable=\"false\" class=\"priceChangeField\">200</td><td contenteditable=\"false\" class=\"quantityChangeField\">2</td><td contenteditable=\"false\">400</td></tr><tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">cigratte flake</td><td contenteditable=\"false\" class=\"priceChangeField\">999</td><td contenteditable=\"false\" class=\"quantityChangeField\">2</td><td contenteditable=\"false\">1998</td></tr><tr id=\"lastTotalRow\"><td contenteditable=\"false\">total</td><td contenteditable=\"false\"></td><td contenteditable=\"false\"></td><td contenteditable=\"false\">5386</td></tr></tbody></table>', '<table class=\"table table-bordered\" id=\"paymentRecievedBy\">\n                            <thead>\n                              <tr><th>Cash Recieved By</th>\n                              <th>Through</th> \n                              <th>Recieved</th>\n                            </tr></thead>\n\n                            <tbody>\n                                 \n                           <tr class=\"showAllTrans\"><td>Tanveer Baig</td><td>Account</td><td>4000</td></tr><tr class=\"showAllTrans\"><td>Murthy</td><td>Cash</td><td>1000</td></tr><tr id=\"paymentLastTotalRow\"><td>Total Paid</td><td></td><td>5000</td></tr><tr id=\"balanceLastTotalRow\"><td>Balance Amount</td><td></td><td>386</td></tr></tbody>\n                       </table>', '2018-01-12 09:24:38', 386, 5386, '2018-01-12 09:24:38', 5000),
(10, 20, 'Vincent', 'Vincent', 'vincent@gmail.com', '4858865288', '<table class=\"table table-bordered\" id=\"showQuotation\">\n	                    	<thead>\n	                    		<tr><th>Product Name</th>\n	                    		<th>Price</th> \n	                    		<th>Quantity</th>\n	                    		<th>Amount</th> \n	                    	</tr></thead>\n\n	                    	<tbody>\n	                    		 \n	                    	<tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">sign board</td><td contenteditable=\"false\" class=\"priceChangeField\">200</td><td contenteditable=\"false\" class=\"quantityChangeField\">2</td><td contenteditable=\"false\">400</td></tr><tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">wrestling board</td><td contenteditable=\"false\" class=\"priceChangeField\">400</td><td contenteditable=\"false\" class=\"quantityChangeField\">2</td><td contenteditable=\"false\">800</td></tr><tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">flex board naga dhaga</td><td contenteditable=\"false\" class=\"priceChangeField\">300</td><td contenteditable=\"false\" class=\"quantityChangeField\">2</td><td contenteditable=\"false\">600</td></tr><tr id=\"lastTotalRow\"><td contenteditable=\"false\">total</td><td contenteditable=\"false\"></td><td contenteditable=\"false\"></td><td contenteditable=\"false\">1800</td></tr></tbody>\n	                    </table>', '<table class=\"table table-bordered\" id=\"paymentRecievedBy\">\n                            <thead>\n                              <tr><th>Cash Recieved By</th>\n                              <th>Through</th> \n                              <th>Recieved</th>\n                            </tr></thead>\n\n                            <tbody>\n                                 \n                           <tr class=\"showAllTrans\"><td>Tanveer Baig</td><td>Cash</td><td>800</td></tr><tr id=\"paymentLastTotalRow\"><td>Total Paid</td><td></td><td>800</td></tr><tr id=\"balanceLastTotalRow\"><td>Balance Amount</td><td></td><td>1000</td></tr></tbody>\n                       </table>', '2018-01-12 09:45:26', 1000, 1800, '2018-01-12 09:45:26', 800),
(11, 12, 'Raj Laxmi', 'Raj Laxmi Clinic', 'raj@gmail.com', '9738889288', '<table class=\"table table-bordered\" id=\"showQuotation\">\n	                    	<thead>\n	                    		<tr><th>Product Name</th>\n	                    		<th>Price</th> \n	                    		<th>Quantity</th>\n	                    		<th>Amount</th> \n	                    	</tr></thead>\n\n	                    	<tbody>\n	                    		 \n	                    	<tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">sign board</td><td contenteditable=\"false\" class=\"priceChangeField\">200</td><td contenteditable=\"false\" class=\"quantityChangeField\">1</td><td contenteditable=\"false\">200</td></tr><tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">ghee</td><td contenteditable=\"false\" class=\"priceChangeField\">999</td><td contenteditable=\"false\" class=\"quantityChangeField\">2</td><td contenteditable=\"false\">1998</td></tr></tbody>\n	                    <tbody>\n	                    		 \n	                    	<tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">halwa</td><td contenteditable=\"false\" class=\"priceChangeField\">999</td><td contenteditable=\"false\" class=\"quantityChangeField\">1</td><td contenteditable=\"false\">999</td></tr><tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">halwa</td><td contenteditable=\"false\" class=\"priceChangeField\">999</td><td contenteditable=\"false\" class=\"quantityChangeField\">2</td><td contenteditable=\"false\">1998</td></tr><tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">flex board naga dhaga</td><td contenteditable=\"false\" class=\"priceChangeField\">300</td><td contenteditable=\"false\" class=\"quantityChangeField\">2</td><td contenteditable=\"false\">600</td></tr><tr id=\"lastTotalRow\"><td contenteditable=\"false\">total</td><td contenteditable=\"false\"></td><td contenteditable=\"false\"></td><td contenteditable=\"false\">5795</td></tr></tbody></table>', '<table class=\"table table-bordered\" id=\"paymentRecievedBy\">\n                            <thead>\n                              <tr><th>Cash Recieved By</th>\n                              <th>Through</th> \n                              <th>Recieved</th>\n                            </tr></thead>\n\n                            <tbody>\n                                 \n                           <tr class=\"showAllTrans\"><td>Murthy</td><td>Cash</td><td>2000</td></tr><tr id=\"paymentLastTotalRow\"><td>Total Paid</td><td></td><td>2000</td></tr><tr id=\"balanceLastTotalRow\"><td>Balance Amount</td><td></td><td>3795</td></tr></tbody>\n                       </table>', '2018-01-12 13:08:46', 3795, 5795, '2018-01-12 13:08:46', 2000),
(12, 12, 'Raj Laxmi', 'Raj Laxmi Clinic', 'raj@gmail.com', '9738889288', '<table class=\"table table-bordered\" id=\"showQuotation\">\n	                    	<thead>\n	                    		<tr><th>Product Name</th>\n	                    		<th>Price</th> \n	                    		<th>Quantity</th>\n	                    		<th>Amount</th> \n	                    	</tr></thead>\n\n	                    	<tbody>\n	                    		 \n	                    	<tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">sign board</td><td contenteditable=\"false\" class=\"priceChangeField\">200</td><td contenteditable=\"false\" class=\"quantityChangeField\">1</td><td contenteditable=\"false\">200</td></tr><tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">ghee</td><td contenteditable=\"false\" class=\"priceChangeField\">999</td><td contenteditable=\"false\" class=\"quantityChangeField\">2</td><td contenteditable=\"false\">1998</td></tr></tbody>\n	                    <tbody>\n	                    		 \n	                    	<tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">halwa</td><td contenteditable=\"false\" class=\"priceChangeField\">999</td><td contenteditable=\"false\" class=\"quantityChangeField\">1</td><td contenteditable=\"false\">999</td></tr><tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">halwa</td><td contenteditable=\"false\" class=\"priceChangeField\">999</td><td contenteditable=\"false\" class=\"quantityChangeField\">2</td><td contenteditable=\"false\">1998</td></tr><tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">flex board naga dhaga</td><td contenteditable=\"false\" class=\"priceChangeField\">300</td><td contenteditable=\"false\" class=\"quantityChangeField\">2</td><td contenteditable=\"false\">600</td></tr></tbody><tbody>\n	                    		 \n	                    	<tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">sign board</td><td contenteditable=\"false\" class=\"priceChangeField\">200</td><td contenteditable=\"false\" class=\"quantityChangeField\">1</td><td contenteditable=\"false\">200</td></tr><tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">ghee</td><td contenteditable=\"false\" class=\"priceChangeField\">999</td><td contenteditable=\"false\" class=\"quantityChangeField\">2</td><td contenteditable=\"false\">1998</td></tr><tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">Frosted With Plottercutting</td><td contenteditable=\"false\" class=\"priceChangeField\">70</td><td contenteditable=\"false\" class=\"quantityChangeField\">45</td><td contenteditable=\"false\">3150</td></tr><tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">Lco Solvent Vinyl With Lamination</td><td contenteditable=\"false\" class=\"priceChangeField\">50</td><td contenteditable=\"false\" class=\"quantityChangeField\">45</td><td contenteditable=\"false\">2250</td></tr><tr id=\"lastTotalRow\"><td contenteditable=\"false\">total</td><td contenteditable=\"false\"></td><td contenteditable=\"false\"></td><td contenteditable=\"false\">13393</td></tr></tbody></table>', '<table class=\"table table-bordered\" id=\"paymentRecievedBy\">\n                            <thead>\n                              <tr><th>Cash Recieved By</th>\n                              <th>Through</th> \n                              <th>Recieved</th>\n                            </tr></thead>\n\n                            <tbody>\n                                 \n                           <tr class=\"showAllTrans\"><td>Murthy</td><td>Cash</td><td>2000</td></tr><tr class=\"showAllTrans\"><td>Tanveer Baig</td><td>Account</td><td>500</td></tr><tr id=\"paymentLastTotalRow\"><td>Total Paid</td><td></td><td>2500</td></tr><tr id=\"balanceLastTotalRow\"><td>Balance Amount</td><td></td><td>10893</td></tr></tbody>\n                       </table>', '2018-01-15 01:50:52', 10893, 13393, '2018-01-15 01:50:52', 2500),
(13, 21, 'Tanveer Baig', 'Enigma Brand Solution', 'tanveer@gmail.com', '4858865288', '<table class=\"table table-bordered\" id=\"showQuotation\" style=\"margin-top: 40px;\" data-gst=\"50\">\n	                    	<thead>\n	                    		<tr><th>Product Name</th>\n	                    		<th>Price</th> \n	                    		<th>Quantity</th>\n	                    		<th>Amount</th> \n	                    		 \n	                    	</tr></thead>\n\n	                    	<tbody>\n	                    		 \n	                    	<tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">Star Flex With Standy 4 x 6.5</td><td contenteditable=\"false\" class=\"priceChangeField\">2218</td><td contenteditable=\"false\" class=\"quantityChangeField\">20</td><td contenteditable=\"false\">44360</td></tr><tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">Standy Scrolling 2 x 5</td><td contenteditable=\"false\" class=\"priceChangeField\">1195</td><td contenteditable=\"false\" class=\"quantityChangeField\">9</td><td contenteditable=\"false\">10755</td></tr><tr id=\"lastTotalRow3333\"><td contenteditable=\"false\"></td><td contenteditable=\"false\"></td><td contenteditable=\"false\"></td><th>Total Amount</th></tr><tr id=\"gstShowingRow\"><td contenteditable=\"false\">gst</td><td contenteditable=\"false\"></td><td contenteditable=\"false\"></td><td contenteditable=\"false\">86584.50</td></tr><tr id=\"lastTotalRow\"><td contenteditable=\"false\">total</td><td contenteditable=\"false\"></td><td contenteditable=\"false\"></td><td contenteditable=\"false\">55115</td></tr></tbody>\n	                    </table>', '<table class=\"table table-bordered\" id=\"paymentRecievedBy\">\n                            <thead>\n                              <tr><th>Cash Recieved By</th>\n                              <th>Through</th> \n                              <th>Recieved</th>\n                            </tr></thead>\n\n                            <tbody>\n                                 \n                           <tr class=\"showAllTrans\"><td>Tanveer Baig</td><td>Account</td><td>20</td></tr><tr class=\"showAllTrans\"><td>Madan</td><td>Cash</td><td>2000</td></tr><tr class=\"showAllTrans\"><td>Murthy</td><td>Account</td><td>300</td></tr><tr class=\"showAllTrans\"><td>Murthy</td><td>Account</td><td>3000</td></tr><tr class=\"showAllTrans\"><td>Murthy</td><td>Account</td><td>5000</td></tr><tr class=\"showAllTrans\"><td>Tanveer Baig</td><td>Account</td><td>5000</td></tr><tr class=\"showAllTrans\"><td>Murthy</td><td>Account</td><td>5000</td></tr><tr id=\"paymentLastTotalRow\"><td>Total Paid</td><td></td><td>20320</td></tr><tr id=\"balanceLastTotalRow\"><td>Balance Amount</td><td></td><td>66264.50</td></tr></tbody>\n                       </table>', '2018-01-26 07:27:43', 66264.5, 55115, '2018-01-26 07:27:43', 20320);
INSERT INTO `customer_payment` (`id`, `customer_id`, `customer_name`, `company_name`, `email`, `phone`, `product_bought`, `balance_sheet`, `created_at`, `total_balance`, `total_amount`, `updated_at`, `total_recieved_amount`) VALUES
(14, 21, 'Tanveer Baig', 'Enigma Brand Solution', 'tanveer@gmail.com', '4858865288', '<table class=\"table table-bordered\" id=\"showQuotation\" style=\"margin-top: 40px;\" data-gst=\"50\">\n	                    	<thead>\n	                    		<tr><th>Product Name</th>\n	                    		<th>Price</th> \n	                    		<th>Quantity</th>\n	                    		<th>Amount</th> \n	                    		 \n	                    	</tr></thead>\n\n	                    	<tbody>\n	                    		 \n	                    	<tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">Star Flex With Standy 4 x 6.5</td><td contenteditable=\"false\" class=\"priceChangeField\">2218</td><td contenteditable=\"false\" class=\"quantityChangeField\">20</td><td contenteditable=\"false\">44360</td></tr><tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">Standy Scrolling 2 x 5</td><td contenteditable=\"false\" class=\"priceChangeField\">1195</td><td contenteditable=\"false\" class=\"quantityChangeField\">9</td><td contenteditable=\"false\">10755</td></tr><tr id=\"lastTotalRow3333\"><td contenteditable=\"false\"></td><td contenteditable=\"false\"></td><td contenteditable=\"false\"></td><th>Total Amount</th></tr><tr id=\"gstShowingRow\"><td contenteditable=\"false\">gst</td><td contenteditable=\"false\"></td><td contenteditable=\"false\"></td><td contenteditable=\"false\">86584.50</td></tr><tr id=\"lastTotalRow\"><td contenteditable=\"false\">total</td><td contenteditable=\"false\"></td><td contenteditable=\"false\"></td><td contenteditable=\"false\">55115</td></tr></tbody>\n	                    </table>', '<table class=\"table table-bordered\" id=\"paymentRecievedBy\">\n                            <thead>\n                              <tr><th>Cash Recieved By</th>\n                              <th>Through</th> \n                              <th>Recieved</th>\n                            </tr></thead>\n\n                            <tbody>\n                                 \n                           <tr class=\"showAllTrans\"><td>Tanveer Baig</td><td>Account</td><td>20</td></tr><tr class=\"showAllTrans\"><td>Madan</td><td>Cash</td><td>2000</td></tr><tr class=\"showAllTrans\"><td>Murthy</td><td>Account</td><td>300</td></tr><tr class=\"showAllTrans\"><td>Murthy</td><td>Account</td><td>3000</td></tr><tr class=\"showAllTrans\"><td>Murthy</td><td>Account</td><td>5000</td></tr><tr class=\"showAllTrans\"><td>Tanveer Baig</td><td>Account</td><td>5000</td></tr><tr class=\"showAllTrans\"><td>Murthy</td><td>Account</td><td>5000</td></tr><tr id=\"paymentLastTotalRow\"><td>Total Paid</td><td></td><td>20320</td></tr><tr id=\"balanceLastTotalRow\"><td>Balance Amount</td><td></td><td>66264.50</td></tr></tbody>\n                       </table>', '2018-01-26 07:27:43', 66264.5, 55115, '2018-01-26 07:27:43', 20320),
(15, 23, 'Gautham Pujari', 'National Geographic Channel', 'pujari@gmail.com', '4858865288', '<table class=\"table table-bordered\" id=\"showQuotation\" style=\"margin-top: 40px;\">\n	                    	<thead>\n	                    		<tr><th>Product Name</th>\n	                    		<th>Price</th> \n	                    		<th>Quantity</th>\n	                    		<th>Amount</th> \n	                    		<th>Action</th> \n	                    	</tr></thead>\n\n	                    	<tbody>\n	                    		 \n	                    	<tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">Front Lite Normal Flex</td><td contenteditable=\"false\" class=\"priceChangeField\">70</td><td contenteditable=\"false\" class=\"quantityChangeField\">2</td><td contenteditable=\"false\">140</td><td contenteditable=\"false\"><span class=\"label label-warning removeRow\" style=\"width:20px;cursor:pointer;\">cancel</span></td></tr><tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">Backlite</td><td contenteditable=\"false\" class=\"priceChangeField\">250</td><td contenteditable=\"false\" class=\"quantityChangeField\">2</td><td contenteditable=\"false\">500</td><td contenteditable=\"false\"><span class=\"label label-warning removeRow\" style=\"width:20px;cursor:pointer;\">cancel</span></td></tr><tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">Vinyl Backlite</td><td contenteditable=\"false\" class=\"priceChangeField\">280</td><td contenteditable=\"false\" class=\"quantityChangeField\">2</td><td contenteditable=\"false\">560</td><td contenteditable=\"false\"><span class=\"label label-warning removeRow\" style=\"width:20px;cursor:pointer;\">cancel</span></td></tr><tr id=\"lastTotalRow3333\"><td contenteditable=\"false\"></td><td contenteditable=\"false\"></td><td contenteditable=\"false\"></td><th>Total Amount</th><td contenteditable=\"false\"></td></tr></tbody>\n	                    <tbody>\n	                    		 \n	                    	<tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">Front Lite Normal Flex</td><td contenteditable=\"false\" class=\"priceChangeField\">70</td><td contenteditable=\"false\" class=\"quantityChangeField\">2</td><td contenteditable=\"false\">140</td><td contenteditable=\"false\"><span class=\"label label-warning removeRow\" style=\"width:20px;cursor:pointer;\">cancel</span></td></tr><tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">Backlite</td><td contenteditable=\"false\" class=\"priceChangeField\">250</td><td contenteditable=\"false\" class=\"quantityChangeField\">2</td><td contenteditable=\"false\">500</td><td contenteditable=\"false\"><span class=\"label label-warning removeRow\" style=\"width:20px;cursor:pointer;\">cancel</span></td></tr><tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">Vinyl Backlite</td><td contenteditable=\"false\" class=\"priceChangeField\">280</td><td contenteditable=\"false\" class=\"quantityChangeField\">2</td><td contenteditable=\"false\">560</td><td contenteditable=\"false\"><span class=\"label label-warning removeRow\" style=\"width:20px;cursor:pointer;\">cancel</span></td></tr><tr id=\"lastTotalRow\"><td contenteditable=\"false\">total</td><td contenteditable=\"false\"></td><td contenteditable=\"false\"></td><td contenteditable=\"false\">2400</td></tr></tbody></table>', '<table class=\"table table-bordered\" id=\"paymentRecievedBy\">\n                            <thead>\n                              <tr><th>Cash Recieved By</th>\n                              <th>Through</th> \n                              <th>Recieved</th>\n                            </tr></thead>\n\n                            <tbody>\n                                 \n                           <tr class=\"showAllTrans\"><td>Tanveer Baig</td><td>Account</td><td>500</td></tr><tr class=\"showAllTrans\"><td>Madan</td><td>Account</td><td>1000</td></tr><tr id=\"paymentLastTotalRow\"><td>Total Paid</td><td></td><td>1500</td></tr><tr id=\"balanceLastTotalRow\"><td>Balance Amount</td><td></td><td>900</td></tr></tbody>\n                       </table>', '2018-01-22 12:10:24', 900, 2400, '2018-01-22 12:10:24', 1500),
(18, 24, 'Hemanth Raj', 'Enigma Brand Solution', 'hemanth@ebsprints.com', '8722800555', '<table class=\"table table-bordered\" style=\"margin-top: 40px;\" id=\"showQuotation\">\n	                    	<thead>\n	                    		<tr><th>Product Name</th>\n	                    		<th>Price</th> \n	                    		<th>Quantity</th>\n	                    		<th>Amount</th> \n	                            <th>Discount</th>\n	                    		 \n	                    	</tr></thead>\n\n	                    	<tbody>\n	                    		 \n	                    	<tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">Vinyl Backlite</td><td contenteditable=\"false\" class=\"priceChangeField\">280</td><td contenteditable=\"false\" class=\"quantityChangeField\">1</td><td contenteditable=\"false\">280</td><td class=\"discountPriceColm\" data-discount=\"0\" contenteditable=\"false\">0</td></tr><tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">Backlite</td><td contenteditable=\"false\" class=\"priceChangeField\">250</td><td contenteditable=\"false\" class=\"quantityChangeField\">1</td><td contenteditable=\"false\">250</td><td class=\"discountPriceColm\" data-discount=\"0\" contenteditable=\"false\">0</td></tr><tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">Star Flex</td><td contenteditable=\"false\" class=\"priceChangeField\">25</td><td contenteditable=\"false\" class=\"quantityChangeField\">1</td><td contenteditable=\"false\">25</td><td class=\"discountPriceColm\" data-discount=\"0\" contenteditable=\"false\">0</td></tr><tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">Steel</td><td contenteditable=\"false\" class=\"priceChangeField\">18</td><td contenteditable=\"false\" class=\"quantityChangeField\">1</td><td contenteditable=\"false\">18</td><td class=\"discountPriceColm\" data-discount=\"0\" contenteditable=\"false\">0</td></tr><tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">Standy Scrolling 4 x 6.5</td><td contenteditable=\"false\" class=\"priceChangeField\">2088</td><td contenteditable=\"false\" class=\"quantityChangeField\">2</td><td contenteditable=\"false\">4176</td><td class=\"discountPriceColm\" data-discount=\"0\" contenteditable=\"false\">0</td></tr><tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">Star Flex With Standy 4 x 6.5</td><td contenteditable=\"false\" class=\"priceChangeField\">2218</td><td contenteditable=\"false\" class=\"quantityChangeField\">2</td><td contenteditable=\"false\">4436</td><td class=\"discountPriceColm\" data-discount=\"10\" contenteditable=\"false\">443.6</td></tr><tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">Frosted With Pco Solvent Print</td><td contenteditable=\"false\" class=\"priceChangeField\">75</td><td contenteditable=\"false\" class=\"quantityChangeField\">2</td><td contenteditable=\"false\">150</td><td class=\"discountPriceColm\" data-discount=\"10\" contenteditable=\"false\">15</td></tr><tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">Standy Scrolling 2.5 x 6.5</td><td contenteditable=\"false\" class=\"priceChangeField\">1304</td><td contenteditable=\"false\" class=\"quantityChangeField\">2</td><td contenteditable=\"false\">2608</td><td class=\"discountPriceColm\" data-discount=\"10\" contenteditable=\"false\">260.79999999999995</td></tr><tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">Star Flex With Standy 3 x 6.5</td><td contenteditable=\"false\" class=\"priceChangeField\">1450</td><td contenteditable=\"false\" class=\"quantityChangeField\">4</td><td contenteditable=\"false\">5800</td><td class=\"discountPriceColm\" data-discount=\"50\" contenteditable=\"false\">2900</td></tr><tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">One Way Vision 110 Solvent Vinyl</td><td contenteditable=\"false\" class=\"priceChangeField\">75</td><td contenteditable=\"false\" class=\"quantityChangeField\">5</td><td contenteditable=\"false\">375</td><td class=\"discountPriceColm\" data-discount=\"1\" contenteditable=\"false\">3.75</td></tr><tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">Standy Scrolling 2 x 5</td><td contenteditable=\"false\" class=\"priceChangeField\">1195</td><td contenteditable=\"false\" class=\"quantityChangeField\">2</td><td contenteditable=\"false\">2390</td><td class=\"discountPriceColm\" data-discount=\"10\" contenteditable=\"false\">239.00</td></tr><tr id=\"lastTotalRow3333\"><td contenteditable=\"false\"></td><td contenteditable=\"false\"></td><td contenteditable=\"false\"></td><th>Total Amount</th><th>Discount Amount</th></tr><tr id=\"gstShowingRow\"><td contenteditable=\"false\">gst</td><td contenteditable=\"false\"></td><td contenteditable=\"false\"></td><td contenteditable=\"false\">24199.44</td><td contenteditable=\"false\"></td></tr><tr id=\"lastTotalRow\"><td contenteditable=\"false\">total</td><td contenteditable=\"false\"></td><td contenteditable=\"false\"></td><td contenteditable=\"false\">20508</td></tr></tbody>\n	                    </table>', '<table class=\"table table-bordered\" id=\"paymentRecievedBy\">\n                            <thead>\n                              <tr><th>Cash Recieved By</th>\n                              <th>Through</th> \n                              <th>Recieved</th>\n                            </tr></thead>\n\n                            <tbody>\n                                 \n                           <tr class=\"showAllTrans\"><td>Hemanth Raj</td><td>Account</td><td>350</td></tr><tr class=\"showAllTrans\"><td>Hemanth Raj</td><td>Account</td><td>223</td></tr><tr class=\"showAllTrans\"><td>Tanveer Baig</td><td>Account</td><td>500</td></tr><tr class=\"showAllTrans\"><td>Tanveer Baig</td><td>Account</td><td>25</td></tr><tr class=\"showAllTrans\"><td>Madan</td><td>Account</td><td>5000</td></tr><tr class=\"showAllTrans\"><td>Tanveer Baig</td><td>Account</td><td>5000</td></tr><tr class=\"showAllTrans\"><td>Murthy</td><td>Account</td><td>5000</td></tr><tr class=\"showAllTrans\"><td>Madan</td><td>Account</td><td>5000</td></tr><tr class=\"showAllTrans\"><td>Madan</td><td>Account</td><td>1000</td></tr><tr class=\"showAllTrans\"><td>Tanveer Baig</td><td>Account</td><td>1000</td></tr><tr class=\"showAllTrans\"><td>Murthy</td><td>Account</td><td>100</td><td style=\"width:171px;\">January 27th 2018</td><td style=\"width:10px;\"></td></tr><tr class=\"showAllTrans\"><td>Murthy</td><td>Account</td><td>100</td><td style=\"width:171px;\">January 27th 2018</td><td style=\"width:10px;\"></td></tr><tr class=\"showAllTrans\"><td>Murthy</td><td>Account</td><td>100</td><td style=\"width:171px;\">January 27th 2018</td><td style=\"width:10px;\"></td></tr><tr class=\"showAllTrans\"><td>Murthy</td><td>Account</td><td>100</td><td style=\"width:171px;\">January 27th 2018</td><td style=\"width:10px;\"></td></tr><tr class=\"showAllTrans\"><td>Murthy</td><td>Account</td><td>100</td><td style=\"width:171px;\">January 27th 2018</td><td style=\"width:10px;\"><span class=\"label label-warning removeRow\" style=\"width:20px;cursor:pointer;\">cancel</span></td></tr><tr class=\"showAllTrans\"><td>Murthy</td><td>Account</td><td>100</td><td style=\"width:171px;\">January 27th 2018</td><td style=\"width:10px;\"><span class=\"label label-warning removeRow\" style=\"width:20px;cursor:pointer;\">cancel</span></td></tr><tr class=\"showAllTrans\"><td>Murthy</td><td>Account</td><td>100</td><td style=\"width:171px;\">January 27th 2018</td><td style=\"width:10px;\"><span class=\"label label-warning removeRow\" style=\"width:20px;cursor:pointer;\">cancel</span></td></tr><tr id=\"paymentLastTotalRow\"><td>Total Paid</td><td></td><td>23798</td></tr><tr id=\"balanceLastTotalRow\"><td>Balance Amount</td><td></td><td>401.44</td></tr></tbody>\n                       </table>', '2018-01-27 07:25:02', 401.44, 20508, '2018-01-27 07:25:02', 23798),
(19, 25, 'Engineering College', 'alpha college', 'engineering@gmail.com', '4858865288', '<table class=\"table table-bordered\" id=\"showQuotation\" style=\"margin-top: 40px;\" data-gst=\"18\">\n	                    	<thead>\n	                    		<tr><th>Product Name</th>\n	                    		<th>Product Description</th>  \n	                    		<th>Price</th> \n	                    		<th>Quantity</th>\n	                    		<th>Amount</th> \n	                    		 \n	                    	</tr></thead>\n\n	                    	<tbody>\n	                    		 \n	                    	<tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">Steel</td><td contenteditable=\"false\">this is one of the haloween product</td><td contenteditable=\"false\" class=\"priceChangeField\">18</td><td contenteditable=\"false\" class=\"quantityChangeField\">1</td><td contenteditable=\"false\">18</td></tr><tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">Steel</td><td contenteditable=\"false\">this is one of the haloween product</td><td contenteditable=\"false\" class=\"priceChangeField\">18</td><td contenteditable=\"false\" class=\"quantityChangeField\">1</td><td contenteditable=\"false\">18</td></tr><tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">Steel</td><td contenteditable=\"false\">this is one of the haloween product</td><td contenteditable=\"false\" class=\"priceChangeField\">18</td><td contenteditable=\"false\" class=\"quantityChangeField\">1</td><td contenteditable=\"false\">18</td></tr><tr id=\"lastTotalRow3333\"><td contenteditable=\"false\"></td><td contenteditable=\"false\"></td><td contenteditable=\"false\"></td><td contenteditable=\"false\"></td><th>Total Amount</th></tr><tr id=\"gstShowingRow\"><td contenteditable=\"false\">gst</td><td contenteditable=\"false\"></td><td contenteditable=\"false\"></td><td contenteditable=\"false\"></td><td contenteditable=\"false\">63.72</td></tr><tr id=\"lastTotalRow\"><td contenteditable=\"false\">total</td><td contenteditable=\"false\"></td><td contenteditable=\"false\"></td><td contenteditable=\"false\"></td><td contenteditable=\"false\">54</td></tr></tbody>\n	                    </table>', '<table class=\"table table-bordered\" id=\"paymentRecievedBy\">\n                            <thead>\n                              <tr><th>Cash Recieved By</th>\n                              <th>Through</th> \n                              <th>Recieved</th>\n                              <th>Date</th>\n                              <th>Action</th>\n                            </tr></thead>\n\n                            <tbody>\n                                 \n                           <tr class=\"showAllTrans\"><td>Tanveer Baig</td><td>Account</td><td>20</td><td style=\"width:171px;\">January 10th 2018</td><td style=\"width:10px;\"><span class=\"label label-warning removeRow\" style=\"width:20px;cursor:pointer;\">cancel</span></td></tr><tr class=\"showAllTrans\"><td>Tanveer Baig</td><td>Account</td><td>20</td><td style=\"width:171px;\">January 10th 2018</td><td style=\"width:10px;\"><span class=\"label label-warning removeRow\" style=\"width:20px;cursor:pointer;\">cancel</span></td></tr><tr class=\"showAllTrans\"><td>Tanveer Baig</td><td>Account</td><td>20</td><td style=\"width:171px;\">January 10th 2018</td><td style=\"width:10px;\"><span class=\"label label-warning removeRow\" style=\"width:20px;cursor:pointer;\">cancel</span></td></tr><tr id=\"commonDisplayRow\"><td></td><td></td><th style=\"background-color: #f5f5fa;\">Amount Detail</th><td></td><td></td></tr><tr id=\"paymentLastTotalRow\"><td>Total Paid</td><td></td><td>60</td><td></td><td></td></tr><tr id=\"balanceLastTotalRow\"><td>Balance Amount</td><td></td><td>3.72</td><td></td><td></td></tr></tbody>\n                       </table>', '2018-01-27 10:35:26', 3.72, 54, '2018-01-27 10:35:26', 60),
(20, 38, 'Sneha', 'Skyline', 'hemanth@ebsprints.com', '09845827685', '<table class=\"table table-bordered\" style=\"margin-top: 40px;\" id=\"showQuotation\" data-gst=\"18\">\n	                    	<thead>\n	                    		<tr><th>Product Name</th>\n	                    		<th>Product  Description</th> \n	                    		<th>Price</th>\n	                    		<th>Quantity</th> \n	                        <th>Amount</th>\n	                    		<th id=\"actionColumn\">Discount</th> \n                            \n	                    	</tr></thead>\n\n	                    	<tbody>\n	                    		 \n	                    	<tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">Steel</td><td contenteditable=\"false\">this is one of the haloween product</td><td contenteditable=\"false\" class=\"priceChangeField\">18</td><td contenteditable=\"false\" class=\"quantityChangeField\">1</td><td contenteditable=\"false\">18</td><td class=\"discountPriceColm\" data-discount=\"0\" contenteditable=\"false\">0</td></tr><tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">Steel</td><td contenteditable=\"false\">this is one of the haloween product</td><td contenteditable=\"false\" class=\"priceChangeField\">18</td><td contenteditable=\"false\" class=\"quantityChangeField\">1</td><td contenteditable=\"false\">18</td><td class=\"discountPriceColm\" data-discount=\"0\" contenteditable=\"false\">0</td></tr><tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">Steel</td><td contenteditable=\"false\">this is one of the haloween product</td><td contenteditable=\"false\" class=\"priceChangeField\">18</td><td contenteditable=\"false\" class=\"quantityChangeField\">1</td><td contenteditable=\"false\">18</td><td class=\"discountPriceColm\" data-discount=\"0\" contenteditable=\"false\">0</td></tr><tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">Backlite</td><td contenteditable=\"false\"></td><td contenteditable=\"false\" class=\"priceChangeField\">250</td><td contenteditable=\"false\" class=\"quantityChangeField\">1</td><td contenteditable=\"false\">250</td><td class=\"discountPriceColm\" data-discount=\"0\" contenteditable=\"false\">0</td></tr><tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">Backlite</td><td contenteditable=\"false\"></td><td contenteditable=\"false\" class=\"priceChangeField\">250</td><td contenteditable=\"false\" class=\"quantityChangeField\">1</td><td contenteditable=\"false\">250</td><td class=\"discountPriceColm\" data-discount=\"0\" contenteditable=\"false\">0</td></tr><tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">Standy Scrolling 2.5 x 6.5</td><td contenteditable=\"false\"></td><td contenteditable=\"false\" class=\"priceChangeField\">1304</td><td contenteditable=\"false\" class=\"quantityChangeField\">1</td><td contenteditable=\"false\">1304</td><td class=\"discountPriceColm\" data-discount=\"0\" contenteditable=\"false\">0</td></tr><tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">Standy Scrolling 4 x 6.5</td><td contenteditable=\"false\"></td><td contenteditable=\"false\" class=\"priceChangeField\">2088</td><td contenteditable=\"false\" class=\"quantityChangeField\">1</td><td contenteditable=\"false\">2088</td><td class=\"discountPriceColm\" data-discount=\"0\" contenteditable=\"false\">0</td></tr><tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">Steel</td><td contenteditable=\"false\">this is one of the haloween product</td><td contenteditable=\"false\" class=\"priceChangeField\">18</td><td contenteditable=\"false\" class=\"quantityChangeField\">2</td><td contenteditable=\"false\">36</td><td class=\"discountPriceColm\" data-discount=\"10\" contenteditable=\"false\">3.60</td></tr><tr class=\"allTheQuotationRow\"><td contenteditable=\"false\">Steel</td><td contenteditable=\"false\">this is one of the haloween product</td><td contenteditable=\"false\" class=\"priceChangeField\">18</td><td contenteditable=\"false\" class=\"quantityChangeField\">2</td><td contenteditable=\"false\">36</td><td class=\"discountPriceColm\" data-discount=\"10\" contenteditable=\"false\">3.60</td></tr><tr id=\"lastTotalRow3333\"><td contenteditable=\"false\"></td><td contenteditable=\"false\"></td><td contenteditable=\"false\"></td><td contenteditable=\"false\"></td><th>Total Amount</th><th>Discount Amount</th></tr><tr id=\"gstShowingRow\"><td contenteditable=\"false\">gst</td><td contenteditable=\"false\"></td><td contenteditable=\"false\"></td><td contenteditable=\"false\"></td><td contenteditable=\"false\">4741.24</td><td contenteditable=\"false\"></td></tr><tr id=\"lastTotalRow\"><td contenteditable=\"false\">total</td><td contenteditable=\"false\"></td><td contenteditable=\"false\"></td><td contenteditable=\"false\"></td><td contenteditable=\"false\">4018</td></tr></tbody>\n	                    </table>', '<table class=\"table table-bordered\" id=\"paymentRecievedBy\">\n                            <thead>\n                              <tr><th>Cash Recieved By</th>\n                              <th>Through</th> \n                              <th>Recieved</th>\n                              <th>Date</th>\n                              <th>Action</th>\n                            </tr></thead>\n\n                            <tbody>\n                                 \n                           <tr class=\"showAllTrans\"><td>Hemanth Raj</td><td>Account</td><td>1000</td><td style=\"width:171px;\">January 20th 2018</td><td style=\"width:10px;\"><span class=\"label label-warning removeRow\" style=\"width:20px;cursor:pointer;\">cancel</span></td></tr><tr class=\"showAllTrans\"><td>Hemanth Raj</td><td>Account</td><td>1118</td><td style=\"width:171px;\">January 30th 2018</td><td style=\"width:10px;\"><span class=\"label label-warning removeRow\" style=\"width:20px;cursor:pointer;\">cancel</span></td></tr><tr class=\"showAllTrans\"><td>Tanveer Baig</td><td>Account</td><td>500</td><td style=\"width:171px;\">January 30th 2018</td><td style=\"width:10px;\"><span class=\"label label-warning removeRow\" style=\"width:20px;cursor:pointer;\">cancel</span></td></tr><tr class=\"showAllTrans\"><td>Tanveer Baig</td><td>Account</td><td>1618</td><td style=\"width:171px;\">January 30th 2018</td><td style=\"width:10px;\"><span class=\"label label-warning removeRow\" style=\"width:20px;cursor:pointer;\">cancel</span></td></tr><tr class=\"showAllTrans\"><td>Tanveer Baig</td><td>Account</td><td>505.24</td><td style=\"width:171px;\">January 30th 2018</td><td style=\"width:10px;\"><span class=\"label label-warning removeRow\" style=\"width:20px;cursor:pointer;\">cancel</span></td></tr><tr id=\"commonDisplayRow\"><td></td><td></td><th style=\"background-color: #f5f5fa;\">Amount Detail</th><td></td><td></td></tr><tr id=\"paymentLastTotalRow\"><td>Total Paid</td><td></td><td>4741.24</td><td></td><td></td></tr><tr id=\"balanceLastTotalRow\"><td>Balance Amount</td><td></td><td>0.00</td><td></td><td></td></tr></tbody>\n                       </table>', '2018-01-30 07:20:40', 0, 4018, '2018-01-30 07:20:40', 4741.24);

-- --------------------------------------------------------

--
-- Table structure for table `delivery_note`
--

CREATE TABLE `delivery_note` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `invoice_number` int(11) DEFAULT NULL,
  `company_name` varchar(250) DEFAULT NULL,
  `invoice_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `buyer` text,
  `delivery_note` text,
  `transaction` varchar(90) DEFAULT NULL,
  `delivery_note_date` text,
  `dispatched_through` varchar(200) DEFAULT NULL,
  `destination` text,
  `hidden_not_selected_companyname` text,
  `vendor_address` text NOT NULL,
  `vendor_email` varchar(250) NOT NULL,
  `vendor_gistin` varchar(250) NOT NULL,
  `hidden_not_selected_dispatchedthrough` text,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `delivery_note`
--

INSERT INTO `delivery_note` (`id`, `customer_id`, `invoice_number`, `company_name`, `invoice_date`, `buyer`, `delivery_note`, `transaction`, `delivery_note_date`, `dispatched_through`, `destination`, `hidden_not_selected_companyname`, `vendor_address`, `vendor_email`, `vendor_gistin`, `hidden_not_selected_dispatchedthrough`, `status`, `created_at`, `updated_at`) VALUES
(4, 38, 3915, 'DST RRNR', '2018-07-07 06:35:05', '<p>Buyer</p>\r\n\r\n<h2>SKYLINE</h2>\r\n\r\n<p>Cubbon pet ,bangalore - 56002 Bangalore Karnataka - 560097,India</p>', 'india', 'Account', '2018/01/09 15:11', 'Ape Goods', NULL, 'bhrfreher', 'no #141', 'dstrrrnr@gmail.com', '29ABU', 'Two Wheeler,Lory', NULL, '2018-01-30 09:41:07', '2018-01-30 09:41:07');

-- --------------------------------------------------------

--
-- Table structure for table `final_invoice`
--

CREATE TABLE `final_invoice` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `invoice_number` int(11) DEFAULT NULL,
  `company_name` varchar(250) DEFAULT NULL,
  `invoice_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `buyer` text,
  `delivery_note` text,
  `transaction` varchar(90) DEFAULT NULL,
  `delivery_note_date` text,
  `dispatched_through` varchar(200) DEFAULT NULL,
  `destination` text,
  `hidden_not_selected_companyname` text,
  `vendor_address` text NOT NULL,
  `vendor_email` varchar(250) NOT NULL,
  `vendor_gistin` varchar(250) NOT NULL,
  `hidden_not_selected_dispatchedthrough` text,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `final_invoice`
--

INSERT INTO `final_invoice` (`id`, `customer_id`, `invoice_number`, `company_name`, `invoice_date`, `buyer`, `delivery_note`, `transaction`, `delivery_note_date`, `dispatched_through`, `destination`, `hidden_not_selected_companyname`, `vendor_address`, `vendor_email`, `vendor_gistin`, `hidden_not_selected_dispatchedthrough`, `status`, `created_at`, `updated_at`) VALUES
(4, 38, 3915, 'EBS LPA', '2018-07-07 06:36:03', '<p>Buyer</p>\r\n\r\n<h2>SKYLINE</h2>\r\n\r\n<p>Cubbon pet ,bangalore - 56002 Bangalore Karnataka - 560097,India</p>', 'xbasdssds', 'Account', '2018/01/23 18:13', 'Ape Goods', NULL, 'dsfdsgvhjds', '', '', '', 'Two Wheeler,Lory', NULL, '2018-01-30 12:43:28', '2018-01-30 12:43:28');

-- --------------------------------------------------------

--
-- Table structure for table `internal_refrer`
--

CREATE TABLE `internal_refrer` (
  `id` int(11) NOT NULL,
  `name` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `marketing_team`
--

CREATE TABLE `marketing_team` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marketing_team`
--

INSERT INTO `marketing_team` (`id`, `name`) VALUES
(1, 'Mbappe'),
(2, 'pogba');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(5, '2014_10_12_000000_create_users_table', 1),
(6, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `new_customer`
--

CREATE TABLE `new_customer` (
  `id` int(11) NOT NULL,
  `company_name` varchar(200) DEFAULT NULL,
  `contact_name` varchar(200) DEFAULT NULL,
  `priority` varchar(40) DEFAULT NULL,
  `email` varchar(90) DEFAULT NULL,
  `refrer_name` varchar(200) DEFAULT NULL,
  `phone` varchar(90) DEFAULT NULL,
  `product_name` varchar(200) NOT NULL,
  `product_description` varchar(200) NOT NULL,
  `ext` varchar(90) DEFAULT NULL,
  `phone_group` varchar(50) DEFAULT NULL,
  `addresstype` varchar(90) DEFAULT NULL,
  `attention_to` varchar(200) DEFAULT NULL,
  `lead` varchar(60) DEFAULT NULL,
  `street` text,
  `another_street` text,
  `city` varchar(200) DEFAULT NULL,
  `state` varchar(200) DEFAULT NULL,
  `zip` varchar(90) DEFAULT NULL,
  `country` varchar(110) DEFAULT NULL,
  `combined_address` text,
  `secondary_contact` text,
  `job_started` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `hold_from` timestamp NULL DEFAULT NULL,
  `hold_to` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `new_customer`
--

INSERT INTO `new_customer` (`id`, `company_name`, `contact_name`, `priority`, `email`, `refrer_name`, `phone`, `product_name`, `product_description`, `ext`, `phone_group`, `addresstype`, `attention_to`, `lead`, `street`, `another_street`, `city`, `state`, `zip`, `country`, `combined_address`, `secondary_contact`, `job_started`, `created_at`, `updated_at`, `hold_from`, `hold_to`) VALUES
(9, 'ggssss', 'dsndfbbd', 'holdFor', 'email@gmail.com', '', '9632427261', 'halwa puri', 'ejaz 5', 'nbdf', 'Work', 'shipping', 'esfjned', 'ejaz', 'dsjfdj', 'fjgfjj', 'GJHHGJ', 'HHGJ', 'vjjgjg', 'VCNNG', '', '', 0, '2018-01-25 16:53:02', '2018-01-25 16:53:02', '2018-01-26 16:52:00', '2018-01-29 16:52:00'),
(10, 'haroon', 'ewee', 'holdFor', 'email@gmail.com', '', 'fdnbdfbd,fdnbdfbd,fdnbdfbd', 'pani', 'ejaz 6', 'nbdf', 'Toll Free Number', 'install', 'VCVCVVC', '', 'hggg', 'dfjgj', 'jhjhhh', 'hjhhj', 'hjjhhj', 'kjjkjk', '', '', 0, '2018-01-25 16:53:48', '2018-01-25 16:53:48', '2018-01-30 16:53:00', '2018-01-30 16:53:00'),
(11, 'saddam bhai', 'dcndxnds', 'readyForQuotation', 'email@gmail.com', '', '84398349934,4334878738', 'ruby', 'alpha product', '65858', 'Toll Free Number', 'shipping', 'nnfdnn', '', 'nvdfdsnnsa', 'nnsd', 'nmnm', 'ndnmgbnmnm', 'nncbnmfbm', 'nfdnbdfnndfn', 'low', '{\"secondary_contact\":[{\"phone\":\"84398349934,4334878738\",\"email\":\"dfddsj@gmail.com\",\"customer_name\":\"dcndxnds\"},{\"phone\":\"988777\",\"email\":\"email@gmail.com\",\"customer_name\":\"ffghjnmk\"},{\"phone\":\"777999999\",\"email\":\"email@gmail.com\",\"customer_name\":\"vbnm,\"},{\"phone\":\"67897678\",\"email\":\"ngfgfgfgfn@gmail.com\",\"customer_name\":\"v vbnm\"}]}', 0, '2018-01-13 13:24:46', '2018-01-13 13:24:46', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'Raj Laxmi Clinic', 'Raj Laxmi', 'holdFor', 'email@gmail.com', 'anwar', '9738889288', 'signages', '60X30 Led Board,', '', 'Home', 'primar', '', 'Marketing', '', '', '', '', '', '', NULL, NULL, 0, '2018-01-25 16:54:50', '2018-01-25 16:54:50', '2018-02-06 16:54:00', '2018-02-14 16:54:00'),
(13, 'Egg Dot', 'Vasundra', 'holdFor', 'email@gmail.com', 'anwar', '4858865288', 'invitations', '', '+91', 'Mobile', 'billing', 'Hemanth', 'Marketing', 'Narasipura', '', 'Bangalore', 'Karnataka', '560097', 'India', NULL, NULL, 0, '2018-01-15 13:42:08', '2018-01-15 13:42:08', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 'priyanka', 'Ejaz Anwar', 'readyForQuotation', 'email@gmail.com', 'Ebspritns', '4858865288', 'printed-apparels', 'they want flex board 3 ', '+91', 'Home', 'other', '', NULL, '', '', '', '', '', '', NULL, NULL, 0, '2018-01-11 09:54:00', '2018-01-11 09:54:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 'Tech University', 'Ejaz Anwar345', 'holdFor', 'email@gmail.com', 'Ebspritns', '4858865288', 'printed-apparels', 'This fellow wants printed aparels', '+91', 'Home', 'shipping', 'dvfhfghh', 'Marketing', 'street name', 'another street 1', 'city', 'state 1', 's2', 'country 1', NULL, NULL, 0, '2018-01-25 16:55:29', '2018-01-25 16:55:29', '2018-01-28 16:55:00', '2018-01-31 16:55:00'),
(17, 'goothire', 'Huli Mavu', 'holdFor', 'email@gmail.com', 'anwar', '4858865288', 'printed-apparels', '2x logic paint', '+91', 'Home', 'other', 's2', 'Marketing', 'street name', 'another street 1', 'city', 'state 1', '560097', 'country 1', NULL, NULL, 0, '2018-01-15 13:51:04', '2018-01-15 13:51:04', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 'Hell fire', 'Ejaz Anwar', 'readyForQuotation', 'email@gmail.com', 'anwar', '4858865288', 'install', 'n dfbfdbdf', '+91', 'Home', 'shipping', 'bsdbdbdb', 'Marketing', 'bdbfgbb', 'bbfbfb', 'Bangalore', 'state 1', '560097', 'India', NULL, NULL, 0, '2018-01-15 12:31:15', '2018-01-15 12:31:15', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 'Banking Job', 'Ejaz Anwar  9999', 'readyForQuotation', 'email@gmail.com', 'anwar', '4858865288', 'invitations', 'hdfhdfhdfh', '+91', 'Home', 'shipping', 'sddssd', 'Marketing', 'street name', 'another street 1', 'city', 'state 1', '560097', 'country 1', NULL, NULL, 0, '2018-01-15 12:30:50', '2018-01-15 12:30:50', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 'Vincent', 'Vincent', 'readyForQuotation', 'email@gmail.com', 'ebsprints', '4858865288', 'signages', 'back light with 4x4 led', '+91', 'Home', 'other', '', 'Marketing', '', '', '', '', '', '', NULL, NULL, 0, '2018-01-12 09:38:05', '2018-01-12 09:38:05', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 'EBS LPA', 'Tanveer Baig', 'readyForQuotation', 'email@gmail.com', NULL, '4858865288', 'Lco Solvent Vinyl With Lamination', 'sssssss', '+91', 'Home', 'other', '', 'Marketing', '', '', '', '', '', '', NULL, NULL, 0, '2018-01-17 09:25:16', '2018-01-17 09:25:16', '2018-01-17 09:24:00', '2018-01-19 09:24:00'),
(22, 'Beta Institute Of Technology', 'Pankaj Das', 'readyForQuotation', 'email@gmail.com', 'anwar', '4858865288', '3D Board Imbossed Letter With RGB', '2 Front Lite Normal Flex, 5 2d dsshsdhdsh', '+91', 'Home', 'other', '', 'Marketing', '', '', '', '', '', '', NULL, NULL, 0, '2018-01-22 09:45:06', '2018-01-22 09:45:06', NULL, NULL),
(23, 'National Geographic Channel', 'Gautham Pujari', 'readyForQuotation', 'email@gmail.com', 'anwar', '4858865288', 'Front Lite Normal Flex,Backlite,Vinyl Backlite', 'they  want each of them 2 pices', '+91', 'Home', 'other', '', 'Marketing', '', '', '', '', '', '', NULL, NULL, 0, '2018-01-22 09:56:27', '2018-01-22 09:56:27', NULL, NULL),
(24, 'EBS LPA', 'Hemanth Raj', 'holdFor', 'email@gmail.com', 'ebsprints', '8722800555', 'Backlite,Vinyl Backlite,2D Board With Tube Lites 5 \"Inch\" Box', 'he needs 4x8 backlight', '', 'Home', 'other', '', NULL, 'Cubbon pet ,bangalore - 56002', '', '', '', '', '', NULL, NULL, 0, '2018-01-25 17:59:42', '2018-01-25 17:59:42', NULL, NULL),
(25, 'alpha college', 'Engineering College', 'readyForQuotation', 'email@gmail.com', 'anwar', '4858865288', 'Front Lite Normal Flex,Front Lite Star Flex,Backlite,Vinyl Backlite,Solvent Vinyl With Lamination,3D Board Imbossed Letter With RGB', 'they want 2 each products', '+91', 'Home', 'billing', '', 'Marketing', '', '', '', '', '', '', NULL, NULL, 0, '2018-01-27 08:59:17', '2018-01-27 08:59:17', NULL, NULL),
(38, 'Skyline', 'Sneha edit edit', 'readyForQuotation', 'email@gmail.com', 'Hemanth Raj', '09845827685', 'Backlite', '15x20 backlite they want', '', 'Home', 'other', '', 'Marketing', 'Cubbon pet ,bangalore - 56002', '', 'Bangalore', 'Karnataka', '560097', 'India', NULL, NULL, 0, '2018-01-29 09:11:15', '2018-07-07 06:47:28', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `new_job`
--

CREATE TABLE `new_job` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `reviewer` varchar(200) DEFAULT NULL,
  `contact_name` varchar(90) DEFAULT NULL,
  `description` text,
  `order_number` varchar(200) DEFAULT NULL,
  `po_number` varchar(200) DEFAULT NULL,
  `quantity` text,
  `due_date` varchar(30) DEFAULT NULL,
  `billing_address` text,
  `shipping_address` text,
  `installing_address` text,
  `design` text,
  `production` text,
  `shipping` text,
  `install` text,
  `production_manager` varchar(90) DEFAULT NULL,
  `project_manager` varchar(90) DEFAULT NULL,
  `sales_representative` varchar(90) DEFAULT NULL,
  `shipping_method` varchar(200) DEFAULT NULL,
  `priority` varchar(20) DEFAULT 'low',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `shipping_date` varchar(90) DEFAULT NULL,
  `job_completed` int(11) NOT NULL DEFAULT '0',
  `project_name` varchar(200) DEFAULT NULL,
  `seen` int(11) NOT NULL DEFAULT '0',
  `invoice_sent` varchar(40) DEFAULT NULL,
  `title_for_invoice_sent` varchar(60) DEFAULT NULL,
  `invoice_sent_time` timestamp NULL DEFAULT NULL,
  `all_sent_invoice` int(11) NOT NULL DEFAULT '0',
  `status` varchar(60) NOT NULL DEFAULT 'pending',
  `start_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `customer_products` text NOT NULL,
  `company_name` varchar(250) NOT NULL,
  `sent_status_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `new_job`
--

INSERT INTO `new_job` (`id`, `customer_id`, `supplier_id`, `reviewer`, `contact_name`, `description`, `order_number`, `po_number`, `quantity`, `due_date`, `billing_address`, `shipping_address`, `installing_address`, `design`, `production`, `shipping`, `install`, `production_manager`, `project_manager`, `sales_representative`, `shipping_method`, `priority`, `created_at`, `updated_at`, `shipping_date`, `job_completed`, `project_name`, `seen`, `invoice_sent`, `title_for_invoice_sent`, `invoice_sent_time`, `all_sent_invoice`, `status`, `start_date`, `customer_products`, `company_name`, `sent_status_date`) VALUES
(20, 10, 1, NULL, 'eweeedm', 'fdvjhdhd', '1958', '445', '3', '2018/01/27 17:03', 'fnhbbhf', 'shipping address by me', 'installing address', 'design', 'production', 'shipping', 'install', 'production manager 233', 'project manager', 'kfgkk', 'shipping method', 'holdFor', '2018-01-22 13:53:51', '2018-01-22 13:53:51', '2018/01/17 17:02', 0, 'project', 1, 'classForInvoiceSent', 'Invoice is Already Been Sent', '2018-01-05 09:12:39', 1, 'completed', '2018-01-10 11:32:00', 'cigratte_flake,wrestling_board,flex_board_naga_dhaga', 'haroon', NULL),
(21, 9, 2, NULL, 'dsndfbbd ejaz', NULL, '2061', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'low', '2018-01-16 11:29:34', '2018-01-16 09:16:59', NULL, 0, NULL, 1, 'classForInvoiceSent', 'Invoice is Already Been Sent', '2018-01-05 09:18:15', 1, 'pending', '2018-01-03 11:35:50', 'flex_board_naga_dhaga,sign_board,wrestling_board', 'ggssss', NULL),
(22, 12, 7, NULL, 'Raj Laxmi', '45x56 led board', '2164', '45231', NULL, '2018/01/15 16:23', '#141 narasipura bangalore - 560097', 'shipping address bangalore', NULL, '45x56 led board, 18x90 flex, 500 brouchers', 'back and front board 2 side', 'Call before installing', 'he needs to get installed on 17th - Jan-2018', 'Saif', 'Hemanth', NULL, 'mini truck', 'holdFor', '2018-01-19 05:52:54', '2018-01-19 05:52:54', '2018/01/16 16:23', 0, 'Dental Clinic', 1, NULL, NULL, NULL, 0, 'pending', '2018-01-08 10:48:00', 'sign board,ghee', 'Raj Laxmi Clinic', '2018-01-16 11:58:00'),
(23, 23, 27, NULL, 'Gautham Pujari', 'they  want each of them 2 3 pices', '2267', '55598', 'Front_Lite_Normal_Flex => 2 Backlite => 2 Vinyl_Backlite => 2', '2018/01/24 16:41', '#141 narasipura billing', '#no 2 goa  shippin', '#45 mangalore , installing', 'they  want each of them 2 pices', 'Wola d production', 'uber shipping', 'highway install', 'Saif', 'Murthy Kumar', 'Ejaz Anwar', 'Auto', 'low', '2018-01-25 16:42:37', '2018-01-25 16:42:37', '2018/01/25 16:41', 0, 'NGC', 1, NULL, NULL, NULL, 0, 'pending', '2018-01-23 11:11:00', 'Front Lite Normal Flex,Backlite,Vinyl Backlite', 'National Geographic Channel', '2018-01-22 17:31:44'),
(24, 24, 27, '', 'Hemanth Raj', 'he needs 4x8 backlight', '2370', '654645', 'Vinyl_Backlite => 1 Backlite => 1 Star_Flex => 1 Steel => 1', '2018/01/26 12:39', 'Cubbon pet ,bangalore - 56002 ,  ,', 'Cubbon pet ,bangalore - 56002 ,  ,', 'Cubbon pet ,bangalore - 56002 ,  ,', 'he needs 4x8 backlight', NULL, NULL, NULL, 'Shaif', 'Hemanth Raj', NULL, 'lorry', 'low', '2018-01-27 16:59:20', '2018-01-27 16:59:20', '2018/01/25 12:39', 0, NULL, 1, NULL, NULL, NULL, 0, 'pending', '2018-01-24 07:09:00', 'Vinyl Backlite,Backlite,Star Flex', 'Enigma Brand Solution', NULL),
(25, 25, 25, NULL, 'Engineering College', 'they want 2 each products', '2473', '89076', 'Steel => 1 Steel => 1 Steel => 1 gst => null', '2018/01/28 16:56', '#141 narasipura billing', 'shipping address', 'installing address', 'they want 2 each products', NULL, NULL, NULL, 'Saif', 'Hemanth Raj', NULL, NULL, 'low', '2018-01-27 17:01:43', '2018-01-27 17:01:43', '2018/01/28 16:56', 0, 'college project', 1, NULL, NULL, NULL, 0, 'pending', '2018-01-27 11:26:00', 'Steel,', 'alpha college', NULL),
(26, 38, 27, NULL, 'Sneha', '15x20 backlite they want', '2576', '45231', 'Steel => 1 Steel => 1 Steel => 1 Steel => 2 Steel => 2 Backlite => 1 Backlite => 1 Standy_Scrolling_2.5_x_6.5 => 1 Standy_Scrolling_4_x_6.5 => 1 gst => null', '2018/01/05 11:23', 'Cubbon pet ,bangalore - 56002 , Bangalore , Karnataka', 'Cubbon pet ,bangalore - 56002 , Bangalore , Karnataka', 'Cubbon pet ,bangalore - 56002 , Bangalore , Karnataka', '15x20 backlite they want', 'production field', 'shipping field', 'install field', 'Saif', 'Hemanth Raj', 'hemanth raj', 'by lorry', 'low', '2018-01-30 05:54:57', '2018-01-30 12:43:47', '2018/02/03 11:22', 0, 'skyline project', 0, NULL, NULL, NULL, 0, 'completed', '2018-01-29 05:52:00', 'Steel,Backlite,Standy Scrolling 2.5 x 6.5,Standy Scrolling 4 x 6.5,total', 'Skyline', '2018-01-30 07:28:47');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `performa_invoice`
--

CREATE TABLE `performa_invoice` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `invoice_number` int(11) DEFAULT NULL,
  `company_name` varchar(250) DEFAULT NULL,
  `invoice_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `buyer` text,
  `delivery_note` text,
  `transaction` varchar(90) DEFAULT NULL,
  `delivery_note_date` text,
  `dispatched_through` varchar(200) DEFAULT NULL,
  `destination` text,
  `hidden_not_selected_companyname` text,
  `vendor_address` text NOT NULL,
  `vendor_email` varchar(250) NOT NULL,
  `vendor_gistin` varchar(250) NOT NULL,
  `hidden_not_selected_dispatchedthrough` text,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `performa_invoice`
--

INSERT INTO `performa_invoice` (`id`, `customer_id`, `invoice_number`, `company_name`, `invoice_date`, `buyer`, `delivery_note`, `transaction`, `delivery_note_date`, `dispatched_through`, `destination`, `hidden_not_selected_companyname`, `vendor_address`, `vendor_email`, `vendor_gistin`, `hidden_not_selected_dispatchedthrough`, `status`, `created_at`, `updated_at`) VALUES
(18, 12, 2164, NULL, '2018-07-07 06:30:47', '<p>Buyer</p>\r\n\r\n<h2>NATIONAL GEOGRAPHIC CHANNEL</h2>\r\n\r\n<p>#141 halwapur rajasthan</p>', NULL, 'Cash', '2018/01/22 10:50', 'Ape Goods', 'halwapur gaon', 'EBS LPA', 'ttr gb colony bangalore', 'rrt@gmail.com', '33BNR', 'Two Wheeler,Lory', 'follow', '2018-01-21 05:20:35', '2018-01-25 16:15:38'),
(19, 21, 2164, 'EBS LPA', '2018-07-07 06:30:47', '<p>Buyer</p>\r\n\r\n<h2>NATIONAL GEOGRAPHIC CHANNEL</h2>\r\n\r\n<p>#141 halwapur rajasthan</p>', 'will be delivered very nicely by ejaz', NULL, '2018/01/23 11:52', 'Ape Goods', 'rampura leelavathi', 'RRR MNR', '#141 nnr colony Bangalore', 'dds@gmail.com', '29ABUPU', 'Two Wheeler,Lory', 'sent', '2018-01-21 06:22:21', '2018-01-27 05:21:56'),
(20, 23, 2370, 'EBS LPA', '2018-07-07 06:28:47', '<p>Buyer</p>\r\n\r\n<h2>NATIONAL GEOGRAPHIC CHANNEL</h2>\r\n\r\n<p>#141 halwapur rajasthan</p>', 'will be delivered very nicely by ejaz', 'Account', '2018/01/24 16:50', 'Ape Goods', '<p># destination is in bangalore yelhanka3553234</p>', 'RRR MNR', '#141 nnr colony Bangalore', 'dds@gmail.com', 'gfreweftgyh', 'Two Wheeler,Lory', NULL, '2018-01-22 11:21:55', '2018-01-23 10:43:46'),
(22, 24, 2473, 'EBS LPA', '2018-07-07 06:30:47', '<p>Buyer</p>\r\n\r\n<h2>NATIONAL GEOGRAPHIC CHANNEL</h2>\r\n\r\n<p>#141 halwapur rajasthan</p>', 'will be delivered very nicely by ejaz sala', 'Account', '2018/01/12 16:48', 'Ape Goods', '<p>dshbsddssd</p>', 'RRR MNR', '#141 nnr colony Bangalore', 'dds@gmail.com', 'gfxsdfgh', 'Two Wheeler,Ape Goods', 'sent', '2018-01-22 13:45:26', '2018-01-26 07:24:24'),
(26, 25, 2576, 'EBS LPA', '2018-07-07 06:30:47', '<p>Buyer</p>\r\n\r\n<h2>NATIONAL GEOGRAPHIC CHANNEL</h2>\r\n\r\n<p>#141 halwapur rajasthan</p>', 'will be delivered very nicely by ejaz', 'Account', '2018/01/27 16:34', 'Lory', '<p>n sdbsdbdbfdbbdfb</p>', 'RRR MNR', '#141 nnr colony Bangalore', 'dds@gmail.com', '29ABUPU233', 'Two Wheeler,Ape Goods', 'sent', '2018-01-27 11:04:12', '2018-01-29 16:57:27'),
(32, 38, 3915, 'DSRT MN', '2018-07-07 06:30:47', '<p>Buyer</p>\r\n\r\n<h2>NATIONAL GEOGRAPHIC CHANNEL</h2>\r\n\r\n<p>#141 halwapur rajasthan</p>', 'will be ghhfff', NULL, '2018/01/29 14:51', 'Two Wheeler', NULL, 'RRR MNR', 'ttr gb colony bangalore', 'dds@gmail.com', '29ABUPU23', 'Ape Goods,Lory', 'sent', '2018-01-30 09:21:44', '2018-01-30 12:36:38');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(250) NOT NULL,
  `price` int(40) NOT NULL,
  `project_description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `price`, `project_description`, `created_at`, `updated_at`) VALUES
(9, 'Normal Flex', 20, 'this is normal flex', '2018-01-18 01:24:06', '2018-01-18 01:24:06'),
(10, 'Star Flex', 25, 'this is star flex', '2018-01-18 01:39:06', '2018-01-18 01:39:06'),
(11, 'Front Lite Normal Flex', 70, '', '2018-01-12 14:17:30', '0000-00-00 00:00:00'),
(12, 'Front Lite Star Flex', 90, '', '2018-01-12 14:17:30', '0000-00-00 00:00:00'),
(13, 'Backlite', 250, '', '2018-01-12 14:17:30', '0000-00-00 00:00:00'),
(14, 'Vinyl Backlite', 280, '', '2018-01-12 14:17:30', '0000-00-00 00:00:00'),
(15, 'Solvent Vinyl Without Lamination', 40, '', '2018-01-12 14:17:30', '0000-00-00 00:00:00'),
(16, 'Lco Solvent Vinyl With Lamination', 50, '', '2018-01-12 14:17:30', '0000-00-00 00:00:00'),
(17, 'Solvent Vinyl With Lamination', 60, '', '2018-01-12 14:17:30', '0000-00-00 00:00:00'),
(18, 'Lco Solvent Vinyl With Lamination', 70, '', '2018-01-12 14:17:30', '0000-00-00 00:00:00'),
(19, 'Frosted With Print Solvent', 70, '', '2018-01-12 14:17:30', '0000-00-00 00:00:00'),
(20, 'Frosted With Plottercutting', 70, '', '2018-01-12 14:17:30', '0000-00-00 00:00:00'),
(21, 'One Way Vision Solvent Vinyl', 70, '', '2018-01-12 14:17:30', '0000-00-00 00:00:00'),
(22, 'One Way Vision 110 Solvent Vinyl', 75, '', '2018-01-12 14:17:30', '0000-00-00 00:00:00'),
(23, 'Frosted With Pco Solvent Print', 75, '', '2018-01-12 14:17:30', '0000-00-00 00:00:00'),
(24, '2D Board With Tube Lites 5 \"Inch\" Box', 470, '2d board product money saver plan', '2018-01-27 07:44:05', '2018-01-27 07:44:05'),
(26, '2D Board with RGB Led\'s 3 \"Inch\" Box', 650, 'this is one of the hottest product in the market, bangalore', '2018-01-27 07:43:31', '2018-01-27 07:43:31'),
(27, '3D Board Immbossed Letter With Led', 750, '', '2018-01-12 14:17:30', '0000-00-00 00:00:00'),
(28, '3D Board Imbossed Letter With RGB', 850, '', '2018-01-12 14:17:30', '0000-00-00 00:00:00'),
(29, 'Star Flex With Standy 2x5', 1270, '', '2018-01-12 14:20:50', '0000-00-00 00:00:00'),
(30, 'Star Flex With Standy 2.5 x 6.5', 1400, '', '2018-01-12 14:20:50', '0000-00-00 00:00:00'),
(31, 'Star Flex With Standy 3 x 6.5', 1450, '', '2018-01-12 14:21:44', '0000-00-00 00:00:00'),
(32, 'Star Flex With Standy 4 x 6.5', 2218, '', '2018-01-12 14:21:44', '0000-00-00 00:00:00'),
(33, 'Standy Scrolling 2 x 5', 1195, '', '2018-01-12 14:23:20', '0000-00-00 00:00:00'),
(34, 'Standy Scrolling 2.5 x 6.5', 1304, '', '2018-01-12 14:23:20', '0000-00-00 00:00:00'),
(35, 'Standy Scrolling 3 x 6.5', 1354, '', '2018-01-12 14:24:19', '0000-00-00 00:00:00'),
(36, 'Standy Scrolling 4 x 6.5', 2088, '', '2018-01-12 14:24:19', '0000-00-00 00:00:00'),
(37, 'Titanum', 25, '', '2018-01-16 09:32:30', '0000-00-00 00:00:00'),
(38, 'Brass', 20, '', '2018-01-16 09:32:30', '0000-00-00 00:00:00'),
(39, 'Steel', 18, 'this is one of the haloween product', '2018-01-27 07:44:49', '2018-01-27 07:44:49');

-- --------------------------------------------------------

--
-- Table structure for table `project_expenses`
--

CREATE TABLE `project_expenses` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_expenses`
--

INSERT INTO `project_expenses` (`id`, `customer_id`, `created_at`, `updated_at`) VALUES
(5, 9, '2017-12-16 17:54:16', '2017-12-16 17:54:16'),
(6, 9, '2017-12-18 05:10:05', '2017-12-18 05:10:05'),
(7, 11, '2017-12-18 05:10:39', '2017-12-18 05:10:39'),
(8, 11, '2017-12-19 17:35:09', '2017-12-19 17:35:09'),
(9, 9, '2017-12-20 12:59:13', '2017-12-20 12:59:13'),
(10, 9, '2017-12-20 13:00:17', '2017-12-20 13:00:17'),
(11, 11, '2017-12-24 04:20:53', '2017-12-24 04:20:53'),
(12, 10, '2017-12-25 05:29:00', '2017-12-25 05:29:00'),
(13, 9, '2018-01-01 17:53:32', '2018-01-01 17:53:32'),
(16, 9, '2018-01-06 13:08:26', '2018-01-06 13:08:26'),
(18, 12, '2018-01-06 16:33:58', '2018-01-06 16:33:58'),
(19, 12, '2018-01-08 05:44:56', '2018-01-08 05:44:56'),
(20, 12, '2018-01-08 05:52:14', '2018-01-08 05:52:14');

-- --------------------------------------------------------

--
-- Table structure for table `project_expenses_data`
--

CREATE TABLE `project_expenses_data` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `project_name` varchar(200) DEFAULT NULL,
  `product_name` varchar(200) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_expenses_data`
--

INSERT INTO `project_expenses_data` (`id`, `customer_id`, `project_name`, `product_name`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(70, 15, NULL, 'mmm', 45, 89, '2018-01-18 05:33:47', '2018-01-18 05:33:47'),
(71, 15, NULL, 'gvg', 45, 89, '2018-01-18 05:33:48', '2018-01-18 05:33:48'),
(117, 11, NULL, 'fddd', 45, 90, '2018-01-18 10:02:43', '2018-01-18 10:02:43'),
(118, 11, NULL, 'screw', 10, 50, '2018-01-18 10:02:43', '2018-01-18 10:02:43'),
(119, 11, NULL, 'bin', 10, 100, '2018-01-18 10:02:43', '2018-01-18 10:02:43'),
(120, 11, NULL, 'seven', 5, 50, '2018-01-18 10:02:43', '2018-01-18 10:02:43'),
(121, 11, NULL, 'latin', 90, 90, '2018-01-18 10:02:43', '2018-01-18 10:02:43'),
(122, 11, NULL, 'ttf', 34, 90, '2018-01-18 10:02:43', '2018-01-18 10:02:43'),
(123, 11, NULL, 'm mm', 45, 90, '2018-01-18 10:02:43', '2018-01-18 10:02:43'),
(124, 12, NULL, 'git', 4, 100, '2018-01-18 10:03:21', '2018-01-18 10:03:21'),
(125, 12, NULL, 'himachal', 5, 999, '2018-01-18 10:03:21', '2018-01-18 10:03:21'),
(126, 12, NULL, 'help me', 40, 90, '2018-01-18 10:03:21', '2018-01-18 10:03:21'),
(127, 12, NULL, 'TT', 6, 6, '2018-01-18 10:03:21', '2018-01-18 10:03:21'),
(128, 12, NULL, 'PP', 2, 2, '2018-01-18 10:03:22', '2018-01-18 10:03:22'),
(129, 12, NULL, 'rakshak', 2, 10, '2018-01-18 10:03:22', '2018-01-18 10:03:22'),
(130, 12, NULL, 'bash', 4, 100, '2018-01-18 10:03:22', '2018-01-18 10:03:22'),
(131, 23, NULL, 'screw', 100, 5, '2018-01-22 11:53:27', '2018-01-22 11:53:27'),
(132, 23, NULL, 'solution', 15, 89, '2018-01-22 11:53:28', '2018-01-22 11:53:28'),
(133, 24, NULL, 'printing', 1, 130, '2018-01-23 07:15:13', '2018-01-23 07:15:13'),
(134, 24, NULL, 'screw', 100, 5, '2018-01-23 07:15:14', '2018-01-23 07:15:14'),
(135, 24, NULL, 'solution', 15, 89, '2018-01-23 07:15:14', '2018-01-23 07:15:14'),
(136, 24, NULL, 'frame', 3, 120, '2018-01-23 07:15:14', '2018-01-23 07:15:14'),
(137, 24, NULL, 'flex', 3, 50, '2018-01-23 07:15:14', '2018-01-23 07:15:14'),
(138, 25, NULL, 'screw', 10, 100, '2018-01-27 11:57:11', '2018-01-27 11:57:11'),
(139, 25, NULL, 'lava', 5, 200, '2018-01-27 11:57:11', '2018-01-27 11:57:11'),
(140, 38, NULL, 'screw', 10, 10, '2018-01-30 06:10:55', '2018-01-30 06:10:55'),
(141, 38, NULL, 'fevicol', 2, 500, '2018-01-30 06:10:55', '2018-01-30 06:10:55'),
(142, 38, NULL, 'labour charge', 2, 350, '2018-01-30 06:10:55', '2018-01-30 06:10:55');

-- --------------------------------------------------------

--
-- Table structure for table `sent_quotation_data`
--

CREATE TABLE `sent_quotation_data` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `quotation_data` text,
  `generated_table` text,
  `customer_name` varchar(250) DEFAULT NULL,
  `company_name` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `product_name` varchar(250) DEFAULT NULL,
  `product_description` text,
  `address` text,
  `status` varchar(250) NOT NULL DEFAULT 'followup',
  `gst_percentage` float NOT NULL,
  `refined_table` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sent_quotation_data`
--

INSERT INTO `sent_quotation_data` (`id`, `customer_id`, `quotation_data`, `generated_table`, `customer_name`, `company_name`, `email`, `phone`, `product_name`, `product_description`, `address`, `status`, `gst_percentage`, `refined_table`, `created_at`, `updated_at`) VALUES
(11, 11, '{\"arjun_web\":[{\"Price\":\"999\",\"Quantity\":\"2\",\"Amount\":\"1998\"}],\"wrestling_board\":[{\"Price\":\"400\",\"Quantity\":\"2\",\"Amount\":\"800\"}],\"total\":[{\"Price\":null,\"Quantity\":null,\"Amount\":\"2798\"}]}', '<table class=\"table\" id=\"showQuotation\">\n	                    	<thead>\n	                    		<tr><th>Product Name</th>\n	                    		<th>Price</th> \n	                    		<th>Quantity</th>\n	                    		<th>Amount</th> \n	                    	</tr></thead>\n\n	                    	<tbody>\n	                    		 \n	                    	<tr class=\"allTheQuotationRow\"><td>arjun web</td><td contenteditable=\"\" class=\"priceChangeField\">999</td><td contenteditable=\"\" class=\"quantityChangeField\">2</td><td>1998</td></tr><tr class=\"allTheQuotationRow\"><td>wrestling board</td><td contenteditable=\"\" class=\"priceChangeField\">400</td><td contenteditable=\"\" class=\"quantityChangeField\">2</td><td>800</td></tr><tr id=\"lastTotalRow\"><td>total</td><td></td><td></td><td>2798</td></tr></tbody>\n	                    </table>', 'dcndxnds', 'saddam bhai habibi', 'email@gmail.com', '84398349934,4334878738', 'ruby', 'product Alpha Tooth Paste', 'new delhi,mumbai', 'followup', 18, '', '2018-07-07 06:18:04', '2018-01-26 10:21:48'),
(12, 10, '{\"cigratte_flake\":[{\"Price\":\"999\",\"Quantity\":\"3\",\"Amount\":\"2997\"}],\"wrestling_board\":[{\"Price\":\"400\",\"Quantity\":\"2\",\"Amount\":\"800\"}],\"flex_board_naga_dhaga\":[{\"Price\":\"300\",\"Quantity\":\"2\",\"Amount\":\"600\"}],\"total\":[{\"Price\":null,\"Quantity\":null,\"Amount\":\"4397\"}]}', '<table class=\"table\" id=\"showQuotation\">\n	                    	<thead>\n	                    		<tr><th>Product Name</th>\n	                    		<th>Price</th> \n	                    		<th>Quantity</th>\n	                    		<th>Amount</th> \n	                    	</tr></thead>\n\n	                    	<tbody>\n	                    		 \n	                    	<tr class=\"allTheQuotationRow\"><td>cigratte flake</td><td contenteditable=\"\" class=\"priceChangeField\">999</td><td contenteditable=\"\" class=\"quantityChangeField\">3</td><td>2997</td></tr><tr class=\"allTheQuotationRow\"><td>wrestling board</td><td contenteditable=\"\" class=\"priceChangeField\">400</td><td contenteditable=\"\" class=\"quantityChangeField\">2</td><td>800</td></tr><tr class=\"allTheQuotationRow\"><td>flex board naga dhaga</td><td contenteditable=\"\" class=\"priceChangeField\">300</td><td contenteditable=\"\" class=\"quantityChangeField\">2</td><td>600</td></tr><tr id=\"lastTotalRow\"><td>total</td><td></td><td></td><td>4397</td></tr></tbody>\n	                    </table>', 'dsndfbbd', 'haroon', 'email@gmail.com', 'fdnbdfbd,fdnbdfbd,fdnbdfbd', 'pani', 'ejaz 6', 'hggg dfjgj jhjhhh  hjhhj - hjjhhj', 'followup', 18, '', '2018-01-24 13:55:22', '2017-12-31 04:11:41'),
(15, 9, '{\r\n	\"Vinyl_Backlite\": [{\r\n		\"Price\": \"280\",\r\n		\"Quantity\": \"1\",\r\n		\"Amount\": \"280\"\r\n	}],\r\n	\"Backlite\": [{\r\n		\"Price\": \"250\",\r\n		\"Quantity\": \"1\",\r\n		\"Amount\": \"250\"\r\n	}],\r\n	\"Star_Flex\": [{\r\n		\"Price\": \"25\",\r\n		\"Quantity\": \"1\",\r\n		\"Amount\": \"25\"\r\n	}],\r\n	\"Steel\": [{\r\n		\"Price\": \"18\",\r\n		\"Quantity\": \"1\",\r\n		\"Amount\": \"18\"\r\n	}],\r\n	\"0\": \"[object Object]\",\r\n	\"1\": \"[object Object]\",\r\n\r\n	\"total\": [{\r\n		\"Price\": \"\",\r\n		\"Quantity\": \"\",\r\n		\"Amount\": \"573\"\r\n	}]\r\n}', '<table class=\"table table-bordered\" id=\"showQuotation\" style=\"margin-top: 40px;\">\n	                    	<thead>\n	                    		<tr><th>Product Name</th>\n	                    		<th>Price</th> \n	                    		<th>Quantity</th>\n	                    		<th>Amount</th> \n	                    		<th>Action</th> \n	                    	</tr></thead>\n\n	                    	<tbody>\n	                    		 \n	                    	<tr class=\"allTheQuotationRow\"><td>flex board naga dhaga</td><td contenteditable=\"\" class=\"priceChangeField\">300</td><td contenteditable=\"\" class=\"quantityChangeField\">4</td><td>1200</td></tr><tr class=\"allTheQuotationRow\"><td>sign board</td><td contenteditable=\"\" class=\"priceChangeField\">200</td><td contenteditable=\"\" class=\"quantityChangeField\">4</td><td>800</td></tr><tr class=\"allTheQuotationRow\"><td>wrestling board</td><td contenteditable=\"\" class=\"priceChangeField\">400</td><td contenteditable=\"\" class=\"quantityChangeField\">1</td><td>400</td></tr><tr class=\"allTheQuotationRow\"><td>Standy Scrolling 2.5 x 6.5</td><td contenteditable=\"\" class=\"priceChangeField\">1304</td><td contenteditable=\"\" class=\"quantityChangeField\">23</td><td>29992</td><td><span class=\"label label-warning removeRow\" style=\"width:20px;cursor:pointer;\">cancel</span></td></tr><tr id=\"lastTotalRow3333\"><td></td><td></td><td></td><th>Total Amount</th><td></td></tr><tr id=\"lastTotalRow\"><td>total</td><td></td><td></td><td>32392</td></tr></tbody>\n	                    </table>', 'dsndfbbd', 'ggssss', 'email@gmail.com', '9632427261', 'halwa puri', 'ejaz 5', 'dsjfdj fjgfjj GJHHGJ  HHGJ - vjjgjg', 'approved', 18, '', '2018-07-07 06:18:04', '2018-01-26 10:32:34'),
(16, 9, '{\"flex_board_naga_dhaga\":[{\"Price\":\"300\",\"Quantity\":\"4\",\"Amount\":\"1200\"}],\"sign_board\":[{\"Price\":\"200\",\"Quantity\":\"4\",\"Amount\":\"800\"}],\"wrestling_board\":[{\"Price\":\"400\",\"Quantity\":\"1\",\"Amount\":\"400\"}],\"Standy_Scrolling_2.5_x_6.5\":[{\"Price\":\"1304\",\"Quantity\":\"23\",\"Amount\":\"29992\"}],\"0\":\"[object Object]\",\"total\":[{\"Price\":null,\"Quantity\":null,\"Amount\":\"32392\"}]}', '<table class=\"table table-bordered\" id=\"showQuotation\" style=\"margin-top: 40px;\">\n	                    	<thead>\n	                    		<tr><th>Product Name</th>\n	                    		<th>Price</th> \n	                    		<th>Quantity</th>\n	                    		<th>Amount</th> \n	                    		<th>Action</th> \n	                    	</tr></thead>\n\n	                    	<tbody>\n	                    		 \n	                    	<tr class=\"allTheQuotationRow\"><td>flex board naga dhaga</td><td contenteditable=\"\" class=\"priceChangeField\">300</td><td contenteditable=\"\" class=\"quantityChangeField\">4</td><td>1200</td></tr><tr class=\"allTheQuotationRow\"><td>sign board</td><td contenteditable=\"\" class=\"priceChangeField\">200</td><td contenteditable=\"\" class=\"quantityChangeField\">4</td><td>800</td></tr><tr class=\"allTheQuotationRow\"><td>wrestling board</td><td contenteditable=\"\" class=\"priceChangeField\">400</td><td contenteditable=\"\" class=\"quantityChangeField\">1</td><td>400</td></tr><tr class=\"allTheQuotationRow\"><td>Standy Scrolling 2.5 x 6.5</td><td contenteditable=\"\" class=\"priceChangeField\">1304</td><td contenteditable=\"\" class=\"quantityChangeField\">23</td><td>29992</td><td><span class=\"label label-warning removeRow\" style=\"width:20px;cursor:pointer;\">cancel</span></td></tr><tr id=\"lastTotalRow3333\"><td></td><td></td><td></td><th>Total Amount</th><td></td></tr><tr id=\"lastTotalRow\"><td>total</td><td></td><td></td><td>32392</td></tr></tbody>\n	                    </table>', 'dsndfbbd', 'ggssss', 'email@gmail.com', '9632427261', 'halwa puri', 'ejaz 5', 'dsjfdj fjgfjj GJHHGJ  HHGJ - vjjgjg', 'followup', 18, '', '2018-07-07 06:18:04', '2018-01-22 12:00:46'),
(17, 9, '{\"flex_board_naga_dhaga\":[{\"Price\":\"300\",\"Quantity\":\"4\",\"Amount\":\"1200\"}],\"sign_board\":[{\"Price\":\"200\",\"Quantity\":\"4\",\"Amount\":\"800\"}],\"wrestling_board\":[{\"Price\":\"400\",\"Quantity\":\"1\",\"Amount\":\"400\"}],\"Standy_Scrolling_2.5_x_6.5\":[{\"Price\":\"1304\",\"Quantity\":\"23\",\"Amount\":\"29992\"}],\"0\":\"[object Object]\",\"total\":[{\"Price\":null,\"Quantity\":null,\"Amount\":\"32392\"}]}', '<table class=\"table table-bordered\" id=\"showQuotation\" style=\"margin-top: 40px;\">\n	                    	<thead>\n	                    		<tr><th>Product Name</th>\n	                    		<th>Price</th> \n	                    		<th>Quantity</th>\n	                    		<th>Amount</th> \n	                    		<th>Action</th> \n	                    	</tr></thead>\n\n	                    	<tbody>\n	                    		 \n	                    	<tr class=\"allTheQuotationRow\"><td>flex board naga dhaga</td><td contenteditable=\"\" class=\"priceChangeField\">300</td><td contenteditable=\"\" class=\"quantityChangeField\">4</td><td>1200</td></tr><tr class=\"allTheQuotationRow\"><td>sign board</td><td contenteditable=\"\" class=\"priceChangeField\">200</td><td contenteditable=\"\" class=\"quantityChangeField\">4</td><td>800</td></tr><tr class=\"allTheQuotationRow\"><td>wrestling board</td><td contenteditable=\"\" class=\"priceChangeField\">400</td><td contenteditable=\"\" class=\"quantityChangeField\">1</td><td>400</td></tr><tr class=\"allTheQuotationRow\"><td>Standy Scrolling 2.5 x 6.5</td><td contenteditable=\"\" class=\"priceChangeField\">1304</td><td contenteditable=\"\" class=\"quantityChangeField\">23</td><td>29992</td><td><span class=\"label label-warning removeRow\" style=\"width:20px;cursor:pointer;\">cancel</span></td></tr><tr id=\"lastTotalRow3333\"><td></td><td></td><td></td><th>Total Amount</th><td></td></tr><tr id=\"lastTotalRow\"><td>total</td><td></td><td></td><td>32392</td></tr></tbody>\n	                    </table>', 'dsndfbbd', 'ggssss', 'email@gmail.com', '9632427261', 'halwa puri', 'ejaz 5', 'dsjfdj fjgfjj GJHHGJ  HHGJ - vjjgjg', 'followup', 18, '', '2018-07-07 06:18:04', '2018-01-22 12:00:46'),
(18, 9, '{\"flex_board_naga_dhaga\":[{\"Price\":\"300\",\"Quantity\":\"4\",\"Amount\":\"1200\"}],\"sign_board\":[{\"Price\":\"200\",\"Quantity\":\"4\",\"Amount\":\"800\"}],\"wrestling_board\":[{\"Price\":\"400\",\"Quantity\":\"1\",\"Amount\":\"400\"}],\"Standy_Scrolling_2.5_x_6.5\":[{\"Price\":\"1304\",\"Quantity\":\"23\",\"Amount\":\"29992\"}],\"0\":\"[object Object]\",\"total\":[{\"Price\":null,\"Quantity\":null,\"Amount\":\"32392\"}]}', '<table class=\"table table-bordered\" id=\"showQuotation\" style=\"margin-top: 40px;\">\n	                    	<thead>\n	                    		<tr><th>Product Name</th>\n	                    		<th>Price</th> \n	                    		<th>Quantity</th>\n	                    		<th>Amount</th> \n	                    		<th>Action</th> \n	                    	</tr></thead>\n\n	                    	<tbody>\n	                    		 \n	                    	<tr class=\"allTheQuotationRow\"><td>flex board naga dhaga</td><td contenteditable=\"\" class=\"priceChangeField\">300</td><td contenteditable=\"\" class=\"quantityChangeField\">4</td><td>1200</td></tr><tr class=\"allTheQuotationRow\"><td>sign board</td><td contenteditable=\"\" class=\"priceChangeField\">200</td><td contenteditable=\"\" class=\"quantityChangeField\">4</td><td>800</td></tr><tr class=\"allTheQuotationRow\"><td>wrestling board</td><td contenteditable=\"\" class=\"priceChangeField\">400</td><td contenteditable=\"\" class=\"quantityChangeField\">1</td><td>400</td></tr><tr class=\"allTheQuotationRow\"><td>Standy Scrolling 2.5 x 6.5</td><td contenteditable=\"\" class=\"priceChangeField\">1304</td><td contenteditable=\"\" class=\"quantityChangeField\">23</td><td>29992</td><td><span class=\"label label-warning removeRow\" style=\"width:20px;cursor:pointer;\">cancel</span></td></tr><tr id=\"lastTotalRow3333\"><td></td><td></td><td></td><th>Total Amount</th><td></td></tr><tr id=\"lastTotalRow\"><td>total</td><td></td><td></td><td>32392</td></tr></tbody>\n	                    </table>', 'dsndfbbd', 'ggssss', 'email@gmail.com', '9632427261', 'halwa puri', 'ejaz 5', 'dsjfdj fjgfjj GJHHGJ  HHGJ - vjjgjg', 'followup', 18, '', '2018-07-07 06:18:04', '2018-01-22 12:00:46'),
(19, 12, '{\"sign_board\":[{\"Price\":\"200\",\"Quantity\":\"1\",\"Amount\":\"200\"}],\"ghee\":[{\"Price\":\"999\",\"Quantity\":\"2\",\"Amount\":\"1998\"}],\"Standy_Scrolling_2_x_5\":[{\"Price\":\"1195\",\"Quantity\":\"4\",\"Amount\":\"4780\"}],\"Star_Flex_With_Standy_3_x_6.5\":[{\"Price\":\"14500\",\"Quantity\":\"4\",\"Amount\":\"58000\"},{\"Price\":\"1450\",\"Quantity\":\"2\",\"Amount\":\"2900\"}],\"Star_Flex_With_Standy_4_x_6.5\":[{\"Price\":\"2218\",\"Quantity\":\"5\",\"Amount\":\"11090\"}],\"0\":\"[object Object]\",\"total\":[{\"Price\":null,\"Quantity\":null,\"Amount\":\"78968\"}]}', '<table class=\"table table-bordered\" style=\"margin-top: 40px;\" id=\"showQuotation\">\n	                    	<thead>\n	                    		<tr><th>Product Name</th>\n	                    		<th>Price</th> \n	                    		<th>Quantity</th>\n	                    		<th>Amount</th> \n	                            <th>Discount</th>\n	                    		<th id=\"actionColumn\">Action</th> \n	                    	</tr></thead>\n\n	                    	<tbody>\n	                    		 \n	                    	<tr class=\"allTheQuotationRow\"><td>sign board</td><td contenteditable=\"\" class=\"priceChangeField\">200</td><td contenteditable=\"\" class=\"quantityChangeField\">1</td><td>200</td></tr><tr class=\"allTheQuotationRow\"><td>ghee</td><td contenteditable=\"\" class=\"priceChangeField\">999</td><td contenteditable=\"\" class=\"quantityChangeField\">2</td><td>1998</td></tr><tr class=\"allTheQuotationRow\"><td>Standy Scrolling 2 x 5</td><td contenteditable=\"\" class=\"priceChangeField\">1195</td><td contenteditable=\"\" class=\"quantityChangeField\">4</td><td>4780</td><td class=\"discountPriceColm\" data-discount=\"10\">478</td><td><span class=\"label label-warning\" style=\"width:20px;cursor:pointer;\">canel</span></td></tr><tr class=\"allTheQuotationRow\"><td>Star Flex With Standy 3 x 6.5</td><td contenteditable=\"\" class=\"priceChangeField\">14500</td><td contenteditable=\"\" class=\"quantityChangeField\">4</td><td>58000</td><td class=\"discountPriceColm\" data-discount=\"10\">5800</td><td><span class=\"label label-warning\" style=\"width:20px;cursor:pointer;\">canel</span></td></tr><tr class=\"allTheQuotationRow\"><td>Star Flex With Standy 3 x 6.5</td><td contenteditable=\"\" class=\"priceChangeField\">1450</td><td contenteditable=\"\" class=\"quantityChangeField\">2</td><td>2900</td><td class=\"discountPriceColm\" data-discount=\"3\">87</td><td><span class=\"label label-warning\" style=\"width:20px;cursor:pointer;\">canel</span></td></tr><tr class=\"allTheQuotationRow\"><td>Star Flex With Standy 4 x 6.5</td><td contenteditable=\"\" class=\"priceChangeField\">2218</td><td contenteditable=\"\" class=\"quantityChangeField\">5</td><td>11090</td><td class=\"discountPriceColm\" data-discount=\"10\">1109</td><td><span class=\"label removeRow label-warning\" style=\"width:20px;cursor:pointer;\">canel</span></td></tr><tr id=\"lastTotalRow3333\"><td></td><td></td><td></td><th>Total Amount</th><th>Discount Amount</th><td></td></tr><tr id=\"lastTotalRow\"><td>total</td><td></td><td></td><td>78968</td><td>7474</td><td></td></tr></tbody>\n	                    </table>', 'Raj Laxmi', NULL, 'email@gmail.com', '9738889288', 'signages', '60X30 Led Board,', '-', 'followup', 18, '', '2018-07-07 06:18:04', '2018-01-18 16:41:05'),
(20, 13, '{\"sign_board\":[{\"Price\":\"200\",\"Quantity\":\"1\",\"Amount\":\"200\"}],\"wrestling_board\":[{\"Price\":\"400\",\"Quantity\":\"1\",\"Amount\":\"400\"}],\"flex_board_naga_dhaga\":[{\"Price\":\"300\",\"Quantity\":\"7\",\"Amount\":\"2100\"}],\"ss\":[{\"Price\":\"90\",\"Quantity\":\"4\",\"Amount\":\"360\"}],\"total\":[{\"Price\":null,\"Quantity\":null,\"Amount\":\"3060\"}]}', '<table class=\"table\" id=\"showQuotation\">\n	                    	<thead>\n	                    		<tr><th>Product Name</th>\n	                    		<th>Price</th> \n	                    		<th>Quantity</th>\n	                    		<th>Amount</th> \n	                    	</tr></thead>\n\n	                    	<tbody>\n	                    		 \n	                    	<tr class=\"allTheQuotationRow\"><td>sign board</td><td contenteditable=\"\" class=\"priceChangeField\">200</td><td contenteditable=\"\" class=\"quantityChangeField\">1</td><td>200</td></tr><tr class=\"allTheQuotationRow\"><td>wrestling board</td><td contenteditable=\"\" class=\"priceChangeField\">400</td><td contenteditable=\"\" class=\"quantityChangeField\">1</td><td>400</td></tr><tr class=\"allTheQuotationRow\"><td>flex board naga dhaga</td><td contenteditable=\"\" class=\"priceChangeField\">300</td><td contenteditable=\"\" class=\"quantityChangeField\">7</td><td>2100</td></tr><tr class=\"allTheQuotationRow\"><td>ss</td><td contenteditable=\"\" class=\"priceChangeField\">90</td><td contenteditable=\"\" class=\"quantityChangeField\">4</td><td>360</td></tr><tr id=\"lastTotalRow\"><td>total</td><td></td><td></td><td>3060</td></tr></tbody>\n	                    </table>', 'Vasundra', 'Egg Dot', 'email@gmail.com', '4858865288', 'invitations', NULL, 'Narasipura  Bangalore  Karnataka - 560097', 'followup', 18, '', '2018-07-07 06:18:04', '2018-01-12 09:28:09'),
(21, 12, '{\"sign_board\":[{\"Price\":\"200\",\"Quantity\":\"1\",\"Amount\":\"200\"}],\"ghee\":[{\"Price\":\"999\",\"Quantity\":\"2\",\"Amount\":\"1998\"}],\"Standy_Scrolling_2_x_5\":[{\"Price\":\"1195\",\"Quantity\":\"4\",\"Amount\":\"4780\"}],\"Star_Flex_With_Standy_3_x_6.5\":[{\"Price\":\"14500\",\"Quantity\":\"4\",\"Amount\":\"58000\"},{\"Price\":\"1450\",\"Quantity\":\"2\",\"Amount\":\"2900\"}],\"Star_Flex_With_Standy_4_x_6.5\":[{\"Price\":\"2218\",\"Quantity\":\"5\",\"Amount\":\"11090\"}],\"0\":\"[object Object]\",\"total\":[{\"Price\":null,\"Quantity\":null,\"Amount\":\"78968\"}]}', '<table class=\"table table-bordered\" style=\"margin-top: 40px;\" id=\"showQuotation\">\n	                    	<thead>\n	                    		<tr><th>Product Name</th>\n	                    		<th>Price</th> \n	                    		<th>Quantity</th>\n	                    		<th>Amount</th> \n	                            <th>Discount</th>\n	                    		<th id=\"actionColumn\">Action</th> \n	                    	</tr></thead>\n\n	                    	<tbody>\n	                    		 \n	                    	<tr class=\"allTheQuotationRow\"><td>sign board</td><td contenteditable=\"\" class=\"priceChangeField\">200</td><td contenteditable=\"\" class=\"quantityChangeField\">1</td><td>200</td></tr><tr class=\"allTheQuotationRow\"><td>ghee</td><td contenteditable=\"\" class=\"priceChangeField\">999</td><td contenteditable=\"\" class=\"quantityChangeField\">2</td><td>1998</td></tr><tr class=\"allTheQuotationRow\"><td>Standy Scrolling 2 x 5</td><td contenteditable=\"\" class=\"priceChangeField\">1195</td><td contenteditable=\"\" class=\"quantityChangeField\">4</td><td>4780</td><td class=\"discountPriceColm\" data-discount=\"10\">478</td><td><span class=\"label label-warning\" style=\"width:20px;cursor:pointer;\">canel</span></td></tr><tr class=\"allTheQuotationRow\"><td>Star Flex With Standy 3 x 6.5</td><td contenteditable=\"\" class=\"priceChangeField\">14500</td><td contenteditable=\"\" class=\"quantityChangeField\">4</td><td>58000</td><td class=\"discountPriceColm\" data-discount=\"10\">5800</td><td><span class=\"label label-warning\" style=\"width:20px;cursor:pointer;\">canel</span></td></tr><tr class=\"allTheQuotationRow\"><td>Star Flex With Standy 3 x 6.5</td><td contenteditable=\"\" class=\"priceChangeField\">1450</td><td contenteditable=\"\" class=\"quantityChangeField\">2</td><td>2900</td><td class=\"discountPriceColm\" data-discount=\"3\">87</td><td><span class=\"label label-warning\" style=\"width:20px;cursor:pointer;\">canel</span></td></tr><tr class=\"allTheQuotationRow\"><td>Star Flex With Standy 4 x 6.5</td><td contenteditable=\"\" class=\"priceChangeField\">2218</td><td contenteditable=\"\" class=\"quantityChangeField\">5</td><td>11090</td><td class=\"discountPriceColm\" data-discount=\"10\">1109</td><td><span class=\"label removeRow label-warning\" style=\"width:20px;cursor:pointer;\">canel</span></td></tr><tr id=\"lastTotalRow3333\"><td></td><td></td><td></td><th>Total Amount</th><th>Discount Amount</th><td></td></tr><tr id=\"lastTotalRow\"><td>total</td><td></td><td></td><td>78968</td><td>7474</td><td></td></tr></tbody>\n	                    </table>', 'Raj Laxmi', NULL, 'email@gmail.com', '9738889288', 'signages', '60X30 Led Board,', '-', 'followup', 18, '', '2018-07-07 06:18:04', '2018-01-18 16:41:05'),
(28, 13, '{\"sign_board\":[{\"Price\":\"200\",\"Quantity\":\"1\",\"Amount\":\"200\"}],\"wrestling_board\":[{\"Price\":\"400\",\"Quantity\":\"1\",\"Amount\":\"400\"}],\"flex_board_naga_dhaga\":[{\"Price\":\"300\",\"Quantity\":\"7\",\"Amount\":\"2100\"}],\"ss\":[{\"Price\":\"90\",\"Quantity\":\"4\",\"Amount\":\"360\"}],\"total\":[{\"Price\":null,\"Quantity\":null,\"Amount\":\"3060\"}]}', '<table class=\"table\" id=\"showQuotation\">\n	                    	<thead>\n	                    		<tr><th>Product Name</th>\n	                    		<th>Price</th> \n	                    		<th>Quantity</th>\n	                    		<th>Amount</th> \n	                    	</tr></thead>\n\n	                    	<tbody>\n	                    		 \n	                    	<tr class=\"allTheQuotationRow\"><td>sign board</td><td contenteditable=\"\" class=\"priceChangeField\">200</td><td contenteditable=\"\" class=\"quantityChangeField\">1</td><td>200</td></tr><tr class=\"allTheQuotationRow\"><td>wrestling board</td><td contenteditable=\"\" class=\"priceChangeField\">400</td><td contenteditable=\"\" class=\"quantityChangeField\">1</td><td>400</td></tr><tr class=\"allTheQuotationRow\"><td>flex board naga dhaga</td><td contenteditable=\"\" class=\"priceChangeField\">300</td><td contenteditable=\"\" class=\"quantityChangeField\">7</td><td>2100</td></tr><tr class=\"allTheQuotationRow\"><td>ss</td><td contenteditable=\"\" class=\"priceChangeField\">90</td><td contenteditable=\"\" class=\"quantityChangeField\">4</td><td>360</td></tr><tr id=\"lastTotalRow\"><td>total</td><td></td><td></td><td>3060</td></tr></tbody>\n	                    </table>', 'Vasundra', 'Egg Dot', 'email@gmail.com', '4858865288', 'invitations', NULL, 'Narasipura  Bangalore  Karnataka - 560097', 'followup', 18, '', '2018-07-07 06:18:04', '2018-01-12 09:28:09'),
(29, 20, '{\"sign_board\":[{\"Price\":\"200\",\"Quantity\":\"2\",\"Amount\":\"400\"}],\"wrestling_board\":[{\"Price\":\"400\",\"Quantity\":\"2\",\"Amount\":\"800\"}],\"flex_board_naga_dhaga\":[{\"Price\":\"300\",\"Quantity\":\"2\",\"Amount\":\"600\"}],\"total\":[{\"Price\":null,\"Quantity\":null,\"Amount\":\"1800\"}]}', '<table class=\"table\" id=\"showQuotation\">\n	                    	<thead>\n	                    		<tr><th>Product Name</th>\n	                    		<th>Price</th> \n	                    		<th>Quantity</th>\n	                    		<th>Amount</th> \n	                    	</tr></thead>\n\n	                    	<tbody>\n	                    		 \n	                    	<tr class=\"allTheQuotationRow\"><td>sign board</td><td contenteditable=\"\" class=\"priceChangeField\">200</td><td contenteditable=\"\" class=\"quantityChangeField\">2</td><td>400</td></tr><tr class=\"allTheQuotationRow\"><td>wrestling board</td><td contenteditable=\"\" class=\"priceChangeField\">400</td><td contenteditable=\"\" class=\"quantityChangeField\">2</td><td>800</td></tr><tr class=\"allTheQuotationRow\"><td>flex board naga dhaga</td><td contenteditable=\"\" class=\"priceChangeField\">300</td><td contenteditable=\"\" class=\"quantityChangeField\">2</td><td>600</td></tr><tr id=\"lastTotalRow\"><td>total</td><td></td><td></td><td>1800</td></tr></tbody>\n	                    </table>', 'Vincent', 'Vincent', 'email@gmail.com', '4858865288', 'signages', 'back light with 4x4 led', '-', 'followup', 18, '', '2018-07-07 06:18:04', '2018-01-12 09:41:31'),
(31, 12, '{\"sign_board\":[{\"Price\":\"200\",\"Quantity\":\"1\",\"Amount\":\"200\"}],\"ghee\":[{\"Price\":\"999\",\"Quantity\":\"2\",\"Amount\":\"1998\"}],\"Standy_Scrolling_2_x_5\":[{\"Price\":\"1195\",\"Quantity\":\"4\",\"Amount\":\"4780\"}],\"Star_Flex_With_Standy_3_x_6.5\":[{\"Price\":\"14500\",\"Quantity\":\"4\",\"Amount\":\"58000\"},{\"Price\":\"1450\",\"Quantity\":\"2\",\"Amount\":\"2900\"}],\"Star_Flex_With_Standy_4_x_6.5\":[{\"Price\":\"2218\",\"Quantity\":\"5\",\"Amount\":\"11090\"}],\"0\":\"[object Object]\",\"total\":[{\"Price\":null,\"Quantity\":null,\"Amount\":\"78968\"}]}', '<table class=\"table table-bordered\" style=\"margin-top: 40px;\" id=\"showQuotation\">\n	                    	<thead>\n	                    		<tr><th>Product Name</th>\n	                    		<th>Price</th> \n	                    		<th>Quantity</th>\n	                    		<th>Amount</th> \n	                            <th>Discount</th>\n	                    		<th id=\"actionColumn\">Action</th> \n	                    	</tr></thead>\n\n	                    	<tbody>\n	                    		 \n	                    	<tr class=\"allTheQuotationRow\"><td>sign board</td><td contenteditable=\"\" class=\"priceChangeField\">200</td><td contenteditable=\"\" class=\"quantityChangeField\">1</td><td>200</td></tr><tr class=\"allTheQuotationRow\"><td>ghee</td><td contenteditable=\"\" class=\"priceChangeField\">999</td><td contenteditable=\"\" class=\"quantityChangeField\">2</td><td>1998</td></tr><tr class=\"allTheQuotationRow\"><td>Standy Scrolling 2 x 5</td><td contenteditable=\"\" class=\"priceChangeField\">1195</td><td contenteditable=\"\" class=\"quantityChangeField\">4</td><td>4780</td><td class=\"discountPriceColm\" data-discount=\"10\">478</td><td><span class=\"label label-warning\" style=\"width:20px;cursor:pointer;\">canel</span></td></tr><tr class=\"allTheQuotationRow\"><td>Star Flex With Standy 3 x 6.5</td><td contenteditable=\"\" class=\"priceChangeField\">14500</td><td contenteditable=\"\" class=\"quantityChangeField\">4</td><td>58000</td><td class=\"discountPriceColm\" data-discount=\"10\">5800</td><td><span class=\"label label-warning\" style=\"width:20px;cursor:pointer;\">canel</span></td></tr><tr class=\"allTheQuotationRow\"><td>Star Flex With Standy 3 x 6.5</td><td contenteditable=\"\" class=\"priceChangeField\">1450</td><td contenteditable=\"\" class=\"quantityChangeField\">2</td><td>2900</td><td class=\"discountPriceColm\" data-discount=\"3\">87</td><td><span class=\"label label-warning\" style=\"width:20px;cursor:pointer;\">canel</span></td></tr><tr class=\"allTheQuotationRow\"><td>Star Flex With Standy 4 x 6.5</td><td contenteditable=\"\" class=\"priceChangeField\">2218</td><td contenteditable=\"\" class=\"quantityChangeField\">5</td><td>11090</td><td class=\"discountPriceColm\" data-discount=\"10\">1109</td><td><span class=\"label removeRow label-warning\" style=\"width:20px;cursor:pointer;\">canel</span></td></tr><tr id=\"lastTotalRow3333\"><td></td><td></td><td></td><th>Total Amount</th><th>Discount Amount</th><td></td></tr><tr id=\"lastTotalRow\"><td>total</td><td></td><td></td><td>78968</td><td>7474</td><td></td></tr></tbody>\n	                    </table>', 'Raj Laxmi', NULL, 'email@gmail.com', '9738889288', 'signages', '60X30 Led Board,', '-', 'followup', 18, '', '2018-07-07 06:18:04', '2018-01-18 16:41:05'),
(38, 21, '{\"Star_Flex_With_Standy_4_x_6.5\":[{\"Price\":\"2218\",\"Quantity\":\"20\",\"Amount\":\"44360\"}],\"Standy_Scrolling_2_x_5\":[{\"Price\":\"1195\",\"Quantity\":\"9\",\"Amount\":\"10755\"}],\"0\":\"[object Object]\",\"gst\":[{\"Price\":null,\"Quantity\":null,\"Amount\":\"86584.50\"}],\"total\":[{\"Price\":null,\"Quantity\":null,\"Amount\":\"55115\"}]}', '<table class=\"table table-bordered\" id=\"showQuotation\" style=\"margin-top: 40px;\" data-gst=\"50\">\n	                    	<thead>\n	                    		<tr><th>Product Name</th>\n	                    		<th>Price</th> \n	                    		<th>Quantity</th>\n	                    		<th>Amount</th> \n	                    		<th>Action</th> \n	                    	</tr></thead>\n\n	                    	<tbody>\n	                    		 \n	                    	<tr class=\"allTheQuotationRow\"><td>Star Flex With Standy 4 x 6.5</td><td contenteditable=\"\" class=\"priceChangeField\">2218</td><td contenteditable=\"\" class=\"quantityChangeField\">20</td><td>44360</td><td><span class=\"label label-warning removeRow\" style=\"width:20px;cursor:pointer;\">cancel</span></td></tr><tr class=\"allTheQuotationRow\"><td>Standy Scrolling 2 x 5</td><td contenteditable=\"\" class=\"priceChangeField\">1195</td><td contenteditable=\"\" class=\"quantityChangeField\">9</td><td>10755</td><td><span class=\"label label-warning removeRow\" style=\"width:20px;cursor:pointer;\">cancel</span></td></tr><tr id=\"lastTotalRow3333\"><td></td><td></td><td></td><th>Total Amount</th><td></td></tr><tr id=\"gstShowingRow\"><td>gst</td><td></td><td></td><td>86584.50</td><td></td></tr><tr id=\"lastTotalRow\"><td>total</td><td></td><td></td><td>55115</td><td></td></tr></tbody>\n	                    </table>', 'Tanveer Baig', 'EBS LPA', 'email@gmail.com', '4858865288', 'Lco Solvent Vinyl With Lamination', 'sssssss', '-', 'followup', 50, '', '2018-07-07 06:20:35', '2018-01-25 04:21:15'),
(39, 23, '{\"Front_Lite_Normal_Flex\":[{\"Price\":\"70\",\"Quantity\":\"2\",\"Amount\":\"140\"}],\"Backlite\":[{\"Price\":\"250\",\"Quantity\":\"2\",\"Amount\":\"500\"}],\"Vinyl_Backlite\":[{\"Price\":\"280\",\"Quantity\":\"2\",\"Amount\":\"560\"}],\"0\":\"[object Object]\",\"total\":[{\"Price\":null,\"Quantity\":null,\"Amount\":\"1200\"}]}', '<table class=\"table table-bordered\" id=\"showQuotation\" style=\"margin-top: 40px;\">\n	                    	<thead>\n	                    		<tr><th>Product Name</th>\n	                    		<th>Price</th> \n	                    		<th>Quantity</th>\n	                    		<th>Amount</th> \n	                    		<th>Action</th> \n	                    	</tr></thead>\n\n	                    	<tbody>\n	                    		 \n	                    	<tr class=\"allTheQuotationRow\"><td>Front Lite Normal Flex</td><td contenteditable=\"\" class=\"priceChangeField\">70</td><td contenteditable=\"\" class=\"quantityChangeField\">2</td><td>140</td><td><span class=\"label label-warning removeRow\" style=\"width:20px;cursor:pointer;\">cancel</span></td></tr><tr class=\"allTheQuotationRow\"><td>Backlite</td><td contenteditable=\"\" class=\"priceChangeField\">250</td><td contenteditable=\"\" class=\"quantityChangeField\">2</td><td>500</td><td><span class=\"label label-warning removeRow\" style=\"width:20px;cursor:pointer;\">cancel</span></td></tr><tr class=\"allTheQuotationRow\"><td>Vinyl Backlite</td><td contenteditable=\"\" class=\"priceChangeField\">280</td><td contenteditable=\"\" class=\"quantityChangeField\">2</td><td>560</td><td><span class=\"label label-warning removeRow\" style=\"width:20px;cursor:pointer;\">cancel</span></td></tr><tr id=\"lastTotalRow3333\"><td></td><td></td><td></td><th>Total Amount</th><td></td></tr><tr id=\"lastTotalRow\"><td>total</td><td></td><td></td><td>1200</td></tr></tbody>\n	                    </table>', 'Gautham Pujari', 'National Geographic Channel', 'email@gmail.com', '4858865288', 'Front Lite Normal Flex,Backlite,Vinyl Backlite', 'they  want each of them 2 pices', '-', 'followup', 18, '', '2018-07-07 06:18:04', '2018-01-22 10:10:58'),
(40, 23, '{\"Front_Lite_Normal_Flex\":[{\"Price\":\"70\",\"Quantity\":\"2\",\"Amount\":\"140\"}],\"Backlite\":[{\"Price\":\"250\",\"Quantity\":\"2\",\"Amount\":\"500\"}],\"Vinyl_Backlite\":[{\"Price\":\"280\",\"Quantity\":\"2\",\"Amount\":\"560\"}],\"0\":\"[object Object]\",\"total\":[{\"Price\":null,\"Quantity\":null,\"Amount\":\"1200\"}]}', '<table class=\"table table-bordered\" id=\"showQuotation\" style=\"margin-top: 40px;\">\n	                    	<thead>\n	                    		<tr><th>Product Name</th>\n	                    		<th>Price</th> \n	                    		<th>Quantity</th>\n	                    		<th>Amount</th> \n	                    		<th>Action</th> \n	                    	</tr></thead>\n\n	                    	<tbody>\n	                    		 \n	                    	<tr class=\"allTheQuotationRow\"><td>Front Lite Normal Flex</td><td contenteditable=\"\" class=\"priceChangeField\">70</td><td contenteditable=\"\" class=\"quantityChangeField\">2</td><td>140</td><td><span class=\"label label-warning removeRow\" style=\"width:20px;cursor:pointer;\">cancel</span></td></tr><tr class=\"allTheQuotationRow\"><td>Backlite</td><td contenteditable=\"\" class=\"priceChangeField\">250</td><td contenteditable=\"\" class=\"quantityChangeField\">2</td><td>500</td><td><span class=\"label label-warning removeRow\" style=\"width:20px;cursor:pointer;\">cancel</span></td></tr><tr class=\"allTheQuotationRow\"><td>Vinyl Backlite</td><td contenteditable=\"\" class=\"priceChangeField\">280</td><td contenteditable=\"\" class=\"quantityChangeField\">2</td><td>560</td><td><span class=\"label label-warning removeRow\" style=\"width:20px;cursor:pointer;\">cancel</span></td></tr><tr id=\"lastTotalRow3333\"><td></td><td></td><td></td><th>Total Amount</th><td></td></tr><tr id=\"lastTotalRow\"><td>total</td><td></td><td></td><td>1200</td></tr></tbody>\n	                    </table>', 'Gautham Pujari', 'National Geographic Channel', 'email@gmail.com', '4858865288', 'Front Lite Normal Flex,Backlite,Vinyl Backlite', 'they  want each of them 2 pices', '-', 'followup', 18, '', '2018-07-07 06:18:04', '2018-01-22 10:10:58'),
(41, 24, '{\"Vinyl_Backlite\":[{\"Price\":\"280\",\"Quantity\":\"1\",\"Amount\":\"280\"}],\"Backlite\":[{\"Price\":\"250\",\"Quantity\":\"1\",\"Amount\":\"250\"}],\"Star_Flex\":[{\"Price\":\"25\",\"Quantity\":\"1\",\"Amount\":\"25\"}],\"Steel\":[{\"Price\":\"18\",\"Quantity\":\"1\",\"Amount\":\"18\"}],\"Standy_Scrolling_4_x_6.5\":[{\"Price\":\"2088\",\"Quantity\":\"2\",\"Amount\":\"4176\"}],\"Star_Flex_With_Standy_4_x_6.5\":[{\"Price\":\"2218\",\"Quantity\":\"2\",\"Amount\":\"4436\"}],\"Frosted_With_Pco_Solvent_Print\":[{\"Price\":\"75\",\"Quantity\":\"2\",\"Amount\":\"150\"}],\"Standy_Scrolling_2.5_x_6.5\":[{\"Price\":\"1304\",\"Quantity\":\"2\",\"Amount\":\"2608\"}],\"Star_Flex_With_Standy_3_x_6.5\":[{\"Price\":\"1450\",\"Quantity\":\"4\",\"Amount\":\"5800\"}],\"One_Way_Vision_110_Solvent_Vinyl\":[{\"Price\":\"75\",\"Quantity\":\"5\",\"Amount\":\"375\"}],\"Standy_Scrolling_2_x_5\":[{\"Price\":\"1195\",\"Quantity\":\"2\",\"Amount\":\"2390\"}],\"0\":\"[object Object]\",\"total\":[{\"Price\":null,\"Quantity\":null,\"Amount\":\"20508\"}],\"gst\":[{\"Price\":null,\"Quantity\":null,\"Amount\":\"24199.44\"}]}', '<table class=\"table table-bordered\" style=\"margin-top: 40px;\" id=\"showQuotation\">\n	                    	<thead>\n	                    		<tr><th>Product Name</th>\n	                    		<th>Price</th> \n	                    		<th>Quantity</th>\n	                    		<th>Amount</th> \n	                            <th>Discount</th>\n	                    		<th id=\"actionColumn\">Action</th> \n	                    	</tr></thead>\n\n	                    	<tbody>\n	                    		 \n	                    	<tr class=\"allTheQuotationRow\"><td>Vinyl Backlite</td><td contenteditable=\"\" class=\"priceChangeField\">280</td><td contenteditable=\"\" class=\"quantityChangeField\">1</td><td>280</td><td class=\"discountPriceColm\" data-discount=\"0\">0</td><td><span class=\"label removeRow label-warning\" style=\"width:20px;cursor:pointer;\">canel</span></td></tr><tr class=\"allTheQuotationRow\"><td>Backlite</td><td contenteditable=\"\" class=\"priceChangeField\">250</td><td contenteditable=\"\" class=\"quantityChangeField\">1</td><td>250</td><td class=\"discountPriceColm\" data-discount=\"0\">0</td><td><span class=\"label removeRow label-warning\" style=\"width:20px;cursor:pointer;\">canel</span></td></tr><tr class=\"allTheQuotationRow\"><td>Star Flex</td><td contenteditable=\"\" class=\"priceChangeField\">25</td><td contenteditable=\"\" class=\"quantityChangeField\">1</td><td>25</td><td class=\"discountPriceColm\" data-discount=\"0\">0</td><td><span class=\"label removeRow label-warning\" style=\"width:20px;cursor:pointer;\">canel</span></td></tr><tr class=\"allTheQuotationRow\"><td>Steel</td><td contenteditable=\"\" class=\"priceChangeField\">18</td><td contenteditable=\"\" class=\"quantityChangeField\">1</td><td>18</td><td class=\"discountPriceColm\" data-discount=\"0\">0</td><td><span class=\"label removeRow label-warning\" style=\"width:20px;cursor:pointer;\">canel</span></td></tr><tr class=\"allTheQuotationRow\"><td>Standy Scrolling 4 x 6.5</td><td contenteditable=\"\" class=\"priceChangeField\">2088</td><td contenteditable=\"\" class=\"quantityChangeField\">2</td><td>4176</td><td class=\"discountPriceColm\" data-discount=\"0\">0</td><td><span class=\"label removeRow label-warning\" style=\"width:20px;cursor:pointer;\">canel</span></td></tr><tr class=\"allTheQuotationRow\"><td>Star Flex With Standy 4 x 6.5</td><td contenteditable=\"\" class=\"priceChangeField\">2218</td><td contenteditable=\"\" class=\"quantityChangeField\">2</td><td>4436</td><td class=\"discountPriceColm\" data-discount=\"10\">443.6</td><td><span class=\"label removeRow label-warning\" style=\"width:20px;cursor:pointer;\">canel</span></td></tr><tr class=\"allTheQuotationRow\"><td>Frosted With Pco Solvent Print</td><td contenteditable=\"\" class=\"priceChangeField\">75</td><td contenteditable=\"\" class=\"quantityChangeField\">2</td><td>150</td><td class=\"discountPriceColm\" data-discount=\"10\">15</td><td><span class=\"label removeRow label-warning\" style=\"width:20px;cursor:pointer;\">canel</span></td></tr><tr class=\"allTheQuotationRow\"><td>Standy Scrolling 2.5 x 6.5</td><td contenteditable=\"\" class=\"priceChangeField\">1304</td><td contenteditable=\"\" class=\"quantityChangeField\">2</td><td>2608</td><td class=\"discountPriceColm\" data-discount=\"10\">260.79999999999995</td><td><span class=\"label removeRow label-warning\" style=\"width:20px;cursor:pointer;\">canel</span></td></tr><tr class=\"allTheQuotationRow\"><td>Star Flex With Standy 3 x 6.5</td><td contenteditable=\"\" class=\"priceChangeField\">1450</td><td contenteditable=\"\" class=\"quantityChangeField\">4</td><td>5800</td><td class=\"discountPriceColm\" data-discount=\"50\">2900</td><td><span class=\"label removeRow label-warning\" style=\"width:20px;cursor:pointer;\">canel</span></td></tr><tr class=\"allTheQuotationRow\"><td>One Way Vision 110 Solvent Vinyl</td><td contenteditable=\"\" class=\"priceChangeField\">75</td><td contenteditable=\"\" class=\"quantityChangeField\">5</td><td>375</td><td class=\"discountPriceColm\" data-discount=\"1\">3.75</td><td><span class=\"label removeRow label-warning\" style=\"width:20px;cursor:pointer;\">canel</span></td></tr><tr class=\"allTheQuotationRow\"><td>Standy Scrolling 2 x 5</td><td contenteditable=\"\" class=\"priceChangeField\">1195</td><td contenteditable=\"\" class=\"quantityChangeField\">2</td><td>2390</td><td class=\"discountPriceColm\" data-discount=\"10\">239.00</td><td><span class=\"label removeRow label-warning\" style=\"width:20px;cursor:pointer;\">canel</span></td></tr><tr id=\"lastTotalRow3333\"><td></td><td></td><td></td><th>Total Amount</th><th>Discount Amount</th><td></td></tr><tr id=\"lastTotalRow\"><td>total</td><td></td><td></td><td>20508</td><td>3862.15</td><td></td></tr><tr id=\"gstShowingRow\"><td>gst</td><td></td><td></td><td>24199.44</td><td></td><td></td></tr></tbody>\n	                    </table>', 'Hemanth Raj', 'EBS LPA', 'email@gmail.com', '8722800555', 'Backlite,Vinyl Backlite,2D Board With Tube Lites 5 \"Inch\" Box', 'he needs 4x8 backlight', 'Cubbon pet ,bangalore - 56002     -', 'approved', 18, '', '2018-07-07 06:20:35', '2018-01-26 10:22:06'),
(42, 24, '{\"Vinyl_Backlite\":[{\"Price\":\"280\",\"Quantity\":\"1\",\"Amount\":\"280\"}],\"Backlite\":[{\"Price\":\"250\",\"Quantity\":\"1\",\"Amount\":\"250\"}],\"Star_Flex\":[{\"Price\":\"25\",\"Quantity\":\"1\",\"Amount\":\"25\"}],\"Steel\":[{\"Price\":\"18\",\"Quantity\":\"1\",\"Amount\":\"18\"}],\"Standy_Scrolling_4_x_6.5\":[{\"Price\":\"2088\",\"Quantity\":\"2\",\"Amount\":\"4176\"}],\"Star_Flex_With_Standy_4_x_6.5\":[{\"Price\":\"2218\",\"Quantity\":\"2\",\"Amount\":\"4436\"}],\"Frosted_With_Pco_Solvent_Print\":[{\"Price\":\"75\",\"Quantity\":\"2\",\"Amount\":\"150\"}],\"Standy_Scrolling_2.5_x_6.5\":[{\"Price\":\"1304\",\"Quantity\":\"2\",\"Amount\":\"2608\"}],\"Star_Flex_With_Standy_3_x_6.5\":[{\"Price\":\"1450\",\"Quantity\":\"4\",\"Amount\":\"5800\"}],\"One_Way_Vision_110_Solvent_Vinyl\":[{\"Price\":\"75\",\"Quantity\":\"5\",\"Amount\":\"375\"}],\"Standy_Scrolling_2_x_5\":[{\"Price\":\"1195\",\"Quantity\":\"2\",\"Amount\":\"2390\"}],\"0\":\"[object Object]\",\"total\":[{\"Price\":null,\"Quantity\":null,\"Amount\":\"20508\"}],\"gst\":[{\"Price\":null,\"Quantity\":null,\"Amount\":\"24199.44\"}]}', '<table class=\"table table-bordered\" style=\"margin-top: 40px;\" id=\"showQuotation\">\n	                    	<thead>\n	                    		<tr><th>Product Name</th>\n	                    		<th>Price</th> \n	                    		<th>Quantity</th>\n	                    		<th>Amount</th> \n	                            <th>Discount</th>\n	                    		<th id=\"actionColumn\">Action</th> \n	                    	</tr></thead>\n\n	                    	<tbody>\n	                    		 \n	                    	<tr class=\"allTheQuotationRow\"><td>Vinyl Backlite</td><td contenteditable=\"\" class=\"priceChangeField\">280</td><td contenteditable=\"\" class=\"quantityChangeField\">1</td><td>280</td><td class=\"discountPriceColm\" data-discount=\"0\">0</td><td><span class=\"label removeRow label-warning\" style=\"width:20px;cursor:pointer;\">canel</span></td></tr><tr class=\"allTheQuotationRow\"><td>Backlite</td><td contenteditable=\"\" class=\"priceChangeField\">250</td><td contenteditable=\"\" class=\"quantityChangeField\">1</td><td>250</td><td class=\"discountPriceColm\" data-discount=\"0\">0</td><td><span class=\"label removeRow label-warning\" style=\"width:20px;cursor:pointer;\">canel</span></td></tr><tr class=\"allTheQuotationRow\"><td>Star Flex</td><td contenteditable=\"\" class=\"priceChangeField\">25</td><td contenteditable=\"\" class=\"quantityChangeField\">1</td><td>25</td><td class=\"discountPriceColm\" data-discount=\"0\">0</td><td><span class=\"label removeRow label-warning\" style=\"width:20px;cursor:pointer;\">canel</span></td></tr><tr class=\"allTheQuotationRow\"><td>Steel</td><td contenteditable=\"\" class=\"priceChangeField\">18</td><td contenteditable=\"\" class=\"quantityChangeField\">1</td><td>18</td><td class=\"discountPriceColm\" data-discount=\"0\">0</td><td><span class=\"label removeRow label-warning\" style=\"width:20px;cursor:pointer;\">canel</span></td></tr><tr class=\"allTheQuotationRow\"><td>Standy Scrolling 4 x 6.5</td><td contenteditable=\"\" class=\"priceChangeField\">2088</td><td contenteditable=\"\" class=\"quantityChangeField\">2</td><td>4176</td><td class=\"discountPriceColm\" data-discount=\"0\">0</td><td><span class=\"label removeRow label-warning\" style=\"width:20px;cursor:pointer;\">canel</span></td></tr><tr class=\"allTheQuotationRow\"><td>Star Flex With Standy 4 x 6.5</td><td contenteditable=\"\" class=\"priceChangeField\">2218</td><td contenteditable=\"\" class=\"quantityChangeField\">2</td><td>4436</td><td class=\"discountPriceColm\" data-discount=\"10\">443.6</td><td><span class=\"label removeRow label-warning\" style=\"width:20px;cursor:pointer;\">canel</span></td></tr><tr class=\"allTheQuotationRow\"><td>Frosted With Pco Solvent Print</td><td contenteditable=\"\" class=\"priceChangeField\">75</td><td contenteditable=\"\" class=\"quantityChangeField\">2</td><td>150</td><td class=\"discountPriceColm\" data-discount=\"10\">15</td><td><span class=\"label removeRow label-warning\" style=\"width:20px;cursor:pointer;\">canel</span></td></tr><tr class=\"allTheQuotationRow\"><td>Standy Scrolling 2.5 x 6.5</td><td contenteditable=\"\" class=\"priceChangeField\">1304</td><td contenteditable=\"\" class=\"quantityChangeField\">2</td><td>2608</td><td class=\"discountPriceColm\" data-discount=\"10\">260.79999999999995</td><td><span class=\"label removeRow label-warning\" style=\"width:20px;cursor:pointer;\">canel</span></td></tr><tr class=\"allTheQuotationRow\"><td>Star Flex With Standy 3 x 6.5</td><td contenteditable=\"\" class=\"priceChangeField\">1450</td><td contenteditable=\"\" class=\"quantityChangeField\">4</td><td>5800</td><td class=\"discountPriceColm\" data-discount=\"50\">2900</td><td><span class=\"label removeRow label-warning\" style=\"width:20px;cursor:pointer;\">canel</span></td></tr><tr class=\"allTheQuotationRow\"><td>One Way Vision 110 Solvent Vinyl</td><td contenteditable=\"\" class=\"priceChangeField\">75</td><td contenteditable=\"\" class=\"quantityChangeField\">5</td><td>375</td><td class=\"discountPriceColm\" data-discount=\"1\">3.75</td><td><span class=\"label removeRow label-warning\" style=\"width:20px;cursor:pointer;\">canel</span></td></tr><tr class=\"allTheQuotationRow\"><td>Standy Scrolling 2 x 5</td><td contenteditable=\"\" class=\"priceChangeField\">1195</td><td contenteditable=\"\" class=\"quantityChangeField\">2</td><td>2390</td><td class=\"discountPriceColm\" data-discount=\"10\">239.00</td><td><span class=\"label removeRow label-warning\" style=\"width:20px;cursor:pointer;\">canel</span></td></tr><tr id=\"lastTotalRow3333\"><td></td><td></td><td></td><th>Total Amount</th><th>Discount Amount</th><td></td></tr><tr id=\"lastTotalRow\"><td>total</td><td></td><td></td><td>20508</td><td>3862.15</td><td></td></tr><tr id=\"gstShowingRow\"><td>gst</td><td></td><td></td><td>24199.44</td><td></td><td></td></tr></tbody>\n	                    </table>', 'Hemanth Raj', 'EBS LPA', 'email@gmail.com', '8722800555', 'Backlite,Vinyl Backlite,2D Board With Tube Lites 5 \"Inch\" Box', 'he needs 4x8 backlight', 'Cubbon pet ,bangalore - 56002     -', 'approved', 18, '', '2018-07-07 06:20:35', '2018-01-25 10:17:57');
INSERT INTO `sent_quotation_data` (`id`, `customer_id`, `quotation_data`, `generated_table`, `customer_name`, `company_name`, `email`, `phone`, `product_name`, `product_description`, `address`, `status`, `gst_percentage`, `refined_table`, `created_at`, `updated_at`) VALUES
(45, 38, '{\"Steel\":[{\"Price\":\"18\",\"Quantity\":\"1\",\"Amount\":\"18\"},{\"Price\":\"18\",\"Quantity\":\"1\",\"Amount\":\"18\"},{\"Price\":\"18\",\"Quantity\":\"1\",\"Amount\":\"18\"},{\"Price\":\"18\",\"Quantity\":\"2\",\"Amount\":\"36\"},{\"Price\":\"18\",\"Quantity\":\"2\",\"Amount\":\"36\"}],\"Backlite\":[{\"Price\":\"250\",\"Quantity\":\"1\",\"Amount\":\"250\"},{\"Price\":\"250\",\"Quantity\":\"1\",\"Amount\":\"250\"}],\"Standy_Scrolling_2.5_x_6.5\":[{\"Price\":\"1304\",\"Quantity\":\"1\",\"Amount\":\"1304\"}],\"Standy_Scrolling_4_x_6.5\":[{\"Price\":\"2088\",\"Quantity\":\"1\",\"Amount\":\"2088\"}],\"0\":\"[object Object]\",\"total\":[{\"Price\":null,\"Quantity\":null,\"Amount\":\"4018\"}],\"gst\":[{\"Price\":null,\"Quantity\":null,\"Amount\":\"4741.24\"}]}', '<table class=\"table table-bordered\" style=\"margin-top: 40px;\" id=\"showQuotation\" data-gst=\"18\">\n	                    	<thead>\n	                    		<tr><th>Product Name</th>\n	                    		<th>Product  Description</th> \n	                    		<th>Price</th>\n	                    		<th>Quantity</th> \n	                        <th>Amount</th>\n	                    		<th id=\"actionColumn\">Discount</th> \n                          <th>Action</th>  \n	                    	</tr></thead>\n\n	                    	<tbody>\n	                    		 \n	                    	<tr class=\"allTheQuotationRow\"><td>Steel</td><td contenteditable=\"\">this is one of the haloween product</td><td contenteditable=\"\" class=\"priceChangeField\">18</td><td contenteditable=\"\" class=\"quantityChangeField\">1</td><td>18</td><td class=\"discountPriceColm\" data-discount=\"0\">0</td><td><span class=\"label removeRow label-warning\" style=\"width:20px;cursor:pointer;\">cancel</span></td></tr><tr class=\"allTheQuotationRow\"><td>Steel</td><td contenteditable=\"\">this is one of the haloween product</td><td contenteditable=\"\" class=\"priceChangeField\">18</td><td contenteditable=\"\" class=\"quantityChangeField\">1</td><td>18</td><td class=\"discountPriceColm\" data-discount=\"0\">0</td><td><span class=\"label removeRow label-warning\" style=\"width:20px;cursor:pointer;\">cancel</span></td></tr><tr class=\"allTheQuotationRow\"><td>Steel</td><td contenteditable=\"\">this is one of the haloween product</td><td contenteditable=\"\" class=\"priceChangeField\">18</td><td contenteditable=\"\" class=\"quantityChangeField\">1</td><td>18</td><td class=\"discountPriceColm\" data-discount=\"0\">0</td><td><span class=\"label removeRow label-warning\" style=\"width:20px;cursor:pointer;\">cancel</span></td></tr><tr class=\"allTheQuotationRow\"><td>Backlite</td><td contenteditable=\"\"></td><td contenteditable=\"\" class=\"priceChangeField\">250</td><td contenteditable=\"\" class=\"quantityChangeField\">1</td><td>250</td><td class=\"discountPriceColm\" data-discount=\"0\">0</td><td><span class=\"label removeRow label-warning\" style=\"width:20px;cursor:pointer;\">cancel</span></td></tr><tr class=\"allTheQuotationRow\"><td>Backlite</td><td contenteditable=\"\"></td><td contenteditable=\"\" class=\"priceChangeField\">250</td><td contenteditable=\"\" class=\"quantityChangeField\">1</td><td>250</td><td class=\"discountPriceColm\" data-discount=\"0\">0</td><td><span class=\"label removeRow label-warning\" style=\"width:20px;cursor:pointer;\">cancel</span></td></tr><tr class=\"allTheQuotationRow\"><td>Standy Scrolling 2.5 x 6.5</td><td contenteditable=\"\"></td><td contenteditable=\"\" class=\"priceChangeField\">1304</td><td contenteditable=\"\" class=\"quantityChangeField\">1</td><td>1304</td><td class=\"discountPriceColm\" data-discount=\"0\">0</td><td><span class=\"label removeRow label-warning\" style=\"width:20px;cursor:pointer;\">cancel</span></td></tr><tr class=\"allTheQuotationRow\"><td>Standy Scrolling 4 x 6.5</td><td contenteditable=\"\"></td><td contenteditable=\"\" class=\"priceChangeField\">2088</td><td contenteditable=\"\" class=\"quantityChangeField\">1</td><td>2088</td><td class=\"discountPriceColm\" data-discount=\"0\">0</td><td><span class=\"label removeRow label-warning\" style=\"width:20px;cursor:pointer;\">cancel</span></td></tr><tr class=\"allTheQuotationRow\"><td>Steel</td><td>this is one of the haloween product</td><td contenteditable=\"\" class=\"priceChangeField\">18</td><td contenteditable=\"\" class=\"quantityChangeField\">2</td><td>36</td><td class=\"discountPriceColm\" data-discount=\"10\">3.60</td><td><span class=\"label removeRow label-warning\" style=\"width:20px;cursor:pointer;\">canel</span></td></tr><tr class=\"allTheQuotationRow\"><td>Steel</td><td>this is one of the haloween product</td><td contenteditable=\"\" class=\"priceChangeField\">18</td><td contenteditable=\"\" class=\"quantityChangeField\">2</td><td>36</td><td class=\"discountPriceColm\" data-discount=\"10\">3.60</td><td><span class=\"label removeRow label-warning\" style=\"width:20px;cursor:pointer;\">canel</span></td></tr><tr id=\"lastTotalRow3333\"><td></td><td></td><td></td><td></td><th>Total Amount</th><th>Discount Amount</th><td></td></tr><tr id=\"lastTotalRow\"><td>total</td><td></td><td></td><td></td><td>4018</td><td>7.2</td><td></td></tr><tr id=\"gstShowingRow\"><td>gst</td><td></td><td></td><td></td><td>4741.24</td><td></td><td></td></tr></tbody>\n	                    </table>', 'Sneha', 'Skyline', 'email@gmail.com', '09845827685', 'Backlite', '15x20 backlite they want', 'Cubbon pet ,bangalore - 56002  Bangalore  Karnataka - 560097', 'followup', 18, '<table class=\"table table-bordered\" style=\"margin-top: 40px;\" id=\"showQuotation\" data-gst=\"18\">\n	                    	<thead>\n	                    		<tr><th>Product Name</th>\n	                    		<th>Product  Description</th> \n	                    		<th>Price</th>\n	                    		<th>Quantity</th> \n	                        <th>Amount</th>\n	                    		<th id=\"actionColumn\">Discount</th> \n                            \n	                    	</tr></thead>\n\n	                    	<tbody>\n	                    		 \n	                    	<tr class=\"allTheQuotationRow\"><td>Steel</td><td contenteditable=\"\">this is one of the haloween product</td><td contenteditable=\"\" class=\"priceChangeField\">18</td><td contenteditable=\"\" class=\"quantityChangeField\">1</td><td>18</td><td class=\"discountPriceColm\" data-discount=\"0\">0</td></tr><tr class=\"allTheQuotationRow\"><td>Steel</td><td contenteditable=\"\">this is one of the haloween product</td><td contenteditable=\"\" class=\"priceChangeField\">18</td><td contenteditable=\"\" class=\"quantityChangeField\">1</td><td>18</td><td class=\"discountPriceColm\" data-discount=\"0\">0</td></tr><tr class=\"allTheQuotationRow\"><td>Steel</td><td contenteditable=\"\">this is one of the haloween product</td><td contenteditable=\"\" class=\"priceChangeField\">18</td><td contenteditable=\"\" class=\"quantityChangeField\">1</td><td>18</td><td class=\"discountPriceColm\" data-discount=\"0\">0</td></tr><tr class=\"allTheQuotationRow\"><td>Backlite</td><td contenteditable=\"\"></td><td contenteditable=\"\" class=\"priceChangeField\">250</td><td contenteditable=\"\" class=\"quantityChangeField\">1</td><td>250</td><td class=\"discountPriceColm\" data-discount=\"0\">0</td></tr><tr class=\"allTheQuotationRow\"><td>Backlite</td><td contenteditable=\"\"></td><td contenteditable=\"\" class=\"priceChangeField\">250</td><td contenteditable=\"\" class=\"quantityChangeField\">1</td><td>250</td><td class=\"discountPriceColm\" data-discount=\"0\">0</td></tr><tr class=\"allTheQuotationRow\"><td>Standy Scrolling 2.5 x 6.5</td><td contenteditable=\"\"></td><td contenteditable=\"\" class=\"priceChangeField\">1304</td><td contenteditable=\"\" class=\"quantityChangeField\">1</td><td>1304</td><td class=\"discountPriceColm\" data-discount=\"0\">0</td></tr><tr class=\"allTheQuotationRow\"><td>Standy Scrolling 4 x 6.5</td><td contenteditable=\"\"></td><td contenteditable=\"\" class=\"priceChangeField\">2088</td><td contenteditable=\"\" class=\"quantityChangeField\">1</td><td>2088</td><td class=\"discountPriceColm\" data-discount=\"0\">0</td></tr><tr class=\"allTheQuotationRow\"><td>Steel</td><td>this is one of the haloween product</td><td contenteditable=\"\" class=\"priceChangeField\">18</td><td contenteditable=\"\" class=\"quantityChangeField\">2</td><td>36</td><td class=\"discountPriceColm\" data-discount=\"10\">3.60</td></tr><tr class=\"allTheQuotationRow\"><td>Steel</td><td>this is one of the haloween product</td><td contenteditable=\"\" class=\"priceChangeField\">18</td><td contenteditable=\"\" class=\"quantityChangeField\">2</td><td>36</td><td class=\"discountPriceColm\" data-discount=\"10\">3.60</td></tr><tr id=\"lastTotalRow3333\"><td></td><td></td><td></td><td></td><th>Total Amount</th><th>Discount Amount</th></tr><tr id=\"lastTotalRow\"><td>total</td><td></td><td></td><td></td><td>4018</td><td>7.2</td></tr><tr id=\"gstShowingRow\"><td>gst</td><td></td><td></td><td></td><td>4741.24</td><td></td></tr></tbody>\n	                    </table>', '2018-07-07 06:18:04', '2018-01-30 05:27:29');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_details`
--

CREATE TABLE `supplier_details` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `from_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `to_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier_details`
--

INSERT INTO `supplier_details` (`id`, `customer_id`, `supplier_id`, `from_date`, `to_date`, `created_at`, `updated_at`) VALUES
(21, 9, 27, '2018-01-27 12:21:57', '0000-00-00 00:00:00', '2018-01-15 16:51:58', '2018-01-15 16:51:58'),
(22, 9, 27, '2018-01-27 12:21:57', '0000-00-00 00:00:00', '2018-01-15 17:12:01', '2018-01-15 17:12:01'),
(23, 24, 27, '2018-01-27 12:21:57', '0000-00-00 00:00:00', '2018-01-23 07:12:36', '2018-01-23 07:12:36'),
(24, 24, 27, '2018-01-27 12:21:57', '0000-00-00 00:00:00', '2018-01-23 07:13:19', '2018-01-23 07:13:19'),
(25, 25, 27, '2018-01-27 12:21:57', '0000-00-00 00:00:00', '2018-01-27 12:09:18', '2018-01-27 12:09:18'),
(26, 9, 27, '2018-01-27 12:23:13', '2018-01-27 12:23:13', '2018-01-27 12:23:13', '2018-01-27 12:23:13'),
(27, 25, 27, '2018-01-27 12:36:00', '2018-01-31 12:36:00', '2018-01-27 12:36:31', '2018-01-27 12:36:31'),
(28, 38, 27, '2018-01-30 06:03:00', '2018-01-31 06:03:00', '2018-01-30 06:09:00', '2018-01-30 06:09:00'),
(29, 38, 28, NULL, '2018-01-30 13:46:42', '2018-01-30 13:46:42', '2018-01-30 13:46:42'),
(30, 38, 28, '2018-01-30 13:47:00', '2018-01-31 13:47:00', '2018-01-30 13:47:19', '2018-01-30 13:47:19'),
(31, 38, 28, '2018-01-30 13:47:00', '2018-01-31 13:47:00', '2018-01-30 13:47:52', '2018-01-30 13:47:52'),
(32, 38, 28, '2018-01-30 13:47:00', '2018-01-31 13:47:00', '2018-01-30 13:49:42', '2018-01-30 13:49:42'),
(33, 38, 28, '2018-01-30 13:47:00', '2018-01-31 13:47:00', '2018-01-30 14:06:20', '2018-01-30 14:06:20'),
(34, 38, 28, '2018-01-30 13:47:00', '2018-01-31 13:47:00', '2018-01-30 14:07:13', '2018-01-30 14:07:13'),
(35, 38, 28, '2018-01-30 13:47:00', '2018-01-31 13:47:00', '2018-01-30 14:09:08', '2018-01-30 14:09:08'),
(36, 38, 28, '2018-01-30 13:47:00', '2018-01-31 13:47:00', '2018-01-30 14:09:54', '2018-01-30 14:09:54'),
(37, 38, 28, '2018-01-30 13:47:00', '2018-01-31 13:47:00', '2018-01-30 14:10:55', '2018-01-30 14:10:55');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(4, 'Ejaz Anwar', 'ejazanwar777123@gmail.com', 'emp', '$2y$10$ryYXkRNkhhzCwa11iTXRr.MSYvVhWtchcA2jJkS7x4Qmnjj7UNTCG', 'UI5HTJJ6VrRzsJ0Todw1RlZ27XFmYXYWf6MVDiTNCwNwKRLOST7uEjnCSZzP', '2017-12-30 17:48:31', '2018-01-25 06:12:33'),
(5, 'Ejaz Anwar', 'ejazanwar77789@gmail.com', 'admin', '$2y$10$m7b95E6j041NmM/Y3rrnWOjuMLn46VvxcMTBapguTuSeK2tNRzb7O', NULL, '2017-12-30 18:02:14', '2018-01-05 13:15:19'),
(6, 'Ejaz Anwar', 'ejazanwar123@gmail.com', 'admin', '$2y$10$dqcSqyPiT5wR46f7xPlx9eOEhZUTr0vJmPEZ9zjmx43h8Z6AuHP/S', NULL, '2017-12-30 18:09:21', '2018-01-05 12:51:10'),
(7, 'Ejaz Anwar', 'ejazanwar777@gmail.com', NULL, '$2y$10$uQi2pW56y0barqvsHDzZEOMCQ4Hd1pktqu/g8EB0bN/zM8hPnq0TW', '3MOc3Qr4m1SNGcA2NCkNDiS35HTFStteSh8Iiqs7VdUIrCGWklC4rqbvZg63', '2018-01-01 07:27:22', '2018-07-07 05:41:12'),
(8, 'Bhangara', 'bhangar@gmail.com', 'admin', '$2y$10$XA169hZ3abmAOVYxERyvie25KRBo73KwpWrbf..c.Ra7A/tlE1OjW', NULL, '2018-01-12 10:05:34', '2018-01-15 01:19:02'),
(9, 'Ejaz Anwar', 'ejazanwar@gmail.com', NULL, '$2y$10$ff0.abyv2qLZO.hkhTVYp.OViyxZjqIy3jP8HtBavC.9d092IR5Ve', 'JegmckgsrGn3KzKQ6jxJjJZAwIW3hqVrDZxT65tKtLvIQtwjYGsRCeQyaSo7', '2018-01-15 01:18:36', '2018-01-15 01:18:36'),
(10, 'Ejaz Anwar', 'ggsgowtham17@gmail.com', NULL, '$2y$10$9LAGZbtKTXpAFHEDJd3P7.YT4qSW1mTrFXFBdPoPxiEKsriLGmBbG', NULL, '2018-01-15 01:20:23', '2018-01-15 01:20:23'),
(11, 'aadasas', 'dsmdsds@gmail.com', NULL, '$2y$10$CbuwRE5/v.NFNh8si2LjveCe0LVma0nsbXeWq9PRnxo8ZNM8ivi/u', NULL, '2018-01-25 06:23:20', '2018-01-25 06:23:20'),
(12, 'Pankaj Das', 'pankaj@gmail.com', 'admin', '$2y$10$xIE/.NjP332iWjq0UYaBGOKDo5BIVIsmcYtK0YslVOYaWO4BGo4yO', '4Q6jeuOT2d64SVcFuKvIzTgl74uv6X5RYdQWQW4fQVYpUTuVOA8LQZGaXeVs', '2018-01-25 06:30:41', '2018-01-25 06:30:41'),
(13, 'sheik zakir', 'zakir@gmail.com', 'emp', '$2y$10$eJyzpXw2e0wZik8FOK6bpu.43si3drPSrjf/.sUYgamcbD2WW4dcu', NULL, '2018-01-25 06:44:10', '2018-01-25 06:44:10');

-- --------------------------------------------------------

--
-- Table structure for table `website_team`
--

CREATE TABLE `website_team` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `all_cashiers`
--
ALTER TABLE `all_cashiers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `all_suppliers`
--
ALTER TABLE `all_suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_payment`
--
ALTER TABLE `customer_payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `delivery_note`
--
ALTER TABLE `delivery_note`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `final_invoice`
--
ALTER TABLE `final_invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `internal_refrer`
--
ALTER TABLE `internal_refrer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marketing_team`
--
ALTER TABLE `marketing_team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `new_customer`
--
ALTER TABLE `new_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `new_job`
--
ALTER TABLE `new_job`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `performa_invoice`
--
ALTER TABLE `performa_invoice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_expenses`
--
ALTER TABLE `project_expenses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `projectexpenses` (`customer_id`);

--
-- Indexes for table `project_expenses_data`
--
ALTER TABLE `project_expenses_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `sent_quotation_data`
--
ALTER TABLE `sent_quotation_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `supplier_details`
--
ALTER TABLE `supplier_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `website_team`
--
ALTER TABLE `website_team`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `all_cashiers`
--
ALTER TABLE `all_cashiers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `all_suppliers`
--
ALTER TABLE `all_suppliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `customer_payment`
--
ALTER TABLE `customer_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `delivery_note`
--
ALTER TABLE `delivery_note`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `final_invoice`
--
ALTER TABLE `final_invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `internal_refrer`
--
ALTER TABLE `internal_refrer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `marketing_team`
--
ALTER TABLE `marketing_team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `new_customer`
--
ALTER TABLE `new_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `new_job`
--
ALTER TABLE `new_job`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `performa_invoice`
--
ALTER TABLE `performa_invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `project_expenses`
--
ALTER TABLE `project_expenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `project_expenses_data`
--
ALTER TABLE `project_expenses_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;
--
-- AUTO_INCREMENT for table `sent_quotation_data`
--
ALTER TABLE `sent_quotation_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `supplier_details`
--
ALTER TABLE `supplier_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `website_team`
--
ALTER TABLE `website_team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer_payment`
--
ALTER TABLE `customer_payment`
  ADD CONSTRAINT `customer_payment_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `new_customer` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `new_job`
--
ALTER TABLE `new_job`
  ADD CONSTRAINT `new_job_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `new_customer` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `performa_invoice`
--
ALTER TABLE `performa_invoice`
  ADD CONSTRAINT `performa_invoice_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `new_customer` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sent_quotation_data`
--
ALTER TABLE `sent_quotation_data`
  ADD CONSTRAINT `sent_quotation_data_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `new_customer` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `supplier_details`
--
ALTER TABLE `supplier_details`
  ADD CONSTRAINT `supplier_details_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `new_customer` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
