@extends('layouts.Produk.app')

@section('content')
<!-- Page Title --->
<div class="pagetitle">
    <h1>Produk</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active">Produk</li>
        </ol>
    </nav>
</div>
<!-- End Page Title -->

<section class="section produk">
    <div class="row">

        @if ($errors->any())
        <ul style="width: 100%; background: red; padding: 10px">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        @endif

        @if ($message = Session::get('Success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-1"></i>
            {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if ($message = Session::get('Error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="bi bi-exclamation-octagon me-1"></i>
            {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        {{-- Columns --}}
        <div class="col-lg-12">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"> Data Produk
                            @if (Auth::check())
                            @if (Auth::user()->role == 'Admin')
                            <a href="{{ route('trash.produk') }}" class="btn btn-secondary rounded-pill float-end ms-2">Trash</a>
                            <a href="{{ route('produk.create') }}" class="btn btn-primary rounded-pill float-end">Create</a>
                            @else
                            @endif
                            @endif
                        </h5>

                        {{-- Table --}}
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Foto Produk</th>
                                    <th>Nama Produk</th>
                                    <th>Harga Produk</th>
                                    <th>Stok</th>
                                    <th>Deskripsi Produk</th>
                                    <th>Tanggal Produksi</th>
                                    @if (Auth::check())
                                    @if (Auth::user()->role == 'Admin')
                                    <th class="text-center" colspan="3"></th>
                                    @else
                                    @endif
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @foreach ($produk as $dt)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td><a href="{{ asset('/assets/img/product/' . $dt->picture) }}" target="_blank"><img src="{{ asset('/assets/img/product/' . $dt->picture) }}" width="100"></a> </td>
                                    <td>{{ $dt->product_name }}</td>
                                    <td>Rp . {{ number_format($dt->price, 0, ',', '.') }}</td>
                                    <td>{{ $dt->stock }}</td>
                                    <td>{{ $dt->deskripsi }}</td>
                                    <td>{{ \Carbon\Carbon::parse($dt->produk_date)->setTimezone('Asia/Jakarta')->format('Y-m-d,H:i:s')}}</td>
                                    @if (Auth::check())
                                    @if (Auth::user()->role == 'Admin')
                                    <td class="text-end">
                                        <a href="{{ route('produk.edit', $dt->id) }}" class="btn btn-primary"> Edit</a>
                                    </td>
                                    <td class="text-center">
                                        <!-- Button Modal -->
                                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#basicModal{{ $dt->id }}">
                                            Update Stock
                                        </button>
                                        <!-- End Button Modal -->
                                    </td>
                                    <td>
                                        <form action="{{ route('produk.destroy', $dt->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"> Delete</button>
                                        </form>
                                    </td>
                                    @else
                                    @endif
                                    @endif
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @foreach ($produk as $dt)
    @include('pages.produk.update-stock')
    @endforeach
</section>
@endsection