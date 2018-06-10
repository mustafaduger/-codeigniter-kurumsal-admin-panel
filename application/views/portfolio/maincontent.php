 
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
              <a href="<?php echo base_url('portfolio/AddPage');?>" data-toggle="tooltip" data-original-title="Kayıt Ekle"> <i class="fa fa-plus text-primary"></i> Kayıt Ekle</a>
            </div> 
          </br>
          <div class="table-responsive">
            <table id="myTable" class="table table-striped">
              <thead>
                <tr>
                  <th>Resim</th>
                  <th>Başlık</th>
                  <th>Sıralama</th>
                  <th>Durum</th>
                  <th class="text-nowrap">İşlem</th>
                </tr>
              </thead>
              <tbody>

                <?php foreach ($result as $row) { ;?>
                <tr>

                 <td width="30%"> <a class="image-popup-no-margins" href="<?php echo base_url($row->portfolio_image);?>"><img width="30%" src="<?php echo base_url($row->portfolio_image);?>" class="img-responsive" /></a></td>
                 <td><?php echo  $row->portfolio_title;?></td>
                 <td><?php echo $row->portfolio_order;?></td>
                 <td> <?php if ($row->is_Active==1) { ?>
                  <span class="label label-success">aktif</span>
                  <?php } else { ?>
                  <span class="label label-warning">pasif</span>
                  <?php };?>
                </td>

                <td class="text-nowrap">
                  <a href="<?php echo base_url('portfolio/EditPage/'.$row->portfolio_id.'');?>" data-toggle="tooltip" data-original-title="Düzenle"> <i class="fa fa-pencil text-inverse m-r-10"></i></a>
                  <a href="<?php echo base_url('portfolio/Delete/'.$row->portfolio_id.'');?>" onclick="return sor()" data-toggle="tooltip" data-original-title="Sil"> <i class="fa fa-trash text-danger m-r-10"></i></a>
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



