<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AdminController
{
    protected string $today;
    protected string $weekAgo;
    protected string $monthAgo;

    public function __construct()
    {
        $this->today = Carbon::today()->toDateString();
        $this->weekAgo = Carbon::now()->subWeek()->toDateTimeString();
        $this->monthAgo = Carbon::now()->subMonth()->toDateTimeString();
    }

    public function index()
    {
        $userStatistics = DB::table('users')->selectRaw('
            COUNT(*) as total_users,
            SUM(CASE WHEN DATE(created_at) = ? THEN 1 ELSE 0 END) as today_registered_users,
            SUM(CASE WHEN created_at >= ? THEN 1 ELSE 0 END) as weekly_registered_users,
            SUM(CASE WHEN created_at >= ? THEN 1 ELSE 0 END) as monthly_registered_users
        ', [$this->today, $this->weekAgo, $this->monthAgo])
            ->first();

        dd($userStatistics);
    }
}
