<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Manager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cache;

class PasswordResetController extends Controller
{
    public function showRequestForm()
    {
        return view('auth.passwords.email');
    }

    public function sendCode(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:managers,email',
        ], [
            'email.required' => 'Email address is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.exists' => 'No account found with this email address.',
        ]);

        $manager = Manager::where('email', $request->email)->first();

        if (!$manager) {
            return back()->withErrors(['email' => 'No account found with this email address.']);
        }

        $code = strtoupper(Str::random(6));
        $key = 'password_reset_' . $manager->email;
        
        Cache::put($key, [
            'code' => $code,
            'email' => $manager->email,
        ], now()->addMinutes(15));

        try {
            Mail::raw("Your password reset code is: {$code}\n\nThis code will expire in 15 minutes.\n\nIf you did not request this, please ignore this email.", function ($message) use ($manager) {
                $message->to($manager->email)
                    ->subject('EMaS Password Reset Code');
            });

            return redirect()->route('password.verify', ['email' => $manager->email])->with('success', 'Password reset code has been sent to your email.');
        } catch (\Exception $e) {
            return back()->withErrors(['email' => 'Failed to send email. Please try again later.']);
        }
    }

    public function showVerifyForm($email)
    {
        return view('auth.passwords.verify', compact('email'));
    }

    public function verifyCode(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'code' => 'required|string|size:6',
        ], [
            'code.required' => 'Reset code is required.',
            'code.size' => 'Reset code must be 6 characters.',
        ]);

        $key = 'password_reset_' . $request->email;
        $cached = Cache::get($key);

        if (!$cached || strtoupper($cached['code']) !== strtoupper($request->code)) {
            return back()->withErrors(['code' => 'Invalid or expired reset code.']);
        }

        Cache::put($key . '_verified', $request->email, now()->addMinutes(15));

        return redirect()->route('password.reset', ['email' => $request->email]);
    }

    public function showResetForm($email)
    {
        return view('auth.passwords.reset', compact('email'));
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8|confirmed',
        ], [
            'password.required' => 'Password is required.',
            'password.min' => 'Password must be at least 8 characters.',
            'password.confirmed' => 'Password confirmation does not match.',
        ]);

        $key = 'password_reset_' . $request->email . '_verified';
        $verifiedEmail = Cache::get($key);

        if (!$verifiedEmail || $verifiedEmail !== $request->email) {
            return redirect()->route('password.request')->withErrors(['email' => 'Password reset session expired. Please try again.']);
        }

        $manager = Manager::where('email', $request->email)->first();

        if (!$manager) {
            return redirect()->route('password.request')->withErrors(['email' => 'Account not found.']);
        }

        $manager->update([
            'password' => Hash::make($request->password),
        ]);

        Cache::forget('password_reset_' . $request->email);
        Cache::forget($key);

        return redirect()->route('login')->with('success', 'Password has been reset successfully. Please login with your new password.');
    }
}
