<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use App\Models\Client;
use App\Models\Employee;
use Spatie\Permission\Models\Role;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Arr;
use App\Models\Task;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request): View
    {
        $tasks = Task::with(['client', 'employee'])->get();
        $clients = Client::all();
        $employees = Employee::all(); 
        $users = User::latest()->paginate(5);
        $page = $request->input('page', 1); 
        $i = ($page - 1) * 5;
    
        return view('users.index', compact('users', 'clients', 'employees', 'tasks')) 
                ->with('i', $i);
    }
    
    
    public function create(): View
    {
        $roles = Role::pluck('name', 'id'); // Fetching roles correctly
        \Log::info('Roles fetched:', $roles->toArray());
        return view('users.create', compact('roles')); // Passing roles to the view
    }
    

    public function store(UserStoreRequest $request): RedirectResponse
    {
        $input = $request->validated();
        $input['password'] = bcrypt($input['password']);

        $user = User::create($input);
        $user->assignRole($request->input('roles')); // Ensure 'roles' is an array

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    public function update(UserUpdateRequest $request, User $user): RedirectResponse
    {
        $input = $request->validated();
        if (!empty($input['password'])) {
            $input['password'] = bcrypt($input['password']);
        } else {
            $input = Arr::except($input, ['password']);
        }

        $user->update($input);
        $user->syncRoles($request->input('roles'));

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    public function show(User $user): View
    {
        return view('users.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::pluck('name', 'name')->all();  // Fetching and converting to an array

        return view('users.edit', compact('user', 'roles'));
    }

    public function destroy(User $user): RedirectResponse
    {
        $user->delete();
        return redirect()->route('users.index')
                         ->with('success', 'User deleted successfully.');
    }
}
