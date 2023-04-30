@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

            <div class="card-header">
                    <h5>To-Do List - <span style="font-size: 14px;"> Parent's Section</span> </h5>
                </div>

                <div class="card-body">

                    <form action="{{ route('home.store') }}"method="POST"autocomplete="off">
                        @csrf
                        <div class="input-group">
                            <input type="text"name="title"class="form-control"placeholder="Add Task">
                            <select class="form-select" name="assignee">
                            <option class="dropdown-item" value="" selected disabled hidden>Assignee</option>
                            @foreach($members as $member)
                                <option class="dropdown-item" value="{{ $member->name}}">{{ $member->name}}</option>
                            @endforeach
                            </select>
                            <input type="date"name="duration"class="form-control"placeholder="Time limit">
                            <button type="submit"class="btn btn-dark btn-sm px-4"><i class="fa fa-plus" style="color:white"></i></button>
                        </div>
                    </form>
                </div>
                    

                <div class="card-body">

                    <table class="table table-hover">
                        <thead>
                            <th scope="col"> Done</th>
                            <th scope="col"> Task</th>
                            <th scope="col"> Asignee</th>
                            <th scope="col"> Limit</th>
                            <th scope="col"> Action</th>
                        </thead>
                        <tbody>
                            @forelse ($todos as $todo)
                            <tr>
                                <td>
                                    @if ($todo->completed)
                                    <a href="{{ url('/home/done/'.$todo->id) }}" name="completed" id="completed"> <i class="fa fa-check" style="color:green"></i></a>
                                    @else
                                    <a href="{{ url('/home/done/'.$todo->id) }}" name="completed" id="completed"> <i class="fa fa-minus"></i></a>
                                    @endif 
                                </td>
                                <td>{{$todo->title}}</td>
                                <td>{{$todo->assignee}}</td>
                                <td>{{$todo->duration}}</td>
                                <td>
                                    <a href="{{ route('home.edit', $todo->id) }}" class="btn btn-sm btn-outline-success"><i class="fa fa-edit" ></i></a>
                                    
                                    <a href="{{ route('home.show', $todo->id) }}" class="btn btn-sm btn-outline-danger"><i class="fa fa-trash" ></i></a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td> No Tasks, Enjoy your free time <i class="fa fa-smile-o fa-bounce" ></i></td>
                            </tr> 
                            @endforelse
                            
                        </tbody>
                        
                    </table>

                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <a href="{{ route('members.index') }}" class="btn btn-link">Manage family members</i></a>
                        </div>

                        <div class="col-lg-6">
                            <a href="{{ route('exit-parent') }}" class="btn btn-link">Logout parents section</i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
