<div class="wrapper">

 <form action="{{ route('employee.store') }}" method="POST">
 	{{ csrf_field() }}
   <div class="form-group">
	    	<label for='name'>Фамилия Имя Отчество:</label>
	     	<input type='text' id="name" name="fullname" class='form-control' placeholder="Введите Фамилию Имя Отчество">
    </div>

    <div class='position'>
		<div class='form-group'>
			<label for='position'>Должность:</label>
			<select class='form-control' id='position' name='position_id'>
				<option value=1>Выберите должность</option>
				@foreach($positions as $position)
					@if($position->only == 1)
						@if(is_object($position->employee))
							<option value="{{ $position->id }}" disabled>{{ $position->name }} - {{ $position->employee->fullname }}</option>
						@else 
							<option value="{{ $position->id }}">{{ $position->name }}</option>
						@endif
					@else
						<option value="{{ $position->id }}" >{{ $position->name }}</option>
					@endif

				@endforeach
			</select>
		</div>
		<div>
			<span>Подчиненность</span>
			<div id='parent'>
		
			</div>
		</div>
	</div>

	<div class='row'>
		<div class='col-6 form-group'>
			<label for='name_product'>Дата приема на работу</label>
			<input type='date' name='datein' id='datein' class='form-control'>
		</div>

		<div class='col-6 form-group'>
			<label for='salary'>Размер заработной платы</label>
			<input type='text' name='salary' id='salary' class='form-control' placeholder='Введите размер заработаной платы'>
		</div>
	</div>

	<div class='img text-center'>
		<p>Фотография сотрудника</p>
    	<div class="form-group">
	     	<input type='file' name='img'>
    	</div>  
    </div> 

	<div class="form-group">
	    <div class="col-xs-offset-2 col-xs-10">
	        <input type ="submit" class='btn btn-success' value="Сохранить">
	    </div>
	</div>
	
	</form>

</div>

