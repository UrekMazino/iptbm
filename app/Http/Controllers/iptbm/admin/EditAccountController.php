<?php

namespace App\Http\Controllers\iptbm\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;

class EditAccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(User $id): \Illuminate\Contracts\Foundation\Application|Factory|View|Application|RedirectResponse
    {
        $user = $id->load("profile", "profile.agency", "profile.agency.region");
        return view('admin.iptbm.add-record.edit-account', ['user' => $user]);
    }
}
