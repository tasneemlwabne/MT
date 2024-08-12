-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2024 at 10:38 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mt3`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'safimousa', '123456'),
(6, 'safimousa4', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `timeslot` varchar(100) NOT NULL,
  `treatment` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `password` varchar(100) NOT NULL,
  `code` int(10) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `fullname`, `email`, `phone`, `password`, `code`, `status`) VALUES
(9, 'safi mousaa', 'safimousa671@gmail.com   ', '050-2682094', 'aaa12345AAA', 0, 'verified');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `image` varchar(250) NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `date` varchar(30) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `pro_id`, `order_id`, `name`, `image`, `price`, `qty`, `date`, `user_email`, `status`, `count`) VALUES
(106, 10, 96220, 'l\'amore leave in hair mask', 'lamore leave in hair mask.jpg', 70, 1, '05-07-2024 12:25:17', 'safimousa671@gmail.com', 'Packaged', 1),
(107, 10, 17313, 'l\'amore leave in hair mask', 'lamore leave in hair mask.jpg', 70, 3, '05-07-2024 12:56:35', 'safimousa671@gmail.com', 'Packaged', 2),
(108, 29, 88366, 'NEUTROGENA Oil-Free Acne Wash', 'NEUTROGENA Oil-Free Acne Wash.png', 65, 2, '05-07-2024 12:58:25', 'safimousa671@gmail.com', 'Packaged', 3),
(109, 16, 61828, 'l`amore repair hair mask', 'lamore repairing curly hair mask.jpg', 120, 4, '05-07-2024 01:05:10', 'safimousa671@gmail.com', 'Packaged', 4),
(110, 10, 88693, 'l\'amore leave in hair mask', 'lamore leave in hair mask.jpg', 70, 1, '05-07-2024 01:25:11', 'safimousa671@gmail.com', 'Packaged', 5);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `price` int(10) NOT NULL,
  `qty` int(5) NOT NULL,
  `image` varchar(500) NOT NULL,
  `category` varchar(50) NOT NULL,
  `details` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `qty`, `image`, `category`, `details`) VALUES
