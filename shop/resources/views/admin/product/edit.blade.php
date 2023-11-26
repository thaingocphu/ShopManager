@extends('admin.main')

@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
    <form action="/admin/product/edit/{{ $product->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Product name</label>
                        <input type="text" name="name" value="{{ $product->name }}"  class="form-control">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Section</label>
                        <select class="form-control" name="menu_id">
                            @foreach($menu as $item)
                                <option value="{{ $item->id }}"{{ $product->menu_id == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                            @endforeach                        
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Original Price</label>
                        <input type="number" name="price" value="{{ $product->price }}" class="form-control" >
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Sale off price</label>
                        <input type="number" name="price_sale" value="{{ $product->price_sale }}"  class="form-control" >
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label>Description</label>
                <textarea name="description" class="form-control">{{ $product->description }}</textarea>
            </div>

            <div class="form-group">
                <label>Content</label>
                <textarea name="content" id="content"  class="form-control">{{ $product->content }}</textarea>
            </div>

            <div class="form-group">
                <label >Image product</label>
                <input class="form-control" type="file"   name="image">
            </div>

            <div class="form-group">
                <label>Activation</label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="1" type="radio" id="active" name="active" {{ $product->active === 1 ? 'checked' : '' }}>
                    <label for="active" class="custom-control-label">active</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="0" type="radio" id="unactive" name="active" {{ $product->active === 0 ? 'checked' : '' }}>
                    <label for="unactive" class="custom-control-label">unactive</label>
                </div>
            </div>

        </div>

        @include('admin.alert')

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Update Product</button>
        </div>
    </form>
@endsection

@section('footer')
    <script>
        CKEDITOR.replace('content');
    </script>
@endsection