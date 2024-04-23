@extends('layouts.app')
@section('title')
My Profile
@endsection
@section('breadcrumb')
<li class="breadcrumb-item">Dashboard</li>
<li class="breadcrumb-item active">My Profile</li>
@endsection
@section('content')
<!-- Content wrapper start -->
<div class="content-wrapper">

<!-- Row start -->
<div class="row gutters">
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
        <div class="user-details h-320">
            <div class="user-thumb">
                <img src="{{asset('asset/img/user6.png')}}" alt="Admin Template" />
            </div>
            <h4>{{ Auth::user()->name }}</h4>
            <h6>UX Designer</h6>
            <p>Canada</p>
            <button class="btn btn-lg btn-primary">Follow</button>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
        <div class="skillset-container h-320">
            <h5>Skills</h5>
            <div class="categories">
                <span class="badge badge-primary">UX Design</span>
                <span class="badge badge-primary">HTML5</span>
                <span class="badge badge-primary">CSS3</span>
                <span class="badge badge-primary">Sass/Less</span>

            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
        <div class="card h-320">
            <div class="card-header">
                <div class="card-title">Tasks</div>
            </div>
            <div class="card-body">
                <div id="basic-radial-graph2"></div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
        <div class="user-photos h-320">
            <h5>25K Photos</h5>
        </div>
    </div>
</div>
<!-- Row end -->

<!-- Row start -->
<div class="row gutters">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Projects</div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table projects-table">
                        <thead>
                            <tr>
                                <th>Client</th>
                                <th>Location</th>
                                <th>Budjet</th>
                                <th>Progress</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>												
                            <tr>
                                <td>
                                    <div class="project-details">
                                        <img src="img/user6.png" class="avatar" alt="Wafi Admin">
                                        <div class="project-info">
                                            <p>Valda Purdy</p>
                                            <p>Ecommerce Store</p>
                                        </div>
                                    </div>
                                </td>										
                                <td>
                                    <div class="project-details">
                                        <div class="project-info">
                                            <p>California, LA</p>
                                            <p>USA</p>
                                        </div>
                                    </div>														
                                </td>
                                <td>
                                    <div class="project-details">
                                        <div class="project-info">
                                            <p>$65,820</p>
                                            <p>$31,000 Paid</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="project-details">
                                        <div class="project-info">
                                            <p>30% completed</p>
                                            <div class="progress">
                                                <div class="progress-bar bg-danger" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="project-details">
                                        <div class="project-info">
                                            <div class="status approved">
                                                <i class="icon-check_circle"></i> Completed
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="project-details">
                                        <img src="img/user2.png" class="avatar" alt="Wafi Admin">
                                        <div class="project-info">
                                            <p>Désirée Nosbusch</p>
                                            <p>Television presenter</p>
                                        </div>
                                    </div>
                                </td>										
                                <td>
                                    <div class="project-details">
                                        <div class="project-info">
                                            <p>Luxembourg</p>
                                            <p>Europe</p>
                                        </div>
                                    </div>														
                                </td>
                                <td>
                                    <div class="project-details">
                                        <div class="project-info">
                                            <p>$86,409</p>
                                            <p>$72,000 Paid</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="project-details">
                                        <div class="project-info">
                                            <p>45% completed</p>
                                            <div class="progress">
                                                <div class="progress-bar bg-info" role="progressbar" style="width: 45%" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="project-details">
                                        <div class="project-info">
                                            <div class="status pending">
                                                <i class="icon-info1"></i> Ongoing
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="project-details">
                                        <img src="img/user4.png" class="avatar" alt="Wafi Admin">
                                        <div class="project-info">
                                            <p>Ichiro Suzuki</p>
                                            <p>Baseball outfielder</p>
                                        </div>
                                    </div>
                                </td>										
                                <td>
                                    <div class="project-details">
                                        <div class="project-info">
                                            <p>Nagoya</p>
                                            <p>Japan</p>
                                        </div>
                                    </div>														
                                </td>
                                <td>
                                    <div class="project-details">
                                        <div class="project-info">
                                            <p>$92,498</p>
                                            <p>$56,000 Paid</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="project-details">
                                        <div class="project-info">
                                            <p>78% completed</p>
                                            <div class="progress">
                                                <div class="progress-bar bg-success" role="progressbar" style="width: 78%" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="project-details">
                                        <div class="project-info">
                                            <div class="status rejected">
                                                <i class="icon-circle-with-cross"></i> Cancelled
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
        <div class="card h-320">
            <div class="card-header">
                <div class="card-title">Todo's</div>
            </div>
            <div class="card-body">
                <div class="todo-container">
                    <ul class="todo-body">
                        <li class="todo-list">
                            <div class="todo-info">
                                <span class="dot blue"></span>
                                <p>Team Meeting</p>
                                <p>Thursday at 3:30 PM</p>
                            </div>
                        </li>
                        <li class="todo-list done">
                            <div class="todo-info">
                                <span class="dot orange"></span>
                                <p>Make new page</p>
                                <p>Wednesday at 10:30 AM</p>
                            </div>
                        </li>
                        <li class="todo-list done">
                            <div class="todo-info">
                                <span class="dot yellow"></span>
                                <p>Product launch</p>
                                <p>Sunday at Baur Lac, Zurich</p>
                            </div>
                        </li>
                        <li class="todo-list done">
                            <div class="todo-info">
                                <span class="dot green"></span>
                                <p>Code Review</p>
                                <p>Friday at 2:00PM</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
        <div class="card h-320">
            <div class="card-header">
                <div class="card-title">Bookmarks</div>
            </div>
            <div class="card-body">
                <ul class="bookmarks">
                    <li>
                        <a href="#">Bootstrap admin template</a>
                    </li>
                    <li>
                        <a href="#">Images resources</a>
                    </li>
                    <li>
                        <a href="#">Best admin templates 2020</a>
                    </li>
                    <li>
                        <a href="#">Javascript libraries</a>
                    </li>
                    <li>
                        <a href="#">Angular widgets</a>
                    </li>
                    <li>
                        <a href="#">UX library</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12">
        <!-- Row start -->
        <div class="row gutters">
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                <div class="social-tile">
                    <div class="social-icon fb">
                        <i class="icon-facebook"></i>
                    </div>
                    <div class="social-stats">
                        <h3>4500</h3>
                        <p>Posts</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                <div class="social-tile">
                    <div class="social-icon tw">
                        <i class="icon-twitter"></i>
                    </div>
                    <div class="social-stats">
                        <h3>2590</h3>
                        <p>Tweets</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                <div class="social-tile">
                    <div class="social-icon lk">
                        <i class="icon-rss"></i>
                    </div>
                    <div class="social-stats">
                        <h3>320</h3>
                        <p>Blog Posts</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Share your thoughts</div>
                    </div>
                    <div class="card-body">
                        <div class="share-thoughts-container">
                            <textarea class="form-control" rows="3">Hello, </textarea>
                            <div class="share-thoughts-footer">
                                <div class="share-icons">
                                    <a href="#">
                                        <i class="icon-map2"></i>
                                    </a>
                                    <a href="#">
                                        <i class="icon-link"></i>
                                    </a>
                                    <a href="#">
                                        <i class="icon-camera2"></i>
                                    </a>
                                    <a href="#">
                                        <i class="icon-users"></i>
                                    </a>
                                </div>
                                <button class="btn btn-primary">Share</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Row end -->		
    </div>
</div>
<!-- Row end -->

</div>
<!-- Content wrapper end -->
@endsection
