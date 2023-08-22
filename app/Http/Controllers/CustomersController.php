<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Customers, User};
use Illuminate\Support\Facades\Hash;
use DB, Carbon\Carbon;

class CustomersController extends Controller
{
    public function subscribeCustomer(Request $request) {
        /** 
         * All registrations from the website will be issued with the 'Customer' role 
         * 
         * Admins will issue the role ('Admin', 'Merchandizer') in the Admin dashboard for non-customers..
         */
        try {
            $find_customer = DB::table('users')
                ->where('email', $request->email)
                ->get();
            if(count($find_customer) > 0) {
                /** return duplicate customer warning */
                return response('Customer already exists', 500);
            } else {
                $customer_ref = $this->generateCustomerRef($request->customer_fname, $request->customer_lname);
                $customer_model = new Customers();
                columnSetter($customer_model, $request);
                $customer_model->user_email = $request->email;
                $customer_model->password = Hash::make($request->password);
                $customer_model->customer_ref = $customer_ref;
                $customer_model->registration_date = Carbon::now()->format('Y-m-d H:m:s');
                $customer_model->role = 'Customer';
                $customer_model->save();

                $user_model = new User();
                columnSetter($user_model, $request);
                $user_model->name = $request->customer_fname .' '. $request->customer_lname;
                $user_model->password = Hash::make($request->password);
                $user_model->customer_ref = $customer_ref;
                $user_model->role = 'Customer';
                $user_model->save();
                return $this->returnResponse(200, 'success', null, 'Customer successfully saved');
            }
        } catch(Exception $e) {
            return $this->returnResponse(500, 'error', null, 'An error occurred');
        }
        
    }

    /**
     * generate customer reference
     */
    private function generateCustomerRef($fname, $lname) {
        $fname_chars = str_split($fname);
        $lname_chars = str_split($lname);
        $initials = $fname_chars[0] . $lname_chars[0];

        $date = Carbon::now()->format('ymd');

        // get number of registrations within the day
        $today_regis_count = DB::table('users')
            ->where('created_at', 'LIKE', Carbon::now()->format('Y-m-d').'%')
            ->selectRaw('count(*) as regis_count')
            ->first();
        $today_regis_count = strval($today_regis_count->regis_count + 1);
        $today_regis_count = str_pad($today_regis_count, 3, '0', STR_PAD_LEFT);

        $customer_ref = $initials . $date . $today_regis_count;
        
        return $customer_ref;
    }
}
