<?php

namespace App\Http\Controllers\iptbm\admin;

use App\Http\Controllers\Controller;
use App\Models\iptbm\IptbmAdoptor;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TechCompAdopterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $adopters=IptbmAdoptor::all();
        return view('admin.iptbm.add-record.tech-component.adopters',compact('adopters'));
    }

    public function addAdopter(Request $request)
    {
        $request->validate([
            'adopter' =>[
                'required',
                Rule::unique('iptbm_adoptors','name')
            ],
        ]);

        IptbmAdoptor::create([
            'name'=>$request['adopter']
        ]);

        return redirect()->back()->with('adopter-success','Adopter added successfully');
    }

}
