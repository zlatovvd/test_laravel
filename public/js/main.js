$(document).ready(function() {
	
	$('.delete').click(function(event) {
		if (confirm("Вы подтверждаете удаление?")) {
			return true;
		} else {
			return false;
		}
	});


	$("#fulln").on("keyup", function(event){
		var str = this.value;

		$.ajax({
			"type":"GET",
			"url":'shearch',
			"data":'name=' +str,
			"success":function(dat) {
				$('.employees').html(dat);
			},
			"error":function(xhr, status, error) {
			alert(xhr.responseText + '|\n' + status + '|\n' +error);
			}
		});	

	});	
	

	$(document).on('click', '.fieldsort', function(event){
		event.preventDefault();
		var id = this.id;
		
		$.ajax({
			"type":"GET",
			"url":'sort',
			"data":'sort='+id,
			"success":function(dat) {
				$('.employees').html(dat);
			},
			"error":function(xhr, status, error) {
			alert(xhr.responseText + '|\n' + status + '|\n' +error);
			}
		});

	});		
	

	$("#position").on("change", function(event) {
		
		var id = this.value

		$.ajax({
			"type":"GET",
			"url":'/position',
			"data":'position='+id,
			"success":function(dat) {
				$('#parent').html(dat);
			},
			"error":function(xhr, status, error) {
			alert(xhr.responseText + '|\n' + status + '|\n' +error);
			}
		});	
		
	})
	
	
	$(document).on('click', '.tree', function(event){		
		event.preventDefault();
		var id = parseInt(this.id);
		var div = '#' + id + '-drop'
		var ul = '.' + id + '-ul';
		$(ul).slideDown();
		//$(ul).toggle('slow');

		$.ajax({
			"type":"GET",
			"url":"tree",
			"data":{parent:id},
			"beforeSend":function() {
				$('.load-wrapp').removeClass("inactive").addClass("active");
			},
			"success":function(dat) {
				$('.load-wrapp').removeClass("active").addClass("inactive");
				var obj = JSON.parse(dat);
				for(var key in obj) {
					position = '#' + key + '-drop';
					$(position).append(obj[key]);	
					$(div).removeClass("tree").addClass("tree-open");
				}

			},
			"error":function() {
				alert(xhr.responseText + '|\n' + status + '|\n' +error);
			}
		});		
		
	} );
	
	

});

	function allowDrop(ev) {
		ev.preventDefault();
	}

	function drag(ev) {
		ev.dataTransfer.setData("text", ev.target.id);
	}

	function drop(ev) {
		ev.preventDefault();
		var data = ev.dataTransfer.getData("text");
		var target = ev.target;
		if(target.tagName != 'DIV') return;
		var id=ev.target.id;

		$.ajax({
			"type":"GET",
			"url":"tree",
			"data":{drag:data, drop:id},
			"beforeSend":function() {
				$('.load-wrapp').removeClass("inactive").addClass("active");
			},			
			"success":function(dat) {
				$('.load-wrapp').removeClass("active").addClass("inactive");				
				var obj = JSON.parse(dat);
				if(obj['status']) {
					target.appendChild(document.getElementById(data));					
					$('#message').html(obj['message']).removeClass("alert-danger").addClass("alert-success");
				} else {
					$('#message').html(obj['message']).removeClass("alert-success").addClass("alert-danger");
					
				}
			},
			"error":function() {
				alert('error');
			}
		});
		
	}