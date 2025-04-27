@extends('layouts.template.admin')
@section('title', 'List Customer')

@section('content')
    @include('admin.customer.crud-customer.read-customer')
@endsection
