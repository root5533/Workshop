-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2017 at 04:43 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 
--

-- --------------------------------------------------------

--
-- Table structure for table `complain`
--

CREATE TABLE `complain` (
  `id` int(11) NOT NULL,
  `type` varchar(45) NOT NULL,
  `description` varchar(45) DEFAULT NULL,
  `address` varchar(45) NOT NULL,
  `date` date NOT NULL,
  `time` datetime NOT NULL,
  `assigned_officer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `id` int(11) NOT NULL,
  `driver_name` varchar(45) NOT NULL,
  `driver_nic` varchar(10) NOT NULL,
  `license_no` varchar(45) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `contact_no` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `nic` varchar(10) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `gatepass`
--

CREATE TABLE `gatepass` (
  `id` int(11) NOT NULL,
  `id_vehicle` int(11) NOT NULL,
  `time` time DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `jobentry`
--

CREATE TABLE `jobentry` (
  `id` int(11) NOT NULL,
  `id_vehicle` int(11) NOT NULL,
  `date` date NOT NULL,
  `description` varchar(45) DEFAULT NULL,
  `job_applicant` int(11) NOT NULL,
  `priority` int(11) DEFAULT NULL,
  `supervisor` int(11) NOT NULL,
  `confirmation` int(11) NOT NULL,
  `cost` float DEFAULT NULL,
  `completion_date` date DEFAULT NULL,
  `outsourced` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `jobstock`
--

CREATE TABLE `jobstock` (
  `job_id` int(11) NOT NULL,
  `stock_id` int(11) NOT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `outsourcejob`
--

CREATE TABLE `outsourcejob` (
  `id` int(11) NOT NULL,
  `id_job` int(11) NOT NULL,
  `location` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `productionjobentry`
--

CREATE TABLE `productionjobentry` (
  `id` int(11) NOT NULL,
  `applicant` varchar(45) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `superviosr` int(11) NOT NULL,
  `confirmation` int(11) NOT NULL,
  `cost` float DEFAULT NULL,
  `completion_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `registeredbuilding`
--

CREATE TABLE `registeredbuilding` (
  `id` int(11) NOT NULL,
  `address` varchar(45) NOT NULL,
  `description` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sealquotation`
--

CREATE TABLE `sealquotation` (
  `id` int(11) NOT NULL,
  `id_stock_request` int(11) NOT NULL,
  `attachment` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `id` int(11) NOT NULL,
  `item_code` varchar(5) NOT NULL,
  `description` varchar(45) DEFAULT NULL,
  `amount` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `stockrequest`
--

CREATE TABLE `stockrequest` (
  `id` int(11) NOT NULL,
  `id_item` int(11) NOT NULL,
  `amount` int(11) NOT NULL DEFAULT '0',
  `description` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `streetlamp`
--

CREATE TABLE `streetlamp` (
  `id` int(11) NOT NULL,
  `address` varchar(45) NOT NULL,
  `district` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `temporarygatepass`
--

CREATE TABLE `temporarygatepass` (
  `id` int(11) NOT NULL,
  `id_job` int(11) NOT NULL,
  `date` date NOT NULL,
  `reason` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `type` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `id` int(11) NOT NULL,
  `id_driver` int(11) NOT NULL,
  `type` varchar(45) NOT NULL,
  `brand` varchar(45) DEFAULT NULL,
  `registration_no` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `vehicleentryrecord`
--

CREATE TABLE `vehicleentryrecord` (
  `id` int(11) NOT NULL,
  `id_vehicle` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `complain`
--
ALTER TABLE `complain`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idComplain_UNIQUE` (`id`),
  ADD KEY `idEmployeeKey3_idx` (`assigned_officer`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idDriver_UNIQUE` (`id`),
  ADD UNIQUE KEY `NIC_UNIQUE` (`driver_nic`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idEmployee_UNIQUE` (`id`),
  ADD UNIQUE KEY `employee_nic_UNIQUE` (`nic`);

--
-- Indexes for table `gatepass`
--
ALTER TABLE `gatepass`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idGatePass_UNIQUE` (`id`),
  ADD KEY `idVehicleKey3_idx` (`id_vehicle`);

--
-- Indexes for table `jobentry`
--
ALTER TABLE `jobentry`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idJobEntry_UNIQUE` (`id`),
  ADD KEY `idVehicleKey1_idx` (`id_vehicle`),
  ADD KEY `idEmployeeKey1_idx` (`supervisor`),
  ADD KEY `idEmployeeKey2_idx` (`confirmation`),
  ADD KEY `idDriverKey1_idx` (`job_applicant`);

--
-- Indexes for table `jobstock`
--
ALTER TABLE `jobstock`
  ADD KEY `fk_Job_Entry_has_Stock_Request_Stock_Request1_idx` (`stock_id`),
  ADD KEY `fk_Job_Entry_has_Stock_Request_Job_Entry1_idx` (`job_id`);

--
-- Indexes for table `outsourcejob`
--
ALTER TABLE `outsourcejob`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idOutsourceJob_UNIQUE` (`id`),
  ADD KEY `idJobEntryKey2_idx` (`id_job`);

--
-- Indexes for table `productionjobentry`
--
ALTER TABLE `productionjobentry`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_Production_Job_Entry_UNIQUE` (`id`),
  ADD KEY `idEmployeeKey4_idx` (`superviosr`),
  ADD KEY `idEmployeeKey5_idx` (`confirmation`);

--
-- Indexes for table `registeredbuilding`
--
ALTER TABLE `registeredbuilding`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idRegisteredBuilding_UNIQUE` (`id`);

--
-- Indexes for table `sealquotation`
--
ALTER TABLE `sealquotation`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idSealQuotations_UNIQUE` (`id`),
  ADD KEY `idStockRequestKey_idx` (`id_stock_request`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idStockItem_UNIQUE` (`id`),
  ADD UNIQUE KEY `item_code_UNIQUE` (`item_code`);

--
-- Indexes for table `stockrequest`
--
ALTER TABLE `stockrequest`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idStockRequest_UNIQUE` (`id`),
  ADD KEY `idStockItemKey2_idx` (`id_item`);

--
-- Indexes for table `streetlamp`
--
ALTER TABLE `streetlamp`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idStreetLamp_UNIQUE` (`id`);

--
-- Indexes for table `temporarygatepass`
--
ALTER TABLE `temporarygatepass`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idTemporaryGatePass_UNIQUE` (`id`),
  ADD KEY `idJobEntryKey1_idx` (`id_job`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD UNIQUE KEY `idUser_UNIQUE` (`id`),
  ADD UNIQUE KEY `Password_UNIQUE` (`password`),
  ADD UNIQUE KEY `Username_UNIQUE` (`username`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idVehicle_UNIQUE` (`id`),
  ADD UNIQUE KEY `LicenseNo_UNIQUE` (`registration_no`),
  ADD KEY `idDriverKey2_idx` (`id_driver`);

--
-- Indexes for table `vehicleentryrecord`
--
ALTER TABLE `vehicleentryrecord`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idVehicleEntryRecord_UNIQUE` (`id`),
  ADD KEY `idVehicleKey2_idx` (`id_vehicle`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `complain`
--
ALTER TABLE `complain`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `gatepass`
--
ALTER TABLE `gatepass`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `jobentry`
--
ALTER TABLE `jobentry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `outsourcejob`
--
ALTER TABLE `outsourcejob`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `productionjobentry`
--
ALTER TABLE `productionjobentry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `registeredbuilding`
--
ALTER TABLE `registeredbuilding`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sealquotation`
--
ALTER TABLE `sealquotation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `stockrequest`
--
ALTER TABLE `stockrequest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `streetlamp`
--
ALTER TABLE `streetlamp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `temporarygatepass`
--
ALTER TABLE `temporarygatepass`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `vehicleentryrecord`
--
ALTER TABLE `vehicleentryrecord`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `complain`
--
ALTER TABLE `complain`
  ADD CONSTRAINT `FK_Employee_Complain` FOREIGN KEY (`assigned_officer`) REFERENCES `employee` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `gatepass`
--
ALTER TABLE `gatepass`
  ADD CONSTRAINT `FK_Vehicle_GatePass` FOREIGN KEY (`id_vehicle`) REFERENCES `vehicle` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `jobentry`
--
ALTER TABLE `jobentry`
  ADD CONSTRAINT `FK_Driver_JobEntry` FOREIGN KEY (`job_applicant`) REFERENCES `driver` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Employee_JobEntry_1` FOREIGN KEY (`supervisor`) REFERENCES `employee` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Employee_JobEntry_2` FOREIGN KEY (`confirmation`) REFERENCES `employee` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Vehicle_JobEntry` FOREIGN KEY (`id_vehicle`) REFERENCES `vehicle` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `jobstock`
--
ALTER TABLE `jobstock`
  ADD CONSTRAINT `FK_JobEntry_JobStock` FOREIGN KEY (`job_id`) REFERENCES `jobentry` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_StockRequest_JobStock` FOREIGN KEY (`stock_id`) REFERENCES `stockrequest` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `outsourcejob`
--
ALTER TABLE `outsourcejob`
  ADD CONSTRAINT `FK_JobEntry_OutsourceJob` FOREIGN KEY (`id_job`) REFERENCES `jobentry` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `productionjobentry`
--
ALTER TABLE `productionjobentry`
  ADD CONSTRAINT `FK_Employee_ProductionJobEntry1` FOREIGN KEY (`superviosr`) REFERENCES `employee` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Employee_ProductionJobEntry2` FOREIGN KEY (`confirmation`) REFERENCES `employee` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `sealquotation`
--
ALTER TABLE `sealquotation`
  ADD CONSTRAINT `FK_StockRequest_SealQuotation` FOREIGN KEY (`id_stock_request`) REFERENCES `stockrequest` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `stockrequest`
--
ALTER TABLE `stockrequest`
  ADD CONSTRAINT `FK_Stock_StockRequest` FOREIGN KEY (`id_item`) REFERENCES `stock` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `temporarygatepass`
--
ALTER TABLE `temporarygatepass`
  ADD CONSTRAINT `FK_JobEntry_TemporaryGatePass` FOREIGN KEY (`id_job`) REFERENCES `jobentry` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_Employee_User` FOREIGN KEY (`id`) REFERENCES `employee` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD CONSTRAINT `FK_Driver_Vehicle` FOREIGN KEY (`id_driver`) REFERENCES `driver` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `vehicleentryrecord`
--
ALTER TABLE `vehicleentryrecord`
  ADD CONSTRAINT `FK_Vehicle_VehicleEntryRecord` FOREIGN KEY (`id_vehicle`) REFERENCES `vehicle` (`id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
