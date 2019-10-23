@extends('layouts.default')

@section('title', $title)

@section('body-class', 'frontend-page')

@section('page')
<div class="container-fluid">
    @include('shared.header')

    <!-- Content wrapper -->
    <div class="content-wrapper">
        @include('shared.alert')
        
        <!-- Content header -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">{{ $title ?? __('Default title') }}</h1>
                    </div>
                    <div class="col-sm-6">
                        {{-- @include('shared.breadcrumb') --}}
                    </div>
                </div>
            </div>
        </section>

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
