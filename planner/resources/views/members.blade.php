@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

            <div class="card-header">
                    <h5>Family members</h5>
                </div>

                <div class="card-body">

                    <form action="{{ route('members.store') }}"method="POST"autocomplete="off">
                        @csrf
                        <div class="input-group">
                            <input type="text"name="name"class="form-control"placeholder="Add Member">
                            <button type="submit"class="btn btn-dark btn-sm px-4"><i class="fa fa-plus" style="color:white"></i></button>
                        </div>
                    </form>
                </div>
                    

                <div class="card-body">
                   
                    <table class="table table-hover">
                        <thead>
                            <th scope="col"> Members Added:</th>
                            <th scope="col"> Action</th>
                        </thead>
                        <tbody>
                            @forelse ($members as $member)
                            <tr>
                                <td>{{$member->name}}</td>
                                <td>
                                    <a href="{{ route('members.edit', $member->id) }}" class="btn btn-sm btn-outline-success"><i class="fa fa-edit" ></i></a>
                                    <a href="{{ route('members.show', $member->id) }}" class="btn btn-sm btn-outline-danger"><i class="fa fa-trash" ></i></a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td> Please Add your family members to assign tasks</td>
                            </tr> 
                            @endforelse
                            
                        </tbody>
                        
                    </table>

                    <a href="{{ route('home.index') }}" class="btn btn-link">Parent's Section</i></a>
                    
                </div> 
            </div>
        </div>
    </div>
</div>
@endsection
