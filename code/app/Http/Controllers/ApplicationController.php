<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Models\Admin\VisaType;
use App\Models\Admin\Application;
use App\Models\Admin\Country;
use App\Models\Admin\Page;

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

        $requiredDocuments = Page::where(['type' => 'required_documents', 'lang' => $this->lang])->first();

        return view('applications.step2')->with(['visaTypes' => $visaTypes, 'requiredDocuments' => $requiredDocuments, 'lang' => $this->lang, 'langPrefix' => $this->langPrefix, 'config' => $this->config]);
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
                <center><a class="btn btn-success" href=' . url('application/pay') . '/' . $app->id . '>' . trans('website.pay_now') .'</a></center>
            </div>';

            return response()->json(array('message' => $message, 'alert' => 'error'));
        } else {
            session(['visa_type_id' => $id]);

            return view('applications.step3')->with(['lang' => $this->lang, 'langPrefix' => $this->langPrefix, 'config' => $this->config]);
        }
    }

    public function pay($id)
    {
        $application = Application::with('visaType')->findOrFail($id);

        $payload = [
            'amount' => $application->visaType->cost,
            'currency' => 'AED',
//            'statement_descriptor' => 'Test Txn 001',
            'redirect' => [
                'return_url' => 'http://return.com/evisa/application/pay_response',
                'post_url' => 'http://return.com/evisa/application/pay'
            ],
            'description' => $application->visaType->title,
            'metadata' => [
                'ref_no' => $application->ref_no
            ],
//            'receipt_sms' => '96598989898',
//            'receipt_email' => 'test@test.com'
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.tap.company/v1/charges');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json', 'authorization: Bearer sk_test_stR9ydEPWUcaN3kZ74TfuAYg'));
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $server_output = curl_exec($ch);
        curl_close ($ch);

        $server_output_decoded = json_decode($server_output);
//        print_r($server_output_decoded);

        $url = $server_output_decoded->redirect->url;

        return redirect()->to($url);
    }

    public function pay_response(Request $request)
    {
        $status = 0;
        if (!empty($request['result']) && $request['result'] == 'SUCCESS') {
            $opts = [
                'http' => [
                    'method' => 'GET',
                    'header' => "Content-Type: application/json\r\n" .
                        "authorization: Bearer sk_test_stR9ydEPWUcaN3kZ74TfuAYg\r\n"
                ]
            ];
            $context = stream_context_create($opts);
            $response = json_decode(file_get_contents('https://api.tap.company/v1/charges/' . $request->chargeid, false, $context));
            if (!empty($response->metadata->ref_no)) {
                $ref_no = $response->metadata->ref_no;
                Application::where('ref_no', $ref_no)->update(['transaction_id' => $request->chargeid, 'paid_amount' => $response->amount]);
                $status = 1;
            }
        }

        $page_title = trans('website.payment_result');

        return view('applications.pay_response')->with(['status' => $status, 'page_title' => $page_title, 'lang' => $this->lang, 'langPrefix' => $this->langPrefix, 'config' => $this->config]);
    }

    public function track(Request $request)
    {
        if ($request->isMethod('post')) {
            $app = Application::where('ref_no', $request->reference_number)->first();
            if (!$app) {
                $message = '<div class="alert alert-danger nobottommargin">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <i class="icon-remove-sign"></i><strong>' . trans('website.error') . '!</strong> ' . trans('website.track_error') . '.
                            </div><style>form{display: block !important}</style>';
            } else {
                $nationalityRow = Country::find($app->nationality);
                $residenceCountryRow = Country::find($app->residence_country);

                $message = '<div class="col-md-8 offset-md-2">
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <th scope="row" width="50%">' . trans('website.applicant_name') .'</th>
                                <td>' . $app->full_name . '</td>
                            </tr>
                            <tr>
                                <th scope="row">' . trans('website.applied_on') .'</th>
                                <td>' . $app->created_at->format('d/m/Y') . '</td>
                            </tr>
                            <tr>
                                <th scope="row">' . trans('website.service_applied_for') .'</th>
                                <td>' . $app->visaType->type . '</td>
                            </tr>
                            <tr>
                                <th scope="row">' . trans('website.order_comments') .'</th>
                                <td>' . $app->comments . '</td>
                            </tr>
                            <tr>
                                <th scope="row">' . trans('website.payment_status') .'</th>
                                <td>' . ($app->transaction_id ? 'Paid' : 'Unpaid &nbsp; <a class="btn btn-success" href=' . url('application/pay') . '/' . $app->id . '>' . trans('website.pay_now') .'</a>') . '</td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-center" colspan="2">' . trans('website.visa_details') .'</th>
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
                                <th scope="row">' . trans('website.living_in') .'</th>
                                <td>' . $residenceCountryRow->{'country_name' . $this->langPrefix} . '</td>
                            </tr>
                            <tr>
                                <th scope="row">' . trans('website.nationality') .'</th>
                                <td>' . $nationalityRow->{'country_name' . $this->langPrefix} . '</td>
                            </tr>
                            <tr>
                                <th scope="row">' . trans('website.application_status') .'</th>
                                <td>' . trans('website.status.' . $app->status) . '</td>
                            </tr>
                        </tbody>
                    </table>
                </div>';
            }

            return response()->json(array('message' => $message, 'alert' => 'error'));
        } else {
            $page_title = trans('website.track_application');

            return view('applications.track')->with(['page_title' => $page_title, 'lang' => $this->lang, 'langPrefix' => $this->langPrefix, 'config' => $this->config]);
        }
    }
}
