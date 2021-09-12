<?php

namespace App\Http\Controllers;

use App\Models\customer;
use App\Models\attachment;
use App\Models\motorcycle;
use App\Models\plan;
use App\Models\company;
use App\Models\location;
use App\Models\application;
use App\Models\repayment;
use Illuminate\Http\Request;
use App\Http\Requests\UsersRequest;


class R2O_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
//top page ///////////////////////////////////////////////////////////////////////////////////////////////////
    public function application_management_menu(Request $request)
    {
        return view('R2O.application_management_menu');
    }

    public function search_and_edit_page_menu(Request $request)
    {
        return view('R2O.search_and_edit_page_menu');
    }

    public function repayment_management_menu(Request $request)
    {
        return view('R2O.repayment_management_menu');
    }

    public function test_calculation(Request $request)
    {
        return view('R2O.test_calculation');
    }
//application_management_menu///////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//register customer info ////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function input_customer_info(Request $request)
    {
        return view('R2O.input_customer_info'); //
    }

    public function register_customer_info(Request $request)
    {
        $this->validate($request, customer::$rules);
        $form = $request->all();
        $customer = customer::create($form);
        $request->session()->put('customer_id', $customer->id);
        $customer_ids = $request->session();
        //生成されたCustomer_idをSessionに保存
        return view('R2O.select_scan_copies', ['customer_ids' => $customer_ids]);
    }

    public function select_scan_copies()
    {
        return view("R2O.select_scan_copies");
    }

    public function upload_scan_copies(Request $request)
    {
        $customer_ids = $request->session();
        $upload_images = $request->file('file');
        foreach ($upload_images as $upload_image) {
            if ($upload_image) {
                //アップロードされた画像を保存する
                $path = $upload_image->store('uploads', "public");
                //画像の保存に成功したらDBに記録する
                if ($path) {
                    attachment::create([
                        "file_name" => $upload_image->getClientOriginalName(),
                        "customer_id" => $customer_ids->get('customer_id'),
                        "file_path" => $path]);
                }
            }
        };
        return redirect("/");
    }

//register application info//////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function customer_search_for_application(Request $request)
    {
        return view('R2O.customer_search_for_application', ['input' => '']);
    }

    public function input_application_info(Request $request)
    {
        $companies = company::all();
        $motorcycles = motorcycle::where('location_id', '>', 1)
            ->where('location_id', '<', 5)
            ->get();
        //location_idの5は返却が見込めない車両、１は顧客にレンタル中のステータスのためそれ以外のレンタル可能なバイクを抽出
        $plans = plan::all();
        $data = customer::where('name', $request->input_name)
            ->where('age', $request->input_age)
            ->first();
        if (isset($data)) {
            $applications = application::where('customer_id', $data->id)
                ->whereIn('status', [0, 1])
                //statusの0は支払情報登録前の契約、１は現在アクティブな契約
                ->first();
            if (isset($applications)) {
                return view('R2O.error');
                //一人の顧客で複数契約できないので、statusの0と１の契約がある場合はエラー
            } else {
                return view('R2O.input_application_info', ['data' => $data, 'companies' => $companies, 'motorcycles' => $motorcycles, 'plans' => $plans]);
            }
        }
    }

    public function register_application_info(Request $request)
    {
        $this->validate($request, application::$applicationrules);
        $items = $request->all();
        application::create($items);
        motorcycle::where('id', $request->motorcycle_id)
            ->update(['location_id' => '1']);
        //location_idの１はレンタル中のステータスのため、申込されたバイクのLocattion＿idを１へ変更
        return view('R2O.customer_search_for_application', ['input' => '']);
    }

//register repayment info/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function customer_search_for_repayment(Request $request)
    {
        return view('R2O.customer_search_for_repayment', ['input' => '']);
    }

    public function basic_customer_info_for_repayment(Request $request)
    {
        $data = customer::where('name', $request->input_name)
            ->where('age', $request->input_age)
            ->first();
        if (isset($data)) {
            $uploads = attachment::where("customer_id", $data->id)->get();
            return view('R2O.basic_customer_info_for_repayment', ["data" => $data, 'uploads' => $uploads]);
        } else {
            return view('R2O.error');
        }
    }

    public function detail_customer_info_for_repayment(Request $request)
    {
        $data = customer::where('id', $request->customer_id)
            ->first();
        $info = application::where('customer_id', $request->customer_id)
            ->where('status', 0)
            ->first();
        //返済情報が登録されていないApplicationのstatusは０なので、０のみを抽出
        if (isset($info)) {
            $applications = application::all();
            $companies = company::all();
            $motorcycles = motorcycle::all();
            $plans = plan::all();
            return view('R2O.detail_customer_info_for_repayment', ['info' => $info, 'data' => $data, 'applications' => $applications, 'companies' => $companies, 'motorcycles' => $motorcycles, 'plans' => $plans]);
        } else {
            return view('R2O.error');
        }
    }

