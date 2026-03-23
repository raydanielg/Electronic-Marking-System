<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\AccountDeletionRequest;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::guard('manager')->user();
        return view('manager.profile', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::guard('manager')->user();
        
        $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|unique:managers,email,' . $user->id,
            'phone' => 'nullable|string|max:20',
        ]);

        $user->update($request->only('full_name', 'email', 'phone'));

        return back()->with('success', 'Profile updated successfully.');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = Auth::guard('manager')->user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'The provided password does not match your current password.']);
        }

        $user->update([
            'password' => Hash::make($request->password)
        ]);

        return back()->with('success', 'Password updated successfully.');
    }

    public function requestDeletion(Request $request)
    {
        $request->validate([
            'reason' => 'required|string|min:10|max:1000',
            'details' => 'nullable|string|max:2000',
            'confirm' => 'accepted',
        ], [
            'reason.required' => 'Please provide a reason for account deletion.',
            'reason.min' => 'Reason must be at least 10 characters.',
            'reason.max' => 'Reason is too long.',
            'details.max' => 'Details are too long.',
            'confirm.accepted' => 'You must confirm that you understand this action is permanent.',
        ]);

        $user = Auth::guard('manager')->user();

        AccountDeletionRequest::create([
            'user_id' => $user->id,
            'user_type' => 'manager',
            'reason' => $request->reason,
            'details' => $request->details,
            'status' => 'pending',
            'requested_at' => now(),
        ]);

        Auth::guard('manager')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Your account deletion request has been submitted and is being processed.');
    }

    public function updatePhoto(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $user = Auth::guard('manager')->user();

        if ($request->hasFile('photo')) {
            // Delete old photo if exists
            if ($user->profile_photo && \Storage::disk('public')->exists($user->profile_photo)) {
                \Storage::disk('public')->delete($user->profile_photo);
            }

            $path = $request->file('photo')->store('profile-photos', 'public');
            
            $user->update([
                'profile_photo' => $path
            ]);

            return response()->json([
                'success' => true,
                'url' => asset('storage/' . $path)
            ]);
        }

        return response()->json(['success' => false, 'message' => 'No file uploaded'], 400);
    }
}
