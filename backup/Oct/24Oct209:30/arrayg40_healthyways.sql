-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 24, 2020 at 09:29 AM
-- Server version: 5.7.32
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `arrayg40_healthyways`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(255) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL DEFAULT '12345',
  `barcode` varchar(255) NOT NULL,
  `mobile_no` varchar(255) DEFAULT NULL,
  `role` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Active',
  `awb_number1` varchar(255) NOT NULL,
  `awb_number2` varchar(255) DEFAULT NULL,
  `batch_number` varchar(255) DEFAULT NULL,
  `order_status` varchar(255) NOT NULL DEFAULT 'Not delivered ',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `uname`, `password`, `barcode`, `mobile_no`, `role`, `status`, `awb_number1`, `awb_number2`, `batch_number`, `order_status`, `date`) VALUES
(1, 'admin@genething.com', 'admin123$', 'NA', 'NA', 'Admin', 'Active', 'NA', 'NA', 'NA', 'Not delivered ', '2020-10-14 06:31:03'),
(2, 'rajesh@arraygene.com', '12345', '9673038446', '9673038446', 'Users', 'Active', '9673038446', '9673038446', '1', 'Dispatched', '2020-10-14 06:41:46'),
(3, '', '12345', '73787', '7378746207', 'Users', 'Active', '737871', '', '', 'Not delivered ', '2020-10-14 06:37:17'),
(4, 'rizwan8125904441@gmail.com', '12345', '81259044', '8125904441', 'Users', 'Active', '812590444', '8125904441', '2', 'Dispatched', '2020-10-14 06:58:59'),
(6, 'akshata@arraygen.com', 'arraygen123$', '73', '7378746207', 'Users', 'Active', '7378', '46207', '3', 'Dispatched', '2020-10-14 11:53:29'),
(7, '', '12345', '7378746207', '7378746207', 'Users', 'Active', '7378746207', '', '', 'Not delivered ', '2020-10-14 11:44:15');

-- --------------------------------------------------------

--
-- Table structure for table `nutrition`
--

