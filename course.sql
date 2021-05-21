-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2021-05-18 19:43:55
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
(1, 3, 'FE20210529', 6, 'https://youtu.be/PygKllQxP-U', '森林探索家．來一趟自然的探索', '2021-05-29', '14:00:00', 400, '今年的暑假，來薰衣草森林成為探索家吧。在海拔 700公尺的香草園與森林內，發掘平常不會注意到的事物；增加對這片土地的認識。一起探險、探索未知的世界。', '探索家的報名資訊&任務', '🔹梯次：每週六、日\r\n🔹時間：下午14:00-16:00\r\n🔹年齡：5歲以上喜歡森林的大小朋友們\r\n🔹費用：400元/人，現場報名、線上報名\r\n🔹集合地點：紫丘\r\n🔹活動內容：入園費、入山儀式、森林導覽、森林探索包租借費、手工餅乾、水果氣泡水、植物創作、結業證書\r\n', '\r\n來看看探索家要做什麼吧\r\na. 進入山之前，來一場入山儀式\r\nb. 讓探索小隊長帶你認識神秘的動植物、聽樹的聲音\r\nc. 摘取自己喜愛的香草植物來製作美味的水果氣泡水與手工餅乾\r\nd. 用大自然的產物創作獨一無二的作品，並獲頒結業證書\r\ne. 來一場結業式~感謝山所帶給你的勇氣\r\n\r\n\r\n⛔成為探索家的注意事項\r\na. 為維護活動品質，本活動5人成團，上限20人。若因未達開團人數，導致無法成團體驗，將協助併團或全額退款，謝謝。\r\nb. 如需退票請於活動結束前3日辦理，逾期恕不受理，並酌收票價10%退票手續費。\r\nc. 基於安全考量請穿適宜走路之球鞋、長褲。請勿穿高跟鞋、夾腳拖鞋或露趾涼鞋。\r\nd. 本活動包含入園門票150元，森林秘境探險導覽，水果氣泡水手作課程乙次，手工餅乾手作課程乙次，植物創作以及探索家結業證書', 10),
(2, 3, 'FF20210530', 6, 'https://www.youtube.com/watch?v=YGhxsr_WxVc', ' 螢河旅行 ', '2021-05-30', '18:00:00', 800, '星夜。螢河。森林。繡球花。\r\n\r\n踏進中部的後花園、台中最美的賞螢秘境，\r\n8000 棵樹的森林秘境，海拔 700 公尺的山中花園，\r\n\r\n螢河在黑暗中閃爍，那是寧靜而象徵生生不息的希望之光~出發吧，進入這座森林。為這個季節譜出最動人的旋律', '螢河旅行 －報名資訊', '🔹梯次：5/30\r\n🔹時間：下午18:00-20:30\r\n🔹年齡：喜歡森林的大小朋友們\r\n🔹費用：800元/人，現場報名、線上報名\r\n🔹集合地點：市集廣場\r\n🔹活動內容：包含入園門票150元，森林、螢火蟲秘境探險導覽，紫丘冰淇淋乙盒，森林旋轉木馬體驗乙次、香草水手作課程乙次、明信片乙張、一人份螢光晚餐。', '《注意事項》\r\n\r\n➤賞螢時間大約是19:00-20:30。若遇到下雨而18點雨停止，螢火蟲還是會出現。(在雨天的狀況下，活動還是照常進行。只要做好心理與裝備上的準備，還是可以開心的來參加)\r\n\r\n1. 本活動有雨天備案，在賞螢活動前雨停，都還是看得到螢火蟲出現。 如果您是下雨天就完全不想出門的客人，請斟酌考慮是否報名！若天氣真的變化太大，導致行程無法走完。將致贈免費入園卷乙張，與免費賞螢乙次。(視報名人數發放)。 \r\n\r\n2. 基於安全考量請穿適宜走路之球鞋(需防滑)、長褲及輕便雨衣。請勿穿高跟鞋、夾腳拖鞋或露趾涼鞋。 \r\n\r\n3. 螢火蟲生態體驗的活動路線會行經較為陡峭的步道(此段路無法推嬰兒車或輪椅)，請參加者考量自身能力是否適合。 \r\n\r\n4. 本活動除了觀賞螢火蟲的生態外，也教育大眾如何保育螢火蟲，螢火蟲怕光。所以活動途中嚴禁攝影、拍照。若以拍攝為目的之朋友，請勿報名。 \r\n\r\n5. 為維護賞螢活動品質，本活動4人成團，上限20人。\r\n', 0),
(3, 2, 'FC20210605', 5, 'https://www.youtube.com/watch?v=YGhxsr_WxVc&t', '森林好朋友音樂會', '2021-06-05', '15:00:00', 200, '你聽過森林中的音樂會嗎？新社森林舉辦了一場小小的音樂會來療癒彼此的身心。\r\n\r\n創作歌手 王立言  將來到森林做客，為期四天，除了星期天下午的森林音樂會之外，其他三天來到森林的朋友，歡迎來森林捕捉唱歌、畫畫、創作的立言哦。\r\n\r\n薰衣草森林，誠摯邀請您來聽歌～', '好朋友音樂會－報名資訊', '🔹梯次：6/5~6/8\r\n🔹時間：下午15:00-17:00\r\n🔹年齡：喜歡森林的大小朋友們\r\n🔹費用：200元/人，現場報名、線上報名\r\n🔹集合地點：市集廣場\r\n🔹活動內容：入園費、入山儀式、手工餅乾、水果氣泡水\r\n', '🎤美好的點滴🎤\r\n\r\n這幾天來森林的朋友，你有遇到立言嗎？\r\n創作歌手 王立言 為期四天的的森林駐村唱歌、創作，這場音樂會很特別，除了歌曲之外，立言還拿起繪本講故事，大家隨興的或坐或站，小朋友\r\n們受到音樂的吸引，一邊跳舞擺動手腳。\r\n\r\n接下來的幾天，立言不分早晚，只要是適合唱歌的地方，她就會拿起吉他。\r\n\r\n昨天立言跟我們分享她遇到的旅人的故事，有休假中的警察大哥跟她一起去吃早餐，有一起結伴來森林的學生們興奮跟她合照，有開心的爸媽說家\r\n中小小孩聽了歌聲就記得她，有寫了小卡片送給她的森林小夥伴們，令她淚流滿面。\r\n\r\n我們為什麼會在森林中感到幸福？我想除了美景之外，森林能放大所有美好的點滴，薰衣草森林，就是這樣一個令人自由自在的地方。\r\n', 0),
(4, 4, 'CF20210613', 6, '', ' 幸福花路香氛花圈課 ', '2021-06-13', '14:00:00', 800, '來一趟森林小旅行\r\n\r\n森林即將迎來繽紛浪漫的繡球花季，運用自然植物素材綑綁出屬於自己的花圈，替生活添加花與植物的浪漫氛圍。\r\n\r\n課程中將提供不同花材讓學員選擇自己喜歡的韻味花材，並可以搭配不同的心儀氣味，當一回小小調香師，組合成一組初夏粉嫩系的香氛花圈。\r\n\r\n\r\n\r\n \r\n\r\n', '幸福花路香氛花圈－課程內容', '課程內容\r\n\r\n🔹6/13(六)\r\n🔹梯次：14:00~16:30\r\n🔹費用 ：NT800 / 人\r\n🔹年齡：5歲以上喜歡森林的大小朋友們\r\n🔹費用：包含\r\n＋ 課程裡的工具使用／師資／花器／植物花材 /香氛費用\r\n＋ 生動有趣的香草導覽 / 現場採集\r\n＋ 香草飲品\r\n＋ 森林咖啡館午茶 (甜點組合*1、飲品*1)\r\n\r\n\r\n', '活動行程   14:00~16:30\r\n1400-1410	集合 | 緩心聞香、入森林\r\n1410-1440	導覽 | 認識森林、香草導覽\r\n1440-1500	迎賓 | 沏一壺手摘香草茶，讓這一刻慢下來\r\n1500-1600	手作 | 紫色夢境花圈手作體驗、香氛體驗\r\n1600-1630	野午茶 | 一起品味好吃的午茶吧\r\n\r\n森林即將迎來初夏，屬於夏天的花也登場亮相，美麗動人的繡球花便在此時悄然綻放，一顆顆五顏六色的花朵聚集，成為夏天必賞花海，在浪漫的繡球花丘裡，給自己一個花草時間享受悠閒時光吧。\r\n\r\n森林團隊為旅人打造，彷彿置身紫色夢境的花藝作品。課程中將提供不同的乾燥花材與園區內採集的自然素材，一起從自然中擷取元素，將這些祝福都作成花圈。\r\n\r\n課程中將提供不同花材讓學員選擇自己喜歡的韻味花材，並可以搭配不同的心儀氣味，當一回小小調香師，組合成一組初夏粉嫩系的香氛花圈。\r\n\r\n享受與植物、香氛相伴的小日子😋', 0),
(5, 3, 'FE20210529', 6, 'https://youtu.be/PygKllQxP-U', '森林探索家．來一趟自然的探索', '2021-04-29', '14:00:00', 400, '今年的暑假，來薰衣草森林成為探索家吧。在海拔 700公尺的香草園與森林內，發掘平常不會注意到的事物；增加對這片土地的認識。一起探險、探索未知的世界。', '探索家的報名資訊&任務', '🔹梯次：每週六、日\r\n🔹時間：下午14:00-16:00\r\n🔹年齡：5歲以上喜歡森林的大小朋友們\r\n🔹費用：400元/人，現場報名、線上報名\r\n🔹集合地點：紫丘\r\n🔹活動內容：入園費、入山儀式、森林導覽、森林探索包租借費、手工餅乾、水果氣泡水、植物創作、結業證書\r\n', '\r\n👀來看看探索家要做什麼吧\r\na. 進入山之前，來一場入山儀式\r\nb. 讓探索小隊長帶你認識神秘的動植物、聽樹的聲音\r\nc. 摘取自己喜愛的香草植物來製作美味的水果氣泡水與手工餅乾\r\nd. 用大自然的產物創作獨一無二的作品，並獲頒結業證書\r\ne. 來一場結業式~感謝山所帶給你的勇氣\r\n\r\n\r\n⛔成為探索家的注意事項\r\na. 為維護活動品質，本活動5人成團，上限20人。若因未達開團人數，導致無法成團體驗，將協助併團或全額退款，謝謝。\r\nb. 如需退票請於活動結束前3日辦理，逾期恕不受理，並酌收票價10%退票手續費。\r\nc. 基於安全考量請穿適宜走路之球鞋、長褲。請勿穿高跟鞋、夾腳拖鞋或露趾涼鞋。\r\nd. 本活動包含入園門票150元，森林秘境探險導覽，水果氣泡水手作課程乙次，手工餅乾手作課程乙次，植物創作以及探索家結業證書。', 0),
(6, 3, 'FE20210529', 6, 'https://youtu.be/PygKllQxP-U', '森林探索家．來一趟自然的探索', '2021-08-29', '14:00:00', 400, '今年的暑假，來薰衣草森林成為探索家吧。在海拔 700公尺的香草園與森林內，發掘平常不會注意到的事物；增加對這片土地的認識。一起探險、探索未知的世界。', '探索家的報名資訊&任務', '🔹梯次：每週六、日\r\n🔹時間：下午14:00-16:00\r\n🔹年齡：5歲以上喜歡森林的大小朋友們\r\n🔹費用：400元/人，現場報名、線上報名\r\n🔹集合地點：紫丘\r\n🔹活動內容：入園費、入山儀式、森林導覽、森林探索包租借費、手工餅乾、水果氣泡水、植物創作、結業證書\r\n', '\r\n👀來看看探索家要做什麼吧\r\na. 進入山之前，來一場入山儀式\r\nb. 讓探索小隊長帶你認識神秘的動植物、聽樹的聲音\r\nc. 摘取自己喜愛的香草植物來製作美味的水果氣泡水與手工餅乾\r\nd. 用大自然的產物創作獨一無二的作品，並獲頒結業證書\r\ne. 來一場結業式~感謝山所帶給你的勇氣\r\n\r\n\r\n⛔成為探索家的注意事項\r\na. 為維護活動品質，本活動5人成團，上限20人。若因未達開團人數，導致無法成團體驗，將協助併團或全額退款，謝謝。\r\nb. 如需退票請於活動結束前3日辦理，逾期恕不受理，並酌收票價10%退票手續費。\r\nc. 基於安全考量請穿適宜走路之球鞋、長褲。請勿穿高跟鞋、夾腳拖鞋或露趾涼鞋。\r\nd. 本活動包含入園門票150元，森林秘境探險導覽，水果氣泡水手作課程乙次，手工餅乾手作課程乙次，植物創作以及探索家結業證書。', 0);

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
  `email` varchar(100) NOT NULL,
  `email_2nd` varchar(100) DEFAULT NULL,
  `fullname` varchar(10) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `mobile` varchar(50) DEFAULT NULL,
  `zipcode` varchar(5) DEFAULT NULL,
  `city` varchar(10) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `hash` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `members`
