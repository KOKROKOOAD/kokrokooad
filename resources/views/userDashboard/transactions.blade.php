@extends('layouts.dashboard')

@section('dashboard')

    <div class="page-wrapper">
        <!-- Page-header start -->
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <div class="d-inline">
                            <h4>Transaction history</h4>
                            <!--<span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span>-->
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="page-header-breadcrumb">

                    </div>
                </div>
            </div>
        </div>
        <!-- Page-header end -->

        <!-- Page-body start -->
        <div class="page-body">
            <!-- Default Styling table start -->
            <div class="card">
                <div class="card-header">
                    <!--<h5>Default Styling</h5>-->
                    <!--<span>use class <code>table table-styling</code> inside table element</span>-->

                </div>
                <div class="card-block table-border-style">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr class="table-primary">
                                <th>#</th>
                                <th>Date</th>
                                <th>Ref.#</th>
                                <th>Service</th>
                                <th>Payment source</th>
                                <th>Delivered Amount(GHC)</th>
                                <th>Status</th>

                            </tr>
                            </thead>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection