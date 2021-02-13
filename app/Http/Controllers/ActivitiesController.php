<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Update;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ActivitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
       return $this->middleware('auth');
    }
    public function index()
    {
        $activities= Activity::latest()->get();

        return view('home', compact('activities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'activity' => 'required',
        ]);
        Activity::create([
            'activity' => $validated['activity'],
        ]);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showUpdates()
    {
        // $activities = [];
        $updatesForToday = Update::whereDateBetween('created_at',(new Carbon)->subDay()->toDateString(),(new Carbon)->now()->toDateString() )->get();
        // foreach ($updatesForToday as  $value) {
        //     $activities[] =$value->activity
        // }
        // dd($updatesForToday);
        return view('updates',compact('updatesForToday'));
    }
     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        // dd($id);
        
        
        $activity = Activity::findOrFail($id);
        if ($activity->status == 1){
            $activity->status = 0;
            Update::create([
                'activity_id'=> $id,
                'user_id' => auth()->id(),
                'type'=>'pending',
            ]);
            $activity->save();
        }else{
            $activity->status = 1;
            Update::create([
                'activity_id'=> $id,
                'user_id' => auth()->id(),
                'type'=>'done',
            ]);
            $activity->save();

        }
       
        
        
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
        //
    }
}
