<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Manager\SchoolController;
use App\Http\Controllers\Manager\ProfileController;
use App\Http\Controllers\Manager\SettingController;
use App\Http\Controllers\Manager\StudentController;
use App\Models\NewsPost;
use App\Models\ResearchPost;
use Illuminate\Support\Facades\Schema;

// Landing page
Route::get('/', function () {
    return view('landing.index');
})->name('landing');

Route::get('/about', function () {
    return view('landing.about');
})->name('landing.about');

Route::get('/contact', function () {
    return view('landing.contact');
})->name('landing.contact');

Route::get('/guidelines', function () {
    return view('landing.guideline');
})->name('landing.guideline');

Route::get('/materials', function () {
    return view('landing.materials');
})->name('landing.materials');

Route::get('/news', function () {
    $posts = collect([]);

    try {
        if (Schema::hasTable('news_posts')) {
            $posts = NewsPost::query()
                ->where('is_published', true)
                ->orderByDesc('published_at')
                ->get();
        }
    } catch (\Throwable $e) {
        $posts = collect([]);
    }

    return view('landing.news.index', ['posts' => $posts]);
})->name('landing.news.index');

Route::get('/news/{slug}', function (string $slug) {
    abort_unless(Schema::hasTable('news_posts'), 404);

    $post = NewsPost::query()
        ->where('is_published', true)
        ->where('slug', $slug)
        ->firstOrFail();

    $related = NewsPost::query()
        ->where('is_published', true)
        ->where('id', '!=', $post->id)
        ->orderByDesc('published_at')
        ->limit(3)
        ->get(['title', 'slug', 'cover_image', 'published_at']);

    return view('landing.news.show', [
        'post' => $post,
        'related' => $related,
    ]);
})->name('landing.news.show');

Route::get('/tafiti', function () {
    $items = collect([]);

    try {
        if (Schema::hasTable('research_posts')) {
            $items = ResearchPost::query()
                ->where('is_published', true)
                ->orderByDesc('published_at')
                ->get();
        }
    } catch (\Throwable $e) {
        $items = collect([]);
    }

    return view('landing.tafiti.index', ['items' => $items]);
})->name('landing.tafiti.index');

Route::get('/tafiti/{slug}', function (string $slug) {
    abort_unless(Schema::hasTable('research_posts'), 404);

    $item = ResearchPost::query()
        ->where('is_published', true)
        ->where('slug', $slug)
        ->firstOrFail();

    $related = ResearchPost::query()
        ->where('is_published', true)
        ->where('id', '!=', $item->id)
        ->orderByDesc('published_at')
        ->limit(3)
        ->get(['title', 'slug', 'cover_image', 'published_at']);

    return view('landing.tafiti.show', [
        'item' => $item,
        'related' => $related,
    ]);
})->name('landing.tafiti.show');

Route::get('/examinations', function () {
    $exams = collect([
        [
            'slug' => 'mock-2025-dar-es-salaam',
            'title' => 'Mock Examination 2025',
            'type' => 'Mock',
            'region' => 'Dar es Salaam',
            'level' => 'Secondary',
            'term' => 'Term II',
            'academic_year' => '2025',
            'date' => '2025-06-18',
            'status' => 'Published',
            'schools' => 214,
            'subjects' => 12,
        ],
        [
            'slug' => 'midterm-2025-arusha',
            'title' => 'Midterm Examination 2025',
            'type' => 'Midterm',
            'region' => 'Arusha',
            'level' => 'Primary',
            'term' => 'Term I',
            'academic_year' => '2025',
            'date' => '2025-03-21',
            'status' => 'Processing',
            'schools' => 168,
            'subjects' => 10,
        ],
        [
            'slug' => 'joint-2024-mwanza',
            'title' => 'Joint Examination 2024',
            'type' => 'Joint',
            'region' => 'Mwanza',
            'level' => 'Secondary',
            'term' => 'Term III',
            'academic_year' => '2024',
            'date' => '2024-10-08',
            'status' => 'Published',
            'schools' => 197,
            'subjects' => 13,
        ],
        [
            'slug' => 'annual-2024-kilimanjaro',
            'title' => 'Annual Examination 2024',
            'type' => 'Annual',
            'region' => 'Kilimanjaro',
            'level' => 'Primary',
            'term' => 'Term III',
            'academic_year' => '2024',
            'date' => '2024-11-19',
            'status' => 'Archived',
            'schools' => 152,
            'subjects' => 9,
        ],
    ]);

    $regions = $exams->pluck('region')->unique()->values();

    return view('landing.examinations.index', [
        'exams' => $exams,
        'regions' => $regions,
    ]);
})->name('landing.examinations.index');

