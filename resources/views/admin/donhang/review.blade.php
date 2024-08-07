@extends('layouts.admin')

@section('content')
    <style>
        .star-rating {
            display: inline-block;
            font-size: 0;
            position: relative;
            unicode-bidi: bidi-override;
        }

        .star-rating>.star {
            font-size: 2rem;
            /* Kích thước ngôi sao */
            color: #ddd;
            /* Màu mặc định cho ngôi sao */
            cursor: pointer;
            display: inline-block;
            position: relative;
        }

        .star-rating>.star.checked {
            color: #f39c12;
            /* Màu vàng cho ngôi sao đã chọn */
        }
    </style>
    <div class="app-title">
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item active"><a href="#"><b>Đánh Giá Đơn Hàng</b></a></li>
        </ul>
        <div id="clock"></div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <a href="{{ route('donhang.index') }}" class="btn btn-warning">Danh sách đơn hàng</a>

                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>Đánh Giá</th>
                                <th>Bình Luận Về Đơn Hàng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($review as $item)
                                <tr>
                                    <td>
                                        <div class="star-rating">
                                            @for ($i = 1; $i <= 5; $i++)
                                                <span class="star{{ $i <= $item->rating ? ' checked' : '' }}">&#9733;</span>
                                            @endfor
                                        </div><br>
                                    </td>
                                    <td>
                                       {{ $item->comment }}
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
