<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SystemSetting;

class SettingController extends Controller
{
    public function index()
    {
        $settings = [
            'allow_clerk_registration' => SystemSetting::getValue('allow_clerk_registration', true),
            'maintenance_mode' => SystemSetting::getValue('maintenance_mode', false),
            'allow_manager_profile_edit' => SystemSetting::getValue('allow_manager_profile_edit', true),
            'system_name' => SystemSetting::getValue('system_name', 'EMAS'),
            'school_year' => SystemSetting::getValue('school_year', date('Y')),
            'clerk_can_delete_data' => SystemSetting::getValue('clerk_can_delete_data', false),
            'sms_notifications_enabled' => SystemSetting::getValue('sms_notifications_enabled', true),
        ];

        return view('manager.settings', compact('settings'));
    }

    public function update(Request $request)
    {
        $booleans = [
            'allow_clerk_registration',
            'maintenance_mode',
            'allow_manager_profile_edit',
            'clerk_can_delete_data',
            'sms_notifications_enabled'
        ];

        foreach ($booleans as $key) {
            SystemSetting::setValue($key, $request->has($key) ? 'true' : 'false', 'general', 'boolean');
        }

        if ($request->has('system_name')) {
            SystemSetting::setValue('system_name', $request->system_name, 'general', 'string');
        }
        if ($request->has('school_year')) {
            SystemSetting::setValue('school_year', $request->school_year, 'general', 'string');
        }

        return back()->with('success', 'System settings updated successfully.');
    }
}
