
@isAdmin
<div class="input-field col s12">
    <select name="assignTo">
        <option value="" disabled selected>Assign To: </option>
        
        <option value="{{ Auth::user()->id}}">To Myself</option>
        @foreach( $coworkers as $coworker)
        @if($coworker->worker->id == $task->user->id)
        <option selected value="{{ $coworker->worker->id}} ">{{ $coworker->worker->name}} </option>
        @else
        <option value="{{ $coworker->worker->id}} ">{{ $coworker->worker->name}} </option>
        @endif
        
        @endforeach 
    </select>
    <label>Assign Task</label>
</div>
@endisAdmin
