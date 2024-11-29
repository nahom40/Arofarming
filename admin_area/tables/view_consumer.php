<?php

include_once('../fucntions/admin_table_functions.php');


?>
<div class="row my-5">
                    <h3 class="fs-4 mb-3">all products</h3>
                    <div class="col">
                        <table class="table bg-white rounded shadow-sm  table-hover">
                            <thead>
                                <tr>
                                    <th scope="col" width="50">#</th>
                                    <th scope="col">C_id</th>
                                    <th scope="col">C_fname</th>
                                    <th scope="col">C_lname</th>
                                    <th scope="col">C_phonenumber</th>
                                    <th scope="col">C_email</th>
                                    <th scope="col">C_date</th>
                                    <th scope="col">C_house_no</th>
                                    <th scope="col">C_state</th>
                                    <th scope="col">C_city</th>
                                    <th scope="col">C_Subcity</th>
                                    <th scope="col">C_worda</th>
                                    <th scope="col">C_kebele</th>
                                    <th scope="col">delete </th>
                                </tr>
                            </thead>
                            <tbody>
                            
                            <?php
                             display_all_consumer();
                            
                            ?>




                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>