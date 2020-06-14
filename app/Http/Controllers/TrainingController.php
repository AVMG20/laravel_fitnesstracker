<?php

namespace App\Http\Controllers;

use App\Training;
use App\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class TrainingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        $user = User::findOrFail(auth()->user()->id);
        return view('training.index')->with([
            'trainings' => $user->trainings
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        return view('training.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse|Redirector
     * @throws \Exception
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:191',
        ]);

        Training::create([
            'name' => $request->input('name'),
            'user_id' => auth()->user()->id,
        ]);

        return redirect('/training')->with('success', 'Exercise created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Factory|View
     */
    public function edit($id)
    {
        return view('training.edit')->with([
            'training' => Training::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return RedirectResponse|Redirector
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:191',
        ]);

        Training::findOrFail($id)->update([
            'name' => $request->input('name'),
        ]);

        return redirect('/training')->with('success', 'Exercise created successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return RedirectResponse|Redirector
     */
    public function destroy($id)
    {
        Training::findOrFail($id)->delete();
        return redirect('/training')->with('success' , 'Exercise deleted successfully');
    }
}
