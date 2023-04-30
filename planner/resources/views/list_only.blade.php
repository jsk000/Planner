@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

            <div class="card-header">
                    <h5>To-Do List - <span style="font-size: 14px;"> Please Complete your Tasks</span> </h5>
                </div>

                <div class="card-body">

                    <table class="table table-hover">
                        <thead>
                            <th scope="col"> Done</th>
                            <th scope="col"> Task</th>
                            <th scope="col"> Asignee</th>
                            <th scope="col"> Limit</th>
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
                                
                            </tr>
                            @empty
                            <tr>
                                <p> No Tasks, Enjoy your free time <i class="fa fa-smile-o fa-bounce" ></i></p>
                            </tr> 
                            @endforelse
                            
                        </tbody>
                        
                    </table>
                    
                </div> 
            </div>
        </div>
    </div>
</div>
@endsection
