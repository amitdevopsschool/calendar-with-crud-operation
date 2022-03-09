<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;
use DB;
use Illuminate\Support\Facades\Redirect;


class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
                $events = [];
                $data = Event::all();
                if($data->count())
                 {
                    foreach ($data as $key => $value)
                    {
                        $events[] = Calendar::event(
                            $value->title,
                            true,
                            new \DateTime($value->start_date),
                            new \DateTime($value->end_date.'+1 day'),
                            null,
                            // Add color
                         [
                            'color'=> $value->color,
                             'textColor' => $value->textColor,
                         ]
                        );
                    }
                }
 $calendar =\Calendar::addEvents($events);
 return view('eventpage',compact('events','calendar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function display()
     {
     return view("addevent");
     }
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'color'=>'required',
            'start_date'=>'required',
            'end_date'=>'required',
          ]);
         $events=new Event;
         $events->title=$request->input('title');
         $events->color=$request->input('color');
         $events->start_date=$request->input('start_date');
         $events->end_date=$request->input('end_date');
         $events->save();
         return redirect('/eventpage')->with('success','Event Added');
    }


    public function comingeditpage()
    {
        $events = Event::all();
        return view('display')->with('events',$events);
    }


    public function edit($id)
    {
        $events = Event::find($id);
        return view('editform',compact('events','id'));
    }

    public function update(Request $request)
    {

        $events = Event::find($request->id);
        $events->update($request->all());
        return redirect('eventpage')->with('success','Event Updates Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $events = Event::find($request->id);
        $events->delete();
        return redirect('eventpage')->with('success','Event Deleted Successfully');

    }
}
