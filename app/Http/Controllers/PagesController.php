<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Application;
use Illuminate\Support\Facades\Mail;
use App\Mail\ApplicationApplyEmail;
use App\Notifications\EnrollTask;
use DB;

class PagesController extends Controller
{
    public function homepage()
    {


        if (!empty(Auth::user()->id)) {
            if (Auth::user()->is_admin == 1) {
                $items = Application::paginate(20);
                return view('applications.index', ['items' => $items]);
            } else {
                $user = Application::where('user_id', Auth::user()->id)->first();

                if (is_null($user)) {
                    return view('apply', ['user' => Auth::user()]);
                } else {
                    return view('situation', ['user' => $user]);
                }
            }
        } else {
            return view('home');
        }
    }

    public function apply()
    {

        if (Auth::user()->is_admin == 1) {
            $items = Application::all();
            return view('applications.index', ['items' => $items]);
        }


        $user = User::find(Auth::user()->id)->application;
        if (is_null($user) && Auth::user()->is_admin != 1) {

            $user = User::find(Auth::user()->id);
            return view('apply', ['user' => $user]);
        } else {

            return view('situation', ['user' => $user]);
        }
    }

    public function postApply(Request $request)
    {

        $user = Application::where('user_id', Auth::user()->id)->first();
        if (is_null($user) && Auth::user()->is_admin != 1) {
            $user = Application::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'phone' => $request->phone,
                'notes' => $request->notes,
                'user_id' => Auth::user()->id
            ]);

            $enroll = [
                'body' => 'New user in the list',
                'title' => 'Add new candidate : ' . $request->first_name,
                'url' => url('http://<yourdomain>/home'),
                'thankyou' => 'Approve or Refuse?'
            ];


            $admin = User::where('is_admin', '1')->first();
            $admin->notify(new EnrollTask($enroll));
            Mail::to($request->email)->send(new ApplicationApplyEmail($request->first_name));
            return view('applications.complete', ['first_name' => $request->first_name]);
        } else {
            $user = Application::where('user_id', Auth::user()->id)->first();
            return view('situation', ['user' => $user]);
        }
        return view('situation');
    }

    public function acceptpage($id)
    {
        $application = Application::find($id);
        $application->job = "Approve";
        $application->save();

        Mail::to($application->email)->send(new ApplicationApplyEmail($application->first_name, $application->job));
        return response()->json([
            'message' => 'Applications Updated Successfully!!',
            'category' => $application
        ]);
    }


    public function refusepage($id)
    {
        $application = Application::find($id);
        $application->job = "Refuse";
        $application->save();

        Mail::to($application->email)->send(new ApplicationApplyEmail($application->first_name, $application->job));
        return response()->json([
            'message' => 'Applications Updated Successfully!!',
            'category' => $application
        ]);
    }

    public function completepage($id)
    {
        $application = Application::find($id);
        return view('applications.complete', ['application' => $application]);
    }
}
