<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
         body {
            font-family: Arial, sans-serif;
            background-color: #f8f8f8;
            margin: 0;
            padding: 0;
        }

        .email-container {
            width: 100%;
            max-width: 600px;
            margin: auto;
            background-color: #ffffff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333333;
            text-align: center;
        }

        h5 {
            color: #555555;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            border: 1px solid #dddddd;
            text-align: left;
        }

        th {
            background-color: #f4f4f4;
        }

        img {
            max-width: 150px;
            height: auto;
        }

        .highlight {
            color: #d9534f;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="email-container">
        <h1>Chúc mừng bạn đặt hàng thành công</h1>

        <h5>Thông tin về đơn hàng:</h5>

        <ul>
            <li>Tên Người Nhận: <span class="highlight">{{ $don_hang->ten_nguoi_nhan }}</span></li>
            <li>Email người nhận: <span class="highlight">{{ $don_hang->email_nguoi_nhan }}</span></li>
            <li>Số điện thoại: <span class="highlight">{{ $don_hang->sdt_nguoi_nhan }}</span></li>
            <li>Ngày đặt: <span class="highlight">{{ $don_hang->ngay_dat }}</span></li>
            <li>Tổng hóa đơn: <span class="highlight">{{ $don_hang->tong_tien }}</span></li>
            <li>Địa Chỉ: <span class="highlight">{{ $don_hang->dia_chi_nguoi_nhan }}</span></li>
            @if ($don_hang->ghi_chu)
                <li>Ghi Chú: <span class="highlight">{{ $don_hang->ghi_chu }}</span></li>
            @endif

          <h5>Chi tiết sản phẩm:</h5>
        <table>
            <thead>
                <tr>
                    <th>Mã sản phẩm</th>
                    <th>Tên sản phẩm</th>
                    <th>Hình ảnh</th>
                    <th>Giá</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $cart = json_decode($don_hang->cart, true);
                @endphp
                @foreach ($cart as $item)
                    <tr>
                        <td>{{ $item['product_code'] }}</td>
                        <td>{{ $item['name'] }}</td>
                        <td><img src="{{ asset('storage/' . $item['image']) }}" width="150" alt='Lỗi'></td>
                        <td>{{ $item['price'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </ul>
    </div>
</body>

</html>
