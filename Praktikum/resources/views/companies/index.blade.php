@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h1 class="display-3">Companies</h1>
            <div>
                <a style="margin: 19px;" href="{{ route('companies.create')}}" class="btn btn-primary">New Company</a>
            </div>
            <table class="table table-striped">
                <thead>
                <tr>
                    <td>jobname</td>
                    <td>employed</td>
                </tr>
                </thead>
                <tbody>
                @foreach($companys as $company)
                    <tr>
                        <td>{{$company->company_name}}</td>
                        <td>{{$company->employee_count}}</td>
                        @can('update',$company)
                        <td>

                                <a href="{{ route('companies.edit',$company->company_id)}}" class="btn btn-primary">Edit</a>

                        </td>
                        @endcan

                        <td>
                            <form action="{{ route('companies.destroy', $company->company_id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </td>

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
