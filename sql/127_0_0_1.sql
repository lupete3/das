-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 04 sep. 2022 à 23:42
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `vente`
--
CREATE DATABASE IF NOT EXISTS `vente` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `vente`;

-- --------------------------------------------------------

--
-- Structure de la table `approv`
--

CREATE TABLE `approv` (
  `id` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  `prix` decimal(10,0) NOT NULL,
  `date_approv` date NOT NULL,
  `nom_four` varchar(255) DEFAULT NULL,
  `id_prod` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `approv`
--

INSERT INTO `approv` (`id`, `quantite`, `prix`, `date_approv`, `nom_four`, `id_prod`) VALUES
(1, 20, '200', '2022-06-04', 'Claude', 1),
(2, 5, '180', '2022-06-04', 'Muhamed', 2),
(4, 7, '200', '2022-06-05', 'Paul', 3),
(6, 12, '150', '2022-07-07', 'HOPO', 4),
(7, 2, '20', '2022-08-31', 'MOUJ', 25);

-- --------------------------------------------------------

--
-- Structure de la table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `detail` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `date_pub` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `blog`
--

INSERT INTO `blog` (`id`, `titre`, `detail`, `description`, `image`, `date_pub`, `id_admin`) VALUES
(1, 'FASHION NOW', 'Fifth abundantly made Give sixth hath. Cattle creature i be don\'t them behold green moved fowl Moved life us beast good yielding. Have bring.', '<p class=\"text-sm\" style=\"margin-bottom: 1rem; font-size: 0.9rem; color: rgb(33, 37, 41); font-family: Roboto, Helvetica, Arial, sans-serif;\"><span style=\"font-weight: 700;\">Pellentesque habitant morbi tristique</span>&nbsp;senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper.&nbsp;<i>Aenean ultricies mi vitae est.</i>&nbsp;Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed,&nbsp;<code style=\"font-family: SFMono-Regular, Menlo, Monaco, Consolas, &quot;Liberation Mono&quot;, &quot;Courier New&quot;, monospace; font-size: 12.6px; color: rgb(232, 62, 140); overflow-wrap: break-word; border-radius: 0px;\">commodo vitae</code>, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui.&nbsp;<a href=\"http://localhost/2022-ecommerce/blog-post.html#\" style=\"color: rgb(79, 191, 168); text-decoration-line: none; display: inline-block; transition: all 0.3s ease 0s !important;\">Donec non enim</a>&nbsp;in turpis pulvinar facilisis. Ut felis.</p><p style=\"margin-bottom: 1rem; color: rgb(33, 37, 41); font-family: Roboto, Helvetica, Arial, sans-serif; font-size: 16px;\"><img src=\"http://localhost/2022-ecommerce/img/blog2.jpg\" alt=\"Example blog post alt\" class=\"img-fluid\"></p><h2 style=\"margin-bottom: 1rem; font-weight: 700; line-height: 1.1; font-size: 1.8rem; font-family: Roboto, Helvetica, Arial, sans-serif; color: rgb(33, 37, 41);\">Header Level 2</h2><ol style=\"color: rgb(33, 37, 41); font-family: Roboto, Helvetica, Arial, sans-serif; font-size: 16px;\"><li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</li><li>Aliquam tincidunt mauris eu risus.</li></ol><blockquote class=\"blockquote\" style=\"margin-bottom: 2rem; font-size: 16px; padding: 0.5rem 1rem; border-left: 5px solid rgb(79, 191, 168); color: rgb(33, 37, 41); font-family: Roboto, Helvetica, Arial, sans-serif;\"><p class=\"text-sm\" style=\"margin-bottom: 1rem; font-size: 0.9rem;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus magna. Cras in mi at felis aliquet congue. Ut a est eget ligula molestie gravida. Curabitur massa. Donec eleifend, libero at sagittis mollis, tellus est malesuada tellus, at luctus turpis elit sit amet quam. Vivamus pretium ornare est.</p></blockquote><h3 style=\"margin-bottom: 1rem; font-weight: 700; line-height: 1.1; font-size: 1.5rem; font-family: Roboto, Helvetica, Arial, sans-serif; color: rgb(33, 37, 41);\">Header Level 3</h3><p style=\"margin-bottom: 1rem; color: rgb(33, 37, 41); font-family: Roboto, Helvetica, Arial, sans-serif; font-size: 16px;\">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis. Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus</p><ul style=\"color: rgb(33, 37, 41); font-family: Roboto, Helvetica, Arial, sans-serif; font-size: 16px;\"><li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</li><li>Aliquam tincidunt mauris eu risus.</li></ul><p style=\"margin-bottom: 1rem; color: rgb(33, 37, 41); font-family: Roboto, Helvetica, Arial, sans-serif; font-size: 16px;\"><img src=\"http://localhost/2022-ecommerce/img/blog.jpg\" alt=\"Example blog post alt\" class=\"img-fluid\"></p><p style=\"margin-bottom: 1rem; color: rgb(33, 37, 41); font-family: Roboto, Helvetica, Arial, sans-serif; font-size: 16px;\">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis. Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus</p>', 'New_Center.jpg', '2022-08-05 12:44:50', 1),
(2, 'WHAT TO DO', 'Fifth abundantly made Give sixth hath. Cattle creature i be don\'t them behold green moved fowl Moved life us beast good yielding. Have bring.', '<p class=\"text-sm\" style=\"margin-bottom: 1rem; font-size: 0.9rem; color: rgb(33, 37, 41); font-family: Roboto, Helvetica, Arial, sans-serif;\"><span style=\"font-weight: 700;\">Pellentesque habitant morbi tristique</span>&nbsp;senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper.&nbsp;<i>Aenean ultricies mi vitae est.</i>&nbsp;Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed,&nbsp;<code style=\"font-family: SFMono-Regular, Menlo, Monaco, Consolas, &quot;Liberation Mono&quot;, &quot;Courier New&quot;, monospace; font-size: 12.6px; color: rgb(232, 62, 140); overflow-wrap: break-word; border-radius: 0px;\">commodo vitae</code>, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui.&nbsp;<a href=\"http://localhost/2022-ecommerce/blog-post.html#\" style=\"color: rgb(79, 191, 168); text-decoration-line: none; display: inline-block; transition: all 0.3s ease 0s !important;\">Donec non enim</a>&nbsp;in turpis pulvinar facilisis. Ut felis.</p><p style=\"margin-bottom: 1rem; color: rgb(33, 37, 41); font-family: Roboto, Helvetica, Arial, sans-serif; font-size: 16px;\"><img src=\"http://localhost/2022-ecommerce/img/blog2.jpg\" alt=\"Example blog post alt\" class=\"img-fluid\"></p><h2 style=\"margin-bottom: 1rem; font-weight: 700; line-height: 1.1; font-size: 1.8rem; font-family: Roboto, Helvetica, Arial, sans-serif; color: rgb(33, 37, 41);\">Header Level 2</h2><ol style=\"color: rgb(33, 37, 41); font-family: Roboto, Helvetica, Arial, sans-serif; font-size: 16px;\"><li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</li><li>Aliquam tincidunt mauris eu risus.</li></ol><blockquote class=\"blockquote\" style=\"margin-bottom: 2rem; font-size: 16px; padding: 0.5rem 1rem; border-left: 5px solid rgb(79, 191, 168); color: rgb(33, 37, 41); font-family: Roboto, Helvetica, Arial, sans-serif;\"><p class=\"text-sm\" style=\"margin-bottom: 1rem; font-size: 0.9rem;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus magna. Cras in mi at felis aliquet congue. Ut a est eget ligula molestie gravida. Curabitur massa. Donec eleifend, libero at sagittis mollis, tellus est malesuada tellus, at luctus turpis elit sit amet quam. Vivamus pretium ornare est.</p></blockquote><h3 style=\"margin-bottom: 1rem; font-weight: 700; line-height: 1.1; font-size: 1.5rem; font-family: Roboto, Helvetica, Arial, sans-serif; color: rgb(33, 37, 41);\">Header Level 3</h3><p style=\"margin-bottom: 1rem; color: rgb(33, 37, 41); font-family: Roboto, Helvetica, Arial, sans-serif; font-size: 16px;\">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis. Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus</p><ul style=\"color: rgb(33, 37, 41); font-family: Roboto, Helvetica, Arial, sans-serif; font-size: 16px;\"><li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</li><li>Aliquam tincidunt mauris eu risus.</li></ul><p style=\"margin-bottom: 1rem; color: rgb(33, 37, 41); font-family: Roboto, Helvetica, Arial, sans-serif; font-size: 16px;\"><img src=\"http://localhost/2022-ecommerce/img/blog.jpg\" alt=\"Example blog post alt\" class=\"img-fluid\"></p><p style=\"margin-bottom: 1rem; color: rgb(33, 37, 41); font-family: Roboto, Helvetica, Arial, sans-serif; font-size: 16px;\">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis. Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus</p>', '103807453.jpg', '2022-08-05 12:47:28', 1),
(3, '5 WAYS TO LOOK AWESOME', 'Fifth abundantly made Give sixth hath. Cattle creature i be don\'t them behold green moved fowl Moved life us beast good yielding. Have bring.', '<p class=\"text-sm\" style=\"margin-bottom: 1rem; font-size: 0.9rem; color: rgb(33, 37, 41); font-family: Roboto, Helvetica, Arial, sans-serif;\"><span style=\"font-weight: 700;\">Pellentesque habitant morbi tristique</span>&nbsp;senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper.&nbsp;<i>Aenean ultricies mi vitae est.</i>&nbsp;Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed,&nbsp;<code style=\"font-family: SFMono-Regular, Menlo, Monaco, Consolas, &quot;Liberation Mono&quot;, &quot;Courier New&quot;, monospace; font-size: 12.6px; color: rgb(232, 62, 140); overflow-wrap: break-word; border-radius: 0px;\">commodo vitae</code>, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui.&nbsp;<a href=\"http://localhost/2022-ecommerce/blog-post.html#\" style=\"color: rgb(79, 191, 168); text-decoration-line: none; display: inline-block; transition: all 0.3s ease 0s !important;\">Donec non enim</a>&nbsp;in turpis pulvinar facilisis. Ut felis.</p><p style=\"margin-bottom: 1rem; color: rgb(33, 37, 41); font-family: Roboto, Helvetica, Arial, sans-serif; font-size: 16px;\"><img src=\"http://localhost/2022-ecommerce/img/blog2.jpg\" alt=\"Example blog post alt\" class=\"img-fluid\"></p><h2 style=\"margin-bottom: 1rem; font-weight: 700; line-height: 1.1; font-size: 1.8rem; font-family: Roboto, Helvetica, Arial, sans-serif; color: rgb(33, 37, 41);\">Header Level 2</h2><ol style=\"color: rgb(33, 37, 41); font-family: Roboto, Helvetica, Arial, sans-serif; font-size: 16px;\"><li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</li><li>Aliquam tincidunt mauris eu risus.</li></ol><blockquote class=\"blockquote\" style=\"margin-bottom: 2rem; font-size: 16px; padding: 0.5rem 1rem; border-left: 5px solid rgb(79, 191, 168); color: rgb(33, 37, 41); font-family: Roboto, Helvetica, Arial, sans-serif;\"><p class=\"text-sm\" style=\"margin-bottom: 1rem; font-size: 0.9rem;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus magna. Cras in mi at felis aliquet congue. Ut a est eget ligula molestie gravida. Curabitur massa. Donec eleifend, libero at sagittis mollis, tellus est malesuada tellus, at luctus turpis elit sit amet quam. Vivamus pretium ornare est.</p></blockquote><h3 style=\"margin-bottom: 1rem; font-weight: 700; line-height: 1.1; font-size: 1.5rem; font-family: Roboto, Helvetica, Arial, sans-serif; color: rgb(33, 37, 41);\">Header Level 3</h3><p style=\"margin-bottom: 1rem; color: rgb(33, 37, 41); font-family: Roboto, Helvetica, Arial, sans-serif; font-size: 16px;\">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis. Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus</p><ul style=\"color: rgb(33, 37, 41); font-family: Roboto, Helvetica, Arial, sans-serif; font-size: 16px;\"><li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</li><li>Aliquam tincidunt mauris eu risus.</li></ul><p style=\"margin-bottom: 1rem; color: rgb(33, 37, 41); font-family: Roboto, Helvetica, Arial, sans-serif; font-size: 16px;\"><img src=\"http://localhost/2022-ecommerce/img/blog.jpg\" alt=\"Example blog post alt\" class=\"img-fluid\"></p><p style=\"margin-bottom: 1rem; color: rgb(33, 37, 41); font-family: Roboto, Helvetica, Arial, sans-serif; font-size: 16px;\">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis. Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus</p>', '352846646.jpg', '2022-08-05 12:49:34', 1),
(4, 'COMMENT ACTIVER WINDOWS 11', 'Fifth abundantly made Give sixth hath. Cattle creature i be don\'t them behold green moved fowl Moved life us beast good yielding. Have bring.', '<p class=\"text-sm\" style=\"margin-bottom: 1rem; font-size: 0.9rem; color: rgb(33, 37, 41); font-family: Roboto, Helvetica, Arial, sans-serif;\"><span style=\"font-weight: 700;\">Pellentesque habitant morbi tristique</span>&nbsp;senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper.&nbsp;<i>Aenean ultricies mi vitae est.</i>&nbsp;Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed,&nbsp;<code style=\"font-family: SFMono-Regular, Menlo, Monaco, Consolas, &quot;Liberation Mono&quot;, &quot;Courier New&quot;, monospace; font-size: 12.6px; color: rgb(232, 62, 140); overflow-wrap: break-word; border-radius: 0px;\">commodo vitae</code>, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui.&nbsp;<a href=\"http://localhost/2022-ecommerce/blog-post.html#\" style=\"color: rgb(79, 191, 168); text-decoration-line: none; display: inline-block; transition: all 0.3s ease 0s !important;\">Donec non enim</a>&nbsp;in turpis pulvinar facilisis. Ut felis.</p><p style=\"margin-bottom: 1rem; color: rgb(33, 37, 41); font-family: Roboto, Helvetica, Arial, sans-serif; font-size: 16px;\"><img src=\"http://localhost/2022-ecommerce/img/blog2.jpg\" alt=\"Example blog post alt\" class=\"img-fluid\"></p><h2 style=\"margin-bottom: 1rem; font-weight: 700; line-height: 1.1; font-size: 1.8rem; font-family: Roboto, Helvetica, Arial, sans-serif; color: rgb(33, 37, 41);\">Header Level 2</h2><ol style=\"color: rgb(33, 37, 41); font-family: Roboto, Helvetica, Arial, sans-serif; font-size: 16px;\"><li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</li><li>Aliquam tincidunt mauris eu risus.</li></ol><blockquote class=\"blockquote\" style=\"margin-bottom: 2rem; font-size: 16px; padding: 0.5rem 1rem; border-left: 5px solid rgb(79, 191, 168); color: rgb(33, 37, 41); font-family: Roboto, Helvetica, Arial, sans-serif;\"><p class=\"text-sm\" style=\"margin-bottom: 1rem; font-size: 0.9rem;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus magna. Cras in mi at felis aliquet congue. Ut a est eget ligula molestie gravida. Curabitur massa. Donec eleifend, libero at sagittis mollis, tellus est malesuada tellus, at luctus turpis elit sit amet quam. Vivamus pretium ornare est.</p></blockquote><h3 style=\"margin-bottom: 1rem; font-weight: 700; line-height: 1.1; font-size: 1.5rem; font-family: Roboto, Helvetica, Arial, sans-serif; color: rgb(33, 37, 41);\">Header Level 3</h3><p style=\"margin-bottom: 1rem; color: rgb(33, 37, 41); font-family: Roboto, Helvetica, Arial, sans-serif; font-size: 16px;\">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis. Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus</p><ul style=\"color: rgb(33, 37, 41); font-family: Roboto, Helvetica, Arial, sans-serif; font-size: 16px;\"><li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</li><li>Aliquam tincidunt mauris eu risus.</li></ul><p style=\"margin-bottom: 1rem; color: rgb(33, 37, 41); font-family: Roboto, Helvetica, Arial, sans-serif; font-size: 16px;\"><img src=\"http://localhost/2022-ecommerce/img/blog.jpg\" alt=\"Example blog post alt\" class=\"img-fluid\"></p><p style=\"margin-bottom: 1rem; color: rgb(33, 37, 41); font-family: Roboto, Helvetica, Arial, sans-serif; font-size: 16px;\">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis. Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus</p>', '12186799.jpg', '2022-08-05 12:50:45', 1),
(5, 'COMMENT FAIRE', 'Fifth abundantly made Give sixth hath. Cattle creature i be don\'t them behold green moved fowl Moved life us beast good yielding. Have bring.', '<p class=\"text-sm\" style=\"margin-bottom: 1rem; font-size: 0.9rem; color: rgb(33, 37, 41); font-family: Roboto, Helvetica, Arial, sans-serif;\"><span style=\"font-weight: 700;\">Pellentesque habitant morbi tristique</span>&nbsp;senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper.&nbsp;<i>Aenean ultricies mi vitae est.</i>&nbsp;Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed,&nbsp;<code style=\"font-family: SFMono-Regular, Menlo, Monaco, Consolas, &quot;Liberation Mono&quot;, &quot;Courier New&quot;, monospace; font-size: 12.6px; color: rgb(232, 62, 140); overflow-wrap: break-word; border-radius: 0px;\">commodo vitae</code>, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui.&nbsp;<a href=\"http://localhost/2022-ecommerce/blog-post.html#\" style=\"color: rgb(79, 191, 168); text-decoration-line: none; display: inline-block; transition: all 0.3s ease 0s !important;\">Donec non enim</a>&nbsp;in turpis pulvinar facilisis. Ut felis.</p><p style=\"margin-bottom: 1rem; color: rgb(33, 37, 41); font-family: Roboto, Helvetica, Arial, sans-serif; font-size: 16px;\"><img src=\"http://localhost/2022-ecommerce/img/blog2.jpg\" alt=\"Example blog post alt\" class=\"img-fluid\"></p><h2 style=\"margin-bottom: 1rem; font-weight: 700; line-height: 1.1; font-size: 1.8rem; font-family: Roboto, Helvetica, Arial, sans-serif; color: rgb(33, 37, 41);\">Header Level 2</h2><ol style=\"color: rgb(33, 37, 41); font-family: Roboto, Helvetica, Arial, sans-serif; font-size: 16px;\"><li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</li><li>Aliquam tincidunt mauris eu risus.</li></ol><blockquote class=\"blockquote\" style=\"margin-bottom: 2rem; font-size: 16px; padding: 0.5rem 1rem; border-left: 5px solid rgb(79, 191, 168); color: rgb(33, 37, 41); font-family: Roboto, Helvetica, Arial, sans-serif;\"><p class=\"text-sm\" style=\"margin-bottom: 1rem; font-size: 0.9rem;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus magna. Cras in mi at felis aliquet congue. Ut a est eget ligula molestie gravida. Curabitur massa. Donec eleifend, libero at sagittis mollis, tellus est malesuada tellus, at luctus turpis elit sit amet quam. Vivamus pretium ornare est.</p></blockquote><h3 style=\"margin-bottom: 1rem; font-weight: 700; line-height: 1.1; font-size: 1.5rem; font-family: Roboto, Helvetica, Arial, sans-serif; color: rgb(33, 37, 41);\">Header Level 3</h3><p style=\"margin-bottom: 1rem; color: rgb(33, 37, 41); font-family: Roboto, Helvetica, Arial, sans-serif; font-size: 16px;\">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis. Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus</p><ul style=\"color: rgb(33, 37, 41); font-family: Roboto, Helvetica, Arial, sans-serif; font-size: 16px;\"><li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</li><li>Aliquam tincidunt mauris eu risus.</li></ul><p style=\"margin-bottom: 1rem; color: rgb(33, 37, 41); font-family: Roboto, Helvetica, Arial, sans-serif; font-size: 16px;\"><img src=\"http://localhost/2022-ecommerce/img/blog.jpg\" alt=\"Example blog post alt\" class=\"img-fluid\"></p><p style=\"margin-bottom: 1rem; color: rgb(33, 37, 41); font-family: Roboto, Helvetica, Arial, sans-serif; font-size: 16px;\">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis. Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus</p>', '1682947280.jpg', '2022-08-05 12:52:36', 1),
(6, 'WHAT TO DO', 'Fifth abundantly made Give sixth hath. Cattle creature i be don\'t them behold green moved fowl Moved life us beast good yielding. Have bring.', '<p class=\"text-sm\" style=\"margin-bottom: 1rem; font-size: 0.9rem; color: rgb(33, 37, 41); font-family: Roboto, Helvetica, Arial, sans-serif;\"><span style=\"font-weight: 700;\">Pellentesque habitant morbi tristique</span>&nbsp;senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper.&nbsp;<i>Aenean ultricies mi vitae est.</i>&nbsp;Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed,&nbsp;<code style=\"font-family: SFMono-Regular, Menlo, Monaco, Consolas, &quot;Liberation Mono&quot;, &quot;Courier New&quot;, monospace; font-size: 12.6px; color: rgb(232, 62, 140); overflow-wrap: break-word; border-radius: 0px;\">commodo vitae</code>, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui.&nbsp;<a href=\"http://localhost/2022-ecommerce/blog-post.html#\" style=\"color: rgb(79, 191, 168); text-decoration-line: none; display: inline-block; transition: all 0.3s ease 0s !important;\">Donec non enim</a>&nbsp;in turpis pulvinar facilisis. Ut felis.</p><p style=\"margin-bottom: 1rem; color: rgb(33, 37, 41); font-family: Roboto, Helvetica, Arial, sans-serif; font-size: 16px;\"><img src=\"http://localhost/2022-ecommerce/img/blog2.jpg\" alt=\"Example blog post alt\" class=\"img-fluid\"></p><h2 style=\"margin-bottom: 1rem; font-weight: 700; line-height: 1.1; font-size: 1.8rem; font-family: Roboto, Helvetica, Arial, sans-serif; color: rgb(33, 37, 41);\">Header Level 2</h2><ol style=\"color: rgb(33, 37, 41); font-family: Roboto, Helvetica, Arial, sans-serif; font-size: 16px;\"><li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</li><li>Aliquam tincidunt mauris eu risus.</li></ol><blockquote class=\"blockquote\" style=\"margin-bottom: 2rem; font-size: 16px; padding: 0.5rem 1rem; border-left: 5px solid rgb(79, 191, 168); color: rgb(33, 37, 41); font-family: Roboto, Helvetica, Arial, sans-serif;\"><p class=\"text-sm\" style=\"margin-bottom: 1rem; font-size: 0.9rem;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus magna. Cras in mi at felis aliquet congue. Ut a est eget ligula molestie gravida. Curabitur massa. Donec eleifend, libero at sagittis mollis, tellus est malesuada tellus, at luctus turpis elit sit amet quam. Vivamus pretium ornare est.</p></blockquote><h3 style=\"margin-bottom: 1rem; font-weight: 700; line-height: 1.1; font-size: 1.5rem; font-family: Roboto, Helvetica, Arial, sans-serif; color: rgb(33, 37, 41);\">Header Level 3</h3><p style=\"margin-bottom: 1rem; color: rgb(33, 37, 41); font-family: Roboto, Helvetica, Arial, sans-serif; font-size: 16px;\">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis. Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus</p><ul style=\"color: rgb(33, 37, 41); font-family: Roboto, Helvetica, Arial, sans-serif; font-size: 16px;\"><li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</li><li>Aliquam tincidunt mauris eu risus.</li></ul><p style=\"margin-bottom: 1rem; color: rgb(33, 37, 41); font-family: Roboto, Helvetica, Arial, sans-serif; font-size: 16px;\"><img src=\"http://localhost/2022-ecommerce/img/blog.jpg\" alt=\"Example blog post alt\" class=\"img-fluid\"></p><p style=\"margin-bottom: 1rem; color: rgb(33, 37, 41); font-family: Roboto, Helvetica, Arial, sans-serif; font-size: 16px;\">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis. Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus</p>', '1543202970.jpg', '2022-08-05 12:53:30', 1);

-- --------------------------------------------------------

--
-- Structure de la table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `nom_produit` varchar(255) NOT NULL,
  `prix_produit` decimal(10,0) NOT NULL,
  `qte_produit` int(11) NOT NULL,
  `img_produit` varchar(255) NOT NULL,
  `prix_tot` decimal(10,0) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `etat` int(11) NOT NULL,
  `ip` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `cart`
--

INSERT INTO `cart` (`id`, `nom_produit`, `prix_produit`, `qte_produit`, `img_produit`, `prix_tot`, `id_produit`, `etat`, `ip`) VALUES
(30, 'Elite Book x 360', '70', 1, '925793215.jfif', '70', 9, 1, '192.168.133.142'),
(31, 'HP Elite Book 1', '255', 1, '1542995302.jfif', '255', 1, 1, '192.168.133.142'),
(47, 'Test7', '20', 1, '1833565973.jfif', '20', 16, 1, '192.168.48.142'),
(48, 'Test prod', '9', 1, '1875874516.jfif', '9', 22, 1, '192.168.48.142'),
(49, 'LENOVO', '250', 1, '396471227.jfif', '250', 4, 1, '192.168.48.63'),
(50, 'LENOVO', '250', 1, '396471227.jfif', '250', 4, 0, '192.168.48.142');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL,
  `libelle` varchar(100) NOT NULL,
  `detail` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `libelle`, `detail`) VALUES