(10, 'l\'amore leave in hair mask', 70, 20, 'lamore leave in hair mask.jpg', 'Hair', 'Lemori\'s unwashed hair mask with an iodized and gentle formula that contains a combination of components for advanced hair restoration and nourishment.\r\nThe mask contains a special lipid mixture that provides moisture and protection to her hair.\r\nIn addition, the mask contains special materials for heat protection as a result of smoothing treatments.'),
(11, 'l`amore salt free shampoo', 90, 15, 'lamore salt free shampoo.jpg', 'Hair', 'Lamori-shampoo without salts.\r\nIn a unique and delicate formula that contains a combination of high-quality components that give softness - shine - and the ability to restore damaged hair.'),
(12, 'LAMORE – Hair Repairing Serum', 80, 15, 'L’amore Repairing Serum.png', 'Hair', 'Hair restoration serum that adds elasticity, contributes a lot to preventing split ends and gives shine, Restores damaged hair, makes the hair soft and pleasant to the touch and contributes a lot to protection against sun damage.'),
(13, 'l`amore curly hair cream', 75, 15, 'lamore curly hair cream.jpg', 'Hair', 'Cream for curly hair\nA formula designed for curly hair. A unique combination of ingredients that give maximum protection to curly hair from all kinds of potentially damaging factors, sharpen curl waves, treat split ends and give hair shine and a look full of life and energy.'),
(14, 'l`amore repairing shampoo', 95, 15, 'lamore repairing shampoo.png', 'Hair', 'Lamori-shampoo for hair restoration.\r\nLamore shampoo for hair restoration has a unique and gentle formula that contains a combination of high-quality and natural components that work simultaneously on the scalp and the hair shaft.\r\nThe shampoo contains a special mixture of extracts to strengthen the hair.'),
(15, 'L\'amore Shampoo For Oily Hair', 100, 15, 'L’amore Shampoo For Oily Hair.png', 'Hair', 'Lamori shampoo for oily hair, is based on a system of unique plant acidity, which can help in regulation\r\nThe level of hair oils secreted from the scalp\r\nthereby contributing to contributing to the strengthening and general existence of all the hair.'),
(16, 'l`amore repair hair mask', 120, 11, 'lamore repairing curly hair mask.jpg', 'Hair', 'A salt-free hair mask with a unique and gentle formula containing a combination of components for advanced hair restoration and nourishment.\r\nThe mask contains a special lipid mixture that gives her hair moisture and protection.\r\nIn addition, the mask contains special materials for heat protection as a result of smoothing treatments.'),
(19, 'CeraVe Moisturizing Cream Dry to Very Dry Skin', 70, 15, 'CeraVe Moisturizing Cream Dry to Very Dry Skin.jpg', 'Dry', 'CeraVe Moisturizing Cream Dry to Very Dry Skin is a deeply hydrating and nourishing cream specially formulated for dry to very dry skin. Developed with the help of dermatologists, it combines a unique formula with the MVE Technology. With three essential Ceramides, this daily cream helps both repair and reinforce the skin barrier. With Hyaluronic Acid, it helps deeply moisturize the skin and keep it hydrated.'),
(20, 'CeraVe Hydrating Cream-to-Foam Cleanser', 50, 15, 'CeraVe Hydrating Cream-to-Foam Cleanser.jpg', 'Dry', 'CeraVe Hydrating Cream-to-Foam Cleanser Normal to Dry Skin is a comfortable foaming cleanser that is non-drying and gentle on the skin. Suitable for normal to dry skin types, this formula grants the benefits of a rinsing off texture without drying out the skin.\r\nThis vegan formula combines hydrating ingredients with technology to achieve the best results. Containing essential ceramides 1, 3 and 6-II, this cleanser contributes to restore the skin barrier and also to retain moisture. In addition, hyaluronic acid and amino acids help to deeply hydrate and retain water onto the skin.'),
(21, 'CeraVe Moisturizing Cream', 40, 15, 'CeraVe Moisturizing cream.webp', 'Dry', 'CeraVe Moisturizing Cream Dry to Very Dry Skin is a deeply hydrating and nourishing cream specially formulated for dry to very dry skin. Developed with the help of dermatologists, it combines a unique formula with the MVE Technology. With three essential Ceramides, this daily cream helps both repair and reinforce the skin barrier. With Hyaluronic Acid, it helps deeply moisturize the skin and keep it hydrated. And, with the MVE Technology, it ensures that there is a controlled release of the active ingredients for a long-lasting action. '),
(22, 'Hydrating Micellar Water', 80, 15, 'Hydrating-Micellar-Water.jpg', 'Dry', 'CeraVe Hydrating Micellar Water is an ultra-gentle way to remove eye makeup, excess oil, and dirt without having to rinse. Our micellar water contains a nourishing ceramide and niacinamide blend. It restores and maintains your skin barrier. Our ophthalmologist-tested micellar cleansing water is also gentle enough to use around sensitive eyes.'),
(23, 'CeraVe Moisturising Lotion', 70, 15, 'CeraVe Moisturizing Lotion.webp', 'Dry', 'Finding the right products for your skincare routine should come down to a few easy steps. Besides cleansing and sun protection, a daily moisturizer is essential. We recommend looking for ingredients like hyaluronic acid and ceramides to help restore and maintain the skin’s protective barrier.\r\nCeraVe Daily Moisturizing Lotion is a lightweight, oil-free moisturizer that helps hydrate the skin and restore its natural barrier.'),
(24, 'CeraVe Facial Moisturising Lotion', 80, 15, 'CeraVe Facial Moisturising Lotion.jpeg', 'Dry', 'CeraVe Facial Moisturising Lotion SPF30 52ml replaces CeraVe Facial Moisturising Lotion SPF25, now with a higher SPF value. This product is a lightweight lotion that both moisturizes and protects the skin. In fact, this ceramide-enriched formula deeply hydrates the skin and restores the skin\'s barrier function. Developed with dermatologists, this formula allies essential Ceramides to keep the skin healthy, with Niacinamide to strengthen the skin barrier. In addition, Hyaluronic acid deeply hydrates the skin. Furthermore, the MVE Technology ensures a slow release of the actives for sustained and prolonged hydration for up to 24 hours.'),
(25, 'CeraVe Blemish Control Gel', 90, 15, 'CeraVe Blemish Control Gel.jpeg', 'Dry', 'CeraVe Blemish Control Gel is a facial moisturiser for blemish-prone skin & blackheads, helping skin look noticeably clearer. The formula penetrates pores to eliminate the cause of spots & blemishes, while protecting the skin’s natural barrier.'),
(26, 'CeraVe Blemish Control Cleanser', 100, 15, 'CeraVe Blemish Control Cleanser.webp', 'Dry', 'Refreshing gel-to-foam facial cleanser for blemish-prone skin, that helps to reduce the appearance of blemishes and blackheads, and removes excess oil while leaving the skin feeling soft and smooth. The formula penetrates pores to eliminate the cause of spots & blemishes, while respecting the skin’s natural barrier.'),
(27, 'Neutrogena Hydro Boost Hydrating Serum', 90, 13, 'Neutrogena Hydro Boost Hydrating Serum.jpg', 'Oily', 'serum instantly absorbs to quench skin and deliver higher hydration levels for fully hydrated skin that glows day after day'),
(28, 'Neutrogena Bright Boost', 120, 15, 'Neutrogena Bright Boost.webp', 'Oily', 'Neutrogena Bright Boost Illuminating Serum 30ml is a powerful treatment that was specially developed to improve skin tone for a complexion that is visibly more even. As it happens, this serum is part of the Neutrogena Bright Boost™ collection - a line of products that improves radiance and revives tired-looking skin. Thanks to the high concentration of Neoglucosamine® in the composition, this product is able to stimulate surface cell turnover, improving skin tone and fighting dullness. '),
(29, 'NEUTROGENA Oil-Free Acne Wash', 65, 13, 'NEUTROGENA Oil-Free Acne Wash.png', 'Oily', 'Treat and help prevent breakouts in one simple step with this powerful acne treatment and cleanser. Not only does the oil-free formula gently cleanse deep into pores for clear skin, it contains Salicylic Acid to help get rid of acne and help prevent future breakouts. Plus, the special skin soothers help leave skin not feeling dry.'),
(30, 'Neutrogena Oil Balancing Daily Exfoliator with Lime', 80, 15, 'Neutrogena Oil Balancing Daily Exfoliator with Lime.png', 'Oily', '•	You can put your best face forward.\r\n•	Unclog pores & mattify skin, for flawless-looking complexion.\r\n•	Helps tighten pores: with its exfoliating Micro-Beads, Glycolic Acid & Aloe Vera, it cleanses deep down to unclog pores for visibly refined-looking skin. Its fresh Lime scent provides an incredibly uplifting cleansing experience.\r\n•	Visibly reduces shine: the formula is clinically proven to immediately remove 77%* of excess sebum and provide a lasting matte effect without over-drying the skin.'),
(31, 'Deep Clean Facial Cleanser Normal to Oily Skin', 90, 15, 'Deep Clean Facial Cleanser Normal to Oily Skin.webp', 'Oily', 'Neutrogena Deep Clean cleans so deeply and thoroughly that it improves the look and feel of skin. Skin is left clean - with no pore-clogging residue. Your complexion looks fresh and healthy; feels smooth and soft from deeper, more thorough cleansing.\r\nThis effective face wash contains a hydroxy acid which penetrates deep into pores, dissolving dirt, oil and make-up. It also removes dead surface skin cells that can dry, roughen and dull your complexion. Softer, fresher skin will emerge.'),
(32, 'neutrogena‏, Skin Perfecting, Daily Liquid Exfoliant, Oily Skin', 65, 15, 'neutrogena‏, Skin Perfecting, Daily Liquid Exfoliant, Oily Skin.jpg', 'Oily', 'The secret to revealing a glowing skin tone: a 9% alpha hydroxyl acid/polyhydroxy acid blend\r\nGlycolic Acid: This powerful alpha hydroxyl acid sloughs off dead skin cells, revealing a brighter skin tone and smoother texture.\r\nMandelic acid: a gentle alpha hydroxyl acid that removes dead skin cells and gives a brighter appearance and a more even skin tone.\r\nGluconolactone: a powerful and moisturizing exfoliating liquid that cleans the pores of the skin and softens it.'),
(33, 'Neutrogena Hydro Boost Water Gel 50ml', 70, 15, 'Skin-Care Routine for Oily Skin.webp', 'Oily', 'Neutrogena Hydro Boost Water Gel 50ml is a deeply moisturizing gel suitable for all skin types. Enrichened with Hyaluronic Acid and Trehalose, helps to not only lock moisture within the skin but also plum it. This water gel features an oil-free formula and a light, non-greasy texture, both of which are sure to give the skin a supple and plush appearance.'),
(34, 'Eucerin Sun Sensitive Protect Cream', 75, 15, 'Eucerin Sun Sensitive Protect Cream.jpeg', 'Sensitive', 'Eucerin Sun Sensitive Protect Cream SPF50+ is a facial sunscreen for the dry sensitive skin. It offers a biological cell protection, thanks to Glycyrrhetinic Acid, which repairs the DNA from the skin damaged by UV rays. Licochalcone A protects the skin against free radicals, reduces redness, and calms minor inflammations, thanks to its antioxidant and anti-inflammatory properties. Unperfumed, with a light, creamy texture, this sunscreen protects, soothes and moisturizes dry sensitive skin (even atopic skin).'),
(35, 'Eucerin Sun Sensitive Relief After Sun Gel-Cream Face & Body', 65, 15, 'Eucerin Sun Sensitive Relief After Sun Gel-Cream Face & Body.jpg', 'Sensitive', 'Eucerin Sun Sensitive Relief After Sun Gel-Cream Face & Body is a cooling after sun that helps to replenish the skin of the face and body after sun exposure. With a pleasantly fresh texture, that is not greasy or sticky, this formula helps to repair sun-sensitive and irritated skin from sun-induced damage. Suitable for all skin types and safe for children, the formula is so gentle that is also appropriate for sensitive and sun allergy-prone skin.'),
(36, 'Eucerin DERMOPURE Oil Control Triple Effect Cleansing Gel', 60, 15, 'Eucerin DERMOPURE Oil Control Triple Effect Cleansing Gel.jpeg', 'Sensitive', 'Eucerin DERMOPURE Oil Control Triple Effect Cleansing Gel 150ml is a clinically tested formula that targets three key skin concerns associated with acne-prone skin – blemishes, post-acne marks, and shine. For that purpose, it features 2% salicylic acid, a renowned anti-bacterial agent that actively works to reduce impurities and unclog pores, consequently addressing the anti-blemish aspect of the treatment. This is complemented by an exfoliating AHA/BHA/PHA complex which aids in the removal of dead skin cells, therefore contributing to the anti-mark effect by targeting post-inflammatory hyperpigmentation.'),
(37, 'Eucerin DermatoCLEAN Hyaluron Cleansing Gel', 75, 15, 'Eucerin DermatoCLEAN Hyaluron Cleansing Gel.jpg', 'Sensitive', 'Eucerin DermatoCLEAN Hyaluron Cleansing Gel is a mild but effective cleanser that removes impurities and make-up, all the while helping the skin maintain its natural moisture balance. Suitable for normal to combination skin types, including sensitive, this formula is enriched with APG Complex, an extra mild cleanser that cleans the skin by dissolving and removing impurities, and Gluco-Glycerol, a powerful hydrating active that helps the skin retain moisture and improve its own barrier function. The skin is thoroughly cleansed and refreshed, for a youthful and reinvigorated feeling.'),
(38, 'Eucerin DermatoCLEAN Hyaluron Toner', 80, 15, 'Eucerin DermatoCLEAN Hyaluron Toner.jpg', 'Sensitive', 'Eucerin DermatoCLEAN Hyaluron Toner is a mild, alcohol-free toner designed to be applied after cleansing, to refresh the skin and help it maintain its natural moisture balance. Suitable for all skin types, including sensitive, this formula is enriched with APG Complex, an extra mild cleanser, and Gluco-Glycerol, a powerful hydrating active that helps the skin retain moisture. The skin is toned and supple, fully prepared for the next step in the skincare routine.'),
(39, 'Eucerin Hyaluron-Filler 3x Effect Ultra Light Moisture Booster', 70, 15, 'Eucerin Hyaluron-Filler 3x Effect Ultra Light Moisture Booster.jpg', 'Sensitive', 'Eucerin Hyaluron-Filler 3x Effect Ultra Light Moisture Booster 30ml is an ultra-light formula that promises to fill in fine lines, hydrate the skin and refresh your complexion from the first application. As it happens, this is a triple-action composition that focuses on delivering an instant moisture boost, keeping hydration on optimal levels for up to 24 hours. Furthermore, its hydrating properties also target and fill in fine lines, leaving a refreshed feeling behind. The result? Smooth, plump and radiant skin after each use! All of these benefits are possible thanks to an advanced formula that blends the nourishing properties of Hyaluronic Acid and Glycerine.'),
(40, 'Eucerin Sun Pigment Control Sun Tinted Gel-Cream', 90, 15, 'Eucerin Sun Pigment Control Sun Tinted Gel-Cream.jpg', 'Sensitive', 'Eucerin Sun Pigment Control Sun Tinted Gel-Cream SPF50+ Light 50ml offers very high sun protection while helping to reduce and prevent hyperpigmentation. To begin with, this product features a combination of sunscreen filters with Licochalcone A to guarantee maximum protection against both UVA and UVB rays but also protect the skin from free radicals caused by UV and visible light. Then, the formula contains Thiamidol, an effective and patented ingredient. Basically, this ingredient acts at the root cause of hyperpigmentation thus reducing dark spots and preventing their reappearance.'),
(41, 'Eucerin Hyaluron-Filler + Elasticity Day Cream', 140, 15, 'Eucerin Hyaluron-Filler + Elasticity Day Cream.jpg', 'Sensitive', 'Eucerin Hyaluron-Filler + Elasticity Day Cream SPF30 nourishes, firms, and smooths the skin for a fresher, radiant, and youthful look. With a unique formula, it is capable to protect your skin from free radicals and solar radiation while fighting aging signs. It can deeply hydrate and nourish the skin, visibly plumping and reducing fine lines and wrinkles. It offers antioxidant benefits shielding the skin from oxidative stress and protecting both collagen and elastin from degrading. And it can also stimulate collagen production enhancing the elasticity of the skin and improving firmness.');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` int(10) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(100) NOT NULL,
  `creditN` varchar(16) NOT NULL,
  `cvv` varchar(3) NOT NULL,
  `date` varchar(8) NOT NULL,
  `pro_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `fullname`, `email`, `city`, `phone`, `address`, `creditN`, `cvv`, `date`, `pro_id`) VALUES
