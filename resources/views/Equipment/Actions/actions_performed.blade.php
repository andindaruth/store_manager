@extends('layouts.app6')

@section('title', 'Actions Performed ')
@section('page_title', 'Actions Performed')

@section('bread_crumb')
<ol class="breadcrumb float-sm-right">
        <a href="{{ route('equipment.actions') }}" class="btn float-right bg-success"> <i class="fas fa-tasks"></i> Actions
        </a>
    </ol>
@endsection

@section('main_content')

    <div class="col-sm-12">
        <div class="card card-success card-outline">
            <div class="card-header">
                <!-- <h4 class="card-title text-success">equipment</h4> -->
            </div>
            <div class="card-body table-responsive">
                <table id="example3" class="table table-hover table-head-fixed table-sm table-striped">
                    <thead>
                        <tr> 
                            <th>ID</th>                          
                            <th>Date performed</th>
                            <th>Equipment Affected</th>
                            <th>Performed By</th>
                            <th>Action Performed</th>
                            <th>Quantity Affected</th>
                            <th>Reverse</th>
                        </tr>
                    </thead>
                    <tbody>
                        @unless ($equipment->isEmpty())
                            @foreach ($equipment as $equipment)                          
                                <tr class="text-nowrap">
                                    <th>{{ $equipment->id }}</th>
                                    <td>{{ $equipment->date }}</td>
                                    <td>{{ $equipment->name }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $equipment->action }}</td>
                                    <td>{{ $equipment->quantity_affected }}</td>
                                    <td><a href="{{ route('equipment.reverse') }}">Reverse</a></td>
                                </tr>
                            @endforeach
                        @else
                            <tr class="border-gray-300">
                                <td colspan="10">
                                    <p class="text-center">No equipment Found</p>
                                </td>
                            </tr>
                        @endunless
                    </tbody>
                </table>
            </div> <!-- /.card-body -->
        </div>
    </div>

@endsection
