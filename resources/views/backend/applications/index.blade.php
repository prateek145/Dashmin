@extends('backend.layouts.app')
@section('content')
    <!-- Recent Sales Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Applications</h6>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"
                    data-bs-whatever="@mdo">New</button>

            </div>


            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <form action="{{ route('application.store') }}" method="POST">
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">New Application</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="recipient-name"
                                        class="col-form-label fw-bold text-left @error('name') is-invalid @enderror">Name</label>
                                    <input type="text" name="name" class="form-control" id="recipient-name">
                                </div>
                                <div class="mb-3">
                                    <label for="message-text"
                                        class="col-form-label fw-bold text-left @error('status') is-invalid @enderror">Status</label>
                                    <select name="status" id=""
                                        class="form-control @error('status') is-invalid @enderror">
                                        <option value="1">Active</option>
                                        <option value="0">In Active</option>
                                    </select>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table text-start align-middle table-bordered table-hover mb-0">
                    <thead>
                        <tr class="text-dark">
                            <th scope="col">Date</th>
                            <th scope="col">Name</th>
                            <th scope="col">Status</th>
                            <th scope="col">UserName</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($applications as $item)
                            <tr>
                                <td>{{ $item->created_at }}</td>
                                <td>{{ $item->name }}</td>
                                <td>
                                    @if ($item->status == 1)
                                        Active
                                    @else
                                        InActive
                                    @endif
                                </td>
                                <td>{{ $item->user_id }}</td>
                                <td class="d-flex justify-content-between"><a class="btn btn-sm btn-primary"
                                        href="{{ route('application.edit', $item->id) }}">Edit</a>

                                    <form action="{{ route('application.destroy', $item->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input class="btn btn-sm btn-danger" onclick="return confirm('Are You Sure ?')"
                                            type="submit" value="Delete">
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Recent Sales End -->
@endsection
