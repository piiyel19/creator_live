<div class="breadcrumb-holder">
  <div class="container-fluid">
    <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="">Main Page</a></li>
      <li class="breadcrumb-item active">Page List</li>
    </ul>
  </div>
</div>




<form action="<?= base_url()?>cpanel/create_file" method="post" enctype="multipart/form-data">
  <section class="forms">
    <div class="container-fluid">
      <div class="row">


        <div class="col-lg-12" style="padding-top: 30px;">
          <div class="card">
            <div class="card-header d-flex align-items-center">
              <h4>Extra Page List</h4>
            </div>
            <div class="card-body">
                <div class="row">
                  <div class="col-md-12">


                    <table class="table">
                      <thead class="thead-dark">
                        <tr>
                          <th scope="col">File Name</th>
                          <th scope="col">Code Editor</th>
                        </tr>
                      </thead>
                      <?php  foreach($result as $data){ ?>
                      <tbody id="table_list_data">
                        <tr>
                          <th scope="row"><?= $data["name_function"]?></th>
                          <td><a href="<?= base_url()?>cpanel/extra_page_edit/<?= $data["id_view"]?>">Edit</a></td>
                        </tr>
                      </tbody>
                      <?php } ?>
                      <?php if(empty($result)){ ?>
                        <tr>
                          <td>No Data</td>
                          <td>No Data</td>
                        </tr>
                      <?php } ?>
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
</form>