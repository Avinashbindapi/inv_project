   <!-- Modal -->
   <div class="modal fade" id="form_products" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
       <div class="modal-dialog" role="document">
           <div class="modal-content">
               <div class="modal-header">
                   <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                   </button>
               </div>
               <div class="modal-body">
                   <form id="product_form" onsubmit="return false">
                       <div class="form-row">
                           <div class="form-group col-md-6">
                               <label>Date</label>
                               <input type="text" class="form-control" id="added_date" name="added_date" value="<?php echo date("Y-m-d"); ?>" readonly />
                           </div>
                           <div class="form-group col-md-6">
                               <label>Product Name</label>
                               <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Enter product Name" required>
                           </div>
                       </div>
                       <div class="form-group">
                           <label>Category</label>
                           <select id="select_cat" name="select_cat" class="form-control" required>
                               <option selected>Choose...</option>
                               <option>...</option>
                           </select>
                       </div>
                       <div class="form-group">
                           <label>Brand</label>
                           <select id="select_brand" name="select_brand" class="form-control" required>
                               <option selected>Choose...</option>
                               <option>...</option>
                           </select>
                       </div>
                       <div class="form-group">
                           <label>Product Price</label>
                           <input type="text" class="form-control" name="product_price" id="product_price">
                       </div>
                       <div class="form-group">
                           <label>Quantity</label>
                           <input type="text" class="form-control" name="product_qty" id="product_qty">
                       </div>
                       <button type="submit" class="btn btn-primary">Add Product</button>
                   </form>
               </div>
               <div class="modal-footer">
                   <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                   <button type="button" class="btn btn-primary">Save changes</button>
               </div>
           </div>
       </div>
   </div>