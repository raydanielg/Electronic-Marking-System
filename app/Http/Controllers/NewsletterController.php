<?php

namespace App\Http\Controllers;

use App\Models\NewsletterSubscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NewsletterController extends Controller
{
    public function subscribe(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:newsletter_subscribers,email',
        ], [
            'email.required' => 'Tafadhali weka barua pepe yako.',
            'email.email' => 'Tafadhali weka barua pepe halali.',
            'email.unique' => 'Barua pepe hii tayari imeshasajiliwa.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first()
            ], 422);
        }

        try {
            NewsletterSubscriber::create([
                'email' => $request->email,
                'is_active' => true
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Hongera! Umefanikiwa kujiunga na jarida letu. Utapokea taarifa na matukio mbalimbali kutoka EMaS.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Samahani, kumeshindikana kusajili barua pepe yako. Tafadhali jaribu tena baadaye.'
            ], 500);
        }
    }
}
