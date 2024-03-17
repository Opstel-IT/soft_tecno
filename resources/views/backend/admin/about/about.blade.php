@extends('backend.admin.layouts.app')
@section('content')
    <!-- Page map -->
    <div class="page-header">
        <h3 class="page-title">
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Pages</button></a></li>
                <li class="breadcrumb-item active" aria-current="page">About</li>
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
                            @if (count($cw_img->where('sec', 'about_sec_1')) < 1)
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
                                @foreach ($cw_img->where('sec', 'about_sec_1') as $postData)
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

        {{-- Content With Image  --}}
        <!-- Section 2 -->
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
                            <h6 class="preview-subject">Section 2</h6>
                            <p class="text-muted mb-0">About Us</p>
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
                            @if (count($cw_img->where('sec', 'about_sec_2')) < 1)
                                <a class="nav-link btn btn-success create-new-button px-3 addpage mr-1"
                                    data-bs-toggle="modal" data-bs-target=".cw_image" id="sec2"> + create </a>
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
                                @foreach ($cw_img->where('sec', 'about_sec_2') as $postData)
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
                                                <a type="button" id="sec2_edit" class="btn btn-outline-primary"
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

        {{-- Section 3  --}}
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
                            <p class="text-muted mb-0">This section will come from the <a href="{!! route('Admin.home') !!}">Home</a>
                                page Section 10.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Section 4 Team (U) --}}
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
                            <h6 class="preview-subject">Section 4 (Team Title)</h6>
                            <p class="text-muted mb-0">This section will come from the <a href="{!! route('Admin.home') !!}">Home</a>
                                page Section 6.</p>
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
                            <h6 class="preview-subject">Section 4</h6>
                            <p class="text-muted mb-0">Our Team Member</p>
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
                            {{-- @if (count($team) < 1) --}}
                                <a class="nav-link btn btn-success create-new-button px-3 addpage mr-1"
                                    data-bs-toggle="modal" data-bs-target=".Team" id="sec4"> + create </a>
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
                                    <th>Name</th>
                                    <th>Rank</th>
                                    <th>Image</th>
                                    <th>Social Link-1</th>
                                    <th>Social Icon-1</th>
                                    <th>Social Link-2</th>
                                    <th>Social Icon-2</th>
                                    <th>Social Link-3</th>
                                    <th>Social Icon-3</th>
                                    <th>Social Link-4</th>
                                    <th>Social Icon-4</th>
                                    <th>Position</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($team as $postData)
                                    <tr>
                                        <td>{{ $postData->name }}</td>
                                        <td>{{ $postData->rank }}</td>
                                        <td><img src="{!! asset('assets/img/uploaded/img/' . $postData->img ?? '') !!}"></td>
                                        <td>{!! Str::limit(strip_tags($postData->social_link1 ?? 'N/A'), 20, '...') !!}</td>
                                        <td>{!! Str::limit(strip_tags($postData->social1 ?? 'N/A'), 20, '...') !!}</td>
                                        <td>{!! Str::limit(strip_tags($postData->social_link2 ?? 'N/A'), 20, '...') !!}</td>
                                        <td>{!! Str::limit(strip_tags($postData->social2 ?? 'N/A'), 20, '...') !!}</td>
                                        <td>{!! Str::limit(strip_tags($postData->social_link3 ?? 'N/A'), 20, '...') !!}</td>
                                        <td>{!! Str::limit(strip_tags($postData->social3 ?? 'N/A'), 20, '...') !!}</td>
                                        <td>{!! Str::limit(strip_tags($postData->social_link4 ?? 'N/A'), 20, '...') !!}</td>
                                        <td>{!! Str::limit(strip_tags($postData->social4 ?? 'N/A'), 20, '...') !!}</td>
                                        <td>
                                            @if ($postData->position == 0)
                                                <p class="btn btn-sm btn-primary mb-0">Member</p>
                                            @else
                                                <p class="btn btn-sm btn-success mb-0">Leader</p>
                                            @endif
                                        </td>
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
                                                    data-bs-toggle="modal" data-bs-target="#team_edit{{ $postData->id }}">
                                                    <i class="mdi mdi-grease-pencil"></i>
                                                </a>

                                                <a type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                                                    data-bs-target="{{ '#team_delete' . $postData->id }}">
                                                    <i class="mdi mdi-delete"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    {{-- Update Modal --}}
                                    <div class="modal fade " id="team_edit{{ $postData->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true"
                                        style="padding-top: 20px; background: rgba(10, 10, 13, 0.8);">
                                        <div class="modal-dialog" style="max-width:1000px !important;">
                                            <div class="modal-content ">
                                                <div class="modal-header">
                                                    <h4 class="modal-title ml-2" id="exampleModalLabel" style="font-size:24px;">
                                                        Edit Modal</h4>
                                                </div>
                                                <div class="modal-body" style="color: #cab562;">
                                                    <form class="forms-sample" action="{{ route('team.update', $postData->id) }}"
                                                        method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        <h4 class="ml-2 mb-3 display-5">Edit Data</h4>
                                                        <div class="row ml-2">
                                                            <div class="col-md-4">
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
                                                            <div class="col-md-4">
                                                                <div class="form-group row">
                                                                    <label style="color:#c6b6b6;">Name &nbsp; &nbsp; &nbsp;</label>
                                                                    <input style="width:90%; " type="text" maxlength="250" class="form-control "
                                                                        name="name" id="exampleInputUsername1" value="{!! $postData->name !!}"
                                                                        placeholder="Name...">
                                                                    <span class="text-danger">
                                                                        @error('name')
                                                                            {{ $message }}
                                                                        @enderror
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group row">
                                                                    <label style="color:#c6b6b6;">Rank</label>
                                                                    <input style="width:90%; " type="text" maxlength="250" class="form-control "
                                                                        name="rank" id="exampleInputUsername1"
                                                                        value="{!! $postData->rank !!}" placeholder="Rank...">
                                                                    <span class="text-danger">
                                                                        @error('rank')
                                                                            {{ $message }}
                                                                        @enderror
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group row">
                                                                    <label style="color:#c6b6b6;">Social Link 1</label>
                                                                    <input style="width:90%; " type="text" maxlength="250" class="form-control "
                                                                        name="social_link1" id="exampleInputUsername1"
                                                                        value="{!! $postData->social_link1 !!}" placeholder="Social Link...">
                                                                    <span class="text-danger">
                                                                        @error('social_link1')
                                                                            {{ $message }}
                                                                        @enderror
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group row">
                                                                    <label style="color:#c6b6b6;">Social Icon 1</label>
                                                                    <input style="width:90%; " type="text" maxlength="250" class="form-control "
                                                                        name="social1" id="exampleInputUsername1"
                                                                        value="{!! $postData->social1 !!}" placeholder="Social Icon...">
                                                                    <span class="text-danger">
                                                                        @error('social1')
                                                                            {{ $message }}
                                                                        @enderror
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group row">
                                                                    <label style="color:#c6b6b6;">Social Link 2</label>
                                                                    <input style="width:90%; " type="text" maxlength="250" class="form-control "
                                                                        name="social_link2" id="exampleInputUsername1"
                                                                        value="{!! $postData->social_link2 !!}" placeholder="Social Link...">
                                                                    <span class="text-danger">
                                                                        @error('social_link2')
                                                                            {{ $message }}
                                                                        @enderror
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group row">
                                                                    <label style="color:#c6b6b6;">Social Icon 2</label>
                                                                    <input style="width:90%; " type="text" maxlength="250" class="form-control "
                                                                        name="social2" id="exampleInputUsername1"
                                                                        value="{!! $postData->social2 !!}" placeholder="Social Icon...">
                                                                    <span class="text-danger">
                                                                        @error('social2')
                                                                            {{ $message }}
                                                                        @enderror
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group row">
                                                                    <label style="color:#c6b6b6;">Social Link 3</label>
                                                                    <input style="width:90%; " type="text" maxlength="250" class="form-control "
                                                                        name="social_link3" id="exampleInputUsername1"
                                                                        value="{!! $postData->social_link3 !!}" placeholder="Social Link...">
                                                                    <span class="text-danger">
                                                                        @error('social_link3')
                                                                            {{ $message }}
                                                                        @enderror
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group row">
                                                                    <label style="color:#c6b6b6;">Social Icon 3</label>
                                                                    <input style="width:90%; " type="text" maxlength="250" class="form-control "
                                                                        name="social3" id="exampleInputUsername1"
                                                                        value="{!! $postData->social3 !!}" placeholder="Social Icon...">
                                                                    <span class="text-danger">
                                                                        @error('social3')
                                                                            {{ $message }}
                                                                        @enderror
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group row">
                                                                    <label style="color:#c6b6b6;">Social Link 4</label>
                                                                    <input style="width:90%; " type="text" maxlength="250" class="form-control "
                                                                        name="social_link4" id="exampleInputUsername1"
                                                                        value="{!! $postData->social_link4 !!}" placeholder="Social Link...">
                                                                    <span class="text-danger">
                                                                        @error('social_link4')
                                                                            {{ $message }}
                                                                        @enderror
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group row">
                                                                    <label style="color:#c6b6b6;">Social Icon 4</label>
                                                                    <input style="width:90%; " type="text" maxlength="250" class="form-control "
                                                                        name="social4" id="exampleInputUsername1"
                                                                        value="{!! $postData->social4 !!}" placeholder="Social Icon...">
                                                                    <span class="text-danger">
                                                                        @error('social4')
                                                                            {{ $message }}
                                                                        @enderror
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 ">
                                                                <div class="form-group row">
                                                                    <label style="color:#c6b6b6;">Position*</label>
                                                                    <select style="width:90%; " class="form-control" name="position">
                                                                        <option {{ $postData->position == 0 ? 'selected' : '' }} value="0">Member</option>
                                                                        <option {{ $postData->position == 1 ? 'selected' : '' }} value="1">Leader</option>
                                                                    </select>
                                                                </div>
                                                                <span class="text-danger">
                                                                    @error('position')
                                                                        {{ $message }}
                                                                    @enderror
                                                                </span>
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
                                    {{-- Delete Modal  --}}
                                    <div class="modal fade" id="team_delete{{ $postData->id }}" tabindex="-1"
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
                                                        href="{{ route('team.delete', $postData->id) }}">Delete</a>
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
                            <p class="text-muted mb-0">Our Goal</p>
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
                            @if (count($cw_img->where('sec', 'about_sec_5')) < 1)
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
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cw_img->where('sec', 'about_sec_5') as $postData)
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
                                                <a type="button" id="sec5_edit" class="btn btn-outline-primary"
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

        {{-- Section 6  --}}
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
                            <h6 class="preview-subject">Section 6 (Testimonial)</h6>
                            <p class="text-muted mb-0">This section will come from the <a href="{!! route('Admin.home') !!}">Home</a>
                                page Section 9.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- SEO  --}}
        <div class="d-none">
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
                                                    <a type="button" class="btn btn-outline-primary"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="{{ '#seo_e' . $postData->id }}">
                                                        <i class="mdi mdi-grease-pencil"></i>
                                                    </a>
                                                    <a type="button" class="btn btn-outline-danger"
                                                        data-bs-toggle="modal"
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
                                                            SEO Edit
                                                    </div>
                                                    <div class="modal-body" style="color: #cab562;">
                                                        <form class="forms-sample"
                                                            action="{{ route('seo.update', $postData->id) }}"
                                                            method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            <h4 class="ml-2 mb-3 display-5">SEO Section</h4>
                                                            <!-- Page Name -->
                                                            <input class="d-none" name="page" type="text"
                                                                value="{!! $postData->page !!}">
                                                            <div class="row ml-2 ">
                                                                <div class="col-md-12 "
                                                                    style="padding: 0px 32px 0px 0px;">
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
                                                                <div class="col-md-12 "
                                                                    style="padding: 0px 32px 0px 0px;">
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
                                                                <div class="col-md-12 "
                                                                    style="padding: 0px 32px 0px 0px;">
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
                                    name="page" id="exampleInputUsername1" value="about" placeholder=" Page..."
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
                        <input class="d-none" type="text" name="page" value="about">
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

    {{-- Unique All Modal --}}
    <div class="modal fade Team" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true" style="padding-top: 20px; background: rgba(10, 10, 13, 0.8);">
        <div class="modal-dialog" style="max-width:1000px !important;">
            <div class="modal-content ">
                <div class="modal-header">
                    <h4 class="modal-title ml-2" id="exampleModalLabel" style="font-size:24px;">
                        Add Modal</h4>
                </div>
                <div class="modal-body" style="color: #cab562;">
                    <form class="forms-sample" action="{{ route('team.create') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <h4 class="ml-2 mb-3 display-5">Add Data</h4>
                        <div class="row ml-2">
                            <div class="col-md-4">
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
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label style="color:#c6b6b6;">Name &nbsp; &nbsp; &nbsp;</label>
                                    <input style="width:90%; " type="text" maxlength="250" class="form-control "
                                        name="name" id="exampleInputUsername1" value="{{ old('name') }}"
                                        placeholder="Name...">
                                    <span class="text-danger">
                                        @error('name')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label style="color:#c6b6b6;">Rank</label>
                                    <input style="width:90%; " type="text" maxlength="250" class="form-control "
                                        name="rank" id="exampleInputUsername1"
                                        value="{{ old('rank') }}" placeholder="Rank...">
                                    <span class="text-danger">
                                        @error('rank')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label style="color:#c6b6b6;">Social Link 1</label>
                                    <input style="width:90%; " type="text" maxlength="250" class="form-control "
                                        name="social_link1" id="exampleInputUsername1"
                                        value="{{ old('social_link1') }}" placeholder="Social Link...">
                                    <span class="text-danger">
                                        @error('social_link1')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label style="color:#c6b6b6;">Social Icon 1</label>
                                    <input style="width:90%; " type="text" maxlength="250" class="form-control "
                                        name="social1" id="exampleInputUsername1"
                                        value="{{ old('social1') }}" placeholder="Social Icon...">
                                    <span class="text-danger">
                                        @error('social1')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label style="color:#c6b6b6;">Social Link 2</label>
                                    <input style="width:90%; " type="text" maxlength="250" class="form-control "
                                        name="social_link2" id="exampleInputUsername1"
                                        value="{{ old('social_link2') }}" placeholder="Social Link...">
                                    <span class="text-danger">
                                        @error('social_link2')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label style="color:#c6b6b6;">Social Icon 2</label>
                                    <input style="width:90%; " type="text" maxlength="250" class="form-control "
                                        name="social2" id="exampleInputUsername1"
                                        value="{{ old('social2') }}" placeholder="Social Icon...">
                                    <span class="text-danger">
                                        @error('social2')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label style="color:#c6b6b6;">Social Link 3</label>
                                    <input style="width:90%; " type="text" maxlength="250" class="form-control "
                                        name="social_link3" id="exampleInputUsername1"
                                        value="{{ old('social_link3') }}" placeholder="Social Link...">
                                    <span class="text-danger">
                                        @error('social_link3')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label style="color:#c6b6b6;">Social Icon 3</label>
                                    <input style="width:90%; " type="text" maxlength="250" class="form-control "
                                        name="social3" id="exampleInputUsername1"
                                        value="{{ old('social3') }}" placeholder="Social Icon...">
                                    <span class="text-danger">
                                        @error('social3')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label style="color:#c6b6b6;">Social Link 4</label>
                                    <input style="width:90%; " type="text" maxlength="250" class="form-control "
                                        name="social_link4" id="exampleInputUsername1"
                                        value="{{ old('social_link4') }}" placeholder="Social Link...">
                                    <span class="text-danger">
                                        @error('social_link4')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label style="color:#c6b6b6;">Social Icon 4</label>
                                    <input style="width:90%; " type="text" maxlength="250" class="form-control "
                                        name="social4" id="exampleInputUsername1"
                                        value="{{ old('social4') }}" placeholder="Social Icon...">
                                    <span class="text-danger">
                                        @error('social4')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-4 ">
                                <div class="form-group row">
                                    <label style="color:#c6b6b6;">Position*</label>
                                    <select style="width:90%; " class="form-control" name="position">
                                        <option value="0">Member</option>
                                        <option value="1">Leader</option>
                                    </select>
                                </div>
                                <span class="text-danger">
                                    @error('position')
                                        {{ $message }}
                                    @enderror
                                </span>
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

    {{-- ////////Update Modal///////// --}}
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

    <script>
        $(document).ready(function() {
            // Image
            $('#sec1,#sec1_edit').click(function() {
                $("#sec_img").val('about_sec_1');
                $(".banner").val('banner');
            });
            // Image
            $('#sec2,#sec2_edit').click(function() {
                $("#sec_img").val('about_sec_2');
            });
            // Image
            $('#sec5,#sec5_edit').click(function() {
                $("#sec_img").val('about_sec_5');
            });
        });
    </script>
@endsection
