@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h1 class="display-3">Add a Company</h1>
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
                <form method="post" action="{{ route('companies.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="company_name">Firmenname:</label>
                        <input type="text" class="form-control" name="company_name"/>
                    </div>
                    <div class="form-group">
                        <label for="employee_count">Mitarbeiteranzahl:</label>
                        <input type="text" class="form-control" name="employee_count"/>
                    </div>
                    <div class="form-group">
                        <label for="image">Firmenlogo:</label>
                        <input type="file" class="form-control-file" id="image" name="image">
                    </div>
                    <button type="submit" class="btn btn-primary-outline">Add Company</button>
                </form>
            </div>
        </div>
    </div>
@endsection
