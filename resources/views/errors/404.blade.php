@extends('errors::minimal')

@section('title', __('Not Found'))
@section('code', '404')
@section('message', __($exception->getMessage() == null ? "Not Found" : $exception->getMessage()))
