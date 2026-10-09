<?php

namespace Database\Seeders;

use App\Enums\UserType;
use App\Models\AcademicYear;
use App\Models\Branch;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Branch::query()->updateOrCreate(
            ['code' => 'ATAI'],
            [
                'name' => 'مکتب خصوصی استاد عطایی',
                'address' => null,
                'phone' => null,
                'is_active' => true,
            ],
        );

        AcademicYear::query()->updateOrCreate(
            ['year_name' => '1405'],
            [
                'start_date' => '2026-03-21',
                'end_date' => '2027-03-20',
                'is_active' => true,
            ],
        );

        User::query()->updateOrCreate(
            ['email' => 'admin@ataei.school'],
            [
                'name' => 'مدیر سیستم',
                'password' => 'password',
                'branch_id' => null,
                'user_type' => UserType::SuperAdmin,
                'phone' => null,
                'is_active' => true,
            ],
        );
    }
}
