@extends('backend.layouts.app')
@section('content')
    <!-- Recent Sales Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light text-start rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                {{-- <h6 class="mb-0">Application Create</h6> --}}

            </div>

            <div class="bg-light rounded h-100 p-4">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                            aria-selected="true">Genral</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                            aria-selected="false">Fields</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact"
                            aria-selected="false">Contact</button>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                        <h6 class="mb-4">Application Edit</h6>
                        <form action="{{ route('application.update', $application->id) }}" class="form-horizontal"
                            enctype="multipart/form-data" method="post">
                            @method('PUT')
                            @csrf
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" id="name" aria-describedby="namehelp"
                                    value="{{ $application->name }}" required>
                                @error('name')
                                    <label id="name-error" class="error text-danger" for="name">{{ $message }}</label>
                                @enderror
                                <div id="namehelp" class="form-text">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1"
                                    class="form-label @error('status') is-invalid @enderror">Status</label>
                                <select name="status" id=""
                                    class="form-control @error('status') is-invalid @enderror" required>
                                    <option value="1">Active</option>
                                    <option value="0">In Active</option>
                                </select>
                                @error('status')
                                    <label id="status-error" class="error text-danger"
                                        for="status">{{ $message }}</label>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1"
                                    class="form-label @error('description') is-invalid @enderror">Description</label>
                                <textarea class="form-control" name="description" id="editor1" required>{{ $application->description }}</textarea>

                                @error('description')
                                    <label id="description-error" class="error text-danger"
                                        for="description">{{ $message }}</label>
                                @enderror
                                <div id="namehelp" class="form-text">
                                </div>
                            </div>
                            {{-- <div class="mb-3">
                                <label for="exampleInputEmail1"
                                    class="form-label @error('attachments') is-invalid @enderror">Attachments</label>
                                @foreach ($images as $item)
                                    <br><a href="{{ asset('public/application/' . $item) }}" target="_blank">Document</a>
                                @endforeach
                                <input type="file" class="form-control @error('attachments') is-invalid @enderror"
                                    id="description" name="attachments[]" multiple>
                                @error('attachments')
                                    <label id="attachments-error" class="error text-danger"
                                        for="attachments">{{ $message }}</label>
                                @enderror
                            </div> --}}

                            <input type="hidden" value="{{ auth()->id() }}" name="user_id">

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>

                        <div class="container-fluid pt-4 px-4">
                            <div class="bg-light text-center rounded p-4">
                                <div class="d-flex align-items-center justify-content-between mb-4">
                                    <h6 class="mb-0">Attachments</h6>

                                </div>
                                <div class="table-responsive">
                                    <table class="table text-start align-middle table-bordered table-hover mb-0">
                                        <thead>
                                            <tr class="text-dark">
                                                <th scope="col">Name</th>
                                                <th scope="col">Size</th>
                                                <th scope="col">Type</th>
                                                <th scope="col">Created At</th>
                                                <th scope="col">Updated At</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($attachments as $item)
                                                <tr>
                                                    <td>{{ $item->name }}</td>
                                                    <td>{{ $item->size }}</td>
                                                    <td>{{ $item->type }}</td>
                                                    <td>{{ $item->created_at }}</td>
                                                    <td>{{ $item->updated_at }}</td>
                                                    <td class="d-flex justify-content-between">

                                                        <form action="{{ route('attachment.delete', $item->id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <input class="btn btn-sm btn-danger"
                                                                onclick="return confirm('Are You Sure ?')" type="submit"
                                                                value="Delete">
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="container-fluid pt-4 px-4">
                            <div class="bg-light text-start rounded p-4">
                                <div class="d-flex align-items-center justify-content-between mb-4">
                                    {{-- <h6 class="mb-0">Application Create</h6> --}}

                                </div>
                                <div class="bg-light rounded h-100 p-4">
                                    <h6 class="mb-4">Attachments Create</h6>
                                    <form action="{{ route('application.update', $application->id) }}"
                                        class="form-horizontal" enctype="multipart/form-data" method="post">
                                        @method('PUT')
                                        @csrf
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1"
                                                class="form-label @error('attachments') is-invalid @enderror">Attachments</label>
                                            <input type="file"
                                                class="form-control @error('attachments') is-invalid @enderror"
                                                id="description" name="attachments">
                                            @error('attachments')
                                                <label id="attachments-error" class="error text-danger"
                                                    for="attachments">{{ $message }}</label>
                                            @enderror
                                        </div>

                                        <input type="hidden" value="{{ $application->id }}" name="application_id">

                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>


                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <div class="container-fluid pt-4 px-4">
                            <div class="bg-light text-center rounded p-4">
                                <div class="d-flex align-items-center justify-content-between mb-4">
                                    <h6 class="mb-0">Fields Table</h6>
                                    <button class="btn btn-primary">New</button>

                                </div>
                                <div class="table-responsive">
                                    <table class="table text-start align-middle table-bordered table-hover mb-0">
                                        <thead>
                                            <tr class="text-dark">
                                                <th scope="col">Name</th>
                                                <th scope="col">Type</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Created By</th>
                                                <th scope="col">Created At</th>
                                                <th scope="col">Updated At</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($fields as $item)
                                                <tr>
                                                    <td>{{ $item->name }}</td>
                                                    <td>{{ $item->type }}</td>
                                                    <td>{{ $item->status }}</td>
                                                    <td>{{ $item->user_id }}</td>
                                                    <td>{{ $item->created_at }}</td>
                                                    <td>{{ $item->updated_at }}</td>
                                                    <td class="d-flex justify-content-between">

                                                        <form action="{{ route('field.destroy', $item->id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <input class="btn btn-sm btn-danger"
                                                                onclick="return confirm('Are You Sure ?')" type="submit"
                                                                value="Delete">
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="container-fluid pt-4 px-4">
                            <div class="bg-light text-start rounded p-4">
                                <div class="d-flex align-items-center justify-content-between mb-4">
                                    {{-- <h6 class="mb-0">Application Create</h6> --}}

                                </div>
                                <div class="bg-light rounded h-100 p-4">
                                    <h6 class="mb-4">Field Create</h6>
                                    <form action="{{ route('field.store') }}" class="form-horizontal"
                                        enctype="multipart/form-data" method="post">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Name</label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                id="description" name="name" required>
                                            @error('name')
                                                <label id="name-error" class="error text-danger"
                                                    for="name">{{ $message }}</label>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Type</label>
                                            <select name="type" id=""
                                                class="form-control @error('type') is-invalid @enderror" required>
                                                <option value="date">Date</option>
                                                <option value="file">File</option>
                                                <option value="file">Images</option>
                                                <option value="number">Ip Address</option>
                                                <option value="number">Numeric</option>
                                                <option value="text">Text</option>
                                                <option value="text">Value</option>
                                                <option value="text">User Group List</option>
                                            </select>
                                            @error('type')
                                                <label id="type-error" class="error text-danger"
                                                    for="type">{{ $message }}</label>
                                            @enderror
                                            <div id="namehelp" class="form-text">
                                            </div>
                                        </div>


                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Status</label>
                                            <select name="status" id=""
                                                class="form-control @error('status') is-invalid @enderror">
                                                <option value="1">Active</option>
                                                <option value="0">In Active</option>
                                            </select>
                                            @error('status')
                                                <label id="status-error" class="error text-danger"
                                                    for="status">{{ $message }}</label>
                                            @enderror
                                            <div id="namehelp" class="form-text">
                                            </div>
                                        </div>

                                        <input type="hidden" value="{{ $application->id }}" name="application_id">
                                        <input type="hidden" value="{{ auth()->id() }}" name="user_id">

                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>


                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                        Et diam et est sed vero ipsum voluptua dolor et, sit eos justo ipsum no ipsum amet sed aliquyam
                        dolore, ut ipsum sanctus et consetetur. Sit ea sit clita lorem ea gubergren. Et dolore vero sanctus
                        voluptua ipsum sadipscing amet at. Et sed dolore voluptua dolor eos tempor, erat amet.
                    </div>
                </div>

            </div>


        </div>
    </div>


    <!-- Recent Sales End -->






    <script src="https://cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('editor1');
    </script>
    <script>
        var status = "{{ $application->status }}";
        var currentstatus = document.getElementsByName('status')[0];
        for (let index = 0; index < currentstatus.length; index++) {
            if (currentstatus[index].value == status) {
                currentstatus[index].selected = true;
            }
        }
    </script>
@endsection
