$(document).ready(function () {
    $(".About-section").waypoint(
        function (direction) {
            if (direction == "down") {
                $("nav").addClass("sticky");
            } else {
                $("nav").removeClass("sticky");
            }
        },
        {
            offset: "500 px",
        }
    );
    // scroll
    $("a").click(function (event) {
        $("html, body").animate(
            {
                scrollTop: $($.attr(this, "href")).offset().top,
            },
            900
        );
        event.preventDefault();
    });

    // mobile-nav
    $(".mobile-nav-icon").click(function () {
        $(".main-nav").slideToggle(200);
        if ($(".mobile-nav-icon i").hasClass("fa-bars")) {
            $(".mobile-nav-icon i").addClass("fa-times");
            $(".mobile-nav-icon i").removeClass("fa-bars");
        } else {
            $(".mobile-nav-icon i").addClass("fa-bars");
            $(".mobile-nav-icon i").removeClass("fa-times");
        }
    });

    // Hiệu ứng chuyển động ảnh
    var stt = 0;
    starImg = $("img.slide:first").attr("stt");
    endImg = $("img.slide:last").attr("stt");
    $("img.slide").each(function () {
        if ($(this).is(":visible")) stt = $(this).attr("stt");
    });

    $(".gioithieuimg").click(function () {
        if (stt == endImg) {
            stt = -1;
        }
        gioithieuimg = ++stt;
        $("img.slide").hide();
        $("img.slide").eq(gioithieuimg).show();
    });

    setInterval(function () {
        $(".gioithieuimg").click();
    }, 3000);

    var st = 0;
    starImg = $("img.advertisement-section-img:first").attr("st");
    endImg = $("img.advertisement-section-img:last").attr("st");
    $("img.advertisement-section-img").each(function () {
        if ($(this).is(":visible")) st = $(this).attr("st");
    });

    $("#water").click(function () {
        if (st == endImg) {
            st = -1;
        }
        water = ++st;
        $("img.advertisement-section-img").hide();
        $("img.advertisement-section-img").eq(water).show();
    });

    setInterval(function () {
        $("#water").click();
    }, 3000);

    // bấm để xem hình

    $(".popup-gallery").magnificPopup({
        delegate: "a",
        type: "image",
        tLoading: "Loading image #%curr%...",
        mainClass: "mfp-img-mobile",
        gallery: {
            enabled: true,
            navigateByImgClick: true,
            preload: [0, 1], // Will preload 0 - before current, and 1 after the current image
        },
        image: {
            tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
            titleSrc: function (item) {
                return item.el.attr("title") + "<small>collection 2020</small>";
            },
        },
    });

    $updatecart = $(".updatecart");
    $updatecart.click(function (e) {
        e.preventDefault();
        $qty = $(this).parents("tr").find(".qty").val();

        $key = $(this).attr("data-key");

        jQuery.ajax({
            url: "cap-nhat-gio-hang.php",
            type: "GET",
            data: { qty: $qty, key: $key },

            success: function (data) {
                if (data == 1) {
                    location.href = "gio-hang.php";
                }
            },
        });
    });

    // xóa sản phẩm

    $(".delete").click(function () {
        swal(
            {
                title: "Are you sure?",
                text: "You will not be able to recover this imaginary file!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: false,
            },
            function (isConfirmed) {
                if (isConfirmed) {
                    $(".file").addClass("isDeleted");
                    swal("Deleted!", "Your imaginary file has been deleted.", "success");
                }
            }
        );
    });

    // sort
});
