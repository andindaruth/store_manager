<!-- resources/views/equipment/add.blade.php -->
@extends('layouts.app6')

@section('title', 'New Equipment | NASECO')
@section('page_title', 'New Equipment')

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
                        <label for="name">Name of Equipment*</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"
                            placeholder="Enter name" required>
                        @error('name')
                            <div class="text-sm text-danger">{{ $message }}</div>
                        @enderror
                    </div> 
                    <div class="form-group">
                        <label for="category">Category 1*</label>
                        <select class="form-control select2" id="category" name="category1" required>
                            <option value="">--Select category</option>                            
                            <option value="item">Item</option>
                            <option value="tool">Tool</option>
                            <option value="tool">Spare Part</option>                            
                        </select>
                        @error('category')
                            <div class="text-sm text-danger">{{ $message }}</div>
                        @enderror
                    </div> 
                    <div class="form-group">
                        <label for="category">Category 2*</label>
                        <select class="form-control select2" id="category" name="category2" required>
                            <option value="">--Select category</option>                            
                            <option value="farm">Farm</option>
                            <option value="equipment">Workshop</option>                           
                        </select>
                        @error('category')
                            <div class="text-sm text-danger">{{ $message }}</div>
                        @enderror
                    </div>   
                    <div class="form-group">
                        <label for="category">Category 3*</label>
                        <select class="form-control select2" id="category" name="category3" required>
                            <option value="">--Select category</option>                            
                            <option value="farm">Returnable</option>
                            <option value="equipment">Non Returnable</option>                           
                        </select>
                        @error('category')
                            <div class="text-sm text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="code">Description/Purpose</label>
                        <input type="text" class="form-control" id="descriprion" name="description" value="{{ old('description') }}"
                            placeholder="Enter description/purpose" >
                        @error('description')
                            <div class="text-sm text-danger">{{ $message }}</div>
                        @enderror
                    </div> 
                       
                    <div class="form-group">
                        <label for="quantity_per_pack">Quantity In stock*</label>
                        <input type="text" class="form-control" id="quantity_in_stock" name="quantity_in_stock" value="{{ old('quantity_in_stock') }}"
                             required>
                        @error('quantity_in_stock')
                            <div class="text-sm text-danger">{{ $message }}</div>
                        @enderror
                    </div> 
                    <div class="form-group">
                        <label for="re_order_value">Re-order value *</label>
                        <input type="text" class="form-control" id="image" name="re_order_value" value="{{ old('re_order_value') }}"
                             required>
                        @error('re_order_value')
                            <div class="text-sm text-danger">{{ $message }}</div>
                        @enderror
                    </div>          
                    <div class="form-group">
                        <label for="image">Image *</label>
                        <input type="file" name="image" id="imageInput" accept="image/*" class="form-control">
                                                    <div class="image-preview" id="imagePreview">
                                                        <p>No image selected</p>
                        @error('image')
                            <div class="text-sm text-danger">{{ $message }}</div>
                        @enderror
                    </div>   
                    <script>
                                document.getElementById('imageInput').addEventListener('change', function(event) {
                                    const file = event.target.files[0];
                                    if (file) {
                                        const reader = new FileReader();
                                        reader.onload = function(e) {
                                            const imagePreview = document.getElementById('imagePreview');
                                            imagePreview.innerHTML = `<img src="${e.target.result}" alt="Selected Image" class="img-fluid">`;
                                        }
                                        reader.readAsDataURL(file);
                                    } else {
                                        document.getElementById('imagePreview').innerHTML = '<p>No image selected</p>';
                                    }
                                });
                            </script>     
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <div class="card-tools text-right">
                        <button name="submit" type="submit" class="btn btn-success">Create </button>
                    </div>
                </div>
            </div>
        </form>
    </div>


@endsection
