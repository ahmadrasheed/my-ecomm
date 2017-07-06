-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: localhost    Database: blog
-- ------------------------------------------------------
-- Server version	5.7.14

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `articles`
--

DROP TABLE IF EXISTS `articles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `articles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagePath` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `articles`
--

LOCK TABLES `articles` WRITE;
/*!40000 ALTER TABLE `articles` DISABLE KEYS */;
INSERT INTO `articles` VALUES (52,'3','<p><img src=\"/photos/8/adding_categories.png\" alt=\"\" width=\"2880\" height=\"1491\" /></p>','http://127.0.0.1:8000/photos//_95425773_038809175-1.jpg33','احمد الجبوري',1,1,'2017-05-27 11:43:26','2017-05-27 11:43:26'),(53,'4','<p><img src=\"/photos/8/Qr-1.png\" alt=\"\" width=\"220\" height=\"220\" /></p>','http://139.59.127.215/photos/1/وزارة التعليم العالي والبحث العلمي في العراق.jpg','احمد الجبوري',1,1,'2017-05-27 11:43:42','2017-05-27 11:43:42'),(54,'5','<p><img src=\"/photos/8/google_map_api_and_gelocation.jpg\" alt=\"\" width=\"2434\" height=\"1502\" /></p>','http://localhost:8000/photos/8/google_map_api_and_gelocation.jpg','احمد الجبوري',1,1,'2017-05-27 11:44:59','2017-05-27 11:44:59'),(55,'1-1','&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;!--WE SHOULD ADD THIS LINE TO MAKE THE WYSIWING EDITOR WORK--&gt;\r\n&lt;p&gt;&lt;img style=&quot;display: block; margin-left: auto; margin-right: auto;&quot; src=&quot;/photos/8/google_map_api_and_gelocation.jpg&quot; alt=&quot;&quot; width=&quot;832&quot; height=&quot;514&quot; /&gt;&lt;/p&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;p dir=&quot;RTL&quot;&gt;أفتى رئيس الاتحاد العالمي لعلماء الإسلام من أجل السلام، الشيخ الأزهري مصطفى راشد بأن الصيام فرض على الأغنياء فقط أما بالنسبة للفقراء فهو &quot;تطوع&quot;.&lt;/p&gt;\r\n&lt;p dir=&quot;RTL&quot;&gt;وقال لموقع &quot;الحرة&quot; إنه أجرى حسابات بالنسبة للمواطن المصري ووصل إلى نتيجة مفادها أن الصيام ليس فرضا على كل مصري يقل راتبه عن 500 دولار شهريا.&lt;/p&gt;\r\n&lt;p dir=&quot;RTL&quot;&gt;وشرح أن الفقير، بحسب الحديث النبوي، &quot;هو الذي لا يملك قوته وقوت أسرته لمدة شهر والذي لا يملك منزلا، والذي لا يملك دابة، وهي تعادل سيارة في وقتنا الحالي&quot;.&lt;/p&gt;\r\n&lt;p dir=&quot;RTL&quot;&gt;وبموجب هذا التعريف، أجرى راشد حساباته وتبين معه أن المصري الفقير هو من لا يمتلك دخلا شهريا ثابتا يعادل 750 دولارا، وقال لموقع &quot;الحرة&quot; إنه أخذ بالأحوط واعتبر أن الفقير هو من يجني أقل من 500 دولار.&lt;/p&gt;\r\n&lt;p dir=&quot;RTL&quot;&gt;ولكن هذا الحساب الذي سمّاه راشد &quot;نصاب الفقر&quot; يختلف بين دولة وأخرى بحسب أوضاعها الاقتصادية وتكلفة المعيشة فيها، وتبقى القاعدة هي تعريف النبي للفقير.&lt;/p&gt;\r\n&lt;p dir=&quot;RTL&quot;&gt;واعتبر راشد أن &quot;المقصود من الصيام هو إطعام الفقراء&quot;، متابعا أنه &quot;لو أطعم كل شخص مسكينا كل يوم فهذا أفضل من الصيام&quot;.&lt;/p&gt;\r\n&lt;p dir=&quot;RTL&quot;&gt;ولكنه أكد أن كلامه ليس دعوة للفقراء كي لا يصوموا، وكل قصده أن يوصل إلى الناس &quot;مقاصد الشرع&quot;.&lt;/p&gt;\r\n&lt;p dir=&quot;RTL&quot;&gt;&lt;strong&gt;أساس الفتوى&lt;/strong&gt;&lt;/p&gt;\r\n&lt;p dir=&quot;RTL&quot;&gt;وحول الأسانيد التي اعتمد عليها، يفسر في فتواه الآية 184 من سورة البقرة، والتي تنص على أن &quot;من كان منكم مريضا أو على سفر فعدة من أيام أخر وعلى الذين يطيقونه فدية طعام مسكين فمن تطوع خيرا فهو خير له وأن تصوموا خير لكم إن كنتم تعلمون&quot;.&lt;/p&gt;\r\n&lt;p dir=&quot;RTL&quot;&gt;ومن هذه الآية استنتج كما يستنتج كل الفقهاء أن المريض أو المسافر يحق له الإفطار على أن يصوم أياما أخرى أو يطعم مسكينا عن كل يوم أفطره.&lt;/p&gt;\r\n&lt;p dir=&quot;RTL&quot;&gt;اقرأ أيضا:&lt;/p&gt;\r\n&lt;p dir=&quot;RTL&quot;&gt;​&lt;a class=&quot;underline&quot; href=&quot;https://www.alhurra.com/a/shiites-sunnis/347914.html&quot; target=&quot;_blank&quot; rel=&quot;noopener noreferrer&quot;&gt;أربعة خلافات كبرى بين الشيعة والسنة&lt;/a&gt;&lt;/p&gt;\r\n&lt;p&gt;&lt;a class=&quot;underline&quot; href=&quot;https://www.alhurra.com/a/religion-sunnis-shiite/347311.html&quot; target=&quot;_blank&quot; rel=&quot;noopener noreferrer&quot;&gt;هذا ما قاله باحث إسلامي سعودي عن الشيعة&lt;/a&gt;&lt;/p&gt;\r\n&lt;p&gt;ولكنه أضاف أن &quot;الفقير صائم بالطبع طوال الوقت وإذا كان لا يطيق الصيام فكيف سيطعم مسكينا وهو لا يملك إطعام نفسه؟&quot;، مستنتجا أنه &quot;لا يعقل أن الله يطالب المسكين الذي لا يطيق الصيام بإطعام مسكين آخر&quot;.&lt;/p&gt;\r\n&lt;p dir=&quot;RTL&quot;&gt;وخلص إلى أن &quot;الصيام أساسه الاستطاعة والشعور بالفقير المحروم، فيسقط الصيام لغياب الاستطاعة والقدرة&quot; وبالتالي، فإن الفقراء &quot;غير مطالبين بالصيام&quot;.&lt;/p&gt;\r\n&lt;p dir=&quot;RTL&quot;&gt;&lt;strong&gt;تفاصيل أخرى&lt;/strong&gt;&lt;/p&gt;\r\n&lt;p dir=&quot;RTL&quot;&gt;وأجاز راشد أيضا الإفطار لمن &quot;يعملون في أعمال شاقة ويكون الصيام سببا في توقفهم عن نصف مدة العمل المعتاد يوميا أو يقلل من إنتاجهم بسبب عدم الطاقة والاستطاعة&quot;، مثل أعمال البناء والحدادة والنجارة والزراعة والمحاجر و&quot;أي عمل شاق&quot;.&lt;/p&gt;\r\n&lt;p dir=&quot;RTL&quot;&gt;كما أجاز الإفطار لمن يعمل في ظل درجة حرارة تبلغ 30 درجة مئوية فما فوق &quot;لأنه توجد خطورة على الكلى وعلى صحة الإنسان بامتناعه عن شرب المياه مدة اليوم كاملا وهو ما يتنافى مع قوله تعالى &amp;lsquo;وعلى الذين يطيقونه&amp;rsquo;، كما يتناقض مع القاعدة الشرعية لا ضر ولا ضرار&quot;.&lt;/p&gt;','http://139.59.127.215/photos/1/وزارة التعليم العالي والبحث العلمي في العراق.jpg','احمد الجبوري',1,1,'2017-05-27 13:17:45','2017-05-27 18:50:48'),(51,'2','<p>شسيبسشيبشسيب&nbsp;<img src=\"/photos/8/Qr-1.png\" alt=\"\" width=\"220\" height=\"220\" /></p>','http://127.0.0.1:8000/photos//_95425773_038809175-1.jpg33','احمد الجبوري',1,1,'2017-05-27 11:42:55','2017-05-27 11:42:55'),(50,'1','&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;!--WE SHOULD ADD THIS LINE TO MAKE THE WYSIWING EDITOR WORK--&gt;\r\n&lt;p&gt;&amp;nbsp;==================================================&lt;/p&gt;\r\n&lt;!--WE SHOULD ADD THIS LINE TO MAKE THE WYSIWING EDITOR WORK--&gt;\r\n&lt;p&gt;&amp;nbsp;==============================================================================================================================================================================================================================================================================================================================================================&lt;/p&gt;\r\n&lt;!--WE SHOULD ADD THIS LINE TO MAKE THE WYSIWING EDITOR WORK--&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;!--WE SHOULD ADD THIS LINE TO MAKE THE WYSIWING EDITOR WORK--&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;!--WE SHOULD ADD THIS LINE TO MAKE THE WYSIWING EDITOR WORK--&gt;\r\n&lt;p&gt;هلو ان شالله&amp;nbsp;&lt;/p&gt;\r\n&lt;p&gt;&lt;img src=&quot;/photos/8/Qr-1.png&quot; alt=&quot;&quot; width=&quot;220&quot; height=&quot;220&quot; /&gt;&lt;/p&gt;\r\n&lt;p&gt;============================================================================================================================================================================================================================================================================================================================&lt;/p&gt;','http://139.59.127.215/photos/1/وزارة التعليم العالي والبحث العلمي في العراق.jpg','احمد الجبوري',1,1,'2017-05-27 11:29:18','2017-05-27 11:55:24');
/*!40000 ALTER TABLE `articles` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-06-07  1:16:38
