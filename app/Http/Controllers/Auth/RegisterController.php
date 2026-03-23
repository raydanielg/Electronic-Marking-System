<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Manager;
use App\Models\Region;
use App\Models\District;
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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:manager')->except('logout');
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        $regions = Region::all();
        $districts = District::with('region')->get()->map(function($district) {
            return [
                'name' => $district->name,
                'region_name' => $district->region->name,
            ];
        });
        
        return view('auth.register', compact('regions', 'districts'));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'role' => ['required', 'in:manager,clerk,admin'],
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'region' => ['required', 'string', 'exists:regions,name'],
            'district' => ['required', 'string', 'exists:districts,name'],
            'phone' => ['required', 'string', 'regex:/^[0-9]{9}$/', 'unique:managers,phone'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:managers,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], [
            'role.required' => 'Please select a role.',
            'role.in' => 'Invalid role selected.',
            'name.min' => 'Full name must be at least 3 characters.',
            'region.exists' => 'Please select a valid region.',
            'district.exists' => 'Please select a valid district.',
            'phone.regex' => 'Phone number must be 9 digits (e.g., 712345678).',
            'phone.unique' => 'This phone number is already registered.',
            'email.unique' => 'This email is already registered.',
            'password.min' => 'Password must be at least 8 characters.',
            'password.confirmed' => 'Password confirmation does not match.',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @return Manager
     */
    protected function create(array $data)
    {
        return Manager::create([
            'full_name' => $data['name'],
            'region' => $data['region'],
            'district' => $data['district'],
            'phone' => '+255' . $data['phone'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => $data['role'],
            'status' => 'active',
        ]);
    }
}
