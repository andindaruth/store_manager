<!-- resources/views/workshop/add.blade.php -->
@extends('layouts.app6')

@section('title', 'Dispose | NASECO')
@section('page_title', 'Dispose')

@section('bread_crumb')
<ol class="breadcrumb float-sm-right">
        <a href="{{ route('workshop.actions') }}" class="btn float-right bg-success"> <i class="fas fa-tasks"></i> Actions
        </a>
    </ol>
@endsection

@section('main_content')
<div class="col-sm-12">
        <form method="post" action="{{ route('items.store') }}">
            @csrf
            <div class="card card-outline card-success pl-5 pr-5">
                <div class="card-body">

                <div class="form-group">
                        <label for="name">Date*</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"
                            placeholder="Enter name" required>
                        @error('name')
                            <div class="text-sm text-danger">{{ $message }}</div>
                        @enderror
                    </div> 

                    <div class="form-group">
                        <label for="name">Name of Equipement*</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"
                            placeholder="Enter name" required>
                        @error('name')
                            <div class="text-sm text-danger">{{ $message }}</div>
                        @enderror
                    </div> 
                    <div class="form-group">
                        <label for="quantity_per_pack">Quantity In Stock*</label>
                        <input type="text" class="form-control" id="quantity_in_stock" name="quantity_in_stock" value="{{ old('quantity_in_stock') }}"
                             required>
                        @error('quantity_in_stock')
                            <div class="text-sm text-danger">{{ $message }}</div>
                        @enderror
                    </div> 
                    <div class="form-group">
                        <label for="re_order_value">Quantity to dispose *</label>
                        <input type="text" class="form-control" id="image" name="re_order_value" value="{{ old('re_order_value') }}"
                             required>
                        @error('re_order_value')
                            <div class="text-sm text-danger">{{ $message }}</div>
                        @enderror
                    </div>   
                    <div class="form-group">
                        <label for="code">Issues with Equipement</label>
                        <input type="text" class="form-control" id="descriprion" name="description" value="{{ old('description') }}"
                            placeholder="Enter description/purpose" >
                        @error('description')
                            <div class="text-sm text-danger">{{ $message }}</div>
                        @enderror
                    </div>        
    
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <div class="card-tools text-right">
                        <button name="submit" type="submit" class="btn btn-success">save</button>
                    </div>
                </div>
            </div>
        </form>
    </div>


@endsection
