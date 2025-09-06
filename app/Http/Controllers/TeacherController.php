<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\StudentDetail;

class TeacherController extends Controller
{
    public function index()
    {
        $totalHigh     = StudentDetail::where('stress_level', '=', 'high')->count();
        $totalModerate = StudentDetail::where('stress_level', '=', 'moderate')->count();
        $totalLow      = StudentDetail::where('stress_level', '=', 'low')->count();
        return view('teacher.index', [
            'totalHigh'     => $totalHigh,
            'totalModerate' => $totalModerate,
            'totalLow'      => $totalLow,
        ]);
    }

    public function viewDetail()
    {
        $students = StudentDetail::with('student')
            ->orderByDesc('created_at')
            ->orderByRaw("FIELD(stress_level, 'high', 'moderate', 'low')")
            ->paginate(10);
        return view('teacher.detail-analysis', ['students' => $students]);
    }

    public function profile()
    {
        return view('teacher.profile');
    }
}
