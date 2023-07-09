$(document).ready(function () {
  // Event delegation for click event
  $(document).on("click", ".visitLink", function () {
    var phpFile = $(this).data("phpfile");
    var targetDiv = $(this).data("targetdiv");
    var page = $(this).data("page");

    // Update the URL without refreshing the page
    history.pushState({ page: page }, "", "?page=" + page);

    $.ajax({
      url: phpFile,
      success: function (result) {
        $(targetDiv).html(result);
        executeScriptInDiv(targetDiv); // Execute JavaScript code within the loaded content
      },
    });
  });

  var urlParams = new URLSearchParams(window.location.search);
  var pageParam = urlParams.get("page");

  if (pageParam) {
    var targetDiv = "#gameContent";
    var phpFile = "game/" + pageParam + "/" + pageParam + ".php";

    $.ajax({
      url: phpFile,
      success: function (result) {
        $(targetDiv).html(result);
        executeScriptInDiv(targetDiv); // Execute JavaScript code within the loaded content
      },
    });
  }

  // Handle the browser's back/forward buttons
  window.onpopstate = function (event) {
    if (event.state && event.state.page) {
      var page = event.state.page;
      var targetDiv = "#" + page;
      var phpFile = page + ".php";

      $.ajax({
        url: phpFile,
        success: function (result) {
          $(targetDiv).html(result);
          executeScriptInDiv(targetDiv); // Execute JavaScript code within the loaded content
        },
      });
    }
  };

  // Function to execute JavaScript code within a specified div
  function executeScriptInDiv(targetDiv) {
    $(targetDiv)
      .find("script")
      .each(function () {
        eval($(this).text());
      });
  }
});
