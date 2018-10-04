@extends('layouts.app')

@section('content')
	<h3 class="text-center">Дерево сотрудников</h3>
		<div class="row">
			<div class='col-sm-8 offset-2 border'>
				<ul class='category'>
				@foreach($positions as $key => $items)

					@if($key !== 0)	
						@break
					@endif

					@include('tree_temp', ['items' => $items, 'positions' => $positions])

				@endforeach

				</ul>
			</div>
			<div class='col-6 border'>
				<div id='emp'>

				</div>
			</div>
		</div>

	    <div class="load-wrapp inactive">
            <div class="load-4">
                <div class="ring-1"></div>
            </div>
        </div>

@endsection