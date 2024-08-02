@extends('layouts.app6')

@section('title', 'Spare Parts ')
@section('page_title', 'Spare Parts')

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
                            <th>Image</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Re-order value</th>
                            <th>Quantity in stock</th>
                            <th>Comment</th>
                        </tr>
                    </thead>
                    <tbody>
                        @unless ($items->isEmpty())
                            @foreach ($items as $item)                          
                                <tr class="text-nowrap">
                                    <td><a href="{{ route('items.edit', ['item' => $item]) }}">{{ $item->image }}</a>
                                    </td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->Description }}</td>
                                    <td>{{ $item->re_order_value }}</td>
                                    <td>{{ $item->quantity_in_stock }}</td>
                                    <td>{{ $item->Comment }}</td>
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
