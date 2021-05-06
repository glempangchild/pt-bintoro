@extends('admin/layout');
@section('container')
<h3 class="mb-3">Manage Category</h3>
<a href="{{url('/post')}}">
    <button type="button" class="btn btn-success">Back</button>
</a>
    <div class="row mt-4">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">Manage Post</div>
                <div class="card-body">
                    <form action="{{url('/post')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="category_name" class="control-label mb-1">Judul</label>
                            <input id="category_name" value="" name="judul" type="text" class="form-control" aria-required="true" aria-invalid="false">
                            @error('judul')
                                <div class="alert alert-danger" role="alert">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Isi Artikel</label>
                            <textarea class="form-control" id="artikel" name="artikel" rows="3"></textarea>
                             @error('artikel')
                                <div class="alert alert-danger" role="alert">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div>
                            <button id="category-button" type="submit" class="btn btn-lg btn-info btn-block">
                                Submit
                            </button>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection