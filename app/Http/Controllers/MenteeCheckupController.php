<?php

namespace App\Http\Controllers;

use App\Cycle;
use App\MenteeCheckup;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class MenteeCheckupController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', MenteeCheckup::class);

        $currentCycle = Cycle::active()->first();

        if (isset($currentCycle)) {
            $menteeCheckups = MenteeCheckup::whereHas('participant', function ($query) use($currentCycle) {
                $query->where('cycle_id', $currentCycle->id);
            })->with([
                'participant.mentee:id,name',
                'participant.mentor:id,name', 
                'reviewer:id,name',
            ])->get();

            $menteeCheckups = $menteeCheckups->mapToGroups(function ($checkup) {
                if (!isset($checkup['filled_at'])) {
                    return ['notFilled' => $checkup];
                } elseif (!isset($checkup['reviewer_id'])) {
                    return ['notReviewed' => $checkup];
                } else {
                    return ['reviewed' => $checkup];
                }
            });
        }

        return view('checkup.index', compact('menteeCheckups', 'currentCycle'));
    }

    /**
     * Display a listing of the resources archived.
     *
     * @return \Illuminate\Http\Response
     */
    public function archive()
    {
        $this->authorize('viewAny', MenteeCheckup::class);

        $cycles = Cycle::orderBy('starts_at', 'desc')->get(['id', 'name', 'starts_at']);

        $archiveMenteeCheckups = MenteeCheckup::whereHas('participant', function ($query) use($cycles) {
            $query->where('cycle_id', request()->query('cycle', $cycles->first()->id));
        })->with([
            'participant.mentee:id,name',
            'participant.mentor:id,name', 
            'reviewer:id,name',
        ])->get();

        return view('checkup.archive', compact('archiveMenteeCheckups', 'cycles'));
    }

    /**
     * Store a batch of checkup forms.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', MenteeCheckup::class);

        $request->validate([
            'only_frequents' => 'sometimes|accepted',
        ]);

        $currentCycle = Cycle::active()->firstOrFail();

        if (isset($request->only_frequents)) {
            $ids = $currentCycle->participants()->where('checkup_frequency_rate', 'frequent')->pluck('id');
        } else {
            $ids = $currentCycle->participants()->pluck('id');
        }

        $checkups = $ids->map(function ($id) {
            return [
                'participant_id' => $id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        })->toArray();

        MenteeCheckup::insert($checkups);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MenteeCheckup  $menteeCheckup
     * @return \Illuminate\Http\Response
     */
    public function show(MenteeCheckup $menteeCheckup)
    {
        $this->authorize('view', $menteeCheckup);

        $menteeCheckup->load([
            'participant.mentee:id,name',
            'participant.mentor:id,name',
            'reviewer:id,name',
        ]);

        return view('checkup.show', compact('menteeCheckup'));
    }

    /**
     * Show the form to add related comments from either the mentee or organizer.
     *
     * @param  \App\MenteeCheckup  $menteeCheckup
     * @return \Illuminate\Http\Response
     */
    public function edit(MenteeCheckup $menteeCheckup)
    {
        $this->authorize('update', $menteeCheckup);

        return view('checkup.edit', compact('menteeCheckup'));
    }

    /**
     * Show the form to add a review.
     *
     * @param  \App\MenteeCheckup  $menteeCheckup
     * @return \Illuminate\Http\Response
     */
    public function editReview(MenteeCheckup $menteeCheckup)
    {
        $this->authorize('manage', $menteeCheckup);

        return view('checkup.editReview', compact('menteeCheckup'));
    }

    /**
     * Update the related comments to the checkup.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MenteeCheckup  $menteeCheckup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MenteeCheckup $menteeCheckup)
    {
        $this->authorize('update', $menteeCheckup);
        
        $request->validate([
            'status_comment' => 'required|max:1500',
            'frequency_comment' => 'required|max:1500',
            'progress_comment' => 'required|max:1500',
            'extra_comment' => 'nullable|max:1500',
        ]);
        
        $menteeCheckup->status_comment = e($request->status_comment);
        $menteeCheckup->frequency_comment = e($request->frequency_comment);
        $menteeCheckup->progress_comment = e($request->progress_comment);
        $menteeCheckup->extra_comment = e($request->extra_comment);
        $menteeCheckup->filled_at = Carbon::now();

        if (Auth::user()->isOrganizer()) {
            $menteeCheckup->checkup_type = 'manual';
        } else {
            $menteeCheckup->checkup_type = 'response';
        }

        $menteeCheckup->save();

        return redirect()->route('checkup.index');
    }

    /**
     * Update the checkup after a review.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MenteeCheckup  $menteeCheckup
     * @return \Illuminate\Http\Response
     */
    public function review(Request $request, MenteeCheckup $menteeCheckup)
    {
        $this->authorize('manage', $menteeCheckup);

        $request->validate([
            'checkup_frequency_rate' => 'required|in:regular,frequent',
            'potential_problems' => 'nullable|max:1500',
        ]);

        $menteeCheckup->reviewer_id = Auth::id();
        $menteeCheckup->participant()->update(['checkup_frequency_rate' => $request->checkup_frequency_rate]);
        $menteeCheckup->potential_problems = e($request->potential_problems);

        $menteeCheckup->save();

        return redirect()->route('checkup.index');
    }
    

    /**
     * Set poke date.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MenteeCheckup  $menteeCheckup
     * @return \Illuminate\Http\Response
     */
    public function poke(Request $request, MenteeCheckup $menteeCheckup)
    {
        $this->authorize('manage', $menteeCheckup);

        $menteeCheckup->poked_at = Carbon::now();
        $menteeCheckup->save();

        return back();
    }
}
