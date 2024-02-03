<?php

use App\Http\Controllers\abh\admin\AbhAdminController;
use App\Http\Controllers\abh\staff\AbhGeneratorController;
use App\Http\Controllers\abh\staff\AbhProfileController;
use App\Http\Controllers\abh\staff\AbhTechController;
use App\Http\Controllers\api\AbhApi;
use App\Http\Controllers\iptbm\admin\AccountsController;
use App\Http\Controllers\iptbm\admin\AdminDashboard;
use App\Http\Controllers\iptbm\admin\AgenciesController;
use App\Http\Controllers\iptbm\admin\EditAccountController;
use App\Http\Controllers\iptbm\admin\EditRegionController;
use App\Http\Controllers\iptbm\admin\IpApplicationController;
use App\Http\Controllers\iptbm\admin\IptbmProfileController;
use App\Http\Controllers\iptbm\admin\RegionsController;
use App\Http\Controllers\iptbm\admin\TechCommodityController;
use App\Http\Controllers\iptbm\admin\TechCompAdopterController;
use App\Http\Controllers\iptbm\admin\TechcompCategoryController;
use App\Http\Controllers\iptbm\admin\TechCompIndustryController;
use App\Http\Controllers\iptbm\admin\TechnologyReportController;
use App\Http\Controllers\iptbm\staff\AdoptedTechController;
use App\Http\Controllers\iptbm\staff\AlertNotifController;
use App\Http\Controllers\iptbm\staff\CommercializationAdopter;
use App\Http\Controllers\iptbm\staff\DashBoard;
use App\Http\Controllers\iptbm\staff\DeployedTechController;
use App\Http\Controllers\iptbm\staff\DeploymentController;
use App\Http\Controllers\iptbm\staff\ExtensionController;
use App\Http\Controllers\iptbm\staff\ExtensionTechController;
use App\Http\Controllers\iptbm\staff\Inventor;
use App\Http\Controllers\iptbm\staff\IpAlertTask;
use App\Http\Controllers\iptbm\staff\IpApplication;
use App\Http\Controllers\iptbm\staff\IpManagement;
use App\Http\Controllers\iptbm\staff\IpProfile;
use App\Http\Controllers\iptbm\staff\IpTaskView;
use App\Http\Controllers\iptbm\staff\PrecomController;
use App\Http\Controllers\iptbm\staff\PrecomDetailsController;
use App\Http\Controllers\iptbm\staff\ProjectController;
use App\Http\Controllers\iptbm\staff\Technology;
use App\Http\Controllers\iptbm\staff\TechnologyDescription;
use App\Http\Controllers\ProfileController;
use App\Http\Livewire\Abh\Dashboard\DashBoardPage;
use App\Http\Livewire\Abh\Pages\Generator\AbhGeneratorDetailsPage;
use App\Http\Livewire\Abh\Pages\Generator\GeneratorPage;
use App\Http\Livewire\Abh\Pages\Profile\AbhAllProfilePage;
use App\Http\Livewire\Abh\Pages\Profile\AbhAllProfileProjectPage;
use App\Http\Livewire\Abh\Pages\Profile\AbhPublicProfileView;
use App\Http\Livewire\Abh\Pages\Profile\Profile;
use App\Http\Livewire\Abh\Pages\Profile\ProjectPage;
use App\Http\Livewire\Abh\Pages\Technology\AbhAllTechnologyPage;
use App\Http\Livewire\Abh\Pages\Technology\AbhTechImagePage;
use App\Http\Livewire\Abh\Pages\Technology\AbhTechnologyDetailPage;
use App\Http\Livewire\Abh\Pages\Technology\AbhTechnologyPage;
use App\Http\Livewire\Iptbm\Admin\Copyright\CopyRight;
use App\Http\Livewire\Iptbm\Admin\Industrial\IndustrialDesign;
use App\Http\Livewire\Iptbm\Admin\IpAlert\IpAlert;
use App\Http\Livewire\Iptbm\Admin\Plantvariety\PlantVariety;
use App\Http\Livewire\Iptbm\Admin\Trademark\TradeMark;
use App\Http\Livewire\Iptbm\Admin\UtilityModel\UtilityModel;
use App\Http\Resources\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
/*
 *
 */

