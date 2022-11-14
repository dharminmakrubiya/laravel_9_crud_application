@extends('app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Categories</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Categories</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
                <div>

                    <div class="container-fluid">
                        <div class="animated fadeIn">
                            <div class="content-header">
                            </div>
                            <!--content-header-->


                            <style>
                                .error {
                                    color: red;
                                }
                            </style>

                            <div class="card">

                                <div class="card-body">
                                    <div class="card-header bg-white pl-0">
                                        <h5>Edit Product</h5>
                                    </div>

                                    <p class="mt-4">Edit Categories</p>

                                    <form action="{{ url('products/categories/update/' . $categories->id) }}" class="mt-5 " method="POST" enctype="multipart/form-data">

                                       @csrf
                                        @method('PUT')

                                        <div class="col-6">
                                            <div class="form-group row">
                                                <label for="title" class="col-4 col-form-label">Categories Name</label>
                                                <div class="col-8">
                                                    <input type="text" name="name" class="form-control" id=""
                                                        placeholder="Add categories name" value="{{ $categories->name }}">
                                                    @if ($errors->has('name'))
                                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                                        {{-- <span class="error">* @php echo $nameErr; @endphp> </span>   --}}
                                                    @endif
                                                </div>
                                            </div>



                                            <div class="form-group row">
                                                <label for="description" class="col-4 col-form-label">Categories
                                                    Status</label>
                                                <div class="col-8">
                                                    <!-- Default checked -->
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="customSwitch1" name="status"  value="{{ $categories->status }}">
                                                        <label class="custom-control-label" for="customSwitch1">active</label>
                                                    </div>
                                                    @if ($errors->has('status'))
                                                        <span class="text-danger">{{ $errors->first('status') }}</span>
                                                    @endif
                                                </div>
                                            </div>



                                        </div>

                                        <div class="card-footer bg-white d-flex justify-content-end">

                                            <a href="" class="btn btn-warning mr-2">Cancel</a>
                                            <button type="submit" class="btn btn-success">Update</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
