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
                <h2>Order List
                    <sub>
                        ({{ $website_active_id->website->site_url }}.{{ $website_active_id->website->domain_name }})
                    </sub>
                </h2>
                {{-- <a href="{{ route('product-group.create') }}" class="btn btn-primary">Add Product Group</a> --}}
            </div>

            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Order List</h5>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover text-center">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $item->full_name }}</td>
                                    <td>{{ $item->address }}</td>
                                    <td>{{ $item->phone_number }}</td>
                                    <td>{{ $item->grand_total }}</td>
                                    <td>{{ $item->delivery_status }}</td>
                                    <td>
                                        <a href="{{ route('order.show', $item->id) }}"
                                            class="btn btn-primary btn-sm">Show</a>

                                        <a href="#" class="btn btn-danger btn-sm delete-confirm"
                                            data-url="{{ route('order.destroy', $item->id) }}">
                                            <i class="fa-solid fa-trash"></i>
                                            Delete
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-muted">No about sections available. Click "Add About" to
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