(129, 'safi mousa', 'safimousa671@gmail.com', 'maghat', '050-2682096', 'street 2', ' $2y$10$mEsjGsws', '$2y', '02/26', 10),
(130, 'safi mousa', 'safimousa671@gmail.com', 'maghar', '050-2682096', 'street 2', ' $2y$10$kPcmaQ.W', '$2y', '02/26', 10),
(131, 'safi mousa', 'safimousa671@gmail.com', 'maghar', '050-2682096', 'street 2', ' $2y$10$QQTCwn.o', '$2y', '02/26', 29),
(132, 'safi mousa', 'safimousa671@gmail.com', 'maghar', '050-2682096', 'street 2', ' $2y$10$qF1r1yTo', '$2y', '02/26', 16),
(133, 'safi mousa', 'safimousa671@gmail.com', 'maghar', '050-2682096', 'street 2', ' $2y$10$T33y37dy', '$2y', '02/26', 10);

-- --------------------------------------------------------

--
-- Table structure for table `supply`
--

CREATE TABLE `supply` (
  `id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `date` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supply`
--

INSERT INTO `supply` (`id`, `pro_id`, `qty`, `price`, `date`) VALUES
(2, 10, 5, 70, '07-07-2024 05:29:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supply`
--
ALTER TABLE `supply`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `supply`
--
ALTER TABLE `supply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
