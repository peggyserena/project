-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2021-07-04 12:42:24
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
  `event_id` varchar(20) CHARACTER SET utf8 NOT NULL,
  `img_count` int(11) NOT NULL DEFAULT 1,
  `video` varchar(100) CHARACTER SET utf8 NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `price` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `info` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `other` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `limitNum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `event`
--

INSERT INTO `event` (`id`, `cat_id`, `event_id`, `img_count`, `video`, `name`, `date`, `time`, `price`, `description`, `title`, `info`, `other`, `limitNum`) VALUES
(1, 3, 'FE20210529', 6, 'https://youtu.be/PygKllQxP-U', '森林探索家．來一趟自然的探索', '2021-08-31', '14:00:00', 12400, '今年的暑假，來薰衣草森林成為探索家吧。在海拔 700公尺的香草園與森林內，發掘平常不會注意到的事物；增加對這片土地的認識。一起探險、探索未知的世界。', '探索家的報名資訊&任務', '🔹梯次：每週六、日\r\n🔹時間：下午14:00-16:00\r\n🔹年齡：5歲以上喜歡森林的大小朋友們\r\n🔹費用：400元/人，現場報名、線上報名\r\n🔹集合地點：紫丘\r\n🔹活動內容：入園費、入山儀式、森林導覽、森林探索包租借費、手工餅乾、水果氣泡水、植物創作、結業證書\r\n', '\r\n來看看探索家要做什麼吧\r\na. 進入山之前，來一場入山儀式\r\nb. 讓探索小隊長帶你認識神秘的動植物、聽樹的聲音\r\nc. 摘取自己喜愛的香草植物來製作美味的水果氣泡水與手工餅乾\r\nd. 用大自然的產物創作獨一無二的作品，並獲頒結業證書\r\ne. 來一場結業式~感謝山所帶給你的勇氣\r\n\r\n\r\n⛔成為探索家的注意事項\r\na. 為維護活動品質，本活動5人成團，上限20人。若因未達開團人數，導致無法成團體驗，將協助併團或全額退款，謝謝。\r\nb. 如需退票請於活動結束前3日辦理，逾期恕不受理，並酌收票價10%退票手續費。\r\nc. 基於安全考量請穿適宜走路之球鞋、長褲。請勿穿高跟鞋、夾腳拖鞋或露趾涼鞋。\r\nd. 本活動包含入園門票150元，森林秘境探險導覽，水果氣泡水手作課程乙次，手工餅乾手作課程乙次，植物創作以及探索家結業證書', 30),
(2, 3, 'FF20210530', 6, 'https://www.youtube.com/watch?v=YGhxsr_WxVc', ' 螢河旅行 ', '2021-08-27', '18:00:00', 800, '星夜。螢河。森林。繡球花。\r\n\r\n踏進中部的後花園、台中最美的賞螢秘境，\r\n8000 棵樹的森林秘境，海拔 700 公尺的山中花園，\r\n\r\n螢河在黑暗中閃爍，那是寧靜而象徵生生不息的希望之光~出發吧，進入這座森林。為這個季節譜出最動人的旋律', '螢河旅行 －報名資訊', '🔹梯次：5/30\r\n🔹時間：下午18:00-20:30\r\n🔹年齡：喜歡森林的大小朋友們\r\n🔹費用：800元/人，現場報名、線上報名\r\n🔹集合地點：市集廣場\r\n🔹活動內容：包含入園門票150元，森林、螢火蟲秘境探險導覽，紫丘冰淇淋乙盒，森林旋轉木馬體驗乙次、香草水手作課程乙次、明信片乙張、一人份螢光晚餐。', '《注意事項》\r\n\r\n➤賞螢時間大約是19:00-20:30。若遇到下雨而18點雨停止，螢火蟲還是會出現。(在雨天的狀況下，活動還是照常進行。只要做好心理與裝備上的準備，還是可以開心的來參加)\r\n\r\n1. 本活動有雨天備案，在賞螢活動前雨停，都還是看得到螢火蟲出現。 如果您是下雨天就完全不想出門的客人，請斟酌考慮是否報名！若天氣真的變化太大，導致行程無法走完。將致贈免費入園卷乙張，與免費賞螢乙次。(視報名人數發放)。 \r\n\r\n2. 基於安全考量請穿適宜走路之球鞋(需防滑)、長褲及輕便雨衣。請勿穿高跟鞋、夾腳拖鞋或露趾涼鞋。 \r\n\r\n3. 螢火蟲生態體驗的活動路線會行經較為陡峭的步道(此段路無法推嬰兒車或輪椅)，請參加者考量自身能力是否適合。 \r\n\r\n4. 本活動除了觀賞螢火蟲的生態外，也教育大眾如何保育螢火蟲，螢火蟲怕光。所以活動途中嚴禁攝影、拍照。若以拍攝為目的之朋友，請勿報名。 \r\n\r\n5. 為維護賞螢活動品質，本活動4人成團，上限20人。\r\n', 20),
(3, 2, 'FC20210605', 5, 'https://www.youtube.com/watch?v=YGhxsr_WxVc&t', '森林好朋友音樂會', '2021-08-19', '15:00:00', 200, '你聽過森林中的音樂會嗎？新社森林舉辦了一場小小的音樂會來療癒彼此的身心。\r\n\r\n創作歌手 王立言  將來到森林做客，為期四天，除了星期天下午的森林音樂會之外，其他三天來到森林的朋友，歡迎來森林捕捉唱歌、畫畫、創作的立言哦。\r\n\r\n薰衣草森林，誠摯邀請您來聽歌～', '好朋友音樂會－報名資訊', '🔹梯次：6/5~6/8\r\n🔹時間：下午15:00-17:00\r\n🔹年齡：喜歡森林的大小朋友們\r\n🔹費用：200元/人，現場報名、線上報名\r\n🔹集合地點：市集廣場\r\n🔹活動內容：入園費、入山儀式、手工餅乾、水果氣泡水\r\n', '🎤美好的點滴🎤\r\n\r\n這幾天來森林的朋友，你有遇到立言嗎？\r\n創作歌手 王立言 為期四天的的森林駐村唱歌、創作，這場音樂會很特別，除了歌曲之外，立言還拿起繪本講故事，大家隨興的或坐或站，小朋友\r\n們受到音樂的吸引，一邊跳舞擺動手腳。\r\n\r\n接下來的幾天，立言不分早晚，只要是適合唱歌的地方，她就會拿起吉他。\r\n\r\n昨天立言跟我們分享她遇到的旅人的故事，有休假中的警察大哥跟她一起去吃早餐，有一起結伴來森林的學生們興奮跟她合照，有開心的爸媽說家\r\n中小小孩聽了歌聲就記得她，有寫了小卡片送給她的森林小夥伴們，令她淚流滿面。\r\n\r\n我們為什麼會在森林中感到幸福？我想除了美景之外，森林能放大所有美好的點滴，薰衣草森林，就是這樣一個令人自由自在的地方。\r\n', 200),
(4, 4, 'CF20210613', 6, '', ' 幸福花路香氛花圈課 ', '2021-09-30', '14:00:00', 800, '來一趟森林小旅行\r\n\r\n森林即將迎來繽紛浪漫的繡球花季，運用自然植物素材綑綁出屬於自己的花圈，替生活添加花與植物的浪漫氛圍。\r\n\r\n課程中將提供不同花材讓學員選擇自己喜歡的韻味花材，並可以搭配不同的心儀氣味，當一回小小調香師，組合成一組初夏粉嫩系的香氛花圈。\r\n\r\n\r\n\r\n \r\n\r\n', '幸福花路香氛花圈－課程內容', '課程內容\r\n\r\n🔹6/13(六)\r\n🔹梯次：14:00~16:30\r\n🔹費用 ：NT800 / 人\r\n🔹年齡：5歲以上喜歡森林的大小朋友們\r\n🔹費用：包含\r\n＋ 課程裡的工具使用／師資／花器／植物花材 /香氛費用\r\n＋ 生動有趣的香草導覽 / 現場採集\r\n＋ 香草飲品\r\n＋ 森林咖啡館午茶 (甜點組合*1、飲品*1)\r\n\r\n\r\n', '活動行程   14:00~16:30\r\n1400-1410	集合 | 緩心聞香、入森林\r\n1410-1440	導覽 | 認識森林、香草導覽\r\n1440-1500	迎賓 | 沏一壺手摘香草茶，讓這一刻慢下來\r\n1500-1600	手作 | 紫色夢境花圈手作體驗、香氛體驗\r\n1600-1630	野午茶 | 一起品味好吃的午茶吧\r\n\r\n森林即將迎來初夏，屬於夏天的花也登場亮相，美麗動人的繡球花便在此時悄然綻放，一顆顆五顏六色的花朵聚集，成為夏天必賞花海，在浪漫的繡球花丘裡，給自己一個花草時間享受悠閒時光吧。\r\n\r\n森林團隊為旅人打造，彷彿置身紫色夢境的花藝作品。課程中將提供不同的乾燥花材與園區內採集的自然素材，一起從自然中擷取元素，將這些祝福都作成花圈。\r\n\r\n課程中將提供不同花材讓學員選擇自己喜歡的韻味花材，並可以搭配不同的心儀氣味，當一回小小調香師，組合成一組初夏粉嫩系的香氛花圈。\r\n\r\n享受與植物、香氛相伴的小日子😋', 30),
(5, 3, 'FE20210529', 6, 'https://youtu.be/PygKllQxP-U', '森林探索家．來一趟自然的探索', '2021-07-22', '14:00:00', 400, '今年的暑假，來薰衣草森林成為探索家吧。在海拔 700公尺的香草園與森林內，發掘平常不會注意到的事物；增加對這片土地的認識。一起探險、探索未知的世界。', '探索家的報名資訊&任務', '🔹梯次：每週六、日\r\n🔹時間：下午14:00-16:00\r\n🔹年齡：5歲以上喜歡森林的大小朋友們\r\n🔹費用：400元/人，現場報名、線上報名\r\n🔹集合地點：紫丘\r\n🔹活動內容：入園費、入山儀式、森林導覽、森林探索包租借費、手工餅乾、水果氣泡水、植物創作、結業證書\r\n', '\r\n👀來看看探索家要做什麼吧\r\na. 進入山之前，來一場入山儀式\r\nb. 讓探索小隊長帶你認識神秘的動植物、聽樹的聲音\r\nc. 摘取自己喜愛的香草植物來製作美味的水果氣泡水與手工餅乾\r\nd. 用大自然的產物創作獨一無二的作品，並獲頒結業證書\r\ne. 來一場結業式~感謝山所帶給你的勇氣\r\n\r\n\r\n⛔成為探索家的注意事項\r\na. 為維護活動品質，本活動5人成團，上限20人。若因未達開團人數，導致無法成團體驗，將協助併團或全額退款，謝謝。\r\nb. 如需退票請於活動結束前3日辦理，逾期恕不受理，並酌收票價10%退票手續費。\r\nc. 基於安全考量請穿適宜走路之球鞋、長褲。請勿穿高跟鞋、夾腳拖鞋或露趾涼鞋。\r\nd. 本活動包含入園門票150元，森林秘境探險導覽，水果氣泡水手作課程乙次，手工餅乾手作課程乙次，植物創作以及探索家結業證書。', 30),
(6, 3, 'FE20210529', 6, 'https://youtu.be/PygKllQxP-U', '森林探索家．來一趟自然的探索', '2021-08-29', '14:00:00', 400, '今年的暑假，來薰衣草森林成為探索家吧。在海拔 700公尺的香草園與森林內，發掘平常不會注意到的事物；增加對這片土地的認識。一起探險、探索未知的世界。', '探索家的報名資訊&任務', '🔹梯次：每週六、日\r\n🔹時間：下午14:00-16:00\r\n🔹年齡：5歲以上喜歡森林的大小朋友們\r\n🔹費用：400元/人，現場報名、線上報名\r\n🔹集合地點：紫丘\r\n🔹活動內容：入園費、入山儀式、森林導覽、森林探索包租借費、手工餅乾、水果氣泡水、植物創作、結業證書\r\n', '\r\n👀來看看探索家要做什麼吧\r\na. 進入山之前，來一場入山儀式\r\nb. 讓探索小隊長帶你認識神秘的動植物、聽樹的聲音\r\nc. 摘取自己喜愛的香草植物來製作美味的水果氣泡水與手工餅乾\r\nd. 用大自然的產物創作獨一無二的作品，並獲頒結業證書\r\ne. 來一場結業式~感謝山所帶給你的勇氣\r\n\r\n\r\n⛔成為探索家的注意事項\r\na. 為維護活動品質，本活動5人成團，上限20人。若因未達開團人數，導致無法成團體驗，將協助併團或全額退款，謝謝。\r\nb. 如需退票請於活動結束前3日辦理，逾期恕不受理，並酌收票價10%退票手續費。\r\nc. 基於安全考量請穿適宜走路之球鞋、長褲。請勿穿高跟鞋、夾腳拖鞋或露趾涼鞋。\r\nd. 本活動包含入園門票150元，森林秘境探險導覽，水果氣泡水手作課程乙次，手工餅乾手作課程乙次，植物創作以及探索家結業證書。', 30);

-- --------------------------------------------------------

--
-- 資料表結構 `event_category`
--

CREATE TABLE `event_category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `event_category`
--

