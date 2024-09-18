<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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

    protected $redirectTo = '/dashboard-role';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8','confirmed'],
            "password_confirmation" => ['required'],
            'image' => ['required','image','mimes:jpeg,png,jpg,gif,svg','max:1000'],
        ],
            [
                'name.required' => 'Name is required',
                'name.string' => 'Name must be a string',
                'name.max' => 'Name should not exceed 255 characters',
                'email.required' => 'Email is required',
                'email.string' => 'Email must be a string',
                'email.email' => 'Email must be a valid email address',
                'email.max' => 'Email should not exceed 255 characters',
                'email.unique' => 'Email already exists',
                'password.required' => 'Password is required',
                'password.string' => 'Password must be a string',
                'password.min' => 'Password must be at least 8 characters long',
                'password.confirm' => ' Password confirmation does not match',
                'image.required' => 'Image is required',
                'image.image' => 'Image must be an image file',
            ]
        );
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {        if (\request()->hasFile("image")) {
        $image = \request()->file("image");
        $imagePath = $image->store("images", "user_image");
    }
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'image' => $imagePath,
        ]);
    }
}
