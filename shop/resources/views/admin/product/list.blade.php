@extends('admin.main')
@section('content')
<div class="container">
    <div class="row">
      <div class="col-12">
          <table class="table table-image">
            <thead>
              <tr>
                <th scope="col">Image</th>
                <th scope="col">Product Name</th>
                <th scope="col">Section Name</th>
                <th scope="col">Description</th>
                  <th scope="col">Original Price</th>
                <th scope="col">discount Price</th>                
                <th scope="col">active</th>
                <th scope="col">Update</th>

              </tr>
            </thead>

            @foreach ($products as $key => $product)
                <tbody>
                <tr>
                    <td width="100px">
                      <img src="{{ url('Storage/uploads/'. $product->thumb) }}" class="img-fluid img-thumbnail" alt="Sheep">
                    </td>
                    <td>{{ $product->name }}</td>
                    {{-- call name from menus fb through menu_id foreign key --}}
                    <td>{{ $product->menu->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->price_sale }}</td>
                    @if($product->active === 1 )
                      <td width='50px'><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                      <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                      <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
                    </svg></td>
                  @elseif( $product->active === 0 )
                    <td width='50px'></td>
                  @endif
                  <td>{{ $product->updated_at }}</td>
                  <td>
                    {{-- edit button --}}
                    <a class="btn btn-primary" href="edit/{{ $product->id }}">
                      <i class="fas fa-edit"></i>
                    </a>
    
                    {{-- calling onlick to catch delete event --}}
                    <a class="btn btn-danger" href="#" onclick="removeRow('{{ $product->id }}' , 'admin/product/destroy')" >
                      <i class="fas fa-trash"></i>
                    </a>
                  </td>
                  </tr>
                </tbody>
            @endforeach
        </table>   
      </div>
    </div>
  </div>

  <style>
    .container {
        padding: 2rem 0rem;
    }

    h4 {
        margin: 2rem 0rem 1rem;
    }

    .table-image {
        td, th {
            vertical-align: middle;
        }
    }
    img {
      border: 1px solid #ddd;
      border-radius: 4px;
      padding: 5px;
      width: 100px;
      height: 50px;
    }
  </style>
@endsection