-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2024 at 08:57 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `storedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `app_clients`
--

CREATE TABLE `app_clients` (
  `ClientId` int(10) UNSIGNED NOT NULL,
  `Name` varchar(40) NOT NULL,
  `NameAr` varchar(40) NOT NULL,
  `PhoneNumber` varchar(15) NOT NULL,
  `Email` varchar(40) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `AddressAr` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `app_clients`
--

INSERT INTO `app_clients` (`ClientId`, `Name`, `NameAr`, `PhoneNumber`, `Email`, `Address`, `AddressAr`) VALUES
(1, 'Osama Mohamed Sayed', 'اسامه محمد سيد', '01262139465', 'Osama12@Gmail.com', 'Aswan - Shawerbe street - section 5', 'اسوان - شارع الشوربي - قسم 5');

-- --------------------------------------------------------

--
-- Table structure for table `app_expenses_categories`
--

CREATE TABLE `app_expenses_categories` (
  `ExpenseId` tinyint(3) UNSIGNED NOT NULL,
  `ExpenseName` varchar(30) NOT NULL,
  `ExpenseNameAr` varchar(30) NOT NULL,
  `FixedPayment` decimal(7,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `app_expenses_categories`
--

INSERT INTO `app_expenses_categories` (`ExpenseId`, `ExpenseName`, `ExpenseNameAr`, `FixedPayment`) VALUES
(1, 'water bills', 'فاتورة المياه', 120.00);

-- --------------------------------------------------------

--
-- Table structure for table `app_expenses_daily_list`
--

CREATE TABLE `app_expenses_daily_list` (
  `DExpensesId` int(10) UNSIGNED NOT NULL,
  `ExpenseId` tinyint(3) UNSIGNED NOT NULL,
  `Payment` decimal(7,2) UNSIGNED NOT NULL,
  `Created` datetime NOT NULL,
  `UserId` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `app_notifications`
--

CREATE TABLE `app_notifications` (
  `NotificationId` int(10) UNSIGNED NOT NULL,
  `Title` varchar(30) NOT NULL,
  `Content` varchar(255) NOT NULL,
  `Type` tinyint(3) UNSIGNED NOT NULL,
  `Created` datetime NOT NULL,
  `UserId` int(10) UNSIGNED NOT NULL,
  `Seen` tinyint(1) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `app_notifications`
--

INSERT INTO `app_notifications` (`NotificationId`, `Title`, `Content`, `Type`, `Created`, `UserId`, `Seen`) VALUES
(22, 'new Notification', 'this is notification', 1, '2024-09-16 21:51:10', 25, 1);

-- --------------------------------------------------------

--
-- Table structure for table `app_products_categories`
--

CREATE TABLE `app_products_categories` (
  `CategoryId` int(10) UNSIGNED NOT NULL,
  `Name` varchar(30) NOT NULL,
  `NameAr` varchar(30) NOT NULL,
  `Image` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `app_products_categories`
--

INSERT INTO `app_products_categories` (`CategoryId`, `Name`, `NameAr`, `Image`) VALUES
(21, 'labtops', 'الاجهزة اللوحية', 'cg9ydg_zvbglv_ltmuan_blzyqy_esqwny.jpeg'),
(22, 'Games', 'العاب', 'z2ftzx_muanbn_jdj5jd_a3je85_rvlpzj.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `app_products_list`
--

CREATE TABLE `app_products_list` (
  `ProductId` int(10) UNSIGNED NOT NULL,
  `CategoryId` int(10) UNSIGNED NOT NULL,
  `Name` varchar(50) NOT NULL,
  `NameAr` varchar(50) NOT NULL,
  `Image` varchar(40) DEFAULT NULL,
  `Quantity` smallint(5) UNSIGNED NOT NULL,
  `BuyPrice` decimal(7,2) UNSIGNED NOT NULL,
  `SellPrice` decimal(7,2) UNSIGNED NOT NULL,
  `Unit` tinyint(3) UNSIGNED NOT NULL,
  `BarCode` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `app_purchases_invoices`
--

CREATE TABLE `app_purchases_invoices` (
  `InvoiceId` int(10) UNSIGNED NOT NULL,
  `SupplierId` int(10) UNSIGNED NOT NULL,
  `PaymentType` tinyint(3) UNSIGNED NOT NULL,
  `PaymentStatus` tinyint(3) UNSIGNED NOT NULL,
  `Created` datetime NOT NULL,
  `Discount` decimal(8,2) UNSIGNED DEFAULT NULL,
  `UserId` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `app_purchases_invoices_details`
--

CREATE TABLE `app_purchases_invoices_details` (
  `Id` int(10) UNSIGNED NOT NULL,
  `ProductId` int(10) UNSIGNED NOT NULL,
  `InvoiceId` int(10) UNSIGNED NOT NULL,
  `Quantity` smallint(5) UNSIGNED NOT NULL,
  `ProductPrice` decimal(8,2) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `app_purchases_invoices_receipts`
--

CREATE TABLE `app_purchases_invoices_receipts` (
  `ReceiptId` int(10) UNSIGNED NOT NULL,
  `InvoiceId` int(10) UNSIGNED NOT NULL,
  `PaymentType` tinyint(3) UNSIGNED NOT NULL,
  `PaymentAmount` decimal(8,2) UNSIGNED NOT NULL,
  `PaymentLiteral` varchar(60) NOT NULL,
  `BankName` varchar(30) DEFAULT NULL,
  `BankAcountNumber` varchar(30) DEFAULT NULL,
  `CheckNumber` varchar(15) DEFAULT NULL,
  `TransferedTo` varchar(30) DEFAULT NULL,
  `Created` datetime NOT NULL,
  `UserId` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `app_sales_invoices`
--

CREATE TABLE `app_sales_invoices` (
  `InvoiceId` int(10) UNSIGNED NOT NULL,
  `ClientId` int(10) UNSIGNED NOT NULL,
  `PaymentType` tinyint(3) UNSIGNED NOT NULL,
  `PaymentStatus` tinyint(3) UNSIGNED NOT NULL,
  `Created` datetime NOT NULL,
  `Discount` decimal(8,2) UNSIGNED DEFAULT NULL,
  `UserId` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `app_sales_invoices_details`
--

CREATE TABLE `app_sales_invoices_details` (
  `Id` int(10) UNSIGNED NOT NULL,
  `ProductId` int(10) UNSIGNED NOT NULL,
  `Quantity` smallint(5) UNSIGNED NOT NULL,
  `ProductPrice` decimal(8,2) UNSIGNED NOT NULL,
  `InvoiceId` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `app_sales_invoices_receipts`
--

CREATE TABLE `app_sales_invoices_receipts` (
  `ReceiptId` int(10) UNSIGNED NOT NULL,
  `InvoiceId` int(10) UNSIGNED NOT NULL,
  `PaymentType` tinyint(3) UNSIGNED NOT NULL,
  `PaymentAmount` decimal(8,2) UNSIGNED NOT NULL,
  `PaymentLiteral` varchar(60) NOT NULL,
  `BankName` varchar(30) DEFAULT NULL,
  `BankAcountNumber` varchar(30) DEFAULT NULL,
  `CheckNumber` varchar(15) DEFAULT NULL,
  `TransferedTo` varchar(30) DEFAULT NULL,
  `Created` datetime NOT NULL,
  `UserId` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `app_suppliers`
--

CREATE TABLE `app_suppliers` (
  `SupplierId` int(10) UNSIGNED NOT NULL,
  `Name` varchar(40) NOT NULL,
  `NameAr` varchar(40) NOT NULL,
  `PhoneNumber` varchar(15) NOT NULL,
  `Email` varchar(40) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `AddressAr` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `app_suppliers`
--

INSERT INTO `app_suppliers` (`SupplierId`, `Name`, `NameAr`, `PhoneNumber`, `Email`, `Address`, `AddressAr`) VALUES
(1, 'Ahmed Mohammed Ismail', 'احمد محمد اسماعيل', '01094775632', 'Ahmed123@Mail.com', 'Egypt, Cairo, Nsr City,  Moll Elsrock2', 'مصر - القاهرة مدينة نصر - الشروق مول 2');

-- --------------------------------------------------------

--
-- Table structure for table `app_users`
--

CREATE TABLE `app_users` (
  `UserId` int(10) UNSIGNED NOT NULL,
  `Username` varchar(15) NOT NULL,
  `Password` char(60) NOT NULL,
  `Email` varchar(40) NOT NULL,
  `PhoneNumber` varchar(15) DEFAULT NULL,
  `SubscriptionDate` date NOT NULL,
  `LastLogin` datetime NOT NULL,
  `GroupId` tinyint(3) UNSIGNED NOT NULL,
  `Status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `app_users`
