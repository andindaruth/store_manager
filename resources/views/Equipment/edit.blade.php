@extends('layouts.app6')

@section('title', 'Edit Equipment | NASECO')
@section('page_title', 'Edit Equipment')

@section('bread_crumb')
    <ol class="breadcrumb float-sm-right btn btn-default">
    <a href="{{ route('equipment.actions') }}" class="btn float-right bg-success"> <i class="fas fa-tasks"></i> Actions
    </a>
    </ol>
@endsection

@section('main_content')

    <div class="col-sm-12">
    <form method="post" action="{{ route('equipment.update', $equipment->id) }}">
            @csrf
            @method('PUT')
            <div class="card card-outline card-success">
                <div class="card-body pl-5 pr-5">  
                    
                    
                    <div class="form-group">
                        <label for="name">Name *</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $equipment->name }}"
                            placeholder="Enter name" required>
                        @error('name')
                            <div class="text-sm text-danger">{{ $message }}</div>
                        @enderror
                    </div>      
                    <div class="form-group">
                        <label for="description">Description </label>
                        <input type="text" class="form-control" id="description" name="description" value="{{ $equipment->description }}"
                            placeholder="Enter description" >
                        @error('description')
                            <div class="text-sm text-danger">{{ $message }}</div>
                        @enderror
                    </div> 
                    <div class="form-group">
                        <label for="category1">Category 1 </label>
                        <input type="text" class="form-control" id="category1" name="category1" value="{{ $equipment->category1 }}"
                            placeholder="Enter category 1" >
                        @error('category1')
                            <div class="text-sm text-danger">{{ $message }}</div>
                        @enderror
                    </div> 
                    <div class="form-group">
                        <label for="category2">Category 2 </label>
                        <input type="text" class="form-control" id="category2" name="category2" value="{{ $equipment->category2 }}"
                            placeholder="Enter category 2" >
                        @error('category2')
                            <div class="text-sm text-danger">{{ $message }}</div>
                        @enderror
                    </div> 
                    <div class="form-group">
                        <label for="category3">Category 3 </label>
                        <input type="text" class="form-control" id="category3" name="category3" value="{{ $equipment->category3 }}"
                            placeholder="Enter category 3" >
                        @error('category3')
                            <div class="text-sm text-danger">{{ $message }}</div>
                        @enderror
                    </div> 
                    <div class="form-group">
                        <label for="quantity_in_stock">Quantity in Stock *</label>
                        <input type="number" class="form-control" id="quantity_in_stock" name="quantity_in_stock" value="{{ $equipment->quantity_in_stock }}"
                             required>
                        @error('quantity_in_stock')
                            <div class="text-sm text-danger">{{ $message }}</div>
                        @enderror

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
                imagePreview.innerHTML = `<img src="${e.target.result}" alt="Selected Image" class="img-fluid" style="width: 175px; height: 200px;">`;
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
                        <button name="submit" type="submit" class="btn btn-success">update</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection
