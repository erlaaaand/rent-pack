@extends('layouts.template.admin')
@section('title', 'Riwayat Peminjaman')

@section('content')
    @include('admin.peminjaman.crud.read-belum-dikembalikan')
@endsection
