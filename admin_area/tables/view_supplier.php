<?php
include_once('../fucntions/admin_table_functions.php');


?>
<div class="row my-5">
                    <h3 class="fs-4 mb-3">all products</h3>
                    <div class="col">
                        <table class="table bg-white rounded shadow-sm  table-hover">
                            <thead>
                                <tr>
                                <th scope='col' width='50'>#</th>
                                <th scope='col'>Supplier ID</th>
                                <th scope='col'>First Name</th>
                                <th scope='col'>Last Name</th>
                                <th scope='col'>Phone Number</th>
                                <th scope='col'>Email</th>
                                <th scope='col'>Kebele</th>
                                <th scope='col'>House No</th>
                                <th scope='col'>City</th>
                                <th scope='col'>Subcity</th>
                                <th scope='col'>Woreda</th>
                                <th scope='col'>Date</th>
                                <th scope='col'>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                            
                            <?php
                            display_all_suppliers();
                            
                            ?>




                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>