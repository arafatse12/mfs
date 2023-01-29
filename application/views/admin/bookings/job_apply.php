<?php
$jobAplly = $this->db->get('apply_job')->result_array();
?>
<div class="page-wrapper">
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">
                        Job Application
                    </h3>
                </div>
                <div class="col-auto text-right">
                    <a class="btn btn-white filter-btn mr-3" href="javascript:void(0);" id="filter_search">
                        <i class="fas fa-filter"></i>
                    </a>
                </div>
            </div>
        </div>



        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive total-booking-report">
                            <table class="table table-hover table-center mb-0 service_table">
                                <thead>
                                    <tr>
                                        <th>Sl
                                        </th>
                                        <th>Name
                                        </th>
                                        <th>Email
                                        </th>
                                        <th>Phone
                                        </th>
                                        
                                        <th>Date
                                        </th>
                                        <th>Download Cv
                                        </th>
                                        <th>Position
                                        </th>
                                        <th>Action
                                        </th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                      $i=1;
                                    foreach ($jobAplly as $rows) {

                                    	//echo 'eeee<pre>'; print_r($rows); exit;
                                   
									echo '<tr>
										<td>'.$i++.'</td>
										<td>'.$rows['name'].'</td>
										<td>'.$rows['email'].'</td>
										<td>'.$rows['phone'].'</td>
										
										<td>'.$rows['created_at'].'</td>
										<td> <a href="'.base_url().$rows['upload_cv'].'" class="downloadable" style="padding:20%"><i class="fa fa-file-pdf fa-2x"></i></a></td>
										<td>'.$rows['position'].'</td>
                                        <td class="text-right">
									
									<a href="javascript:;" class="on-default remove-row btn btn-sm bg-danger-light mr-2 delete_job_apply1" id="'.$rows['id'].'"
                                     data-id="'.$rows['id'].'"><i class="far fa-trash-alt mr-1"></i> '.$rows['lg_admin_delete'].'</a></td>
                                     </tr>';

                                    } ?>

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.js"></script>
    <link rel="stylesheet" href="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.css" />

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

<script>

    $(document).ready(function () {

        $('.delete_job_apply1').click(function (e) {
            e.preventDefault();

            confirmDialog = confirm("Are you sure you want to delete?");
            if(confirmDialog)
            {
                var id = $(this).attr('data-id');
                 var data = { 
                    job_apply_id: id
                };
                // alert(id);
                $.ajax({
                    type: "GET",
                     data: data,
                    url: "<?php echo base_url(); ?>/admin/delete-job-apply",
                    success: function (response) {
                       location.reload();
                       
                    }
                });
            }

        });
    });
$(function(){
  $('.downloadable').click(function(event){
     event.preventDefault();
     window.location.href = "<?php echo site_url('admin/file-download') ?>?file_name="+ $(this).attr('href');
  });
});
</script>

 
       
