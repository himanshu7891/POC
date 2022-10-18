<?php

namespace App\Http\Controllers\Admin\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Role;
use App\Models\User;
use App\Models\Team;
use App\Models\Branch;
use App\Models\UserTeamBranch;
use Gate;
use Admin;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UsersController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::where('id','!=','1')
                    ->with([
                        'roles',
                        'userTeamBranch',
                        'userTeamBranch.user',
                        'userTeamBranch.team',
                        'userTeamBranch.branch'
                        ])
                    ->get();

        return view('admin.v1.users.index', compact('users'));
    }

    public function create()
    {
        abort_if(Gate::denies('user_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::pluck('title', 'id');
        $teams = Team::get();
        $branches = Branch::get();

        return view('admin.v1.users.create', compact('roles', 'teams', 'branches'));
    }

    public function store(StoreUserRequest $request)
    {
        $userIns['user_code'] = Admin::userCode();
        $userIns['name'] = $request->name ?? NULL;
        $userIns['email'] = $request->email ?? NULL;
        $userIns['password'] = $request->password ?? NULL;
        
        $res = User::insertGetId($userIns);
        $user = User::findOrFail($res);
        $user->roles()->sync($request->input('roles', []));

        if($res) {
            $ins['user_id'] = $res;
            $ins['team_id'] = $request->team_id;
            $ins['branch_id'] = $request->branch_id;
            
            UserTeamBranch::create($ins);
        }

        return redirect()->route('admin.users.index');
    }

    public function edit(User $user)
    {
        abort_if(Gate::denies('user_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::pluck('title', 'id');
        $teams = Team::get();
        $branches = Branch::get();

        $user->load('roles','userTeamBranch','userTeamBranch.user','userTeamBranch.team','userTeamBranch.branch');

        return view('admin.v1.users.edit', compact('roles', 'user', 'teams', 'branches'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $userUpdate['name'] = $request->name ?? NULL;
        $userUpdate['email'] = $request->email ?? NULL;
        $userUpdate['password'] = $request->password ?? NULL;
        
        $res = User::whereId($user->id)->update($userUpdate);
        $user->roles()->sync($request->input('roles', []));

        if($res) {
            $update['team_id'] = $request->team_id;
            $update['branch_id'] = $request->branch_id;
            
            UserTeamBranch::where('user_id',$user->id)->update($update);
        }

        return redirect()->route('admin.users.index');
    }

    public function show(User $user)
    {
        abort_if(Gate::denies('user_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->load('roles');

        return view('admin.v1.users.show', compact('user'));
    }

    public function destroy(User $user)
    {
        abort_if(Gate::denies('user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->delete();

        return back();
    }

    public function massDestroy(MassDestroyUserRequest $request)
    {
        User::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
