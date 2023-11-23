<?php

namespace Database\Seeders\iptbm;

use App\Models\iptbm\AgencyHead;
use App\Models\iptbm\IptbmAgency;
use App\Models\iptbm\IptbmAgencyContact;
use App\Models\iptbm\IptbmAgencyHead;
use Illuminate\Database\Seeder;

class AgencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $iptbm_agencies = array(
            array('id' => '1', 'iptbm_region_id' => '1', 'name' => 'Mariano Marcos State University (MMSU)', 'address' => 'Batac City, Ilocos Norte', 'created_at' => '2023-08-18 03:13:21', 'updated_at' => '2023-08-18 03:13:21'),
            array('id' => '2', 'iptbm_region_id' => '1', 'name' => 'Don Mariano Marcos Memorial State University (DMMMSU)', 'address' => 'Sapilang, Bacnotan, La Union', 'created_at' => '2023-08-18 03:13:21', 'updated_at' => '2023-08-18 03:13:21'),
            array('id' => '3', 'iptbm_region_id' => '1', 'name' => 'Ilocos Sur Polytechnic State College (ISPSC)', 'address' => 'Sta. Maria, Ilocos Sur', 'created_at' => '2023-08-18 03:13:21', 'updated_at' => '2023-08-18 03:13:21'),
            array('id' => '4', 'iptbm_region_id' => '1', 'name' => 'Pangasinan State University (PSU)', 'address' => 'Lingayen, Pangasinan', 'created_at' => '2023-08-18 03:13:21', 'updated_at' => '2023-08-18 03:13:21'),
            array('id' => '5', 'iptbm_region_id' => '1', 'name' => 'University of Northern Philippines (UNP)', 'address' => 'Vigan City, Ilocos Sur', 'created_at' => '2023-08-18 03:13:21', 'updated_at' => '2023-08-18 03:13:21'),
            array('id' => '6', 'iptbm_region_id' => '1', 'name' => 'Department of Agriculture - Regional Training Institute (DA-RTC 1)', 'address' => 'Sta. Barbara, Pangasinan', 'created_at' => '2023-08-18 03:13:21', 'updated_at' => '2023-08-18 03:13:21'),
            array('id' => '7', 'iptbm_region_id' => '8', 'name' => 'Capiz State University', 'address' => 'Block 6sad asd sad asd', 'created_at' => '2023-08-18 03:43:48', 'updated_at' => '2023-08-18 03:43:48'),
            //     array('id' => '8','iptbm_region_id' => '18','name' => 'Sample Agency','address' => 'sadas asdas dasdasd','created_at' => '2023-08-28 21:59:21','updated_at' => '2023-08-28 21:59:21'),
            array('id' => '14', 'iptbm_region_id' => '5', 'name' => 'DOST-PCAARRD', 'address' => 'Los Banos, Laguna', 'created_at' => '2023-08-30 00:40:49', 'updated_at' => '2023-08-30 00:40:49'),
            array('id' => '15', 'iptbm_region_id' => '16', 'name' => 'Ifugao State University', 'address' => 'Lamut, Ifugao, ‎Philippines', 'created_at' => '2023-08-30 00:51:03', 'updated_at' => '2023-08-30 00:51:03'),
            array('id' => '16', 'iptbm_region_id' => '15', 'name' => 'Biliran Province State University', 'address' => 'Biliran Province', 'created_at' => '2023-08-30 00:56:32', 'updated_at' => '2023-08-30 00:56:32'),
            array('id' => '18', 'iptbm_region_id' => '8', 'name' => 'University of the Philippines - Visayas', 'address' => 'Iloilo City', 'created_at' => '2023-08-30 01:09:20', 'updated_at' => '2023-08-30 01:09:20'),
            array('id' => '19', 'iptbm_region_id' => '5', 'name' => 'Cavite State University', 'address' => 'Don Severino Delas Alas Campus, Indang, Cavite', 'created_at' => '2023-08-30 01:10:27', 'updated_at' => '2023-08-30 01:10:27'),
            array('id' => '20', 'iptbm_region_id' => '5', 'name' => 'Batangas State University', 'address' => 'Batangas', 'created_at' => '2023-08-30 01:16:12', 'updated_at' => '2023-08-30 01:16:12'),
            array('id' => '21', 'iptbm_region_id' => '13', 'name' => 'University of Southeastern Philippines (USEP)', 'address' => 'Bo. Obrero, Iñigo St, Poblacion District, Davao City, Davao del Sur', 'created_at' => '2023-08-30 01:17:20', 'updated_at' => '2023-08-30 01:17:20'),
            array('id' => '22', 'iptbm_region_id' => '8', 'name' => 'Aklan State University', 'address' => 'Kalibo, Aklan', 'created_at' => '2023-08-30 01:18:09', 'updated_at' => '2023-08-30 01:18:09'),
            array('id' => '23', 'iptbm_region_id' => '5', 'name' => 'University of Rizal System', 'address' => 'J.P. Rizal St, Brgy. Sampaloc, Tanay, Rizal', 'created_at' => '2023-08-30 01:20:39', 'updated_at' => '2023-08-30 01:20:39'),
            array('id' => '24', 'iptbm_region_id' => '15', 'name' => 'Caraga State University (CarSU)', 'address' => 'Ampayon, Butuan City', 'created_at' => '2023-08-30 01:29:01', 'updated_at' => '2023-08-30 01:29:01'),
            array('id' => '25', 'iptbm_region_id' => '16', 'name' => 'Benguet State University (BSU)', 'address' => 'La Trinidad, Benguet', 'created_at' => '2023-08-30 01:34:19', 'updated_at' => '2023-08-30 01:34:19'),
            array('id' => '26', 'iptbm_region_id' => '15', 'name' => 'Department of Science and Technology  Regional Office No. XIII (DOST-13)', 'address' => 'Caraga State University Compound, Ampayon, Butuan City', 'created_at' => '2023-08-30 01:34:35', 'updated_at' => '2023-08-30 01:34:35'),
            array('id' => '27', 'iptbm_region_id' => '15', 'name' => 'Surigao State College of Technology (SSCT)', 'address' => 'Magallanes Street, Surigao City', 'created_at' => '2023-08-30 01:37:57', 'updated_at' => '2023-08-30 01:37:57'),
            array('id' => '29', 'iptbm_region_id' => '15', 'name' => 'Department of Environment and Natural Resource Regional Office XIII Caraga (DENR-13)', 'address' => 'Brgy. Ambago, Butuan City', 'created_at' => '2023-08-30 01:39:09', 'updated_at' => '2023-08-30 01:39:09'),
            array('id' => '30', 'iptbm_region_id' => '6', 'name' => 'Romblon State University (RSU)', 'address' => 'Odiongan, Romblon', 'created_at' => '2023-08-30 01:42:05', 'updated_at' => '2023-08-30 01:42:05'),
            array('id' => '31', 'iptbm_region_id' => '7', 'name' => 'Bicol University (BU)', 'address' => 'Legazpi City', 'created_at' => '2023-08-30 01:45:17', 'updated_at' => '2023-08-30 01:45:17'),
            array('id' => '33', 'iptbm_region_id' => '6', 'name' => 'Rizal Technological University (RTU)', 'address' => 'Boni Avenue, Mandaluyong City', 'created_at' => '2023-08-30 01:57:53', 'updated_at' => '2023-08-30 01:57:53'),
            array('id' => '34', 'iptbm_region_id' => '15', 'name' => 'Samar State University', 'address' => 'Catbalogan, Samar', 'created_at' => '2023-08-30 02:04:06', 'updated_at' => '2023-08-30 02:04:06'),
            array('id' => '35', 'iptbm_region_id' => '5', 'name' => 'Southern Luzon State University', 'address' => 'Lucban, Quezon', 'created_at' => '2023-08-30 02:05:11', 'updated_at' => '2023-08-30 02:05:11'),
            array('id' => '36', 'iptbm_region_id' => '6', 'name' => 'Southern Luzon State University (SLSU)', 'address' => 'Lucban, Quezon', 'created_at' => '2023-08-30 02:06:00', 'updated_at' => '2023-08-30 02:06:00'),
            array('id' => '37', 'iptbm_region_id' => '10', 'name' => 'Visayas State University', 'address' => 'Visca, Baybay City, Leyte', 'created_at' => '2023-08-30 03:35:07', 'updated_at' => '2023-08-30 03:35:07'),
            array('id' => '38', 'iptbm_region_id' => '13', 'name' => 'Davao del Norte State College', 'address' => 'New Visayas, Panabo City, Davao del Norte', 'created_at' => '2023-08-30 05:40:02', 'updated_at' => '2023-08-30 05:40:02')
        );

        $data = [
            [
                'iptbm_region_id' => 1,
                'name' => 'Mariano Marcos State University (MMSU)',
                'address' => 'Batac City, Ilocos Norte',
            ],
            [
                'iptbm_region_id' => 1,
                'name' => 'Don Mariano Marcos Memorial State University (DMMMSU)',
                'address' => 'Sapilang, Bacnotan, La Union',
            ],
            [
                'iptbm_region_id' => 1,
                'name' => 'Ilocos Sur Polytechnic State College (ISPSC)',
                'address' => 'Sta. Maria, Ilocos Sur',
            ],
            [
                'iptbm_region_id' => 1,
                'name' => 'Pangasinan State University (PSU)',
                'address' => 'Lingayen, Pangasinan',
            ],
            [
                'iptbm_region_id' => 1,
                'name' => 'University of Northern Philippines (UNP)',
                'address' => 'Vigan City, Ilocos Sur',
            ],
            [
                'iptbm_region_id' => 1,
                'name' => 'Department of Agriculture - Regional Training Institute (DA-RTC 1)',
                'address' => 'Sta. Barbara, Pangasinan',
            ],

        ];

        $agency_heads = array(
            array('id' => '1', 'iptbm_agency_id' => '1', 'head' => 'DR. SHIRLEY C. AGRUPIS', 'designation' => 'President', 'email' => 'op@mmsu.edu.ph', 'mobile' => NULL, 'fax' => NULL, 'tel' => NULL, 'created_at' => '2023-08-18 03:13:21', 'updated_at' => '2023-08-18 03:13:21'),
            array('id' => '2', 'iptbm_agency_id' => '2', 'head' => 'DR. JAIME I. MANUEL, JR.', 'designation' => 'President', 'email' => 'dmmmsucamis@yahoo.com', 'mobile' => NULL, 'fax' => NULL, 'tel' => NULL, 'created_at' => '2023-08-18 03:13:21', 'updated_at' => '2023-08-18 03:13:21'),
            array('id' => '3', 'iptbm_agency_id' => '3', 'head' => 'DR. GILBERT R. ARCE', 'designation' => 'President', 'email' => 'ispsc_2705@yahoo.com', 'mobile' => NULL, 'fax' => NULL, 'tel' => NULL, 'created_at' => '2023-08-18 03:13:21', 'updated_at' => '2023-08-18 03:13:21'),
            array('id' => '4', 'iptbm_agency_id' => '4', 'head' => 'DR. DEXTER R. BUTED', 'designation' => 'President', 'email' => 'webadmin@psu.edu.ph', 'mobile' => NULL, 'fax' => NULL, 'tel' => NULL, 'created_at' => '2023-08-18 03:13:21', 'updated_at' => '2023-08-18 03:13:21'),
            array('id' => '5', 'iptbm_agency_id' => '5', 'head' => 'DR. ERWIN F. CADORNA ', 'designation' => 'President', 'email' => 'op@unp.edu.ph', 'mobile' => NULL, 'fax' => NULL, 'tel' => NULL, 'created_at' => '2023-08-18 03:13:21', 'updated_at' => '2023-08-18 03:13:21'),
            array('id' => '6', 'iptbm_agency_id' => '6', 'head' => 'DR. ROGELIO C. EVANGELISTA', 'designation' => 'Regional Director', 'email' => 'rtc1.dcc@ati.da.gov.ph', 'mobile' => NULL, 'fax' => NULL, 'tel' => NULL, 'created_at' => '2023-08-18 03:13:21', 'updated_at' => '2023-08-18 03:13:21'),
            array('id' => '7', 'iptbm_agency_id' => '7', 'head' => 'Dr. Editha C. Alfon', 'designation' => 'SUC President', 'email' => 'warzservania@gmail.com', 'mobile' => NULL, 'fax' => NULL, 'tel' => NULL, 'created_at' => '2023-08-18 03:43:48', 'updated_at' => '2023-08-18 03:43:48'),
            //   array('id' => '8','iptbm_agency_id' => '8','head' => 'Juan Luna','designation' => 'asd ghhfghfghfghfgh','email' => 'warzservania@gmail.com','mobile' => 'warzservania@gmail.com','fax' => NULL,'tel' => NULL,'created_at' => '2023-08-28 21:59:21','updated_at' => '2023-08-28 21:59:21'),
            array('id' => '14', 'iptbm_agency_id' => '14', 'head' => 'Reynaldo V. Ebora', 'designation' => 'SRS 2', 'email' => 'mpnaredo@alum.up.edu.ph', 'mobile' => 'mpnaredo@alum.up.edu.ph', 'fax' => NULL, 'tel' => NULL, 'created_at' => '2023-08-30 00:40:49', 'updated_at' => '2023-08-30 00:40:49'),
            array('id' => '15', 'iptbm_agency_id' => '15', 'head' => 'Eva Marie Codamon-Dugyon', 'designation' => 'SRA', 'email' => 'ckieranicol@gmail.com', 'mobile' => 'ckieranicol@gmail.com', 'fax' => NULL, 'tel' => NULL, 'created_at' => '2023-08-30 00:51:03', 'updated_at' => '2023-08-30 00:51:03'),
            array('id' => '16', 'iptbm_agency_id' => '16', 'head' => 'Dr. Victor C. Cañezo, Jr.', 'designation' => 'SUC President III', 'email' => NULL, 'mobile' => NULL, 'fax' => NULL, 'tel' => NULL, 'created_at' => '2023-08-30 00:56:32', 'updated_at' => '2023-08-30 00:56:32'),
            array('id' => '18', 'iptbm_agency_id' => '18', 'head' => 'DR. CLEMENT C. CAMPOSANO', 'designation' => 'Chancellor', 'email' => NULL, 'mobile' => NULL, 'fax' => NULL, 'tel' => NULL, 'created_at' => '2023-08-30 01:09:20', 'updated_at' => '2023-08-30 01:09:20'),
            array('id' => '19', 'iptbm_agency_id' => '19', 'head' => 'Dr. Hernando Robles', 'designation' => 'University President', 'email' => NULL, 'mobile' => NULL, 'fax' => NULL, 'tel' => NULL, 'created_at' => '2023-08-30 01:10:27', 'updated_at' => '2023-08-30 01:10:27'),
            array('id' => '20', 'iptbm_agency_id' => '20', 'head' => 'Dr. Tirso A. Ronquillo', 'designation' => 'President', 'email' => NULL, 'mobile' => NULL, 'fax' => NULL, 'tel' => NULL, 'created_at' => '2023-08-30 01:16:12', 'updated_at' => '2023-08-30 01:16:12'),
            array('id' => '21', 'iptbm_agency_id' => '21', 'head' => 'Dr. Lourdes Generalao', 'designation' => 'President', 'email' => NULL, 'mobile' => NULL, 'fax' => NULL, 'tel' => NULL, 'created_at' => '2023-08-30 01:17:20', 'updated_at' => '2023-08-30 01:17:20'),
            array('id' => '22', 'iptbm_agency_id' => '22', 'head' => 'Dr. Emily M. Arangote', 'designation' => 'President', 'email' => NULL, 'mobile' => NULL, 'fax' => NULL, 'tel' => NULL, 'created_at' => '2023-08-30 01:18:09', 'updated_at' => '2023-08-30 01:18:09'),
            array('id' => '23', 'iptbm_agency_id' => '23', 'head' => 'Dr. Nancy Talavera-Pascual', 'designation' => 'President', 'email' => NULL, 'mobile' => NULL, 'fax' => NULL, 'tel' => NULL, 'created_at' => '2023-08-30 01:20:39', 'updated_at' => '2023-08-30 01:20:39'),
            array('id' => '24', 'iptbm_agency_id' => '24', 'head' => 'DR. ANTHONY M. PENASO', 'designation' => 'University President', 'email' => NULL, 'mobile' => NULL, 'fax' => NULL, 'tel' => NULL, 'created_at' => '2023-08-30 01:29:01', 'updated_at' => '2023-08-30 01:29:01'),
            array('id' => '25', 'iptbm_agency_id' => '25', 'head' => 'DR. FELIPE SALAING COMILA', 'designation' => 'University President', 'email' => NULL, 'mobile' => NULL, 'fax' => NULL, 'tel' => NULL, 'created_at' => '2023-08-30 01:34:19', 'updated_at' => '2023-08-30 01:34:19'),
            array('id' => '26', 'iptbm_agency_id' => '26', 'head' => 'DIR. DOMINGA D. MALLONGA', 'designation' => 'Regional Director', 'email' => NULL, 'mobile' => NULL, 'fax' => NULL, 'tel' => NULL, 'created_at' => '2023-08-30 01:34:35', 'updated_at' => '2023-08-30 01:34:35'),
            array('id' => '27', 'iptbm_agency_id' => '27', 'head' => 'DR. GREGORIO Z. GAMBOA, JR.', 'designation' => 'President', 'email' => NULL, 'mobile' => NULL, 'fax' => NULL, 'tel' => NULL, 'created_at' => '2023-08-30 01:37:57', 'updated_at' => '2023-08-30 01:37:57'),
            array('id' => '29', 'iptbm_agency_id' => '29', 'head' => 'DIR. HAJDA DIDAW D. PIANG-BRAHIM, CESO IV', 'designation' => 'OIC, Regional Executive Director ', 'email' => NULL, 'mobile' => NULL, 'fax' => NULL, 'tel' => NULL, 'created_at' => '2023-08-30 01:39:09', 'updated_at' => '2023-08-30 01:39:09'),
            array('id' => '30', 'iptbm_agency_id' => '30', 'head' => 'Dr. Merian Catajay-Mani', 'designation' => 'University President', 'email' => NULL, 'mobile' => NULL, 'fax' => NULL, 'tel' => NULL, 'created_at' => '2023-08-30 01:42:05', 'updated_at' => '2023-08-30 01:42:05'),
            array('id' => '31', 'iptbm_agency_id' => '31', 'head' => 'DR. ARNULFO M. MASCARIÑAS', 'designation' => 'University President', 'email' => NULL, 'mobile' => NULL, 'fax' => NULL, 'tel' => NULL, 'created_at' => '2023-08-30 01:45:17', 'updated_at' => '2023-08-30 01:45:17'),
            array('id' => '33', 'iptbm_agency_id' => '33', 'head' => 'DR. MA. EUGENIA M. YANGCO', 'designation' => 'University President', 'email' => NULL, 'mobile' => NULL, 'fax' => NULL, 'tel' => NULL, 'created_at' => '2023-08-30 01:57:53', 'updated_at' => '2023-08-30 01:57:53'),
            array('id' => '34', 'iptbm_agency_id' => '34', 'head' => 'DR. MARILYN D. CARDOSO', 'designation' => 'President', 'email' => NULL, 'mobile' => NULL, 'fax' => NULL, 'tel' => NULL, 'created_at' => '2023-08-30 02:04:06', 'updated_at' => '2023-08-30 02:04:06'),
            array('id' => '35', 'iptbm_agency_id' => '35', 'head' => 'Dr. Doracie B. Zoleta-Nantes', 'designation' => 'President', 'email' => NULL, 'mobile' => NULL, 'fax' => NULL, 'tel' => NULL, 'created_at' => '2023-08-30 02:05:11', 'updated_at' => '2023-08-30 02:05:11'),
            array('id' => '36', 'iptbm_agency_id' => '36', 'head' => 'Dr. Doracie B. Zoleta-Nantes', 'designation' => 'University President', 'email' => NULL, 'mobile' => NULL, 'fax' => NULL, 'tel' => NULL, 'created_at' => '2023-08-30 02:06:00', 'updated_at' => '2023-08-30 02:06:00'),
            array('id' => '37', 'iptbm_agency_id' => '37', 'head' => 'DR. EDGARDO E. TULIN', 'designation' => 'President', 'email' => NULL, 'mobile' => NULL, 'fax' => NULL, 'tel' => NULL, 'created_at' => '2023-08-30 03:35:07', 'updated_at' => '2023-08-30 03:35:07'),
            array('id' => '38', 'iptbm_agency_id' => '38', 'head' => 'Dr. JOY M. SORROSA', 'designation' => 'College President', 'email' => 'president@dnsc.edu.ph', 'mobile' => 'president@dnsc.edu.ph', 'fax' => NULL, 'tel' => '0846286341', 'created_at' => '2023-08-30 05:40:02', 'updated_at' => '2023-08-30 05:40:02')
        );

        $head = [
            [
                'iptbm_agency_id' => 1,
                'head' => 'DR. SHIRLEY C. AGRUPIS',
                'designation' => 'President',
                'email' => 'op@mmsu.edu.ph'
            ],
            [
                'iptbm_agency_id' => 2,
                'head' => 'DR. JAIME I. MANUEL, JR.',
                'designation' => 'President',
                'email' => 'dmmmsucamis@yahoo.com'
            ],
            [
                'iptbm_agency_id' => 3,
                'head' => 'DR. GILBERT R. ARCE',
                'designation' => 'President',
                'email' => 'ispsc_2705@yahoo.com'
            ],
            [
                'iptbm_agency_id' => 4,
                'head' => 'DR. DEXTER R. BUTED',
                'designation' => 'President',
                'email' => 'webadmin@psu.edu.ph'
            ],
            [
                'iptbm_agency_id' => 5,
                'head' => 'DR. ERWIN F. CADORNA ',
                'designation' => 'President',
                'email' => 'op@unp.edu.ph'
            ],
            [
                'iptbm_agency_id' => 6,
                'head' => 'DR. ROGELIO C. EVANGELISTA',
                'designation' => 'Regional Director',
                'email' => 'rtc1.dcc@ati.da.gov.ph'
            ],
        ];
        $contact = [
            [
                'iptbm_agency_id' => 1,
                'contact_type' => 'phone',
                'contact' => '(077) 600-0459'
            ],
            [
                'iptbm_agency_id' => 2,
                'contact_type' => 'fax',
                'contact' => '888-3191'
            ],
            [
                'iptbm_agency_id' => 3,
                'contact_type' => 'fax',
                'contact' => '(077) 732-5512'
            ],
            [
                'iptbm_agency_id' => 4,
                'contact_type' => 'phone',
                'contact' => '(075) 600-8016'
            ],
            [
                'iptbm_agency_id' => 5,
                'contact_type' => 'phone',
                'contact' => '(077) 722-2810'
            ],
            [
                'iptbm_agency_id' => 6,
                'contact_type' => 'phone',
                'contact' => '(075) 523-2266'
            ],

        ];


        foreach ($iptbm_agencies as $val) {

            IptbmAgency::create($val);

        }

        foreach ($agency_heads as $val) {
            AgencyHead::create($val);

        }
        /*
         *
           foreach ($contact as $vCon) {

               AgencyContact::create($vCon);
           }
         */
    }
}
