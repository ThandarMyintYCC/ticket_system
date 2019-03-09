@extends('layout.master')
@section('title', 'View a Ticket')
@section('content')
    <div class="container col-md-8 col-md-offset-2">
        <div class="well well bs-component">
            <div class="content">
                <h2 class="header">{!! $ticket->title !!}</h2>
                <p><strong>Status:</strong>{!! $ticket->status ? 'Pending' : 'Answered' !!}</p>
                <p>
                    {!! $ticket->content!!}
                </p>
            </div>
            <a href="{!! action('TicketController@edit', $ticket->slug)!!}" class="btn btn-info pull-left">Edit</a>
            <form action="{!! action('TicketController@destroy', $ticket->slug) !!}" method="post">
                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                <div>
                    <button class="btn btn-warning">Delete</button>
                </div>
            </form>
        </div>
    </div>
@endsection