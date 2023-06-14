<div class="functionContainer df g5">
  <div class="gameBox fb50 df aic">
    <div class="df g5 fdcol w-100">
      <div class="df aic g5 jcsb w-100">
        <p class="textSecondary">Din saldo</p>
        <h3>100 000 000<span class="textSecondary fontSmall"> ,-</span></h3>
      </div>
      <div class="df aic g5 jcsb">
        <p class="textSecondary">Totalt overført/mottatt</p>
        <h3>1 000<span class="textSecondary fontSmall"> ,- /</span> 5 000<span class="textSecondary fontSmall"> ,-</span></h3>
      </div>
      <div class="df aic g5 jcsb">
        <p class="textSecondary">Renter ved midnatt</p>
        <h3>10 000 000 <span class="textSecondary fontSmall">(10%)</span></h3>
      </div>
    </div>
  </div>
  <div class="gameBox fb50">
    <div class="df g5 fdcol">
      <div>
        <input class="textInput w-100" type="text" placeholder="Sum">
      </div>
      <div class="df g5 aic">
        <input class="fg1" type="submit" value="Sett inn">
        <input class="fg1" type="submit" value="Ta ut">
        <input class="fg1" type="submit" value="Sett inn alt">
        <input class="fg1" type="submit" value="Ta ut alt">
      </div>
    </div>
  </div>
</div>

<div class="functionContainer df g5">
  <div class="gameBox fb50">
    <div class="df jcc aic g5">
      <iconify-icon class="icon yellow" icon="mingcute:transfer-4-line"></iconify-icon>
      <h3>Siste 10 overførsler</h3>
    </div>

    <div class="transfer df jcsb aic">
      <div class="df aic g5">
        <div class="avatar"></div>
        <div class="userInfo">
          <h3>Skitzo</h3>
          <p>4 juni 2023</p>
        </div>
      </div>
      <div class="df">
        <h3 class="lime">+ 4 500 000,-</h3>
      </div>
    </div>

    <div class="transfer df jcsb aic">
      <div class="df aic g5">
        <div class="avatar"></div>
        <div class="userInfo">
          <h3>Skitzo</h3>
          <p>4 juni 2023</p>
        </div>
      </div>
      <div class="df">
        <h3 class="lime">+ 4 500 000,-</h3>
      </div>
    </div>

    <div class="transfer df jcsb aic">
      <div class="df aic g5">
        <div class="avatar"></div>
        <div class="userInfo">
          <h3>Skitzo</h3>
          <p>4 juni 2023</p>
        </div>
      </div>
      <div class="df">
        <h3 class="orange">- 4 500 000,-</h3>
      </div>
    </div>

  </div>
  <div class="fb50">
    <div class="gameBox fb50" style="align-self: flex-start;">
      <div class="df jcc aic g5">
        <iconify-icon class="icon lime" icon="solar:card-transfer-outline"></iconify-icon>
        <h3>Overfør penger</h3>
      </div>
      <div class="mt-5 df g5 fdcol">
        <div class="df g5">
          <input class="textInput w-100" type="text" placeholder="Brukernavn">
          <input class="textInput w-100" type="text" placeholder="Sum">
        </div>
        <div class="df g5 aic">
          <input class="fg1" type="submit" value="Send penger">
        </div>
      </div>
    </div>
    <div id="stats" class="gameBox fb50 mt-5" style="align-self: flex-start;">
      <div class="mcsalkm">
        <div class="center-item df aic g5">
          <iconify-icon class="icon pink" icon="pepicons-pencil:bank"></iconify-icon>
          <h3>Statistikk</h3>
        </div>
        <div class="right-item">
          <iconify-icon id="close-icon" class="clickableIcon icon textSecondary" icon="ic:baseline-close"></iconify-icon>
        </div>
      </div>

      <div class="mt-5">
        <ul class="mt-5 textSecondary">
          <li>Antall penger tjent på renter: 52 000 000,-</li>
          <li>Antall penger overført: 150 000 000,-</li>
          <li>Antall penger mottatt: 120 000 000,-</li>
          <li>Antall overførsler: 150,-</li>
        </ul>
      </div>
    </div>
  </div>
</div>

<script>
  var button = document.getElementById("close-icon");
  var div = document.getElementById("stats");

  button.addEventListener("click", function(event) {
    div.classList.add("hidden");
  });
</script>