@extends('vendor.translate_admin.layout.app')

@section('translate_admin')

    <div class="container-fluid translate-admin">
        <div class="row border-bottom-label">
            <div class="col-md-12">
                <h1>Translate admin</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 right-label separated-label">
                <div class="table-header-label border-bottom-label">
                    <h2>Translation groups</h2>
                </div>
                <div class="translation-groups scroll row border-bottom-label">
                    <div class="translation-group border-bottom-label">
                        group1
                    </div>
                    <div class="translation-group active border-bottom-label">
                        group2
                    </div>
                </div>
            </div>
            <div class="col-md-4 separated-label">
                <div class="table-header-label border-bottom-label">
                    <h2>Select language</h2>
                    <select name="languageOne" class="form-control" id="">
                        <option>en</option>
                        <option>de</option>
                    </select>
                </div>
                <div class="translate-inputs scroll row table-content-label border-bottom-label">
                    <div class="translate-input form-group">
                        <input type="text" class="form-control">
                    </div>
                    <div class="translate-input form-group">
                        <input type="text" class="form-control">
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="table-header-label border-bottom-label">
                    <h2>Select language</h2>
                    <select name="languageTwo" class="form-control" id="">
                        <option>en</option>
                        <option>de</option>
                    </select>
                </div>
                <div class="translate-inputs scroll row table-content-label border-bottom-label">
                    <div class="translate-input form-group">
                        <input type="text" class="form-control">
                    </div>
                    <div class="translate-input form-group">
                        <input type="text" class="form-control">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="table-footer">
                <button class="btn btn-success">Save</button>
            </div>
        </div>
    </div>


@endsection

@push('styles')
    <link rel="stylesheet" href="translate-admin-assets/css/style.css">
@endpush

@push('scripts')
<script src="translate-admin-assets/js/index.js"></script>
@endpush