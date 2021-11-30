@extends('admin::layouts.default')
@section('content')
    <a href="{{ \Request::buttonBack('admin::category.index') }}" class="btn btn-info">
        <i class="fas fa-chevron-left"></i>
        {{ __('Quay lại') }}
    </a>
    <form action="{{ route('admin::category.update',$category->id) }}" method="post" class="py-5 container-fluid">
        <fieldset>
            <legend>{{ __('Thông tin cơ bản') }}</legend>
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="">{{ __('Tên danh mục') }}</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="">{{ __('Slug') }}</label>
                        <input type="text" name="slug" class="form-control">
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="">{{ __('Danh mục cha') }}</label>
                        <select name="level" class="custom-select">
                            <option value="">--{{ __('Chọn danh mục') }}--</option>
                        </select>
                    </div>
                </div>
            </div>
        </fieldset>
        <fieldset>
            <legend>{{ __('SEO') }}</legend>
            <div class="form-group">
                <label for="">{{ __('Tiêu đề') }}</label>
                <input type="text" name="meta_title" class="form-control">
            </div>
            <div class="form-group">
                <label for="">{{ __('Danh mục cha') }}</label>
                <textarea name="meta_description" class="form-control" cols="30" rows="3"></textarea>
            </div>
        </fieldset>
        <div class="d-flex justify-content-center">
            <button type="reset" class="btn btn-default mr-2">{{ __('Làm lại') }}</button>
            <button type="submit" class="btn btn-primary">{{ __('Lưu lại') }}</button>
        </div>
    </form>
@endsection
