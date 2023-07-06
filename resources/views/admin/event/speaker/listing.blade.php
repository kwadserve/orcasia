@extends('admin')
@section('title','ORCA | Organisation for Research on China and Asia')
@section('meta_keywords', 'ORCA')
@section('meta_description', 'ORCA')

@section('content')
<!-- Start #main -->
<main id="main" class="main">
    <section class="section">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <h5 class="card-title">Add Speaker</h5>
                </div>
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form class="row g-3" enctype="multipart/form-data" method="POST" action="{{url('yn-admin/event/speaker')}}">
                    @csrf
                    <div class="col-12 col-md-6">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="col-12 col-md-6 th_input_content">
                        <label for="#formFile1" class="form-label">Image</label>
                        <input accept="image/*" class="form-control" type="file" id="formFile1" name="image">
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="designation" class="form-label">Designation</label>
                        <input type="text" class="form-control" id="designation" name="designation">
                    </div>
                    <div class="col-12">
                        <label for="content" class="form-label">Bio</label>
                        <textarea id="content" name="content" class="form-control" style="height: 100px"></textarea>
                    </div>
                    <div class="text-start">
                        <button type="submit" class="btn btn-primary">Add</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <section class="section">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <h5 class="card-title">Speakers</h5>
                </div>
                
                <table class="table table-responsive align-middle">
                    <thead>
                        <tr>
                            <!-- <th>#</th> -->
                            <th>id</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Designation</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $count = 1;?>
                        @foreach ($speakers as $speaker)
                            <tr>
                                <!-- <th><?=$count?></th> -->
                                <td> {{ $speaker->id }} </td>
                                <td>
                                    @if($speaker->image != null)
                                        <img class="" style="height:100px;widht:100px;" src="{{url('images/event/speaker/'.$speaker->image)}}" alt="">
                                    @else
                                        {{'-'}}
                                    @endif
                                </td>
                                <td> {{ $speaker->name }}</td>
                                <td> {{ $speaker->designation }}</td>
                                <td>
                                    <a href="{{ url('yn-admin/event/speaker') }}/{{ $speaker->id }}/edit" class="btn btn-primary rounded-pill btn-sm">Edit</a>
                                    <button data-bs-toggle="modal" data-id="{{$speaker->id}}" data-aurl="{{ url('check-category') }}" data-url="{{ url('yn-admin/event/speaker/'.$speaker['id']) }}"
                                    data-bs-target="#category_delete_modal" class="btn btn-danger rounded-pill btn-sm">Delete</button>
                                </td>
                            </tr>
                        <?php $count++;?>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</main>
<!-- End #main -->
@include('admin.category.delete')
@endsection