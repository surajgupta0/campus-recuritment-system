-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2022 at 08:24 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `campus`
--

-- --------------------------------------------------------

--
-- Table structure for table `applied_student`
--

CREATE TABLE `applied_student` (
  `post_id_all` int(50) NOT NULL,
  `student_user` int(50) NOT NULL,
  `company_user` int(50) NOT NULL,
  `main_id` int(50) NOT NULL,
  `category_id_all` int(50) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Pending',
  `message` varchar(255) NOT NULL,
  `apply_post_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `applied_student`
--

INSERT INTO `applied_student` (`post_id_all`, `student_user`, `company_user`, `main_id`, `category_id_all`, `status`, `message`, `apply_post_date`) VALUES
(15, 4, 2, 66, 8, 'approved', '\r\n    hired', '04 Jun,22'),
(15, 1, 2, 67, 8, 'Pending', '', '04 Jun,22'),
(21, 1, 3, 68, 7, 'Pending', '', '04 Jun,22'),
(19, 1, 1, 69, 6, 'approved', '\r\n    meet tomorrow at 10 am ', '04 Jun,22'),
(20, 1, 2, 70, 6, 'Pending', '', '04 Jun,22'),
(22, 1, 1, 71, 8, 'Pending', '', '04 Jun,22'),
(22, 4, 1, 72, 8, 'Pending', '', '04 Jun,22'),
(22, 8, 1, 73, 8, 'approved', 'meet in dubai at sharp 11 am\r\n    ', '05 Jun,22'),
(20, 8, 2, 74, 6, 'Pending', '', '05 Jun,22'),
(23, 1, 2, 75, 6, 'approved', '\r\n    meet at vasai', '05 Jun,22'),
(23, 6, 2, 76, 6, 'Pending', '', '05 Jun,22'),
(22, 6, 1, 77, 8, 'Pending', '', '05 Jun,22'),
(21, 6, 3, 78, 7, 'Pending', '', '05 Jun,22'),
(20, 6, 2, 79, 6, 'Pending', '', '05 Jun,22'),
(24, 1, 2, 80, 13, 'rejected', '\r\n    you are rejected', '07 Jun,22'),
(23, 7, 2, 81, 6, 'rejected', '\r\n    rejected', '07 Jun,22'),
(21, 7, 3, 82, 7, 'Pending', '', '07 Jun,22'),
(24, 7, 2, 83, 13, 'approved', ' 11 am', '08 Jun,22');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(20) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `total_category` int(20) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `total_category`) VALUES
(6, 'Computer & IT', 3),
(7, 'Healthcare', 1),
(8, 'Accounting & financing', 2),
(9, 'Human Resourses', 0),
(10, 'Education', 0),
(11, 'Sales and Retail', 0),
(12, 'Property', 0),
(13, 'Banking', 1);

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `number` int(50) NOT NULL,
  `url` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `company_username` varchar(50) NOT NULL,
  `company_password` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  `logo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `name`, `email`, `number`, `url`, `address`, `company_username`, `company_password`, `role`, `logo`) VALUES
(1, 'web perfecto', 'webperfecto@gmail.com', 2147483647, 'https://www.webperfecto.com/', 'ghatkopat(E)', 'webperfecto', 'webperfecto', 'company', '8.png'),
(2, 'TCS', 'kumar.suraj@gmailcom', 121242232, 'tcs@gmail.com', 'churchgate', 'suraj', 'suraj', 'company', 'IMG-20220408-WA0000.jpg'),
(3, 'sun farma', 'sunfarma@gmail.com', 1234554548, '{ https://www.sunfarma.com/}', 'vasai(W)', 'sun', 'sun', 'company', 'Untitled design (11).png');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `stu_id` int(11) NOT NULL,
  `student_name` varchar(50) NOT NULL,
  `student_email` varchar(50) NOT NULL,
  `phone_number` bigint(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `role` varchar(10) NOT NULL,
  `file` varchar(50) NOT NULL,
  `student_address` varchar(50) NOT NULL,
  `resume` varchar(50) NOT NULL,
  `applied_post` int(50) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`stu_id`, `student_name`, `student_email`, `phone_number`, `username`, `password`, `gender`, `role`, `file`, `student_address`, `resume`, `applied_post`) VALUES
(1, 'suraj gupta', 'kumar.suraj9918@gmail.com', 8433573748, 'suraj', 'suraj', 'male', 'student', '15.jpg', 'wadala', 'B_24_Roshan Kainee3.docx', 7),
(4, 'pawan', 'pawan@gmail.com', 456789125, 'pawan', 'pawan', 'male', 'student', '14.png', 'antophill', 'Gupta Kanchan Resume.docx', 2),
(5, 'kanchan', 'guptakanchan552@gmail.com', 2147483647, 'kanchan', 'kanchan', 'female', 'student', '9.png', 'Room no. 28 Narshing Pur Darchhut', 'Gupta Kanchan Resume.docx', 0),
(6, 'priyanka', 'prinka@gmail.com', 123456789, 'priyanka', 'priyanka', 'female', 'student', '9.png', 'sion', 'multi (1).pdf', 4),
(7, 'anuj', 'anuj@gmail.com', 121242232, 'anuj', 'anuj', 'male', 'student', '17.png', 'wdala', 'B_24_Roshan Kainee3.docx', 3),
(8, 'sagar', 'sagar@gmail.com', 1234567895, 'sagar', 'sagar', 'male', 'student', '15.jpg', 'sagar@gmail.com', 'SAGAR DINESH JAIN Resume.docx', 2);

-- --------------------------------------------------------

--
-- Table structure for table `vacancy`
--

