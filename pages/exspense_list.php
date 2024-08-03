<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark"><!-- Dashboard v2 --></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Expense catagory</li>
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
                   <div class="col-12 col-sm-6 col-md-4">
                          <div class="info-box bg-success">
                            
                            <div class="info-box-content">
                              <span class="info-box-text">Total Expense</span>
                              <span class="info-box-number"> 
                                <?php 
                                  $stmt = $pdo->prepare("SELECT SUM(`amount`) FROM `expense`");
                                  $stmt->execute();
                                  $res = $stmt->fetch(PDO::FETCH_NUM);

                                  echo $res[0];

                                ?>
                                </span>
                            </div>
                            <span class="info-box-icon"><i class="material-symbols-outlined">local_atm</i></span>

                            <!-- /.info-box-content -->
                          </div>
                          <!-- /.info-box -->
                        </div>


                        </div>
              </div>
              <!-- .row -->
              <div class="card">
               <div class="card-body">
            <div class="card-header">
                <h3 class="card-title"><b>All expense catagory</b></h3>
               <a href="index.php?page=add_expense" class="btn btn-primary btn-sm float-right rounded-0">Add expense</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="table-responsive">
                  <div class="table-responsive">
                    <table id="expenseList" class="display dataTable text-center">
                      <thead>
                        <tr>
                          <th>SI</th>
                          <th>expense date</th>
                          <th>expense for</th>
                          <th>expense amount</th>
                          <th>expense catagory</th>
                          <th>expense description</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card-body -->
            <!-- /.row -->
            </div><!--/. container-fluid -->
          </section>
          <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->