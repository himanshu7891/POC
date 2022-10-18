<?php

namespace App\Http\Controllers\Admin\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBranchRequest;
use App\Http\Requests\UpdateBranchRequest;
use App\Models\Team;
use App\Models\Branch;
use Gate;
use Admin;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BranchController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('team_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $branches = Branch::with(['team'])->get();
        
        return view('admin.v1.branch.index', compact('branches'));
    }

    public function create()
    {
        abort_if(Gate::denies('branch_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $teams = Team::get();

        return view('admin.v1.branch.create', compact('teams'));
    }

    public function store(StoreBranchRequest $request)
    {   
        $request['branch_code'] = Admin::branchCode();
        $branch = Branch::create($request->all());

        return redirect()->route('admin.branch.index');
    }

    public function edit(Branch $branch)
    {
        abort_if(Gate::denies('branch_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $teams = Team::get();
        $branch->load('team');

        return view('admin.v1.branch.edit', compact('teams', 'branch'));
    }

    public function update(UpdateBranchRequest $request, Branch $branch)
    {
        $branch->update($request->all());

        return redirect()->route('admin.branch.index');
    }

    public function show(Branch $branch)
    {
        abort_if(Gate::denies('branch_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $branch->load('team');

        return view('admin.v1.branch.show', compact('branch'));
    }

    public function destroy(Branch $branch)
    {
        abort_if(Gate::denies('branch_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $branch->delete();

        return back();
    }
}
