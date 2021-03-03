@extends('layouts.main')
 
@section('content')
    <div class="row" style="margin-top: 5rem;">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 8 CRUD Example from scratch - laravelcode.com</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('menu-items.create') }}"> Create New Post</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Description</th>
            <th>price</th>
            <th>imgae</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($data as $key => $value)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $value->title }}</td>
            <td>{{ \Str::limit($value->description, 100) }}</td>
            <td>{{ $value->price }}</td>
            <td>
                <img class="single-menu-item-image"  src="storage/images/menu-items/{{ $value->image }}" alt="">
            </td>
            <td>
                <form action="{{ route('menu-items.destroy',$value->id) }}" method="POST">   
                    <a class="btn btn-info" href="{{ route('menu-items.show',$value->id) }}">Show</a>    
                    <a class="btn btn-primary" href="{{ route('menu-items.edit',$value->id) }}">Edit</a>   
                    @csrf
                    @method('DELETE')      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>  
    <div class="table-pagination">
    {!! $data->links() !!}      
    </div>
@endsection