<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Room;

class RoomController extends Controller
{
    protected $room;
    public function __construct()
    {
        $this->room = new Room();
    }
    public function index()
    {
        if(!auth::check())
        {
            return redirect()->route('login');
        }
        $rooms = $this->room->all();

        return view('layouts.pages.room.rooms', compact('rooms'));
    }
    public function create()
    {
        if(!auth::check())
        {
            return redirect()->route('login');
        }

        return view('layouts.pages.room.addroom');
    }

    public function store(Request $request)
    {
        //Validate the request data
        $validated = $request->validate([
            'room_name' => 'required|string|max:255',
            'pax' => 'required|integer',
            'price' => 'required|integer'
        ]);

        // Create a new Room instance and save the validated data
        $room = new Room();
        $room->room_name = $request->room_name;
        $room->pax = $request->pax;
        $room->price = $request->price;
        $room->save();

        return redirect()->route('room')->with('success', 'Room was added successfully');
    }

}
