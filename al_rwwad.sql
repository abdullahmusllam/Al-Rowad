-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2025 at 09:03 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `al_rwwad`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `token` varchar(50) NOT NULL,
  `student_id` int(20) DEFAULT NULL,
  `role` enum('admin','student') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_danish_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `username`, `password`, `token`, `student_id`, `role`) VALUES
(0, 'al_rowad@gmail.com', 'al_rowad', 'ALR66f4e85b35a5c', 9, 'admin'),
(987654329, '773098320', 'OdYtapeK', '806d28499194f78595da3c6c3e0c4472', 11, 'student'),
(987654330, '774228248', 'FQTttwF0', 'ALR66f8eb5eaa97d', 12, 'student');

-- --------------------------------------------------------

--
-- Table structure for table `activites`
--

CREATE TABLE `activites` (
  `student_id` int(11) NOT NULL,
  `interction` int(11) NOT NULL,
  `Excellence` int(11) NOT NULL,
  `Initiative` int(11) NOT NULL,
  `month` varchar(20) NOT NULL,
  `no_month` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `activites`
--

INSERT INTO `activites` (`student_id`, `interction`, `Excellence`, `Initiative`, `month`, `no_month`) VALUES
(1, 40, 30, 20, 'jan', 1),
(1, 40, 30, 20, 'feb', 2),
(1, 40, 30, 20, 'mar', 3),
(1, 40, 30, 20, 'jan', 1),
(1, 40, 30, 20, 'feb', 2),
(1, 40, 30, 20, 'mar', 3);

-- --------------------------------------------------------

--
-- Table structure for table `applicants`
--

CREATE TABLE `applicants` (
  `applicant_id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `date_of_berth` date DEFAULT NULL,
  `plase_of_berth` varchar(20) NOT NULL,
  `directorate` varchar(20) NOT NULL,
  `area` varchar(20) NOT NULL,
  `current_governorate` varchar(20) NOT NULL,
  `current_directorate` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `whatsapp` varchar(20) NOT NULL,
  `health` varchar(100) NOT NULL,
  `graduate_school` varchar(50) NOT NULL,
  `next_level` varchar(50) NOT NULL,
  `rate` float NOT NULL,
  `guardian_name` varchar(50) NOT NULL,
  `relationship` varchar(20) NOT NULL,
  `guardian_jop` varchar(20) NOT NULL,
  `guardian_phone` varchar(10) NOT NULL,
  `skills` text NOT NULL,
  `achievement` text NOT NULL,
  `reason_join` text DEFAULT NULL,
  `ambition` varchar(100) NOT NULL,
  `school_join` varchar(100) NOT NULL,
  `pass` varchar(15) DEFAULT NULL,
  `registration_date` date NOT NULL,
  `interviewrs_state` enum('','ok','no') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `applicants`
--

INSERT INTO `applicants` (`applicant_id`, `name`, `date_of_berth`, `plase_of_berth`, `directorate`, `area`, `current_governorate`, `current_directorate`, `phone`, `whatsapp`, `health`, `graduate_school`, `next_level`, `rate`, `guardian_name`, `relationship`, `guardian_jop`, `guardian_phone`, `skills`, `achievement`, `reason_join`, `ambition`, `school_join`, `pass`, `registration_date`, `interviewrs_state`) VALUES
(160, 'احمد كرام عيظه ساحب ', '2002-06-25', 'حضرموت', 'تريم', 'مشطه', 'حضرموت', 'مشطه', '774228248', '774228248', 'لا', 'مدرسه الكوده', 'أول ثانوي', 93, 'كرام عيظه ساحب ساحب ', 'أب	', 'عمل خاص', '774228248', 'كره القدم والسباحة  وشاركت في الاذاعه المدرسيه', 'حصلت على شهادة تخرج من مركز القلم النموذجيه', ' لتحسين وتطوير المواهب لدي', ' لتحسين وتطوير المواهب لدي', 'الابداع', 'مقبول', '2024-09-25', 'ok'),
(161, 'احمد حسن احمد علي باعنس', '1999-06-25', 'شبوة	', 'الطلح	', 'لعبل	', 'نواب	', 'الطلح', '773098320	', '773098320	', 'لا', 'عمار بن ياسر', 'التاسع', 81, 'حسن احمد علي باعنس', 'أب', 'مدرس', '773098320', 'قيادة السيارة', 'المشاركة في دورات حظ القران الكريم وعلومه ', 'لمواهب إيجاد التعامل مع الكمبيوتر	المشاركة في دورات حظ القران الكريم وعلومه ', 'ن اخدم بلادي ووطني', 'الابداع', 'مقبول', '2024-09-25', 'ok'),
(162, 'احمد عبده محفوظ بامير', '1999-11-25', 'حضرموت', 'سيؤن', 'الغرفة=الخيام', 'حضرموت', 'الغرفة=الخيام', '778594837', '778594837', 'لا', 'مدرسة الغرفة ', 'التاسع', 88, 'عبده محفوظ خميس بامير', 'أب', 'عمل خاص', '772086343', 'كرة القدم', 'لاشي', 'لمواهب إيجاد التعامل مع الكمبيوتر	المشاركة في دورات حظ القران الكريم وعلومه ', 'أن أكون محاسب ', 'الابداع', 'مقبول', '2024-09-25', 'ok'),
(163, 'احمد عمر صالح باحفي ', '1999-11-25', 'حضرموت', 'حوره', 'وادي العين الورقات', 'حضرموت', 'وادي العين الورقات', '781127167	', '781127167', 'لا', 'مدرسة الغرفة ', 'التاسع', 88, 'عمر صالح محفوظ باحفي ', 'أب', 'عمل خاص', '781127167', 'كرة القدم', 'لاشي', 'لمواهب إيجاد التعامل مع الكمبيوتر	المشاركة في دورات حظ القران الكريم وعلومه ', 'أن أكون محاسب ', 'الابداع', 'مقبول', '2024-09-25', 'no'),
(164, 'احمد فائز با حنتوش', '1999-11-25', 'شبوة', 'دهر	', 'ريحون', 'شبوة', 'دهر', '774053321', '774053321', 'لا', 'مدرسة الغرفة ', 'التاسع', 88, 'فائز احمد فائز با حنتوش', 'أب', 'عمل خاص', '781127177', 'كرة القدم', 'لاشي', 'لمواهب إيجاد التعامل مع الكمبيوتر	المشاركة في دورات حظ القران الكريم وعلومه ', 'أن أكون محاسب ', 'الابداع', '', '2024-09-25', NULL),
(165, 'غبدالله محسن النقيب', '2024-09-11', '', '', '', '', '', '', '713113823', '', '', '', 80, '', '', '', '0', '', '', NULL, '', '', 'مقبول', '0000-00-00', 'ok'),
(169, 'al_rowad@gmail.com', NULL, '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '0', '', '', NULL, '', '', 'مقبول', '0000-00-00', 'ok'),
(170, 'Ahmed Abdullah Sallh Sallh', '2000-01-01', 'Sanaa', 'Sanaa', 'Al-Safia', 'Al-Safia', 'Sanaa City', '771888999', '771888999', 'run', 'Al-Rwad School', '12', 85, 'Ali Abdullah Abdullah Sallh', 'Father', 'Teacher', '771888999', 'Football, Reading', 'Won a science fair', 'To improve my skills', 'Become an engineer', 'Engineering School', '', '2024-09-28', NULL),
(172, 'Ahmed Abdullah salh salm', '2000-01-01', 'Sanaa', 'Sanaa', 'Al-Safia', 'Al-Safia', 'Sanaa City', '771888999', '771888999', 'run', 'Al-Rwad School', '12', 85, 'Ali Abdullah Abdullah Sallh', 'Father', 'Teacher', '771888999', 'Football, Reading', 'Won a science fair', 'To improve my skills', 'Become an engineer', 'Engineering School', '', '2024-09-28', NULL),
(176, 'Ahmed Abdullah salh salms', '2000-01-01', 'Sanaa', 'Sanaa', 'Al-Safia', 'Al-Safia', 'Sanaa City', '771888959', '771888999', 'run', 'Al-Rwad School', '12', 85, 'Ali Abdullah Abdullah Sallh', 'Father', 'Teacher', '771888999', 'Football, Reading', 'Won a science fair', 'To improve my skills', 'Become an engineer', 'Engineering School', '', '2024-09-28', NULL),
(178, 'Ahmed Abdullah salh salmgs', '2000-01-01', 'Sanaa', 'Sanaa', 'Al-Safia', 'Al-Safia', 'Sanaa City', '771888959', '771888999', 'run', 'Al-Rwad School', '12', 85, 'Ali Abdullah Abdullah Sallh', 'Father', 'Teacher', '771888999', 'Football, Reading', 'Won a science fair', 'To improve my skills', 'Become an engineer', 'Engineering School', '', '2024-09-28', NULL),
(180, 'احمد صالح احمد محمد', '2000-01-01', 'اب', 'اب', 'الجبل الاخضر', 'Al-Safia', 'Sanaa City', '771888959', '771888999', 'run', 'Al-Rwad School', '12', 85, 'Ali Abdullah Abdullah Sallh', 'Father', 'Teacher', '771888999', 'Football, Reading', 'Won a science fair', 'To improve my skills', 'Become an engineer', 'Engineering School', '', '2024-09-29', NULL),
(181, 'عبدالله عبدالعزيز عبدالله مسلم', '2025-01-31', 'بءلبء', 'سيبيسب', 'سبس', 'سيبسيب', 'سبث', '777117729', '777117729', 'لا', 'سثبسبل', 'التاسع', 80, 'عبدالعزيز عبدالله سعيد مسلم', 'اب', 'مزارع', '777663459', 'شثب', 'شسثبس', 'سشبيشب', 'شسب', 'الفقيد بن حمدة', NULL, '2025-01-09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `behavior`
--

CREATE TABLE `behavior` (
  `main_prayer` int(11) NOT NULL,
  `main_superrog` int(11) NOT NULL,
  `weklycircle` int(11) NOT NULL,
  `goodbehavior` int(11) NOT NULL,
  `cleanliness` int(11) NOT NULL,
  `look` int(11) NOT NULL,
  `month` varchar(20) NOT NULL,
  `student_id` int(11) NOT NULL,
  `no_month` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `behavior`
--

INSERT INTO `behavior` (`main_prayer`, `main_superrog`, `weklycircle`, `goodbehavior`, `cleanliness`, `look`, `month`, `student_id`, `no_month`) VALUES
(29, 7, 20, 20, 10, 10, 'يناير', 1, 1),
(30, 10, 20, 20, 10, 10, 'feb', 1, 2),
(30, 10, 20, 20, 10, 10, 'mar', 1, 3),
(100, 100, 90, 95, 99, 90, 'aug', 3, 1),
(29, 7, 20, 20, 10, 10, 'يناير', 1, 1),
(30, 10, 20, 20, 10, 10, 'feb', 1, 2),
(30, 10, 20, 20, 10, 10, 'mar', 1, 3),
(100, 100, 90, 95, 99, 90, 'aug', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ckediter`
--

CREATE TABLE `ckediter` (
  `id` int(11) NOT NULL,
  `content` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `created_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_danish_ci;

--
-- Dumping data for table `ckediter`
--

INSERT INTO `ckediter` (`id`, `content`, `created_at`) VALUES
(6, '<h1 style=\"text-align:center\"><span style=\"color:#e74c3c\">سكن الرواد</span></h1>\r\n\r\n<p>✨ *اعــلان عن فتح باب القبول والتسجيل* ✨ *فرصة ذهبية لخريجي الصف الثامن و التاسع* ? *يعلن مركز رواد المستقبل بمجمع البادية التنموي بمدينة القطن / حضرموت* عن فتح باب القبول والتسجيل بالمركز للعام الدراسي 2024-2025 ------------------------------------ ? *ما هو مركز الرواد ؟* مركز تربوي تعليمي نموذجي يُعنى بطلاب الصف التاسع والمرحلة الثانوية بهدف توجيه طاقاتهم ومداركهم نحو أهداف مستقبلية تسهم في بناء وتنمية المجتمع والوطن من خلال تنمية مهارات القيادة والتفكير والمهارات اللغوية والحياتية والتقنية لديم ضمن بيئة جذابة ومحفزة للتعلم والتدريب والإبداع . ✅ *بم نتميز ؟*<br />\r\n1. سكن نموذجي مجهز بوسائل الراحة للطالب.<br />\r\n2. حصول طلاب المركز الملتحقين بمدارس الإبداع الأهلية على امتيازات خاصة بالمدارس .<br />\r\n3. يخضع طلاب المركز إلى برامج تأهيل متنوعة في مجالات القيادة والتفكير والمهارات اللغوية والحياتية والتقنية .. وغيرها .<br />\r\n4. يمنح خريجي المركز فرصة للحصول على شهادات متنوعة في اللغة والحاسوب والقيادة .<br />\r\n5. يحصل خريجي المركز على فرص متنوعة للتسجيل في المنح والاستفادة من السكنات الطلابية في المحافظات اليمنية بتزكية البدية والمركز .<br />\r\n6. يشرف على المركز كوادر مؤهلة و ذو كفاءة عالية.</p>\r\n\r\n<h4>✒️ *البرامج و الانشطة :*</h4>\r\n\r\n<p>يقدم المركز لرواده حزمة من البرامج والخدمات والأنشطة المتنوعة والتي تسهم بمجموعها في توجيه طاقاتهم ومداركهم نحو أهداف تسهم في بناء وتنمية المجتمع والوطن وتشمل : 1. خدمة الرعاية الكاملة للطالب خلال المراحل التعليمية المستهدفة .<br />\r\n2. البرنامج العلمي ( امتيازات المقاعد الدراسية في مدارس الابداع ، دورات التقوية ، دورات المنهاج المدرسي )<br />\r\n3. برنامج تعليم اللغات ( اللغة الإنجليزية واللغة العربية وعلومها ) .<br />\r\n4. برنامج تعلم الحاسوب وتطبيقاته .<br />\r\n5. برنامج تعليم القرآن الكريم والعلوم الشرعية .<br />\r\n6. برامج قادة المستقبل ويشمل حزمة تدريبية متنوعة في القيادة والتنمية البشرية ( التفكير &ndash; القيادة &ndash; تطوير المواهب والقدرات &ndash; .. )<br />\r\n7. برنامج مواهب : مجموعة من الأنشطة والدورات التدريبية تهدف إلى تنمية المواهب والمهارات والقدرات الخاصة لدى المستهدفين .<br />\r\n8. البرامج والأنشطة الترفيهية والتطوعية ( الثقافية ، الرياضية ، الاجتماعية ... ) .</p>\r\n\r\n<h4>? شروط القيد والتسجيل و القبول :</h4>\r\n\r\n<p>1. أن يكون الطالب قد أنهى ( الصف الثامن أو التاسع ) خلال العام الداسي 2023-2024 م بتفوق وحاصل على نسبة ٨٠٪ وما فوق .<br />\r\n2. أن يكون الطالب حسن السيرة والسلوك ويشهد له بذلك .<br />\r\n3. تعطى الأولوية لأبناء الأرياف من محافظات : حضرموت ، شبوة ، المهرة ، سقطرى .<br />\r\n4. أن يجتاز الطالب إجراءات القبول والتسجيل .<br />\r\n5. أن يلتزم الطالب ويتعهد هو وولي امره بأن يلتزم بالبرنامج المقرر خلال الفترة المقررة على كل طالب وهي أربع سنوات حتى مستوى ثالث ثانوي .<br />\r\n6. حضور دورة الاستقبال واجتيازها بنجاح .<br />\r\n7. دفع رسوم التسجيل المقررة عند الحضور لدورة الاستقبال والالتزام بدفع الرسوم المقررة الاخرى خلال كل عم دراسي .<br />\r\n8. الموافقة الخطية من ولي الأمر بتسجيل الطالب وتسليم ذلك عند الحضور للمقابلة .<br />\r\n9. استكمال ملف متطلبات التسجيل عند الحضور عند المقابلة ما في ذلك ( التزكيات ، شهادة اخر مستوى ، موافقة ولي الامر ، ... ) .*رابط التسجيل :* https://badyh.org/rwad2024&nbsp;<a href=\"https://maps.app.goo.gl/8XnuiNFpBfLNTiEh8\" target=\"_blank\" title=\"موقعنا على الخريطه\">? موقعنا : اليمن &ndash; حضرموت &ndash; مديرية القطن &ndash; مجمع البادية التنموي .</a></p>\r\n\r\n<h4>للتواصل والاستفسار يرجى الاتصال أو المراسلة عبر الواتس اب على الأرقام التالية :*</h4>\r\n\r\n<p><br />\r\n<a href=\"https://wa.me/9675458826\" target=\"_blank\">9675458826</a><br />\r\n<a href=\"https://wa.me/967771481476\" target=\"_blank\">967771481476</a><br />\r\n<a href=\"https://wa.me/9675458826\" target=\"_blank\">967772702323</a></p>\r\n\r\n<hr />\r\n<p>? *التسجيل متا حتى تاريخ 30 يوليو 2024م* ? *اغتنم الفرصة و سارع للالتحاق بالمركز فالمقاعد محدودة&gt;</p>\r\n', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `complanint`
--

CREATE TABLE `complanint` (
  `id` int(11) NOT NULL,
  `titele` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `student_id` int(11) NOT NULL,
  `statuse` varchar(50) DEFAULT 'waiting',
  `replay` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dep`
--

CREATE TABLE `dep` (
  `dep_id` int(11) NOT NULL,
  `dep_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dep`
--

INSERT INTO `dep` (`dep_id`, `dep_name`) VALUES
(1, 'حاسوب'),
(2, 'انجليزي'),
(3, 'رواد المستقبل');

-- --------------------------------------------------------

--
-- Table structure for table `evaluation`
--

CREATE TABLE `evaluation` (
  `evaluation_id` int(11) NOT NULL,
  `applicant_id` int(20) NOT NULL,
  `residents_id` int(20) NOT NULL,
  `evaluation_date` date NOT NULL,
  `behavior` float NOT NULL,
  `rate` float NOT NULL,
  `Interviews_rate` float NOT NULL,
  `IQ` float NOT NULL,
  `arabic` float NOT NULL,
  `science` float NOT NULL,
  `mathematics` float NOT NULL,
  `english` float NOT NULL,
  `total_materials` float NOT NULL,
  `total_materials_rate` float NOT NULL,
  `total` float NOT NULL,
  `result` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `evaluation`
--

INSERT INTO `evaluation` (`evaluation_id`, `applicant_id`, `residents_id`, `evaluation_date`, `behavior`, `rate`, `Interviews_rate`, `IQ`, `arabic`, `science`, `mathematics`, `english`, `total_materials`, `total_materials_rate`, `total`, `result`) VALUES
(5, 161, 6, '2024-09-25', 10, 1.62, 30, 100, 100, 100, 100, 100, 500, 40, 81.62, 'مقبول'),
(6, 160, 6, '2024-09-25', 2, 1.86, 20, 20, 20, 20, 20, 30, 110, 8.8, 32.66, 'غير مقبول'),
(7, 162, 6, '2024-09-26', 0.5, 1.76, 40, 47, 47, 47, 50, 50, 241, 19.28, 61.54, 'غير مقبول'),
(8, 165, 6, '2024-09-26', 0.4, 1.6, 4, 6, 6, 5, 6, 6, 29, 2.32, 8.32, 'غير مقبول');

-- --------------------------------------------------------

--
-- Table structure for table `floor`
--

CREATE TABLE `floor` (
  `floor_id` int(11) NOT NULL,
  `floor_name` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `floor`
--

INSERT INTO `floor` (`floor_id`, `floor_name`) VALUES
(122, 'الطابق الأول'),
(124, 'الطابق الثالث'),
(123, 'الطابق الثاني');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `history_id` int(20) NOT NULL,
  `applicant_id` int(20) NOT NULL,
  `registration_date` date DEFAULT NULL,
  `registration_state` enum('','مقبول','غيرمقبول') NOT NULL,
  `interview_date` date DEFAULT NULL,
  `interview_state` enum('','مقبول','غيرمقبول') NOT NULL,
  `evaluation_date` date DEFAULT NULL,
  `evaluation_state` enum('','مقبول','غيرمقبول') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`history_id`, `applicant_id`, `registration_date`, `registration_state`, `interview_date`, `interview_state`, `evaluation_date`, `evaluation_state`) VALUES
(68, 161, '2024-09-25', 'مقبول', '2024-09-25', 'مقبول', '2024-09-25', 'مقبول'),
(72, 165, '2024-09-25', 'مقبول', '2024-09-26', 'مقبول', '2024-09-26', ''),
(73, 160, '2024-09-25', 'مقبول', '2024-09-25', 'مقبول', '2024-09-25', ''),
(74, 162, '2024-09-25', 'مقبول', '2024-09-26', 'مقبول', '2024-09-26', ''),
(75, 169, '2024-09-26', 'مقبول', NULL, '', NULL, ''),
(76, 163, '2025-01-09', 'مقبول', NULL, '', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `interviewers`
--

CREATE TABLE `interviewers` (
  `Interviewers_id` int(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` int(20) NOT NULL,
  `address` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `interviewers`
--

INSERT INTO `interviewers` (`Interviewers_id`, `name`, `phone`, `address`) VALUES
(4, 'احمد صالح باحشوان', 777112277, 'القطن'),
(5, 'عبدالله عبدالعزبز مسلم', 777662459, 'سيئون'),
(6, 'هاشم محمد طرشوم', 777227778, 'القطن'),
(7, 'صالح محسن', 777889999, 'القطن'),
(8, 'صالح محسن', 777889999, 'القطن'),
(9, 'صالح محسن', 777889999, 'القطن'),
(10, 'صالح محسن', 777889999, 'القطن'),
(11, 'صالح محسن', 777889999, 'القطن');

-- --------------------------------------------------------

--
-- Table structure for table `interviews`
--

CREATE TABLE `interviews` (
  `Interviews_id` int(11) NOT NULL,
  `dateInterview` date NOT NULL,
  `applicant_id` int(20) NOT NULL,
  `Interviewers_id` int(20) DEFAULT NULL,
  `character` float NOT NULL,
  `Behavior` float NOT NULL,
  `Interviews_rate` int(11) NOT NULL,
  `Interviews_state` enum('','مقبول','غيرمقبول') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `interviews`
--

INSERT INTO `interviews` (`Interviews_id`, `dateInterview`, `applicant_id`, `Interviewers_id`, `character`, `Behavior`, `Interviews_rate`, `Interviews_state`) VALUES
(189, '2024-09-13', 160, 4, 55, 5, 20, 'مقبول'),
(190, '2024-09-19', 162, 6, 40, 40, 40, 'مقبول'),
(191, '2024-09-19', 165, 6, 4, 4, 4, 'مقبول'),
(192, '2024-09-19', 169, 4, 0, 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `token` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `paid`
--

CREATE TABLE `paid` (
  `paid_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `visa_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `paid_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `student_id` int(11) NOT NULL,
  `program_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`student_id`, `program_id`, `amount`, `date`) VALUES
(1, 6, 5000, '2024-09-23'),
(10, 8, 5000, '2024-09-23'),
(1, 8, 5000, '2024-09-24'),
(11, 8, 5000, '2024-09-29'),
(1, 6, 5000, '2024-09-23'),
(10, 8, 5000, '2024-09-23'),
(1, 8, 5000, '2024-09-24'),
(11, 8, 5000, '2024-09-29');

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `program_id` int(11) NOT NULL,
  `program_name` varchar(50) NOT NULL,
  `dep` int(11) NOT NULL,
  `degree` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`program_id`, `program_name`, `dep`, `degree`, `price`) VALUES
(6, 'تنمية', 3, 80, 5000),
(8, 'ورد', 1, 80, 5000);

-- --------------------------------------------------------

--
-- Table structure for table `quran`
--

CREATE TABLE `quran` (
  `student_id` int(11) NOT NULL,
  `quran` int(11) NOT NULL,
  `curriculum` int(11) NOT NULL,
  `month` varchar(20) NOT NULL,
  `no_month` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quran`
--

INSERT INTO `quran` (`student_id`, `quran`, `curriculum`, `month`, `no_month`) VALUES
(1, 90, 10, 'jan', 1),
(1, 90, 10, 'feb', 2),
(1, 90, 10, 'mar', 3),
(1, 90, 10, 'jan', 1),
(1, 90, 10, 'feb', 2),
(1, 90, 10, 'mar', 3);

-- --------------------------------------------------------

--
-- Table structure for table `residents`
--

CREATE TABLE `residents` (
  `residents_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` int(20) NOT NULL,
  `address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `residents`
--

INSERT INTO `residents` (`residents_id`, `name`, `phone`, `address`) VALUES
(6, 'غبدالله عبدالعزيز مسلم', 777117729, 'تريم'),
(7, 'احمد صالح الزعبي', 781236456, 'سيئون');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `room_id` int(11) NOT NULL,
  `room_name` varchar(20) NOT NULL,
  `suit_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`room_id`, `room_name`, `suit_id`) VALUES
(34, '101', 25),
(35, '102', 25),
(36, '103', 25),
(37, '104', 25),
(38, '105', 25),
(39, '106', 25),
(40, '107', 25),
(41, '201', 26),
(43, '202', 26),
(44, '203', 26),
(45, '204', 26),
(46, '205', 26),
(47, '206', 26),
(48, '207', 26),
(63, '208', 25);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `applicant_id` int(20) DEFAULT NULL,
  `student_name` varchar(50) NOT NULL,
  `date_of_berth` date NOT NULL,
  `governorate` varchar(20) NOT NULL,
  `directorate` varchar(20) NOT NULL,
  `area` varchar(20) NOT NULL,
  `classroom` varchar(30) NOT NULL,
  `school` varchar(100) NOT NULL,
  `student_phone` int(20) NOT NULL,
  `guardian_phone` int(20) NOT NULL,
  `room_id` int(11) DEFAULT NULL,
  `accessories` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `applicant_id`, `student_name`, `date_of_berth`, `governorate`, `directorate`, `area`, `classroom`, `school`, `student_phone`, `guardian_phone`, `room_id`, `accessories`) VALUES
(9, NULL, 'al_rowad@gmail.com', '0000-00-00', '', '', '', '', '', 0, 0, 0, 'برنامج الحملة.pdf'),
(10, 165, 'غبدالله محسن النقيب', '2024-09-11', '', '', '', '', '', 0, 0, 0, NULL),
(11, 161, 'احمد حسن احمد علي باعنس', '1999-06-25', 'شبوة	', 'الطلح	', 'لعبل	', 'التاسع', 'الابداع', 773098320, 773098320, 0, '2.pdf'),
(12, 160, 'احمد كرام عيظه ساحب ', '2002-06-25', 'حضرموت', 'تريم', 'مشطه', 'أول ثانوي', 'الابداع', 774228248, 774228248, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `stupro`
--

CREATE TABLE `stupro` (
  `student_id` int(11) NOT NULL,
  `program_id` int(11) NOT NULL,
  `evaluation` int(11) NOT NULL DEFAULT 0,
  `semester` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stupro`
--

INSERT INTO `stupro` (`student_id`, `program_id`, `evaluation`, `semester`) VALUES
(1, 6, 50, 'الاول'),
(11, 8, 55, 'الاول'),
(12, 8, 44, 'الاول'),
(1, 6, 50, 'الاول'),
(11, 8, 55, 'الاول'),
(12, 8, 44, 'الاول');

-- --------------------------------------------------------

--
-- Table structure for table `suite`
--

CREATE TABLE `suite` (
  `suite_id` int(11) NOT NULL,
  `suite_name` varchar(150) NOT NULL,
  `floor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `suite`
--

INSERT INTO `suite` (`suite_id`, `suite_name`, `floor_id`) VALUES
(25, 'الجناح الأول', 122),
(26, 'الجناح الثاني', 122),
(32, 'الجناح الأول', 123),
(33, 'الجناح الثاني', 123),
(34, 'الجناح الأول', 124),
(35, 'الجناح الثاني', 124),
(46, 'الجناح الثالث', 122);

-- --------------------------------------------------------

--
-- Table structure for table `term`
--

CREATE TABLE `term` (
  `title` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `description` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `features` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `program` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `years` varchar(20) NOT NULL,
  `enddate` date NOT NULL,
  `id` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_danish_ci;

--
-- Dumping data for table `term`
--

INSERT INTO `term` (`title`, `description`, `features`, `program`, `years`, `enddate`, `id`) VALUES
('التسجيل حتى تاريخ 30 يوليو 2024م* ? *اغتنم الفرصة و سارع للالتحاق بالمركز فالمقاعد محدودة', '✨ *اعــلان عن فتح باب القبول والتسجيل* \r\n✨ *فرصة ذهبية لخريجي الصف الثامن و التاسع* \r\n? *يعلن مركز رواد المستقبل  بمجمع البادية التنموي بمدينة القطن / حضرموت*\r\nعن فتح باب القبول والتسجيل بالمركز للعام الدراسي  2024-2025\r\n------------------------------------\r\n? *ما هو مركز الرواد ؟*\r\nمركز تربوي تعليمي  نموذجي  يُعنى بطلاب الصف التاسع والمرحلة الثانوية بهدف توجيه طاقاتهم ومداركهم نحو أهداف مستقبلية تسهم في بناء وتنمية المجتمع والوطن من خلال تنمية مهارات القيادة والتفكير والمهارات اللغوية والحياتية والتقنية لديم  ضمن بيئة جذابة ومحفزة للتعلم والتدريب والإبداع .\r\n\r\n ✅ *بم نتميز ؟*', '', '', '', '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `visa`
--

CREATE TABLE `visa` (
  `visa_id` int(11) NOT NULL,
  `visa_name` varchar(150) NOT NULL,
  `salry_visa` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `visa`
--

INSERT INTO `visa` (`visa_id`, `visa_name`, `salry_visa`) VALUES
(1, 'رسوم التغذية', 25000),
(2, 'رسوم التسكين للجدد', 20000),
(3, 'رسوم التسكين للقداماء', 5000);

-- --------------------------------------------------------

--
-- Table structure for table `year_result`
--

CREATE TABLE `year_result` (
  `student_id` int(11) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `result` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `accounts_student_id` (`student_id`);

--
-- Indexes for table `activites`
--
ALTER TABLE `activites`
  ADD KEY `studentid` (`student_id`);

--
-- Indexes for table `applicants`
--
ALTER TABLE `applicants`
  ADD PRIMARY KEY (`applicant_id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `behavior`
--
ALTER TABLE `behavior`
  ADD KEY `studentid` (`student_id`);

--
-- Indexes for table `ckediter`
--
ALTER TABLE `ckediter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complanint`
--
ALTER TABLE `complanint`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `dep`
--
ALTER TABLE `dep`
  ADD PRIMARY KEY (`dep_id`);

--
-- Indexes for table `evaluation`
--
ALTER TABLE `evaluation`
  ADD PRIMARY KEY (`evaluation_id`),
  ADD KEY `applicant_id` (`applicant_id`),
  ADD KEY `res_id` (`residents_id`);

--
-- Indexes for table `floor`
--
ALTER TABLE `floor`
  ADD PRIMARY KEY (`floor_id`),
  ADD UNIQUE KEY `floor_name` (`floor_name`),
  ADD UNIQUE KEY `floor_name_2` (`floor_name`),
  ADD UNIQUE KEY `floor_name_3` (`floor_name`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`history_id`),
  ADD KEY `applicants_id` (`applicant_id`);

--
-- Indexes for table `interviewers`
--
ALTER TABLE `interviewers`
  ADD PRIMARY KEY (`Interviewers_id`);

--
-- Indexes for table `interviews`
--
ALTER TABLE `interviews`
  ADD PRIMARY KEY (`Interviews_id`),
  ADD KEY `Interviewers_id` (`Interviewers_id`),
  ADD KEY `appli_id` (`applicant_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `paid`
--
ALTER TABLE `paid`
  ADD PRIMARY KEY (`paid_id`),
  ADD KEY `visa_id` (`visa_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD KEY `program_id` (`program_id`),
  ADD KEY `payments_ibfk_1` (`student_id`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`program_id`),
  ADD KEY `dep` (`dep`);

--
-- Indexes for table `quran`
--
ALTER TABLE `quran`
  ADD KEY `studentid` (`student_id`);

--
-- Indexes for table `residents`
--
ALTER TABLE `residents`
  ADD PRIMARY KEY (`residents_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`room_id`),
  ADD UNIQUE KEY `room_name` (`room_name`),
  ADD KEY `id_waed` (`suit_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`),
  ADD KEY `applicant_student_id` (`applicant_id`);

--
-- Indexes for table `suite`
--
ALTER TABLE `suite`
  ADD PRIMARY KEY (`suite_id`),
  ADD KEY `floor_id` (`floor_id`);

--
-- Indexes for table `term`
--
ALTER TABLE `term`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visa`
--
ALTER TABLE `visa`
  ADD PRIMARY KEY (`visa_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=987654331;

--
-- AUTO_INCREMENT for table `applicants`
--
ALTER TABLE `applicants`
  MODIFY `applicant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=182;

--
-- AUTO_INCREMENT for table `ckediter`
--
ALTER TABLE `ckediter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `complanint`
--
ALTER TABLE `complanint`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `evaluation`
--
ALTER TABLE `evaluation`
  MODIFY `evaluation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `floor`
--
ALTER TABLE `floor`
  MODIFY `floor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `history_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `interviewers`
--
ALTER TABLE `interviewers`
  MODIFY `Interviewers_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `interviews`
--
ALTER TABLE `interviews`
  MODIFY `Interviews_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=193;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paid`
--
ALTER TABLE `paid`
  MODIFY `paid_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `residents`
--
ALTER TABLE `residents`
  MODIFY `residents_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `suite`
--
ALTER TABLE `suite`
  MODIFY `suite_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `term`
--
ALTER TABLE `term`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `visa`
--
ALTER TABLE `visa`
  MODIFY `visa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accounts`
--
ALTER TABLE `accounts`
  ADD CONSTRAINT `accounts_student_id` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`);

--
-- Constraints for table `complanint`
--
ALTER TABLE `complanint`
  ADD CONSTRAINT `complanint_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`);

--
-- Constraints for table `evaluation`
--
ALTER TABLE `evaluation`
  ADD CONSTRAINT `applicant_id` FOREIGN KEY (`applicant_id`) REFERENCES `applicants` (`applicant_id`),
  ADD CONSTRAINT `res_id` FOREIGN KEY (`residents_id`) REFERENCES `residents` (`residents_id`);

--
-- Constraints for table `history`
--
ALTER TABLE `history`
  ADD CONSTRAINT `applicants_id` FOREIGN KEY (`applicant_id`) REFERENCES `applicants` (`applicant_id`);

--
-- Constraints for table `interviews`
--
ALTER TABLE `interviews`
  ADD CONSTRAINT `Interviewers_id` FOREIGN KEY (`Interviewers_id`) REFERENCES `interviewers` (`Interviewers_id`),
  ADD CONSTRAINT `appli_id` FOREIGN KEY (`applicant_id`) REFERENCES `applicants` (`applicant_id`);

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`);

--
-- Constraints for table `paid`
--
ALTER TABLE `paid`
  ADD CONSTRAINT `paid_ibfk_1` FOREIGN KEY (`visa_id`) REFERENCES `visa` (`visa_id`),
  ADD CONSTRAINT `paid_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `rooms_ibfk_1` FOREIGN KEY (`suit_id`) REFERENCES `suite` (`suite_id`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `applicant_student_id` FOREIGN KEY (`applicant_id`) REFERENCES `applicants` (`applicant_id`);

--
-- Constraints for table `suite`
--
ALTER TABLE `suite`
  ADD CONSTRAINT `suite_ibfk_1` FOREIGN KEY (`floor_id`) REFERENCES `floor` (`floor_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