Route::get('/examinations/{exam}', function (string $exam) {
    $exams = collect([
        'mock-2025-dar-es-salaam' => [
            'slug' => 'mock-2025-dar-es-salaam',
            'title' => 'Mock Examination 2025',
            'type' => 'Mock',
            'region' => 'Dar es Salaam',
            'level' => 'Secondary',
            'term' => 'Term II',
            'academic_year' => '2025',
            'date' => '2025-06-18',
            'status' => 'Published',
        ],
        'midterm-2025-arusha' => [
            'slug' => 'midterm-2025-arusha',
            'title' => 'Midterm Examination 2025',
            'type' => 'Midterm',
            'region' => 'Arusha',
            'level' => 'Primary',
            'term' => 'Term I',
            'academic_year' => '2025',
            'date' => '2025-03-21',
            'status' => 'Processing',
        ],
        'joint-2024-mwanza' => [
            'slug' => 'joint-2024-mwanza',
            'title' => 'Joint Examination 2024',
            'type' => 'Joint',
            'region' => 'Mwanza',
            'level' => 'Secondary',
            'term' => 'Term III',
            'academic_year' => '2024',
            'date' => '2024-10-08',
            'status' => 'Published',
        ],
        'annual-2024-kilimanjaro' => [
            'slug' => 'annual-2024-kilimanjaro',
            'title' => 'Annual Examination 2024',
            'type' => 'Annual',
            'region' => 'Kilimanjaro',
            'level' => 'Primary',
            'term' => 'Term III',
            'academic_year' => '2024',
            'date' => '2024-11-19',
            'status' => 'Archived',
        ],
    ]);

    abort_unless($exams->has($exam), 404);
    $examData = $exams->get($exam);

    $subjects = collect([
        [
            'name' => 'Mathematics',
            'code' => 'MATH',
            'upload_status' => $examData['status'] === 'Archived' ? 'Locked' : 'Uploaded',
            'uploaded_by' => 'Council Clerk',
            'uploaded_at' => '2025-06-19 10:32',
            'file' => 'marks_math.xlsx',
        ],
        [
            'name' => 'English',
            'code' => 'ENG',
            'upload_status' => $examData['status'] === 'Processing' ? 'Pending' : 'Uploaded',
            'uploaded_by' => $examData['status'] === 'Processing' ? null : 'School Clerk',
            'uploaded_at' => $examData['status'] === 'Processing' ? null : '2025-06-19 11:10',
            'file' => $examData['status'] === 'Processing' ? null : 'marks_eng.xlsx',
        ],
        [
            'name' => 'Kiswahili',
            'code' => 'KIS',
            'upload_status' => $examData['status'] === 'Archived' ? 'Locked' : 'Uploaded',
            'uploaded_by' => 'School Clerk',
            'uploaded_at' => '2025-06-19 09:05',
            'file' => 'marks_kis.xlsx',
        ],
        [
            'name' => 'Science',
            'code' => 'SCI',
            'upload_status' => $examData['status'] === 'Processing' ? 'In Review' : 'Uploaded',
            'uploaded_by' => $examData['status'] === 'Processing' ? 'Council Manager' : 'Council Clerk',
            'uploaded_at' => $examData['status'] === 'Processing' ? '2025-03-22 14:15' : '2025-06-19 12:27',
            'file' => $examData['status'] === 'Processing' ? 'marks_sci_review.xlsx' : 'marks_sci.xlsx',
        ],
        [
            'name' => 'History',
            'code' => 'HIST',
            'upload_status' => $examData['status'] === 'Published' ? 'Uploaded' : 'Pending',
            'uploaded_by' => $examData['status'] === 'Published' ? 'School Clerk' : null,
            'uploaded_at' => $examData['status'] === 'Published' ? '2025-06-19 13:44' : null,
            'file' => $examData['status'] === 'Published' ? 'marks_hist.xlsx' : null,
        ],
    ]);

    return view('landing.examinations.show', [
        'exam' => $examData,
        'subjects' => $subjects,
    ]);
})->name('landing.examinations.show');