//edit company info before registrating repayments/////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function edit_company_before_registrating_repayments(Request $request)
    {
        $companies = company::all();
        $data = customer::where('id', $request->customer_id)->first();
        $applications = application::where('customer_id', $request->customer_id)
            ->where('status', 0)
            ->first();
        return view('R2O.edit_company_before_registrating_repayments', ['data' => $data, 'companies' => $companies, 'applications' => $applications]);
    }

    public function update_company_before_registrating_repayments(Request $request)
    {
        $form = $request->all();
        application::where('id', $request->id)
            ->first()
            ->update($form);
        $data = customer::where('id', $request->customer_id)
            ->first();
        $info = application::where('customer_id', $request->customer_id)
            ->where('status', 0)
            ->first();
        //返済情報が登録されていないApplicationのstatusは０なので、０のみを抽出
        if (isset($info)) {
            $applications = application::all();
            $companies = company::all();
            $motorcycles = motorcycle::all();
            $plans = plan::all();
            return view('R2O.detail_customer_info_for_repayment', ['info' => $info, 'data' => $data, 'applications' => $applications, 'companies' => $companies, 'motorcycles' => $motorcycles, 'plans' => $plans]);
        } else {
            return view('R2O.error');
        }
    }

//edit application info before registrating repayments///////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function edit_application_before_registrating_repayments(Request $request)
    {
        $companies = company::all();
        $data = customer::where('id', $request->customer_id)
            ->first();
        $applications = application::where('customer_id', $request->customer_id)
            ->where('status', 0)
            ->first();
        return view('R2O.edit_application_before_registrating_repayments', ['data' => $data, 'companies' => $companies, 'applications' => $applications]);
    }

    public function update_application_before_registrating_repayments(Request $request)
    {
        $form = $request->all();
        application::where('customer_id', $request->customer_id)
            ->where('status', 0)//返済情報が登録されていないApplicationのstatusは０
            ->first()
            ->update($form);
        $data = customer::where('id', $request->customer_id)
            ->first();
        $info = application::where('customer_id', $request->customer_id)
            ->where('status', 0)//返済情報が登録されていないApplicationのstatusは０
            ->first();
        //返済情報が登録されていないApplicationのstatusは０なので、０のみを抽出
        if (isset($info)) {
            $applications = application::all();
            $companies = company::all();
            $motorcycles = motorcycle::all();
            $plans = plan::all();
            return view('R2O.detail_customer_info_for_repayment', ['info' => $info, 'data' => $data, 'applications' => $applications, 'companies' => $companies, 'motorcycles' => $motorcycles, 'plans' => $plans]);
        } else {
            return view('R2O.error');
        }
    }

//edit motorcycle info before registrating repayments///////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function restore_selected_motorcycle_before_registrating_repayments(Request $request)
    {
        $data = customer::where('id', $request->customer_id)
            ->first();
        $applications = application::where('customer_id', $data->id)
            ->where('status', 0)
            //返済情報が登録されていないApplicationのstatusは０
            ->first();
        $selected_motorcycles = motorcycle::where('id', $applications->motorcycle_id)
            ->first();
        $motorcycles = motorcycle::all();
        $locations = location::where('id', '>', 1)
            //Location_idの1は顧客がレンタル中のStatusのため、それ以外を抽出
            ->get();
        return view('R2O.restore_selected_motorcycle_before_registrating_repayments', ['data' => $data, 'motorcycles' => $motorcycles, 'selected_motorcycles' => $selected_motorcycles, 'locations' => $locations, 'applications' => $applications]);
    }

    public function update_location_for_selected_motorcycle_before_registrating_repayments(Request $request)
    {
        $data = customer::where('id', $request->customer_id)->first();
        $applications = application::where('customer_id', $data->id)
            ->where('status', 0)//返済情報が登録されていないApplicationのstatusは０
            ->first();
        $form = $request->all();
        motorcycle::where('id', $request->id)
            ->first()
            ->update($form);
        $motorcycles = motorcycle::where('location_id', '>', 1)
            //Location_idの1は顧客がレンタル中のStatusのため、それ以外を抽出
            ->whereNotIn('id', [$request->id])
            //誤って登録したバイクを再登録してしまわないように、選択肢から除外
            ->get();
        return view('R2O.edit_motorcycle_before_registrating_repayments', ['data' => $data, 'applications' => $applications, 'motorcycles' => $motorcycles,]);
    }

    public function edit_motorcycle_before_registrating_repayments(Request $request)
    {
        $motorcycles = motorcycle::where('location_id', '>', 1)
            //Location_idの1は顧客がレンタル中のStatusのため、それ以外を抽出
            ->get();
        $data = customer::where('id', $request->customer_id)->first();
        $applications = application::where('customer_id', $request->customer_id)
            ->where('status', 0)
            //返済情報が登録されていないApplicationのstatusは０
            ->first();
        return view('R2O.edit_motorcycle_before_registrating_repayments', ['data' => $data, 'motorcycles' => $motorcycles, 'applications' => $applications]);
    }

    public function update_motorcycle_before_registrating_repayments(Request $request)
    {
        $form = $request->all();
        application::where('customer_id', $request->customer_id)
            ->where('status', 0)
            //返済情報が登録されていないApplicationのstatusは０
            ->first()
            ->update($form);
        motorcycle::where('id', $request->motorcycle_id)
            ->first()
            ->update((['location_id' => '1']));
        //Location_idの1は顧客がレンタル中のStatusのため、Location＿idを変更

        $data = customer::where('id', $request->customer_id)
            ->first();
        $info = application::where('customer_id', $request->customer_id)
            ->where('status', 0)
            //返済情報が登録されていないApplicationのstatusは０
            ->first();
        //返済情報が登録されていないApplicationのstatusは０なので、０のみを抽出
        if (isset($info)) {
            $applications = application::all();
            $companies = company::all();
            $motorcycles = motorcycle::all();
            $plans = plan::all();
            return view('R2O.detail_customer_info_for_repayment', ['info' => $info, 'data' => $data, 'applications' => $applications, 'companies' => $companies, 'motorcycles' => $motorcycles, 'plans' => $plans]);
        } else {
            return view('R2O.error');
        }
    }

