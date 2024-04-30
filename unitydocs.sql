-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 20, 2024 at 09:05 PM
-- Server version: 5.7.39
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `unitydocs`
--

-- --------------------------------------------------------

--
-- Table structure for table `access_level`
--

CREATE TABLE `access_level` (
  `idaccess_level` int(11) NOT NULL,
  `level` enum('creator','owner','editor') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `collaboration`
--

CREATE TABLE `collaboration` (
  `idcollaboration` int(11) NOT NULL,
  `document_id_idx` int(11) NOT NULL,
  `user_id_idx` int(11) NOT NULL,
  `access_level` int(11) NOT NULL,
  `last_access_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Triggers `collaboration`
--
DELIMITER $$
CREATE TRIGGER `collaboration_AFTER_UPDATE` AFTER UPDATE ON `collaboration` FOR EACH ROW BEGIN

END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `collaboration_AFTER_UPDATE_1` AFTER UPDATE ON `collaboration` FOR EACH ROW BEGIN

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `idcomments` int(11) NOT NULL,
  `assignor_comment` longtext,
  `assignee_comment` longtext,
  `collab_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `idcountry` int(11) NOT NULL,
  `country_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `doctag`
--

CREATE TABLE `doctag` (
  `iddoctag` int(11) NOT NULL,
  `tag_name` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE `document` (
  `iddocument` int(11) NOT NULL,
  `doc_title` varchar(200) NOT NULL,
  `doc_desc` mediumtext NOT NULL,
  `upload_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `doc_creator` int(11) NOT NULL,
  `creator_team` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Triggers `document`
--
DELIMITER $$
CREATE TRIGGER `document_AFTER_UPDATE` AFTER UPDATE ON `document` FOR EACH ROW BEGIN

END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `document_AFTER_UPDATE_1` AFTER UPDATE ON `document` FOR EACH ROW BEGIN

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `doc_access`
--

CREATE TABLE `doc_access` (
  `iddoc_access` int(11) NOT NULL,
  `docu_id_access` int(11) NOT NULL,
  `doc_user_acc` int(11) NOT NULL,
  `doc_acc_lvl` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `organization`
--

CREATE TABLE `organization` (
  `idorganization` int(11) NOT NULL,
  `org_name` varchar(45) NOT NULL,
  `org_description` longtext NOT NULL,
  `org_email` varchar(45) NOT NULL,
  `org_phone` varchar(15) NOT NULL,
  `org_country` int(11) NOT NULL,
  `org_state` int(11) NOT NULL,
  `org_date_reg` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `org_admin`
--

CREATE TABLE `org_admin` (
  `idorg_admin` int(11) NOT NULL,
  `admin_user` int(11) NOT NULL,
  `admin_org` int(11) NOT NULL,
  `admin_last_logged_in` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `prev_doc`
--

CREATE TABLE `prev_doc` (
  `idprev_doc` int(11) NOT NULL,
  `original_doc_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `shared_doc`
--

CREATE TABLE `shared_doc` (
  `idshared_doc` int(11) NOT NULL,
  `shared_do_id` int(11) NOT NULL,
  `shared_by` int(11) NOT NULL,
  `shared_with` int(11) NOT NULL,
  `shared_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `access_level` int(11) NOT NULL,
  `collaboration_desc` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `idstate` int(11) NOT NULL,
  `country` int(11) NOT NULL,
  `state_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tagmapping`
--

CREATE TABLE `tagmapping` (
  `idtagmapping` int(11) NOT NULL,
  `doc_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `idteam` int(11) NOT NULL,
  `team_name` varchar(45) NOT NULL,
  `team_desc` longtext NOT NULL,
  `team_org` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `idusers` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(300) NOT NULL,
  `user_role` varchar(100) NOT NULL,
  `profile_image` varchar(300) NOT NULL,
  `user_org` int(11) NOT NULL,
  `user_phone` varchar(15) NOT NULL,
  `user_country` int(11) NOT NULL,
  `user_state` int(11) DEFAULT NULL,
  `user_date_registered` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user_team`
--

CREATE TABLE `user_team` (
  `iduser_team` int(11) NOT NULL,
  `team_member_id` int(11) NOT NULL,
  `org_team_id` int(11) NOT NULL,
  `user_team_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access_level`
--
ALTER TABLE `access_level`
  ADD PRIMARY KEY (`idaccess_level`);

--
-- Indexes for table `collaboration`
--
ALTER TABLE `collaboration`
  ADD PRIMARY KEY (`idcollaboration`),
  ADD KEY `document_id_idx` (`document_id_idx`),
  ADD KEY `doc_user_idx` (`user_id_idx`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`idcomments`),
  ADD KEY `collab_comm_fk_idx` (`collab_id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`idcountry`);

--
-- Indexes for table `doctag`
--
ALTER TABLE `doctag`
  ADD PRIMARY KEY (`iddoctag`);

--
-- Indexes for table `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`iddocument`),
  ADD KEY `document_creator_idx` (`doc_creator`),
  ADD KEY `document_creator_team_idx` (`creator_team`);

--
-- Indexes for table `doc_access`
--
ALTER TABLE `doc_access`
  ADD PRIMARY KEY (`iddoc_access`),
  ADD KEY `document_access_fk_idx` (`docu_id_access`),
  ADD KEY `document_user_fk_idx` (`doc_user_acc`),
  ADD KEY `access_level_fk_idx` (`doc_acc_lvl`);

--
-- Indexes for table `organization`
--
ALTER TABLE `organization`
  ADD PRIMARY KEY (`idorganization`),
  ADD UNIQUE KEY `idorganization_UNIQUE` (`idorganization`),
  ADD UNIQUE KEY `org_email_UNIQUE` (`org_email`),
  ADD UNIQUE KEY `org_phone_UNIQUE` (`org_phone`),
  ADD KEY `org_state_fk_idx` (`org_state`),
  ADD KEY `org_country_fk_idx` (`org_country`);

--
-- Indexes for table `org_admin`
--
ALTER TABLE `org_admin`
  ADD PRIMARY KEY (`idorg_admin`),
  ADD KEY `admin_user_fk_idx` (`admin_user`),
  ADD KEY `admin_org_fk_idx` (`admin_org`);

--
-- Indexes for table `prev_doc`
--
ALTER TABLE `prev_doc`
  ADD PRIMARY KEY (`idprev_doc`),
  ADD KEY `original_doc_fk_idx` (`original_doc_id`);

--
-- Indexes for table `shared_doc`
--
ALTER TABLE `shared_doc`
  ADD PRIMARY KEY (`idshared_doc`),
  ADD KEY `document_id_idx` (`shared_do_id`),
  ADD KEY `shared_user_idx` (`shared_by`),
  ADD KEY `collaborator_idx` (`shared_with`),
  ADD KEY `access_level_idx` (`access_level`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`idstate`),
  ADD KEY `state_country_fk_idx` (`country`);

--
-- Indexes for table `tagmapping`
--
ALTER TABLE `tagmapping`
  ADD PRIMARY KEY (`idtagmapping`),
  ADD KEY `document_id_idx` (`doc_id`),
  ADD KEY `document_tag_idx` (`tag_id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`idteam`),
  ADD KEY `team_organization_idx` (`team_org`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idusers`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`),
  ADD UNIQUE KEY `email_UNIQUE` (`user_email`),
  ADD KEY `organization_id_idx` (`user_org`),
  ADD KEY `user_country_fk_idx` (`user_country`),
  ADD KEY `user_state_fk_idx` (`user_state`);

--
-- Indexes for table `user_team`
--
ALTER TABLE `user_team`
  ADD PRIMARY KEY (`iduser_team`),
  ADD KEY `user_team_member_fk_idx` (`team_member_id`),
  ADD KEY `org_team_fk_idx` (`org_team_id`),
  ADD KEY `user_team_fk_idx` (`user_team_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access_level`
--
ALTER TABLE `access_level`
  MODIFY `idaccess_level` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `collaboration`
--
ALTER TABLE `collaboration`
  MODIFY `idcollaboration` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `idcomments` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `idcountry` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doctag`
--
ALTER TABLE `doctag`
  MODIFY `iddoctag` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `document`
--
ALTER TABLE `document`
  MODIFY `iddocument` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doc_access`
--
ALTER TABLE `doc_access`
  MODIFY `iddoc_access` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `organization`
--
ALTER TABLE `organization`
  MODIFY `idorganization` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `org_admin`
--
ALTER TABLE `org_admin`
  MODIFY `idorg_admin` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prev_doc`
--
ALTER TABLE `prev_doc`
  MODIFY `idprev_doc` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shared_doc`
--
ALTER TABLE `shared_doc`
  MODIFY `idshared_doc` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `idstate` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tagmapping`
--
ALTER TABLE `tagmapping`
  MODIFY `idtagmapping` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `idteam` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `idusers` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_team`
--
ALTER TABLE `user_team`
  MODIFY `iduser_team` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `collaboration`
--
ALTER TABLE `collaboration`
  ADD CONSTRAINT `doc_user_idx` FOREIGN KEY (`user_id_idx`) REFERENCES `users` (`idusers`),
  ADD CONSTRAINT `document_id_idx` FOREIGN KEY (`document_id_idx`) REFERENCES `document` (`iddocument`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `collab_comm_fk` FOREIGN KEY (`collab_id`) REFERENCES `collaboration` (`idcollaboration`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `document`
--
ALTER TABLE `document`
  ADD CONSTRAINT `document_creator` FOREIGN KEY (`doc_creator`) REFERENCES `users` (`idusers`),
  ADD CONSTRAINT `document_creator_team` FOREIGN KEY (`creator_team`) REFERENCES `team` (`idteam`);

--
-- Constraints for table `doc_access`
--
ALTER TABLE `doc_access`
  ADD CONSTRAINT `access_level_fk` FOREIGN KEY (`doc_acc_lvl`) REFERENCES `access_level` (`idaccess_level`),
  ADD CONSTRAINT `document_access_fk` FOREIGN KEY (`docu_id_access`) REFERENCES `document` (`iddocument`),
  ADD CONSTRAINT `document_user_fk` FOREIGN KEY (`doc_user_acc`) REFERENCES `users` (`idusers`);

--
-- Constraints for table `organization`
--
ALTER TABLE `organization`
  ADD CONSTRAINT `org_country_fk` FOREIGN KEY (`org_country`) REFERENCES `country` (`idcountry`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `org_state_fk` FOREIGN KEY (`org_state`) REFERENCES `state` (`idstate`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `org_admin`
--
ALTER TABLE `org_admin`
  ADD CONSTRAINT `admin_org_fk` FOREIGN KEY (`admin_org`) REFERENCES `organization` (`idorganization`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `admin_user_fk` FOREIGN KEY (`admin_user`) REFERENCES `users` (`idusers`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `prev_doc`
--
ALTER TABLE `prev_doc`
  ADD CONSTRAINT `original_doc_fk` FOREIGN KEY (`original_doc_id`) REFERENCES `document` (`iddocument`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `shared_doc`
--
ALTER TABLE `shared_doc`
  ADD CONSTRAINT `access_level` FOREIGN KEY (`access_level`) REFERENCES `access_level` (`idaccess_level`),
  ADD CONSTRAINT `collaborator` FOREIGN KEY (`shared_with`) REFERENCES `users` (`idusers`),
  ADD CONSTRAINT `shared_document_id` FOREIGN KEY (`shared_do_id`) REFERENCES `document` (`iddocument`),
  ADD CONSTRAINT `shared_user` FOREIGN KEY (`shared_by`) REFERENCES `users` (`idusers`);

--
-- Constraints for table `state`
--
ALTER TABLE `state`
  ADD CONSTRAINT `state_country_fk` FOREIGN KEY (`country`) REFERENCES `country` (`idcountry`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tagmapping`
--
ALTER TABLE `tagmapping`
  ADD CONSTRAINT `document_id` FOREIGN KEY (`doc_id`) REFERENCES `document` (`iddocument`),
  ADD CONSTRAINT `document_tag` FOREIGN KEY (`tag_id`) REFERENCES `doctag` (`iddoctag`);

--
-- Constraints for table `team`
--
ALTER TABLE `team`
  ADD CONSTRAINT `team_organization` FOREIGN KEY (`team_org`) REFERENCES `organization` (`idorganization`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `organization_id` FOREIGN KEY (`user_org`) REFERENCES `organization` (`idorganization`),
  ADD CONSTRAINT `user_country_fk` FOREIGN KEY (`user_country`) REFERENCES `country` (`idcountry`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `user_state_fk` FOREIGN KEY (`user_state`) REFERENCES `state` (`idstate`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user_team`
--
ALTER TABLE `user_team`
  ADD CONSTRAINT `org_team_fk` FOREIGN KEY (`org_team_id`) REFERENCES `organization` (`idorganization`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `user_team_fk` FOREIGN KEY (`user_team_id`) REFERENCES `team` (`idteam`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `user_team_member_fk` FOREIGN KEY (`team_member_id`) REFERENCES `users` (`idusers`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
