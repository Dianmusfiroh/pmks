
@extends('layouts.app')
@section('content_header')
<h1>{{ Str::title(Str::replaceArray('-',[' '],'Laporan Penyaluran' ?? '')) }}</h1>
@stop
