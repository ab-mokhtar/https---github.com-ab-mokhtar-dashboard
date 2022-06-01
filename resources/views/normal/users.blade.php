
@extends('layouts.indexlaynor')

@section('title')
Dashboard
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"> Users</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class=" text-primary">
                        <th>
                            Name
                        </th>
                        <th>
                            Last_name
                        </th>
                        <th>
                            Phone
                        </th>
                        <th >
                        Email
                        </th>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>
                            {{ $user->name }}
                            </td>
                            <td>
                            {{ $user->last_name }}
                            </td>
                            <td>
                            {{ $user->phone }}
                            </td>
                            <td>
                            {{ $user->email }}
                            </td>
                        </tr>
                        @endforeach 
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
</div>
</div>
@endsection
@section('script')

@endsection
