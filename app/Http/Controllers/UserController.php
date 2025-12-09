<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;

class UserController extends Controller
{
    public function viewUserDashboard(Request $request)
    {
        if (!auth()->check()) {
            return redirect()->route('viewLogin')->withErrors([
                'auth' => 'You must be logged in to access the dashboard.'
            ]);
        }
        $query = Job::query();
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where('job_name', 'like', "%{$search}%")
                ->orWhere('company_name', 'like', "%{$search}%")
                ->orWhere('location', 'like', "%{$search}%");
        }
        $jobs = $query->orderBy('created_at', 'desc')->get();

        return view('dashboard', compact('jobs'));
    }

    public function viewProfile(Request $request)
    {
        return view('profile');
    }
    public function updateProfile(Request $request)
    {
        $user = auth()->user();

        $user->update([
            'name' => $request->name,
            'contact_number' => $request->contact_number,
            'age' => $request->age,
            'address' => $request->address,
            'about' => $request->about,
        ]);

        return response()->json(['success' => true]);
    }

}
