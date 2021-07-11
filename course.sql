-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2021-07-07 17:12:33
-- 伺服器版本： 10.4.18-MariaDB
-- PHP 版本： 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `course`
--

-- --------------------------------------------------------

--
-- 資料表結構 `consignee_other`
--

CREATE TABLE `consignee_other` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `fullname` varchar(11) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `zipcode` int(5) NOT NULL,
  `city` varchar(10) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 資料表結構 `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `video` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `video_img` text CHARACTER SET utf8mb4 NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `price` int(11) NOT NULL,
  `description` text CHARACTER SET utf8mb4 NOT NULL,
  `title` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `age` text CHARACTER SET utf8mb4 NOT NULL,
  `location` text CHARACTER SET utf8mb4 NOT NULL,
  `content` text CHARACTER SET utf8mb4 NOT NULL,
  `info` text CHARACTER SET utf8mb4 NOT NULL,
  `notice` text CHARACTER SET utf8mb4 NOT NULL,
  `limitNum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `event`
--

INSERT INTO `event` (`id`, `cat_id`, `video`, `video_img`, `name`, `date`, `time`, `price`, `description`, `title`, `age`, `location`, `content`, `info`, `notice`, `limitNum`) VALUES
(1, 4, 'https://www.youtube.com/watch?v=YGhxsr_WxVc1', '', '螢河旅行12', '2021-07-07', '19:00:00', 8001, '星夜。螢河。森林。繡球花。1\r\n\r\n踏進中部的後花園、台中最美的賞螢秘境，\r\n8000 棵樹的森林秘境，海拔 700 公尺的山中花園，\r\n\r\n螢河在黑暗中閃爍，那是寧靜而象徵生生不息的希望之光~出發吧，進入這座森林。為這個季節譜出最動人的旋律', '螢河旅行 －報名資訊1', '所有喜歡森林的大小朋友們1', '森林平台1', '本票券每張皆包含入園門票150元，森林、螢火蟲秘境探險導覽，紫丘冰淇淋乙盒，森林旋轉木馬體驗乙次、香草水手作課程乙次、明信片乙張、一人份螢光晚餐。1', '15:15~15:30	螢河旅客集合，準時報到，記得攜帶電子票卷1\r\n15:30~16:40	第一星系：森林時光，園區導覽及體驗，搭乘森林中的旋轉木馬，吃一球森林冰淇淋，寫一張明信片給重要的人\r\n16:40~17:45	第二星系：香草導覽及手作，香草手作，創作獨一無二的香草水\r\n17:45~18:50	第三星系：花園野餐，親近自然，療癒人心的香草野餐籃\r\n19:00~19:30	第四星系：螢河旅行，專屬賞螢導覽（螢火蟲復育生態故事、靜心賞螢） ', '➤賞螢時間大約是19:00-20:30。若遇到下雨而18點雨停止，螢火蟲還是會出現。(在雨天的狀況下，活動還是照常進行。只要做好心理與裝備上的準備，還是可以開心的來參加)1\r\n\r\n1. 本活動有雨天備案，在賞螢活動前雨停，都還是看得到螢火蟲出現。 如果您是下雨天就完全不想出門的客人，請斟酌考慮是否報名！若天氣真的變化太大，導致行程無法走完。將致贈免費入園卷乙張，與免費賞螢乙次。(視報名人數發放)。 \r\n\r\n2. 基於安全考量請穿適宜走路之球鞋(需防滑)、長褲及輕便雨衣。請勿穿高跟鞋、夾腳拖鞋或露趾涼鞋。 \r\n\r\n3. 螢火蟲生態體驗的活動路線會行經較為陡峭的步道(此段路無法推嬰兒車或輪椅)，請參加者考量自身能力是否適合。 \r\n\r\n4. 本活動除了觀賞螢火蟲的生態外，也教育大眾如何保育螢火蟲，螢火蟲怕光。所以活動途中嚴禁攝影、拍照。若以拍攝為目的之朋友，請勿報名。 \r\n\r\n5. 為維護賞螢活動品質，本活動4人成團，上限20人。', 201),
(2, 4, 'https://www.youtube.com/watch?v=YGhxsr_WxVc1', '', '螢河旅行12', '2021-07-07', '19:00:00', 8001, '星夜。螢河。森林。繡球花。1\r\n\r\n踏進中部的後花園、台中最美的賞螢秘境，\r\n8000 棵樹的森林秘境，海拔 700 公尺的山中花園，\r\n\r\n螢河在黑暗中閃爍，那是寧靜而象徵生生不息的希望之光~出發吧，進入這座森林。為這個季節譜出最動人的旋律', '螢河旅行 －報名資訊1', '所有喜歡森林的大小朋友們1', '森林平台1', '本票券每張皆包含入園門票150元，森林、螢火蟲秘境探險導覽，紫丘冰淇淋乙盒，森林旋轉木馬體驗乙次、香草水手作課程乙次、明信片乙張、一人份螢光晚餐。1', '15:15~15:30	螢河旅客集合，準時報到，記得攜帶電子票卷1\r\n15:30~16:40	第一星系：森林時光，園區導覽及體驗，搭乘森林中的旋轉木馬，吃一球森林冰淇淋，寫一張明信片給重要的人\r\n16:40~17:45	第二星系：香草導覽及手作，香草手作，創作獨一無二的香草水\r\n17:45~18:50	第三星系：花園野餐，親近自然，療癒人心的香草野餐籃\r\n19:00~19:30	第四星系：螢河旅行，專屬賞螢導覽（螢火蟲復育生態故事、靜心賞螢） ', '➤賞螢時間大約是19:00-20:30。若遇到下雨而18點雨停止，螢火蟲還是會出現。(在雨天的狀況下，活動還是照常進行。只要做好心理與裝備上的準備，還是可以開心的來參加)1\r\n\r\n1. 本活動有雨天備案，在賞螢活動前雨停，都還是看得到螢火蟲出現。 如果您是下雨天就完全不想出門的客人，請斟酌考慮是否報名！若天氣真的變化太大，導致行程無法走完。將致贈免費入園卷乙張，與免費賞螢乙次。(視報名人數發放)。 \r\n\r\n2. 基於安全考量請穿適宜走路之球鞋(需防滑)、長褲及輕便雨衣。請勿穿高跟鞋、夾腳拖鞋或露趾涼鞋。 \r\n\r\n3. 螢火蟲生態體驗的活動路線會行經較為陡峭的步道(此段路無法推嬰兒車或輪椅)，請參加者考量自身能力是否適合。 \r\n\r\n4. 本活動除了觀賞螢火蟲的生態外，也教育大眾如何保育螢火蟲，螢火蟲怕光。所以活動途中嚴禁攝影、拍照。若以拍攝為目的之朋友，請勿報名。 \r\n\r\n5. 為維護賞螢活動品質，本活動4人成團，上限20人。', 201),
(3, 4, 'https://www.youtube.com/watch?v=YGhxsr_WxVc1', '', '螢河旅行12', '2021-07-07', '19:00:00', 8001, '星夜。螢河。森林。繡球花。1\r\n\r\n踏進中部的後花園、台中最美的賞螢秘境，\r\n8000 棵樹的森林秘境，海拔 700 公尺的山中花園，\r\n\r\n螢河在黑暗中閃爍，那是寧靜而象徵生生不息的希望之光~出發吧，進入這座森林。為這個季節譜出最動人的旋律', '螢河旅行 －報名資訊1', '所有喜歡森林的大小朋友們1', '森林平台1', '本票券每張皆包含入園門票150元，森林、螢火蟲秘境探險導覽，紫丘冰淇淋乙盒，森林旋轉木馬體驗乙次、香草水手作課程乙次、明信片乙張、一人份螢光晚餐。1', '15:15~15:30	螢河旅客集合，準時報到，記得攜帶電子票卷1\r\n15:30~16:40	第一星系：森林時光，園區導覽及體驗，搭乘森林中的旋轉木馬，吃一球森林冰淇淋，寫一張明信片給重要的人\r\n16:40~17:45	第二星系：香草導覽及手作，香草手作，創作獨一無二的香草水\r\n17:45~18:50	第三星系：花園野餐，親近自然，療癒人心的香草野餐籃\r\n19:00~19:30	第四星系：螢河旅行，專屬賞螢導覽（螢火蟲復育生態故事、靜心賞螢） ', '➤賞螢時間大約是19:00-20:30。若遇到下雨而18點雨停止，螢火蟲還是會出現。(在雨天的狀況下，活動還是照常進行。只要做好心理與裝備上的準備，還是可以開心的來參加)1\r\n\r\n1. 本活動有雨天備案，在賞螢活動前雨停，都還是看得到螢火蟲出現。 如果您是下雨天就完全不想出門的客人，請斟酌考慮是否報名！若天氣真的變化太大，導致行程無法走完。將致贈免費入園卷乙張，與免費賞螢乙次。(視報名人數發放)。 \r\n\r\n2. 基於安全考量請穿適宜走路之球鞋(需防滑)、長褲及輕便雨衣。請勿穿高跟鞋、夾腳拖鞋或露趾涼鞋。 \r\n\r\n3. 螢火蟲生態體驗的活動路線會行經較為陡峭的步道(此段路無法推嬰兒車或輪椅)，請參加者考量自身能力是否適合。 \r\n\r\n4. 本活動除了觀賞螢火蟲的生態外，也教育大眾如何保育螢火蟲，螢火蟲怕光。所以活動途中嚴禁攝影、拍照。若以拍攝為目的之朋友，請勿報名。 \r\n\r\n5. 為維護賞螢活動品質，本活動4人成團，上限20人。', 201),
(4, 4, 'https://www.youtube.com/watch?v=YGhxsr_WxVc1', '', '螢河旅行12', '2021-07-07', '19:00:00', 8001, '星夜。螢河。森林。繡球花。1\r\n\r\n踏進中部的後花園、台中最美的賞螢秘境，\r\n8000 棵樹的森林秘境，海拔 700 公尺的山中花園，\r\n\r\n螢河在黑暗中閃爍，那是寧靜而象徵生生不息的希望之光~出發吧，進入這座森林。為這個季節譜出最動人的旋律', '螢河旅行 －報名資訊1', '所有喜歡森林的大小朋友們1', '森林平台1', '本票券每張皆包含入園門票150元，森林、螢火蟲秘境探險導覽，紫丘冰淇淋乙盒，森林旋轉木馬體驗乙次、香草水手作課程乙次、明信片乙張、一人份螢光晚餐。1', '15:15~15:30	螢河旅客集合，準時報到，記得攜帶電子票卷1\r\n15:30~16:40	第一星系：森林時光，園區導覽及體驗，搭乘森林中的旋轉木馬，吃一球森林冰淇淋，寫一張明信片給重要的人\r\n16:40~17:45	第二星系：香草導覽及手作，香草手作，創作獨一無二的香草水\r\n17:45~18:50	第三星系：花園野餐，親近自然，療癒人心的香草野餐籃\r\n19:00~19:30	第四星系：螢河旅行，專屬賞螢導覽（螢火蟲復育生態故事、靜心賞螢） ', '➤賞螢時間大約是19:00-20:30。若遇到下雨而18點雨停止，螢火蟲還是會出現。(在雨天的狀況下，活動還是照常進行。只要做好心理與裝備上的準備，還是可以開心的來參加)1\r\n\r\n1. 本活動有雨天備案，在賞螢活動前雨停，都還是看得到螢火蟲出現。 如果您是下雨天就完全不想出門的客人，請斟酌考慮是否報名！若天氣真的變化太大，導致行程無法走完。將致贈免費入園卷乙張，與免費賞螢乙次。(視報名人數發放)。 \r\n\r\n2. 基於安全考量請穿適宜走路之球鞋(需防滑)、長褲及輕便雨衣。請勿穿高跟鞋、夾腳拖鞋或露趾涼鞋。 \r\n\r\n3. 螢火蟲生態體驗的活動路線會行經較為陡峭的步道(此段路無法推嬰兒車或輪椅)，請參加者考量自身能力是否適合。 \r\n\r\n4. 本活動除了觀賞螢火蟲的生態外，也教育大眾如何保育螢火蟲，螢火蟲怕光。所以活動途中嚴禁攝影、拍照。若以拍攝為目的之朋友，請勿報名。 \r\n\r\n5. 為維護賞螢活動品質，本活動4人成團，上限20人。', 201),
(38, 4, 'https://www.youtube.com/watch?v=YGhxsr_WxVc1', 'images/event/video/bde11bd1051f54d1c59a602c5e725f59.jpg', '螢河旅行12', '2021-07-07', '19:00:00', 8001, '星夜。螢河。森林。繡球花。1\r\n\r\n踏進中部的後花園、台中最美的賞螢秘境，\r\n8000 棵樹的森林秘境，海拔 700 公尺的山中花園，\r\n\r\n螢河在黑暗中閃爍，那是寧靜而象徵生生不息的希望之光~出發吧，進入這座森林。為這個季節譜出最動人的旋律', '螢河旅行 －報名資訊1', '所有喜歡森林的大小朋友們1', '森林平台1', '本票券每張皆包含入園門票150元，森林、螢火蟲秘境探險導覽，紫丘冰淇淋乙盒，森林旋轉木馬體驗乙次、香草水手作課程乙次、明信片乙張、一人份螢光晚餐。1', '15:15~15:30	螢河旅客集合，準時報到，記得攜帶電子票卷1\r\n15:30~16:40	第一星系：森林時光，園區導覽及體驗，搭乘森林中的旋轉木馬，吃一球森林冰淇淋，寫一張明信片給重要的人\r\n16:40~17:45	第二星系：香草導覽及手作，香草手作，創作獨一無二的香草水\r\n17:45~18:50	第三星系：花園野餐，親近自然，療癒人心的香草野餐籃\r\n19:00~19:30	第四星系：螢河旅行，專屬賞螢導覽（螢火蟲復育生態故事、靜心賞螢） ', '➤賞螢時間大約是19:00-20:30。若遇到下雨而18點雨停止，螢火蟲還是會出現。(在雨天的狀況下，活動還是照常進行。只要做好心理與裝備上的準備，還是可以開心的來參加)1\r\n\r\n1. 本活動有雨天備案，在賞螢活動前雨停，都還是看得到螢火蟲出現。 如果您是下雨天就完全不想出門的客人，請斟酌考慮是否報名！若天氣真的變化太大，導致行程無法走完。將致贈免費入園卷乙張，與免費賞螢乙次。(視報名人數發放)。 \r\n\r\n2. 基於安全考量請穿適宜走路之球鞋(需防滑)、長褲及輕便雨衣。請勿穿高跟鞋、夾腳拖鞋或露趾涼鞋。 \r\n\r\n3. 螢火蟲生態體驗的活動路線會行經較為陡峭的步道(此段路無法推嬰兒車或輪椅)，請參加者考量自身能力是否適合。 \r\n\r\n4. 本活動除了觀賞螢火蟲的生態外，也教育大眾如何保育螢火蟲，螢火蟲怕光。所以活動途中嚴禁攝影、拍照。若以拍攝為目的之朋友，請勿報名。 \r\n\r\n5. 為維護賞螢活動品質，本活動4人成團，上限20人。', 201);

