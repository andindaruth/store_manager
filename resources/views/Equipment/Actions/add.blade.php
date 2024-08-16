@extends('layouts.app6')

@section('title', 'Add | NASECO')
@section('page_title', 'Add More Quantity')

@section('bread_crumb')
<ol class="breadcrumb float-sm-right">
        <a href="{{ route('equipment.actions') }}" class="btn float-right bg-success"> <i class="fas fa-tasks"></i> Actions
        </a>
    </ol>
@endsection

@section('main_content')
<div class="col-sm-12">
        <form method="post" action="{{ route('equipment.store') }}">
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
                        <label for="name">Name of Equipment*</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"
                            placeholder="Enter name" required>
                        @error('name')
                            <div class="text-sm text-danger">{{ $message }}</div>
                        @enderror
                    </div> 

                    <div class="form-group">
                        <label for="code">Brought By</label>
                        <input type="text" class="form-control" id="descriprion" name="description" value="{{ old('description') }}"
                            placeholder="Enter description/purpose" >
                        @error('description')
                            <div class="text-sm text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                     
                    <div class="form-group">
                        <label for="code">Quantity brought</label>
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