CREATE TABLE `vacancy` (
  `Post_id` int(50) NOT NULL,
  `Post_title` varchar(50) NOT NULL,
  `company_name` int(50) NOT NULL,
  `job_description` varchar(5000) NOT NULL,
  `monthly_salary` varchar(50) NOT NULL,
  `no_of_opening` int(20) NOT NULL,
  `job_location` varchar(50) NOT NULL,
  `post_image` varchar(50) NOT NULL,
  `apply_date` date NOT NULL,
  `last_date` date NOT NULL,
  `vacancy_category_name` int(20) NOT NULL,
  `applied_student` int(20) NOT NULL DEFAULT 0,
  `post_date` varchar(50) NOT NULL,
  `experience` varchar(50) NOT NULL,
  `time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vacancy`
--

INSERT INTO `vacancy` (`Post_id`, `Post_title`, `company_name`, `job_description`, `monthly_salary`, `no_of_opening`, `job_location`, `post_image`, `apply_date`, `last_date`, `vacancy_category_name`, `applied_student`, `post_date`, `experience`, `time`) VALUES
(15, 'sales executive', 2, 'Graphic Designer Job Description We are seeking a new graphic designer to for Mumbai and Hyderabad location. You will be designing a wide variety of things across digital and offline media. Graphic Designer Requirements: Minimum 2 -3 years Experience as a graphic designer . Proficiency in CoralDraw, Illustrator, including Photoshop, InDesign Quark, and animation A strong eye for visual composition and ability to think innovative . Effective time management skills and the ability to meet deadlines. Understanding of marketing, Printing & Production , website design, corporate identity, product packaging, advertisements, and multimedia design. Experience in food products packaging design or FMCG Industry , will be an added advantage. Interested candidates share their cv on aaisharehman718@gmail.com', '12k-25k', 20, 'andheri', '6.png', '2022-06-01', '2022-06-01', 8, 2, '04-06-2022', 'minimum-1year', 'part time'),
(19, 'web developer', 1, 'About OhBlizz India  We are into media, entertainment, infotainment, celebrity management, corporate events, wellness programs, life coaching, and management consulting.  Activity on Internshala  Hiring since June 2022  2 opportunities posted  About Part Time Job/internship  Selected intern\'s day-to-day responsibilities include: • Work on logo & stationery design • Work on graphic design & brand identity elements • Work on online posts creation • Work on video creation  Skill(s) required  Adobe After Effects Adobe Illustrator Adobe Indesign Adobe Photoshop Adobe Premiere Pro CorelDRAW UI & UX Design Video Editing  Learn these skills on Internshala Trainings  Learn Adobe Photoshop  Learn Video Editing  Learn Adobe Premiere Pro  Learn Colour Theory for Designers  Learn UI & UX Design  Learn Adobe After Effects  Who can apply  Only Those Candidates Can Apply Who • are available for the part time job/internship • can start the part time job/internship between 1st Jun\'22 and 6th Jul\'22', '15k -20k', 20, 'ghatkopar(E)', '1.png', '2022-06-02', '2022-06-24', 6, 1, '02-06-2022', '1 year', 'full time'),
(20, 'web developer', 2, 'Graphic Designer Job Description We are seeking a new graphic designer to for Mumbai and Hyderabad location. You will be designing a wide variety of things across digital and offline media. Graphic Designer Requirements: Minimum 2 -3 years Experience as a graphic designer . Proficiency in CoralDraw, Illustrator, including Photoshop, InDesign Quark, and animation A strong eye for visual composition and ability to think innovative . Effective time management skills and the ability to meet deadlines. Understanding of marketing, Printing & Production , website design, corporate identity, product packaging, advertisements, and multimedia design. Experience in food products packaging design or FMCG Industry , will be an added advantage. Interested candidates share their cv on aaisharehman718@gmail.com', '30k-50k', 49, 'sion(W)', '13.png', '2022-06-04', '2022-06-17', 6, 3, '04 Jun,22', 'minimum-1year', 'full time'),
(21, 'Fresher MD/DNB Anaesthesia', 3, 'Roles and Responsibilities  Looking for MD/DNB Anaesthesia  Location: Sount Mumbai  Experience: MBBS + 0 to 2 yr Post PG  Salary : As per year of experience  Designation: Clinical Associate/Assistant  Looking for MD/DNB Medicine passout doctors interested for Nephorology.  Accomodation will be provided by hospital (Only for doctor)  Doctors ready to relocate can also apply.  Role:Anesthesiologist  Salary: Not Disclosed by Recruiter  Industry:Medical Services / Hospital  Functional Area:Healthcare & Life Sciences  Role Category:Doctor  Employment Type:Full Time, Permanent  Key Skills  AnaesthesiaMD  MSDNBCritical CareDoctor Job  Skills highlighted with ‘‘ are preferred keyskills  Education  UG:MBBS in Any Specialization  PG:Medical-MS/MD in Anaesthesiology  Company Profile  Mega Hr Consultant  Mega HR is a team of talent acquisition experts on a mission to help big and established businesses hire the best people and strategically acquire specialists, leaders & growth...', '30k', 18, 'mira road(E)', '17.png', '2022-06-04', '2022-06-30', 7, 3, '04 Jun,22', 'fresher can apply', 'part time'),
(22, 'Asset Management - Analyst', 1, 'For those of you who are not familiar with the Single Post Template yet, the single post determines the layout of your blog posts.   Custom single post templates enable you to use different layouts for different blog posts — allowing you to apply different designs to specific posts. For example, think of a barber’s website. You could use different templates for review posts, news posts, sale posts, case study posts, etc.   With Elementor, you can use dynamic widgets to build the blog post template. And, to make it easier to design live, you can preview the template with any of your previously created blog posts. This way, all the dynamic widgets get populated with actual content from your site. Here is an article explaining how to use a single post template.', '50k', 19, 'virar(E)', '12.png', '2022-06-09', '2022-06-18', 8, 4, '04 Jun,22', '3 years', 'part time'),
(23, 'web developer', 2, 'I am looking for a web developer with graphic designing experience who could improve our current company\'s website. This is a contract based/one time on- site work. Our office is located in Powai, Mumbai. Please carefully go through the skills mentioned before applying for this role. All the content of the website and most of the graphics for the website will be provided by us.', '15k -20k', 19, 'andheri', '16.png', '2022-06-05', '2022-06-17', 6, 3, '05 Jun,22', 'fresher', 'full time'),
(24, 'bank Manger', 2, 'Your working hours will depend on the organisation you work for but branches are usually between 9.30am to 5pm, Monday to Friday – although more branches are now starting to open on Saturdays.  Although some of your time will be based at the branch, as the manager you’ll be required to spend some time away visiting other branches as well as attending conferences and training days.  Whether you want to move up the financial career ladder or are looking to try something different in the sector, this job is a great stepping stone. You could become an area or regional manager; or with all your financial know-how and polished sales skills why not move into insurance, pensions or a career as a financial advisor?', '50k', 8, 'wadala(E)', '12.png', '2022-06-07', '2022-06-17', 13, 2, '07 Jun,22', '1 year', 'full time');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applied_student`
--
ALTER TABLE `applied_student`
  ADD PRIMARY KEY (`main_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`stu_id`);

--
-- Indexes for table `vacancy`
--
ALTER TABLE `vacancy`
  ADD PRIMARY KEY (`Post_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applied_student`
--
ALTER TABLE `applied_student`
  MODIFY `main_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `stu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `vacancy`
--
ALTER TABLE `vacancy`
  MODIFY `Post_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
