@extends('layouts.default')

@section('title', $title)

@section('body-class', 'sidebar-mini')
    
@section('page')
<div class="wrapper">
    @include('shared.header')

    @auth
        @include('shared.sidebar')
    @endauth

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
