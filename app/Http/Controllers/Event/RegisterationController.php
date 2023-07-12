<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Graphs;
use App\Models\Article;
use Illuminate\Support\Str;
use App\Models\Event\Schedule;
use App\Models\Event\Registeration;
use Illuminate\Support\Facades\Session;
use App\Mail\EventRegisteration;
use App\Traits\ApiResponse;
use Illuminate\Support\Facades\Mail;

class RegisterationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use ApiResponse;

    public function index()
    {
        $registerations = Registeration::orderBy('id', 'asc')->get();
        return view('admin.event.registeration.listing', compact('registerations'));
    }

    public function scheduleRegistration(Request $request) {

        $errorData = array();
        $requestData = array(
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required',
            'phonenumber' => 'required',
            'occupation' => 'required',
            'organization' => 'required',
            'schedule' => 'required',
        );
        $request = request()->all();
        
        if(empty($request['fname'])){
            $errorData['fname'] = 'First name is required';
        }
        if(empty($request['lname'])){
            $errorData['lname'] = 'Last name is required';
        }
        if(empty($request['email'])){
            $errorData['email'] = 'Email is required';
        }
        if(empty($request['phonenumber'])){
            $errorData['phonenumber'] = 'Mobile number is required';
        }
        if(empty($request['occupation'])){
            $errorData['occupation'] = 'Occupation is required';
        }
        if(empty($request['organization'])){
            $errorData['organization'] = 'Organization is required';
        }
        if(empty($request['schedule'])){
            $errorData['schedule'] = 'Schedule Day is required';
        }

        if(count($errorData) > 0)
        {
            return $this->successApiResponse('oops Something went wrong!',$errorData);
        }else{
            if(isset($request['schedule']) && !empty($request['schedule'])){
                $request['schedule_id'] = $request['schedule'];
            }
            $newCreateUser = Registeration::create($request);
            $name= $newCreateUser['fname'].' '.$newCreateUser['lname'];

             Mail::to('hiteshpwr93@yahoo.com')->send(new EventRegisteration($name));
            return $this->successApiResponse('Form submitted successfully');
        }
        // Session::flash('success', 'Registration completed successfully!');
        // return redirect('pages/events')
        //     ->with('success', 'Registration completed successfully!');
        
    }
    

    public function destroy($id)
    {
        $registerationData = Registeration::where('id',$id);
        $registerationData->delete();

        return redirect('yn-admin/event/registeration')
            ->with('success', 'Registeration deleted successfully');
    }

}
