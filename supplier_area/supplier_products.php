<?php

include_once('../fucntions/for_info_functions.php');


?>
<div class="row my-5">
                    <h3 class="fs-4 mb-3">all products</h3>
                    <div class="col">
                        <table class="table bg-white rounded shadow-sm  table-hover">
                            <thead>
                                <tr>
                                    <th scope='row'>No.</th>
                                    <th>Product ID</th>
                                    <th>Supplier ID</th>
                                    <th>Admin ID</th>
                                    <th>Product Name</th>
                                    <th>Product Description</th>
                                    <th>Product Brand</th>
                                    <th>Product Category</th>
                                    <th>Product Image 1</th>
                                    <th>Product Image 2</th>
                                    <th>Product Image 3</th>
                                    <th>Product Key</th>
                                    <th>Date</th>
                                    <th>Product Price</th>
                                    <th>Merch ID</th>
                                    <th>Delete</th>
                                    <th>Edit</th>

                                </tr>
                            </thead>
                            <tbody>
                            
                            <?php
                             display_all_products_for_supplier();
                            
                            ?>




                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>