-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 10, 2021 at 11:33 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id17017659_rental`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_image`) VALUES
(1, 'Music Instumental', '354e1-music-instument-category.jpg'),
(2, 'Ride On', '4d2da-ride-on-category.jpg'),
(3, 'Sport', '393d3-sport-category.jpg'),
(5, 'Puzzle', '03c45-puzzle-category.jpg'),
(6, 'Doll', 'cbccb-doll-category.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_category_id` int(11) NOT NULL,
  `item_price` int(11) NOT NULL,
  `item_qty` int(11) NOT NULL,
  `item_desc` varchar(2000) NOT NULL,
  `item_photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `item_name`, `item_category_id`, `item_price`, `item_qty`, `item_desc`, `item_photo`) VALUES
(1, 'Baby Einstein Octoplush Plush Toy', 1, 30000, 5, 'Like many of the best musical baby toys, this octopus musical toy does a lot. The legs are embroidered with colorful designs. Squeeze them to hear each hue name in English, French, and Spanish, followed by a classic melody. These features make stuffed animals great for cuddling, but also for learning as baby ages.', '3e533-baby-einstein-octoplush-toy.jpg'),
(2, 'Melissa & Doug Musical Farmyard Cube', 1, 45000, 3, 'Capture baby’s attention with a whole host of sounds, sights and textures. This plush cube is equipped with everything from mirrors and graspers to pressable noses. The latter play farm animal noises as well as delightful songs when pushed.', 'f3fa3-melissa-doug-musical-farmyard-cube.jpg'),
(3, 'Scandiborn Kids Concept Grey Drum', 1, 59000, 6, 'While there’s nothing wrong with using spoons and pots as percussion instruments , sometimes you want something a little prettier for your playroom. Cue this toddler drum that has us starry-eyed.', 'ec92f-scandiborn-kids-concept-grey-drum.jpg'),
(4, 'VTech Pull and Sing Puppy', 1, 24900, 5, 'Shopping for musical toys for a 1-year-old? Push and pull toys are always a hit at this age. This puppy-shaped plaything is a fun choice. Your kid can develop their motor skills by moving it around, which is encouraged thanks to the 60+(!) songs these movements activate.', 'dcdc5-vtech-pull-and-sing-puppy.jpg'),
(5, 'Hape Scoot Around Ride-On Wood Bike', 2, 99900, 3, 'Kiddos ages 1-year-old and up will enjoy moving and grooving on this four-wheeled, foot-powered wooden ride-on toy. Young riders will gain muscle strength and improved balance as they carefully scoot around on this classic wooden bike.  Made for indoor use, the rubber wheels are crafted to last as well as protect your floors. While this toy rides like a dream on wooden or smooth floors, it\'s important to note that it is not compatible with carpets and rugs.', 'b529d-hape-scoot-around-ride-on-wood-bike.jpg'),
(6, 'Fisher-Price Harley Davidson Though Trike', 2, 68900, 4, 'Your kiddo will look so cool on this tricked-out trike. Made for kids 2 to 5 years old, this is a great introduction to ride-on vehicles before your kiddo graduates to a two-wheeler.  The extra big pedals make it easy for little riders to get rolling and easy-grip handlebars are perfect for little hands. Rugged, durable tires help your biker roll from adventures on sidewalks, park paths, and grass, and a secret storage compartment under the seat stashes snacks. ', 'a7a26-fisher-price-harley-davidson-though-trike.jpg'),
(7, 'Kid Motorz Lil Patrol Ride-On Motorcycle', 2, 79000, 2, 'Young kids will hit their patrol route decked out on their very own police motorcycle. Suitable for kids 18 months and older, the maximum weight capacity is 33 pounds. The 6-volt rechargeable battery powers the realistic headlight, rear light-up siren, and forward and reverse gears.  With a max speed of 1.2 miles per hour, your tot will feel like they are in a high-speed chase. The well-designed motorcycle rests on two back wheels for stability and includes a storage space for snacks or toys.', 'edacb-kid-motorz-lil-patrol-ride-on-motorcycle.jpg'),
(8, 'Magnetic Board Game', 3, 120000, 3, 'Discerning toddlers use the magnetic stick to control the players, and then shoots the ball into the opposing goal. It\'s a fun, collaborative game that also lets kids work on their gross motor skills.', '35e9f-magnetic-board-game.jpg'),
(9, 'Pound & Roll Tower', 3, 25000, 5, 'A pounding toy that also schools toddlers about cause and effect, this classic let them use a hammer to get the balls through the built-in holes and see them roll down ramps. Which is also a nice lesson about gravity.', '99a9e-pound-roll-tower.jpg'),
(10, 'Happy Giddy Bowling Set', 3, 25000, 6, 'The goal: Use the soft ball to knock down those bowling pins. All while working on their aim and concentration.', '1f90d-happy-giddy-bowling-set.jpg'),
(11, 'Vehicle Sound Wooden Peg Puzzle', 5, 27000, 6, 'Does your little guy love planes, trains and automobiles? If so, this nine-piece Melissa & Doug Vehicle Wooden Puzzle is the perfect fit for a fun teaching activity. He can put the puzzle together or place the pieces upright to play with like traditional toys. Recommended for kids ages 2 to 4.', '3cd9b-vehicle-sound-wooden-peg-puzzle.jpeg'),
(12, 'Pinkfong Baby Shark Chunky Wooden Puzzle', 5, 24900, 5, 'Who doesn\'t love Baby Shark? This musical Baby Shark Chunky Wooden Sound Puzzle plays the popular kids\' song each time your kiddo puts one of the shark-shaped pieces in the proper spot. The five-piece puzzle comes with Mommy Shark, Daddy Shark, Grandma Shark, Grandpa Shark, and, of course, Baby Shark. Doo-doo-doo-doo-doo-doo! Recommended for kids ages 2 and up.', 'c892e-pinkfong-baby-shark-chunky-wooden-sound-puzzle.jpg'),
(13, 'Mudpuppy Frank Lloyd Wright Puzzle', 5, 35000, 7, 'This 10-piece puzzle uses the fun geometric shapes from architect Frank Lloyd Wright’s iconic designs. Little kids will love exploring shape, form and color with this awesome artistic puzzle for toddlers. Recommended for children age 2 and older.', 'e44df-mudpuppy-frank-lloyd-wright-puzzle.png'),
(14, 'Cuddle + Kind Sebastian The Lamb Little 13', 0, 50000, 3, 'These picture-perfect knit dolls will serve as cuddly companions and, later, imaginative playmates.', '1e7c2-cuddle-kind-sebastian-the-lamb-little-13.jpg'),
(15, 'HABA Snug-up Doll Luis 8', 6, 40000, 4, 'Boy baby dolls can be hard to come by, but Luis doesn\'t disappoint. He\'s snuggly but sturdy, can sit on his own and is machine washable.', '6ea0f-haba-snug-up-doll-luis-8.jpg'),
(16, 'Disney Pricess My Friend Moana Doll', 6, 45000, 4, 'A heroine who saves her people? Who is brave, strong, and fearless? This is a doll we can get behind. And this Moana doll is wearing her signature look from the film. Kids three and up can learn all about breaking the rules for the right reasons.', '3d622-disney-pricess-my-friend-moana-doll.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `status_id` int(11) NOT NULL,
  `status_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`status_id`, `status_name`) VALUES
(1, 'Sedang Dikirim'),
(2, 'Sudah Dikirim'),
(3, 'Siap di pick-up'),
(4, 'Selesai'),
(5, 'cart');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `trans_id` int(11) NOT NULL,
  `trans_user_id` int(11) NOT NULL,
  `trans_item_id` int(11) NOT NULL,
  `duration` int(11) NOT NULL,
  `trans_total` int(11) NOT NULL,
  `trans_status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`trans_id`, `trans_user_id`, `trans_item_id`, `duration`, `trans_total`, `trans_status_id`) VALUES
(1, 3, 7, 2, 160000, 4),
(5, 3, 15, 3, 120000, 4),
(8, 6, 5, 2, 199800, 4),
(13, 8, 8, 1, 120000, 4),
(16, 3, 7, 1, 79000, 4),
(19, 8, 15, 8, 320000, 4),
(21, 8, 2, 1, 45000, 4);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(128) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_phone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_email`, `user_password`, `user_address`, `user_phone`) VALUES
(1, 'Admin', 'admin@umn.ac.id', '$2y$10$wt29x0VL6rwoI5bqEWwKn.QQdY7mfEC2yseoBK8BR81JuIlFXcJW6', 'UMN', '2147483647'),
(2, 'Audric Lysander', 'audric.lysander@student.umn.ac.id', '$2y$10$K3FitHs/kIRCEyoxHLNW.e7KUi4d1ZWm8D/5saPrn57lMqXs9Dbs6', 'Bumi', '987654321'),
(3, 'Berulo', 'berulo@gmail.com', '$2y$10$j8omfUigC.Ci/XMjXc4e6OZ0OOz.qC9/9gr8FE1G11dJkjPy7c3Tq', 'Jl. Bumi', '987654321'),
(4, 'asdasd', 'asd@gmail.com', '$2y$10$UGpIJBtaMd24JU20tj8CDeTt7xGAUdJ5WydetMMfNAw54NIt9eJ8C', 'asd', '2147483647'),
(5, 'asdasd', 'dsa@gmail.com', '$2y$10$RE7.oCcVvTh8rNu51nDMSu2AbQiOhS28tnPlIBI5TaIim4oY.2awa', 'asdasd', '081250119928'),
(6, 'Grivia', 'grivia@gmail.com', '$2y$10$59PjzaTADHG9TVBFPSka.uYIIDXYaBiNGapVPv5ersUul3SRQxa9u', 'Jln. Rumah', '08115544699'),
(7, 'Rullyan', 'rullyan.reva@student.umn.ac.id', '$2y$10$VeK2fox7.B5j5KklFp8TTu597lmSxBmzM3pXTJe8EywRW6K8V5CsO', 'Tangerang', '999'),
(8, 'Angeline Felicia', 'angeline.felicia@student.umn.ac.id', '$2y$10$payBxyIjuWg9OovCYYAlkOnL/idp/eAuj1u/2oZ3MXfoSNQr2pKDO', 'Jl Neraka', '085212345678');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`trans_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `trans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
