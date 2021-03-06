<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Jobs\SendVerificationEmail;
use App\Models\User\Advertiser;
use App\Models\User\Publisher;
use App\Models\User\User;
use App\Models\UserProfile;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/publisher/dashboard';

    const ADVERTISER_ROLE = 'advertiser';
    const PUBLISHER_ROLE = 'publisher';

    protected $rolesMap = [
        self::ADVERTISER_ROLE => Advertiser::ROLE,
        self::PUBLISHER_ROLE  => Publisher::ROLE
    ];

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm(Request $request)
    {
        $type = array_key_exists($request->query('type'),
            $this->rolesMap) ? $request->query('type') : self::PUBLISHER_ROLE;

        return view('auth.register', compact('type'));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     *
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'                 => 'required|string|max:255',
            'email'                => 'required|string|email|max:255|unique:users',
            'password'             => 'required|string|min:6|confirmed',
            'type'                 => 'required|string|in:' . implode(',', array_keys($this->rolesMap)),
            'agreements'           => 'required',
            'profile'              => 'array',
            'profile.company_name' => 'nullable|string',
            'profile.city'         => 'nullable|string',
            'profile.country'      => 'nullable|string',
            'profile.phone'        => 'nullable|numeric'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     *
     * @return User
     */
    protected function create(array $data)
    {
        $class = $data['type'] === self::ADVERTISER_ROLE ? Advertiser::class : Publisher::class;

        $user = $class::create([
            'name'        => $data['name'],
            'email'       => $data['email'],
            'password'    => $data['password'],
            'email_token' => base64_encode($data['email'])
        ]);

        UserProfile::create(array_merge(['user_id' => $user->id], $data['profile']));

        if ($user->isAdvertiser()) {
            $this->redirectTo = '/advertiser/dashboard';
        }

        return $user;
    }

    /**
     * Handle a registration request for the application.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        event(new Registered($user = $this->create($request->all())));
        dispatch(new SendVerificationEmail($user));

        return view('verification');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param $token
     *
     * @return \Illuminate\Http\Response
     */
    public function verify($token)
    {
        $user = User::where('email_token', $token)->first();
        $user->verified = 1;

        if ($user->save()) {
            return view('emailconfirm', ['user' => $user]);
        }
    }
}
