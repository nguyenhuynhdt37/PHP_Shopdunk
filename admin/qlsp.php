   <!-- Main Content -->
   <div class="col-7">
       <h1 class="product_management-title ">Quản lý sản phẩm</h1>
       <div class="product_management-tools row-cols-auto mt-lg-4 ">
           <button type="button" class="btn  btn-warning  border border-warning btn-outline-light text-dark "><i class="fa-solid fa-plus"></i> Thêm</button>
           <button type="button" class="btn  btn-outline-light text-dark btn btn-warning border border-warning"><i class="fa-solid fa-magnifying-glass"></i> Tìm kiếm</button>
           <button type="button" class="btn  btn-outline-light text-dark btn btn-warning border border-warning"><i class="fa-solid fa-arrows-rotate"></i> Refresh</button>
           <button type="button" class="btn  btn-outline-light text-dark btn btn-warning border border-warning"><i class="fa-solid fa-trash-can"></i> Xóa chọn</button>
       </div>
       <div class="management container-fluid mt-5">
           <div class="management-list col-2 me-2 ">
               <ul class="nav nav-pills flex-column">
                   <li class="management-item nav-item p-2 rounded-top-1">
                       <div class="btn btn-warning btn-outline-dark" onclick="showTab('product-management', this)">Quản lý sản phẩm</div>
                   </li>
                   <li class="management-item nav-item p-2 rounded-bottom-1">
                       <div class="btn btn-warning btn-outline-dark" onclick="showTab('category-management', this)">Quản lý danh mục</div>
                   </li>
               </ul>
           </div>
           <div class="col-10">
               <div class="tab-content">
                   <div class="tab-pane fade show " id="product-management">
                       <table class="table table-bordered custom-table">
                           <thead class="table-info">
                               <tr>
                                   <th scope="col">ID</th>
                                   <th scope="col">Img</th>
                                   <th scope="col">Name</th>
                                   <th scope="col">Price</th>
                                   <th scope="col">Quantity</th>
                                   <th scope="col">Categories</th>
                                   <th scope="col">Edit</th>
                                   <th scope="col">Delete</th>
                               </tr>
                           </thead>
                           <tbody>
                               <tr>
                                   <td>1</td>
                                   <td><img class="img-table" src="https://kenh14cdn.com/203336854389633024/2024/1/13/photo-6-1705156068028253950024.jpg" alt=""></td>
                                   <td>Iphone 20 pro max plus plus</td>
                                   <td>$20.00</td>
                                   <td>5</td>
                                   <td>Category A</td>
                                   <td><a href="#"> [Edit]</a> </td>
                                   <td><a href="#"> [Delete]</a></td>
                               </tr>
                           </tbody>
                       </table>
                   </div>
                   <div class="tab-pane fade show " id="category-management">
                       <table class="table table-bordered custom-table">
                           <thead class="table-info">
                               <tr>
                                   <th scope="col">ID</th>
                                   <th scope="col">Ảnh</th>
                                   <th scope="col">Tên danh mục</th>
                                   <th scope="col">Số lượng sp</th>
                                   <th scope="col">Sửa</th>
                                   <th scope="col">Xóa</th>
                               </tr>
                           </thead>
                           <tbody>
                               <tr>
                                   <td>1</td>
                                   <td>ảnh</td>
                                   <td>danh mục 1</td>
                                   <td>0</td>
                                   <td>
                                   </td>
                                   <td><a href="#"> [Xóa]</a></td>
                               </tr>
                           </tbody>
                       </table>
                   </div>
               </div>
           </div>
       </div>


   </div>
   <!-- End of Main Content -->


   <script src="./js/qlsp.js"></script>