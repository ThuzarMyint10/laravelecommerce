@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Edit Category
                    <a href="{{ url('admin/category/create') }}" class="btn btn-primary btn-sm text-white float-end">BACK</a>
                </h3>
            </div>
            <div class="card-body">
                <form action="{{ url('admin/category/'.$category->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{--  for Update we need to use "PUT" Method  --}}
                    @method('PUT')
                    {{--  first row  --}}
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="name">Name</label>
                            <input type="text" name="name" value="{{ $category->name }}" class="form-control"/>
                            @error('name') <small class="text-danger">{{ $message }}</small>@enderror    
                            
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="slug">Slug</label>
                            <input type="text" name="slug" value="{{ $category->slug }}" class="form-control"/>
                            @error('slug') <small class="text-danger">{{ $message }}</small>       
                            @enderror
                        </div>
                    </div>
                    
                        <div class="col-md-12 mb-3">
                            <label for="description">Description</label>
                            <textarea type="text" name="description" class="form-control" rows="3">{{ $category->description }}</textarea>
                            @error('description') <small class="text-danger">{{ $message }}</small>       
                            @enderror
                        </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="image">Image</label>
                            <input type="file" name="image" class="form-control"/>
                            <img src="{{ asset('/uploads/category/'. $category->image ) }}" width="60px" height="60px"alt="">
                            @error('image') <small class="text-danger">{{ $message }}</small>       
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="status">Status</label><br>
                            <input type="checkbox" name="status" {{ $category->description == '1'?'checked':'' }}/>
                            @error('status') <small class="text-danger">{{ $message }}</small>       
                            @enderror
                        </div>
                    </div>
                    {{--  Meta Group  --}}
                        <div class="col-md-12">
                            <h4>SEO Tags</h4>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="meta_title">Meta Title</label>
                            <input type="text" name="meta_title" value="{{ $category->meta_title }}" class="form-control"/>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="meta_keyword">Meta Keyword</label>
                            <textarea type="text" name="meta_keyword" class="form-control" rows="3">{{ $category->meta_keyword }}</textarea>
                        </div>
                         <div class="col-md-12 mb-3">
                            <label for="meta_description">Meta Description</label>
                            <textarea type="text" name="meta_description" class="form-control" rows="3">{{ $category->meta_description }}</textarea>
                        </div>
                         <div class="col-md-12 mb-3">
                            <button type="submit" class="btn btn-primary float-end">Update</button>
                        </div>
                    </div>
                </form>
              
            </div>
        </div>
    </div>
</div>

@endsection