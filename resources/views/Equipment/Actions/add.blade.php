@extends('layouts.app6')

@section('title', 'Add Quantity | NASECO')
@section('page_title', 'Add Quantity')

@section('bread_crumb')
    <ol class="breadcrumb float-sm-right btn btn-default">
        <a href="{{ route('equipment.actions') }}" class="btn float-right bg-success"> <i class="fas fa-tasks"></i> Actions
        </a>
    </ol>
@endsection

@section('main_content')

    <div class="col-sm-12">
        <form method="post" action="{{ route('equipment.addQuantity', ['id' => $equipment->id]) }}">
            @csrf
            <div class="card card-outline card-success">
                <div class="card-body pl-5 pr-5">  
                    
                    <div class="form-group">
                        <label for="date">Date</label>
                        <input type="date" class="form-control" id="date" name="date" value="{{ $currentDate }}" required>
                        @error('date')
                            <div class="text-sm text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="name">Equipment Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $equipment->name }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="quantity_in_stock">Quantity In Stock</label>
                        <input type="text" class="form-control" id="quantity_in_stock" name="quantity_in_stock" value="{{ $equipment->quantity_in_stock }}" readonly>
                    </div>

                    <div class="form-group">
                        <label for="quantity">Quantity Brought</label>
                        <input type="number" class="form-control" id="quantity" name="quantity" min="1" required>
                        @error('quantity')
                            <div class="text-sm text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="person_id">Brought By *</label>
                        <select class="form-control select2" id="person_id" name="person_id" required>
                            <option value="">--Select person</option>
                            @foreach ($operators as $operator)
                                <option value="{{ $operator->id }}">{{ $operator->name }}</option>
                            @endforeach
                        </select>
                        @error('person_id')
                            <div class="text-sm text-danger">{{ $message }}</div>
                        @enderror
                    </div>                 
                                               
                </div>
                <div class="card-footer">
                    <div class="card-tools text-right">
                        <button name="submit" type="submit" class="btn btn-success">Add Quantity</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection
