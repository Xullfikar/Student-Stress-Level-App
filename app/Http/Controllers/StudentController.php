<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\StudentDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class StudentController extends Controller
{
    public function index()
    {
        return view('student.index');
    }

    public function create()
    {
        $datas = StudentDetail::where('id_user', Auth::id())->orderBy('created_at', 'desc')->paginate(10);
        return view('student.create', ['datas' => $datas]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'class'                   => 'required|string',
            'gpa'                     => 'required|numeric|min:0|max:4',
            'study_hours_per_day'     => 'required|numeric|min:0|max:24',
            'sleep_hours_per_day'     => 'required|numeric|min:0|max:24',
            'extracurricular_hours'   => 'required|numeric|min:0|max:24',
            'physical_activity_hours' => 'required|numeric|min:0|max:24',
            'social_activity_hours'   => 'required|numeric|min:0|max:24',
        ]);

        $apiData = [
            "data" => [
                $request->study_hours_per_day,
                $request->extracurricular_hours,
                $request->sleep_hours_per_day,
                $request->social_activity_hours,
                $request->physical_activity_hours,
                $request->gpa,
            ],
        ];

        // Kirim ke API Flask
        $response = Http::post('http://127.0.0.1:5000/predict', $apiData);

        if ($response->failed()) {
            return back()->withErrors(['api' => 'Gagal mengambil prediksi dari API']);
        }

        // Ambil hasil prediksi
        $prediction = $response->json()['predict'] ?? null;

        // Gabungkan data request + prediction
        $studentData                 = $request->all();
        $studentData['stress_level'] = $prediction;

        StudentDetail::create($studentData);
        return redirect()->route('student.create')->with('success', 'Schedule added successfully');
    }

    public function profile()
    {
        return view('student.profile');
    }
}
