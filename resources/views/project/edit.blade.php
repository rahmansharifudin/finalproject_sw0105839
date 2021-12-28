@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                Update Project Information <strong>{{$project->project_name}}</strong>
            </div>
            <div class = "card-body">
                <form action = "{{route('project.update', $project->id)}}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="start_date">Start Date</label>
                            <input name="start_date" type="date" class="form-control" id="start_date" value="{{$project->start_date}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="end_date">End Date</label>
                            <input name="end_date" type="date" class="form-control" id="end_date" value="{{$project->end_date}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4 mt-3">
                            <label for="duration">Duration (months)</label>
                            <input name="duration" type="tel" class="form-control" id="duration" value="{{$project->duration}}">
                        </div>
                        <div class="form-group col-md-4 mt-3">
                            <label for="cost">Cost (RM)</label>
                            <input name="cost" type="tel" class="form-control" id="cost" value="{{$project->cost}}">
                        </div>
                        <div class="form-group col-md-4 mt-3">
                            <label for="client">Client</label>
                            <input name="client" type="text" class="form-control" id="client" value="{{$project->client}}">
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