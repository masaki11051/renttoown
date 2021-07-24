<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\motorcycle;
use App\Models\plan;
use App\Models\company;
use App\Models\application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class R2O_Controller extends Controller
{
    public function info(Request $request)
    {
        $items = Customer::all();
        return view('R2O.customer_info', ['items' => $items]);
    }
    public function add(Request $request)
    {
        return view('R2O.customer_add'); //
    }
    public function create(Request $request)
    {
        $this->validate($request, Customer::$rules);
        $form = $request->all();
        Customer::create($form);
        return view('R2O.customer_add');
        //$customer = Customer::create($form);
        //$request->session()->put('customer_id', $customer->id);

        //$customer_ids = $request->session()->get('customer_id');

        //$companies = DB::table('companies')->get();
        //$motorcycles = DB::table('motorcycles')->get();
        //$plans = DB::table('plans')->get();

        //return view('R2O.customer_add', ['customer_ids' => $customer_ids,'companies' => $companies, 'motorcycles' => $motorcycles, 'plans' => $plans]); //
    }

    public function motorcycle_add(Request $request)
    {
        return view('R2O.motorcycle_add'); //
    }
    public function motorcycle_create(Request $request)
    {
        $this->validate($request, motorcycle::$motorcyclerules);
        $form = $request->all();
        motorcycle::create($form);
        return view('R2O.motorcycle_add');
    }

    public function plan_add(Request $request)
    {
        return view('R2O.plan_add'); //
    }
    public function plan_create(Request $request)
    {
        $this->validate($request, plan::$planrules);
        $form = $request->all();
        plan::create($form);
        return view('R2O.plan_add');
    }
    public function company_add(Request $request)
    {
        return view('R2O.company_add'); //
    }
    public function company_create(Request $request)
    {
        $this->validate($request, company::$companyrules);
        $form = $request->all();
        company::create($form);
        return view('R2O.company_add');
    }
    public function find(Request $request)
    {
        return view('R2O.customer_find', ['input' => '']);
    }
    public function search(Request $request)
    {
        $applications = application::all();
        $companies = company::all();
        $motorcycles = motorcycle::all();
        $plans = plan::all();
        $data = customer::where('name', $request->input_name)
                        ->where('age', $request->input_age)
                        ->first();
        if (isset($data)){
            $param = [
                'input' => $request->input_name, $request->input_age,
                'data' => $data
            ];
            return view('R2O.test2', $param,['applications' => $applications, 'companies' => $companies, 'motorcycles' => $motorcycles, 'plans' => $plans]);
        }else{
            return view('R2O.error');
        };
    }
    public function application_add(Request $request)
    {
        $customers = Customer::all();
        $companies = DB::table('companies')->get();
        $motorcycles = DB::table('motorcycles')->get();
        $plans = DB::table('plans')->get();
        return view('R2O.application_add',['customers' => $customers, 'companies' => $companies,'motorcycles' => $motorcycles,'plans' => $plans]);//
    }
    public function application_create(Request $request)
    {
        $this->validate($request, application::$applicationrules);
        $form = $request->all();
        application::create($form);
        $customers = Customer::all();
        $companies = DB::table('companies')->get();
        $motorcycles = DB::table('motorcycles')->get();
        $plans = DB::table('plans')->get();
        return view('R2O.application_add', ['customers' => $customers, 'companies' => $companies, 'motorcycles' => $motorcycles, 'plans' => $plans]);//
    
    }
    public function test(Request $request)
    {
        $applications = application::all();
        $customers = Customer::all();
        $companies = company::all();
        $motorcycles = motorcycle::all();
        $plans = plan::all();
        return view('R2O.test', ['applications' => $applications, 'customers' => $customers, 'companies' => $companies, 'motorcycles' => $motorcycles, 'plans' => $plans]);

    }

    //public function test(Request $request)
    //{
       // $customers = Customer::all();
       // $companies = company::all();
       // $motorcycles = motorcycle::all();
       // $plans = plan::all();
        //return view('R2O.test', ['customers' => $customers, 'companies' => $companies, 'motorcycles' => $motorcycles, 'plans' => $plans]);

        //
   // }




}