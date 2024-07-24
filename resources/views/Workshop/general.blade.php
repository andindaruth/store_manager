<?php include 'partials/head.php'; ?>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <?php include 'partials/navbar.php'; ?>
        <?php include 'partials/sidebar.php'; ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper mi-bg">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">All taken Items</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <!-- <li class="breadcrumb-item active">Update Password</li> -->
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">

                    <div class="row">
                        <!-- filter -->
                        <div class="col-sm-12">
                            <div class="card card-outline card-success">

                                <!-- /.card-header -->
                                <div class="card-body pb-1 pt-1">
                                    <form action="enhanced-results.html">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label>Category 1</label>
                                                            <div class="input-group ">
                                                                <select class="select2" style="width: 100%;">
                                                                    <option selected>-- All</option>
                                                                    <option>Items</option>

                                                                    <option>Tools</option>
                                                                    <option>Spare parts</option>

                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label>Category 2</label>
                                                            <div class="input-group ">
                                                                <select class="select2" style="width: 100%;">
                                                                    <option selected>-- All</option>
                                                                    <option>Farm</option>

                                                                    <option>Workshop</option>
                                                                    

                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label>Category 3</label>
                                                            <div class="input-group ">
                                                                <select class="select2" style="width: 100%;">
                                                                    <option selected>-- All</option>
                                                                    <option>Returnable</option>

                                                                    <option>Non Returnable</option>
                                                                    

                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label>Equipement Name</label>
                                                            <div class="input-group ">
                                                                <select class="select2" style="width: 100%;">
                                                                    <option selected>-- All</option>
                                                                    <option>Hammer</option>

                                                                    <option>Tyre</option>
                                                                    <option>Screw driver</option>

                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label>Person</label>
                                                            <div class="input-group ">
                                                                <select class="select2" style="width: 100%;">
                                                                    <option selected>-- All</option>
                                                                    

                                                                    <option>Ruth</option>
                                                                    <option>Andinda</option>
                                                                    <option>Timothy</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <!-- <label>Starting Date *</label> -->
                                                            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                                               From: <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" required="required" />
                                                                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <!-- <label>Closing Date *</label> -->
                                                            <div class="input-group date" id="reservationdate1" data-target-input="nearest">
                                                              To:  <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate1" />
                                                                <div class="input-group-append" data-target="#reservationdate1" data-toggle="datetimepicker">
                                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <div class="form-group">
                                                            <!-- <label>Filter</label> -->
                                                            <input type="submit" class="btn bg-success form-control" value="Submit">
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.card-body -->

                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- filter -->
                        <div class="col-sm-12">
                            <div class="card card-outline card-success">
                                <div class="card-header">
                                    <h3 class="card-title text-success"><b></b></h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body table-responsive p-0">
                                    <table id="example1" class="table table-bordered table-hover table-head-fixed table-sm">
                                        <thead>
                                            <tr class="text-nowrap">
                                                
                                                <th>Date</th>
                                                <th>Name</th>
                                                <th>Reason for taking</th>
                                                <th>Taken By</th>
                                                <th>Issued By</th>                                             
                                                <th>Quantity Taken</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="text-nowrap">
                                                
                                                <td class="text-nowrap">2023-06-23</td>
                                                <td class="text-nowrap">Hammer</td>
                                                <td class="text-nowrap">To work</td>
                                                <td class="text-nowrap">Andinda Ruth</td>
                                                <td class="text-nowrap">Timothy</td>
                                                <td class="text-primary">50</td>
                                            </tr>
                                           
                                        </tfoot>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>

                        </div>
                        <!-- /.card-body -->

                    </div>
                    <!-- /.card -->
                </div>
        </div><!-- /.main-row -->

    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php include 'partials/footer.php'; ?>
    </div>
    <!-- ./wrapper -->
    <?php include 'partials/foot.php'; ?>