<?php

namespace App\Http\Controllers\iptbm\staff;

use App\Charts\iptbm\admin\TechTransChart;
use App\Http\Controllers\Controller;
use App\Models\iptbm\IptbmAgency;
use App\Models\iptbm\IptbmProfile;
use App\Models\iptbm\IpType;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class DashBoard extends Controller
{
    public function __construct()
    {


        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */

    public function index(): Application|Factory|View
    {


        $months = [];
        for ($x = 1; $x <= 12; $x++) {
            $dateObj = Carbon::createFromFormat('!m', $x);
            $months[] = str_split($dateObj->format('F'), 3)[0];
        }

        $chart = new TechTransChart;
        $chart->labels($months);
        $chart->dataset('With Tech Transfer protocol in place', 'bar', [1, 2, 3, 50])->backgroundcolor("red");
        $chart->dataset('IP-TBMs', 'bar', [4, 3, 2, 1])->backgroundcolor("grey");
        $agency = IptbmAgency::all();
        $profile = IptbmProfile::with('contact', 'projects', 'technologies', 'technologies.pre_commercialization', 'technologies.ip_applications')->where('agency_id', Auth::user()->profile->agency_id)->first();
        $ipTYpe = IpType::with('tasks')->get();

        return view('iptbm.staff.dashboard', [
            'agency' => $agency,
            'technologies' => ($profile) ? $profile->technologies->count() : 0,
            'chart' => $chart,
            'technologies_list' => ($profile) ? $profile : [],
            'ip_types' => $ipTYpe,
        ]);
    }

    public function google_response()
    {
        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        //
    }
}
