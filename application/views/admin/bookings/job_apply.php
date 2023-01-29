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
                                        <th>Cv
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
										<td> <a href="'.base_url().$rows['upload_cv'].'" target="_blank" ><i class="fa fa-download"></i></a></td>
										<td>'.$rows['position'].'</td>
                                        <td class="text-right">
									
									<a href="javascript:;" class="on-default remove-row btn btn-sm bg-danger-light mr-2 delete_job_apply" id="Onremove_'.$rows['id'].'" data-id="'.$rows['id'].'"><i class="far fa-trash-alt mr-1"></i> '.$rows['lg_admin_delete'].'</a></td>
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