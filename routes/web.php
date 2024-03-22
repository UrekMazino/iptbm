<?php

use App\Http\Controllers\api\AbhApi;
use App\Http\Controllers\api\IptbmApi;
use App\Http\Controllers\iptbm\admin\AccountsController;
use App\Http\Controllers\iptbm\admin\AdminDashboard;
use App\Http\Controllers\iptbm\admin\AgenciesController;
use App\Http\Controllers\iptbm\admin\EditAccountController;
use App\Http\Controllers\iptbm\admin\EditRegionController;
use App\Http\Controllers\iptbm\admin\IpApplicationController;
use App\Http\Controllers\iptbm\admin\IptbmProfileController;
use App\Http\Controllers\iptbm\admin\IptbmTechTransController;
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
use App\Http\Livewire\Abh\Admin\Pages\Dashboard\Index;
use App\Http\Livewire\Abh\Admin\Pages\Profile\AbhProfileDetail;
use App\Http\Livewire\Abh\Admin\Pages\Profile\AllAbhProfile;
use App\Http\Livewire\Abh\Admin\Pages\Projects\AbhProject;
use App\Http\Livewire\Abh\Admin\Pages\Projects\AbhProjectDetails;
use App\Http\Livewire\Abh\Admin\Pages\Technologies\AbhTechnologiesDetail;
use App\Http\Livewire\Abh\Admin\Pages\Technologies\AbhTechnology;
use App\Http\Livewire\Abh\Admin\Pages\TechTrans\AbhDeploymentPage;
use App\Http\Livewire\Abh\Admin\Pages\TechTrans\AbhExtensionPage;
use App\Http\Livewire\Abh\Admin\Pages\TechTrans\CommercializationPathway\AbhAdopterDetails;
use App\Http\Livewire\Abh\Admin\Pages\TechTrans\CommercializationPathway\AbhAdopterPage;
use App\Http\Livewire\Abh\Admin\Pages\TechTrans\CommercializationPathway\AbhPrecomDetailsAdmin;
use App\Http\Livewire\Abh\Admin\Pages\TechTrans\CommercializationPathway\AbhPrecomPage;
use App\Http\Livewire\Abh\Admin\Pages\Updates\AbhAccountDetails;
use App\Http\Livewire\Abh\Admin\Pages\Updates\AbhAccountPage;
use App\Http\Livewire\Abh\Admin\Pages\Updates\AbhAgenciesPage;
use App\Http\Livewire\Abh\Admin\Pages\Updates\AbhAgencyDetails;
use App\Http\Livewire\Abh\Admin\Pages\Updates\AbhRegionDetails;
use App\Http\Livewire\Abh\Admin\Pages\Updates\AbhRegionPage;
use App\Http\Livewire\Abh\Dashboard\DashBoardPage;
use App\Http\Livewire\Abh\Pages\Commercialization\AbhPrecomDetails;
use App\Http\Livewire\Abh\Pages\Commercialization\AbhPrecomFileViewer;
use App\Http\Livewire\Abh\Pages\Commercialization\ComerAdopter;
use App\Http\Livewire\Abh\Pages\Commercialization\ComerAdopterDetail;
use App\Http\Livewire\Abh\Pages\Commercialization\Precom;
use App\Http\Livewire\Abh\Pages\Commercialization\PrecomTechPhoto;
use App\Http\Livewire\Abh\Pages\Generator\AbhGeneratorDetailsPage;
use App\Http\Livewire\Abh\Pages\Generator\GeneratorPage;
use App\Http\Livewire\Abh\Pages\Profile\AbhAllProfilePage;
use App\Http\Livewire\Abh\Pages\Profile\AbhAllProfileProjectPage;
use App\Http\Livewire\Abh\Pages\Profile\AbhPublicProfileView;
use App\Http\Livewire\Abh\Pages\Profile\Profile;
use App\Http\Livewire\Abh\Pages\Profile\ProjectPage;

