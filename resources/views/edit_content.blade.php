<div class="wrapper">

 <form action="{{ route('employee.store'). '/'. $employee->id }}" method="POST" enctype="multipart/form-data">
 	{{ csrf_field() }}
 	@method('PUT')
   <div class="form-group">
	    	<label for='name'>Фамилия Имя Отчество:</label>
	     	<input type='text' id="name" name="fullname" class='form-control' value="{{ $employee->fullname }}" placeholder="Введите Фамилию Имя Отчество">
    </div>

   <div class='position'>
		<div class='form-group'>
			<label for='position'>Должность:</label>
			<select class='form-control' id='position' name='position_id'>
				@foreach($positions as $position)
					@if($position->only == 1)
						@if(is_object($position->employee))
							<option value="{{ $position->id }}" {{ ($employee->position_id)==($position->id) ? 'selected' : '' }} disabled>{{ $position->name }} - {{ $position->employee->fullname }}</option>
						@else 
							<option value="{{ $position->id }}" {{ ($employee->position_id)==($position->id) ? 'selected' : '' }} >{{ $position->name }}</option>
						@endif
					@else
						<option value="{{ $position->id }}" {{ ($employee->position_id)==($position->id) ? 'selected' : '' }} >{{ $position->name }}</option>
					@endif

				@endforeach

			</select>
		</div>
		<div>
			<span>Подчиненность</span>
			<div id='parent'>
				<span class='subordinate'>{{ $subposition }} - {{ $subordinate }}</span>
			</div>
		</div>
	</div>


	<div class='row'>
		<div class='col-6 form-group'>
			<label for='name_product'>Дата приема на работу:</label>
			<input type='date' name='datein' id='datein' class='form-control' value="{{ $employee->datein }}">
		</div>

		<div class='col-6 form-group'>
			<label for='salary'>Размер заработной платы:</label>
			<input type='text' name='salary' id='salary' class='form-control' value="{{ $employee->salary }}" placeholder='Введите размер заработаной платы'>
		</div>
	</div>

	<div class='img text-center'>
		<p>Фотография сотрудника</p>
    	<div class="form-group">
    		<img src="{{ '/images/'.$employee->img }}" width="350">
    		<input type='hidden' name='old_img' value='{{ $employee->img }}'>
    	</div>
    
    	<div class="form-group">
	     	<input type='file' name='img'>
    	</div>  
    </div> 

	<input type='hidden' name='id' value='{{ $employee->id }}'>

	<div class="form-group">
	    <div class="col-xs-offset-2 col-xs-10">
	        <input type ="submit" class='btn btn-success' value="Сохранить">
	    </div>
	</div>
	
	
	</form>

	
	
</div>
