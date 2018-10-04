<!DOCTYPE HTML>
<html>
<head>
<style>
.div1 {
    width: auto;
    margin: 10px;
    padding: 10px;
    border: 1px solid black;
}

.employee {
    display:block;
    margin:3px;
    margin-left:15px;
    border: 1px solid black;    

}
</style>
<script>
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
    target.appendChild(document.getElementById(data));

}
</script>
</head>
<body>

<h2>Drag and Drop</h2>
<p>Drag the image back and forth between the two div elements.</p>

@foreach($positions as $position)

<div class="div1" id="{{ 'drop-'.$position->id }}" ondrop="drop(event)" ondragover="allowDrop(event)">{{ $position->name }}
    @foreach($employees as $employee)
        @if($employee->position_id == $position->id)
           <span draggable="true" ondragstart="drag(event)" class="employee" id="{{ $employee->id }}">{{ $employee->fullname }}</span>
        @endif
    @endforeach
</div>


@endforeach
<!--<div id="div1" ondrop="drop(event)" ondragover="allowDrop(event)">
  <!--<img src="img_w3slogo.gif" draggable="true" ondragstart="drag(event)" id="drag1" width="88" height="31">
  <a href="#" draggable="true" ondragstart="drag(event)" id="drag1">qqq</a>
</div>

<div id="div2" ondrop="drop(event)" ondragover="allowDrop(event)"></div>-->

</body>
</html>