//edit plan info before registrating repayments///////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function edit_plan_before_registrating_repayments(Request $request)
    {
        $plans = plan::all();
        $data = customer::where('id', $request->customer_id)->first();
        $applications = application::where('customer_id', $request->customer_id)
            ->where('status', 0)
            //返済情報が登録されていないApplicationのstatusは０
            ->first();
        return view('R2O.edit_plan_before_registrating_repayments', ['data' => $data, 'applications' => $applications, 'plans' => $plans]);
    }

    public function update_plan_before_registrating_repayments(Request $request)
    {
        $form = $request->all();
        application::where('customer_id', $request->customer_id)
            ->where('status', 0)
            //返済情報が登録されていないApplicationのstatusは０
            ->first()
            ->update($form);
        $data = customer::where('id', $request->customer_id)
            ->first();
        $info = application::where('customer_id', $request->customer_id)
            ->where('status', 0)
            //返済情報が登録されていないApplicationのstatusは０
            ->first();
        if (isset($info)) {
            $applications = application::all();
            $companies = company::all();
            $motorcycles = motorcycle::all();
            $plans = plan::all();
            return view('R2O.detail_customer_info_for_repayment', ['info' => $info, 'data' => $data, 'applications' => $applications, 'companies' => $companies, 'motorcycles' => $motorcycles, 'plans' => $plans]);
        } else {
            return view('R2O.error');
        }
    }

    public function register_repayment_info(Request $request)
    {
        application::where('customer_id', $request->customer_id)
            ->where('status', 0)
            //返済情報が登録されていないApplicationのstatusは０
            ->update(['status' => '1']);
        //返済情報が登録された時点でApplicationのstatusを1に変更
        $customer_id = $request->get('customer_id');
        $application_id = $request->get('application_id');
        $payment_amount = $request->get('payment_amount');
        $number_of_repayment = 0;
        //Foreachで回すための調整
        $form = $request->all();
        //repayment_info.jsで算出した計算結果をRequestで受け取り
        unset($form['_token'], $form['customer_id'], $form['application_id'], $form['start_date'], $form['payment_amount']);
        //配列をForeachで回すために不必要な情報を削除
        foreach ($form as $key => $value) {
            repayment::create([
                'customer_id' => $customer_id,
                'application_id' => $application_id,
                'number_of_repayment' => $number_of_repayment + 1,
                $number_of_repayment = $number_of_repayment + 1,
                //Foreachで１ずつ増やすための調整
                'payment_date' => $value,
                'payment_amount' => $payment_amount,
                'payment_status' => 1
                //支払前のpayment_statusは常に１
            ]);
        }
        return view('R2O.customer_search_for_repayment', ['input' => '']);
    }

