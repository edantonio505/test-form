<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\FormInfo;
use ReCaptcha\ReCaptcha;

class FormController extends Controller
{
    public function postFormData(Request $request)
    {	
    	$this->reCaptacha($request);
   		/*------------------------------
   			validating Form
   		---------------------------------*/
    	$this->validate($request, [
	       'first_name' => 'required|max:255',
	       'last_name' => 'required',
	    	'address1' => 'required',
	    	'city' => 'required',
	    	'state' => 'required',
	    	'zip' => 'required',
	    	'phone' => 'required',
	    	'email' => 'required | unique:form_infos',
	    	'company_name' => 'required',
	    	'company_address' => 'required',
	    	'company_city' => 'required',
	    	'company_phone' => 'required',
	    	'file' => 'mimes:pdf'
	   ]);

    	$form = FormInfo::create($request->input());
    	$this->checkIfFileExists($request, $form);
    	return redirect()->back()->with('status', 'Application saved');
    }



    /*-----------------------------------------------
    				REVIEWING APPLICATION
    -------------------------------------------------*/
    public function getReviewForm($id)
    {
    	$form = FormInfo::findOrFail($id);
    	return view('pages.review_form', ['form' => $form]);
    }


    public function postReviewForm($id, $status)
    {	
    	$form = FormInfo::findOrFail($id);
    	if($status == 'approve')
    	{
    		$form->approved = true;
    		$form->save();
    	}

    	if($status == 'deny')
    	{
    		$form->approved = 0;
    		$form->save();
    	}

    	return redirect()->back();
    }


    protected function reCaptacha(Request $request)
    {
    	$recaptcha = new ReCaptcha('6LdovygTAAAAALqMPDwA7Ye35aRXMpth87tDAW1B');
    	$resp = $recaptcha->verify($request->input('g-recaptcha-response'));
    	if(!$resp->isSuccess()){
    		return redirect()->back()->with('error', 'Please solve captcha');
    	}
    }



    /*----------------------------------------------------
				CHECK IF FILE EXISTS AND IF SO, SAVE FILE
    ----------------------------------------------------*/
    protected function checkIfFileExists(Request $request, $form)
    {	
    	if ($request->hasFile('file')) {
    		$file = $request->file('file');
		  	$file_name = md5(time().$file->getClientOriginalName()).'.'.$file->getClientOriginalExtension();
		  	$path = $request->file('file')->storeAs('pdf', $file_name, 'uploads');
		  	$form->file = $path;
		  	$form->save();
		}
    }

}
