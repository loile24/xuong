@extends('layouts.admin')

@section('content')
<div class="app-title">
    <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item active"><a href="#"><b>Danh sách sản phẩm</b></a></li>
    </ul>
    <div id="clock"></div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="tile-body">
                <table class="table table-hover table-bordered" id="sampleTable">
                    <thead>
                        <tr>
                            <th width="10"><input type="checkbox" id="all"></th>
                            <th>Tên người đặt</th>
                            <th>Email người đặt</th>
                            <th>Số điện thoại</th>
                            <th>Địa Chỉ</th>
                            <th>Ngày đặt hàng</th>
                            <th>Tổng Bill</th>
                            <th>Phương thức thanh toán</th>
                            <th>Trạng thái</th>
                            <th>Hành Động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($don_hang as $item)
                        <tr>
                            <td width="10"><input type="checkbox" name="check1" value="1"></td>
                            <td>{{$item->ten_nguoi_nhan}}</td>
                            <td>{{$item->email_nguoi_nhan}}</td>
                            <td>{{$item->sdt_nguoi_nhan}}</td>
                            <td>{{$item->dia_chi_nguoi_nhan}}</td>
                            <td>{{ \Carbon\Carbon::parse($item->ngay_dat)->format('d/m/Y') }}</td>
                            <td>{{ number_format($item->tong_tien, 0, ',', '.') }}đ</td>
                            <td>{{$item->phuong_thuc_thanh_toan_id == 1 ? "Thanh toán khi nhận hàng" : "Thanh Toán Online"}}</td>
                            <td>
                                <div class="btn {{ $item->trang_thai == 0 ? 'btn-danger' : ($item->trang_thai == 1 ? 'btn-warning' : ($item->trang_thai == 2 ? 'btn-success' : ''))}}">
                                    @if ($item->trang_thai == 0)
                                        {{ 'Chưa xác nhận' }}
                                    @elseif($item->trang_thai == 1)
                                        {{ 'Đang giao hàng' }}
                                    @elseif($item->trang_thai == 2)
                                        {{ 'Hoàn Tất' }}
                                    @endif
                                </div>
                            </td>
                          
                            <td>
                             
                               @if ($item->trang_thai == 2)
                                    <a href="{{route('donhang.xemDanhgia', $item->id)}}" class="btn btn-dark">Xem đánh giá</a>
                               @else
                                    <a href="{{route('donhang.edit', $item->id)}}"><button class="btn btn-warning btn-sm edit" type="button" title="Sửa" id="show-emp" data-toggle="modal" data-target="#ModalUP"><i class="fas fa-edit"></i></button></a>
                               @endif

                                <a href="{{route('donhang.show', $item->id)}}" class="btn btn-info">Chi tiết đơn hàng</a>
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