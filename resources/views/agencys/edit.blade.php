@extends('welcome')
@section('content')
<div id="page-wrapper">
    <div class="main-page">
        <h2 class="title1">Edit Agency</h2>
        <form method="post" action="{{ route('agencys.update',$agency->id) }}">
            @csrf
            <div class="form-group">
                <label>Agent Number</label>
                <input type="number" class="form-control" name="agent_number" value="{{ $agency->agent_number }}">
                @if($errors->any())
                    <p class="alert-danger my-sm-4">{{ $errors->first('agent_number') }}</p>
                @endif
            </div>
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" name="name" value="{{ $agency->name }}">
                @if($errors->any())
                    <p class="alert-danger my-sm-4">{{ $errors->first('name') }}</p>
                @endif
            </div>
            <div class="form-group">
                <label>Phone</label>
                <input type="number" class="form-control" name="phone" value="{{ $agency->phone }}">
                @if($errors->any())
                    <p class="alert-danger my-sm-4">{{ $errors->first('phone') }}</p>
                @endif
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="email" value="{{ $agency->email }}">
                @if($errors->any())
                    <p class="alert-danger my-sm-4">{{ $errors->first('email') }}</p>
                @endif
            </div>
            <div class="form-group">
                <label>Address</label>
                <input type="text" class="form-control" name="address" value="{{ $agency->address }}">
                @if($errors->any())
                    <p class="alert-danger my-sm-4">{{ $errors->first('address') }}</p>
                @endif
            </div>
            <div class="form-group">
                <label>Manager Name</label>
                <input type="text" class="form-control" name="manager_name" value="{{ $agency->manager_name }}">
                @if($errors->any())
                    <p class="alert-danger my-sm-4">{{ $errors->first('manager_name') }}</p>
                @endif
            </div>
            <div class="form-group">
                <label>Status</label>
                <input type="text" class="form-control" name="status" value="{{ $agency->status }}">
                @if($errors->any())
                    <p class="alert-danger my-sm-4">{{ $errors->first('status') }}</p>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Thêm mới</button>
            <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Hủy</button>
        </form>
    </div>
</div>
@endsection
