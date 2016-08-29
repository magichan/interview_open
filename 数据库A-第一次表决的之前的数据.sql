-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2015-11-14 01:14:23
-- 服务器版本: 5.5.44-0ubuntu0.14.04.1
-- PHP 版本: 5.5.9-1ubuntu4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `interview`
--

-- --------------------------------------------------------

--
-- 表的结构 `interview`
--

CREATE TABLE IF NOT EXISTS `interview` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `player_id` int(11) NOT NULL,
  `judge_id` int(11) DEFAULT '0',
  `interview_status` varchar(45) NOT NULL,
  `group_attitude` int(11) DEFAULT '0',
  `interview_attitude` int(11) DEFAULT '0',
  `life_attitude` int(11) DEFAULT '0',
  `base_knowledge` int(11) DEFAULT '0',
  `direction_knowledge` int(11) DEFAULT '0',
  `comment` varchar(200) DEFAULT NULL,
  `score` float DEFAULT '0',
  `flag` varchar(100) DEFAULT NULL COMMENT '用于插入后，返回 找到 id ',
  PRIMARY KEY (`id`),
  KEY `fk_interview_player1_idx` (`player_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=84 ;

--
-- 转存表中的数据 `interview`
--

INSERT INTO `interview` (`id`, `player_id`, `judge_id`, `interview_status`, `group_attitude`, `interview_attitude`, `life_attitude`, `base_knowledge`, `direction_knowledge`, `comment`, `score`, `flag`) VALUES
(45, 152, 27, '5', 10, 10, 10, 10, 10, '基础很扎实，接触方向很多，动手和实践能力很强。', 49, '1521447410478'),
(46, 15, 23, '5', 10, 8, 10, 7, 10, '态度端正，C语言基础良好，课内知识扎实，但是没有深入了解', 45, '151447411401'),
(47, 19, 22, '5', 10, 9, 10, 9, 10, '做的都能讲出来， 90%都能理解内部机制，很不错，对大一来说我非常满意。小缺点就是：很难的题他说研究过但是没有搞懂，卷子上一点没有动笔。', 48, '191447412031'),
(48, 24, 25, '5', 10, 8, 10, 6, 10, '计算机知识，仅限于计导书。\r\n自学能力一般。\r\nc语言知识较差。\r\n表达能力一般。', 44, '241447412079'),
(49, 22, 24, '5', 10, 8, 10, 7, 10, '', 45, '221447412100'),
(50, 3, 26, '5', 10, 8, 10, 9, 10, '态度认真，基础较扎实', 47, '31447412144'),
(51, 4, 27, '5', 10, 9, 10, 8, 10, '基础较好，态度较好，安全附加题做到“显示图片”。', 47, '41447412362'),
(52, 152, 22, '8', 10, 10, 10, 10, 10, '没的说 太刁了。。。', 49, '1521447412522'),
(53, 19, 26, '8', 10, 9, 10, 7, 10, '面试态度良好，基础知识需要巩固', 46, '191447412978'),
(54, 15, 24, '8', 10, 7, 10, 6, 10, '态度诚恳，但是对C语言理解较浅，头脑不够灵活', 43, '151447413167'),
(55, 3, 23, '8', 10, 8, 10, 7, 10, '态度端正，基础不是很扎实，课外一般', 45, '31447413349'),
(56, 22, 27, '8', 10, 8, 10, 7, 10, '态度一般，所学知识仅限课本之内，潜力不大。', 44.5, '221447413526'),
(57, 6, 24, '4', 0, 0, 0, 0, 0, '', 0, '61447413821'),
(58, 4, 22, '8', 10, 8, 10, 8, 10, '前面题做的一般，后面的难题理解比较深，对大一而言我觉得很意外。', 46.8, '41447413878'),
(59, 24, 26, '8', 10, 7, 10, 6, 10, '课本知识理解不深，基本的知识不了解！', 43, '241447414556'),
(60, 25, 24, '5', 10, 8, 10, 7, 10, '对于C语言有基本的认识，但是，对于大二的学生来说基础知识还是比较薄弱的。', 44.5, '251447414720'),
(61, 16, 25, '5', 10, 10, 10, 5, 10, 'c知其然不知其所以然。', 45, '161447415161'),
(62, 17, 28, '5', 8, 6, 6, 3, 3, '面试时没有按规定带上自己作品，个人技能不好判断。\r\n有一定的基础，但是方向不太明确。', 26, '171447415201'),
(63, 25, 22, '8', 10, 9, 10, 9, 10, '大二的，有方向，学过一个月web，有明确方向，有一定linux基础。我个人不想卡这种学生，后期讨论吧。', 47, '251447415755'),
(64, 16, 27, '8', 10, 9, 10, 8, 10, '态度很认真，学霸类型，但探索能力一般。', 47, '161447416262'),
(65, 20, 25, '5', 10, 10, 10, 7, 10, '自学能力较强，逻辑表达清楚。\r\n自学C。', 47, '201447417063'),
(66, 29, 26, '5', 10, 7, 10, 5, 10, '', 42, '291447417092'),
(67, 27, 22, '5', 10, 10, 10, 8, 10, '软件专业，0基础，我认为她学的挺好的，态度很好，确实学了，虽然有的题抓不到考点，但可以看出她努力学过，我觉得很好。所以态度分高，基础分低。', 47.3, '271447417122'),
(68, 26, 24, '5', 10, 9, 10, 9, 10, '基础知识比较扎实，附加题做到第四步，对基本web安全常识有了解，还可以~\r\n·', 48, '261447417245'),
(69, 30, 23, '5', 10, 8, 10, 7, 10, 'c语言基础不是很好，课外知识无', 44.8, '301447417270'),
(70, 32, 27, '5', 10, 9, 10, 9, 10, '基础一般，方向知识没有。', 47, '321447417423'),
(71, 54, 25, '5', 10, 9, 10, 6, 10, '自学能力一般。\r\nC一般。\r\n理解能力一般。', 45, '541447417770'),
(72, 33, 27, '5', 10, 9, 10, 9, 10, '课外知识基础稍好，接触过Linux。', 47.5, '331447417796'),
(73, 31, 28, '5', 5, 8, 8, 3, 3, '有一定基础，但是方向不太明确。\r\n态度积极，虽然没有按规定带上自己作品，但是能够自信给我们展示自己的经历。', 27, '311447417837'),
(74, 17, 28, '7', 0, 0, 0, 0, 0, '', 0, '171447417845'),
(75, 20, 22, '8', 10, 10, 10, 8, 10, '软件专业，没有基础，没有编译过代码，能力所及范围都做到了最好，以前接触过“hello world”。', 47.5, '201447418083'),
(76, 27, 24, '8', 10, 7, 10, 7, 10, '基础知识比较薄弱，但是学习态度认真。', 44, '271447418204'),
(77, 26, 26, '8', 10, 8, 10, 7, 10, '大二，c语言基础知识薄弱，安全知识有了解', 45, '261447418210'),
(78, 29, 24, '8', 10, 7, 10, 6, 10, '软工专业，没学过C，基础知识一般，对题目理解不够深刻。', 43, '291447418464'),
(79, 32, 22, '7', 0, 0, 0, 0, 0, '', 0, '321447418935'),
(80, 31, 28, '7', 0, 0, 0, 0, 0, '', 0, '311447419108'),
(81, 54, 24, '8', 10, 7, 10, 5, 10, '基础知识薄弱，不会写代码。但是态度还算认真。', 42, '541447419363'),
(82, 30, 25, '8', 10, 6, 10, 7, 10, 'C理解程度不深。\r\n语言表达能力一般。\r\nC语言编程还行。', 42.5, '301447419898'),
(83, 33, 22, '8', 10, 9, 10, 9, 10, '说的流畅，不是照着念，玩过虚拟机，有安全方面的经历，玩过超频cpu，了解BIOS，装系统什么的。忘记问附加题的东西了，二面时记得问一下。', 47, '331447420354');

-- --------------------------------------------------------

--
-- 表的结构 `judge`
--

CREATE TABLE IF NOT EXISTS `judge` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `direction` int(11) NOT NULL COMMENT '1 安全组\n2 web\n3  技术运营',
  `member_id` int(11) DEFAULT NULL COMMENT '0 为队长权限\n其它为队员\n',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;

--
-- 转存表中的数据 `judge`
--

INSERT INTO `judge` (`id`, `name`, `password`, `direction`, `member_id`) VALUES
(17, 'root', 'Aj5hCO', 0, 0),
(18, 'guest_safe', 'guest_safe', 1, 1),
(19, 'guest_web', 'guest_web', 2, 1),
(20, 'guest_operate', 'guest_operate', 3, 1),
(21, 'guest_art', 'guest_art', 4, 1),
(22, 'gushitao', 'gushitao', 5, 1),
(23, 'zhangyukun', 'zhangyukun', 5, 2),
(24, 'liyuchen', 'liyuchen', 5, 3),
(25, 'yangshaokang', 'yangshaokang', 5, 4),
(26, 'hanqiang', 'hanqiang', 5, 5),
(27, 'baimengyi', 'baimengyi', 5, 6),
(28, 'yechunfeng', 'yechunfeng', 5, 7);

-- --------------------------------------------------------

--
-- 表的结构 `notice`
--

CREATE TABLE IF NOT EXISTS `notice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` varchar(45) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `judge` varchar(45) DEFAULT NULL,
  `direction` int(11) DEFAULT NULL,
  `message` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=161 ;

-- --------------------------------------------------------

--
-- 表的结构 `player`
--

CREATE TABLE IF NOT EXISTS `player` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `gender` varchar(13) NOT NULL COMMENT '性别',
  `student_id` varchar(45) NOT NULL,
  `grade` varchar(45) NOT NULL,
  `class` varchar(45) NOT NULL,
  `tel` varchar(45) NOT NULL,
  `direction` int(11) NOT NULL COMMENT '\n1 安全组\n2 web\n3  技术运营\n4  视觉设计组',
  `status` int(11) NOT NULL COMMENT '1  报名 2 签到  3 一面一等待 4 一面一进行 5 一面一结束 6 一面二等待 7 一面二进行 8 一面结束 9  二面等待 10 二面进行 11 二面结束 12 一面通过 13 一面未通过 14 二面通过 15 二面未通过',
  PRIMARY KEY (`id`),
  UNIQUE KEY `studentid_UNIQUE` (`student_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=240 ;

--
-- 转存表中的数据 `player`
--

INSERT INTO `player` (`id`, `name`, `gender`, `student_id`, `grade`, `class`, `tel`, `direction`, `status`) VALUES
(1, '张伟男', '男', '04151007', '15', '计科1501', '18792978681', 2, 1),
(3, '康艺杰', '男', '04151081', '15', '计科1503', '18829225473', 1, 8),
(4, '谢子琦', '男', '04151082', '15', '计科1503', '18302900103', 1, 8),
(5, '张士纪', '男', '06153079', '15', '智能科学与技术', '18291996228', 3, 1),
(6, '宋晓亮', '男', '04142071', '14', '网络1402', '15114875658', 1, 4),
(7, '谢佳林', '男', '03143082', '14', '安全 1403', '15809185017', 1, 1),
(8, '董迪迪', '女', '04151101', '15', '计科1503', '13032948120', 2, 1),
(9, '郭吉航', '男', '04152119', '15', '网络工程1504', '15691790557', 1, 1),
(11, '王养龙', '男', '04151124', '15', '计科1504', '18791029971', 3, 1),
(12, '宋佳欢', '女', '04151031', '15', '计科1501', '18829075852', 1, 1),
(13, '李鑫', '女', '04153129', '15', '软件1504', '18829488562', 3, 1),
(14, '王珂', '女', '04153135', '15', '软件1504', '18392402756', 2, 1),
(15, '李旭东', '男', '05156083', '15', '电路1503', '18829537003', 1, 8),
(16, '张雪', '女', '04152099', '15', '网络工程1503班', '15691788837', 2, 8),
(17, '郭星', '女', '04152100', '15', '网络1503', '18700958572', 4, 7),
(18, '张雯', '女', '04151097', '15', '计科1503', '13572258635', 1, 1),
(19, '王嘉盛', '男', '04152036', '15', '网工 1502', '13379180364', 3, 8),
(20, '邹丹阳', '女', '04153064', '15', '软工1502', '13832967424', 1, 8),
(21, '贺远', '男', '04151154', '15', '计科1505', '18829077099', 3, 1),
(22, '惠浩浩', '男', '04152106', '15', '网工1504', '18291965411', 1, 8),
(23, '王虎生', '男', '04151003', '15', '计科1501', '18992533426', 1, 1),
(24, '王晨阳', '男', '04152038', '15', '网工1502', '18706746187', 3, 8),
(25, '汪義航', '男', '04142131', '14', '网工1404', '15667023869', 2, 8),
(26, '祝荣吉', '男', '04142036', '14', '网络1401', '18691689162', 1, 8),
(27, '张园园', '女', '04153066', '15', '软件1502', '15991032074', 1, 8),
(28, '郝玉亮', '男', '04151004', '15', '计科1501', '18092016683', 2, 1),
(29, '王怡凡', '女', '04153067', '15', '软工', '15929243619', 3, 8),
(30, '李诚', '男', '04151092', '15', '计科 1503', '18829211951', 1, 8),
(31, '韩小丽', '女', '06142126', '14', '测控1404', '15809279049', 4, 7),
(32, '康茜', '男', '04152087', '15', '网工1503', '18829215673', 3, 7),
(33, '蒙祺殷', '男', '04152019', '15', '网工1501', '18629474996', 1, 8),
(34, '林浩', '男', '04142130', '14', '网络工程', '15091762986', 3, 1),
(35, '孙艺闻', '男', '04151143', '15', '计科1505', '18646719181', 3, 1),
(36, '毛潇一', '男', '04152020', '15', '网工1501', '15129281407', 1, 1),
(37, '郭美花', '女', '04153065', '15', '软件1502', '13474047548', 2, 1),
(38, '刘林炫', '男', '04151010', '15', '计科1501', '18392985029', 1, 1),
(39, '薛晓龙', '男', '04152122', '15', '网工 1504', '18710313978', 3, 1),
(40, '黄海军', '男', '04151001', '15', '计科1501', '13032955934', 4, 1),
(41, '胡代旺', '男', '04151144', '15', '计科1505', '18829075679', 3, 1),
(42, '王斌', '男', '04151147', '15', '计科1505', '18829210482', 2, 1),
(43, '薛玉锋', '男', '04151146', '15', '计科1505', '18829210417', 2, 1),
(44, '张坤', '男', '04152121', '15', '网工 1504', '18829076249', 1, 1),
(45, '肖赞', '男', '04143155', '14', '软件1405', '15109117545', 2, 1),
(46, '陈浩男', '男', '04151012', '15', '计科1501', '13201843719', 1, 1),
(47, '苏亨', '男', '04151145', '15', '计科1505', '13572136479', 1, 1),
(48, '兰松', '男', '04152035', '15', '网工1502', '15339180559', 1, 1),
(49, '郑英才', '男', '04152103', '15', '网工1504', '13032961394', 4, 1),
(50, '侯博程', '男', '04151148', '15', '计科1505', '18892036424', 3, 1),
(51, '杨锐夫', '男', '04151087', '15', '计科1503', '15383963386', 3, 1),
(52, '刘树彬', '男', '04152013', '15', '网络 1501', '18829596274', 1, 1),
(53, '潘淳', '女', '04152098', '15', '网工1503', '18829077344', 1, 1),
(54, '姜浩', '女', '04152097', '15', '网工1503', '18829522964', 2, 8),
(55, '赵成杰', '男', '04151057', '15', '计科1502', '18829077079', 3, 1),
(56, '刘昱', '男', '04151055', '15', '计科1502', '18729069908', 3, 1),
(57, '马旭东', '男', '04152102', '15', '网络工程1504', '13032950174', 3, 1),
(58, '杨佳源', '男', '03142042', '14', '电科1402', '15829058896', 2, 1),
(59, '赵文磊', '男', '04151011', '15', '计科1501', '18629032169', 3, 1),
(60, '李春欣', '女', '04153131', '15', '软工1504', '18392418781', 1, 1),
(61, '侯杏林', '男', '04142120', '15', '网络1404', '15091335509', 2, 1),
(62, '王晨锡', '男', '04152009', '15', '网工1501', '18829536871', 1, 1),
(63, '朱东辉', '男', '05141102', '14', '电子1403', '15091755931', 3, 1),
(64, '丹炳阳', '男', '04152014', '15', '网络1501', '13032956934', 4, 1),
(65, '郑凯东', '男', '06153048', '15', '智能1502', '13389263986', 3, 1),
(66, '冯鑫', '男', '04151054', '15', '计科1502', '18829536866', 3, 1),
(67, '冯志学', '男', '05141073', '14', '电子1402', '13469679430', 2, 1),
(68, '张子涵', '男', '04152008', '15', '网络1501', '18743245889', 1, 1),
(69, '刘磊', '男', '04151085', '15', '计科1503', '18791799685', 1, 1),
(70, '高辉', '女', '04142073', '14', '网络1403', '15829041778', 2, 1),
(71, '张豪杰', '男', '06153071', '15', '智能1502', '13201629005', 1, 1),
(72, '云文瑞', '男', '04151090', '15', '计科1503', '18829533194', 3, 1),
(73, '刘恒', '男', '04142132', '14', '网络 1404', '15802991581', 1, 1),
(74, '魏瑶', '女', '04152067', '15', '网工1502', '15691768158', 4, 1),
(75, '祝文斌', '男', '04152007', '15', '网工1501', '15529343238', 3, 1),
(76, '陈家兴', '男', '04152002', '15', '网络工程', '13032949986', 3, 1),
(77, '魏新超', '男', '04151091', '15', '计科1503', '18829592803', 1, 1),
(78, '李浩天', '男', '04151109', '15', '计科1504', '13032966154', 3, 1),
(79, '张耀', '男', '04142101', '14', '网络1403', '15109111861', 1, 1),
(80, '张皓羽', '男', '04152037', '15', '网工1502', '15891767238', 3, 1),
(81, '孙美鑫', '女', '04153098', '15', '软工1503', '18829591908', 2, 1),
(82, '谢昂', '男', '04151043', '15', '计科1502', '13572480611', 1, 1),
(83, '蒲家旺', '男', '04153070', '15', '软工1503', '15529343250', 3, 1),
(84, '丁庭斌', '男', '06144112', '15', '电气1504', '18829523906', 1, 1),
(85, '张昕乐', '男', '04153072', '15', '软工1503', '18829076495', 3, 1),
(86, '刘洪源', '男', '04151070', '15', '计科 1503', '13032959449', 4, 1),
(87, '许栋', '男', '04153071', '15', '软工 1503', '15691786535', 3, 1),
(88, '董恒毅', '男', '04151040', '15', '计科1502', '13484629693', 3, 1),
(89, '王涛', '男', '06154130', '15', '电气1504', '18792755632', 1, 1),
(90, '张琪', '男', '04152049', '15', '网工1502', '18829536870', 3, 1),
(91, '柴沣伟', '男', '03143015', '14', '信息安全1401', '15829307602', 1, 1),
(92, '马瑞', '男', '04152048', '15', '网工1502', '18829075781', 3, 1),
(93, '董青', '女', '04152091', '15', '网工1503', '18791097523', 2, 1),
(94, '王丹丹', '女', '04152094', '15', '网工1503', '13032949695', 3, 1),
(95, '肖康', '男', '06143059', '14', '智能1402', '15667025295', 1, 1),
(96, '小圆天然聪明', '女', '04142083', '15', '网络1503', '18629486118', 4, 1),
(97, '李志恒', '男', '04153069', '15', '软工1503', '15529343050', 4, 1),
(98, '董青', '女', '04152017', '15', '网工1503', '18791097523', 2, 1),
(99, '崔一诺', '女', '04152092', '15', '网络1503', '15291800377', 2, 1),
(100, '屈琅', '男', '04151046', '15', '计科1502', '15209229064', 1, 1),
(101, '吴均斌', '男', '04151014', '15', '计科1501', '18049218002', 3, 1),
(102, '姚怡', '女', '04143111', '14', '软件1404', '15802929083', 2, 1),
(103, '王清椿', '男', '03141361', '14', '通工1412', '13152471878', 2, 1),
(104, '谭小曼', '男', '04152107', '15', '网工1504', '15691786390', 2, 1),
(105, '谷仕涛', '男', '04131040', '13', '计科1302', '13259438581', 3, 1),
(106, '施宇轩', '男', '04152011', '15', '网工1501', '13096928688', 3, 1),
(107, '张帆', '女', '04153125', '15', '软件1504', '18829571810', 1, 1),
(108, '刘松松', '男', '04151140', '15', '计科1505', '18829076265', 3, 1),
(109, '夏雨', '女', '03144063', '14', '计算机科学与技术', '15829294245', 2, 1),
(110, '项维维', '男', '05151001', '15', '电子1501', '18992534454', 3, 1),
(111, '高宝', '男', '04152105', '15', '网络工程1504', '18706885805', 4, 1),
(112, '王佩', '女', '04143114', '14', '软工1404', '18209183861', 2, 1),
(113, '曹有明', '男', '04152116', '15', '网络1504', '18729157650', 2, 1),
(114, '郭春旭', '女', '03141023', '14', '通工1401', '15802992144', 3, 1),
(115, '杨凯', '男', '04151045', '15', '计科1502', '13488103439', 2, 1),
(116, '李蓉', '女', '04153099', '15', '软件1503', '18829596942', 2, 1),
(117, '扈衍', '女', '04153101', '15', '软工1503', '18892084406', 1, 1),
(118, '殷鑫', '男', '04142054', '14', '网络 1402', '18309244956', 3, 1),
(119, '关佩红', '女', '03141021', '14', '通工1401', '13519128114', 3, 1),
(120, '张浩', '男', '04152072', '15', '网工 1503', '15691788231', 3, 1),
(121, '林森', '男', '04151188', '15', '计科1506', '18829488819', 3, 1),
(122, '徐雪', '女', '04153128', '15', '软工1504', '13679270934', 3, 1),
(123, '尤毛毛', '男', '04151042', '15', '计科1502', '18182636869', 2, 1),
(124, '吴云鹏', '男', '04151053', '15', '计科1502', '18829225144', 2, 1),
(125, '马鑫涛', '男', '06154109', '15', '电气1504', '18892033203', 1, 1),
(126, '陈普钦', '男', '04151008', '15', '计科501', '15529342886', 2, 1),
(127, '张丹', '女', '04152101', '15', '网工1503', '15529243976', 1, 1),
(128, '马登云', '男', '04143062', '14', '软件1402', '15667022091', 3, 1),
(129, '李一斐', '女', '04153100', '15', '软工 1503', '18829076013', 1, 1),
(130, '李刚', '男', '03142011', '14', '电科1401', '15667026891', 2, 1),
(131, '锁易昕', '男', '05156074', '15', '电路1503', '18209264071', 1, 1),
(132, '梁椰舷', '女', '04152095', '15', '网络1503', '13032961649', 1, 1),
(133, '祝兴华', '男', '05156106', '15', '电路1504', '18829596908', 1, 1),
(134, '庞千斗', '男', '04151048', '15', '计科1502', '13679138131', 2, 1),
(135, '郭超', '男', '04152085', '15', '网络1503', '18220052953', 1, 1),
(136, '李晨', '男', '05156086', '15', '电路1503', '15029017787', 1, 1),
(137, '张伟', '男', '04151162', '15', '计科1506', '18247546357', 2, 1),
(138, '时柳', '女', '04142007', '14', '网络1401', '15667026387', 2, 1),
(139, '屈伸', '男', '05156096', '15', '电路1503', '18291984330', 1, 1),
(140, '冯佳胜', '男', '03142010', '14', '电科1401', '15802953651', 2, 1),
(141, '师希昊', '男', '04153120', '15', '软工1504', '18829491259', 4, 1),
(142, 'shshsh', '男', '04134567', '15', 'shsh14545', '13245647897', 2, 1),
(143, '王作栋', '男', '04152004', '15', '网络1501', '15529343536', 1, 1),
(144, '马斌', '男', '04152071', '15', '网络 1503', '18829488873', 2, 1),
(145, '王聪', '男', '04152074', '15', '网工1503', '13032961549', 1, 1),
(146, '张凯捷', '男', '04151006', '15', '计科1501', '15399069026', 1, 1),
(147, '吴垚', '男', '04152076', '15', '网工1503', '15291905396', 1, 1),
(148, '张永涛', '男', '04152073', '15', '网工1503', '18892082704', 3, 1),
(149, '张浩东', '男', '03146035', '14', '对抗1402', '15667021719', 1, 1),
(150, '侯晓霞', '女', '04152090', '15', '网工1503', '15691768359', 3, 1),
(151, '宋继鹏', '男', '04142033', '14', '网工1401', '18392059576', 2, 1),
(152, '付世琦', '女', '06153006', '15', '智能1501', '18402954574', 1, 8),
(153, '秦齐', '男', '02142015', '14', '商务1401', '15829304793', 2, 1),
(154, '德玛西亚', '男', '04141122', '15', '计科1407', '13211111111', 1, 1),
(155, '钟嘉豪', '男', '04152112', '15', '网工1504', '18629418276', 2, 1),
(156, '魏甜', '女', '05131164', '13', '电子1305', '18829288663', 2, 1),
(157, '韩伟', '男', '04152086', '15', '网络1503', '18729316001', 1, 1),
(158, '方冉月', '女', '04151098', '15', '计科1503', '13679250578', 2, 1),
(159, '郗宇', '男', '04151076', '15', '计科1503', '13039616375', 3, 1),
(160, '张点', '男', '04141156', '14', '计科1405', '15809299893', 2, 1),
(161, '俞倩', '女', '04151129', '15', '计科1504', '15249048542', 1, 1),
(162, '孙俊', '女', '04151128', '15', '计科1504', '18729585878', 1, 1),
(163, '郄俭', '女', '04151061', '15', '计科1502', '15691768858', 1, 1),
(164, '王蓉', '女', '04151131', '15', '计科  1504', '18791753023', 1, 1),
(165, '张涵', '女', '04152135', '15', '网络1504', '18291993165', 2, 1),
(166, '卢晓东', '男', '04152113', '15', '网工1504', '18829509974', 2, 1),
(167, '郭荣旭', '女', '04151200', '15', '计科1506', '13032957428', 2, 1),
(168, '宁海静', '女', '04153093', '15', '软工1503', '13891099602', 2, 1),
(169, '宋南', '男', '04152109', '15', '网路工程', '15691788332', 2, 1),
(170, '孟德子龙', '男', '04152123', '15', '网络1504', '18829077383', 1, 1),
(171, '宋阳子', '女', '04153166', '15', '软件1505', '15202469052', 4, 1),
(172, '文清', '女', '04151027', '15', '计科1501', '15771726703', 3, 1),
(173, '张皓', '男', '04151876', '15', '网工1503', '15789246874', 2, 1),
(174, '陈征', '男', '05146137', '14', '电路1404', '15667027510', 1, 1),
(175, '张翔', '男', '04152075', '15', '网络1503', '15191961625', 3, 1),
(176, '鲁晨阳', '男', '04152111', '15', '网工1504', '13032948818', 2, 1),
(177, '马小花', '女', '04152034', '15', '网络1501', '18829265844', 1, 1),
(178, '李婷婷', '女', '04143116', '14', '软件1404', '15829348754', 2, 1),
(179, '闫晶', '女', '04152056', '15', '网络工程1502', '13468936258', 1, 1),
(180, '闫晶', '女', '04152856', '15', '网络工程1502', '13468936258', 1, 1),
(181, '赵昱瑾', '男', '03151409', '15', '通工1514', '18092093076', 2, 1),
(182, '韩亦乐', '男', '04153088', '15', '软件工程', '18829533255', 3, 1),
(183, '岳峙君', '女', '04152068', '15', '网络1502', '18700086457', 3, 1),
(184, '车彤', '女', '02155018', '15', '信管1501', '18829071281', 4, 1),
(185, '齐钰', '男', '04151183', '15', '计科1506', '18202912198', 3, 1),
(186, '孙媛', '女', '04151203', '15', '计科1506', '15691788628', 4, 1),
(187, '郑扬', '男', '04152045', '15', '网工1502', '18829489972', 3, 1),
(188, '尚迪', '女', '04152089', '15', '网工1503', '15129952815', 2, 1),
(189, '刘雨皓', '男', '04152081', '15', '网工1503', '13369102058', 2, 1),
(190, '王晨', '男', '04151039', '15', '计科1502', '15191884841', 1, 1),
(191, '芦瑞', '女', '02155017', '15', '信管1501', '18291969805', 2, 1),
(192, '杨芳', '女', '04151026', '15', '计科1501', '18740750175', 3, 1),
(193, '陆威', '男', '04152046', '15', '网络1502', '18892068536', 1, 1),
(194, '李东林', '男', '04151088', '15', '计科1503', '18829599764', 3, 1),
(195, '闫钰晨', '女', '04151059', '15', '计科1502', '18792995582', 3, 1),
(196, '张镇', '男', '06143097', '14', '智能1403', '18066850704', 2, 1),
(197, '宋洁', '男', '03151422', '15', '通工1514', '18829598647', 3, 1),
(198, '李银哲', '女', '04151102', '15', '计科 1503', '13572107351', 2, 1),
(199, '刘鹏', '男', '04142064', '14', '网络1402', '15091898727', 1, 1),
(200, '段雪', '女', '04143008', '14', '软件1401', '15809183506', 2, 1),
(201, '豆青', '女', '04143045', '14', '软件1402', '15829258737', 2, 1),
(202, '段杰', '男', '04151037', '15', '计科1502', '18191255936', 2, 1),
(203, '李云侠', '女', '03147033', '14', '物联网工程1401', '15829245052', 2, 1),
(204, '胡新宇', '男', '04153149', '15', '软工1505', '18966997157', 1, 1),
(205, '舒聪', '女', '04153068', '15', '软工1502', '18700023087', 4, 1),
(206, '韩智杰', '男', '04151190', '15', '计科', '18602960397', 3, 1),
(207, '王佶', '男', '04152082', '15', '网工1503', '18220684201', 3, 1),
(208, '董大海', '男', '04152083', '15', '网工', '18829224828', 3, 1),
(209, '陈琪', '男', '04152084', '15', '网工1503', '15229706761', 3, 1),
(210, '毛甫成', '男', '04151138', '15', '计科1505', '18291979549', 1, 1),
(211, '张文琪', '男', '04152077', '15', '网工1503', '18892080665', 3, 1),
(212, '郭俊楚', '男', '05156124', '15', '电路 1504', '18829523651', 2, 1),
(213, '赵建茸', '女', '04152126', '15', '网络工程1504', '13032950148', 1, 1),
(214, '王婧璟', '女', '04152125', '15', '网络工程1504', '18829571705', 4, 1),
(215, '李慧敏', '女', '04152127', '15', '网络工程1504', '13032961435', 2, 1),
(216, '赵雨涵', '女', '04152130', '15', '网络工程1504', '13032954643', 3, 1),
(217, '王茹', '女', '04152129', '15', '网工1504', '17792050469', 3, 1),
(218, '封雅', '女', '04152128', '15', '网络', '17719734381', 4, 1),
(219, '张靖', '女', '04142080', '14', '网络1403', '15091059038', 3, 1),
(220, '楚东方', '男', '04151189', '15', '计科1506', '18829031821', 2, 1),
(221, '胡明星', '男', '03143013', '14', '安全1401', '15091753972', 1, 1),
(222, '刘坤', '男', '04151086', '15', '计科1503', '15771691752', 2, 1),
(223, '王亮', '男', '04151083', '15', '计科1503', '13992708505', 2, 1),
(224, '周淼', '女', '04151130', '15', '计科1504', '18829508793', 3, 1),
(225, '李珍', '女', '04151132', '15', '计科1504', '18829526213', 1, 1),
(226, '李娇', '女', '04151127', '15', '计科1504', '18291987419', 2, 1),
(227, '张阳阳', '女', '04152062', '15', '网工1502', '18700719960', 2, 1),
(228, '冯春雨', '男', '04151084', '15', '计科1503', '13032959452', 1, 1),
(229, '杨浩博', '男', '04152018', '15', '网工1501', '13379298172', 1, 1),
(230, '丁磊', '男', '03145042', '14', '通工1414', '15332406627', 2, 1),
(232, '刘旭', '男', '04143152', '14', '软件1405', '13324501992', 2, 1),
(233, '杜宇晖', '男', '04143156', '14', '软件1405', '18700023861', 2, 1),
(234, '王小芳', '女', '04152058', '15', '网工1502', '15691786106', 1, 1),
(235, '孙恒康', '男', '03156046', '15', '对抗 1502', '18829489478', 1, 1),
(236, '谢子琦', '男', '04150182', '15', '计科1503', '18302900103', 1, 1),
(237, '段唐奇', '男', '04141166', '14', '计科1405', '15667022370', 2, 1),
(238, '何弘韦', '男', '04153145', '15', '软工1505', '13032961409', 2, 1),
(239, '张璐', '男', '04153117', '15', '软件1504', '15353137170', 2, 1);

--
-- 限制导出的表
--

--
-- 限制表 `interview`
--
ALTER TABLE `interview`
  ADD CONSTRAINT `fk_interview_player1` FOREIGN KEY (`player_id`) REFERENCES `player` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
