@extends('layouts.admin')

@section('content')
    <div class="app-title">
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item active"><a href="#"><b>Chi tiết đơn hàng</b></a></li>
        </ul>
        <div id="clock"></div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="body">
                        <a href="{{ route('sanpham.index') }}" class="btn btn-warning mb-3">Danh Sách Sản Phẩm</a> <br>

                        <p>Mô tả Sản Phẩm : {{ $san_pham->description }}</p>
                        <img src="{{ Storage::url($san_pham->image) }}" width="100">
                        <hr>
                    </div>
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>

                            <tr>
                                <th>Bình luận</th>
                                <th>Ngày đăng bình luận</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($binh_luan_product_id as $item)
                                <tr>
                                    <td>{{ $item->noi_dung }}</td>
                                    <td>{{ \Carbon\Carbon::parse($item->ngay_dang)->format('d/m/Y') }}</td>
                                    <td>
                                        <form action="{{ route('binhluan.deleteBinhLuan', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit">
                                                X<i class="bi bi-x"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
