<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;

class DatatablesController extends Controller
{
    /**
     * Displays datatables front end view
     *
     * @return \Illuminate\View\View
     */
    public function getIndex()
    {
        return view('datatables.index');
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function anyData(Request $request)
    {
        $start = Carbon::createFromFormat('d/m/Y', $request->start_date);
        $end = Carbon::createFromFormat('d/m/Y', $request->end_date);

        $data = User::between($start, $end);
        return Datatables::of($data)->make(true);
    }

    public function allUsers()
    {
        return User::all();
    }
}
