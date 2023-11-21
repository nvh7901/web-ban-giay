<!DOCTYPE html>
<html lang="en">

<head>
    @include('frontend.body.head')
</head>

<body class="cnt-home">
    <!-- ============================================== HEADER ============================================== -->
    @include('frontend.body.header')
    <!-- ============================================== HEADER : END ============================================== -->

    {{-- Main --}}
    @yield('content')
    <!-- End main -->

    <!-- ============================================================= FOOTER ============================================================= -->
    @include('frontend.body.footer')
    <!-- ============================================================= FOOTER : END============================================================= -->

    <!-- JavaScripts placed at the end of the document so the pages load faster -->
    <script src="{{ asset('frontend/assets/js/jquery-1.11.1.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap-hover-dropdown.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/echo.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.easing-1.3.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap-slider.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.rateit.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/assets/js/lightbox.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/scripts.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        @if (Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}"
            switch (type) {
                case 'info':
                    toastr.info("{{ Session::get('message') }}");
                    break;
                case 'success':
                    toastr.success("{{ Session::get('message') }}");
                    break;
                case 'warning':
                    toastr.warning("{{ Session::get('message') }}");
                    break;
                case 'error':
                    toastr.error("{{ Session::get('message') }}");
                    break;
            }
        @endif
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><span id="pname"></span></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeModel"
                        style="margin-top: -20px">
                        <span aria-hidden="false">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card" style="width: 18rem;">

                                <img src=" " class="card-img-top" alt="..."
                                    style="height: 230px; width: 190px;" id="pimage">

                            </div>
                        </div>

                        <div class="col-md-4">
                            <ul class="list-group">
                                <li class="list-group-item">Price:
                                    <div class="product-price">
                                        <span class="price text-danger" id="pprice">

                                        </span>
                                    </div>
                                </li>
                                <li class="list-group-item">Old Price:
                                    <div class="product-price">
                                        <span class="price text-danger">
                                            <del id="oldprice"></del>
                                        </span>
                                    </div>
                                </li>
                                <li class="list-group-item">Product Code: <strong id="pcode"></strong></li>
                                <li class="list-group-item">Category: <strong id="pcategory"></strong></li>
                                <li class="list-group-item">Brand: <strong id="pbrand"></strong></li>
                            </ul>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="color">Choose Color</label>
                                <select class="form-control" id="color" name="color">


                                </select>
                            </div> <!-- // end form group -->

                            <div class="form-group" id="sizeArea">
                                <label for="size">Choose Size</label>
                                <select class="form-control" id="size" name="size">
                                    <option>1</option>

                                </select>
                            </div> <!-- // end form group -->

                            <div class="form-group">
                                <label class="info-title control-label">

                                    @if (session()->get('language') == 'en')
                                        QTY
                                    @else
                                        Số lượng
                                    @endif

                                </label>
                                <input type="number" class="form-control" id="qty" value="1" min="1">

                            </div> <!-- // end form group -->
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            @if (session()->get('language') == 'en')
                                Close
                            @else
                                Đóng
                            @endif
                        </button>
                        <input type="hidden" id="product_id">
                        <button type="button" class="btn btn-primary" onclick="addCart()">
                            Add To Cart
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- File custom CartJS --}}
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })

        function productView(id) {
            $.ajax({
                type: 'GET',
                url: '/product/modal/' + id,
                dataType: 'json',
                success: function(data) {
                    $('#pname').text(data.product.product_name_en);
                    $('#pprice').text(data.product.product_price);
                    $('#pcode').text(data.product.product_code);
                    $('#pcategory').text(data.product.category.category_name_en);
                    $('#pbrand').text(data.product.brand.brand_name_en);
                    $('#pimage').attr('src', '/upload/products/' + data.product.product_thambnail);

                    $('#product_id').val(id);
                    var discount = (100 - data.product.discount_price) / 100;
                    var sellingPrice = data.product.product_price * discount;

                    if (data.product.discount_price == null) {
                        $('#pprice').text('');
                        $('#oldprice').text('');
                        $('#pprice').text(data.product.product_price);


                    } else {
                        $('#pprice').text(sellingPrice);
                        $('#oldprice').text(data.product.product_price);

                    } // end prodcut price 

                    $('select[name="color"]').empty();
                    $.each(data.color_en, function(key, value) {
                        $('select[name="color"]').append('<option value=" ' + value + ' ">' + value +
                            ' </option>')
                    }) // end color

                    $('select[name="size"]').empty();
                    $.each(data.size_en, function(key, value) {
                        $('select[name="size"]').append('<option value=" ' + value + ' ">' + value +
                            ' </option>')
                        if (data.size_en == "") {
                            $('#sizeArea').hide();
                        } else {
                            $('#sizeArea').show();
                        }
                    }) // end size


                }
            });
        }

        // Add Product
        function addCart() {
            var product_name = $('#pname').text();
            var id = $('#product_id').val();
            var color = $('#color option:selected').text();
            var size = $('#size option:selected').text();
            var quantity = $('#qty').val();

            $.ajax({
                type: "POST",
                dataType: 'json',
                data: {
                    color_en: color,
                    size_en: size,
                    quantity: quantity,
                    product_name: product_name
                },
                url: "/cart/add/" + id,
                success: function(data) {
                    $('#closeModel').click();
                    miniCart()
                    // Start Message 
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',

                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            icon: 'success',
                            title: data.success
                        });
                        // window.location.reload();

                    } else {
                        Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error
                        })
                    }
                },
                error: function(xhr, status, error) {
                    if (xhr.status === 200) { // Unauthorized status code
                        // Redirect user to login page
                        window.location.href = '/login';
                    }
                }
            });
        }

        function miniCart() {
            $.ajax({
                type: 'GET',
                url: '/cart/mini',
                dataType: 'json',
                success: function(response) {
                    $('span[id="cartSubTotal"]').text(response.cartTotal);
                    $('#cartQty').text(response.cartQty);
                    var miniCart = ""

                    $.each(response.carts, function(key, value) {
                        miniCart += `<div class="cart-item product-summary">
                            <div class="row">
                                <div class="col-xs-4">
                                <div class="image"> 
                                    <a href="detail.html">
                                        <img src="/upload/products/${value.options.image}" alt="">
                                    </a> 
                                </div>
                                </div>
                                <div class="col-xs-7">
                                <h3 class="name"><a href="index.php?page-detail">${value.name}</a></h3>
                                <div class="price"> ${value.price} * ${value.qty} </div>
                                </div>
                                <div class="col-xs-1 action"> 
                                <button type="submit" id="${value.rowId}" onclick="miniCartRemove(this.id)"><i class="fa fa-trash"></i></button> </div>
                            </div>
                            </div>
                            </div>
                            <!-- /.cart-item -->
                            <div class="clearfix"></div>
                            <hr>`
                    });

                    $('#miniCart').html(miniCart);
                }

            });
        }
        miniCart();

        function miniCartRemove(rowId) {
            $.ajax({
                type: 'GET',
                url: 'cart/mini/remove/' + rowId,
                dataType: 'json',
                success: function(data) {
                    miniCart();

                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            icon: 'success',
                            title: data.success
                        })

                    } else {
                        Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error
                        })

                    }

                }
            });
        }

        // WishList
        function addToWishList(id) {
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: 'wishlist/add/' + id,
                success: function(data) {
                    // Start Message 
                    console.log(data);
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',

                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            icon: 'success',
                            title: data.success
                        })

                    } else {
                        Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error
                        })

                    }
                },
                error: function(xhr, status, error) {
                    if (xhr.status === 200) { // Unauthorized status code
                        // Redirect user to login page
                        window.location.href = '/login';
                    }
                }
            });
        }

        // View wishlist
        function wishList() {
            $.ajax({
                type: 'GET',
                url: '/wishlist/get-wishlist',
                dataType: 'json',
                success: function(response) {

                    var rows = ""
                    $.each(response, function(key, value) {
                        var discount = (100 - value.product.discount_price) / 100;
                        var sellingPrice = value.product.product_price * discount;
                        rows += `<tr>
                    <td class="col-md-2"><img src="/upload/products/${value.product.product_thambnail} " alt="imga"></td>
                    <td class="col-md-7">
                        <div class="product-name"><a href="#">${value.product.product_name_en}</a></div>
                         
                        <div class="price">
                        ${value.product.discount_price == null
                            ? `${formatCurrency(value.product.product_price)}`
                            :
                            `${formatCurrency(sellingPrice)} <span>${formatCurrency(value.product.product_price)}</span>`
                        }    
                        </div>
                    </td>
        <td class="col-md-2">
            <button class="btn btn-primary icon" type="button" title="Add Cart" data-toggle="modal" data-target="#exampleModal" id="${value.product_id}" onclick="productView(this.id)"> Add to Cart </button>
        </td>
        <td class="col-md-1 close-btn">
            <button type="submit" class="" id="${value.id}" onclick="wishlistRemove(this.id)"><i class="fa fa-times"></i></button>
        </td>
                </tr>`
                    });

                    $('#wishlist').html(rows);
                }
            })
        }
        wishList()

        function formatCurrency(amount) {
            var formattedAmount = amount.toLocaleString('vi-VN', {
                style: 'currency',
                currency: 'VND'
            });

            return formattedAmount;
        }

        function wishlistRemove(id) {
            $.ajax({
                type: 'GET',
                url: '/wishlist/remove/' + id,
                dataType: 'json',
                success: function(data) {
                    wishList();

                    // Start Message 
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',

                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            icon: 'success',
                            title: data.success
                        })

                    } else {
                        Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error
                        })

                    }

                    // End Message 

                }
            });

        }
    </script>

    {{-- My Cart --}}
    <script>
        function cart() {
            $.ajax({
                type: 'GET',
                url: '/cart/get-my-cart',
                dataType: 'json',
                success: function(response) {

                    var rows = ""
                    $.each(response.carts, function(key, value) {
                        rows +=
                            `<tr>
                                <td class="col-md-2"><img src="/upload/products/${value.options.image} " alt="imga" style="width:100px; height:100px;"></td>
                                
                                <td class="col-md-2">
                                    <div class="product-name"><a href="#">${value.name}</a></div>
                                    
                                    <div class="price"> 
                                            ${formatCurrency(value.price)}
                                    </div>
                                </td>


                                <td class="col-md-2">
                                    <strong>
                                        ${value.options.color} 
                                    </strong> 
                                </td>

                                <td class="col-md-2">
                                    ${value.options.size == null
                                        ? `<span> .... </span>`
                                        :
                                    `<strong>${value.options.size} </strong>` 
                                    }           
                                </td>

                                <td class="col-md-2">

                                    ${value.qty > 1

                                        ? `<button type="submit" class="btn btn-danger btn-sm" id="${value.rowId}" onclick="cartDecrement(this.id)" >-</button> `
                                        : `<button type="submit" class="btn btn-danger btn-sm" disabled >-</button> `
                                    }
                                

                                    <input type="text" value="${value.qty}" min="1" max="100" disabled="" style="width:25px;" >  

                                    <button type="submit" class="btn btn-success btn-sm" id="${value.rowId}" onclick="cartIncrement(this.id)" >+</button>    
                                
                                </td>

                                <td class="col-md-2">
                                    <strong>${formatCurrency(value.subtotal)} </strong> 
                                </td>

                                
                                <td class="col-md-1 close-btn">
                                    <button type="submit" class="" id="${value.rowId}" onclick="cartRemove(this.id)"><i class="fa fa-times"></i></button>
                                </td>
                            </tr>`
                    });

                    $('#myCart').html(rows);
                }
            })

        }
        cart();

        function cartRemove(id) {
            $.ajax({
                type: 'GET',
                url: '/cart/my-cart/remove/' + id,
                dataType: 'json',
                success: function(data) {
                    cart();
                    miniCart();
                    $('#couponField').show();
                    $('#coupon_name').val('');

                    // Start Message 
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            icon: 'success',
                            title: data.success
                        })

                    } else {
                        Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error
                        })

                    }
                }
            });
        }

        function cartIncrement(rowId) {
            $.ajax({
                type: 'GET',
                url: "/cart/my-cart/cart-increment/" + rowId,
                dataType: 'json',
                success: function(data) {
                    cart();
                    miniCart();
                }
            });
        }

        function cartDecrement(rowId) {
            $.ajax({
                type: 'GET',
                url: "/cart/my-cart/cart-decrement/" + rowId,
                dataType: 'json',
                success: function(data) {
                    cart();
                    miniCart();
                }
            });
        }
    </script>
</body>

</html>