use App\Http\Livewire\Abh\Pages\Technology\AbhTechImagePage;
use App\Http\Livewire\Abh\Pages\Technology\AbhTechnologyDetailPage;
use App\Http\Livewire\Abh\Pages\Technology\AbhTechnologyPage;
use App\Http\Livewire\FileView;
use App\Http\Livewire\Iptbm\Admin\Copyright\CopyRight;
use App\Http\Livewire\Iptbm\Admin\Industrial\IndustrialDesign;
use App\Http\Livewire\Iptbm\Admin\IpAlert\IpAlert;
use App\Http\Livewire\Iptbm\Admin\Plantvariety\PlantVariety;
use App\Http\Livewire\Iptbm\Admin\Trademark\TradeMark;
use App\Http\Livewire\Iptbm\Admin\UtilityModel\UtilityModel;
use App\Http\Livewire\IptbmFileViewer;


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



/**
 * Route for handling user redirection based on authentication status.
 * If an admin is authenticated, they are redirected to the admin login page;
 * otherwise, regular users are redirected to the login page.
 */
Route::get('/', function () {
    // Check if an admin is authenticated
    if (Auth::guard('admin')->check()) {
        // Redirect admin to admin login page
        return Redirect::to('admin/login');
    }
    // Redirect regular users to login page
    return Redirect::to('login');
});


/**
 * All Post requests are handled in livewire components.
 * CREATE, UPDATE, DELETE, including form validation.
 */


