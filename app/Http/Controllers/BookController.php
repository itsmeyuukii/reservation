<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Book;
use App\Models\Room;
use Carbon\Carbon;

class BookController extends Controller
{
    protected $book;
    protected $room;
    public function __construct()
    {
        $this->book = new Book();
        $this->room = new Room();
    }
    public function index()
    {
        if (!auth::check())
        {
            return redirect()->route('login');
        }
        $reserves = $this->book->all();

        return view('layouts.pages.booking.table', compact('reserves'));
    }

    public function book()
    {
        if (!auth::check())
        {
            return redirect()->route('login');
        }
        $room_names = $this->room->all();

        return view('layouts.pages.booking.book', compact('room_names'));
    }

    public function reserve(Request $request)
    {
        //Validation
        $validated = $request->validate([
            'room' => 'required|string|max:255',
            'clientName' => 'required|string|max:255',
            'pax' => 'required|integer',
            'checkIn' => 'required|date',
            'checkOut' => 'required|date'
        ]);

        if ($this->book->hasOverlap($request->room, $request->checkIn, $request->checkOut)) {
            return redirect()->back()->withErrors(['msg' => 'The room is already booked for the selected dates.']);
        }

        $book = new Book();
        $book->room_name = $request->room;
        $book->client_name = $request->clientName;
        $book->pax = $request->pax;
        $book->check_in = $request->checkIn;
        $book->check_out = $request->checkOut;
        $book->save();

        return redirect()->route('reservations')->with('success', 'Book was added successfully');
    }
}
