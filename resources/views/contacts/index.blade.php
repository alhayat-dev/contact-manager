@extends('layouts.main')
@section('content')
    <div class="card">
        <div class="card-header"><strong>All Contacts</strong></div>
        <table class="table">
            <tr>
                <td class="middle">
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <img class="media-object" src="http://placehold.it/100x100" alt="...">
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Contact 1</h4>
                            <address>
                                <strong>Job</strong><br>
                                contact1@sample.com
                            </address>
                        </div>
                    </div>
                </td>
                <td width="100" class="middle">
                    <div>
                        <a href="#" class="btn btn-outline-secondary btn-circle btn-xs" title="Edit">
                            <i class="fa fa-edit"></i>
                        </a>
                        <a href="#" class="btn btn-outline-danger btn-circle btn-xs" title="Delete">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </td>
            </tr>
            <tr>
                <td class="middle">
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <img class="media-object" src="http://placehold.it/100x100" alt="...">
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Contact 2</h4>
                            <address>
                                <strong>Job 2</strong><br>
                                contact2@sample.com
                            </address>
                        </div>
                    </div>
                </td>
                <td width="100" class="middle">
                    <div>
                        <a href="#" class="btn btn-outline-secondary btn-circle btn-xs" title="Edit">
                            <i class="fa fa-edit"></i>
                        </a>
                        <a href="#" class="btn btn-outline-danger btn-circle btn-xs" title="Edit">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </td>
            </tr>
        </table>
        <div class="card-footer">
            <nav aria-label="Page Navigation">
                <ul class="pagination justify-content-center">
                    <li class="page-item">
                        <a class="page-link" href="#">Previous</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item active">
                        <a class="page-link" href="#">2</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
@endsection