//register supplemental docs////////////////////////////////////////////////////////////////////////////////////////////////
    public function customer_search_for_supplementalDocs(Request $request)
    {
        return view('R2O.customer_search_for_supplementalDocs', ['input' => '']);
    }

    public function select_supplementalDocs(Request $request)
    {
        $data = customer::where('name', $request->input_name)
            ->where('age', $request->input_age)
            ->first();
        if (isset($data)) {
            $customers = $data->get('id');
            return view('R2O.select_supplementalDocs', ['data' => $data, 'customers' => $customers]);
        } else {
            return view('R2O.error');
        }
    }

    public function upload_supplementalDocs(Request $request)
    {
        $upload_images = $request->file('file');
        foreach ($upload_images as $upload_image) {
            if ($upload_image) {
                //アップロードされた画像を保存する
                $path = $upload_image->store('uploads', "public");
                //画像の保存に成功したらDBに記録する
                if ($path) {
                    attachment::create([
                        "file_name" => $upload_image->getClientOriginalName(),
                        "customer_id" => $request->get('customer_id'),
                        "file_path" => $path]);
                }
            }
        }
        return view('R2O.customer_search_for_supplementalDocs', ['input' => '']);
    }

//returned motorcycle//////////////////////////////////////////////////////////////////////////////////////////////
    public function return_or_lost_motorcycle_menu(Request $request)
    {
        return view('R2O.return_or_lost_motorcycle_menu');
    }

    public function customer_search_for_returned_motorcycle(Request $request)
    {
        return view('R2O.customer_search_for_returned_motorcycle', ['input' => '']);
    }

    public function select_info_for_returned_motorcycle(Request $request)
    {
        $data = customer::where('name', $request->input_name)
            ->where('age', $request->input_age)
            ->first();
        if (isset($data)) {
            $applications = application::where('customer_id', $data->id)
                ->where('status', 1)
                //Activeなapplicationのstatusは1の為、１を抽出
                ->first();
            if (isset($applications)) {
                $motorcycles = motorcycle::where('id', $applications->motorcycle_id)
                    ->first();
                $locations = location::all();
                return view('R2O.select_info_for_returned_motorcycle', ['data' => $data, 'applications' => $applications, 'motorcycles' => $motorcycles, 'locations' => $locations]);
            } else {
                return view('R2O.error');
            }
        } else {
            return view('R2O.error');
        }
    }

    public function update_info_for_returned_motorcycle(Request $request)
    {
        $this->validate($request, motorcycle::$motorcyclerules);
        $form = $request->all();
        $application = application::where('motorcycle_id', $request->id)
            ->where('status', 1)
            ->first();
        //Activeなapplicationのstatusは1の為、１を抽出
        unset($form['_token']);
        motorcycle::where('id', $request->id)
            ->update($form);
        application::where('motorcycle_id', $request->id)
            ->update(['status' => '2']);
        //NON-Activeなapplicationのstatusは2の為、2へ変更
        repayment::where('application_id', $application->id)
            ->where('payment_status', '1')
            //支払前の請求書のstatusは1の為、１を抽出
            ->update(['payment_status' => '4']);
        //バイクの返却によって今度支払われる可能性はないので、バイク返却後の請求書のstatusを表す4へ変更
        return view('R2O.return_or_lost_motorcycle_menu');
    }

    public function customer_search_for_lost_motorcycle(Request $request)
    {
        return view('R2O.customer_search_for_lost_motorcycle', ['input' => '']);
    }

    public function select_info_for_lost_motorcycle(Request $request)
    {
        $data = customer::where('name', $request->input_name)
            ->where('age', $request->input_age)
            ->first();
        if (isset($data)) {
            $applications = application::where('customer_id', $data->id)
                ->where('status', 1)
                //Activeなapplicationのstatusは1の為、１を抽出
                ->first();
            if (isset($applications)) {
                $motorcycles = motorcycle::where('id', $applications->motorcycle_id)
                    ->first();
                $locations = location::all();
                return view('R2O.select_info_for_lost_motorcycle', ['data' => $data, 'applications' => $applications, 'motorcycles' => $motorcycles, 'locations' => $locations]);
            } else {
                return view('R2O.error');
            }
        } else {
            return view('R2O.error');
        }
    }

    public function update_info_for_lost_motorcycle(Request $request)
    {
        $this->validate($request, motorcycle::$motorcyclerules);
        $form = $request->all();
        $application = application::where('motorcycle_id', $request->id)
            ->where('status', 1)
            ->first();
        //Activeなapplicationのstatusは1の為、１を抽出
        unset($form['_token']);
        motorcycle::where('id', $request->id)
            ->update($form);
        application::where('motorcycle_id', $request->id)
            ->update(['status' => '2']);
        //NON-Activeなapplicationのstatusは2の為、2へ変更
        repayment::where('application_id', $application->id)
            ->where('payment_status', '1')
            //支払前の請求書のstatusは1の為、１を抽出
            ->update(['payment_status' => '5']);
        //バイクの回収不能によって今度支払われる可能性はないので、バイク返却後の請求書のstatusを表す5へ変更
        return view('R2O.return_or_lost_motorcycle_menu');
    }