--

INSERT INTO `members` (`id`, `email`, `email_2nd`, `fullname`, `birthday`, `mobile`, `zipcode`, `city`, `address`, `hash`, `created_at`) VALUES
(20, 'peiching46@gmail.com', 'peggy@gmail.com', '陳小桔', '2021-04-01', '090993777', '234', '新北市', '永和區', '$2y$10$aEWE4Ck0wTK0SsMgCOlrReDkRR.QMgN4EzhEskXnYrt6.JOBiiWRS', '2021-05-15 23:48:37'),
(21, 'user22@mail.com', '', 'test', '2021-05-20', '1112', '123', 'ci', 'add', '$2y$10$tkwWzIUmhs3qvVChRVWSiOyoC4xxZ2lS0H9pie5upSKMJQeI.jBgS', '2021-05-16 19:18:03');

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
(1, 3, 1, 400, 4, '2021-05-29 14:00:00'),
(2, 4, 2, 800, 1, '2021-05-30 18:00:00'),
(3, 7, 1, 400, 4, '2021-05-29 14:00:00'),
(4, 8, 2, 800, 1, '2021-05-30 18:00:00'),
(5, 11, 1, 400, 4, '2021-05-29 14:00:00'),
(6, 12, 2, 800, 1, '2021-05-30 18:00:00'),
(7, 15, 1, 400, 4, '2021-05-29 14:00:00'),
(8, 16, 2, 800, 1, '2021-05-30 18:00:00'),
(9, 19, 1, 400, 4, '2021-05-29 14:00:00'),
(10, 20, 2, 800, 1, '2021-05-30 18:00:00');

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
(1, 1, 'restaurant'),
(2, 1, 'restaurant'),
(3, 1, 'event'),
(4, 1, 'event'),
(5, 2, 'restaurant'),
(6, 2, 'restaurant'),
(7, 2, 'event'),
(8, 2, 'event'),
(9, 3, 'restaurant'),
(10, 3, 'restaurant'),
(11, 3, 'event'),
(12, 3, 'event'),
(13, 114, 'restaurant'),
(14, 114, 'restaurant'),
(15, 114, 'event'),
(16, 114, 'event'),
(17, 115, 'restaurant'),
(18, 115, 'restaurant'),
(19, 115, 'event'),
(20, 115, 'event');

