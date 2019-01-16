<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Models\Admin\VisaType;
use App\Models\Admin\Application;
use App\Models\Admin\Country;

class ApplicationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function step2(Request $request)
    {
        session(['nationality' => $request->nationality, 'residence_country' => $request->residence_country]);
        $visaTypes = VisaType::where('lang', $this->lang)->get();
        
        return view('applications.step2')->with(['visaTypes' => $visaTypes, 'lang' => $this->lang, 'langPrefix' => $this->langPrefix, 'config' => $this->config]);
    }

    public function step3($id, Request $request)
    {
        $visaType = VisaType::find($id);
        if ($request->isMethod('post')) {
            $nationalityRow = Country::find(session('nationality'));
            $residenceCountryRow = Country::find(session('residence_country'));
            $input = $request->all();
            if ($request->hasFile('passport_img')) {
                $input['passport_img'] = customUploadFile('passport_img', 'applications');
            } else {
                $input['passport_img'] = '';
            }
            if ($request->hasFile('picture')) {
                $input['picture'] = customUploadFile('picture', 'applications');
            } else {
                $input['picture'] = '';
            }
            if ($request->hasFile('residence_img')) {
                $input['residence_img'] = customUploadFile('residence_img', 'applications');
            } else {
                $input['residence_img'] = '';
            }

            if ($request->hasFile('other_documents.0')) {
                $input['document_1'] = customUploadFile('other_documents.0', 'applications');
            } else {
                $input['document_1'] = '';
            }
            if ($request->hasFile('other_documents.1')) {
                $input['document_2'] = customUploadFile('other_documents.1', 'applications');
            } else {
                $input['document_2'] = '';
            }
            if ($request->hasFile('other_documents.2')) {
                $input['document_3'] = customUploadFile('other_documents.2', 'applications');
            } else {
                $input['document_3'] = '';
            }
            unset($input['other_documents']);

            $input['nationality'] = session('nationality');
            $input['visa_type_id'] = session('visa_type_id');
            $input['residence_country'] = session('residence_country');
            $app = Application::create($input);
            $app->ref_no = 'APP' . str_pad($app->id, 5, "0", STR_PAD_LEFT);
            $app->save();

            $message = '<div class="col-md-8 offset-md-2">
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <th scope="row" width="50%">' . trans('website.ref_no') .'</th>
                            <td>' . $app->ref_no . '</td>
                        </tr>
                        <tr>
                            <th scope="row">' . trans('website.visa_applied_for') .'</th>
                            <td>' . $visaType->title . '</td>
                        </tr>
                        <tr>
                            <th scope="row">' . trans('website.applications_num') .'</th>
                            <td>1</td>
                        </tr>
                        <tr>
                            <th scope="row">' . trans('website.visa_fee') .'</th>
                            <td>' . $visaType->cost . 'AED</td>
                        </tr>
                        <tr>
                            <th scope="row">' . trans('website.total_amount_payable') .'</th>
                            <td>' . $visaType->cost . 'AED</td>
                        </tr>
                        <tr>
                            <th scope="row" class="text-center" colspan="2">' . trans('website.applicant_details') .'</th>
                        </tr>
                        <tr>
                            <th scope="row">' . trans('website.name') .'</th>
                            <td>' . $app->full_name . '</td>
                        </tr>
                        <tr>
                            <th scope="row">' . trans('website.visa_date') .'</th>
                            <td>' . $app->travel_date . '</td>
                        </tr>
                        <tr>
                            <th scope="row">' . trans('website.travel_date') .'</th>
                            <td>' . $app->travel_date . '</td>
                        </tr>
                        <tr>
                            <th scope="row">' . trans('website.living_in') .'</th>
                            <td>' . $residenceCountryRow->{'country_name' . $this->langPrefix} . '</td>
                        </tr>
                        <tr>
                            <th scope="row">' . trans('website.nationality') .'</th>
                            <td>' . $nationalityRow->{'country_name' . $this->langPrefix} . '</td>
                        </tr>
                        <tr>
                            <th scope="row">' . trans('website.email') .'</th>
                            <td>' . $app->email . '</td>
                        </tr>
                    </tbody>
                </table>
                <center><a class="btn btn-success">' . trans('website.pay_now') .'</a></center>
            </div>';

            return response()->json(array('message' => $message, 'alert' => 'error'));
        } else {
            session(['visa_type_id' => $id]);

            return view('applications.step3')->with(['lang' => $this->lang, 'langPrefix' => $this->langPrefix, 'config' => $this->config]);
        }
        
    }
}
