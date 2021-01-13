@extends('welcome')
@section('content')

<div id="page-wrapper">
    <div class="main-page">
        <div class="tables">
            <h3 class="title1">Danh sách đại lý phân phối</h3>
            <div class="panel-body widget-shadow">
                <table class="table">
                    <thead>

{{--                    <form method="post" action="{{ route('agencys.search') }}" class="form-inline">--}}
{{--                        @csrf--}}
{{--                        <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search">--}}
{{--                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>--}}
{{--                    </form>--}}

                    <tr>
                        <th>#</th>
                        <th>Agent Number</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Manager Name</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($agencys) == 0)
                        <tr>
                            <td colspan="7" class="text-center">Không có dữ liệu</td>
                        </tr>
                    @else
                        @foreach($agencys as $key => $agency)
                            <tr>
                                <th scope="row">{{ ++$key }}</th>
                                <td>{{ $agency->agent_number }}</td>
                                <td>{{ $agency->name }}</td>
                                <td>{{ $agency->phone }}</td>
                                <td>{{ $agency->email }}</td>
                                <td>{{ $agency->address }}</td>
                                <td>{{ $agency->manager_name }}</td>
                                <td>{{ $agency->status }}</td>
                                <td>
                                    <a href="{{ route('agencys.edit', $agency->id) }}">sửa</a> |
                                    <a href="{{ route('agencys.delete', $agency->id) }}" class="text-danger" onclick="return confirm('Bạn chắc chắn muốn xóa?')">xóa</a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
                <div>
                    {{--                        <div style="float: right;">{{ $agencys->links( "pagination::bootstrap-4") }}</div>--}}
                    <a class="btn btn-primary" href="{{ route('agencys.create') }}">Thêm mới</a>
                    <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Hủy
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
