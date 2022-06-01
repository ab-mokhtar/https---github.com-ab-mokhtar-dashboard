
@extends('layouts.indexlaynor')

@section('title')
Dashboard
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"> Players</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class=" text-primary">
                        <th>
                            Name
                        </th>
                        <th>
                            cin
                        </th>
                        <th>
                            phone
                        </th>
                        
                        </thead>
                        <tbody>
                        @foreach($players as $players)
                        <tr>
                            <td>
                            {{ $players->name }}
                            </td>
                            <td>
                            {{ $players->cin }}
                            </td>
                            <td>
                            {{ $players->tel }}
                            </td>
                            
                            <td class="text-right">
                            <form action="/players/{{ $players->id }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <button type="submit" class="btn btn-danger">Banner</button>
                            </form>
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