Route::get('/results/{type}', function (string $type) {
    $years = collect(['2026', '2025', '2024', '2023', '2022']);

    $typeName = strtoupper($type);
    $typeLabel = match ($type) {
        'mock' => 'Mock',
        'joint' => 'Joint',
        'midterm' => 'Midterm',
        'annual' => 'Annual',
        default => $typeName,
    };

    return view('landing.results.type', [
        'type' => $type,
        'typeLabel' => $typeLabel,
        'years' => $years,
    ]);
})->name('landing.results.type');

Route::get('/results/{type}/{year}', function (string $type, string $year) {
    $typeLabel = match ($type) {
        'mock' => 'Mock',
        'joint' => 'Joint',
        'midterm' => 'Midterm',
        'annual' => 'Annual',
        default => strtoupper($type),
    };

    $exams = collect([
        [
            'slug' => 'form-two',
            'name' => "{$typeLabel} {$year} - Form Two",
            'level' => 'Secondary',
            'centres' => 128,
            'status' => 'Published',
        ],
        [
            'slug' => 'form-four',
            'name' => "{$typeLabel} {$year} - Form Four",
            'level' => 'Secondary',
            'centres' => 142,
            'status' => 'Published',
        ],
        [
            'slug' => 'standard-seven',
            'name' => "{$typeLabel} {$year} - Standard Seven",
            'level' => 'Primary',
            'centres' => 156,
            'status' => 'Published',
        ],
    ]);

    return view('landing.results.exams', [
        'type' => $type,
        'typeLabel' => $typeLabel,
        'year' => $year,
        'exams' => $exams,
    ]);
})->name('landing.results.year');

