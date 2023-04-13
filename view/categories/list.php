<?php view('static/header') ;?>
<div class="wrapper">

  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav ml-auto">
        <li class="nav-item d-none d-sm-inline-block">
          <a href="<?= URL.'tr/cikis' ?>" class="nav-link">Çıkış Yap</a>
        </li>
    </ul>
  </nav>

  <?php view('static/sidebar') ?>

  <div class="content-wrapper p-5">
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Kategori Listesi</h3>

                <div class="card-tools">
                    <a href="<?= URL.'tr/categories/add' ?>" class="btn btn-sm btn-warning">Ekle</a>
                </div>
              </div>
              
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">no</th>
                      <th>Başlık</th>
                      <th>Oluşturma Tarihi</th>
                      <th>Güncelleme Tarihi</th>
                      <th style="width: 40px">İşlem</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $count = 1; foreach($data as $key => $value): ?>
                    <tr>
                      <td><?= $count++?></td>
                      <td><?= $value['title']?></td>
                      <td> <?= $value['created_date']; ?> </td>
                      <td> <?= $value['updated_date']; ?> </td>
                      <td>
                        <div class="btn-group btn-group-sm">
                            <a class="btn btn-sm btn-danger" href="<?= URL.'tr/categories/remove/'.$value['id'] ?>">
                                Silmek
                            </a>
                            <a class="btn btn-sm btn-warning" href="<?= URL.'tr/categories/edit/'.$value['id'] ?>">
                                Güncelle
                            </a>
                        </div>
                      </td>
                    </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                </ul>
              </div>

            
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
  <?php view('static/footer') ;?>
</div>

<script src="<?= assets("plugins/jquery/jquery.min.js")?>"></script>
<script src="<?= assets("plugins/bootstrap/js/bootstrap.bundle.min.js")?>"></script>
<script src="<?= assets("dist/js/adminlte.min.js")?>"></script>
</body>
</html>