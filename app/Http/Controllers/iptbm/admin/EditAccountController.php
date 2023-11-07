<?php

namespace App\Http\Controllers\iptbm\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class EditAccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id): \Illuminate\Contracts\Foundation\Application|Factory|View|Application|\Illuminate\Http\RedirectResponse
    {

        $user=User::with("profile","profile.agency","profile.agency.region")->find($id);
        if(!$user)
        {
            return redirect()->route('iptbm.admin.addrecord.account');
        }
        return view('admin.iptbm.add-record.edit-account',['user'=>$user]);
    }
}
