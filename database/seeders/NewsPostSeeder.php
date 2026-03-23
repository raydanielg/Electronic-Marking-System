<?php

namespace Database\Seeders;

use App\Models\NewsPost;
use Illuminate\Database\Seeder;

class NewsPostSeeder extends Seeder
{
    public function run(): void
    {
        $posts = [
            [
                'title' => 'EMaS Rollout Update: Improved Exam Workflow Across Regions',
                'slug' => 'emas-rollout-update-improved-exam-workflow-across-regions',
                'excerpt' => 'A quick update on the EMaS rollout: faster marks entry, clearer approvals, and better reporting workflows for councils and schools.',
                'content' => "EMaS continues to support councils and schools with a streamlined exam lifecycle.\n\nKey improvements in this release:\n- Faster data entry and validation\n- Clearer approval workflow\n- Consistent reporting outputs\n\nWe will keep improving usability and performance based on feedback from managers, clerks, and teachers.",
                'cover_image' => 'hero/analyzing-business-activity.jpg',
                'author_name' => 'EMaS Editorial',
                'is_published' => true,
                'published_at' => now()->subDays(3),
            ],
            [
                'title' => 'Data Quality Checklist: Reduce Errors Before Publishing Results',
                'slug' => 'data-quality-checklist-reduce-errors-before-publishing-results',
                'excerpt' => 'Before approvals and final processing, use this simple checklist to catch common issues early and keep results accurate.',
                'content' => "High-quality data leads to high-quality results.\n\nRecommended checks:\n- Confirm student identifiers and class assignments\n- Verify subject allocations\n- Review missing marks and out-of-range values\n- Confirm uploads are submitted under the correct exam\n\nTip: Use consistent templates from the Materials page to avoid format issues.",
                'cover_image' => 'hero/students-paying-attention-class.jpg',
                'author_name' => 'Quality & Standards Team',
                'is_published' => true,
                'published_at' => now()->subDays(8),
            ],
            [
                'title' => 'Training Schedule: Supporting School Managers and Clerks',
                'slug' => 'training-schedule-supporting-school-managers-and-clerks',
                'excerpt' => 'Upcoming orientation sessions: account setup, bulk uploads, marks entry best practices, approvals, and reporting.',
                'content' => "We are organizing short training sessions to help users adopt EMaS smoothly.\n\nTopics include:\n- User onboarding and role assignment\n- Bulk uploads (students/schools)\n- Marks entry workflows\n- Approval and reporting\n\nContact your council coordinator for dates and venues.",
                'cover_image' => 'hero/group-children-wearing-school-uniforms-walking-down-dirt-road_1262781-165936.jpg',
                'author_name' => 'Training Desk',
                'is_published' => true,
                'published_at' => now()->subDays(14),
            ],
            [
                'title' => 'Security Note: Protect Accounts and Student Data',
                'slug' => 'security-note-protect-accounts-and-student-data',
                'excerpt' => 'A reminder on account protection: strong passwords, verified emails, and best practices for safe access.',
                'content' => "Security is a shared responsibility.\n\nBest practices:\n- Use strong, unique passwords\n- Verify email accounts\n- Avoid sharing credentials\n- Log out from shared devices\n\nEMaS applies role-based access and logging to help keep actions accountable.",
                'cover_image' => 'hero/rural-african-children-learning_89223-29982.jpg',
                'author_name' => 'Security & Governance',
                'is_published' => true,
                'published_at' => now()->subDays(20),
            ],
        ];

        foreach ($posts as $p) {
            NewsPost::updateOrCreate(
                ['slug' => $p['slug']],
                $p
            );
        }
    }
}
