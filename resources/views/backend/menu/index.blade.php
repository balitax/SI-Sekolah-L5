<?php
/**
 * Created by PhpStorm.
 * User: balitax
 * Date: 19/04/2015
 * Time: 20:12
 */
?>
@extends('backend/templates/index')
@section('js')
    <script src='{{asset('assets/js/controller/admin-menu.js')}}'></script>
@stop
@section('content')
    <div class="st-pusher" id="content" ng-controller="datamenu">
        <div class="st-content">
            <!-- extra div for emulating position:fixed of the menu -->
            <div class="st-content-inner padding-none">
                <div class="container-fluid">
                    <div class="page-section third">

                        <div class="row">
                            <div class="col-sm-12">
                                {!! Breadcrumbs::render('datamenu') !!}
                                <div class="page-header">
                                    <h1>
                                        {{$title}} <br />
                                    </h1>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-12">
                                <!-- start: BASIC TABLE PANEL -->
                                <a class="btn btn-success add-row" href="{{route('admin.datamenu.create')}}">
                                    Add New <i class="fa fa-plus"></i>
                                </a>
                                <div class="pull-right col-sm-5">
                                    <input class="form-control col-md-12" ng-model="query" style="background:#ffffff"  placeholder="Cari Menu">
                                </div>
                                <br />
                                <br />
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <alert ng-repeat="alert in alerts" type="<%alert.type%>" close="closeAlert($index)"><% alert.msg %></alert>
                                        <table id="sample-table-1" class="table table-hover">
                                            <thead>
                                            <tr>
                                                <th>Judul Menu</th>
                                                <th>Slug Menu</th>
                                                <th>ID Parent</th>
                                                <th class="hidden-xs center">Aksi Data</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr ng-repeat="status in data| filter:paginate">
                                                <td><% status['title'] %></td>
                                                <td><% status['slug_menu'] %></td>
                                                <td><% status['id_parent'] %></td>
                                                <td class="center">
                                                    <div>
                                                        <div class="btn-group">
                                                            <a href="#" data-toggle="dropdown" class="btn btn-primary dropdown-toggle btn-sm">
                                                                <i class="fa fa-cog"></i> <span class="caret"></span>
                                                            </a>
                                                            <ul class="dropdown-menu pull-right" role="menu">
                                                                <li role="presentation">
                                                                    <a href="{{url('admin/datamenu')}}/<% status['id']%>/edit" tabindex="-1" role="menuitem">
                                                                        <i class="fa fa-edit"></i> Edit
                                                                    </a>
                                                                </li>
                                                                <li role="presentation">
                                                                    <a href="#" tabindex="-1" role="menuitem" ng-click="delete(status['id'])">
                                                                        <i class="fa fa-times"></i> Hapus
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <pagination total-items="totalItems" ng-model="currentPage"
                                                    max-size="10" boundary-links="true"
                                                    items-per-page="numPerPage" class="pagination-sm">
                                        </pagination>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@stop