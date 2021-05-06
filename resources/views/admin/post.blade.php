@extends('admin/layout');
@section('container')
{{session('message')}}
<h1 class="mb-3">Category</h1>
<a href="{{url('/add-post')}}">
    <button type="button" class="btn btn-success">Add Post</button>
</a>
    <div class="row m-t-30">
        <div class="col-md-12">
            <div class="table-responsive m-b-40">
                <table class="table table-borderless table-data3">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Judul</th>
                            <th>Artikel</th>
                            <th>Created By</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $list)
                        <tr>
                            <td>{{$list->id}}</td>
                            <td>{{$list->judul}}</td>
                            <td>{{$list->artikel}}</td>
                            <td>{{$list->created_by}}</td>
                            <td>
                                <a href="{{url('/delete-post')}}/{{$list->id}}"><button type="button" class="btn btn-danger btn-sm">Delete</button></a>
                                <a href="{{url('/edit-post')}}/{{$list->id}}"><button type="button" class="btn btn-success btn-sm">Edit</button></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection