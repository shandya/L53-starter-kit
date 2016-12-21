<?php namespace App\Http\Controllers\Admin;

use Sentinel, Validator;

use Illuminate\Http\Request;
use Illuminate\Support\MessageBag as Bag;
use Cartalyst\Sentinel\Checkpoints\ThrottlingException;
use Cartalyst\Sentinel\Checkpoints\NotActivatedException;

class AuthController extends AdminController
{
    public function getLogin()
    {
        return view('admin.auth.login');
    }

    public function postLogin(Request $request)
    {
        $rules = [
            'email'    => 'required|email',
            'password' => 'required|min:5',
        ];

        $v = Validator::make($request->all(), $rules);

        if (! $v->fails()) {
            $credentials = [
                'email' => $request->email,
                'password' => $request->password,
            ];

            try {
                $user = Sentinel::authenticate($credentials);

                if ($user) {
                    return redirect()->route('admin.dashboard');
                }

                $error = 'Login failed.';
            }
            catch (ThrottlingException $e) {
                $error = 'Login throttled.';
            }
            catch (NotActivatedException $e) {
                $error = 'Account is not active.';
            }

            $errors = with(new Bag)->add('login', $error);

            return redirect()->route('admin.login')
                            ->withErrors($errors);
        }

        return redirect()->route('admin.login')
                   ->withErrors($v);
    }

    public function getChangePassword()
    {
        return 'Under construction';
        // return view('admin.auth.change-password');
    }

    public function postChangePassword()
    {

    }

    public function getLogout()
    {
        Sentinel::logout();

        return redirect()->route('admin.login');
    }
}
