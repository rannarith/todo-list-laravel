    @extends('layouts.master')

    @section('content')

    
    

    <table>
        <thead>
            <tr>
                <th>Task</th>
                @isAdmin
                <th>Assigned To</th>
                @endisAdmin
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>

        <tbody>
        @foreach($tasks as $task)
            <tr>
                <td><a href="{{ route('updateStatus', $task->id) }}">
                    @if(!$task->status)
                    {{ $task->content }}
                    @else
                    <strike class="grey-text">{{ $task->content }}</strike>
                    @endif
                </a></td>
                
                @isAdmin
                <td>{{ $task->user->name }}</td>
                @endisAdmin
                <td><a href="{{ route('edit', $task->id) }}"><i class="small material-icons">edit</i></a></td>
                <td><a href="{{ route('destroy', $task->id) }}" ><i class="smale material-icons">delete_forever</i></a></td>
            </tr>
        @endforeach 
        </tbody>
    </table>
    {{ $tasks->links('vendor.pagination.materialize') }}
    <!-- <ul class="pagination">
        <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
        <li class="active"><a href="#!">1</a></li>
        <li class="waves-effect"><a href="#!">2</a></li>
        <li class="waves-effect"><a href="#!">3</a></li>
        <li class="waves-effect"><a href="#!">4</a></li>
        <li class="waves-effect"><a href="#!">5</a></li>
        <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
    </ul> -->

    <form method="POST" action=" {{ route('store') }} "  class="col s12">
        <div class="row">
            <div class="input-field col s6">
                <input name="task" placeholder="Placeholder" id="task" type="text" class="validate">
                <label for="task">New Task</label>
            </div>

        @include('partials.coworkers')
            
        </div>
        <button type="submit" class="waves-effect waves-light btn-small">Add new Task</button>
        @csrf
    </form>

    @isCoworker
    <br><br>
    <form action="" class="col s12">
        <div class="input-field ">
            <select>
                <option value="" disabled selected>Send Invitation To: </option>
                
                <option value="2">Bill gate </option>
                <option value="3">Larry Page</option>
                <option value="4">Jack Ma</option>
                <option value="5">Steav Job</option>
            </select>
            <label>Send Invitation To</label>
        </div>
        <a class="waves-effect waves-light btn-small">Send Invitation</a>
    </form>

    @endisCoworker
   
    

    <br><br>

    @isAdmin

    <ul class="collection with-header">
        <li class="collection-header">
            <h4>My Conworkers</h4>
        </li>
        <li class="collection-item">
            <div>Bill gate<a href="#!" class="secondary-content"><i class="material-icons">delete</i></a></div>
        </li>
        <li class="collection-item">
            <div>Larry Page<a href="#!" class="secondary-content"><i class="material-icons">delete</i></a></div>
        </li>
        <li class="collection-item">
            <div>Steav Job<a href="#!" class="secondary-content"><i class="material-icons">delete</i></a></div>
        </li>
        <li class="collection-item">
            <div>jack Ma<a href="#!" class="secondary-content"><i class="material-icons">delete</i></a></div>
        </li>

    </ul>

    @endisAdmin

    @endsection