Route::get('/email',function (){
    $users = array(
        // array('id' => '1','name' => 'Juan Dela Cruz','component' => 'IPTBM','role' => 'admin','email' => 'aardesystem@capsu.edu.ph','email_verified_at' => NULL,'password' => '$2y$10$FEcGrtDbX6KOdDqyjzaQqeNUtaBxgA0B2MxQmu4ex3ar5cgLpTP2W','remember_token' => NULL,'created_at' => '2023-08-18 03:13:22','updated_at' => '2023-08-18 03:13:22','profile_id' => NULL),
        array('id' => '10', 'name' => 'mae ann', 'component' => 'IPTBM', 'email' => 'ipmo@capsu.edu.ph', 'email_verified_at' => NULL, 'password' => '$2y$10$T31fVz6cp/tHvTVyRRQvY.fGb8DWL7UCO0Uzc5Rv0sJc6TtC/pjQa', 'remember_token' => NULL, 'created_at' => '2023-08-29 23:45:13', 'updated_at' => '2023-09-05 07:19:22', 'profile_id' => '4'),
        array('id' => '11', 'name' => 'Bryll Atienza', 'component' => 'IPTBM', 'email' => 'uitso@mmsu.edu.ph', 'email_verified_at' => NULL, 'password' => '$2y$10$dRsedM7c.zFJ56qDKsNcTu/s5UW37QnCir97P1hLrYuGSGVcVjDjy', 'remember_token' => NULL, 'created_at' => '2023-08-30 00:27:09', 'updated_at' => '2023-08-30 00:27:09', 'profile_id' => '3'),
        array('id' => '13', 'name' => 'Jesaira P. Caclini', 'component' => 'IPTBM', 'email' => 'ckieranicol@gmail.com', 'email_verified_at' => NULL, 'password' => '$2y$10$iFE2lk08zsxdSUfbFKinYONKD.fBvim8lMlrSsBfN9M5X0SpjasvS', 'remember_token' => NULL, 'created_at' => '2023-08-30 01:05:59', 'updated_at' => '2023-08-30 01:05:59', 'profile_id' => '6'),
        array('id' => '14', 'name' => 'Andy mark', 'component' => 'IPTBM', 'email' => 'warzservania@gmail.com', 'email_verified_at' => NULL, 'password' => '$2y$10$6cmvhfwKNVhXGUb34oxptermD9UxSNZM9ltbbFJbMMyCdNtcvLt0.', 'remember_token' => 'vTzbfh6Ran1DpBp06yIsV0GdkAdb4RbN4sG20Fa9kdxnC6gHW2gIAKnvfESn', 'created_at' => '2023-08-30 01:06:58', 'updated_at' => '2023-09-02 04:41:36', 'profile_id' => '3'),
        array('id' => '15', 'name' => 'Marianne Agnes T. Mendoza', 'component' => 'IPTBM', 'email' => 'rso@bipsu.edu.ph', 'email_verified_at' => NULL, 'password' => '$2y$10$.lW7QOU0x5b3uNqKPnWJ9Os11UIxI2vQobPs3CsVcLRxkv2336na2', 'remember_token' => NULL, 'created_at' => '2023-08-30 01:12:06', 'updated_at' => '2023-08-30 01:12:06', 'profile_id' => '7'),
        array('id' => '16', 'name' => 'Abegail Marcelino', 'component' => 'IPTBM', 'email' => 'marcelinoabegail08@gmail.com', 'email_verified_at' => NULL, 'password' => '$2y$10$7auvESbL6/fibQ7EC7NZMebtrKj.RoXZY386ZqQ0L8oXByg4YQ4RS', 'remember_token' => NULL, 'created_at' => '2023-08-30 01:13:54', 'updated_at' => '2023-08-30 01:13:54', 'profile_id' => '3'),
        array('id' => '17', 'name' => 'Hanna Jane B. Maureal', 'component' => 'IPTBM', 'email' => 'raise_rkm@usep.edu.ph', 'email_verified_at' => NULL, 'password' => '$2y$10$O1oCPeU7500GAF7ilFLPhONT6gzExwaRyXDAq3OhHstae6dJw9WRC', 'remember_token' => NULL, 'created_at' => '2023-08-30 01:19:54', 'updated_at' => '2023-08-30 01:19:54', 'profile_id' => '8'),
        array('id' => '18', 'name' => 'Christian Russel L. Rones', 'component' => 'IPTBM', 'email' => 'ipo@urs.edu.ph', 'email_verified_at' => NULL, 'password' => '$2y$10$0m6lyZcs6uQ2Nv98IfzcPOT0juCVN0i/oXB2x0Wd5SZVMt2lmPhnC', 'remember_token' => NULL, 'created_at' => '2023-08-30 01:21:55', 'updated_at' => '2023-08-30 01:21:55', 'profile_id' => '9'),
        array('id' => '19', 'name' => 'Marika Angelica P. Naredo ', 'component' => 'IPTBM', 'email' => 'mpnaredo@alum.up.edu.ph', 'email_verified_at' => NULL, 'password' => '$2y$10$pO5RPg5jDvp2IN4Bbtq3me95.gcRh5tuV8fBoSnJJRHtHqUX8CI/C', 'remember_token' => NULL, 'created_at' => '2023-08-30 01:23:55', 'updated_at' => '2023-08-30 01:23:55', 'profile_id' => '10'),
        array('id' => '20', 'name' => 'Glenn M. Suelan', 'component' => 'IPTBM', 'email' => 'gmsuelan@up.edu.ph', 'email_verified_at' => NULL, 'password' => '$2y$10$a4TEsYTKlfYqAX1t1zgj4.d78BR0iUfOxHCqXETG0QgMQmuHBqJSe', 'remember_token' => NULL, 'created_at' => '2023-08-30 01:25:37', 'updated_at' => '2023-08-30 01:25:37', 'profile_id' => '11'),
        array('id' => '21', 'name' => 'Maye L. Perbillo', 'component' => 'IPTBM', 'email' => 'mlperbillo@up.edu.ph', 'email_verified_at' => NULL, 'password' => '$2y$10$6qyozF2.n49y1/9XTYm1X.Qbpw030O70R2vLgZdtl6yEg700Ide3C', 'remember_token' => NULL, 'created_at' => '2023-08-30 01:27:10', 'updated_at' => '2023-08-30 01:27:10', 'profile_id' => '11'),
        array('id' => '22', 'name' => 'Jonas T. Tavarro ', 'component' => 'IPTBM', 'email' => 'jttavarro@up.edu.ph', 'email_verified_at' => NULL, 'password' => '$2y$10$Q9Q8MgB7dleTTD86Z/CIQukP7Kpdbuw47TcCVdsHeqRFVRE4YApym', 'remember_token' => NULL, 'created_at' => '2023-08-30 01:27:55', 'updated_at' => '2023-08-30 01:27:55', 'profile_id' => '11'),
        array('id' => '23', 'name' => 'Joshua Chris M. Duran', 'component' => 'IPTBM', 'email' => 'jcmduran@usep.edu.ph', 'email_verified_at' => NULL, 'password' => '$2y$10$DStuyF9vAJkD5WLCbfxSzeVGli12vktBGh1fyb9JyWx0YDr.I9nBS', 'remember_token' => NULL, 'created_at' => '2023-08-30 01:30:03', 'updated_at' => '2023-08-30 01:30:03', 'profile_id' => '8'),
        array('id' => '24', 'name' => 'Rodel C. Cabugon', 'component' => 'IPTBM', 'email' => 'rcabugon@mmsu.edu.ph', 'email_verified_at' => NULL, 'password' => '$2y$10$bYPvNDbhAeh3BeU5NwOMgu57BjNfzik7OobLJBDj0StrvG.FuXpgi', 'remember_token' => NULL, 'created_at' => '2023-08-30 01:34:24', 'updated_at' => '2023-08-30 01:34:24', 'profile_id' => '3'),
        array('id' => '25', 'name' => 'Dannah Jean C. Mendoza', 'component' => 'IPTBM', 'email' => 'dannahjmendoza@gmail.com', 'email_verified_at' => NULL, 'password' => '$2y$10$TSXRwfoLcg8T3tc9624t.e0jSeEA/cDrILJFBf5cNIOgBQ1A0o/.m', 'remember_token' => NULL, 'created_at' => '2023-08-30 01:36:26', 'updated_at' => '2023-08-30 01:36:26', 'profile_id' => '10'),
        array('id' => '26', 'name' => 'Cherry B. Bundalian', 'component' => 'IPTBM', 'email' => 'chebundalian@gmail.com', 'email_verified_at' => NULL, 'password' => '$2y$10$egHNfBSaWX4SQEPUSX697.4yi0jzErW6Zop33LjGlED1BCyokMUZK', 'remember_token' => NULL, 'created_at' => '2023-08-30 01:37:14', 'updated_at' => '2023-08-30 01:37:14', 'profile_id' => '10'),
        array('id' => '27', 'name' => 'Romanric B. Arguelles', 'component' => 'IPTBM', 'email' => 'romanric.arguelles@gmail.com', 'email_verified_at' => NULL, 'password' => '$2y$10$iZVHvIvcDPX9Zg9t/NBHq./VoZhegNmzl8ZUpsVPkQMgXingiFsM.', 'remember_token' => NULL, 'created_at' => '2023-08-30 01:38:15', 'updated_at' => '2023-08-30 01:38:15', 'profile_id' => '10'),
        array('id' => '28', 'name' => 'Mae A. Dagaas', 'component' => 'IPTBM', 'email' => 'm.dagaas@pcaarrd.dost.gov.ph', 'email_verified_at' => NULL, 'password' => '$2y$10$KHkM3I6mJXn2/jZiPBVlCeHjoSqdOuVeTYFvCfyw0ZZ7F48z/QTjG', 'remember_token' => NULL, 'created_at' => '2023-08-30 01:38:50', 'updated_at' => '2023-08-30 01:38:50', 'profile_id' => '10'),
        array('id' => '29', 'name' => 'Amadito A. Dionisio', 'component' => 'IPTBM', 'email' => 'adionisio@dmmmsu.edu.ph', 'email_verified_at' => NULL, 'password' => '$2y$10$iCO/MN08DTeKA/DCKgCQb.x5uqB9aySx9yOoaB9RudPUDDzcsvt.W', 'remember_token' => NULL, 'created_at' => '2023-08-30 01:39:45', 'updated_at' => '2023-08-30 01:39:45', 'profile_id' => '12'),
        array('id' => '30', 'name' => 'Teddy F. Tepora', 'component' => 'IPTBM', 'email' => 'teddy.tepora@cvsu.edu.ph', 'email_verified_at' => NULL, 'password' => '$2y$10$iT0NOs/WBo9p4erbxysxv.Yb.tHKzTPNCXqyD4F92PPn4hw9jAzFO', 'remember_token' => NULL, 'created_at' => '2023-08-30 01:41:03', 'updated_at' => '2023-08-30 01:41:03', 'profile_id' => '13'),
        array('id' => '31', 'name' => 'Vincent V. Vergara', 'component' => 'IPTBM', 'email' => 'vincent.itso@cvsu.edu.ph', 'email_verified_at' => NULL, 'password' => '$2y$10$ni6XjxF4knNOvyWac6ehY.x7n8qSiXQWfpqRNqcKXuH0GTH7aNiBO', 'remember_token' => NULL, 'created_at' => '2023-08-30 01:41:30', 'updated_at' => '2023-08-30 01:41:30', 'profile_id' => '13'),
        array('id' => '32', 'name' => 'Lisette D. Mendoza', 'component' => 'IPTBM', 'email' => 'lisettemendoza8054@gmail.com', 'email_verified_at' => NULL, 'password' => '$2y$10$C7SZxL/xsyomX4KFSxzmr.ZNhOsmju3YfTWFpCPHsKGVqmK6nbQSm', 'remember_token' => NULL, 'created_at' => '2023-08-30 01:43:43', 'updated_at' => '2023-08-30 01:43:43', 'profile_id' => '13'),
        array('id' => '33', 'name' => 'Cynthia D. Garambas', 'component' => 'IPTBM', 'email' => 'regional.iptbm@bsu.edu.ph', 'email_verified_at' => NULL, 'password' => '$2y$10$Xit5G/0GIrtjCe4pfZTtS.ZssvJlCFA74UFmgZaMA596htIpKSUuu', 'remember_token' => NULL, 'created_at' => '2023-08-30 01:44:38', 'updated_at' => '2023-08-30 01:44:38', 'profile_id' => '14'),
        array('id' => '34', 'name' => 'Emie M. Fajel', 'component' => 'IPTBM', 'email' => 'emfajel@gmail.com', 'email_verified_at' => NULL, 'password' => '$2y$10$Dr4EcvyxJOUL2WPdBTkTO.svhOheJ8Xeqr3miDUpKBQmTexHbzI52', 'remember_token' => NULL, 'created_at' => '2023-08-30 01:45:41', 'updated_at' => '2023-08-30 01:45:41', 'profile_id' => '15'),
        array('id' => '35', 'name' => 'Charlene T. Parac', 'component' => 'IPTBM', 'email' => 'cparac@bipsu.edu.ph', 'email_verified_at' => NULL, 'password' => '$2y$10$i223sP1DfUslYjIOuJlxkOkX9KRE3tgHit0ZN8YqiaPcSlSs2Q27C', 'remember_token' => NULL, 'created_at' => '2023-08-30 01:47:07', 'updated_at' => '2023-08-30 01:47:07', 'profile_id' => '7'),
        array('id' => '36', 'name' => 'Jocelyn C. Perez', 'component' => 'IPTBM', 'email' => 'j.perez@bsu.edu.ph', 'email_verified_at' => NULL, 'password' => '$2y$10$NpqUgeApBwJWK2uvf/k48egsg1ldyMVy092W6.3aQz2W83jX8zl4W', 'remember_token' => NULL, 'created_at' => '2023-08-30 01:48:18', 'updated_at' => '2023-08-30 01:48:18', 'profile_id' => '14'),
        array('id' => '37', 'name' => 'Charles Reigner S. Yadno', 'component' => 'IPTBM', 'email' => 'reigneryadno@gmail.com', 'email_verified_at' => NULL, 'password' => '$2y$10$zo3CaZXEjXBR6fpD8RBRz.7aicDqA0HwUXRA/6eB5P2tKuQSxGFqK', 'remember_token' => NULL, 'created_at' => '2023-08-30 01:49:01', 'updated_at' => '2023-08-30 01:49:01', 'profile_id' => '14'),
        array('id' => '38', 'name' => 'Marc Joseph N. Ramirez', 'component' => 'IPTBM', 'email' => 'itso@g.batstate-u.edu.ph', 'email_verified_at' => NULL, 'password' => '$2y$10$9w0XONrFgFH8HzhBJXXflO/Jbe.EOJWTtzYRh1teoLPv/RKQtRMM.', 'remember_token' => NULL, 'created_at' => '2023-08-30 01:51:06', 'updated_at' => '2023-08-30 01:51:06', 'profile_id' => '16'),
        array('id' => '39', 'name' => 'Ana Mae A. Quives', 'component' => 'IPTBM', 'email' => 'ipro@asu.edu.ph', 'email_verified_at' => NULL, 'password' => '$2y$10$Lwnacd8MX1gRsAaDTxrGLee3cAuSXTsKZe4PHMl4sGN2CmGVCGvjS', 'remember_token' => NULL, 'created_at' => '2023-08-30 01:52:02', 'updated_at' => '2023-08-30 01:52:02', 'profile_id' => '17'),
        array('id' => '40', 'name' => 'Jane Faith F. Falceso', 'component' => 'IPTBM', 'email' => 'jffalceso@rsu.edu.ph', 'email_verified_at' => NULL, 'password' => '$2y$10$RG4swXugBugVnV80Wc89VeOo7wPCXZsLQuH.D9QToAZAqwja8kaOm', 'remember_token' => NULL, 'created_at' => '2023-08-30 01:52:53', 'updated_at' => '2023-08-30 01:52:53', 'profile_id' => '15'),
        array('id' => '41', 'name' => 'Marfin Loi A. Cabuyao', 'component' => 'IPTBM', 'email' => 'ipmc@rtu.edu.ph', 'email_verified_at' => NULL, 'password' => '$2y$10$OpZAoiCdd5fuaOJZLoG6CerqrAy8nElFN6TXYmiHIREOpXdvFcG6S', 'remember_token' => NULL, 'created_at' => '2023-08-30 01:59:10', 'updated_at' => '2023-08-30 01:59:10', 'profile_id' => '18'),
        array('id' => '42', 'name' => 'Raven C. Tabiongan', 'component' => 'IPTBM', 'email' => 'raven.tabiongan@ssu.edu.ph', 'email_verified_at' => NULL, 'password' => '$2y$10$7Vi5SfZo5.9cGFpKYFGwduTMaJBOHc/T3I8f1dyLlxSK8E5Jn5nJm', 'remember_token' => NULL, 'created_at' => '2023-08-30 02:06:20', 'updated_at' => '2023-08-30 02:06:20', 'profile_id' => '19'),
        array('id' => '43', 'name' => 'Giehway R. Liwanag', 'component' => 'IPTBM', 'email' => 'giehwayliwanag@gmail.com', 'email_verified_at' => NULL, 'password' => '$2y$10$DgVX.04m12d7up1lAsaHAutvQRPUuG1oBlcx8OGK6LfidBZv.fBS2', 'remember_token' => NULL, 'created_at' => '2023-08-30 02:08:00', 'updated_at' => '2023-08-30 02:08:00', 'profile_id' => '20'),
        array('id' => '44', 'name' => 'NONA D. NAGARES', 'component' => 'IPTBM', 'email' => 'docnona.slsu@gmail.com', 'email_verified_at' => NULL, 'password' => '$2y$10$o.kq338mEY4C..owwon2jeCQ/gmfYJdLa51Z/lmOOQiXRlx71hJ.e', 'remember_token' => NULL, 'created_at' => '2023-08-30 02:09:25', 'updated_at' => '2023-08-30 02:09:25', 'profile_id' => '21'),
        array('id' => '45', 'name' => 'RJ Latoza', 'component' => 'IPTBM', 'email' => 'kmc@capsu.edu.ph', 'email_verified_at' => NULL, 'password' => '$2y$10$wrJBYE6sj/1Wo6mFouenUesbzL01iqWM1SyhZ6ZzO9qDkffr9TRxS', 'remember_token' => NULL, 'created_at' => '2023-08-30 03:15:36', 'updated_at' => '2023-08-30 03:31:36', 'profile_id' => '4'),
        array('id' => '46', 'name' => 'Jessa W. Ente', 'component' => 'IPTBM', 'email' => 'j.ente@bsu.edu.ph', 'email_verified_at' => NULL, 'password' => '$2y$10$zMNRNXesXD./vTHOMxJUJebI/FLKvANwmXxGjOK2w5Ql/lx4sLcIW', 'remember_token' => NULL, 'created_at' => '2023-08-30 03:17:35', 'updated_at' => '2023-08-30 03:17:35', 'profile_id' => '14'),
        array('id' => '47', 'name' => 'Jomar Tuazon', 'component' => 'IPTBM', 'email' => 'rhamtuazon11@gmail.com', 'email_verified_at' => NULL, 'password' => '$2y$10$IlYWN08N4SOnu2ud9Wj1iO67RaQ0gN3FcgrrXj6cPcKx/ZFN8y2pq', 'remember_token' => NULL, 'created_at' => '2023-08-30 03:21:33', 'updated_at' => '2023-08-30 03:21:33', 'profile_id' => '22'),
        array('id' => '48', 'name' => 'Cindy Meneses', 'component' => 'IPTBM', 'email' => 'cindsrmeneses@gmail.com', 'email_verified_at' => NULL, 'password' => '$2y$10$HKV50L65LYG/W2goy6mCF.q3mvghfDxOtt22kp0aTIhoGfH4NzZI.', 'remember_token' => NULL, 'created_at' => '2023-08-30 03:33:50', 'updated_at' => '2023-08-30 03:33:50', 'profile_id' => '22'),
        array('id' => '49', 'name' => 'RJ Latoza', 'component' => 'IPTBM', 'email' => 'rjalatoza@capsu.edu.ph', 'email_verified_at' => NULL, 'password' => '$2y$10$FnP7n6nXr6XoN32WIb1j3u6.u6HqBzpAyQxN7Jdh4yFaervfnYrWO', 'remember_token' => NULL, 'created_at' => '2023-08-30 03:34:39', 'updated_at' => '2023-08-30 03:34:39', 'profile_id' => '4'),
        array('id' => '50', 'name' => 'Divina L. Villaber', 'component' => 'IPTBM', 'email' => 'divina.villaber@vsu.edu.ph', 'email_verified_at' => NULL, 'password' => '$2y$10$Q.CFPwdy9DsdS9Qus8kn1u3kHxG0bGsHNxNrSxs83BzzA5LCsbLja', 'remember_token' => NULL, 'created_at' => '2023-08-30 03:36:08', 'updated_at' => '2023-08-30 03:36:08', 'profile_id' => '23'),
        array('id' => '51', 'name' => 'Ruby A. Manaig', 'component' => 'IPTBM', 'email' => 'bengmanaig@cvsu.edu.ph', 'email_verified_at' => NULL, 'password' => '$2y$10$ijcV.DFZ9YPAiXv4n1D/mubmY7Q.O9i1LQZj24i5TTllpUur7h9f2', 'remember_token' => NULL, 'created_at' => '2023-08-30 03:37:37', 'updated_at' => '2023-08-30 03:37:37', 'profile_id' => '13'),
        array('id' => '52', 'name' => 'Aldrin Rellin', 'component' => 'IPTBM', 'email' => 'ay.rellin@vsu.edu.ph', 'email_verified_at' => NULL, 'password' => '$2y$10$x1ih6KW5RLRKlTAUK/V1/uXTIzmKPmj2JPMWxbeQ1zXjP1y6WpUny', 'remember_token' => NULL, 'created_at' => '2023-08-30 03:38:26', 'updated_at' => '2023-08-30 03:38:26', 'profile_id' => '23'),
        array('id' => '53', 'name' => 'Rhuzel Leinster Dean J. Julian', 'component' => 'IPTBM', 'email' => 'rldjjulian@cvsu.edu.ph', 'email_verified_at' => NULL, 'password' => '$2y$10$eIgZbhTrAkj22/kr3mnyJOND3rZdGnYXLDQvIfesoI9X.yuOmBV8W', 'remember_token' => NULL, 'created_at' => '2023-08-30 03:39:24', 'updated_at' => '2023-08-30 03:39:24', 'profile_id' => '13'),
        array('id' => '54', 'name' => 'Prelly Aguilar', 'component' => 'IPTBM', 'email' => 'paguilar@vsu.edu.ph', 'email_verified_at' => NULL, 'password' => '$2y$10$d9olstyoPk6CmrXgoRmCoOVacO3pcqBQ.qDtB2LlEVNTN9KFH/ola', 'remember_token' => NULL, 'created_at' => '2023-08-30 03:41:19', 'updated_at' => '2023-08-30 03:41:19', 'profile_id' => '23'),
        array('id' => '55', 'name' => 'Mark Ronald S. Manseguiao', 'component' => 'IPTBM', 'email' => 'iptbm@dnsc.edu.ph', 'email_verified_at' => NULL, 'password' => '$2y$10$JU76N3kjkkBsYD6YC5DbA.e7nvBdC1hBKyA/CSOH6cJ3v3Ne4m57y', 'remember_token' => NULL, 'created_at' => '2023-08-30 05:41:23', 'updated_at' => '2023-08-30 05:41:23', 'profile_id' => '24'),
        array('id' => '56', 'name' => 'Reggie S. Mendoza', 'component' => 'IPTBM', 'email' => 'reggie.mendoza@ssu.edu.ph', 'email_verified_at' => NULL, 'password' => '$2y$10$SAk944scXKwg8of3zzrgrunmvdWzmPTSCvp1bUb0NPOeXDWxEa69.', 'remember_token' => NULL, 'created_at' => '2023-09-02 00:20:16', 'updated_at' => '2023-09-02 00:20:16', 'profile_id' => '19')
    );
    return view('emails',['user'=>$users]);
});