(1, 'TOSHIBA', 'Toshiba'),
(2, 'HP', 'HP détail'),
(3, 'LENOVO', 'Detail Lenovo'),
(6, 'ACER', 'Détail Acer'),
(7, 'MAC', 'Détail Mac'),
(11, 'DELL', 'Dell Pro'),
(17, 'CLAVIER', 'CLAVIER');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `nom_client` varchar(100) NOT NULL,
  `email_client` varchar(255) DEFAULT NULL,
  `telephone_client` varchar(20) NOT NULL,
  `avenue` varchar(255) NOT NULL,
  `quartier` varchar(255) NOT NULL,
  `commune` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `province` varchar(255) DEFAULT NULL,
  `pays` varchar(255) DEFAULT NULL,
  `code_postal` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `date_enreg` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id`, `nom_client`, `email_client`, `telephone_client`, `avenue`, `quartier`, `commune`, `ville`, `province`, `pays`, `code_postal`, `avatar`, `password`, `date_enreg`) VALUES
(3, 'Antoine Bulyalugo', NULL, '0999999999', 'Collège Alfajiri', 'Nyalukemba', 'Ibanda', 'Bukavu', NULL, NULL, NULL, NULL, '$2y$10$H3WNwf4RuOzXrxqwWk3KIeCslqhOpKAcKNbTT8S5ZwC8Y5wUC0Qoa', '2022-06-11 22:15:50'),
(4, 'Matat Mponyo', NULL, '0888888888', 'Kimengele', 'Mosala', 'Gombe', 'Kinshasa', NULL, NULL, NULL, NULL, '$2y$10$O.2PR9fpkIfyFUw5nIWW3O8PD8dWD0zwSdxlZQdsWgtr0KQr8RH0O', '2022-07-07 16:10:43'),
(5, 'Marceline Bossa', NULL, '0777777777', 'Majeno', 'Goma', 'Goma', 'Goma', NULL, NULL, NULL, NULL, '$2y$10$XZcQ/NDIXUe1RRVAtOSReuxTDKy6zT.O8ox3rPrJt91By0RS05vPq', '2022-07-07 16:12:25');

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `postnom` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `objet` varchar(255) NOT NULL,
  `message` longtext NOT NULL,
  `date_pub` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id`, `nom`, `postnom`, `email`, `objet`, `message`, `date_pub`) VALUES
