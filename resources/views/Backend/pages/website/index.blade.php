@extends('Backend.layouts.master')

@section('content')
    <main class="app-main">
        <div class="container mt-5">
            <!-- Display Success Message -->
            @if (session('success'))
                <script>
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-right',
                        iconColor: 'white',
                        customClass: {
                            popup: 'colored-toast',
                        },
                        showConfirmButton: false,
                        timer: 1500,
                        timerProgressBar: true,
                    });

                    Toast.fire({
                        icon: 'success',
                        title: "{{ session('success') }}",
                    });
                </script>
            @endif
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>Website's</h2>
                <a href="{{ route('website.create') }}" class="btn btn-primary">Add Website</a>
            </div>

            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Website List</h5>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover text-center">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Site Name</th>
                                <th>Site URl</th>
                                <th>Is Default</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $item->site_name }}</td>
                                    <td>
                                        <a href="{{ url($item->site_url) }}" target="_blank">
                                            {{ url($item->site_url) }}
                                        </a>
                                        {{-- {{ $item->site_url }}.{{ $item->domain_name }} --}}
                                    </td>
                                    <td>
                                        @if ($item->is_default == 1)
                                            <span class="badge bg-success">Yes</span>
                                        @elseif ($item->is_default == 0)
                                            <span class="badge bg-secondary">No</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($item->status == 'active')
                                            <span class="badge bg-primary">Active</span>
                                        @elseif ($item->status == 'inactive')
                                            <span class="badge bg-warning">Inactive</span>
                                        @elseif ($item->status == 'deleted')
                                            <span class="badge bg-danger">Deleted</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('website.edit', $item->id) }}"
                                            class="btn btn-warning btn-sm">Edit</a>


                                        <a href="#" class="btn btn-danger btn-sm delete-confirm"
                                            data-url="{{ route('website.destroy', $item->id) }}">
                                            <i class="fa-solid fa-trash"></i>
                                            Delete
                                        </a>

                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-muted">No Website's available. Click "Add Website" to
                                        create
                                        one.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection
