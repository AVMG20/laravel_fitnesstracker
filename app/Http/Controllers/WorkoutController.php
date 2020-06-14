<?php

namespace App\Http\Controllers;

use App\Training;
use App\User;
use App\Workout;
use Carbon\Carbon;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class WorkoutController extends Controller
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
        return view('workout.index')->with([
            'workouts' => $user->workouts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        $user = User::findOrFail(auth()->user()->id);
        return view('workout.create')->with([
            'trainings' => $user->trainings
        ]);
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
            'volume' => 'required|max:191|',
            'training' => 'required',
            'date' => 'required|date'
        ]);

        Workout::create([
            'volume' => $request->input('volume'),
            'training_id' => $request->input('training'),
            'workout_date' => $request->input('date'),
            'user_id' => auth()->user()->id,
        ]);

        return redirect('/workout')->with('success', 'Workout saved successfully');
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
        $user = User::findOrFail(auth()->user()->id);

        return view('workout.edit')->with([
            'workout' => Workout::findOrFail($id),
            'trainings' => $user->trainings
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
            'volume' => 'required|max:191|',
            'training' => 'required',
            'date' => 'required|date'
        ]);

        Workout::findOrFail($id)->update([
            'volume' => $request->input('volume'),
            'training_id' => $request->input('training'),
            'workout_date' => $request->input('date')
        ]);

        return redirect('/workout')->with('success', 'Workout updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return RedirectResponse|Redirector
     */
    public function destroy($id)
    {
        Workout::findOrFail($id)->delete();
        return redirect('/workout')->with('success' , 'Workout deleted successfully');
    }
}
