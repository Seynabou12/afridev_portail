@extends('layouts.base')

@section('css')
    <link href="/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="/vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">
    <link rel="stylesheet" href="/vendor/nouislider/nouislider.min.css">
    <!-- Style css -->
    <link href="/css/style.css" rel="stylesheet">
@endsection


@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="javascript:void(0)" style="color: #fd7e14;">SuperAdmin</a>
                    </li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Utilisateurs</a></li>
                </ol>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Formulaire de Validation</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-validation">
                                <form class="needs-validation" novalidate="" method="POST"
                                    action="{{ route('superadmin.utilisateurs.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="mb-5 row">
                                                    <label class="col-lg-4 col-form-label h2" for="validationCustom01">Email
                                                        Entreprise
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-8">
                                                        <input type="email" class="form-control" id="validationCustom01"
                                                            placeholder="Enter le nom entreprise." required=""
                                                            name="email">
                                                        <div class="invalid-feedback">
                                                            entrer le email .
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="mb-5 row">
                                                    <label class="col-lg-4 col-form-label h2" for="validationCustom01">Mot
                                                        de
                                                        Passe
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-8">
                                                        <input type="password" class="form-control" id="validationCustom01"
                                                            placeholder="Enter le mot de passe." required=""
                                                            name="password">
                                                        <div class="invalid-feedback">
                                                            entrer le mot de passe .
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="mb-3 row">
                                                <div class="col-lg-8 ms-auto">
                                                    <button type="submit" class="btn "
                                                        style="background-color: #fd7e14; color: white;">Enregistrer</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('js')
    <!-- Datatable -->
    <script src="/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="/js/plugins-init/datatables.init.js"></script>
@endsection