-- --------------------------------------------------------

--
-- 資料表結構 `event_category`
--

CREATE TABLE `event_category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `event_category`
--

INSERT INTO `event_category` (`id`, `name`, `code`) VALUES
(1, '節慶', 'FF'),
(2, '音樂會', 'FC'),
(3, '森林', 'FE'),
(4, '手工藝', 'CF');

-- --------------------------------------------------------

--
-- 資料表結構 `event_image`
--

CREATE TABLE `event_image` (
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `path` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `event_image`
--

INSERT INTO `event_image` (`id`, `event_id`, `path`) VALUES
(14, 37, 'images/event/gallery/d49af8362a2b28d37418b4a6aa5a7973.jpg'),
(15, 38, 'images/event/gallery/74229a6c3fde168fd6b2e5f1eb55b1ae.jpg'),
(16, 38, 'images/event/gallery/0a38ade2074674f496d8301d0fc31c86.jpg'),
(17, 38, 'images/event/gallery/8fca2a85a76deabe26b9db97bc662b48.jpg'),
(18, 38, 'images/event/gallery/aea74fd84ade888418d2ef806a2211d2.jpg'),
(19, 38, 'images/event/gallery/853cb73d9301be1655e1947000d67bcd.jpg');

-- --------------------------------------------------------

--
-- 資料表結構 `helpdesk`
--

CREATE TABLE `helpdesk` (
  `user_id` int(11) NOT NULL,
  `guest` varchar(11) NOT NULL,
  `topic` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `order_num` int(20) NOT NULL,
  `content` text NOT NULL,
  `create_datetime` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 資料表結構 `helpdesk_category`
--

CREATE TABLE `helpdesk_category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `helpdesk_category`
--

INSERT INTO `helpdesk_category` (`id`, `name`) VALUES
(1, '會員'),
(2, '訂單'),
(3, '園區'),
(4, '森林咖啡館'),
(5, '森林活動'),
(6, '夜宿薰衣草森林'),
(7, '其它');

-- --------------------------------------------------------

--
-- 資料表結構 `hotel`
--

