@extends('layouts.master')
@section('content')
<form class="col s12">
    <div class="row">
        <div class="input-field col s12">
            <input value="task content to edit" id="task2" type="text" class="validate">
            <label for="task">Edit Task</label>
        </div>
    </div>
    <a class="waves-effect waves-light btn-small">Edit Task</a>
</form>
@endsection
