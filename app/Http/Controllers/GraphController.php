<?php

namespace App\Http\Controllers;

use App\Training;
use App\User;
use Carbon\Carbon;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class GraphController extends Controller
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

        return view('graph.index')->with([
            'trainings' => $user->trainings
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Factory|View
     */
    public function show($id)
    {
        $training = Training::findOrFail($id);

        return view('graph.graph')->with([
            workouts => $training->workouts
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @return Factory|View
     */
    public function createGraph(Request $request)
    {
        $request->validate([
            'training' => 'required',
            'days' => 'required'
        ]);

        $training = Training::where([
            'id' => $request->input('training'),
            'user_id' => auth()->user()->id
        ])->firstOrFail();

        $workouts = $training->workouts->where('created_at', '>', Carbon::now()->subDays($request->input('days')));
        $workouts = $workouts->sortBy('created_at');
        $workoutVolumes = [];
        $workoutDates = [];

//       get workout volumes
        foreach ($workouts as $workout){
            $workoutVolumes[$workout->id] = $workout->volume;
        }

//      get workout dates
        foreach ($workouts as $workout){
            $workoutDates[$workout->id] = Carbon::createFromTimeStamp(strtotime($workout->created_at))->diffForHumans();
        }

        return view('graph.graph')->with([
            'training' => $training,
            'days' => $request->input('days'),
            'workoutVolumes' => array_values($workoutVolumes),
            'workoutDates' => array_values($workoutDates)
        ]);
    }
}
