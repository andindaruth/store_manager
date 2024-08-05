@extends('layouts.app6')

@section('title', 'Pending Return ')
@section('page_title', 'Pending Return')

@section('bread_crumb')
    <ol class="breadcrumb float-sm-right">
        <a href="{{ route('workshop.actions') }}" class="btn float-right bg-success"> <i class="fas fa-tasks"></i> Actions
        </a>
    </ol>
@endsection

@section('main_content')

    <div class="col-sm-12">
        <div class="card card-success card-outline">
            <div class="card-header">
                <!-- <h4 class="card-title text-success">Items</h4> -->
            </div>
            <div class="card-body table-responsive">
                <table id="example3" class="table table-hover table-head-fixed table-sm table-striped">
                    <thead>
                        <tr>                           
                            <th>Date taken</th>
                            <th>Name of Equipement</th>
                            <th>Taken By</th>
                            <th>Issued By</th>
                            <th>Quantity Taken</th>
                            <th>Quantity Returned</th>
                            <th>Quantity Pending Return</th>
                            <th>Days since taken</th>                            
                            <th>Return</th>
                        </tr>
                    </thead>
                    <tbody>
                        @unless ($items->isEmpty())
                            @foreach ($items as $item)                          
                                <tr class="text-nowrap">
                                    <td>{{ $item->date }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $person->name }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $item->quantity_taken }}</td>
                                    <td>{{ $item->quantity_returned }}</td>
                                    <td>{{ $item->quantity_pending_taken }}</td>
                                    <td><a href="{{ route('workshop.return') }}">Return</a></td>
                                </tr>
                            @endforeach
                        @else
                            <tr class="border-gray-300">
                                <td colspan="10">
                                    <p class="text-center">No items Found</p>
                                </td>
                            </tr>
                        @endunless
                    </tbody>
                </table>
            </div> <!-- /.card-body -->
        </div>
    </div>

@endsection
