$(document).ready(function () {
  var height =
    $(window).height() -
    $("#footer-wp").outerHeight(true) -
    $("#header-wp").outerHeight(true);
  $("#content").css("min-height", height);

  //  CHECK ALL
  $('input[name="checkAll"]').click(function () {
    var status = $(this).prop("checked");
    $('.list-table-wp tbody tr td input[type="checkbox"]').prop(
      "checked",
      status
    );
  });

  // EVENT SIDEBAR MENU
  $("#sidebar-menu .nav-item .nav-link .title").after(
    '<span class="fa fa-angle-right arrow"></span>'
  );
  var sidebar_menu = $("#sidebar-menu > .nav-item > .nav-link");
  sidebar_menu.on("click", function () {
    if (!$(this).parent("li").hasClass("active")) {
      $(".sub-menu").slideUp();
      $(this).parent("li").find(".sub-menu").slideDown();
      $("#sidebar-menu > .nav-item").removeClass("active");
      $(this).parent("li").addClass("active");
      return false;
    } else {
      $(".sub-menu").slideUp();
      $("#sidebar-menu > .nav-item").removeClass("active");
      return false;
    }
  });

  //Chọn hãng
  $("select[name='cat']").change(function () {
    var selectedOption = $(this).children("option:selected").val();
    $.ajax({
      url: "./pages/brand.php",
      method: "POST",
      data: {
        catid: selectedOption,
      },
      dataType: "text",
      success: function (result) {
        $("select[name='brand']").html(result);
        // alert(result);
      },
      error: function (xhr, ajaxOptions, throwError) {
        alert(throwError);
      },
    });
  });

  $("#detail-page select[name='brand']").change(function () {
    var selectedOption = $(this).children("option:selected");
    if (selectedOption.val() !== "") {
      $("#detail-page input[name='brand_name']").val(selectedOption.text());
      $("#detail-page input[name='brand_name']").prop("disabled", false);
    }
  });
});
