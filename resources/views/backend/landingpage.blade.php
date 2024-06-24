@extends('backend.layouts.app')
@section('content')
<div class="content">
    <div class="breadcrumb-wrapper breadcrumb-contacts">
        <div>
            <h1>Landing Page List</h1>
            <p class="breadcrumbs"><span><a href="{{ route('dashboard') }}">Dashboard</a></span>
                <span><i class="mdi mdi-chevron-right"></i></span>Landing Page
            </p>
        </div>

    </div>

    <div class="row">
        <div class="col-12">
            <div class="ec-vendor-list card card-default">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="responsive-data-table" class="table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Link</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td><a href="https://cottonbd.nitebiz.com/black/dress">https://cottonbd.nitebiz.com/black/dress</a></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td><a href="https://cottonbd.nitebiz.com/landing/page">https://cottonbd.nitebiz.com/landing/page</a></td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td><a href="https://cottonbd.nitebiz.com/putul/dress">https://cottonbd.nitebiz.com/putul/dress</a></td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td><a href="https://cottonbd.nitebiz.com/sharee">https://cottonbd.nitebiz.com/sharee</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
