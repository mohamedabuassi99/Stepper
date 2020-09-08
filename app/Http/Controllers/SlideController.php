<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\helpers;

class SlideController extends Controller
{

    public function diet(Request $request, $slide_number)
    {
        // If the client is sick redirect him to a apology page
        // if (session()->has('abology') && session()->get('abology')) {
        //   session()->forget('abology');
        //   return view('homepage.pages.apology');
        // }

        // Get slide name using slide_name() helper from config
        // $slide_name = slide_name($request->prefix, $slide_number);

        // // Check if slides in edit mode
        // if (strcasecmp('price-confirmation', $slide_name) === 0 && strcasecmp(session()->has('slides-mode') ? session()->get('slides-mode') : '', 'edit') === 0)
        //   return OrderController::update();

        return view("homepage.slides.$slide_number");
    }

    public function next_slide(Request $request, $slide)
    {
        // dd($request->all());
        switch ($request->from) {
            case '1':
                session()->put('1', $request->experience);
                break;

            case '2':
                session()->put('2', $request->gender);
                break;

            case '3':
                session()->put('3', $request->gender);
                break;

            case '4':
                session()->put('4', $request->gender);
                break;

            case '5':
                session()->put('5', $request->gender);
                break;

            case '6':
                session()->put('6', $request->gender);
                break;

        }

        return redirect('/' . $slide);
    }
}
