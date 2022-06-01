
@extends('layouts.indexlay')

@section('title')
Dashboard
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"> Déclarations</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class=" text-primary">
                        <th>
                            Matricule
                        </th>
                        <th>
                            type du panne
                        </th>
                        <th>
                            localisation
                        </th>

                        
                        </thead>
                        <tbody>
                        @foreach($vals as $vals)
                        <tr>
                            <td>
                            {{ $vals['matricule'] }}
                            </td>
                            <td>
                            {{ $vals['type_panne'] }}
                            </td>
                            <td>
                            {{ $vals['localisation'] }}
                            </td>
                            
                            <td class="text-right">
                           
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
