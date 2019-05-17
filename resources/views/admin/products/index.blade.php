@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Farihaan Products</div>
                <div class="card-body">
                    <div style="margin-bottom:10px;">
                        <a href="{{ route('admin.products.create') }}" class="btn btn-success">Add</a>
                    </div>
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                    @endif 
                    <div class="table table-striped">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th style="text-align:center;">#</th>
                                    <th style="text-align:center;">Nama</th>
                                    <th style="text-align:center;">Harga</th>
                                    <th style="text-align:center;">Tanggal Date</th>
                                    <th style="text-align:center;" colspan="3">Update</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                <tr>
                                    <td style="text-align:center;">{{ $product['id'] }}</td>
                                    <td style="text-align:center;">{{ $product['name'] }}</td>
                                    <td style="text-align:center;">{{ $product['price'] }}</td>
                                    <td style="text-align:center;">{{ $product['created_at'] }}</td>
                                    <td style="text-align:center;">
                                        <form action="{{ route('admin.products.destroy',$product->id) }}" method="POST">
                                            @csrf @method('DELETE')
                                            <a class="btn btn-dark btn-sm" href="{{ route('admin.products.show',$product->id) }}">Tampil</a>
                                            <a class="btn btn-warning btn-sm" href="{{ route('admin.products.edit',$product->id) }}">Ganti</a>
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure ?');">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
