@extends('admin.main')

@section('header')
    <script src="ckeditor/ckeditor.js"></script>
@endsection

@section('content')
<form action="/admin/menu/add" method="post">
  @csrf
    <div class="card-body">

      <div class="form-group">
        <label for="menu">Name</label>
        <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="menu" placeholder="Enter section name">
      </div>

      <div class="form-group">
        <label for="menu">parent section name</label>
        <select  name ="parent_id" class="form-control" id="menu">
          <option value="0"> Main Section</option>
          @foreach ( $menu as $item)
            <option value="{{ $item->id }}">{{ $item->name }}</option>
          @endforeach
        </select>
      </div>

      <div class="form-group">
        <label for="description">description</label>
        <textarea name="description"  class="form-control" id="description" placeholder="Enter short description">{{ old('description') }}</textarea>
      </div>

      <div class="form-group">
        <label for="content">content</label>
        <textarea name="content" class="form-control" id="content" placeholder="Enter content">{{ old('content') }}</textarea>
      </div>

      <div class="form-group">
        <label>activation</label>

            <div class="custom-control custom-radio">
              <input class="custom-control-input" type="radio" id="active" name="active" value="1">
              <label for="active" class="custom-control-label">active</label>
            </div>

            <div class="custom-control custom-radio">
              <input class="custom-control-input" type="radio" id="unactive" name="active" value="0">
              <label for="unactive" class="custom-control-label">unactive</label>
            </div>

      </div>
    </div>
    <!-- /.card-body -->

    @include('admin.alert')

    <div class="card-footer">
      <button type="submit" class="btn btn-primary">create section</button>
    </div>
  </form>
@endsection

@section('footer')
  <script> CKEDITOR.replace('content') </script>
@endsection