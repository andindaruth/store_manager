@extends('layouts.app6')

@section('title', 'Tools ')
@section('page_title', 'Tools')

@section('bread_crumb')
    <ol class="breadcrumb float-sm-right">
        <a href="{{ route('equipment.actions') }}" class="btn float-right bg-success"><i class="fas fa-tasks"></i> Actions</a>
    </ol>
@endsection

@section('main_content')

    <div class="col-sm-12">
        <div class="card card-success card-outline">
            <div class="card-header">
                <!-- <h4 class="card-title text-success">Equipment</h4> -->
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
                        @unless ($equipment->isEmpty())
                            @foreach ($equipment as $item)
                                @if ($item->category1 === 'tool') <!-- Filtering by category1 -->
                                    <tr class="text-nowrap">
                                        <td>
                                            <img src="{{ Storage::url($item->image) }}" alt="{{ $item->name }}" class="img-fluid" style="max-width: 60px; height: 75px;">
                                        </td>
                                        <td>
                                            <a href="{{ route('equipment.edit', $item->id) }}">{{ $item->name }}</a>
                                        </td>
                                        <td>{{ $item->description }}</td>
                                        <td>{{ $item->re_order_value }}</td>
                                        <td>{{ $item->quantity_in_stock }}</td>
                                        <td>
                                            @if($item->quantity_in_stock > $item->re_order_value + 10)
                                                <span style="color: green;">Stock OK</span>
                                            @elseif($item->quantity_in_stock >= $item->re_order_value && $item->quantity_in_stock <= $item->re_order_value + 10)
                                                <span style="color: Orange;">Need to Re-stock soon</span>
                                            @else
                                                <span style="color: red;">Re-Stock now</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endif
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
