 
<div class="row">
  <div class="col-md-12">
   <?php echo $this->session->flashdata('error_message'); ?>
 </div>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="panel panel-inverse">
     <!-- <div class="panel-heading"></div> -->
     <div class="panel-wrapper collapse in" aria-expanded="true">
      <div class="panel-body">

        <div class="row">

          <div class="col-sm-12">
            <div class="white-box">
             <div class="row pull-right m-r-5 m-b-20">
              <a href="<?php echo base_url('slider/AddPage');?>" data-toggle="tooltip" data-original-title="Kayıt Ekle"> <i class="fa fa-plus text-primary"></i> Kayıt Ekle</a>
            </div> 
          </br>
            <div class="table-responsive">
              <table class="table color-table inverse-table">
                <thead>
                  <tr>
                    <th>Resim</th>
                    <th>Sıralama</th>
                    <th>Durum</th>
                    <th class="text-nowrap">İşlem</th>
                  </tr>
                </thead>
                <tbody>

                  <?php foreach ($result as $row) { ;?>
                  <tr>
                    <td width="30%"> <a class="image-popup-no-margins" href="<?php echo $row->slider_image;?>"><img width="30%" src="<?php echo $row->slider_image;?>" class="img-responsive" /></a></td>
                   
                    <td><?php echo $row->slider_order;?></td>
                    <td> <?php if ($row->is_Active==1) { ?>
                      <span class="label label-success">aktif</span>
                      <?php } else { ?>
                      <span class="label label-warning">pasif</span>
                      <?php };?>
                    </td>

                    <td class="text-nowrap">
                      <a href="<?php echo base_url('slider/EditPage/'.$row->slider_id.'');?>" data-toggle="tooltip" data-original-title="Düzenle"> <i class="fa fa-pencil text-inverse m-r-10"></i></a>
                      <a href="<?php echo base_url('slider/Delete/'.$row->slider_id.'');?>" onclick="return sor()" data-toggle="tooltip" data-original-title="Sil"> <i class="fa fa-trash text-danger m-r-10"></i></a>
                    </td>
                  </tr>
                  <?php } ; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>




    </div>
  </div>
</div>
</div>
</div>



