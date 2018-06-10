 
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
                            <div class="table-responsive">
                                <table class="table table-hover color-table muted-table">
                                    <thead>
                                        <tr>
                                            <th>Başlık</th>
                                            <th>İçerik</th>
                                            <th class="text-nowrap">İşlem</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php foreach ($result as $row) : ?>
                                        <tr>
                                            <td><?php echo $row->service_title;?></td>
                                            <td><?php echo  word_limiter($row->service_description,8);?></td>
                                            <td class="text-nowrap">
                                                <a href="<?php echo base_url('service/EditPage/'.$row->service_id.'');?>" data-toggle="tooltip" data-original-title="Düzenle"> <i class="fa fa-pencil text-inverse m-r-10"></i></a>
                                        
                                            </td>
                                        </tr>
                                       <?php endforeach;?>
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
         