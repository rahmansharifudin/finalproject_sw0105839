@extends('layouts.app')
@section('content')
    <div class="container">
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach 
                </ul>
            </div>
        @endif
        <div class="card">
            <div class="card-header">
                Create A Project
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('project.store')}}">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md">
                            <label for="project_name">Project Name</label>
                            <input name="project_name" type="text" class="form-control" id="project_name" value="{{old('project_name')}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md mt-3">
                            <label for="user_id">Project Leader</label>
                            <select name="user_id" class="form-control" id="user_id" value="{{old('user_id')}}">>
                                <option>-- Please Select --</option>
                                @foreach($users as $user)
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label for="project_stage">Project Stage</label>
                            <select name="project_stage" class="form-control">
                                <option>-- Please Select --</option>
                                <option value="Inception">Inception</option>
	                            <option value="Milestone 1">Milestone 1</option>
                                <option value="Milestone 2 & Final Report">Milestone 2 & Final Report</option>
                                <option value="Closing">Closing</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6 mt-4">
                            <label for="pproject_status">Project Status</label>
                            <select name="project_status" class="form-control">
                                <option>-- Please Select --</option>
                                <option value="On Track">On Track</option>
	                            <option value="Delayed">Delayed</option>
                                <option value="Extended">Extended</option>
                                <option value="Completed">Completed</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12 text-center mt-4">
                            <input type="submit" class="btn btn-primary">&nbsp;
                            <input type="reset" class="btn btn-secondary">&nbsp;
                            <a class="btn btn-primary" href="{{route('project.index')}}">Back</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection