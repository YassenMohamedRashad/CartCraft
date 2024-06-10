<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Exception;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Laravel\Socialite\Facades\Socialite;
use Nnjeim\World\WorldHelper;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(WorldHelper $world)
    {
        // return $world->countries()->data;
        return view('auth.register')->with([
            "countries" => $world->countries()->data,

        ]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'bail|image|mimes:png,jpg,jpeg,webp',
            'name' => 'required|string|max:255',
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::default()],
            'BirthDate' => ['required', 'date', 'before:' . Carbon::now()->subYears(10)->toDateString()],
            'country' => 'required|string',
            "phone" => 'required|regex:/^\+?(\d{1,3})?[-.\s]?\(?\d{1,4}\)?[-.\s]?\d{1,4}[-.\s]?\d{1,9}$/',
            'gender' => 'required|boolean',
            'address' => ['required', 'string', 'max:255'],
        ], [
            'BirthDate.before' => 'you need to be more than 10 years old',
            'country.required' => 'please choose country',
        ]);

        try {
            if ($request->has('image')) {
                $file = $request->file('image');
                $extention = $file->getClientOriginalExtension();
                $filename = URL('images/profile_images').'/'. time() . random_int(1, 10) . '.' . $extention;
                $file->move(public_path('images/profile_images'), $filename);
            }
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

        $user = User::create([
            'image' => $filename ?? null,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'BirthDate' => $request->BirthDate,
            'age' => (date('Y') - date('Y', strtotime($request->BirthDate))),
            'phone' => $request->phone,
            'gender' => $request->gender,
            'address' => $request->country . "-" . $request->address,
        ]);


        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }

    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callbackGoogle()
    {
        try {
            $google_user = Socialite::driver('google')->user();
            $user = User::where('google_id', $google_user->getId())->first();
            if (!$user) {
                $user = User::create([
                    'image' => $google_user->getAvatar(),
                    'name' => $google_user->getName(),
                    'email' => $google_user->getEmail(),
                    'google_id' => $google_user->getId(),
                ]);
                Auth::login($user);
            } else {
                Auth::login($user);
            }
            return redirect()->route('home');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
}