//register motorcycle///////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function add_motorcycle(Request $request)
    {
        $locations = location::all();
        return view('R2O.add_motorcycle', ["locations" => $locations]); //
    }

    public function register_motorcycle(Request $request)
    {
        $this->validate($request, motorcycle::$motorcyclerules);
        $form = $request->all();
        motorcycle::create($form);
        $locations = location::all();
        return view('R2O.add_motorcycle', ["locations" => $locations]);
    }

//register location///////////////////////////////////////////////////////////////////////////////////////////////////////
    public function add_location(Request $request)
    {
        return view('R2O.add_location'); //
    }

    public function register_location(Request $request)
    {
        $this->validate($request, location::$locationrules);
        $form = $request->all();
        location::create($form);
        return view('R2O.add_location');
    }

//register company///////////////////////////////////////////////////////////////////////////////////////////////////////
    public function add_company(Request $request)
    {
        return view('R2O.add_company'); //
    }

    public function register_company(Request $request)
    {
        $this->validate($request, company::$companyrules);
        $form = $request->all();
        company::create($form);
        return view('R2O.add_company');
    }

//register plan///////////////////////////////////////////////////////////////////////////////////////////////////////
    public function add_plan(Request $request)
    {
        return view('R2O.add_plan'); //
    }

    public function register_plan(Request $request)
    {
        $this->validate($request, plan::$planrules);
        $form = $request->all();
        plan::create($form);
        return view('R2O.add_plan');
    }


//search_and_edit_page_menu///////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function application_search(Request $request)
    {
        return view('R2O.application_search', ['input' => '']);
    }

    public function basic_application_info(Request $request)
    {
        $data = customer::where('name', $request->input_name)
            ->where('age', $request->input_age)
            ->first();
        if (isset($data)) {
            $uploads = attachment::where("customer_id", $data->id)
                ->get();
            return view('R2O.basic_application_info', ["data" => $data, 'uploads' => $uploads]);
        } else {
            return view('R2O.error');
        }
    }

    public function detail_application_info(Request $request)
    {
        $data = customer::where('id', $request->customer_id)
            ->first();
        $active_application = application::where('customer_id', $request->customer_id)
            ->where('status', 1)
            ->first();
        //Activeなapplicationのstatusは1の為、１を抽出
        $non_active_applications = application::where('customer_id', $request->customer_id)
            ->where('status', 2)
            ->get();
        //NON_Activeなapplication(バイク返却済みなど)のstatusは2の為、２を抽出
        if (isset($active_application) || ($non_active_applications)) {
            //契約が存在する場合のも、次の画面へ
            $companies = company::all();
            $motorcycles = motorcycle::all();
            $plans = plan::all();
            return view('R2O.detail_application_info', ['data' => $data, 'active_application' => $active_application, 'non_active_applications' => $non_active_applications, 'companies' => $companies, 'motorcycles' => $motorcycles, 'plans' => $plans]);
        } else {
            return view('R2O.error');
        }
    }

//attached files management/////////////////////////////////////////////////////////////////////////////////////////////////////
    public function choose_files(Request $request)
    {
        $data = customer::where('id', $request->customer_id)
            ->first();
        if (isset($data)) {
            $uploads = attachment::where("customer_id", $data->id)
                ->get();
            //顧客と紐づく全ての添付ファイルを抽出
            return view('R2O.choose_files', ["data" => $data, 'uploads' => $uploads]);
        } else {
            return view('R2O.error');
        }
    }

    public function delete_files(Request $request)
    {
        attachment::where("id", $request->id)
            ->first()
            ->delete();
        //間違って登録した添付ファイルを削除
        $data = customer::where('id', $request->customer_id)
            ->first();
        if (isset($data)) {
            $uploads = attachment::where("customer_id", $data->id)
                ->get();
            return view('R2O.basic_application_info', ["data" => $data, 'uploads' => $uploads]);
        } else {
            return view('R2O.error');
        }
    }

//edit company info/////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function edit_company(Request $request)
    {
        $companies = company::all();
        $data = customer::where('id', $request->customer_id)->first();
        $applications = application::where('customer_id', $request->customer_id)
            ->where('status', 1)
            //Activeなapplicationのstatusは1の為、１を抽出
            ->first();
        return view('R2O.edit_company', ['data' => $data, 'companies' => $companies, 'applications' => $applications]);
    }

    public function update_company(Request $request)
    {
        $form = $request->all();
        application::where('id', $request->id)
            ->first()
            ->update($form);
        $applications = application::all();
        $data = customer::where('id', $request->customer_id)->first();
        $active_application = application::where('customer_id', $request->customer_id)
            ->where('status', 1)
            //Activeなapplicationのstatusは1の為、１を抽出
            ->first();
        $non_active_applications = application::where('customer_id', $request->customer_id)
            ->where('status', 2)
            //NON_Activeなapplication(バイク返却済みなど)のstatusは2の為、２を抽出
            ->get();
        if (isset($active_application) || ($non_active_applications)) {
            $companies = company::all();
            $motorcycles = motorcycle::all();
            $plans = plan::all();
            return view('R2O.detail_application_info', ['data' => $data, 'applications' => $applications, 'active_application' => $active_application, 'non_active_applications' => $non_active_applications, 'companies' => $companies, 'motorcycles' => $motorcycles, 'plans' => $plans]);
        } else {
            return view('R2O.error');
        }
    }

