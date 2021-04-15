-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 15, 2021 at 10:07 AM
-- Server version: 5.7.32
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `gs_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `gs_bm_table`
--

CREATE TABLE `gs_bm_table` (
  `id` int(12) NOT NULL,
  `title` varchar(64) NOT NULL,
  `url` text NOT NULL,
  `comment` text,
  `indate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gs_bm_table`
--

INSERT INTO `gs_bm_table` (`id`, `title`, `url`, `comment`, `indate`) VALUES
(5, '粗にして野だが卑ではない', 'https://www.amazon.co.jp/%E3%80%8C%E7%B2%97%E3%81%AB%E3%81%97%E3%81%A6%E9%87%8E%E3%81%A0%E3%81%8C%E5%8D%91%E3%81%A7%E3%81%AF%E3%81%AA%E3%81%84%E3%80%8D%E7%9F%B3%E7%94%B0%E7%A6%AE%E5%8A%A9%E3%81%AE%E7%94%9F%E6%B6%AF-%E6%96%87%E6%98%A5%E6%96%87%E5%BA%AB-%E5%9F%8E%E5%B1%B1-%E4%B8%89%E9%83%8E-ebook/dp/B009DECXM2', '三井物産に35年間在職し、華々しい業績をあげた後、78歳で財界人から初めて国鉄総裁になった商社マンの伝記書籍', '2021-04-15 15:44:09'),
(6, 'ニュータイプの時代', 'https://www.amazon.co.jp/%E3%83%8B%E3%83%A5%E3%83%BC%E3%82%BF%E3%82%A4%E3%83%97%E3%81%AE%E6%99%82%E4%BB%A3-%E5%B1%B1%E5%8F%A3-%E5%91%A8-ebook/dp/B07SSY4LJ9/ref=msx_wsirn_v1_1/355-9887160-2856364?_encoding=UTF8&pd_rd_i=B07SSY4LJ9&pd_rd_r=63e5a0fc-44a9-45da-89f3-0a49ef51a3a5&pd_rd_w=sZL3x&pd_rd_wg=7vCCt&pf_rd_p=8acfbc98-0f10-4ca5-ab7c-019f8ea70a4e&pf_rd_r=X3XGN2B0NCCH9VZWVP06&psc=1&refRID=X3XGN2B0NCCH9VZWVP06', '「思考法」「働き方」「生き方」「キャリア」「学び方」\r\nをまとめた生存戦略の決定版!!', '2021-03-31 18:05:58'),
(17, 'ジョブ理論', 'https://www.amazon.co.jp/%E3%82%B8%E3%83%A7%E3%83%96%E7%90%86%E8%AB%96-%E3%82%A4%E3%83%8E%E3%83%99%E3%83%BC%E3%82%B7%E3%83%A7%E3%83%B3%E3%82%92%E4%BA%88%E6%B8%AC%E5%8F%AF%E8%83%BD%E3%81%AB%E3%81%99%E3%82%8B%E6%B6%88%E8%B2%BB%E3%81%AE%E3%83%A1%E3%82%AB%E3%83%8B%E3%82%BA%E3%83%A0-%E3%83%93%E3%82%B8%E3%83%8D%E3%82%B9%E3%83%AA%E3%83%BC%E3%83%80%E3%83%BC1%E4%B8%87%E4%BA%BA%E3%81%8C%E9%81%B8%E3%81%B6%E3%83%99%E3%82%B9%E3%83%88%E3%83%93%E3%82%B8%E3%83%8D%E3%82%B9%E6%9B%B8%E3%83%88%E3%83%83%E3%83%97%E3%83%9D%E3%82%A4%E3%83%B3%E3%83%88%E5%A4%A7%E8%B3%9E%E7%AC%AC2%E4%BD%8D-%E3%83%8F%E3%83%BC%E3%83%91%E3%83%BC%E3%82%B3%E3%83%AA%E3%83%B3%E3%82%BA%E3%83%BB%E3%83%8E%E3%83%B3%E3%83%95%E3%82%A3%E3%82%AF%E3%82%B7%E3%83%A7%E3%83%B3-%E3%82%AF%E3%83%AA%E3%82%B9%E3%83%86%E3%83%B3%E3%82%BB%E3%83%B3/dp/4596551227/ref=pd_bxgy_img_3/356-4727563-4317720?_encoding=UTF8&pd_rd_i=4596551227&pd_rd_r=43c90683-8ab0-41f2-a994-b72722c1c081&pd_rd_w=4u8ET&pd_rd_wg=kpqFx&pf_rd_p=c92b218a-07b0-4eb8-b4c0-7deb8e7dc525&pf_rd_r=XR6KQRJ0PV8V1K0SY327&psc=1&refRID=XR6KQRJ0PV8V1K0SY327', 'イノベーションの成否を分けるのは、顧客データ(この層はあの層と類似性が高い。顧客の68%が商品Bより商品Aを好むetc)や、\r\n市場分析、スプレッドシートに表れる数字ではない。「顧客の片づけたいジョブ(用事・仕事)」にある。', '2021-04-08 12:05:37'),
(20, 'aa', 'aaa', 'aaa', '2021-04-15 15:06:42'),
(21, 'aaaaaaa', 'aaaaaa', 'aaaaaaaa', '2021-04-15 15:06:47'),
(22, 'test2', 'test2', 'test2', '2021-04-15 18:41:50'),
(23, 'a', 'a', 'a', '2021-04-15 18:41:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gs_bm_table`
--
ALTER TABLE `gs_bm_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gs_bm_table`
--
ALTER TABLE `gs_bm_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
