<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TicketFormRequest;
use App\Ticket;
class TicketController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$tickets = Ticket::all();
		return view('index', compact('tickets'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		return view('create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		$slug = uniqid();
		$ticket = new Ticket(array(
			'title'=>$request->get('title'),
			'content'=>$request->get('content'),
			'slug'=>$slug,
		));
		$ticket->save();

		return redirect('/create')->with('status','Your ticket has been created!.Its unique id is '.$slug);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($slug) {
		$ticket = Ticket::whereSlug($slug)->firstOrFail();
		return view('show', compact('ticket'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($slug) {
		$ticket = Ticket::whereSlug($slug)->firstOrFail();
		return view('edit', compact('ticket'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $slug) {
		$ticket = Ticket::whereSlug($slug)->firstOrFail();
		$ticket->title = $request->get('title');
		$ticket->content = $request->get('content');
		if ($request->get('status') != null) {
			$ticket->status = 0;
		} else {
			$ticket->status = 1;
		}
		$ticket->save();
		return redirect(action('TicketController@edit',$ticket->slug))->with('status','The ticket'.$slug.'has been edited.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($slug) {
		$ticket = Ticket::whereSlug($slug)->firstOrFail();
		$ticket->delete();
		return redirect('/tickets')->with('status','The ticket '. $slug . 'is deleted');
	}
}
