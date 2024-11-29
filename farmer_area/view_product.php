<?php

include_once('../fucntions/admin_table_functions.php');

?>
<div class="row my-5">
                    <h3 class="fs-4 mb-3">all products</h3>
                    <div class="col">
                        <table class="table bg-white rounded shadow-sm  table-hover">
                            <thead>
                            <tr>
                            <th>#</th>
                            <th>P_id</th>
                            <th>F_id</th>
                            <th>A_id</th>
                            <th>P_name</th>
                            <th>P_desc</th>
                            <th>PC_id</th>
                            <th>P_image1</th>
                            <th>P_image2</th>
                            <th>P_image3</th>
                            <th>P_key</th>
                            <th>P_date</th>
                            <th>P_price</th>
                            <th>PL_id</th>
                            <th>merch_id</th>
                            <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            
                            <?php
                            display_all_farmer_product();
                            
                            ?>




                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>