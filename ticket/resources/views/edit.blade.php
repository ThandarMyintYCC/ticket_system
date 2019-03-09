@extends('layout.master')
@section('title', 'Ticket create')
@section('content')
	<div class="container col-md-8 col-md-offset-2">
		<div class="well well bs-component">
			<form method="post" class="form-horizontal">
				@foreach ($errors->all() as $error)
			        <p class="alert alert-danger">{{$error}}</p>
				@endforeach
				@if(session('status'))
					<div class="alert alert-success">
						{{session('status')}}
					</div>
				@endif
				<input type="hidden" name="_token" value="{!! csrf_token() !!}">
				<fieldset>
					<legend>Edit a Ticket</legend>
					<div class="form-group">
						<label for="title" class="col-lg-2 control-label">Title</label>
						<div class="col-lg-10">
                        <input type="text" name="title" id="title" placeholder="Title" class="form-control" value="{!! $ticket->title !!}">
						</div>
                    </div>
                    <div class="form-group">
                            <label for="content" class="col-lg-2 control-label">Content</label>
                            <div class="col-lg-10">
                                <textarea name="content" id="content" cols="30" rows="10" class="form-control" placeholder="Content">{!! $ticket->content !!}</textarea>
                                <span class="help-block">Feel free to ask us any questions</span>
                            </div>
                        </div>
					<div class="form-group">
						<label>
                            <input type="checkbox" name="status" id="status" class="form-control" {!! $ticket->status ? "" : "checked" !!}>
                            Close this ticket?
                        </label>
                    </div>
					<div class="form-group">
						<div class="col-lg-10 col-lg-offset-2">
							<a href="{!! action('TicketController@index')!!}" class="btn btn-default">Cancle</a>
							<button class="btn btn-primary" type="submit">Submit</button>
						</div>
					</div>
				</fieldset>
			</form>
		</div>
	</div>
@endsection