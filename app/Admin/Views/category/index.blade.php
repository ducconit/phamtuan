@extends('admin::layouts.default')
@section('content')
    <div class="table-responsive">
        <table class="table table-hover" id="list-categories">
            <thead>
            <tr>
                <th>{{ __('Tên danh mục') }}</th>
                <th>{{ __('Số sản phẩm') }}</th>
                <th>{{ __('Cấp độ') }}</th>
                <th>{{ __('Danh mục cha') }}</th>
                <th>{{ __('Thao tác') }}</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($categories as $category)
                <tr>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->products_count }}</td>
                    <td>{{ $category->level }}</td>
                    <td>{{ $category->parent->name }}</td>
                    <td>
                        <a href="{{ route('admin::category.show',$category->id) }}" class="btn btn-info">
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('admin::category.edit',$category->id) }}" class="btn btn-warning">
                            <i class="far fa-edit"></i>
                        </a>
                        <a href="#" class="btn btn-danger btn-delete" data-id="{{ $category->id }}">
                            <i class="far fa-trash-alt"></i>
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">{{ __('Không có dữ liệu hiển thị') }}</td>
                </tr>
            @endforelse
            </tbody>
        </table>
        {{ $categories->links() }}
    </div>
@endsection
