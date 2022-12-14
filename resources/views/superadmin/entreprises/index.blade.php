@extends('layouts.base')

@section('css')
    <link href="/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
@endsection

@section('content')
    <div class="content-body">
        <div class="container-fluid">

            <div class="row page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="javascript:void(0)" style="color: #fd7e14">SuperAdmin</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Entreprise</a></li>
                </ol>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Listes des Entreprises</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example3" class="display" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Nom Entreprise</th>
                                            <th>Email</th>
                                            <th>Secteur</th>
                                            <th>Téléphone</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        @foreach ($entreprises as $entreprise)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $entreprise->name }}</td>
                                                <td>{{ $entreprise->email }}</td>
                                                <td>{{ $entreprise->secteur }}</td>
                                                <td>{{ $entreprise->telephone }}</td>
                                                <td>
                                                    <div class="d-flex">
                                                        <a href="{{ route('superadmin.entreprises.edit', $entreprise->id) }}"
                                                            class="btn btn-primary shadow btn-xs sharp me-1"><i
                                                                class="fas fa-pencil-alt"></i></a>
                                                        <form action="{{ route('superadmin.entreprises.destroy', $entreprise->id) }}"
                                                            method="POST"
                                                            onsubmit="return confirm('Voulez-vous vraiment supprimer')">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" class="btn btn-danger shadow btn-xs sharp"><i
                                                            class="fa fa-trash"></i></button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
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
