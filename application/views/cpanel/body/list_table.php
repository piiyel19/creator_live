<div class="breadcrumb-holder">
  <div class="container-fluid">
    <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="">Data Management</a></li>
      <li class="breadcrumb-item active">List Table</li>
    </ul>
  </div>
</div>




  <section class="forms">
    <div class="container-fluid">
      <div class="row">


        <div class="col-lg-12" style="padding-top: 30px;">
          <div class="card">
            <div class="card-header">
              <h4>List Table
              </h4>
            </div>
            <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <table class="table">
                      <thead class="thead-dark">
                        <tr>
                          <th scope="col">Table Name</th>
                          <th scope="col">Description</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      
                      <tbody id="table_list_data">
                        <?php  foreach($result as $data){ ?>
                        <tr>
                          <td scope="col"><?= $data['tbl']?></td>
                          <td scope="col"><?= $data['d_tbl']?></td>
                          <td scope="col"><a href="<?= base_url()?>/cpanel/create_column/<?= $data['tbl']?>">View</a></td>
                        </tr>
                        <?php } ?>
                        <?php if(empty($result)){ ?>
                        <tr>
                            <td>No Data</td>
                            <td>No Data</td>
                            <td>No Data</td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                    <div style='margin-top: 30px; float: right; padding-right: 30px;'>
                      <?= $pagination; ?>
                    </div>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>