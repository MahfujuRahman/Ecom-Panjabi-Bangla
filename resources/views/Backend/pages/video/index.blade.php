@extends('Backend.layouts.master')

@section('content')
    <main class="app-main">
        <div class="container mt-5">
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
                <h2>Video's
                    <sub>
                        ({{ $website_active_id->website->site_url }}.{{ $website_active_id->website->domain_name }})
                    </sub>
                </h2>
                <a href="{{ route('video.create') }}" class="btn btn-primary">Add Video</a>
            </div>

            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Video</h5>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover text-center">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Subtitle</th>
                                <th>Images</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @if ($videos == null)
                                <tr>
                                    <td colspan="6" class="text-muted">No banners available. Click "Add Banner" to create
                                        one.</td>
                                </tr>
                            @else
                                @foreach ($videos as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->title }}</td>
                                        <td>{{ $item->sub_title ?? '-' }}</td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                @if ($item->image)
                                                    <img src="{{ asset($item->image) }}" alt="Banner Image"
                                                        class="rounded me-2"
                                                        style="width: 50px; height: 50px; object-fit: cover;">
                                                @endif
                                            </div>
                                        </td>
                                        <td>
                                            <a href="{{ route('video.edit', $item->id) }}"
                                                class="btn btn-warning btn-sm">Edit</a>

                                            <a href="#" class="btn btn-danger btn-sm delete-confirm"
                                                data-url="{{ route('video.destroy', $item->id) }}">
                                                <i class="fa-solid fa-trash"></i>
                                                Delete
                                            </a>

                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection
