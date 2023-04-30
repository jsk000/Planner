@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

            <div class="card-header">
                    <h5>To-Do List - <span style="font-size: 14px;"> Edit A Task</span> </h5>
                </div>

                <div class="card-body">
            
                    <form action="{{ route('home.update', $todo->id) }}"method="POST"autocomplete="off">
                        @csrf
                        @method('PUT')

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
                                        <a href="{{ url('/home/done/'.$todo->id) }}" name="completed" id="completed"> <i class="fa fa-check" style="color:green"></i></a>
                                        @else
                                        <a href="{{ url('/home/done/'.$todo->id) }}" name="completed" id="completed"> <i class="fa fa-minus"></i></a>
                                        @endif 
                                    </td>
                                    <td><input type="text"name="title"class="form-control"value="{{$todo->title}}"></td>
                                    <td>
                                        <select class="form-select" name="assignee">
                                        <option class="dropdown-item" value="" selected disabled hidden>Assignee</option>
                                        @foreach($members as $member)
                                            <option class="dropdown-item" value="{{ $member->name}}">{{ $member->name}}</option>
                                        @endforeach
                                        </select>
                                    </td>
                                    <td><input type="date"name="duration"class="form-control"value="{{$todo->duration}}"></td>
                                    <td>
                                    <button type="submit" class="btn btn-sm btn-outline-success"><i class="fa fa-check"></i></button>
                                    <a href="{{ route('home.show', $todo->id) }}" class="btn btn-sm btn-outline-danger"><i class="fa fa-trash" ></i></a>
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
