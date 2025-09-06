<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\StudentDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UsersController extends Controller
{
    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'fullName' => 'required|string|min:2|max:255',
            'email'    => 'required|email|unique:users',
            'role'     => [
                'required',
                Rule::in(['admin', 'teacher', 'student']),
            ],
            'status'   => 'boolean',
            'password' => [
                'required',
                'string',
                'confirmed',
                Password::min(8)->letters()->numbers(),
            ],
        ]);

        User::create($request->all());
        return redirect()->route('admin.dashboard')->with('success', 'User added successfully');
    }

    public function dashboard()
    {
        $users              = User::all();
        $totalUsers         = User::count();
        $totalActiveUsers   = User::where('status', 1)->count();
        $totalInActiveUsers = User::where('status', 0)->count();

        return view('admin.dashboard', [
            'users'                => $users,
            'total_users'          => $totalUsers,
            'total_active_users'   => $totalActiveUsers,
            'total_inactive_users' => $totalInActiveUsers,
        ]);
    }

    public function manage()
    {
        $users = User::paginate(5);
        return view('admin.manage', [
            'users' => $users,
        ]);
    }

    public function update(User $user)
    {
        return view('admin.update', compact('user'));
    }

    public function updateUser(Request $request, User $user)
    {
        $request->validate([
            'fullName' => 'required|string|min:2|max:255',
            'email'    => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($user->id),
            ],
            'role'     => [
                'required',
                Rule::in(['admin', 'teacher', 'student']),
            ],
            'status'   => 'boolean',
        ]);

        $user->update($request->all());
        return redirect()->route('admin.manage')->with('success', 'User updated successfully');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.manage')->with('success', 'User deleted successfully');
    }

    public function studentData()
    {
        $students = StudentDetail::with('student')->paginate(10);
        return view('admin.student-data', ['students' => $students]);
    }
}
