<?php
require_once __DIR__ . "/../../layouts/header.php";

?>

    <div class="single-product-tab-area mg-t-15 mg-b-30" id="all" style="min-height:550px">
        <div class="container-fluid">
               <div class="row" id="xemsp">
                
                </div>

            </div>
    </div>

    <script>
                    const urlParams = new URLSearchParams(window.location.search);
                    const id = urlParams.get('id');
                    var requestUrl = 'http://d39e63958afa.ngrok.io/api/api/product/read_one.php?id=' + id;
                     console.log(id);
                    fetch(requestUrl, {
                            method: "get",
                            data: id
                        })
                        .then(response => response.json())
                        .then(data => {
                            document.getElementById("xemsp").innerHTML = '';
                            var content = ``;
                            data.data.records.forEach(element => {
                                content += `<div class="col-lg-5 col-md-5 col-sm-5 col-xs-12" id="img">
                    <div id="myTabContent1" class="tab-content">
                        <div class="product-tab-list tab-pane fade active in" id="single-tab1">
                            <img src="/TTT/admin/modules/product/img_product/${element.avatar}" alt="" />
                        </div>
                        
                    </div>
                    
                </div>
                <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12" id="addcart">
                <div class="single-product-details res-pro-tb">
                        <h1 id="h1">${element.name}</h1>
                        <div class="single-pro-price">
                            <span class="single-regular" id="giatien">${element.gia} VNĐ</span>
                        </div>
                        <div class="color-quality-pro">
                            <div class="color-quality">
                               
                                </div>
                            </div >
                            <div  class="icon-cog blackiconcolor">
                                <h3> <p><span><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half"></i></span> (37 lượt đánh giá) </p></h3>    
                            </div>
                            <div class="clear"></div>
                            <div class="single-pro-button">
                                <div class="pro-button">
                                    <a href="addcart.php?id= ${element.id}" id="cart">Thêm vào giỏ hàng</a>
                                </div>
                                <div class="pro-viwer">
                                    <a href="#"><i class="fa fa-thumbs-up"></i></a>
                                    <a href="#"><i class="fa fa-eye"></i></a>
                                </div>
                            </div>
                            <div class="clear"></div>
                            <div class="single-social-area">
                                <h2>Share With:</h2>
                                <a class="button_share share facebook" href="#"><i class="fa fa-facebook"></i> </a>  &ensp;
                                <a class="button_share share gplus" href="#"><i class="fa fa-google-plus"></i> </a> &ensp;
                                <a class="button_share share twitter" href="#"><i class="fa fa-twitter"></i> </a> &ensp;
                                
                                <a class="button_share share buffer" href="#"><i class="fa fa-share-square-o"></i> </a>
                            </div>
                        </div>
                        
                    </div>
                        `;
                            });
                            
                            document.getElementById("xemsp").innerHTML = content;
                        });
                </script>


    
    <!-- Single pro tab End-->
    <!-- Single pro tab review Start-->
    <div class="single-pro-review-area mt-t-30 mg-b-15" id="mota1">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                     <ul id="myTab" class="tab-review-design">
                        <li class="active"><a href="#description"><span><i class="fa fa-handshake-o"></i><i class="fa fa-handshake-o"></i></span>MÔ TẢ<span><i class="fa fa-handshake-o"></i><i class="fa fa-handshake-o"></i></span></a></li>
                        <li><a href="#reviews"><span><i class="fa fa-handshake-o"></i><i class="fa fa-handshake-o"></i></span>ĐÁNH GIÁ<span><i class="fa fa-handshake-o"></i><i class="fa fa-handshake-o"></i></span></a></li>
                    </ul>
                    <div id="myTabContent" class="tab-content">
                        <div class="product-tab-list product-details-ect tab-pane fade active in" id="description">
                            
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
                        
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    const urlParams = new URLSearchParams(window.location.search);
                    const id = urlParams.get('id');
                    var requestUrl = 'http://d39e63958afa.ngrok.io/api/api/product/read_one.php?id=' + id;
                     console.log(id);
                    fetch(requestUrl, {
                            method: "get",
                            data: id
                        })
                        .then(response => response.json())
                        .then(data => {
                            document.getElementById("description").innerHTML = '';
                            var content = ``;
                            data.data.records.forEach(element => {
                                content +=`<div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="review-content-section">
                                        <p class="thongtinsp" >
                                        ${element.content}
                                       
                                        </p>

                                    </div>
                                </div>
                            </div>`;
                            });
                            
                            document.getElementById("description").innerHTML = content;
                        });
                </script>
        
<?php require_once __DIR__ . "/../../layouts/footer.php" ?>