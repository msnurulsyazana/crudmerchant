@extends('layouts.app')

@section('title', 'Edit Merchant')

@section('contents')
    <h1 class="mb-0">Edit Merchant</h1>
    <hr />
    <form action="{{ route('merchants.update', $merchant->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" class="form-control" placeholder="Title" value="{{ $merchant->title }}">
            </div>
            <div class="col mb-3">
                <label class="form-label">Price</label>
                <input type="text" name="price" class="form-control" placeholder="Price"
                    value="{{ $merchant->price }}">
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Merchant Code</label>
                <input type="text" name="merchant_code" class="form-control" placeholder="Merchant Code"
                    value="{{ $merchant->merchant_code }}">
            </div>
            <div class="col mb-3">
                <label class="form-label">Description</label>
                <textarea class="form-control" name="description" placeholder="Descriptoin">{{ $merchant->description }}</textarea>
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-warning">Update</button>
            </div>
        </div>
    </form>
@endsection
