@extends('layouts.admin')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Ubah Paket Travel {{ $item->title }} </h1>
    </div>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="card shadow">
        <div class="card-body">
            <form action="{{ route('transaction.update', $item->id) }}" method="post">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="transaction_status">Status</label>
                    <select name="transaction_status" class="form-control" required>
                        <option value="IN_CART" @if($item->transaction_status == 'IN_CART') selected @endif>IN CART</option>
                        <option value="PENDING" @if($item->transaction_status == 'PENDING') selected @endif>PENDING</option>
                        <option value="SUCCESS" @if($item->transaction_status == 'SUCCESS') selected @endif>SUCCESS</option>
                        <option value="CANCEL" @if($item->transaction_status == 'CANCEL') selected @endif>CANCEL</option>
                        <option value="FAILED" @if($item->transaction_status == 'FAILED') selected @endif>FAILED</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary btn-block">
                    Ubah
                </button>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection