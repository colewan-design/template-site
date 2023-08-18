<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Customers;

class AuthController extends Controller
{
    public function userLogin(Request $request) {
        // login user
        $user_data = (object) [];
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();
            $user = Auth::user();
            Auth::login($user);
            $user_customer_data = Customers::where('customer_ref', $user->customer_ref)->first();
            // generate token
            $token_hash = Hash::make($request->customer_ref);

            /**
             * Users with the 'Customer' role will be issued with a token with the ff. abilities/permissions
             */
            $customer_token_abilities = [
                'userProfile-update',
                'orders-crud',
                'orderRatings-crud',
                'mealCrafting-crud',
                'user-dashboard',
                'user-cart',
            ];
            /**
             * Users with the 'Admin' role will be issued with a token with the ff. abilities/permissions
             */
            $admin_token_abilities = [
                'userProfile-update',
                'users-crud', ### create, read, update, delete,
                'baskets-crud',
                'basketItems-crud',
                'additional-crud',
                'orders-read', ### order tracking
                'orders-update',
                'orders-delete',
                'orderRatings-read',
                'orderRatings-delete',
                'user-dashboard',
            ];
            /**
             * Users with the 'Merchandiser' role will be issued with a token with the ff. abilities/permissions
             */
            $merchandiser_token_abilities = [
                'userProfile-update',
                'products-crud',
                'orders-read',
                'orders-update',
                'orders-delete',
                'orders-manage', ### update the status of the order in order to notify the customer
                'orderRatings-read',
                'baskets-crud',
                'basketItems-crud',
                'additional-crud',
                'user-dashboard',
            ];

            if($user->role === 'Admin') {
                $user_data->token = $user->createToken($token_hash, $admin_token_abilities)->plainTextToken;
                $user_data->abilities = $admin_token_abilities;
            } else if($user->role === 'Merchandiser') {
                $user_data->token = $user->createToken($token_hash, $merchandiser_token_abilities)->plainTextToken;
                $user_data->abilities = $merchandiser_token_abilities;
            } else if($user->role === 'Customer') {
                $user_data->token = $user->createToken($token_hash, $customer_token_abilities)->plainTextToken;
                $user_data->abilities = $customer_token_abilities;
                
            } else {
                return $this->returnResponse(401, 'error', null, 'Unauthorized. Please register or login with your account');
            }
            $user_data->customer_ref = $user_customer_data->customer_ref;
            $user_data->customer_fname = $user_customer_data->customer_fname;
            $user_data->customer_lname = $user_customer_data->customer_lname;

            return $this->returnResponse(200, 'success', $user_data, 'Welcome, '.$user->name);
        } else {
            // failed login
            return $this->returnResponse(500, 'error', $user_data, 'Login failed');
        }
    }

    public function userLogout(Request $request) {
        // $request->user()->currentAccessToken()->delete();
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return $this->returnResponse(200, 'success', $request->session()->token(), 'Logged out successfully');
    }
}
