@extends('backend.admin.layouts.app')
@section('content')
    <!-- Page map -->
    <div class="page-header">
        <h3 class="page-title">
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Pages</button></a></li>
                <li class="breadcrumb-item active" aria-current="page">Home</li>
            </ol>
        </nav>
    </div>

    {{-- Table  --}}
    <div class="row">
        {{-- Content With Image  --}}
        <!-- Section 1 -->
        <div class="col-12 mb-3">
            <div class="preview-list">
                <div class="preview-item border-bottom">
                    <div class="preview-thumbnail">
                        <div class="preview-icon bg-primary">
                            <i class="mdi mdi-file-document"></i>
                        </div>
                    </div>
                    <div class="preview-item-content d-sm-flex flex-grow">
                        <div class="flex-grow">
                            <h6 class="preview-subject">Hero Section</h6>
                            <p class="text-muted mb-0">Header</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Content -->
        <div class="col-lg-12 grid-margin stretch-card ">
            <div class="card">
                <div class="card-body">
                    <ul class="navbar-nav d-inline mb-3">
                        <li class="breadcrumb-item p-2 col-lg-9 mb-3">
                            @if (count($cw_img->where('sec', 'home_sec_1')) < 1)
                                <a class="nav-link btn btn-success create-new-button px-3 addpage mr-1"
                                    data-bs-toggle="modal" data-bs-target=".cw_image" id="sec1"> + create </a>
                            @endif
                        </li>
                    </ul>
                    <div class="table-responsive">
                        <table class="table table-hover ">
                            @if (Session::has('success'))
                                <div class="alert-success p-3 mb-3">{{ Session::get('success') }}</div>
                            @endif
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Button name</th>
                                    <th>Button Link</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cw_img->where('sec', 'home_sec_1') as $postData)
                                    <tr>
                                        <td>{{ $postData->title }}</td>
                                        <td>{{ $postData->button_name }}</td>
                                        <td>{{ $postData->button_link }}</td>
                                        <td>{!! Str::limit(strip_tags($postData->des ?? 'N/A'), 20, '...') !!}</td>
                                        <td><img src="{!! asset('assets/img/uploaded/img/' . $postData->img ?? '') !!}"></td>
                                        <td>
                                            @if ($postData->status == 0)
                                                <p class="btn btn-sm btn-primary mb-0">Active</p>
                                            @else
                                                <p class="btn btn-sm btn-success mb-0">Deactive</p>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a type="button" id="sec1_edit" class="btn btn-outline-primary"
                                                    data-bs-toggle="modal" data-bs-target="#cw_edit_img{{ $postData->id }}">
                                                    <i class="mdi mdi-grease-pencil"></i>
                                                </a>

                                                <a type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                                                    data-bs-target="{{ '#home_sec_img' . $postData->id }}">
                                                    <i class="mdi mdi-delete"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>

                                    {{-- Delete Modal  --}}
                                    <div class="modal fade" id="home_sec_img{{ $postData->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel" style="color: #ac9f33;">
                                                        Delete Page</h5>
                                                    <a data-bs-dismiss="modal" aria-label="Close"> <i
                                                            class=" mdi mdi-close "></i></a>
                                                </div>
                                                <div class="modal-body" style="color: #cab562;">
                                                    Are you sure? Delete This Data.
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Cancel</button>
                                                    <a type="button" class="btn btn-danger"
                                                        href="{{ route('cw_image.delete', $postData->id) }}">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        {{-- Content With Icon --}}
        {{-- Section 2 --}}
        <div class="col-7 mb-3">
            <div class="preview-list">
                <div class="preview-item border-bottom">
                    <div class="preview-thumbnail">
                        <div class="preview-icon bg-primary">
                            <i class="mdi mdi-file-document"></i>
                        </div>
                    </div>
                    <div class="preview-item-content d-sm-flex flex-grow">
                        <div class="flex-grow">
                            <h6 class="preview-subject">Section 2 (Title)</h6>
                            <p class="text-muted mb-0">Service Title</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-5 mb-3">
            <div class="preview-list">
                <div class="preview-item border-bottom">
                    <div class="preview-thumbnail">
                        <div class="preview-icon bg-primary">
                            <i class="mdi mdi-file-document"></i>
                        </div>
                    </div>
                    <div class="preview-item-content d-sm-flex flex-grow">
                        <div class="flex-grow">
                            <h6 class="preview-subject">Section 2 (Content)</h6>
                            <p class="text-muted mb-0">This section will come from the <a href="">Service</a> page.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Content -->
        <div class="col-lg-12 grid-margin stretch-card ">
            <div class="card">
                <div class="card-body">
                    <ul class="navbar-nav d-inline mb-3">
                        <li class="breadcrumb-item p-2 col-lg-9 mb-3">
                            @if (count($cw_icon->where('sec', 'home_sec_2_title')) < 1)
                                <a class="nav-link btn btn-success create-new-button px-3 hide_sec6 mr-1"
                                    data-bs-toggle="modal" data-bs-target=".cw_icon" id="sec2"> + create </a>
                            @endif
                        </li>
                    </ul>
                    <div class="table-responsive">
                        <table class="table table-hover ">
                            @if (Session::has('success'))
                                <div class="alert-success p-3 mb-3">{{ Session::get('success') }}</div>
                            @endif
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cw_icon->where('sec', 'home_sec_2_title') as $postData)
                                    <tr>
                                        <td>{!! Str::limit(strip_tags($postData->title), 50, '...') !!}</td>
                                        <td>{!! Str::limit(strip_tags($postData->des), 50, '...') !!}</td>
                                        <td>
                                            @if ($postData->status == 0)
                                                <p class="btn btn-sm btn-primary mb-0">Active</p>
                                            @else
                                                <p class="btn btn-sm btn-success mb-0">Deactive</p>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a type="button" id="sec2_edit" class="btn btn-outline-primary"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#cw_edit_icon{{ $postData->id }}">
                                                    <i class="mdi mdi-grease-pencil"></i>
                                                </a>
                                                <a type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                                                    data-bs-target="{{ '#home_sec_icon' . $postData->id }}">
                                                    <i class="mdi mdi-delete"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="home_sec_icon{{ $postData->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel"
                                                        style="color: #ac9f33;">Delete Data</h5>
                                                    <a data-bs-dismiss="modal" aria-label="Close"> <i
                                                            class=" mdi mdi-close "></i></a>
                                                </div>
                                                <div class="modal-body" style="color: #cab562;">
                                                    Are you sure? Delete This Data.
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Cancel</button>
                                                    <a type="button" class="btn btn-danger"
                                                        href="{{ route('cw_icon.delete', $postData->id) }}">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        {{-- Content With Image  --}}
        <!-- Section 3 -->
        <div class="col-12 mb-3">
            <div class="preview-list">
                <div class="preview-item border-bottom">
                    <div class="preview-thumbnail">
                        <div class="preview-icon bg-primary">
                            <i class="mdi mdi-file-document"></i>
                        </div>
                    </div>
                    <div class="preview-item-content d-sm-flex flex-grow">
                        <div class="flex-grow">
                            <h6 class="preview-subject">Section 3</h6>
                            <p class="text-muted mb-0">About Section</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Content -->
        <div class="col-lg-12 grid-margin stretch-card ">
            <div class="card">
                <div class="card-body">
                    <ul class="navbar-nav d-inline mb-3">
                        <li class="breadcrumb-item p-2 col-lg-9 mb-3">
                            @if (count($cw_img->where('sec', 'home_sec_3')) < 1)
                                <a class="nav-link btn btn-success create-new-button px-3 addpage mr-1"
                                    data-bs-toggle="modal" data-bs-target=".cw_image" id="sec3"> + create </a>
                            @endif
                        </li>
                    </ul>
                    <div class="table-responsive">
                        <table class="table table-hover ">
                            @if (Session::has('success'))
                                <div class="alert-success p-3 mb-3">{{ Session::get('success') }}</div>
                            @endif
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Button name</th>
                                    <th>Button Link</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cw_img->where('sec', 'home_sec_3') as $postData)
                                    <tr>
                                        <td>{{ $postData->title }}</td>
                                        <td>{{ $postData->button_name }}</td>
                                        <td>{{ $postData->button_link }}</td>
                                        <td>{!! Str::limit(strip_tags($postData->des ?? 'N/A'), 20, '...') !!}</td>
                                        <td><img src="{!! asset('assets/img/uploaded/img/' . $postData->img ?? '') !!}"></td>
                                        <td>
                                            @if ($postData->status == 0)
                                                <p class="btn btn-sm btn-primary mb-0">Active</p>
                                            @else
                                                <p class="btn btn-sm btn-success mb-0">Deactive</p>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a type="button" id="sec3_edit" class="btn btn-outline-primary"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#cw_edit_img{{ $postData->id }}">
                                                    <i class="mdi mdi-grease-pencil"></i>
                                                </a>

                                                <a type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                                                    data-bs-target="{{ '#home_sec_img' . $postData->id }}">
                                                    <i class="mdi mdi-delete"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>

                                    {{-- Delete Modal  --}}
                                    <div class="modal fade" id="home_sec_img{{ $postData->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel"
                                                        style="color: #ac9f33;">
                                                        Delete Page</h5>
                                                    <a data-bs-dismiss="modal" aria-label="Close"> <i
                                                            class=" mdi mdi-close "></i></a>
                                                </div>
                                                <div class="modal-body" style="color: #cab562;">
                                                    Are you sure? Delete This Data.
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Cancel</button>
                                                    <a type="button" class="btn btn-danger"
                                                        href="{{ route('cw_image.delete', $postData->id) }}">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


        {{-- Content With Icon --}}
        {{-- Section 4  --}}
        <div class="col-7 mb-3">
            <div class="preview-list">
                <div class="preview-item border-bottom">
                    <div class="preview-thumbnail">
                        <div class="preview-icon bg-primary">
                            <i class="mdi mdi-file-document"></i>
                        </div>
                    </div>
                    <div class="preview-item-content d-sm-flex flex-grow">
                        <div class="flex-grow">
                            <h6 class="preview-subject">Section 4 (Title)</h6>
                            <p class="text-muted mb-0">Products Title</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-5 mb-3">
            <div class="preview-list">
                <div class="preview-item border-bottom">
                    <div class="preview-thumbnail">
                        <div class="preview-icon bg-primary">
                            <i class="mdi mdi-file-document"></i>
                        </div>
                    </div>
                    <div class="preview-item-content d-sm-flex flex-grow">
                        <div class="flex-grow">
                            <h6 class="preview-subject">Section 4 (Content)</h6>
                            <p class="text-muted mb-0">This section will come from the <a href="">Products</a>
                                page.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Content -->
        <div class="col-lg-12 grid-margin stretch-card ">
            <div class="card">
                <div class="card-body">
                    <ul class="navbar-nav d-inline mb-3">
                        <li class="breadcrumb-item p-2 col-lg-9 mb-3">
                            @if (count($cw_icon->where('sec', 'home_sec_4_title')) < 1)
                                <a class="nav-link btn btn-success create-new-button px-3 hide_sec6 mr-1"
                                    data-bs-toggle="modal" data-bs-target=".cw_icon" id="sec4"> + create </a>
                            @endif
                        </li>
                    </ul>
                    <div class="table-responsive">
                        <table class="table table-hover ">
                            @if (Session::has('success'))
                                <div class="alert-success p-3 mb-3">{{ Session::get('success') }}</div>
                            @endif
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cw_icon->where('sec', 'home_sec_4_title') as $postData)
                                    <tr>
                                        <td>{!! Str::limit(strip_tags($postData->title), 50, '...') !!}</td>
                                        <td>{!! Str::limit(strip_tags($postData->des ?? 'N/A'), 50, '...') !!}</td>
                                        <td>
                                            @if ($postData->status == 0)
                                                <p class="btn btn-sm btn-primary mb-0">Active</p>
                                            @else
                                                <p class="btn btn-sm btn-success mb-0">Deactive</p>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a type="button" id="sec4_edit" class="btn btn-outline-primary"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#cw_edit_icon{{ $postData->id }}">
                                                    <i class="mdi mdi-grease-pencil"></i>
                                                </a>
                                                <a type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                                                    data-bs-target="{{ '#home_sec_icon' . $postData->id }}">
                                                    <i class="mdi mdi-delete"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="home_sec_icon{{ $postData->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel"
                                                        style="color: #ac9f33;">Delete Data</h5>
                                                    <a data-bs-dismiss="modal" aria-label="Close"> <i
                                                            class=" mdi mdi-close "></i></a>
                                                </div>
                                                <div class="modal-body" style="color: #cab562;">
                                                    Are you sure? Delete This Data.
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Cancel</button>
                                                    <a type="button" class="btn btn-danger"
                                                        href="{{ route('cw_icon.delete', $postData->id) }}">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        {{-- Content With Image  --}}
        <!-- Section 5 -->
        <div class="col-12 mb-3">
            <div class="preview-list">
                <div class="preview-item border-bottom">
                    <div class="preview-thumbnail">
                        <div class="preview-icon bg-primary">
                            <i class="mdi mdi-file-document"></i>
                        </div>
                    </div>
                    <div class="preview-item-content d-sm-flex flex-grow">
                        <div class="flex-grow">
                            <h6 class="preview-subject">Section 5</h6>
                            <p class="text-muted mb-0">Get start a project</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Content -->
        <div class="col-lg-12 grid-margin stretch-card ">
            <div class="card">
                <div class="card-body">
                    <ul class="navbar-nav d-inline mb-3">
                        <li class="breadcrumb-item p-2 col-lg-9 mb-3">
                            @if (count($cw_img->where('sec', 'home_sec_5')) < 1)
                                <a class="nav-link btn btn-success create-new-button px-3 addpage mr-1"
                                    data-bs-toggle="modal" data-bs-target=".cw_image" id="sec5"> + create </a>
                            @endif
                        </li>
                    </ul>
                    <div class="table-responsive">
                        <table class="table table-hover ">
                            @if (Session::has('success'))
                                <div class="alert-success p-3 mb-3">{{ Session::get('success') }}</div>
                            @endif
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Button name</th>
                                    <th>Button Link</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cw_img->where('sec', 'home_sec_5') as $postData)
                                    <tr>
                                        <td>{{ $postData->title }}</td>
                                        <td>{{ $postData->button_name }}</td>
                                        <td>{{ $postData->button_link }}</td>
                                        <td><img src="{!! asset('assets/img/uploaded/img/' . $postData->img ?? '') !!}"></td>
                                        <td>
                                            @if ($postData->status == 0)
                                                <p class="btn btn-sm btn-primary mb-0">Active</p>
                                            @else
                                                <p class="btn btn-sm btn-success mb-0">Deactive</p>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a type="button" id="sec5_edit" class="btn btn-outline-primary"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#cw_edit_img{{ $postData->id }}">
                                                    <i class="mdi mdi-grease-pencil"></i>
                                                </a>

                                                <a type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                                                    data-bs-target="{{ '#home_sec_img' . $postData->id }}">
                                                    <i class="mdi mdi-delete"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>

                                    {{-- Delete Modal  --}}
                                    <div class="modal fade" id="home_sec_img{{ $postData->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel"
                                                        style="color: #ac9f33;">
                                                        Delete Page</h5>
                                                    <a data-bs-dismiss="modal" aria-label="Close"> <i
                                                            class=" mdi mdi-close "></i></a>
                                                </div>
                                                <div class="modal-body" style="color: #cab562;">
                                                    Are you sure? Delete This Data.
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Cancel</button>
                                                    <a type="button" class="btn btn-danger"
                                                        href="{{ route('cw_image.delete', $postData->id) }}">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        {{-- Content With Icon --}}
        {{-- Section 6  --}}
        <div class="col-7 mb-3">
            <div class="preview-list">
                <div class="preview-item border-bottom">
                    <div class="preview-thumbnail">
                        <div class="preview-icon bg-primary">
                            <i class="mdi mdi-file-document"></i>
                        </div>
                    </div>
                    <div class="preview-item-content d-sm-flex flex-grow">
                        <div class="flex-grow">
                            <h6 class="preview-subject">Section 6 (Title)</h6>
                            <p class="text-muted mb-0">Team Title</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-5 mb-3">
            <div class="preview-list">
                <div class="preview-item border-bottom">
                    <div class="preview-thumbnail">
                        <div class="preview-icon bg-primary">
                            <i class="mdi mdi-file-document"></i>
                        </div>
                    </div>
                    <div class="preview-item-content d-sm-flex flex-grow">
                        <div class="flex-grow">
                            <h6 class="preview-subject">Section 6 (Content)</h6>
                            <p class="text-muted mb-0">This section will come from the <a href="">About</a>
                                page.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Content -->
        <div class="col-lg-12 grid-margin stretch-card ">
            <div class="card">
                <div class="card-body">
                    <ul class="navbar-nav d-inline mb-3">
                        <li class="breadcrumb-item p-2 col-lg-9 mb-3">
                            @if (count($cw_icon->where('sec', 'home_sec_6_title')) < 1)
                                <a class="nav-link btn btn-success create-new-button px-3 hide_sec6 mr-1"
                                    data-bs-toggle="modal" data-bs-target=".cw_icon" id="sec6"> + create </a>
                            @endif
                        </li>
                    </ul>
                    <div class="table-responsive">
                        <table class="table table-hover ">
                            @if (Session::has('success'))
                                <div class="alert-success p-3 mb-3">{{ Session::get('success') }}</div>
                            @endif
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cw_icon->where('sec', 'home_sec_6_title') as $postData)
                                    <tr>
                                        <td>{!! Str::limit(strip_tags($postData->title), 50, '...') !!}</td>
                                        <td>{!! Str::limit(strip_tags($postData->des ?? 'N/A'), 50, '...') !!}</td>
                                        <td>
                                            @if ($postData->status == 0)
                                                <p class="btn btn-sm btn-primary mb-0">Active</p>
                                            @else
                                                <p class="btn btn-sm btn-success mb-0">Deactive</p>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a type="button" id="sec6_edit" class="btn btn-outline-primary"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#cw_edit_icon{{ $postData->id }}">
                                                    <i class="mdi mdi-grease-pencil"></i>
                                                </a>
                                                <a type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                                                    data-bs-target="{{ '#home_sec_icon' . $postData->id }}">
                                                    <i class="mdi mdi-delete"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="home_sec_icon{{ $postData->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel"
                                                        style="color: #ac9f33;">Delete Data</h5>
                                                    <a data-bs-dismiss="modal" aria-label="Close"> <i
                                                            class=" mdi mdi-close "></i></a>
                                                </div>
                                                <div class="modal-body" style="color: #cab562;">
                                                    Are you sure? Delete This Data.
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Cancel</button>
                                                    <a type="button" class="btn btn-danger"
                                                        href="{{ route('cw_icon.delete', $postData->id) }}">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        {{-- Section 7  --}}
        <div class="col-12 mb-3">
            <div class="preview-list">
                <div class="preview-item border-bottom">
                    <div class="preview-thumbnail">
                        <div class="preview-icon bg-primary">
                            <i class="mdi mdi-file-document"></i>
                        </div>
                    </div>
                    <div class="preview-item-content d-sm-flex flex-grow">
                        <div class="flex-grow">
                            <h6 class="preview-subject">Section 7 (Content)</h6>
                            <p class="text-muted mb-0">This section will come from the <a href="">Services</a>
                                page.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Content With Icon --}}
        {{-- Section 8  --}}
        <div class="col-5 mb-3">
            <div class="preview-list">
                <div class="preview-item border-bottom">
                    <div class="preview-thumbnail">
                        <div class="preview-icon bg-primary">
                            <i class="mdi mdi-file-document"></i>
                        </div>
                    </div>
                    <div class="preview-item-content d-sm-flex flex-grow">
                        <div class="flex-grow">
                            <h6 class="preview-subject">Section 8 (Title)</h6>
                            <p class="text-muted mb-0">Client Title</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-7 mb-3">
            <div class="preview-list">
                <div class="preview-item border-bottom">
                    <div class="preview-thumbnail">
                        <div class="preview-icon bg-primary">
                            <i class="mdi mdi-file-document"></i>
                        </div>
                    </div>
                    <div class="preview-item-content d-sm-flex flex-grow">
                        <div class="flex-grow">
                            <h6 class="preview-subject">Section 8 (Content)</h6>
                            <p class="text-muted mb-0">Our Client</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Content -->
        <div class="col-lg-5 grid-margin stretch-card ">
            <div class="card">
                <div class="card-body">
                    <ul class="navbar-nav d-inline mb-3">
                        <li class="breadcrumb-item p-2 col-lg-9 mb-3">
                            @if (count($cw_icon->where('sec', 'home_sec_8_title')) < 1)
                                <a class="nav-link btn btn-success create-new-button px-3 hide_sec6 mr-1"
                                    data-bs-toggle="modal" data-bs-target=".cw_icon" id="sec8"> + create </a>
                            @endif
                        </li>
                    </ul>
                    <div class="table-responsive">
                        <table class="table table-hover ">
                            @if (Session::has('success'))
                                <div class="alert-success p-3 mb-3">{{ Session::get('success') }}</div>
                            @endif
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cw_icon->where('sec', 'home_sec_8_title') as $postData)
                                    <tr>
                                        <td>{!! Str::limit(strip_tags($postData->title), 50, '...') !!}</td>
                                        <td>
                                            @if ($postData->status == 0)
                                                <p class="btn btn-sm btn-primary mb-0">Active</p>
                                            @else
                                                <p class="btn btn-sm btn-success mb-0">Deactive</p>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a type="button" id="sec8_edit" class="btn btn-outline-primary"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#cw_edit_icon{{ $postData->id }}">
                                                    <i class="mdi mdi-grease-pencil"></i>
                                                </a>
                                                <a type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                                                    data-bs-target="{{ '#home_sec_icon' . $postData->id }}">
                                                    <i class="mdi mdi-delete"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="home_sec_icon{{ $postData->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel"
                                                        style="color: #ac9f33;">Delete Data</h5>
                                                    <a data-bs-dismiss="modal" aria-label="Close"> <i
                                                            class=" mdi mdi-close "></i></a>
                                                </div>
                                                <div class="modal-body" style="color: #cab562;">
                                                    Are you sure? Delete This Data.
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Cancel</button>
                                                    <a type="button" class="btn btn-danger"
                                                        href="{{ route('cw_icon.delete', $postData->id) }}">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Content (U)-->
        <div class="col-lg-7 grid-margin stretch-card ">
            <div class="card">
                <div class="card-body">
                    <ul class="navbar-nav d-inline mb-3">
                        <li class="breadcrumb-item p-2 col-lg-9 mb-3">
                            {{-- @if (count($client) < 1) --}}
                                <a class="nav-link btn btn-success create-new-button px-3 mr-1" data-bs-toggle="modal"
                                    data-bs-target=".clientAdd" id=""> + create </a>
                            {{-- @endif --}}
                        </li>
                    </ul>
                    <div class="table-responsive">
                        <table class="table table-hover ">
                            @if (Session::has('success'))
                                <div class="alert-success p-3 mb-3">{{ Session::get('success') }}</div>
                            @endif
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($client as $postData)
                                    <tr>
                                        <td><img src="{!! asset('assets/img/uploaded/img/' . $postData->img ?? '') !!}"></td>
                                        <td>
                                            @if ($postData->status == 0)
                                                <p class="btn btn-sm btn-primary mb-0">Active</p>
                                            @else
                                                <p class="btn btn-sm btn-success mb-0">Deactive</p>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a type="button" id="sec6_edit" class="btn btn-outline-primary"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#client_edit{{ $postData->id }}">
                                                    <i class="mdi mdi-grease-pencil"></i>
                                                </a>
                                                <a type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                                                    data-bs-target="{{ '#client_delete' . $postData->id }}">
                                                    <i class="mdi mdi-delete"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    {{-- Edit Modal  --}}
                                    <div class="modal fade " id="client_edit{{ $postData->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true"
                                        style="padding-top: 20px; background: rgba(10, 10, 13, 0.8);">
                                        <div class="modal-dialog" style="max-width:700px !important;">
                                            <div class="modal-content ">
                                                <div class="modal-header">
                                                    <h4 class="modal-title ml-2" id="exampleModalLabel"
                                                        style="font-size:24px;">
                                                        Edit Modal</h4>
                                                </div>
                                                <div class="modal-body" style="color: #cab562;">
                                                    <form class="forms-sample"
                                                        action="{{ route('client.update', $postData->id) }}"
                                                        method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        <h4 class="ml-2 mb-3 display-5">Edit Data</h4>
                                                        <div class="row ml-2">
                                                            <div class="d-none">
                                                                <input type="text" name="page" value="{!! $postData->page !!}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group row">
                                                                    <label style="color:#c6b6b6;">Client Image &nbsp;
                                                                        &nbsp; &nbsp; </label>
                                                                    <input style="width:90%;" type="file"
                                                                        class="form-control p-1" name="img">
                                                                    <span class="text-danger">
                                                                        @error('img')
                                                                            {{ $message }}
                                                                        @enderror
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group row">
                                                                    <label style="color:#c6b6b6;">Status*</label>
                                                                    <select style="width: 90% " class="form-control"
                                                                        name="status">
                                                                        <option
                                                                            {{ $postData->status == 0 ? 'selected' : '' }}
                                                                            value="0">Active
                                                                        </option>
                                                                        <option
                                                                            {{ $postData->status == 1 ? 'selected' : '' }}
                                                                            value="1">
                                                                            Dactive
                                                                        </option>
                                                                    </select>
                                                                </div>
                                                                <span class="text-danger">
                                                                    @error('status')
                                                                        {{ $message }}
                                                                    @enderror
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="row mt-4">
                                                            <div class="col-md-12 ">
                                                                <button type="submit"
                                                                    class="btn btn-md btn-primary float-right mr-4 ">Submit</button>
                                                                <a data-bs-dismiss="modal" aria-label="Close"
                                                                    class="btn btn-md btn-danger float-right mr-2 show">Back</a>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- Delete Modal  --}}
                                    <div class="modal fade" id="client_delete{{ $postData->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel"
                                                        style="color: #ac9f33;">Delete Data</h5>
                                                    <a data-bs-dismiss="modal" aria-label="Close"> <i
                                                            class=" mdi mdi-close "></i></a>
                                                </div>
                                                <div class="modal-body" style="color: #cab562;">
                                                    Are you sure? Delete This Data.
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Cancel</button>
                                                    <a type="button" class="btn btn-danger"
                                                        href="{{ route('client.delete', $postData->id) }}">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        {{-- Content With Icon --}}
        {{-- Section 9  --}}
        <div class="col-5 mb-3">
            <div class="preview-list">
                <div class="preview-item border-bottom">
                    <div class="preview-thumbnail">
                        <div class="preview-icon bg-primary">
                            <i class="mdi mdi-file-document"></i>
                        </div>
                    </div>
                    <div class="preview-item-content d-sm-flex flex-grow">
                        <div class="flex-grow">
                            <h6 class="preview-subject">Section 9 (Title)</h6>
                            <p class="text-muted mb-0">Testimonial Title</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-7 mb-3">
            <div class="preview-list">
                <div class="preview-item border-bottom">
                    <div class="preview-thumbnail">
                        <div class="preview-icon bg-primary">
                            <i class="mdi mdi-file-document"></i>
                        </div>
                    </div>
                    <div class="preview-item-content d-sm-flex flex-grow">
                        <div class="flex-grow">
                            <h6 class="preview-subject">Section 9 (Content)</h6>
                            <p class="text-muted mb-0">Client Testimonial</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Title -->
        <div class="col-lg-5 grid-margin stretch-card ">
            <div class="card">
                <div class="card-body">
                    <ul class="navbar-nav d-inline mb-3">
                        <li class="breadcrumb-item p-2 col-lg-9 mb-3">
                            @if (count($cw_icon->where('sec', 'home_sec_9_title')) < 1)
                                <a class="nav-link btn btn-success create-new-button px-3 hide_sec6 mr-1"
                                    data-bs-toggle="modal" data-bs-target=".cw_icon" id="sec9_title"> + create </a>
                            @endif
                        </li>
                    </ul>
                    <div class="table-responsive">
                        <table class="table table-hover ">
                            @if (Session::has('success'))
                                <div class="alert-success p-3 mb-3">{{ Session::get('success') }}</div>
                            @endif
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cw_icon->where('sec', 'home_sec_9_title') as $postData)
                                    <tr>
                                        <td>{!! Str::limit(strip_tags($postData->title), 50, '...') !!}</td>
                                        <td>{!! Str::limit(strip_tags($postData->des ?? 'N/A'), 50, '...') !!}</td>
                                        <td>
                                            @if ($postData->status == 0)
                                                <p class="btn btn-sm btn-primary mb-0">Active</p>
                                            @else
                                                <p class="btn btn-sm btn-success mb-0">Deactive</p>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a type="button" id="sec9_edit_title" class="btn btn-outline-primary"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#cw_edit_icon{{ $postData->id }}">
                                                    <i class="mdi mdi-grease-pencil"></i>
                                                </a>
                                                <a type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                                                    data-bs-target="{{ '#home_sec_icon' . $postData->id }}">
                                                    <i class="mdi mdi-delete"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="home_sec_icon{{ $postData->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel"
                                                        style="color: #ac9f33;">Delete Data</h5>
                                                    <a data-bs-dismiss="modal" aria-label="Close"> <i
                                                            class=" mdi mdi-close "></i></a>
                                                </div>
                                                <div class="modal-body" style="color: #cab562;">
                                                    Are you sure? Delete This Data.
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Cancel</button>
                                                    <a type="button" class="btn btn-danger"
                                                        href="{{ route('cw_icon.delete', $postData->id) }}">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Content -->
        <div class="col-lg-7 grid-margin stretch-card ">
            <div class="card">
                <div class="card-body">
                    <ul class="navbar-nav d-inline mb-3">
                        <li class="breadcrumb-item p-2 col-lg-9 mb-3">
                            @if (count($cw_icon->where('sec', 'home_sec_9_content')) < 1)
                                <a class="nav-link btn btn-success create-new-button px-3 hide_sec6 mr-1"
                                    data-bs-toggle="modal" data-bs-target=".cw_icon" id="sec9_content"> + create </a>
                            @endif
                        </li>
                    </ul>
                    <div class="table-responsive">
                        <table class="table table-hover ">
                            @if (Session::has('success'))
                                <div class="alert-success p-3 mb-3">{{ Session::get('success') }}</div>
                            @endif
                            <thead>
                                <tr>
                                    <th>Profile</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cw_icon->where('sec', 'home_sec_9_content') as $postData)
                                    <tr>
                                        <td><img src="{!! asset('assets/img/uploaded/img/' . $postData->icon ?? '') !!}"></td>
                                        <td>{!! Str::limit(strip_tags($postData->title), 50, '...') !!}</td>
                                        <td>{!! Str::limit(strip_tags($postData->des ?? 'N/A'), 50, '...') !!}</td>
                                        <td>
                                            @if ($postData->status == 0)
                                                <p class="btn btn-sm btn-primary mb-0">Active</p>
                                            @else
                                                <p class="btn btn-sm btn-success mb-0">Deactive</p>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a type="button" id="sec9_edit_content" class="btn btn-outline-primary"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#cw_edit_icon{{ $postData->id }}">
                                                    <i class="mdi mdi-grease-pencil"></i>
                                                </a>
                                                <a type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                                                    data-bs-target="{{ '#home_sec_icon' . $postData->id }}">
                                                    <i class="mdi mdi-delete"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="home_sec_icon{{ $postData->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel"
                                                        style="color: #ac9f33;">Delete Data</h5>
                                                    <a data-bs-dismiss="modal" aria-label="Close"> <i
                                                            class=" mdi mdi-close "></i></a>
                                                </div>
                                                <div class="modal-body" style="color: #cab562;">
                                                    Are you sure? Delete This Data.
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Cancel</button>
                                                    <a type="button" class="btn btn-danger"
                                                        href="{{ route('cw_icon.delete', $postData->id) }}">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        {{-- Content With Icon --}}
        {{-- Section 8  --}}
        <div class="col-5 mb-3">
            <div class="preview-list">
                <div class="preview-item border-bottom">
                    <div class="preview-thumbnail">
                        <div class="preview-icon bg-primary">
                            <i class="mdi mdi-file-document"></i>
                        </div>
                    </div>
                    <div class="preview-item-content d-sm-flex flex-grow">
                        <div class="flex-grow">
                            <h6 class="preview-subject">Section 10 (Title)</h6>
                            <p class="text-muted mb-0">Happy Client Title</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-7 mb-3">
            <div class="preview-list">
                <div class="preview-item border-bottom">
                    <div class="preview-thumbnail">
                        <div class="preview-icon bg-primary">
                            <i class="mdi mdi-file-document"></i>
                        </div>
                    </div>
                    <div class="preview-item-content d-sm-flex flex-grow">
                        <div class="flex-grow">
                            <h6 class="preview-subject">Section 10 (Content)</h6>
                            <p class="text-muted mb-0">Happ Client Count</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Content -->
        <div class="col-lg-5 grid-margin stretch-card ">
            <div class="card">
                <div class="card-body">
                    <ul class="navbar-nav d-inline mb-3">
                        <li class="breadcrumb-item p-2 col-lg-9 mb-3">
                            @if (count($cw_icon->where('sec', 'home_sec_10_title')) < 1)
                                <a class="nav-link btn btn-success create-new-button px-3 mr-1" data-bs-toggle="modal"
                                    data-bs-target=".cw_icon" id="sec10_title"> + create </a>
                            @endif
                        </li>
                    </ul>
                    <div class="table-responsive">
                        <table class="table table-hover ">
                            @if (Session::has('success'))
                                <div class="alert-success p-3 mb-3">{{ Session::get('success') }}</div>
                            @endif
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cw_icon->where('sec', 'home_sec_10_title') as $postData)
                                    <tr>
                                        <td>{!! Str::limit(strip_tags($postData->title), 50, '...') !!}</td>
                                        <td>
                                            @if ($postData->status == 0)
                                                <p class="btn btn-sm btn-primary mb-0">Active</p>
                                            @else
                                                <p class="btn btn-sm btn-success mb-0">Deactive</p>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a type="button" id="sec10_edit_title" class="btn btn-outline-primary"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#cw_edit_icon{{ $postData->id }}">
                                                    <i class="mdi mdi-grease-pencil"></i>
                                                </a>
                                                <a type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                                                    data-bs-target="{{ '#home_sec_icon' . $postData->id }}">
                                                    <i class="mdi mdi-delete"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="home_sec_icon{{ $postData->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel"
                                                        style="color: #ac9f33;">Delete Data</h5>
                                                    <a data-bs-dismiss="modal" aria-label="Close"> <i
                                                            class=" mdi mdi-close "></i></a>
                                                </div>
                                                <div class="modal-body" style="color: #cab562;">
                                                    Are you sure? Delete This Data.
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Cancel</button>
                                                    <a type="button" class="btn btn-danger"
                                                        href="{{ route('cw_icon.delete', $postData->id) }}">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Content -->
        <div class="col-lg-7 grid-margin stretch-card ">
            <div class="card">
                <div class="card-body">
                    <ul class="navbar-nav d-inline mb-3">
                        <li class="breadcrumb-item p-2 col-lg-9 mb-3">
                            @if (count($cw_icon->where('sec', 'home_sec_10_content')) < 1)
                                <a class="nav-link btn btn-success create-new-button px-3 mr-1" data-bs-toggle="modal"
                                    data-bs-target=".cw_icon" id="sec10_content"> + create </a>
                            @endif
                        </li>
                    </ul>
                    <div class="table-responsive">
                        <table class="table table-hover ">
                            @if (Session::has('success'))
                                <div class="alert-success p-3 mb-3">{{ Session::get('success') }}</div>
                            @endif
                            <thead>
                                <tr>
                                    <th>Icon</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cw_icon->where('sec', 'home_sec_10_content') as $postData)
                                    <tr>
                                        <td>{!! Str::limit(strip_tags($postData->icon), 50, '...') !!}</td>
                                        <td>{!! Str::limit(strip_tags($postData->title), 50, '...') !!}</td>
                                        <td>{!! Str::limit(strip_tags($postData->des ?? 'N/A'), 50, '...') !!}</td>
                                        <td>
                                            @if ($postData->status == 0)
                                                <p class="btn btn-sm btn-primary mb-0">Active</p>
                                            @else
                                                <p class="btn btn-sm btn-success mb-0">Deactive</p>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a type="button" id="sec10_edit_content" class="btn btn-outline-primary"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#cw_edit_icon{{ $postData->id }}">
                                                    <i class="mdi mdi-grease-pencil"></i>
                                                </a>
                                                <a type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                                                    data-bs-target="{{ '#home_sec_icon' . $postData->id }}">
                                                    <i class="mdi mdi-delete"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="home_sec_icon{{ $postData->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel"
                                                        style="color: #ac9f33;">Delete Data</h5>
                                                    <a data-bs-dismiss="modal" aria-label="Close"> <i
                                                            class=" mdi mdi-close "></i></a>
                                                </div>
                                                <div class="modal-body" style="color: #cab562;">
                                                    Are you sure? Delete This Data.
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Cancel</button>
                                                    <a type="button" class="btn btn-danger"
                                                        href="{{ route('cw_icon.delete', $postData->id) }}">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        {{-- SEO --}}
        <div class="col-12 mb-3">
            <div class="preview-list">
                <div class="preview-item border-bottom">
                    <div class="preview-thumbnail">
                        <div class="preview-icon bg-primary">
                            <i class="mdi mdi-file-document"></i>
                        </div>
                    </div>
                    <div class="preview-item-content d-sm-flex flex-grow">
                        <div class="flex-grow">
                            <h6 class="preview-subject">SEO</h6>
                            <p class="text-muted mb-0">SEO</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- SEO -->
        <div class="col-lg-12 grid-margin stretch-card ">
            <div class="card">

                <div class="card-body">
                    <ul class="navbar-nav d-inline mb-3">
                        <li class="nav-item col-lg-3 float-right mb-3 mt-2 d-none" style="padding-right: 4.3%;">
                            <a class="nav-link btn btn-info create-new-button px-3">SEO</a>
                        </li>
                        <li class="breadcrumb-item p-2 col-lg-9 mb-3">
                            @if (count($seo) < 1)
                                <a class="nav-link btn btn-success create-new-button px-3 hide_sec10 mr-1"
                                    data-bs-toggle="modal" data-bs-target=".seo"> + create </a>
                            @endif
                        </li>
                    </ul>
                    <div class="table-responsive">
                        <table class="table table-hover ">
                            @if (Session::has('success'))
                                <div class="alert-success p-3 mb-3">{{ Session::get('success') }}</div>
                            @endif
                            <thead>
                                <tr>
                                    <th>Meta Title</th>
                                    <th>Meta Description</th>
                                    <th>Meta Keyword</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($seo as $postData)
                                    <tr>
                                        <td>{!! Str::limit(strip_tags($postData->meta_title), 30, '...') !!}</td>
                                        <td>{!! Str::limit(strip_tags($postData->meta_description), 50, '...') !!}</td>
                                        <td>{!! Str::limit(strip_tags($postData->meta_keyword), 50, '...') !!}</td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                                                    data-bs-target="{{ '#seo_e' . $postData->id }}">
                                                    <i class="mdi mdi-grease-pencil"></i>
                                                </a>
                                                <a type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                                                    data-bs-target="{{ '#seo_d' . $postData->id }}">
                                                    <i class="mdi mdi-delete"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- Delete -->
                                    <div class="modal fade" id="seo_d{{ $postData->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel"
                                                        style="color: #ac9f33;">Delete SEO</h5>
                                                    <a data-bs-dismiss="modal" aria-label="Close"> <i
                                                            class=" mdi mdi-close "></i></a>
                                                </div>
                                                <div class="modal-body" style="color: #cab562;">
                                                    Are you sure? Delete This Data.
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Cancel</button>
                                                    <a type="button" class="btn btn-danger"
                                                        href="{{ route('seo.delete', $postData->id) }}">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Edit -->
                                    <div class="modal fade seo" id="seo_e{{ $postData->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true"
                                        style="padding-top: 20px; background: rgba(10, 10, 13, 0.8);">
                                        <div class="modal-dialog" style="max-width:1000px !important;">
                                            <div class="modal-content ">
                                                <div class="modal-header">
                                                    <h4 class="modal-title ml-2" id="exampleModalLabel"
                                                        style="font-size:24px;">
                                                        SEO Edit</h4>
                                                </div>
                                                <div class="modal-body" style="color: #cab562;">
                                                    <form class="forms-sample"
                                                        action="{{ route('seo.update', $postData->id) }}" method="POST"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <h4 class="ml-2 mb-3 display-5">SEO Section</h4>
                                                        <!-- Page Name -->
                                                        <input class="d-none" name="page" type="text"
                                                            value="{!! $postData->page !!}">
                                                        <div class="row ml-2 ">
                                                            <div class="col-md-12 " style="padding: 0px 32px 0px 0px;">
                                                                <div class="form-group  ">
                                                                    <label for="exampleInputUsername1"
                                                                        style="color:#c6b6b6;">Meta Title </label>
                                                                    <textarea type="text" style="width:100% !important;" name="meta_title" row="3" class="form-control"
                                                                        placeholder="Meta Title">{{ $postData->meta_title }}</textarea>
                                                                    <span class="text-danger">
                                                                        @error('meta_title')
                                                                            {{ $message }}
                                                                        @enderror
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row ml-2 ">
                                                            <div class="col-md-12 " style="padding: 0px 32px 0px 0px;">
                                                                <div class="form-group  ">
                                                                    <label for="exampleInputUsername1"
                                                                        style="color:#c6b6b6;">Meta Description
                                                                    </label>
                                                                    <textarea type="text" name="meta_description" class="form-control summernote" placeholder="Meta description">{{ $postData->meta_description }}</textarea>
                                                                    <span class="text-danger">
                                                                        @error('meta_description')
                                                                            {{ $message }}
                                                                        @enderror
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row ml-2 ">
                                                            <div class="col-md-12 " style="padding: 0px 32px 0px 0px;">
                                                                <div class="form-group  ">
                                                                    <label for="exampleInputUsername1"
                                                                        style="color:#c6b6b6;">Meta Keyword</label>
                                                                    <textarea type="text" name="meta_keyword" class="form-control summernote" placeholder="meta_keyword">{{ $postData->meta_keyword }}</textarea>
                                                                    <span class="text-danger">
                                                                        @error('meta_keyword')
                                                                            {{ $message }}
                                                                        @enderror
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row mt-4">
                                                            <div class="col-md-12 ">
                                                                <button type="submit"
                                                                    class="btn btn-md btn-primary float-right mr-4 ">Submit</button>
                                                                <a data-bs-dismiss="modal" aria-label="Close"
                                                                    class="btn btn-md btn-danger float-right mr-2 show">Back</a>
                                                            </div>
                                                        </div>

                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- All same Add  Page -->

    <!-- Add Modal Content With Image -->
    <div class="modal fade cw_image" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true" style="padding-top: 20px; background: rgba(10, 10, 13, 0.8);">
        <div class="modal-dialog" style="max-width:1000px !important;">
            <div class="modal-content ">
                <div class="modal-header">
                    <h4 class="modal-title ml-2" id="exampleModalLabel" style="font-size:24px;">
                        Add Modal</h4>
                </div>
                <div class="modal-body" style="color: #cab562;">
                    <form class="forms-sample" action="{{ route('cw_image.create') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <h4 class="ml-2 mb-3 display-5">Add Data</h4>
                        <div class="row ml-2 d-none">
                            <div class="form-group row">
                                <input type="text" class="banner" name="banner">
                                <input style="width:90%; " type="text" maxlength="250" class="form-control "
                                    name="page" id="exampleInputUsername1" value="home" placeholder=" Page..."
                                    required>
                                <span class="text-danger">
                                    @error('page')
                                        {{ $message }}
                                    @enderror
                                </span>

                                <input style="width:90%; " type="text" maxlength="250" class="form-control"
                                    name="sec" id="sec_img" placeholder="Section..." required>
                                <span class="text-danger">
                                    @error('sec')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="row ml-2">
                            <div class="col-md-4 hide10">
                                <div class="form-group row">
                                    <label style="color:#c6b6b6;">Image &nbsp; &nbsp; &nbsp;</label>
                                    <input style="width:90%;" type="file" class="form-control p-1"
                                        name="img">
                                    <span class="text-danger">
                                        @error('img')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-4 hide10">
                                <div class="form-group row">
                                    <label style="color:#c6b6b6;">Alt Image</label>
                                    <input style="width:90%; " type="text" maxlength="250" class="form-control "
                                        name="alt_img" id="exampleInputUsername1" value="{{ old('alt_img') }}"
                                        placeholder=" Alt Image...">
                                    <span class="text-danger">
                                        @error('alt_img')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label style="color:#c6b6b6;">Title &nbsp; &nbsp; &nbsp;</label>
                                    <input style="width:90%; " type="text" maxlength="250" class="form-control "
                                        name="title" id="exampleInputUsername1" value="{{ old('title') }}"
                                        placeholder="title...">
                                    <span class="text-danger">
                                        @error('title')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label style="color:#c6b6b6;">Button name</label>
                                    <input style="width:90%; " type="text" maxlength="250" class="form-control "
                                        name="button_name" id="exampleInputUsername1"
                                        value="{{ old('button_name') }}" placeholder="Button Name...">
                                    <span class="text-danger">
                                        @error('button_name')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label style="color:#c6b6b6;">Button Link</label>
                                    <input style="width:90%; " type="text" maxlength="250" class="form-control "
                                        name="button_link" id="exampleInputUsername1"
                                        value="{{ old('button_link') }}" placeholder="Button Link...">
                                    <span class="text-danger">
                                        @error('button_link')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-4 ">
                                <div class="form-group row">
                                    <label style="color:#c6b6b6;">Status*</label>
                                    <select style="width:90%; " class="form-control" name="status">
                                        <option value="0">Active</option>
                                        <option value="1">Dactive</option>
                                    </select>
                                </div>
                                <span class="text-danger">
                                    @error('status')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>

                        <h4 class="ml-2 mb-3 mt-3 display-5 img_des">Description</h4>

                        <div class="row ml-2 img_des">
                            <div class="col-md-12 " style="padding: 0px 32px 0px 0px;">
                                <div class="form-group  ">
                                    <label for="exampleInputUsername1" style="color:#c6b6b6;">Description </label>
                                    <textarea onkeyup="md(this)" style="width:96.8% !important;" rows="7" maxlength="3500" type="text"
                                        name="des" class="form-control summernote" placeholder="Meta Description">{{ old('des') }}</textarea>
                                    <span class="text-danger">
                                        @error('des')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="md"
                                    style="float: right;margin-right: 23px;margin-top: -12px;color: #8c9095;font-size: 12px;">
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-12 ">
                                <button type="submit" class="btn btn-md btn-primary float-right mr-4 ">Submit</button>
                                <a data-bs-dismiss="modal" aria-label="Close"
                                    class="btn btn-md btn-danger float-right mr-2">Back</a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Modal Content With Icon -->
    <div class="modal fade cw_icon" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true" style="padding-top: 20px; background: rgba(10, 10, 13, 0.8);">
        <div class="modal-dialog" style="max-width:1000px !important;">
            <div class="modal-content ">
                <div class="modal-header">
                    <h4 class="modal-title ml-2" id="exampleModalLabel" style="font-size:24px;">
                        Add Modal</h4>
                </div>
                <div class="modal-body" style="color: #cab562;">
                    <form class="forms-sample" action="{{ route('cw_icon.create') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <h4 class="ml-2 mb-3 display-5">Add Data</h4>
                        <div class="row ml-2  d-none">
                            <div class="form-group row">
                                <input type="text" name="size" class="icon_size">
                                <input style="width:90%; " type="text" maxlength="250" class="form-control "
                                    name="page" id="exampleInputUsername1" value="home" placeholder=" Page..."
                                    required>
                                <span class="text-danger">
                                    @error('page')
                                        {{ $message }}
                                    @enderror
                                </span>
                                <input style="width:90%; " type="text" maxlength="250" class="form-control "
                                    name="sec" id="sec_icon" placeholder=" Section..." required>
                                <span class="text-danger">
                                    @error('sec')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="row ml-2">
                            <div class="col-md-4 icon_img" style="display:none;">
                                <div class="form-group row">
                                    <label style="color:#c6b6b6;">Image &nbsp; &nbsp; &nbsp; </label>
                                    <input style="width:90%;" type="file" class="form-control p-1"
                                        name="img">
                                    <span class="text-danger">
                                        @error('img')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-4 icon_link">
                                <div class="form-group row">
                                    <label style="color:#c6b6b6;">Icon Link </label>
                                    <input style="width:90%; " type="text" maxlength="250" class="form-control "
                                        name="icon" id="exampleInputUsername1" value="{{ old('icon') }}"
                                        placeholder="Icon Link...">
                                    <span class="text-danger">
                                        @error('icon')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-4  icon_title">
                                <div class="form-group row">
                                    <label style="color:#c6b6b6;">Title &nbsp; &nbsp; &nbsp;</label>
                                    <input style="width:90%; " type="text" maxlength="250" class="form-control "
                                        name="title" id="exampleInputUsername1" value="{{ old('title') }}"
                                        placeholder="title...">
                                    <span class="text-danger">
                                        @error('title')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label style="color:#c6b6b6;">Status*</label>
                                    <select style="width: 90% " class="form-control" name="status">
                                        <option value="0">Active</option>
                                        <option value="1">Dactive</option>
                                    </select>
                                </div>
                                <span class="text-danger">
                                    @error('status')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>

                        <h4 class="ml-2 mb-3 mt-3 display-5 icon_des">Description</h4>

                        <div class="row ml-2 icon_des">
                            <div class="col-md-12 " style="padding: 0px 32px 0px 0px;">
                                <div class="form-group  ">
                                    <label for="exampleInputUsername1" style="color:#c6b6b6;">Description </label>
                                    <textarea onkeyup="md(this)" style="width:96.8% !important;" rows="7" maxlength="3500" type="text"
                                        name="des" class="form-control summernote" placeholder="Meta Description">{{ old('des') }}</textarea>
                                    <span class="text-danger">
                                        @error('des')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="md"
                                    style="float: right;margin-right: 23px;margin-top: -12px;color: #8c9095;font-size: 12px;">
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-12 ">
                                <button type="submit" class="btn btn-md btn-primary float-right mr-4 ">Submit</button>
                                <a data-bs-dismiss="modal" aria-label="Close"
                                    class="btn btn-md btn-danger float-right mr-2 show">Back</a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Unique All Modal  --}}

    {{-- Client Modal  --}}
    <div class="modal fade clientAdd" id="exampleModal" tabindex="-1"aria-labelledby="exampleModalLabel"
        aria-hidden="true"style="padding-top: 20px; background: rgba(10, 10, 13, 0.8);">
        <div class="modal-dialog" style="max-width:700px !important;">
            <div class="modal-content ">
                <div class="modal-header">
                    <h4 class="modal-title ml-2" id="exampleModalLabel" style="font-size:24px;">
                        Add Modal</h4>
                </div>
                <div class="modal-body" style="color: #cab562;">
                    <form class="forms-sample" action="{{ route('client.create') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <h4 class="ml-2 mb-3 display-5">Add Data</h4>
                        <div class="row ml-2">
                            <div class="d-none">
                                <input type="text" name="page" value="home">
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label style="color:#c6b6b6;">Client Image &nbsp;
                                        &nbsp;
                                        &nbsp; </label>
                                    <input style="width:90%;" type="file" class="form-control p-1"
                                        name="img">
                                    <span class="text-danger">
                                        @error('img')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label style="color:#c6b6b6;">Status*</label>
                                    <select style="width: 90% " class="form-control" name="status">
                                        <option value="0">Active</option>
                                        <option value="1">Dactive</option>
                                    </select>
                                </div>
                                <span class="text-danger">
                                    @error('status')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-12 ">
                                <button type="submit" class="btn btn-md btn-primary float-right mr-4 ">Submit</button>
                                <a data-bs-dismiss="modal" aria-label="Close"
                                    class="btn btn-md btn-danger float-right mr-2 show">Back</a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Modal SEO -->
    <div class="modal fade seo" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true" style="padding-top: 20px; background: rgba(10, 10, 13, 0.8);">
        <div class="modal-dialog" style="max-width:1100px !important;">
            <div class="modal-content ">
                <div class="modal-header">
                    <h4 class="modal-title ml-2" id="exampleModalLabel" style="font-size:24px;">
                        SEO ADD
                </div>
                <div class="modal-body" style="color: #cab562;">
                    <form class="forms-sample" action="{{ route('seo.create') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <h4 class="ml-2 mb-3 display-5">SEO Section</h4>
                        <input class="d-none" type="text" name="page" value="home">
                        <div class="row ml-2 ">
                            <div class="col-md-12 " style="padding: 0px 32px 0px 0px;">
                                <div class="form-group  ">
                                    <label for="exampleInputUsername1" style="color:#c6b6b6;">Meta Title </label>
                                    <textarea type="text" style="width:100% !important;" name="meta_title" row="3" class="form-control"
                                        placeholder="Meta Title">{{ old('meta_title') }}</textarea>
                                    <span class="text-danger">
                                        @error('meta_title')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row ml-2 ">
                            <div class="col-md-12 " style="padding: 0px 32px 0px 0px;">
                                <div class="form-group  ">
                                    <label for="exampleInputUsername1" style="color:#c6b6b6;">Meta Description </label>
                                    <textarea type="text" name="meta_description" class="form-control summernote" placeholder="Meta description">{{ old('meta_description') }}</textarea>
                                    <span class="text-danger">
                                        @error('meta_description')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row ml-2 ">
                            <div class="col-md-12 " style="padding: 0px 32px 0px 0px;">
                                <div class="form-group  ">
                                    <label for="exampleInputUsername1" style="color:#c6b6b6;">Meta Keyword</label>
                                    <textarea type="text" name="meta_keyword" class="form-control summernote" placeholder="meta_keyword">{{ old('meta_keyword') }}</textarea>
                                    <span class="text-danger">
                                        @error('meta_keyword')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-12 ">
                                <button type="submit" class="btn btn-md btn-primary float-right mr-4 ">Submit</button>
                                <a data-bs-dismiss="modal" aria-label="Close"
                                    class="btn btn-md btn-danger float-right mr-2 show">Back</a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>


    {{-- Update Modal --}}


    <!-- Edit Modal Content With Image -->
    @foreach ($cw_img as $postData)
        <div class="modal fade " id="cw_edit_img{{ $postData->id }}" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true"
            style="padding-top: 20px; background: rgba(10, 10, 13, 0.8);">
            <div class="modal-dialog" style="max-width:1000px !important;">
                <div class="modal-content ">
                    <div class="modal-header">
                        <h4 class="modal-title ml-2" id="exampleModalLabel" style="font-size:24px;">
                            Edit Modal</h4>
                    </div>
                    <div class="modal-body" style="color: #cab562;">
                        <form class="forms-sample" action="{{ route('cw_image.update', $postData->id) }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            <h4 class="ml-2 mb-3 display-5">Edit Data</h4>
                            <div class="row ml-2 d-none">
                                <div class="form-group row">
                                    <input type="text" class="banner" name="banner">
                                    <input style="width:90%; " type="text" maxlength="250" class="form-control "
                                        name="page" id="exampleInputUsername1" value="{{ $postData->page }}"
                                        placeholder=" Page..." required>
                                    <span class="text-danger">
                                        @error('page')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                    <input style="width:90%; " type="text" maxlength="250" class="form-control "
                                        name="sec" value="{{ $postData->sec }}" placeholder=" Section..."
                                        required>
                                    <span class="text-danger">
                                        @error('sec')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="row ml-2">
                                <div class="col-md-4 hide10">
                                    <div class="form-group row">
                                        <label style="color:#c6b6b6;">Image &nbsp; &nbsp; &nbsp;</label>
                                        <input style="width:90%;" type="file" class="form-control p-1"
                                            name="img">
                                        <span class="text-danger">
                                            @error('img')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-4 hide10">
                                    <div class="form-group row">
                                        <label style="color:#c6b6b6;">Alt Image</label>
                                        <input style="width:90%; " type="text" maxlength="250"
                                            class="form-control " name="alt_img" id="exampleInputUsername1"
                                            value="{{ $postData->alt_img }}" placeholder=" Alt Image...">
                                        <span class="text-danger">
                                            @error('alt_img')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label style="color:#c6b6b6;">Title &nbsp; &nbsp; &nbsp;</label>
                                        <input style="width:90%; " type="text" maxlength="250"
                                            class="form-control " name="title" id="exampleInputUsername1"
                                            value="{{ $postData->title }}" placeholder="title...">
                                        <span class="text-danger">
                                            @error('title')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label style="color:#c6b6b6;">Button name</label>
                                        <input style="width:90%; " type="text" maxlength="250"
                                            class="form-control " name="button_name" id="exampleInputUsername1"
                                            value="{{ $postData->button_name }}" placeholder="Button Name...">
                                        <span class="text-danger">
                                            @error('button_name')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label style="color:#c6b6b6;">Button Link</label>
                                        <input style="width:90%; " type="text" maxlength="250"
                                            class="form-control " name="button_link" id="exampleInputUsername1"
                                            value="{{ $postData->button_link }}" placeholder="Button Link...">
                                        <span class="text-danger">
                                            @error('button_link')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-4 ">
                                    <div class="form-group row">
                                        <label style="color:#c6b6b6;">Status*</label>
                                        <select style="width:90%; " class="form-control" name="status">
                                            <option {{ $postData->status == 0 ? 'selected' : '' }} value="0">Active
                                            </option>
                                            <option {{ $postData->status == 1 ? 'selected' : '' }} value="1">
                                                Dactive
                                            </option>
                                        </select>
                                    </div>
                                    <span class="text-danger">
                                        @error('status')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>

                            <h4 class="ml-2 mb-3 mt-3 display-5 img_des">Description</h4>

                            <div class="row ml-2 img_des">
                                <div class="col-md-12 " style="padding: 0px 32px 0px 0px;">
                                    <div class="form-group  ">
                                        <label for="exampleInputUsername1" style="color:#c6b6b6;">Description </label>
                                        <textarea onkeyup="md(this)" style="width:96.8% !important;" rows="7" maxlength="3500" type="text"
                                            name="des" class="form-control summernote" placeholder="Meta Description">{{ $postData->des }}</textarea>
                                        <span class="text-danger">
                                            @error('des')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="md"
                                        style="float: right;margin-right: 23px;margin-top: -12px;color: #8c9095;font-size: 12px;">
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-md-12 ">
                                    <button type="submit"
                                        class="btn btn-md btn-primary float-right mr-4 ">Submit</button>
                                    <a data-bs-dismiss="modal" aria-label="Close"
                                        class="btn btn-md btn-danger float-right mr-2">Back</a>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <!-- Edit Modal Content With Icon -->
    @foreach ($cw_icon as $postData)
        <div class="modal fade " id="cw_edit_icon{{ $postData->id }}" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true"
            style="padding-top: 20px; background: rgba(10, 10, 13, 0.8);">
            <div class="modal-dialog" style="max-width:1000px !important;">
                <div class="modal-content ">
                    <div class="modal-header">
                        <h4 class="modal-title ml-2" id="exampleModalLabel" style="font-size:24px;">
                            Edit Modal</h4>
                    </div>
                    <div class="modal-body" style="color: #cab562;">
                        <form class="forms-sample" action="{{ route('cw_icon.update', $postData->id) }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            <h4 class="ml-2 mb-3 display-5">Edit Data</h4>
                            <div class="row ml-2  d-none">
                                <div class="form-group row">
                                    <input type="text" name="size" class="icon_size">
                                    <input style="width:90%; " type="text" maxlength="250" class="form-control "
                                        name="page" id="exampleInputUsername1" value="{{ $postData->page }}"
                                        placeholder=" Page..." required>
                                    <span class="text-danger">
                                        @error('page')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                    <input style="width:90%; " type="text" maxlength="250" class="form-control "
                                        name="sec" value="{{ $postData->sec }}" placeholder=" Section..."
                                        required>
                                    <span class="text-danger">
                                        @error('sec')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="row ml-2">
                                <div class="col-md-4  icon_img">
                                    <div class="form-group row">
                                        <label style="color:#c6b6b6;">Icon Image &nbsp; &nbsp; &nbsp; </label>
                                        <input style="width:90%;" type="file" class="form-control p-1"
                                            name="img">
                                        <span class="text-danger">
                                            @error('img')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-4 icon_link">
                                    <div class="form-group row">
                                        <label style="color:#c6b6b6;">Icon Link </label>
                                        <input style="width:90%; " type="text" maxlength="250"
                                            class="form-control " name="icon" id="exampleInputUsername1"
                                            value="{{ $postData->icon }}" placeholder="Icon Link...">
                                        <span class="text-danger">
                                            @error('icon')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-4  icon_title">
                                    <div class="form-group row">
                                        <label style="color:#c6b6b6;">Title &nbsp; &nbsp; &nbsp;</label>
                                        <input style="width:90%; " type="text" maxlength="250"
                                            class="form-control " name="title" id="exampleInputUsername1"
                                            value="{{ $postData->title }}" placeholder="title...">
                                        <span class="text-danger">
                                            @error('title')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label style="color:#c6b6b6;">Status*</label>
                                        <select style="width: 90% " class="form-control" name="status">
                                            <option {{ $postData->status == 0 ? 'selected' : '' }} value="0">Active
                                            </option>
                                            <option {{ $postData->status == 1 ? 'selected' : '' }} value="1">
                                                Dactive
                                            </option>
                                        </select>
                                    </div>
                                    <span class="text-danger">
                                        @error('status')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>

                            <h4 class="ml-2 mb-3 mt-3 display-5 icon_des">Description</h4>

                            <div class="row ml-2 icon_des">
                                <div class="col-md-12 " style="padding: 0px 32px 0px 0px;">
                                    <div class="form-group  ">
                                        <label for="exampleInputUsername1" style="color:#c6b6b6;">Description </label>
                                        <textarea onkeyup="md(this)" style="width:96.8% !important;" rows="7" maxlength="3500" type="text"
                                            name="des" class="form-control summernote" placeholder="Meta Description">{{ $postData->des }}</textarea>
                                        <span class="text-danger">
                                            @error('des')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="md"
                                        style="float: right;margin-right: 23px;margin-top: -12px;color: #8c9095;font-size: 12px;">
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-md-12 ">
                                    <button type="submit"
                                        class="btn btn-md btn-primary float-right mr-4 ">Submit</button>
                                    <a data-bs-dismiss="modal" aria-label="Close"
                                        class="btn btn-md btn-danger float-right mr-2 show">Back</a>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <script>
        $(document).ready(function() {
            // Image
            $('#sec1,#sec1_edit').click(function() {
                $("#sec_img").val('home_sec_1');
                $(".img_des").show();
                $(".banner").val('banner');
            });
            // Icon
            $('#sec2,#sec2_edit').click(function() {
                $("#sec_icon").val('home_sec_2_title');
                $(".icon_img,.icon_link").hide();
                $(".icon_des").show();
            });
            // Image
            $('#sec3,#sec3_edit').click(function() {
                $("#sec_img").val('home_sec_3');
                $(".img_des").show();
            });
            // Icon
            $('#sec4,#sec4_edit').click(function() {
                $("#sec_icon").val('home_sec_4_title');
                $(".icon_img,.icon_link").hide();
                $(".icon_des").show();
            });
            // Image
            $('#sec5,#sec5_edit').click(function() {
                $("#sec_img").val('home_sec_5');
                $(".img_des").hide();
                $(".banner").val('get');
            });
            // Icon
            $('#sec6,#sec6_edit').click(function() {
                $("#sec_icon").val('home_sec_6_title');
                $(".icon_img,.icon_link").hide();
                $(".icon_des").show();
            });
            // Icon
            $('#sec8,#sec8_edit').click(function() {
                $("#sec_icon").val('home_sec_8_title');
                $(".icon_img,.icon_link,.icon_des").hide();
            });
            // Icon
            $('#sec9_title,#sec9_edit_title').click(function() {
                $("#sec_icon").val('home_sec_9_title');
                $(".icon_img,.icon_link").hide();
                $(".icon_des").show();
            });
            // Icon
            $('#sec9_content,#sec9_edit_content').click(function() {
                $("#sec_icon").val('home_sec_9_content');
                $(".icon_size").val('profile');
                $(".icon_img,.icon_des").show();
                $(".icon_link").hide();
            });
            // Icon
            $('#sec10_title,#sec10_edit_title').click(function() {
                $("#sec_icon").val('home_sec_10_title');
                $(".icon_img,.icon_link,.icon_des").hide();
            });
            // Icon
            $('#sec10_content,#sec10_edit_content').click(function() {
                $("#sec_icon").val('home_sec_10_content');
                $(".icon_img").hide();
                $(".icon_des,.icon_link").show();
            });

        });
    </script>
@endsection
