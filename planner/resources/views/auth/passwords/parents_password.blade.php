@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header">
                        <h5>To-Do List - <span style="font-size: 14px;"> Parent's Section</span> </h5>

                    @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                    @endif
                  
                    <h3> Please enter the parent's password:</h3><br>
                    <form action="{{ route('check-parent') }}"method="POST"autocomplete="off">
                        @csrf
                        <div class="input-group">
                            <input type="password"name="parents_password"class="form-control"placeholder="Password">
                            <button type="submit"class="btn btn-dark btn-sm px-4"><i class="fa fa-check" style="color:white"></i></button>
                        </div>
                    </form>

                    <!-- <a class="btn btn-link" href="{{ url('changepassword') }}">
                                        {{ __('Forgot Your Password?') }}
                    </a> -->
                    
                </div> 
            </div>
        </div>
    </div>
</div>
@endsection
