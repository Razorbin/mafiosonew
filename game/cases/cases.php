<div class="functionContainer df g5">
  <div class="gameBox df aic w-100 fdcol">
  <div class="spinner" id="spinnerContainer">
    <ul class="spinner-items" id="spinnerList">
      <li class="spinner-items__item id="8">🐶</li>
      <li class="spinner-items__item" id="9">🐷</li>
      <li class="spinner-items__item" id="1">🐸</li>
      <li class="spinner-items__item" id="2">🐹</li>
      <li class="spinner-items__item" id="3">🐵</li>
      <li class="spinner-items__item" id="4">🐰</li>
      <li class="spinner-items__item" id="5">🐭</li>
      <li class="spinner-items__item" id="6">🐮</li>
      <li class="spinner-items__item" id="7">🐨</li>
    </ul>
    <div class="spinner__marker" id="spinnerMarker"> </div>
  </div>
  <input type="submit" id="startSpinner" value="Spin!" />
  </div>
</div>

<style>
    
.spinner {
  position: relative;
  overflow-x: hidden;
  border-radius: 5px;
}

.spinner {
  max-width: 610px;
  min-width: 610px;
}

.spinner-items {
  position: relative;
  display: inline-flex;
  margin: 0;
  padding: 0;
  margin-left: -246px;
}

.spinner__marker {
  position: absolute;
  height: 100%;
  width: 3px;
  background-color: yellow;
  transform: translateX(-50%);
  left: 50%;
  top: 0;
}

.spinner-items__item {
  display: block;
  list-style-type: none;
  padding: 32px 0;
  font-size: 32px;
  color: #c2c2c2;
  width: 117px;
  max-width: 117px;
  overflow: hidden;
  text-align: center;
  border: 1px solid #242424;
  border-radius: 6px;
  margin: 2.1px;
}
</style>

<script>
class SpinnerAnimation {
    constructor({container, list}) {
      this.winSound = new Audio("https://freesound.org/data/previews/511/511484_6890478-lq.mp3");
      
      this.firstRound = true;

      this.reset();

      this.spinnerContainer = document.getElementById(container);
      this.spinnerList = spinnerContainer.children.namedItem(list);
      this.spinnerMarker = spinnerContainer.children.namedItem("spinnerMarker");
      this.spinnerItems = this.spinnerList.children;
    }
  
    reset() {
        this.started = false;
        this.stopped = false;
        this.stopAnimation = false;
        this.lowerSpeed = 0;
        this.ticks = 0;
        this.offSet = 0;
        this.recycle = false;
        this.tick = false;
        this.state = null;
        this.speed = 0;
        this.winningItem = 0;
        this.firstRound = false;
    }

    start(speed = 10000) {
        this.started = true;
        this.speed = speed;
        console.log(this.speed);
        this.loop();
    }

    loop() {
        let dt = 0; // Delta Time is the amount of time between two frames
        let last = 0; // Last time of frame

        // The Animation Loop
        function loop(ms) {

            if(this.recycle) {
                this.recycle = false;
                const item = spinnerList.firstElementChild;
                spinnerList.append(item);
            }

            if(this.tick) {
                this.tick = false;
            }

            this.offSet += this.speed * dt;

            const ct = ms / 5000; // MS == The amount of Milliseconds the animation is already going for. Divided by 1000 is the amount of seconds
            dt = ct - last;
            last = ct;

            // Move the item to the left
            this.spinnerList.style.right = this.offSet + "px";
          
            if(this.offSet >= 122 ) {
                this.recycle = true;
                this.offSet = 0;
                this.tick = true;
                this.ticks += 1;
                if(this.ticks >= 20 && (Math.random() * 10) >= 5) {
                    this.stop();
                }
            }

            if(this.stopped) {
                let stopped = false;
                if(!stopped) this.speed -= this.lowerSpeed;

                if(this.speed <= 0) {
                    stopped = true;
                    this.speed = 0;
                }

                if(stopped) {
                    if(this.offSet >= 58.6) {
                        this.offSet += 6;
                    } else {
                        this.offSet -= 6;
                    }

                    if(this.offSet >= 122 || this.offSet <= 0) {
                        this.stopAnimation = true;
                        
                        this.winSound.play();
                      
                        if(this.offSet >= 122) {
                          this.winningItem = 5;
                          this.spinnerItems.item(5).classList.add("win");
                          this.offSet = 122;
                        }
                        
                        if(this.offSet <= 0) {
                          this.winningItem = 4;
                          this.spinnerItems.item(4).classList.add("win");
                          this.offSet = 0;
                        }
                      
                    }
                  
                }
            }

            if(!this.stopAnimation) {
                requestAnimationFrame(loop);
            }
        }

        // Bind Class to loop function
        loop = loop.bind(this);
        requestAnimationFrame(loop);
    }

    stop() {
        this.stopped = true;

        // Calculate a random lower speed
        this.lowerSpeed = Math.ceil(Math.random() * 10) + 1;
    }
}

const startSpinnerBtn = document.getElementById("startSpinner");

const animation = new SpinnerAnimation({
    container: "spinnerContainer",
    list: "spinnerList"
});

startSpinnerBtn.addEventListener("click", (e) => {
    if(animation.started == "ready") { return; }
  
    if(!animation.firstRound) animation.spinnerItems.item(animation.winningItem).classList.remove("win");
    animation.reset();
    animation.start();
});
</script>