INSERT INTO `event_category` (`id`, `name`) VALUES
(1, '節慶'),
(2, '音樂會'),
(3, '森林'),
(4, '手工藝');

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
  `city` varchar(10) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `hash` varchar(255) NOT NULL,
  `forget_password` text NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `members`
--

INSERT INTO `members` (`id`, `fb_id`, `email`, `email_2nd`, `fullname`, `birthday`, `mobile`, `zipcode`, `city`, `address`, `hash`, `forget_password`, `created_at`) VALUES
(20, '', 'peiching46@gmail.com', 'peggy@gmail.com', '陳小桔', '2021-04-01', '090993777', '236', '新北市', '土城區', '$2y$10$aEWE4Ck0wTK0SsMgCOlrReDkRR.QMgN4EzhEskXnYrt6.JOBiiWRS', '', '2021-05-15 23:48:37'),
(21, '', 'lavenderforestcafe@gmail.com', '', 'test', '2021-05-20', '1112', '123', 'ci', 'add', '$2y$10$KrWts4NkRwDlIgo6OB9ZbegrxVvXtLR8i3QHxLI/yUJmbysA2kmo.', 'b02e9e058c27b719903ad6c83d3d41d784871b035f147e686edf9a125ddbe93c', '2021-05-16 19:18:03'),
(35, '3099140803648149', 'few5325@gmail.com', NULL, 'Kevin Chen', '2021-06-04', '', '', '', '', '$2y$10$rr7isKrQWnwvN0ONG4QwDe/iuuKkziqBYJ4Jl6wytNACnSLOOIxZS', '', '2021-06-17 19:55:15'),
(36, '', 'user22@mail.com', '', 'user', '2021-06-15', '0900000000', '00', '000', '00', '$2y$10$5Hfyj7HgcgNqY/bCcARsM.0Q54zREg9nHOirWDYCmbNy4oVAw5gB2', '', '2021-06-26 12:33:45'),
(37, '', '19980726kevin@gmail.com', NULL, 'tset', '2021-06-11', '', '', '', '', '$2y$10$1k6zIZHmk2b7z8qyZEq4WOkJkzj7LrI/vSDTLIuT2dsB25wee/JNO', '71c829b001bd330579e031ef6bcd381b8e8fa45916dedac1bd99aad27e27268a', '2021-06-27 17:23:13'),
(38, '', 'peggyserena46@gmail.com', '', '黃小吉', '2021-06-25', '0909999999', '236', '新北市', '土城區', '$2y$10$SomDY8WI2bNT1yIyFRCdpO8BEV4lqqWEcCny2cijs5OQli1kdwneS', '', '2021-06-30 20:54:21'),
(39, '', '456@gmail.com', NULL, '', '2021-06-25', '', '', '', '', '$2y$10$ozk9wAMGepgpOJoQqB8oQu.LQlTdAlxeTb09P0n7ylcQOtWUXcAjS', '', '2021-06-30 20:54:41'),
(40, '', '789@gmail.com', NULL, '', '2021-06-25', '', '', '', '', '$2y$10$1uICq8oLWyVRgF6ezwFr5OgoXLyJfAgnmsIKodEB0Sq1OTw7M0pMy', '', '2021-06-30 20:55:33'),
(41, '', '46@gmail.com', NULL, '', '2021-06-11', '', '', '', '', '$2y$10$TkBydgN0ZdOpQ4KOq2opluPKj8tT5BY/5i.Zoe6iH9dazPB0gDTbK', '', '2021-06-30 20:55:47'),
(42, '', '1116@gmail.com', NULL, '', '2021-06-11', '', '', '', '', '$2y$10$ajffESLI.C0dHPSYRXnSKO/kI35ayzzFWFNud1gb8HU/gYVDalrMe', '', '2021-06-30 20:56:27'),
(43, '', '1118@gmail.com', NULL, '', '2021-06-11', '', '', '', '', '$2y$10$2bj7UZufCNbnt6oAwK11gOe1ZKtk.X5MW.jd7dvO3DhVbku6Y7aK2', '', '2021-06-30 20:57:18'),
(44, '', 'hing46@gmail.com', NULL, '', '2021-06-26', '', '', '', '', '$2y$10$YojPBio36faOCs7WqiI3YeCpuZr6GF6njq5JwrpDkZSnUQ3dIdAI6', '', '2021-06-30 21:05:05'),
(45, '', '222246@gmail.com', NULL, '', '2021-06-02', '', '', '', '', '$2y$10$POk.TDvEjf4dgqEzBBUeg.CWqQ5wtJ4kwCFNmJrSSMlvKGHlV1W8y', '', '2021-07-01 01:13:35'),
(46, '', '2222eee6@gmail.com', NULL, '', '2021-06-02', '', '', '', '', '$2y$10$C.iUmDsBmz/pm7UYRKwRi.sOdbvVLcbRt3W.7hHHVyvDi0F80hGZW', '', '2021-07-01 01:14:18'),
(47, '', '111111ww@gmail.com', NULL, '', '2021-06-01', '', '', '', '', '$2y$10$hoRdesQ2sE1KCuXkal/lkOtv2rOdrV0hVaQKXJ/CsTj9btxC.yKMy', '', '2021-07-01 01:17:22'),
(48, '', '11fvdgvww@gmail.com', NULL, '', '2021-06-01', '', '', '', '', '$2y$10$jf30UEdurZzL8dAMCkJXeevN6bcPgvhOOIBtKE5Sh.AbFVM5qr6q6', '', '2021-07-01 01:24:57'),
(49, '', '11fvdgvfrcww@gmail.com', NULL, '', '2021-06-01', '', '', '', '', '$2y$10$vaxnHz7/228S9TDVqw03ueVx3Lk.3cMDHXcsQMUpJr1BYBL/L6RFO', '', '2021-07-01 01:29:48'),
(50, '', 'peiccrrhincg46@gmail.com', NULL, '', '2021-06-03', '', '', '', '', '$2y$10$NdV40tX6UrkmuApGJbb.L.MW/YVvCxZQ6UtnmfuAvu9iFpqRUTg9e', '', '2021-07-01 01:30:17'),
(51, '', 'peichinxwxg46@gmail.com', NULL, '', '2021-06-02', '', '', '', '', '$2y$10$DJNcvxhMOvHfA80QS4Easeo6ht36vQDprojLrJFuD4aVHPee.Bck.', '', '2021-07-01 01:32:06'),
(52, '', 'peidxwdwdching46@gmail.com', NULL, '', '2021-06-03', '', '', '', '', '$2y$10$TJonwktRd8V2SOfIIFo8N.wdTMQwnsjaGcm8yJhXv0hv..U3MTBjy', '', '2021-07-01 01:40:01');

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
  `city` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hash` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `staff`
--

INSERT INTO `staff` (`staff_id`, `role`, `identityNum`, `email`, `fullname`, `birthday`, `mobile`, `zipcode`, `city`, `address`, `hash`, `created_at`) VALUES
('A00001', 1, 'F123456789', 'peggyserena46@gmail.com', '黃小桔', '2021-07-01', '0909123456', '', '', '', '$2y$10$SomDY8WI2bNT1yIyFRCdpO8BEV4lqqWEcCny2cijs5OQli1kdwneS', '2021-06-28 16:52:49'),
('B00001', 2, '', '', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$XlchHoBnd4grbEC0kyPnA.ZAGfpLCMbfcs86NI5F5JrDvSWNqMB9y', '2021-07-01 21:20:04'),
('B00002', 2, '', '', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$afTuYwqEam2RwXLtQokNjeouPFPFNHty9G7lI8hfFvEM2xpCj2Ihi', '2021-07-01 21:20:04'),
('B00003', 2, '', '', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$mETKdFnCobtFFDIQA5fQ0OGJVNre6MkFkXe5PscGDtKDUer2r8Zs2', '2021-07-01 21:20:04'),
('B00004', 2, '', '', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$fncEUFbvPS.kBSdSAJOVU.uHue2lI1d.679/QNEDvFrBmJBREm3Oi', '2021-07-01 21:23:47'),
('B00005', 2, '', '', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$VeBxt7ZRlzeAgLtnP7GynuP7F7cbdfUBGBzcYBbQwQlOTu2TF3nO6', '2021-07-01 21:23:47'),
('B00006', 2, '', '', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$gZUU7pizC.ZGbvAoTR6u5u5a/feivPvVZJUj4Bgs/9P97z9/jropy', '2021-07-01 21:23:47'),
('C00001', 3, '', '', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$XDfpMeVVSt/3fIn2qmejJ.VYACHyv4pMp4VH0A0y.QPUT8q6E49.G', '2021-07-01 21:11:33'),
('C00002', 3, '', '', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$nEZ8uQldM6QObXuxNep1O.IGmBVAvjIQVi3yrSghmJyoNGX4SjY4a', '2021-07-01 21:11:33'),
('C00003', 3, '', '', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$hbHCt5cpWKwqA3YRmMQ7YuOgcePWrGBOAtsLhGNw958m6tR3.m6oe', '2021-07-01 21:11:33'),
('C00004', 3, '', '', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$J6.eByjjPSMgiiOmvLdVT.bSUSZAul1LooPm4ByeAbL6o8VS82Y1O', '2021-07-01 21:11:33'),
('C00005', 3, '', '', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$MPjTiJC7.NqlU/UUeS5rOO9qHz0wougC.0jiGwBSYvygZickoZJze', '2021-07-01 21:11:33'),
('C00006', 3, '', '', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$wUJtI8E8PdmzUuUF2x0gW.teqoPycAw.5zagLHuQnIwgq5ZIh.X/S', '2021-07-01 21:45:34'),
('C00007', 3, '', '', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$LJoiPg00VHfPRCntHBMiIOQW8ZINwkP46gTVsa4digJ.AMhpu3ad6', '2021-07-01 21:45:34'),
('C00008', 3, '', '', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$kedauYAjIznYXvf6zfKQ7uuWNYk1IIMaHxmDeuzpILZxZqub.ru/e', '2021-07-01 21:45:34'),
('C00009', 3, '', '', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$NJIpt1xBqiUkOHk8mmDAF.UZOPaOhL2LNj4F4X5PH2Bcep0xl/wR2', '2021-07-01 21:45:34'),
('C00010', 3, '', '', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$bhQnp4kAY1qOqpaPkWVXRuaWWY7M2s5uVT5sTAgizIJSyEyvVuS5C', '2021-07-01 21:45:34');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `event_category`
--
ALTER TABLE `event_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

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