CREATE TABLE `hotel` (
  `id` int(11) NOT NULL,
  `hotel_id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_count` int(11) NOT NULL,
  `name_zh` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `price_weekdays` int(11) NOT NULL,
  `price_weekend` int(11) NOT NULL,
  `quantity_limit` int(11) NOT NULL,
  `people_num_limit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `hotel`
--

INSERT INTO `hotel` (`id`, `hotel_id`, `img_count`, `name_zh`, `name_en`, `price`, `price_weekdays`, `price_weekend`, `quantity_limit`, `people_num_limit`) VALUES
(1, 'DRF201', 1, '愜意雙人房', 'Double Room', 3500, 2500, 3000, 2, 2),
(2, 'TRF301', 1, '輕奢三人房－樓中樓', 'Triple Room', 4000, 3000, 3500, 2, 3),
(4, 'QRF201', 1, '好友四人房', 'Quadruple Room', 4500, 3500, 4000, 2, 5),
(5, 'FRF101', 1, '森林時光－親子家庭房', 'Family Room', 4800, 3800, 4300, 2, 5);

-- --------------------------------------------------------

--
-- 資料表結構 `index`
--

CREATE TABLE `index` (
  `id` int(11) NOT NULL,
  `index_id` varchar(20) CHARACTER SET utf8 NOT NULL,
  `img_count` int(11) NOT NULL DEFAULT 1,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `index`
--

INSERT INTO `index` (`id`, `index_id`, `img_count`, `title`) VALUES
(1, 'farm', 19, '心中一畝田'),
(2, 'craft', 24, '初衷小屋'),
(3, 'forest', 20, '森林秘境'),
(4, 'gallery', 8, '肖楠之境．美術館'),
(5, 'carousel', 10, '旋轉木馬'),
(6, 'hill', 33, '紫色-希望之丘'),
(7, 'post', 15, '年輪郵局'),
(8, 'cafe', 10, '森林咖啡館'),
(9, 'shower', 10, '淨身儀式'),
(10, 'shop', 7, '香草鋪子'),
(11, 'entrance', 9, '入口'),
(12, 'garden', 29, '葛雷斯花園＆香草市集'),
(13, 'island', 26, '森林島嶼＆Lavender Forest Room'),
(14, 'tree', 11, '許願樹＆森林平台'),
(15, 'map', 1, '');

-- --------------------------------------------------------

--
-- 資料表結構 `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `fb_id` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `email_2nd` varchar(100) DEFAULT NULL,
  `fullname` varchar(10) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `mobile` varchar(50) DEFAULT NULL,
  `zipcode` varchar(5) DEFAULT NULL,
  `county` varchar(10) DEFAULT NULL,
  `district` varchar(10) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `hash` varchar(255) NOT NULL,
  `forget_password` text NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `members`
--

INSERT INTO `members` (`id`, `fb_id`, `email`, `email_2nd`, `fullname`, `birthday`, `mobile`, `zipcode`, `county`, `district`, `address`, `hash`, `forget_password`, `created_at`) VALUES
(20, '', 'peiching46@gmail.com', 'peggy@gmail.com', '陳小桔', '2021-04-01', '090993777', '236', '新北市', '土城區', '123', '$2y$10$aEWE4Ck0wTK0SsMgCOlrReDkRR.QMgN4EzhEskXnYrt6.JOBiiWRS', '', '2021-05-15 23:48:37'),
(21, '', 'lavenderforestcafe@gmail.com', '', 'test', '2021-05-20', '1112', '123', 'ci', '', 'add', '$2y$10$KrWts4NkRwDlIgo6OB9ZbegrxVvXtLR8i3QHxLI/yUJmbysA2kmo.', 'b02e9e058c27b719903ad6c83d3d41d784871b035f147e686edf9a125ddbe93c', '2021-05-16 19:18:03'),
(35, '3099140803648149', 'few5325@gmail.com', NULL, 'Kevin Chen', '2021-06-04', '', '', '', '', '', '$2y$10$rr7isKrQWnwvN0ONG4QwDe/iuuKkziqBYJ4Jl6wytNACnSLOOIxZS', '', '2021-06-17 19:55:15'),
(36, '', 'user22@mail.com', '', 'user', '2021-06-15', '0900000000', '00', '000', '', '00', '$2y$10$5Hfyj7HgcgNqY/bCcARsM.0Q54zREg9nHOirWDYCmbNy4oVAw5gB2', '', '2021-06-26 12:33:45'),
(37, '', '19980726kevin@gmail.com', NULL, 'tset', '2021-06-11', '', '', '', '', '', '$2y$10$1k6zIZHmk2b7z8qyZEq4WOkJkzj7LrI/vSDTLIuT2dsB25wee/JNO', '71c829b001bd330579e031ef6bcd381b8e8fa45916dedac1bd99aad27e27268a', '2021-06-27 17:23:13'),
(38, '', 'peggyserena46@gmail.com', '', '黃小吉', '2021-06-25', '0909999999', '', '新北市', '中和區', '承天路', '$2y$10$SomDY8WI2bNT1yIyFRCdpO8BEV4lqqWEcCny2cijs5OQli1kdwneS', '', '2021-06-30 20:54:21'),
(39, '', '456@gmail.com', NULL, '', '2021-06-25', '', '', '', '', '', '$2y$10$ozk9wAMGepgpOJoQqB8oQu.LQlTdAlxeTb09P0n7ylcQOtWUXcAjS', '', '2021-06-30 20:54:41'),
(40, '', '789@gmail.com', NULL, '', '2021-06-25', '', '', '', '', '', '$2y$10$1uICq8oLWyVRgF6ezwFr5OgoXLyJfAgnmsIKodEB0Sq1OTw7M0pMy', '', '2021-06-30 20:55:33'),
(41, '', '46@gmail.com', NULL, '', '2021-06-11', '', '', '', '', '', '$2y$10$TkBydgN0ZdOpQ4KOq2opluPKj8tT5BY/5i.Zoe6iH9dazPB0gDTbK', '', '2021-06-30 20:55:47'),
(42, '', '1116@gmail.com', NULL, '', '2021-06-11', '', '', '', '', '', '$2y$10$ajffESLI.C0dHPSYRXnSKO/kI35ayzzFWFNud1gb8HU/gYVDalrMe', '', '2021-06-30 20:56:27'),
(43, '', '1118@gmail.com', NULL, '', '2021-06-11', '', '', '', '', '', '$2y$10$2bj7UZufCNbnt6oAwK11gOe1ZKtk.X5MW.jd7dvO3DhVbku6Y7aK2', '', '2021-06-30 20:57:18'),
(44, '', 'hing46@gmail.com', NULL, '', '2021-06-26', '', '', '', '', '', '$2y$10$YojPBio36faOCs7WqiI3YeCpuZr6GF6njq5JwrpDkZSnUQ3dIdAI6', '', '2021-06-30 21:05:05'),
(45, '', '222246@gmail.com', NULL, '', '2021-06-02', '', '', '', '', '', '$2y$10$POk.TDvEjf4dgqEzBBUeg.CWqQ5wtJ4kwCFNmJrSSMlvKGHlV1W8y', '', '2021-07-01 01:13:35'),
(46, '', '2222eee6@gmail.com', NULL, '', '2021-06-02', '', '', '', '', '', '$2y$10$C.iUmDsBmz/pm7UYRKwRi.sOdbvVLcbRt3W.7hHHVyvDi0F80hGZW', '', '2021-07-01 01:14:18'),
(47, '', '111111ww@gmail.com', NULL, '', '2021-06-01', '', '', '', '', '', '$2y$10$hoRdesQ2sE1KCuXkal/lkOtv2rOdrV0hVaQKXJ/CsTj9btxC.yKMy', '', '2021-07-01 01:17:22'),
(48, '', '11fvdgvww@gmail.com', NULL, '', '2021-06-01', '', '', '', '', '', '$2y$10$jf30UEdurZzL8dAMCkJXeevN6bcPgvhOOIBtKE5Sh.AbFVM5qr6q6', '', '2021-07-01 01:24:57'),
(49, '', '11fvdgvfrcww@gmail.com', NULL, '', '2021-06-01', '', '', '', '', '', '$2y$10$vaxnHz7/228S9TDVqw03ueVx3Lk.3cMDHXcsQMUpJr1BYBL/L6RFO', '', '2021-07-01 01:29:48'),
(50, '', 'peiccrrhincg46@gmail.com', NULL, '', '2021-06-03', '', '', '', '', '', '$2y$10$NdV40tX6UrkmuApGJbb.L.MW/YVvCxZQ6UtnmfuAvu9iFpqRUTg9e', '', '2021-07-01 01:30:17'),
(51, '', 'peichinxwxg46@gmail.com', NULL, '', '2021-06-02', '', '', '', '', '', '$2y$10$DJNcvxhMOvHfA80QS4Easeo6ht36vQDprojLrJFuD4aVHPee.Bck.', '', '2021-07-01 01:32:06'),
(52, '', 'peidxwdwdching46@gmail.com', NULL, '', '2021-06-03', '', '', '', '', '', '$2y$10$TJonwktRd8V2SOfIIFo8N.wdTMQwnsjaGcm8yJhXv0hv..U3MTBjy', '', '2021-07-01 01:40:01'),
(53, '', 'peggyserena@hotmail.com', NULL, '王小花', '2021-07-03', '0909936123', NULL, '基隆市', '仁愛區', '中正路', '$2y$10$9.Gbl7FhpuprmZnCYA6xE.2TFVLcJMlujFG.AhkdVI8wY7lsRMuRS', '', '2021-07-06 06:01:22'),
(54, '', 'pe46@gmail.com', NULL, 'egerefer', '1978-01-05', '1234567890', NULL, '嘉義縣', '義竹鄉', 'qwwdeqeqe', '$2y$10$73T5ClsHycn94W6uQXeswe08GI0Ar58KhSkhNPdtwdzWpu1Qxd1OK', '', '2021-07-06 06:05:00'),
(55, '', 'user21112@mail.com', NULL, '', '2021-07-01', '', NULL, '宜蘭縣', '宜蘭市', '', '$2y$10$cw/Urucgv.hSLeRgbUcPOex.cc2DoKlcHHVml9LfKM7ocF8wM8ZPq', '', '2021-07-07 19:08:29'),
(56, '', 'tt2346t@mail.com', NULL, '', '2021-07-05', '', NULL, '臺東縣', '成功鎮', '', '$2y$10$cexPn00WEWRAP1dMVz6Ok.N1fhLVl4IGFq1sjt0hW08KT8SoxlFbS', '', '2021-07-07 19:10:43'),
(57, '', 'r32jio432532g@mail.com', NULL, '', '2021-07-01', '', '234', '新北市', '永和區', '', '$2y$10$XNfTB9fxUWjCqXshbzmeKuijGkKZHHF2rd/Cb8Ai17UxnG685wBjW', '', '2021-07-07 19:17:04'),
(58, '', 'dewafe@mail.com', '', '', '2021-07-01', '', '817', '高雄市', '東沙群島', '', '$2y$10$ERKq2sG1ul8V6nSMee3QPuwyrOFQ3RDIONEkaX/P6WF/FXwy1QgHi', '', '2021-07-07 19:18:54');

-- --------------------------------------------------------

--
-- 資料表結構 `order_event`
--

CREATE TABLE `order_event` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `order_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `order_event`
--

INSERT INTO `order_event` (`id`, `item_id`, `event_id`, `price`, `quantity`, `order_datetime`) VALUES
(8, 29, 4, 800, 1, '2021-06-13 14:00:00'),
(9, 33, 4, 800, 2, '2021-06-13 14:00:00'),
(10, 34, 4, 800, 1, '2021-06-13 14:00:00'),
(11, 37, 4, 800, 1, '2021-06-13 14:00:00'),
(12, 38, 4, 800, 4, '2021-06-13 14:00:00'),
(13, 39, 4, 800, 1, '2021-06-13 14:00:00'),
(14, 66, 4, 800, 1, '2021-06-13 14:00:00'),
(15, 68, 5, 400, 1, '2021-07-22 14:00:00'),
(16, 69, 5, 400, 1, '2021-07-22 14:00:00'),
(17, 70, 5, 400, 1, '2021-07-22 14:00:00'),
(18, 71, 6, 400, 1, '2021-08-29 14:00:00'),
(19, 72, 5, 400, 1, '2021-07-22 14:00:00');

-- --------------------------------------------------------

--
-- 資料表結構 `order_hotel`
--

CREATE TABLE `order_hotel` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `people_num` int(11) NOT NULL,
  `order_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `order_hotel`
--

INSERT INTO `order_hotel` (`id`, `item_id`, `hotel_id`, `price`, `quantity`, `people_num`, `order_datetime`) VALUES
(22, 64, 1, 3500, 1, 2, '2021-06-11 00:00:00'),
(23, 65, 1, 3500, 1, 2, '2021-06-11 00:00:00'),
(24, 67, 1, 3500, 1, 1, '2021-06-09 00:00:00');

-- --------------------------------------------------------

--
-- 資料表結構 `order_item`
--

CREATE TABLE `order_item` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `order_item`
--

INSERT INTO `order_item` (`id`, `order_id`, `type`) VALUES
(29, 9, 'event'),
(30, 9, 'hotel'),
(31, 10, 'hotel'),
(32, 10, 'hotel'),
(33, 11, 'event'),
(34, 11, 'event'),
(35, 11, 'restaurant'),
(36, 12, 'hotel'),
(37, 12, 'event'),
(38, 12, 'event'),
(39, 12, 'event'),
(40, 12, 'restaurant'),
(41, 12, 'restaurant'),
(42, 13, 'hotel'),
(43, 13, 'hotel'),
(44, 14, 'hotel'),
(45, 14, 'restaurant'),
(46, 15, 'restaurant'),
(47, 16, 'restaurant'),
(48, 17, 'restaurant'),
(49, 18, 'restaurant'),
(50, 19, 'restaurant'),
(51, 20, 'restaurant'),
(52, 21, 'hotel'),
(53, 22, 'hotel'),
(54, 23, 'hotel'),
(55, 23, 'hotel'),
(56, 24, 'hotel'),
(57, 25, 'hotel'),
(58, 26, 'hotel'),
(59, 27, 'hotel'),
(60, 28, 'hotel'),
(61, 29, 'hotel'),
(62, 30, 'hotel'),
(63, 31, 'hotel'),
(64, 32, 'hotel'),
(65, 33, 'hotel'),
(66, 34, 'event'),
(67, 35, 'hotel'),
(68, 36, 'event'),
(69, 37, 'event'),
(70, 38, 'event'),
(71, 39, 'event'),
(72, 40, 'event');

-- --------------------------------------------------------

--
-- 資料表結構 `order_restaurant`
--

CREATE TABLE `order_restaurant` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `order_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `order_restaurant`
--

INSERT INTO `order_restaurant` (`id`, `item_id`, `restaurant_id`, `quantity`, `order_datetime`) VALUES
(36, 35, 12, 0, '2021-06-11 08:00:00'),
(37, 40, 21, 0, '2021-06-17 17:00:00'),
(38, 40, 22, 0, '2021-06-17 17:00:00'),
(39, 41, 10, 0, '2021-06-24 12:00:00'),
(40, 41, 12, 0, '2021-06-24 12:00:00'),
(41, 41, 17, 0, '2021-06-24 12:00:00'),
(42, 45, 12, 0, '2021-06-08 12:00:00'),
(43, 45, 16, 0, '2021-06-08 12:00:00'),
(44, 45, 17, 0, '2021-06-08 12:00:00'),
(45, 49, 12, 3, '2021-06-08 12:00:00'),
(46, 49, 16, 3, '2021-06-08 12:00:00'),
(47, 49, 17, 3, '2021-06-08 12:00:00'),
(48, 50, 14, 1, '2021-06-11 17:00:00'),
(49, 50, 15, 1, '2021-06-11 17:00:00'),
(50, 50, 16, 1, '2021-06-11 17:00:00'),
(51, 51, 15, 2, '2021-06-08 08:00:00'),
(52, 51, 16, 2, '2021-06-08 08:00:00'),
(53, 51, 17, 2, '2021-06-08 08:00:00');

-- --------------------------------------------------------

--
-- 資料表結構 `restaurant`
--

CREATE TABLE `restaurant` (
  `id` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seatsForTable` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `restaurant`
--

INSERT INTO `restaurant` (`id`, `name`, `seatsForTable`, `description`) VALUES
(1, 'd1', 4, '靠窗桌位'),
(2, 'b2', 2, '中間桌位'),
(3, 'd3', 4, ''),
(4, 'd4', 4, ''),
(5, 'd5', 4, ''),
(6, 'b6', 2, ''),
(7, 'b7', 2, ''),
(8, 'b8', 2, ''),
(9, 'b9', 2, ''),
(10, 'f10', 6, ''),
(11, 'f11', 6, ''),
(12, 'd12', 4, ''),
(13, 'f13', 6, ''),
(14, 'a14', 1, ''),
(15, 'a15', 1, ''),
(16, 'a16', 1, ''),
(17, 'a17', 1, ''),
(18, 'a18', 1, ''),
(19, 'a19', 1, ''),
(20, 'f20', 6, ''),
(21, 'c21', 3, ''),
(22, 'a22', 1, ''),
(23, 'b23', 2, ''),
(24, 'd24', 4, ''),
(25, 'd25', 4, ''),
(26, 'd26', 4, '');

-- --------------------------------------------------------

--
-- 資料表結構 `sales_order`
--

CREATE TABLE `sales_order` (
  `id` int(11) NOT NULL,
  `order_id` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `original_price` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `create_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `sales_order`
--

INSERT INTO `sales_order` (`id`, `order_id`, `user_id`, `price`, `original_price`, `discount`, `status`, `create_datetime`) VALUES
(8, '202105280008', 20, 0, 0, 0, '已付款', '2021-05-28 03:41:24'),
(9, '202105290009', 20, 4080, 4800, 720, '已付款', '2021-05-29 18:54:46'),
(10, '202105290010', 20, 9600, 9600, 0, '已付款', '2021-05-29 20:11:09'),
(11, '202106050011', 20, 2400, 2400, 0, '已付款', '2021-06-05 00:04:58'),
(12, '202106050012', 21, 7055, 8300, 1245, '已付款', '2021-06-05 22:19:30'),
(13, '202106050013', 21, 13000, 13000, 0, '已付款', '2021-06-05 22:49:02'),
(14, '202106070014', 21, 3500, 3500, 0, '已付款', '2021-06-07 19:54:35'),
(15, '202106070015', 21, 0, 0, 0, '已取消', '2021-06-07 19:58:45'),
(16, '202106070016', 21, 0, 0, 0, '已取消', '2021-06-07 20:01:52'),
(17, '202106070017', 21, 0, 0, 0, '已付款', '2021-06-07 20:03:08'),
(18, '202106070018', 21, 0, 0, 0, '已付款', '2021-06-07 20:03:46'),
(19, '202106070019', 21, 0, 0, 0, '已付款', '2021-06-07 20:27:38'),
(20, '202106080020', 21, 0, 0, 0, '已付款', '2021-06-08 04:23:13'),
(21, '202106080021', 21, 3500, 3500, 0, '已付款', '2021-06-08 18:17:38'),
(22, '202106080022', 21, 3500, 3500, 0, '已付款', '2021-06-08 18:17:55'),
(23, '202106080023', 21, 8000, 8000, 0, '已付款', '2021-06-08 19:10:35'),
(24, '202106080024', 21, 3500, 3500, 0, '已付款', '2021-06-08 19:11:41'),
(25, '202106080025', 21, 3500, 3500, 0, '已付款', '2021-06-08 19:12:19'),
(26, '202106080026', 21, 3500, 3500, 0, '已付款', '2021-06-08 19:12:55'),
(27, '202106080027', 21, 3500, 3500, 0, '已付款', '2021-06-08 19:14:25'),
(28, '202106080028', 21, 3500, 3500, 0, '已付款', '2021-06-08 19:16:10'),
(29, '202106080029', 21, 3500, 3500, 0, '已付款', '2021-06-08 19:16:52'),
(30, '202106080030', 21, 3500, 3500, 0, '已付款', '2021-06-08 19:17:27'),
(31, '202106080031', 21, 3500, 3500, 0, '已付款', '2021-06-08 19:18:14'),
(32, '202106080032', 21, 3500, 3500, 0, '已付款', '2021-06-08 19:19:07'),
(33, '202106080033', 21, 3500, 3500, 0, '已付款', '2021-06-08 19:19:45'),
(34, '202106090034', 21, 800, 800, 0, '已付款', '2021-06-09 11:54:22'),
(35, '202106090035', 21, 3500, 3500, 0, '已付款', '2021-06-09 22:37:32'),
(36, '202106260036', 36, 400, 400, 0, '已付款', '2021-06-26 12:47:01'),
(37, '202106260037', 36, 400, 400, 0, '已付款', '2021-06-26 13:02:33'),
(38, '202106260038', 36, 400, 400, 0, '已付款', '2021-06-26 13:05:34'),
(39, '202107020039', 36, 400, 400, 0, '已付款', '2021-07-02 21:33:16'),
(40, '202107020040', 38, 400, 400, 0, '已付款', '2021-07-02 21:58:33');

-- --------------------------------------------------------

--
-- 資料表結構 `staff`
--

CREATE TABLE `staff` (
  `staff_id` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL,
  `identityNum` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullname` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `mobile` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zipcode` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `county` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hash` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `staff`
--

INSERT INTO `staff` (`staff_id`, `role`, `identityNum`, `email`, `fullname`, `birthday`, `mobile`, `zipcode`, `county`, `district`, `address`, `hash`, `created_at`) VALUES
('A00001', 1, 'F123456789', 'peggyserena46@gmail.com', '黃小桔', '2021-07-01', '0909123456', '893', '金門縣', '金城鎮', '台北地區123', '$2y$10$SomDY8WI2bNT1yIyFRCdpO8BEV4lqqWEcCny2cijs5OQli1kdwneS', '2021-06-28 16:52:49'),
('A00002', 1, '', '', NULL, NULL, NULL, NULL, NULL, '', NULL, '$2y$10$.4rH.f7LKz36J7h5xf9j0OrCZerMb831mSZq0MnWMxwy.Kmg/0Lme', '2021-07-07 20:42:02'),
('A00003', 1, '', '', NULL, NULL, NULL, NULL, NULL, '', NULL, '$2y$10$UQs7NybCiXoP8SQ3eNG1Q./660R7EtSV.FUrHeKWIV.A33PMC8NWC', '2021-07-07 20:42:02'),
('A00004', 1, '', '', NULL, NULL, NULL, NULL, NULL, '', NULL, '$2y$10$wnvb3jFCaOXfk9iYgpyXpORQIVU/zQ8lijXO/fhzuiCiakxP6Dllq', '2021-07-07 20:42:02'),
('A00005', 1, '', '', NULL, NULL, NULL, NULL, NULL, '', NULL, '$2y$10$EuduJmcyPCSqRk5AeKYzbuNK1iCMW64pFwwnRTEb9gVO/NgT1oUtm', '2021-07-07 21:14:18'),
('A00006', 1, '', '', NULL, NULL, NULL, NULL, NULL, '', NULL, '$2y$10$iwKdPoU..WjfDjQjhPngXOSQWVRKpVw5l1ss8OYzwRXHXu4jVogrC', '2021-07-07 21:14:18'),
('A00007', 1, '', '', NULL, NULL, NULL, NULL, NULL, '', NULL, '$2y$10$c3rWX0dhBJNLzGyI1wiR5.9qWb2V5010n1P6nz/vpcnPaYZPR7s1S', '2021-07-07 22:00:50'),
('A00008', 1, '', '', NULL, NULL, NULL, NULL, NULL, '', NULL, '$2y$10$YjGlWbquQaIyMfr82S3NhOW5RS6h88KwZNhfA0bR3OlekepU3jCs.', '2021-07-07 22:00:50'),
('B00001', 2, '', '', NULL, NULL, NULL, NULL, NULL, '', NULL, '$2y$10$SomDY8WI2bNT1yIyFRCdpO8BEV4lqqWEcCny2cijs5OQli1kdwneS', '2021-07-01 21:20:04'),
('B00002', 2, '', '', NULL, NULL, NULL, NULL, NULL, '', NULL, '$2y$10$afTuYwqEam2RwXLtQokNjeouPFPFNHty9G7lI8hfFvEM2xpCj2Ihi', '2021-07-01 21:20:04'),
('B00003', 2, '', '', NULL, NULL, NULL, NULL, NULL, '', NULL, '$2y$10$mETKdFnCobtFFDIQA5fQ0OGJVNre6MkFkXe5PscGDtKDUer2r8Zs2', '2021-07-01 21:20:04'),
('B00004', 2, '', '', NULL, NULL, NULL, NULL, NULL, '', NULL, '$2y$10$fncEUFbvPS.kBSdSAJOVU.uHue2lI1d.679/QNEDvFrBmJBREm3Oi', '2021-07-01 21:23:47'),
('B00005', 2, '', '', NULL, NULL, NULL, NULL, NULL, '', NULL, '$2y$10$VeBxt7ZRlzeAgLtnP7GynuP7F7cbdfUBGBzcYBbQwQlOTu2TF3nO6', '2021-07-01 21:23:47'),
('B00006', 2, '', '', NULL, NULL, NULL, NULL, NULL, '', NULL, '$2y$10$gZUU7pizC.ZGbvAoTR6u5u5a/feivPvVZJUj4Bgs/9P97z9/jropy', '2021-07-01 21:23:47'),
('B00007', 2, '', '', NULL, NULL, NULL, NULL, NULL, '', NULL, '$2y$10$ttb8cAHZOtuOagTbLbNn5ufMo/pB/zGjhGZUSzwH2cbkm7bQecpWa', '2021-07-07 20:25:22'),
('B00008', 2, '', '', NULL, NULL, NULL, NULL, NULL, '', NULL, '$2y$10$7TbccFZ6mXpn.Sh9co4DUeWMevxS80LmWF40R7R7ap7WjWtZNyPUa', '2021-07-07 20:25:22'),
('B00009', 2, '', '', NULL, NULL, NULL, NULL, NULL, '', NULL, '$2y$10$KlgxTNARHJYcYtXUI7zzC.MIkjBURGls6wHroBF.PgZ/1XfMgkRlW', '2021-07-07 20:26:54'),
('B00010', 2, '', '', NULL, NULL, NULL, NULL, NULL, '', NULL, '$2y$10$3ngHQ9IcPddsFnFFhp5o4enPwEiJRh19tLbdoEeRRE9ZGVTIONcsG', '2021-07-07 20:26:54'),
('B00011', 2, '', '', NULL, NULL, NULL, NULL, NULL, '', NULL, '$2y$10$FXN7ylljYBjotTMRBK5N2eXrY1luZ7BiXcnF93Fgb/hFzzakbCfYy', '2021-07-07 20:27:52'),
('B00012', 2, '', '', NULL, NULL, NULL, NULL, NULL, '', NULL, '$2y$10$c.rvuqX/msydE/PpCEt71.XzQso2lnbVhpsL9wzFoux1l9IZyxCYy', '2021-07-07 20:27:52'),
('B00013', 2, '', '', NULL, NULL, NULL, NULL, NULL, '', NULL, '$2y$10$mSITc41h0IFSl2q0PqUZXeKU0EWN9DjxgZNlSZWB5t0zjaw.7gUBm', '2021-07-07 20:27:54'),
('B00014', 2, '', '', NULL, NULL, NULL, NULL, NULL, '', NULL, '$2y$10$CRY6U1sgfTmVpzJWLjx8KOyFBL/u6i5AEU5t5ev6tkf.MQCgOhnBm', '2021-07-07 20:27:54'),
('B00015', 2, '', '', NULL, NULL, NULL, NULL, NULL, '', NULL, '$2y$10$cZJlKv7A08MVRFChaNe3He7VDVPbbYc2CGSyFbTSH85RP7B9lrVbC', '2021-07-07 20:41:02'),
('B00016', 2, '', '', NULL, NULL, NULL, NULL, NULL, '', NULL, '$2y$10$0weKo6TcRn2yRxNF53JnOeg5jZnurBR4dLVJFmmjD7CIA68gEDYpy', '2021-07-07 20:41:02'),
('B00017', 2, '', '', NULL, NULL, NULL, NULL, NULL, '', NULL, '$2y$10$.CLBq0dzP.KJ2OEOC4XFZerPFSsntEa/KZTdmIb6XdxTCiIQ5xPpC', '2021-07-07 21:24:30'),
('B00018', 2, '', '', NULL, NULL, NULL, NULL, NULL, '', NULL, '$2y$10$LoFz6HUP/jlyWxy4asEA8evDL3pPOrlzcZDhXMVjkcV9tRWY3E9cS', '2021-07-07 21:24:30'),
('B00019', 2, '', '', NULL, NULL, NULL, NULL, NULL, '', NULL, '$2y$10$/seQRBapv7L4qllAldHrRu8O0mXGHV6tp1E2cZOuIMUHZQ53vIr4i', '2021-07-07 21:24:30'),
('B00020', 2, '', '', NULL, NULL, NULL, NULL, NULL, '', NULL, '$2y$10$KecsJa.bpkPYHG1sahtBP.bVylxypxJHbZBQSQHZq9fL/aaHtFcKe', '2021-07-07 22:00:59'),
('B00021', 2, '', '', NULL, NULL, NULL, NULL, NULL, '', NULL, '$2y$10$I3fLMdyNvcNSWhbPWwpE5.jC.m3GjBrKDG/0d50J0mN6A4mWhtwea', '2021-07-07 22:00:59'),
('C00001', 3, '', '', NULL, NULL, NULL, NULL, NULL, '', NULL, '$2y$10$SomDY8WI2bNT1yIyFRCdpO8BEV4lqqWEcCny2cijs5OQli1kdwneS', '2021-07-01 21:11:33'),
('C00002', 3, '', '', NULL, NULL, NULL, NULL, NULL, '', NULL, '$2y$10$nEZ8uQldM6QObXuxNep1O.IGmBVAvjIQVi3yrSghmJyoNGX4SjY4a', '2021-07-01 21:11:33'),
('C00003', 3, '', '', NULL, NULL, NULL, NULL, NULL, '', NULL, '$2y$10$hbHCt5cpWKwqA3YRmMQ7YuOgcePWrGBOAtsLhGNw958m6tR3.m6oe', '2021-07-01 21:11:33'),
('C00004', 3, '', '', NULL, NULL, NULL, NULL, NULL, '', NULL, '$2y$10$J6.eByjjPSMgiiOmvLdVT.bSUSZAul1LooPm4ByeAbL6o8VS82Y1O', '2021-07-01 21:11:33'),
('C00005', 3, '', '', NULL, NULL, NULL, NULL, NULL, '', NULL, '$2y$10$MPjTiJC7.NqlU/UUeS5rOO9qHz0wougC.0jiGwBSYvygZickoZJze', '2021-07-01 21:11:33'),
('C00006', 3, '', '', NULL, NULL, NULL, NULL, NULL, '', NULL, '$2y$10$wUJtI8E8PdmzUuUF2x0gW.teqoPycAw.5zagLHuQnIwgq5ZIh.X/S', '2021-07-01 21:45:34'),
('C00007', 3, '', '', NULL, NULL, NULL, NULL, NULL, '', NULL, '$2y$10$LJoiPg00VHfPRCntHBMiIOQW8ZINwkP46gTVsa4digJ.AMhpu3ad6', '2021-07-01 21:45:34'),
('C00008', 3, '', '', NULL, NULL, NULL, NULL, NULL, '', NULL, '$2y$10$kedauYAjIznYXvf6zfKQ7uuWNYk1IIMaHxmDeuzpILZxZqub.ru/e', '2021-07-01 21:45:34'),
('C00009', 3, '', '', NULL, NULL, NULL, NULL, NULL, '', NULL, '$2y$10$NJIpt1xBqiUkOHk8mmDAF.UZOPaOhL2LNj4F4X5PH2Bcep0xl/wR2', '2021-07-01 21:45:34'),
('C00010', 3, '', '', NULL, NULL, NULL, NULL, NULL, '', NULL, '$2y$10$bhQnp4kAY1qOqpaPkWVXRuaWWY7M2s5uVT5sTAgizIJSyEyvVuS5C', '2021-07-01 21:45:34'),
('C00011', 3, '', '', NULL, NULL, NULL, NULL, NULL, '', NULL, '$2y$10$nnHS0mzmzNVaxPQQ4P1zaeUWSv.SP/KpER55TeTZRpQZyFfTDkVuu', '2021-07-07 20:25:08'),
('C00012', 3, '', '', NULL, NULL, NULL, NULL, NULL, '', NULL, '$2y$10$4arKHfouVaABhVgRjx2VqOxuTSoiwaPWRueI1FQ/5tCAkusgGfF1e', '2021-07-07 20:25:08'),
('C00013', 3, '', '', NULL, NULL, NULL, NULL, NULL, '', NULL, '$2y$10$Tc7OXoDExdxkLij9vF1h1u8Vl0qeKJiornrMVow4tWIeoOJmM/Bi6', '2021-07-07 20:25:14'),
('C00014', 3, '', '', NULL, NULL, NULL, NULL, NULL, '', NULL, '$2y$10$MxBR4IXfh8.Sh0lR2qfpqendfQsNkp6MK0AZuB9nLe9us/Te7gSym', '2021-07-07 20:25:14'),
('C00015', 3, '', '', NULL, NULL, NULL, NULL, NULL, '', NULL, '$2y$10$ZeT7hDjwkqQO0naYQ9MeMOTxroPGKwSAFtSdpecZPi2g6Qjy9hjgu', '2021-07-07 20:27:58'),
('C00016', 3, '', '', NULL, NULL, NULL, NULL, NULL, '', NULL, '$2y$10$pG.gA8VtvTMxEdsE0QkPduxyR22MFeRxp4.D5M4XpTJ.POO0vSUAm', '2021-07-07 20:27:58'),
('C00017', 3, '', '', NULL, NULL, NULL, NULL, NULL, '', NULL, '$2y$10$Gc.Tl6dJ2j5X5aGBEFRbR.dadf8XJV5wUxEKmok928etIZzW86Bii', '2021-07-07 20:28:02'),
('C00018', 3, '', '', NULL, NULL, NULL, NULL, NULL, '', NULL, '$2y$10$wsE9IA3hFJxlrTCUY5mBE.8pVtlo5dSGBoITim38hEOP.FUIoZAgi', '2021-07-07 20:28:02'),
('C00019', 3, '', '', NULL, NULL, NULL, NULL, NULL, '', NULL, '$2y$10$zT.hN/tc5RkCEBdG4jCqDe.G35e4BYvNKlCKpuClajfqnym70Xswe', '2021-07-07 20:28:02'),
('C00020', 3, '', '', NULL, NULL, NULL, NULL, NULL, '', NULL, '$2y$10$4quPsN2LL9191eQBkVrCiuUJbkqgsgKua5VFcECNZKxm3sfEf5uwO', '2021-07-07 20:28:02'),
('C00021', 3, '', '', NULL, NULL, NULL, NULL, NULL, '', NULL, '$2y$10$BG6zBN6F0U8UmgS.Kp.WbuGSv1qdU9j2c/Hck1hppId/TCzOz09pC', '2021-07-07 20:28:02'),
('C00022', 3, '', '', NULL, NULL, NULL, NULL, NULL, '', NULL, '$2y$10$WYOnE92qV.m5jGQqLHJh0uN1vEImcDK0PTHZckOwhxR5eXio3re6i', '2021-07-07 20:35:53'),
('C00023', 3, '', '', NULL, NULL, NULL, NULL, NULL, '', NULL, '$2y$10$a1Xzi1ob279VtIgxON6UZ.ONvm8Wkie07OGbaYnYvj8Yznv3w4eWi', '2021-07-07 20:35:53'),
('C00024', 3, '', '', NULL, NULL, NULL, NULL, NULL, '', NULL, '$2y$10$kCO7J/mw3nFOTwEB1Na32uLhTPuOEnQS4YK53OFRYOzPdnwZhgNuK', '2021-07-07 20:42:06'),
('C00025', 3, '', '', NULL, NULL, NULL, NULL, NULL, '', NULL, '$2y$10$xCJkx8/ZDn/.zJvsY8Y9UePW/Xxj0naxHwaqB6kSMajBBuN1w2cEi', '2021-07-07 20:42:06'),
('C00026', 3, '', '', NULL, NULL, NULL, NULL, NULL, '', NULL, '$2y$10$PgLdu6exHbjHNlJNq/Lvb.GxqfGonltYDqUM/Ru35SNuRq6AWa/Ya', '2021-07-07 20:42:06'),
('C00027', 3, '', '', NULL, NULL, NULL, NULL, NULL, '', NULL, '$2y$10$ngTczgnqcEcgIaf8mIh7uuM3mD2aPSXEbvi00pmt7OH57tLUmBQwu', '2021-07-07 21:35:02'),
('C00028', 3, '', '', NULL, NULL, NULL, NULL, NULL, '', NULL, '$2y$10$DX3GjhexWbiXmOyM.EtVcu5H9Dn7d4cCUyE3bjedRzmFN/YCfYytm', '2021-07-07 21:35:02'),
('C00029', 3, '', '', NULL, NULL, NULL, NULL, NULL, '', NULL, '$2y$10$vzJGbfu4nEP/WP0BxqIuv.TK6Qasci9ym1FsEUR46nefrFg.qAQN6', '2021-07-07 21:35:02'),
('C00030', 3, '', '', NULL, NULL, NULL, NULL, NULL, '', NULL, '$2y$10$nXeoKwpVRUtJPRnEUHfAYO2UQtkNpDmNYhPQ49fejmw216cDYOP2a', '2021-07-07 21:35:53'),
('C00031', 3, '', '', NULL, NULL, NULL, NULL, NULL, '', NULL, '$2y$10$Cpnagwbd8NYuiLRxxgl6vO.Im9rpTzoxTjTK9HZXoGgbN/H8Lk4RS', '2021-07-07 21:35:53'),
('C00032', 3, '', '', NULL, NULL, NULL, NULL, NULL, '', NULL, '$2y$10$DvtNsCm2gwH1fa0GRJ7z4OBuQ9VKC6oUkk..hyCk2jeZRcMZFRelG', '2021-07-07 21:35:53'),
('C00033', 3, '', '', NULL, NULL, NULL, NULL, NULL, '', NULL, '$2y$10$PiGTCPIVd/Xd0xPSinmfIOquVaeWKj7YySGI5IZt4dMEqdPABJtXa', '2021-07-07 21:39:40'),
('C00034', 3, '', '', NULL, NULL, NULL, NULL, NULL, '', NULL, '$2y$10$T.XWY4vgOrjHkbXb7qfCdepz7/4Q6HZDGZn4N85pyjYyrP5GH4Uda', '2021-07-07 21:39:40'),
('C00035', 3, '', '', NULL, NULL, NULL, NULL, NULL, '', NULL, '$2y$10$ClBm5hKfKRmqsQvp.BWXkeQJIvNEb04Pe2bmbn1yVL188OJvt9QzK', '2021-07-07 21:39:40'),
('C00036', 3, '', '', NULL, NULL, NULL, NULL, NULL, '', NULL, '$2y$10$VJOYZzpB5QB0GtBYbdBy2uz5kL9IegPu7HrZ2YXYEl2UZXDiUJMOO', '2021-07-07 21:39:40'),
('C00037', 3, '', '', NULL, NULL, NULL, NULL, NULL, '', NULL, '$2y$10$.ZEEvNpO8C3Bb3nhvNwpNeb4uDSRJzwTPtdlK8dADSIlb3HZwZ2mm', '2021-07-07 21:39:40'),
('C00038', 3, '', '', NULL, NULL, NULL, NULL, NULL, '', NULL, '$2y$10$KU61HhkEVzvOpB39mmvCHe88uOCqHTUG4Ep9K24EvxQljHMKfv9gq', '2021-07-07 21:39:40'),
('C00039', 3, '', '', NULL, NULL, NULL, NULL, NULL, '', NULL, '$2y$10$7WiEI3HzxTQfzit08NSOjeQlUiiKfEjVQ8KvPcw7Nf97SR.3.0Fq.', '2021-07-07 21:39:40'),
('C00040', 3, '', '', NULL, NULL, NULL, NULL, NULL, '', NULL, '$2y$10$le3mf9kMKAz1R7Z2vlG/GeDlZHDPIYt/Fdxdoj0LPWiXTXl/C76Q.', '2021-07-07 21:39:40'),
('C00041', 3, '', '', NULL, NULL, NULL, NULL, NULL, '', NULL, '$2y$10$PgDAR8ade7hQda1BHxE7LOleD4rIq4o1rOKppF9fbixztVxvLOBna', '2021-07-07 21:39:40'),
('C00042', 3, '', '', NULL, NULL, NULL, NULL, NULL, '', NULL, '$2y$10$SisvRXYJKJnp3lXY8dv6hObnK6dShH1dlV7nIPfCBNoS4i6ShGsDG', '2021-07-07 21:39:40'),
('C00043', 3, '', '', NULL, NULL, NULL, NULL, NULL, '', NULL, '$2y$10$waWURaRPt4OUSnmMj.nIXuHwRyTEQ6U2hsSer6Q1INB2B1iACmuzS', '2021-07-07 21:39:40'),
('C00044', 3, '', '', NULL, NULL, NULL, NULL, NULL, '', NULL, '$2y$10$t4HRYJKJPHvoQOIxW6ttgeIz0F.sUg5XuR.FwnqLyxeXR4BXGb02S', '2021-07-07 21:39:40'),
('C00045', 3, '', '', NULL, NULL, NULL, NULL, NULL, '', NULL, '$2y$10$3oM2WLG8mj5skBItH5QvYuFvNysmp2kd6L6P2uwXybNvB2YyVpgAK', '2021-07-07 21:39:40'),
('C00046', 3, '', '', NULL, NULL, NULL, NULL, NULL, '', NULL, '$2y$10$okfbzAkNTrPTS.9q7uAdvOJewKqjhJzioVogLc60.zZk8632DNeoS', '2021-07-07 21:39:40'),
('C00047', 3, '', '', NULL, NULL, NULL, NULL, NULL, '', NULL, '$2y$10$rmcHzXdQHzO0.Kx69JP0eeMSsxiw6j3NGZduZ.Z6StHXbJbtV7Rru', '2021-07-07 21:39:40'),
('C00048', 3, '', '', NULL, NULL, NULL, NULL, NULL, '', NULL, '$2y$10$3oG/ThrI7Q2oU1.Fs8jeVeVVCzMqVcIYdxgwqHEk5FZZWwuGewl..', '2021-07-07 21:39:40'),
('C00049', 3, '', '', NULL, NULL, NULL, NULL, NULL, '', NULL, '$2y$10$dWcAx0wT4Ud9079eiYPDj.S6b5bfmqfS/Fd4Rv4Kqu41adcdwh046', '2021-07-07 21:39:40'),
('C00050', 3, '', '', NULL, NULL, NULL, NULL, NULL, '', NULL, '$2y$10$j.DcVNC5ebh.VZmx6aapqu.6k0IAg8EXu.fcfkKxPyrdBB3cO/oQ2', '2021-07-07 21:39:40'),
('C00051', 3, '', '', NULL, NULL, NULL, NULL, NULL, '', NULL, '$2y$10$QbO3Pls4/YoLfGdksGlt4.0kgrCtbFHaNGfAXrKL3xiJ1O7z8Ikuq', '2021-07-07 21:39:40'),
('C00052', 3, '', '', NULL, NULL, NULL, NULL, NULL, '', NULL, '$2y$10$Gqe0MQFAxSHeipSDXkYe2ODuy5r5VhT5Zs21iLUm2lSMqcJdpQc8W', '2021-07-07 21:39:40'),
('C00053', 3, '', '', NULL, NULL, NULL, NULL, NULL, '', NULL, '$2y$10$1PTZGEeZBFoL7VIyKskC0eLoxpJXmFaMpqBEtSHE2.CKGOziYbGSq', '2021-07-07 21:39:40'),
('C00054', 3, '', '', NULL, NULL, NULL, NULL, NULL, '', NULL, '$2y$10$7nBA3Td1de9Gif6diYQ0wOGVHqG5HwF89OuagElwrGEEQ65fb8Yxa', '2021-07-07 21:39:40'),
('C00055', 3, '', '', NULL, NULL, NULL, NULL, NULL, '', NULL, '$2y$10$EIAMlDUpA0xf1O1/o7C81.KaqCqmyhyAxc2nbW.5c29mpBU8Imtc.', '2021-07-07 21:39:40'),
('C00056', 3, '', '', NULL, NULL, NULL, NULL, NULL, '', NULL, '$2y$10$.w/GMBQDgGyWj52pPrx2PO4p6U4WAkcQzrh5WuDfKfpXPlv5WTURe', '2021-07-07 21:39:40'),
('C00057', 3, '', '', NULL, NULL, NULL, NULL, NULL, '', NULL, '$2y$10$qLNrNNjaQor/eNzR/NuDQe4KcaXTBf7vhQZ284it.3MvGAiZrchvu', '2021-07-07 21:39:40'),
('C00058', 3, '', '', NULL, NULL, NULL, NULL, NULL, '', NULL, '$2y$10$R6P/5hECjUSlCXzhAu99yuDYvsH5732qLjXlnyGnXU4A7PVpsRUIa', '2021-07-07 21:39:40'),
('C00059', 3, '', '', NULL, NULL, NULL, NULL, NULL, '', NULL, '$2y$10$03K9g0zWaeK.x4ueOror9OHuYcI2aD1DkkgQLRg4K/NSAs927RyZW', '2021-07-07 21:39:40'),
('C00060', 3, '', '', NULL, NULL, NULL, NULL, NULL, '', NULL, '$2y$10$Ad9GJALTkR0xmkoA7L2zAOnRqmAj7YXCfKK0MbOsN.gL1dRcmKfOK', '2021-07-07 21:39:40'),
('C00061', 3, '', '', NULL, NULL, NULL, NULL, NULL, '', NULL, '$2y$10$f4cnafRq/.UFS1HnvRlku.x.cT1pn/Wtr1Wvkcd2UTmrd0z93zO2i', '2021-07-07 21:39:40'),
('C00062', 3, '', '', NULL, NULL, NULL, NULL, NULL, '', NULL, '$2y$10$V/sWGvqgDkAmw0Rwz6pRYunyEQI5YE8WPiTDuAAVG4L4zixEwyisK', '2021-07-07 21:39:40'),
('C00063', 3, '', '', NULL, NULL, NULL, NULL, NULL, '', NULL, '$2y$10$7gCeMrgxXycttyGSSOYf0eRSz5WX.UvY1gtwF3GxcPx8/.5l6R64a', '2021-07-07 21:39:40'),
('C00064', 3, '', '', NULL, NULL, NULL, NULL, NULL, '', NULL, '$2y$10$ckJZ/xMHtl6ga1isXzNTSObtePxeoFjDoXx2hz2bP7NlSgJ2XzmY2', '2021-07-07 21:39:40'),
('C00065', 3, '', '', NULL, NULL, NULL, NULL, NULL, '', NULL, '$2y$10$w1IbmbpuyVkKyPp1rOpZu.Io7LNjaJzUc3bSEhrZBMRkgd65MKOo6', '2021-07-07 21:39:40'),
('C00066', 3, '', '', NULL, NULL, NULL, NULL, NULL, '', NULL, '$2y$10$JRAgt2W7qy0Vkn3uqHda.OiXvb1S3CSUpqxM24LDrjS/TqOqFT3iW', '2021-07-07 21:39:40'),
('C00067', 3, '', '', NULL, NULL, NULL, NULL, NULL, '', NULL, '$2y$10$arODrBTw72dgbryJlYoKXejOeVlKKaN66VNpadrWpZVu4YsMuieke', '2021-07-07 21:39:40'),
('C00068', 3, '', '', NULL, NULL, NULL, NULL, NULL, '', NULL, '$2y$10$4kXGPUIMOCAVyR1UDrUdquCNOjHsfC/.u/8rdHskI5S2qrjZZcRXS', '2021-07-07 21:39:40'),
('C00069', 3, '', '', NULL, NULL, NULL, NULL, NULL, '', NULL, '$2y$10$E9Q0Kf.ATljhAMCHDWTz1u6F3ZKLoEAMXazTJ/7A/C7nNzv2GSm7S', '2021-07-07 21:39:40'),
('C00070', 3, '', '', NULL, NULL, NULL, NULL, NULL, '', NULL, '$2y$10$IHPIQKQkZeqp.qu/s3Aa/O5YR8MLwqcv1B9oVzLtiPdwr8BHQYOQ.', '2021-07-07 21:39:40'),
('C00071', 3, '', '', NULL, NULL, NULL, NULL, NULL, '', NULL, '$2y$10$qQvRfkfnyRHOaITZhgKsHeSeqc9EZWbkwVSvShaPAz9n80qgymFLq', '2021-07-07 21:39:40'),
('C00072', 3, '', '', NULL, NULL, NULL, NULL, NULL, '', NULL, '$2y$10$eEFAHaV54xLPcDkPH4dbNOjqFpLO8OiNJibCzzro1zSUYlu75pVb.', '2021-07-07 21:39:40'),
('C00073', 3, '', '', NULL, NULL, NULL, NULL, NULL, '', NULL, '$2y$10$Kv5Fa1IJhAArukIQ/3liA.mGlGv9yD1D2Ad7ivqy5PoWEHR7LwL42', '2021-07-07 21:39:40'),
('C00074', 3, '', '', NULL, NULL, NULL, NULL, NULL, '', NULL, '$2y$10$jSkhroVCcVADzdsZwy.oCuiwqwiqEeevoQy2P9eDpd9wnCdCxYdUu', '2021-07-07 21:39:40'),
('C00075', 3, '', '', NULL, NULL, NULL, NULL, NULL, '', NULL, '$2y$10$Wf0jMZkhlRwizB5TV5VbYu3B0OS6IT86WICLts2qHmOO8gy8DLIp2', '2021-07-07 22:00:40'),
('C00076', 3, '', '', NULL, NULL, NULL, NULL, NULL, '', NULL, '$2y$10$Ycg.DBW6zTUOY5fzAcpnj.XPyxf3hPRxnsGfIw8POaq1rdgqMEM5a', '2021-07-07 22:00:40'),
('C00077', 3, '', '', NULL, NULL, NULL, NULL, NULL, '', NULL, '$2y$10$v4X.nTy9aJ9ou1AGVe0RruFOD126mAGHMQYDEEGXbS9XrNv7e8S62', '2021-07-07 22:00:40'),
('C00078', 3, '', '', NULL, NULL, NULL, NULL, NULL, '', NULL, '$2y$10$KeSBtiXW27/dFzm4RnyJc.V3BxDGArl/l41NjgMtc/qkijCoa1Pji', '2021-07-07 22:00:56'),
('C00079', 3, '', '', NULL, NULL, NULL, NULL, NULL, '', NULL, '$2y$10$eZ0yutePK8f/C0Ju.AS9UOuJeQUgzBJEbqZb9KqDcid7kUoT5ab8.', '2021-07-07 22:00:56'),
('D00001', 4, '', '', NULL, NULL, NULL, NULL, NULL, '', NULL, '$2y$10$MPwVPNiCNmIn7pbIrdTVvO/L//uXDR5LOO606Cfo7UZE4wJmy/g0i', '2021-07-07 22:00:33'),
('D00002', 4, '', '', NULL, NULL, NULL, NULL, NULL, '', NULL, '$2y$10$rbqAJtXbzFOeOLiJ9lgFBOIj6iNaXU3YbBoXx4XNTho/t/AQ.UEcS', '2021-07-07 22:00:33'),
('D00003', 4, '', '', NULL, NULL, NULL, NULL, NULL, '', NULL, '$2y$10$xoRKgbMyex5YF.z.PpqDluHXXsCnm/.0FesQXK5.5FQ3PXwfzP9Iu', '2021-07-07 22:00:33'),
('D00004', 4, '', '', NULL, NULL, NULL, NULL, NULL, '', NULL, '$2y$10$xCaZ5JZrONvt7OjF0yR2s.xny8lEKibUOLgzistwnW61qno6wE.UC', '2021-07-07 22:01:02'),
('D00005', 4, '', '', NULL, NULL, NULL, NULL, NULL, '', NULL, '$2y$10$lq6Q3bqQw7EowvJ2aJZFie8DJt9wjbGB38eWjBPq8pTxUTfVdvH5.', '2021-07-07 22:01:02');

-- --------------------------------------------------------

--
-- 資料表結構 `staff_role_category`
--

CREATE TABLE `staff_role_category` (
  `id` int(1) NOT NULL,
  `position` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `staff_role_category`
--

INSERT INTO `staff_role_category` (`id`, `position`) VALUES
(1, '管理者'),
(2, '經理'),
(3, '會計'),
(4, '一般員工');

-- --------------------------------------------------------

--
-- 資料表結構 `wish_list`
--

CREATE TABLE `wish_list` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foreign_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `wish_list`
--

INSERT INTO `wish_list` (`id`, `user_id`, `type`, `foreign_id`) VALUES
(79, 21, 'event', 3),
(83, 21, 'restaurant', 0),
(84, 21, 'restaurant', 0),
(85, 21, 'restaurant', 0),
(86, 21, 'restaurant', 0),
(87, 21, 'restaurant', 0),
(88, 36, 'event', 5),
(89, 36, 'event', 5),
(90, 36, 'event', 5),
(91, 38, 'restaurant', 0),
(92, 38, 'event', 5),
(93, 38, 'hotel', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `wish_list_hotel`
--

CREATE TABLE `wish_list_hotel` (
  `id` int(11) NOT NULL,
  `wish_list_id` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `wish_list_hotel`
--

INSERT INTO `wish_list_hotel` (`id`, `wish_list_id`, `date`) VALUES
(1, 37, '0000-00-00'),
(2, 38, '0000-00-00'),
(3, 39, '0000-00-00'),
(4, 40, '2021-06-12'),
(5, 43, '2021-06-13'),
(6, 44, '2021-06-13'),
(7, 45, '2021-06-14'),
(8, 46, '2021-06-14'),
(9, 47, '2021-06-15'),
(10, 48, '2021-06-14'),
(11, 49, '2021-06-14'),
(12, 50, '2021-06-14'),
(13, 51, '2021-06-16'),
(14, 52, '2021-06-13'),
(15, 53, '2021-06-15'),
(16, 54, '2021-06-14'),
(17, 66, '2021-06-14'),
(18, 67, '2021-06-14'),
(19, 77, '2021-06-14'),
(20, 93, '2021-06-30');

-- --------------------------------------------------------

--
-- 資料表結構 `wish_list_restaurant`
--

CREATE TABLE `wish_list_restaurant` (
  `id` int(11) NOT NULL,
  `wish_list_id` int(11) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `wish_list_restaurant`
--

INSERT INTO `wish_list_restaurant` (`id`, `wish_list_id`, `restaurant_id`, `date`, `time`, `quantity`) VALUES
(1, 29, 7, '2021-06-18', '12:00:00', 6),
(2, 29, 11, '2021-06-18', '12:00:00', 6),
(3, 29, 13, '2021-06-18', '12:00:00', 6),
(4, 30, 13, '2021-06-16', '14:00:00', 2),
(5, 30, 15, '2021-06-16', '14:00:00', 2),
(6, 41, 25, '2021-06-09', '08:00:00', 7),
(7, 41, 26, '2021-06-09', '08:00:00', 7),
(8, 68, 14, '2021-06-12', '08:00:00', 3),
(9, 68, 15, '2021-06-12', '08:00:00', 3),
(10, 68, 16, '2021-06-12', '08:00:00', 3),
(11, 69, 14, '2021-06-12', '08:00:00', 3),
(12, 69, 15, '2021-06-12', '08:00:00', 3),
(13, 69, 16, '2021-06-12', '08:00:00', 3),
(14, 70, 14, '2021-06-12', '08:00:00', 3),
(15, 70, 15, '2021-06-12', '08:00:00', 3),
(16, 70, 16, '2021-06-12', '08:00:00', 3),
(17, 71, 16, '2021-06-12', '08:00:00', 1),
(18, 71, 17, '2021-06-12', '08:00:00', 1),
(19, 72, 16, '2021-06-12', '08:00:00', 2),
(20, 72, 17, '2021-06-12', '08:00:00', 2),
(21, 72, 19, '2021-06-12', '08:00:00', 2),
(22, 73, 10, '2021-06-12', '08:00:00', 12),
(23, 73, 12, '2021-06-12', '08:00:00', 12),
(24, 73, 16, '2021-06-12', '08:00:00', 12),
(25, 73, 17, '2021-06-12', '08:00:00', 12),
(26, 73, 19, '2021-06-12', '08:00:00', 12),
(27, 74, 5, '2021-06-12', '08:00:00', 11),
(28, 74, 9, '2021-06-12', '08:00:00', 11),
(29, 74, 13, '2021-06-12', '08:00:00', 11),
(30, 75, 4, '2021-06-12', '08:00:00', 17),
(31, 75, 5, '2021-06-12', '08:00:00', 17),
(32, 75, 8, '2021-06-12', '08:00:00', 17),
(33, 75, 9, '2021-06-12', '08:00:00', 17),
(34, 75, 13, '2021-06-12', '08:00:00', 17),
(35, 78, 15, '2021-06-13', '08:00:00', 0),
(36, 83, 17, '2021-06-17', '08:00:00', 1),
(37, 83, 18, '2021-06-17', '08:00:00', 1),
(38, 84, 18, '2021-06-17', '08:00:00', 1),
(39, 84, 19, '2021-06-17', '08:00:00', 1),
(40, 85, 18, '2021-06-17', '08:00:00', 1),
(41, 85, 19, '2021-06-17', '08:00:00', 1),
(42, 86, 18, '2021-06-17', '08:00:00', 1),
(43, 86, 19, '2021-06-17', '08:00:00', 1),
(44, 87, 20, '2021-06-17', '08:00:00', 11),
(45, 87, 23, '2021-06-17', '08:00:00', 11),
(46, 87, 26, '2021-06-17', '08:00:00', 11),
(47, 91, 15, '2021-06-30', '08:00:00', 1);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `consignee_other`
--
ALTER TABLE `consignee_other`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`),
  ADD KEY `eventCatFK` (`cat_id`);

--
-- 資料表索引 `event_category`
--
ALTER TABLE `event_category`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `event_image`
--
ALTER TABLE `event_image`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `helpdesk_category`
--
ALTER TABLE `helpdesk_category`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `index`
--
ALTER TABLE `index`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- 資料表索引 `order_event`
--
ALTER TABLE `order_event`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `order_hotel`
--
ALTER TABLE `order_hotel`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `order_restaurant`
--
ALTER TABLE `order_restaurant`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `sales_order`
--
ALTER TABLE `sales_order`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- 資料表索引 `staff_role_category`
--
ALTER TABLE `staff_role_category`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `wish_list`
--
ALTER TABLE `wish_list`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `wish_list_hotel`
--
ALTER TABLE `wish_list_hotel`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `wish_list_restaurant`
--
ALTER TABLE `wish_list_restaurant`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `consignee_other`
--
ALTER TABLE `consignee_other`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `event_category`
--
ALTER TABLE `event_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `event_image`
--
ALTER TABLE `event_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `helpdesk_category`
--
ALTER TABLE `helpdesk_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `hotel`
--
ALTER TABLE `hotel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `index`
--
ALTER TABLE `index`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `order_event`
--
ALTER TABLE `order_event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `order_hotel`
--
ALTER TABLE `order_hotel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `order_item`
--
ALTER TABLE `order_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `order_restaurant`
--
ALTER TABLE `order_restaurant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `sales_order`
--
ALTER TABLE `sales_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `staff_role_category`
--
ALTER TABLE `staff_role_category`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `wish_list`
--
ALTER TABLE `wish_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `wish_list_hotel`
--
ALTER TABLE `wish_list_hotel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `wish_list_restaurant`
--
ALTER TABLE `wish_list_restaurant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- 已傾印資料表的限制式
--

--
-- 資料表的限制式 `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `eventCatFK` FOREIGN KEY (`cat_id`) REFERENCES `event_category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