--

INSERT INTO `app_users` (`UserId`, `Username`, `Password`, `Email`, `PhoneNumber`, `SubscriptionDate`, `LastLogin`, `GroupId`, `Status`) VALUES
(20, 'Ahmed', '$2y$07$O9EYif5O2DmWuHQ8S5iYseviaQxosZpU4PFtEBd5YC2Dw1IvAPUGi', 'a@y.com', '0123345678901', '2024-08-03', '2024-08-05 12:11:58', 41, 1),
(25, 'Eslam', '$2y$07$O9EYif5O2DmWuHQ8S5iYseviaQxosZpU4PFtEBd5YC2Dw1IvAPUGi', 'e@en.info', '01012345678', '2024-08-03', '2024-09-23 00:08:39', 41, 1),
(26, 'Esam', '$2y$07$O9EYif5O2DmWuHQ8S5iYseviaQxosZpU4PFtEBd5YC2Dw1IvAPUGi', 'es@gmail.com', '002002323', '2024-08-04', '2024-08-04 10:52:16', 41, 1),
(27, 'mahmoud', '$2y$07$O9EYif5O2DmWuHQ8S5iYseviaQxosZpU4PFtEBd5YC2Dw1IvAPUGi', 'm@G.com', '002002323', '2024-08-05', '2024-08-05 12:02:14', 41, 1);

