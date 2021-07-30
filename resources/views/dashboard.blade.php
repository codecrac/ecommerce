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
@extends('admin.includes2')

@section('style_complementaire')
    <style>
        a{
            text-decoration: none;
            color: #fff;
        }
    </style>
@endsection

@section('body')
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Dashboard</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-xl-5 col-lg-6">

                <div class="row">
                    <div class="col-lg-6">
                        <div class="card widget-flat">
                            <div class="card-body">
                                <div class="float-end">
                                    <i class="mdi mdi-account-multiple widget-icon"></i>
                                </div>
                                <h5 class="text-muted fw-normal mt-0" title="Number of Customers">Categories</h5>
                                <h3 class="mt-3 mb-3">{{$nb_menus_simples}}</h3>
                                <p class="mb-0 text-muted">
                                    <span class="text-danger me-2"></span>
                                    <span class="text-nowrap"></span>
                                </p>
                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div> <!-- end col-->

                    <div class="col-lg-6">
                        <div class="card widget-flat">
                            <div class="card-body">
                                <div class="float-end">
                                    <i class="mdi mdi-cart-plus widget-icon"></i>
                                </div>
                                <h5 class="text-muted fw-normal mt-0" title="Number of Orders">Articles</h5>
                                <h3 class="mt-3 mb-3">{{$nb_article}}</h3>
                                <p class="mb-0 text-muted">
                                    <span class="text-danger me-2"></span>
                                    <span class="text-nowrap"></span>
                                </p>
                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div> <!-- end col-->
                </div> <!-- end row -->

                <div class="row">
                    <div class="col-lg-6">
                        <div class="card widget-flat">
                            <div class="card-body">
                                <div class="float-end">
                                    <i class="mdi mdi-currency-usd widget-icon"></i>
                                </div>
                                <h5 class="text-muted fw-normal mt-0" title="Average Revenue">Commandes</h5>
                                <h3 class="mt-3 mb-3">{{$nb_commandes}}</h3>
                                <p class="mb-0 text-muted">
                                    <span class="text-danger me-2"></span>
                                    <span class="text-nowrap"></span>
                                </p>
                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div> <!-- end col-->

                    <div class="col-lg-6">
                        <div class="card widget-flat">
                            <div class="card-body">
                                <div class="float-end">
                                    <i class="mdi mdi-pulse widget-icon"></i>
                                </div>
                                <h5 class="text-muted fw-normal mt-0" title="Growth">Client.e.s</h5>
                                <h3 class="mt-3 mb-3">{{$nb_client}}</h3>
                                <p class="mb-0 text-muted">
                                    <span class="text-success me-2"></span>
                                    <span class="text-nowrap"></span>
                                </p>
                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div> <!-- end col-->
                </div> <!-- end row -->

            </div> <!-- end col -->

            <div class="col-xl-7 col-lg-6">
                <div class="card card-h-100">
                    <div class="card-body">
                        <h4 class="header-title mb-3 text-center">Message de l'equipe</h4>

                        <div dir="ltr">
                            <div class="apex-charts" data-colors="#727cf5,#e3eaef">
                                <h5 class="text-left">
                                    En cas de :
                                    <br/><br/>
                                    <ul>
                                        <li class="mb-2">Dysfonctionnement de cette application,</li>
                                        <li class="mb-2">Necessité d'amelioration</li>
                                        <li class="mb-2">Besoin de nouvelle application web ou mobile,</li>
                                    </ul>
                                </h5>

                                <h4 class="text-center">Contactez-nous au 05 55 99 40 41.<h5>
                                <br/>

                                <h4 class="text-center">
                                    "La reconnaissance du travail bien fais est une récompense bien plus appreciée qu'un salaire."
                                </h4>

                                {{--<h4 class="text-center">
                                    "Il semble que la perfection soit atteinte non quand il n’y a plus
                                    rien à ajouter, mais quand il n’y a plus rien à retrancher."
                                </h4>--}}

                                <br/>
                                <h6>STRATON SYSTEM</h6>
                            </div>
                        </div>

                    </div> <!-- end card-body-->
                </div> <!-- end card-->

            </div> <!-- end col -->
        </div>
        <!-- end row -->

    </div>
@endsection
