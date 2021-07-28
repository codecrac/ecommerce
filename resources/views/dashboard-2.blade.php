{{--<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-jet-welcome />
            </div>
        </div>
    </div>
</x-app-layout>--}}
@extends('admin.includes')

@section('style_complementaire')
    <style>
        a{
            text-decoration: none;
            color: #fff;
        }
    </style>
@endsection

@section('body')
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-home"></i>
                </span> Tableau de bord </h3>

            </div>
            <div class="row">
                <div class="col-md-4 stretch-card grid-margin">
                    <div class="card bg-gradient-danger card-img-holder text-white">
                        <div class="card-body">
                            <h4 class="font-weight-normal mb-3">
                                Nombre de Menus
                                <i class="mdi mdi-chart-line mdi-24px float-right"></i>
                            </h4>
                            <h1 class="mb-5 text-right">{{$nb_menus_parent}}</h1>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 stretch-card grid-margin">

                    <div class="card bg-gradient-info card-img-holder text-white">
                        <div class="card-body">
                            <h4 class="font-weight-normal mb-3"> Pages (Menus simple)  <i class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
                            </h4>
                            <h1 class="mb-5 text-right">{{$nb_menus_simples}}</h1>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 stretch-card grid-margin">
                    <div class="card bg-gradient-success card-img-holder text-white">
                        <div class="card-body">
                            <h4 class="font-weight-normal mb-3"> Articles <i class="mdi mdi-diamond mdi-24px float-right"></i>
                            </h4>
                            <h1 class="mb-5 text-right">{{$nb_article}}</h1>
                        </div>
                    </div>
                </div>

            </div>
        </div>
@endsection