// this should be api for kms,
Route::prefix('/api')->group(function (){
    Route::controller(AbhApi::class)->prefix('/abh')->group(function (){
        Route::get('abh-profile','abh_profile');
    });
    Route::controller(IptbmApi::class)->prefix('iptbm')->group(function (){
        Route::get('/profile','iptbm_profile');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['component:IPTBM', 'auth', 'verified'])->prefix('/iptbm')->group(function () {
    Route::get('/iptbm-file', IptbmFileViewer::class)->name('rtms.file.viewer.iptbm');

    Route::get('/dashboard', [DashBoard::class, 'index'])->name('iptbm.staff.dashboard');

    Route::controller(IpProfile::class)->prefix('/profile')->group(function () {
        Route::get('/', 'index')->name('iptbm.staff.ipProfile');
        Route::get('/all-profile', 'allProfile')->name('iptbm.staff.allProfile');
        Route::get('/viewprofile/{id}', 'viewProfile')->name('iptbm.staff.viewProfile');
        Route::get('/view-profile-project/{profile}','all_profile_projects')->name('iptbm.staff.viewProfile.projects');


        Route::controller(ProjectController::class)->prefix('/projects')->group(function () {
            Route::get('/{id}', 'index')->name('iptbm.staff.project');
            Route::get('/edit/{id}', 'edit')->name('iptbm.staff.project.edit');
        });
    });

    Route::controller(Technology::class)->prefix('/technology')->group(function () {
        Route::get('/', 'index')->name('iptbm.staff.technology');
        Route::get('/iptbm-technology', 'iptbmtech')->name('iptbm.staff.technology.all');
        Route::get('/show/{id}', 'show')->withTrashed()->name('iptbm.staff.technology.show');
        Route::get('/add-details', 'techdetails')->name('addd.technology.details');
        Route::get('/tech-public/{id}', 'publicView')->name('iptbm.staff.tech.public-view');
        Route::controller(TechnologyDescription::class)->prefix('/technology-description')->group(function () {
            Route::get('/{id:iptbm_technology_profile_id}', 'index')->name('iptbm.staff.technology.description');
        });
    });

    Route::controller(Inventor::class)->prefix('/inventor')->group(function () {
        Route::get('/', 'index')->name('iptbm.staff.inventor');
        Route::get('/show-profile/{id}', 'show')->name('iptbm.inventor.show.profile');
    });

    Route::controller(DeploymentController::class)->prefix('/deployment')->group(function () {
        Route::get('/', 'index')->name('iptbm.staff.deployment.index');
        Route::controller(DeployedTechController::class)->prefix('/deployed-tech')->group(function () {
            Route::get('/{id}', 'index')->name('iptbm.staff.deployment.deployed_tech');
        });
    });
    Route::controller(ExtensionController::class)->prefix('/extension')->group(function () {
        Route::get('/', 'index')->name('iptbm.staff.extension.index');
        Route::get('/extension-tech', 'extension_tech')->name('iptbm.staff.extension.tech');
        Route::controller(ExtensionTechController::class)->prefix('/extension-tech')->group(function () {
            Route::get('/{id}', 'index')->name('iptbm.staff.extension.view_tech');
        });
    });

    Route::controller(IpManagement::class)->group(function () {
        Route::prefix('/ip-management')->group(function () {
            Route::get('/', 'index')->name('iptbm.staff.ip-management');
            Route::controller(IpApplication::class)->prefix('/application')->group(function () {
                Route::get('/{id}', 'index')->name('iptbm.staff.ip-management.application.index');
            });
            Route::controller(IpAlertTask::class)->prefix('/ip-task')->group(function () {
                Route::get('/{id}', 'index')->name('iptbm.staff.ip-alert.task');
                Route::get('/add-task/{id}', 'add_task')->name('iptbm.staff.ip-alert.add_task');

                Route::controller(IpTaskView::class)->prefix('/task-stage')->group(function () {
                    Route::get('/stage-view/{id}', 'index')->name('iptbm.staff.iptask.view');
                    /*
                     * Route::controller(AlertNotifController::class)->prefix('/alert')->group(function () {
                        Route::get('/{id}/{name}', 'index')->name('iptbm.staff.iptask.notifications');
                    });
                     */
                });
            });
           // Route::post('/create', 'create')->name('iptbm.staff.ip-management.create');
        });
    });
    Route::controller(PrecomController::class)->prefix('/pre-commercialization')->group(function () {
        Route::get('/', 'index')->name('iptbm.staff.precom.index');

        Route::controller(PrecomDetailsController::class)->prefix('/details')->group(function () {
            Route::get('/{id}', 'index')->name('iptbm.staff.precom.details');
        });
    });
    Route::controller(CommercializationAdopter::class)->prefix('/adopter')->group(function () {
        Route::get('/', 'index')->name('iptbm.staff.adopter.index');
        Route::controller(AdoptedTechController::class)->prefix('/adopted-tech')->group(function () {
            Route::get('/{id}', 'index')->name('iptbm.staff.commercialization.adoptedTech');

        });
    });

});

Route::middleware(['component:ABH', 'auth', 'verified'])->prefix('/abh')->group(function () {
    Route::get('/',function (){
        return Redirect::to('/dashboard');
    });
    Route::get('/dashboard', DashBoardPage::class);
    Route::get('/file', FileView::class)->name('rtms.file.viewer');

    Route::prefix('profile')->group(function (){
        Route::get('/', Profile::class)->name('abh.staff.profile');
        Route::get('project/{project}', ProjectPage::class)->name('abh.staff.profile.project');
        Route::get('/all-profile', AbhAllProfilePage::class)->name('abh.staff.profile.all_profile');
        Route::get('/public-view/{profile}', AbhPublicProfileView::class)->name('abh.staff.profile.public-view');
        Route::get('/profile-projects/{profile}', AbhAllProfileProjectPage::class)->name('abh.staff.profile.projects-list');
    });

    Route::prefix('/technology')->group(function () {
        Route::get('/', AbhTechnologyPage::class)->name('abh.staff.technology');
        Route::get('/{application}', AbhTechnologyDetailPage::class)->name('abh.staff.technology.tech_application.detail');
        Route::get('/photo/{technology}', AbhTechImagePage::class)->name('abh.image-viewer');

    });

    Route::prefix('/commercialization')->group(function (){
        Route::get('/precom', Precom::class)->name('abh.staff.commercialization.precom');
        Route::get('/precom/{precom}', AbhPrecomDetails::class)->name('abh.staff.commercialization.precom.details');
        Route::get('/precom-tech-images/{technology}', PrecomTechPhoto::class)->name('abh.staff.commercialization.precom.show.images');
        Route::get('/precom/files/{precom}/{type}/', AbhPrecomFileViewer::class)->name('abh.staff.commercialization.precom.show.files');

        Route::get('/adopter', ComerAdopter::class)->name('abh.staff.commercialization.adopter');
        Route::get('/adopter/{adopter}', ComerAdopterDetail::class)->name('abh.staff.commercialization.adopter.details');
    });




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
                Route::get('/{id}', 'index')->withTrashed()->name('iptbm.admin.addrecord.editaccount');
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

        Route::controller(IptbmTechTransController::class)->prefix('/tech-trans')->group(function () {
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
    Route::get('/file-vide-admin',\App\Http\Livewire\Abh\Admin\FileViewAdmin::class)->name('abh.admin.file');
    Route::prefix('/admin/abh')->group(function () {
        Route::get('/dashboard', Index::class)->name('abh.admin.dashboard');
        Route::get('/profiles', AllAbhProfile::class)->name('abh.admin.my_profile');
        Route::get('/profile/{profile}', AbhProfileDetail::class)->name('abh.admin.my_profile.details');
        Route::get('/projects', AbhProject::class)->name('abh.admin.all_projects');
        Route::get('/project/{project}', AbhProjectDetails::class)->name('abh.admin.project.details');


        Route::get('/technologies', AbhTechnology::class)->name('abh.admin.all_technologies');
        Route::get('/tech-details/{ipprotec}', AbhTechnologiesDetail::class)->name('abh.admin.technology.details');


        Route::prefix('/commercialized-tech')->group(function (){
            Route::get('/precom', AbhPrecomPage::class)->name('abh.admin.commercialization.all_precom');
            Route::get('/precom-details/{precom}', AbhPrecomDetailsAdmin::class)->name('abh.admin.commercialization.precom-details.admin');

            Route::get('/adopter', AbhAdopterPage::class)->name('abh.admin.commercialization.all_adopter');
            Route::get('/adopter-details/{adopter}', AbhAdopterDetails::class)->name('abh.admin.commercialization.adopter.details');
        });
        Route::get('/deployment',AbhDeploymentPage::class)->name('abh.admin.all_deployment');
        Route::get('/extension', AbhExtensionPage::class)->name('abh.admin.all_extension');


        Route::get('/regions', AbhRegionPage::class)->name('abh.admin.all_regions');
        Route::get('/region/{region}', AbhRegionDetails::class)->name('abh.admin.all_regions.details');

        Route::get('/agencies', AbhAgenciesPage::class)->name('abh.admin.all_agencies');
        Route::get('/agency/{agency}', AbhAgencyDetails::class)->name('abh.admin.all_agencies.updates');

        Route::get('/accounts', AbhAccountPage::class)->name('abh.admin.all_accounts');
        Route::get('/account/{account}', AbhAccountDetails::class)->withTrashed()->name('abh.admin.all_accounts_details');



       /*
        *  Route::get('/industries', AbhTechIndustryPage::class)->name('abh.admin.all_industries');
        Route::get('/commodity/{industry}', AbhCommoditiesPage::class)->name('abh.admin.commodity');
        Route::get('/category/{industry}', AbhTechCategoriesPage::class)->name('abh.admin.category');

        */

    });

    /*
     * Route::controller(AbhAdminController::class)->prefix('/admin/abh')->group(function () {
        Route::get('/{dashboard?}', 'index')->name('abh.admin.dashboard');

    });
     */

});

require __DIR__ . '/IptbmAdminAuth.php';