Route::get('/results/{type}/{year}/{exam}', function (string $type, string $year, string $exam) {
    $typeLabel = match ($type) {
        'mock' => 'Mock',
        'joint' => 'Joint',
        'midterm' => 'Midterm',
        'annual' => 'Annual',
        default => strtoupper($type),
    };

    $examLabel = match ($exam) {
        'form-two' => 'Form Two',
        'form-four' => 'Form Four',
        'standard-seven' => 'Standard Seven',
        default => strtoupper(str_replace('-', ' ', $exam)),
    };

    $schools = collect([
        ['code' => 'S0104', 'name' => 'BWIRU BOYS SECONDARY SCHOOL'],
        ['code' => 'S0144', 'name' => 'NSUMBA SECONDARY SCHOOL'],
        ['code' => 'S0146', 'name' => 'NYEGEZI SEMINARY SECONDARY SCHOOL'],
        ['code' => 'S0151', 'name' => 'SENGEREMA SECONDARY SCHOOL'],
        ['code' => 'S0173', 'name' => 'NYAMILAMA SECONDARY SCHOOL'],
        ['code' => 'S0202', 'name' => 'BWIRU GIRLS SECONDARY SCHOOL'],
        ['code' => 'S0216', 'name' => 'NGANZA SECONDARY SCHOOL'],
        ['code' => 'S0240', 'name' => 'ST JOSEPH SECONDARY SCHOOL'],
        ['code' => 'S0249', 'name' => 'LORETO GIRLS SECONDARY SCHOOL'],
        ['code' => 'S0323', 'name' => 'LAKE SECONDARY SCHOOL'],
        ['code' => 'S0333', 'name' => 'MWANZA SECONDARY SCHOOL'],
        ['code' => 'S0539', 'name' => 'MAGU SECONDARY SCHOOL'],
        ['code' => 'S0546', 'name' => 'PAMBA SECONDARY SCHOOL'],
        ['code' => 'S0554', 'name' => 'NGUDU SECONDARY SCHOOL'],
        ['code' => 'S0564', 'name' => 'BUSWELU SECONDARY SCHOOL'],
        ['code' => 'S0578', 'name' => 'TAQWA SECONDARY SCHOOL'],
        ['code' => 'S0613', 'name' => 'NYAMPULUKANO SECONDARY SCHOOL'],
        ['code' => 'S0633', 'name' => 'TALLO SECONDARY SCHOOL'],
        ['code' => 'S0709', 'name' => 'BUKONGO SECONDARY SCHOOL'],
        ['code' => 'S0770', 'name' => 'SUMVE SECONDARY SCHOOL'],
        ['code' => 'S0823', 'name' => 'THAQAAFA SECONDARY SCHOOL'],
        ['code' => 'S1051', 'name' => 'MKOLANI SECONDARY SCHOOL'],
        ['code' => 'S1099', 'name' => 'NYEHUNGE SECONDARY SCHOOL'],
        ['code' => 'S1107', 'name' => 'MWAMASHIMBA SECONDARY SCHOOL'],
        ['code' => 'S1164', 'name' => 'MISSUNGWI SECONDARY SCHOOL'],
        ['code' => 'S1498', 'name' => 'LUGEYE SECONDARY SCHOOL'],
        ['code' => 'S1608', 'name' => 'NTUNDURU SECONDARY SCHOOL'],
        ['code' => 'S1609', 'name' => 'RORYA SECONDARY SCHOOL'],
        ['code' => 'S1884', 'name' => 'PIUS MSEKWA SECONDARY SCHOOL'],
        ['code' => 'S2334', 'name' => 'ISLAMIYA SECONDARY SCHOOL'],
        ['code' => 'S2786', 'name' => 'NGHAYA SECONDARY SCHOOL'],
        ['code' => 'S4575', 'name' => 'MESSA SECONDARY SCHOOL'],
        ['code' => 'S4645', 'name' => 'ALLIANCE BOYS SECONDARY SCHOOL'],
        ['code' => 'S4811', 'name' => 'BIDII SECONDARY SCHOOL'],
        ['code' => 'S4836', 'name' => 'ALLIANCE GIRLS SECONDARY SCHOOL'],
        ['code' => 'S4856', 'name' => 'TWIHLUMILIME SECONDARY SCHOOL'],
        ['code' => 'S5268', 'name' => 'HOLY FAMILY SECONDARY SCHOOL'],
        ['code' => 'S5663', 'name' => 'ELPAS SECONDARY SCHOOL'],
        ['code' => 'S6426', 'name' => 'UKEREWE SECONDARY SCHOOL'],
        ['code' => 'S7032', 'name' => 'MWANZA GIRLS SECONDARY SCHOOL'],
    ])->sortBy('name')->values();

    return view('landing.results.schools', [
        'type' => $type,
        'typeLabel' => $typeLabel,
        'year' => $year,
        'exam' => $exam,
        'examLabel' => $examLabel,
        'schools' => $schools,
    ]);
})->name('landing.results.exam');

Route::get('/results/{type}/{year}/{exam}/schools/{school}', function (string $type, string $year, string $exam, string $school) {
    $typeLabel = match ($type) {
        'mock' => 'Mock',
        'joint' => 'Joint',
        'midterm' => 'Midterm',
        'annual' => 'Annual',
        default => strtoupper($type),
    };

    $examLabel = match ($exam) {
        'form-two' => 'Form Two',
        'form-four' => 'Form Four',
        'standard-seven' => 'Standard Seven',
        default => strtoupper(str_replace('-', ' ', $exam)),
    };

    $schoolName = strtoupper(str_replace('-', ' ', $school));

    $results = collect([
        ['subject' => 'Mathematics', 'grade' => 'A', 'score' => 92],
        ['subject' => 'English', 'grade' => 'B', 'score' => 76],
        ['subject' => 'Kiswahili', 'grade' => 'A', 'score' => 88],
        ['subject' => 'Science', 'grade' => 'B', 'score' => 79],
        ['subject' => 'History', 'grade' => 'C', 'score' => 64],
    ]);

    return view('landing.results.school', [
        'type' => $type,
        'typeLabel' => $typeLabel,
        'year' => $year,
        'exam' => $exam,
        'examLabel' => $examLabel,
        'school' => $school,
        'schoolName' => $schoolName,
        'results' => $results,
    ]);
})->name('landing.results.school');

