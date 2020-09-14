<?php
require_once __DIR__ . "/../../layouts/header.php";
require_once __DIR__ . "/../../autoload/autoload.php";
?>

    <div class="single-product-tab-area mg-t-15 mg-b-30" id="all" style="min-height:550px">
        <div class="container-fluid">
            <div class="row">
            <?php
                           try {
                               $sql = "SELECT * FROM product";
                               if (isset($_GET['id'])) {
                                   $id = $_GET['id'];
                                   $sql .= " WHERE id = " . $id;
                               }
                               $result = DataProvider::ExecuteQuery($sql);
                               $row = mysqli_fetch_array($result);
                              
                           } catch (Exception $ex) {
                               echo "Không thể mở CSDL";
                           }
                           ?>










                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12" id="img">
                    <div id="myTabContent1" class="tab-content">
                        <div class="product-tab-list tab-pane fade active in" id="single-tab1">
                            <img src="/DoAnWeb2020/admin/modules/product/img_product/<?php echo $row['avatar']?>" alt="" />
                        </div>
                        
                    </div>
                    
                </div>
                <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12" id="addcart">
                    <div class="single-product-details res-pro-tb">
                        <h1 id="h1"><?php echo $row['name'] ?></h1>
                        <div class="single-pro-price">
                            <span class="single-regular" id="giatien"><?php echo number_format( $row['gia']-$row['sale']*$row['gia']/100,0) ?> VNĐ</span>
                        </div>
                        <div class="color-quality-pro">
                            <div class="color-quality">
                                <!-- <h4 id="quantity">Số lượng</h4>
                                <div class="quantity">
                                    <div class="pro-quantity-changer">
                                        <input type="text" value="1" />
                                    </div> -->
                                </div>
                            </div>
                            <div class="clear"></div>
                            <div class="single-pro-button">
                                <div class="pro-button">
                                    <a href="addcart.php?id= <?php echo $row['id'] ?>" id="cart">Thêm vào giỏ hàng</a>
                                </div>
                                <div class="pro-viwer">
                                    <a href="#"><i class="fa fa-heart"></i></a>
                                    <a href="#"><i class="fa fa-eye"></i></a>
                                </div>
                            </div>
                            <div class="clear"></div>
                            <div class="single-social-area">
                                <h3>Chia Sẻ Với:</h3>
                                <a href="#"><i id="face" class="fa fa-facebook"></i></a>
                                <a href="#"><i id="gg" class="fa fa-google-plus"></i></a>
                                <a href="#"><i id="twi"class="fa fa-twitter"></i></a>
                                <a href="#"><i id="ins" class="fa fa-linkedin"></i></a>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Single pro tab End-->
    <!-- Single pro tab review Start-->
    <div class="single-pro-review-area mt-t-30 mg-b-15" id="des">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <ul id="myTab" class="tab-review-design">
                        <li class="active"><a href="#description">MÔ TẢ</a></li>
                        <li><a href="#reviews"><span><i class="fa fa-star"></i><i class="fa fa-star"></i></span>ĐÁNH GIÁ<span><i class="fa fa-star"></i><i class="fa fa-star"></i></span></a></li>
                        <li><a href="#INFORMATION">THÔNG TIN</a></li>
                    </ul>
                    <div id="myTabContent" class="tab-content">
                        <div class="product-tab-list product-details-ect tab-pane fade active in" id="description">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="review-content-section">
                                        <p class="thongtinsp">

                                        <?php echo $row['content'] ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-tab-list tab-pane fade" id="reviews">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="review-content-section">
                                        <div class="review-content-section">
                                            <div class="card-block">
                                                <div class="text-muted f-w-400">
                                                    <p>Chưa có đánh giá nào</p>
                                                </div>
                                                <div class="m-t-10">
                                                    <div class="txt-primary f-18 f-w-600">
                                                        <p>Đánh giá của bạn</p>
                                                    </div>
                                                    <div class="stars stars-example-css detail-stars">
                                                        <div class="review-rating">
                                                            <fieldset class="rating">
                                                                <input type="radio" id="star5" name="rating" value="5">
                                                                <label class="full" for="star5"></label>
                                                                <input type="radio" id="star4half" name="rating"
                                                                    value="4 and a half">
                                                                <label class="half" for="star4half"></label>
                                                                <input type="radio" id="star4" name="rating" value="4">
                                                                <label class="full" for="star4"></label>
                                                                <input type="radio" id="star3half" name="rating"
                                                                    value="3 and a half">
                                                                <label class="half" for="star3half"></label>
                                                                <input type="radio" id="star3" name="rating" value="3">
                                                                <label class="full" for="star3"></label>
                                                                <input type="radio" id="star2half" name="rating"
                                                                    value="2 and a half">
                                                                <label class="half" for="star2half"></label>
                                                                <input type="radio" id="star2" name="rating" value="2">
                                                                <label class="full" for="star2"></label>
                                                                <input type="radio" id="star1half" name="rating"
                                                                    value="1 and a half">
                                                                <label class="half" for="star1half"></label>
                                                                <input type="radio" id="star1" name="rating" value="1">
                                                                <label class="full" for="star1"></label>
                                                                <input type="radio" id="starhalf" name="rating"
                                                                    value="half">
                                                                <label class="half" for="starhalf"></label>
                                                            </fieldset>
                                                        </div>
                                                        <div class="clear"></div>
                                                    </div>
                                                </div>
                                                <div class="input-group mg-b-15 mg-t-15">
                                                    <span class="input-group-addon"><i class="fa fa-user"
                                                            aria-hidden="true"></i></span>
                                                    <input type="text" class="form-control" placeholder="User Name">
                                                </div>
                                                <div class="input-group mg-b-15">
                                                    <span class="input-group-addon"><i class="fa fa-user"
                                                            aria-hidden="true"></i></span>
                                                    <input type="text" class="form-control" placeholder="Last Name">
                                                </div>
                                                <div class="input-group mg-b-15">
                                                    <span class="input-group-addon"><i class="fa fa-envelope-o"
                                                            aria-hidden="true"></i></span>
                                                    <input type="text" class="form-control" placeholder="Email">
                                                </div>
                                                <div class="form-group review-pro-edt">
                                                    <button type="submit"
                                                        class="btn btn-primary waves-effect waves-light">Submit
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-tab-list tab-pane fade" id="INFORMATION">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="review-content-section">
                                        <p >Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                            quis nostrud exercitation ullamco laboris nisi ut aliquip
                                            ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                                            velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
                                            cupidatat non proident, sunt in culpa qui officia deserunt
                                            mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error
                                            sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque
                                            ipsa quae ab illo inventore veritatis et quasi architecto
                                            beatae vitae dicta sunt explicabo.</p>
                                        <p >Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                            quis nostrud exercitation ullamco labo nisi ut aliquip ex
                                            ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                                            velit esse cillum dolore eu fugiat nulla pariatur. ut labore et dolore magna
                                            aliqua. Ut enim ad , quis nostrud exercitation ullamco
                                            laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                                            reprehenderit.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php require_once __DIR__ . "/../../layouts/footer.php" ?>