-- --------------------------------------------------------

--
-- Table structure for table `app_users_groups`
--

CREATE TABLE `app_users_groups` (
  `GroupId` tinyint(3) UNSIGNED NOT NULL,
  `GroupName` varchar(20) NOT NULL,
  `GroupNameAr` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `app_users_groups`
--

INSERT INTO `app_users_groups` (`GroupId`, `GroupName`, `GroupNameAr`) VALUES
(41, 'Administrator', 'مدير تطبيق');

-- --------------------------------------------------------

--
-- Table structure for table `app_users_groups_privileges`
--

CREATE TABLE `app_users_groups_privileges` (
  `Id` tinyint(3) UNSIGNED NOT NULL,
  `GroupId` tinyint(3) UNSIGNED NOT NULL,
  `PrivilegeId` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `app_users_groups_privileges`
--

INSERT INTO `app_users_groups_privileges` (`Id`, `GroupId`, `PrivilegeId`) VALUES
(27, 41, 19),
(28, 41, 20),
(30, 41, 22),
(31, 41, 23),
(32, 41, 24),
(33, 41, 25),
(34, 41, 26),
(35, 41, 27),
(36, 41, 28),
(37, 41, 29),
(38, 41, 30),
(39, 41, 31),
(40, 41, 32),
(41, 41, 33),
(42, 41, 34),
(43, 41, 35),
(44, 41, 36),
(45, 41, 37),
(46, 41, 38),
(47, 41, 39),
(48, 41, 40),
(49, 41, 41),
(50, 41, 42),
(51, 41, 43),
(52, 41, 44),
(53, 41, 45),
(54, 41, 46),
(55, 41, 47),
(56, 41, 48),
(57, 41, 49),
(58, 41, 50),
(59, 41, 51),
(60, 41, 52),
(61, 41, 53),
(62, 41, 54),
(63, 41, 55);

-- --------------------------------------------------------

--
-- Table structure for table `app_users_privileges`
--

CREATE TABLE `app_users_privileges` (
  `PrivilegeId` tinyint(3) UNSIGNED NOT NULL,
  `Privilege` varchar(30) NOT NULL,
  `PrivilegeTitle` varchar(30) NOT NULL,
  `PrivilegeTitleAr` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `app_users_privileges`
--

INSERT INTO `app_users_privileges` (`PrivilegeId`, `Privilege`, `PrivilegeTitle`, `PrivilegeTitleAr`) VALUES
(19, '/privileges/default', 'privileges details', 'عرض الصلاحيات'),
(20, '/privileges/create', 'new privilege', 'إضافة صلاحية جديدة'),
(22, '/privileges/edit', 'Privileges Modifying', 'تعديل الصلاحيات'),
(23, '/privileges/delete', 'Deleting Privileges', 'حذف الصلاحيات'),
(24, '/usersgroups/default', 'Users Groups', 'إستعراض مجموعات المستخدمين'),
(25, '/usersgroups/create', 'Create Users Group', 'إنشاء مجموعة مستخدمين'),
(26, '/usersgroups/edit', 'Users Group Modifying', 'تعديل مجموعة مستخدمين'),
(27, '/usersgroups/delete', 'Deleting Users Group', 'حذف مجموعة مستخدمين'),
(28, '/users/default', 'Users', 'استعراض المستخدمين'),
(29, '/users/create', 'Create New User', 'إنشاء مستخدم جديد'),
(30, '/users/edit', 'User Modifying', 'تعديل مستخدم'),
(31, '/users/delete', 'Deleting User', 'حذف مستخدم'),
(32, '/suppliers/default', 'Show Suppliers', 'استعراض الموردين'),
(33, '/suppliers/create', 'Create New Supplier', 'انشاء مورد جديد'),
(34, '/suppliers/edit', 'Modifying Supplier', 'تعديل مورد'),
(35, '/suppliers/delete', 'Deleting Supplier', 'حذف مورد'),
(36, '/clients/default', 'Show Clients', 'استعراض العملاء'),
(37, '/clients/create', 'Create New Client', 'انشاء عميل جديد'),
(38, '/clients/edit', 'Modifying Client', 'تعديل علي بيانات عميل'),
(39, '/clients/delete', 'Deleting Client', 'حذف عميل'),
(40, '/productscategories/default', 'Show Products Categories', 'استعراض اقسام المنتجات'),
(41, '/productscategories/create', 'Create New Products Category', 'اضافة قسم منتجات جديد'),
(42, '/productscategories/edit', 'Modifying Products Category', 'تعديل علي قسم منتجات'),
(43, '/productscategories/delete', 'Deleting Products Category', 'حذف قسم منتجات'),
(44, '/productlist/default', 'Show Products', 'استعراض المنتجات'),
(45, '/productlist/create', 'Add Product', 'اضافة منتج جديد'),
(46, '/productlist/edit', 'Modifying Product', 'تعديل علي منتج'),
(47, '/productlist/delete', 'Deleting Product', 'حذف منتج'),
(48, '/typeofexpenses/default', 'Show Type Of Expenses', 'عرض انواع المصروفات'),
(49, '/typeofexpenses/create', 'Create New Type Of Expenses', 'اضافة نوع جديد من المصروفات'),
(50, '/typeofexpenses/edit', 'Modifying Type Of Expenses', 'التعديل علي نوع من المصروفات'),
(51, '/typeofexpenses/delete', 'Deleting Type Of Expenses', 'حذف نوع من انواع  المصروفات'),
(52, '/dailyexpenses/default', 'Show Daliy Expenses', 'عرض المصروفات اليومية'),
(53, '/dailyexpenses/create', 'Create New Daliy Expense', 'اضافة مصروف يومي جديد'),
(54, '/dailyexpenses/edit/', 'Modifying Daliy Expense', 'التعديل علي مصروف يومي'),
(55, '/dailyexpenses/delete/', 'Deleting Daliy Expense', 'حذف مصروف يومي');

-- --------------------------------------------------------

--
-- Table structure for table `app_users_profiles`
--

CREATE TABLE `app_users_profiles` (
  `UserId` int(10) UNSIGNED NOT NULL,
  `FirstName` varchar(12) NOT NULL,
  `LastName` varchar(12) NOT NULL,
  `Address` varchar(50) DEFAULT NULL,
  `DateOfBirth` date DEFAULT NULL,
  `Image` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `app_users_profiles`
--

INSERT INTO `app_users_profiles` (`UserId`, `FirstName`, `LastName`, `Address`, `DateOfBirth`, `Image`) VALUES
(20, 'Ahmed', 'Ali', NULL, NULL, NULL),
(25, 'Eslam', 'Nazer', NULL, NULL, NULL),
(27, 'mahmoud', 'Ahmed', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `app_clients`
--
ALTER TABLE `app_clients`
  ADD PRIMARY KEY (`ClientId`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `app_expenses_categories`
--
ALTER TABLE `app_expenses_categories`
  ADD PRIMARY KEY (`ExpenseId`);

--
-- Indexes for table `app_expenses_daily_list`
--
ALTER TABLE `app_expenses_daily_list`
  ADD PRIMARY KEY (`DExpensesId`),
  ADD KEY `ExpenseId` (`ExpenseId`),
  ADD KEY `UserId` (`UserId`);

--
-- Indexes for table `app_notifications`
--
ALTER TABLE `app_notifications`
  ADD PRIMARY KEY (`NotificationId`),
  ADD KEY `UserId` (`UserId`);

--
-- Indexes for table `app_products_categories`
--
ALTER TABLE `app_products_categories`
  ADD PRIMARY KEY (`CategoryId`);

--
-- Indexes for table `app_products_list`
--
ALTER TABLE `app_products_list`
  ADD PRIMARY KEY (`ProductId`),
  ADD KEY `CategoryId` (`CategoryId`);

--
-- Indexes for table `app_purchases_invoices`
--
ALTER TABLE `app_purchases_invoices`
  ADD PRIMARY KEY (`InvoiceId`),
  ADD KEY `SupplierId` (`SupplierId`),
  ADD KEY `UserId` (`UserId`);

--
-- Indexes for table `app_purchases_invoices_details`
--
ALTER TABLE `app_purchases_invoices_details`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `ProductId` (`ProductId`),
  ADD KEY `InvoiceId` (`InvoiceId`);

--
-- Indexes for table `app_purchases_invoices_receipts`
--
ALTER TABLE `app_purchases_invoices_receipts`
  ADD PRIMARY KEY (`ReceiptId`),
  ADD KEY `InvoiceId` (`InvoiceId`),
  ADD KEY `UserId` (`UserId`);

--
-- Indexes for table `app_sales_invoices`
--
ALTER TABLE `app_sales_invoices`
  ADD PRIMARY KEY (`InvoiceId`),
  ADD KEY `ClientId` (`ClientId`),
  ADD KEY `UserId` (`UserId`);

--
-- Indexes for table `app_sales_invoices_details`
--
ALTER TABLE `app_sales_invoices_details`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `InvoiceId` (`InvoiceId`),
  ADD KEY `ProductId` (`ProductId`);

--
-- Indexes for table `app_sales_invoices_receipts`
--
ALTER TABLE `app_sales_invoices_receipts`
  ADD PRIMARY KEY (`ReceiptId`),
  ADD KEY `InvoiceId` (`InvoiceId`),
  ADD KEY `UserId` (`UserId`);

--
-- Indexes for table `app_suppliers`
--
ALTER TABLE `app_suppliers`
  ADD PRIMARY KEY (`SupplierId`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `app_users`
--
ALTER TABLE `app_users`
  ADD PRIMARY KEY (`UserId`),
  ADD UNIQUE KEY `Username` (`Username`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD KEY `GroupId` (`GroupId`);

--
-- Indexes for table `app_users_groups`
--
ALTER TABLE `app_users_groups`
  ADD PRIMARY KEY (`GroupId`);

--
-- Indexes for table `app_users_groups_privileges`
--
ALTER TABLE `app_users_groups_privileges`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `GroupId` (`GroupId`),
  ADD KEY `PrivilegeId` (`PrivilegeId`);

--
-- Indexes for table `app_users_privileges`
--
ALTER TABLE `app_users_privileges`
  ADD PRIMARY KEY (`PrivilegeId`);

--
-- Indexes for table `app_users_profiles`
--
ALTER TABLE `app_users_profiles`
  ADD PRIMARY KEY (`UserId`),
  ADD UNIQUE KEY `UserId` (`UserId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `app_clients`
--
ALTER TABLE `app_clients`
  MODIFY `ClientId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `app_expenses_categories`
--
ALTER TABLE `app_expenses_categories`
  MODIFY `ExpenseId` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `app_expenses_daily_list`
--
ALTER TABLE `app_expenses_daily_list`
  MODIFY `DExpensesId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `app_notifications`
--
ALTER TABLE `app_notifications`
  MODIFY `NotificationId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `app_products_categories`
--
ALTER TABLE `app_products_categories`
  MODIFY `CategoryId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `app_products_list`
--
ALTER TABLE `app_products_list`
  MODIFY `ProductId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `app_purchases_invoices`
--
ALTER TABLE `app_purchases_invoices`
  MODIFY `InvoiceId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `app_purchases_invoices_details`
--
ALTER TABLE `app_purchases_invoices_details`
  MODIFY `Id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `app_purchases_invoices_receipts`
--
ALTER TABLE `app_purchases_invoices_receipts`
  MODIFY `ReceiptId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `app_sales_invoices`
--
ALTER TABLE `app_sales_invoices`
  MODIFY `InvoiceId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `app_sales_invoices_details`
--
ALTER TABLE `app_sales_invoices_details`
  MODIFY `Id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `app_sales_invoices_receipts`
--
ALTER TABLE `app_sales_invoices_receipts`
  MODIFY `ReceiptId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `app_suppliers`
--
ALTER TABLE `app_suppliers`
  MODIFY `SupplierId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `app_users`
--
ALTER TABLE `app_users`
  MODIFY `UserId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `app_users_groups`
--
ALTER TABLE `app_users_groups`
  MODIFY `GroupId` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `app_users_groups_privileges`
--
ALTER TABLE `app_users_groups_privileges`
  MODIFY `Id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `app_users_privileges`
--
ALTER TABLE `app_users_privileges`
  MODIFY `PrivilegeId` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `app_users_profiles`
--
ALTER TABLE `app_users_profiles`
  MODIFY `UserId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `app_expenses_daily_list`
--
ALTER TABLE `app_expenses_daily_list`
  ADD CONSTRAINT `app_expenses_daily_list_ibfk_1` FOREIGN KEY (`ExpenseId`) REFERENCES `app_expenses_categories` (`ExpenseId`),
  ADD CONSTRAINT `app_expenses_daily_list_ibfk_2` FOREIGN KEY (`UserId`) REFERENCES `app_users` (`UserID`);

--
-- Constraints for table `app_notifications`
--
ALTER TABLE `app_notifications`
  ADD CONSTRAINT `app_notifications_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `app_users` (`UserID`);

--
-- Constraints for table `app_products_list`
--
ALTER TABLE `app_products_list`
  ADD CONSTRAINT `app_products_list_ibfk_1` FOREIGN KEY (`CategoryId`) REFERENCES `app_products_categories` (`CategoryId`);

--
-- Constraints for table `app_purchases_invoices`
--
ALTER TABLE `app_purchases_invoices`
  ADD CONSTRAINT `app_purchases_invoices_ibfk_1` FOREIGN KEY (`SupplierId`) REFERENCES `app_suppliers` (`SupplierId`),
  ADD CONSTRAINT `app_purchases_invoices_ibfk_2` FOREIGN KEY (`UserId`) REFERENCES `app_users` (`UserID`);

--
-- Constraints for table `app_purchases_invoices_details`
--
ALTER TABLE `app_purchases_invoices_details`
  ADD CONSTRAINT `app_purchases_invoices_details_ibfk_1` FOREIGN KEY (`ProductId`) REFERENCES `app_products_list` (`ProductId`),
  ADD CONSTRAINT `app_purchases_invoices_details_ibfk_2` FOREIGN KEY (`InvoiceId`) REFERENCES `app_purchases_invoices` (`InvoiceId`);

--
-- Constraints for table `app_purchases_invoices_receipts`
--
ALTER TABLE `app_purchases_invoices_receipts`
  ADD CONSTRAINT `app_purchases_invoices_receipts_ibfk_1` FOREIGN KEY (`InvoiceId`) REFERENCES `app_purchases_invoices` (`InvoiceId`),
  ADD CONSTRAINT `app_purchases_invoices_receipts_ibfk_2` FOREIGN KEY (`UserId`) REFERENCES `app_users` (`UserID`);

--
-- Constraints for table `app_sales_invoices`
--
ALTER TABLE `app_sales_invoices`
  ADD CONSTRAINT `app_sales_invoices_ibfk_1` FOREIGN KEY (`ClientId`) REFERENCES `app_clients` (`ClientId`),
  ADD CONSTRAINT `app_sales_invoices_ibfk_2` FOREIGN KEY (`UserId`) REFERENCES `app_users` (`UserID`);

--
-- Constraints for table `app_sales_invoices_details`
--
ALTER TABLE `app_sales_invoices_details`
  ADD CONSTRAINT `app_sales_invoices_details_ibfk_1` FOREIGN KEY (`InvoiceId`) REFERENCES `app_sales_invoices` (`InvoiceId`),
  ADD CONSTRAINT `app_sales_invoices_details_ibfk_2` FOREIGN KEY (`ProductId`) REFERENCES `app_products_list` (`ProductId`);

--
-- Constraints for table `app_sales_invoices_receipts`
--
ALTER TABLE `app_sales_invoices_receipts`
  ADD CONSTRAINT `app_sales_invoices_receipts_ibfk_1` FOREIGN KEY (`InvoiceId`) REFERENCES `app_sales_invoices` (`InvoiceId`),
  ADD CONSTRAINT `app_sales_invoices_receipts_ibfk_2` FOREIGN KEY (`UserId`) REFERENCES `app_users` (`UserID`);

--
-- Constraints for table `app_users`
--
ALTER TABLE `app_users`
  ADD CONSTRAINT `app_users_ibfk_1` FOREIGN KEY (`GroupId`) REFERENCES `app_users_groups` (`GroupId`);

--
-- Constraints for table `app_users_groups_privileges`
--
ALTER TABLE `app_users_groups_privileges`
  ADD CONSTRAINT `app_users_groups_privileges_ibfk_1` FOREIGN KEY (`GroupId`) REFERENCES `app_users_groups` (`GroupId`),
  ADD CONSTRAINT `app_users_groups_privileges_ibfk_2` FOREIGN KEY (`PrivilegeId`) REFERENCES `app_users_privileges` (`PrivilegeId`);

--
-- Constraints for table `app_users_profiles`
--
ALTER TABLE `app_users_profiles`
  ADD CONSTRAINT `app_users_profiles_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `app_users` (`UserId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
