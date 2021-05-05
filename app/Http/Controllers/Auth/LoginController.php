<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);

        $validUsername = $this->usernameFormatCheck($request->input('email'));
        switch ($validUsername) {
            case 2:
                $result = $this->employee($request);
                break;
            default:
                $result = $this->others($request);
        }
        if ($result === true) {
            //Auth::user()->update(['loginStatus' => 1]);
            return redirect('/admin');
        }  else {
            return $this->sendFailedLoginResponse($request);
        }
    }
    public function employee($request)
    {
        $data['employeeId'] = $request->input('email');
        $data['password'] = $request->input('password');
        $url = "http://auth.diu.edu.bd/auth?clientId=d7aea3a47a474f8f9f53b85ae0adb3d4&clientSecret=1d9fe966-5f38-44a1-a277-9acb2943901a";
//        $url = "http://auth.diu.edu.bd/auth?clientId=kpiApp&clientSecret=r5ty45ehg56fger45tg4o";
        $data = $this->apiLogin($data, $url);
        if ($data['employeeId'] !== null) {
            $user = User::where('diu_id', $data['employeeId'])->first();
            if ($user == null) {

                $requestData['diu_id'] = $data['employeeId'];
                $userData['name']=$data['name'];
                $userData['email']=$data['email'];
                $userData['diu_id']=$data['employeeId'];
                $userData['verified']=1;
                $userData['approved']=1;
                $userData['password']= Hash::make($request->input('password'));

                $user = User::create($userData);

                if ($user){
                    Profile::create(
                        [
                            'user_id'     => $user->id,
                            'employee'     => $data['employeeId'],
                            //'employee_type'     => $data['employee_type'],
                            'designation'     => $data['designation'],
                            //'mobile'     => $data['mobile'],
                        ]
                    );
                }
                $this->userRoleService(2, $user);
                $user = User::where('diu_id', $data['employeeId'])->first();
                $this->setGuard($user);
                return true;
            } else {
                    $this->setGuard($user);
                    //dd($user->isAdmin);
                    return true;
            }
        } else {
            return false;
        }
    }

    public function others($request)
    {
        $this->validateLogin($request);
        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            return $this->sendLockoutResponse($request);
        }
        if ($this->attemptLogin($request)) {
            $user = Auth::user();
            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);
        return $this->sendFailedLoginResponse($request);
    }
    public function setGuard($user)
    {
        $guard = $user->isAdmin == 1 ? 'web' : 'web';
        Auth::guard($guard)->login($user);

    }
    public function apiLogin($data, $url)
    {
        $payload = json_encode($data);
// Prepare new cURL resource
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLINFO_HEADER_OUT, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
// Set HTTP Header for POST request
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($payload))
        );
// Submit the POST request
        $result = curl_exec($ch);
        return json_decode($result, true);
// Close cURL session handle
        //curl_close($ch);
    }
    public function userRoleService($role, $user)
    {
        $user->roles()->attach($role);
    }
    function usernameFormatCheck($username)
    {
        if (preg_match("/^(71[0-9]{7})|(72[0-9]{7})|74[0-9]{7}$/", $username)) {
            return 2;
        } elseif (filter_var($username, FILTER_VALIDATE_EMAIL)) {
            return 1;
        } else {
            return false;
        }
    }
}
