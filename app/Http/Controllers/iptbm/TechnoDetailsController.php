<?php

namespace App\Http\Controllers\iptbm;

use App\Http\Controllers\Controller;
use App\Models\iptbm\IptbmCommodity;
use App\Models\iptbm\IptbmIndustry;
use App\Models\iptbm\IptbmTechCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TechnoDetailsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function storetechindustry(Request $request): RedirectResponse
    {
        $request->validate([
            'name_indus'=>'required|max:255|unique:iptbm_industries,name'
        ]);

        IptbmIndustry::create([
            'name'=>$request->name_indus
        ]);

        return redirect()->back()->with('success-adIndus','data save successfully..!');
    }
    public function storetechcategory(Request $request): RedirectResponse
    {
        $request->validate([
            'indus_name'=>'required',
            'name_cat'=>'required|max:255|unique:iptbm_tech_categories,name'
        ],[
            'name_cat.required'=>'Category Name is required.',
            'name_cat.unique'=>'Category name has already been taken.',
        ]);
        $industry=IptbmIndustry::find($request->indus_name);
        $industry->techcategory()->saveMany([
            new IptbmTechCategory([
                'name'=>$request->nam_cat
            ]),
        ]);
        return redirect()->back()->with('success-cat','data save successfully..!');
    }
    public function storetechcommodity(Request $request): RedirectResponse
    {
        $request->validate([
            'indus_name'=>'required',
            'name_com'=>'required|max:255|unique:iptbm_commodities,name'
        ],[
            'name_com.required'=>'Commodity Name is required.',
            'name_com.unique'=>'Commodity name has already been taken.',
        ]);
        $industry=IptbmIndustry::find($request->indus_name);
        $industry->commodities()->saveMany([
            new IptbmCommodity([
                'name'=>$request->name_com
            ]),
        ]);


        return redirect()->back()->with('success-com','data save successfully..!');
    }


}
