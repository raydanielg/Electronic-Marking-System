<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:manager');
    }

    public function index(Request $request)
    {
        $manager = Auth::guard('manager')->user();

        $sessions = collect([
            [
                'id' => 'sess_' . uniqid(),
                'device' => 'Chrome on Windows',
                'ip' => $request->ip(),
                'location' => 'Tanzania',
                'last_active' => now()->subMinutes(5),
                'is_current' => true,
            ],
        ]);

        return view('auth.sessions', [
            'manager' => $manager,
            'sessions' => $sessions,
        ]);
    }

    public function destroy(Request $request, $sessionId)
    {
        return redirect()->route('auth.sessions')->with('success', 'Session revoked successfully.');
    }

    public function destroyAll(Request $request)
    {
        Auth::guard('manager')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'All sessions revoked. Please login again.');
    }
}
