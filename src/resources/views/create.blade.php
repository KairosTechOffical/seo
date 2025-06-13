@extends('layouts.app')
@if(isset($seos))
@section('title', 'Edit SEO Meta Tags')
@else
@section('title', 'Create SEO Meta Tags')
@endif
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
            @if(session('success'))
                <div class="alert alert-dismissible fade show py-2 border-0 border-start border-4 border-success mb-3"
                    style="position: absolute;top:10px;right:0;">
                    <div class="d-flex align-items-center">
                        <div class="fs-3 text-success">
                            <ion-icon name="checkmark-circle-sharp"></ion-icon>
                        </div>
                        <div class="ms-3">
                            <div class="text-success">{{ session('success') }}</div>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-dismissible fade show py-2 border-0 border-start border-4 border-danger mb-3"
                    style="position: absolute;top:10px;right:0;">
                    <div class="d-flex align-items-center">
                        <div class="fs-3 text-danger">
                            <ion-icon name="close-circle-sharp"></ion-icon>
                        </div>
                        <div class="ms-3">
                            <div class="text-danger">{{ session('error') }}</div>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="card radius-10 mt-4">
                <div class="card-body">
                    <div class="container mt-5">
                        <div class="row mb-2">

                            <div class="col-12">
                                <a
                                wire:navigate
                                href="{{ route('seo.index') }}"
                                class="btn btn-outline-dark"><ion-icon wire:ignore name="arrow-back-outline" style="font-size: 1.5rem;"></ion-icon>Back to List</a>
                            </div>
                        </div>
                        <form action="{{ isset($seos) ? route('seo.update', $seos->id) : route('seo.store') }}" method="POST">
                            @csrf
                            @if(isset($seos))
                                @method('PUT')
                            @endif

                            <div class="mb-3">
                                <label for="page" class="form-label">Page Identifier (e.g. home, contact)</label>
                                <select name="page" class="form-select" required>
                                    <option value="">-- Select Page --</option>
                                    <option value="front" {{ (old('page', $seos->page ?? '') == 'front') ? 'selected' : '' }}>Home</option>
                                    <option value="truck-listing" {{ (old('page', $seos->page ?? '') == 'truck-listing') ? 'selected' : '' }}>Truck Listing</option>
                                    <option value="details" {{ (old('page', $seos->page ?? '') == 'details') ? 'selected' : '' }}>Details</option>
                                    <option value="search" {{ (old('page', $seos->page ?? '') == 'search') ? 'selected' : '' }}>Search</option>
                                    <option value="about" {{ (old('page', $seos->page ?? '') == 'about') ? 'selected' : '' }}>About</option>
                                    <option value="contact" {{ (old('page', $seos->page ?? '') == 'contact') ? 'selected' : '' }}>Contact</option>
                                    <option value="post_ads" {{ (old('page', $seos->page ?? '') == 'post_ads') ? 'selected' : '' }}>Post Ads</option>
                                    <option value="published" {{ (old('page', $seos->page ?? '') == 'published') ? 'selected' : '' }}>Published</option>
                                    <option value="servicecenter" {{ (old('page', $seos->page ?? '') == 'servicecenter') ? 'selected' : '' }}>Service Center</option>
                                    <option value="others" {{ (old('page', $seos->page ?? '') == 'others') ? 'selected' : '' }}>Others</option>
                                    <option value="userads" {{ (old('page', $seos->page ?? '') == 'userads') ? 'selected' : '' }}>User Ads</option>
                                    <option value="dashboard" {{ (old('page', $seos->page ?? '') == 'dashboard') ? 'selected' : '' }}>User Dashboard</option>
                                    <option value="my_ads" {{ (old('page', $seos->page ?? '') == 'my_ads') ? 'selected' : '' }}>My Ads</option>
                                    <option value="pending_approval" {{ (old('page', $seos->page ?? '') == 'pending_approval') ? 'selected' : '' }}>Pending Approval</option>
                                    <option value="parked_ads" {{ (old('page', $seos->page ?? '') == 'parked_ads') ? 'selected' : '' }}>Parked Vehicles</option>
                                    <option value="delete_account" {{ (old('page', $seos->page ?? '') == 'delete_account') ? 'selected' : '' }}>Delete Account</option>

                                </select>



                            </div>

                            <div class="mb-3">
                                <label for="meta_title" class="form-label">Meta Title</label>
                                <input type="text" name="meta_title" class="form-control" value="{{ old('meta_title', $seos->meta_title ?? '') }}">
                            </div>

                            <div class="mb-3">
                                <label for="meta_description" class="form-label">Meta Description</label>
                                <textarea name="meta_description" class="form-control" rows="3">{{ old('meta_description', $seos->meta_description ?? '') }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="meta_keywords" class="form-label">Meta Keywords (comma separated)</label>
                                <input type="text" name="meta_keywords" class="form-control" value="{{ old('meta_keywords', $seos->meta_keywords ?? '') }}">
                            </div>

                            <div class="mb-3">
                                <label for="canonical_url" class="form-label">Canonical URL</label>
                                <input type="url" name="canonical_url" class="form-control" value="{{ old('canonical_url', $seos->canonical_url ?? '') }}">
                            </div>

                            <div class="mb-3">
                                <label for="og_title" class="form-label">Open Graph Title</label>
                                <input type="text" name="og_title" class="form-control" value="{{ old('og_title', $seos->og_title ?? '') }}">
                            </div>

                            <div class="mb-3">
                                <label for="og_description" class="form-label">Open Graph Description</label>
                                <textarea name="og_description" class="form-control" rows="3">{{ old('og_description', $seos->og_description ?? '') }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="og_image" class="form-label">Open Graph Image URL</label>
                                <input type="url" name="og_image" class="form-control" value="{{ old('og_image', $seos->og_image ?? '') }}">
                            </div>

                            <button type="submit" class="btn btn-primary">{{ isset($seos) ? 'Update' : 'Create' }}</button>
                            <a href="{{ route('seo.index') }}" class="btn btn-secondary">Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

