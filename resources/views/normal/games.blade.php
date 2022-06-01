
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
                            Id palyer
                        </th>
                        <th>
                            Score
                        </th>
                        <th>
                            level
                        </th>
                        <th>
                            winner
                        </th>
                        <th>
                            created_at
                        </th>
                        <th>
                            updated_at
                        </th>
                        
                        </thead>
                        <tbody>
                        @foreach($games as $games)
                        <tr>
                            <td>
                            {{ $games->player_id }}
                            </td>
                            <td>
                            {{ $games->score }}
                            </td>
                            <td>
                            {{ $games->level }}
                            </td>
                            <td>
                            {{ $games->winner }}
                            </td>
                            <td>
                            {{ $games->created_at }}
                            </td>
                            <td>
                            {{ $games->updated_at }}
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
