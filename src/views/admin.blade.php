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
                    @foreach($data->translates->groups as $group)
                        <div class="translation-group border-bottom-label" data-translate="{{json_encode($group->data)}}">
                            {{$group->name}}
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-4 separated-label">
                <div class="table-header-label border-bottom-label">
                    <h2>Select language</h2>
                    <select name="languageOne" class="form-control language-switch-input" id="translateLanguageOne"
                            data-render-list="translateListOne">
                        @foreach($data->locales as $locale)
                            <option value="{{$locale->locale}}">{{$locale->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="translate-inputs scroll row table-content-label border-bottom-label" id="translateListOne"></div>
            </div>
            <div class="col-md-4">
                <div class="table-header-label border-bottom-label">
                    <h2>Select language</h2>
                    <select name="languageTwo" class="form-control language-switch-input" id="translateLanguageTwo" data-render-list="translateListTwo">
                        @foreach($data->locales as $locale)
                            <option value="{{$locale->locale}}">{{$locale->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="translate-inputs scroll row table-content-label border-bottom-label" id="translateListTwo"></div>
            </div>
        </div>
        <div class="row">
            <div class="table-footer">
                <button class="btn btn-success" id="translateSave">Save</button>
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