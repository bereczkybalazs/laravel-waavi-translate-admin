@extends('vendor.translate_admin.layout.app')

@section('translate_admin')

    <h1 class="title">{{$test}}</h1>

@endsection

@push('scripts')
    <script src="translate-admin-assets/js/index.js"></script>
@endpush