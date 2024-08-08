@extends('layouts.app6')

@section('title', 'Pending Repair ')
@section('page_title', 'Pending Repair')

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
                            <th>Date taken</th>
                            <th>Name of Equipment</th>
                            <th>Recommended By</th>
                            <th>Issues with the </th>
                            <th>Quantity Recommended</th>
                            <th>Quantity Repaired</th>
                            <th>Quantity Pending Repair</th>
                            <th>Days since recommended</th>
                            <th>Repair</th>
                        </tr>
                    </thead>
                    <tbody>
                        @unless ($equipment->isEmpty())
                            @foreach ($equipment as $equipment)                          
                                <tr class="text-nowrap">
                                    <td>{{ $equipment->date }}</td>
                                    <td>{{ $equipment->name }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $equipment->issues }}</td>
                                    <td>{{ $equipment->quantity_recommended }}</td>
                                    <td>{{ $equipment->quantity_repaired }}</td>
                                    <td>{{ $equipment->quantity_pending_repair }}</td>
                                    <td>{{ $equipment->days_pending }}</td>
                                    <td><a href="{{ route('equipment.repair') }}">Repair</a></td>
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
