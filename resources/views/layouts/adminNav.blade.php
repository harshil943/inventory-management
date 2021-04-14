{{-- {{dd(auth()->user()->notifications[0]->data['data'])}} --}}
<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element"> <span>
                        <img alt="image" class="img-circle" style="height: 80px;" src="{{asset('storage/Logo/profile_default.png')}}" />
                         </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#" style="text-decoration:none;">
                        <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">{{auth()->user()->name}}</strong>
                            </span> <span class="text-muted text-xs block" >
                                @if (auth()->user()->hasRole('super-admin'))
                                    Owner
                                @else
                                    Admin
                                @endif
                                <b class="caret"></b>
                            </span>
                        </span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="profile">Profile</a></li>
                        <li><a href={{route('logout')}}>Logout</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    @if (auth()->user()->hasRole('super-admin'))
                        Owner
                    @else
                        Admin
                    @endif
                </div>
            </li>
            <li class="dashboard">
                <a href="{{url('dashboard')}}" style="text-decoration:none"><i class="fa fa-tachometer"></i> <span class="nav-label">Admin Dashboard</span> </a>
            </li>
            <li class="employee">
                <a href="" style="text-decoration:none"><i class="fa fa-id-badge"></i> <span class="nav-label">Employee</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="{{route('employee.create')}}" style="text-decoration:none;">Add Employee</a></li>
                    <li><a href="{{route('employee.index')}}" style="text-decoration:none;">Manage Employee</a></li>
                </ul>
            </li>
            <li class="employee-salary">
                <a href="" style="text-decoration:none"><i class="fa fa-address-card-o"></i> <span class="nav-label">Employee Salary</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="{{route('empsalary.create')}}" style="text-decoration:none;">Add Employee Salary</a></li>
                    <li><a href="{{route('empsalary.index')}}" style="text-decoration:none;">Manage Employee Salary</a></li>
                </ul>
            </li>
            @role('super-admin')
            <li class="designation">
                <a href="{{route('designation.index')}}" style="text-decoration:none;"><i class="fa fa-user"></i> <span class="nav-label">Designation</span></a>
            </li>
            @endrole
            <li class="orders">
                <a href="" style="text-decoration:none"><i class="fa fa-list"></i> <span class="nav-label">Orders</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="{{route('orders.orderForm')}}" style="text-decoration:none;">Add Order</a></li>
                    <li><a href="{{route('orders.index')}}" style="text-decoration:none;">Manage Order</a></li>
                </ul>
            </li>
            <li class="product_category">
                <a href="" style="text-decoration:none"><i class="fa fa-product-hunt"></i> <span class="nav-label">Product Category</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="{{route('category.create')}}" style="text-decoration:none;">Add category</a></li>
                    <li><a href="{{route('category.index')}}" style="text-decoration:none;">Manage category</a></li>
                </ul>
            </li>
            <li class="products">
                <a href="" style="text-decoration:none"><i class="fa fa-podcast"></i> <span class="nav-label">Product</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="{{route('product.create')}}" style="text-decoration:none;">Add Product</a></li>
                    <li><a href="{{route('product.index')}}" style="text-decoration:none;">Manage Product</a></li>
                </ul>
            </li>
            <li class="quotation">
                <a href="{{route('quotation.index')}}" style="text-decoration:none;"><i class="fa fa-inr"></i> <span class="nav-label">Quotation</span></a>
            </li>
            <li class="consignee">
                <a href="" style="text-decoration:none"><i class="fa fa-handshake-o"></i> <span class="nav-label">Consignee</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="{{route('consignee.create')}}" style="text-decoration:none;">Add Consignee</a></li>
                    <li><a href="{{route('consignee.index')}}" style="text-decoration:none;">Manage Consignee</a></li>
                </ul>
            </li>
            <li class="inventory">
                <a href="" style="text-decoration:none"><i class="fa fa-archive"></i> <span class="nav-label">Inventory</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="{{route('inventory.create')}}" style="text-decoration:none;">Add Inventory</a></li>
                    <li><a href="{{route('inventory.index')}}" style="text-decoration:none;">Manage Inventory</a></li>
                </ul>
            </li>
            <li class="raw">
                <a href="" style="text-decoration:none"><i class="fa fa-cubes"></i> <span class="nav-label">Raw Material</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="{{route('rawmaterial.create')}}" style="text-decoration:none;">Add Material</a></li>
                    <li><a href="{{route('rawmaterial.index')}}" style="text-decoration:none;">Manage Material</a></li>
                </ul>
            </li>
            <li class="expense">
                <a href="" style="text-decoration:none"><i class="fa fa-money"></i> <span class="nav-label">Expenses</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="{{route('expense.create')}}" style="text-decoration:none;">Add Expance</a></li>
                    <li><a href="{{route('expense.index')}}" style="text-decoration:none;">Manage Expance</a></li>
                </ul>
            </li>
            <li class="asset">
                <a href="" style="text-decoration:none"><i class="fa fa-square"></i> <span class="nav-label">Asset</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="{{route('asset.create')}}" style="text-decoration:none;">Add Asset</a></li>
                    <li><a href="{{route('asset.index')}}" style="text-decoration:none;">Manage Asset</a></li>
                </ul>
            </li> <li class="machine">
                <a href="" style="text-decoration:none"><i class="fa fa-hdd-o"></i> <span class="nav-label">Machine Error</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="{{route('machine.create')}}" style="text-decoration:none;">Add Machine Error</a></li>
                    <li><a href="{{route('machine.index')}}" style="text-decoration:none;">Manage Machine Error</a></li>
                </ul>
            </li>
            <li class="logout">
                <a href="{{route('logout')}}" style="text-decoration:none;"><i class="fa fa-sign-out"></i> <span class="nav-label">Logout</span></a>
            </li>
        </ul>
    </div>
</nav>
<div id="page-wrapper" class="sidebar-content overflow-hidden" style="background:lightgray">
    <div class="row border-bottom" >
    <nav class="navbar navbar-static-top" role="navigation" style="background:lightgray">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary" href="#"><i class="fa fa-bars"></i> </a>
        </div>
        <ul class="nav navbar-top-links navbar-right">
            <li>
                <span class="m-r-sm text-muted welcome-message">Welcome to Bright Containers</span>
            </li>
            <li class="dropdown">
                <a class="dropdown-toggle count-info" id="markasread" data-toggle="dropdown" href="#">
                    <i class="fa fa-envelope"></i>  <span class="label label-warning">{{count(auth()->user()->unreadNotifications)}}</span>
                </a>
                <ul class="dropdown-menu dropdown-messages text-center">
                    @foreach (auth()->user()->unreadNotifications as $item)
                        <li>
                            <div class="dropdown-messages-box">
                                {{$item->data['name']}} Registered query about {{$item->data['product']}}
                            </div>
                        </li>
                        <hr>
                    @endforeach
                </ul>
            </li>

            <li>
                <a href={{route('logout')}}>
                    <i class="fa fa-sign-out"></i> Logout
                </a>
            </li>
        </ul>

    </nav>

