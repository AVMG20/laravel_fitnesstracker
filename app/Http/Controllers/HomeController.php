<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class HomeController extends Controller
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
        return view('index')->with([
            'user' => User::findOrFail(auth()->user()->id)
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
     * @param int $id
     * @return RedirectResponse|Redirector
     * @throws ValidationException
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $this->validate($request , [
            'image' => 'sometimes|max:10000|mimes:png,jpeg',
            'name' => 'required|max:191',
            'email' => 'required|max:191'
        ]);

        $values = [
            'name' => $request->input('name'),
            'email' => $request->input('email')
        ];

        if (!empty($request->file('image'))) {
            $image = 'data:image/png;base64,' . base64_encode(file_get_contents($request->file('image')));
            $values['image'] = $image;
        }

        $user->update($values);

        return redirect('/home')->with('success', 'Profile updated');

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
}
