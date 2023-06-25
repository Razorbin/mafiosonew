<div class="functionContainer df g5">
  <div class="gameBox df aic w-100 fdcol">
    <div class="df jcc aic g5 w-100">
      <iconify-icon class="icon defaultBlue" icon="octicon:person-16"></iconify-icon>
      <h3><span id="playersOnline2">NaN</span> spillere pålogget</h3>
    </div>
    <div class="mt-5 df jcc aic g5 w-100">
      <div class="pointer-hover visitLink" data-page="profile&user=skitzo" data-phpfile="game/profile/profile.php?user=skitzo" data-targetdiv="#gameContent">Skitzo</div>,
      <div class="pointer-hover visitLink" data-page="profile&user=nugatti" data-phpfile="game/profile/profile.php?user=nugatti" data-targetdiv="#gameContent">Nugatti</div>
    </div>
  </div>
</div>

<script>
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
    });
</script>