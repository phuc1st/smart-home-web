$(document).ready(function () {
  //  SLIDER
  var slider = $("#slider-wp .section-detail");
  slider.owlCarousel({
    autoPlay: 4500,
    navigation: false,
    navigationText: false,
    paginationNumbers: false,
    pagination: true,
    items: 1, //10 items above 1000px browser width
    itemsDesktop: [1000, 1], //5 items between 1000px and 901px
    itemsDesktopSmall: [900, 1], // betweem 900px and 601px
    itemsTablet: [600, 1], //2 items between 600 and 0
    itemsMobile: true, // itemsMobile disabled - inherit from itemsTablet option
  });

  //  ZOOM PRODUCT DETAIL
  $("#zoom").elevateZoom({
    gallery: "list-thumb",
    cursor: "pointer",
    galleryActiveClass: "active",
    imageCrossfade: true,
    loadingIcon: "http://www.elevateweb.co.uk/spinner.gif",
  });

  //  LIST THUMB
  var list_thumb = $("#list-thumb");
  list_thumb.owlCarousel({
    navigation: true,
    navigationText: false,
    paginationNumbers: false,
    pagination: false,
    stopOnHover: true,
    items: 5, //10 items above 1000px browser width
    itemsDesktop: [1000, 5], //5 items between 1000px and 901px
    itemsDesktopSmall: [900, 5], // betweem 900px and 601px
    itemsTablet: [768, 5], //2 items between 600 and 0
    itemsMobile: true, // itemsMobile disabled - inherit from itemsTablet option
  });

  //  FEATURE PRODUCT
  var feature_product = $("#feature-product-wp .list-item");
  feature_product.owlCarousel({
    autoPlay: true,
    navigation: true,
    navigationText: false,
    paginationNumbers: false,
    pagination: false,
    stopOnHover: true,
    items: 4, //10 items above 1000px browser width
    itemsDesktop: [1000, 4], //5 items between 1000px and 901px
    itemsDesktopSmall: [800, 3], // betweem 900px and 601px
    itemsTablet: [600, 2], //2 items between 600 and 0
    itemsMobile: [375, 1], // itemsMobile disabled - inherit from itemsTablet option
  });

  //  SAME CATEGORY
  var same_category = $("#same-category-wp .list-item");
  same_category.owlCarousel({
    autoPlay: true,
    navigation: true,
    navigationText: false,
    paginationNumbers: false,
    pagination: false,
    stopOnHover: true,
    items: 4, //10 items above 1000px browser width
    itemsDesktop: [1000, 4], //5 items between 1000px and 901px
    itemsDesktopSmall: [800, 3], // betweem 900px and 601px
    itemsTablet: [600, 2], //2 items between 600 and 0
    itemsMobile: [375, 1], // itemsMobile disabled - inherit from itemsTablet option
  });

  //  SCROLL TOP
  $(window).scroll(function () {
    if ($(this).scrollTop() != 0) {
      $("#btn-top").stop().fadeIn(150);
    } else {
      $("#btn-top").stop().fadeOut(150);
    }
  });
  $("#btn-top").click(function () {
    $("body,html").stop().animate({ scrollTop: 0 }, 800);
  });

  // CHOOSE NUMBER ORDER
  var value = parseInt($("#num-order").attr("value"));
  $("#plus").click(function () {
    value++;
    $("#num-order").attr("value", value);
    update_href(value);
  });
  $("#minus").click(function () {
    if (value > 1) {
      value--;
      $("#num-order").attr("value", value);
    }
    update_href(value);
  });

  //  MAIN MENU
  $("#category-product-wp .list-item > li")
    .find(".sub-menu")
    .after('<i class="fa fa-angle-right arrow" aria-hidden="true"></i>');

  //  TAB
  tab();

  //  EVEN MENU RESPON
  $("html").on("click", function (event) {
    var target = $(event.target);
    var site = $("#site");

    if (target.is("#btn-respon i")) {
      if (!site.hasClass("show-respon-menu")) {
        site.addClass("show-respon-menu");
      } else {
        site.removeClass("show-respon-menu");
      }
    } else {
      $("#container").click(function () {
        if (site.hasClass("show-respon-menu")) {
          site.removeClass("show-respon-menu");
          return false;
        }
      });
    }
  });

  //  MENU RESPON
  $("#main-menu-respon li .sub-menu").after(
    '<span class="fa fa-angle-right arrow"></span>'
  );
  $("#main-menu-respon li .arrow").click(function () {
    if ($(this).parent("li").hasClass("open")) {
      $(this).parent("li").removeClass("open");
    } else {
      //            $('.sub-menu').slideUp();
      //            $('#main-menu-respon li').removeClass('open');
      $(this).parent("li").addClass("open");
      //            $(this).parent('li').find('.sub-menu').slideDown();
    }
  });

  // Xử lý ajax
  //CART
  $("#info-cart-wp").on("change", ".num-order", function () {
    var num_order = Number($(this).val());
    var total = Number($(".table #total-price").attr("data-total"));
    var id = $(this).attr("data-id");
    $.ajax({
      url: "?mod=cart&act=num_change",
      method: "POST",
      data: {
        num_order: num_order,
        id: id,
        total: total,
      },
      dataType: "json",
      success: function (result) {
        $("#info-cart-wp .subtotal" + id).text(result.subtotal);
        $("#info-cart-wp #total-price span").text(result.total_format);
        $(".table #total-price").attr("data-total", result.total);
      },
      error: function (xhr, ajaxOptions, throwError) {
        //alert(xhr.status);
        alert(throwError);
      },
    });
  });

  $("#pro-desc").on("change", "#num-order", function () {
    var num_order = Number($(this).val());
    var id = Number($("#pro-desc #num-order").attr("data-id"));

    $.ajax({
      url: "?mod=product&act=num_change",
      method: "POST",
      data: {
        num_order: num_order,
        id: id,
      },
      dataType: "text",
      success: function (result) {
        $("#pro-desc .btn-add-cart").html(result);
      },
      error: function (xhr, ajaxOptions, throwError) {
        alert(throwError);
      },
    });
  });

  $("#search-wp #s").on("click keyup input", function () {
    var inputValue = $(this).val();
    var resultDropdown = $(".result__search");
    if (inputValue.length) {
      $.ajax({
        url: "?mod=product&act=sub_search",
        method: "POST",
        data: {
          inputValue: inputValue,
        },
        dataType: "text",
        success: function (data) {
          resultDropdown.html(data);
        },
        error: function (xhr, ajaxOptions, throwError) {
          alert(throwError);
        },
      });
    } else resultDropdown.empty();
  });
  $("#search-wp #s").blur(function () {
    // Xóa các gợi ý tìm kiếm
    setTimeout(function () {
      $(".result__search").empty();
    }, 500);
  });
  $(".result__search").click(function () {});

  //menu cấp 2 danh mục sản phẩm
  $("#category-product-wp .list-item li ").mouseover(function () {
    var id = $(this).attr("data-catid");
    var sub__cat = $(
      "#category-product-wp .sub__category[data-catid='" + id + "']"
    );
    sub__cat.show();
  });
  $("#category-product-wp .list-item li ").mouseout(function () {
    var id = $(this).attr("data-catid");
    var sub__cat = $(
      "#category-product-wp .sub__category[data-catid='" + id + "']"
    );
    sub__cat.hide();
  });

  //Menu câp 2 ẩn hiện
  $("#category-product-wp .sub__category").mouseover(function () {
    $(this).show();
  });
  $("#category-product-wp .sub__category ").mouseout(function () {
    $(this).hide();
  });
});

function tab() {
  var tab_menu = $("#tab-menu li");
  tab_menu.stop().click(function () {
    $("#tab-menu li").removeClass("show");
    $(this).addClass("show");
    var id = $(this).find("a").attr("href");
    $(".tabItem").hide();
    $(id).show();
    return false;
  });
  $("#tab-menu li:first-child").addClass("show");
  $(".tabItem:first-child").show();
}
