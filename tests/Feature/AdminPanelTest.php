<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminPanelTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_page_uses_the_school_brand_and_rtl(): void
    {
        $response = $this->get('/admin/login');

        $response->assertOk();
        $response->assertSee('پنل مدیریتی مکتب خصوصی استاد عطایی', false);
        $response->assertSee('dir="rtl"', false);
        $response->assertSee('Vazirmatn', false);
    }

    public function test_dashboard_shows_school_stats_for_an_admin(): void
    {
        $admin = User::factory()->create([
            'user_type' => 'super_admin',
        ]);

        $response = $this->actingAs($admin)->get('/admin');

        $response->assertOk();
        $response->assertSee('داشبورد', false);
        $response->assertSee('شاگردان فعال', false);
        $response->assertSee('باقی‌مانده فیس', false);
        $response->assertSee('شعبات', false);
        $response->assertSee('فیس شاگردان', false);
        $response->assertSee('عمومی و کنترول', false);
    }

    public function test_main_navigation_pages_open(): void
    {
        $admin = User::factory()->create([
            'user_type' => 'super_admin',
        ]);

        foreach ([
            '/admin/branches',
            '/admin/academic-years',
            '/admin/students',
            '/admin/guardians',
            '/admin/school-classes',
            '/admin/sections',
            '/admin/subjects',
            '/admin/teachers',
            '/admin/teacher-subject-assigns',
            '/admin/attendances',
            '/admin/exams',
            '/admin/marks',
            '/admin/student-fees',
            '/admin/fee-payments',
            '/admin/salaries',
            '/admin/expenses',
            '/admin/users',
            '/admin/reports',
            '/admin/exams/create',
            '/admin/attendances/create',
            '/admin/marks/create',
            '/admin/expenses/create',
        ] as $url) {
            $this->actingAs($admin)->get($url)->assertOk();
        }
    }
}
