@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h1 class="display-3">Jobs</h1>
            <div>
                <a style="margin: 19px;" href="{{ route('jobs.create')}}" class="btn btn-primary">New Job</a>
            </div>
            <table class="table table-striped">
                <thead>
                <tr>
                    <td>job_id</td>
                    <td>jobname</td>
                    <td>employed</td>
                </tr>
                </thead>
                <tbody>
                @foreach($jobs as $job)
                    <tr>
                        <td>{{$job->job_id}}</td>
                        <td>{{$job->jobname}}</td>
                        <td>{{$job->employed}}</td>
                        @can('update',$job)
                        <td>
                            <a href="{{ route('jobs.edit',$job->job_id)}}" class="btn btn-primary">Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('jobs.destroy', $job->job_id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                        @endcan
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div>
            </div>
            <div class="col-sm-12">  @if(session()->get('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
            </div>
@endsection
