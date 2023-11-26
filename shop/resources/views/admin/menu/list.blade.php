@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">content</th>
            <th scope="col">Parent ID</th>
            <th scope="col">active</th>
          </tr>
        </thead>

        @foreach ($menu as $item)
        <tbody>
            <tr>
              <th scope="row" width='50px'>{{ $item->id }}</th>
              <td width='200px'>{{ $item->name }}</td>
              <td >{{ $item->description }}</td>
              <td >{{ $item->content }}</td>
              <td width='100px'>{{ $item->parent_id }}</td>
              @if($item->active === 1 )
                <td width='50px'><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                  <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                  <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
                </svg></td>
              @elseif( $item->active === 0 )
                <td width='50px'></td>
              @endif
              <td>
                {{-- edit button --}}
                <a class="btn btn-primary" href="edit/{{ $item->id }}">
                  <i class="fas fa-edit"></i>
                </a>

                {{-- calling onlick to catch delete event --}}
                <a class="btn btn-danger" href="#" onclick="removeRow('{{ $item->id }}' , 'admin/menu/destroy')" >
                  <i class="fas fa-trash"></i>
                </a>
              </td>
            </tr>
        </tbody>
        @endforeach

      </table>
@endsection