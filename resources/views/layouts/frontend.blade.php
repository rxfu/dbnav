@extends('layouts.default')

@section('title', $title)

@section('body-class', 'frontend-page')

@section('page')
<div class="container-fluid">
    @include('shared.header')

    <!-- Content wrapper -->
    <div class="content-wrapper">

        <!-- Main content -->
        <section class="content">
            <div class="content-fluid">
                @yield('content')
            </div>
        </section>
    </div>

    @include('shared.footer')
</div>
@endsection

@push('styles')
<style>
    .content-wrapper, .main-footer, .main-header {
        margin-left: 0px;
    }
</style>
@endpush