//edit application info///////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function edit_application(Request $request)
    {
        $companies = company::all();
        $data = customer::where('id', $request->customer_id)->first();
        $applications = application::where('customer_id', $request->customer_id)
            ->where('status', 1)
            //Activeなapplicationのstatusは1の為、１を抽出
            ->first();
        return view('R2O.edit_application', ['data' => $data, 'companies' => $companies, 'applications' => $applications]);
    }

    public function update_application(Request $request)
    {
        $form = $request->all();
        application::where('customer_id', $request->customer_id)
            ->where('status', 1)
            //Activeなapplicationのstatusは1の為、１を抽出
            ->first()
            ->update($form);
        $data = customer::where('id', $request->customer_id)->first();
        $applications = application::all();
        $active_application = application::where('customer_id', $request->customer_id)
            ->where('status', 1)
            //Activeなapplicationのstatusは1の為、１を抽出
            ->first();
        $non_active_applications = application::where('customer_id', $request->customer_id)
            ->where('status', 2)
            //NON_Activeなapplication(バイク返却済みなど)のstatusは2の為、２を抽出
            ->get();
        if (isset($active_application) || ($non_active_applications)) {
            $companies = company::all();
            $motorcycles = motorcycle::all();
            $plans = plan::all();
            return view('R2O.detail_application_info', ['data' => $data, 'applications' => $applications, 'active_application' => $active_application, 'non_active_applications' => $non_active_applications, 'companies' => $companies, 'motorcycles' => $motorcycles, 'plans' => $plans]);
        } else {
            return view('R2O.error');
        }
    }

//edit motorcycle info///////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function restore_selected_motorcycle(Request $request)
    {
        $data = customer::where('id', $request->customer_id)
            ->first();
        $applications = application::where('customer_id', $data->id)
            ->where('status', 1)
            //Activeなapplicationのstatusは1の為、１を抽出
            ->first();
        $selected_motorcycles = motorcycle::where('id', $applications->motorcycle_id)
            ->first();
        $motorcycles = motorcycle::all();
        $locations = location::where('id', '>', 1)
            //Location_idの1は顧客がレンタル中のStatusのため、それ以外を抽出
            ->get();
        return view('R2O.restore_selected_motorcycle', ['data' => $data, 'motorcycles' => $motorcycles, 'selected_motorcycles' => $selected_motorcycles, 'locations' => $locations, 'applications' => $applications]);
    }

    public function update_location_for_selected_motorcycle(Request $request)
    {
        $data = customer::where('id', $request->customer_id)->first();
        $applications = application::where('customer_id', $data->id)
            ->where('status', 1)
            //Activeなapplicationのstatusは1の為、１を抽出
            ->first();
        $form = $request->all();
        motorcycle::where('id', $request->id)
            ->first()
            ->update($form);
        $motorcycles = motorcycle::where('location_id', '>', 1)
            //Location_idの1は顧客がレンタル中のStatusのため、それ以外を抽出
            ->whereNotIn('id', [$request->id])
            //誤って登録したバイクを再登録してしまわないように、選択肢から除外
            ->get();
        return view('R2O.edit_motorcycle', ['data' => $data, 'applications' => $applications, 'motorcycles' => $motorcycles,]);
    }

    public function edit_motorcycle(Request $request)
    {
        $motorcycles = motorcycle::where('location_id', '>', 1)
            //Location_idの1は顧客がレンタル中のStatusのため、それ以外を抽出
            ->get();
        $data = customer::where('id', $request->customer_id)->first();
        $applications = application::where('customer_id', $request->customer_id)
            ->where('status', 1)
            //Activeなapplicationのstatusは1の為、１を抽出
            ->first();
        return view('R2O.edit_motorcycle', ['data' => $data, 'motorcycles' => $motorcycles, 'applications' => $applications]);
    }

    public function update_motorcycle(Request $request)
    {
        $form = $request->all();
        application::where('customer_id', $request->customer_id)
            ->where('status', 1)
            //Activeなapplicationのstatusは1の為、１を抽出
            ->first()
            ->update($form);
        motorcycle::where('id', $request->motorcycle_id)
            ->first()
            ->update((['location_id' => '1']));
        //location_idの１はレンタル中のステータスのため、申込されたバイクのLocation＿idを１へ変更

        $data = customer::where('id', $request->customer_id)
            ->first();
        $active_application = application::where('customer_id', $request->customer_id)
            ->where('status', 1)
            //Activeなapplicationのstatusは1の為、１を抽出
            ->first();
        $non_active_applications = application::where('customer_id', $request->customer_id)
            ->where('status', 2)
            //NON-Activeなapplicationのstatusは2の為、2を抽出
            ->get();
        if (isset($active_application) || ($non_active_applications)) {
            $companies = company::all();
            $motorcycles = motorcycle::all();
            $plans = plan::all();
            return view('R2O.detail_application_info', ['data' => $data, 'active_application' => $active_application, 'non_active_applications' => $non_active_applications, 'companies' => $companies, 'motorcycles' => $motorcycles, 'plans' => $plans]);
        } else {
            return view('R2O.error');
        }
    }

//edit plan info///////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function edit_plan(Request $request)
    {
        $plans = plan::all();
        $data = customer::where('id', $request->customer_id)->first();
        $applications = application::where('customer_id', $request->customer_id)
            ->where('status', 1)
            //Activeなapplicationのstatusは1の為、１を抽出
            ->first();
        return view('R2O.edit_plan', ['data' => $data, 'applications' => $applications, 'plans' => $plans]);
    }

    public function update_plan(Request $request)
    {
        $form = $request->all();
        application::where('customer_id', $request->customer_id)
            ->where('status', 1)
            //Activeなapplicationのstatusは1の為、１を抽出
            ->first()
            ->update($form);
        $data = customer::where('id', $request->customer_id)->first();
        $active_application = application::where('customer_id', $request->customer_id)
            ->where('status', 1)
            //Activeなapplicationのstatusは1の為、１を抽出
            ->first();
        $non_active_applications = application::where('customer_id', $request->customer_id)
            ->where('status', 2)
            //NON-Activeなapplicationのstatusは2の為、2を抽出
            ->get();
        if (isset($active_application) || ($non_active_applications)) {
            $companies = company::all();
            $motorcycles = motorcycle::all();
            $plans = plan::all();
            return view('R2O.detail_application_info', ['data' => $data, 'active_application' => $active_application, 'non_active_applications' => $non_active_applications, 'companies' => $companies, 'motorcycles' => $motorcycles, 'plans' => $plans]);
        } else {
            return view('R2O.error');
        }
    }

//edit repayment info///////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function repayments_info_of_application(Request $request)
    {
        $data = customer::where('id', $request->customer_id)
            ->first();
        $repayment_items = repayment::where('application_id', $request->id)
            ->get();
        return view('R2O.repayments_info_of_application', ['data' => $data, 'repayment_items' => $repayment_items]);
    }

//search all customers//////////////////////////////////////////////////////////////////////////////////////////////////////
    public function all_customers_info(Request $request)
    {
        $customer_items = customer::all();
        return view('R2O.all_customers_info', ['customer_items' => $customer_items]);
    }

    public function edit_customer_info(Request $request)
    {
        $customer = customer::where('id', $request->id)->first();
        return view('R2O.edit_customer_info', ['customer' => $customer]);
    }

    public function update_customer_info(Request $request)
    {
        $this->validate($request, customer::$rules);
        $form = $request->all();
        customer::where('id', $request->id)
            ->first()
            ->update($form);
        $customer_items = customer::all();
        return view('R2O.all_customers_info', ['customer_items' => $customer_items]);
    }

//search all motorcycles//////////////////////////////////////////////////////////////////////////////////////////////////////
    public function all_motorcycles_info(Request $request)
    {
        $motorcycle_items = motorcycle::all();
        return view('R2O.all_motorcycles_info', ['motorcycle_items' => $motorcycle_items]);
    }

    public function edit_motorcycle_info(Request $request)
    {
        $motorcycle = motorcycle::where('id', $request->id)
            ->first();
        $locations = location::all();
        return view('R2O.edit_motorcycle_info', ['motorcycle' => $motorcycle, 'locations' => $locations]);
    }

    public function update_motorcycle_info(Request $request)
    {
        $form = $request->all();
        motorcycle::where('id', $request->id)
            ->first()
            ->update($form);
        $motorcycle_items = motorcycle::all();
        return view('R2O.all_motorcycles_info', ['motorcycle_items' => $motorcycle_items]);
    }

//search all locations//////////////////////////////////////////////////////////////////////////////////////////////////////
    public function all_locations_info(Request $request)
    {
        $location_items = location::all();
        return view('R2O.all_locations_info', ['location_items' => $location_items]);
    }

    public function edit_location_info(Request $request)
    {
        $location = location::where('id', $request->id)
            ->first();
        return view('R2O.edit_location_info', ['location' => $location]);
    }

    public function update_location_info(Request $request)
    {
        $this->validate($request, location::$locationrules);
        $form = $request->all();
        location::where('id', $request->id)
            ->first()
            ->update($form);
        $location_items = location::all();
        return view('R2O.all_locations_info', ['location_items' => $location_items]);
    }

    //search all plans//////////////////////////////////////////////////////////////////////////////////////////////////////
    public function all_plans_info(Request $request)
    {
        $plan_items = plan::all();
        return view('R2O.all_plans_info', ['plan_items' => $plan_items]);
    }

    public function edit_plan_info(Request $request)
    {
        $plan = plan::where('id', $request->id)
            ->first();
        return view('R2O.edit_plan_info', ['plan' => $plan]);
    }

    public function update_plan_info(Request $request)
    {
        $this->validate($request, plan::$planrules);
        $form = $request->all();
        plan::where('id', $request->id)
            ->first()
            ->update($form);
        $plan_items = plan::all();
        return view('R2O.all_plans_info', ['plan_items' => $plan_items]);
    }

//search all companies//////////////////////////////////////////////////////////////////////////////////////////////////////
    public function all_companies_info(Request $request)
    {
        $company_items = company::all();
        return view('R2O.all_companies_info', ['company_items' => $company_items]);
    }

    public function edit_company_info(Request $request)
    {
        $company = company::where('id', $request->id)
            ->first();
        return view('R2O.edit_company_info', ['company' => $company]);
    }

    public function update_company_info(Request $request)
    {
        $this->validate($request, company::$companyrules);
        $form = $request->all();
        company::where('id', $request->id)
            ->first()
            ->update($form);
        $company_items = company::all();
        return view('R2O.all_companies_info', ['company_items' => $company_items]);
    }

//search all repayments//////////////////////////////////////////////////////////////////////////////////////////////////////
    public function all_repayments_info(Request $request)
    {
        $repayment_items = repayment::all();
        return view('R2O.all_repayments_info', ['repayment_items' => $repayment_items]);
    }
//repayment_management_menu///////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//select_repayments_info ///////////////////////////////////////////////////////////////////////////////////////////////////////
    public function select_repayments_info(Request $request)
    {
        $repayment_items = repayment::where('payment_status', [1])
            //'payment_status' => '1'は支払前を意味しているので、Status1のRepaymentを全て抽出
            ->get();
        return view('R2O.select_repayments_info', ['repayment_items' => $repayment_items]);
    }

    public function update_repayment_info_for_delay(Request $request)
    {
        $form = $request->all();
        repayment::where('id', $request->id)
            ->first()
            ->update([$form, 'payment_status' => '3']);
        //'payment_status' => '3'は遅延を意味しているので、Statusを３に変更
        $repayment_items = repayment::where('payment_status', [1])
            ->get();
        return view('R2O.select_repayments_info', ['repayment_items' => $repayment_items]);
    }

    public function update_repayment_info_for_paid(Request $request)
    {
        $form = $request->all();
        repayment::where('id', $request->id)
            ->first()
            ->update([$form, 'payment_status' => '2']);
        //'payment_status' => '2'は支払い済みを意味しているので、Statusを２に変更
        $repayment_items = repayment::where('payment_status', [1])
            ->get();
        return view('R2O.select_repayments_info', ['repayment_items' => $repayment_items]);
    }

//search_repayments_info///////////////////////////////////////////////////////////////////////////////////////////////////////
    public function customer_search_for_wrong_repayment(Request $request)
    {
        return view('R2O.customer_search_for_wrong_repayment', ['input' => '']);
    }

    public function select_wrong_repayments_info(Request $request)
    {
        $customer = customer::where('name', $request->input_name)
            ->where('age', $request->input_age)
            ->first();
        if (isset($customer)) {
            $active_application = application::where('customer_id', $customer->id)
                ->where('status', 1)
                ->first();
            if (isset($active_application)) {
                $repayment_items = repayment::where('application_id', $active_application->id)
                    ->get();
                return view('R2O.select_wrong_repayments_info', ['repayment_items' => $repayment_items]);
            } else {
                return view('R2O.error');
            }
        } else {
            return view('R2O.error');
        }
    }

    public function edit_repayment_info(Request $request)
    {
        $repayment_item = repayment::where('id', $request->id)
            ->first();
        return view('R2O.edit_repayment_info', ['repayment_item' => $repayment_item]);
    }

    public function update_repayment_info(Request $request)
    {
        $form = $request->all();
        repayment::where('id', $request->id)
            ->first()
            ->update($form);
        $active_application = application::where('customer_id', $request->customer_id)
            ->where('status', 1)
            ->first();
        $repayment_items = repayment::where('application_id', $active_application->id)
            ->get();
        return view('R2O.select_wrong_repayments_info', ['repayment_items' => $repayment_items]);
    }

}
