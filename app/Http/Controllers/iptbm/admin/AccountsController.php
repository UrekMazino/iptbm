<?php

namespace App\Http\Controllers\iptbm\admin;

use App\Http\Controllers\Controller;
use App\Models\iptbm\IptbmAgency;
use App\Models\iptbm\IptbmProfile;
use App\Models\iptbm\IptbmRegion;
use App\Models\User;
use Google\Service\Directory\UserWebsite;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class AccountsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        $users = User::with('profile', 'profile.agency', 'profile.agency.region')
            ->get();

        return view('admin.iptbm.add-record.accounts', [
            'users' => $users
        ]);
    }

    /**
     * Retrieve user accounts with associated profiles, agencies, and regions.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function accounts_request(): \Illuminate\Http\JsonResponse
    {
        // Retrieve users with their associated profile, agency, and region information
        $users = User::with('profile', 'profile.agency', 'profile.agency.region')
            ->where('role', '<>', 'admin')
            ->get();


        // Return the users as JSON response
        return response()->json([
            'data' => $users
        ]);
    }

    public function add_account(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        $regions = IptbmRegion::with('agencies')->get();
        return view("admin.iptbm.add-record.add-account", [
            'regions' => $regions
        ]);
    }

    /**
     * Add a new user account record.
     *
     * This function validates the incoming request data, creates a new user account,
     * associates it with a profile, and saves it to the database.
     * It redirects back to the previous page with a success message upon successful creation.
     *
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function add_account_record(Request $request): RedirectResponse
    {
        // Validate the request data
        $request->validate([
            'account_agency' => [
                'required',
                Rule::unique('iptbm_profiles', 'agency_id')
            ],
            'account_name' => 'required|min:5',
            'account_email' => [
                'required',
                'email',
                Rule::unique('users', 'email')
            ],
            'password' => [
                'required',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]+$/',
                'min:8',
                'confirmed'
            ],
            'password_confirmation' => 'required'
        ], [
            'account_agency.required' => 'The account agency field is required.',
            'account_agency.unique' => 'The selected agency is already associated with a profile.',
            'account_name.required' => 'The account name field is required.',
            'account_name.min' => 'The account name must be at least :min characters.',
            'account_email.required' => 'The account email field is required.',
            'account_email.email' => 'The account email must be a valid email address.',
            'account_email.unique' => 'The account email is already registered.',
            'password.required' => 'The password field is required.',
            'password.regex' => 'The password must contain at least one capital letter, one small letter, and one number.',
            'password.min' => 'The password must be at least :min characters.',
            'password.confirmed' => 'The password confirmation does not match.',
            'password_confirmation.required' => 'The password confirmation field is required.',
        ]);

        // Find the agency and its associated region
        $agency = IptbmAgency::with('region')->find($request->input('account_agency'));

        // Create a new profile with the associated region and agency
        $profile = new IptbmProfile([
            'region_id' => $agency->region->id,
            'agency_id' => $agency->id
        ]);

        // Create a new user account
        $user = new User([
            'name' => $request->input('account_name'),
            'component' => 'iptbm',
            'role' => 'staff',
            'email' => $request->input('account_email'),
            'password' => Hash::make($request->input('password')),
        ]);

        // Save the user account and associate it with the profile
        $user->save();
        $user->profile()->save($profile);
        $profile->save();

        // Redirect back to the previous page with a success message
        return redirect()->back()->with('account_success', 'Account created successfully');
    }


}
