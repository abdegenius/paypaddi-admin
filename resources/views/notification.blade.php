@extends('layouts.main')

@section('content')
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Notification </div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Send Notifications</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->
            <form method="POST" action="">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <h6 class="mb-0 text-uppercase">Notification text editor</h6>
                        <hr />
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Receiver Email Address</h6>
                            </div>
                            <div class="col-sm-9">
                                <input type="email" name="email" class="form-control" value="" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Sender Email Address</h6>
                            </div>
                            <div class="col-sm-9">
                                <input type="email" name="sender" class="form-control" value="" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Notification Title</h6>
                            </div>
                            <div class="col-sm-9">
                                <input type="text" name="title" class="form-control" value="Hi, Good Day John" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Action Text</h6>
                            </div>
                            <div class="col-sm-9">
                                <input type="text" name="action_text" class="form-control" value="Go Here" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Action URL</h6>
                            </div>
                            <div class="col-sm-9">
                                <input type="text" name="action_url" class="form-control"
                                    value="https://paypaddi.com/" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Image URL</h6>
                            </div>
                            <div class="col-sm-9">
                                <input type="text" name="image_url" class="form-control"
                                    value="https://paypaddi.com/jgjfvyu.jpg" />
                            </div>
                        </div>
                        <div class="row col-12">
                            <div class="form-group">
                                <textarea id="mytextarea" name="body">Hello, World!</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer p-4 bg-primary">
                        <button type="submit" class="btn btn-md btn-success">Send</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!--end page wrapper -->
@endsection
