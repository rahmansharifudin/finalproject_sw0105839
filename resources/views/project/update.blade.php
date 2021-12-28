@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                Update Project Stage/Status <strong>{{$project->project_name}}</strong>
            </div>
            <div class = "card-body">
                <form action = "{{route('project.update', $project->id)}}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="project_stage">Project Stage</label>
                            <select name="project_stage" class="form-control" id="project_stage" value="{{$project->project_stage}}">
                            <option>-- Please Select --</option>
                                <option value="Inception">Inception</option>
	                            <option value="Milestone 1">Milestone 1</option>
                                <option value="Milestone 2 & Final Report">Milestone 2 & Final Report</option>
                                <option value="Closing">Closing</option>
                            </select>
                        </div>
                        <div class="form-group col-md-12 mt-3">
                            <label for="project_status">Project Status</label>
                            <select name="project_status" class="form-control" value="{{$project->project_status}}">
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
                            <a class="btn btn-primary" href="{{route('project.index')}}">Return</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection