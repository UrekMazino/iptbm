<?php

namespace App\Http\Controllers\iptbm;

use App\Http\Controllers\Controller;
use Google_Client;
use Google_Service_Calendar;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Session;


class GoogleCalendarController extends Controller
{
    public function auth(): Application|Redirector|\Illuminate\Contracts\Foundation\Application|RedirectResponse
    {

        $client = $this->createGoogleClient();
        $client->setClientId(config('app.google_client_id'));
        $client->setClientSecret(config('app.google_client_secret'));
        $client->setRedirectUri(config('app.google_redirect_uri'));
        $client->addScope(Google_Service_Calendar::CALENDAR);


        $authUrl = $client->createAuthUrl();

        return redirect($authUrl);
    }

    private function createGoogleClient(): Google_Client
    {
        $client = new Google_Client();
        $client->setClientId(config('services.google.client_id'));
        $client->setClientSecret(config('services.google.client_secret'));
        $client->setRedirectUri(config('services.google.redirect_uri'));
        $client->setScopes(config('services.google.scopes'));
        return $client;
    }

    public function callback(Request $request)
    {
        $client = new Google_Client();
        $client->setClientId(config('app.google_client_id'));
        $client->setClientSecret(config('app.google_client_secret'));
        $client->setRedirectUri(config('app.google_redirect_uri'));
        $client->addScope(Google_Service_Calendar::CALENDAR);

        if ($request->has('code')) {
            $client->fetchAccessTokenWithAuthCode($request->code);

            // Save the access token to the database or session for future use
            $accessToken = $client->getAccessToken();
            // Example of saving the token to the session
            session(['google_access_token' => $accessToken]);

            // Redirect to a success page or perform other actions
            return redirect()->route('event.create');
        }
    }

    public function show(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        $client = $this->createGoogleClient();
        $client->setAccessToken(Session::get('google_access_token'));

        if ($client->isAccessTokenExpired()) {
            $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
            $accessToken = $client->getAccessToken();
            Session::put('google_access_token', $accessToken);
        }

        $calendarService = new Google_Service_Calendar($client);
        $calendarId = 'primary'; // Use 'primary' for the user's primary calendar
        $events = $calendarService->events->listEvents($calendarId);

        return view('google-calendar')->with('events', $events);
    }
}
