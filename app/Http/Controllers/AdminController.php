<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Course;
use App\Models\User;
use Illuminate\Support\Facades\Response;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalCourses = Course::count();
        $totalStudents = User::where('usertype', 'student')->count();

        return view('backend.pages.dashboard', compact('totalCourses', 'totalStudents'));
    }

    public function courseMaster()
    {
        $courses = Course::all();
        return view('backend.pages.courseMaster', compact('courses'));
    }
    public function studentRegister()
    {
        $students = User::where('usertype', 'student')->with('course')->get();
        return view('backend.pages.student', compact('students'));
    }
    public function CourseEdit($id)
    {
        $course = Course::findOrFail($id);
        return view('backend.pages.courseEdit', compact('course'));
    }

    public function CourseDelete($id)
    {
        $course = Course::findOrFail($id);

        // Delete course image if exists
        if ($course->image && file_exists(public_path('uploads/courses/' . $course->image))) {
            unlink(public_path('uploads/courses/' . $course->image));
        }

        $course->delete();

        return redirect()->route('course.master')->with('success', 'Course deleted successfully.');
    }

    public function CourseAdd(Request $request)
    {
        $request->validate([
            'name' => 'required | unique:courses,name',
            'description' => 'required',
            'fees' => 'required',
            'duration' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);
        $course = Course::create([
            'name' => $request->name,
            'description' => $request->description,
            'fees' => $request->fees,
            'duration' => $request->duration,
        ]);
        // dd($request->hasFile('thumbnail')); 
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($course->image && file_exists(public_path('storage/courses/' . $course->image))) {
                unlink(public_path('storage/courses/' . $course->image));
            }

            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            // $file->storeAs('public/courses', $filename);
            $file->move(public_path('uploads/courses'), $filename);
            $course->thumbnail = $filename;
        }

        $course->save();

        return redirect()->route('course.master')->with('success', 'Course updated successfully.');
    }

    public function CourseUpdate(Request $request, $id)
    {
        $course = Course::findOrFail($id);

        $request->validate([
            'name' => 'required| unique:courses,name,' . $course->id,
            'description' => 'required',
            'fees' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $course->name = $request->name;
        $course->description = $request->description;
        $course->fees = $request->fees;
        // dd($request->hasFile('thumbnail')); 
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($course->image && file_exists(public_path('storage/courses/' . $course->image))) {
                unlink(public_path('storage/courses/' . $course->image));
            }

            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            // $file->storeAs('public/courses', $filename);
            $file->move(public_path('uploads/courses'), $filename);
            $course->thumbnail = $filename;
        }

        $course->save();

        return redirect()->route('dashboard')->with('success', 'Course updated successfully.');
    }

    public function login(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('dashboard')->with('success', 'Welcome Admin!');
        } else {
            return redirect()->route('login')->with('error', 'Incorrect Credentials!');
        }

        return back()->with('error', 'Invalid credentials!');
    }

    

    public function exportStudents()
    {
        $students = User::where('usertype', 'student')->get();
        // dd($students);

        $filename = 'students.csv';
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=$filename",
        ];

        $callback = function () use ($students) {
            $file = fopen('php://output', 'w');

            // CSV Header
            fputcsv($file, ['ID', 'Name', 'Email', 'Phone', 'Course', 'Fees','duration']);

            // CSV Rows
            foreach ($students as $student) {
                fputcsv($file, [
                    $student->id ?? 'N/A',
                    $student->name ?? 'N/A',
                    $student->email ?? 'N/A',
                    $student->phone ?? 'N/A',
                    $student->course->name ?? 'N/A',
                    $student->course->fees ? $student->course->fees . ' lakh' : 'N/A',
                    $student->course->duration ? $student->course->duration . ' years' : 'N/A'
                    // $student->created_at->format('Y-m-d'),
                ]);
            }

            fclose($file);
        };

        return Response::stream($callback, 200, $headers);
    }
}
