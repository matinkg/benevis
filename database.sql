-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 26, 2024 at 04:12 PM
-- Server version: 8.0.27
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `benevis`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `content` text COLLATE utf8mb4_general_ci NOT NULL,
  `cover_image` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `content`, `cover_image`, `created_at`) VALUES
(1, 1, 'What the RIAA lawsuits mean for AI and copyright', 'Udio and Suno are not, despite their names, the hottest new restaurants on the Lower East Side. They’re AI startups that let people generate impressively real-sounding songs — complete with instrumentation and vocal performances — from prompts. And on Monday, a group of major record labels sued them, alleging copyright infringement “on an almost unimaginable scale,” claiming that the companies can only do this because they illegally ingested huge amounts of copyrighted music to train their AI models. \r\n\r\nThese two lawsuits contribute to a mounting pile of legal headaches for the AI industry. Some of the most successful firms in the space have trained their models with data acquired via the unsanctioned scraping of massive amounts of information from the internet. ChatGPT, for example, was initially trained on millions of documents collected from links posted to Reddit.\r\n\r\nBoth Udio and Suno are fairly new, but they’ve already made a big splash. Suno was launched in December by a Cambridge-based team that previously worked for Kensho, another AI company. It quickly entered into a partnership with Microsoft that integrated Suno with Copilot, Microsoft’s AI chatbot. \r\n\r\nUdio was launched just this year, raising millions of dollars from heavy hitters in the tech investing world (Andreessen Horowitz) and the music world (Will.i.am and Common, for example). Udio’s platform was used by comedian King Willonius to generate “BBL Drizzy,” the Drake diss track that went viral after producer Metro Boomin remixed it and released it to the public for anyone to rap over. ', 'public/uploads/667c2bc9c71b44.54935574.png', '2024-06-26 14:55:05'),
(2, 1, 'Apple will soon offer better support for third-party iPhone displays and batteries', 'Apple’s putting renewed focus on its repairability efforts today. The company has extended its self-service diagnostics tool to Europe, giving customers in 32 countries an easier way to test products for potential issues.\r\n\r\nBut perhaps more interesting is the fact that Apple also published a new whitepaper — “Longevity, by Design” (PDF link) — that explains “the company’s principles for designing for longevity.” I’m sure there’ll be a lot of analysis about every page, but within the paper is actually some news: Apple says that later this year, it will extend more software features to third-party iPhone components.\r\n\r\nTrue Tone, the feature that adjusts an iPhone display’s white balance to better match your environment, has typically been disabled whenever a third-party replacement screen is detected by iOS. But soon, Apple will allow customers to enable True Tone “to the best performance that can be provided.” \r\n\r\n', 'public/uploads/667c2c206f4017.07002679.png', '2024-06-26 14:56:32'),
(3, 1, 'Surface Laptop review: Microsoft’s best MacBook Air competitor yet', 'The new Surface Laptop isn’t just a refresh. It’s Microsoft’s first clamshell laptop with Qualcomm chips inside, and it represents Microsoft’s most serious attempt yet at a transition to Windows on Arm. The company’s previous efforts at Arm-based Windows machines were flawed, with poor app compatibility and sluggish performance. Now, Microsoft is trying again to finely balance processing power and battery life in a way that only Apple has achieved in laptops so far.\r\n\r\nThis time around, Microsoft has nailed it. Everything about the new Surface Laptop feels way better. Microsoft has not only closed the MacBook Air gap but also raised the bar for what you should expect from a Windows laptop that starts at $999.99.', 'public/uploads/667c2cd413a909.03589509.png', '2024-06-26 14:59:32'),
(4, 1, 'Supreme Court decision allows White House to keep talking to social media platforms', 'On Wednesday, the Supreme Court issued its decision in Murthy v. Missouri, a case spurred by conservative state attorneys general about whether the Biden administration illegally coerced social media companies to remove speech it didn’t like. In a 6-3 decision, the court reversed the decision by the Fifth Circuit Court of Appeals, which had found unconstitutional coercion in the government’s conduct. The Supreme Court held that the plaintiffs did not adequately establish standing — that is, their right to sue in the first place — and has sent the case back to the lower courts, where a new decision will be issued that is consistent with the SCOTUS opinion.\r\n\r\nAt its core, the case is about whether the Biden administration crossed the line from legal persuasion to illegal coercion in its communications with tech companies about things like voting or health misinformation during the pandemic. During oral arguments this year, several justices seemed uneasy with the idea of placing sweeping restrictions on the government from interacting with social media platforms.\r\n\r\n“The plaintiffs, without any concrete link between their injuries and the defendants’ conduct, ask us to conduct a review of the years-long communications between dozens of federal officials, across different agencies, with different social-media platforms, about different topics,” Justice Amy Coney Barrett wrote in the opinion. “This Court’s standing doctrine prevents us from ‘exercis[ing such] general legal oversight’ of the other branches of Government.”\r\n\r\nThe Supreme Court said that the Fifth Circuit “glossed over complexities in the evidence” by “attributing every platform decision at least in part to the defendants,” meaning the federal government. While the majority opinion acknowledges that the government actors “played a role” at times in some of the social media platform’s content moderation decisions, it says that “the evidence indicates that the platforms had independent incentives to moderate content and often exercised their own judgment.”\r\n\r\nOn top of that, the timing of platforms’ content moderation decisions that were in question cast doubts on the causal relationship between government pressure and the platforms’ choices, according to the court. “Complicating the plaintiffs’ effort to demonstrate that each platform acted due to Government coercion, rather than its own judgment, is the fact that the platforms began to suppress the plaintiffs’ COVID–19 content before the defendants’ challenged communications started,” according to the majority.\r\n\r\nThey also says the states largely failed to link platforms’ restrictions to the federal government’s communications with the companies. For example, Facebook’s Covid-related restrictions on a “healthcare activist” predated some of the communications the federal government had with the company, according to the court. “Though she makes the best showing of all the plaintiffs, most of the lines she draws are tenuous,” the majority wrote.\r\n\r\nSeparate from the Supreme Court case, the question about government coercion has also become a focus of the House Judiciary Committee. Chair Jim Jordan (R-OH) attended oral arguments in the case and recently released a report with internal communications among high-ranking tech executives about how they responded to government outreach about posts officials deemed harmful to Americans.', 'public/uploads/667c2d1469d202.72736025.png', '2024-06-26 15:00:36'),
(5, 1, 'Gmail’s Gemini AI sidebar and email summaries are rolling out now', 'Gmail is getting more AI features that could make it easier to stay on top of your email.\r\n\r\nOn the web, Google is beginning to roll out a new Gemini side panel that can do things like summarize email threads and draft new emails. The tool will offer “proactive prompts” but you can also ask “freeform questions,” Google writes in a blog post, and it’s “built to leverage Google’s most capable models,” such as Gemini 1.5 Pro. In the Gmail mobile apps, Google will also give you the ability to have Gemini summarize threads.\r\n\r\nThese improvements could be useful, but they’ll only be available to paid Gemini users: you’ll need to be a Google Workspace customer with a Gemini Business or Enterprise add-on, a Gemini Education or Education Premium add-on, or a Google One AI Premium subscriber. I’d also caution against fully relying on these tools for work; given that AI sometimes hallucinates things, make sure you’re double-checking an important email Gemini helps with before you send it.\r\n\r\nGoogle is also rolling out Gemini features to the side panel in Docs, Sheets, Slides, and Drive. Google promised last month at I/O that these features were on the way. And there are still some announced AI features to come for Gmail, including “Contextual Smart Reply.”', 'public/uploads/667c2d54530c64.99844226.png', '2024-06-26 15:01:40'),
(6, 1, 'Logitech’s affordable new low-profile keyboard also fits Cherry MX-style keycaps', 'Logitech has announced a new low-profile gaming keyboard, the G515 Lightspeed TKL Wireless, featuring upgraded low-profile switches that are now compatible with Cherry MX-style keycaps, improving the keyboard’s customizability.\r\n\r\nThe G515 is a welcome upgrade to Logitech’s G915 Lightspeed Wireless keyboard, which debuted in 2019. The new G515 features a TKL (tenkeyless) design that’s similar to the smaller Logitech G915 TKL update from 2020; this one completely eliminates not only the G915’s number pad but also the wide volume wheel that sat above it.\r\n\r\nSaying goodbye to that physical volume wheel leaves the G515 keyboard, which should be available today, with a $139 price tag that’s significantly cheaper than both the $249.99 G915 and the smaller $229.99 G915 TKL. That’s not quite as cheap as the $104 Keychron K1 Max QMK wireless low-profile keyboard, which offers a lot of similar functionality, but for those looking for an even more affordable point of entry, a wired-only version of the new G515 is also en route and expected to sell for $99 when it’s available later this year.\r\n\r\nThe new G515 continues to use the company’s low-profile GL mechanical switches that, when they debuted on the G915 almost five years ago, were found to be tweaked versions of Kailh’s Choc V1 low-profile switches, which made them difficult to customize and swap in alternate keycaps.', 'public/uploads/667c2da31f39d3.04630004.png', '2024-06-26 15:02:59');

-- --------------------------------------------------------

--
-- Table structure for table `post_tags`
--

DROP TABLE IF EXISTS `post_tags`;
CREATE TABLE IF NOT EXISTS `post_tags` (
  `post_id` int NOT NULL,
  `tag_id` int NOT NULL,
  PRIMARY KEY (`post_id`,`tag_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post_tags`
--

INSERT INTO `post_tags` (`post_id`, `tag_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 2),
(2, 4),
(2, 5),
(3, 6),
(3, 7),
(3, 8),
(4, 9),
(4, 10),
(4, 11),
(5, 1),
(5, 2),
(5, 12),
(6, 2),
(6, 13),
(6, 14);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
CREATE TABLE IF NOT EXISTS `tags` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `title`) VALUES
(1, 'Artificial Intelligence'),
(2, 'Tech'),
(3, 'Law'),
(4, 'Apple'),
(5, 'iPhone'),
(6, 'review'),
(7, 'microsoft'),
(8, 'surface'),
(9, 'Policy'),
(10, 'Speech'),
(11, 'Regulation'),
(12, 'Google'),
(13, 'Gadgets'),
(14, 'Keyboards');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`) VALUES
(1, 'ali', 'rezaei', 'alirezaei@gmail.com', '123456');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