(1, 'Polo', 'Malolo', 'test]gmail.com', 'Test', 'Test Mail', '2022-08-01 13:18:41'),
(2, 'Serge ', 'Blaise', 'blaise@gmail.com', 'Test2', 'Test m', '2022-08-01 13:18:41'),
(3, 'Sifa', 'Jean', 'sifa.gean@gmail.com', 'Sifa Test', 'je test votre plateforme', '2022-08-01 13:18:41'),
(4, 'Mao', 'Fundi', 'mao@gmail.com', 'Message', 'Superbe plateforme New Technology Center', '2022-08-01 13:18:41');

-- --------------------------------------------------------

--
-- Structure de la table `entree_stock_maison`
--

CREATE TABLE `entree_stock_maison` (
  `id` int(11) NOT NULL,
  `qte` int(11) NOT NULL,
  `prix_achat` decimal(10,0) NOT NULL,
  `fournisseur` varchar(255) NOT NULL,
  `date_entree` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_produit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `entree_stock_maison`
--

INSERT INTO `entree_stock_maison` (`id`, `qte`, `prix_achat`, `fournisseur`, `date_entree`, `id_produit`) VALUES
(2, 2, '250', 'Abdul', '2022-07-16 10:11:48', 1),
(3, 2, '300', 'Molamba', '2022-07-16 10:13:38', 1),
(4, 5, '150', 'Muhamed', '2022-07-16 10:14:31', 2);

-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--

CREATE TABLE `entreprise` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `contact_phone` varchar(20) NOT NULL,
  `contact_email` varchar(50) NOT NULL,
  `logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `entreprise`
--

INSERT INTO `entreprise` (`id`, `nom`, `adresse`, `contact_phone`, `contact_email`, `logo`) VALUES
(1, 'New Technology Center', 'Av Kibombo Q. Ndendere C. Ibanda V. Bukavu', '+243912345678', 'info@newtech.com', '1712037152.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `favoris`
--

CREATE TABLE `favoris` (
  `id` int(11) NOT NULL,
  `id_cli` int(11) NOT NULL,
  `id_pro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `favoris`
--

INSERT INTO `favoris` (`id`, `id_cli`, `id_pro`) VALUES
(9, 4, 4),
(11, 4, 16),
(13, 3, 18),
(14, 3, 10),
(15, 3, 4);

-- --------------------------------------------------------

--
-- Structure de la table `gerant`
--

CREATE TABLE `gerant` (
  `id` int(11) NOT NULL,
  `nom_complet` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `gerant`
--

INSERT INTO `gerant` (`id`, `nom_complet`, `email`, `telephone`, `login`, `password`, `type`) VALUES
(1, 'Frank', 'admin@ntc.com', '0987654321', 'admin', 'admin', 'Admin'),
(2, 'Système', 'sys@gmail.com', '09876543221', 'systeme', '1234', 'Gérant');

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

CREATE TABLE `panier` (
  `id` int(11) NOT NULL,
  `date_panier` timestamp NOT NULL DEFAULT current_timestamp(),
  `quantite` int(11) NOT NULL,
  `prix_vente` decimal(10,0) NOT NULL,
  `prix_tot` decimal(10,0) NOT NULL,
  `adresse_livraison` varchar(255) NOT NULL,
  `nom_livreur` varchar(50) DEFAULT NULL,
  `remise` decimal(10,0) DEFAULT NULL,
  `telephone_monney` varchar(20) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `etat` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `id` int(11) NOT NULL,
  `designation` varchar(244) NOT NULL,
  `description` text NOT NULL,
  `prix` decimal(10,0) NOT NULL,
  `quantite` int(10) NOT NULL,
  `disponible` varchar(10) NOT NULL,
  `image` text DEFAULT NULL,
  `id_cat` int(11) NOT NULL,
  `date_ajout` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id`, `designation`, `description`, `prix`, `quantite`, `disponible`, `image`, `id_cat`, `date_ajout`) VALUES
(1, 'HP Elite Book 1', '<ul><li>Processeur Core i5</li><li>Capacité 500Go</li><li>Autonomie 5Heures</li><li>Garantie 3 mois </li></ul>', '255', 17, 'Oui', '1542995302.jfif', 1, '2022-05-01'),
(2, 'ACER', 'Détail du produit', '100', 5, 'Oui', '1411670604.jfif', 1, '2022-05-03'),
(3, 'DELL', 'Détail du produit 1', '200', 10, 'Oui', '549529855.jfif', 11, '2022-05-09'),
(4, 'LENOVO', 'Détail du produit', '250', 14, 'Oui', '396471227.jfif', 1, '2022-06-05'),
(5, 'TOSHIBA', 'Détail du produit', '200', 5, 'Oui', '493441676.jfif', 1, '2022-05-15'),
(8, 'Test2', 'Détail du produit', '90', 6, 'Oui', '1824961684.jfif', 1, '2022-05-15'),
(9, 'Elite Book x 360', 'Détail du produit', '70', 2, 'Oui', '925793215.jfif', 2, '2022-05-09'),
(10, 'Test4', 'Détail du produit', '12', 1, 'Oui', '2126846665.jfif', 1, '2022-05-24'),
(16, 'Test7', 'Détail du produit', '20', 1, 'Oui', '1833565973.jfif', 1, '2022-06-05'),
(18, 'Test10', 'Détail du produit', '20', 2, 'Oui', '629140607.jfif', 1, '2022-06-05'),
(22, 'Test prod', '<b>Produ</b><p>Test</p>', '9', 6, 'Oui', '1875874516.jfif', 7, '2022-06-05'),
(23, 'Mac Book Ac', 'Mac Dispo', '350', 4, 'Non', '628593696.jfif', 7, '2022-07-07'),
(25, 'CLAVIER', 'OK', '30', 1, 'Oui', '1313145093.jpg', 17, '2022-08-31');

-- --------------------------------------------------------

--
-- Structure de la table `publicite`
--

CREATE TABLE `publicite` (
  `id` int(11) NOT NULL,
  `titre` text NOT NULL,
  `detail` text NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `publicite`
--

INSERT INTO `publicite` (`id`, `titre`, `detail`, `image`) VALUES
(1, 'Multipurpose responsive theme ', 'Business. Corporate. Agency.<p>Portfolio. Blog. E-commerce.</p>', 'template-homepage.png'),
(2, '46 HTML pages full of features', 'Sliders and carousels 4 Header variations Google maps,&nbsp;<p>Forms, Megamenu, CSS3 Animations and much more&nbsp;</p><p>+ 11 extra pages showing template features</p>', 'template-mac.png'),
(3, 'Design', 'Profiter des derniers solde de ce mois\r\nFull width and boxed mode\r\nEasily readable Roboto font and awesome icons\r\n7 preprepared colour variations', 'template-easy-customize.png'),
(4, 'Easy to customize', '7 preprepared colour variations.\r\nEasily to change fonts', 'template-easy-code.png');

-- --------------------------------------------------------

--
-- Structure de la table `sortie_stock_maison`
--

CREATE TABLE `sortie_stock_maison` (
  `id` int(11) NOT NULL,
  `qte` int(11) NOT NULL,
  `date_sortie` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_produit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `sortie_stock_maison`
--

INSERT INTO `sortie_stock_maison` (`id`, `qte`, `date_sortie`, `id_produit`) VALUES
(1, 2, '2022-07-22 22:59:57', 1),
(3, 4, '2022-07-22 23:02:47', 4),
(5, 2, '2022-08-31 17:16:00', 7);

-- --------------------------------------------------------

--
-- Structure de la table `stock_maison`
--

CREATE TABLE `stock_maison` (
  `id` int(11) NOT NULL,
  `libelle` varchar(255) NOT NULL,
  `stock` int(11) NOT NULL,
  `date_entree` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `stock_maison`
--

INSERT INTO `stock_maison` (`id`, `libelle`, `stock`, `date_entree`) VALUES
(1, 'Toshiba', 30, '2022-07-16 09:06:35'),
(2, 'Dell', 12, '2022-07-16 09:10:37'),
(3, 'Acer', 15, '2022-07-16 09:11:38'),
(4, 'Hp', 35, '2022-07-16 09:11:45'),
(7, 'CLAVIER SS', 3, '2022-08-31 17:15:30');

-- --------------------------------------------------------

--
-- Structure de la table `subscriber`
--

CREATE TABLE `subscriber` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date_sous` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `subscriber`
--

INSERT INTO `subscriber` (`id`, `email`, `date_sous`) VALUES
(1, 'test@gmail.com', '2022-08-03 23:33:52'),
(2, 'franck@gmail.com', '2022-08-03 23:34:16');

-- --------------------------------------------------------

--
-- Structure de la table `temoignage`
--

CREATE TABLE `temoignage` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `fonction` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `date_pub` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `temoignage`
--

INSERT INTO `temoignage` (`id`, `nom`, `fonction`, `message`, `image`, `date_pub`) VALUES
(1, 'John McIntyre', 'CEO, TransTech', 'One morning, when Gregor Samsa woke from troubled dreams, he found himself transformed in his bed into a horrible vermin. He lay on his armour-like back, and if he lifted his head a little he could see his brown belly, slightly domed and divided by arches into stiff sections.', '1047026831.jpg', '2022-08-05 08:48:53'),
(2, 'John McIntyre', 'CEO, TransTech', 'The bedding was hardly able to cover it and seemed ready to slide off any moment. His many legs, pitifully thin compared with the size of the rest of him, waved about helplessly as he looked. \"What\'s happened to me? \" he thought. It wasn\'t a dream.', 'avatar.png', '2022-08-05 08:53:35'),
(3, 'John McIntyre', 'CEO, TransTech', 'The bedding was hardly able to cover it and seemed ready to slide off any moment. His many legs, pitifully thin compared with the size of the rest of him, waved about helplessly as he looked. \"What\'s happened to me? \" he thought. It wasn\'t a dream.', 'avatar.png', '2022-08-05 08:56:35'),
(4, 'Lupete Placide', 'CEO Kivu Freelance', 'The bedding was hardly able to cover it and seemed ready to slide off any moment. His many legs, pitifully thin compared with the size of the rest of him, waved about helplessly as he looked. \"What\'s happened to me? \" he thought. It wasn\'t a dream.', '790868471.jpg', '2022-08-05 08:57:40'),
(5, 'Antoine Bulyalugo', 'Compable CADECO', 'The bedding was hardly able to cover it and seemed ready to slide off any moment. His many legs, pitifully thin compared with the size of the rest of him, waved about helplessly as he looked. \"What\'s happened to me? \" he thought. It wasn\'t a dream.', '44697953.jpg', '2022-08-05 08:58:18'),
(6, 'Polo Nkuna', 'CEO Navaga', 'The bedding was hardly able to cover it and seemed ready to slide off any moment. His many legs, pitifully thin compared with the size of the rest of him, waved about helplessly as he looked. \"What\'s happened to me? \" he thought. It wasn\'t a dream.', '1590217909.jpg', '2022-08-05 08:58:56');

-- --------------------------------------------------------

--
-- Structure de la table `vente`
--

CREATE TABLE `vente` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(20) NOT NULL,
  `paye_mode` varchar(255) NOT NULL,
  `produits` text NOT NULL,
  `prix_total` decimal(10,0) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `date_vente` timestamp NOT NULL DEFAULT current_timestamp(),
  `livraison` varchar(25) NOT NULL,
  `num_transaction` varchar(255) DEFAULT NULL,
  `id_cli` int(11) NOT NULL,
  `remise` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `vente`
--

INSERT INTO `vente` (`id`, `nom`, `email`, `phone`, `paye_mode`, `produits`, `prix_total`, `adresse`, `date_vente`, `livraison`, `num_transaction`, `id_cli`, `remise`) VALUES
(1, 'Lupete Placide', 'placide@gmail.com', '0987654321', 'Livraison', 'HP Elite Book 1(3), ACER(1), LENOVO(1)', '1115', 'Feu rouge, Q. Ndendere, C.Ibanda', '2022-06-06 11:33:24', 'accepte', '', 3, '10'),
(2, 'Mbale Deo', 'deo@gmail.com', '0989878787', 'Livraison', 'HP Elite Book 1(3), ACER(1), LENOVO(1)', '1115', 'Labotte/Fond social', '2022-06-07 11:35:32', 'livre', '', 3, '5'),
(3, 'Furaha bertille', 'furaha@gmail.com', '0989127890', 'Mobile Money', 'HP Elite Book 1(3), ACER(1), LENOVO(1)', '1115', 'Uvira/Kasenga', '2022-06-07 11:44:32', 'encours', '', 3, '20'),
(4, 'Riziki Justine', 'riziki@gmail.com', '0981290837', 'Livraison', 'HP Elite Book 1(3), ACER(1), LENOVO(1)', '1115', 'Bukavu, Av Saio N°10', '2022-06-07 11:45:59', 'accepte', '', 3, '0'),
(5, 'Adeline Zawadi', 'adeline@gmail.com', '0998901238', 'Mobile Money', 'HP Elite Book 1(1)', '255', 'Uvira Av Kasenga', '2022-06-07 11:56:47', 'encours', '', 3, '0'),
(6, 'Manyumba Pascaline', 'pascal@gmail.com', '0987812340', 'Mobile Money', 'ACER(1)', '100', 'Kamituga', '2022-06-07 12:07:00', 'annule', '', 3, '0'),
(7, 'test', 'test@gmail.com', '0987654321', 'Mobile Money', 'ACER(1)', '100', 'adresse de livraison', '2022-06-07 12:15:07', 'encours', '', 3, '0'),
(8, 'test', 'test@gmail.com', '98765432345', 'Mobile Money', 'ACER(1)', '100', 'adresse de livraison', '2022-06-07 12:54:02', 'annule', '', 3, '0'),
(9, 'Antoine Bulyalugo', '', '0999999999', 'Mobile Money', 'Elite Book x 360(1), HP Elite Book 1(1), Elite Book x 360(2), TOSHIBA(1), HP Elite Book 1(1)', '920', 'Collège Alfajiri Nyalukemba Ibanda Bukavu', '2022-06-18 13:33:43', 'livre', 'PO909876.2343.P875241', 3, '10'),
(10, 'Antoine Bulyalugo', 'antoine@gmail.com', '0999999999', 'Mobile Money', 'HP Elite Book 1(1), ACER(1)', '355', 'Collège Alfajiri Nyalukemba Ibanda Bukavu', '2022-06-18 13:45:57', 'annule', NULL, 2, '0'),
(11, 'Matata Mponyo', '', '0888888888', 'Livraison', 'HP Elite Book 1(1)', '255', 'Kimengele Mosala Gombe Kinshasa', '2022-07-07 16:13:30', 'encours', NULL, 4, '0'),
(12, 'Antoine Bulyalugo', '', '0999999999', 'Livraison', 'HP Elite Book 1(2), DELL(1)', '710', 'Collège Alfajiri Nyalukemba Ibanda Bukavu', '2022-07-07 17:45:30', 'livre', NULL, 3, '2'),
(13, 'Antoine Bulyalugo', 'Test@gmail.com ', '0999999999', 'Livraison', 'LENOVO(1), TOSHIBA(1), Test7(1), Test prod(1), LENOVO(1)', '729', 'Collège Alfajiri Nyalukemba Ibanda Bukavu', '2022-08-01 16:20:51', 'livre', NULL, 3, '1');

-- --------------------------------------------------------

--
-- Structure de la table `vente_admin`
--

CREATE TABLE `vente_admin` (
  `id` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  `prix` decimal(10,0) NOT NULL,
  `date_vente` date NOT NULL,
  `id_prod` int(11) NOT NULL,
  `client` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `vente_admin`
--

INSERT INTO `vente_admin` (`id`, `quantite`, `prix`, `date_vente`, `id_prod`, `client`) VALUES
(4, 2, '240', '2022-06-24', 4, 'Antoine'),
(5, 3, '300', '2022-07-03', 1, 'Blaise'),
(6, 2, '150', '2022-07-07', 22, 'Placide'),
(7, 2, '150', '2022-07-07', 4, 'Client'),
(8, 1, '30', '2022-08-31', 25, 'Client'),
(10, 2, '200', '2022-08-31', 4, 'Serge');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `approv`
--
ALTER TABLE `approv`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_prod` (`id_prod`);

--
-- Index pour la table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Index pour la table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `entree_stock_maison`
--
ALTER TABLE `entree_stock_maison`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_produit` (`id_produit`);

--
-- Index pour la table `entreprise`
--
ALTER TABLE `entreprise`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `favoris`
--
ALTER TABLE `favoris`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cli` (`id_cli`),
  ADD KEY `id_pro` (`id_pro`);

--
-- Index pour la table `gerant`
--
ALTER TABLE `gerant`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `panier`
--
ALTER TABLE `panier`
  ADD PRIMARY KEY (`id`),
  ADD KEY `panier_ibfk_1` (`id_produit`),
  ADD KEY `panier_ibfk_2` (`id_client`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cat` (`id_cat`);

--
-- Index pour la table `publicite`
--
ALTER TABLE `publicite`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sortie_stock_maison`
--
ALTER TABLE `sortie_stock_maison`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_produit` (`id_produit`);

--
-- Index pour la table `stock_maison`
--
ALTER TABLE `stock_maison`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `subscriber`
--
ALTER TABLE `subscriber`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `temoignage`
--
ALTER TABLE `temoignage`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `vente`
--
ALTER TABLE `vente`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cli` (`id_cli`);

--
-- Index pour la table `vente_admin`
--
ALTER TABLE `vente_admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_prod` (`id_prod`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `approv`
--
ALTER TABLE `approv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `entree_stock_maison`
--
ALTER TABLE `entree_stock_maison`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `entreprise`
--
ALTER TABLE `entreprise`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `favoris`
--
ALTER TABLE `favoris`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `gerant`
--
ALTER TABLE `gerant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `panier`
--
ALTER TABLE `panier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `publicite`
--
ALTER TABLE `publicite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `sortie_stock_maison`
--
ALTER TABLE `sortie_stock_maison`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `stock_maison`
--
ALTER TABLE `stock_maison`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `subscriber`
--
ALTER TABLE `subscriber`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `temoignage`
--
ALTER TABLE `temoignage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `vente`
--
ALTER TABLE `vente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `vente_admin`
--
ALTER TABLE `vente_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `approv`
--
ALTER TABLE `approv`
  ADD CONSTRAINT `approv_ibfk_1` FOREIGN KEY (`id_prod`) REFERENCES `produit` (`id`);

--
-- Contraintes pour la table `blog`
--
ALTER TABLE `blog`
  ADD CONSTRAINT `blog_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `gerant` (`id`);

--
-- Contraintes pour la table `entree_stock_maison`
--
ALTER TABLE `entree_stock_maison`
  ADD CONSTRAINT `entree_stock_maison_ibfk_1` FOREIGN KEY (`id_produit`) REFERENCES `stock_maison` (`id`);

--
-- Contraintes pour la table `favoris`
--
ALTER TABLE `favoris`
  ADD CONSTRAINT `favoris_ibfk_1` FOREIGN KEY (`id_cli`) REFERENCES `client` (`id`),
  ADD CONSTRAINT `favoris_ibfk_2` FOREIGN KEY (`id_pro`) REFERENCES `produit` (`id`);

--
-- Contraintes pour la table `panier`
--
ALTER TABLE `panier`
  ADD CONSTRAINT `panier_ibfk_1` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id`),
  ADD CONSTRAINT `panier_ibfk_2` FOREIGN KEY (`id_client`) REFERENCES `client` (`id`);

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `produit_ibfk_1` FOREIGN KEY (`id_cat`) REFERENCES `categorie` (`id`);

--
-- Contraintes pour la table `sortie_stock_maison`
--
ALTER TABLE `sortie_stock_maison`
  ADD CONSTRAINT `sortie_stock_maison_ibfk_1` FOREIGN KEY (`id_produit`) REFERENCES `stock_maison` (`id`);

--
-- Contraintes pour la table `vente_admin`
--
ALTER TABLE `vente_admin`
  ADD CONSTRAINT `vente_admin_ibfk_1` FOREIGN KEY (`id_prod`) REFERENCES `produit` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
