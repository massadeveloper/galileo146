<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationsController extends Controller
{

    public function __construct()
    {
        // Accessible only to admins
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        if ($request->expectsJson())
            return Application::paginate(20);

        return view('applications.index');
    }



    /**
     * @param Application $application
     */
    public function accept(Application $application)
    {
        $application->accept();
    }

}
