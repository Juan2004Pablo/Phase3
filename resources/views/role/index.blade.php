@extends('plantilla.admin')

@section('title','Administration of roles')

@section('breadcrumb')
    <li class="breadcrumb-item active">@yield('title')</li>
@endsection

@section('content')
    <div id="confirmdelete" class="row">


        @include('custom.modal_delete')
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-header"><h2>List of Roles</h2></div>

                    <div class="card-body">
                            <a href="{{route('role.create')}}"
                               class="btn btn-primary float-right"
                            >Create
                            </a>
                            <br><br>
                        @include('custom.message')


                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Description</th>
                                <th colspan="3"></th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($roles as $role)
                                <tr>
                                    <th scope="row">{{ $role->id }}</th>
                                    <td>{{ $role->name }}</td>
                                    <td>{{ $role->description }}</td>

                                    <td>
                                        <a class="btn btn-info" href="{{ route('role.show',$role->id) }}">Show</a>
                                    </td>
                                    <td>
                                        
                                        <a class="btn btn-success"
                                           href="{{ route('role.edit',$role->id) }}">Edit</a>
                                        
                                    </td>
                                    <td>
                                        <form action="{{ route('role.destroy',$role->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach


                            </tbody>
                        </table>

                        {{ $roles->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
