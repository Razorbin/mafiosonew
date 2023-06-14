$(document).ready(function () {
  $(".visitLink").click(function () {
    var phpFile = $(this).data("phpfile");
    var targetDiv = $(this).data("targetdiv");
    var page = $(this).data("page");

    // Update the URL without refreshing the page
    history.pushState({ page: page }, "", "?page=" + page);

    $.ajax({
      url: phpFile,
      success: function (result) {
        $(targetDiv).html(result);
      },
    });
  });

  // Handle the browser's back/forward buttons
  window.onpopstate = function (event) {
    if (event.state && event.state.page) {
      var page = event.state.page;
      var targetDiv = "#" + page;

      $.ajax({
        url: page + ".php",
        success: function (result) {
          $(targetDiv).html(result);
        },
      });
    }
  };
});