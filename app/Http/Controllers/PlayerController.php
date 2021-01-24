<?php

namespace App\Http\Controllers;

use App\Models\player;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $players = player::orderBy('id', 'DESC')->get();
        return view('pages.Player.main', compact('players'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $countries = Country::get();
        return view('pages.Player.add-player',compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'country_name' => 'required',
            'player_name'  => 'required',
            'player_image' => 'required|image',
            'player_role'  => 'required',
            'club_name'    => 'required',
            'club_image'   => 'required|image',
            'player_favorite_shot' => 'required',
            'player_favorite_table' => 'required',
            'sponser_image_one'  => 'required|image',
            'sponser_image_two'  => 'required|image',
        ]);
        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)
                        ->withInput();
        }
        else{

            $destinationPath = 'player-pics/';

            $player_image = $request->file('player_image');
            $player_image_name = time().$player_image->getClientOriginalName();
            $check = $player_image->move($destinationPath,$player_image_name);

            $club_image = $request->file('club_image');
            $club_image_name = time().$club_image->getClientOriginalName();
            $check = $club_image->move($destinationPath,$club_image_name);

            $sponser_image_one = $request->file('sponser_image_one');
            $sponser_image_one_name = time().$sponser_image_one->getClientOriginalName();
            $check = $sponser_image_one->move($destinationPath,$sponser_image_one_name);

            $sponser_image_two = $request->file('sponser_image_two');
            $sponser_image_two_name = time().$sponser_image_two->getClientOriginalName();
            $check = $sponser_image_two->move($destinationPath,$sponser_image_two_name);

            $data = new Player;
            $data->country_id = $request->country_name;
            $data->player_name = $request->player_name;
            $data->player_picture = env('APP_URL'). $destinationPath.$player_image_name;
            $data->player_role = $request->player_role;
            $data->club_name   = $request->club_name;
            $data->club_image   = env('APP_URL'). $destinationPath.$club_image_name;
            $data->player_favorite_shot = $request->player_favorite_shot;
            $data->player_favourite_table = $request->player_favorite_table;
            $data->sponser_image_one = env('APP_URL'). $destinationPath.$sponser_image_one_name;
            $data->sponser_image_two = env('APP_URL'). $destinationPath.$sponser_image_two_name;
            $data->save();
            $request->session()->flash('message', 'Player add successfully.');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\player  $player
     * @return \Illuminate\Http\Response
     */
    public function show(player $player)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\player  $player
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, player $player)
    {
        $data = player::where('id', $request->id)->first();
        return view('pages.Player.edit',compact('data'))->with('countries', Country::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\player  $player
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, player $player)
    {
        $validator = Validator::make($request->all(), [
            'country_name' => 'required',
            'player_name'  => 'required',
            'player_image' => 'nullable|image',
            'player_role'  => 'required',
            'club_name'    => 'required',
            'club_image'   => 'nullable|image',
            'player_favorite_shot' => 'required',
            'player_favorite_table' => 'required',
            'sponser_image_one'  => 'nullable|image',
            'sponser_image_two'  => 'nullable|image',
        ]);
        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }else{
            if($request->file('player_image'))
            {
                $destinationPath = 'player-pics/';

                $player_image = $request->file('player_image');
                $player_image_name = time().$player_image->getClientOriginalName();
                $check = $player_image->move($destinationPath,$player_image_name);

                $update = player::where('id', $request->player_id)->update([
                    'player_picture'    => env('APP_URL'). $destinationPath . $player_image_name
                ]);
            }
            if($request->file('club_image'))
            {
                $destinationPath = 'player-pics/';

                $club_image = $request->file('club_image');
                $club_image_name = time().$club_image->getClientOriginalName();
                $check = $club_image->move($destinationPath,$club_image_name);

                $update = player::where('id', $request->player_id)->update([
                    'club_image'    => env('APP_URL'). $destinationPath . $club_image_name
                ]);
                // $request->session()->flash('message', 'Event data save successfully.');
                // return redirect()->back();
            }
            if($request->file('sponser_image_one'))
            {
                $destinationPath = 'player-pics/';

                $sponser_image_one = $request->file('sponser_image_one');
                $sponser_image_one_name = time().$sponser_image_one->getClientOriginalName();
                $check = $sponser_image_one->move($destinationPath,$sponser_image_one_name);

                $update = player::where('id', $request->player_id)->update([
                    'sponser_image_one'    => env('APP_URL'). $destinationPath . $sponser_image_one_name
                ]);
                // $request->session()->flash('message', 'Event data save successfully.');
                // return redirect()->back();
            }
            if($request->file('sponser_image_two'))
            {
                $destinationPath = 'player-pics/';

                $sponser_image_two = $request->file('sponser_image_two');
                $sponser_image_two_name = time().$sponser_image_two->getClientOriginalName();
                $check = $sponser_image_two->move($destinationPath,$sponser_image_two_name);

                $update = player::where('id', $request->player_id)->update([
                    'sponser_image_two'    => env('APP_URL'). $destinationPath . $sponser_image_two_name
                ]);
                // $request->session()->flash('message', 'Event data save successfully.');
                // return redirect()->back();
            }

            player::where('id', $request->player_id)->update([
                'country_id' => $request->country_name,
                'player_name' => $request->player_name,
                'player_role' => $request->player_role,
                'club_name'   => $request->club_name,
                'player_favorite_shot' => $request->player_favorite_shot,
                'player_favourite_table' => $request->player_favorite_table,
            ]);

            $request->session()->flash('message', 'Player data save successfully.');
            return redirect()->back();
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\player  $player
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, player $player)
    {
        $check = player::where('id', $request->id)->delete();
        if($check)
        {
            $request->session()->flash('message', 'Player data remove successfully.');
            return redirect()->back();
        }
    }
}