Route::get('/', function () {
    if (Auth::guard('admin')->check()) {
        return Redirect::to('admin/login');
    }
    return Redirect::to('login');
});

Route::prefix('/api')->group(function (){
    Route::controller(AbhApi::class)->prefix('/abh')->group(function (){
        Route::get('abh-profile','abh_profile');
    });
    Route::controller(\App\Http\Controllers\api\IptbmApi::class)->prefix('iptbm')->group(function (){
        Route::get('/profile','iptbm_profile');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['component:IPTBM', 'auth', 'verified'])->prefix('/iptbm')->group(function () {


    Route::get('/dashboard', [DashBoard::class, 'index'])->name('iptbm.staff.dashboard');
    Route::controller(IpProfile::class)->prefix('/profile')->group(function () {
        Route::get('/', 'index')->name('iptbm.staff.ipProfile');
        Route::get('/all-profile', 'allProfile')->name('iptbm.staff.allProfile');
        Route::get('/viewprofile/{id}', 'viewProfile')->name('iptbm.staff.viewProfile');
        Route::get('/view-profile-project/{profile}','all_profile_projects')->name('iptbm.staff.viewProfile.projects');
        Route::post('/update-profile/{name}', 'update')->name('iptbm.staff.profile.update');
        Route::post('/add-contact/{type}', 'addcontact')->name('iptbm.staff.profile.addContact');
        Route::post('/delete-contact/{id}', 'deletecontact')->name('iptbm.staff.profile.deleteContact');
        Route::post('/update-policy/{id}', 'update_ip_policy')->name('iptbm.staff.profile.updatePolicy');
        Route::post('/update-techno-transfer/{id}', 'update_techno_transfer')->name('iptbm.staff.profile.updateTechnoTransfer');
        Route::post('/upload-logo', 'upload_logo')->name('iptbm.staff.profile.uploadLogo');
        Route::post('/tagline', 'tagline')->name('iptbm.staff.profile.tagline');


        Route::controller(ProjectController::class)->prefix('/projects')->group(function () {
            Route::get('/{id}', 'index')->name('iptbm.staff.project');
            Route::get('/edit/{id}', 'edit')->name('iptbm.staff.project.edit');
            Route::post('/store', 'store')->name('iptbm.staff.project.store');
            Route::post('/update/{id}/{name}', 'update')->name('iptbm.staff.project.update');
            Route::post('/delete/{id}', 'delete')->name('iptbm.staff.project.delete');
        });
    });

    Route::controller(Technology::class)->prefix('/technology')->group(function () {
        Route::get('/', 'index')->name('iptbm.staff.technology');
        Route::get('/iptbm-technology', 'iptbmtech')->name('iptbm.staff.technology.all');
        Route::get('/show/{id}', 'show')->withTrashed()->name('iptbm.staff.technology.show');
        Route::get('/add-details', 'techdetails')->name('addd.technology.details');
        Route::post('/delete-tech', 'delete_tech')->name('iptbm.staff.technology.delete');
        Route::post('/delete-industry', 'delete_industry')->name('iptbm.staff.delete_industry');
        Route::get('/tech-public/{id}', 'publicView')->name('iptbm.staff.tech.public-view');
        Route::controller(TechnologyDescription::class)->prefix('/technology-description')->group(function () {
            Route::get('/{id:iptbm_technology_profile_id}', 'index')->name('iptbm.staff.technology.description');
            Route::post('/create', 'create')->name('iptbm.staff.technology.create.description');
            Route::post('/update-narrative/{id}', 'update_narrative')->name('iptbm.staff.technology.update_narrative');
            Route::post('/upload-tech-photo/{id}', 'upload_tech_photo')->name('iptbm.staff.technology.upload_tech_photo');
            Route::post('/update-tech-desc/{id}', 'update_tech_desc')->name('iptbm.staff.technology.upload_tech_desc');
            Route::post('/upload-tech-flow/{id}', 'upload_tech_flow')->name('iptbm.staff.technology.upload_tech_flow');
            Route::post('/update-tech-flow/{id}', 'update_tech_flow_desc')->name('iptbm.staff.technology.update_tech_flow_desc');
            Route::post('/upload-requirements/{id}', 'upload_requirements')->name('iptbm.staff.technology.upload_requirements');
            Route::post('/update-req-desc{id}', 'update_req_desc')->name('iptbm.staff.technology.update_req_desc');
            Route::post('/upload-other{id}', 'upload_other')->name('iptbm.staff.technology.upload_other');
            Route::post('/update-other{id}', 'update_other')->name('iptbm.staff.technology.update_other');
            Route::post('/update-adoptor{id}', 'update_adoptor')->name('iptbm.staff.technology.update_adoptor');
            Route::post('/delete-adoptor', 'delete_adoptor')->name('iptbm.staff.technology.delete_adoptor');
            Route::post('/update-tech-app-desc/{id}', 'update_tech_app_desc')->name('iptbm.staff.technology.update_tech_app_desc');
            Route::post('/upload-tech-app-pdf/{id}', 'upload_tech_app_pdf')->name('iptbm.staff.technology.upload_tech_app_pdf');
            Route::post('/update-market-desc/{id}', 'update_market_desc')->name('iptbm.staff.technology.update_market_desc');
            Route::post('/upload-market-pdf/{id}', 'upload_market_pdf')->name('iptbm.staff.technology.upload_market_pdf');
            Route::post('/update-signif-desc/{id}', 'update_signif_desc')->name('iptbm.staff.technology.update_signif_desc');
            Route::post('/upload-signif-pdf/{id}', 'upload_signif_pdf')->name('iptbm.staff.technology.upload_signif_pdf');
            Route::post('/update-simil-desc/{id}', 'update_simil_desc')->name('iptbm.staff.technology.update_simil_desc');
            Route::post('/upload-simil-pdf/{id}', 'upload_simil_pdf')->name('iptbm.staff.technology.upload_simil_pdf');
            Route::post('/update-limmit-desc/{id}', 'update_limmit_desc')->name('iptbm.staff.technology.update_limmit_desc');
            Route::post('/upload-limmit-pdf/{id}', 'upload_limmit_pdf')->name('iptbm.staff.technology.upload_limmit_pdf');
        });
        Route::post('/update-pathway/{id}', 'update_pathway')->name('iptbm.staff.technology.update_path');
        Route::post('/get-commodity', 'industries')->name('technology.commodity');
        Route::post('/store-tech', 'store')->name('iptbm.technology.store');
        Route::post('/update-title/{id}', 'update_title')->name('iptbm.technology.update_title');
        Route::post('/update-industry/{id}', 'updateindustry')->name('iptbm.technology.updateindustry');
        Route::post('/update-commodity/{id}', 'updatecommodity')->name('iptbm.technology.updatecommodity');
        Route::post('/delete-commodity', 'deletecmmodity')->name('iptbm.technology.deletecommodity');
        Route::post('/update-category/{id}', 'updatecategory')->name('iptbm.technology.updatecategory');
        Route::post('/delete-category', 'deletecategory')->name('iptbm.technology.deletecategory');
        Route::post('/update-status/{id}', 'updatestatus')->name('iptbm.technology.updatestatus');
        Route::post('/delete-status', 'deletestatus')->name('iptbm.technology.deletestatus');
        Route::post('/update-inventor/{id}', 'updateinventor')->name('iptbm.technology.updateinventor');
        Route::post('/delete-inventor', 'deleteinventor')->name('iptbm.technology.deleteinventor');
        Route::post('/`add-research-conductedf/{id}', 'researchconducted')->name('iptbm.technology.addresearch');
        Route::post('/delete-research', 'deleteresearch')->name('iptbm.technology.deleteresearch');
        Route::post('/add-industry-partner/{id}', 'industrypartners')->name('iptbm.technology.industrypartners');
        Route::post('/delete-industry-partner', 'delindustrypartners')->name("iptbm.technology.delindustrypartners");
    });

    Route::controller(Inventor::class)->prefix('/inventor')->group(function () {
        Route::get('/', 'index')->name('iptbm.staff.inventor');
        Route::post('/create-inventor', 'create')->name('iptbm.inventor.create');
        Route::get('/show-profile/{id}', 'show')->name('iptbm.inventor.show.profile');
        Route::post('/add-expertise/{id}', 'add_expertise')->name('iptbm.inventor.add_expertise');
        Route::post('/add-tel/{id}', 'add_tel')->name('iptbm.inventor.add_tel');
        Route::post('/add-mob/{id}', 'add_mob')->name('iptbm.inventor.add_mob');
        Route::post('/add-fax/{id}', 'add_fax')->name('iptbm.inventor.add_fax');
        Route::post('/add-eml/{id}', 'add_eml')->name('iptbm.inventor.add_eml');
        Route::post('/del-contact', 'delcontact')->name('iptbm.inventor.delcontact');
        Route::post('/delete', 'destroy')->name('iptbm.inventor.delete');
    });

    Route::controller(DeploymentController::class)->prefix('/deployment')->group(function () {
        Route::get('/', 'index')->name('iptbm.staff.deployment.index');
        Route::post('/deploy-technologies', 'deploy_tech')->name('iptbm.staff.deployment.technologies');
        Route::get('/ajax-call', 'ajax_call')->name('iptbm.staff.deployment.ajax_call');
        Route::controller(DeployedTechController::class)->prefix('/deployed-tech')->group(function () {
            Route::get('/{id}', 'index')->name('iptbm.staff.deployment.deployed_tech');
            Route::post('/add-contact/{id}', 'add_contact')->name('iptbm.staff.deployedtech.add_contact');
            Route::post('/delete-number', 'delete_contact')->name('iptbm.staff.deployment.deployed_tect.delContact');
        });
    });
    Route::controller(ExtensionController::class)->prefix('/extension')->group(function () {
        Route::get('/', 'index')->name('iptbm.staff.extension.index');
        Route::get('/extension-tech', 'extension_tech')->name('iptbm.staff.extension.tech');
        Route::post('/extension-tech', 'extend_tech')->name('iptbm.staff.extension.extend_tech');
        Route::controller(ExtensionTechController::class)->prefix('/extension-tech')->group(function () {
            Route::get('/{id}', 'index')->name('iptbm.staff.extension.view_tech');
            Route::post('/add-contact/{id}', 'add_contact')->name('iptbm.staff.extension.add_contact');
            Route::post('/delete-number', 'delete_contact')->name('iptbm.staff.extension.delContact');
        });
    });

    Route::controller(IpManagement::class)->group(function () {
        Route::prefix('/ip-management')->group(function () {
            Route::get('/', 'index')->name('iptbm.staff.ip-management');
            Route::controller(IpApplication::class)->prefix('/application')->group(function () {
                Route::get('/{id}', 'index')->name('iptbm.staff.ip-management.application.index');
                Route::post('/update-protect-status/{id}', 'update_protect_status')->name('iptbm.staff.ip-application.update_protect_status');
                Route::post('/update-abstract/{id}', 'update_abstract')->name('iptbm.staff.ip-application.update_abstract');
                Route::post('/add-agent/{id}', 'add_agent')->name('iptbm.staff.ip-application.add_agent');
                Route::post('/delete-agent', 'delete_agent')->name('iptbm.staff.ip-application.delete_agent');
                Route::post('/add-phone/{id}', 'add_phone')->name('iptbm.staff.ip-application.add_phone');
                Route::post('/add-mobile/{id}', 'add_mobile')->name('iptbm.staff.ip-application.add_mobile');
                Route::post('/add-fax/{id}', 'add_fax')->name('iptbm.staff.ip-application.add_fax');
                Route::post('/add-mail/{id}', 'add_email')->name('iptbm.staff.ip-application.add_email');
                Route::post('/delete-phone/{id}', 'delete_phone')->name('iptbm.staff.ip-application.delete_phone');
                Route::post('/delete-mobile/{id}', 'delete_mobile')->name('iptbm.staff.ip-application.delete_mobile');
                Route::post('/delete-fax/{id}', 'delete_fax')->name('iptbm.staff.ip-application.delete_fax');
                Route::post('/delete-mail/{id}', 'delete_email')->name('iptbm.staff.ip-application.delete_email');
            });
            Route::controller(IpAlertTask::class)->prefix('/ip-task')->group(function () {
                Route::get('/{id}', 'index')->name('iptbm.staff.ip-alert.task');
                Route::get('/add-task/{id}', 'add_task')->name('iptbm.staff.ip-alert.add_task');
                Route::post('/get-stages', 'get_stages')->name("iptbm.staff.ip-alert.task.get_stages");
                Route::post('/store-task/{id}', 'store')->name("iptbm.staff.ip-alert.task.store");
                Route::post('/create/{id}', 'create')->name('iptbm.staff.ip-alert.task.create');
                Route::controller(IpTaskView::class)->prefix('/task-stage')->group(function () {
                    Route::get('/stage-view/{id}', 'index')->name('iptbm.staff.iptask.view');
                    Route::post('/update-priority/{id}', 'update_priority')->name('iptbm.staff.iptask.updatePriority');
                    Route::post('/update-status/{id}', 'update_status')->name('iptbm.staff.iptask.task.update_status');
                    Route::post('/add-personel-incharge/{id}', 'add_personnel')->name('iptbm.staff.iptask.add_personnel');
                    Route::post('/delete-personel-incharget', 'delete_person')->name('iptbm.staff.iptask.delete_person');
                    Route::post('/add-unit-incharge/{id}', 'add_unit')->name('iptbm.staff.iptask.add_unit');
                    Route::post('/delete-unit-incharget', 'delete_unit')->name('iptbm.staff.iptask.delete_unit');
                    Route::post('/update-deadline/{id}', 'deadline')->name('iptbm.staff.iptask.update_deadline');
                    Route::post('/delete-deadline', 'delete_deadline')->name('iptbm.staff.iptask.delete_deadline');
                    Route::post('/update-description/{id}', 'update_description')->name('iptbm.staff.iptask.update_description');
                    Route::post('/upload-attachment/{id}', 'upload_attachment')->name('iptbm.staff.iptask.upload_attachment');
                    Route::post('/delete-attachment', 'delete_attachment')->name('iptbm.staff.iptask.delete_attachment');
                    Route::post('/update-notification/{id}', 'update_notification')->name('iptbm.staff.iptask.update_notification');
                    Route::controller(AlertNotifController::class)->prefix('/alert')->group(function () {
                        Route::get('/{id}/{name}', 'index')->name('iptbm.staff.iptask.notifications');
                        Route::post('/update-notification/{id}', 'update_notification')->name('iptbm.staff.iptask.notifications_update');
                    });
                });
            });
            Route::post('/create', 'create')->name('iptbm.staff.ip-management.create');
        });
    });
    Route::controller(PrecomController::class)->prefix('/pre-commercialization')->group(function () {
        Route::get('/', 'index')->name('iptbm.staff.precom.index');
        Route::post('precom-add-technology', 'store')->name('iptbm.staff.precom.add_technology');
        Route::post('/delete-precom', 'delete_precom')->name('iptbm.staff.precom.delete_technology');
        Route::controller(PrecomDetailsController::class)->prefix('/details')->group(function () {
            Route::get('/{id}', 'index')->name('iptbm.staff.precom.details');


            Route::post('/update-market-summary/{id}', 'update_market_summary')->name('iptbm.staff.precom.details.update_summary');
            Route::post('/update-capital/{id}', 'update_capital')->name('iptbm.staff.precom.update_capital');
            Route::post('/update-return_investment/{id}', 'return_investment')->name('iptbm.staff.precom.return_investment');
            Route::post('/update-break-even/{id}', 'breakeven')->name('iptbm.staff.precom.breakeven');
            Route::post('/update-valuation/{id}', 'valuation_summary')->name('iptbm.staff.precom.valuation_summary');
            Route::post('/update-freed-to-operate/{id}', 'freedom_operate')->name('iptbm.staff.precom.freedom_operate');
            Route::post('/update-term_sheet/{id}', 'term_sheet')->name('iptbm.staff.precom.term_sheet');
            Route::post('/update-opinion_report/{id}', 'opinion_report')->name('iptbm.staff.precom.opinion_report');
            Route::post('/delete-opinion_report', 'delete_report')->name('iptbm.staff.precom.delete_report');
            Route::post('/update-com-mode/{id}', 'update_mode')->name('iptbm.staff.precom.update_mode');
            Route::post('/update-cost-amount/{id}', 'update_cost_amount')->name('iptbm.staff.precom.update_cost_amount');
            Route::post('/update-video-clip/{id}', 'update_clip')->name('iptbm.staff.precom.update_clip');
            Route::post('/upload-license-copy/{id}', 'upload_license_copy')->name('iptbm.staff.precom.upload_license_copy');
            Route::post('/upload-finance_copy/{id}', 'upload_finance_copy')->name('iptbm.staff.precom.upload_upload_finance');
            Route::post('upload-machine-cert/{id}', 'upload_machine_cert_copy')->name('iptbm.staff.precom.upload_upload_machine');
            Route::post('upload-feasibility_study/{id}', 'upload_feasibility_study')->name('iptbm.staff.precom.upload_feasibility_study');
            Route::post('upload-business-model/{id}', 'upload_business_model')->name('iptbm.staff.precom.upload_business_model');
            Route::post('upload-income-gen/{id}', 'update_income_gen')->name('iptbm.staff.precom.update_income_gen');
        });
    });
    Route::controller(CommercializationAdopter::class)->prefix('/adopter')->group(function () {
        Route::get('/', 'index')->name('iptbm.staff.adopter.index');
        Route::post('/store', 'store')->name('iptbm.staff.adopter.store');
        Route::controller(AdoptedTechController::class)->prefix('/adopted-tech')->group(function () {
            Route::get('/{id}', 'index')->name('iptbm.staff.commercialization.adoptedTech');
            Route::post('/update/{id}', 'update_details')->name('iptbm.staff.commercialization.update');
            Route::post('/add-contact/{id}', 'add_contact')->name('iptbm.staff.commercialization.add_contact');
        });
    });

});

Route::middleware(['component:ABH', 'auth', 'verified'])->prefix('/abh')->group(function () {
    Route::get('/',function (){
        return Redirect::to('/dashboard');
    });
    Route::get('/dashboard', DashBoardPage::class);

  /*
   *   Route::controller(AbhController::class)->group(function () {
        Route::get('/{dashboard?}', 'dashboard')->where(['dashboard' => 'dashboard']);
    });
   */
    Route::prefix('profile')->group(function (){
        Route::get('/', Profile::class)->name('abh.staff.profile');
        Route::get('project/{project}', ProjectPage::class)->name('abh.staff.profile.project');
        Route::get('/all-profile', AbhAllProfilePage::class)->name('abh.staff.profile.all_profile');
        Route::get('/public-view/{profile}', AbhPublicProfileView::class)->name('abh.staff.profile.public-view');
        Route::get('/profile-projects/{profile}', AbhAllProfileProjectPage::class)->name('abh.staff.profile.projects-list');
    });
    Route::prefix('/generator')->group(function () {
        Route::get('/', GeneratorPage::class)->name('abh.staff.generators');
        Route::get('/details/{generator}', AbhGeneratorDetailsPage::class)->name('abh.staff.generator_details');
    });
    Route::prefix('/technology')->group(function () {
        Route::get('/', AbhTechnologyPage::class)->name('abh.staff.technology');
        Route::get('/{technology}', AbhTechnologyDetailPage::class)->name('abh.staff.technology.view-technology');
        Route::get('/photo/{technology}', AbhTechImagePage::class)->name('abh.image-viewer');
        Route::get('/all-tech/view', AbhAllTechnologyPage::class)->name('abh.staff.technology.allTech');
    });


   /*
    *
        Route::controller(AbhProfileController::class)->prefix('/profiles')->group(function () {
        Route::get('/', 'index');
        Route::get('project/{project}','view_project');
        Route::post('project/delete/{project}','delete')->name('abh.staff.profile.project.delete');
        Route::get('/all-profile','view_all_profile');
        Route::get('/public-view{profile}','all_profile_public_view');
        Route::get('/profile-projects/{profile}','all_projects');
    });
    */


   /*
    *  Route::controller(AbhGeneratorController::class)->prefix('/generator')->group(function (){
        Route::get('/','index')->name('abh.staff.generators');
        Route::get('/details/{generator}','generator_details')->name('abh.staff.generator_details');
        Route::post('/delete_generator/{generator}}','delete_generator')->name('abh.staff.delete_generator');
    });
    */

  /*
   *   Route::controller(AbhTechController::class)->prefix('/technologyies')->group(function () {
        Route::get('/','index');
        Route::get('/{technology}','view_tech');
        Route::get('view-image/{technology}','view_image');
    });
   */

});


require __DIR__ . '/auth.php';


Route::middleware(['component:IPTBM', 'auth:admin', 'verified'])->prefix('/admin/iptbm')->group(function () {
    Route::get('/',function (){
        return Redirect::to('/dashboard');
    });
    Route::get('/dashboard', [AdminDashboard::class, 'index'])->name('admin.iptbm.dashboard');
    Route::prefix('/add-record')->group(function () {

        Route::controller(RegionsController::class)->prefix('/region')->group(function () {
            Route::get('/', 'index')->name('iptbm.admin.addrecord.region');
            Route::get('/get-regions', 'regions_ajax')->name('iptbm.admin.addrecord.get_regions');
            Route::get('/add-region', 'add_region_view')->name('iptbm.admin.addrecord.add_region');
            Route::post('/add-region-record', 'add_region')->name('iptbm.admin.addrecord.add_region_record');
            Route::controller(EditRegionController::class)->prefix('/edit-region')->group(function () {
                Route::get('/{id}', 'index')->name('iptbm.admin.editregion.index');
            });
        });

        Route::controller(AgenciesController::class)->prefix('/agencies')->group(function () {
            Route::get('/', 'index')->name('iptbm.admin.addrecord.agencies');
            Route::get('/view-agency/{agency}', 'view_agency')->name('iptbm.admin.view-agency');
            Route::get('/get-agencies', 'agencies_ajax')->name('iptbm.admin.addrecord.get_agencies');
            Route::get('/add-agency', 'add_agency_view')->name('iptbm.admin.addrecord.add_agency');
            Route::post('/add-agency-record', 'add_agency')->name('iptbm.admin.addrecord.add_agency_record');

        });
        Route::controller(AccountsController::class)->prefix('/account')->group(function () {
            Route::get('/', 'index')->name('iptbm.admin.addrecord.account');
            Route::get('/get-accounts', 'accounts_request')->name('iptbm.admin.addrecord.get_account');
            Route::get('/add-account', 'add_account')->name('iptbm.admin.addrecord.add_account');
            Route::post('/add-account-record', 'add_account_record')->name('iptbm.admin.addrecord.add_account_record');
            Route::controller(EditAccountController::class)->prefix('/edit')->group(function () {
                Route::get('/{id}', 'index')->name('iptbm.admin.addrecord.editaccount');
            });

        });
        Route::prefix('/tech-component')->group(function () {
            Route::controller(TechCompIndustryController::class)->prefix('/tech-industry')->group(function () {
                Route::get('/', 'index')->name('iptbm.addrecord.tech-comp.industry');
            });
            Route::controller(TechCommodityController::class)->prefix('/tech-commodities')->group(function () {

                Route::get('/{industry}', 'index')->name('iptbm.addrecord.techCommodities');
            });
            Route::controller(TechcompCategoryController::class)->prefix('/tech-category')->group(function () {
                Route::get('/{industry}', 'index')->name('iptbm.addrecord.techCategories');
            });
            Route::controller(TechCompAdopterController::class)->prefix('/tech-adopter')->group(function () {
                Route::get('/', 'index')->name('iptbm.addrecord.tech-adopter');
            });
        });


        Route::prefix('/iptbm-prof')->group(function () {
            Route::get('/', [IptbmProfileController::class, 'index'])->name('iptbm.admin.iptbm_profiles.index');
            Route::controller(IptbmProfileController::class)->prefix('/profiles')->group(function () {
                Route::get('/', 'index')->name('iptbm.admin.iptbm_profiles.profiles');
                // Route::get('/profile-list/{id}', 'profileList')->name('iptbm.admin.iptbm_profiles.profiles-list');
                Route::get('/view-profile/{profile}', 'profile')->name('iptbm.admin.iptbm_profiles.view-profile');
                Route::get('/profile-projects', 'profile_projects')->name('iptbm.admin.iptbm_profiles.profile-projects');
                Route::get('/project-view/{project}', 'project_view')->name('iptbm.admin.iptbm_profiles.profile-projects.view');


                Route::get('/profile-details/{id}', 'profileDetails')->name('iptbm.admin.iptbm_profiles.profiles-details');
                Route::get('/profile-details/technology/{id}', 'profileTechnology')->name('iptbm.admin.iptbm_profiles.profiles-details.technology');

                Route::get('/iptbm-prof-request', 'listAjax')->name('iptbm.admin.iptbm-profile.get-list');
            });
        });
        Route::controller(TechnologyReportController::class)->prefix('/technologies')->group(function () {
            Route::get('/', 'index')->name('iptbm.admin.technologies-report');
            Route::get('/view-techology/{technology}', 'view_tech')->name('iptbm.admin.technology.view-tech');
        });
        Route::controller(IpApplicationController::class)->prefix('/ip-application-report')->group(function () {
            Route::get('/{iptype}', 'index')->name('iptbm.admin.ip-application-report')->where('id', '[0-9]+');
            Route::get('/{task:ip_type_id}/task', 'ip_task')->name('iptbm.admin.ip-application-report.task');
            Route::get('/{task}/task/details', 'task_details')->name('iptbm.admin.ip-application-report.task-details');
        });

        Route::controller(\App\Http\Controllers\iptbm\admin\IptbmTechTransController::class)->prefix('/tech-trans')->group(function () {
            Route::get('/{precom?}', 'index')->name('iptbm.admin.techtrans.precom')->where(['precom' => 'precom']);
            Route::get('/precom/{precom}', 'precom_view')->name('iptbm.admin.techtrans.precom.view');
            Route::get('/adopter', 'adopter')->name('iptbm.admin.techtrans.adopter');
            Route::get('/adopter/{adopter}', 'adopter_view')->name('iptbm.admin.techtrans.adopter.view');
            Route::get('/deployment', 'deployment')->name('iptbm.admin.techtrans.deployment');
            Route::get('/extension', 'extension')->name('iptbm.admin.techtrans.extension');
        });


        Route::prefix('/ip-alerts')->group(function () {
            Route::get('/', IpAlert::class)->name('iptbm.admin.ipalerts');
            Route::get('/utility-model', UtilityModel::class)->name('iptbm.admin.utilityModel');
            Route::get('/trademark', TradeMark::class)->name('iptbm.admin.trademark');
            Route::get('/industrial-design', IndustrialDesign::class)->name('iptbm.admin.industrialDesign');
            Route::get('/copyright', CopyRight::class)->name('iptbm.admin.copyright');
            Route::get('/plant-variety', PlantVariety::class)->name('iptbm.admin.plantvariety');
        });
    });
});

Route::middleware(['component:ABH', 'auth:admin', 'verified'])->group(function () {
    Route::controller(AbhAdminController::class)->prefix('/admin/abh')->group(function () {
        Route::get('/{dashboard?}', 'index')->name('abh.admin.dashboard');

    });

});

require __DIR__ . '/IptbmAdminAuth.php';

