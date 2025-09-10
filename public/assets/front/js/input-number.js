$(document).ready(function () {
  $(".qty-box > .form-control").click(function (e) {
    e.preventDefault();
    e.stopPropagation();
    $(".qty-box-content").toggleClass("active");
  });
  $(".qty-box-content").click(function (e) {
    e.stopPropagation();
  });
  $("body").click(function () {
    $(".qty-box-content").removeClass("active");
  });
  var cartButtons = $(".quantity").find(".quantity-button");
  $(cartButtons).on("click", function (e) {
    e.preventDefault();
    var $this = $(this);
    var target = $this.parent().data("target");
    var target = $("#" + target);
    var current = parseFloat($(target).val());
    if ($this.hasClass("quantity-up")) target.val(current + 1);
    else {
      current < 2 ? null : target.val(current - 1);
    }
    var total = 0;
    $(".quantity input").each(function () {
      total += +this.value;
    });
    $("#total").val(total);
  });
});
