-- phpMyAdmin SQL Dump
-- version 2.8.2.2
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Dec 15, 2006 at 12:58 PM
-- Server version: 5.0.26
-- PHP Version: 4.4.4-pl6-gentoo
-- 
-- Database: `khansen`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `chat_list`
-- 

CREATE TABLE `chat_list` (
  `id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `date_posted` datetime NOT NULL default '2006-12-13 20:30:54',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

-- --------------------------------------------------------

-- 
-- Table structure for table `chat_log`
-- 

CREATE TABLE `chat_log` (
  `id` int(11) NOT NULL auto_increment,
  `log` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

-- 
-- Table structure for table `chat_users`
-- 

CREATE TABLE `chat_users` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `icon` varchar(100) NOT NULL default './images/khansen.png',
  `signature` varchar(254) NOT NULL,
  `date_registered` datetime NOT NULL,
  `date_last_visited` datetime NOT NULL,
  `loggedin` varchar(1) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;
