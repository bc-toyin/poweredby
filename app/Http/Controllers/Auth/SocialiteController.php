<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SocialAccount;
use App\Models\User;
use Illuminate\Auth\Events\Registered as RegisteredEvent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laravel\Socialite\Facades\Socialite;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class SocialiteController extends Controller
{
    /**
     * Redirect the user to the Provider authentication page.
     *
     * @param $provider String
     * @return mixed
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from Provider.
     *
     * @param $provider string
     * @throws \Exception
     * @throws \Throwable
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handleProviderCallback($provider)
    {
        try {
            $providerUser = Socialite::driver($provider)->user();
        } catch (\Throwable | \Exception $e) {
            // Send actual error message in development
            if (config('app.debug')) {
                throw $e;
            }
            // Lets suppress this error
            return redirect()->route('login')
                ->with('error', __('Unable to authenticate. Please try again.'));
        }

        DB::beginTransaction();

        $user = $this->findOrCreateUser($provider, $providerUser);
        Auth::login($user, true);

        // This session variable can help to determine if user is logged-in via socialite
        session()->put([
            'auth.social_id' => $providerUser->getId()
        ]);

        DB::commit();

        return $this->authenticated($user)
            ?: redirect()->intended(RouteServiceProvider::HOME);

    }

    /**
     * Create a user if does not exist
     *
     * @param $providerName string
     * @param $providerUser
     * @return mixed
     */
    protected function findOrCreateUser($providerName, $providerUser)
    {
        $social = SocialAccount::firstOrNew([
            'provider_user_id' => $providerUser->getId(),
            'provider' => $providerName
        ]);

        if ($social->exists) {
            return $social->user;
        }

        $user = User::firstOrNew([
            'email' => $providerUser->getEmail()
        ]);

        if (!$user->exists) {
            $user->first_name = $providerUser->getName();
            $user->last_name = '';
            $user->password = bcrypt(Str::random(30));
            $user->save();
            event(new RegisteredEvent($user));
        }

        $social->user()->associate($user);
        $social->save();

        return $user;

    }

    /**
     * The user has been authenticated.
     *
     * @param  User $user
     * @return mixed
     */
    protected function authenticated(User $user)
    {

    }

    /**
     * Where to redirect users after login.
     *
     * @return string
     */
    protected function redirectTo()
    {
        return route('home');
    }
}
