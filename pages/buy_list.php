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
              <li class="breadcrumb-item active">Catagory</li>
            </ol>
            </div><!-- /.col -->
            </div><!-- /.row -->
            </div><!-- /.container-fluid -->
          </div>
          <!-- /.content-header -->
          <!-- Main content -->
          <section class="content">
            <div class="container-fluid">
                 <div class="card">
            <div class="card-body">
                  <!-- /.card-header -->
                  
                     <div class="calculation-area">

                      <div class="row">
                           <div class="col-12 col-sm-6 col-md-4">
                          <div class="info-box bg-success">
                            <div class="info-box-content">
                              <span class="info-box-text">Total Total Sell</span>
                              <span class="info-box-number"> 
                                <?php 
                                  $stmt = $pdo->prepare("SELECT SUM(`purchase_subtotal`) FROM `purchase_products`");
                                  $stmt->execute();
                                  $res = $stmt->fetch(PDO::FETCH_NUM) ;

                                  echo $res[0];

                                ?>
                                </span>
                            </div>
                             <span class="info-box-icon"><i class="material-symbols-outlined">sell</i></span>
                            <!-- /.info-box-content -->
                          </div>
                          <!-- /.info-box -->
                        </div>

                   <div class="col-12 col-sm-6 col-md-4">
                          <div class="info-box bg-danger">
             
                            <div class="info-box-content">
                              <span class="info-box-text">Total Paid Amount</span>
                              <span class="info-box-number"> 
                                <?php 
                                  $stmt = $pdo->prepare("SELECT SUM(`paid_amount`) FROM `invoice`");
                                  $stmt->execute();
                                  $res = $stmt->fetch(PDO::FETCH_NUM);

                                  echo $res[0];

                                ?>
                                </span>
                            </div>
                              <span class="info-box-icon">

                                <i class="material-symbols-outlined">paid</i></span>
                            <!-- /.info-box-content -->
                          </div>
                          <!-- /.info-box -->
                        </div>

                         <div class="col-12 col-sm-6 col-md-4">
                          <div class="info-box bg-info">
                         
                            <div class="info-box-content">
                              <span class="info-box-text">Total Due Amount</span>
                              <span class="info-box-number"> 
                                <?php 
                                  $stmt = $pdo->prepare("SELECT SUM(`due_amount`) FROM `invoice`");
                                  $stmt->execute();
                                  $res = $stmt->fetch(PDO::FETCH_NUM);

                                  echo $res[0];

                                ?>
                                </span>
                            </div>
                             <span class="info-box-icon "><i  class="material-symbols-outlined">money</i></span>
                            <!-- /.info-box-content -->
                          </div>
                          <!-- /.info-box -->
                        </div>
                          <!-- /.info-box -->
                        </div>
                    </div>
                  </div>
                </div>
            
<div class="card">
            <div class="card-body">
                     <div class="card-header">
                    <h3 class="card-title"><b>Total Product List</b></h3>
                    <a href="index.php?page=add_product" target="_blank" class="btn btn-primary btn-sm float-right rounded-0" ><i class="fas fa-plus"></i> New Product</a>
                  </div>
                  
                    <div class="table-responsive">
                      <table id="purchaseTable" class="display dataTable text-center">
                        <thead>
                          <tr>
                            <th>Id</th>
                            <th>Product name</th>
                            <th>purchase date</th>
                            <th>quantity</th>
                            <th>purchase price</th>
                            <th>sell price</th>
                            <th>purchase total</th>
                            <th>due bill</th>
                            <th>return status</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        
                      </table>
                    </div>
                  </div>
                  <!-- /.card-body -->
                </div>
                  <!-- /.card-body -->
                </div>
          </section>