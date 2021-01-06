@extends('layout.adminDashboard')

@section('content')
    {!! F::open(['action' =>['PostController@update',$post->id], 'method' => 'PUT'])!!}
    
        <div class="col-md-6">

            
			 <div class="form-group required">
				{!! F::label("Title") !!}
				{!! F::text("title", $post->title ,["class"=>"form-control","required"=>"required"]) !!}
			</div>

			 <div class="form-group required">
				{!! F::label("Body") !!}
				{!! F::text("body", $post->body ,["class"=>"form-control","required"=>"required"]) !!}
			</div>

			 <div class="form-group required">
				{!! F::label("Category") !!}
				{!! F::text("category_id", $post->category_id ,["class"=>"form-control","required"=>"required"]) !!}
			</div>



            <div class="well well-sm clearfix">
                <button class="btn btn-success pull-right" title="Save" type="submit">Update</button>
            </div>
        </div>
        
    {!! Form::close() !!}
@endsection