@extends('layout.master')
@section('title','Tickets List')
@section('content')
    <div class="container col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2>Tickets</h2>
                <a href="{!! action('TicketController@create')!!}" class="btn btn-info">Add New Ticket</a>
                @if (session('status'))
                    <div class="alert alert-success">
                        {{session('status')}}
                    </div>
                @endif
            </div>
            @if($tickets->isEmpty())
                <p>There is no ticket.</p>
            @else
                <table class="table">
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>Title</td>
                            <td>Status</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tickets as $ticket)
                            <tr>
                                <td>{!! $ticket->id !!}</td>
                                <td><a href="{!! action('TicketController@show', $ticket->slug) !!}">{!! $ticket->title !!}</a></td>
                                <td>{!! $ticket->status ? 'Pending' : 'Answered' !!}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection