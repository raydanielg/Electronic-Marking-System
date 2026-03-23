<?php

namespace Database\Seeders;

use App\Models\ResearchPost;
use Illuminate\Database\Seeder;

class ResearchPostSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            [
                'title' => 'Improving Data Quality in Digital Exam Processing',
                'slug' => 'improving-data-quality-in-digital-exam-processing',
                'excerpt' => 'A practical brief on common data issues in mark entry and how validation, templates, and approvals improve integrity.',
                'content' => "This research brief highlights typical data issues observed during exam processing and proposes practical mitigations.\n\nKey points:\n- Standardized templates reduce import errors\n- Validation rules catch out-of-range values\n- Approval workflows improve accountability\n- Audit logs support governance and transparency\n\nRecommendation: adopt a clear checklist before publishing results.",
                'cover_image' => 'hero/analyzing-business-activity.jpg',
                'author_name' => 'Research Desk',
                'organization' => 'EMaS Programme',
                'document_url' => null,
                'is_published' => true,
                'published_at' => now()->subDays(6),
            ],
            [
                'title' => 'Performance Analytics: Using Trends to Support Teaching',
                'slug' => 'performance-analytics-using-trends-to-support-teaching',
                'excerpt' => 'How subject-level trends and rankings can guide targeted learning support at school and council level.',
                'content' => "Analytics help identify strengths and gaps early.\n\nThis paper explores:\n- Subject trend tracking\n- Class and school comparisons\n- Ranking approaches and fairness\n- Interventions informed by data\n\nOutcome: improve teaching focus areas using evidence-based insights.",
                'cover_image' => 'hero/students-paying-attention-class.jpg',
                'author_name' => 'Analytics Team',
                'organization' => 'EMaS Programme',
                'document_url' => null,
                'is_published' => true,
                'published_at' => now()->subDays(12),
            ],
            [
                'title' => 'Secure Access Patterns for Role-Based Education Systems',
                'slug' => 'secure-access-patterns-for-role-based-education-systems',
                'excerpt' => 'A short guide to RBAC, verification, and audit logging for education data systems handling sensitive results.',
                'content' => "Role-Based Access Control (RBAC) is essential for separating duties across managers, clerks, teachers, and admins.\n\nThis document covers:\n- Role design and permissions\n- Email verification and account activation\n- Activity logging for accountability\n- Secure communication and data storage\n\nConclusion: security must be built-in and continuously reviewed.",
                'cover_image' => 'hero/rural-african-children-learning_89223-29982.jpg',
                'author_name' => 'Security & Governance',
                'organization' => 'EMaS Programme',
                'document_url' => null,
                'is_published' => true,
                'published_at' => now()->subDays(18),
            ],
        ];

        foreach ($items as $it) {
            ResearchPost::updateOrCreate(
                ['slug' => $it['slug']],
                $it
            );
        }
    }
}
