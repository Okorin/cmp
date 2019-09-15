<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cycle;
use App\Participant;
use App\Gamemode;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class CycleController extends Controller
{

    public function __construct() {
        $this->middleware('auth')->except('show', 'index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cycle.index')->with(['cycles' => Cycle::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Cycle::class);
        return view('cycle.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', Cycle::class);
        $this->doBasicFormCheck($request);

        // insert more validation of input data
        DB::beginTransaction();
        $active = false;
        if ($request->active === 'yes') { 

            Cycle::where('id', '<>', '0')->update(['active' => false]);
            $active = true;

        }
        $cycle = Cycle::create([
            'starts_at'               => e($request->cycleStart),
            'ends_at'                 => e($request->cycleEnd),
            'mentor_signups_start_at' => e($request->mentorSignupsStart),
            'mentor_signups_end_at'   => e($request->mentorSignupsEnd),
            'mentee_signups_start_at' => e($request->menteeSignupsStart),
            'mentee_signups_end_at'   => e($request->menteeSignupsEnd),
            'name'                    => e($request->cycleName),
            'active'                  => $active,
        ]);

        DB::commit();

        if ($cycle) 
        {
            return back();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cycle = Cycle::findOrFail($id);
        $participants = Participant::where('cycle_id', '=', $id)->get();
        $modeparticipants = $participants->groupBy("gamemode_id")->reverse();
        $gamemodes = Gamemode::all();
        // Insert some logic to select all participants on a cycle
        return view('cycle.show')->with(['cycle' => $cycle,
                                         'modeparticipants' => $modeparticipants,
                                         'gamemodes' => $gamemodes]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cycle = Cycle::findOrFail($id);
        $this->authorize('update', $cycle);
        return view('cycle.edit')->with(['cycle' => $cycle]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // retrieve or fail
        $cycle = Cycle::findOrFail($id);

        // auth check before proceeding
        $this->authorize('update', $cycle);

        // basic form validation
        $this->doBasicFormCheck($request);

        // Start a DB Transaction because all cycles might need an update
        DB::beginTransaction();

        if ($request->active === 'yes') { 

            Cycle::where('id', '<>', '0')->update(['active' => false]);
            $cycle->active = true;

        }
        // actually update the entry
        $cycle->name =                      e($request->cycleName);
        $cycle->mentor_signups_start_at =   e($request->mentorSignupsStart);
        $cycle->mentor_signups_end_at =     e($request->mentorSignupsEnd);
        $cycle->mentee_signups_start_at =   e($request->menteeSignupsStart);
        $cycle->mentee_signups_end_at =     e($request->menteeSignupsEnd);
        $cycle->starts_at =                 e($request->cycleStart);
        $cycle->ends_at =                   e($request->cycleEnd);

        // save and go back
        $cycle->save();

        DB::commit();

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('delete', $cycle);
    }

    protected function doBasicFormCheck(Request $request) {
        $request->validate([
            'mentorSignupsStart' => 'required|date_format:Y-m-d',
            'mentorSignupsEnd' => 'required|date_format:Y-m-d',
            'menteeSignupsStart' => 'required|date_format:Y-m-d',
            'menteeSignupsEnd' => 'required|date_format:Y-m-d',
            'cycleStart' => 'required|date_format:Y-m-d',
            'cycleEnd' => 'required|date_format:Y-m-d',
            'cycleName'  => 'max:25',
        ]);
    }

}
