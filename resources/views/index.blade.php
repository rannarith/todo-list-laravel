    @extends('layouts.master')

    @section('content')

    <table>
        <thead>
            <tr>
                <th>Task</th>
                <th>Assigned To</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td><a href="">Meeting with CEO</a></td>
                <td>Bill Gate</td>
                <td><a><i class="small material-icons">edit</i></a></td>
                <td><a><i class="smale material-icons">delete_forever</i></a></td>
            </tr>
            <tr>
                <td><a href="">Meeting with CEO</a></td>
                <td>Bill Gate</td>
                <td><a><i class="small material-icons">edit</i></a></td>
                <td><a><i class="smale material-icons">delete_forever</i></a></td>
            </tr>
            <tr>
                <td><a href="">Meeting with CEO</a></td>
                <td>Bill Gate</td>
                <td><a><i class="small material-icons">edit</i></a></td>
                <td><a><i class="smale material-icons">delete_forever</i></a></td>
            </tr>
            <tr>
                <td><a href="">Meeting with CEO</a></td>
                <td>Bill Gate</td>
                <td><a><i class="small material-icons">edit</i></a></td>
                <td><a><i class="smale material-icons">delete_forever</i></a></td>
            </tr>
        </tbody>
    </table>
    <ul class="pagination">
        <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
        <li class="active"><a href="#!">1</a></li>
        <li class="waves-effect"><a href="#!">2</a></li>
        <li class="waves-effect"><a href="#!">3</a></li>
        <li class="waves-effect"><a href="#!">4</a></li>
        <li class="waves-effect"><a href="#!">5</a></li>
        <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
    </ul>

    <form class="col s12">
        <div class="row">
            <div class="input-field col s6">
                <input placeholder="Placeholder" id="task" type="text" class="validate">
                <label for="task">New Task</label>
            </div>

            <div class="input-field col s12">
                <select>
                    <option value="" disabled selected>Assign To: </option>
                    <option value="1">To Myself</option>
                    <option value="2">Bill gate </option>
                    <option value="3">Larry Page</option>
                    <option value="4">Jack Ma</option>
                    <option value="5">Steav Job</option>
                </select>
                <label>Assign Task</label>
            </div>
        </div>
        <a class="waves-effect waves-light btn-small">Add new Task</a>
    </form>

    <br><br>
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

    @endsection
