@extends('backend.layouts.app')
@section('content')
    <!-- Recent Sales Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Applications</h6>

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
