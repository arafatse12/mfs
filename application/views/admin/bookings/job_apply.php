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
                        Job Apply
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
                                        <th>Address
                                        </th>
                                        <th>Cv
                                        </th>
                                        <th>Message
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
										<td>'.$rows['address'].'</td>
										<td> <a href="'.base_url().$rows['upload_cv'].'" target="_blank" ><i class="fa fa-download"></i></a></td>
										<td>'.$rows['message'].'</td>
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