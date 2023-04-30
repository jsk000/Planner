@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header">
                    <h5>To-Do List - <span style="font-size: 14px;"> Delete A Task</span> </h5>
                </div>

                <div class="card-body">
                
                    <h3> Are you sure you want to delete the following task?</h3><br>
                   
                    <form action="{{ route('home.destroy', $todo->id) }}"method="POST"autocomplete="off">
                        @csrf
                        @method('DELETE')

                        <table class="table table-hover">
                            <thead>
                                <th scope="col"> Done</th>
                                <th scope="col"> Task</th>
                                <th scope="col"> Asignee</th>
                                <th scope="col"> Limit</th>
                                <th scope="col"> Action</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        @if ($todo->completed)
                                        <a href="" name="completed" id="completed"> <i class="fa fa-check" style="color:green"></i></a>
                                        @else
                                        <a href="" name="completed" id="completed"> <i class="fa fa-minus"></i></a>
                                        @endif 
                                    </td>
                                    <td>{{$todo->title}}</td>
                                    <td>{{$todo->assignee}}</td>
                                    <td>{{$todo->duration}}</td>
                                    <td>
                                        <button type="submit" class="btn btn-sm btn-outline-success"><i class="fa fa-check"></i></button>
                                        <a href="{{ route('home.index') }}" class="btn btn-sm btn-outline-danger"><i class="fa fa-x" ></i></a>
                                    </td>
                                </tr>
                                
                            </tbody>
                    
                        </table>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
