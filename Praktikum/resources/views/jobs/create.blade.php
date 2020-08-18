@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h1 class="display-3">Add a Job</h1>
            <div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div><br />
                @endif
                <form method="post" action="{{ route('jobs.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="jobname">Jobname:</label>
                        <input type="text" class="form-control" name="jobname"/>
                    </div>          <div class="form-group">
                        <label for="employed">Employed:</label>
                        <input type="text" class="form-control" name="employed"/>
                    </div>

                    <button type="submit" class="btn btn-primary-outline">Add Job</button>
                </form>
            </div>
        </div>
    </div>
@endsection
