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
                                    <th scope='col'>Brand ID</th>
                                    <th scope='col'>Supplier ID</th>
                                    <th scope='col'>Brand Name</th>
                                    <th scope='col'>Delete</th>

                            
                                </tr>
                            </thead>
                            <tbody>
                            
                            <?php
                             display_all_supplier_brands();
                            
                            ?>




                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>