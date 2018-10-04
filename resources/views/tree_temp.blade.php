
@foreach($items as $item)

	<li>
		<div  class="{{ $item->parent_id<1 ? 'tree-open': 'tree' }}" id="{{ $item->id }}-drop" ondrop="drop(event)" ondragover="allowDrop(event)">
			<a class="tree-position" href="#" draggable="false">{{ $item->name }}</a>

			@if($item->parent_id<2)
				@foreach($item->employees as $v)
					<a href="#" class="tree-employee" ondragstart="drag(event)" id="{{ $v->id }}">- {{ $v->fullname }}</a>
				@endforeach			
			@endif

		</div>
		

		@if(isset($positions[$item->id]))
			<ul class='{{ $item->parent_id>0 ? "inactive $item->id-ul": "ul" }}'>
				@include('tree_temp', ['items' => $positions[$item->id], 'positions' => $positions])
			</ul>
		@endif

	</li>

@endforeach
