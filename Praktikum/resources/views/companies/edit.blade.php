@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h1 class="display-3">Update a Job</h1>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                <br />
            @endif
            <form method="post" action="{{ route('companies.update', $company->company_id) }}">
                @method('PATCH')
                @csrf
                <div class="form-group"> <label for="companyname ">Jobname:</label>
                    <input type="text" class="form-control" name="companyname" value={{ $company->company_name }} />
                </div>
                <div class="form-group">
                    <label for="employed">employee_count:</label>
                    <input type="text" class="form-control" name="employee_count" value={{ $companies->employee_count }} />
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
