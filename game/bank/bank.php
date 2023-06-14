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
    <div class="df jcc">
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
  <div class="gameBox fb50"></div>
</div>

<style>
  .transfer:not(:first-child) {
    margin-top: 10px;
    padding: 5px;
    border-top: 1px solid #242424;
  }

  .transfer .avatar {
    height: 25px;
    width: 25px;
    border-radius: 20px;
    background-color: orange;
  }
</style>