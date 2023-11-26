@extends('admin.main')

@section('header')
    <script src="ckeditor/ckeditor.js"></script>
@endsection

@section('content')
<form action="/admin/menu/edit/{{ $menu->id }}" method="post">
  @csrf
    <div class="card-body">

      <div class="form-group">
        <label for="menu">name</label>
        <input type="text" name="name" value="{{ $menu->name }}" class="form-control" id="menu">
      </div>

      <div class="form-group">
        <label for="menu">Parent section name</label>
        <select  name ="parent_id" class="form-control" id="menu">
        <option value="0" {{ $menu->parent_id === 0 ? ' selected' : ''}}>Parent section</option>
          @foreach ( $menus as $item)
          <option value="{{ $item->id }}"
            {{ $menu->parent_id === $item->id ? ' selected' : ''}}>
            {{ $item->name }}</option>

          @endforeach
        </select>
      </div>

      <div class="form-group">
        <label for="description">description</label>
        <textarea name="description"  class="form-control" id="description">{{ $menu->description }}</textarea>
      </div>

      <div class="form-group">
        <label for="content">content</label>
        <textarea name="content"  class="form-control" id="content" > {{ $menu->content }}</textarea>
      </div>

      <div class="form-group">
        <label>activation</label>

            <div class="custom-control custom-radio">
              <input class="custom-control-input" type="radio" id="active" name="active" value="1"
              {{ $menu->active === 1 ? 'checked' : '' }}>
              <label for="active" class="custom-control-label">active</label>
            </div>

            <div class="custom-control custom-radio">
              <input class="custom-control-input" type="radio" id="unactive" name="active" value="0"
              {{ $menu->active === 0 ? 'checked' : '' }} >
              <label for="unactive" class="custom-control-label">unactive</label>
            </div>

      </div>
    </div>
    <!-- /.card-body -->

    @include('admin.alert')

    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Update section</button>
    </div>
  </form>
@endsection

@section('footer')
  <script> CKEDITOR.replace('content') </script>
@endsection