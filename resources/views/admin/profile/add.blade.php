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
                    <h5 class="card-title">Add Profile</h5>
                </div>
                <form class="row g-3" enctype="multipart/form-data" method="POST" action="{{url('yn-admin/profiles')}}">
                    @csrf
                    <div class="col-12 col-md-6">
                        <label for="inputNanme4" class="form-label">Name</label>
                        <input type="text" class="form-control" id="inputNanme4" name="name">
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="inputEmail4" class="form-label">Organization</label>
                        <input type="text" class="form-control" id="inputEmail4" name="organization">
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="designation" class="form-label">Designation</label>
                        <input type="text" class="form-control" id="designation" name="designation">
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="#about" class="form-label">About</label>
                        <textarea id="about" name="about" class="form-control" style="height: 100px"></textarea>
                    </div>
                    <div class="col-12 col-md-6 th_input user">
                        <label for="#formFile" class="form-label">Profile Photo</label>
                        <input class="form-control" type="file" id="formFile" name="image_profile">
                    </div>
                    <div class="col-12 col-md-6 th_input user">
                        <label for="#formProfile" class="form-label">Profile Banner</label>
                        <input class="form-control" type="file" id="formProfile" name="image_banner">
                    </div>
                    <div class="col-12 col-md-6 th_input user">
                        <label for="#formPopup" class="form-label">Popup Image</label>
                        <input class="form-control" type="file" id="formPopup" name="image_popup">
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="age" class="form-label">Age</label>
                        <input type="text" class="form-control" id="age" name="age">
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" name="address">
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="category" class="form-label">Category</label>
                        <input type="text" class="form-control" id="category" name="category">
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</main>
<!-- End #main -->
@endsection