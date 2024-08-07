@extends('layouts.admin')


@section('content')
    <div class="app-title">
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item active"><a href="#"><b>Thông tin website</b></a></li>
        </ul>
        <div id="clock"></div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                 
                    {{-- Thêm thành công --}}
                    @if (session('add_success'))
                        <div class="alert alert-success">
                            {{ session('add_success') }}
                        </div>
                    @endif

                    {{-- Sửa thành công --}}
                    @if (session('edit_success'))
                        <div class="alert alert-success">
                            {{ session('edit_success') }}
                        </div>
                    @endif

                    {{-- Sửa thành công --}}
                    @if (session('delete_success'))
                        <div class="alert alert-success">
                            {{ session('delete_success') }}
                        </div>
                    @endif
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                            <tr>
                                <th>Số Điện Thoại</th>
                                <th>Logo</th>
                                <th>Chức năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($thong_tin as $item)
                                <tr>
                                    <td>{{ $item->sdt }}</td>
                                    <td><img src="{{Storage::url($item->logo)}}"  width="100"></td>
                                    <td> <a href="{{ route('thongtin.edit', $item->id) }}"><button
                                                class="btn btn-warning btn-sm edit" type="button" title="Sửa"
                                                id="show-emp" data-toggle="modal" data-target="#ModalUP"><i
                                                    class="fas fa-edit"></i></button>
                                        </a></td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