CREATE TABLE `nutrition` (
  `id` int(255) NOT NULL,
  `phenotype` varchar(255) NOT NULL,
  `traits` varchar(255) NOT NULL,
  `gene_id` varchar(255) NOT NULL,
  `gene` varchar(255) NOT NULL,
  `genotype` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `all_publication` varchar(255) NOT NULL,
  `snp` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nutrition`
--

INSERT INTO `nutrition` (`id`, `phenotype`, `traits`, `gene_id`, `gene`, `genotype`, `description`, `all_publication`, `snp`) VALUES
(1, 'Regulation of eating', 'Emotional eating dependence', '4160', 'MC4R', 'TC', 'The protein encoded by this gene is a membrane-bound receptor and member of the melanocortin receptor family. The encoded protein interacts with adrenocorticotropic and MSH hormones and is mediated by G proteins. This is an intronless gene. Defects in thi', ' https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=4160', 'rs17782313'),
(2, 'Regulation of eating', 'Snacking pattern', '3952', 'near LEP', 'GG', 'This gene encodes a protein that is secreted by white adipocytes into the circulation and plays a major role in the regulation of energy homeostasis. Circulating leptin binds to the leptin receptor in the brain, which activates downstream signaling pathwa', 'https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=3952', 'rs7799039'),
(3, 'Regulation of eating', 'Snacking pattern', '4160', 'MC4R', 'TC', 'The protein encoded by this gene is a membrane-bound receptor and member of the melanocortin receptor family. The encoded protein interacts with adrenocorticotropic and MSH hormones and is mediated by G proteins. This is an intronless gene. Defects in thi', 'https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=4160', 'rs17782313'),
(4, 'Regulation of eating', 'Satiety response', '79068', 'FTO', 'TT', 'The FTO gene is one of the genes that has been associated with obesity risk. It is believed to influence satiety and hunger and regulate energy homeostasis. Studies suggest that the FTO gene may play an important role in regulating food intake; variations', 'https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=79068', 'rs9939609'),
(5, 'Taste Perception', 'Sweet taste perception', '83756', 'TAS1R3', 'CC, CC', 'There are differences in the sensitivity, perception, and preference for tastes. Taste sensitivity can be attributed to the threshold of activated taste cells. The sweet taste perception is primarily mediated by the TAS1R2 (taste receptor type 1 member 2)', 'https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=83756', 'rs307355'),
(6, 'Taste Perception', 'Sweet taste perception', '80834', 'TAS1R2', 'CC, GT', 'There are differences in the sensitivity, perception, and preference for tastes. Taste sensitivity can be attributed to the threshold of activated taste cells. The sweet taste perception is primarily mediated by the TAS1R2 (taste receptor type 1 member 2)', 'https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=80834', 'rs12033832'),
(7, 'Taste Perception', 'Bitter taste perception', '5726', 'TAS2R38', 'TT, CC', 'The TAS2R38 gene encodes a G protein-coupled receptor, which acts as a taste receptor, and is mediated by certain chemicals like PROP and phenylthiocarbamide; these chemicals bind to the receptor and signal taste perception. Vegetables like broccoli, cabb', 'https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=5726', 'rs10246939'),
(8, 'Taste Perception', 'Fatty food preference', '9628', 'RGS6', 'GA, CT, GA, TC', 'The RGS6 gene is a member of the G7 superfamily; it plays a role in the regulation of G-protein signaling and is believed to have an interplay with opioid receptors (G-protein coupled receptors). While under stress, there is an increase in the cortisol le', 'https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=9628', 'rs1402064'),
(10, 'Macronutrient Requirements', 'Response to Carbohydrates', '1636', 'ACE', 'GG', 'The ACE gene provides instructions for making the angiotensin-converting enzyme. The renin-angiotensin system (RAS) is involved in most of the pathological processes that lead to pathogenesis of diabetes. Angiotensin II (Ang II) is the major peptide of RA', 'https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=1636', 'rs4343'),
(11, 'Macronutrient Requirements', 'Response to Carbohydrates', '154', 'ADRB2', 'CC', 'This gene encodes beta-2-adrenergic receptor which is a member of the G protein-coupled receptor superfamily. Receptors involved in catecholamine function have a role in thermogenesis and energy balance, thus affecting obesity and glucose metabolism. Adre', 'https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=154', 'rs1042713'),
(12, 'Macronutrient Requirements', 'Response to Carbohydrates', '326625', 'MMAB', 'CC', 'The MMAB gene encodes an enzyme that aids in the production of adenosylcobalamin, which is important for the breakdown of cholesterol. The MMAB gene may play a role in modulating concentrations of HDL-C which can affect the risk of developing dyslipidemia', 'https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=326625', 'rs2241201'),
(13, 'Macronutrient Requirements', 'Response to Carbohydrates', '6720', 'SREBP1C', 'TT, CC', 'Sterol regulatory element binding protein-1c (SREBP1C) is a transcription factor involved in the regulation of lipid, glucose metabolism and in sterol homoeostasis in cells. SREBP1C expression is regulated by nutritional stimuli like polyunsaturated fatty', 'https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=6720', 'rs2297508'),
(14, 'Macronutrient Requirements', 'Response to Carbohydrates', '5465', 'PPARA', 'GG', 'The shift between glucose storage and synthesis during fasting and feeding is essential for maintaining blood glucose levels. PPARA contributes to the adaptation of hepatic carbohydrate metabolism during the fasting-to-fed and fed-to-fasting transition. H', 'https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=5465', 'rs1800206'),
(15, 'Macronutrient Requirements', 'Response to Carbohydrates', '5468', 'PPARG', 'CC', 'PPAR (peroxisome proliferator-activated receptor) is involved in regulating the carbohydrate and lipid homeostasis, adipogenesis, fatty acid storage, and maintaining energy balance. The PPARG gene encodes a protein (PPAR-gamma) which plays a role in the r', 'https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=5468', 'rs1800571'),
(16, 'Macronutrient Requirements', 'Response to Carbohydrates', '6934', 'TCF7L2', 'AA, CC, GG', 'The TCF7L2 gene encodes a protein that influences the secretion of a hormone (glucagon-like peptide-1) which has insulinotropic effects (stimulates insulin secretion) and plays a role in regulating blood glucose homeostasis. Carbohydrate digestion causes ', 'https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=6934', 'rs7903146'),
(17, 'Macronutrient Requirements', 'Response to Carbohydrates', '79068', 'FTO', 'CC', 'The expression of the FTO gene in the hypothalamus is indicative of its potential role in regulating energy homeostasis by modifying the appetite. Carbohydrates influence various aspects such as body weight, appetite, and endocrinology. Carbohydrates inta', ' https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=79068', 'rs1421085'),
(18, 'Macronutrient Requirements', 'Response to saturated fats', '5122', 'PCSK1', 'GG', 'The PCSK1 gene encodes for a protein that has been associated with the cleavage of proteins that play a role in the hypothalamic regulation of appetite. Variations in the PCSK1 gene have been associated with the modulation of fasting fat oxidation.', 'https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=5122', 'rs6230'),
(19, 'Macronutrient Requirements', 'Response to saturated fats', '4049', 'LTA', 'TA', 'Variations that influence the function of the gene have been identified in several genes, including the lymphotoxin-Î± (LTA) gene, which affects the cytokine production. The variations may interact with dietary fatty acids to regulate the production and s', 'https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=4049', 'rs915654'),
(20, 'Macronutrient Requirements', 'Response to saturated fats', '7067', 'THRA', 'AA', 'The THRA gene encodes for a protein which is a nuclear hormone receptor for triiodothyronine (T3 thyroid hormone). It is shown to mediate certain activities of the thyroid hormone. Thyroid hormones, Triiodothyronine (T3) and tetraiodothyronine (T4) hormon', ' https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=7067', 'rs137853162'),
(21, 'Macronutrient Requirements', 'Response to saturated fats', '4035', 'LRP1', 'CT', 'The LRP1 gene encodes a protein, which is involved in the formation of a mature receptor. This receptor is involved in many cellular processes including intracellular signaling, lipid homeostasis, and clearance of apoptotic cells (biochemical events leadi', ' https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=4035', 'rs483353013'),
(22, 'Macronutrient Requirements', 'Response to saturated fats', '197', 'AHSG', 'CC', 'The AHSG gene is involved in the regulation of body fat and insulin sensitivity. Variations in the AHSG gene has been shown to be associated with reduced plasma levels as well as lower body fat.', ' https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=197', 'rs4917'),
(23, 'Macronutrient Requirements', 'Response to saturated fats', '4023', 'LPL', 'CC', 'Lipoprotein lipase (LPL), associated with the luminal endothelial surface of arteries and capillaries of peripheral tissues,it is a key enzyme in the metabolism of lipoproteins. It hydrolyzes plasma lipoprotein triglycerides into free fatty acids and glyc', ' https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=4023', 'rs13702'),
(24, 'Macronutrient Requirements', 'Response to saturated fats', '948', 'CD36', 'AG', 'The CD36 gene encodes for a membrane-bound protein; CD36 is expressed in several cell types, including fat cells and muscle cells. The primary function of this protein is in the uptake of fatty acids into cells for energy generation. CD36 and FA signaling', ' https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=948', 'rs3211938'),
(25, 'Macronutrient Requirements', 'Response to saturated fats', '3569', 'IL6', 'AA, CC, GG', 'The IL6 gene encodes for a protein that has a wide variety of biological functions. Following muscle contraction, it functions to increase the breakdown of fats and to improve insulin resistance.', ' https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=3569', 'rs1800795'),
(26, 'Macronutrient Requirements', 'Response to saturated fats', '336', 'APOA2', 'TT', 'The APOA2 gene encodes for a protein, apolipoprotein (apo-) A-II, which is the second most abundant protein of the high-density lipoprotein particles. Saturated fat can stimulate the production for APOA2 production in the postprandial phase (after eating ', ' https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=336', 'rs202223831'),
(27, 'Macronutrient Requirements', 'Response to saturated fats', '5465', 'PPARA', 'TT', 'The PPARA gene plays a key role in lipid homeostasis. The activation of PPARA contributes to the clearance of triglyceride-rich lipoproteins, improves HDL cholesterol concentrations, and reduces the oxidation of LDL cholesterol, thus influencing the activ', ' https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=5465', 'rs1801282'),
(28, 'Macronutrient Requirements', 'Response to saturated fats', '5468', 'PPARG', 'CC', 'This gene encodes a member of the peroxisome proliferator-activated receptor (PPAR) subfamily of nuclear receptors. The protein encoded by this gene is PPAR-gamma and is a regulator of adipocyte differentiation. PPARG regulates fatty acid storage and gluc', 'https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=5468', 'rs1800571'),
(29, 'Macronutrient Requirements', 'Response to saturated fats', '6934', 'TCF7L2', 'GG', 'This gene encodes a transcription factor that influences the secretion of GLP 1 (glucagon like peptide 1) which is insulinotropic (stimulates insulin secretion) and has a role in blood glucose homeostasis. TCF7L2 is expressed in subcutaneous and visceral ', 'https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=6934', 'rs12255372'),
(30, 'Macronutrient Requirements', 'Response to saturated fats', '79068', 'FTO', 'TT', 'The FTO gene has strong associations with conditions such as obesity and type II diabetes. It is known to contribute to the regulation of body size and body fat accumulation, specifically, thermogenesis (heat production), and adipocyte (fat cell) differen', ' https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=79068', 'rs9939609'),
(31, 'Macronutrient Requirements', 'Response to Monosaturated fats', '335', 'APOA1', 'AA', 'The APOA1 gene encodes for a protein, apolipoprotein A-I (ApoA-1), which is the major protein component of high-density lipoprotein (HDL) in the plasma. High levels of HDL can reduce the risk of developing cardiovascular conditions. HDL transports cholest', ' https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=335', 'rs670'),
(32, 'Macronutrient Requirements', 'Response to Monosaturated fats', '9370', 'ADIPOQ', 'GG, GG', 'The ADIPOQ gene encodes for a protein, adiponectin, which is a plasma protein secreted by the visceral adipose tissue. Adiponectin increases insulin sensitivity and tissue fat oxidation, resulting in reduced circulating fatty acid levels. Therefore, varia', ' https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=9370', 'rs144526209 '),
(33, 'Macronutrient Requirements', 'Response to Monosaturated fats', '338', 'APOB', 'AA', 'The APOB gene encodes for a protein, apolipoprotein B, which is the main apolipoprotein of chylomicrons and low-density lipoproteins. This protein is involved in transporting fat molecules, including cholesterol in the bloodstream.', ' https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=338', 'rs693'),
(35, 'Macronutrient Requirements', 'Response to polysaturated fats', '1071', 'CETP', 'GT, CT', 'The CETP gene encodes for a protein that is involved in the transfer of cholesteryl ester from high-density lipoprotein (HDL) to other lipoproteins. Variations in the CETP gene may influence the responses of lipids (fats) and lipoproteins to the alteratio', ' https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=1071', 'rs2303790'),
(36, 'Macronutrient Requirements', 'Response to polysaturated fats', '183', 'AGT', 'CT', 'The AGT gene encodes for a protein, angiotensinogen, which plays a role in the regulation of blood pressure and fluid balance in the body. Variations in the AGT gene have found to be associated with concentrations of total cholesterol and low-density lipo', ' https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=183', 'rs699'),
(37, 'Macronutrient Requirements', 'Response to polysaturated fats', '3992', 'FADS1', 'GG, TT', 'This gene encodes the enzyme Fatty acid desaturase 1(Î”5 desaturase) which catalyses the conversion of omega-3 & omega-6 parent fatty acids namely alpha-linolenic acid (ALA) & linoleic acid (LA) to their longer chain derivatives (eicosapentaenoic acid or ', ' https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=3992', 'rs174544'),
(38, 'Macronutrient Requirements', 'Response to polysaturated fats', '345', 'APOC3', 'CC', 'The APOC3 gene encodes for a protein, apolipoprotein C-3 (APOC3), which is a component of very-low-density lipoprotein (VLDL). This gene plays a role in inhibiting the activities of proteins that are required for the hydrolysis of triglycerides and theref', ' https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=345', 'rs2070666'),
(39, 'Macronutrient Requirements', 'Response to polysaturated fats', '116519', 'APOA5', 'AA, TT', 'The APOA5 gene encodes for a protein, apolipoprotein A-5 (APOA5), which is a major component of VLDL (very low-density lipoprotein), chylomicrons, and HDL (high-density lipoprotein). APOA5 functions as an activator of a key enzyme in triglyceride cataboli', ' https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=116519', 'rs662799'),
(40, 'Macronutrient Requirements', 'Response to polysaturated fats', '9370', 'ADIPOQ', 'TT', 'The ADIPOQ gene encodes for a protein, adiponectin, which is a plasma protein secreted by the visceral adipose tissue. Adiponectin increases insulin sensitivity and tissue fat oxidation, resulting in reduced circulating fatty acid levels. Therefore, varia', ' https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=9370', 'rs144526209 '),
(41, 'Macronutrient Requirements', 'Response to protein', '4544', 'MTNR1B', 'CG', 'This gene encodes one of two high affinity forms of a receptor for melatonin, the primary hormone secreted by the pineal gland. Given that melatonin is a hormone involved in energy balance and body weight status, this gene is implicated in body weight reg', ' https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=4544', 'rs10830963'),
(42, 'Macronutrient Requirements', 'Response to protein', '7021', 'TFAP2B', 'AA', 'The TFAP2B gene encodes a protein (transcription factor AP-2Î²), which in conjunction with other proteins from the AP-2 family binds to specific regions of DNA and helps to control the activity of genes involved in the stimulation of cell proliferation an', ' https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=7021', 'rs2817399'),
(43, 'Macronutrient Requirements', 'Response to protein', '79068', 'FTO', 'TT', 'This gene encodes for a nuclear protein of the AlkB related non-haem iron and 2-oxoglutarate-dependent oxygenase superfamily. RNA demethylase that mediates oxidative demethylation of different RNA species, such as mRNAs, tRNAs and snRNAs, and acts as a re', ' https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=79068', 'rs9939609'),
(44, 'Macronutrient Requirements', 'Response to fibre', '79068', 'FTO', 'AA', 'The FTO gene has strong associations with conditions such as obesity and type II diabetes. Studies have shown that people with certain variations in the FTO gene are found to have beneficial results with increased fiber intake; variations may also be asso', ' https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=79068', 'rs9939609'),
(46, 'Weight Management and Maintenance', 'Ability to maintain the weight loss', '9370', 'ADIPOQ', 'GG', 'The ADIPOQ gene encodes for a protein, adiponectin, which is produced in the adipose tissue (fat tissue). Variations in the ADIPOQ gene can influence the production of adiponectin, thereby affecting energy intake and body weight.', ' https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=9370', 'rs144526209 '),
(47, 'Weight Management and Maintenance', 'Ability to maintain the weight loss', '5468', 'PPARG', 'CC', 'PPAR (peroxisome proliferator-activated receptor) is involved in regulating the carbohydrate and lipid homeostasis, adipogenesis, fatty acid storage, and maintaining energy balance. The PPARG gene encodes a protein (PPAR-gamma) which plays a role in the r', 'https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=5468', 'rs1800571'),
(48, 'Weight Management and Maintenance', 'Ability to maintain the weight loss', '79068', 'FTO', 'GG', 'The FTO gene has strong associations with conditions such as obesity and type II diabetes. Variations in the FTO gene may influence weight regain', ' https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=79068', 'rs9939609'),
(49, 'Micronutrient Requirements', 'Vitamin A Metabolism', '53630', 'near BCMO1', 'GG, TG', 'The protein encoded by this gene is a key enzyme in beta-carotene metabolism to vitamin A. It catalyzes the oxidative cleavage of beta-carotene into two retinal molecules. Vitamin A metabolism is important for vital processes such as vision, embryonic dev', ' https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=53630', 'rs11645428'),
(50, 'Micronutrient Requirements', 'Vitamin A Metabolism', '53630', 'BCMO1', 'AA, AA, CC', 'The protein encoded by this gene is a key enzyme in beta-carotene metabolism to vitamin A. It catalyzes the oxidative cleavage of beta-carotene into two retinal molecules. Vitamin A metabolism is important for vital processes such as vision, embryonic dev', ' https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=53630', 'rs11645428'),
(52, 'Micronutrient Requirements', 'Vitamin D Metabolism', '2638', 'GC', 'AC, GT', 'The GC gene encodes the vitamin D binding protein (DBP) that belongs to the albumin gene family. The encoded protein has multiple functions and is found in the plasma, ascitic fluid, cerebrospinal fluid, and on the surface of many cell types. The protein ', ' https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=2638', 'rs2282679'),
(53, 'Micronutrient Requirements', 'Vitamin D Metabolism', '7421', 'VDR', 'TT, CA', 'Vitamin D can either be acquired through dietary intake or made in the body with help from sunlight exposure. The VDR gene encodes the vitamin D receptor (VDR) protein which plays a role in the bodyâ€™s response to vitamin D. It binds to calcitriol, the a', ' https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=7421', 'rs1544410'),
(54, 'Micronutrient Requirements', 'Vitamin E Metabolism', '337', 'APOA4', 'TT', 'APOA4 encodes an apoprotein secreted by the intestine and associated with chylomicrons. APOA4 gene has a role in chylomicrons and VLDL secretion and catabolism. Required for efficient activation of lipoprotein lipase by ApoC-II.', ' https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=337', 'rs5104'),
(55, 'Micronutrient Requirements', 'Vitamin E Metabolism', '948', 'CD36', 'AG, GG, TT', 'Vitamin E is a fat-soluble vitamin and an antioxidant. The protein encoded by the CD36 gene is involved in the uptake of long-chain fatty acids and therefore may also influence the plasma concentrations of vitamin E.', 'https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=948', 'rs1761667'),
(56, 'Micronutrient Requirements', 'Vitamin B6 Metabolism', '84224', 'Near NBPF3', 'CT', 'This variant is located near the NBPF3 gene. Variants of the NBPF3 gene were found to be associated with the plasma concentration of pyridoxal phosphate (PLP). PLP is an active form of vitamin B6, which is involved in several enzymatic reactions.', ' https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=84224', 'rs4654748,'),
(57, 'Micronutrient Requirements', 'Vitamin B6 Metabolism', '84224', 'NBPF3', 'CT', 'The variant in this gene has been associated with decreased levels of Vitamin B6 (pyridoxine). Pyridoxine, one of the forms of Vitamin B6, strengthens the protein collagenâ€™s regenerative ability which is much needed for rendering us flexibility and skin', ' https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=84224', 'rs4654748,'),
(58, 'Micronutrient Requirements', 'Vitamin B9 Metabolism', '4524', 'MTHFR', 'AA', 'The MTHFR gene encodes for an enzyme (methylenetetrahydrofolate reductase) which has a role in the processing of amino acids. This enzyme is involved in the chemical reaction involving the vitamin B9 (folate). It plays a role in the conversion of a form o', ' https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=4524', 'rs868014'),
(59, 'Micronutrient Requirements', 'Vitamin B12 Metabolism', '4552', 'MTRR', 'GG', 'Methionine synthase reductase also known as MSR is an enzyme that in humans is encoded by the MTRR gene. The Methionine Synthase Reductase (MTRR) gene primarily acts in the reductive regeneration of cobalamin (vitamin B12). Cob(I)alamin is a cofactor that', ' https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=4552', 'rs16187'),
(60, 'Micronutrient Requirements', 'Vitamin B12 Metabolism', '51293', 'CD320', 'CC', 'This gene encodes the transcobalamin receptor that is expressed at the cell surface. It mediates the cellular uptake of transcobalamin bound cobalamin (vitamin B12), and is involved in B-cell proliferation and immunoglobulin secretion. Mutations in this g', 'https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=51293', 'rs2336573'),
(61, 'Micronutrient Requirements', 'Vitamin B12 Metabolism', '4548', 'MTR', 'AA', 'The MTR gene provides instructions for making an enzyme called methionine synthase. This enzyme plays a role in processing amino acids, the building blocks of proteins. To function properly, methionine synthase requires methylcobalamin (a form of vitamin ', 'https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=4548', 'rs3737965'),
(62, 'Micronutrient Requirements', 'Vitamin B12 Metabolism', '8029', 'CUBN', 'AA', 'Vitamin B12 is not synthesized in the body and is obtained from dietary intake. The CUBN gene encodes a protein, cubilin, which is the intestinal receptor for vitamin B12 (also called cobalamin). Therefore, the CUBN gene plays a crucial role in vitamin B1', 'https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=8029', 'rs1801222'),
(63, 'Micronutrient Requirements', 'Vitamin B12 Metabolism', '2524', 'FUT2', 'AA, GG', 'The FUT2 gene encodes for an enzyme (galactoside 2-alpha-L-fucosyltransferase 2), which influences the synthesis of H-antigen. The H-antigen plays a role in the attachment of H. pylori bacteria to the gastric mucosa; H. pylori infection can cause decrease', 'https://www.ncbi.nlm.nih.gov/gene/2524#bibliography', 'rs601338Â '),
(64, 'Micronutrient Requirements', 'Iron Metabolism', '164656', 'TMPRSS6', 'CT,AG', 'The TMPRSS6 gene encodes a protein called matriptase-2, which influences the levels of the protein, hepcidin. Hepcidin is important for the regulation of iron balance in the body. Low levels of iron in the blood, can decrease the production of hepcidin wh', 'https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=164656', 'rs855791Â '),
(65, 'Micronutrient Requirements', 'Iron Metabolism', '3077', 'HFE', 'CC, GG', 'The HFE gene encodes for a membrane protein that binds to the transferrin receptor 1 protein. This process prevents the receptor from binding to another protein called transferrin. However, binding of transferrin receptor 1 to transferrin is required for ', 'https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=3077', 'rs1799945'),
(66, 'Micronutrient Requirements', 'Antioxidant Metabolism', '2950', 'GSTP1', 'AG, CC', 'Glutathione S-transferase P1 is an enzyme encoded by the GSTP1 gene. This enzyme plays a key role in the process of detoxification and the antioxidant system.', ' https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=2950', 'rs1695'),
(67, 'Micronutrient Requirements', 'Antioxidant Metabolism', '5444', 'PON1', 'TC', 'This gene encodes a member of the paraoxonase family of enzymes and exhibits lactonase and ester hydrolase activity. The HDL associated esterase/lactonase paraoxonase 1 (PON1) is implicated in contributing to the anti-inflammatory and antioxidant activiti', ' https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=5444', 'rs854560'),
(68, 'Micronutrient Requirements', 'Antioxidant Metabolism', '6648', 'SOD2', 'TT', 'The SOD2 gene encodes an enzyme, manganese-dependent superoxide dismutase (MnSOD), which binds to the superoxide byproducts and helps in their conversion to hydrogen peroxide and diatomic oxygen. Superoxides are harmful to the body as they can damage DNA ', ' https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=6648', ' rs4880'),
(69, 'Micronutrient Requirements', 'Antioxidant Metabolism', '847', 'CAT', 'TC', 'The CAT gene encodes an enzyme, catalase, which is a key antioxidant enzyme that plays a role in the bodyâ€™s defense against oxidative stress. Catalase is involved in the conversion of hydrogen peroxide to water and oxygen which reduces the toxic effects', ' https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=847', 'rs4880'),
(70, 'Micronutrient Requirements', 'Antioxidant Metabolism', '2876', 'GPX1', 'CT, CC', 'The GPX1 gene encodes an enzyme (glutathione peroxidase 1 - GPX1), which is an important antioxidant enzyme in the body. Glutathione peroxidase plays a role in the breakdown of hydrogen peroxide and thereby helps to protect cells against oxidative damage.', ' https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=2876', 'rs1050450'),
(71, 'Micronutrient Requirements', 'Calcium Metabolism', '1591', 'CYP24A1', 'AA', 'CYP24A1 encodes a cytochrome P450 enzyme that hydroxylates 1,25-(OH)2D, into metabolites targeted for degradation and appears to be one of the central regulator of 1,25-(OH)2-D metabolism. CYP24A1 is highly regulated by its own substrate 1,25(OH)2-D, as w', ' https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=1591', 'rs777676129'),
(72, 'Micronutrient Requirements', 'Calcium Metabolism', '2625', 'Near GATA3', 'CT', 'GATA3 belongs to a family of zinc finger transcription factors that are involved in vertebrate embryonic development. In addition, GATA3 is also expressed in the developing parathyroids, inner ear, and kidneys. GATA3 is implicated in monogenic disorders o', ' https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=2625', 'rs4143094Â '),
(73, 'Micronutrient Requirements', 'Calcium Metabolism', '160851', 'Near DGKH', 'GG', 'This gene encodes a member of the diacylglycerol kinase (DGK) enzyme family. Members of this family are involved in regulating intracellular concentrations of diacylglycerol and phosphatidic acid. ', ' https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=160851', 'rs4142110'),
(74, 'Micronutrient Requirements', 'Calcium Metabolism', '2646', 'GCKR', 'CC', 'Glucokinase (GCK) controls the rate of glucose metabolism in pancreatic cells, and its activity is rate-limiting for insulin secretion. ', ' https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=2646', 'rs11977526'),
(75, 'Micronutrient Requirements', 'Calcium Metabolism', '846', 'CASR', 'AA, GG', 'The CASR gene encodes for a protein (calcium-sensing receptor - CaSR), which is abundant in the cells within the parathyroid glands and the renal tubules of kidneys. The parathyroid hormone produced by the parathyroid glands helps in increasing blood calc', 'https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=846', 'rs9740'),
(76, 'Micronutrient Requirements', 'Phosphate Metabolism', '846', 'CASR', 'AA', 'The CASR gene encodes for a protein (calcium-sensing receptor - CaSR), which is abundant in the cells within the parathyroid glands and the renal tubules of kidneys. Phosphate levels depend on parathyroid hormone (PTH) level and CaSR influences PTH levels', 'https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=846', 'rs9740'),
(77, 'Micronutrient Requirements', 'Magnesium Metabolism', '846', 'CASR', 'AA', 'The CASR gene encodes for a protein (calcium-sensing receptor - CaSR), which is abundant in the cells within the parathyroid glands and the renal tubules of kidneys. The CaSR protein can bind to magnesium, which can inhibit the secretion of parathyroid ho', 'https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=846', 'rs9740'),
(78, 'Micronutrient Requirements', 'Vitamin K metabolism', '8529', 'CYP4F2', 'CT', 'The cytochrome P450 proteins are monooxygenases which catalyze many reactions involved in drug metabolism and synthesis of cholesterol, steroids and other lipids. CYP4F2 regulates the bioavailability of vitamin E and vitamin K, a cofactor that is critical', ' https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=8529', 'rs2108622'),
(79, 'Micronutrient Requirements', 'Vitamin K metabolism', '79001', 'VKORC1', 'CC', 'The VKORC1 gene provides instructions for making a vitamin K epoxide reductase enzyme. The VKORC1 enzyme is made primarily in the liver. It spans the membrane of a cellular structure called the endoplasmic reticulum, which is involved with protein process', ' https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=79001', 'rs1639'),
(80, 'Food Intolerances and Sensitivities ', 'Salt Metabolism', '6446', 'near SGK1', 'CT', 'This variant is located near the SGK1 gene. The SGK1 gene encodes a protein that plays a key role in cellular stress response. It is also known to activate certain sodium, chloride, and potassium channels, which suggests its involvement in regulating seve', ' https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=6446', 'rs9493857'),
(81, 'Food Intolerances and Sensitivities ', 'Caffeine Metabolism', '1544', 'Near CYP1A2', 'CC, CC', 'Encodes a type of human polycyclic aromatic hydrocarbon-inducible cytochrome P450(CYP1) family called the CYP1A2 enzyme. CYP1A2 demethylates caffeine molecules into substances like paraxanthine & methylxanthine(which can be excreted through urine), reduci', ' https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=1544', 'rs762551Â '),
(82, 'Food Intolerances and Sensitivities ', 'Caffeine Metabolism', '6446', 'CYP1A2', 'AA', 'The CYP1A2 gene encodes a liver enzyme that is critical for the breakdown of caffeine molecules into substances that can be excreted through urine. This function influences the amount of caffeine its effects in the body. Variations in the CYP1A2 gene can ', ' https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=1544', 'rs762551Â '),
(83, 'Food Intolerances and Sensitivities ', 'Gluten Intolerence', '117289', 'TAGAP', 'AA', 'The TAGAP gene encodes for a protein that may play a role in Rho GTPase-activating protein. Variations in the TAGAP gene may lead to an increase in GTPase activity, which can eventually result in the development of celiac disease (CD). Variants of this ge', ' https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=117289', 'rs1464510'),
(84, 'Food Intolerances and Sensitivities ', 'Gluten Intolerence', '3122', 'HLA-DRA', 'TT', 'The HLA-DRA gene (major histocompatibility complex, class II, DR alpha) encodes for a protein that plays a crucial role in the regulation of the immune system. Variations may lead to an immune response in response to gluten intake and may influence an ind', ' https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=3122', 'rs7194'),
(85, 'Food Intolerances and Sensitivities ', 'Gluten Intolerence', '5966', 'REL', 'AA', 'The REL gene encodes a protein, c-Rel, which belongs to the Rel/NF-ÎºB transcription factor family, which helps in the regulation of genes involved in important processes like inflammation and immune response. Studies have suggested an association of c-RE', ' https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=5966', 'rs842644'),
(86, 'Food Intolerances and Sensitivities ', 'Gluten Intolerence', '5996', 'Intergenic â€“ RGS1', 'AA', 'RGS1 belongs to a family of RGS genes. It attenuates the signaling activity of G-proteins, blocking the homing of Intra Epithelial Lymphocytes (IELs), and it is specifically expressed both in human small intestinal mucosa and in murine IELs, key players i', ' https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=5996', 'rs2816316'),
(87, 'Food Intolerances and Sensitivities ', 'Gluten Intolerence', '2524', 'FUT2', 'GG', 'The FUT2 gene encodes for a protein that influences the production of H antigen, which is an antigen essential for the synthesis of soluble A and B antigen. These antigens act as anchors and as sources of carbon for intestinal bacteria in the intestinal l', ' https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=2524', 'rs601338'),
(88, 'Food Intolerances and Sensitivities ', 'Lactose Intolerence', '4175', 'MCM6', 'CC,CC', 'A regulatory element (which is a specific DNA sequence), within the MCM6 gene, plays a key role in regulating the activity or expression of the LCT gene. The LCT gene encodes an enzyme, lactase, which helps in the metabolism of lactose. Reduced activity o', ' https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=4175', 'rs13910');

-- --------------------------------------------------------

--
-- Table structure for table `nutrition_snp`
--

CREATE TABLE `nutrition_snp` (
  `id` int(255) NOT NULL,
  `snp` varchar(255) NOT NULL,
  `pubmed_id` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `observed_genotype` varchar(255) NOT NULL,
  `others` varchar(255) NOT NULL,
  `variation_support_paper` varchar(255) NOT NULL,
  `clinical_significance` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nutrition_snp`
--

INSERT INTO `nutrition_snp` (`id`, `snp`, `pubmed_id`, `title`, `observed_genotype`, `others`, `variation_support_paper`, `clinical_significance`) VALUES
(1, 'rs17782313', 'PMC7478401', 'Association between MC4R rs17782313 genotype and obesity: A meta-analysis.', 'T>A/T>C', ' rs571312,  rs17782313,  rs489693,  rs11872992,  and rs8087522', 'https://www.ncbi.nlm.nih.gov/snp/rs17782313#publications', 'https://www.ncbi.nlm.nih.gov/clinvar?term=((227796[AlleleID]))'),
(2, 'rs7799039', '31292750', 'Leptin gene polymorphism (rs7799039; G2548A) is associated with changes in serum lipid concentrations during pregnancy: a prospective cohort study.', 'G>A/G>C', '', 'https://www.ncbi.nlm.nih.gov/snp/rs7799039#publications', 'NA'),
(3, 'rs17782313', 'PMC4232480', 'Association betweenÂ MC4RÂ rs17782313 Polymorphism and Overeating Behaviours', 'T>A/T>C', ' rs571312, rs17782313, rs489693, rs11872992, and rs8087522', 'https://www.ncbi.nlm.nih.gov/snp/rs17782313#publications', 'NA'),
(4, 'rs9939609', 'PMC6999843', 'Association of FTO rs9939609 polymorphism with serum leptin, insulin, adiponectin, and lipid profile in overweight adults', 'T>A', '', 'https://www.ncbi.nlm.nih.gov/snp/rs9939609#publications', 'NA'),
(5, 'rs307355', 'PMC5733356', 'Variation in the Sweet Taste Receptor Gene and Dietary Intake in a Swedish Middle-Aged Population', 'T>A/T>C', '', 'https://www.ncbi.nlm.nih.gov/snp/rs307355#publications', 'NA'),
(6, 'rs12033832', 'PMC5733356', 'Variation in the Sweet Taste Receptor Gene and Dietary Intake in a Swedish Middle-Aged Population', 'G>A/G>C', '', 'https://www.ncbi.nlm.nih.gov/snp/rs12033832#publications', 'NA'),
(7, 'rs10246939', 'PMC6770895', 'Variation in the TAS2R38 Bitterness Receptor Gene Was Associated with Food Consumption and Obesity Risk in Koreans', 'T>C', '', 'https://www.ncbi.nlm.nih.gov/snp/rs10246939#publications', 'https://www.ncbi.nlm.nih.gov/clinvar/variation/2906/'),
(8, 'rs1402064', 'PMC3683650', 'RGS6 variants are associated with dietary fat intake in Hispanics: the IRAS Family Study', 'T>A/T>C', '', 'https://www.ncbi.nlm.nih.gov/snp/rs1402064#publications', 'NA'),
(9, 'rs1761667', 'PMC3295590', 'CD36 genetics and the metabolic complications of obesity', 'G>A', '', 'https://www.ncbi.nlm.nih.gov/snp/rs1761667#publications', 'https://www.ncbi.nlm.nih.gov/clinvar?term=((480402[AlleleID]))'),
(10, 'rs4343', 'PMC5523633', 'High-Saturated-Fat Diet Increases Circulating Angiotensin-Converting Enzyme, Which Is Enhanced by the rs4343 Polymorphism Defining Persons at Risk of Nutrient-Dependent Increases of Blood Pressure.', 'G>A', '', 'https://www.ncbi.nlm.nih.gov/snp/rs4343#publications', 'https://www.ncbi.nlm.nih.gov/clinvar?term=((256309[AlleleID]))'),
(11, 'rs1042713', 'PMC6441509', 'Association of ADRB2 rs1042713 with Obesity and Obesity-Related Phenotypes and Its Interaction with Dietary Fat in Modulating Glycaemic Indices in Malaysian Adults', 'G>A/G>C', '', 'https://www.ncbi.nlm.nih.gov/snp/rs1042713#publications', 'https://www.ncbi.nlm.nih.gov/clinvar?term=((227753[AlleleID])OR(32781[AlleleID]))'),
(12, 'rs2241201', 'PMC2728650', 'Novel variants at KCTD10, MVK, and MMAB genes interact with dietary carbohydrates to modulate HDL-cholesterol concentrations in the Genetics of Lipid Lowering Drugs and Diet Network Study.', 'C>G', '', 'https://www.ncbi.nlm.nih.gov/snp/rs2241201#publications', 'https://www.ncbi.nlm.nih.gov/clinvar?term=((329129[AlleleID]))'),
(13, 'rs2297508', 'PMID:18692268', 'Association of sterol regulatory element-binding protein-1c gene polymorphism with type 2 diabetes mellitus, insulin resistance and blood lipid levels in Chinese population', 'C>G/C>T', 'rs2297508 ,rs11868035', 'https://www.ncbi.nlm.nih.gov/snp/rs2297508#publications', 'NA'),
(14, 'rs1800206', 'PMID:10828087', 'Molecular scanning of the human PPARa gene: association of the L162v mutation with hyperapobetalipoproteinemia', 'C>G', '', 'https://www.ncbi.nlm.nih.gov/snp/rs1800206#publications', 'https://www.ncbi.nlm.nih.gov/clinvar/variation/13701/'),
(15, 'rs1800571', 'PMID:9753710', 'Obesity associated with a mutation in a genetic regulator of adipocyte differentiation.', 'C>A', '', 'https://www.ncbi.nlm.nih.gov/snp/rs1800571#publications', 'https://www.ncbi.nlm.nih.gov/clinvar?term=((23169[AlleleID]))'),
(16, 'rs7903146', 'PMID:31691451', 'Association between allelic variants in the glucagon-like peptide 1 and cholecystokinin receptor genes with gastric emptying and glucose tolerance.', 'C>G/C>T', 'rs7903146, rs12255372 ,rs11196205', 'https://www.ncbi.nlm.nih.gov/pubmed/31691451', 'https://www.ncbi.nlm.nih.gov/snp/rs7903146#publications'),
(17, 'rs1421085', 'PMID:28626215', 'Genetic variation in the obesity gene FTO is not associated with decreased fat oxidation: the NEO study', 'T>C', '', 'https://pubmed.ncbi.nlm.nih.gov/28626215/', 'https://www.ncbi.nlm.nih.gov/clinvar/variation/217824/'),
(18, 'rs6230', 'PMID:28271036', 'Functional and clinical relevance of novel and known PCSK1 variants for childhood obesity and glucose metabolism ', 'A>G', 'rs35753085 ,rs725522, rs6232, rs6234', 'https://pubmed.ncbi.nlm.nih.gov/28271036/', 'https://www.ncbi.nlm.nih.gov/clinvar/variation/354656/'),
(19, 'rs915654', 'PMID:20080841', 'Additive effect of polymorphisms in the IL-6, LTA, and TNF-{alpha} genes and plasma fatty acid level modulate risk for the metabolic syndrome and its components ', 'T>A,C', 'rs1800629,  rs1800797', 'https://pubmed.ncbi.nlm.nih.gov/20080841/', 'NA'),
(20, 'rs137853162', 'PMID:25670821', 'Thyroid hormone resistance syndrome due to mutations in the thyroid hormone receptor Î± gene (THRA)', 'G>T', '', 'https://pubmed.ncbi.nlm.nih.gov/25670821/', 'https://www.ncbi.nlm.nih.gov/clinvar/variation/29913/'),
(21, 'rs483353013', 'PMID:26142438', 'Whole exome sequencing identifies LRP1 as a pathogenic gene in autosomal recessive keratosis pilaris atrophicans ', 'A>C,G', '', 'https://pubmed.ncbi.nlm.nih.gov/26142438/', 'https://www.ncbi.nlm.nih.gov/clinvar/variation/132834/'),
(22, 'rs4917', 'PMID:15806395', 'AHSG gene variant is associated with leanness among Swedish men ', 'T>C', '', 'https://pubmed.ncbi.nlm.nih.gov/15806395/', 'https://www.ncbi.nlm.nih.gov/clinvar?term=((31082[AlleleID]))'),
(23, 'rs13702', 'PMID:23246289', 'Gain-of-function lipoprotein lipase variant rs13702 modulates lipid traits through disruption of a microRNA-410 seed site ', 'T>A,C', '', 'https://pubmed.ncbi.nlm.nih.gov/23246289/', 'https://www.ncbi.nlm.nih.gov/clinvar?term=((48634[AlleleID]))'),
(24, 'rs3211938', 'PMID:18305138', 'Variants in the CD36 gene associate with the metabolic syndrome and high-density lipoprotein cholesterol ', 'T>G', '', 'https://pubmed.ncbi.nlm.nih.gov/18305138/', 'https://www.ncbi.nlm.nih.gov/clinvar?term=((28575[AlleleID]))'),
(25, 'rs1800795', 'PMID:18496509', 'AN IL-6 HAPLOTYPE ON HUMAN CHROMOSOME 7P21 CONFERS RISK FOR IMPAIRED RENAL FUNCTION IN TYPE 2 DIABETES', 'C>G,T', 'rs2069827 ,rs2069837 ,rs2069840, rs2069861', 'https://pubmed.ncbi.nlm.nih.gov/18496509/', 'NA'),
(26, 'rs202223831', 'PMID:26590203', 'Identification of Sequence Variation in the Apolipoprotein A2 Gene and Their Relationship with Serum High-Density Lipoprotein Cholesterol Levels', 'G>C', 'rs6413453, rs5082', 'https://pubmed.ncbi.nlm.nih.gov/26590203/', 'NA'),
(27, 'rs1801282', 'PMID:31252163', 'PPARA, PPARD and PPARG gene polymorphisms in patients with unstable angina ', 'C>G', 'rs2267668 ,rs1801282, rs8192678', 'https://pubmed.ncbi.nlm.nih.gov/31252163/', 'https://www.ncbi.nlm.nih.gov/clinvar?term=((135465[AlleleID]))'),
(28, 'rs1800571', 'PMID:9753710', 'Obesity associated with a mutation in a genetic regulator of adipocyte differentiation.', 'C>A', '', 'https://www.ncbi.nlm.nih.gov/snp/rs1800571#publications', 'https://www.ncbi.nlm.nih.gov/clinvar?term=((23169[AlleleID]))'),
(29, 'rs12255372', ' PMID: 17697858', 'The rs12255372(G/T) and rs7903146(C/T) polymorphisms of the TCF7L2 gene are associated with type 2 diabetes mellitus in Asian Indians', 'G>A,T', 'rs7903146', '', 'NA'),
(30, 'rs9939609', 'PMID:31996075', 'Association of FTO rs9939609 polymorphism with serum leptin, insulin, adiponectin, and lipid profile in overweight adults', 'T>AÂ ', '', 'https://pubmed.ncbi.nlm.nih.gov/31996075/', 'NA'),
(31, 'rs670', ' PMID: 31682461', 'Influence of rs670 variant of APOA1 gene on serum HDL response to an enriched-polyunsaturated vs. an enriched-monounsaturated fat hypocaloric diet', 'C>A,T ', '', 'https://pubmed.ncbi.nlm.nih.gov/31682461/', 'NA'),
(32, 'rs144526209 ', 'PMID:26306152', 'In silico Evaluation of Nonsynonymous Single Nucleotide Polymorphisms in the ADIPOQ Gene Associated with Diabetes, Obesity, and Inflammation', 'G>A', '', 'https://pubmed.ncbi.nlm.nih.gov/26306152/', 'NA'),
(33, 'rs693', 'PMID:32284661', 'Distribution of polymorphism rs693 of ApoB gene in a sample of Colombian Caribbeans ', 'G>A', '', 'https://pubmed.ncbi.nlm.nih.gov/32284661/', 'https://www.ncbi.nlm.nih.gov/clinvar?term=((133874[AlleleID]))'),
(34, 'rs5104 ', 'PMID:30631647', 'Functional polymorphisms of the APOA1/C3/A4/A5-ZPR1-BUD13 gene cluster are associated with dyslipidemia in a sex-specific pattern ', 'C>A,G,T', 'rs5072, rs5128, rs651821, rs2075294, rs10488698', 'https://pubmed.ncbi.nlm.nih.gov/30631647/', 'NA'),
(35, 'rs2303790', 'PMID:29632305', 'New Common and Rare Variants Influencing Metabolic Syndrome and Its Individual Components in a Korean Population', 'A>GÂ ', 'rs765547, rs3782889, rs11065756, rs10849915, rs2303790', 'https://pubmed.ncbi.nlm.nih.gov/29632305/', 'https://www.ncbi.nlm.nih.gov/clinvar?term=((32566[AlleleID]))'),
(36, 'rs699', 'PMID:31511791', 'Contribution of Four Polymorphisms in Renin-Angiotensin-Aldosterone-Related Genes to Hypertension in a Thai Population ', 'A>G', 'rs1799752, rs5186, rs1799998', 'https://pubmed.ncbi.nlm.nih.gov/31511791/', 'https://www.ncbi.nlm.nih.gov/clinvar?term=((33107[AlleleID]))'),
(37, 'rs174544', 'PMID:22591901', 'Interactions between dietary n-3 fatty acids and genetic variants and risk of disease ', 'C>A,G', 'rs174553, rs174556, rs174561, rs3834458, rs968567, rs99780', 'https://pubmed.ncbi.nlm.nih.gov/22591901/', 'NA'),
(38, 'rs2070666', 'PMID:27059980', 'APOC3 rs2070666 Is Associated with the Hepatic Steatosis Independently of PNPLA3 rs738409 in Chinese Han Patients with Nonalcoholic Fatty Liver Diseases', 'T>A,C', 'rs738409', 'https://pubmed.ncbi.nlm.nih.gov/27059980/', 'NA'),
(41, 'rs144526209 ', 'PMID:26306152', 'In silico Evaluation of Nonsynonymous Single Nucleotide Polymorphisms in the ADIPOQ Gene Associated with Diabetes, Obesity, and Inflammation', 'G>A', '', 'https://pubmed.ncbi.nlm.nih.gov/26306152/', 'NA'),
(42, 'rs10830963', ' PMID: 24005634', '[Involvement of melatonin MT2 receptor mutants in type 2 diabetes development]', 'C>G,T', '', 'https://pubmed.ncbi.nlm.nih.gov/24005634/', 'NA'),
(43, 'rs2817399', ' PMID: 20581741', 'Patterns of gene expression in the ductus arteriosus are related to environmental and genetic risk factors for persistent ductus patency', 'A>C,G,T', 'rs2817419, rs2635727', 'https://pubmed.ncbi.nlm.nih.gov/20581741/', 'NA'),
(44, 'rs9939609', 'PMID:31996075', 'Association of FTO rs9939609 polymorphism with serum leptin, insulin, adiponectin, and lipid profile in overweight adults', 'T>AÂ ', '', 'https://pubmed.ncbi.nlm.nih.gov/31996075/', 'NA'),
(45, 'rs9939609', 'PMID:31996075', 'Association of FTO rs9939609 polymorphism with serum leptin, insulin, adiponectin, and lipid profile in overweight adults', 'T>A', '', 'https://pubmed.ncbi.nlm.nih.gov/31996075/', 'NA'),
(46, 'rs954299 ', ' PMID: 25245582', 'Impact of NEGR1 genetic variability on psychological traits of patients with eating disorders', 'C>A,G', 'rs2422021, rs12740031,  rs10789322,  rs6659202, rs591540', 'https://pubmed.ncbi.nlm.nih.gov/25245582/', 'NA'),
(47, 'rs144526209 ', 'PMID:26306152', 'In silico Evaluation of Nonsynonymous Single Nucleotide Polymorphisms in the ADIPOQ Gene Associated with Diabetes, Obesity, and Inflammation', 'G>A', '', 'https://pubmed.ncbi.nlm.nih.gov/26306152/', 'NA'),
(48, 'rs1800571', 'PMID:9753710', 'Obesity associated with a mutation in a genetic regulator of adipocyte differentiation.', 'C>A', '', 'https://www.ncbi.nlm.nih.gov/snp/rs1800571#publications', 'https://www.ncbi.nlm.nih.gov/clinvar?term=((23169[AlleleID]))'),
(49, 'rs9939609', 'PMID:31996075', 'Association of FTO rs9939609 polymorphism with serum leptin, insulin, adiponectin, and lipid profile in overweight adults', 'T>A', '', 'https://pubmed.ncbi.nlm.nih.gov/31996075/', 'NA'),
(50, 'rs11645428', 'PMID:24586510', 'The relationship between BCMO1 gene variants and macular pigment optical density in persons with and without age-related macular degeneration', 'G>A', 'rs6420424, rs6564851 ,rs11645428, rs6420424, rs6564851', 'https://pubmed.ncbi.nlm.nih.gov/24586510/', 'NA'),
(51, 'rs11645428', 'PMID:24586510', 'The relationship between BCMO1 gene variants and macular pigment optical density in persons with and without age-related macular degeneration', 'G>A', 'rs6420424 ,rs6564851, rs11645428 ,rs6420424 ,rs6564851', 'https://pubmed.ncbi.nlm.nih.gov/24586510/', 'NA'),
(52, 'rs10766197', 'PMID:31313056', 'Common Polymorphisms in Genes Related to Vitamin D Metabolism Affect the Response of Cognitive Abilities to Vitamin D Supplementation', 'G>A,C,T', 'rs4588', 'https://pubmed.ncbi.nlm.nih.gov/31313056/', 'NA'),
(53, 'rs2282679', ' PMID: 31830090', 'Prevalence of vitamin D deficiency in women from southern Brazil and association with vitamin D-binding protein levels and GC-DBP gene polymorphisms', '', '', 'https://pubmed.ncbi.nlm.nih.gov/31830090/', 'NA'),
(54, 'rs1544410', ' PMID: 32407388', 'Association between the rs1544410 polymorphism in the vitamin D receptor (VDR) gene and insulin secretion after gestational diabetes mellitus', 'C>A,G,T', 'rs731236,  rs7975232,  rs10735810,  rs1544410', 'https://pubmed.ncbi.nlm.nih.gov/32407388/', 'NA'),
(55, 'rs5104', ' PMID: 19057464', 'Pharmacogenetic association of the APOA1/C3/A4/A5 gene cluster and lipid responses to fenofibrate: the genetics of lipid-lowering drugs and diet network study', 'C>A,G,T', 'rs3135506, rs4520, rs5128', 'https://pubmed.ncbi.nlm.nih.gov/19057464/', 'NA'),
(56, 'rs1761667', 'PMC3295590', 'CD36 genetics and the metabolic complications of obesity', 'G>A', '', 'https://www.ncbi.nlm.nih.gov/snp/rs1761667#publications', 'https://www.ncbi.nlm.nih.gov/clinvar?term=((480402[AlleleID]))'),
(57, 'rs4654748,', ' PMID: 29688875', 'Decreased serum pyridoxal levels in schizophrenia: meta-analysis and Mendelian randomization analysis', 'C>G,T', '', 'https://pubmed.ncbi.nlm.nih.gov/29688875/', 'NA'),
(58, 'rs4654748,', ' PMID: 29688875', 'Decreased serum pyridoxal levels in schizophrenia: meta-analysis and Mendelian randomization analysis', 'C>G,T', '', 'https://pubmed.ncbi.nlm.nih.gov/29688875/', 'NA'),
(59, 'rs868014', 'PMID:28171870', 'Methylene Tetrahydrofolate Reductase (MTHFR) rs868014 Polymorphism Regulated by miR-1203 Associates with Risk and Short Term Outcome of Ischemic Stroke', 'A>C,G', '', 'https://pubmed.ncbi.nlm.nih.gov/28171870/', 'NA'),
(60, 'rs16187', 'PMID:18098291', 'Folate metabolism genes, vegetable intake and renal cancer risk in central Europe', 'A>C', 'rs234706, rs1801181 ,rs12613 ,rs1801133, rs1801131 ,rs1805087', 'https://pubmed.ncbi.nlm.nih.gov/18098291/', 'NA'),
(61, 'rs2336573', 'PMID:20577008', 'Transcobalamin II receptor polymorphisms are associated with increased risk for neural tube defects', 'C>T', 'rs2336573, rs9426', 'https://pubmed.ncbi.nlm.nih.gov/20577008/', 'https://www.ncbi.nlm.nih.gov/clinvar/variation/136684/'),
(62, 'rs3737965', 'PMID:19683694', 'Genetic association study of putative functional single nucleotide polymorphisms of genes in folate metabolism and spina bifida', 'G>AÂ ', 'rs5742905, rs1643649, rs2853533', 'https://pubmed.ncbi.nlm.nih.gov/19683694/', 'NA'),
(63, 'rs1801222', 'PMID:26959381', 'Association study between genome-wide significant variants of vitamin B12 metabolism and gastric cancer in a han Chinese population', 'A>C,G', 'rs11254363, rs1801222, rs11254363', 'https://pubmed.ncbi.nlm.nih.gov/26959381/', 'https://www.ncbi.nlm.nih.gov/clinvar/variation/299538/'),
(64, 'rs601338Â ', 'Â PMID:29533703', 'FUT2 genotype and secretory status are not associated with fecal microbial composition and inferred function in healthy subjects', 'G>AÂ ', '', 'https://pubmed.ncbi.nlm.nih.gov/29533703/', 'https://www.ncbi.nlm.nih.gov/clinvar/variation/12945/'),
(65, 'rs855791Â ', 'PMID:32422234', 'Study the association of transmembrane serine protease 6 gene polymorphisms with iron deficiency status in Saudi Arabia', 'A>G,TÂ ', 'rs2111833', 'https://pubmed.ncbi.nlm.nih.gov/32422234/', 'https://www.ncbi.nlm.nih.gov/clinvar/variation/262725/'),
(66, 'rs1799945', 'PMID:32379996', 'Genotype scores in energy and iron-metabolising genes are higher in elite endurance athletes than in non-athlete controls', 'C>G,T', 'rs17602729, rs8192678, rs1800562', 'https://pubmed.ncbi.nlm.nih.gov/32379996/', 'https://www.ncbi.nlm.nih.gov/clinvar/variation/10/'),
(67, 'rs1695', 'PMID:32494361', 'Association of single-nucleotide polymorphisms in antioxidant genes and their gene-gene interactions with risk of male infertility in a Chinese population', 'A>GÂ ', 'Rs1800566 , rs4880,  rs1571858, rs3814309, rs7483, rs11807', 'https://pubmed.ncbi.nlm.nih.gov/32494361/', 'https://www.ncbi.nlm.nih.gov/clinvar/variation/37340/'),
(68, 'rs854560', 'PMID:31762361', 'A meta-analysis of the relationship between paraoxonase 1 polymorphisms and cancer', 'A>C,G,N,T', ' rs662', 'https://pubmed.ncbi.nlm.nih.gov/31762361/', 'https://www.ncbi.nlm.nih.gov/clinvar/variation/13736/'),
(69, ' rs4880', 'PMID:17192491', 'A functional polymorphism in the manganese superoxide dismutase gene and diabetic nephropathy', 'A>G', ' rs4880', 'https://pubmed.ncbi.nlm.nih.gov/17192491/', ''),
(70, 'rs4880', 'PMID:30191955', 'Association of polymorphisms in genes coding for antioxidant enzymes and human male infertility', 'A>G', '', 'https://pubmed.ncbi.nlm.nih.gov/30191955/', ''),
(71, 'rs1050450', 'PMID:31576926', 'The association between genetic polymorphism of glutathione peroxidase 1 (rs1050450) and keratoconus in a Turkish population', 'G>A', 'rs1001179, rs4880', 'https://pubmed.ncbi.nlm.nih.gov/31576926/', 'NA'),
(72, 'rs777676129', 'PMID:31089432', 'Hereditary Hypercalcemia Caused by a Homozygous Pathogenic Variant in the CYP24A1 Gene: A Case Report and Review of the Literature.', 'CTT>-', '', 'http://europepmc.org/article/MED/31089432', ''),
(73, 'rs4143094Â ', 'PMID:18037162', 'Patterns of GATA3 and IL13 gene polymorphisms associated with childhood rhinitis and atopy in a birth cohort', 'T>A,G', 'rs1058240, rs379568', 'https://pubmed.ncbi.nlm.nih.gov/18037162/', 'NA'),
(74, 'rs4142110', 'PMID:25081328', 'Association study of DGKH gene polymorphisms with calcium oxalate stone in Chinese population', 'T>A,C', 'rs180870, rs17646069', 'https://pubmed.ncbi.nlm.nih.gov/25081328/', 'NA'),
(75, 'rs11977526', 'PMID:31884074', 'Circulating Levels of Insulin-like Growth Factor 1 and Insulin-like Growth Factor Binding Protein 3 Associate With Risk of Colorectal Cancer Based on Serologic and Mendelian Randomization Analyses', 'G>A,T', '', 'https://pubmed.ncbi.nlm.nih.gov/31884074/', 'NA'),
(76, 'rs9740', 'PMID:28630081', ' Calcium-Sensing Receptor Genotype and Response to Cinacalcet in Patients Undergoing Hemodialysis', 'A>G', '', 'https://pubmed.ncbi.nlm.nih.gov/28630081/', 'NA'),
(77, 'rs9740', 'PMID:28630081', ' Calcium-Sensing Receptor Genotype and Response to Cinacalcet in Patients Undergoing Hemodialysis', 'A>G', '', 'https://pubmed.ncbi.nlm.nih.gov/28630081/', 'NA'),
(78, 'rs9740', 'PMID:28630081', ' Calcium-Sensing Receptor Genotype and Response to Cinacalcet in Patients Undergoing Hemodialysis', 'A>G', '', 'https://pubmed.ncbi.nlm.nih.gov/28630081/', 'NA'),
(79, 'rs2108622', 'PMID:32327994', 'A Pharmacogenetically Guided Acenocoumarol Dosing Algorithm for Chilean Patients: A Discovery Cohort Study', 'C>G,T', 'rs7294, rs11676382, rs1045642, rs1799853, rs429358', 'https://pubmed.ncbi.nlm.nih.gov/32327994/', 'NA'),
(80, 'rs1639', 'PMID:20203262', 'Warfarin pharmacogenetics: a single VKORC1 polymorphism is predictive of dose across 3 racial groups', 'T>C,G', 'rs1639', 'https://pubmed.ncbi.nlm.nih.gov/20203262/', 'NA'),
(81, 'rs9493857', 'PMID:19461886', 'Adaptive variation regulates the expression of the human SGK1 gene in response to stress', 'A>G,T', '', 'https://pubmed.ncbi.nlm.nih.gov/19461886/', 'NA'),
(82, 'rs762551Â ', 'PMID:22492992', 'Caffeine intake and CYP1A2 variants associated with high caffeine intake protect non-smokers from hypertension', 'C>A,GÂ ', 'rs1133323, rs1378942', 'https://pubmed.ncbi.nlm.nih.gov/22492992/', 'NA'),
(83, 'rs762551Â ', 'PMID:22492992', 'Caffeine intake and CYP1A2 variants associated with high caffeine intake protect non-smokers from hypertension', 'C>A,GÂ ', 'rs1133323, rs1378942', 'https://pubmed.ncbi.nlm.nih.gov/22492992/', 'NA'),
(84, 'rs1464510', 'PMID:28208589', 'Association of LPP and TAGAP Polymorphisms with Celiac Disease Risk: A Meta-Analysis', 'C>A,G,T', 'rs1464510', 'https://pubmed.ncbi.nlm.nih.gov/28208589/', 'NA'),
(85, 'rs7194', 'PMID:30502936', 'Fine mapping the MHC region identified rs4997052 as a new variant associated with nonobstructive azoospermia in Han Chinese males', 'G>A,C', 'rs4997052', 'https://pubmed.ncbi.nlm.nih.gov/30502936/', 'NA'),
(86, 'rs842644', 'PMID:18466468', 'Analysis of variation in NF-kappaB genes and expression levels of NF-kappaB-regulated molecules', 'G>A,C,T', '', 'https://pubmed.ncbi.nlm.nih.gov/18466468/', 'NA'),
(87, 'rs2816316', 'PMID:19693089', 'Four novel coeliac disease regions replicated in an association study of a Swedish-Norwegian family cohort', 'C>A,G', 'rs6441961, rs17810564, rs9811792 ,rs917997', 'https://pubmed.ncbi.nlm.nih.gov/19693089/', 'NA'),
(88, 'rs601338', 'PMID:31591105', 'Longitudinal Pattern of First-Phase Insulin Response Is Associated With Genetic Variants Outside the Class II HLA Region in Children With Multiple Autoantibodies', 'G>A', 'rs3825932 ,rs1701704, rs45450798', 'https://pubmed.ncbi.nlm.nih.gov/31591105/', 'NA'),
(89, 'rs13910', 'PMID:17159977', 'Convergent adaptation of human lactase persistence in Africa and Europe', 'C>T', 'rs14010, rs13915', 'https://pubmed.ncbi.nlm.nih.gov/17159977/', 'NA');

-- --------------------------------------------------------

--
-- Table structure for table `panel`
--

CREATE TABLE `panel` (
  `id` int(255) NOT NULL,
  `phenotype` varchar(255) NOT NULL,
  `traits` varchar(255) NOT NULL,
  `gene_id` varchar(255) NOT NULL,
  `gene` varchar(255) NOT NULL,
  `genotype` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `all_publication` varchar(255) NOT NULL,
  `snp` varchar(255) NOT NULL,
  `panel_info_id` int(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `panel`
--

INSERT INTO `panel` (`id`, `phenotype`, `traits`, `gene_id`, `gene`, `genotype`, `description`, `all_publication`, `snp`, `panel_info_id`) VALUES
(1, 'Regulation of eating', 'Emotional eating dependence', '4160', 'MC4R', 'TC', 'The protein encoded by this gene is a membrane-bound receptor and member of the melanocortin receptor family. The encoded protein interacts with adrenocorticotropic and MSH hormones and is mediated by G proteins. This is an intronless gene. Defects in thi', ' https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=4160', 'rs17782313', 1),
(2, 'Regulation of eating', 'Snacking pattern', '3952', 'near LEP', 'GG', 'This gene encodes a protein that is secreted by white adipocytes into the circulation and plays a major role in the regulation of energy homeostasis. Circulating leptin binds to the leptin receptor in the brain, which activates downstream signaling pathwa', 'https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=3952', 'rs7799039', 1),
(3, 'Regulation of eating', 'Snacking pattern', '4160', 'MC4R', 'TC', 'The protein encoded by this gene is a membrane-bound receptor and member of the melanocortin receptor family. The encoded protein interacts with adrenocorticotropic and MSH hormones and is mediated by G proteins. This is an intronless gene. Defects in thi', 'https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=4160', 'rs17782313', 1),
(4, 'Regulation of eating', 'Satiety response', '79068', 'FTO', 'TT', 'The FTO gene is one of the genes that has been associated with obesity risk. It is believed to influence satiety and hunger and regulate energy homeostasis. Studies suggest that the FTO gene may play an important role in regulating food intake; variations', 'https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=79068', 'rs9939609', 1),
(5, 'Taste Perception', 'Sweet taste perception', '83756', 'TAS1R3', 'CC, CC', 'There are differences in the sensitivity, perception, and preference for tastes. Taste sensitivity can be attributed to the threshold of activated taste cells. The sweet taste perception is primarily mediated by the TAS1R2 (taste receptor type 1 member 2)', 'https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=83756', 'rs307355', 1),
(6, 'Taste Perception', 'Sweet taste perception', '80834', 'TAS1R2', 'CC, GT', 'There are differences in the sensitivity, perception, and preference for tastes. Taste sensitivity can be attributed to the threshold of activated taste cells. The sweet taste perception is primarily mediated by the TAS1R2 (taste receptor type 1 member 2)', 'https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=80834', 'rs12033832', 1),
(7, 'Taste Perception', 'Bitter taste perception', '5726', 'TAS2R38', 'TT, CC', 'The TAS2R38 gene encodes a G protein-coupled receptor, which acts as a taste receptor, and is mediated by certain chemicals like PROP and phenylthiocarbamide; these chemicals bind to the receptor and signal taste perception. Vegetables like broccoli, cabb', 'https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=5726', 'rs10246939', 1),
(8, 'Taste Perception', 'Fatty food preference', '9628', 'RGS6', 'GA, CT, GA, TC', 'The RGS6 gene is a member of the G7 superfamily; it plays a role in the regulation of G-protein signaling and is believed to have an interplay with opioid receptors (G-protein coupled receptors). While under stress, there is an increase in the cortisol le', 'https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=9628', 'rs1402064', 1),
(10, 'Macronutrient Requirements', 'Response to Carbohydrates', '1636', 'ACE', 'GG', 'The ACE gene provides instructions for making the angiotensin-converting enzyme. The renin-angiotensin system (RAS) is involved in most of the pathological processes that lead to pathogenesis of diabetes. Angiotensin II (Ang II) is the major peptide of RA', 'https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=1636', 'rs4343', 1),
(11, 'Macronutrient Requirements', 'Response to Carbohydrates', '154', 'ADRB2', 'CC', 'This gene encodes beta-2-adrenergic receptor which is a member of the G protein-coupled receptor superfamily. Receptors involved in catecholamine function have a role in thermogenesis and energy balance, thus affecting obesity and glucose metabolism. Adre', 'https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=154', 'rs1042713', 1),
(12, 'Macronutrient Requirements', 'Response to Carbohydrates', '326625', 'MMAB', 'CC', 'The MMAB gene encodes an enzyme that aids in the production of adenosylcobalamin, which is important for the breakdown of cholesterol. The MMAB gene may play a role in modulating concentrations of HDL-C which can affect the risk of developing dyslipidemia', 'https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=326625', 'rs2241201', 1),
(13, 'Macronutrient Requirements', 'Response to Carbohydrates', '6720', 'SREBP1C', 'TT, CC', 'Sterol regulatory element binding protein-1c (SREBP1C) is a transcription factor involved in the regulation of lipid, glucose metabolism and in sterol homoeostasis in cells. SREBP1C expression is regulated by nutritional stimuli like polyunsaturated fatty', 'https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=6720', 'rs2297508', 1),
(14, 'Macronutrient Requirements', 'Response to Carbohydrates', '5465', 'PPARA', 'GG', 'The shift between glucose storage and synthesis during fasting and feeding is essential for maintaining blood glucose levels. PPARA contributes to the adaptation of hepatic carbohydrate metabolism during the fasting-to-fed and fed-to-fasting transition. H', 'https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=5465', 'rs1800206', 1),
(15, 'Macronutrient Requirements', 'Response to Carbohydrates', '5468', 'PPARG', 'CC', 'PPAR (peroxisome proliferator-activated receptor) is involved in regulating the carbohydrate and lipid homeostasis, adipogenesis, fatty acid storage, and maintaining energy balance. The PPARG gene encodes a protein (PPAR-gamma) which plays a role in the r', 'https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=5468', 'rs1800571', 1),
(16, 'Macronutrient Requirements', 'Response to Carbohydrates', '6934', 'TCF7L2', 'AA, CC, GG', 'The TCF7L2 gene encodes a protein that influences the secretion of a hormone (glucagon-like peptide-1) which has insulinotropic effects (stimulates insulin secretion) and plays a role in regulating blood glucose homeostasis. Carbohydrate digestion causes ', 'https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=6934', 'rs7903146', 1),
(17, 'Macronutrient Requirements', 'Response to Carbohydrates', '79068', 'FTO', 'CC', 'The expression of the FTO gene in the hypothalamus is indicative of its potential role in regulating energy homeostasis by modifying the appetite. Carbohydrates influence various aspects such as body weight, appetite, and endocrinology. Carbohydrates inta', ' https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=79068', 'rs1421085', 1),
(18, 'Macronutrient Requirements', 'Response to saturated fats', '5122', 'PCSK1', 'GG', 'The PCSK1 gene encodes for a protein that has been associated with the cleavage of proteins that play a role in the hypothalamic regulation of appetite. Variations in the PCSK1 gene have been associated with the modulation of fasting fat oxidation.', 'https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=5122', 'rs6230', 1),
(19, 'Macronutrient Requirements', 'Response to saturated fats', '4049', 'LTA', 'TA', 'Variations that influence the function of the gene have been identified in several genes, including the lymphotoxin-Î± (LTA) gene, which affects the cytokine production. The variations may interact with dietary fatty acids to regulate the production and s', 'https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=4049', 'rs915654', 1),
(20, 'Macronutrient Requirements', 'Response to saturated fats', '7067', 'THRA', 'AA', 'The THRA gene encodes for a protein which is a nuclear hormone receptor for triiodothyronine (T3 thyroid hormone). It is shown to mediate certain activities of the thyroid hormone. Thyroid hormones, Triiodothyronine (T3) and tetraiodothyronine (T4) hormon', ' https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=7067', 'rs137853162', 1),
(21, 'Macronutrient Requirements', 'Response to saturated fats', '4035', 'LRP1', 'CT', 'The LRP1 gene encodes a protein, which is involved in the formation of a mature receptor. This receptor is involved in many cellular processes including intracellular signaling, lipid homeostasis, and clearance of apoptotic cells (biochemical events leadi', ' https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=4035', 'rs483353013', 1),
(22, 'Macronutrient Requirements', 'Response to saturated fats', '197', 'AHSG', 'CC', 'The AHSG gene is involved in the regulation of body fat and insulin sensitivity. Variations in the AHSG gene has been shown to be associated with reduced plasma levels as well as lower body fat.', ' https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=197', 'rs4917', 1),
(23, 'Macronutrient Requirements', 'Response to saturated fats', '4023', 'LPL', 'CC', 'Lipoprotein lipase (LPL), associated with the luminal endothelial surface of arteries and capillaries of peripheral tissues,it is a key enzyme in the metabolism of lipoproteins. It hydrolyzes plasma lipoprotein triglycerides into free fatty acids and glyc', ' https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=4023', 'rs13702', 1),
(24, 'Macronutrient Requirements', 'Response to saturated fats', '948', 'CD36', 'AG', 'The CD36 gene encodes for a membrane-bound protein; CD36 is expressed in several cell types, including fat cells and muscle cells. The primary function of this protein is in the uptake of fatty acids into cells for energy generation. CD36 and FA signaling', ' https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=948', 'rs3211938', 1),
(25, 'Macronutrient Requirements', 'Response to saturated fats', '3569', 'IL6', 'AA, CC, GG', 'The IL6 gene encodes for a protein that has a wide variety of biological functions. Following muscle contraction, it functions to increase the breakdown of fats and to improve insulin resistance.', ' https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=3569', 'rs1800795', 1),
(26, 'Macronutrient Requirements', 'Response to saturated fats', '336', 'APOA2', 'TT', 'The APOA2 gene encodes for a protein, apolipoprotein (apo-) A-II, which is the second most abundant protein of the high-density lipoprotein particles. Saturated fat can stimulate the production for APOA2 production in the postprandial phase (after eating ', ' https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=336', 'rs202223831', 1),
(27, 'Macronutrient Requirements', 'Response to saturated fats', '5465', 'PPARA', 'TT', 'The PPARA gene plays a key role in lipid homeostasis. The activation of PPARA contributes to the clearance of triglyceride-rich lipoproteins, improves HDL cholesterol concentrations, and reduces the oxidation of LDL cholesterol, thus influencing the activ', ' https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=5465', 'rs1801282', 1),
(28, 'Macronutrient Requirements', 'Response to saturated fats', '5468', 'PPARG', 'CC', 'This gene encodes a member of the peroxisome proliferator-activated receptor (PPAR) subfamily of nuclear receptors. The protein encoded by this gene is PPAR-gamma and is a regulator of adipocyte differentiation. PPARG regulates fatty acid storage and gluc', 'https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=5468', 'rs1800571', 1),
(29, 'Macronutrient Requirements', 'Response to saturated fats', '6934', 'TCF7L2', 'GG', 'This gene encodes a transcription factor that influences the secretion of GLP 1 (glucagon like peptide 1) which is insulinotropic (stimulates insulin secretion) and has a role in blood glucose homeostasis. TCF7L2 is expressed in subcutaneous and visceral ', 'https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=6934', 'rs12255372', 1),
(30, 'Macronutrient Requirements', 'Response to saturated fats', '79068', 'FTO', 'TT', 'The FTO gene has strong associations with conditions such as obesity and type II diabetes. It is known to contribute to the regulation of body size and body fat accumulation, specifically, thermogenesis (heat production), and adipocyte (fat cell) differen', ' https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=79068', 'rs9939609', 1),
(31, 'Macronutrient Requirements', 'Response to Monosaturated fats', '335', 'APOA1', 'AA', 'The APOA1 gene encodes for a protein, apolipoprotein A-I (ApoA-1), which is the major protein component of high-density lipoprotein (HDL) in the plasma. High levels of HDL can reduce the risk of developing cardiovascular conditions. HDL transports cholest', ' https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=335', 'rs670', 1),
(32, 'Macronutrient Requirements', 'Response to Monosaturated fats', '9370', 'ADIPOQ', 'GG, GG', 'The ADIPOQ gene encodes for a protein, adiponectin, which is a plasma protein secreted by the visceral adipose tissue. Adiponectin increases insulin sensitivity and tissue fat oxidation, resulting in reduced circulating fatty acid levels. Therefore, varia', ' https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=9370', 'rs144526209 ', 1),
(33, 'Macronutrient Requirements', 'Response to Monosaturated fats', '338', 'APOB', 'AA', 'The APOB gene encodes for a protein, apolipoprotein B, which is the main apolipoprotein of chylomicrons and low-density lipoproteins. This protein is involved in transporting fat molecules, including cholesterol in the bloodstream.', ' https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=338', 'rs693', 1),
(35, 'Macronutrient Requirements', 'Response to polysaturated fats', '1071', 'CETP', 'GT, CT', 'The CETP gene encodes for a protein that is involved in the transfer of cholesteryl ester from high-density lipoprotein (HDL) to other lipoproteins. Variations in the CETP gene may influence the responses of lipids (fats) and lipoproteins to the alteratio', ' https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=1071', 'rs2303790', 1),
(36, 'Macronutrient Requirements', 'Response to polysaturated fats', '183', 'AGT', 'CT', 'The AGT gene encodes for a protein, angiotensinogen, which plays a role in the regulation of blood pressure and fluid balance in the body. Variations in the AGT gene have found to be associated with concentrations of total cholesterol and low-density lipo', ' https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=183', 'rs699', 1),
(37, 'Macronutrient Requirements', 'Response to polysaturated fats', '3992', 'FADS1', 'GG, TT', 'This gene encodes the enzyme Fatty acid desaturase 1(Î”5 desaturase) which catalyses the conversion of omega-3 & omega-6 parent fatty acids namely alpha-linolenic acid (ALA) & linoleic acid (LA) to their longer chain derivatives (eicosapentaenoic acid or ', ' https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=3992', 'rs174544', 1),
(38, 'Macronutrient Requirements', 'Response to polysaturated fats', '345', 'APOC3', 'CC', 'The APOC3 gene encodes for a protein, apolipoprotein C-3 (APOC3), which is a component of very-low-density lipoprotein (VLDL). This gene plays a role in inhibiting the activities of proteins that are required for the hydrolysis of triglycerides and theref', ' https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=345', 'rs2070666', 1),
(39, 'Macronutrient Requirements', 'Response to polysaturated fats', '116519', 'APOA5', 'AA, TT', 'The APOA5 gene encodes for a protein, apolipoprotein A-5 (APOA5), which is a major component of VLDL (very low-density lipoprotein), chylomicrons, and HDL (high-density lipoprotein). APOA5 functions as an activator of a key enzyme in triglyceride cataboli', ' https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=116519', 'rs662799', 1),
(40, 'Macronutrient Requirements', 'Response to polysaturated fats', '9370', 'ADIPOQ', 'TT', 'The ADIPOQ gene encodes for a protein, adiponectin, which is a plasma protein secreted by the visceral adipose tissue. Adiponectin increases insulin sensitivity and tissue fat oxidation, resulting in reduced circulating fatty acid levels. Therefore, varia', ' https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=9370', 'rs144526209 ', 1),
(41, 'Macronutrient Requirements', 'Response to protein', '4544', 'MTNR1B', 'CG', 'This gene encodes one of two high affinity forms of a receptor for melatonin, the primary hormone secreted by the pineal gland. Given that melatonin is a hormone involved in energy balance and body weight status, this gene is implicated in body weight reg', ' https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=4544', 'rs10830963', 1),
(42, 'Macronutrient Requirements', 'Response to protein', '7021', 'TFAP2B', 'AA', 'The TFAP2B gene encodes a protein (transcription factor AP-2Î²), which in conjunction with other proteins from the AP-2 family binds to specific regions of DNA and helps to control the activity of genes involved in the stimulation of cell proliferation an', ' https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=7021', 'rs2817399', 1),
(43, 'Macronutrient Requirements', 'Response to protein', '79068', 'FTO', 'TT', 'This gene encodes for a nuclear protein of the AlkB related non-haem iron and 2-oxoglutarate-dependent oxygenase superfamily. RNA demethylase that mediates oxidative demethylation of different RNA species, such as mRNAs, tRNAs and snRNAs, and acts as a re', ' https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=79068', 'rs9939609', 1),
(44, 'Macronutrient Requirements', 'Response to fibre', '79068', 'FTO', 'AA', 'The FTO gene has strong associations with conditions such as obesity and type II diabetes. Studies have shown that people with certain variations in the FTO gene are found to have beneficial results with increased fiber intake; variations may also be asso', ' https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=79068', 'rs9939609', 1),
(46, 'Weight Management and Maintenance', 'Ability to maintain the weight loss', '9370', 'ADIPOQ', 'GG', 'The ADIPOQ gene encodes for a protein, adiponectin, which is produced in the adipose tissue (fat tissue). Variations in the ADIPOQ gene can influence the production of adiponectin, thereby affecting energy intake and body weight.', ' https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=9370', 'rs144526209 ', 1),
(47, 'Weight Management and Maintenance', 'Ability to maintain the weight loss', '5468', 'PPARG', 'CC', 'PPAR (peroxisome proliferator-activated receptor) is involved in regulating the carbohydrate and lipid homeostasis, adipogenesis, fatty acid storage, and maintaining energy balance. The PPARG gene encodes a protein (PPAR-gamma) which plays a role in the r', 'https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=5468', 'rs1800571', 1),
(48, 'Weight Management and Maintenance', 'Ability to maintain the weight loss', '79068', 'FTO', 'GG', 'The FTO gene has strong associations with conditions such as obesity and type II diabetes. Variations in the FTO gene may influence weight regain', ' https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=79068', 'rs9939609', 1),
(49, 'Micronutrient Requirements', 'Vitamin A Metabolism', '53630', 'near BCMO1', 'GG, TG', 'The protein encoded by this gene is a key enzyme in beta-carotene metabolism to vitamin A. It catalyzes the oxidative cleavage of beta-carotene into two retinal molecules. Vitamin A metabolism is important for vital processes such as vision, embryonic dev', ' https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=53630', 'rs11645428', 1),
(50, 'Micronutrient Requirements', 'Vitamin A Metabolism', '53630', 'BCMO1', 'AA, AA, CC', 'The protein encoded by this gene is a key enzyme in beta-carotene metabolism to vitamin A. It catalyzes the oxidative cleavage of beta-carotene into two retinal molecules. Vitamin A metabolism is important for vital processes such as vision, embryonic dev', ' https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=53630', 'rs11645428', 1),
(52, 'Micronutrient Requirements', 'Vitamin D Metabolism', '2638', 'GC', 'AC, GT', 'The GC gene encodes the vitamin D binding protein (DBP) that belongs to the albumin gene family. The encoded protein has multiple functions and is found in the plasma, ascitic fluid, cerebrospinal fluid, and on the surface of many cell types. The protein ', ' https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=2638', 'rs2282679', 1),
(53, 'Micronutrient Requirements', 'Vitamin D Metabolism', '7421', 'VDR', 'TT, CA', 'Vitamin D can either be acquired through dietary intake or made in the body with help from sunlight exposure. The VDR gene encodes the vitamin D receptor (VDR) protein which plays a role in the bodyâ€™s response to vitamin D. It binds to calcitriol, the a', ' https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=7421', 'rs1544410', 1),
(54, 'Micronutrient Requirements', 'Vitamin E Metabolism', '337', 'APOA4', 'TT', 'APOA4 encodes an apoprotein secreted by the intestine and associated with chylomicrons. APOA4 gene has a role in chylomicrons and VLDL secretion and catabolism. Required for efficient activation of lipoprotein lipase by ApoC-II.', ' https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=337', 'rs5104', 1),
(55, 'Micronutrient Requirements', 'Vitamin E Metabolism', '948', 'CD36', 'AG, GG, TT', 'Vitamin E is a fat-soluble vitamin and an antioxidant. The protein encoded by the CD36 gene is involved in the uptake of long-chain fatty acids and therefore may also influence the plasma concentrations of vitamin E.', 'https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=948', 'rs1761667', 1),
(56, 'Micronutrient Requirements', 'Vitamin B6 Metabolism', '84224', 'Near NBPF3', 'CT', 'This variant is located near the NBPF3 gene. Variants of the NBPF3 gene were found to be associated with the plasma concentration of pyridoxal phosphate (PLP). PLP is an active form of vitamin B6, which is involved in several enzymatic reactions.', ' https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=84224', 'rs4654748,', 1),
(57, 'Micronutrient Requirements', 'Vitamin B6 Metabolism', '84224', 'NBPF3', 'CT', 'The variant in this gene has been associated with decreased levels of Vitamin B6 (pyridoxine). Pyridoxine, one of the forms of Vitamin B6, strengthens the protein collagenâ€™s regenerative ability which is much needed for rendering us flexibility and skin', ' https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=84224', 'rs4654748,', 1),
(58, 'Micronutrient Requirements', 'Vitamin B9 Metabolism', '4524', 'MTHFR', 'AA', 'The MTHFR gene encodes for an enzyme (methylenetetrahydrofolate reductase) which has a role in the processing of amino acids. This enzyme is involved in the chemical reaction involving the vitamin B9 (folate). It plays a role in the conversion of a form o', ' https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=4524', 'rs868014', 1),
(59, 'Micronutrient Requirements', 'Vitamin B12 Metabolism', '4552', 'MTRR', 'GG', 'Methionine synthase reductase also known as MSR is an enzyme that in humans is encoded by the MTRR gene. The Methionine Synthase Reductase (MTRR) gene primarily acts in the reductive regeneration of cobalamin (vitamin B12). Cob(I)alamin is a cofactor that', ' https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=4552', 'rs16187', 1),
(60, 'Micronutrient Requirements', 'Vitamin B12 Metabolism', '51293', 'CD320', 'CC', 'This gene encodes the transcobalamin receptor that is expressed at the cell surface. It mediates the cellular uptake of transcobalamin bound cobalamin (vitamin B12), and is involved in B-cell proliferation and immunoglobulin secretion. Mutations in this g', 'https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=51293', 'rs2336573', 1),
(61, 'Micronutrient Requirements', 'Vitamin B12 Metabolism', '4548', 'MTR', 'AA', 'The MTR gene provides instructions for making an enzyme called methionine synthase. This enzyme plays a role in processing amino acids, the building blocks of proteins. To function properly, methionine synthase requires methylcobalamin (a form of vitamin ', 'https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=4548', 'rs3737965', 1),
(62, 'Micronutrient Requirements', 'Vitamin B12 Metabolism', '8029', 'CUBN', 'AA', 'Vitamin B12 is not synthesized in the body and is obtained from dietary intake. The CUBN gene encodes a protein, cubilin, which is the intestinal receptor for vitamin B12 (also called cobalamin). Therefore, the CUBN gene plays a crucial role in vitamin B1', 'https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=8029', 'rs1801222', 1),
(63, 'Micronutrient Requirements', 'Vitamin B12 Metabolism', '2524', 'FUT2', 'AA, GG', 'The FUT2 gene encodes for an enzyme (galactoside 2-alpha-L-fucosyltransferase 2), which influences the synthesis of H-antigen. The H-antigen plays a role in the attachment of H. pylori bacteria to the gastric mucosa; H. pylori infection can cause decrease', 'https://www.ncbi.nlm.nih.gov/gene/2524#bibliography', 'rs601338Â ', 1),
(64, 'Micronutrient Requirements', 'Iron Metabolism', '164656', 'TMPRSS6', 'CT,AG', 'The TMPRSS6 gene encodes a protein called matriptase-2, which influences the levels of the protein, hepcidin. Hepcidin is important for the regulation of iron balance in the body. Low levels of iron in the blood, can decrease the production of hepcidin wh', 'https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=164656', 'rs855791Â ', 1),
(65, 'Micronutrient Requirements', 'Iron Metabolism', '3077', 'HFE', 'CC, GG', 'The HFE gene encodes for a membrane protein that binds to the transferrin receptor 1 protein. This process prevents the receptor from binding to another protein called transferrin. However, binding of transferrin receptor 1 to transferrin is required for ', 'https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=3077', 'rs1799945', 1),
(66, 'Micronutrient Requirements', 'Antioxidant Metabolism', '2950', 'GSTP1', 'AG, CC', 'Glutathione S-transferase P1 is an enzyme encoded by the GSTP1 gene. This enzyme plays a key role in the process of detoxification and the antioxidant system.', ' https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=2950', 'rs1695', 1),
(67, 'Micronutrient Requirements', 'Antioxidant Metabolism', '5444', 'PON1', 'TC', 'This gene encodes a member of the paraoxonase family of enzymes and exhibits lactonase and ester hydrolase activity. The HDL associated esterase/lactonase paraoxonase 1 (PON1) is implicated in contributing to the anti-inflammatory and antioxidant activiti', ' https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=5444', 'rs854560', 1),
(68, 'Micronutrient Requirements', 'Antioxidant Metabolism', '6648', 'SOD2', 'TT', 'The SOD2 gene encodes an enzyme, manganese-dependent superoxide dismutase (MnSOD), which binds to the superoxide byproducts and helps in their conversion to hydrogen peroxide and diatomic oxygen. Superoxides are harmful to the body as they can damage DNA ', ' https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=6648', ' rs4880', 1),
(69, 'Micronutrient Requirements', 'Antioxidant Metabolism', '847', 'CAT', 'TC', 'The CAT gene encodes an enzyme, catalase, which is a key antioxidant enzyme that plays a role in the bodyâ€™s defense against oxidative stress. Catalase is involved in the conversion of hydrogen peroxide to water and oxygen which reduces the toxic effects', ' https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=847', 'rs4880', 1),
(70, 'Micronutrient Requirements', 'Antioxidant Metabolism', '2876', 'GPX1', 'CT, CC', 'The GPX1 gene encodes an enzyme (glutathione peroxidase 1 - GPX1), which is an important antioxidant enzyme in the body. Glutathione peroxidase plays a role in the breakdown of hydrogen peroxide and thereby helps to protect cells against oxidative damage.', ' https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=2876', 'rs1050450', 1),
(71, 'Micronutrient Requirements', 'Calcium Metabolism', '1591', 'CYP24A1', 'AA', 'CYP24A1 encodes a cytochrome P450 enzyme that hydroxylates 1,25-(OH)2D, into metabolites targeted for degradation and appears to be one of the central regulator of 1,25-(OH)2-D metabolism. CYP24A1 is highly regulated by its own substrate 1,25(OH)2-D, as w', ' https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=1591', 'rs777676129', 1),
(72, 'Micronutrient Requirements', 'Calcium Metabolism', '2625', 'Near GATA3', 'CT', 'GATA3 belongs to a family of zinc finger transcription factors that are involved in vertebrate embryonic development. In addition, GATA3 is also expressed in the developing parathyroids, inner ear, and kidneys. GATA3 is implicated in monogenic disorders o', ' https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=2625', 'rs4143094Â ', 1),
(73, 'Micronutrient Requirements', 'Calcium Metabolism', '160851', 'Near DGKH', 'GG', 'This gene encodes a member of the diacylglycerol kinase (DGK) enzyme family. Members of this family are involved in regulating intracellular concentrations of diacylglycerol and phosphatidic acid. ', ' https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=160851', 'rs4142110', 1),
(74, 'Micronutrient Requirements', 'Calcium Metabolism', '2646', 'GCKR', 'CC', 'Glucokinase (GCK) controls the rate of glucose metabolism in pancreatic cells, and its activity is rate-limiting for insulin secretion. ', ' https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=2646', 'rs11977526', 1),
(75, 'Micronutrient Requirements', 'Calcium Metabolism', '846', 'CASR', 'AA, GG', 'The CASR gene encodes for a protein (calcium-sensing receptor - CaSR), which is abundant in the cells within the parathyroid glands and the renal tubules of kidneys. The parathyroid hormone produced by the parathyroid glands helps in increasing blood calc', 'https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=846', 'rs9740', 1),
(76, 'Micronutrient Requirements', 'Phosphate Metabolism', '846', 'CASR', 'AA', 'The CASR gene encodes for a protein (calcium-sensing receptor - CaSR), which is abundant in the cells within the parathyroid glands and the renal tubules of kidneys. Phosphate levels depend on parathyroid hormone (PTH) level and CaSR influences PTH levels', 'https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=846', 'rs9740', 1),
(77, 'Micronutrient Requirements', 'Magnesium Metabolism', '846', 'CASR', 'AA', 'The CASR gene encodes for a protein (calcium-sensing receptor - CaSR), which is abundant in the cells within the parathyroid glands and the renal tubules of kidneys. The CaSR protein can bind to magnesium, which can inhibit the secretion of parathyroid ho', 'https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=846', 'rs9740', 1),
(78, 'Micronutrient Requirements', 'Vitamin K metabolism', '8529', 'CYP4F2', 'CT', 'The cytochrome P450 proteins are monooxygenases which catalyze many reactions involved in drug metabolism and synthesis of cholesterol, steroids and other lipids. CYP4F2 regulates the bioavailability of vitamin E and vitamin K, a cofactor that is critical', ' https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=8529', 'rs2108622', 1),
(79, 'Micronutrient Requirements', 'Vitamin K metabolism', '79001', 'VKORC1', 'CC', 'The VKORC1 gene provides instructions for making a vitamin K epoxide reductase enzyme. The VKORC1 enzyme is made primarily in the liver. It spans the membrane of a cellular structure called the endoplasmic reticulum, which is involved with protein process', ' https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=79001', 'rs1639', 1),
(80, 'Food Intolerances and Sensitivities ', 'Salt Metabolism', '6446', 'near SGK1', 'CT', 'This variant is located near the SGK1 gene. The SGK1 gene encodes a protein that plays a key role in cellular stress response. It is also known to activate certain sodium, chloride, and potassium channels, which suggests its involvement in regulating seve', ' https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=6446', 'rs9493857', 1),
(81, 'Food Intolerances and Sensitivities ', 'Caffeine Metabolism', '1544', 'Near CYP1A2', 'CC, CC', 'Encodes a type of human polycyclic aromatic hydrocarbon-inducible cytochrome P450(CYP1) family called the CYP1A2 enzyme. CYP1A2 demethylates caffeine molecules into substances like paraxanthine & methylxanthine(which can be excreted through urine), reduci', ' https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=1544', 'rs762551Â ', 1),
(82, 'Food Intolerances and Sensitivities ', 'Caffeine Metabolism', '6446', 'CYP1A2', 'AA', 'The CYP1A2 gene encodes a liver enzyme that is critical for the breakdown of caffeine molecules into substances that can be excreted through urine. This function influences the amount of caffeine its effects in the body. Variations in the CYP1A2 gene can ', ' https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=1544', 'rs762551Â ', 1),
(83, 'Food Intolerances and Sensitivities ', 'Gluten Intolerence', '117289', 'TAGAP', 'AA', 'The TAGAP gene encodes for a protein that may play a role in Rho GTPase-activating protein. Variations in the TAGAP gene may lead to an increase in GTPase activity, which can eventually result in the development of celiac disease (CD). Variants of this ge', ' https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=117289', 'rs1464510', 1),
(84, 'Food Intolerances and Sensitivities ', 'Gluten Intolerence', '3122', 'HLA-DRA', 'TT', 'The HLA-DRA gene (major histocompatibility complex, class II, DR alpha) encodes for a protein that plays a crucial role in the regulation of the immune system. Variations may lead to an immune response in response to gluten intake and may influence an ind', ' https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=3122', 'rs7194', 1),
(85, 'Food Intolerances and Sensitivities ', 'Gluten Intolerence', '5966', 'REL', 'AA', 'The REL gene encodes a protein, c-Rel, which belongs to the Rel/NF-ÎºB transcription factor family, which helps in the regulation of genes involved in important processes like inflammation and immune response. Studies have suggested an association of c-RE', ' https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=5966', 'rs842644', 1),
(86, 'Food Intolerances and Sensitivities ', 'Gluten Intolerence', '5996', 'Intergenic â€“ RGS1', 'AA', 'RGS1 belongs to a family of RGS genes. It attenuates the signaling activity of G-proteins, blocking the homing of Intra Epithelial Lymphocytes (IELs), and it is specifically expressed both in human small intestinal mucosa and in murine IELs, key players i', ' https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=5996', 'rs2816316', 1),
(87, 'Food Intolerances and Sensitivities ', 'Gluten Intolerence', '2524', 'FUT2', 'GG', 'The FUT2 gene encodes for a protein that influences the production of H antigen, which is an antigen essential for the synthesis of soluble A and B antigen. These antigens act as anchors and as sources of carbon for intestinal bacteria in the intestinal l', ' https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=2524', 'rs601338', 1),
(88, 'Food Intolerances and Sensitivities ', 'Lactose Intolerence', '4175', 'MCM6', 'CC,CC', 'A regulatory element (which is a specific DNA sequence), within the MCM6 gene, plays a key role in regulating the activity or expression of the LCT gene. The LCT gene encodes an enzyme, lactase, which helps in the metabolism of lactose. Reduced activity o', ' https://www.ncbi.nlm.nih.gov/pubmed?LinkName=gene_pubmed&from_uid=4175', 'rs13910', 1);

-- --------------------------------------------------------

--
-- Table structure for table `panel_details`
--

CREATE TABLE `panel_details` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `panel` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `panel_details`
--

INSERT INTO `panel_details` (`id`, `user_id`, `panel`) VALUES
(1, 2, 'Nutrition'),
(2, 2, 'Food Intolerance'),
(3, 2, 'Fitness'),
(4, 2, 'Health'),
(5, 2, 'Skin'),
(6, 2, 'Hair'),
(7, 4, 'Nutrition'),
(8, 4, 'Food Intolerance'),
(9, 4, 'Fitness'),
(10, 4, 'Health'),
(11, 4, 'Skin'),
(12, 4, 'Hair'),
(13, 6, 'Nutrition'),
(14, 6, 'Food Intolerance'),
(15, 6, 'Fitness'),
(16, 6, 'Health'),
(17, 6, 'Skin'),
(18, 6, 'Hair');

-- --------------------------------------------------------

--
-- Table structure for table `panel_info`
--

CREATE TABLE `panel_info` (
  `id` int(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `fa_fa_icon` varchar(255) NOT NULL,
  `no_of_snp` varchar(255) NOT NULL,
  `no_of_transit` varchar(255) NOT NULL,
  `organism` varchar(255) NOT NULL,
  `build` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `panel_info`
--

INSERT INTO `panel_info` (`id`, `Name`, `fa_fa_icon`, `no_of_snp`, `no_of_transit`, `organism`, `build`) VALUES
(1, 'Nutrition', 'fa fa-pizza-slice', '89', '7', 'Human', 'HG38'),
(2, 'Food Intolerance ', 'fa fa-ice-cream', '23', '4', 'Human', 'SG38'),
(3, 'Fitness', 'fa fa-bicycle', '', '', '', ''),
(4, 'Health', 'fa fa-heartbeat', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `panel_snp`
--

CREATE TABLE `panel_snp` (
  `id` int(255) NOT NULL,
  `snp` varchar(255) NOT NULL,
  `pubmed_id` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `observed_genotype` varchar(255) NOT NULL,
  `others` varchar(255) NOT NULL,
  `variation_support_paper` varchar(255) NOT NULL,
  `clinical_significance` varchar(255) NOT NULL,
  `panel_info_id` int(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `panel_snp`
--

INSERT INTO `panel_snp` (`id`, `snp`, `pubmed_id`, `title`, `observed_genotype`, `others`, `variation_support_paper`, `clinical_significance`, `panel_info_id`) VALUES
(1, 'rs17782313', 'PMC7478401', 'Association between MC4R rs17782313 genotype and obesity: A meta-analysis.', 'T>A/T>C', ' rs571312,  rs17782313,  rs489693,  rs11872992,  and rs8087522', 'https://www.ncbi.nlm.nih.gov/snp/rs17782313#publications', 'https://www.ncbi.nlm.nih.gov/clinvar?term=((227796[AlleleID]))', 1),
(2, 'rs7799039', '31292750', 'Leptin gene polymorphism (rs7799039; G2548A) is associated with changes in serum lipid concentrations during pregnancy: a prospective cohort study.', 'G>A/G>C', '', 'https://www.ncbi.nlm.nih.gov/snp/rs7799039#publications', 'NA', 1),
(3, 'rs17782313', 'PMC4232480', 'Association betweenÂ MC4RÂ rs17782313 Polymorphism and Overeating Behaviours', 'T>A/T>C', ' rs571312, rs17782313, rs489693, rs11872992, and rs8087522', 'https://www.ncbi.nlm.nih.gov/snp/rs17782313#publications', 'NA', 1),
(4, 'rs9939609', 'PMC6999843', 'Association of FTO rs9939609 polymorphism with serum leptin, insulin, adiponectin, and lipid profile in overweight adults', 'T>A', '', 'https://www.ncbi.nlm.nih.gov/snp/rs9939609#publications', 'NA', 1),
(5, 'rs307355', 'PMC5733356', 'Variation in the Sweet Taste Receptor Gene and Dietary Intake in a Swedish Middle-Aged Population', 'T>A/T>C', '', 'https://www.ncbi.nlm.nih.gov/snp/rs307355#publications', 'NA', 1),
(6, 'rs12033832', 'PMC5733356', 'Variation in the Sweet Taste Receptor Gene and Dietary Intake in a Swedish Middle-Aged Population', 'G>A/G>C', '', 'https://www.ncbi.nlm.nih.gov/snp/rs12033832#publications', 'NA', 1),
(7, 'rs10246939', 'PMC6770895', 'Variation in the TAS2R38 Bitterness Receptor Gene Was Associated with Food Consumption and Obesity Risk in Koreans', 'T>C', '', 'https://www.ncbi.nlm.nih.gov/snp/rs10246939#publications', 'https://www.ncbi.nlm.nih.gov/clinvar/variation/2906/', 1),
(8, 'rs1402064', 'PMC3683650', 'RGS6 variants are associated with dietary fat intake in Hispanics: the IRAS Family Study', 'T>A/T>C', '', 'https://www.ncbi.nlm.nih.gov/snp/rs1402064#publications', 'NA', 1),
(9, 'rs1761667', 'PMC3295590', 'CD36 genetics and the metabolic complications of obesity', 'G>A', '', 'https://www.ncbi.nlm.nih.gov/snp/rs1761667#publications', 'https://www.ncbi.nlm.nih.gov/clinvar?term=((480402[AlleleID]))', 1),
(10, 'rs4343', 'PMC5523633', 'High-Saturated-Fat Diet Increases Circulating Angiotensin-Converting Enzyme, Which Is Enhanced by the rs4343 Polymorphism Defining Persons at Risk of Nutrient-Dependent Increases of Blood Pressure.', 'G>A', '', 'https://www.ncbi.nlm.nih.gov/snp/rs4343#publications', 'https://www.ncbi.nlm.nih.gov/clinvar?term=((256309[AlleleID]))', 1),
(11, 'rs1042713', 'PMC6441509', 'Association of ADRB2 rs1042713 with Obesity and Obesity-Related Phenotypes and Its Interaction with Dietary Fat in Modulating Glycaemic Indices in Malaysian Adults', 'G>A/G>C', '', 'https://www.ncbi.nlm.nih.gov/snp/rs1042713#publications', 'https://www.ncbi.nlm.nih.gov/clinvar?term=((227753[AlleleID])OR(32781[AlleleID]))', 1),
(12, 'rs2241201', 'PMC2728650', 'Novel variants at KCTD10, MVK, and MMAB genes interact with dietary carbohydrates to modulate HDL-cholesterol concentrations in the Genetics of Lipid Lowering Drugs and Diet Network Study.', 'C>G', '', 'https://www.ncbi.nlm.nih.gov/snp/rs2241201#publications', 'https://www.ncbi.nlm.nih.gov/clinvar?term=((329129[AlleleID]))', 1),
(13, 'rs2297508', 'PMID:18692268', 'Association of sterol regulatory element-binding protein-1c gene polymorphism with type 2 diabetes mellitus, insulin resistance and blood lipid levels in Chinese population', 'C>G/C>T', 'rs2297508 ,rs11868035', 'https://www.ncbi.nlm.nih.gov/snp/rs2297508#publications', 'NA', 1),
(14, 'rs1800206', 'PMID:10828087', 'Molecular scanning of the human PPARa gene: association of the L162v mutation with hyperapobetalipoproteinemia', 'C>G', '', 'https://www.ncbi.nlm.nih.gov/snp/rs1800206#publications', 'https://www.ncbi.nlm.nih.gov/clinvar/variation/13701/', 1),
(15, 'rs1800571', 'PMID:9753710', 'Obesity associated with a mutation in a genetic regulator of adipocyte differentiation.', 'C>A', '', 'https://www.ncbi.nlm.nih.gov/snp/rs1800571#publications', 'https://www.ncbi.nlm.nih.gov/clinvar?term=((23169[AlleleID]))', 1),
(16, 'rs7903146', 'PMID:31691451', 'Association between allelic variants in the glucagon-like peptide 1 and cholecystokinin receptor genes with gastric emptying and glucose tolerance.', 'C>G/C>T', 'rs7903146, rs12255372 ,rs11196205', 'https://www.ncbi.nlm.nih.gov/pubmed/31691451', 'https://www.ncbi.nlm.nih.gov/snp/rs7903146#publications', 1),
(17, 'rs1421085', 'PMID:28626215', 'Genetic variation in the obesity gene FTO is not associated with decreased fat oxidation: the NEO study', 'T>C', '', 'https://pubmed.ncbi.nlm.nih.gov/28626215/', 'https://www.ncbi.nlm.nih.gov/clinvar/variation/217824/', 1),
(18, 'rs6230', 'PMID:28271036', 'Functional and clinical relevance of novel and known PCSK1 variants for childhood obesity and glucose metabolism ', 'A>G', 'rs35753085 ,rs725522, rs6232, rs6234', 'https://pubmed.ncbi.nlm.nih.gov/28271036/', 'https://www.ncbi.nlm.nih.gov/clinvar/variation/354656/', 1),
(19, 'rs915654', 'PMID:20080841', 'Additive effect of polymorphisms in the IL-6, LTA, and TNF-{alpha} genes and plasma fatty acid level modulate risk for the metabolic syndrome and its components ', 'T>A,C', 'rs1800629,  rs1800797', 'https://pubmed.ncbi.nlm.nih.gov/20080841/', 'NA', 1),
(20, 'rs137853162', 'PMID:25670821', 'Thyroid hormone resistance syndrome due to mutations in the thyroid hormone receptor Î± gene (THRA)', 'G>T', '', 'https://pubmed.ncbi.nlm.nih.gov/25670821/', 'https://www.ncbi.nlm.nih.gov/clinvar/variation/29913/', 1),
(21, 'rs483353013', 'PMID:26142438', 'Whole exome sequencing identifies LRP1 as a pathogenic gene in autosomal recessive keratosis pilaris atrophicans ', 'A>C,G', '', 'https://pubmed.ncbi.nlm.nih.gov/26142438/', 'https://www.ncbi.nlm.nih.gov/clinvar/variation/132834/', 1),
(22, 'rs4917', 'PMID:15806395', 'AHSG gene variant is associated with leanness among Swedish men ', 'T>C', '', 'https://pubmed.ncbi.nlm.nih.gov/15806395/', 'https://www.ncbi.nlm.nih.gov/clinvar?term=((31082[AlleleID]))', 1),
(23, 'rs13702', 'PMID:23246289', 'Gain-of-function lipoprotein lipase variant rs13702 modulates lipid traits through disruption of a microRNA-410 seed site ', 'T>A,C', '', 'https://pubmed.ncbi.nlm.nih.gov/23246289/', 'https://www.ncbi.nlm.nih.gov/clinvar?term=((48634[AlleleID]))', 1),
(24, 'rs3211938', 'PMID:18305138', 'Variants in the CD36 gene associate with the metabolic syndrome and high-density lipoprotein cholesterol ', 'T>G', '', 'https://pubmed.ncbi.nlm.nih.gov/18305138/', 'https://www.ncbi.nlm.nih.gov/clinvar?term=((28575[AlleleID]))', 1),
(25, 'rs1800795', 'PMID:18496509', 'AN IL-6 HAPLOTYPE ON HUMAN CHROMOSOME 7P21 CONFERS RISK FOR IMPAIRED RENAL FUNCTION IN TYPE 2 DIABETES', 'C>G,T', 'rs2069827 ,rs2069837 ,rs2069840, rs2069861', 'https://pubmed.ncbi.nlm.nih.gov/18496509/', 'NA', 1),
(26, 'rs202223831', 'PMID:26590203', 'Identification of Sequence Variation in the Apolipoprotein A2 Gene and Their Relationship with Serum High-Density Lipoprotein Cholesterol Levels', 'G>C', 'rs6413453, rs5082', 'https://pubmed.ncbi.nlm.nih.gov/26590203/', 'NA', 1),
(27, 'rs1801282', 'PMID:31252163', 'PPARA, PPARD and PPARG gene polymorphisms in patients with unstable angina ', 'C>G', 'rs2267668 ,rs1801282, rs8192678', 'https://pubmed.ncbi.nlm.nih.gov/31252163/', 'https://www.ncbi.nlm.nih.gov/clinvar?term=((135465[AlleleID]))', 1),
(28, 'rs1800571', 'PMID:9753710', 'Obesity associated with a mutation in a genetic regulator of adipocyte differentiation.', 'C>A', '', 'https://www.ncbi.nlm.nih.gov/snp/rs1800571#publications', 'https://www.ncbi.nlm.nih.gov/clinvar?term=((23169[AlleleID]))', 1),
(29, 'rs12255372', ' PMID: 17697858', 'The rs12255372(G/T) and rs7903146(C/T) polymorphisms of the TCF7L2 gene are associated with type 2 diabetes mellitus in Asian Indians', 'G>A,T', 'rs7903146', '', 'NA', 1),
(30, 'rs9939609', 'PMID:31996075', 'Association of FTO rs9939609 polymorphism with serum leptin, insulin, adiponectin, and lipid profile in overweight adults', 'T>AÂ ', '', 'https://pubmed.ncbi.nlm.nih.gov/31996075/', 'NA', 1),
(31, 'rs670', ' PMID: 31682461', 'Influence of rs670 variant of APOA1 gene on serum HDL response to an enriched-polyunsaturated vs. an enriched-monounsaturated fat hypocaloric diet', 'C>A,T ', '', 'https://pubmed.ncbi.nlm.nih.gov/31682461/', 'NA', 1),
(32, 'rs144526209 ', 'PMID:26306152', 'In silico Evaluation of Nonsynonymous Single Nucleotide Polymorphisms in the ADIPOQ Gene Associated with Diabetes, Obesity, and Inflammation', 'G>A', '', 'https://pubmed.ncbi.nlm.nih.gov/26306152/', 'NA', 1),
(33, 'rs693', 'PMID:32284661', 'Distribution of polymorphism rs693 of ApoB gene in a sample of Colombian Caribbeans ', 'G>A', '', 'https://pubmed.ncbi.nlm.nih.gov/32284661/', 'https://www.ncbi.nlm.nih.gov/clinvar?term=((133874[AlleleID]))', 1),
(34, 'rs5104 ', 'PMID:30631647', 'Functional polymorphisms of the APOA1/C3/A4/A5-ZPR1-BUD13 gene cluster are associated with dyslipidemia in a sex-specific pattern ', 'C>A,G,T', 'rs5072, rs5128, rs651821, rs2075294, rs10488698', 'https://pubmed.ncbi.nlm.nih.gov/30631647/', 'NA', 1),
(35, 'rs2303790', 'PMID:29632305', 'New Common and Rare Variants Influencing Metabolic Syndrome and Its Individual Components in a Korean Population', 'A>GÂ ', 'rs765547, rs3782889, rs11065756, rs10849915, rs2303790', 'https://pubmed.ncbi.nlm.nih.gov/29632305/', 'https://www.ncbi.nlm.nih.gov/clinvar?term=((32566[AlleleID]))', 1),
(36, 'rs699', 'PMID:31511791', 'Contribution of Four Polymorphisms in Renin-Angiotensin-Aldosterone-Related Genes to Hypertension in a Thai Population ', 'A>G', 'rs1799752, rs5186, rs1799998', 'https://pubmed.ncbi.nlm.nih.gov/31511791/', 'https://www.ncbi.nlm.nih.gov/clinvar?term=((33107[AlleleID]))', 1),
(37, 'rs174544', 'PMID:22591901', 'Interactions between dietary n-3 fatty acids and genetic variants and risk of disease ', 'C>A,G', 'rs174553, rs174556, rs174561, rs3834458, rs968567, rs99780', 'https://pubmed.ncbi.nlm.nih.gov/22591901/', 'NA', 1),
(38, 'rs2070666', 'PMID:27059980', 'APOC3 rs2070666 Is Associated with the Hepatic Steatosis Independently of PNPLA3 rs738409 in Chinese Han Patients with Nonalcoholic Fatty Liver Diseases', 'T>A,C', 'rs738409', 'https://pubmed.ncbi.nlm.nih.gov/27059980/', 'NA', 1),
(41, 'rs144526209 ', 'PMID:26306152', 'In silico Evaluation of Nonsynonymous Single Nucleotide Polymorphisms in the ADIPOQ Gene Associated with Diabetes, Obesity, and Inflammation', 'G>A', '', 'https://pubmed.ncbi.nlm.nih.gov/26306152/', 'NA', 1),
(42, 'rs10830963', ' PMID: 24005634', '[Involvement of melatonin MT2 receptor mutants in type 2 diabetes development]', 'C>G,T', '', 'https://pubmed.ncbi.nlm.nih.gov/24005634/', 'NA', 1),
(43, 'rs2817399', ' PMID: 20581741', 'Patterns of gene expression in the ductus arteriosus are related to environmental and genetic risk factors for persistent ductus patency', 'A>C,G,T', 'rs2817419, rs2635727', 'https://pubmed.ncbi.nlm.nih.gov/20581741/', 'NA', 1),
(44, 'rs9939609', 'PMID:31996075', 'Association of FTO rs9939609 polymorphism with serum leptin, insulin, adiponectin, and lipid profile in overweight adults', 'T>AÂ ', '', 'https://pubmed.ncbi.nlm.nih.gov/31996075/', 'NA', 1),
(45, 'rs9939609', 'PMID:31996075', 'Association of FTO rs9939609 polymorphism with serum leptin, insulin, adiponectin, and lipid profile in overweight adults', 'T>A', '', 'https://pubmed.ncbi.nlm.nih.gov/31996075/', 'NA', 1),
(46, 'rs954299 ', ' PMID: 25245582', 'Impact of NEGR1 genetic variability on psychological traits of patients with eating disorders', 'C>A,G', 'rs2422021, rs12740031,  rs10789322,  rs6659202, rs591540', 'https://pubmed.ncbi.nlm.nih.gov/25245582/', 'NA', 1),
(47, 'rs144526209 ', 'PMID:26306152', 'In silico Evaluation of Nonsynonymous Single Nucleotide Polymorphisms in the ADIPOQ Gene Associated with Diabetes, Obesity, and Inflammation', 'G>A', '', 'https://pubmed.ncbi.nlm.nih.gov/26306152/', 'NA', 1),
(48, 'rs1800571', 'PMID:9753710', 'Obesity associated with a mutation in a genetic regulator of adipocyte differentiation.', 'C>A', '', 'https://www.ncbi.nlm.nih.gov/snp/rs1800571#publications', 'https://www.ncbi.nlm.nih.gov/clinvar?term=((23169[AlleleID]))', 1),
(49, 'rs9939609', 'PMID:31996075', 'Association of FTO rs9939609 polymorphism with serum leptin, insulin, adiponectin, and lipid profile in overweight adults', 'T>A', '', 'https://pubmed.ncbi.nlm.nih.gov/31996075/', 'NA', 1),
(50, 'rs11645428', 'PMID:24586510', 'The relationship between BCMO1 gene variants and macular pigment optical density in persons with and without age-related macular degeneration', 'G>A', 'rs6420424, rs6564851 ,rs11645428, rs6420424, rs6564851', 'https://pubmed.ncbi.nlm.nih.gov/24586510/', 'NA', 1),
(51, 'rs11645428', 'PMID:24586510', 'The relationship between BCMO1 gene variants and macular pigment optical density in persons with and without age-related macular degeneration', 'G>A', 'rs6420424 ,rs6564851, rs11645428 ,rs6420424 ,rs6564851', 'https://pubmed.ncbi.nlm.nih.gov/24586510/', 'NA', 1),
(52, 'rs10766197', 'PMID:31313056', 'Common Polymorphisms in Genes Related to Vitamin D Metabolism Affect the Response of Cognitive Abilities to Vitamin D Supplementation', 'G>A,C,T', 'rs4588', 'https://pubmed.ncbi.nlm.nih.gov/31313056/', 'NA', 1),
(53, 'rs2282679', ' PMID: 31830090', 'Prevalence of vitamin D deficiency in women from southern Brazil and association with vitamin D-binding protein levels and GC-DBP gene polymorphisms', '', '', 'https://pubmed.ncbi.nlm.nih.gov/31830090/', 'NA', 1),
(54, 'rs1544410', ' PMID: 32407388', 'Association between the rs1544410 polymorphism in the vitamin D receptor (VDR) gene and insulin secretion after gestational diabetes mellitus', 'C>A,G,T', 'rs731236,  rs7975232,  rs10735810,  rs1544410', 'https://pubmed.ncbi.nlm.nih.gov/32407388/', 'NA', 1),
(55, 'rs5104', ' PMID: 19057464', 'Pharmacogenetic association of the APOA1/C3/A4/A5 gene cluster and lipid responses to fenofibrate: the genetics of lipid-lowering drugs and diet network study', 'C>A,G,T', 'rs3135506, rs4520, rs5128', 'https://pubmed.ncbi.nlm.nih.gov/19057464/', 'NA', 1),
(56, 'rs1761667', 'PMC3295590', 'CD36 genetics and the metabolic complications of obesity', 'G>A', '', 'https://www.ncbi.nlm.nih.gov/snp/rs1761667#publications', 'https://www.ncbi.nlm.nih.gov/clinvar?term=((480402[AlleleID]))', 1),
(57, 'rs4654748,', ' PMID: 29688875', 'Decreased serum pyridoxal levels in schizophrenia: meta-analysis and Mendelian randomization analysis', 'C>G,T', '', 'https://pubmed.ncbi.nlm.nih.gov/29688875/', 'NA', 1),
(58, 'rs4654748,', ' PMID: 29688875', 'Decreased serum pyridoxal levels in schizophrenia: meta-analysis and Mendelian randomization analysis', 'C>G,T', '', 'https://pubmed.ncbi.nlm.nih.gov/29688875/', 'NA', 1),
(59, 'rs868014', 'PMID:28171870', 'Methylene Tetrahydrofolate Reductase (MTHFR) rs868014 Polymorphism Regulated by miR-1203 Associates with Risk and Short Term Outcome of Ischemic Stroke', 'A>C,G', '', 'https://pubmed.ncbi.nlm.nih.gov/28171870/', 'NA', 1),
(60, 'rs16187', 'PMID:18098291', 'Folate metabolism genes, vegetable intake and renal cancer risk in central Europe', 'A>C', 'rs234706, rs1801181 ,rs12613 ,rs1801133, rs1801131 ,rs1805087', 'https://pubmed.ncbi.nlm.nih.gov/18098291/', 'NA', 1),
(61, 'rs2336573', 'PMID:20577008', 'Transcobalamin II receptor polymorphisms are associated with increased risk for neural tube defects', 'C>T', 'rs2336573, rs9426', 'https://pubmed.ncbi.nlm.nih.gov/20577008/', 'https://www.ncbi.nlm.nih.gov/clinvar/variation/136684/', 1),
(62, 'rs3737965', 'PMID:19683694', 'Genetic association study of putative functional single nucleotide polymorphisms of genes in folate metabolism and spina bifida', 'G>AÂ ', 'rs5742905, rs1643649, rs2853533', 'https://pubmed.ncbi.nlm.nih.gov/19683694/', 'NA', 1),
(63, 'rs1801222', 'PMID:26959381', 'Association study between genome-wide significant variants of vitamin B12 metabolism and gastric cancer in a han Chinese population', 'A>C,G', 'rs11254363, rs1801222, rs11254363', 'https://pubmed.ncbi.nlm.nih.gov/26959381/', 'https://www.ncbi.nlm.nih.gov/clinvar/variation/299538/', 1),
(64, 'rs601338Â ', 'Â PMID:29533703', 'FUT2 genotype and secretory status are not associated with fecal microbial composition and inferred function in healthy subjects', 'G>AÂ ', '', 'https://pubmed.ncbi.nlm.nih.gov/29533703/', 'https://www.ncbi.nlm.nih.gov/clinvar/variation/12945/', 1),
(65, 'rs855791Â ', 'PMID:32422234', 'Study the association of transmembrane serine protease 6 gene polymorphisms with iron deficiency status in Saudi Arabia', 'A>G,TÂ ', 'rs2111833', 'https://pubmed.ncbi.nlm.nih.gov/32422234/', 'https://www.ncbi.nlm.nih.gov/clinvar/variation/262725/', 1),
(66, 'rs1799945', 'PMID:32379996', 'Genotype scores in energy and iron-metabolising genes are higher in elite endurance athletes than in non-athlete controls', 'C>G,T', 'rs17602729, rs8192678, rs1800562', 'https://pubmed.ncbi.nlm.nih.gov/32379996/', 'https://www.ncbi.nlm.nih.gov/clinvar/variation/10/', 1),
(67, 'rs1695', 'PMID:32494361', 'Association of single-nucleotide polymorphisms in antioxidant genes and their gene-gene interactions with risk of male infertility in a Chinese population', 'A>GÂ ', 'Rs1800566 , rs4880,  rs1571858, rs3814309, rs7483, rs11807', 'https://pubmed.ncbi.nlm.nih.gov/32494361/', 'https://www.ncbi.nlm.nih.gov/clinvar/variation/37340/', 1),
(68, 'rs854560', 'PMID:31762361', 'A meta-analysis of the relationship between paraoxonase 1 polymorphisms and cancer', 'A>C,G,N,T', ' rs662', 'https://pubmed.ncbi.nlm.nih.gov/31762361/', 'https://www.ncbi.nlm.nih.gov/clinvar/variation/13736/', 1),
(69, ' rs4880', 'PMID:17192491', 'A functional polymorphism in the manganese superoxide dismutase gene and diabetic nephropathy', 'A>G', ' rs4880', 'https://pubmed.ncbi.nlm.nih.gov/17192491/', '', 1),
(70, 'rs4880', 'PMID:30191955', 'Association of polymorphisms in genes coding for antioxidant enzymes and human male infertility', 'A>G', '', 'https://pubmed.ncbi.nlm.nih.gov/30191955/', '', 1),
(71, 'rs1050450', 'PMID:31576926', 'The association between genetic polymorphism of glutathione peroxidase 1 (rs1050450) and keratoconus in a Turkish population', 'G>A', 'rs1001179, rs4880', 'https://pubmed.ncbi.nlm.nih.gov/31576926/', 'NA', 1),
(72, 'rs777676129', 'PMID:31089432', 'Hereditary Hypercalcemia Caused by a Homozygous Pathogenic Variant in the CYP24A1 Gene: A Case Report and Review of the Literature.', 'CTT>-', '', 'http://europepmc.org/article/MED/31089432', '', 1),
(73, 'rs4143094Â ', 'PMID:18037162', 'Patterns of GATA3 and IL13 gene polymorphisms associated with childhood rhinitis and atopy in a birth cohort', 'T>A,G', 'rs1058240, rs379568', 'https://pubmed.ncbi.nlm.nih.gov/18037162/', 'NA', 1),
(74, 'rs4142110', 'PMID:25081328', 'Association study of DGKH gene polymorphisms with calcium oxalate stone in Chinese population', 'T>A,C', 'rs180870, rs17646069', 'https://pubmed.ncbi.nlm.nih.gov/25081328/', 'NA', 1),
(75, 'rs11977526', 'PMID:31884074', 'Circulating Levels of Insulin-like Growth Factor 1 and Insulin-like Growth Factor Binding Protein 3 Associate With Risk of Colorectal Cancer Based on Serologic and Mendelian Randomization Analyses', 'G>A,T', '', 'https://pubmed.ncbi.nlm.nih.gov/31884074/', 'NA', 1),
(76, 'rs9740', 'PMID:28630081', ' Calcium-Sensing Receptor Genotype and Response to Cinacalcet in Patients Undergoing Hemodialysis', 'A>G', '', 'https://pubmed.ncbi.nlm.nih.gov/28630081/', 'NA', 1),
(77, 'rs9740', 'PMID:28630081', ' Calcium-Sensing Receptor Genotype and Response to Cinacalcet in Patients Undergoing Hemodialysis', 'A>G', '', 'https://pubmed.ncbi.nlm.nih.gov/28630081/', 'NA', 1),
(78, 'rs9740', 'PMID:28630081', ' Calcium-Sensing Receptor Genotype and Response to Cinacalcet in Patients Undergoing Hemodialysis', 'A>G', '', 'https://pubmed.ncbi.nlm.nih.gov/28630081/', 'NA', 1),
(79, 'rs2108622', 'PMID:32327994', 'A Pharmacogenetically Guided Acenocoumarol Dosing Algorithm for Chilean Patients: A Discovery Cohort Study', 'C>G,T', 'rs7294, rs11676382, rs1045642, rs1799853, rs429358', 'https://pubmed.ncbi.nlm.nih.gov/32327994/', 'NA', 1),
(80, 'rs1639', 'PMID:20203262', 'Warfarin pharmacogenetics: a single VKORC1 polymorphism is predictive of dose across 3 racial groups', 'T>C,G', 'rs1639', 'https://pubmed.ncbi.nlm.nih.gov/20203262/', 'NA', 1),
(81, 'rs9493857', 'PMID:19461886', 'Adaptive variation regulates the expression of the human SGK1 gene in response to stress', 'A>G,T', '', 'https://pubmed.ncbi.nlm.nih.gov/19461886/', 'NA', 1),
(82, 'rs762551Â ', 'PMID:22492992', 'Caffeine intake and CYP1A2 variants associated with high caffeine intake protect non-smokers from hypertension', 'C>A,GÂ ', 'rs1133323, rs1378942', 'https://pubmed.ncbi.nlm.nih.gov/22492992/', 'NA', 1),
(83, 'rs762551Â ', 'PMID:22492992', 'Caffeine intake and CYP1A2 variants associated with high caffeine intake protect non-smokers from hypertension', 'C>A,GÂ ', 'rs1133323, rs1378942', 'https://pubmed.ncbi.nlm.nih.gov/22492992/', 'NA', 1),
(84, 'rs1464510', 'PMID:28208589', 'Association of LPP and TAGAP Polymorphisms with Celiac Disease Risk: A Meta-Analysis', 'C>A,G,T', 'rs1464510', 'https://pubmed.ncbi.nlm.nih.gov/28208589/', 'NA', 1),
(85, 'rs7194', 'PMID:30502936', 'Fine mapping the MHC region identified rs4997052 as a new variant associated with nonobstructive azoospermia in Han Chinese males', 'G>A,C', 'rs4997052', 'https://pubmed.ncbi.nlm.nih.gov/30502936/', 'NA', 1),
(86, 'rs842644', 'PMID:18466468', 'Analysis of variation in NF-kappaB genes and expression levels of NF-kappaB-regulated molecules', 'G>A,C,T', '', 'https://pubmed.ncbi.nlm.nih.gov/18466468/', 'NA', 1),
(87, 'rs2816316', 'PMID:19693089', 'Four novel coeliac disease regions replicated in an association study of a Swedish-Norwegian family cohort', 'C>A,G', 'rs6441961, rs17810564, rs9811792 ,rs917997', 'https://pubmed.ncbi.nlm.nih.gov/19693089/', 'NA', 1),
(88, 'rs601338', 'PMID:31591105', 'Longitudinal Pattern of First-Phase Insulin Response Is Associated With Genetic Variants Outside the Class II HLA Region in Children With Multiple Autoantibodies', 'G>A', 'rs3825932 ,rs1701704, rs45450798', 'https://pubmed.ncbi.nlm.nih.gov/31591105/', 'NA', 1),
(89, 'rs13910', 'PMID:17159977', 'Convergent adaptation of human lactase persistence in Africa and Europe', 'C>T', 'rs14010, rs13915', 'https://pubmed.ncbi.nlm.nih.gov/17159977/', 'NA', 1);

-- --------------------------------------------------------

--
-- Table structure for table `traits_image`
--

CREATE TABLE `traits_image` (
  `id` int(255) NOT NULL,
  `traits` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `traits_image`
--

INSERT INTO `traits_image` (`id`, `traits`, `image`) VALUES
(1, 'Emotional eating dependence', 'images/pdf_report/EmotionalEating.jpg'),
(2, 'Snacking pattern', 'images/pdf_report/SnackingPattern.jpg'),
(3, 'Satiety response', 'images/pdf_report/safetyResponse.jpg'),
(4, 'Sweet taste perception', 'images/pdf_report/SweetTastPerception.jpg'),
(5, 'Bitter taste perception', 'images/pdf_report/BitterTastePerception.jpg'),
(6, 'Fatty food preference', 'images/pdf_report/FattyFoodPreference.jpg'),
(7, 'Response to Carbohydrates', 'images/pdf_report/ResponseToCarbohydrates.jpg'),
(8, 'Response to saturated fats', 'images/pdf_report/ResponseToSaturatedFats.jpg'),
(9, 'Response to Monosaturated fats', 'images/pdf_report/ResponseToMonounsaturatedFats.jpg'),
(10, 'Response to polysaturated fats', 'images/pdf_report/ResponseToPolyunsaturatedFats.jpg'),
(11, 'Response to protein', 'images/pdf_report/ResponseToProtein.jpg'),
(12, 'Response to fibre', 'images/pdf_report/ResponseToFiber.jpg'),
(13, 'Ability to maintain the weight loss', 'images/pdf_report/AbilityToMaintainWeightLoss.jpg'),
(14, 'Vitamin A Metabolism', 'images/pdf_report/VitaminAMetabolism.jpg'),
(15, 'Vitamin D Metabolism', 'images/pdf_report/VitaminDMetabolism.jpg'),
(16, 'Vitamin E Metabolism', 'images/pdf_report/VitaminEMetabolism.png'),
(17, 'Vitamin B6 Metabolism', 'images/pdf_report/VitaminB6Metabolism.png'),
(18, 'Vitamin B9 Metabolism', 'images/pdf_report/VitaminB9Metabolism.png'),
(19, 'Vitamin B12 Metabolism', 'images/pdf_report/VitaminB12Metabolism.png'),
(20, 'Iron Metabolism', 'images/pdf_report/IronMetabolism.png'),
(21, 'Antioxidant Metabolism', 'images/pdf_report/AntioxidantMetabolism.png'),
(22, 'Calcium Metabolism', 'images/pdf_report/Calcium.png'),
(23, 'Phosphate Metabolism', 'images/pdf_report/PhosphateMetabolism.png'),
(24, 'Magnesium Metabolism', 'images/pdf_report/MagnesiumMetabolism.png'),
(25, 'Vitamin K metabolism', ''),
(26, 'Salt Metabolism', 'images/pdf_report/SaltMetabolism.png'),
(27, 'Caffeine Metabolism', 'images/pdf_report/CaffeineMetabolism.jpg'),
(28, 'Gluten Intolerence', 'images/pdf_report/GlutenIntolerance.png'),
(29, 'Lactose Intolerence', 'images/pdf_report/LactoseIntolerance.png');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` int(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact_no` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(255) NOT NULL,
  `organisation` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `pincode` varchar(255) NOT NULL,
  `photo` longblob
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `user_id`, `name`, `email`, `contact_no`, `dob`, `gender`, `organisation`, `designation`, `address`, `city`, `country`, `pincode`, `photo`) VALUES
(1, '2', 'Araygen Technologies', 'rajesh@arraygene.com', '9673038443', '1989-12-14', 'Male', '', '', 'ArrayGen Technologies Pvt. Ltd.\r\nRaj Tower 3rd Floor, Shivaji Chowk,\r\nNear Shivaji statue,Kothrud', 'Pune', 'India', '411038', ''),
(2, '4', 'Rizwan Younjs', 'rizwan8125904441@gmail.com', '8125904441', '1992-12-12', 'Male', '', '', 'Pune', 'Pune', 'India', '411041', ''),
(3, '6', 'Akshata K', 'akshata@arraygen.com', '7875394281', '1998-03-12', 'Female', '', '', 'asfgh agsd askdjh askjdh d', 'Pune', 'India', '411041', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nutrition`
--
ALTER TABLE `nutrition`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nutrition_snp`
--
ALTER TABLE `nutrition_snp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `panel`
--
ALTER TABLE `panel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `panel_details`
--
ALTER TABLE `panel_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `panel_info`
--
ALTER TABLE `panel_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `panel_snp`
--
ALTER TABLE `panel_snp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `traits_image`
--
ALTER TABLE `traits_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `nutrition`
--
ALTER TABLE `nutrition`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `nutrition_snp`
--
ALTER TABLE `nutrition_snp`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `panel`
--
ALTER TABLE `panel`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `panel_details`
--
ALTER TABLE `panel_details`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `panel_info`
--
ALTER TABLE `panel_info`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `panel_snp`
--
ALTER TABLE `panel_snp`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `traits_image`
--
ALTER TABLE `traits_image`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
