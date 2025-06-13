@extends('layouts.app')
@section('title', 'SEO Meta Tags')
@section('content')
    <div class="page-content-wrapper">
        <!-- start page content-->
        <div class="page-content">
            <!--start breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Dashboard</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0 align-items-center">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">
                                    <ion-icon name="home-outline"></ion-icon>
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">@yield('title')</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->
            @session('success')
                <div class="alert alert-dismissible fade show py-2 border-0 border-start border-4 border-success mb-3"
                    style="position: absolute;top:10px;right:0;">
                    <div class="d-flex align-items-center">
                        <div class="fs-3 text-success">
                            <ion-icon name="checkmark-circle-sharp" role="img" class="md hydrated"
                                aria-label="checkmark circle sharp">
                            </ion-icon>
                        </div>
                        <div class="ms-3">
                            <div class="text-success">{{ $value }}</div>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endsession
            @session('error')
                <div class="alert alert-dismissible fade show py-2 border-0 border-start border-4 border-danger mb-3">
                    <div class="d-flex align-items-center">
                        <div class="fs-3 text-danger">
                            <ion-icon name="close-circle-sharp" role="img" class="md hydrated"
                                aria-label="close circle sharp"></ion-icon>
                        </div>
                        <div class="ms-3">
                            <div class="text-danger">{{ $value }}</div>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endsession
            <div class="card radius-10 mt-4">
                <div class="card-body">
                    <div class="container mt-5">
                        <h2 class="mb-4">@yield('title')</h2>
                        <div class="row">
                            <div class="col-12">
                                    <a href="{{ route('seo.create')}}"
                                    class="btn btn-primary float-end"><ion-icon name="add-outline" style="font-size: 1.5rem;"></ion-icon>Add New</a>
                            </div>

                            <div class="table-responsive p-3">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Page</th>
                                            <th>Meta Title</th>
                                            <th>Meta Description</th>
                                            <th>Meta Keywords</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($seos as $seo)
                                            <tr>
                                                <td>{{ $seo->page }}</td>
                                                <td>{{ $seo->meta_title }}</td>
                                                <td>{{ Str::limit($seo->meta_description, 50) }}</td>
                                                <td>{{ $seo->meta_keywords }}</td>
                                                <td>
                                                    <a href="{{ route('seo.edit', $seo->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                                    <form action="{{ route('seo.destroy', $seo->id) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr><td colspan="5">No SEO entries found.</td></tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <div class="mt-3">
                                {{ $seos->links('pagination::bootstrap-5') }} {{-- Use Bootstrap 5 pagination style --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection