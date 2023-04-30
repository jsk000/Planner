@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header">
                    <h5>Family Members - <span style="font-size: 14px;"> Delete A Member</span> </h5>
                </div>

                <div class="card-body">
                    
                    <h3> Are you sure you want to delete the following Member?</h3><br>
                   
                    <form action="{{ route('members.destroy', $member->id) }}"method="POST"autocomplete="off">
                        @csrf
                        @method('DELETE')

                        <table class="table table-hover">
                            <thead>
                                <th scope="col"> Member</th>
                                <th scope="col"> Action</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{$member->name}}</td>
                                    <td>
                                        <button type="submit" class="btn btn-sm btn-outline-success"><i class="fa fa-check"></i></button>
                                        <a href="{{ route('members.index') }}" class="btn btn-sm btn-outline-danger"><i class="fa fa-x" ></i></a>
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