-- --------------------------------------------------------

--
-- 資料表結構 `order_restaurant`
--

CREATE TABLE `order_restaurant` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `table_id` int(11) NOT NULL,
  `order_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `order_restaurant`
--

INSERT INTO `order_restaurant` (`id`, `item_id`, `table_id`, `order_datetime`) VALUES
(1, 1, 10, '2021-05-06 14:00:00'),
(2, 1, 12, '2021-05-06 14:00:00'),
(3, 1, 15, '2021-05-06 14:00:00'),
(4, 2, 11, '2021-05-14 10:00:00'),
(5, 2, 18, '2021-05-14 10:00:00'),
(6, 2, 20, '2021-05-14 10:00:00'),
(7, 5, 10, '2021-05-06 14:00:00'),
(8, 5, 12, '2021-05-06 14:00:00'),
(9, 5, 15, '2021-05-06 14:00:00'),
(10, 6, 11, '2021-05-14 10:00:00'),
(11, 6, 18, '2021-05-14 10:00:00'),
(12, 6, 20, '2021-05-14 10:00:00'),
(13, 9, 10, '2021-05-06 14:00:00'),
(14, 9, 12, '2021-05-06 14:00:00'),
(15, 9, 15, '2021-05-06 14:00:00'),
(16, 10, 11, '2021-05-14 10:00:00'),
(17, 10, 18, '2021-05-14 10:00:00'),
(18, 10, 20, '2021-05-14 10:00:00'),
(19, 13, 10, '2021-05-06 14:00:00'),
(20, 13, 12, '2021-05-06 14:00:00'),
(21, 13, 15, '2021-05-06 14:00:00'),
(22, 14, 11, '2021-05-14 10:00:00'),
(23, 14, 18, '2021-05-14 10:00:00'),
(24, 14, 20, '2021-05-14 10:00:00'),
(25, 17, 10, '2021-05-06 14:00:00'),
(26, 17, 12, '2021-05-06 14:00:00'),
(27, 17, 15, '2021-05-06 14:00:00'),
(28, 18, 11, '2021-05-14 10:00:00'),
(29, 18, 18, '2021-05-14 10:00:00'),
(30, 18, 20, '2021-05-14 10:00:00');

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
(1, 'c1', 4, '靠窗桌位'),
(2, 'b2', 2, '中間桌位'),
(3, 'c3', 4, ''),
(4, 'c4', 4, ''),
(5, 'c5', 4, ''),
(6, 'b6', 2, ''),
(7, 'b7', 2, ''),
(8, 'b8', 2, ''),
(9, 'b9', 2, ''),
(10, 'd10', 6, ''),
(11, 'd11', 6, ''),
(12, 'c12', 4, ''),
(13, 'd13', 6, ''),
(14, 'a14', 1, ''),
(15, 'a15', 1, ''),
(16, 'a16', 1, ''),
(17, 'a17', 1, ''),
(18, 'a18', 1, ''),
(19, 'a19', 1, ''),
(20, 'd20', 6, ''),
(21, 'c21', 4, ''),
(22, 'a22', 1, ''),
(23, 'b23', 2, ''),
(24, 'c24', 4, ''),
(25, 'c25', 4, ''),
(28, 'c26', 4, '');

-- --------------------------------------------------------

--
-- 資料表結構 `sales_order`
--

CREATE TABLE `sales_order` (
  `id` int(11) NOT NULL,
  `order_id` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `create_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `sales_order`
--

INSERT INTO `sales_order` (`id`, `order_id`, `user_id`, `price`, `status`, `create_datetime`) VALUES
(1, '0', 21, 0, '已付款', '2021-05-18 23:59:59'),
(2, '0', 21, 0, '已付款', '2021-05-18 21:01:38'),
(113, '0', 21, 2400, '已付款', '2021-05-18 22:01:33'),
(114, '202105180114', 21, 2400, '已付款', '2021-05-18 22:19:06'),
(115, '202105180115', 21, 2400, '已付款', '2021-05-18 22:25:10');

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
(15, 21, 'event', 1),
(16, 21, 'event', 2),
(17, 21, 'event', 3);

--
-- 已傾印資料表的索引
--

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
-- 資料表索引 `wish_list`
--
ALTER TABLE `wish_list`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

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
-- 使用資料表自動遞增(AUTO_INCREMENT) `index`
--
ALTER TABLE `index`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `order_event`
--
ALTER TABLE `order_event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `order_item`
--
ALTER TABLE `order_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `order_restaurant`
--
ALTER TABLE `order_restaurant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `sales_order`
--
ALTER TABLE `sales_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `wish_list`
--
ALTER TABLE `wish_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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
