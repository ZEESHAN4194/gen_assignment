<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\User;

class CourseRegistrationController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        return view('frontend.pages.registration', compact('courses'));
    }

    public function submitRegistration(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255 |unique:users,email',
            'phone' => 'required|string|max:255',
            'course_id' => 'required|exists:courses,id',
        ]);

        session(['registration_data' => $validatedData]);

        $course = Course::find($validatedData['course_id']);
        return view('frontend.pages.course-details', compact('course', 'validatedData'));
    }

    public function showCourseDetails()
    {
        $data = session('registration_data');

        if (!$data) {
            return redirect()->route('home')->with('error', 'No registration data found.');
        }

        $course = Course::find($data['course_id']);
        return view('frontend.pages.course-details', compact('course', 'data'));
    }

    public function confirm()
    {
        $data = session('registration_data');

        if (!$data) {
            return redirect()->route('home')->with('error', 'No registration data found.');
        }

        $course = Course::find($data['course_id']);
        return view('frontend.pages.confirmation', compact('data', 'course'));
    }

    public function submit()
    {
        $data = session('registration_data');

        if (!$data) {
            return redirect()->route('home')->with('error', 'No registration data to submit.');
        }
        // dd($data);
        $student = User::create([
            'name' => $data['first_name'] . ' ' . $data['last_name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => bcrypt('123456'),
            'course_id' => $data['course_id'],
            'usertype' => 'student',
        ]);
        $course = Course::find($data['course_id']);

        session()->forget('registration_data');
        return view('frontend.pages.success',compact('student', 'course'));
    }
}
