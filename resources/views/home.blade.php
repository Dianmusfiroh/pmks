@extends('adminlte::page')
@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Dashboard</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <p class="mb-0">Selamat Datang di Dashboard</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <div class="info-box ">
                <span class="info-box-icon bg-info"><i class="fas fa-user-plus"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text"></span>
                  <span class="info-box-number"></span>
                </div>
              </div>
            </div>
        <div class="col-lg-4">
            <div class="info-box">
            <span class="info-box-icon bg-warning"><i class="fas fa-user"></i></span>
            <div class="info-box-content">
                <span class="info-box-text"></span>
                <span class="info-box-number"></span>
            </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="info-box">
            <span class="info-box-icon bg-primary"><i class="fa fa-fw fa-tasks"></i></span>
            <div class="info-box-content">
                <span class="info-box-text"></span>
                <span class="info-box-number"></span>
            </div>
            </div>
        </div>
    </div>
@stop
