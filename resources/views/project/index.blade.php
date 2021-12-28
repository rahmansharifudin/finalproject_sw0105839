@extends('layouts.app')
@section('content')
    
    @if($message = Session::get('success'))
        <div class= "alert alert-success">
            <p>{{$message}}</p>
        </div>
    @endif

    <div class="container">
        <div class="card">
            <div class="card-header">
                List of Projects
            </div>
            <div class="card-body">
                <div class="text-right d-grid gap-2 d-md-flex justify-content-md-end">
                    <a class="btn btn-success mb-3" href="{{route('project.create')}}">Create New Project</a>
                </div>
                <table class="table table-responsive table">
                    <thread>
                        <tr style="text-align: center">
                            <th>ID</th>
                            <th>Project Name</th>
                            <th>Project Leader</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Duration (months)</th>
                            <th>Cost (RM)</th>
                            <th>Client</th>
                            <th>Project Stage</th>
                            <th>Project Status</th>
                        </tr>
                    </thread>
                    <tbody>
                    <?php $i=1 ?>
                    @foreach($projects as $project)
                        <tr style="text-align: center">
                            <td>{{$i++}}</td>
                            <td>{{$project->project_name}}</td>
                            <td>{{$project->user->name}}</td>
                            <td>{{$project->start_date}}</td>
                            <td>{{$project->end_date}}</td>
                            <td>{{$project->duration}}</td>
                            <td>{{$project->cost}}</td>
                            <td>{{$project->client}}</td>
                            <td>{{$project->project_stage}}</td>
                            <td>{{$project->project_status}}</td>
                            <td>
                                <a class="btn btn-primary" href="{{route('project.edit',$project->id)}}">Edit Project</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
