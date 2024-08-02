@extends('layouts.app6')

@section('title', 'Actions ')
@section('page_title', 'Actions')

@section('bread_crumb')
    <ol class="breadcrumb float-sm-right">
       <li> <a href="{{ route('items.create') }}" class="btn float-right bg-success"><i class="fas fa-plus"></i> Add new
        </a></li>
        <li><a href="{{ route('items.create') }}" class="btn float-right bg-success"> <i class="fas fa-redo"></i> Return
        </a></li>
      <li>  <a href="{{ route('items.create') }}" class="btn float-right bg-success"><i class="fas fa-exclamation-triangle"></i> Repair
        </a></li> 
      <li>  <a href="{{ route('items.create') }}" class="btn float-right bg-success"><i class="fa fa-undo"></i> Reverse
        </a></li>
    </ol>
@endsection

@section('main_content')

    <div class="col-sm-12">
        <div class="card card-success card-outline">
            <div class="card-body table-responsive">
                <table id="example3" class="table table-hover table-head-fixed table-sm table-striped">
                    <thead>
                        <tr>
                            
                            
                            <th>Image</th>
                            <th>Name</th>
                            <th>Quantity in stock</th>
                            <th>Give out</th>
                            <th>Add quantity</th>
                            <th>Recommend for repair</th>
                            <th>Dispose</th>
                        </tr>
                    </thead>
                    <tbody>
                        @unless ($items->isEmpty())
                            @foreach ($items as $item)                          
                                <tr class="text-nowrap">
                                    <td><a href="{{ route('items.edit', ['item' => $item]) }}">{{ $item->image }}</a>
                                    </td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->quantity_in_stock }}</td>
                                    <td><a href="{{ route('items.give') }}"></a></td>
                                    <td><a href="{{ route('items.add') }}"></a></td>
                                    <td><a href="{{ route('items.for_repair') }}"></a></td>
                                    <td><a href="{{ route('items.dispose') }}"></a></td>
                                                   
                                </tr>
                            @endforeach
                        @else
                            <tr class="border-gray-300">
                                <td colspan="10">
                                    <p class="text-center">No Items Found</p>
                                </td>
                            </tr>
                        @endunless
                    </tbody>
                </table>
            </div> <!-- /.card-body -->
        </div>
    </div>

@endsection
