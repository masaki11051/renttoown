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
        return view('R2O.motorcycle_add');
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
        $data = customer::where('name', $request->input_name)
                        ->where('age', $request->input_age)
                        ->first();
        if (isset($data)){
            $param = [
                'input' => $request->input_name, $request->input_age,
                'data' => $data
            ];
            return view('R2O.customer_find', $param);
        }else{
            return view('R2O.error');
        };
    }
    public function application_add(Request $request)
    {
        $customers = DB::table('customers')->get();
        //$customers_latest = array_pop($customers);
        $companies = DB::table('companies')->get();
        //$motorcycles = DB::table('motorcycles')->get();
        //$plan = DB::table('plans')->get();
        var_dump($customers);
        return view('R2O.application_add', ['customers_latest' => $customers], ['companies' => $companies]);//
    }
    public function application_create(Request $request)
    {
        $this->validate($request, application::$applicationrules);
        $form = $request->all();
        application::create($form);
        return view('R2O.customer_add');
    }


    public function test(Request $request)
    {
        $items = company::all();
        return view('R2O.test', ['items' => $items]);//
    }




}