Route::middleware(['throttle.login:5,15'])->group(function () {
    Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
    Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register']);
    Route::get('/account-deletion-request', function () {
        return view('auth.account-deletion-request');
    })->name('account-deletion-request');

    Route::get('/password/reset', [App\Http\Controllers\Auth\PasswordResetController::class, 'showRequestForm'])->name('password.request');
    Route::post('/password/send-code', [App\Http\Controllers\Auth\PasswordResetController::class, 'sendCode'])->name('password.send-code');
    Route::get('/password/verify/{email}', [App\Http\Controllers\Auth\PasswordResetController::class, 'showVerifyForm'])->name('password.verify');
    Route::post('/password/verify-code', [App\Http\Controllers\Auth\PasswordResetController::class, 'verifyCode'])->name('password.verify.code');
    Route::get('/password/reset/{email}', [App\Http\Controllers\Auth\PasswordResetController::class, 'showResetForm'])->name('password.reset');
    Route::post('/password/reset-password', [App\Http\Controllers\Auth\PasswordResetController::class, 'resetPassword'])->name('password.reset.password');
});

Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth:manager', 'throttle:10,1'])->prefix('auth')->name('auth.')->group(function () {
    Route::get('/sessions', [App\Http\Controllers\Auth\SessionsController::class, 'index'])->name('sessions');
    Route::delete('/sessions/{sessionId}', [App\Http\Controllers\Auth\SessionsController::class, 'destroy'])->name('sessions.destroy');
    Route::post('/sessions/revoke-all', [App\Http\Controllers\Auth\SessionsController::class, 'destroyAll'])->name('sessions.revoke-all');
});

// Dashboard/Home page (requires authentication)
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Manager Profile Routes
Route::middleware(['auth:manager'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password');
    Route::post('/profile/photo', [ProfileController::class, 'updatePhoto'])->name('profile.photo.update');
    Route::post('/profile/delete-request', [ProfileController::class, 'requestDeletion'])
        ->middleware('throttle.deletion:3,60')
        ->name('profile.delete-request');
    
    // System Settings Routes
    Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
    Route::put('/settings', [SettingController::class, 'update'])->name('settings.update');

    // School Management Routes
    Route::resource('schools', SchoolController::class);
    Route::get('/schools-import', [SchoolController::class, 'importPage'])->name('schools.import-page');
    Route::post('/schools-preview', [SchoolController::class, 'preview'])->name('schools.preview');
    Route::post('/schools-import', [SchoolController::class, 'import'])->name('schools.import');
    Route::get('/schools-template', [SchoolController::class, 'downloadTemplate'])->name('schools.download-template');
    Route::get('/schools-check-duplicate', [SchoolController::class, 'checkDuplicate'])->name('schools.check-duplicate');
    Route::get('/schools/{school}/details', [SchoolController::class, 'details'])->name('schools.details');
    Route::get('/districts/{regionId}', [SchoolController::class, 'getDistricts'])->name('districts.by-region');

    // Student Management Routes
    Route::get('/students-import', [StudentController::class, 'importPage'])->name('students.import-page');
    Route::post('/students-preview', [StudentController::class, 'preview'])->name('students.preview');
    Route::post('/students-import', [StudentController::class, 'import'])->name('students.import');
    Route::get('/students-template', [StudentController::class, 'downloadTemplate'])->name('students.download-template');
    Route::get('/academic-levels/{type}', [StudentController::class, 'getLevelsByType'])->name('academic-levels.by-type');
    Route::resource('students', StudentController::class);
});
