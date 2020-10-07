<!--
* Author: Chad Cromwell
* Date: 2019-03-25
* Description: A tower defense game where a user purchases towers to defend their windmill from attacking ants
* Music: Eric Skiff - Chibi Ninja, Jumpshot, Arpanauts, We're the Resistors, Undercocked (underunderclocked mix) - Resistor Anthems - Available at http://EricSkiff.com/music
* Functions:
*           keyboard(value) function - Handles keyboard input
*           playDeflectSound() function - Plays a deflect sound from the pool of deflect Audio objects
*           playHitSound() function - Plays a hit sound from the pool of ant hit Audio objects
*           playKillSound() function - Plays a hit sound from the pool of ant kill Audio objects
*           playWindmillSound() function - Plays a hit sound from the pool of windmill hit Audio objects
*           playSlingshotSound() function - Plays a hit sound from the pool of slingshot Audio objects
*           playHammerSound() function - Plays a hit sound from the pool of hammer Audio objects
*           playBugSpraySound() function - Plays a hit sound from the pool of bug spray Audio objects
*           playMagnifyingGlassSound() function - Plays a hit sound from the pool of magnifying glass Audio objects
*           playCannonSound() function - Plays a hit sound from the pool of cannon Audio objects
*           playHoneySound() function - Plays a hit sound from the pool of honey Audio objects
*           muteUnmuteSoundEffects() function - Mutes or unmutes the sound effects
*           playPauseMusic() function - Plays or pauses the music
*           playNextSong() function - Plays through the background music on shuffle, will not repeat the same song twice in a row
*           updateToolTipPosition() function - Updates the position of the tooltip to keep in within the display no matter where the user puts their mouse
*           updateToolTip(string) function - Accepts a string, updates the tooltip text and the size of the box
*           showToolTip() function - Shows the tooltip
*           hideToolTip() function - Hides the tooltip
*           initialize() function - Initializes the game buttons
*           updatePathText() function - Updates the path upgrade buttons text depending on what the user has unlocked
*           updateTowerButtonCostText() function - Updates the cost of each tower button (depends on the difficulty level chosen)
*           target(string) function - Accepts a string and sets the currently selected tower's target priority to the string. "first", "last", "strongest", "closest"
*           hideInfoBar() function - Hides the info bar
*           showInfoBar() function - Shows the info bar
*           resetInfoBar() function - Resets the info bar to default
*           updateInfoBar() function - Updates the info bar
*           logIn() function - Sets booleans to show user is logged in and it is not a guest, updates the tower menu info and enables debugging mode if admin user (userId 1)
*           logOut() function - Sets booleans to show user is logged out, updates player object to be a guest, clears cookies, restarts game
*           setWindmill(string) function - Sets the windmill's material. "wood", "stone", "concrete", "steel"
*           hidePlayScreen() function - Hides the play screen
*           showPlayScreen() function - Shows the play screen
*           hideMainMenu() function - Hides the main menu
*           showMainMenu() function - Shows the main menu
*           hideLoggedInMenu() function - Hides the logged in menu
*           showLoggedInMenu() function - Shows the logged in menu
*           updateWindmillButtons() function - Updates the windmill buttons. Enables those they user has unlocked, disables those they have not
*           hideWindmillMenu() function - Hide the windmill menu
*           showWindmillMenu() function - Show the windmill menu
*           hideTowersMenu() function - Hide the towers menu
*           showTowersMenu() function - Shows the towers menu
*           hideLevelMenu() function - Hide the level menu
*           showLevelMenu() function - Shows the level menu
*           hideDifficultyMenu() function - Hides the difficulty menu
*           showDifficultyMenu() function - Shows the difficulty menu
*           setLevel() function - Sets/load proper level
*           quitGame() function - Quits the game, updates the player stats to the database, resets, and goes back to main menu
*           hideTowerBarButtons() function - Hides the tower bar buttons
*           showTowerBarButtons() function - Show the tower bar buttons
*           resumeGame() function - Updates the play/pause button to reflect game is playing
*           pauseGame() function - Updates the play/pause button to reflect game is paused
*           overlayMenuClick() function - Handles when user clicks on the menu button
*           showOverlayMenu() function - Shows the overlay menu
*           hideOverlayMenu() function - Hides the overlay menu
*           hideSellButton() function - Hides the sell button
*           showSellButton() function - Shows the sell button
*           changeSpeed() function - Change the game speed
*           startGame() function - Starts the game
*           updateWindmill() function - Update the windmill damage textures based on hp
*           updateInfoText() function - Updates the information text along the top of the screen to reflect stats
*           updateTowerMenuTiers() function - Updates the tower menu tiers to be used on the tower menu screen. Ex. 1/4 tiers unlocked.
*           setSize() function - Sets the level sprite sizes
*           lostGame() function - When the player loses, display the loss screen
*           wonGame() function - When the player wins, display the win screen
*           hideWinMenu() function - Hides the win menu
*           showWinMenu() function - Shows the win menu
*           showFinalWinMenu() function - Shows the win menu without the continue button because the windmill has been destroyed or beat last wave
*           resetGame() function - Resets variables so game can start again
*           waveWon() function - Called when wave is over and gets ready for next
*           addAnts(array, numAnts, type, armored, regenerative, cloaked, parent) function - Adds ants to passed array and to passed stage
*           addSlingshot() function - Adds a slingshot tower
*           addHammer() function - Adds a hammer tower
*           addBugSpray() function - Adds a bug spray tower
*           addMagnifyingGlass() function - Adds a magnifying glass tower
*           addCannon() function - Adds a cannon tower
*           addHoney() function - Adds a honey tower
*           nextWave() function - Loads and starts the next wave
*           sellTower(index) function - Accepts an index and sells the corresponding tower
*           enableTowerInteraction() function - Enables interaction and buttonMode of all towers
*           disableTowerInteraction() function - Disables interaction and buttonMode of all towers
*           playPause() function - Pauses and resumes the game
*           addBrown(int) function - Accepts an int and adds that many brown ants to the waveContainer
*           addBrownA(int) function - Accepts an int and adds that many armoured brown ants to the waveContainer
*           addBrownR(int) function - Accepts an int and adds that many regenerative brown ants to the waveContainer
*           addBrownC(int) function - Accepts an int and adds that many cloaked brown ants to the waveContainer
*           addBlue(int) function - Accepts an int and adds that many blue ants to the waveContainer
*           addBlueA(int) function - Accepts an int and adds that many armoured blue ants to the waveContainer
*           addBlueR(int) function - Accepts an int and adds that many regenerative blue ants to the waveContainer
*           addBlueC(int) function - Accepts an int and adds that many cloaked blue ants to the waveContainer
*           addGreen(int) function - Accepts an int and adds that many green ants to the waveContainer
*           addGreenA(int) function - Accepts an int and adds that many armoured green ants to the waveContainer
*           addGreenR(int) function - Accepts an int and adds that many regenerative green ants to the waveContainer
*           addGreenCloaked(int) function - Accepts an int and adds that many cloaked green ants to the waveContainer
*           addYellow(int) function - Accepts an int and adds that many yellow ants to the waveContainer
*           addYellowA(int) function - Accepts an int and adds that many armoured yellow ants to the waveContainer
*           addYellowR(int) function - Accepts an int and adds that many regenerative yellow ants to the waveContainer
*           addYellowC(int) function - Accepts an int and adds that many cloaked yellow ants to the waveContainer
*           addPurple(int) function - Accepts an int and adds that many purple ants to the waveContainer
*           addPurpleA(int) function - Accepts an int and adds that many armoured purple ants to the waveContainer
*           addPurpleR(int) function - Accepts an int and adds that many regenerative purple ants to the waveContainer
*           addPurpleC(int) function - Accepts an int and adds that many cloaked purple ants to the waveContainer
*           addBlack(int) function - Accepts an int and adds that many black ants to the waveContainer
*           addBlackA(int) function - Accepts an int and adds that many armoured black ants to the waveContainer
*           addBlackR(int) function - Accepts an int and adds that many regenerative black ants to the waveContainer
*           addBlackC(int) function - Accepts an int and adds that many cloaked black ants to the waveContainer
*           addWhite(int) function - Accepts an int and adds that many white ants to the waveContainer
*           addWhiteA(int) function - Accepts an int and adds that many armoured white ants to the waveContainer
*           addWhiteR(int) function - Accepts an int and adds that many regenerative white ants to the waveContainer
*           addWhiteC(int) function - Accepts an int and adds that many cloaked white ants to the waveContainer
*           addRed(int) function - Accepts an int and adds that many red ants to the waveContainer
*           addRedA(int) function - Accepts an int and adds that many armoured red ants to the waveContainer
*           addRedR(int) function - Accepts an int and adds that many regenerative red ants to the waveContainer
*           addRedC(int) function - Accepts an int and adds that many cloaked red ants to the waveContainer
*           addBeetle(int) function - Accepts an int and adds that many beetles to the waveContainer
*           addBeetleA(int) function - Accepts an int and adds that many armoured beetles to the waveContainer
*           addBeetleC(int) function - Accepts an int and adds that many cloaked beetles to the waveContainer
*           addGreenLeaf(int) function - Accepts an int and adds that many green leaves to the waveContainer
*           addStyrofoamCup(int) function - Accepts an int and adds that many styrofoam cups to the waveContainer
*           addSodaCan(int) function - Accepts an int and adds that many soda cans to the waveContainer
*           addRock(int) function - Accepts an int and adds that many rocks to the waveContainer
*           waveMaker(int) function - Accepts a wave number and adds respective ants to the current wave.
*           shuffleArray(array) function - Shuffle the passed array
*           rememberMe() function - Sets up cookie with unique auth token, adds auth token to database so user can stay logged in securely
*           randomToken($length = 20) function - Generate a random auth token and return it to selector variable
*           updatePlayerStats() function - Updates the player stats to the database
*           addPlayer() function - Adds a player to the database
*           update() function - Updates ants
*           login() function - Called when user attempts to log in in login modal
-->
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Ants!</title>
</head>
<script src="pixi/pixi.min.js"></script>
<body onresize="resize()" style="background-color: black">
<link rel="stylesheet" type="text/css" href="css/style.css">
<div id="loginpopup" class="modal">

    <form class="modal-content animate" id="loginform" onsubmit="login()">
        <div class="topbar" id="topbar">
            <span onclick="document.getElementById('loginpopup').style.display='none'" class="close" title="Close Modal">&times;</span>
        </div>

        <div class="pta" id="pta">
            "Please try again."
        </div>

        <div class="container">
            <label for="email"><b>Email</b></label>
            <input type="text" placeholder="Enter Email" id="email" name="email" required>

            <label for="password"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" id="password" name="password" required>

            <button type="submit">Login</button>
            <label>
                <input type="checkbox" checked="checked" name="remember" id="remember"> Remember me
            </label>
        </div>

        <div class="container" style="background-color:#f1f1f1">
            <button type="button" onclick="document.getElementById('loginpopup').style.display='none'" class="cancelbutton">Cancel</button>
            <span class="password">Forgot <a href="#">password?</a></span>
        </div>
    </form>
</div>

<div id="signuppopup" class="modal">

    <form class="modal-content animate" id="signupform" onsubmit="addPlayer()">
        <div class="topbar" id="signuptopbar">
            <span onclick="document.getElementById('signuppopup').style.display='none'" class="close" title="Close Modal">&times;</span>
        </div>

        <div class="pta" id="signupaccountexists">
            "Account already exists."
        </div>

        <div class="container">
            <label for="username"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" id="signupusername" name="email" required>

            <label for="email"><b>Email</b></label>
            <input type="text" placeholder="Enter Email" id="signupemail" name="email" required>

            <label for="password"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" id="signuppassword" name="password" required>

            <button type="submit">Sign Up</button>
        </div>

        <div class="container" style="background-color:#f1f1f1">
            <button type="button" onclick="document.getElementById('signuppopup').style.display='none'" class="cancelbutton">Cancel</button>
        </div>
    </form>
</div>

<script src="js/functions.js"></script>
<script src="js/Player.js"></script>
<script src="js/variables.js"></script>
<script src="js/Ant.js"></script>
<script src="js/Tower.js"></script>
<script src="js/Projectile.js"></script>
<script>
    //Add containers to stage
    app.stage.addChild(levelContainerBG); //Level background container (holds ground image)
    app.stage.addChild(waveContainer); //Wave container (holds ants)
    app.stage.addChild(towersContainer); //Towers container (holds towers)
    app.stage.addChild(projectileContainer); //Projectile container (holds projectiles)
    app.stage.addChild(windmillContainer); //Windmill container (holds the windmill)
    app.stage.addChild(levelContainerFG); //Level foreground container (holds trees)
    app.stage.addChild(menuContainer); //Menu container (holds menu sprites)
    app.stage.addChild(leftBarContainer); //Left bar container (holds the left bar)
    app.stage.addChild(leftBarTowerSpritesContainer); //Left bar tower sprites container (holds the tower images for buttons)
    app.stage.addChild(topBarContainer); //Top bar container (holds the top info bar)
    app.stage.addChild(infoBarContainer); //Top info bar (holds string of info)
    app.stage.addChild(overlayMenuContainer); //Overlay menu container (holds the overlay menu)
    menuContainer.addChild(percentageText); //Add the loading percentage text to menuContainer to show while game is loading
    app.stage.addChild(mediaContainer); //Add media container (holds buttons for controlling sound)
    app.stage.addChild(tooltipContainer); //Add tooltip container (holds tooltip)

    //Create info bar background
    topBarContainerBG = new PIXI.Graphics(); //Create top bar container graphic object for background
    topBarContainerBG.beginFill(0xFFFFFF); //Fill white
    topBarContainerBG.lineStyle(2, 0x000000); //Black stroke
    topBarContainerBG.drawRect(appWidth-(appWidth*resizeFactor), 0, appWidth*resizeFactor, appHeight-(appHeight*resizeFactor)); //Draw it
    topBarContainer.addChild(topBarContainerBG); //Add to top bar container

    //Tower bar background
    leftBarContainerBG = new PIXI.Graphics(); //Create left bar container graphic object for background
    leftBarContainerBG.beginFill(0xFFFFFF); //Fill white
    leftBarContainerBG.lineStyle(2, 0x000000); //Black stroke
    leftBarContainerBG.drawRect(0, 0, appWidth-(appWidth*resizeFactor), appHeight); //Draw it
    leftBarContainer.addChild(leftBarContainerBG); //Add to left bar container
    leftBarContainer.interactive = true;
    leftBarContainer.on("mouseout", () => {
       hideToolTip();
    });

    //Make containers invisible for menu state
    levelContainerBG.visible = false; //Hide it
    waveContainer.visible = false; //Hide it
    towersContainer.visible = false; //Hide it
    projectileContainer.visible = false; //Hide it
    windmillContainer.visible = false; //Hide it
    levelContainerFG.visible = false; //Hide it
    leftBarContainer.visible = false; //Hide it
    infoBarContainer.visible = false; //Hide it
    leftBarTowerSpritesContainer.visible = false; //Hide it
    topBarContainer.visible = false; //Hide it
    mediaContainer.visible = true; //Show it
    tooltipContainer.visible = false; //Hide it

    currentTower = new Tower(1, {x: 0, y: 0}, null); //Assign default currentTower to avoid exceptions below. Never really used in game.

    //keyboard(value) function - Handles keyboard input
    function keyboard(value) {
        let key = {}; //Key object
        key.value = value; //Capture value
        key.isDown = false; //Initialize as not being pressed
        key.isUp = true; //Initialize as not being pressed
        key.press = undefined; //Initialize as not being pressed
        key.release = undefined; //Initialize as not being pressed

        //When button is pressed down
        key.downHandler = event => {
            if (event.key === key.value) {
                //If the key is up and has just been pressed, call key.press()
                if (key.isUp && key.press) key.press();
                key.isDown = true; //Key is down
                key.isUp = false; //Key is not up
                //event.preventDefault(); //Prevent default behaviour
            }
        };

        //When button is released
        key.upHandler = event => {
            if (event.key === key.value) {
                //If the key is down and has just been released, call key.release()
                if (key.isDown && key.release) key.release();
                key.isDown = false; //Key is not down
                key.isUp = true; //Key is up
                //event.preventDefault(); //Prevent default behaviour
            }
        };

        //Create listeners
        const downListener = key.downHandler.bind(key); //Key down listener
        const upListener = key.upHandler.bind(key); //Key up listener

        //Add event listeners to "keydown" events
        window.addEventListener(
            "keydown", downListener, false
        );

        //Add event listeners to "keyup" events
        window.addEventListener(
            "keyup", upListener, false
        );

        //Detach event listeners
        key.unsubscribe = () => {
            window.removeEventListener("keydown", downListener);
            window.removeEventListener("keyup", upListener);
        };

        return key; //Return the key
    }

//****HANDLE KEYBOARD INPUT---------------------------------------------------------------------------------------------
    //If SPACEBAR is pressed/released
    let key = keyboard(" ");
    let keyInputEnabled = false;

    //When pressed, do nothing
    key.press = () => {
    };

    //When released
    key.release = () => {
        //If playing, game is tarted, and wave is happening
        if(playing && startGameBool && !waveWonBool) {
            //Unselect all towers
            for(let i = 0; i < towers.length; i++) {
                towers[i].selected = false; //Deselct towers
            }
            hideInfoBar(); //Hide info bar
            playPause(); //Play or pause
        }
        //If wave is over
        else if(waveWonBool) {
            nextWave(); //Start next wave
        }
        //If the overlay menu is being shown, hide it
        if(overlayMenu) {
            hideOverlayMenu(); //Hide the overlay menu
        }
    };

    //If + is pressed
    key = keyboard("+");
    key.release = () => {
        //If key input is enabled
        if(keyInputEnabled) {
            if (debugMode) {
                player.gold += 1000; //Increase gold by 1000
            }
        }
    };

    //If = is pressed
    key = keyboard("=");
    key.release = () => {
        //If key input is enabled
        if(keyInputEnabled) {
            if (debugMode) {
                windmillSprite.hp += 100; //Increase hp by 100
            }
        }
    };

    //If m is pressed
    key = keyboard("m");
    key.release = () => {
        //If key input is enabled
        if(keyInputEnabled) {
            playPauseMusic(); //Play or pause the music
        }
    };

    //If s is pressed
    key = keyboard("s");
    key.press = () => {
        //If key input is enabled
        if(keyInputEnabled) {
            muteUnmuteSoundEffects(); //Mute or unmute the sound effects
        }
    };

//****AUDIO-------------------------------------------------------------------------------------------------------------
    //Initialize music and sound effects
    musicArray.push(new Audio("Assets/Sounds/bg1.mp4")); //Load background music track 1
    musicArray[0].volume = musicVolume; //Set volume

    musicArray.push(new Audio("Assets/Sounds/bg2.mp4")); //Load background music track 2
    musicArray[1].volume = musicVolume; //Set volume

    musicArray.push(new Audio("Assets/Sounds/bg3.mp4")); //Load background music track 3
    musicArray[2].volume = musicVolume; //Set volume

    musicArray.push(new Audio("Assets/Sounds/bg4.mp4")); //Load background music track 4
    musicArray[3].volume = musicVolume; //Set volume

    musicArray.push(new Audio("Assets/Sounds/bg5.mp4")); //Load background music track 5
    musicArray[4].volume = musicVolume; //Set volume

    let lastRand = Math.floor(Math.random()*Math.floor(5)); //Generate random int for picking music track
    music = musicArray[lastRand]; //Assign randomly chosen song to music variable

    //Add 4 Audio objects for each hit sound effect
    for(let i = 0; i < 4; i++) {
        armoredDeflectSoundArray.push(new Audio("Assets/Sounds/armoredDeflect.wav")); //Add new deflect Audio object
        armoredDeflectSoundArray[i].volume = armoredDeflectVolume; //Set volume
        hitAntSoundArray.push(new Audio("Assets/Sounds/antHit.wav")); //Add new ant hit Audio object
        hitAntSoundArray[i].volume = hitAntVolume; //Set volume
        killAntSoundArray.push(new Audio("Assets/Sounds/antKill.wav")); //Add new ant kill Audio object
        killAntSoundArray[i].volume = killAntVolume; //Set volume
        hitWindmillSoundArray.push(new Audio("Assets/Sounds/windmillHit.wav")); //Add new hit windmill sound
        hitWindmillSoundArray[i].volume = hitWindmillVolume; //Set volume
    }

    //Add 2 Audio objects for each tower sound effect
    for(let i = 0; i < 2; i++) {
        slingshotSoundArray.push(new Audio("Assets/Sounds/slingshot.wav")); //Add new slingshot Audio object
        slingshotSoundArray[i].volume = slingshotVolume;
        hammerSoundArray.push(new Audio("Assets/Sounds/hammer.wav")); //Add new hammer Audio object
        hammerSoundArray[i].volume = hammerVolume;
        bugSpraySoundArray.push(new Audio("Assets/Sounds/bugSpray.wav")); //Add new bug spray Audio object
        bugSpraySoundArray[i].volume = bugSprayVolume;
        magnifyingGlassSoundArray.push(new Audio("Assets/Sounds/magnifyingGlass.wav")); //Add new magnifying glass Audio object
        magnifyingGlassSoundArray[i].volume = magnifyingGlassVolume;
        cannonSoundArray.push(new Audio("Assets/Sounds/cannon.wav")); //Add new cannon Audio object
        cannonSoundArray[i].volume = cannonVolume;
        honeySoundArray.push(new Audio("Assets/Sounds/honey.wav")); //Add new honey Audio object
        honeySoundArray[i].volume = honeyVolume;
    }

    //playDeflectSound() function - Plays a deflect sound from the pool of deflect Audio objects
    function playDeflectSound() {
        //If sound effects can be played
        if(playSoundEffects) {
            //Iterate through pool of Audio objects
            for(let i = 0; i < armoredDeflectSoundArray.length; i++) {
                //If the Audio object is paused
                if(armoredDeflectSoundArray[i].paused) {
                    armoredDeflectSoundArray[i].play(); //Play it
                    break;
                }
            }
        }
    }

    //playHitSound() function - Plays a hit sound from the pool of ant hit Audio objects
    function playHitSound() {
        //If sound effects can be played
        if(playSoundEffects) {
            //Iterate through pool of Audio objects
            for(let i = 0; i < hitAntSoundArray.length; i++) {
                //If the Audio object is paused
                if(hitAntSoundArray[i].paused) {
                    hitAntSoundArray[i].play(); //Play it
                    break;
                }
            }
        }
    }

    //playKillSound() function - Plays a hit sound from the pool of ant kill Audio objects
    function playKillSound() {
        //If sound effects can be played
        if(playSoundEffects) {
            //Iterate through pool of Audio objects
            for(let i = 0; i < killAntSoundArray.length; i++) {
                //If the Audio object is paused
                if(killAntSoundArray[i].paused) {
                    killAntSoundArray[i].play(); //Play it
                    break;
                }
            }
        }
    }

    //playWindmillSound() function - Plays a hit sound from the pool of windmill hit Audio objects
    function playWindmillSound() {
        //If sound effects can be played
        if(playSoundEffects) {
            //Iterate through pool of Audio objects
            for(let i = 0; i < hitWindmillSoundArray.length; i++) {
                //If the Audio object is paused
                if(hitWindmillSoundArray[i].paused) {
                    hitWindmillSoundArray[i].play(); //Play it
                    break;
                }
            }
        }
    }

    //playSlingshotSound() function - Plays a hit sound from the pool of slingshot Audio objects
    function playSlingshotSound() {
        //If sound effects can be played
        if(playSoundEffects) {
            //Iterate through pool of Audio objects
            for(let i = 0; i < slingshotSoundArray.length; i++) {
                //If the Audio object is paused
                if(slingshotSoundArray[i].paused) {
                    slingshotSoundArray[i].play(); //Play it
                    break;
                }
            }
        }
    }

    //playHammerSound() function - Plays a hit sound from the pool of hammer Audio objects
    function playHammerSound() {
        //If sound effects can be played
        if(playSoundEffects) {
            //Iterate through pool of Audio objects
            for(let i = 0; i < hammerSoundArray.length; i++) {
                //If the Audio object is paused
                if(hammerSoundArray[i].paused) {
                    hammerSoundArray[i].play(); //Play it
                    break;
                }
            }
        }
    }

    //playBugSpraySound() function - Plays a hit sound from the pool of bug spray Audio objects
    function playBugSpraySound() {
        //If sound effects can be played
        if(playSoundEffects) {
            //Iterate through pool of Audio objects
            for(let i = 0; i < bugSpraySoundArray.length; i++) {
                //If the Audio object is paused
                if(bugSpraySoundArray[i].paused) {
                    bugSpraySoundArray[i].play(); //Play it
                    break;
                }
            }
        }
    }

    //playMagnifyingGlassSound() function - Plays a hit sound from the pool of magnifying glass Audio objects
    function playMagnifyingGlassSound() {
        //If sound effects can be played
        if(playSoundEffects) {
            //Iterate through pool of Audio objects
            for(let i = 0; i < magnifyingGlassSoundArray.length; i++) {
                //If the Audio object is paused
                if(magnifyingGlassSoundArray[i].paused) {
                    magnifyingGlassSoundArray[i].play(); //Play it
                    break;
                }
            }
        }
    }

    //playCannonSound() function - Plays a hit sound from the pool of cannon Audio objects
    function playCannonSound() {
        //If sound effects can be played
        if(playSoundEffects) {
            for (let i = 0; i < cannonSoundArray.length; i++) {
                //If the Audio object is paused
                if (cannonSoundArray[i].paused) {
                    cannonSoundArray[i].play(); //Play it
                    break;
                }
            }
        }
    }

    //playHoneySound() function - Plays a hit sound from the pool of honey Audio objects
    function playHoneySound() {
        //If sound effects can be played
        if(playSoundEffects) {
            for (let i = 0; i < honeySoundArray.length; i++) {
                //If the Audio object is paused
                if (honeySoundArray[i].paused) {
                    honeySoundArray[i].play(); //Play it
                    break;
                }
            }
        }
    }

    //muteUnmuteSoundEffects() function - Mutes or unmutes the sound effects
    function muteUnmuteSoundEffects() {
        //If sound effects are playing
        if(playSoundEffects) {
            playSoundEffects = false; //Don't play them
            sfxOnSprite.visible = false; //Show on sprite
            sfxOffSprite.visible = true; //Hide off sprite
        }
        //Else, they aren't playing
        else {
            playSoundEffects = true; //Play them
            sfxOnSprite.visible = true; //Hide on sprite
            sfxOffSprite.visible = false; //Show off sprite
        }
    }

    //playPauseMusic() function - Plays or pauses the music
    function playPauseMusic() {
        //If the music is paused, play it
        if(music.paused) {
            playMusic = true; //Music should be playing
            music.play();
            musicOnSprite.visible = true;
            musicOffSprite.visible = false;
        }
        //Else, if the music is playing, pause it
        else {
            playMusic = false; //Music should be paused
            music.pause();
            musicOnSprite.visible = false;
            musicOffSprite.visible = true;
        }
    }

    //playNextSong() function - Plays through the background music on shuffle, will not repeat the same song twice in a row
    function playNextSong() {
        //If the music should be playing
        if(playMusic) {
            //If the background music has finished playing
            if (music.paused) {
                let newRand = Math.floor(Math.random() * Math.floor(5)); //Generate a new random int
                //If the new random int matches the last one, that means we need to try again to find a new track
                if (lastRand === newRand) {
                    playNextSong(); //Recursively call this function to try again
                }
                //Else, the new random int doesn't match the last one, we found a new track to play
                else {
                    music = musicArray[newRand]; //Update music to new track
                    music.play(); //Play it
                    lastRand = newRand; //Update last random int with this current random int
                }
            }
        }
    }

    //updateToolTipPosition() function - Updates the position of the tooltip to keep in within the display no matter where the user puts their mouse
    function updateToolTipPosition() {
        tooltipContainer.position.set(mousePos.x+10, mousePos.y+10);
        if(mousePos.x > (appWidth/2)) {
            tooltipContainer.x = mousePos.x-tooltipContainer.width-10;
        }
        if(mousePos.x < (appWidth/2)) {
            tooltipContainer.x = mousePos.x+10;
        }
        if(mousePos.y > (appHeight/2)) {
            tooltipContainer.y = mousePos.y-tooltipContainer.height-10;
        }
        if(mousePos.y < (appHeight/2)) {
            tooltipContainer.y = mousePos.y+10;
        }
    }

    //updateToolTip(string) function - Accepts a string, updates the tooltip text and the size of the box
    function updateToolTip(string) {
        tooltipText.text = string;
        tooltipBox.clear();
        tooltipBox.beginFill(0x000000, tooltipAlpha);
        tooltipBox.drawRect(0, 0, tooltipText.width, tooltipText.height);
    }

    //showToolTip() function - Shows the tooltip
    function showToolTip() {
        tooltipContainer.visible = true;
    }

    //hideToolTip() function - Hides the tooltip
    function hideToolTip() {
        tooltipContainer.visible = false;
    }

    //initialize() function - Initializes the game buttons
    function initialize() {
        menuContainer.removeChild(percentageText); //Remove the loading percentage text

        tooltipText = new PIXI.Text("tooltip", {fontFamily: "Arial", fontSize: 24, fill: 0xFFFFFF, align: "center"}); //Create tooltip text
        tooltipBox = new PIXI.Graphics();

        tooltipBox.beginFill(0x000000, tooltipAlpha);
        tooltipBox.drawRect(0,0,tooltipText.width, tooltipText.height);

        //tooltipBox.position.set(mousePos.x, mousePos.y);
        tooltipText.text.x = tooltipBox.x;
        tooltipText.text.y = tooltipBox.y;

        tooltipContainer.addChild(tooltipBox);
        tooltipContainer.addChild(tooltipText);

//******MEDIA KEYS------------------------------------------------------------------------------------------------------
        sfxButton = new PIXI.Graphics(); //Create graphics object
        sfxButton.beginFill(0, 0); //Transparent
        sfxButton.lineStyle(5, 0x000000); //Black stroke
        sfxButton.drawRect(0, 0, 65, 65);
        sfxButton.position.set(0, 0);
        sfxButton.interactive = true;
        sfxButton.buttonMode = true;
        sfxButton.alpha = 0.25;

        sfxButton.on("mouseover", () => {
            sfxButton.alpha = 1;
            sfxOnSprite.alpha = 1;
            sfxOffSprite.alpha = 1;
            if(playSoundEffects) {
                updateToolTip("Mute sound effects (S)");
            }
            else {
                updateToolTip("Unmute sound effects (S)");
            }
            showToolTip();
        });

        sfxButton.on("mouseout", () => {
            sfxButton.alpha = 0.25;
            sfxOnSprite.alpha = 0.25;
            sfxOffSprite.alpha = 0.25;
            hideToolTip();
        });

        sfxButton.on("pointertap", () => {
            muteUnmuteSoundEffects();
            if(playSoundEffects) {
                sfxOnSprite.visible = true;
                sfxOffSprite.visible = false;
            }
            else {
                sfxOnSprite.visible = false;
                sfxOffSprite.visible = true;
            }
            if(playSoundEffects) {
                updateToolTip("Mute sound effects (S)");
            }
            else {
                updateToolTip("Unmute sound effects (S)");
            }
        });


        sfxOnSprite.width = sfxOnT.width*.15;
        sfxOnSprite.height = sfxOnT.height*.15;
        sfxOnSprite.x = sfxButton.x;
        sfxOnSprite.y = sfxButton.y;
        sfxOnSprite.alpha = 0.25;
        sfxOnSprite.visible = true;

        sfxOffSprite.width = sfxOffT.width*.15;
        sfxOffSprite.height = sfxOffT.height*.15;
        sfxOffSprite.x = sfxButton.x;
        sfxOffSprite.y = sfxButton.y;
        sfxOffSprite.alpha = 0.25;
        sfxOffSprite.visible = false;

        musicButton = new PIXI.Graphics(); //Create graphics object
        musicButton.beginFill(0, 0); //Transparent
        musicButton.lineStyle(5, 0x000000); //Black stroke
        musicButton.drawRect(0, 0, 65, 65);
        musicButton.position.set(sfxButton.x+sfxButton.width+5, 0);
        musicButton.interactive = true;
        musicButton.buttonMode = true;
        musicButton.alpha = 0.25;

        musicButton.on("mouseover", () => {
            musicButton.alpha = 1;
            musicOnSprite.alpha = 1;
            musicOffSprite.alpha = 1;
            if(!music.paused) {
                updateToolTip("Mute music (M)");
            }
            else {
                updateToolTip("Unmute music (M)");
            }
            showToolTip();
        });

        musicButton.on("mouseout", () => {
            musicButton.alpha = 0.25;
            musicOnSprite.alpha = 0.25;
            musicOffSprite.alpha = 0.25;
            hideToolTip();
        });

        musicButton.on("pointertap", () => {
            playPauseMusic();
            if(!music.paused) {
                updateToolTip("Mute music (M)");
            }
            else {
                updateToolTip("Unmute music (M)");
            }
        });

        musicOnSprite.width = musicOnT.width*.11;
        musicOnSprite.height = musicOnT.height*.11;
        musicOnSprite.x = musicButton.x+1;
        musicOnSprite.y = musicButton.y+3;
        musicOnSprite.alpha = 0.25;

        musicOffSprite.width = musicOffT.width*.11;
        musicOffSprite.height = musicOffT.height*.11;
        musicOffSprite.x = musicButton.x+1;
        musicOffSprite.y = musicButton.y+3;
        musicOffSprite.alpha = 0.25;

        //If the music is playing, show the on sprite and hide the off sprite
        if(!music.paused) {
            musicOnSprite.visible = true;
            musicOffSprite.visible = false;
        }
        //Else, the music isn't playing so show the off sprite and hdie the on sprite
        else {
            musicOnSprite.visible = false;
            musicOffSprite.visible = true;
        }

        mediaContainer.addChild(sfxButton);
        mediaContainer.addChild(musicButton);
        mediaContainer.addChild(sfxOnSprite);
        mediaContainer.addChild(sfxOffSprite);
        mediaContainer.addChild(musicOnSprite);
        mediaContainer.addChild(musicOffSprite);

        mediaContainer.position.set(appWidth-mediaContainer.width-(topBarContainer.y+(topBarContainer.height/2)-(mediaContainer.height/2))+5, topBarContainer.y+(topBarContainer.height/2)-(mediaContainer.height/2));
//*******TITLE SCREEN------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------//
        //Create title menu text (ANTS!)
        titleMenuTitle = new PIXI.Text("ANTS!", {fontFamily: "Arial", fontSize: 96, fill: 0x000000, align: "center"}); //Create title text
        titleMenuTitle.x = (appWidth/2)-(titleMenuTitle.width/2); //x position
        titleMenuTitle.y = titleMenuTitle.height; //y position
        menuContainer.addChild(titleMenuTitle); //Add to container

//Sign up button------------------------------------------
        titleMenuSignUpButton = new PIXI.Graphics(); //Create graphics object
        titleMenuSignUpButton.beginFill(0x00FFFF); //Fill blue
        titleMenuSignUpButton.lineStyle(5, 0x000000); //Black stroke
        titleMenuSignUpButton.drawRect(0, 0, 300, 150); //Draw button
        titleMenuSignUpButton.position.set((appWidth/2)-(titleMenuSignUpButton.width/2), appHeight-600); //Set position
        titleMenuSignUpButton.interactive = true; //Make it interactive
        titleMenuSignUpButton.buttonMode = true; //Make it a button

        //When clicked
        titleMenuSignUpButton.on("pointertap", () => {
            document.getElementById("signuppopup").style.display = "block"; //Show the sign up modal window
        });

        //Log in button text
        titleMenuSignUpButtonText = new PIXI.Text("Sign Up", {fontFamily: "Arial", fontSize: 24, fill: 0x000000, align: "center"}); //Create text
        titleMenuSignUpButtonText.position.x = titleMenuSignUpButton.x+(titleMenuSignUpButton.width/2)-(titleMenuSignUpButtonText.width/2); //x position
        titleMenuSignUpButtonText.position.y = titleMenuSignUpButton.y+(titleMenuSignUpButton.height/2)-(titleMenuSignUpButtonText.height/2); //y position

        menuContainer.addChild(titleMenuSignUpButton); //Add to container
        menuContainer.addChild(titleMenuSignUpButtonText); //Add to container

        //Create title menu description
        titleMenuDescription = new PIXI.Text("You are known far and wide for the wondrous pies that you bake at your windmill. It is rumoured that you might even use advanced forms of science, or even magic, to create such delicacies. Until now, you've been able to bake your pies without much interruption. However, a colony of ants has found the location of your windmill and they will do anything they can to storm your windmill and eat all of your pies! You must defend your windmill from the onslaught of clever ants or your life's work will be ruined!", {fontFamily: "Arial", fontSize: 24, fill: 0x000000, align: "center", wordWrap: "true", wordWrapWidth: "100"}); //Create description text
        titleMenuDescription.x = (appWidth/2)-(titleMenuDescription.width/2); //x position
        titleMenuDescription.y = (titleMenuTitle.y+titleMenuTitle.height)+((titleMenuSignUpButton.y-(titleMenuTitle.y+titleMenuTitle.height))/2)-(titleMenuDescription.height/2); //y position
        menuContainer.addChild(titleMenuDescription); //Add to container

//Guest button------------------------------------------
        titleMenuGuestButton = new PIXI.Graphics(); //Create graphics object
        titleMenuGuestButton.beginFill(0x00FFFF); //Fill blue
        titleMenuGuestButton.lineStyle(5, 0x000000); //Black stroke
        titleMenuGuestButton.drawRect(0, 0, 300, 150); //Draw rectangle
        titleMenuGuestButton.position.set((appWidth/2)-(titleMenuGuestButton.width/2), titleMenuSignUpButton.y+titleMenuSignUpButton.height+50); //Set position
        titleMenuGuestButton.interactive = true; //Make it interactive
        titleMenuGuestButton.buttonMode = true; //Make it a button

        //When clicked
        titleMenuGuestButton.on("pointertap", () => {
            player = guestPlayer; //Assign player object as default guestPlayer
            loggedIn = true; //Player is "loggedIn"
            hideMainMenu(); //Hide the main menu
            showLoggedInMenu(); //Show the logged in menu
        });

        //Guest button text
        titleMenuGuestButtonText = new PIXI.Text("Guest", {fontFamily: "Arial", fontSize: 24, fill: 0x000000, align: "center"}); //Create text
        titleMenuGuestButtonText.position.x = titleMenuGuestButton.x+(titleMenuGuestButton.width/2)-(titleMenuGuestButtonText.width/2); //x position
        titleMenuGuestButtonText.position.y = titleMenuGuestButton.y+(titleMenuGuestButton.height/2)-(titleMenuGuestButtonText.height/2); //y position

        menuContainer.addChild(titleMenuGuestButton); //Add to container
        menuContainer.addChild(titleMenuGuestButtonText); //Add to container

//Login button------------------------------------------
        titleMenuLoginButton = new PIXI.Graphics(); //Create graphics object
        titleMenuLoginButton.beginFill(0x00FFFF); //Fill blue
        titleMenuLoginButton.lineStyle(5, 0x000000); //Black stroke
        titleMenuLoginButton.drawRect(0, 0, 300, 150); //Draw button
        titleMenuLoginButton.position.set((appWidth/2)-(titleMenuLoginButton.width/2), titleMenuGuestButton.y+titleMenuGuestButton.height+50); //Set position
        titleMenuLoginButton.interactive = true; //Make it interactive
        titleMenuLoginButton.buttonMode = true; //Make it a button

        //When clicked
        titleMenuLoginButton.on("pointertap", () => {
            document.getElementById("loginpopup").style.display = "block"; //Show log in modal window
        });

        //Log in button text
        titleMenuLoginButtonText = new PIXI.Text("Log In", {fontFamily: "Arial", fontSize: 24, fill: 0x000000, align: "center"}); //Create text
        titleMenuLoginButtonText.position.x = titleMenuLoginButton.x+(titleMenuLoginButton.width/2)-(titleMenuLoginButtonText.width/2); //x position
        titleMenuLoginButtonText.position.y = titleMenuLoginButton.y+(titleMenuLoginButton.height/2)-(titleMenuLoginButtonText.height/2); //y position

        menuContainer.addChild(titleMenuLoginButton); //Add to container
        menuContainer.addChild(titleMenuLoginButtonText); //Add to container

//*******LOGGED IN SCREEN------------------------------------------------------------------------------------------------------------------------------------------------
        loggedInMenuTitle = new PIXI.Text("Welcome back, " + player.username + "!", {fontFamily: "Arial", fontSize: 96, fill: 0x000000, align: "center"}); //Create loggedInTitle text
        loggedInMenuTitle.x = (appWidth/2)-(loggedInMenuTitle.width/2); //x position
        loggedInMenuTitle.y = (loggedInMenuTitle.height); //y position
        loggedInMenuTitle.visible = false; //Hide it
        menuContainer.addChild(loggedInMenuTitle); //Add to container

        //Logged in windmill button------------------------------------------
        //Follows same logic as above
        loggedInMenuWindmillButton = new PIXI.Graphics();
        loggedInMenuWindmillButton.beginFill(0x00FFFF);
        loggedInMenuWindmillButton.lineStyle(5, 0x000000);
        loggedInMenuWindmillButton.drawRect(0, 0, 300, 150);
        loggedInMenuWindmillButton.position.set((appWidth/2)-(loggedInMenuWindmillButton.width/2), loggedInMenuTitle.position.y+loggedInMenuTitle.height+50);
        loggedInMenuWindmillButton.interactive = true;
        loggedInMenuWindmillButton.buttonMode = true;
        loggedInMenuWindmillButton.on("pointertap", () => {
            hideLoggedInMenu(); //Hide the logged in menu
            showWindmillMenu(); //Show the windmill menu
        });
        //Windmill button text
        loggedInMenuWindmillButtonText = new PIXI.Text("Windmill", {fontFamily: "Arial", fontSize: 24, fill: 0x000000, align: "center"});
        loggedInMenuWindmillButtonText.position.x = loggedInMenuWindmillButton.x+(loggedInMenuWindmillButton.width/2)-(loggedInMenuWindmillButtonText.width/2);
        loggedInMenuWindmillButtonText.position.y = (loggedInMenuTitle.y+loggedInMenuTitle.height+50+75)-(loggedInMenuWindmillButtonText.height/2);
        loggedInMenuWindmillButton.visible = false; //Hide it
        loggedInMenuWindmillButtonText.visible = false; //Hide it

        //Add to container
        menuContainer.addChild(loggedInMenuWindmillButton);
        menuContainer.addChild(loggedInMenuWindmillButtonText);

        //Logged in towers button------------------------------------------
        //Follows same logic as above
        loggedInMenuTowersButton = new PIXI.Graphics();
        loggedInMenuTowersButton.beginFill(0x00FFFF);
        loggedInMenuTowersButton.lineStyle(5, 0x000000);
        loggedInMenuTowersButton.drawRect(0, 0, 300, 150);
        loggedInMenuTowersButton.position.set((appWidth/2)-(loggedInMenuWindmillButton.width/2), loggedInMenuWindmillButton.y+loggedInMenuWindmillButton.height+50);
        loggedInMenuTowersButton.interactive = true;
        loggedInMenuTowersButton.buttonMode = true;
        loggedInMenuTowersButton.on("pointertap", () => {
            hideLoggedInMenu(); //Hide the logged in menu
            showTowersMenu(); //Show the towers menu
        });
        //Towers button text
        loggedInMenuTowersButtonText = new PIXI.Text("Towers", {fontFamily: "Arial", fontSize: 24, fill: 0x000000, align: "center"});
        loggedInMenuTowersButtonText.position.x = loggedInMenuTowersButton.x+(loggedInMenuTowersButton.width/2)-(loggedInMenuTowersButtonText.width/2);
        loggedInMenuTowersButtonText.position.y = loggedInMenuTowersButton.y+(loggedInMenuTowersButton.height/2)-(loggedInMenuTowersButtonText.height/2);
        loggedInMenuTowersButton.visible = false; //Hide it
        loggedInMenuTowersButtonText.visible = false; //Hide it

        //Add to container
        menuContainer.addChild(loggedInMenuTowersButton);
        menuContainer.addChild(loggedInMenuTowersButtonText);

        //Logged in play button------------------------------------------
        //Follows same logic as above
        loggedInMenuPlayButton = new PIXI.Graphics();
        loggedInMenuPlayButton.beginFill(0x00FFFF);
        loggedInMenuPlayButton.lineStyle(5, 0x000000);
        loggedInMenuPlayButton.drawRect(0, 0, 300, 150);
        loggedInMenuPlayButton.position.set((appWidth/2)-(loggedInMenuPlayButton.width/2), loggedInMenuTowersButton.y+loggedInMenuTowersButton.height+50);
        loggedInMenuPlayButton.interactive = true;
        loggedInMenuPlayButton.buttonMode = true;
        loggedInMenuPlayButton.on("pointertap", () => {
            hideLoggedInMenu(); //Hide the logged in menu
            showLevelMenu(); //Show the level menu
        });
        //Play button text
        loggedInMenuPlayButtonText = new PIXI.Text("Play", {fontFamily: "Arial", fontSize: 24, fill: 0x000000, align: "center"});
        loggedInMenuPlayButtonText.position.x = loggedInMenuPlayButton.x+(loggedInMenuPlayButton.width/2)-(loggedInMenuPlayButtonText.width/2);
        loggedInMenuPlayButtonText.position.y = loggedInMenuPlayButton.y+(loggedInMenuPlayButton.height/2)-(loggedInMenuPlayButtonText.height/2);
        loggedInMenuPlayButton.visible = false; //Hide it
        loggedInMenuPlayButtonText.visible = false; //Hide it

        //Add to container
        menuContainer.addChild(loggedInMenuPlayButton);
        menuContainer.addChild(loggedInMenuPlayButtonText);

        //Logged in log out button------------------------------------------
        //Follows same logic as above
        loggedInMenuLogOutButton = new PIXI.Graphics();
        loggedInMenuLogOutButton.beginFill(0x00FFFF);
        loggedInMenuLogOutButton.lineStyle(5, 0x000000);
        loggedInMenuLogOutButton.drawRect(0, 0, 300, 150);
        loggedInMenuLogOutButton.position.set((appWidth/2)-(loggedInMenuLogOutButton.width/2), loggedInMenuPlayButton.y+loggedInMenuPlayButton.height+50);
        loggedInMenuLogOutButton.interactive = true;
        loggedInMenuLogOutButton.buttonMode = true;
        loggedInMenuLogOutButton.on("pointertap", () => {
            hideLoggedInMenu(); //Hide the logged in menu
            logOut(); //Log the player out
            showMainMenu(); //Show the main menu
        });
        //LogOut button text
        loggedInMenuLogOutButtonText = new PIXI.Text("Log Out", {fontFamily: "Arial", fontSize: 24, fill: 0x000000, align: "center"});
        loggedInMenuLogOutButtonText.position.x = loggedInMenuLogOutButton.x+(loggedInMenuLogOutButton.width/2)-(loggedInMenuLogOutButtonText.width/2);
        loggedInMenuLogOutButtonText.position.y = loggedInMenuLogOutButton.y+(loggedInMenuLogOutButton.height/2)-(loggedInMenuLogOutButtonText.height/2);
        loggedInMenuLogOutButton.visible = false; //Hide it
        loggedInMenuLogOutButtonText.visible = false; //Hide it

        //Add to container
        menuContainer.addChild(loggedInMenuLogOutButton);
        menuContainer.addChild(loggedInMenuLogOutButtonText);

//*******WINDMILL SCREEN------------------------------------------------------------------------------------------------------------------------------------------------
        windmillMenuTitle = new PIXI.Text("Your Windmill", {fontFamily: "Arial", fontSize: 96, fill: 0x000000, align: "center"}); //Create windmill title text
        windmillMenuTitle.x = (appWidth/2)-(windmillMenuTitle.width/2); //x position
        windmillMenuTitle.y = 25; //y position
        windmillMenuTitle.visible = false;
        menuContainer.addChild(windmillMenuTitle); //Add to container

        //Windmill description (XP)
        windmillMenuDescription = new PIXI.Text("Your XP: " + player.xp +"xp", {fontFamily: "Arial", fontSize: 48, fill: 0x000000, align: "center"}); //Create windmill title text
        windmillMenuDescription.x = (appWidth/2)-(windmillMenuDescription.width/2); //x position
        windmillMenuDescription.y = (windmillMenuTitle.y+windmillMenuTitle.height+5); //y position
        windmillMenuDescription.visible = false; //Hide it
        menuContainer.addChild(windmillMenuDescription); //Add to container

        //Wood windmill button------------------------------------------
        //Follows same logic as above
        windmillMenuWoodButton = new PIXI.Graphics();
        windmillMenuWoodButton.beginFill(0x00FFFF);
        windmillMenuWoodButton.lineStyle(5, 0x000000);
        windmillMenuWoodButton.drawRect(0, 0, 300, 140);
        windmillMenuWoodButton.position.set((appWidth/2)-(windmillMenuWoodButton.width/2), windmillMenuDescription.y+windmillMenuDescription.height+25);
        windmillMenuWoodButton.interactive = true;
        windmillMenuWoodButton.buttonMode = true;
        windmillMenuWoodButton.on("pointertap", () => {
            setWindmill("wood"); //Set windmill to wood
            updateWindmillButtons(); //Update the windmill menu buttons
            updatePlayerStats(); //Update the player stats (save preferences)
            windmillMenuWoodButton.alpha = 1; //Set alpha to 1
        });
        //Wood windmill button text
        windmillMenuWoodButtonText = new PIXI.Text("Wood", {fontFamily: "Arial", fontSize: 24, fill: 0x000000, align: "center"});
        windmillMenuWoodButtonText.position.x = windmillMenuWoodButton.x+(windmillMenuWoodButton.width/2)-(windmillMenuWoodButtonText.width/2);
        windmillMenuWoodButtonText.position.y = windmillMenuWoodButton.y+(windmillMenuWoodButton.height/2)-(windmillMenuWoodButtonText.height/2);
        windmillMenuWoodButton.visible = false; //Hide it
        windmillMenuWoodButtonText.visible = false; //Hide it

        //Add to container
        menuContainer.addChild(windmillMenuWoodButton);
        menuContainer.addChild(windmillMenuWoodButtonText);

        //Stone windmill button------------------------------------------
        //Follows same logic as above
        windmillMenuStoneButton = new PIXI.Graphics();
        windmillMenuStoneButton.beginFill(0x00FFFF);
        windmillMenuStoneButton.lineStyle(5, 0x000000);
        windmillMenuStoneButton.drawRect(0, 0, 300, 140);
        windmillMenuStoneButton.position.set((appWidth/2)-(windmillMenuStoneButton.width/2), windmillMenuWoodButton.y+windmillMenuWoodButton.height+25);
        //If the player has enough xp for the stone windmill
        if(player.xp >= 5000) {
            windmillMenuStoneButton.interactive = true;
            windmillMenuStoneButton.buttonMode = true;
            windmillMenuStoneButton.alpha = 0.5; //Set alpha to .5
        }
        //Else, they can't use it
        else {
            windmillMenuStoneButton.alpha = 0.1; //Set alpha to .1
        }
        windmillMenuStoneButton.on("pointertap", () => {
            setWindmill("stone"); //Set windmill to stone
            updateWindmillButtons(); //Update the windmill menu buttons
            updatePlayerStats(); //Update the player stats (save preferences)
            windmillMenuStoneButton.alpha = 1; //Set alpha to 1
        });
        //Stone windmill button text
        windmillMenuStoneButtonText = new PIXI.Text("Stone", {fontFamily: "Arial", fontSize: 24, fill: 0x000000, align: "center"});
        windmillMenuStoneButtonText.position.x = windmillMenuStoneButton.x+(windmillMenuStoneButton.width/2)-(windmillMenuStoneButtonText.width/2);
        windmillMenuStoneButtonText.position.y = windmillMenuStoneButton.y+(windmillMenuStoneButton.height/2)-(windmillMenuStoneButtonText.height/2);
        windmillMenuStoneButton.visible = false; //Hide it
        windmillMenuStoneButtonText.visible = false; //Hide it

        //Add to container
        menuContainer.addChild(windmillMenuStoneButton);
        menuContainer.addChild(windmillMenuStoneButtonText);

        //Concrete windmill button------------------------------------------
        //Follows same logic as above
        windmillMenuConcreteButton = new PIXI.Graphics();
        windmillMenuConcreteButton.beginFill(0x00FFFF);
        windmillMenuConcreteButton.lineStyle(5, 0x000000);
        windmillMenuConcreteButton.drawRect(0, 0, 300, 140);
        windmillMenuConcreteButton.position.set((appWidth/2)-(windmillMenuConcreteButton.width/2), windmillMenuStoneButton.y+windmillMenuStoneButton.height+25);
        //If the player has enough xp for the concrete windmill
        if(player.xp >= 125000) {
            windmillMenuConcreteButton.interactive = true;
            windmillMenuConcreteButton.buttonMode = true;
            windmillMenuConcreteButton.alpha = 0.5; //Set alpha to .5
        }
        //Else, the player can't use it
        else {
            windmillMenuConcreteButton.alpha = 0.1; //Set alpha to .1
        }
        windmillMenuConcreteButton.on("pointertap", () => {
            setWindmill("concrete"); //Set windmill to concrete
            updateWindmillButtons(); //Update the windmill menu buttons
            updatePlayerStats(); //Update the player stats (save preferences)
            windmillMenuConcreteButton.alpha = 1; //Set alpha to 1
        });
        //Concrete windmill button text
        windmillMenuConcreteButtonText = new PIXI.Text("Concrete", {fontFamily: "Arial", fontSize: 24, fill: 0x000000, align: "center"});
        windmillMenuConcreteButtonText.position.x = windmillMenuConcreteButton.x+(windmillMenuConcreteButton.width/2)-(windmillMenuConcreteButtonText.width/2);
        windmillMenuConcreteButtonText.position.y = windmillMenuConcreteButton.y+(windmillMenuConcreteButton.height/2)-(windmillMenuConcreteButtonText.height/2);
        windmillMenuConcreteButton.visible = false; //Hide it
        windmillMenuConcreteButtonText.visible = false; //Hide it

        //Add to container
        menuContainer.addChild(windmillMenuConcreteButton);
        menuContainer.addChild(windmillMenuConcreteButtonText);

        //Steel windmill button------------------------------------------
        //Follows same logic as above
        windmillMenuSteelButton = new PIXI.Graphics();
        windmillMenuSteelButton.beginFill(0x00FFFF);
        windmillMenuSteelButton.lineStyle(5, 0x000000);
        windmillMenuSteelButton.drawRect(0, 0, 300, 140);
        windmillMenuSteelButton.position.set((appWidth/2)-(windmillMenuSteelButton.width/2), windmillMenuConcreteButton.y+windmillMenuConcreteButton.height+25);
        //If the player has enough xp for the steel windmill
        if(player.xp >= 250000) {
            windmillMenuSteelButton.interactive = true;
            windmillMenuSteelButton.buttonMode = true;
            windmillMenuSteelButton.alpha = 0.5; //Set alpha to .5
        }
        //Else, the player can't use it
        else {
            windmillMenuSteelButton.alpha = 0.1; //Set alpha to .1
        }
        windmillMenuSteelButton.on("pointertap", () => {
            setWindmill("steel"); //Set windmill to steel
            updateWindmillButtons(); //Update the windmill menu buttons
            updatePlayerStats(); //Update the player stats (save preferences)
            windmillMenuSteelButton.alpha = 1; //Set alpha to 1
        });
        //Steel windmill button text
        windmillMenuSteelButtonText = new PIXI.Text("Steel", {fontFamily: "Arial", fontSize: 24, fill: 0x000000, align: "center"});
        windmillMenuSteelButtonText.position.x = windmillMenuSteelButton.x+(windmillMenuSteelButton.width/2)-(windmillMenuSteelButtonText.width/2);
        windmillMenuSteelButtonText.position.y = windmillMenuSteelButton.y+(windmillMenuSteelButton.height/2)-(windmillMenuSteelButtonText.height/2);
        windmillMenuSteelButton.visible = false; //Hide it
        windmillMenuSteelButtonText.visible = false; //Hide it

        //Add to container
        menuContainer.addChild(windmillMenuSteelButton);
        menuContainer.addChild(windmillMenuSteelButtonText);

        //Back button------------------------------------------
        //Follows same logic as above
        windmillMenuBackButton = new PIXI.Graphics();
        windmillMenuBackButton.beginFill(0x00FFFF);
        windmillMenuBackButton.lineStyle(5, 0x000000);
        windmillMenuBackButton.drawRect(0, 0, 300, 140);
        windmillMenuBackButton.position.set((appWidth/2)-(windmillMenuBackButton.width/2), windmillMenuSteelButton.y+windmillMenuSteelButton.height+25);
        windmillMenuBackButton.interactive = true;
        windmillMenuBackButton.buttonMode = true;
        windmillMenuBackButton.on("pointertap", () => {
            hideWindmillMenu(); //Hide windmill menu
            showLoggedInMenu(); //Show logged in menu
            updatePlayerStats(); //Update the player stats (save preferences)
        });
        //Back windmill button text
        windmillMenuBackButtonText = new PIXI.Text("Back", {fontFamily: "Arial", fontSize: 24, fill: 0x000000, align: "center"});
        windmillMenuBackButtonText.position.x = windmillMenuBackButton.x+(windmillMenuBackButton.width/2)-(windmillMenuBackButtonText.width/2);
        windmillMenuBackButtonText.position.y = windmillMenuBackButton.y+(windmillMenuBackButton.height/2)-(windmillMenuBackButtonText.height/2);
        windmillMenuBackButton.visible = false; //Hide it
        windmillMenuBackButtonText.visible = false; //Hide it

        //Add to container
        menuContainer.addChild(windmillMenuBackButton);
        menuContainer.addChild(windmillMenuBackButtonText);

//*******TOWERS SCREEN------------------------------------------------------------------------------------------------------------------------------------------------
        towersMenuTitle = new PIXI.Text("Towers", {fontFamily: "Arial", fontSize: 96, fill: 0x000000, align: "center"}); //Create towers title text
        towersMenuTitle.x = (appWidth/2)-(towersMenuTitle.width/2); //x position
        towersMenuTitle.y = 25; //y position
        towersMenuTitle.visible = false; //Hide it
        menuContainer.addChild(towersMenuTitle); //Add to container

        //Initialize towers menu tower images
        towersMenuSlingshotImage = new Tower(1, {x: 0, y: 0}, menuContainer); //Create slingshot button image sprite
        towersMenuHammerImage = new Tower(2, {x: 0, y: 0}, menuContainer); //Create hammer button image sprite
        towersMenuBugSprayImage = new Tower(3, {x: 0, y: 0}, menuContainer); //Create bug spray button image sprite
        towersMenuMagnifyingGlassImage = new Tower(4, {x: 0, y: 0}, menuContainer); //Create magnifying glass button image sprite
        towersMenuCannonImage = new Tower(5, {x: 0, y: 0}, menuContainer); //Create cannon button image sprite
        towersMenuHoneyImage = new Tower(6, {x: 0, y: 0}, menuContainer); //Create honey button image sprite

        //Resize the towers
        towersMenuSlingshotImage.sprite1.width *= 0.75;
        towersMenuSlingshotImage.sprite1.height *= 0.75;
        towersMenuSlingshotImage.sprite2.width *= 0.75;
        towersMenuSlingshotImage.sprite2.height *= 0.75;
        towersMenuSlingshotImage.sprite3.width *= 0.75;
        towersMenuSlingshotImage.sprite3.height *= 0.75;
        towersMenuHammerImage.sprite1.width *= 0.75;
        towersMenuHammerImage.sprite1.height *= 0.75;
        towersMenuHammerImage.sprite2.width *= 0.75;
        towersMenuHammerImage.sprite2.height *= 0.75;
        towersMenuBugSprayImage.sprite1.width *= 0.75;
        towersMenuBugSprayImage.sprite1.height *= 0.75;
        towersMenuBugSprayImage.sprite2.width *= 0.75;
        towersMenuBugSprayImage.sprite2.height *= 0.75;
        towersMenuMagnifyingGlassImage.sprite1.width *= 0.75;
        towersMenuMagnifyingGlassImage.sprite1.height *= 0.75;
        towersMenuMagnifyingGlassImage.sprite2.width *= 0.75;
        towersMenuMagnifyingGlassImage.sprite2.height *= 0.75;
        towersMenuCannonImage.sprite1.width *= 0.75;
        towersMenuCannonImage.sprite1.height *= 0.75;
        towersMenuCannonImage.sprite2.width *= 0.75;
        towersMenuCannonImage.sprite2.height *= 0.75;
        towersMenuHoneyImage.sprite1.width *= 0.75;
        towersMenuHoneyImage.sprite1.height *= 0.75;
        towersMenuHoneyImage.sprite2.width *= 0.75;
        towersMenuHoneyImage.sprite2.height *= 0.75;

        //Set tower positions 3 on left 3 on right
        towersMenuSlingshotImage.setPosition((appWidth*.3), appHeight*.15);
        towersMenuHammerImage.setPosition((appWidth*.3), appHeight*.45);
        towersMenuBugSprayImage.setPosition((appWidth*.3), appHeight*.75);
        towersMenuMagnifyingGlassImage.setPosition((appWidth*.7), appHeight*.15);
        towersMenuCannonImage.setPosition((appWidth*.7), appHeight*.45);
        towersMenuHoneyImage.setPosition((appWidth*.7), appHeight*.75);

        //Hide all tower images
        towersMenuSlingshotImage.hide();
        towersMenuHammerImage.hide();
        towersMenuBugSprayImage.hide();
        towersMenuMagnifyingGlassImage.hide();
        towersMenuCannonImage.hide();
        towersMenuHoneyImage.hide();

        //Create unlock texts and place them below their respective images
        towersMenuSlingshotTierText = new PIXI.Text("Slingshot\nPath 1 tiers unlocked: " + slingshotP1Num + "/4\nPath 2 tiers unlocked: " + slingshotP2Num + "/4", {fontFamily: "Arial", fontSize: 24, fill: 0x000000, align: "center"});
        towersMenuSlingshotTierText.x = towersMenuSlingshotImage.x-(towersMenuSlingshotTierText.width/2);
        towersMenuSlingshotTierText.y = towersMenuSlingshotImage.y+20;

        towersMenuHammerTierText = new PIXI.Text("Hammer\nPath 1 tiers unlocked: " + hammerP1Num + "/4\nPath 2 tiers unlocked: " + hammerP2Num + "/4", {fontFamily: "Arial", fontSize: 24, fill: 0x000000, align: "center"});
        towersMenuHammerTierText.x = towersMenuHammerImage.x-(towersMenuHammerTierText.width/2);
        towersMenuHammerTierText.y = towersMenuHammerImage.y+30;

        towersMenuBugSprayTierText = new PIXI.Text("Bug Spray\nPath 1 tiers unlocked: " + bugSprayP1Num + "/4\nPath 2 tiers unlocked: " + bugSprayP2Num + "/4", {fontFamily: "Arial", fontSize: 24, fill: 0x000000, align: "center"});
        towersMenuBugSprayTierText.x = towersMenuBugSprayImage.x-(towersMenuBugSprayTierText.width/2);
        towersMenuBugSprayTierText.y = towersMenuBugSprayImage.y+60;

        towersMenuMagnifyingGlassTierText = new PIXI.Text("Magnifying Glass\nPath 1 tiers unlocked: " + magnifyingGlassP1Num + "/4\nPath 2 tiers unlocked: " + magnifyingGlassP2Num + "/4", {fontFamily: "Arial", fontSize: 24, fill: 0x000000, align: "center"});
        towersMenuMagnifyingGlassTierText.x = towersMenuMagnifyingGlassImage.x-(towersMenuMagnifyingGlassTierText.width/2);
        towersMenuMagnifyingGlassTierText.y = towersMenuMagnifyingGlassImage.y+40;//+towersMenuMagnifyingGlassTierText.height+20;

        towersMenuCannonTierText = new PIXI.Text("Cannon\nPath 1 tiers unlocked: " + cannonP1Num + "/4\nPath 2 tiers unlocked: " + cannonP2Num + "/4", {fontFamily: "Arial", fontSize: 24, fill: 0x000000, align: "center"});
        towersMenuCannonTierText.x = towersMenuCannonImage.x-(towersMenuCannonTierText.width/2);
        towersMenuCannonTierText.y = towersMenuCannonImage.y+50;

        towersMenuHoneyTierText = new PIXI.Text("Honey\nPath 1 tiers unlocked: " + honeyP1Num + "/4\nPath 2 tiers unlocked: " + honeyP2Num + "/4", {fontFamily: "Arial", fontSize: 24, fill: 0x000000, align: "center"});
        towersMenuHoneyTierText.x = towersMenuHoneyImage.x-(towersMenuHoneyTierText.width/2);
        towersMenuHoneyTierText.y = towersMenuHoneyImage.y+40;

        //Add the texts to container
        menuContainer.addChild(towersMenuSlingshotTierText);
        menuContainer.addChild(towersMenuHammerTierText);
        menuContainer.addChild(towersMenuBugSprayTierText);
        menuContainer.addChild(towersMenuMagnifyingGlassTierText);
        menuContainer.addChild(towersMenuCannonTierText);
        menuContainer.addChild(towersMenuHoneyTierText);

        //Create xp texts and place them below their respective images
        towersMenuSlingshotText = new PIXI.Text("Path1: 1000XP to tier 1\nPath2: 1000XP to tier 2", {fontFamily: "Arial", fontSize: 30, fill: 0x000000, align: "center"});
        towersMenuSlingshotText.x = towersMenuSlingshotTierText.x+(towersMenuSlingshotTierText.width/2)-(towersMenuSlingshotText.width/2);
        towersMenuSlingshotText.y = towersMenuSlingshotTierText.y+towersMenuSlingshotTierText.height;

        towersMenuHammerText = new PIXI.Text("Path1: 1000XP to tier 1\nPath2: 1000XP to tier 2", {fontFamily: "Arial", fontSize: 30, fill: 0x000000, align: "center"});
        towersMenuHammerText.x = towersMenuHammerTierText.x+(towersMenuHammerTierText.width/2)-(towersMenuHammerText.width/2);
        towersMenuHammerText.y = towersMenuHammerTierText.y+towersMenuHammerTierText.height;

        towersMenuBugSprayText = new PIXI.Text("Path1: 1000XP to tier 1\nPath2: 1000XP to tier 2", {fontFamily: "Arial", fontSize: 30, fill: 0x000000, align: "center"});
        towersMenuBugSprayText.x = towersMenuBugSprayTierText.x+(towersMenuBugSprayTierText.width/2)-(towersMenuBugSprayText.width/2);
        towersMenuBugSprayText.y = towersMenuBugSprayTierText.y+towersMenuBugSprayTierText.height;

        towersMenuMagnifyingGlassText = new PIXI.Text("Path1: 1000XP to tier 1\nPath2: 1000XP to tier 2", {fontFamily: "Arial", fontSize: 30, fill: 0x000000, align: "center"});
        towersMenuMagnifyingGlassText.x = towersMenuMagnifyingGlassTierText.x+(towersMenuMagnifyingGlassTierText.width/2)-(towersMenuMagnifyingGlassText.width/2);
        towersMenuMagnifyingGlassText.y = towersMenuMagnifyingGlassTierText.y+towersMenuMagnifyingGlassTierText.height;

        towersMenuCannonText = new PIXI.Text("Path1: 1000XP to tier 1\nPath2: 1000XP to tier 2", {fontFamily: "Arial", fontSize: 30, fill: 0x000000, align: "center"});
        towersMenuCannonText.x = towersMenuCannonTierText.x+(towersMenuCannonTierText.width/2)-(towersMenuCannonText.width/2);
        towersMenuCannonText.y = towersMenuCannonTierText.y+towersMenuCannonTierText.height;

        towersMenuHoneyText = new PIXI.Text("Path1: 1000XP to tier 1\nPath2: 1000XP to tier 2", {fontFamily: "Arial", fontSize: 30, fill: 0x000000, align: "center"});
        towersMenuHoneyText.x = towersMenuHoneyTierText.x+(towersMenuHoneyTierText.width/2)-(towersMenuHoneyText.width/2);
        towersMenuHoneyText.y = towersMenuHoneyTierText.y+towersMenuHoneyTierText.height;

        //Add the texts to container
        menuContainer.addChild(towersMenuSlingshotText);
        menuContainer.addChild(towersMenuHammerText);
        menuContainer.addChild(towersMenuBugSprayText);
        menuContainer.addChild(towersMenuMagnifyingGlassText);
        menuContainer.addChild(towersMenuCannonText);
        menuContainer.addChild(towersMenuHoneyText);

        //Hide the texts
        towersMenuSlingshotText.visible = false; //Hide it
        towersMenuHammerText.visible = false; //Hide it
        towersMenuBugSprayText.visible = false; //Hide it
        towersMenuMagnifyingGlassText.visible = false; //Hide it
        towersMenuCannonText.visible = false; //Hide it
        towersMenuHoneyText.visible = false; //Hide it
        towersMenuSlingshotTierText.visible = false; //Hide it
        towersMenuHammerTierText.visible = false; //Hide it
        towersMenuBugSprayTierText.visible = false; //Hide it
        towersMenuMagnifyingGlassTierText.visible = false; //Hide it
        towersMenuCannonTierText.visible = false; //Hide it
        towersMenuHoneyTierText.visible = false; //Hide it

        //Back button------------------------------------------
        //Follows same logic as above
        towersMenuBackButton = new PIXI.Graphics();
        towersMenuBackButton.beginFill(0x00FFFF);
        towersMenuBackButton.lineStyle(5, 0x000000);
        towersMenuBackButton.drawRect(0, 0, 300, 140);
        towersMenuBackButton.position.set((appWidth/2)-(towersMenuBackButton.width/2), appHeight-towersMenuBackButton.height);
        towersMenuBackButton.interactive = true;
        towersMenuBackButton.buttonMode = true;
        towersMenuBackButton.on("pointertap", () => {
            hideTowersMenu(); //Hide towers menu
            showLoggedInMenu(); //Show logged in menu
            updatePlayerStats(); //Update the player's stats
        });
        //Back button text
        towersMenuBackButtonText = new PIXI.Text("Back", {fontFamily: "Arial", fontSize: 24, fill: 0x000000, align: "center"});
        towersMenuBackButtonText.position.x = towersMenuBackButton.x+(towersMenuBackButton.width/2)-(towersMenuBackButtonText.width/2);
        towersMenuBackButtonText.position.y = towersMenuBackButton.y+(towersMenuBackButton.height/2)-(towersMenuBackButtonText.height/2);
        towersMenuBackButton.visible = false; //Hide it
        towersMenuBackButtonText.visible = false; //Hide it

        //Add to container
        menuContainer.addChild(towersMenuBackButton);
        menuContainer.addChild(towersMenuBackButtonText);


//*******LEVEL SCREEN------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------//
        levelMenuTitle = new PIXI.Text("Choose Level", {fontFamily: "Arial", fontSize: 96, fill: 0x000000, align: "center"}); //Create levelTitle text
        levelMenuTitle.x = (appWidth/2)-(levelMenuTitle.width/2); //x position
        levelMenuTitle.y = levelMenuTitle.height; //y position
        levelMenuTitle.visible = false; //Hide it
        menuContainer.addChild(levelMenuTitle); //Add to container

        //Easy level button------------------------------------------
        //Follows same logic as above
        levelMenuEasyButton = new PIXI.Graphics();
        levelMenuEasyButton.beginFill(0x00FFFF);
        levelMenuEasyButton.lineStyle(5, 0x000000);
        levelMenuEasyButton.drawRect(0, 0, 300, 150);
        levelMenuEasyButton.position.set((appWidth/2)-(levelMenuEasyButton.width/2), levelMenuTitle.y+levelMenuTitle.height+50);
        levelMenuEasyButton.interactive = true;
        levelMenuEasyButton.buttonMode = true;
        levelMenuEasyButton.on("pointertap", () => {
            level = 1; //Set level to 1 (easy)
            hideLevelMenu(); //Hide level menu
            showDifficultyMenu(); //Show difficulty menu
        });
        //Easy button text
        levelMenuEasyButtonText = new PIXI.Text("Easy", {fontFamily: "Arial", fontSize: 24, fill: 0x000000, align: "center"});
        levelMenuEasyButtonText.position.x = levelMenuEasyButton.x+(levelMenuEasyButton.width/2)-(levelMenuEasyButtonText.width/2);
        levelMenuEasyButtonText.position.y = levelMenuEasyButton.y+(levelMenuEasyButton.height/2)-(levelMenuEasyButtonText.height/2);
        levelMenuEasyButton.visible = false; //Hide it
        levelMenuEasyButtonText.visible = false; //Hide it

        //Add to container
        menuContainer.addChild(levelMenuEasyButton);
        menuContainer.addChild(levelMenuEasyButtonText);

        //Medium level button------------------------------------------
        //Follows same logic as above
        levelMenuMediumButton = new PIXI.Graphics();
        levelMenuMediumButton.beginFill(0x00FFFF);
        levelMenuMediumButton.lineStyle(5, 0x000000);
        levelMenuMediumButton.drawRect(0, 0, 300, 150);
        levelMenuMediumButton.position.set((appWidth/2)-(levelMenuMediumButton.width/2), levelMenuEasyButton.y+levelMenuEasyButton.height+50);
        levelMenuMediumButton.interactive = true;
        levelMenuMediumButton.buttonMode = true;
        levelMenuMediumButton.on("pointertap", () => {
            level = 2; //Set level to 2 (medium)
            hideLevelMenu(); //Hide level menu
            showDifficultyMenu(); //Show difficulty menu
        });
        //Medium button text
        levelMenuMediumButtonText = new PIXI.Text("Medium", {fontFamily: "Arial", fontSize: 24, fill: 0x000000, align: "center"});
        levelMenuMediumButtonText.position.x = levelMenuMediumButton.x+(levelMenuMediumButton.width/2)-(levelMenuMediumButtonText.width/2);
        levelMenuMediumButtonText.position.y = levelMenuMediumButton.y+(levelMenuMediumButton.height/2)-(levelMenuMediumButtonText.height/2);
        levelMenuMediumButton.visible = false; //Hide it
        levelMenuMediumButtonText.visible = false; //Hide it

        //Add to container
        menuContainer.addChild(levelMenuMediumButton);
        menuContainer.addChild(levelMenuMediumButtonText);

        //Hard level button------------------------------------------
        //Follows same logic as above
        levelMenuHardButton = new PIXI.Graphics();
        levelMenuHardButton.beginFill(0x00FFFF);
        levelMenuHardButton.lineStyle(5, 0x000000);
        levelMenuHardButton.drawRect(0, 0, 300, 150);
        levelMenuHardButton.position.set((appWidth/2)-(levelMenuHardButton.width/2), levelMenuMediumButton.y+levelMenuMediumButton.height+50);
        levelMenuHardButton.interactive = true;
        levelMenuHardButton.buttonMode = true;
        levelMenuHardButton.on("pointertap", () => {
            level = 3; //Set level to 3 (hard)
            hideLevelMenu(); //Hide level menu
            showDifficultyMenu(); //Show difficulty menu
        });
        //Hard button text
        levelMenuHardButtonText = new PIXI.Text("Hard", {fontFamily: "Arial", fontSize: 24, fill: 0x000000, align: "center"});
        levelMenuHardButtonText.position.x = levelMenuHardButton.x+(levelMenuHardButton.width/2)-(levelMenuHardButtonText.width/2);
        levelMenuHardButtonText.position.y = levelMenuHardButton.y+(levelMenuHardButton.height/2)-(levelMenuHardButtonText.height/2);
        levelMenuHardButton.visible = false; //Hide it
        levelMenuHardButtonText.visible = false; //Hide it

        //Add to container
        menuContainer.addChild(levelMenuHardButton);
        menuContainer.addChild(levelMenuHardButtonText);

        //Back button------------------------------------------
        //Follows same logic as above
        levelMenuBackButton = new PIXI.Graphics();
        levelMenuBackButton.beginFill(0x00FFFF);
        levelMenuBackButton.lineStyle(5, 0x000000);
        levelMenuBackButton.drawRect(0, 0, 300, 150);
        levelMenuBackButton.position.set((appWidth/2)-(levelMenuBackButton.width/2), levelMenuHardButton.y+levelMenuHardButton.height+50);
        levelMenuBackButton.interactive = true;
        levelMenuBackButton.buttonMode = true;
        levelMenuBackButton.on("pointertap", () => {
            hideLevelMenu();
            showLoggedInMenu();
            updatePlayerStats();
        });
        //Back button text
        levelMenuBackButtonText = new PIXI.Text("Back", {fontFamily: "Arial", fontSize: 24, fill: 0x000000, align: "center"});
        levelMenuBackButtonText.position.x = levelMenuBackButton.x+(levelMenuBackButton.width/2)-(levelMenuBackButtonText.width/2);
        levelMenuBackButtonText.position.y = levelMenuBackButton.y+(levelMenuBackButton.height/2)-(levelMenuBackButtonText.height/2);
        levelMenuBackButton.visible = false; //Hide it
        levelMenuBackButtonText.visible = false; //Hide it

        //Add to container
        menuContainer.addChild(levelMenuBackButton);
        menuContainer.addChild(levelMenuBackButtonText);

        //If the user is logged in
        if(loggedIn) {
            hideMainMenu(); //Hide the main menu as they do not need to log in
            showLoggedInMenu(); //Show the logged in menu so they can modify their preferences/see their progress
        }

//*******DIFFICULTY SCREEN------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------//
        difficultyMenuTitle = new PIXI.Text("Choose Difficulty", {fontFamily: "Arial", fontSize: 96, fill: 0x000000, align: "center"}); //Create difficultyTitle text
        difficultyMenuTitle.x = (appWidth/2)-(difficultyMenuTitle.width/2); //x position
        difficultyMenuTitle.y = difficultyMenuTitle.height; //y position
        difficultyMenuTitle.visible = false; //Hide it
        menuContainer.addChild(difficultyMenuTitle); //Add to container

        //Easy difficulty button------------------------------------------
        //Follows same logic as above, however when clicked it sets costs, difficulty, sets the level up, and starts the game
        difficultyMenuEasyButton = new PIXI.Graphics();
        difficultyMenuEasyButton.beginFill(0x00FFFF);
        difficultyMenuEasyButton.lineStyle(5, 0x000000);
        difficultyMenuEasyButton.drawRect(0, 0, 300, 150);
        difficultyMenuEasyButton.position.set((appWidth/2)-(difficultyMenuEasyButton.width/2), difficultyMenuTitle.y+difficultyMenuTitle.height+50);
        difficultyMenuEasyButton.interactive = true;
        difficultyMenuEasyButton.buttonMode = true;
        difficultyMenuEasyButton.on("pointertap", () => {
            difficulty = 1; //Set difficulty
            slingshotCost = Math.round(slingshotCostOriginal*easyMultiplier); //Slingshot cost
            hammerCost = Math.round(hammerCostOriginal*easyMultiplier); //Hammer cost
            bugSprayCost = Math.round(bugSprayCostOriginal*easyMultiplier); //Bug spray cost
            magnifyingGlassCost = Math.round(magnifyingGlassCostOriginal*easyMultiplier); //Magnifying glass cost
            cannonCost = Math.round(cannonCostOriginal*easyMultiplier); //Cannon cost
            honeyCost = Math.round(honeyCostOriginal*easyMultiplier); //Honey cost
            updateTowerButtonCostText(); //Update the tower cost button text
            setLevel(); //Set the level up
            hideDifficultyMenu(); //Hide the difficulty menu
            showPlayScreen(); //Show the play screen
        });
        //Easy difficulty button text
        difficultyMenuEasyButtonText = new PIXI.Text("Easy", {fontFamily: "Arial", fontSize: 24, fill: 0x000000, align: "center"});
        difficultyMenuEasyButtonText.position.x = difficultyMenuEasyButton.x+(difficultyMenuEasyButton.width/2)-(difficultyMenuEasyButtonText.width/2);
        difficultyMenuEasyButtonText.position.y = difficultyMenuEasyButton.y+(difficultyMenuEasyButton.height/2)-(levelMenuEasyButtonText.height/2);
        difficultyMenuEasyButton.visible = false; //Hide it
        difficultyMenuEasyButtonText.visible = false; //Hide it

        //Add to container
        menuContainer.addChild(difficultyMenuEasyButton);
        menuContainer.addChild(difficultyMenuEasyButtonText);

        //Medium difficulty button------------------------------------------
        //Follows same logic as above
        difficultyMenuMediumButton = new PIXI.Graphics();
        difficultyMenuMediumButton.beginFill(0x00FFFF);
        difficultyMenuMediumButton.lineStyle(5, 0x000000);
        difficultyMenuMediumButton.drawRect(0, 0, 300, 150);
        difficultyMenuMediumButton.position.set((appWidth/2)-(difficultyMenuMediumButton.width/2), difficultyMenuEasyButton.y+difficultyMenuEasyButton.height+50);
        difficultyMenuMediumButton.interactive = true;
        difficultyMenuMediumButton.buttonMode = true;
        difficultyMenuMediumButton.on("pointertap", () => {
            difficulty = 2; //Set difficulty
            slingshotCost = Math.ceil((slingshotCostOriginal*mediumMultiplier)/5)*5; //Slingshot cost
            hammerCost = Math.ceil((hammerCostOriginal*mediumMultiplier)/5)*5; //Hammer cost
            bugSprayCost = Math.ceil((bugSprayCostOriginal*mediumMultiplier)/5)*5; //Bug spray cost
            magnifyingGlassCost = Math.ceil((magnifyingGlassCostOriginal*mediumMultiplier)/5)*5; //Magnifying glass cost
            cannonCost = Math.ceil((cannonCostOriginal*mediumMultiplier)/5)*5; //Cannon cost
            honeyCost = Math.ceil((honeyCostOriginal*mediumMultiplier)/5)*5; //Honey cost
            setMediumUpgradeCosts();
            updateTowerButtonCostText();
            setLevel();
            hideDifficultyMenu();
            showPlayScreen();
        });

        //Medium difficulty button text
        difficultyMenuMediumButtonText = new PIXI.Text("Medium", {fontFamily: "Arial", fontSize: 24, fill: 0x000000, align: "center"});
        difficultyMenuMediumButtonText.position.x = difficultyMenuMediumButton.x+(difficultyMenuMediumButton.width/2)-(difficultyMenuMediumButtonText.width/2);
        difficultyMenuMediumButtonText.position.y = difficultyMenuMediumButton.y+(difficultyMenuMediumButton.height/2)-(levelMenuMediumButtonText.height/2);
        difficultyMenuMediumButton.visible = false; //Hide it
        difficultyMenuMediumButtonText.visible = false; //Hide it

        //ADd to container
        menuContainer.addChild(difficultyMenuMediumButton);
        menuContainer.addChild(difficultyMenuMediumButtonText);

        //Hard difficulty button------------------------------------------
        //Follows same logic as above
        difficultyMenuHardButton = new PIXI.Graphics();
        difficultyMenuHardButton.beginFill(0x00FFFF);
        difficultyMenuHardButton.lineStyle(5, 0x000000);
        difficultyMenuHardButton.drawRect(0, 0, 300, 150);
        difficultyMenuHardButton.position.set((appWidth/2)-(difficultyMenuHardButton.width/2), difficultyMenuMediumButton.y+difficultyMenuMediumButton.height+50);
        difficultyMenuHardButton.interactive = true;
        difficultyMenuHardButton.buttonMode = true;
        difficultyMenuHardButton.on("pointertap", () => {
            difficulty = 3;
            slingshotCost = Math.ceil((slingshotCostOriginal*hardMultiplier)/5)*5; //Slingshot cost
            hammerCost = Math.ceil((hammerCostOriginal*hardMultiplier)/5)*5; //Hammer cost
            bugSprayCost = Math.ceil((bugSprayCostOriginal*hardMultiplier)/5)*5; //Bug spray cost
            magnifyingGlassCost = Math.ceil((magnifyingGlassCostOriginal*hardMultiplier)/5)*5; //Magnifying glass cost
            cannonCost = Math.ceil((cannonCostOriginal*hardMultiplier)/5)*5; //Cannon cost
            honeyCost = Math.ceil((honeyCostOriginal*hardMultiplier)/5)*5; //Honey cost
            setHardUpgradeCosts();
            updateTowerButtonCostText();
            setLevel();
            hideDifficultyMenu();
            showPlayScreen();
        });

        //Hard difficulty button text
        difficultyMenuHardButtonText = new PIXI.Text("Hard", {fontFamily: "Arial", fontSize: 24, fill: 0x000000, align: "center"});
        difficultyMenuHardButtonText.position.x = difficultyMenuHardButton.x+(difficultyMenuHardButton.width/2)-(difficultyMenuHardButtonText.width/2);
        difficultyMenuHardButtonText.position.y = difficultyMenuHardButton.y+(difficultyMenuHardButton.height/2)-(levelMenuHardButtonText.height/2);
        difficultyMenuHardButton.visible = false; //Hide it
        difficultyMenuHardButtonText.visible = false; //Hide it

        //Add to container
        menuContainer.addChild(difficultyMenuHardButton);
        menuContainer.addChild(difficultyMenuHardButtonText);

        //Back button------------------------------------------
        //Follows same logic as above
        difficultyMenuBackButton = new PIXI.Graphics();
        difficultyMenuBackButton.beginFill(0x00FFFF);
        difficultyMenuBackButton.lineStyle(5, 0x000000);
        difficultyMenuBackButton.drawRect(0, 0, 300, 150);
        difficultyMenuBackButton.position.set((appWidth/2)-(difficultyMenuBackButton.width/2), difficultyMenuHardButton.y+difficultyMenuHardButton.height+50);
        difficultyMenuBackButton.interactive = true;
        difficultyMenuBackButton.buttonMode = true;
        difficultyMenuBackButton.on("pointertap", () => {
            hideDifficultyMenu();
            showLevelMenu();
            updatePlayerStats();
        });
        //Back button text
        difficultyMenuBackButtonText = new PIXI.Text("Back", {fontFamily: "Arial", fontSize: 24, fill: 0x000000, align: "center"});
        difficultyMenuBackButtonText.position.x = difficultyMenuBackButton.x+(difficultyMenuBackButton.width/2)-(difficultyMenuBackButtonText.width/2);
        difficultyMenuBackButtonText.position.y = difficultyMenuBackButton.y+(difficultyMenuBackButton.height/2)-(difficultyMenuBackButtonText.height/2);
        difficultyMenuBackButton.visible = false; //Hide it
        difficultyMenuBackButtonText.visible = false; //Hide it

        //Add container
        menuContainer.addChild(difficultyMenuBackButton);
        menuContainer.addChild(difficultyMenuBackButtonText);

//******Set up top bar text
        //Set up top bar Wave: #/#, Difficulty: #, Gold: ###, Health: ###
        infoText = new PIXI.Text("Wave: " + waveNumber + "          Difficulty: " + difficultyString + "          Gold: " + player.gold + "         Health: " + windmillSprite.hp + "/" + windmillSprite.totalHP, {fontFamily: "Arial", fontSize: 48, fill: 0x000000, align: "center"});
        infoText.position.x = leftBarContainer.width+((appWidth-leftBarContainer.width-mediaContainer.width)/2)-(infoText.width/2); //x position
        infoText.position.y = infoText.height/2; //y position
        topBarContainer.addChild(infoText); //Add to container

//*******Set up left bar
        //Menu button---------------------------------------------------------------------------------------------------
        menuButton = new PIXI.Graphics(); //Create graphics object
        menuButton.beginFill(0xdddddd); //Fill grey
        menuButton.lineStyle(2, 0x000000); //Black stroke
        menuButton.drawRect(0, 0, leftBarContainer.width-2, topBarContainer.height-2); //Draw it
        menuButton.position.set(0, 0); //Set position
        menuButton.interactive = true; //Make interactive
        menuButton.buttonMode = true; //Make button

        //When hovered
        menuButton.on("mouseover", () => {
            menuButton.clear(); //Clear the button
            menuButton.beginFill(0xbbbbbb); //Fill dark grey
            menuButton.lineStyle(2, 0x000000); //Black stroke
            menuButton.drawRect(0, 0, leftBarContainer.width-2, topBarContainer.height-2); //Draw it
            hideToolTip(); //Hide tooltip
        });

        //When mouse leaves button
        menuButton.on("mouseout", () => {
            menuButton.clear(); //Clear the button
            menuButton.beginFill(0xdddddd); //Fill light grey
            menuButton.lineStyle(2, 0x000000); //Black stroke
            menuButton.drawRect(0, 0, leftBarContainer.width-2, topBarContainer.height-2); //Draw it
        });

        //When clicked
        menuButton.on("pointertap", () => {
            overlayMenuClick(); //Call menuClick() to open the menu
        });

        //Menu button text
        menuButtonText = new PIXI.Text("Menu", {fontFamily: "Arial", fontSize: 48, fill: 0x000000, align: "center"}); //Create text
        menuButtonText.position.x = (leftBarContainer.width/2)-(menuButtonText.width/2); //Set x position so it is in the middle of the left bar
        menuButtonText.position.y = topBarContainer.height/2 - menuButtonText.height/2; //Set y position so it is in the middle of the top bar
        leftBarContainer.addChild(menuButton); //Add to container
        leftBarContainer.addChild(menuButtonText); //Add to container

        //Slingshot button----------------------------------------------------------------------------------------------
        //Slingshot button
        slingshotButton = new PIXI.Graphics(); //Create graphics object
        slingshotButton.beginFill(0xdddddd); //Fill grey
        slingshotButton.lineStyle(2, 0x000000); //Black stroke
        slingshotButton.drawRect(0, 0, leftBarContainer.width-2, 140); //Draw it
        slingshotButton.position.set(0,topBarContainer.height-2); //Set position
        slingshotButton.interactive = true; //Make interactive
        slingshotButton.buttonMode = true; //Make button

        //When hovered
        slingshotButton.on("mouseover", () => {
            slingshotButton.clear(); //Clear the button
            slingshotButton.beginFill(0xbbbbbb); //Fill dark grey
            slingshotButton.lineStyle(2, 0x000000); //Black stroke
            slingshotButton.drawRect(0, 0, leftBarContainer.width-2, 140); //Draw it
            updateToolTip("Buy slingshot tower\n("+slingshotCost+" gold)"); //Update tooltip text
            showToolTip(); //Show tooltip
        });

        //When mouse leaves button
        slingshotButton.on("mouseout", () => {
            slingshotButton.clear(); //Clear the button
            slingshotButton.beginFill(0xdddddd); //Fill light grey
            slingshotButton.lineStyle(2, 0x000000); //Black stroke
            slingshotButton.drawRect(0, 0, leftBarContainer.width-2, 140); //Draw it
        });

        //When clicked
        slingshotButton.on("pointertap", () => {
            addSlingshot(); //Call add slingshot, buys a slingshot and lets user place it
        });

        //Slingshot text
        slingshotText = new PIXI.Text("Slingshot", {fontFamily: "Arial", fontSize: 24, fill: 0x000000, align: "center"}); //Initialize text
        slingshotText.position.x = (leftBarContainer.width/2)-(slingshotText.width/2); //Set x position
        slingshotText.position.y = slingshotButton.y+slingshotButton.height-slingshotText.height-5; //Set y position

        //Slingshot cost text
        slingshotCostText = new PIXI.Text(slingshotCost + " gold", {fontFamily: "Arial", fontSize: 18, fill: 0x000000, align: "center"}); //Initialize text
        slingshotCostText.position.x = (leftBarContainer.width/2)-(slingshotCostText.width/2); //Set x position
        slingshotCostText.position.y = slingshotButton.y+5; //Set y position

        //Add button and texts to container
        leftBarContainer.addChild(slingshotButton);
        leftBarContainer.addChild(slingshotCostText);
        leftBarContainer.addChild(slingshotText);

        //Hammer button - Follows same logic as above-------------------------------------------------------------------
        //Hammer button
        hammerButton = new PIXI.Graphics();
        hammerButton.beginFill(0xdddddd);
        hammerButton.lineStyle(2, 0x000000);
        hammerButton.drawRect(0, 0, leftBarContainer.width-2, 140);
        hammerButton.position.set(0,slingshotButton.y+slingshotButton.height-2);
        hammerButton.interactive = true;
        hammerButton.buttonMode = true;
        hammerButton.on("mouseover", () => {
            hammerButton.clear();
            hammerButton.beginFill(0xbbbbbb);
            hammerButton.lineStyle(2, 0x000000);
            hammerButton.drawRect(0, 0, leftBarContainer.width-2, 140);
            updateToolTip("Buy hammer tower\n("+hammerCost+" gold)"); //Update tooltip text
            showToolTip(); //Show tooltip
        });
        hammerButton.on("mouseout", () => {
            hammerButton.clear();
            hammerButton.beginFill(0xdddddd);
            hammerButton.lineStyle(2, 0x000000);
            hammerButton.drawRect(0, 0, leftBarContainer.width-2, 140);
        });
        hammerButton.on("pointertap", () => {
            addHammer();
        });

        //Hammer text
        hammerText = new PIXI.Text("Hammer", {fontFamily: "Arial", fontSize: 24, fill: 0x000000, align: "center"});
        hammerText.position.x = (leftBarContainer.width/2)-(hammerText.width/2);
        hammerText.position.y = hammerButton.y+hammerButton.height-hammerText.height-5;

        //Hammer cost text
        hammerCostText = new PIXI.Text(hammerCost + " gold", {fontFamily: "Arial", fontSize: 18, fill: 0x000000, align: "center"});
        hammerCostText.position.x = (leftBarContainer.width/2)-(hammerCostText.width/2);
        hammerCostText.position.y = hammerButton.y+5;

        leftBarContainer.addChild(hammerButton);
        leftBarContainer.addChild(hammerCostText);
        leftBarContainer.addChild(hammerText);

        //Bug Spray button - Follows same logic as above----------------------------------------------------------------
        //Bug Spray button
        bugSprayButton = new PIXI.Graphics();
        bugSprayButton.beginFill(0xdddddd);
        bugSprayButton.lineStyle(2, 0x000000);
        bugSprayButton.drawRect(0, 0, leftBarContainer.width-2, 140);
        bugSprayButton.position.set(0, hammerButton.y+hammerButton.height-2);
        bugSprayButton.interactive = true;
        bugSprayButton.buttonMode = true;
        bugSprayButton.on("mouseover", () => {
            bugSprayButton.clear();
            bugSprayButton.beginFill(0xbbbbbb);
            bugSprayButton.lineStyle(2, 0x000000);
            bugSprayButton.drawRect(0, 0, leftBarContainer.width-2, 140);
            updateToolTip("Buy bug spray tower\n("+bugSprayCost+" gold)"); //Update tooltip text
            showToolTip(); //Show tooltip
        });
        bugSprayButton.on("mouseout", () => {
            bugSprayButton.clear();
            bugSprayButton.beginFill(0xdddddd);
            bugSprayButton.lineStyle(2, 0x000000);
            bugSprayButton.drawRect(0, 0, leftBarContainer.width-2, 140);
        });
        bugSprayButton.on("pointertap", () => {
            addBugSpray();
        });

        //Bug Spray text
        bugSprayText = new PIXI.Text("Bug Spray", {fontFamily: "Arial", fontSize: 24, fill: 0x000000, align: "center"});
        bugSprayText.position.x = (leftBarContainer.width/2)-(bugSprayText.width/2);
        bugSprayText.position.y = bugSprayButton.y+bugSprayButton.height-bugSprayText.height-5;

        //Bug Spray cost text
        bugSprayCostText = new PIXI.Text(bugSprayCost + " gold", {fontFamily: "Arial", fontSize: 18, fill: 0x000000, align: "center"});
        bugSprayCostText.position.x = (leftBarContainer.width/2)-(bugSprayCostText.width/2);
        bugSprayCostText.position.y = bugSprayButton.y+5;

        leftBarContainer.addChild(bugSprayButton);
        leftBarContainer.addChild(bugSprayCostText);
        leftBarContainer.addChild(bugSprayText);

        //Magnifying Glass button - Follows same logic as above---------------------------------------------------------
        //Magnifying Glass button
        magnifyingGlassButton = new PIXI.Graphics();
        magnifyingGlassButton.beginFill(0xdddddd);
        magnifyingGlassButton.lineStyle(2, 0x000000);
        magnifyingGlassButton.drawRect(0, 0, leftBarContainer.width-2, 140);
        magnifyingGlassButton.position.set(0, bugSprayButton.y+bugSprayButton.height-2);
        magnifyingGlassButton.interactive = true;
        magnifyingGlassButton.buttonMode = true;
        magnifyingGlassButton.on("mouseover", () => {
            magnifyingGlassButton.clear();
            magnifyingGlassButton.beginFill(0xbbbbbb);
            magnifyingGlassButton.lineStyle(2, 0x000000);
            magnifyingGlassButton.drawRect(0, 0, leftBarContainer.width-2, 140);
            updateToolTip("Buy magnifying glass tower\n("+magnifyingGlassCost+" gold)"); //Update tooltip text
            showToolTip(); //Show tooltip
        });
        magnifyingGlassButton.on("mouseout", () => {
            magnifyingGlassButton.clear();
            magnifyingGlassButton.beginFill(0xdddddd);
            magnifyingGlassButton.lineStyle(2, 0x000000);
            magnifyingGlassButton.drawRect(0, 0, leftBarContainer.width-2, 140);
        });
        magnifyingGlassButton.on("pointertap", () => {
            addMagnifyingGlass();
        });

        //Magnifying Glass text
        magnifyingGlassText = new PIXI.Text("Magnifying Glass", {fontFamily: "Arial", fontSize: 24, fill: 0x000000, align: "center"});
        magnifyingGlassText.position.x = (leftBarContainer.width/2)-(magnifyingGlassText.width/2);
        magnifyingGlassText.position.y = magnifyingGlassButton.y+magnifyingGlassButton.height-magnifyingGlassText.height-5;

        //Magnifying Glass cost text
        magnifyingGlassCostText = new PIXI.Text(magnifyingGlassCost + " gold", {fontFamily: "Arial", fontSize: 18, fill: 0x000000, align: "center"});
        magnifyingGlassCostText.position.x = (leftBarContainer.width/2)-(magnifyingGlassCostText.width/2);
        magnifyingGlassCostText.position.y = magnifyingGlassButton.y+5;

        leftBarContainer.addChild(magnifyingGlassButton);
        leftBarContainer.addChild(magnifyingGlassCostText);
        leftBarContainer.addChild(magnifyingGlassText);

        //Cannon button - Follows same logic as above-------------------------------------------------------------------
        //Cannon button
        cannonButton = new PIXI.Graphics();
        cannonButton.beginFill(0xdddddd);
        cannonButton.lineStyle(2, 0x000000);
        cannonButton.drawRect(0, 0, leftBarContainer.width-2, 140);
        cannonButton.position.set(0, magnifyingGlassButton.y+magnifyingGlassButton.height-2);
        cannonButton.interactive = true;
        cannonButton.buttonMode = true;
        cannonButton.on("mouseover", () => {
            cannonButton.clear();
            cannonButton.beginFill(0xbbbbbb);
            cannonButton.lineStyle(2, 0x000000);
            cannonButton.drawRect(0, 0, leftBarContainer.width-2, 140);
            updateToolTip("Buy cannon tower\n("+cannonCost+" gold)"); //Update tooltip text
            showToolTip(); //Show tooltip
        });
        cannonButton.on("mouseout", () => {
            cannonButton.clear();
            cannonButton.beginFill(0xdddddd);
            cannonButton.lineStyle(2, 0x000000);
            cannonButton.drawRect(0, 0, leftBarContainer.width-2, 140);
        });
        cannonButton.on("pointertap", () => {
            addCannon();
        });

        //Cannon text
        cannonText = new PIXI.Text("Cannon", {fontFamily: "Arial", fontSize: 24, fill: 0x000000, align: "center"});
        cannonText.position.x = (leftBarContainer.width/2)-(cannonText.width/2);
        cannonText.position.y = cannonButton.y+cannonButton.height-cannonText.height-5;

        //Cannon cost text
        cannonCostText = new PIXI.Text(cannonCost + " gold", {fontFamily: "Arial", fontSize: 18, fill: 0x000000, align: "center"});
        cannonCostText.position.x = (leftBarContainer.width/2)-(cannonCostText.width/2);
        cannonCostText.position.y = cannonButton.y+5;

        leftBarContainer.addChild(cannonButton);
        leftBarContainer.addChild(cannonCostText);
        leftBarContainer.addChild(cannonText);

        //Honey button - Follows same logic as above--------------------------------------------------------------------
        //Honey button
        honeyButton = new PIXI.Graphics();
        honeyButton.beginFill(0xdddddd);
        honeyButton.lineStyle(2, 0x000000);
        honeyButton.drawRect(0, 0, leftBarContainer.width-2, 140);
        honeyButton.position.set(0, cannonButton.y+cannonButton.height-2);
        honeyButton.interactive = true;
        honeyButton.buttonMode = true;
        honeyButton.on("mouseover", () => {
            honeyButton.clear();
            honeyButton.beginFill(0xbbbbbb);
            honeyButton.lineStyle(2, 0x000000);
            honeyButton.drawRect(0, 0, leftBarContainer.width-2, 140);
            updateToolTip("Buy honey tower\n("+honeyCost+" gold)"); //Update tooltip text
            showToolTip(); //Show tooltip
        });
        honeyButton.on("mouseout", () => {
            honeyButton.clear();
            honeyButton.beginFill(0xdddddd);
            honeyButton.lineStyle(2, 0x000000);
            honeyButton.drawRect(0, 0, leftBarContainer.width-2, 140);
        });
        honeyButton.on("pointertap", () => {
            addHoney();
        });

        //Honey text
        honeyText = new PIXI.Text("Honey", {fontFamily: "Arial", fontSize: 24, fill: 0x000000, align: "center"});
        honeyText.position.x = (leftBarContainer.width/2)-(honeyText.width/2);
        honeyText.position.y = honeyButton.y+honeyButton.height-honeyText.height-5;

        //Honey cost text
        honeyCostText = new PIXI.Text(honeyCost + " gold", {fontFamily: "Arial", fontSize: 18, fill: 0x000000, align: "center"});
        honeyCostText.position.x = (leftBarContainer.width/2)-(honeyCostText.width/2);
        honeyCostText.position.y = honeyButton.y+5;

        leftBarContainer.addChild(honeyButton);
        leftBarContainer.addChild(honeyCostText);
        leftBarContainer.addChild(honeyText);

        //Multi button - Follows same logic as above--------------------------------------------------------------------
        //Multibutton
        multiButton = new PIXI.Graphics();
        multiButton.beginFill(0x70ff70);
        multiButton.lineStyle(2, 0x000000);
        multiButton.drawRect(0, 0, leftBarContainer.width-2, 100);
        multiButton.position.set(0, honeyButton.y+honeyButton.height-2);
        multiButton.interactive = true;
        multiButton.buttonMode = true;
        multiButton.on("mouseover", () => {
            multiButton.clear();
            multiButton.beginFill(0xafffaf);
            multiButton.lineStyle(2, 0x000000);
            multiButton.drawRect(0, 0, leftBarContainer.width-2, 100);
            hideToolTip(); //Hide tooltip
        });
        multiButton.on("mouseout", () => {
            multiButton.clear();
            multiButton.beginFill(0x70ff70);
            multiButton.lineStyle(2, 0x000000);
            multiButton.drawRect(0, 0, leftBarContainer.width-2, 100);
        });
        multiButton.on("pointertap", () => {
            multiButton.clear();
            multiButton.beginFill(0xbbbbbb);
            multiButton.lineStyle(2, 0x000000);
            multiButton.drawRect(0, 0, leftBarContainer.width-2, 100);
            startGame(); //Start the game
        });

        //Multibutton text
        multiText = new PIXI.Text("Start", {fontFamily: "Arial", fontSize: 24, fill: 0x000000, align: "center"});
        multiText.position.x = (leftBarContainer.width/2)-(multiText.width/2);
        multiText.position.y = multiButton.y+multiButton.height-multiText.height-5;

        //Play symbol
        playSymbol = new PIXI.Graphics(); //Create graphics object
        playSymbol.lineStyle(5, 0x000000, 1); //Black line
        playSymbol.moveTo(0, 50); //Set start vertex
        playSymbol.lineTo(50,25); //Draw to first point
        playSymbol.lineTo(0, 0); //Draw to second point
        playSymbol.lineTo(0,50); //Close the triangle
        playSymbol.x = (leftBarContainer.width/2)-(playSymbol.width/2)+9; //x position
        playSymbol.y = (multiButton.y+(multiButton.height-multiText.height)/2)-(playSymbol.height/2); //y position

        //Pause symbol
        pauseSymbol = new PIXI.Graphics(); //Create graphics object
        pauseSymbol.lineStyle(15, 0x000000, 1); //Thick black line
        pauseSymbol.moveTo(0, 50); //Set start vertex
        pauseSymbol.lineTo(0, 0); //Draw to point
        pauseSymbol.moveTo(25,0); //Set start vertex
        pauseSymbol.lineTo(25,50); //Draw to point
        pauseSymbol.x = (leftBarContainer.width/2)-(pauseSymbol.width/2)+9; //x position
        pauseSymbol.y = (multiButton.y+(multiButton.height-multiText.height)/2)-(playSymbol.height/2); //y position
        pauseSymbol.visible = false; //Hide it //Hide it

        //Add button, text, and symbols to container
        leftBarContainer.addChild(multiButton);
        leftBarContainer.addChild(multiText);
        leftBarContainer.addChild(playSymbol);
        leftBarContainer.addChild(pauseSymbol);

        //Speed button - Follows same logic as above--------------------------------------------------------------------
        //Speed button
        speedButton = new PIXI.Graphics();
        speedButton.beginFill(0xdddddd);
        speedButton.lineStyle(2, 0x000000);
        speedButton.drawRect(0, 0, leftBarContainer.width-2, 32);
        speedButton.position.set(0, multiButton.y+multiButton.height-2);
        speedButton.interactive = true;
        speedButton.buttonMode = true;
        speedButton.on("mouseover", () => {
            speedButton.clear();
            speedButton.beginFill(0xbbbbbb);
            speedButton.lineStyle(2, 0x000000);
            speedButton.drawRect(0, 0, leftBarContainer.width-2, 32);
            //If at speed 1
            if(speedUp === 1) {
                updateToolTip("Speed up"); //Update tooltip
            }
            //If at speed 2
            else if(speedUp === 2) {
                updateToolTip("Speed up"); //Update tooltip
            }
            //If at speed 3
            else if(speedUp === 3) {
                updateToolTip("Slow down"); //Update tooltip
            }
            showToolTip(); //Show tooltip
        });
        speedButton.on("mouseout", () => {
            speedButton.clear();
            speedButton.beginFill(0xdddddd);
            speedButton.lineStyle(2, 0x000000);
            speedButton.drawRect(0, 0, leftBarContainer.width-2, 32);
        });
        speedButton.on("pointertap", () => {
            changeSpeed(); //Change the speed
            //If at speed 1
            if(speedUp === 1) {
                updateToolTip("Speed up"); //Update tooltip
            }
            //If at speed 2
            else if(speedUp === 2) {
                updateToolTip("Speed up"); //Update tooltip
            }
            //If at speed 3
            else if(speedUp === 3) {
                updateToolTip("Slow down"); //Update tooltip
            }
        });

        //Speed text
        speedText = new PIXI.Text("Speed: x" + speedUp, {fontFamily: "Arial", fontSize: 24, fill: 0x000000, align: "center"});
        speedText.position.x = (leftBarContainer.width/2)-(speedText.width/2);
        speedText.position.y = speedButton.y+(speedButton.height/2)-(speedText.height/2);

        //Add to container
        leftBarContainer.addChild(speedButton);
        leftBarContainer.addChild(speedText);

        //Sell button - Follows same logic as above-------------------------------------------------------------------
        //Sell text
        sellText = new PIXI.Text("CANCEL", {fontFamily: "Arial", fontSize: 24, fill: 0x000000, align: "center"});
        sellText.position.x = (leftBarContainer.width/2)-(sellText.width/2);
        sellText.position.y = (slingshotButton.y+(appHeight-slingshotButton.y)/2) - (sellText.height/2);

        //Sell button
        sellButton = new PIXI.Graphics();
        sellButton.beginFill(0xdddddd);
        sellButton.lineStyle(2, 0x000000);
        sellButton.drawRect(0, topBarContainer.height-2, leftBarContainer.width-2, appHeight);
        sellButton.interactive = true;
        sellButton.buttonMode = true;
        sellButton.on("mouseover", () => {
            sellButton.clear();
            sellButton.beginFill(0xbbbbbb);
            sellButton.lineStyle(2, 0x000000);
            sellButton.drawRect(0, topBarContainer.height-2, leftBarContainer.width-2, appHeight);
            hideToolTip(); //Hide tooltip
        });
        sellButton.on("mouseout", () => {
            sellButton.clear();
            sellButton.beginFill(0xdddddd);
            sellButton.lineStyle(2, 0x000000);
            sellButton.drawRect(0, topBarContainer.height-2, leftBarContainer.width-2, appHeight);
        });
        sellButton.on("pointertap", () => {
            sellTower(); //Sell the tower
            hideSellButton(); //Hide the sell button
        });
        sellButton.visible = false; //Hide it
        sellText.visible = false; //Hide it

        //Add to container
        leftBarContainer.addChild(sellButton);
        leftBarContainer.addChild(sellText);

        //Add button images
        slingshotButtonSprite = new Tower(1, {x: 0, y: 0}, leftBarTowerSpritesContainer); //Create slingshot button image sprite
        hammerButtonSprite = new Tower(2, {x: 0, y: 0}, leftBarTowerSpritesContainer); //Create hammer button image sprite
        bugSprayButtonSprite = new Tower(3, {x: 0, y: 0}, leftBarTowerSpritesContainer); //Create bug spray button image sprite
        magnifyingGlassButtonSprite = new Tower(4, {x: 0, y: 0}, leftBarTowerSpritesContainer); //Create magnifying glass button image sprite
        cannonButtonSprite = new Tower(5, {x: 0, y: 0}, leftBarTowerSpritesContainer); //Create cannon button image sprite
        honeyButtonSprite = new Tower(6, {x: 0, y: 0}, leftBarTowerSpritesContainer); //Create honey button image sprite

        //Set sizes
        slingshotButtonSprite.sprite1.width *= 0.5;
        slingshotButtonSprite.sprite2.width *= 0.5;
        slingshotButtonSprite.sprite3.width *= 0.5;
        slingshotButtonSprite.sprite1.height *= 0.5;
        slingshotButtonSprite.sprite2.height *= 0.5;
        slingshotButtonSprite.sprite3.height *= 0.5;
        hammerButtonSprite.sprite1.width *= 0.5;
        hammerButtonSprite.sprite2.width *= 0.5;
        hammerButtonSprite.sprite1.height *= 0.5;
        hammerButtonSprite.sprite2.height *= 0.5;
        bugSprayButtonSprite.sprite1.width *= 0.5;
        bugSprayButtonSprite.sprite2.width *= 0.5;
        bugSprayButtonSprite.sprite1.height *= 0.5;
        bugSprayButtonSprite.sprite2.height *= 0.5;
        magnifyingGlassButtonSprite.sprite1.width *= 0.5;
        magnifyingGlassButtonSprite.sprite2.width *= 0.5;
        magnifyingGlassButtonSprite.sprite1.height *= 0.5;
        magnifyingGlassButtonSprite.sprite2.height *= 0.5;
        cannonButtonSprite.sprite1.width *= 0.5;
        cannonButtonSprite.sprite2.width *= 0.5;
        cannonButtonSprite.sprite1.height *= 0.5;
        cannonButtonSprite.sprite2.height *= 0.5;
        honeyButtonSprite.sprite1.width *= 0.5;
        honeyButtonSprite.sprite2.width *= 0.5;
        honeyButtonSprite.sprite1.height *= 0.5;
        honeyButtonSprite.sprite2.height *= 0.5;

        //Set positions
        slingshotButtonSprite.setPosition(leftBarContainer.width/2, slingshotButton.y+(slingshotButton.height/2));
        hammerButtonSprite.setPosition(leftBarContainer.width/2, hammerButton.y+(hammerButton.height/2));
        bugSprayButtonSprite.setPosition(leftBarContainer.width/2, bugSprayButton.y+(bugSprayButton.height/2));
        magnifyingGlassButtonSprite.setPosition(leftBarContainer.width/2, magnifyingGlassButton.y+(magnifyingGlassButton.height/2));
        cannonButtonSprite.setPosition(leftBarContainer.width/2, cannonButton.y+(cannonButton.height/2));
        honeyButtonSprite.setPosition(leftBarContainer.width/2, honeyButton.y+(honeyButton.height/2));

//*******Game over menu-------------------------------------------------------------------------------------------------------------------------------
        //LOST
        //Create title
        lostTitle = new PIXI.Text("You lost!", {fontFamily: "Arial", fontSize: 96, fill: 0x000000, align: "center"});
        lostTitle.x = (appWidth / 2) - (lostTitle.width / 2); //x pos
        lostTitle.y = (appHeight / 2) - (lostTitle.height / 2) - 250; //y pos

        //Create description - Same logic as above
        lostDescription = new PIXI.Text("Would you like to play again?", {
            fontFamily: "Arial",
            fontSize: 24,
            fill: 0x000000,
            align: "center",
            wordWrap: "true",
            wordWrapWidth: "100"
        });

        //Set position
        lostDescription.x = (appWidth / 2) - (lostDescription.width / 2);
        lostDescription.y = (appHeight / 2) - (lostDescription.height / 2);

        //Quit button------------------------------------------
        lostQuitButton = new PIXI.Graphics(); //Create graphics object
        lostQuitButton.beginFill(0x00FFFF); //Fill blue
        lostQuitButton.lineStyle(5, 0x000000); //Black stroke
        lostQuitButton.drawRect((appWidth / 2) - 150, appHeight - 200, 300, 150); //Draw it
        lostQuitButton.interactive = true; //Make interactive
        lostQuitButton.buttonMode = true; //Make button

        //When clicked
        lostQuitButton.on("pointertap", () => {
            resetGame(); //Reset the game
        });

        //Play button text
        lostQuitButtonText = new PIXI.Text("Quit", {fontFamily: "Arial", fontSize: 24, fill: 0x000000, align: "center"});
        lostQuitButtonText.position.x = (appWidth / 2) - (lostQuitButtonText.width / 2); //x pos
        lostQuitButtonText.position.y = (appHeight - 200) + 75 - (lostQuitButtonText.height / 2); //y pos

        lostTitle.visible = false; //Hide it
        lostDescription.visible = false; //Hide it
        lostQuitButton.visible = false; //Hide it
        lostQuitButtonText.visible = false; //Hide it

        //Add to container
        menuContainer.addChild(lostTitle);
        menuContainer.addChild(lostDescription);
        menuContainer.addChild(lostQuitButton);
        menuContainer.addChild(lostQuitButtonText);

        //WON
        //Create title
        gameWonTitle = new PIXI.Text("You won!", {fontFamily: "Arial", fontSize: 96, fill: 0x000000, align: "center"});
        gameWonTitle.x = (appWidth / 2) - (gameWonTitle.width / 2); //x pos
        gameWonTitle.y = (appHeight / 2) - (gameWonTitle.height / 2) - 250; //y pos

        //Create description - Same logic as above
        gameWonDescription = new PIXI.Text("Would you like to continue?\nWarning: it gets VERY hard", {
            fontFamily: "Arial",
            fontSize: 24,
            fill: 0x000000,
            align: "center",
            wordWrap: "true",
            wordWrapWidth: "100"
        });

        //Set position
        gameWonDescription.x = (appWidth / 2) - (gameWonDescription.width / 2);
        gameWonDescription.y = (appHeight / 2) - (gameWonDescription.height / 2);

        //Quit button------------------------------------------
        gameWonQuitButton = new PIXI.Graphics(); //Create graphics object
        gameWonQuitButton.beginFill(0x00FFFF); //Fill blue
        gameWonQuitButton.lineStyle(5, 0x000000); //Black stroke
        gameWonQuitButton.drawRect(0, 0, 300, 150); //Draw it
        gameWonQuitButton.position.set((appWidth/2)-(gameWonQuitButton.width/2), appHeight-gameWonQuitButton.height-50);
        gameWonQuitButton.interactive = true; //Make interactive
        gameWonQuitButton.buttonMode = true; //Make button

        //When clicked
        gameWonQuitButton.on("pointertap", () => {
            resetGame(); //Reset the game
        });

        //Play button text
        gameWonQuitButtonText = new PIXI.Text("Quit", {fontFamily: "Arial", fontSize: 24, fill: 0x000000, align: "center"});
        gameWonQuitButtonText.position.x = gameWonQuitButton.x+(gameWonQuitButton.width/2)-(gameWonQuitButtonText.width/2); //x pos
        gameWonQuitButtonText.position.y = gameWonQuitButton.y+(gameWonQuitButton.height/2)-(gameWonQuitButtonText.height/2); //y pos

        gameWonTitle.visible = false; //Hide it
        gameWonDescription.visible = false; //Hide it
        gameWonQuitButton.visible = false; //Hide it
        gameWonQuitButtonText.visible = false; //Hide it

        //Continue button------------------------------------------
        gameWonContinueButton = new PIXI.Graphics(); //Create graphics object
        gameWonContinueButton.beginFill(0x00FFFF); //Fill blue
        gameWonContinueButton.lineStyle(5, 0x000000); //Black stroke
        gameWonContinueButton.drawRect(0, 0, 300, 150); //Draw it
        gameWonContinueButton.position.set(gameWonQuitButton.x, gameWonQuitButton.y-gameWonContinueButton.height-50);
        gameWonContinueButton.interactive = true; //Make interactive
        gameWonContinueButton.buttonMode = true; //Make button

        //When clicked
        gameWonContinueButton.on("pointertap", () => {
            hideWinMenu();
            //Hide the play area
            levelContainerBG.visible = true; //Hide it
            waveContainer.visible = true; //Hide it
            towersContainer.visible = true; //Hide it
            projectileContainer.visible = true; //Hide it
            windmillContainer.visible = true; //Hide it
            levelContainerFG.visible = true; //Hide it
            leftBarContainer.visible = true; //Hide it
            leftBarTowerSpritesContainer.visible = true; //Hide it
            topBarContainer.visible = true; //Hide it
        });

        //Play button text
        gameWonContinueButtonText = new PIXI.Text("Continue", {fontFamily: "Arial", fontSize: 24, fill: 0x000000, align: "center"});
        gameWonContinueButtonText.position.x = gameWonContinueButton.x+(gameWonContinueButton.width/2)-(gameWonContinueButtonText.width/2); //x pos
        gameWonContinueButtonText.position.y = gameWonContinueButton.y+(gameWonContinueButton.height/2)-(gameWonContinueButtonText.height/2); //y pos

        gameWonContinueButton.visible = false; //Hide it
        gameWonContinueButtonText.visible = false; //Hide it

        //Add to container
        menuContainer.addChild(gameWonTitle);
        menuContainer.addChild(gameWonDescription);
        menuContainer.addChild(gameWonQuitButton);
        menuContainer.addChild(gameWonQuitButtonText);
        menuContainer.addChild(gameWonContinueButton);
        menuContainer.addChild(gameWonContinueButtonText);

        //Overlay menu---------------------------------------------------------------------------------------------------------------------------------------------
        overlayMenuBG = new PIXI.Graphics(); //Create overlay menu background
        overlayMenuBG.beginFill(0xFFFFFF); //Fill white
        overlayMenuBG.lineStyle(2, 0x000000); //Black stroke
        overlayMenuBG.drawRect(0, 0, appWidth*.25, appHeight*.50); //Draw it
        overlayMenuBG.position.set((appWidth/2)-(overlayMenuBG.width/2), topBarContainer.height+((leftBarContainer.height-topBarContainer.height)/2)-(overlayMenuBG.height/2)); //Center over play area

        overlayMenuTitle = new PIXI.Text("Menu", {fontFamily: "Arial", fontSize: 48, fill: 0x000000, align: "center"});
        overlayMenuTitle.position.x = (overlayMenuBG.x+(overlayMenuBG.width/2)-(overlayMenuTitle.width/2));
        overlayMenuTitle.position.y = overlayMenuBG.y+5;

        overlayMenuQuitButton = new PIXI.Graphics(); //Create quit button
        overlayMenuQuitButton.beginFill(0xdddddd); //Fill light gray
        overlayMenuQuitButton.lineStyle(2, 0x000000); //Black stroke
        overlayMenuQuitButton.drawRect(0, 0, difficultyMenuEasyButton.width, difficultyMenuEasyButton.height); //Draw it
        overlayMenuQuitButton.position.set(overlayMenuBG.x+(overlayMenuBG.width/2)-(overlayMenuQuitButton.width/2), overlayMenuBG.y+(overlayMenuBG.height/2)-(overlayMenuQuitButton.height/2)); //Place it
        overlayMenuQuitButton.interactive = true; //Make interactive
        overlayMenuQuitButton.buttonMode = true; //Make it a button

        //When hovered
        overlayMenuQuitButton.on("mouseover", () => {
            overlayMenuQuitButton.clear(); //Clear button
            overlayMenuQuitButton.beginFill(0xbbbbbb); //Fill dark gray
            overlayMenuQuitButton.lineStyle(2, 0x000000); //Black stroke
            overlayMenuQuitButton.drawRect(0, 0, difficultyMenuEasyButton.width, difficultyMenuEasyButton.height); //Draw it
        });

        //When mouse leaves button
        overlayMenuQuitButton.on("mouseout", () => {
            overlayMenuQuitButton.clear(); //Clear button
            overlayMenuQuitButton.beginFill(0xdddddd); //Fill light gray
            overlayMenuQuitButton.lineStyle(2, 0x000000); //Black stroke
            overlayMenuQuitButton.drawRect(0, 0, difficultyMenuEasyButton.width, difficultyMenuEasyButton.height); //Draw it
        });

        //When clicked
        overlayMenuQuitButton.on("pointertap", () => {
            quitGame(); //Quit the game
        });

        //Overlay button text
        overlayMenuQuitButtonText = new PIXI.Text("Quit", {fontFamily: "Arial", fontSize: 48, fill: 0x000000, align: "center"});
        overlayMenuQuitButtonText.position.x = (overlayMenuQuitButton.x+(overlayMenuQuitButton.width/2)-(overlayMenuQuitButtonText.width/2));
        overlayMenuQuitButtonText.position.y = (overlayMenuQuitButton.y)+(overlayMenuQuitButton.height/2)-(overlayMenuQuitButtonText.height/2);

        overlayMenuContainer.visible = false; //Hide it

        //Add to container
        overlayMenuContainer.addChild(overlayMenuBG);
        overlayMenuContainer.addChild(overlayMenuTitle);
        overlayMenuContainer.addChild(overlayMenuQuitButton);
        overlayMenuContainer.addChild(overlayMenuQuitButtonText);

//*******INFO BAR--------------------------------------------------------------------------------------------------------------------------------
        //Info bar BG
        infoBarContainerBG = new PIXI.Graphics(); //Create graphics object
        infoBarContainerBG.beginFill(0xdddddd); //Fill grey
        infoBarContainerBG.lineStyle(2, 0x000000); //Black stroke
        infoBarContainerBG.drawRect(0, 0, leftBarContainer.width-2, appHeight-topBarContainer.height); //Draw it
        infoBarContainerBG.position.set(0,topBarContainer.height-2); //Set position
        infoBarContainer.addChild(infoBarContainerBG);

        //Info bar sell button
        infoSellButton = new PIXI.Graphics(); //Create graphics object
        infoSellButton.beginFill(0xdddddd); //Fill grey
        infoSellButton.lineStyle(2, 0x000000); //Black stroke
        infoSellButton.drawRect(0, 0, leftBarContainer.width-2, 140); //Draw it
        infoSellButton.position.set(0,topBarContainer.height-2); //Set position
        infoSellButton.interactive = true; //Make interactive
        infoSellButton.buttonMode = true; //Make button

        //When hovered
        infoSellButton.on("mouseover", () => {
            infoSellButton.clear(); //Clear the button
            infoSellButton.beginFill(0xbbbbbb); //Fill dark grey
            infoSellButton.lineStyle(2, 0x000000); //Black stroke
            infoSellButton.drawRect(0, 0, leftBarContainer.width-2, 140); //Draw it
        });

        //When mouse leaves button
        infoSellButton.on("mouseout", () => {
            infoSellButton.clear(); //Clear the button
            infoSellButton.beginFill(0xdddddd); //Fill light grey
            infoSellButton.lineStyle(2, 0x000000); //Black stroke
            infoSellButton.drawRect(0, 0, leftBarContainer.width-2, 140); //Draw it
        });

        //When clicked
        infoSellButton.on("pointertap", () => {
            sellTower(); //Call add slingshot, buys a slingshot and lets user place it
        });

        //Sell button text - Same logic as above
        infoSellText = new PIXI.Text("SELL", {fontFamily: "Arial", fontSize: 24, fill: 0x000000, align: "center"});
        infoSellText.position.x = (leftBarContainer.width/2)-(infoSellText.width/2);
        infoSellText.position.y = infoSellButton.y+infoSellButton.height-infoSellText.height-5;

        //Current tower text - Same logic as above
        currentTowerText = new PIXI.Text("Slingshot", {fontFamily: "Arial", fontSize: 24, fill: 0x000000, align: "center"});
        currentTowerText.position.x = (leftBarContainer.width/2)-(currentTowerText.width/2);
        currentTowerText.position.y = infoSellButton.y+5;

        //Add button and texts to container
        infoBarContainer.addChild(infoSellButton);
        infoBarContainer.addChild(infoSellText);
        infoBarContainer.addChild(currentTowerText);

        //Selected tower text
        selectedSlingshotText = new PIXI.Text("Slingshot", {fontFamily: "Arial", fontSize: 24, fill: 0x000000, align: "center"});
        selectedSlingshotText.position.x = (leftBarContainer.width/2)-(selectedSlingshotText.width/2);
        selectedSlingshotText.position.y = topBarContainer.height;

        selectedHammerText = new PIXI.Text("Hammer", {fontFamily: "Arial", fontSize: 24, fill: 0x000000, align: "center"});
        selectedHammerText.position.x = (leftBarContainer.width/2)-(selectedHammerText.width/2);
        selectedHammerText.position.y = topBarContainer.height;

        selectedBugSprayText = new PIXI.Text("Bug Spray", {fontFamily: "Arial", fontSize: 24, fill: 0x000000, align: "center"});
        selectedBugSprayText.position.x = (leftBarContainer.width/2)-(selectedBugSprayText.width/2);
        selectedBugSprayText.position.y = topBarContainer.height;

        selectedMagnifyingGlassText = new PIXI.Text("Magnifying Glass", {fontFamily: "Arial", fontSize: 24, fill: 0x000000, align: "center"});
        selectedMagnifyingGlassText.position.x = (leftBarContainer.width/2)-(selectedMagnifyingGlassText.width/2);
        selectedMagnifyingGlassText.position.y = topBarContainer.height;

        selectedCannonText = new PIXI.Text("Cannon", {fontFamily: "Arial", fontSize: 24, fill: 0x000000, align: "center"});
        selectedCannonText.position.x = (leftBarContainer.width/2)-(selectedCannonText.width/2);
        selectedCannonText.position.y = topBarContainer.height;

        selectedHoneyText = new PIXI.Text("Honey", {fontFamily: "Arial", fontSize: 24, fill: 0x000000, align: "center"});
        selectedHoneyText.position.x = (leftBarContainer.width/2)-(selectedHoneyText.width/2);
        selectedHoneyText.position.y = topBarContainer.height;

        //Add to container
        infoBarContainer.addChild(selectedSlingshotText);
        infoBarContainer.addChild(selectedHammerText);
        infoBarContainer.addChild(selectedBugSprayText);
        infoBarContainer.addChild(selectedMagnifyingGlassText);
        infoBarContainer.addChild(selectedCannonText);
        infoBarContainer.addChild(selectedHoneyText);

        selectedSlingshotText.visible = false; //Hide it
        selectedHammerText.visible = false; //Hide it
        selectedBugSprayText.visible = false; //Hide it
        selectedMagnifyingGlassText.visible = false; //Hide it
        selectedCannonText.visible = false; //Hide it
        selectedHoneyText.visible = false; //Hide it

        //Selected tower icons
        //Add button images
        selectedTowerSpriteArray["slingshot"] = new Tower(1, {x: 0, y: 0}, infoBarContainer); //Create slingshot button image sprite
        selectedTowerSpriteArray["hammer"] = new Tower(2, {x: 0, y: 0}, infoBarContainer); //Create hammer button image sprite
        selectedTowerSpriteArray["bugSpray"] = new Tower(3, {x: 0, y: 0}, infoBarContainer); //Create bug spray button image sprite
        selectedTowerSpriteArray["magnifyingGlass"] = new Tower(4, {x: 0, y: 0}, infoBarContainer); //Create magnifying glass button image sprite
        selectedTowerSpriteArray["cannon"] = new Tower(5, {x: 0, y: 0}, infoBarContainer); //Create cannon button image sprite
        selectedTowerSpriteArray["honey"] = new Tower(6, {x: 0, y: 0}, infoBarContainer); //Create honey button image sprite

        //Set sizes
        selectedTowerSpriteArray["slingshot"].sprite1.width *= 0.5;
        selectedTowerSpriteArray["slingshot"].sprite2.width *= 0.5;
        selectedTowerSpriteArray["slingshot"].sprite3.width *= 0.5;
        selectedTowerSpriteArray["slingshot"].sprite1.height *= 0.5;
        selectedTowerSpriteArray["slingshot"].sprite2.height *= 0.5;
        selectedTowerSpriteArray["slingshot"].sprite3.height *= 0.5;
        selectedTowerSpriteArray["hammer"].sprite1.width *= 0.5;
        selectedTowerSpriteArray["hammer"].sprite2.width *= 0.5;
        selectedTowerSpriteArray["hammer"].sprite1.height *= 0.5;
        selectedTowerSpriteArray["hammer"].sprite2.height *= 0.5;
        selectedTowerSpriteArray["bugSpray"].sprite1.width *= 0.5;
        selectedTowerSpriteArray["bugSpray"].sprite2.width *= 0.5;
        selectedTowerSpriteArray["bugSpray"].sprite1.height *= 0.5;
        selectedTowerSpriteArray["bugSpray"].sprite2.height *= 0.5;
        selectedTowerSpriteArray["magnifyingGlass"].sprite1.width *= 0.5;
        selectedTowerSpriteArray["magnifyingGlass"].sprite2.width *= 0.5;
        selectedTowerSpriteArray["magnifyingGlass"].sprite1.height *= 0.5;
        selectedTowerSpriteArray["magnifyingGlass"].sprite2.height *= 0.5;
        selectedTowerSpriteArray["cannon"].sprite1.width *= 0.5;
        selectedTowerSpriteArray["cannon"].sprite2.width *= 0.5;
        selectedTowerSpriteArray["cannon"].sprite1.height *= 0.5;
        selectedTowerSpriteArray["cannon"].sprite2.height *= 0.5;
        selectedTowerSpriteArray["honey"].sprite1.width *= 0.5;
        selectedTowerSpriteArray["honey"].sprite2.width *= 0.5;
        selectedTowerSpriteArray["honey"].sprite1.height *= 0.5;
        selectedTowerSpriteArray["honey"].sprite2.height *= 0.5;

        //Set positions
        selectedTowerSpriteArray["slingshot"].setPosition(leftBarContainer.width/2, slingshotButton.y+(slingshotButton.height/2));
        selectedTowerSpriteArray["hammer"].setPosition(leftBarContainer.width/2, slingshotButton.y+(slingshotButton.height/2));
        selectedTowerSpriteArray["bugSpray"].setPosition(leftBarContainer.width/2, slingshotButton.y+(slingshotButton.height/2));
        selectedTowerSpriteArray["magnifyingGlass"].setPosition(leftBarContainer.width/2, slingshotButton.y+(slingshotButton.height/2));
        selectedTowerSpriteArray["cannon"].setPosition(leftBarContainer.width/2, slingshotButton.y+(slingshotButton.height/2));
        selectedTowerSpriteArray["honey"].setPosition(leftBarContainer.width/2, slingshotButton.y+(slingshotButton.height/2));

        //Hide all selected tower sprites
        selectedTowerSpriteArray["slingshot"].hide();
        selectedTowerSpriteArray["hammer"].hide();
        selectedTowerSpriteArray["bugSpray"].hide();
        selectedTowerSpriteArray["magnifyingGlass"].hide();
        selectedTowerSpriteArray["cannon"].hide();
        selectedTowerSpriteArray["honey"].hide();

        //TARGETING-------------------------------------------------------------------------------------------------------------------
        //Target title text
        targetingText = new PIXI.Text("Target:", {fontFamily: "Arial", fontSize: 24, fill: 0x000000, align: "center"});
        targetingText.position.x = (leftBarContainer.width/2)-(targetingText.width/2);
        targetingText.position.y = infoSellButton.y+infoSellButton.height;

        //Add text to container
        infoBarContainer.addChild(targetingText);

        //"FIRST" target button
        //Info bar target first button
        targetFirstButton = new PIXI.Graphics(); //Create graphics object
        targetFirstButton.beginFill(0xdddddd); //Fill grey
        targetFirstButton.lineStyle(2, 0x000000); //Black stroke
        targetFirstButton.drawRect(0, 0, (leftBarContainer.width/2)-2, 35); //Draw it
        targetFirstButton.position.set(0,targetingText.y+targetingText.height); //Set position
        targetFirstButton.interactive = true; //Make interactive
        targetFirstButton.buttonMode = true; //Make button

        //When hovered
        targetFirstButton.on("mouseover", () => {
            targetFirstButton.clear(); //Clear the button
            targetFirstButton.beginFill(0xbbbbbb); //Fill dark grey
            targetFirstButton.lineStyle(2, 0x000000); //Black stroke
            targetFirstButton.drawRect(0, 0, (leftBarContainer.width/2)-2, 35); //Draw it
        });

        //When mouse leaves button
        targetFirstButton.on("mouseout", () => {
            targetFirstButton.clear(); //Clear the button
            targetFirstButton.beginFill(0xdddddd); //Fill light grey
            targetFirstButton.lineStyle(2, 0x000000); //Black stroke
            targetFirstButton.drawRect(0, 0, (leftBarContainer.width/2)-2, 35); //Draw it
        });

        //When clicked
        targetFirstButton.on("pointertap", () => {
            target("first"); //Target the first ant
            updateInfoBar(); //Update the info bar to reflect selection
        });

        //First target text - Same logic as above
        targetFirstButtonText = new PIXI.Text("FIRST", {fontFamily: "Arial", fontSize: 18, fill: 0x000000, align: "center"});
        targetFirstButtonText.position.x = (targetFirstButton.width/2)-(targetFirstButtonText.width/2);
        targetFirstButtonText.position.y = targetFirstButton.y+(targetFirstButton.height/2)-(targetFirstButtonText.height/2);

        //Add button and texts to container
        infoBarContainer.addChild(targetFirstButton);
        infoBarContainer.addChild(targetFirstButtonText);

        //"LAST" target button
        //Info bar target last button
        targetLastButton = new PIXI.Graphics(); //Create graphics object
        targetLastButton.beginFill(0xdddddd); //Fill grey
        targetLastButton.lineStyle(2, 0x000000); //Black stroke
        targetLastButton.drawRect(0, 0, (leftBarContainer.width/2), 35); //Draw it
        targetLastButton.position.set(targetFirstButton.width-2,targetingText.y+targetingText.height); //Set position
        targetLastButton.interactive = true; //Make interactive
        targetLastButton.buttonMode = true; //Make button

        //When hovered
        targetLastButton.on("mouseover", () => {
            targetLastButton.clear(); //Clear the button
            targetLastButton.beginFill(0xbbbbbb); //Fill dark grey
            targetLastButton.lineStyle(2, 0x000000); //Black stroke
            targetLastButton.drawRect(0, 0, (leftBarContainer.width/2), 35); //Draw it
        });

        //When mouse leaves button
        targetLastButton.on("mouseout", () => {
            targetLastButton.clear(); //Clear the button
            targetLastButton.beginFill(0xdddddd); //Fill light grey
            targetLastButton.lineStyle(2, 0x000000); //Black stroke
            targetLastButton.drawRect(0, 0, (leftBarContainer.width/2), 35); //Draw it
        });

        //When clicked
        targetLastButton.on("pointertap", () => {
            target("last"); //Target the first ant
            updateInfoBar(); //Update the info bar to reflect selection
        });

        //Last target text - Same logic as above
        targetLastButtonText = new PIXI.Text("LAST", {fontFamily: "Arial", fontSize: 18, fill: 0x000000, align: "center"});
        targetLastButtonText.position.x = targetLastButton.x+(targetLastButton.width/2)-(targetLastButtonText.width/2);
        targetLastButtonText.position.y = targetLastButton.y+(targetLastButton.height/2)-(targetLastButtonText.height/2);

        //Add button and texts to container
        infoBarContainer.addChild(targetLastButton);
        infoBarContainer.addChild(targetLastButtonText);

        //"CLOSEST" target button
        //Info bar target first button
        targetClosestButton = new PIXI.Graphics(); //Create graphics object
        targetClosestButton.beginFill(0xdddddd); //Fill grey
        targetClosestButton.lineStyle(2, 0x000000); //Black stroke
        targetClosestButton.drawRect(0, 0, (leftBarContainer.width/2)-2, 35); //Draw it
        targetClosestButton.position.set(0,targetFirstButton.y+targetFirstButton.height-2); //Set position
        targetClosestButton.interactive = true; //Make interactive
        targetClosestButton.buttonMode = true; //Make button

        //When hovered
        targetClosestButton.on("mouseover", () => {
            targetClosestButton.clear(); //Clear the button
            targetClosestButton.beginFill(0xbbbbbb); //Fill dark grey
            targetClosestButton.lineStyle(2, 0x000000); //Black stroke
            targetClosestButton.drawRect(0, 0, (leftBarContainer.width/2)-2, 35); //Draw it
        });

        //When mouse leaves button
        targetClosestButton.on("mouseout", () => {
            targetClosestButton.clear(); //Clear the button
            targetClosestButton.beginFill(0xdddddd); //Fill light grey
            targetClosestButton.lineStyle(2, 0x000000); //Black stroke
            targetClosestButton.drawRect(0, 0, (leftBarContainer.width/2)-2, 35); //Draw it
        });

        //When clicked
        targetClosestButton.on("pointertap", () => {
            target("closest"); //Target the first ant
            updateInfoBar(); //Update the info bar to reflect selection
        });

        //Closest target text - Same logic as above
        targetClosestButtonText = new PIXI.Text("CLOSEST", {fontFamily: "Arial", fontSize: 14, fill: 0x000000, align: "center"});
        targetClosestButtonText.position.x = (targetClosestButton.width/2)-(targetClosestButtonText.width/2);
        targetClosestButtonText.position.y = targetClosestButton.y+(targetClosestButton.height/2)-(targetClosestButtonText.height/2);

        //Add button and texts to container
        infoBarContainer.addChild(targetClosestButton);
        infoBarContainer.addChild(targetClosestButtonText);

        //"STRONGEST" target button
        //Info bar target first button
        targetStrongestButton = new PIXI.Graphics(); //Create graphics object
        targetStrongestButton.beginFill(0xdddddd); //Fill grey
        targetStrongestButton.lineStyle(2, 0x000000); //Black stroke
        targetStrongestButton.drawRect(0, 0, (leftBarContainer.width/2), 35); //Draw it
        targetStrongestButton.position.set(targetFirstButton.width-2,targetFirstButton.y+targetFirstButton.height-2); //Set position
        targetStrongestButton.interactive = true; //Make interactive
        targetStrongestButton.buttonMode = true; //Make button

        //When hovered
        targetStrongestButton.on("mouseover", () => {
            targetStrongestButton.clear(); //Clear the button
            targetStrongestButton.beginFill(0xbbbbbb); //Fill dark grey
            targetStrongestButton.lineStyle(2, 0x000000); //Black stroke
            targetStrongestButton.drawRect(0, 0, (leftBarContainer.width/2), 35); //Draw it
        });

        //When mouse leaves button
        targetStrongestButton.on("mouseout", () => {
            targetStrongestButton.clear(); //Clear the button
            targetStrongestButton.beginFill(0xdddddd); //Fill light grey
            targetStrongestButton.lineStyle(2, 0x000000); //Black stroke
            targetStrongestButton.drawRect(0, 0, (leftBarContainer.width/2), 35); //Draw it
        });

        //When clicked
        targetStrongestButton.on("pointertap", () => {
            target("strongest"); //Target the first ant
            updateInfoBar(); //Update the info bar to reflect selection
        });

        //Strongest target text - Same logic as above
        targetStrongestButtonText = new PIXI.Text("STRONGEST", {fontFamily: "Arial", fontSize: 14, fill: 0x000000, align: "center"});
        targetStrongestButtonText.position.x = targetStrongestButton.x+(targetStrongestButton.width/2)-(targetStrongestButtonText.width/2);
        targetStrongestButtonText.position.y = targetStrongestButton.y+(targetStrongestButton.height/2)-(targetStrongestButtonText.height/2);

        //Add button and texts to container
        infoBarContainer.addChild(targetStrongestButton);
        infoBarContainer.addChild(targetStrongestButtonText);

//******PATH 1 UPGRADE----------------------------------------------------------------------------------------------------
        //PATH 1 CURRENT TIER TEXT-------------------------------------------------------------------------------------------
        currentPath1Description = new PIXI.Text("Not Upgraded", {fontFamily: "Arial", fontSize: 24, fill: 0x000000, align: "center"});
        currentPath1Description.position.x = leftBarContainer.x+(leftBarContainer.width/2)-(currentPath1Description.width/2);
        currentPath1Description.position.y = targetStrongestButton.y+targetStrongestButton.height+5;

        //Add to container
        infoBarContainer.addChild(currentPath1Description);

        //PATH 1 UPGRADE BUTTON--------------------------------------------------------------------------------------------------
        //Path 1 title - Same logic as above
        nextPath1Description = new PIXI.Text("Upgrade to: ", {fontFamily: "Arial", fontSize: 24, fill: 0x000000, align: "center"});
        nextPath1Description.position.x = (leftBarContainer.width/2)-(nextPath1Description.width/2);
        nextPath1Description.position.y = currentPath1Description.position.y+currentPath1Description.height+10;
        nextPath1Description.alpha = 1;

        path1Button = new PIXI.Graphics(); //Initialize path1 button

        //If the player has enough gold to buy the next tier and showPath1Green
        if(player.gold >= currentTower.path1Cost && showPath1Green) {
            path1Button.clear(); //Clear the button
            path1Button.beginFill(lightGreen); //Fill light green
            path1Button.lineStyle(2, 0x000000); //Black stroke
            path1Button.drawRect(0, 0, leftBarContainer.width - 2, nextPath1Description.height + 10); //Draw it
        }
        //Else, the player can't afford it
        else {
            path1Button.clear(); //Clear the button
            path1Button.beginFill(lightGray); //Fill light grey
            path1Button.lineStyle(2, 0x000000); //Black stroke
            path1Button.drawRect(0, 0, leftBarContainer.width - 2, nextPath1Description.height + 10); //Draw it
        }

        path1Button.position.set(0, nextPath1Description.position.y-5); //Set position
        path1Button.interactive = true; //Make interactive
        path1Button.buttonMode = true; //Make button

        //When hovered
        path1Button.on("mouseover", () => {
            if(player.gold >= currentTower.path1Cost && showPath1Green) {
                path1Button.clear(); //Clear the button
                path1Button.beginFill(darkGreen); //Fill dark green
                path1Button.lineStyle(2, 0x000000); //Black stroke
                path1Button.drawRect(0, 0, leftBarContainer.width - 2, nextPath1Description.height + 10); //Draw it
            }
            else {
                path1Button.clear(); //Clear the button
                path1Button.beginFill(darkGray); //Fill dark grey
                path1Button.lineStyle(2, 0x000000); //Black stroke
                path1Button.drawRect(0, 0, leftBarContainer.width - 2, nextPath1Description.height + 10); //Draw it
            }
        });

        //When mouse leaves button
        path1Button.on("mouseout", () => {
            if(player.gold >= currentTower.path1Cost && showPath1Green) {
                path1Button.clear(); //Clear the button
                path1Button.beginFill(lightGreen); //Fill light grey
                path1Button.lineStyle(2, 0x000000); //Black stroke
                path1Button.drawRect(0, 0, leftBarContainer.width - 2, nextPath1Description.height + 10); //Draw it
            }
            else {
                path1Button.clear(); //Clear the button
                path1Button.beginFill(lightGray); //Fill light grey
                path1Button.lineStyle(2, 0x000000); //Black stroke
                path1Button.drawRect(0, 0, leftBarContainer.width - 2, nextPath1Description.height + 10); //Draw it
            }
        });

        //When clicked
        path1Button.on("pointertap", () => {
            if(player.gold >= currentTower.path1Cost) {
                //If slingshot tower
                if(currentTower.type === 1) {
                    //If tier 0 and the user has enough xp to upgrade to tier 1
                    if(currentTower.path1 === 0 && player.slingshotPath1XP >= slingshotP1T1UnlockXP) { //TODO this is wrong, xp is off
                        currentTower.upgradeTower(1); //Call add slingshot, buys a slingshot and lets user place it
                        updatePathText(); //Upgrade the button text
                    }
                    //If tier 1 and the user has enough xp to upgrade to tier 2
                    else if(currentTower.path1 === 1 && player.slingshotPath1XP >= slingshotP1T2UnlockXP) {
                        currentTower.upgradeTower(1); //Call add slingshot, buys a slingshot and lets user place it
                        updatePathText(); //Upgrade the button text
                    }
                    //If tier 2 and the user has enough xp to upgrade to tier 3
                    else if(currentTower.path1 === 2 && player.slingshotPath1XP >= slingshotP1T3UnlockXP) {
                        currentTower.upgradeTower(1); //Call add slingshot, buys a slingshot and lets user place it
                        updatePathText(); //Upgrade the button text
                    }
                    //If tier 3 and the user has enough xp to upgrade to tier 4
                    else if(currentTower.path1 === 3 && player.slingshotPath1XP >= slingshotP1T4UnlockXP) {
                        currentTower.upgradeTower(1); //Call add slingshot, buys a slingshot and lets user place it
                        updatePathText(); //Upgrade the button text
                    }
                }
                //If hammer tower
                if(currentTower.type === 2) {
                    //If tier 0 and the user has enough xp to upgrade to tier 1
                    if(currentTower.path1 === 0 && player.hammerPath1XP >= hammerP1T1UnlockXP) {
                        currentTower.upgradeTower(1); //Call add hammer, buys a hammer and lets user place it
                        updatePathText(); //Upgrade the button text
                    }
                    //If tier 1 and the user has enough xp to upgrade to tier 2
                    else if(currentTower.path1 === 1 && player.hammerPath1XP >= hammerP1T2UnlockXP) {
                        currentTower.upgradeTower(1); //Call add hammer, buys a hammer and lets user place it
                        updatePathText(); //Upgrade the button text
                    }
                    //If tier 2 and the user has enough xp to upgrade to tier 3
                    else if(currentTower.path1 === 2 && player.hammerPath1XP >= hammerP1T3UnlockXP) {
                        currentTower.upgradeTower(1); //Call add hammer, buys a hammer and lets user place it
                        updatePathText(); //Upgrade the button text
                    }
                    //If tier 3 and the user has enough xp to upgrade to tier 4
                    else if(currentTower.path1 === 3 && player.hammerPath1XP >= hammerP1T4UnlockXP) {
                        currentTower.upgradeTower(1); //Call add hammer, buys a hammer and lets user place it
                        updatePathText(); //Upgrade the button text
                    }
                }
                //If bug spray tower
                if(currentTower.type === 3) {
                    //If tier 0 and the user has enough xp to upgrade to tier 1
                    if(currentTower.path1 === 0 && player.bugSprayPath1XP >= bugSprayP1T1UnlockXP) {
                        currentTower.upgradeTower(1); //Call add bugSpray, buys a bug spray and lets user place it
                        updatePathText(); //Upgrade the button text
                    }
                    //If tier 1 and the user has enough xp to upgrade to tier 2
                    else if(currentTower.path1 === 1 && player.bugSprayPath1XP >= bugSprayP1T2UnlockXP) {
                        currentTower.upgradeTower(1); //Call add bugSpray, buys a bug spray and lets user place it
                        updatePathText(); //Upgrade the button text
                    }
                    //If tier 2 and the user has enough xp to upgrade to tier 3
                    else if(currentTower.path1 === 2 && player.bugSprayPath1XP >= bugSprayP1T3UnlockXP) {
                        currentTower.upgradeTower(1); //Call add bugSpray, buys a bug spray and lets user place it
                        updatePathText(); //Upgrade the button text
                    }
                    //If tier 3 and the user has enough xp to upgrade to tier 4
                    else if(currentTower.path1 === 3 && player.bugSprayPath1XP >= bugSprayP1T4UnlockXP) {
                        currentTower.upgradeTower(1); //Call add bugSpray, buys a bug spray and lets user place it
                        updatePathText(); //Upgrade the button text
                    }
                }
                //If magnifying glass tower
                if(currentTower.type === 4) {
                    //If tier 0 and the user has enough xp to upgrade to tier 1
                    if(currentTower.path1 === 0 && player.magnifyingGlassPath1XP >= magnifyingGlassP1T1UnlockXP) {
                        currentTower.upgradeTower(1); //Call add magnifyingGlass, buys a magnifying glass and lets user place it
                        updatePathText(); //Upgrade the button text
                    }
                    //If tier 1 and the user has enough xp to upgrade to tier 2
                    else if(currentTower.path1 === 1 && player.magnifyingGlassPath1XP >= magnifyingGlassP1T2UnlockXP) {
                        currentTower.upgradeTower(1); //Call add magnifyingGlass, buys a magnifying glass and lets user place it
                        updatePathText(); //Upgrade the button text
                    }
                    //If tier 2 and the user has enough xp to upgrade to tier 3
                    else if(currentTower.path1 === 2 && player.magnifyingGlassPath1XP >= magnifyingGlassP1T3UnlockXP) {
                        currentTower.upgradeTower(1); //Call add magnifyingGlass, buys a magnifying glass and lets user place it
                        updatePathText(); //Upgrade the button text
                    }
                    //If tier 3 and the user has enough xp to upgrade to tier 4
                    else if(currentTower.path1 === 3 && player.magnifyingGlassPath1XP >= magnifyingGlassP1T4UnlockXP) {
                        currentTower.upgradeTower(1); //Call add magnifyingGlass, buys a magnifying glass and lets user place it
                        updatePathText(); //Upgrade the button text
                    }
                }
                //If cannon tower
                if(currentTower.type === 5) {
                    //If tier 0 and the user has enough xp to upgrade to tier 1
                    if(currentTower.path1 === 0 && player.cannonPath1XP >= cannonP1T1UnlockXP) {
                        currentTower.upgradeTower(1); //Call add cannon, buys a cannon and lets user place it
                        updatePathText(); //Upgrade the button text
                    }
                    //If tier 1 and the user has enough xp to upgrade to tier 2
                    else if(currentTower.path1 === 1 && player.cannonPath1XP >= cannonP1T2UnlockXP) {
                        currentTower.upgradeTower(1); //Call add cannon, buys a cannon and lets user place it
                        updatePathText(); //Upgrade the button text
                    }
                    //If tier 2 and the user has enough xp to upgrade to tier 3
                    else if(currentTower.path1 === 2 && player.cannonPath1XP >= cannonP1T3UnlockXP) {
                        currentTower.upgradeTower(1); //Call add cannon, buys a cannon and lets user place it
                        updatePathText(); //Upgrade the button text
                    }
                    //If tier 3 and the user has enough xp to upgrade to tier 4
                    else if(currentTower.path1 === 3 && player.cannonPath1XP >= cannonP1T4UnlockXP) {
                        currentTower.upgradeTower(1); //Call add cannon, buys a cannon and lets user place it
                        updatePathText(); //Upgrade the button text
                    }
                }
                //If honey tower
                if(currentTower.type === 6) {
                    //If tier 0 and the user has enough xp to upgrade to tier 1
                    if(currentTower.path1 === 0 && player.honeyPath1XP >= honeyP1T1UnlockXP) {
                        currentTower.upgradeTower(1); //Call add honey, buys a honey and lets user place it
                        updatePathText(); //Upgrade the button text
                    }
                    //If tier 1 and the user has enough xp to upgrade to tier 2
                    else if(currentTower.path1 === 1 && player.honeyPath1XP >= honeyP1T2UnlockXP) {
                        currentTower.upgradeTower(1); //Call add honey, buys a honey and lets user place it
                        updatePathText(); //Upgrade the button text
                    }
                    //If tier 2 and the user has enough xp to upgrade to tier 3
                    else if(currentTower.path1 === 2 && player.honeyPath1XP >= honeyP1T3UnlockXP) {
                        currentTower.upgradeTower(1); //Call add honey, buys a honey and lets user place it
                        updatePathText(); //Upgrade the button text
                    }
                    //If tier 3 and the user has enough xp to upgrade to tier 4
                    else if(currentTower.path1 === 3 && player.honeyPath1XP >= honeyP1T4UnlockXP) {
                        currentTower.upgradeTower(1); //Call add honey, buys a honey and lets user place it
                        updatePathText(); //Upgrade the button text
                    }
                }
            }
        });

        //Add button and texts to container
        infoBarContainer.addChild(path1Button);
        infoBarContainer.addChild(nextPath1Description);

        //PATH 2 CURRENT TIER TEXT- Follows the same logic as above--------------------------------------------------------------
        currentPath2Description = new PIXI.Text("Not Upgraded", {fontFamily: "Arial", fontSize: 24, fill: 0x000000, align: "center"});
        currentPath2Description.position.x = leftBarContainer.x+(leftBarContainer.width/2)-(currentPath2Description.width/2);
        currentPath2Description.position.y = path1Button.y+path1Button.height+5;

        infoBarContainer.addChild(currentPath2Description);

        //PATH 2 UPGRADE BUTTON--------------------------------------------------------------------------------------------------
        //Path 2 title - Same logic as above
        nextPath2Description = new PIXI.Text("Upgrade to: ", {fontFamily: "Arial", fontSize: 24, fill: 0x000000, align: "center"});
        nextPath2Description.position.x = (leftBarContainer.width/2)-(nextPath2Description.width/2);
        nextPath2Description.position.y = currentPath2Description.position.y+currentPath2Description.height+10;
        nextPath2Description.alpha = 1;

        path2Button = new PIXI.Graphics(); //Create graphics object

        if(player.gold >= currentTower.path2Cost && showPath2Green) {
            path2Button.beginFill(lightGreen); //Fill green
            path2Button.lineStyle(2, 0x000000); //Black stroke
            path2Button.drawRect(0, 0, leftBarContainer.width - 2, nextPath2Description.height + 10); //Draw it
        }
        else {
            path2Button.beginFill(lightGray); //Fill grey
            path2Button.lineStyle(2, 0x000000); //Black stroke
            path2Button.drawRect(0, 0, leftBarContainer.width - 2, nextPath2Description.height + 10); //Draw it
        }

        path2Button.position.set(0, nextPath2Description.position.y - 5); //Set position
        path2Button.interactive = true; //Make interactive
        path2Button.buttonMode = true; //Make button

        //When hovered
        path2Button.on("mouseover", () => {
            if(player.gold >= currentTower.path2Cost && showPath2Green) {
                path2Button.clear(); //Clear the button
                path2Button.beginFill(darkGreen); //Fill dark green
                path2Button.lineStyle(2, 0x000000); //Black stroke
                path2Button.drawRect(0, 0, leftBarContainer.width - 2, nextPath2Description.height + 10); //Draw it
            }
            else {
                path2Button.clear(); //Clear the button
                path2Button.beginFill(darkGray); //Fill dark grey
                path2Button.lineStyle(2, 0x000000); //Black stroke
                path2Button.drawRect(0, 0, leftBarContainer.width - 2, nextPath2Description.height + 10); //Draw it
            }
        });

        //When mouse leaves button
        path2Button.on("mouseout", () => {
            if(player.gold >= currentTower.path2Cost && showPath2Green) {
                path2Button.clear(); //Clear the button
                path2Button.beginFill(lightGreen); //Fill light green
                path2Button.lineStyle(2, 0x000000); //Black stroke
                path2Button.drawRect(0, 0, leftBarContainer.width - 2, nextPath2Description.height + 10); //Draw it
            }
            else {
                path2Button.clear(); //Clear the button
                path2Button.beginFill(lightGray); //Fill light grey
                path2Button.lineStyle(2, 0x000000); //Black stroke
                path2Button.drawRect(0, 0, leftBarContainer.width - 2, nextPath2Description.height + 10); //Draw it
            }
        });

        //When clicked
        path2Button.on("pointertap", () => {
            if(player.gold >= currentTower.path2Cost) {
                //If slingshot tower
                if(currentTower.type === 1) {
                    if(currentTower.path2 === 0 && player.slingshotPath2XP >= slingshotP2T1UnlockXP) {
                        currentTower.upgradeTower(2); //Call add slingshot, buys a slingshot and lets user place it
                        updatePathText();
                    }
                    else if(currentTower.path2 === 1 && player.slingshotPath2XP >= slingshotP2T2UnlockXP) {
                        currentTower.upgradeTower(2); //Call add slingshot, buys a slingshot and lets user place it
                        updatePathText();
                    }
                    else if(currentTower.path2 === 2 && player.slingshotPath2XP >= slingshotP2T3UnlockXP) {
                        currentTower.upgradeTower(2); //Call add slingshot, buys a slingshot and lets user place it
                        updatePathText();
                    }
                    else if(currentTower.path2 === 3 && player.slingshotPath2XP >= slingshotP2T4UnlockXP) {
                        currentTower.upgradeTower(2); //Call add slingshot, buys a slingshot and lets user place it
                        updatePathText();
                    }
                }
                //If hammer tower
                if(currentTower.type === 2) {
                    if(currentTower.path2 === 0 && player.hammerPath2XP >= hammerP2T1UnlockXP) {
                        currentTower.upgradeTower(2); //Call add hammer, buys a hammer and lets user place it
                        updatePathText();
                    }
                    else if(currentTower.path2 === 1 && player.hammerPath2XP >= hammerP2T2UnlockXP) {
                        currentTower.upgradeTower(2); //Call add hammer, buys a hammer and lets user place it
                        updatePathText();
                    }
                    else if(currentTower.path2 === 2 && player.hammerPath2XP >= hammerP2T3UnlockXP) {
                        currentTower.upgradeTower(2); //Call add hammer, buys a hammer and lets user place it
                        updatePathText();
                    }
                    else if(currentTower.path2 === 3 && player.hammerPath2XP >= hammerP2T4UnlockXP) {
                        currentTower.upgradeTower(2); //Call add hammer, buys a hammer and lets user place it
                        updatePathText();
                    }
                }
                //If bug spray tower
                if(currentTower.type === 3) {
                    if(currentTower.path2 === 0 && player.bugSprayPath2XP >= bugSprayP2T1UnlockXP) {
                        currentTower.upgradeTower(2); //Call add bugSpray, buys a bug spray and lets user place it
                        updatePathText();
                    }
                    else if(currentTower.path2 === 1 && player.bugSprayPath2XP >= bugSprayP2T2UnlockXP) {
                        currentTower.upgradeTower(2); //Call add bugSpray, buys a bug spray and lets user place it
                        updatePathText();
                    }
                    else if(currentTower.path2 === 2 && player.bugSprayPath2XP >= bugSprayP2T3UnlockXP) {
                        currentTower.upgradeTower(2); //Call add bugSpray, buys a bug spray and lets user place it
                        updatePathText();
                    }
                    else if(currentTower.path2 === 3 && player.bugSprayPath2XP >= bugSprayP2T4UnlockXP) {
                        currentTower.upgradeTower(2); //Call add bugSpray, buys a bug spray and lets user place it
                        updatePathText();
                    }
                }
                //If magnifying glass tower
                if(currentTower.type === 4) {
                    if(currentTower.path2 === 0 && player.magnifyingGlassPath2XP >= magnifyingGlassP2T1UnlockXP) {
                        currentTower.upgradeTower(2); //Call add magnifyingGlass, buys a magnifying glass and lets user place it
                        updatePathText();
                    }
                    else if(currentTower.path2 === 1 && player.magnifyingGlassPath2XP >= magnifyingGlassP2T2UnlockXP) {
                        currentTower.upgradeTower(2); //Call add magnifyingGlass, buys a magnifying glass and lets user place it
                        updatePathText();
                    }
                    else if(currentTower.path2 === 2 && player.magnifyingGlassPath2XP >= magnifyingGlassP2T3UnlockXP) {
                        currentTower.upgradeTower(2); //Call add magnifyingGlass, buys a magnifying glass and lets user place it
                        updatePathText();
                    }
                    else if(currentTower.path2 === 3 && player.magnifyingGlassPath2XP >= magnifyingGlassP2T4UnlockXP) {
                        currentTower.upgradeTower(2); //Call add magnifyingGlass, buys a magnifying glass and lets user place it
                        updatePathText();
                    }
                }
                //If cannon tower
                if(currentTower.type === 5) {
                    if(currentTower.path2 === 0 && player.cannonPath2XP >= cannonP2T1UnlockXP) {
                        currentTower.upgradeTower(2); //Call add cannon, buys a cannon and lets user place it
                        updatePathText();
                    }
                    else if(currentTower.path2 === 1 && player.cannonPath2XP >= cannonP2T2UnlockXP) {
                        currentTower.upgradeTower(2); //Call add cannon, buys a cannon and lets user place it
                        updatePathText();
                    }
                    else if(currentTower.path2 === 2 && player.cannonPath2XP >= cannonP2T3UnlockXP) {
                        currentTower.upgradeTower(2); //Call add cannon, buys a cannon and lets user place it
                        updatePathText();
                    }
                    else if(currentTower.path2 === 3 && player.cannonPath2XP >= cannonP2T4UnlockXP) {
                        currentTower.upgradeTower(2); //Call add cannon, buys a cannon and lets user place it
                        updatePathText();
                    }
                }
                //If honey tower
                if(currentTower.type === 6) {
                    if(currentTower.path2 === 0 && player.honeyPath2XP >= honeyP2T1UnlockXP) {
                        currentTower.upgradeTower(2); //Call add honey, buys a honey and lets user place it
                        updatePathText();
                    }
                    else if(currentTower.path2 === 1 && player.honeyPath2XP >= honeyP2T2UnlockXP) {
                        currentTower.upgradeTower(2); //Call add honey, buys a honey and lets user place it
                        updatePathText();
                    }
                    else if(currentTower.path2 === 2 && player.honeyPath2XP >= honeyP2T3UnlockXP) {
                        currentTower.upgradeTower(2); //Call add honey, buys a honey and lets user place it
                        updatePathText();
                    }
                    else if(currentTower.path2 === 3 && player.honeyPath2XP >= honeyP2T4UnlockXP) {
                        currentTower.upgradeTower(2); //Call add honey, buys a honey and lets user place it
                        updatePathText();
                    }
                }
            }
        });

        //Add button and texts to container
        infoBarContainer.addChild(path2Button);
        infoBarContainer.addChild(nextPath2Description);

        //Check to see if user is already logged in, if so go to loggedin screen, if not do nothing
        let cookie = document.cookie; //Assign the browser's cookie to cookie
        cookie = cookie.split(":"); //Split the cookie by ":" as game cookie is stored in the form of "selector:validator"
        let selector = cookie[0]; //Assign the selector
        let validator = cookie[1]; //Assign the validator
        let obj = {validator:validator, selector:selector}; //Create JSON object
        let json = JSON.stringify(obj); //Stringify

        //AJAX
        let response; //xmlhtpp response
        let xmlhttp = new XMLHttpRequest(); //xmlhttp request

        //xmlhttp callback - Is performed when xmlhttp response is received
        xmlhttp.onreadystatechange = function() {

            //If request is finished and response is ready
            if(xmlhttp.readyState === 4) {

                //If status is OK
                if(xmlhttp.status === 200) {
                    response = xmlhttp.responseText; //Capture response text

                    if(response === "expiredAuth") {
                        //Auth ran out, needs to log in again
                    }
                    else if(response === "noAuth") {
                        //Auth does not exist
                    }
                    //User is authenticated
                    else {
                        response = JSON.parse(xmlhttp.responseText); //Parse JSON object into JavaScript array
                        player = new Player(response); //Create user object
                        windmill = player.windmillSetting; //Set windmill
                        hideMainMenu(); //Hide the main menu because they are logged in
                        showLoggedInMenu(); //Show the logged in menu
                        logIn(); //Perform logIn setup
                    }
                }
            }
        };

        //Send as GET to checkAuthToken.php
        xmlhttp.open("POST", "lib/checkAuthToken.php?", true); //Asynchronously open xmlhttp to checkAuthToken.php
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); //Set the request header
        xmlhttp.send(json); //Send JSON object
    }

    //updatePathText() function - Updates the path upgrade buttons text depending on what the user has unlocked
    function updatePathText() {
        showPath1Green = false; //Cannot illuminate Path 1 button as green
        showPath2Green = false; //Cannot illuminate Path 2 button as green

        //Check if the user has unlocked the next tier, if so showPath1Green or showPath2Green set to true. Otherwise it is false and button properties will be updated accordingly.
        //If slingshot tower
        if(currentTower.type === 1) {
            //If the user has unlocked the next path 1 tier
            if(currentTower.path1 === 0 && player.slingshotPath1XP >= slingshotP1T1UnlockXP || currentTower.path1 === 1 && player.slingshotPath1XP >= slingshotP1T2UnlockXP || currentTower.path1 === 2 && player.slingshotPath1XP >= slingshotP1T3UnlockXP || currentTower.path1 === 3 && player.slingshotPath1XP >= slingshotP1T4UnlockXP) {
                showPath1Green = true; //Make the button green
            }
            //If the user has unlocked the next path 2 tier
            if(currentTower.path2 === 0 && player.slingshotPath2XP >= slingshotP2T1UnlockXP || currentTower.path2 === 1 && player.slingshotPath2XP >= slingshotP2T2UnlockXP || currentTower.path2 === 2 && player.slingshotPath2XP >= slingshotP2T3UnlockXP || currentTower.path2 === 3 && player.slingshotPath2XP >= slingshotP2T4UnlockXP) {
                showPath2Green = true; //Make the button green
            }
        }
        //If hammer tower - Same logic as above
        if(currentTower.type === 2) {
            if(currentTower.path1 === 0 && player.hammerPath1XP >= hammerP1T1UnlockXP || currentTower.path1 === 1 && player.hammerPath1XP >= hammerP1T2UnlockXP || currentTower.path1 === 2 && player.hammerPath1XP >= hammerP1T3UnlockXP || currentTower.path1 === 3 && player.hammerPath1XP >= hammerP1T4UnlockXP) {
                showPath1Green = true;
            }
            if(currentTower.path2 === 0 && player.hammerPath2XP >= hammerP2T1UnlockXP || currentTower.path2 === 1 && player.hammerPath2XP >= hammerP2T2UnlockXP || currentTower.path2 === 2 && player.hammerPath2XP >= hammerP2T3UnlockXP || currentTower.path2 === 3 && player.hammerPath2XP >= hammerP2T4UnlockXP) {
                showPath2Green = true;
            }
        }
        //If bug spray tower - Same logic as above
        if(currentTower.type === 3) {
            if(currentTower.path1 === 0 && player.bugSprayPath1XP >= bugSprayP1T1UnlockXP || currentTower.path1 === 1 && player.bugSprayPath1XP >= bugSprayP1T2UnlockXP || currentTower.path1 === 2 && player.bugSprayPath1XP >= bugSprayP1T3UnlockXP || currentTower.path1 === 3 && player.bugSprayPath1XP >= bugSprayP1T4UnlockXP) {
                showPath1Green = true;
            }
            if(currentTower.path2 === 0 && player.bugSprayPath2XP >= bugSprayP2T1UnlockXP || currentTower.path2 === 1 && player.bugSprayPath2XP >= bugSprayP2T2UnlockXP || currentTower.path2 === 2 && player.bugSprayPath2XP >= bugSprayP2T3UnlockXP || currentTower.path2 === 3 && player.bugSprayPath2XP >= bugSprayP2T4UnlockXP) {
                showPath2Green = true;
            }
        }
        //If magnifying glass tower - Same logic as above
        if(currentTower.type === 4) {
            if(currentTower.path1 === 0 && player.magnifyingGlassPath1XP >= magnifyingGlassP1T1UnlockXP || currentTower.path1 === 1 && player.magnifyingGlassPath1XP >= magnifyingGlassP1T2UnlockXP || currentTower.path1 === 2 && player.magnifyingGlassPath1XP >= magnifyingGlassP1T3UnlockXP || currentTower.path1 === 3 && player.magnifyingGlassPath1XP >= magnifyingGlassP1T4UnlockXP) {
                showPath1Green = true;
            }
            if(currentTower.path2 === 0 && player.magnifyingGlassPath2XP >= magnifyingGlassP2T1UnlockXP || currentTower.path2 === 1 && player.magnifyingGlassPath2XP >= magnifyingGlassP2T2UnlockXP || currentTower.path2 === 2 && player.magnifyingGlassPath2XP >= magnifyingGlassP2T3UnlockXP || currentTower.path2 === 3 && player.magnifyingGlassPath2XP >= magnifyingGlassP2T4UnlockXP) {
                showPath2Green = true;
            }
        }
        //If cannon tower - Same logic as above
        if(currentTower.type === 5) {
            if(currentTower.path1 === 0 && player.cannonPath1XP >= cannonP1T1UnlockXP || currentTower.path1 === 1 && player.cannonPath1XP >= cannonP1T2UnlockXP || currentTower.path1 === 2 && player.cannonPath1XP >= cannonP1T3UnlockXP || currentTower.path1 === 3 && player.cannonPath1XP >= cannonP1T4UnlockXP) {
                showPath1Green = true;
            }
            if(currentTower.path2 === 0 && player.cannonPath2XP >= cannonP2T1UnlockXP || currentTower.path2 === 1 && player.cannonPath2XP >= cannonP2T2UnlockXP || currentTower.path2 === 2 && player.cannonPath2XP >= cannonP2T3UnlockXP || currentTower.path2 === 3 && player.cannonPath2XP >= cannonP2T4UnlockXP) {
                showPath2Green = true;
            }
        }
        //If honey tower - Same logic as above
        if(currentTower.type === 6) {
            if(currentTower.path1 === 0 && player.honeyPath1XP >= honeyP1T1UnlockXP || currentTower.path1 === 1 && player.honeyPath1XP >= honeyP1T2UnlockXP || currentTower.path1 === 2 && player.honeyPath1XP >= honeyP1T3UnlockXP || currentTower.path1 === 3 && player.honeyPath1XP >= honeyP1T4UnlockXP) {
                showPath1Green = true;
            }
            if(currentTower.path2 === 0 && player.honeyPath2XP >= honeyP2T1UnlockXP || currentTower.path2 === 1 && player.honeyPath2XP >= honeyP2T2UnlockXP || currentTower.path2 === 2 && player.honeyPath2XP >= honeyP2T3UnlockXP || currentTower.path2 === 3 && player.honeyPath2XP >= honeyP2T4UnlockXP) {
                showPath2Green = true;
            }
        }
        //If tower path 1 is maxed out
        if(currentTower.path1 === 4) {
            showPath1Green = true; //Set to true so that text is update, however other code will make it gray as it should be
        }
        //If tower path 2 is maxed out
        if(currentTower.path2 === 4) {
            showPath2Green = true; //Set to true so that text is update, however other code will make it gray as it should be
        }

        //PATH 1 CURRENT TIER TEXT-------------------------------------------------------------------------------------------
        currentPath1Description.text = currentTower.currentPath1DescriptionText; //Assign current description of tier
        currentPath1Description.position.x = leftBarContainer.x+(leftBarContainer.width/2)-(currentPath1Description.width/2); //Set x position
        currentPath1Description.position.y = targetStrongestButton.y+targetStrongestButton.height+5; //Set y position

        //If the user has upgraded path 2 tier past 2 and path 1 is at tier 2, path 1 cannot be upgraded further
        if(currentTower.path2 > 2 && currentTower.path1 > 1) {
            nextPath1Description.text = "Cannot Upgrade"; //Set text to say "Cannot Upgrade"
        }
        //Else, the user hasn't upgrade past tier 2 on path 2
        else {
            //If the user hasn't unlocked the tier yet
            if(!showPath1Green) {
                nextPath1Description.text = "Not Unlocked"; //Set text to say "Not Unlocked"
            }
            //Else, the user has unlocked the tier
            else {
                nextPath1Description.text = currentTower.nextPath1Description; //Show tier details
            }
        }

        //Set position
        nextPath1Description.position.x = (leftBarContainer.width/2)-(nextPath1Description.width/2);
        nextPath1Description.position.y = currentPath1Description.position.y+currentPath1Description.height+10;

        path1Button.removeAllListeners(); //Remove listeners so they can be updated

        //If the user has enough gold to buy this upgrade, it is available for purchase, and is unlocked
        if(player.gold >= currentTower.path1Cost && currentTower.path1 < 4 && nextPath1Description.text !== "Cannot Upgrade" && showPath1Green) {
            path1Button.clear(); //Clear the button
            path1Button.beginFill(lightGreen); //Fill light green
            path1Button.lineStyle(2, 0x000000); //Black stroke
            path1Button.drawRect(0, 0, leftBarContainer.width - 2, nextPath1Description.height + 10); //Draw it
        }
        //Else, the player cannot buy it
        else {
            path1Button.clear(); //Clear the button
            path1Button.beginFill(lightGray); //Fill light grey
            path1Button.lineStyle(2, 0x000000); //Black stroke
            path1Button.drawRect(0, 0, leftBarContainer.width - 2, nextPath1Description.height + 10); //Draw it
        }

        //When hovered
        path1Button.on("mouseover", () => {
            //If the user has enough gold to buy this upgrade, it is available for purchase, and is unlocked
            if(player.gold >= currentTower.path1Cost && currentTower.path1 < 4 && nextPath1Description.text !== "Cannot Upgrade" && showPath1Green) {
                path1Button.clear(); //Clear the button
                path1Button.beginFill(darkGreen); //Fill dark green
                path1Button.lineStyle(2, 0x000000); //Black stroke
                path1Button.drawRect(0, 0, leftBarContainer.width - 2, nextPath1Description.height + 10); //Draw it
            }
            //Else, the player cannot buy it
            else {
                path1Button.clear(); //Clear the button
                path1Button.beginFill(lightGray); //Fill dark grey
                path1Button.lineStyle(2, 0x000000); //Black stroke
                path1Button.drawRect(0, 0, leftBarContainer.width - 2, nextPath1Description.height + 10); //Draw it
            }
        });

        //When mouse leaves button
        path1Button.on("mouseout", () => {
            //If the user has enough gold to buy this upgrade, it is available for purchase, and is unlocked
            if(player.gold >= currentTower.path1Cost && currentTower.path1 < 4 && nextPath1Description.text !== "Cannot Upgrade" && showPath1Green) {
                path1Button.clear(); //Clear the button
                path1Button.beginFill(lightGreen); //Fill light green
                path1Button.lineStyle(2, 0x000000); //Black stroke
                path1Button.drawRect(0, 0, leftBarContainer.width - 2, nextPath1Description.height + 10); //Draw it
            }
            //Else, the player cannot buy it
            else {
                path1Button.clear(); //Clear the button
                path1Button.beginFill(lightGray); //Fill light grey
                path1Button.lineStyle(2, 0x000000); //Black stroke
                path1Button.drawRect(0, 0, leftBarContainer.width - 2, nextPath1Description.height + 10); //Draw it
            }
        });

        //When clicked - Follows same logic as initialization code above
        path1Button.on("pointertap", () => {
            //If the user has enough gold to upgrade path 1
            if(player.gold >= currentTower.path1Cost) {
                //If slingshot tower
                if(currentTower.type === 1) {
                    if(currentTower.path1 === 0 && player.slingshotPath1XP >= slingshotP1T1UnlockXP) {
                        currentTower.upgradeTower(1); //Call add slingshot, buys a slingshot and lets user place it
                        updatePathText();
                    }
                    else if(currentTower.path1 === 1 && player.slingshotPath1XP >= slingshotP1T2UnlockXP) {
                        currentTower.upgradeTower(1); //Call add slingshot, buys a slingshot and lets user place it
                        updatePathText();
                    }
                    else if(currentTower.path1 === 2 && player.slingshotPath1XP >= slingshotP1T3UnlockXP) {
                        currentTower.upgradeTower(1); //Call add slingshot, buys a slingshot and lets user place it
                        updatePathText();
                    }
                    else if(currentTower.path1 === 3 && player.slingshotPath1XP >= slingshotP1T4UnlockXP) {
                        currentTower.upgradeTower(1); //Call add slingshot, buys a slingshot and lets user place it
                        updatePathText();
                    }
                }
                //If hammer tower
                if(currentTower.type === 2) {
                    if(currentTower.path1 === 0 && player.hammerPath1XP >= hammerP1T1UnlockXP) {
                        currentTower.upgradeTower(1); //Call add hammer, buys a hammer and lets user place it
                        updatePathText();
                    }
                    else if(currentTower.path1 === 1 && player.hammerPath1XP >= hammerP1T2UnlockXP) {
                        currentTower.upgradeTower(1); //Call add hammer, buys a hammer and lets user place it
                        updatePathText();
                    }
                    else if(currentTower.path1 === 2 && player.hammerPath1XP >= hammerP1T3UnlockXP) {
                        currentTower.upgradeTower(1); //Call add hammer, buys a hammer and lets user place it
                        updatePathText();
                    }
                    else if(currentTower.path1 === 3 && player.hammerPath1XP >= hammerP1T4UnlockXP) {
                        currentTower.upgradeTower(1); //Call add hammer, buys a hammer and lets user place it
                        updatePathText();
                    }
                }
                //If bug spray tower
                if(currentTower.type === 3) {
                    if(currentTower.path1 === 0 && player.bugSprayPath1XP >= bugSprayP1T1UnlockXP) {
                        currentTower.upgradeTower(1); //Call add bugSpray, buys a bug spray and lets user place it
                        updatePathText();
                    }
                    else if(currentTower.path1 === 1 && player.bugSprayPath1XP >= bugSprayP1T2UnlockXP) {
                        currentTower.upgradeTower(1); //Call add bugSpray, buys a bug spray and lets user place it
                        updatePathText();
                    }
                    else if(currentTower.path1 === 2 && player.bugSprayPath1XP >= bugSprayP1T3UnlockXP) {
                        currentTower.upgradeTower(1); //Call add bugSpray, buys a bug spray and lets user place it
                        updatePathText();
                    }
                    else if(currentTower.path1 === 3 && player.bugSprayPath1XP >= bugSprayP1T4UnlockXP) {
                        currentTower.upgradeTower(1); //Call add bugSpray, buys a bug spray and lets user place it
                        updatePathText();
                    }
                }
                //If magnifying glass tower
                if(currentTower.type === 4) {
                    if(currentTower.path1 === 0 && player.magnifyingGlassPath1XP >= magnifyingGlassP1T1UnlockXP) {
                        currentTower.upgradeTower(1); //Call add magnifyingGlass, buys a magnifying glass and lets user place it
                        updatePathText();
                    }
                    else if(currentTower.path1 === 1 && player.magnifyingGlassPath1XP >= magnifyingGlassP1T2UnlockXP) {
                        currentTower.upgradeTower(1); //Call add magnifyingGlass, buys a magnifying glass and lets user place it
                        updatePathText();
                    }
                    else if(currentTower.path1 === 2 && player.magnifyingGlassPath1XP >= magnifyingGlassP1T3UnlockXP) {
                        currentTower.upgradeTower(1); //Call add magnifyingGlass, buys a magnifying glass and lets user place it
                        updatePathText();
                    }
                    else if(currentTower.path1 === 3 && player.magnifyingGlassPath1XP >= magnifyingGlassP1T4UnlockXP) {
                        currentTower.upgradeTower(1); //Call add magnifyingGlass, buys a magnifying glass and lets user place it
                        updatePathText();
                    }
                }
                //If cannon tower
                if(currentTower.type === 5) {
                    if(currentTower.path1 === 0 && player.cannonPath1XP >= cannonP1T1UnlockXP) {
                        currentTower.upgradeTower(1); //Call add cannon, buys a cannon and lets user place it
                        updatePathText();
                    }
                    else if(currentTower.path1 === 1 && player.cannonPath1XP >= cannonP1T2UnlockXP) {
                        currentTower.upgradeTower(1); //Call add cannon, buys a cannon and lets user place it
                        updatePathText();
                    }
                    else if(currentTower.path1 === 2 && player.cannonPath1XP >= cannonP1T3UnlockXP) {
                        currentTower.upgradeTower(1); //Call add cannon, buys a cannon and lets user place it
                        updatePathText();
                    }
                    else if(currentTower.path1 === 3 && player.cannonPath1XP >= cannonP1T4UnlockXP) {
                        currentTower.upgradeTower(1); //Call add cannon, buys a cannon and lets user place it
                        updatePathText();
                    }
                }
                //If honey tower
                if(currentTower.type === 6) {
                    if(currentTower.path1 === 0 && player.honeyPath1XP >= honeyP1T1UnlockXP) {
                        currentTower.upgradeTower(1); //Call add honey, buys a honey and lets user place it
                        updatePathText();
                    }
                    else if(currentTower.path1 === 1 && player.honeyPath1XP >= honeyP1T2UnlockXP) {
                        currentTower.upgradeTower(1); //Call add honey, buys a honey and lets user place it
                        updatePathText();
                    }
                    else if(currentTower.path1 === 2 && player.honeyPath1XP >= honeyP1T3UnlockXP) {
                        currentTower.upgradeTower(1); //Call add honey, buys a honey and lets user place it
                        updatePathText();
                    }
                    else if(currentTower.path1 === 3 && player.honeyPath1XP >= honeyP1T4UnlockXP) {
                        currentTower.upgradeTower(1); //Call add honey, buys a honey and lets user place it
                        updatePathText();
                    }
                }
            }
        });

        path1Button.position.set(0, nextPath1Description.position.y-5); //Set position

        //PATH 2 CURRENT TIER TEXT-Follows same logic as above but for path 2------------------------------------------------
        currentPath2Description.text = currentTower.currentPath2DescriptionText;
        currentPath2Description.position.x = leftBarContainer.x+(leftBarContainer.width/2)-(currentPath2Description.width/2);
        currentPath2Description.position.y = path1Button.y+path1Button.height+5;

        if(currentTower.path1 > 2 && currentTower.path2 > 1) {
            nextPath2Description.text = "Cannot Upgrade";
        }
        else {
            if(!showPath2Green) {
                nextPath2Description.text = "Not Unlocked";
            }
            else {
                nextPath2Description.text = currentTower.nextPath2Description;
            }
        }
        nextPath2Description.position.x = (leftBarContainer.width/2)-(nextPath2Description.width/2);
        nextPath2Description.position.y = currentPath2Description.position.y+currentPath2Description.height+10;

        path2Button.removeAllListeners();

        if(player.gold >= currentTower.path2Cost && currentTower.path2 < 4 && nextPath2Description.text !== "Cannot Upgrade" && showPath2Green) {
            path2Button.clear();
            path2Button.beginFill(lightGreen); //Fill green
            path2Button.lineStyle(2, 0x000000); //Black stroke
            path2Button.drawRect(0, 0, leftBarContainer.width - 2, nextPath2Description.height + 10); //Draw it
        }
        else {
            path2Button.clear();
            path2Button.beginFill(lightGray); //Fill grey
            path2Button.lineStyle(2, 0x000000); //Black stroke
            path2Button.drawRect(0, 0, leftBarContainer.width - 2, nextPath2Description.height + 10); //Draw it
        }

        //When hovered
        path2Button.on("mouseover", () => {
            if(player.gold > currentTower.path2Cost && currentTower.path2 < 4 && nextPath2Description.text !== "Cannot Upgrade" && showPath2Green) {
                path2Button.clear(); //Clear the button
                path2Button.beginFill(darkGreen); //Fill dark green
                path2Button.lineStyle(2, 0x000000); //Black stroke
                path2Button.drawRect(0, 0, leftBarContainer.width - 2, nextPath2Description.height + 10); //Draw it
            }
            else {
                path2Button.clear(); //Clear the button
                path2Button.beginFill(lightGray); //Fill dark grey
                path2Button.lineStyle(2, 0x000000); //Black stroke
                path2Button.drawRect(0, 0, leftBarContainer.width - 2, nextPath2Description.height + 10); //Draw it
            }
        });

        //When mouse leaves button
        path2Button.on("mouseout", () => {
            if(player.gold > currentTower.path2Cost && currentTower.path2 < 4 && nextPath2Description.text !== "Cannot Upgrade" && showPath2Green) {
                path2Button.clear(); //Clear the button
                path2Button.beginFill(lightGreen); //Fill light green
                path2Button.lineStyle(2, 0x000000); //Black stroke
                path2Button.drawRect(0, 0, leftBarContainer.width - 2, nextPath2Description.height + 10); //Draw it
            }
            else {
                path2Button.clear(); //Clear the button
                path2Button.beginFill(lightGray); //Fill light grey
                path2Button.lineStyle(2, 0x000000); //Black stroke
                path2Button.drawRect(0, 0, leftBarContainer.width - 2, nextPath2Description.height + 10); //Draw it
            }
        });

        //When clicked
        path2Button.on("pointertap", () => {
            if(player.gold >= currentTower.path2Cost) {
                //If slingshot tower
                if(currentTower.type === 1) {
                    if(currentTower.path2 === 0 && player.slingshotPath2XP >= slingshotP2T1UnlockXP) {
                        currentTower.upgradeTower(2); //Call add slingshot, buys a slingshot and lets user place it
                        updatePathText();
                    }
                    else if(currentTower.path2 === 1 && player.slingshotPath2XP >= slingshotP2T2UnlockXP) {
                        currentTower.upgradeTower(2); //Call add slingshot, buys a slingshot and lets user place it
                        updatePathText();
                    }
                    else if(currentTower.path2 === 2 && player.slingshotPath2XP >= slingshotP2T3UnlockXP) {
                        currentTower.upgradeTower(2); //Call add slingshot, buys a slingshot and lets user place it
                        updatePathText();
                    }
                    else if(currentTower.path2 === 3 && player.slingshotPath2XP >= slingshotP2T4UnlockXP) {
                        currentTower.upgradeTower(2); //Call add slingshot, buys a slingshot and lets user place it
                        updatePathText();
                    }
                }
                //If hammer tower
                if(currentTower.type === 2) {
                    if(currentTower.path2 === 0 && player.hammerPath2XP >= hammerP2T1UnlockXP) {
                        currentTower.upgradeTower(2); //Call add hammer, buys a hammer and lets user place it
                        updatePathText();
                    }
                    else if(currentTower.path2 === 1 && player.hammerPath2XP >= hammerP2T2UnlockXP) {
                        currentTower.upgradeTower(2); //Call add hammer, buys a hammer and lets user place it
                        updatePathText();
                    }
                    else if(currentTower.path2 === 2 && player.hammerPath2XP >= hammerP2T3UnlockXP) {
                        currentTower.upgradeTower(2); //Call add hammer, buys a hammer and lets user place it
                        updatePathText();
                    }
                    else if(currentTower.path2 === 3 && player.hammerPath2XP >= hammerP2T4UnlockXP) {
                        currentTower.upgradeTower(2); //Call add hammer, buys a hammer and lets user place it
                        updatePathText();
                    }
                }
                //If bug spray tower
                if(currentTower.type === 3) {
                    if(currentTower.path2 === 0 && player.bugSprayPath2XP >= bugSprayP2T1UnlockXP) {
                        currentTower.upgradeTower(2); //Call add bugSpray, buys a bug spray and lets user place it
                        updatePathText();
                    }
                    else if(currentTower.path2 === 1 && player.bugSprayPath2XP >= bugSprayP2T2UnlockXP) {
                        currentTower.upgradeTower(2); //Call add bugSpray, buys a bug spray and lets user place it
                        updatePathText();
                    }
                    else if(currentTower.path2 === 2 && player.bugSprayPath2XP >= bugSprayP2T3UnlockXP) {
                        currentTower.upgradeTower(2); //Call add bugSpray, buys a bug spray and lets user place it
                        updatePathText();
                    }
                    else if(currentTower.path2 === 3 && player.bugSprayPath2XP >= bugSprayP2T4UnlockXP) {
                        currentTower.upgradeTower(2); //Call add bugSpray, buys a bug spray and lets user place it
                        updatePathText();
                    }
                }
                //If magnifying glass tower
                if(currentTower.type === 4) {
                    if(currentTower.path2 === 0 && player.magnifyingGlassPath2XP >= magnifyingGlassP2T1UnlockXP) {
                        currentTower.upgradeTower(2); //Call add magnifyingGlass, buys a magnifying glass and lets user place it
                        updatePathText();
                    }
                    else if(currentTower.path2 === 1 && player.magnifyingGlassPath2XP >= magnifyingGlassP2T2UnlockXP) {
                        currentTower.upgradeTower(2); //Call add magnifyingGlass, buys a magnifying glass and lets user place it
                        updatePathText();
                    }
                    else if(currentTower.path2 === 2 && player.magnifyingGlassPath2XP >= magnifyingGlassP2T3UnlockXP) {
                        currentTower.upgradeTower(2); //Call add magnifyingGlass, buys a magnifying glass and lets user place it
                        updatePathText();
                    }
                    else if(currentTower.path2 === 3 && player.magnifyingGlassPath2XP >= magnifyingGlassP2T4UnlockXP) {
                        currentTower.upgradeTower(2); //Call add magnifyingGlass, buys a magnifying glass and lets user place it
                        updatePathText();
                    }
                }
                //If cannon tower
                if(currentTower.type === 5) {
                    if(currentTower.path2 === 0 && player.cannonPath2XP >= cannonP2T1UnlockXP) {
                        currentTower.upgradeTower(2); //Call add cannon, buys a cannon and lets user place it
                        updatePathText();
                    }
                    else if(currentTower.path2 === 1 && player.cannonPath2XP >= cannonP2T2UnlockXP) {
                        currentTower.upgradeTower(2); //Call add cannon, buys a cannon and lets user place it
                        updatePathText();
                    }
                    else if(currentTower.path2 === 2 && player.cannonPath2XP >= cannonP2T3UnlockXP) {
                        currentTower.upgradeTower(2); //Call add cannon, buys a cannon and lets user place it
                        updatePathText();
                    }
                    else if(currentTower.path2 === 3 && player.cannonPath2XP >= cannonP2T4UnlockXP) {
                        currentTower.upgradeTower(2); //Call add cannon, buys a cannon and lets user place it
                        updatePathText();
                    }
                }
                //If honey tower
                if(currentTower.type === 6) {
                    if(currentTower.path2 === 0 && player.honeyPath2XP >= honeyP2T1UnlockXP) {
                        currentTower.upgradeTower(2); //Call add honey, buys a honey and lets user place it
                        updatePathText();
                    }
                    else if(currentTower.path2 === 1 && player.honeyPath2XP >= honeyP2T2UnlockXP) {
                        currentTower.upgradeTower(2); //Call add honey, buys a honey and lets user place it
                        updatePathText();
                    }
                    else if(currentTower.path2 === 2 && player.honeyPath2XP >= honeyP2T3UnlockXP) {
                        currentTower.upgradeTower(2); //Call add honey, buys a honey and lets user place it
                        updatePathText();
                    }
                    else if(currentTower.path2 === 3 && player.honeyPath2XP >= honeyP2T4UnlockXP) {
                        currentTower.upgradeTower(2); //Call add honey, buys a honey and lets user place it
                        updatePathText();
                    }
                }
            }
        });

        path2Button.position.set(0,nextPath2Description.position.y-5); //Set position
    }

    //updateTowerButtonCostText() function - Updates the cost of each tower button (depends on the difficulty level chosen)
    function updateTowerButtonCostText() {
        slingshotCostText.text = slingshotCost + " gold";
        hammerCostText.text = hammerCost + " gold";
        bugSprayCostText.text = bugSprayCost + " gold";
        magnifyingGlassCostText.text = magnifyingGlassCost + " gold";
        cannonCostText.text = cannonCost + " gold";
        honeyCostText.text = honeyCost + " gold";
    }

    //target(string) function - Accepts a string and sets the currently selected tower's target priority to the string. "first", "last", "strongest", "closest"
    function target(string) {
        currentTower.targetPriority = string; //Set the targetPriority string of the tower
    }

    //hideInfoBar() function - Hides the info bar
    function hideInfoBar() {
        showTowerBarButtons(); //Show the tower bar buttons
        infoBarContainer.visible = false; //Hide it
    }

    //showInfoBar() function - Shows the info bar
    function showInfoBar() {
        hideTowerBarButtons(); //Hide the tower bar buttons
        infoBarContainer.visible = true; //Show it
        updateInfoBar(); //Update the info bar
    }

    //resetInfoBar() function - Resets the info bar to default
    function resetInfoBar() {
        //"FIRST" target button
        //Info bar target first button
        targetFirstButton.beginFill(0xdddddd); //Fill grey
        targetFirstButton.lineStyle(2, 0x000000); //Black stroke
        targetFirstButton.drawRect(0, 0, (leftBarContainer.width/2)-2, 35); //Draw it

        //When hovered
        targetFirstButton.on("mouseover", () => {
            targetFirstButton.clear(); //Clear the button
            targetFirstButton.beginFill(0xbbbbbb); //Fill dark grey
            targetFirstButton.lineStyle(2, 0x000000); //Black stroke
            targetFirstButton.drawRect(0, 0, (leftBarContainer.width/2)-2, 35); //Draw it
        });

        //When mouse leaves button
        targetFirstButton.on("mouseout", () => {
            targetFirstButton.clear(); //Clear the button
            targetFirstButton.beginFill(0xdddddd); //Fill light grey
            targetFirstButton.lineStyle(2, 0x000000); //Black stroke
            targetFirstButton.drawRect(0, 0, (leftBarContainer.width/2)-2, 35); //Draw it
        });

        //When clicked
        targetFirstButton.on("pointertap", () => {
            target("first"); //Target first ant
            updateInfoBar(); //Update the info bar
        });

        //"LAST" target button
        //Info bar target last button
        targetLastButton.beginFill(0xdddddd); //Fill grey
        targetLastButton.lineStyle(2, 0x000000); //Black stroke
        targetLastButton.drawRect(0, 0, (leftBarContainer.width/2), 35); //Draw it

        //When hovered
        targetLastButton.on("mouseover", () => {
            targetLastButton.clear(); //Clear the button
            targetLastButton.beginFill(0xbbbbbb); //Fill dark grey
            targetLastButton.lineStyle(2, 0x000000); //Black stroke
            targetLastButton.drawRect(0, 0, (leftBarContainer.width/2), 35); //Draw it
        });

        //When mouse leaves button
        targetLastButton.on("mouseout", () => {
            targetLastButton.clear(); //Clear the button
            targetLastButton.beginFill(0xdddddd); //Fill light grey
            targetLastButton.lineStyle(2, 0x000000); //Black stroke
            targetLastButton.drawRect(0, 0, (leftBarContainer.width/2), 35); //Draw it
        });

        //When clicked
        targetLastButton.on("pointertap", () => {
            target("last"); //Target last ant
            updateInfoBar(); //Update the info bar
        });

        //"CLOSEST" target button
        //Info bar target first button
        targetClosestButton.beginFill(0xdddddd); //Fill grey
        targetClosestButton.lineStyle(2, 0x000000); //Black stroke
        targetClosestButton.drawRect(0, 0, (leftBarContainer.width/2)-2, 35); //Draw it

        //When hovered
        targetClosestButton.on("mouseover", () => {
            targetClosestButton.clear(); //Clear the button
            targetClosestButton.beginFill(0xbbbbbb); //Fill dark grey
            targetClosestButton.lineStyle(2, 0x000000); //Black stroke
            targetClosestButton.drawRect(0, 0, (leftBarContainer.width/2)-2, 35); //Draw it
        });

        //When mouse leaves button
        targetClosestButton.on("mouseout", () => {
            targetClosestButton.clear(); //Clear the button
            targetClosestButton.beginFill(0xdddddd); //Fill light grey
            targetClosestButton.lineStyle(2, 0x000000); //Black stroke
            targetClosestButton.drawRect(0, 0, (leftBarContainer.width/2)-2, 35); //Draw it
        });

        //When clicked
        targetClosestButton.on("pointertap", () => {
            target("closest"); //Target closest ant
            updateInfoBar(); //Update the info bar
        });

        //"STRONGEST" target button
        //Info bar target first button
        targetStrongestButton.beginFill(0xdddddd); //Fill grey
        targetStrongestButton.lineStyle(2, 0x000000); //Black stroke
        targetStrongestButton.drawRect(0, 0, (leftBarContainer.width/2), 35); //Draw it

        //When hovered
        targetStrongestButton.on("mouseover", () => {
            targetStrongestButton.clear(); //Clear the button
            targetStrongestButton.beginFill(0xbbbbbb); //Fill dark grey
            targetStrongestButton.lineStyle(2, 0x000000); //Black stroke
            targetStrongestButton.drawRect(0, 0, (leftBarContainer.width/2), 35); //Draw it
        });

        //When mouse leaves button
        targetStrongestButton.on("mouseout", () => {
            targetStrongestButton.clear(); //Clear the button
            targetStrongestButton.beginFill(0xdddddd); //Fill light grey
            targetStrongestButton.lineStyle(2, 0x000000); //Black stroke
            targetStrongestButton.drawRect(0, 0, (leftBarContainer.width/2), 35); //Draw it
        });

        //When clicked
        targetStrongestButton.on("pointertap", () => {
            target("strongest"); //Target strongest ant
            updateInfoBar(); //Update the info bar
        });
    }

    //updateInfoBar() function - Updates the info bar
    function updateInfoBar() {
        currentTowerText.text = currentTower.name; //Update the upgrade tower title text
        currentTowerText.position.x = infoSellButton.x+(infoSellButton.width/2)-(currentTowerText.width/2); //Set x position

        updatePathText(); //Update the path text
        resetInfoBar(); //Reset the info bar

        //If targetPriority is set to "first"
        if(currentTower.targetPriority === "first") {
            targetFirstButton.removeAllListeners(); //Remove listeners
            targetFirstButton.clear(); //Clear the button
            targetFirstButton.beginFill(0xafffaf); //Fill dark grey
            targetFirstButton.lineStyle(2, 0x000000); //Black stroke
            targetFirstButton.drawRect(0, 0, (leftBarContainer.width/2)-2, 35); //Draw it

            //When hovered
            targetFirstButton.on("mouseover", () => {
                targetFirstButton.clear(); //Clear the button
                targetFirstButton.beginFill(0xafffaf); //Fill dark grey
                targetFirstButton.lineStyle(2, 0x000000); //Black stroke
                targetFirstButton.drawRect(0, 0, (leftBarContainer.width/2)-2, 35); //Draw it
            });

            //When mouse leaves button
            targetFirstButton.on("mouseout", () => {
                targetFirstButton.clear(); //Clear the button
                targetFirstButton.beginFill(0xafffaf); //Fill light grey
                targetFirstButton.lineStyle(2, 0x000000); //Black stroke
                targetFirstButton.drawRect(0, 0, (leftBarContainer.width/2)-2, 35); //Draw it
            });

            //When clicked
            targetFirstButton.on("pointertap", () => {
                target("first"); //Target first ant
            });
        }

        //If targetPriority is set to "last"
        if(currentTower.targetPriority === "last") {
            targetLastButton.removeAllListeners(); //Remove listeners
            targetLastButton.clear(); //Clear the button
            targetLastButton.beginFill(0xafffaf); //Fill dark grey
            targetLastButton.lineStyle(2, 0x000000); //Black stroke
            targetLastButton.drawRect(0, 0, (leftBarContainer.width/2), 35); //Draw it

            //When hovered
            targetLastButton.on("mouseover", () => {
                targetLastButton.clear(); //Clear the button
                targetLastButton.beginFill(0xafffaf); //Fill dark grey
                targetLastButton.lineStyle(2, 0x000000); //Black stroke
                targetLastButton.drawRect(0, 0, (leftBarContainer.width/2), 35); //Draw it
            });

            //When mouse leaves button
            targetLastButton.on("mouseout", () => {
                targetLastButton.clear(); //Clear the button
                targetLastButton.beginFill(0xafffaf); //Fill light grey
                targetLastButton.lineStyle(2, 0x000000); //Black stroke
                targetLastButton.drawRect(0, 0, (leftBarContainer.width/2), 35); //Draw it
            });

            //When clicked
            targetLastButton.on("pointertap", () => {
                target("last"); //Target last ant
            });
        }

        //If targetPriority is set to "closest"
        if(currentTower.targetPriority === "closest") {
            targetClosestButton.removeAllListeners(); //Remove listeners
            targetClosestButton.clear(); //Clear the button
            targetClosestButton.beginFill(0xafffaf); //Fill dark grey
            targetClosestButton.lineStyle(2, 0x000000); //Black stroke
            targetClosestButton.drawRect(0, 0, (leftBarContainer.width/2)-2, 35); //Draw it

            //When hovered
            targetClosestButton.on("mouseover", () => {
                targetClosestButton.clear(); //Clear the button
                targetClosestButton.beginFill(0xafffaf); //Fill dark grey
                targetClosestButton.lineStyle(2, 0x000000); //Black stroke
                targetClosestButton.drawRect(0, 0, (leftBarContainer.width/2)-2, 35); //Draw it
            });

            //When mouse leaves button
            targetClosestButton.on("mouseout", () => {
                targetClosestButton.clear(); //Clear the button
                targetClosestButton.beginFill(0xafffaf); //Fill light grey
                targetClosestButton.lineStyle(2, 0x000000); //Black stroke
                targetClosestButton.drawRect(0, 0, (leftBarContainer.width/2)-2, 35); //Draw it
            });

            //When clicked
            targetClosestButton.on("pointertap", () => {
                target("closest"); //Target closest ant
            });

        }

        //If targetPriority is set to "strongest"
        if(currentTower.targetPriority === "strongest") {
            targetStrongestButton.removeAllListeners(); //Remove listeners
            targetStrongestButton.clear(); //Clear the button
            targetStrongestButton.beginFill(0xafffaf); //Fill dark grey
            targetStrongestButton.lineStyle(2, 0x000000); //Black stroke
            targetStrongestButton.drawRect(0, 0, (leftBarContainer.width/2), 35); //Draw it

            //When hovered
            targetStrongestButton.on("mouseover", () => {
                targetStrongestButton.clear(); //Clear the button
                targetStrongestButton.beginFill(0xafffaf); //Fill dark grey
                targetStrongestButton.lineStyle(2, 0x000000); //Black stroke
                targetStrongestButton.drawRect(0, 0, (leftBarContainer.width/2), 35); //Draw it
            });

            //When mouse leaves button
            targetStrongestButton.on("mouseout", () => {
                targetStrongestButton.clear(); //Clear the button
                targetStrongestButton.beginFill(0xafffaf); //Fill light grey
                targetStrongestButton.lineStyle(2, 0x000000); //Black stroke
                targetStrongestButton.drawRect(0, 0, (leftBarContainer.width/2), 35); //Draw it
            });

            //When clicked
            targetStrongestButton.on("pointertap", () => {
                target("strongest"); //Target strongest ant
            });
        }
    }

    //logIn() function - Sets booleans to show user is logged in and it is not a guest, updates the tower menu info and enables debugging mode if admin user (userId 1)
    function logIn() {
        loggedIn = true; //They are logged in
        guest = false; //They are not a guest
        updateTowerMenuTiers(); //Update the tower menu info
        //If user 1 (admin)
        if(player.id == 1) {
            debugMode = true; //Turn on debug mode, allows for incrementing health and money while playing
        }
        //Else, not admin do not enable debug mode
        else {
            debugMode = false; //Do not enable debug mode
        }
    }

    //logOut() function - Sets booleans to show user is logged out, updates player object to be a guest, clears cookies, restarts game
    function logOut() {
        loggedIn = false; //Player is logged out
        player = guestPlayer; //Update player object to "guest"
        hideLoggedInMenu(); //Hide the loggedIn menu
        quitGame(); //Quit the game/restart
        document.cookie = ""; //Clear the user's cookies so they will not be remembered/auth session is over
    }

    //setWindmill(string) function - Sets the windmill's material. "wood", "stone", "concrete", "steel"
    function setWindmill(string) {
        //If wood passed
        if(string === "wood") {
            windmill = 1; //Set to wood
        }
        //If stone passed
        if(string === "stone") {
            windmill = 2; //Set to stone
        }
        //If concrete passed
        if(string === "concrete") {
            windmill = 3; //Set to concrete
        }
        //If steel
        if(string === "steel") {
            windmill = 4; //Set to steel
        }
        player.windmillSetting = windmill; //Update the windmill setting to selected material
    }

    //hidePlayScreen() function - Hides the play screen
    function hidePlayScreen() {
        playing = false;
        levelContainerBG.visible = false; //Hide it
        waveContainer.visible = false; //Hide it
        towersContainer.visible = false; //Hide it
        projectileContainer.visible = false; //Hide it
        windmillContainer.visible = false; //Hide it
        levelContainerFG.visible = false; //Hide it
        leftBarContainer.visible = false; //Hide it
        infoBarContainer.visible = false; //Hide it
        leftBarTowerSpritesContainer.visible = false; //Hide it
        topBarContainer.visible = false; //Hide it
    }

    //showPlayScreen() function - Shows the play screen
    function showPlayScreen() {
        playing = true;
        levelContainerBG.visible = true; //Show it
        waveContainer.visible = true; //Show it
        towersContainer.visible = true; //Show it
        projectileContainer.visible = true; //Show it
        windmillContainer.visible = true; //Show it
        levelContainerFG.visible = true; //Show it
        leftBarContainer.visible = true; //Show it
        infoBarContainer.visible = false; //Hide it
        leftBarTowerSpritesContainer.visible = true; //Show it
        topBarContainer.visible = true; //Show it
    }

    //hideMainMenu() function - Hides the main menu
    function hideMainMenu() {
        titleMenuTitle.visible = false; //Hide it
        titleMenuDescription.visible = false; //Hide it
        titleMenuSignUpButton.visible = false; //Hide it
        titleMenuSignUpButtonText.visible = false; //Hide it
        titleMenuGuestButton.visible = false; //Hide it
        titleMenuGuestButtonText.visible = false; //Hide it
        titleMenuLoginButton.visible = false; //Hide it
        titleMenuLoginButtonText.visible = false; //Hide it
    }

    //showMainMenu() function - Shows the main menu
    function showMainMenu() {
        titleMenuTitle.visible = true; //Show it
        titleMenuDescription.visible = true; //Show it
        titleMenuSignUpButton.visible = true; //Show it
        titleMenuSignUpButtonText.visible = true; //Show it
        titleMenuGuestButton.visible = true; //Show it
        titleMenuGuestButtonText.visible = true; //Show it
        titleMenuLoginButton.visible = true; //Show it
        titleMenuLoginButtonText.visible = true; //Show it
        keyInputEnabled = false; //If user keyboard input should be captured to control the game
    }

    //hideLoggedInMenu() function - Hides the logged in menu
    function hideLoggedInMenu() {
        loggedInMenuTitle.visible = false; //Hide it
        loggedInMenuWindmillButton.visible = false; //Hide it
        loggedInMenuWindmillButtonText.visible = false; //Hide it
        loggedInMenuTowersButton.visible = false; //Hide it
        loggedInMenuTowersButtonText.visible = false; //Hide it
        loggedInMenuPlayButton.visible = false; //Hide it
        loggedInMenuPlayButtonText.visible = false; //Hide it
        loggedInMenuLogOutButton.visible = false; //Hide it
        loggedInMenuLogOutButtonText.visible = false; //Hide it
    }

    //showLoggedInMenu() function - Shows the logged in menu
    function showLoggedInMenu() {
        keyInputEnabled = true; //Start capturing keyboard input for game control
        //If the player has logged in before
        if(player.firstLogin == 0) {
            loggedInMenuTitle.text = "Welcome back, " + player.username + "!"; //Welcome them back
        }
        //Else, this is the user's first time
        else {
            loggedInMenuTitle.text = "Welcome, " + player.username + "!"; //Welcome them
            player.firstLogin = 0; //Update firstLoging
            updatePlayerStats(); //Update database
        }
        loggedInMenuTitle.x = (appWidth/2)-(loggedInMenuTitle.width/2); //x position
        loggedInMenuTitle.y = (loggedInMenuTitle.height); //y position
        loggedInMenuTitle.visible = true; //Show it
        loggedInMenuWindmillButton.visible = true; //Show it
        loggedInMenuWindmillButtonText.visible = true; //Show it
        loggedInMenuTowersButton.visible = true; //Show it
        loggedInMenuTowersButtonText.visible = true; //Show it
        loggedInMenuPlayButton.visible = true; //Show it
        loggedInMenuPlayButtonText.visible = true; //Show it
        loggedInMenuLogOutButton.visible = true; //Show it
        loggedInMenuLogOutButtonText.visible = true; //Show it
    }

    //updateWindmillButtons() function - Updates the windmill buttons. Enables those they user has unlocked, disables those they have not
    function updateWindmillButtons() {
        windmillMenuWoodButton.alpha = 0.5; //Set alpha to .5
        //If the player has 50,000XP, they can choose stone
        if(player.xp >= 50000) {
            windmillMenuStoneButton.interactive = true; //Make interactive
            windmillMenuStoneButton.buttonMode = true; //Make button
            windmillMenuStoneButton.alpha = 0.5; //Set alpha to .5
        }
        //Else, the user hasn't unlocked stone
        else {
            windmillMenuStoneButtonText.text = "Stone\nUnlocked at 50,000 XP"; //Tell user how much XP is needed
            windmillMenuStoneButtonText.position.x = windmillMenuStoneButton.x+(windmillMenuStoneButton.width/2)-(windmillMenuStoneButtonText.width/2); //Set x position
            windmillMenuStoneButtonText.position.y = windmillMenuStoneButton.y+(windmillMenuStoneButton.height/2)-(windmillMenuStoneButtonText.height/2); //Set y position
            windmillMenuStoneButton.alpha = 0.1; //Set alpha to .1
        }
        //If the player has 125,000XP, they can choose concrete
        if(player.xp >= 125000) {
            windmillMenuConcreteButton.interactive = true; //Make interactive
            windmillMenuConcreteButton.buttonMode = true; //Make interactive
            windmillMenuConcreteButton.alpha = 0.5; //Set alpha to .5
        }
        //Else, the user hasn't unlocked concrete
        else {
            windmillMenuConcreteButtonText.text = "Concrete\nUnlocked at 125,000 XP"; //Tell user how much XP is needed
            windmillMenuConcreteButtonText.position.x = windmillMenuConcreteButton.x+(windmillMenuConcreteButton.width/2)-(windmillMenuConcreteButtonText.width/2); //Set x position
            windmillMenuConcreteButtonText.position.y = windmillMenuConcreteButton.y+(windmillMenuConcreteButton.height/2)-(windmillMenuConcreteButtonText.height/2); //Set y position
            windmillMenuConcreteButton.alpha = 0.1; //Set alpha to .1
        }
        //If the player has 250,000XP, they can choose steel
        if(player.xp >= 250000) {
            windmillMenuSteelButton.interactive = true; //Make interactive
            windmillMenuSteelButton.buttonMode = true; //Make interactive
            windmillMenuSteelButton.alpha = 0.5; //Set alpha to .5
        }
        //Else, the user hasn't unlocked steel
        else {
            windmillMenuSteelButtonText.text = "Steel\nUnlocked at 250,000 XP"; //Tell user how much XP is needed
            windmillMenuSteelButtonText.position.x = windmillMenuSteelButton.x+(windmillMenuSteelButton.width/2)-(windmillMenuSteelButtonText.width/2); //Set x position
            windmillMenuSteelButtonText.position.y = windmillMenuSteelButton.y+(windmillMenuSteelButton.height/2)-(windmillMenuSteelButtonText.height/2); //Set y position
            windmillMenuSteelButton.alpha = 0.1; //Set alpha to .1
        }
    }

    //hideWindmillMenu() function - Hide the windmill menu
    function hideWindmillMenu() {
        windmillMenuTitle.visible = false; //Hide it
        windmillMenuDescription.visible = false; //Hide it
        windmillMenuWoodButton.visible = false; //Hide it
        windmillMenuWoodButtonText.visible = false; //Hide it
        windmillMenuStoneButton.visible = false; //Hide it
        windmillMenuStoneButtonText.visible = false; //Hide it
        windmillMenuConcreteButton.visible = false; //Hide it
        windmillMenuConcreteButtonText.visible = false; //Hide it
        windmillMenuSteelButton.visible = false; //Hide it
        windmillMenuSteelButtonText.visible = false; //Hide it
        windmillMenuBackButton.visible = false; //Hide it
        windmillMenuBackButton.visible = false; //Hide it
        windmillMenuBackButtonText.visible = false; //Hide it
    }

    //showWindmillMenu() function - Show the windmill menu
    function showWindmillMenu() {
        windmillMenuDescription.text = "Your XP: " + player.xp +"xp"; //Update the XP
        windmillMenuDescription.x = (appWidth/2)-(windmillMenuDescription.width/2); //x position
        windmillMenuDescription.y = (windmillMenuTitle.y+windmillMenuTitle.height+5); //y position
        windmillMenuTitle.visible = true; //Show it
        windmillMenuDescription.visible = true; //Show it
        windmillMenuWoodButton.visible = true; //Show it
        windmillMenuWoodButtonText.visible = true; //Show it
        windmillMenuStoneButton.visible = true; //Show it
        windmillMenuStoneButtonText.visible = true; //Show it
        windmillMenuConcreteButton.visible = true; //Show it
        windmillMenuConcreteButtonText.visible = true; //Show it
        windmillMenuSteelButton.visible = true; //Show it
        windmillMenuSteelButtonText.visible = true; //Show it
        windmillMenuBackButton.visible = true; //Show it
        windmillMenuBackButtonText.visible = true; //Show it
        updateWindmillButtons(); //Update the windmill buttons
        //Update selected windmill button to be alpha 1
        //If wood
        if(windmill == 1) {
            windmillMenuWoodButton.alpha = 1; //Set alpha 1
        }
        //If stone
        if(windmill == 2) {
            windmillMenuStoneButton.alpha = 1; //Set alpha 1
        }
        //If concrete
        if(windmill == 3) {
            windmillMenuConcreteButton.alpha = 1; //Set alpha 1
        }
        //If steel
        if(windmill == 4) {
            windmillMenuSteelButton.alpha = 1; //Set alpha 1
        }
    }

    //hideTowersMenu() function - Hide the towers menu
    function hideTowersMenu() {
        towersMenuTitle.visible = false; //Hide it
        towersMenuSlingshotImage.visible = false; //Hide it
        towersMenuHammerImage.visible = false; //Hide it
        towersMenuBugSprayImage.visible = false; //Hide it
        towersMenuMagnifyingGlassImage.visible = false; //Hide it
        towersMenuCannonImage.visible = false; //Hide it
        towersMenuHoneyImage.visible = false; //Hide it
        towersMenuSlingshotText.visible = false; //Hide it
        towersMenuHammerText.visible = false; //Hide it
        towersMenuBugSprayText.visible = false; //Hide it
        towersMenuMagnifyingGlassText.visible = false; //Hide it
        towersMenuCannonText.visible = false; //Hide it
        towersMenuHoneyText.visible = false; //Hide it
        towersMenuSlingshotTierText.visible = false; //Hide it
        towersMenuHammerTierText.visible = false; //Hide it
        towersMenuBugSprayTierText.visible = false; //Hide it
        towersMenuMagnifyingGlassTierText.visible = false; //Hide it
        towersMenuCannonTierText.visible = false; //Hide it
        towersMenuHoneyTierText.visible = false; //Hide it
        towersMenuBackButton.visible = false; //Hide it
        towersMenuBackButtonText.visible = false; //Hide it
        towersMenuSlingshotImage.hide(); //Hide image
        towersMenuHammerImage.hide(); //Hide image
        towersMenuBugSprayImage.hide(); //Hide image
        towersMenuMagnifyingGlassImage.hide(); //Hide image
        towersMenuCannonImage.hide(); //Hide image
        towersMenuHoneyImage.hide(); //Hide image
    }

    //showTowersMenu() function - Shows the towers menu
    function showTowersMenu() {
        updateTowerMenuTiers(); //Update the towers menu tiers

        //String variables that hold relevant text for path progression
        let slingshotLine1;
        let slingshotLine2;
        let hammerLine1;
        let hammerLine2;
        let bugSprayLine1;
        let bugSprayLine2;
        let magnifyingGlassLine1;
        let magnifyingGlassLine2;
        let cannonLine1;
        let cannonLine2;
        let honeyLine1;
        let honeyLine2;

        //Show the tower images
        towersMenuSlingshotImage.show();
        towersMenuHammerImage.show();
        towersMenuBugSprayImage.show();
        towersMenuMagnifyingGlassImage.show();
        towersMenuCannonImage.show();
        towersMenuHoneyImage.show();

        //Create slingshot string
        //If on path 1 tier 0
        if(slingshotP1Num === 0) {
            slingshotLine1 = "Path 1: " + (slingshotP1T1UnlockXP-player.slingshotPath1XP) + " XP until tier 1\n"; //Set string to show amount of XP left to next tier
        }
        //If on path 2 tier 0
        if(slingshotP2Num === 0) {
            slingshotLine2 = "Path 2: " + (slingshotP2T1UnlockXP-player.slingshotPath2XP) + " XP until tier 1"; //Set string to show amount of XP left to next tier
        }
        //If on path 1 tier 1
        if(slingshotP1Num === 1) {
            slingshotLine1 = "Path 1: " + (slingshotP1T2UnlockXP-player.slingshotPath1XP) + " XP until tier 2\n"; //Set string to show amount of XP left to next tier
        }
        //If on path 2 tier 1
        if(slingshotP2Num === 1) {
            slingshotLine2 = "Path 2: " + (slingshotP2T2UnlockXP-player.slingshotPath2XP) + " XP until tier 2"; //Set string to show amount of XP left to next tier
        }
        //If on path 1 tier 2
        if(slingshotP1Num === 2) {
            slingshotLine1 = "Path 1: " + (slingshotP1T3UnlockXP-player.slingshotPath1XP) + " XP until tier 3\n"; //Set string to show amount of XP left to next tier
        }
        //If on path 2 tier 2
        if(slingshotP2Num === 2) {
            slingshotLine2 = "Path 2: " + (slingshotP2T3UnlockXP-player.slingshotPath2XP) + " XP until tier 3"; //Set string to show amount of XP left to next tier
        }
        //If on path 1 tier 3
        if(slingshotP1Num === 3) {
            slingshotLine1 = "Path 1: " + (slingshotP1T4UnlockXP-player.slingshotPath1XP) + " XP until tier 4\n"; //Set string to show amount of XP left to next tier
        }
        //If on path 2 tier 3
        if(slingshotP2Num === 3) {
            slingshotLine2 = "Path 2: " + (slingshotP2T4UnlockXP-player.slingshotPath2XP) + " XP until tier 4"; //Set string to show amount of XP left to next tier
        }
        //If on path 1 tier 4
        if(slingshotP1Num === 4) {
            slingshotLine1 = "Path 1: fully unlocked!\n"; //Set string to show path is fully unlocked
        }
        //If on path 2 tier 4
        if(slingshotP2Num === 4) {
            slingshotLine2 = "Path 2: fully unlocked!"; //Set string to show path is fully unlocked
        }

        //Create hammer string - Same logic as above
        if(hammerP1Num === 0) {
            hammerLine1 = "Path 1: " + (hammerP1T1UnlockXP-player.hammerPath1XP) + " XP until tier 1\n";
        }
        if(hammerP2Num === 0) {
            hammerLine2 = "Path 2: " + (hammerP2T1UnlockXP-player.hammerPath2XP) + " XP until tier 1";
        }
        if(hammerP1Num === 1) {
            hammerLine1 = "Path 1: " + (hammerP1T2UnlockXP-player.hammerPath1XP) + " XP until tier 2\n";
        }
        if(hammerP2Num === 1) {
            hammerLine2 = "Path 2: " + (hammerP2T2UnlockXP-player.hammerPath2XP) + " XP until tier 2";
        }
        if(hammerP1Num === 2) {
            hammerLine1 = "Path 1: " + (hammerP1T3UnlockXP-player.hammerPath1XP) + " XP until tier 3\n";
        }
        if(hammerP2Num === 2) {
            hammerLine2 = "Path 2: " + (hammerP2T3UnlockXP-player.hammerPath2XP) + " XP until tier 3";
        }
        if(hammerP1Num === 3) {
            hammerLine1 = "Path 1: " + (hammerP1T4UnlockXP-player.hammerPath1XP) + " XP until tier 4\n";
        }
        if(hammerP2Num === 3) {
            hammerLine2 = "Path 2: " + (hammerP2T4UnlockXP-player.hammerPath2XP) + " XP until tier 4";
        }
        if(hammerP1Num === 4) {
            hammerLine1 = "Path 1: fully unlocked!\n";
        }
        if(hammerP2Num === 4) {
            hammerLine2 = "Path 2: fully unlocked!";
        }

        //Create bugSpray string - Same logic as above
        if(bugSprayP1Num === 0) {
            bugSprayLine1 = "Path 1: " + (bugSprayP1T1UnlockXP-player.bugSprayPath1XP) + " XP until tier 1\n";
        }
        if(bugSprayP2Num === 0) {
            bugSprayLine2 = "Path 2: " + (bugSprayP2T1UnlockXP-player.bugSprayPath2XP) + " XP until tier 1";
        }
        if(bugSprayP1Num === 1) {
            bugSprayLine1 = "Path 1: " + (bugSprayP1T2UnlockXP-player.bugSprayPath1XP) + " XP until tier 2\n";
        }
        if(bugSprayP2Num === 1) {
            bugSprayLine2 = "Path 2: " + (bugSprayP2T2UnlockXP-player.bugSprayPath2XP) + " XP until tier 2";
        }
        if(bugSprayP1Num === 2) {
            bugSprayLine1 = "Path 1: " + (bugSprayP1T3UnlockXP-player.bugSprayPath1XP) + " XP until tier 3\n";
        }
        if(bugSprayP2Num === 2) {
            bugSprayLine2 = "Path 2: " + (bugSprayP2T3UnlockXP-player.bugSprayPath2XP) + " XP until tier 3";
        }
        if(bugSprayP1Num === 3) {
            bugSprayLine1 = "Path 1: " + (bugSprayP1T4UnlockXP-player.bugSprayPath1XP) + " XP until tier 4\n";
        }
        if(bugSprayP2Num === 3) {
            bugSprayLine2 = "Path 2: " + (bugSprayP2T4UnlockXP-player.bugSprayPath2XP) + " XP until tier 4";
        }
        if(bugSprayP1Num === 4) {
            bugSprayLine1 = "Path 1: fully unlocked!\n";
        }
        if(bugSprayP2Num === 4) {
            bugSprayLine2 = "Path 2: fully unlocked!";
        }

        //Create magnifyingGlass string - Same logic as above
        if(magnifyingGlassP1Num === 0) {
            magnifyingGlassLine1 = "Path 1: " + (magnifyingGlassP1T1UnlockXP-player.magnifyingGlassPath1XP) + " XP until tier 1\n";
        }
        if(magnifyingGlassP2Num === 0) {
            magnifyingGlassLine2 = "Path 2: " + (magnifyingGlassP2T1UnlockXP-player.magnifyingGlassPath2XP) + " XP until tier 1";
        }
        if(magnifyingGlassP1Num === 1) {
            magnifyingGlassLine1 = "Path 1: " + (magnifyingGlassP1T2UnlockXP-player.magnifyingGlassPath1XP) + " XP until tier 2\n";
        }
        if(magnifyingGlassP2Num === 1) {
            magnifyingGlassLine2 = "Path 2: " + (magnifyingGlassP2T2UnlockXP-player.magnifyingGlassPath2XP) + " XP until tier 2";
        }
        if(magnifyingGlassP1Num === 2) {
            magnifyingGlassLine1 = "Path 1: " + (magnifyingGlassP1T3UnlockXP-player.magnifyingGlassPath1XP) + " XP until tier 3\n";
        }
        if(magnifyingGlassP2Num === 2) {
            magnifyingGlassLine2 = "Path 2: " + (magnifyingGlassP2T3UnlockXP-player.magnifyingGlassPath2XP) + " XP until tier 3";
        }
        if(magnifyingGlassP1Num === 3) {
            magnifyingGlassLine1 = "Path 1: " + (magnifyingGlassP1T4UnlockXP-player.magnifyingGlassPath1XP) + " XP until tier 4\n";
        }
        if(magnifyingGlassP2Num === 3) {
            magnifyingGlassLine2 = "Path 2: " + (magnifyingGlassP2T4UnlockXP-player.magnifyingGlassPath2XP) + " XP until tier 4";
        }
        if(magnifyingGlassP1Num === 4) {
            magnifyingGlassLine1 = "Path 1: fully unlocked!\n";
        }
        if(magnifyingGlassP2Num === 4) {
            magnifyingGlassLine2 = "Path 2: fully unlocked!";
        }

        //Create cannon string - Same logic as above
        if(cannonP1Num === 0) {
            cannonLine1 = "Path 1: " + (cannonP1T1UnlockXP-player.cannonPath1XP) + " XP until tier 1\n";
        }
        if(cannonP2Num === 0) {
            cannonLine2 = "Path 2: " + (cannonP2T1UnlockXP-player.cannonPath2XP) + " XP until tier 1";
        }
        if(cannonP1Num === 1) {
            cannonLine1 = "Path 1: " + (cannonP1T2UnlockXP-player.cannonPath1XP) + " XP until tier 2\n";
        }
        if(cannonP2Num === 1) {
            cannonLine2 = "Path 2: " + (cannonP2T2UnlockXP-player.cannonPath2XP) + " XP until tier 2";
        }
        if(cannonP1Num === 2) {
            cannonLine1 = "Path 1: " + (cannonP1T3UnlockXP-player.cannonPath1XP) + " XP until tier 3\n";
        }
        if(cannonP2Num === 2) {
            cannonLine2 = "Path 2: " + (cannonP2T3UnlockXP-player.cannonPath2XP) + " XP until tier 3";
        }
        if(cannonP1Num === 3) {
            cannonLine1 = "Path 1: " + (cannonP1T4UnlockXP-player.cannonPath1XP) + " XP until tier 4\n";
        }
        if(cannonP2Num === 3) {
            cannonLine2 = "Path 2: " + (cannonP2T4UnlockXP-player.cannonPath2XP) + " XP until tier 4";
        }
        if(cannonP1Num === 4) {
            cannonLine1 = "Path 1: fully unlocked!\n";
        }
        if(cannonP2Num === 4) {
            cannonLine2 = "Path 2: fully unlocked!";
        }

        //Create honey string - Same logic as above
        if(honeyP1Num === 0) {
            honeyLine1 = "Path 1: " + (honeyP1T1UnlockXP-player.honeyPath1XP) + " XP until tier 1\n";
        }
        if(honeyP2Num === 0) {
            honeyLine2 = "Path 2: " + (honeyP2T1UnlockXP-player.honeyPath2XP) + " XP until tier 1";
        }
        if(honeyP1Num === 1) {
            honeyLine1 = "Path 1: " + (honeyP1T2UnlockXP-player.honeyPath1XP) + " XP until tier 2\n";
        }
        if(honeyP2Num === 1) {
            honeyLine2 = "Path 2: " + (honeyP2T2UnlockXP-player.honeyPath2XP) + " XP until tier 2";
        }
        if(honeyP1Num === 2) {
            honeyLine1 = "Path 1: " + (honeyP1T3UnlockXP-player.honeyPath1XP) + " XP until tier 3\n";
        }
        if(honeyP2Num === 2) {
            honeyLine2 = "Path 2: " + (honeyP2T3UnlockXP-player.honeyPath2XP) + " XP until tier 3";
        }
        if(honeyP1Num === 3) {
            honeyLine1 = "Path 1: " + (honeyP1T4UnlockXP-player.honeyPath1XP) + " XP until tier 4\n";
        }
        if(honeyP2Num === 3) {
            honeyLine2 = "Path 2: " + (honeyP2T4UnlockXP-player.honeyPath2XP) + " XP until tier 4";
        }
        if(honeyP1Num === 4) {
            honeyLine1 = "Path 1: fully unlocked!\n";
        }
        if(honeyP2Num === 4) {
            honeyLine2 = "Path 2: fully unlocked!";
        }

        //Update the tier text for each tower and positions
        towersMenuSlingshotTierText.text = "Slingshot\nPath 1 tiers unlocked: " + slingshotP1Num + "/4\nPath 2 tiers unlocked: " + slingshotP2Num + "/4"; //Set string to show how many tiers are left
        towersMenuSlingshotTierText.x = towersMenuSlingshotImage.x-(towersMenuSlingshotTierText.width/2); //Set x position
        towersMenuSlingshotTierText.y = towersMenuSlingshotImage.y+20; //Set y position

        towersMenuHammerTierText.text = "Hammer\nPath 1 tiers unlocked: " + hammerP1Num + "/4\nPath 2 tiers unlocked: " + hammerP2Num + "/4"; //Set string to show how many tiers are left
        towersMenuHammerTierText.x = towersMenuHammerImage.x-(towersMenuHammerTierText.width/2); //Set x position
        towersMenuHammerTierText.y = towersMenuHammerImage.y+30; //Set y position

        towersMenuBugSprayTierText.text = "Bug Spray\nPath 1 tiers unlocked: " + bugSprayP1Num + "/4\nPath 2 tiers unlocked: " + bugSprayP2Num + "/4"; //Set string to show how many tiers are left
        towersMenuBugSprayTierText.x = towersMenuBugSprayImage.x-(towersMenuBugSprayTierText.width/2); //Set x position
        towersMenuBugSprayTierText.y = towersMenuBugSprayImage.y+60; //Set y position

        towersMenuMagnifyingGlassTierText.text = "Magnifying Glass\nPath 1 tiers unlocked: " + magnifyingGlassP1Num + "/4\nPath 2 tiers unlocked: " + magnifyingGlassP2Num + "/4"; //Set string to show how many tiers are left
        towersMenuMagnifyingGlassTierText.x = towersMenuMagnifyingGlassImage.x-(towersMenuMagnifyingGlassTierText.width/2); //Set x position
        towersMenuMagnifyingGlassTierText.y = towersMenuMagnifyingGlassImage.y+40; //Set y position

        towersMenuCannonTierText.text = "Cannon\nPath 1 tiers unlocked: " + cannonP1Num + "/4\nPath 2 tiers unlocked: " + cannonP2Num + "/4"; //Set string to show how many tiers are left
        towersMenuCannonTierText.x = towersMenuCannonImage.x-(towersMenuCannonTierText.width/2); //Set x position
        towersMenuCannonTierText.y = towersMenuCannonImage.y+50; //Set y position

        towersMenuHoneyTierText.text = "Honey\nPath 1 tiers unlocked: " + honeyP1Num + "/4\nPath 2 tiers unlocked: " + honeyP2Num + "/4"; //Set string to show how many tiers are left
        towersMenuHoneyTierText.x = towersMenuHoneyImage.x-(towersMenuHoneyTierText.width/2); //Set x position
        towersMenuHoneyTierText.y = towersMenuHoneyImage.y+40; //Set y position

        //Update the text for each tower and positions
        towersMenuSlingshotText.text = slingshotLine1 + slingshotLine2; //Set string to show path xp that is left to next tier
        towersMenuSlingshotText.x = towersMenuSlingshotTierText.x+(towersMenuSlingshotTierText.width/2)-(towersMenuSlingshotText.width/2); //Set x position
        towersMenuSlingshotText.y = towersMenuSlingshotTierText.y+towersMenuSlingshotTierText.height; //Set y position

        towersMenuHammerText.text = hammerLine1 + hammerLine2; //Set string to show path xp that is left to next tier
        towersMenuHammerText.x = towersMenuHammerTierText.x+(towersMenuHammerTierText.width/2)-(towersMenuHammerText.width/2); //Set x position
        towersMenuHammerText.y = towersMenuHammerTierText.y+towersMenuHammerTierText.height; //Set y position

        towersMenuBugSprayText.text = bugSprayLine1 + bugSprayLine2; //Set string to show path xp that is left to next tier
        towersMenuBugSprayText.x = towersMenuBugSprayTierText.x+(towersMenuBugSprayTierText.width/2)-(towersMenuBugSprayText.width/2); //Set x position
        towersMenuBugSprayText.y = towersMenuBugSprayTierText.y+towersMenuBugSprayTierText.height; //Set y position

        towersMenuMagnifyingGlassText.text = magnifyingGlassLine1 + magnifyingGlassLine2; //Set string to show path xp that is left to next tier
        towersMenuMagnifyingGlassText.x = towersMenuMagnifyingGlassTierText.x+(towersMenuMagnifyingGlassTierText.width/2)-(towersMenuMagnifyingGlassText.width/2); //Set x position
        towersMenuMagnifyingGlassText.y = towersMenuMagnifyingGlassTierText.y+towersMenuMagnifyingGlassTierText.height; //Set y position

        towersMenuCannonText.text = cannonLine1 + cannonLine2; //Set string to show path xp that is left to next tier
        towersMenuCannonText.x = towersMenuCannonTierText.x+(towersMenuCannonTierText.width/2)-(towersMenuCannonText.width/2); //Set x position
        towersMenuCannonText.y = towersMenuCannonTierText.y+towersMenuCannonTierText.height; //Set y position

        towersMenuHoneyText.text = honeyLine1 + honeyLine2; //Set string to show path xp that is left to next tier
        towersMenuHoneyText.x = towersMenuHoneyTierText.x+(towersMenuHoneyTierText.width/2)-(towersMenuHoneyText.width/2); //Set x position
        towersMenuHoneyText.y = towersMenuHoneyTierText.y+towersMenuHoneyTierText.height; //Set y position

        //Show the towers menu items
        towersMenuTitle.visible = true; //Show it
        towersMenuSlingshotImage.visible = true; //Show it
        towersMenuHammerImage.visible = true; //Show it
        towersMenuBugSprayImage.visible = true; //Show it
        towersMenuMagnifyingGlassImage.visible = true; //Show it
        towersMenuCannonImage.visible = true; //Show it
        towersMenuHoneyImage.visible = true; //Show it
        towersMenuSlingshotText.visible = true; //Show it
        towersMenuHammerText.visible = true; //Show it
        towersMenuBugSprayText.visible = true; //Show it
        towersMenuMagnifyingGlassText.visible = true; //Show it
        towersMenuCannonText.visible = true; //Show it
        towersMenuHoneyText.visible = true; //Show it
        towersMenuSlingshotTierText.visible = true; //Show it
        towersMenuHammerTierText.visible = true; //Show it
        towersMenuBugSprayTierText.visible = true; //Show it
        towersMenuMagnifyingGlassTierText.visible = true; //Show it
        towersMenuCannonTierText.visible = true; //Show it
        towersMenuHoneyTierText.visible = true; //Show it
        towersMenuBackButton.visible = true; //Show it
        towersMenuBackButtonText.visible = true; //Show it
    }

    //hideLevelMenu() function - Hide the level menu
    function hideLevelMenu() {
        levelMenuTitle.visible = false; //Hide it
        levelMenuEasyButton.visible = false; //Hide it
        levelMenuEasyButtonText.visible = false; //Hide it
        levelMenuMediumButton.visible = false; //Hide it
        levelMenuMediumButtonText.visible = false; //Hide it
        levelMenuHardButton.visible = false; //Hide it
        levelMenuHardButtonText.visible = false; //Hide it
        levelMenuBackButton.visible = false; //Hide it
        levelMenuBackButtonText.visible = false; //Hide it
    }

    //showLevelMenu() function - Shows the level menu
    function showLevelMenu() {
        levelMenuTitle.visible = true; //Show it
        levelMenuEasyButton.visible = true; //Show it
        levelMenuEasyButtonText.visible = true; //Show it
        levelMenuMediumButton.visible = true; //Show it
        levelMenuMediumButtonText.visible = true; //Show it
        levelMenuHardButton.visible = true; //Show it
        levelMenuHardButtonText.visible = true; //Show it
        levelMenuBackButton.visible = true; //Show it
        levelMenuBackButtonText.visible = true; //Show it
    }

    //hideDifficultyMenu() function - Hides the difficulty menu
    function hideDifficultyMenu() {
        difficultyMenuTitle.visible = false; //Hide it
        difficultyMenuEasyButton.visible = false; //Hide it
        difficultyMenuEasyButtonText.visible = false; //Hide it
        difficultyMenuMediumButton.visible = false; //Hide it
        difficultyMenuMediumButtonText.visible = false; //Hide it
        difficultyMenuHardButton.visible = false; //Hide it
        difficultyMenuHardButtonText.visible = false; //Hide it
        difficultyMenuBackButton.visible = false; //Hide it
        difficultyMenuBackButtonText.visible = false; //Hide it
    }

    //showDifficultyMenu() function - Shows the difficulty menu
    function showDifficultyMenu() {
        difficultyMenuTitle.visible = true; //Show it
        difficultyMenuEasyButton.visible = true; //Show it
        difficultyMenuEasyButtonText.visible = true; //Show it
        difficultyMenuMediumButton.visible = true; //Show it
        difficultyMenuMediumButtonText.visible = true; //Show it
        difficultyMenuHardButton.visible = true; //Show it
        difficultyMenuHardButtonText.visible = true; //Show it
        difficultyMenuBackButton.visible = true; //Show it
        difficultyMenuBackButtonText.visible = true; //Show it
    }

    //setLevel() function - Sets/load proper level
    function setLevel() {
        music.play();
        placementArea = []; //Clear placement Area array

        //Set starting gold and difficulty string depending on difficulty chosen
        //If easy difficulty
        if(difficulty === 1) {
            player.gold = startGold; //Set start gold
            difficultyString = "Easy"; //Set difficulty string to "Easy"
        }
        //If medium difficulty
        if(difficulty === 2) {
            player.gold = Math.floor((startGold*mediumStartGoldModifier)/10)*10; //Set start gold
            difficultyString = "Medium"; //Set difficulty string to "Medium"
        }
        //If hard difficulty
        if(difficulty === 3) {
            player.gold = Math.floor((startGold*hardStartGoldModifier)/10)*10; //Set start gold
            difficultyString = "Hard"; //Set difficulty string to "Hard"
        }
        //Ant waypoints for level 1
        if(level === 1) {
            //Set level sprite texture
            levelBGSprite = level1BGSprite;
            levelFGSprite = level1FGSprite;

            //Load level 1 waypoints
            wps = [[xPos-0*resizeFactor,yPos+730*resizeFactor],
                [xPos+560*resizeFactor,yPos+730*resizeFactor],
                [xPos+560*resizeFactor,yPos+1020*resizeFactor],
                [xPos+1310*resizeFactor,yPos+1020*resizeFactor],
                [xPos+1310*resizeFactor,yPos+300*resizeFactor],
                [xPos+932*resizeFactor,yPos+300*resizeFactor],
                [xPos+932*resizeFactor,yPos+452*resizeFactor],
                [xPos+350*resizeFactor,yPos+452*resizeFactor],
                [xPos+350*resizeFactor,yPos+60*resizeFactor],
                [xPos+1690*resizeFactor,yPos+60*resizeFactor],
                [xPos+1690*resizeFactor,yPos+1080*resizeFactor],
                [xPos+1690*resizeFactor,yPos+1080*resizeFactor]
            ];

            //Push polygons to placement area array
            placementArea.push([[xPos+0*resizeFactor,yPos+0*resizeFactor], [xPos+0*resizeFactor,yPos+659*resizeFactor], [xPos+621*resizeFactor,yPos+659*resizeFactor], [xPos+621*resizeFactor,yPos+931*resizeFactor], [xPos+1235*resizeFactor,yPos+931*resizeFactor], [xPos+1235*resizeFactor,yPos+785*resizeFactor], [xPos+1103*resizeFactor,yPos+785*resizeFactor], [xPos+1040*resizeFactor,yPos+721*resizeFactor], [xPos+1043*resizeFactor,yPos+649*resizeFactor], [xPos+1094*resizeFactor,yPos+603*resizeFactor], [xPos+1170*resizeFactor,yPos+606*resizeFactor], [xPos+1221*resizeFactor,yPos+631*resizeFactor], [xPos+1221*resizeFactor,yPos+383*resizeFactor], [xPos+1019*resizeFactor,yPos+382*resizeFactor], [xPos+1019*resizeFactor,yPos+513*resizeFactor], [xPos+282*resizeFactor,yPos+515*resizeFactor], [xPos+282*resizeFactor,yPos+0*resizeFactor]]);
            placementArea.push([[xPos+0*resizeFactor,yPos+799*resizeFactor], [xPos+97*resizeFactor,yPos+799*resizeFactor], [xPos+0*resizeFactor,yPos+903*resizeFactor]]);
            placementArea.push([[xPos+400*resizeFactor,yPos+803*resizeFactor], [xPos+490*resizeFactor,yPos+803*resizeFactor], [xPos+490*resizeFactor,yPos+1069*resizeFactor], [xPos+281*resizeFactor,yPos+1069*resizeFactor], [xPos+417*resizeFactor,yPos+916*resizeFactor]]);
            placementArea.push([[xPos+1366*resizeFactor,yPos+1080*resizeFactor], [xPos+1366*resizeFactor,yPos+233*resizeFactor], [xPos+862*resizeFactor,yPos+233*resizeFactor], [xPos+862*resizeFactor,yPos+376*resizeFactor], [xPos+423*resizeFactor,yPos+376*resizeFactor], [xPos+423*resizeFactor,yPos+140*resizeFactor], [xPos+1615*resizeFactor,yPos+140*resizeFactor], [xPos+1615*resizeFactor,yPos+1080*resizeFactor]]);
            placementArea.push([[xPos+1747*resizeFactor,yPos+0*resizeFactor], [xPos+1920*resizeFactor,yPos+0*resizeFactor], [xPos+1920*resizeFactor,yPos+230*resizeFactor], [xPos+1747*resizeFactor,yPos+230*resizeFactor]]);
            placementArea.push([[xPos+1747*resizeFactor,yPos+477*resizeFactor], [xPos+1920*resizeFactor,yPos+477*resizeFactor], [xPos+1920*resizeFactor,yPos+1080*resizeFactor], [xPos+1747*resizeFactor,yPos+1080*resizeFactor]]);
        }

        //Ant waypoints for level 2
        if(level === 2) {
            //Set level sprite texture
            levelBGSprite = level2BGSprite;
            levelFGSprite = level2FGSprite;

            //Load level 2 waypoints
            wps = [[xPos-0*resizeFactor,yPos+422*resizeFactor],
                [xPos+100*resizeFactor,yPos+360*resizeFactor],
                [xPos+150*resizeFactor,yPos+330*resizeFactor],
                [xPos+200*resizeFactor,yPos+305*resizeFactor],
                [xPos+250*resizeFactor,yPos+290*resizeFactor],
                [xPos+300*resizeFactor,yPos+270*resizeFactor],
                [xPos+350*resizeFactor,yPos+255*resizeFactor],
                [xPos+400*resizeFactor,yPos+240*resizeFactor],
                [xPos+450*resizeFactor,yPos+230*resizeFactor],
                [xPos+500*resizeFactor,yPos+220*resizeFactor],
                [xPos+550*resizeFactor,yPos+212*resizeFactor],
                [xPos+600*resizeFactor,yPos+202*resizeFactor],
                [xPos+650*resizeFactor,yPos+195*resizeFactor],
                [xPos+700*resizeFactor,yPos+192*resizeFactor],
                [xPos+750*resizeFactor,yPos+192*resizeFactor],
                [xPos+800*resizeFactor,yPos+195*resizeFactor],
                [xPos+850*resizeFactor,yPos+200*resizeFactor],
                [xPos+900*resizeFactor,yPos+210*resizeFactor],
                [xPos+920*resizeFactor,yPos+220*resizeFactor],
                [xPos+940*resizeFactor,yPos+230*resizeFactor],
                [xPos+942*resizeFactor,yPos+240*resizeFactor],
                [xPos+940*resizeFactor,yPos+250*resizeFactor],
                [xPos+935*resizeFactor,yPos+260*resizeFactor],
                [xPos+930*resizeFactor,yPos+280*resizeFactor],
                [xPos+920*resizeFactor,yPos+340*resizeFactor],
                [xPos+900*resizeFactor,yPos+380*resizeFactor],
                [xPos+850*resizeFactor,yPos+460*resizeFactor],
                [xPos+800*resizeFactor,yPos+535*resizeFactor],
                [xPos+700*resizeFactor,yPos+650*resizeFactor],
                [xPos+620*resizeFactor,yPos+745*resizeFactor],
                [xPos+1080*resizeFactor,yPos+1010*resizeFactor],
                [xPos+1150*resizeFactor,yPos+900*resizeFactor],
                [xPos+1250*resizeFactor,yPos+775*resizeFactor],
                [xPos+1325*resizeFactor,yPos+700*resizeFactor],
                [xPos+1450*resizeFactor,yPos+600*resizeFactor],
                [xPos+1550*resizeFactor,yPos+530*resizeFactor],
                [xPos+1650*resizeFactor,yPos+475*resizeFactor],
                [xPos+1750*resizeFactor,yPos+430*resizeFactor],
                [xPos+1850*resizeFactor,yPos+400*resizeFactor],
                [xPos+1920*resizeFactor,yPos+380*resizeFactor]
            ];

            //Push polygons to placement area array
            placementArea.push([[xPos+0*resizeFactor,yPos+147*resizeFactor], [xPos+88*resizeFactor,yPos+180*resizeFactor], [xPos+168*resizeFactor,yPos+131*resizeFactor], [xPos+182*resizeFactor,yPos+56*resizeFactor], [xPos+179*resizeFactor,yPos+0*resizeFactor], [xPos+1007*resizeFactor,yPos+0*resizeFactor], [xPos+918*resizeFactor,yPos+82*resizeFactor], [xPos+896*resizeFactor,yPos+138*resizeFactor], [xPos+809*resizeFactor,yPos+122*resizeFactor], [xPos+664*resizeFactor,yPos+127*resizeFactor], [xPos+534*resizeFactor,yPos+143*resizeFactor], [xPos+384*resizeFactor,yPos+175*resizeFactor], [xPos+254*resizeFactor,yPos+211*resizeFactor], [xPos+142*resizeFactor,yPos+262*resizeFactor], [xPos+37*resizeFactor,yPos+324*resizeFactor], [xPos+4*resizeFactor,yPos+353*resizeFactor]]);
            placementArea.push([[xPos+982*resizeFactor,yPos+350*resizeFactor], [xPos+967*resizeFactor,yPos+392*resizeFactor], [xPos+913*resizeFactor,yPos+491*resizeFactor], [xPos+837*resizeFactor,yPos+590*resizeFactor], [xPos+775*resizeFactor,yPos+660*resizeFactor], [xPos+720*resizeFactor,yPos+721*resizeFactor], [xPos+1056*resizeFactor,yPos+922*resizeFactor], [xPos+1097*resizeFactor,yPos+851*resizeFactor], [xPos+1174*resizeFactor,yPos+756*resizeFactor], [xPos+1272*resizeFactor,yPos+657*resizeFactor], [xPos+1376*resizeFactor,yPos+560*resizeFactor], [xPos+1485*resizeFactor,yPos+482*resizeFactor], [xPos+1627*resizeFactor,yPos+402*resizeFactor], [xPos+1761*resizeFactor,yPos+345*resizeFactor], [xPos+1866*resizeFactor,yPos+318*resizeFactor], [xPos+1920*resizeFactor,yPos+311*resizeFactor], [xPos+1920*resizeFactor,yPos+0*resizeFactor], [xPos+1201*resizeFactor,yPos+0*resizeFactor], [xPos+1242*resizeFactor,yPos+51*resizeFactor], [xPos+1280*resizeFactor,yPos+131*resizeFactor], [xPos+1296*resizeFactor,yPos+230*resizeFactor], [xPos+1249*resizeFactor,yPos+332*resizeFactor], [xPos+1193*resizeFactor,yPos+373*resizeFactor], [xPos+1082*resizeFactor,yPos+385*resizeFactor], [xPos+1024*resizeFactor,yPos+377*resizeFactor]]);
        }

        //Ant waypoints for level 3
        if(level === 3) {
            //Set level sprite texture
            levelBGSprite = level3BGSprite;
            levelFGSprite = level3FGSprite;

            //Load level 3 waypoints
            wps = [[xPos-0*resizeFactor,yPos+550*resizeFactor],
                [xPos+0*resizeFactor,yPos+550*resizeFactor],
                [xPos+85*resizeFactor,yPos+510*resizeFactor],
                [xPos+175*resizeFactor,yPos+465*resizeFactor],
                [xPos+225*resizeFactor,yPos+450*resizeFactor],
                [xPos+280*resizeFactor,yPos+438*resizeFactor],
                [xPos+350*resizeFactor,yPos+430*resizeFactor],
                [xPos+400*resizeFactor,yPos+430*resizeFactor],
                [xPos+450*resizeFactor,yPos+440*resizeFactor],
                [xPos+500*resizeFactor,yPos+450*resizeFactor],
                [xPos+550*resizeFactor,yPos+470*resizeFactor],
                [xPos+850*resizeFactor,yPos+600*resizeFactor],
                [xPos+920*resizeFactor,yPos+615*resizeFactor],
                [xPos+985*resizeFactor,yPos+615*resizeFactor],
                [xPos+1050*resizeFactor,yPos+615*resizeFactor],
                [xPos+1120*resizeFactor,yPos+600*resizeFactor],
                [xPos+1420*resizeFactor,yPos+470*resizeFactor],
                [xPos+1470*resizeFactor,yPos+450*resizeFactor],
                [xPos+1520*resizeFactor,yPos+440*resizeFactor],
                [xPos+1570*resizeFactor,yPos+430*resizeFactor],
                [xPos+1620*resizeFactor,yPos+430*resizeFactor],
                [xPos+1690*resizeFactor,yPos+445*resizeFactor],
                [xPos+1750*resizeFactor,yPos+465*resizeFactor],
                [xPos+1850*resizeFactor,yPos+510*resizeFactor],
                [xPos+1920*resizeFactor,yPos+545*resizeFactor]
            ];

            //Push polygons to placement area array
            placementArea.push([[xPos+0*resizeFactor,yPos+0*resizeFactor], [xPos+106*resizeFactor,yPos+48*resizeFactor], [xPos+204*resizeFactor,yPos+127*resizeFactor], [xPos+282*resizeFactor,yPos+229*resizeFactor], [xPos+350*resizeFactor,yPos+375*resizeFactor], [xPos+237*resizeFactor,yPos+389*resizeFactor], [xPos+121*resizeFactor,yPos+424*resizeFactor], [xPos+0*resizeFactor,yPos+490*resizeFactor]]);
            placementArea.push([[xPos+2*resizeFactor,yPos+623*resizeFactor], [xPos+131*resizeFactor,yPos+541*resizeFactor], [xPos+266*resizeFactor,yPos+497*resizeFactor], [xPos+366*resizeFactor,yPos+485*resizeFactor], [xPos+365*resizeFactor,yPos+620*resizeFactor], [xPos+314*resizeFactor,yPos+784*resizeFactor], [xPos+267*resizeFactor,yPos+868*resizeFactor], [xPos+236*resizeFactor,yPos+910*resizeFactor], [xPos+186*resizeFactor,yPos+832*resizeFactor], [xPos+103*resizeFactor,yPos+812*resizeFactor], [xPos+24*resizeFactor,yPos+854*resizeFactor], [xPos+0*resizeFactor,yPos+869*resizeFactor]]);
            placementArea.push([[xPos+804*resizeFactor, yPos+523*resizeFactor],[xPos+810*resizeFactor,yPos+465*resizeFactor],[xPos+839*resizeFactor,yPos+391*resizeFactor],[xPos+891*resizeFactor,yPos+335*resizeFactor],[xPos+956*resizeFactor,yPos+298*resizeFactor],[xPos+955*resizeFactor,yPos+358*resizeFactor],[xPos+994*resizeFactor,yPos+428*resizeFactor],[xPos+1036*resizeFactor,yPos+455*resizeFactor], [xPos+1108*resizeFactor,yPos+456*resizeFactor], [xPos+1157*resizeFactor,yPos+424*resizeFactor], [xPos+1203*resizeFactor,yPos+369*resizeFactor], [xPos+1231*resizeFactor,yPos+415*resizeFactor], [xPos+1255*resizeFactor,yPos+474*resizeFactor], [xPos+1135*resizeFactor,yPos+527*resizeFactor], [xPos+1008*resizeFactor,yPos+557*resizeFactor], [xPos+905*resizeFactor,yPos+548*resizeFactor]]);
            placementArea.push([[xPos+804*resizeFactor,yPos+644*resizeFactor], [xPos+951*resizeFactor,yPos+676*resizeFactor], [xPos+1042*resizeFactor,yPos+672*resizeFactor], [xPos+1149*resizeFactor,yPos+647*resizeFactor], [xPos+1286*resizeFactor,yPos+587*resizeFactor], [xPos+1301*resizeFactor,yPos+665*resizeFactor], [xPos+1270*resizeFactor,yPos+784*resizeFactor], [xPos+1175*resizeFactor,yPos+880*resizeFactor], [xPos+1061*resizeFactor,yPos+914*resizeFactor], [xPos+912*resizeFactor,yPos+865*resizeFactor], [xPos+834*resizeFactor,yPos+780*resizeFactor], [xPos+804*resizeFactor,yPos+642*resizeFactor]]);
            placementArea.push([[xPos+1584*resizeFactor,yPos+372*resizeFactor], [xPos+1614*resizeFactor,yPos+291*resizeFactor], [xPos+1665*resizeFactor,yPos+198*resizeFactor], [xPos+1742*resizeFactor,yPos+116*resizeFactor], [xPos+1755*resizeFactor,yPos+128*resizeFactor], [xPos+1742*resizeFactor,yPos+172*resizeFactor], [xPos+1755*resizeFactor,yPos+242*resizeFactor], [xPos+1808*resizeFactor,yPos+290*resizeFactor], [xPos+1882*resizeFactor,yPos+311*resizeFactor], [xPos+1919*resizeFactor,yPos+315*resizeFactor], [xPos+1918*resizeFactor,yPos+481*resizeFactor], [xPos+1833*resizeFactor,yPos+428*resizeFactor], [xPos+1716*resizeFactor,yPos+387*resizeFactor], [xPos+1606*resizeFactor,yPos+371*resizeFactor]]);
            placementArea.push([[xPos+1560*resizeFactor,yPos+488*resizeFactor], [xPos+1665*resizeFactor,yPos+498*resizeFactor], [xPos+1760*resizeFactor,yPos+528*resizeFactor], [xPos+1839*resizeFactor,yPos+565*resizeFactor], [xPos+1919*resizeFactor,yPos+623*resizeFactor], [xPos+1918*resizeFactor,yPos+1076*resizeFactor], [xPos+1903*resizeFactor,yPos+1076*resizeFactor], [xPos+1797*resizeFactor,yPos+1016*resizeFactor], [xPos+1699*resizeFactor,yPos+925*resizeFactor], [xPos+1616*resizeFactor,yPos+803*resizeFactor], [xPos+1562*resizeFactor,yPos+634*resizeFactor], [xPos+1555*resizeFactor,yPos+554*resizeFactor]]);
        }

        //Add level sprite to levelContainer
        levelContainerBG.addChild(levelBGSprite);
        levelContainerFG.addChild(levelFGSprite);

        //Set up windmill sprite----------------------------------------------------------------------------------------
        //Set damage sprite, however make it invisible
        windmillDamageSprite.texture = windmillDamage1T; //Set damage sprite
        windmillDamageSprite.visible = false; //Hide it //Make it invisible
        //If level 1 windmill
        if(windmill == 1) {
            windmillSprite = windmillSprite1; //Set sprite
            windmillSprite.hp = 100; //Set hp
        }
        //If level 2 windmill
        if(windmill == 2) {
            windmillSprite = windmillSprite2; //Set sprite
            windmillSprite.hp = 150; //Set hp
        }
        //If level 3 windmill
        if(windmill == 3) {
            windmillSprite = windmillSprite3; //Set sprite
            windmillSprite.hp = 200; //Set hp
        }
        //If level 4 windmill
        if(windmill == 4) {
            windmillSprite = windmillSprite4; //Set sprite
            windmillSprite.hp = 250; //Set hp
        }
        windmillSprite.totalHP = windmillSprite.hp; //Store totalHP used to determine what damage to show
        windmillSprite.width = windmill1T.width*0.4; //Set sprite width
        windmillSprite.height = windmill1T.width*0.4; //Set sprite height
        windmillSprite.x = wps[wps.length-1][0]; //Set sprite x position based off of final waypoint coords
        windmillSprite.y = wps[wps.length-1][1]; //Set sprite y position based off of final waypoint coords

        windmillDamageSprite.width = windmillSprite.width*0.83; //Set sprite width
        windmillDamageSprite.height = windmillSprite.height*0.83; //Set sprite height
        windmillDamageSprite.x = wps[wps.length-1][0]; //Set sprite x position based off of final waypoint coords
        windmillDamageSprite.y = wps[wps.length-1][1]; //Set sprite y position based off of final waypoint coords

        centerAnchor(windmillDamageSprite); //Center the windmill damage sprite's anchor point
        centerAnchor(windmillSprite); //Center the windmill's anchor point

        //If easy level
        if(level === 1) {
            windmillSprite.rotation = 0; //Rotate windmill sprite to face up
            windmillDamageSprite.rotation = 0; //Rotate windmill damage sprite to face up
        }

        //If the windmill is on level 2 or 3, sprites to be rotated into proper position
        if(level === 2 || level === 3) {
            windmillSprite.rotation = rad(270); //Rotate windmill sprite to face left
            windmillDamageSprite.rotation = rad(270); //Rotate windmill damage sprite to face left
        }

        //Add the sprites to the container
        windmillContainer.addChild(windmillSprite);
        windmillContainer.addChild(windmillDamageSprite);

        //Set level sprite size
        levelBGSprite.width = appWidth; //Set width
        levelBGSprite.height = appHeight; //Set height
        levelBGSprite.interactive = true; //Make background interactive
        levelBGSprite.buttonMode = true; //Make background a button

        //When the background is clicked
        levelBGSprite.on("pointertap", () => {
            //If player clicks the background, deselect all towers
            for(let i = 0; i < towers.length; i++) {
                towers[i].selected = false; //Deselct towers
                towers[i].hideRangeOverlay(); //Hide the range overlay
            }
            //Iterate through all points in the placement area
            for(let i = 0; i < placementArea.length; i++) {
                //If the user clicks within the polygon
                if(typeof towers[towers.length-1] != "undefined" && polygonCollision([towers[towers.length-1].xMin, towers[towers.length-1].yMin], placementArea[i]) && polygonCollision([towers[towers.length-1].xMax, towers[towers.length-1].yMin], placementArea[i]) && polygonCollision([towers[towers.length-1].xMax, towers[towers.length-1].yMax], placementArea[i]) && polygonCollision([towers[towers.length-1].xMin, towers[towers.length-1].yMax], placementArea[i])) {
                    let canPlace = 0; //Set canPlace counter
                    //Iterate through all towers
                    for(let i = 0; i < towers.length-1; i++) {
                        //If the placing tower isn't collided with another tower
                        if(checkTowerCollision && towers[towers.length-1].xMin2 > towers[i].xMax2 || towers[towers.length-1].xMax2 < towers[i].xMin2 || towers[towers.length-1].yMin2 > towers[i].yMax2 || towers[towers.length-1].yMax2 < towers[i].yMin2) {
                            canPlace++; //Increase canPlace
                        }
                    }
                    //If there are towers and canPlace matches the towers numbers this means the user can place the tower here
                    if(towers.length > 0 && canPlace === towers.length-1) {
                        towers[towers.length - 1].placing = false; //No longer placing the tower
                        //If placing a slingshot tower
                        if(placeSlingshot) {
                            placeSlingshot = false; //No longer placing the tower
                        }
                        //If placing a hammer tower
                        if(placeHammer) {
                            placeHammer = false; //No longer placing the tower
                        }
                        //If placing a bug spray tower
                        if(placeBugSpray) {
                            placeBugSpray = false; //No longer placing the tower
                        }
                        //If placing a magnifying glass tower
                        if(placeMagnifyingGlass) {
                            placeMagnifyingGlass = false; //No longer placing the tower
                        }
                        //If placing a cannon tower
                        if(placeCannon) {
                            placeCannon = false; //No longer placing the tower
                        }
                        //If placing a honey tower
                        if(placeHoney) {
                            placeHoney = false; //No longer placing the tower
                        }
                        checkTowerCollision = true; //Need to check for tower collisions again
                        hideSellButton(); //Hide the sell button
                    }
                    canPlace = 0; //Reset counter
                    //If the user has placed the tower, hide the info bar
                    if(towers[towers.length-1].placing === false) {
                        hideInfoBar(); //Hide the info bar
                    }
                }
            }
        });

        //On mouseover
        levelBGSprite.on("mouseover", () => {
            hideToolTip(); //Hide tooltip
            for(let i = 0; i < towers.length; i++) {
                towers[i].hovered = false;
            }
        });
    }

    //quitGame() function - Quits the game, updates the player stats to the database, resets, and goes back to main menu
    function quitGame() {
        updatePlayerStats(); //Update player stats to database
        resetGame(); //Reset the game
    }

    //hideTowerBarButtons() function - Hides the tower bar buttons
    function hideTowerBarButtons() {
        slingshotButton.visible = false; //Hide it
        slingshotText.visible = false; //Hide it
        slingshotCostText.visible = false; //Hide it
        hammerButton.visible = false; //Hide it
        hammerText.visible = false; //Hide it
        hammerCostText.visible = false; //Hide it
        bugSprayButton.visible = false; //Hide it
        bugSprayText.visible = false; //Hide it
        bugSprayCostText.visible = false; //Hide it
        magnifyingGlassButton.visible = false; //Hide it
        magnifyingGlassText.visible = false; //Hide it
        magnifyingGlassCostText.visible = false; //Hide it
        cannonButton.visible = false; //Hide it
        cannonText.visible = false; //Hide it
        cannonCostText.visible = false; //Hide it
        honeyButton.visible = false; //Hide it
        honeyText.visible = false; //Hide it
        honeyCostText.visible = false; //Hide it
        speedButton.visible = false; //Hide it
        multiButton.visible = false; //Hide it

        //Hide sprites
        slingshotButtonSprite.hide(); //Hide sprite
        hammerButtonSprite.hide(); //Hide sprite
        bugSprayButtonSprite.hide(); //Hide sprite
        magnifyingGlassButtonSprite.hide(); //Hide sprite
        cannonButtonSprite.hide(); //Hide sprite
        honeyButtonSprite.hide(); //Hide sprite
    }

    //showTowerBarButtons() function - Show the tower bar buttons
    function showTowerBarButtons() {
        slingshotButton.visible = true; //Show it
        slingshotText.visible = true; //Show it
        slingshotCostText.visible = true; //Show it
        hammerButton.visible = true; //Show it
        hammerText.visible = true; //Show it
        hammerCostText.visible = true; //Show it
        bugSprayButton.visible = true; //Show it
        bugSprayText.visible = true; //Show it
        bugSprayCostText.visible = true; //Show it
        magnifyingGlassButton.visible = true; //Show it
        magnifyingGlassText.visible = true; //Show it
        magnifyingGlassCostText.visible = true; //Show it
        cannonButton.visible = true; //Show it
        cannonText.visible = true; //Show it
        cannonCostText.visible = true; //Show it
        honeyButton.visible = true; //Show it
        honeyText.visible = true; //Show it
        honeyCostText.visible = true; //Show it
        speedButton.visible = true; //Show it
        multiButton.visible = true; //Show it

        //Show sprites
        slingshotButtonSprite.show(); //Show sprite
        hammerButtonSprite.show(); //Show sprite
        bugSprayButtonSprite.show(); //Show sprite
        magnifyingGlassButtonSprite.show(); //Show sprite
        cannonButtonSprite.show(); //Show sprite
        honeyButtonSprite.show(); //Show sprite
    }

    //resumeGame() function - Updates the play/pause button to reflect game is playing
    function resumeGame() {
        hideOverlayMenu(); //Hides the overlay menu
        playSymbol.visible = false; //Hide it //Hide play symbol
        pauseSymbol.visible = true; //Show pause symbol
        paused = false; //Game is resumed
        multiButton.removeAllListeners(); //Remove listeners
        multiText.text = "Pause"; //Update text to "Pause"
        multiText.position.x = (leftBarContainer.width/2)-(multiText.width/2); //x position
        multiText.position.y = multiButton.y+multiButton.height-multiText.height-5; //y position

        //Button interaction
        //When hovered
        multiButton.on("mouseover", () => {
            multiButton.clear(); //Clear button
            multiButton.beginFill(darkGray); //Set to dark gray
            multiButton.lineStyle(2, 0x000000); //Black stroke
            multiButton.drawRect(0, 0, leftBarContainer.width-2, 100); //Draw it
            hideToolTip();
        });

        //When mouse leaves button
        multiButton.on("mouseout", () => {
            multiButton.clear(); //Clear button
            multiButton.beginFill(lightGray); //Set to light gray
            multiButton.lineStyle(2, 0x000000); //Black stroke
            multiButton.drawRect(0, 0, leftBarContainer.width-2, 100); //Draw it
        });

        //When clicked
        multiButton.on("pointertap", () => {
            playPause(); //Play or pause
        });
    }

    //pauseGame() function - Updates the play/pause button to reflect game is paused
    function pauseGame() {
        playSymbol.visible = true; //Show play symbol
        pauseSymbol.visible = false; //Hide it //Hide pause symbol
        paused = true; //Game is paused
        multiButton.removeAllListeners(); //Remove listeners
        multiText.text = "Play"; //Update text to "Play"
        multiText.position.x = (leftBarContainer.width/2)-(multiText.width/2); //x position
        multiText.position.y = multiButton.y+multiButton.height-multiText.height-5; //y position

        //Button interaction
        //When hovered
        multiButton.on("mouseover", () => {
            multiButton.clear(); //Clear button
            multiButton.beginFill(darkGray); //Set to dark gray
            multiButton.lineStyle(2, 0x000000); //Black stroke
            multiButton.drawRect(0, 0, leftBarContainer.width-2, 100); //Draw it
            hideToolTip();
        });

        //When mouse leaves button
        multiButton.on("mouseout", () => {
            multiButton.clear(); //Clear button
            multiButton.beginFill(lightGray); //Set to light gray
            multiButton.lineStyle(2, 0x000000); //Black stroke
            multiButton.drawRect(0, 0, leftBarContainer.width-2, 100); //Draw it
        });

        //When clicked
        multiButton.on("pointertap", () => {
            playPause(); //Play or pause
        });
    }

    //overlayMenuClick() function - Handles when user clicks on the menu button
    function overlayMenuClick() {
        if(waveWonBool) {
            //If the menu is not open, open it
            if (!overlayMenu) {
                showOverlayMenu(); //Show the menu
            }
            //Else, if the menu is open, close it
            else {
                hideOverlayMenu(); //Hide the menu
            }
        }
        else {
            //If the game is paused
            if (paused) {
                //If the menu is not open, open it
                if (!overlayMenu) {
                    showOverlayMenu(); //Show the menu
                }
                //Else, if the menu is open, close it
                else {
                    hideOverlayMenu(); //Hide the menu
                    resumeGame(); //Show pause button, because game is resume
                }
            }
            //Else, if the game is not paused
            else {
                //If the menu is not open, open it
                if (!overlayMenu) {
                    showOverlayMenu();
                    if (startGameBool) {
                        pauseGame(); //Show play button, because game is paused
                    }
                }
                //Else, if the menu is open, close it
                else {
                    hideOverlayMenu();
                    if (startGameBool) {
                        resumeGame(); //Show pause button, because game is resumed
                    }
                }
            }
        }
    }

    //showOverlayMenu() function - Shows the overlay menu
    function showOverlayMenu() {
        overlayMenu = true; //Menu is being shown
        overlayMenuContainer.visible = true; //Show it
        disableTowerInteraction();
        hideInfoBar();
        for(let i = 0; i < towers.length; i++) {
            towers[i].selected = false; //Deselct towers
            towers[i].hideRangeOverlay(); //Hide the range overlay
        }
        levelBGSprite.interactive = false; //Disable interactivity
        levelBGSprite.buttonMode = false; //Disable button
        multiButton.interactive = false; //Disable interactivity
        multiButton.buttonMode = false; //Disable button
        speedButton.interactive = false; //Disable interactivity
        speedButton.buttonMode = false; //Disable button
        slingshotButton.interactive = false; //Disable interactivity
        slingshotButton.buttonMode = false; //Disable button
        hammerButton.interactive = false; //Disable interactivity
        hammerButton.buttonMode = false; //Disable button
        bugSprayButton.interactive = false; //Disable interactivity
        bugSprayButton.buttonMode = false; //Disable button
        magnifyingGlassButton.interactive = false; //Disable interactivity
        magnifyingGlassButton.buttonMode = false; //Disable button
        cannonButton.interactive = false; //Disable interactivity
        cannonButton.buttonMode = false; //Disable button
        honeyButton.interactive = false; //Disable interactivity
        honeyButton.buttonMode = false; //Disable button
    }

    //hideOverlayMenu() function - Hides the overlay menu
    function hideOverlayMenu() {
        enableTowerInteraction();
        overlayMenu = false; //Menu is hidden
        overlayMenuContainer.visible = false; //Hide it
        levelBGSprite.interactive = true; //Disable interactivity
        levelBGSprite.buttonMode = true; //Disable button
        multiButton.interactive = true; //Disable interactivity
        multiButton.buttonMode = true; //Disable button
        speedButton.interactive = true; //Disable interactivity
        speedButton.buttonMode = true; //Disable button
        slingshotButton.interactive = true; //Disable interactivity
        slingshotButton.buttonMode = true; //Disable button
        hammerButton.interactive = true; //Disable interactivity
        hammerButton.buttonMode = true; //Disable button
        bugSprayButton.interactive = true; //Disable interactivity
        bugSprayButton.buttonMode = true; //Disable button
        magnifyingGlassButton.interactive = true; //Disable interactivity
        magnifyingGlassButton.buttonMode = true; //Disable button
        cannonButton.interactive = true; //Disable interactivity
        cannonButton.buttonMode = true; //Disable button
        honeyButton.interactive = true; //Disable interactivity
        honeyButton.buttonMode = true; //Disable button
    }

    //hideSellButton() function - Hides the sell button
    function hideSellButton() {
        showTowerBarButtons(); //Show the tower bar buttons
        sellButton.visible = false; //Hide it //Hide sell button
        sellText.visible = false; //Hide it //Hide sell text
    }

    //showSellButton() function - Shows the sell button
    function showSellButton() {
        //If current tower is defined and is placed (it is a placed tower and can be sold)
        if(typeof towers[towers.length-1] !== "undefined" && !towers[towers.length-1].placing) {
            sellText.text = "SELL"; //Show text to say SELL
            sellText.position.x = (leftBarContainer.width/2)-(sellText.width/2); //Set x position
            sellText.position.y = (slingshotButton.y+(appHeight-slingshotButton.y)/2) - (sellText.height/2); //Set y position
        }
        //Else, the current tower hasn't been placed yet, so give option to cancel
        else {
            sellText.text = "CANCEL"; //Show text to say CANCEL
            sellText.position.x = (leftBarContainer.width/2)-(sellText.width/2); //Set x position
            sellText.position.y = (slingshotButton.y+(appHeight-slingshotButton.y)/2) - (sellText.height/2); //Set y position
        }
        hideTowerBarButtons(); //Hide the tower bar buttons
        sellButton.visible = true; //Show sell button
        sellText.visible = true; //Show sell text
    }

    //changeSpeed() function - Change the game speed
    function changeSpeed() {
        speedUp++; //Increment speedUp
        //If speedUp goes past 3
        if(speedUp > 3) {
            speedUp = 1; //Set it back to 1
        }
        speedText.text = "Speed: x" + speedUp; //Update speed text
        speedText.position.x = (leftBarContainer.width/2)-(speedText.width/2); //Set x position
        speedText.position.y = speedButton.y+(speedButton.height/2)-(speedText.height/2); //Set y position
    }

    //startGame() function - Starts the game
    function startGame() {
        hideOverlayMenu(); //Hide the overlay menu
        playSymbol.visible = false; //Hide it //Hide play symbol
        pauseSymbol.visible = true; //Show pause symbol
        multiButton.removeAllListeners(); //Remove multibutton listener so it can be updated
        multiText.text = "Pause"; //Update text to pause
        multiText.position.x = (leftBarContainer.width/2)-(multiText.width/2); //Set x position
        multiText.position.y = multiButton.y+multiButton.height-multiText.height-5; //Set y position

        //When hovered
        multiButton.on("mouseover", () => {
            multiButton.clear(); //Clear the button
            multiButton.beginFill(0xbbbbbb); //Fill dark grey
            multiButton.lineStyle(2, 0x000000); //Black stroke
            multiButton.drawRect(0, 0, leftBarContainer.width-2, 100); //Draw it
            hideToolTip();
        });

        //When mouse leaves button
        multiButton.on("mouseout", () => {
            multiButton.clear(); //Clear the button
            multiButton.beginFill(0xdddddd); //Fill light grey
            multiButton.lineStyle(2, 0x000000); //Black stroke
            multiButton.drawRect(0, 0, leftBarContainer.width-2, 100); //Draw it
        });

        //When clicked
        multiButton.on("pointertap", () => {
            playPause(); //Call playPause(), will pause or play
        });
        startGameBool = true; //Start the game
    }

    //updateWindmill() function - Update the windmill damage textures based on hp
    function updateWindmill() {
        //If the windmill is between 50-75%, set damage sprite
        if(windmillSprite.hp <= windmillSprite.totalHP*.75 && windmillSprite.hp > windmillSprite.totalHP*.50) {
            windmillDamageSprite.visible = true; //Show the damage sprite
        }
        //If the windmill is between 25-50%, set damage sprite
        if(windmillSprite.hp <= windmillSprite.totalHP*.50 && windmillSprite.hp > windmillSprite.totalHP*.25) {
            windmillDamageSprite.texture = windmillDamage2T; //Update damage texture
            windmillDamageSprite.width = windmillSprite.width*.87; //Set sprite width
            windmillDamageSprite.height = windmillSprite.height*1; //Set sprite height
            centerAnchor(windmillDamageSprite); //Center the sprite anchor
        }
        //If the windmill is below 25%, set damage sprite
        if(windmillSprite.hp <= windmillSprite.totalHP*.25 && windmillSprite.hp > 0) {
            windmillDamageSprite.texture = windmillDamage3T; //Update damage texture
            windmillDamageSprite.width = windmillSprite.width*.95; //Set sprite width
            windmillDamageSprite.height = windmillSprite.height*1; //Set sprite height
            centerAnchor(windmillDamageSprite); //Center the sprite anchor
        }
        //If the windmill reaches 0 hp and the user hasn't defeated enough waves
        if(windmillSprite.hp <= 0 && waveNumber <= waveNumberWinTarget) {
            lost = true; //The player lost, game is over
        }
        //If the windmill reaches 0 hp and the user has defeated enough waves
        else if(windmillSprite.hp <= 0 && waveNumber > waveNumberWinTarget) {
            won = true; //The play won, game is over
        }
    }

    //updateInfoText() function - Updates the information text along the top of the screen to reflect stats
    function updateInfoText() {
        infoText.text = "Wave: " + waveNumber + "          Difficulty: " + difficultyString + "          Gold: " + player.gold + "         Health: " + windmillSprite.hp + "/" + windmillSprite.totalHP;
        infoText.position.x = leftBarContainer.width+((appWidth-leftBarContainer.width-mediaContainer.width)/2)-(infoText.width/2);
        infoText.position.y = infoText.height/2; //Update y pos
    }

    //updateTowerMenuTiers() function - Updates the tower menu tiers to be used on the tower menu screen. Ex. 1/4 tiers unlocked.
    function updateTowerMenuTiers() {
        //If slingshot path 1 XP is enough for tier 1
        if(player.slingshotPath1XP >= slingshotP1T1UnlockXP) {
            slingshotP1Num = 1;
        }
        //If slingshot path 2 XP is enough for tier 1
        if(player.slingshotPath2XP >= slingshotP2T1UnlockXP) {
            slingshotP2Num = 1;
        }
        //If slingshot path 1 XP is enough for tier 2
        if(player.slingshotPath1XP >= slingshotP1T2UnlockXP) {
            slingshotP1Num = 2;
        }
        //If slingshot path 2 XP is enough for tier 2
        if(player.slingshotPath2XP >= slingshotP2T2UnlockXP) {
            slingshotP2Num = 2;
        }
        //If slingshot path 3 XP is enough for tier 3
        if(player.slingshotPath1XP >= slingshotP1T3UnlockXP) {
            slingshotP1Num = 3;
        }
        //If slingshot path 3 XP is enough for tier 3
        if(player.slingshotPath2XP >= slingshotP2T3UnlockXP) {
            slingshotP2Num = 3;
        }
        //If slingshot path 4 XP is enough for tier 4
        if(player.slingshotPath1XP >= slingshotP1T4UnlockXP) {
            slingshotP1Num = 4;
        }
        //If slingshot path 4 XP is enough for tier 4
        if(player.slingshotPath2XP >= slingshotP2T4UnlockXP) {
            slingshotP2Num = 4;
        }

        //If hammer path 1 XP is enough for tier 1
        if(player.hammerPath1XP >= hammerP1T1UnlockXP) {
            hammerP1Num = 1;
        }
        //If hammer path 2 XP is enough for tier 1
        if(player.hammerPath2XP >= hammerP2T1UnlockXP) {
            hammerP2Num = 1;
        }
        //If hammer path 1 XP is enough for tier 2
        if(player.hammerPath1XP >= hammerP1T2UnlockXP) {
            hammerP1Num = 2;
        }
        //If hammer path 2 XP is enough for tier 2
        if(player.hammerPath2XP >= hammerP2T2UnlockXP) {
            hammerP2Num = 2;
        }
        //If hammer path 1 XP is enough for tier 3
        if(player.hammerPath1XP >= hammerP1T3UnlockXP) {
            hammerP1Num = 3;
        }
        //If hammer path 2 XP is enough for tier 3
        if(player.hammerPath2XP >= hammerP2T3UnlockXP) {
            hammerP2Num = 3;
        }
        //If hammer path 1 XP is enough for tier 4
        if(player.hammerPath1XP >= hammerP1T4UnlockXP) {
            hammerP1Num = 4;
        }
        //If hammer path 2 XP is enough for tier 4
        if(player.hammerPath2XP >= hammerP2T4UnlockXP) {
            hammerP2Num = 4;
        }

        //If bug spray path 1 XP is enough for tier 1
        if(player.bugSprayPath1XP >= bugSprayP1T1UnlockXP) {
            bugSprayP1Num = 1;
        }
        //If bug spray path 2 XP is enough for tier 1
        if(player.bugSprayPath2XP >= bugSprayP2T1UnlockXP) {
            bugSprayP2Num = 1;
        }
        //If bug spray path 1 XP is enough for tier 2
        if(player.bugSprayPath1XP >= bugSprayP1T2UnlockXP) {
            bugSprayP1Num = 2;
        }
        //If bug spray path 2 XP is enough for tier 2
        if(player.bugSprayPath2XP >= bugSprayP2T2UnlockXP) {
            bugSprayP2Num = 2;
        }
        //If bug spray path 1 XP is enough for tier 3
        if(player.bugSprayPath1XP >= bugSprayP1T3UnlockXP) {
            bugSprayP1Num = 3;
        }
        //If bug spray path 2 XP is enough for tier 3
        if(player.bugSprayPath2XP >= bugSprayP2T3UnlockXP) {
            bugSprayP2Num = 3;
        }
        //If bug spray path 1 XP is enough for tier 4
        if(player.bugSprayPath1XP >= bugSprayP1T4UnlockXP) {
            bugSprayP1Num = 4;
        }
        //If bug spray path 2 XP is enough for tier 4
        if(player.bugSprayPath2XP >= bugSprayP2T4UnlockXP) {
            bugSprayP2Num = 4;
        }

        //If magnifying glass path 1 XP is enough for tier 1
        if(player.magnifyingGlassPath1XP >= magnifyingGlassP1T1UnlockXP) {
            magnifyingGlassP1Num = 1;
        }
        //If magnifying glass path 2 XP is enough for tier 1
        if(player.magnifyingGlassPath2XP >= magnifyingGlassP2T1UnlockXP) {
            magnifyingGlassP2Num = 1;
        }
        //If magnifying glass path 1 XP is enough for tier 2
        if(player.magnifyingGlassPath1XP >= magnifyingGlassP1T2UnlockXP) {
            magnifyingGlassP1Num = 2;
        }
        //If magnifying glass path 2 XP is enough for tier 2
        if(player.magnifyingGlassPath2XP >= magnifyingGlassP2T2UnlockXP) {
            magnifyingGlassP2Num = 2;
        }
        //If magnifying glass path 1 XP is enough for tier 3
        if(player.magnifyingGlassPath1XP >= magnifyingGlassP1T3UnlockXP) {
            magnifyingGlassP1Num = 3;
        }
        //If magnifying glass path 2 XP is enough for tier 3
        if(player.magnifyingGlassPath2XP >= magnifyingGlassP2T3UnlockXP) {
            magnifyingGlassP2Num = 3;
        }
        //If magnifying glass path 1 XP is enough for tier 4
        if(player.magnifyingGlassPath1XP >= magnifyingGlassP1T4UnlockXP) {
            magnifyingGlassP1Num = 4;
        }
        //If magnifying glass path 2 XP is enough for tier 4
        if(player.magnifyingGlassPath2XP >= magnifyingGlassP2T4UnlockXP) {
            magnifyingGlassP2Num = 4;
        }

        //If cannon path 1 XP is enough for tier 1
        if(player.cannonPath1XP >= cannonP1T1UnlockXP) {
            cannonP1Num = 1;
        }
        //If cannon path 2 XP is enough for tier 1
        if(player.cannonPath2XP >= cannonP2T1UnlockXP) {
            cannonP2Num = 1;
        }
        //If cannon path 1 XP is enough for tier 2
        if(player.cannonPath1XP >= cannonP1T2UnlockXP) {
            cannonP1Num = 2;
        }
        //If cannon path 2 XP is enough for tier 2
        if(player.cannonPath2XP >= cannonP2T2UnlockXP) {
            cannonP2Num = 2;
        }
        //If cannon path 1 XP is enough for tier 3
        if(player.cannonPath1XP >= cannonP1T3UnlockXP) {
            cannonP1Num = 3;
        }
        //If cannon path 2 XP is enough for tier 3
        if(player.cannonPath2XP >= cannonP2T3UnlockXP) {
            cannonP2Num = 3;
        }
        //If cannon path 1 XP is enough for tier 4
        if(player.cannonPath1XP >= cannonP1T4UnlockXP) {
            cannonP1Num = 4;
        }
        //If cannon path 2 XP is enough for tier 4
        if(player.cannonPath2XP >= cannonP2T4UnlockXP) {
            cannonP2Num = 4;
        }

        //If honey path 1 XP is enough for tier 1
        if(player.honeyPath1XP >= honeyP1T1UnlockXP) {
            honeyP1Num = 1;
        }
        //If honey path 2 XP is enough for tier 1
        if(player.honeyPath2XP >= honeyP2T1UnlockXP) {
            honeyP2Num = 1;
        }
        //If honey path 1 XP is enough for tier 2
        if(player.honeyPath1XP >= honeyP1T2UnlockXP) {
            honeyP1Num = 2;
        }
        //If honey path 2 XP is enough for tier 2
        if(player.honeyPath2XP >= honeyP2T2UnlockXP) {
            honeyP2Num = 2;
        }
        //If honey path 1 XP is enough for tier 3
        if(player.honeyPath1XP >= honeyP1T3UnlockXP) {
            honeyP1Num = 3;
        }
        //If honey path 2 XP is enough for tier 3
        if(player.honeyPath2XP >= honeyP2T3UnlockXP) {
            honeyP2Num = 3;
        }
        //If honey path 1 XP is enough for tier 4
        if(player.honeyPath1XP >= honeyP1T4UnlockXP) {
            honeyP1Num = 4;
        }
        //If honey path 2 XP is enough for tier 4
        if(player.honeyPath2XP >= honeyP2T4UnlockXP) {
            honeyP2Num = 4;
        }
    }

    //setSize() function - Sets the level sprite sizes
    function setSizes() {
        //If sizes need to be set
        if(setSizesBool) {
            //Se BG and FG width and height with resizeFactor
            levelBGSprite.width = appWidth * resizeFactor;
            levelBGSprite.height = appHeight * resizeFactor;
            levelFGSprite.width = appWidth * resizeFactor;
            levelFGSprite.height = appHeight * resizeFactor;

            //Update x and y pos for both
            levelBGSprite.x = xPos;
            levelBGSprite.y = yPos;
            levelFGSprite.x = xPos;
            levelFGSprite.y = yPos;
            setSizesBool = false; //No need to set size anymore
        }
    }

    //lostGame() function - When the player loses, display the loss screen
    function lostGame() {
        //If need to reset
        if(reset) {
            //Hide the play area
            levelContainerBG.visible = false; //Hide it
            waveContainer.visible = false; //Hide it
            towersContainer.visible = false; //Hide it
            projectileContainer.visible = false; //Hide it
            windmillContainer.visible = false; //Hide it
            levelContainerFG.visible = false; //Hide it
            leftBarContainer.visible = false; //Hide it
            infoBarContainer.visible = false; //Hide it
            leftBarTowerSpritesContainer.visible = false; //Hide it
            topBarContainer.visible = false; //Hide it

            //Show the loss screen
            menuContainer.visible = true; //Show it
            lostTitle.visible = true; //Show it
            lostDescription.visible = true; //Show it
            lostQuitButton.visible = true; //Show it
            lostQuitButtonText.visible = true; //Show it
            reset = false; //No need to reset anymore
        }
    }

    //wonGame() function - When the player wins, display the win screen
    function wonGame() {
        //If need to reset
        if(reset) {
            //Reset container visibility for main menu and remove children from menuContainer
            levelContainerBG.visible = false; //Hide it
            waveContainer.visible = false; //Hide it
            towersContainer.visible = false; //Hide it
            projectileContainer.visible = false; //Hide it
            windmillContainer.visible = false; //Hide it
            levelContainerFG.visible = false; //Hide it
            leftBarContainer.visible = false; //Hide it
            infoBarContainer.visible = false; //Hide it
            leftBarTowerSpritesContainer.visible = false; //Hide it
            topBarContainer.visible = false; //Hide it
            showFinalWinMenu();
            reset = false; //No need to reset anymore
        }
    }

    //hideWinMenu() function - Hides the win menu
    function hideWinMenu() {
        //Hide the win screen
        menuContainer.visible = false; //Hide it
        gameWonTitle.visible = false; //Hide it
        gameWonDescription.visible = false; //Hide it
        gameWonQuitButton.visible = false; //Hide it
        gameWonQuitButtonText.visible = false; //Hide it
        gameWonContinueButton.visible = false; //Hide it
        gameWonContinueButtonText.visible = false; //Hide it
    }

    //showWinMenu() function - Shows the win menu
    function showWinMenu() {
        //Show the win screen
        menuContainer.visible = true; //Show it
        gameWonTitle.visible = true; //Show it
        gameWonDescription.visible = true; //Show it
        gameWonQuitButton.visible = true; //Show it
        gameWonQuitButtonText.visible = true; //Show it
        gameWonContinueButton.visible = true; //Show it
        gameWonContinueButtonText.visible = true; //Show it
    }

    //showFinalWinMenu() function - Shows the win menu without the continue button because the windmill has been destroyed or beat last wave
    function showFinalWinMenu() {
        //Show the win screen
        menuContainer.visible = true; //Show it
        gameWonTitle.visible = true; //Show it
        gameWonQuitButton.visible = true; //Show it
        gameWonQuitButtonText.visible = true; //Show it
    }

    //resetGame() function - Resets variables so game can start again
    function resetGame() {
        //Clear arrays
        towers = [];
        projectiles = [];
        ants = [];

        //Remove children from the containers
        levelContainerBG.removeChildren();
        levelContainerFG.removeChildren();
        waveContainer.removeChildren();
        towersContainer.removeChildren();
        projectileContainer.removeChildren();
        windmillContainer.removeChildren();
        leftBarContainer.removeChildren();
        leftBarTowerSpritesContainer.removeChildren();
        topBarContainer.removeChildren();
        menuContainer.removeChildren();
        tooltipContainer.removeChildren();

        //Clear info bard and refill background again
        topBarContainerBG.clear();
        topBarContainerBG.beginFill(0xFFFFFF);
        topBarContainerBG.lineStyle(2, 0x000000);
        topBarContainerBG.drawRect(appWidth-(appWidth*resizeFactor), 0, appWidth*resizeFactor, appHeight-(appHeight*resizeFactor));
        topBarContainer.addChild(topBarContainerBG);

        //Clear tower bar and refill background again
        leftBarContainerBG.clear();
        leftBarContainerBG.beginFill(0xFFFFFF);
        leftBarContainerBG.lineStyle(2, 0x000000);
        leftBarContainerBG.drawRect(0, 0, appWidth-(appWidth*resizeFactor), appHeight);
        leftBarContainer.addChild(leftBarContainerBG);

        //Clear the overlay menu
        overlayMenuBG.clear();
        overlayMenuQuitButton.clear();

        //Make everything but menu container visible and remove children from menu container
        levelContainerBG.visible = false; //Hide it
        waveContainer.visible = false; //Hide it
        towersContainer.visible = false; //Hide it
        projectileContainer.visible = false; //Hide it
        windmillContainer.visible = false; //Hide it
        levelContainerFG.visible = false; //Hide it
        leftBarContainer.visible = false; //Hide it
        infoBarContainer.visible = false; //Hide it
        leftBarTowerSpritesContainer.visible = false; //Hide it
        topBarContainer.visible = false; //Hide it
        overlayMenuContainer.visible = false; //Hide it
        gameWonTitle.visible = false; //Hide it
        gameWonDescription.visible = false; //Hide it
        gameWonQuitButton.visible = false; //Hide it
        gameWonQuitButtonText.visible = false; //Hide it
        gameWonContinueButton.visible = false; //Hide it
        gameWonContinueButtonText.visible = false; //Hide it
        menuContainer.visible = true; //Show it

        //Reset speedUp and waveNumber
        speedUp = 1;
        waveNumber = 1;

        //Reset tier unlocks
        slingshotP1Num = 0;
        slingshotP2Num = 0;
        hammerP1Num = 0;
        hammerP2Num = 0;
        bugSprayP1Num = 0;
        bugSprayP2Num = 0;
        magnifyingGlassP1Num = 0;
        magnifyingGlassP2Num = 0;
        cannonP1Num = 0;
        cannonP2Num = 0;
        honeyP1Num = 0;
        honeyP2Num = 0;

        //Set booleans
        loadWaveBool = true; //If wave needs to be loaded
        placeSlingshot = false; //If placing slingshot tower
        placeHammer = false; //If placing hammer tower
        placeBugSpray = false; //If placing bug spray tower
        placeMagnifyingGlass = false; //If placing magnifying glass tower
        placeCannon = false; //If placing cannon tower
        placeHoney = false; //If placing honey tower
        canClick = true; //Whether the user can click to add another tower or not. If currently placing a tower, they cannot click to add another.
        checkTowerCollision = false; //Initially, do not check for tower collision as there is no towers to check for.
        lost = false; //If the user has lost
        won = false; //If the player has won
        playing = false; //If the user is playing
        waveWonBool = false; //If the wave is won or not
        paused = false; //If paused
        nextWaveBool = false; //If next wave needs to be loaded
        startGameBool = false; //If game is started
        setSizesBool = true; //If sizes need to be set
        reset = true; //If needs to reset due to game being over
        init = true; //If need to initialize
        overlayMenu = false; //If the overlay menu needs to be shown
    }

    //waveWon() function - Called when wave is over and gets ready for next
    function waveWon() {
        //If the player has reached the win condition wave, show win screen and ask if they want to quit or continue
        if(waveNumber === waveNumberWinTarget) {
            //Hide the play area
            levelContainerBG.visible = false; //Hide it
            waveContainer.visible = false; //Hide it
            towersContainer.visible = false; //Hide it
            projectileContainer.visible = false; //Hide it
            windmillContainer.visible = false; //Hide it
            levelContainerFG.visible = false; //Hide it
            leftBarContainer.visible = false; //Hide it
            infoBarContainer.visible = false; //Hide it
            leftBarTowerSpritesContainer.visible = false; //Hide it
            topBarContainer.visible = false; //Hide it
            showWinMenu();
        }
        waveWonBool = true; //Wave won
        player.gold += waveNumber*bonusGoldMultiplier; //Give player bonus gold
        pauseSymbol.visible = false; //Hide pause symbol
        playSymbol.visible = true; //Show play symbol
        multiButton.removeAllListeners(); //Remove listeners from multi button
        multiButton.clear(); //Clear button
        multiButton.beginFill(0xafffaf); //Make green to show next wave is ready
        multiButton.lineStyle(2, 0x000000); //Black stroke
        multiButton.drawRect(0, 0, leftBarContainer.width-2, 100); //Draw it

        multiText.text = "Start Wave " + (waveNumber+1); //Update text to say "Start Wave #"
        multiText.position.x = (leftBarContainer.width/2)-(multiText.width/2); //Set x position
        multiText.position.y = multiButton.y+multiButton.height-multiText.height-5; //Set y position

        //When hovered
        multiButton.on("mouseover", () => {
            //Clear button, make darker green, and redraw
            multiButton.clear();
            multiButton.beginFill(0x70ff70);
            multiButton.lineStyle(2, 0x000000);
            multiButton.drawRect(0, 0, leftBarContainer.width-2, 100);
            hideToolTip();
        });

        //When mouse leaves button
        multiButton.on("mouseout", () => {
            //Clear button, make light green, and redraw
            multiButton.clear();
            multiButton.beginFill(0xafffaf);
            multiButton.lineStyle(2, 0x000000);
            multiButton.drawRect(0, 0, leftBarContainer.width-2, 100);
        });

        //When clicked
        multiButton.on("pointertap", () => {
            //Clear button, make gray, and redraw
            multiButton.clear();
            multiButton.beginFill(0xbbbbbb);
            multiButton.lineStyle(2, 0x000000);
            multiButton.drawRect(0, 0, leftBarContainer.width-2, 100);
            nextWave(); //Call nextWave to start
        });
    }

    //addAnts(array, numAnts, type, armored, regenerative, cloaked, parent) function - Adds ants to passed array and to passed stage
    function addAnts(array, numAnts, type, armored, regenerative, cloaked, parent) {
        let j = array.length; //Index for new element of array

        //For each Ant to add
        for (let i = 0; i < numAnts; i++) {
            array.push(new Ant(type, wps, armored, regenerative, cloaked, parent)); //Add Ant to array

            //If what was just added is an Ant (needed to avoid exception when calling .interactive and.buttonMode)
            if (array[j] instanceof Ant) {
                array[j].setGPS(wps[1][0], wps[1][1]); //Set the Ant's GPS waypoint
            }
            j++; //Increment the element index
        }
    }

    //addSlingshot() function - Adds a slingshot tower
    function addSlingshot() {
        //If not paused and player has enough gold to buy it
        if(!paused && player.gold >= slingshotCost) {
            player.gold -= slingshotCost; //User pays the price
            placeSlingshot = true; //Currently placing slingshot
            towers.push(new Tower(1, mousePos, towersContainer)); //Add the new tower to the towers array
            showSellButton(); //Show the sell button
        }
    }

    //addHammer() function - Adds a hammer tower
    function addHammer() {
        //If not paused and player has enough gold to buy it
        if(!paused && player.gold >= hammerCost) {
            player.gold -= hammerCost; //User pays the price
            placeHammer = true; //Currently placing hammer
            towers.push(new Tower(2, mousePos, towersContainer)); //Add the new tower to the towers array
            showSellButton(); //Show the sell button
        }
    }

    //addBugSpray() function - Adds a bug spray tower
    function addBugSpray() {
        //If not paused and player has enough gold to buy it
        if(!paused && player.gold >= bugSprayCost) {
            player.gold -= bugSprayCost; //User pays the price
            placeBugSpray = true; //Currently placing bug spray
            towers.push(new Tower(3, mousePos, towersContainer)); //Add the new tower to the towers array
            showSellButton(); //Show the sell button
        }
    }

    //addMagnifyingGlass() function - Adds a magnifying glass tower
    function addMagnifyingGlass() {
        //If not paused and player has enough gold to buy it
        if(!paused && player.gold >= magnifyingGlassCost) {
            player.gold -= magnifyingGlassCost; //User pays the price
            placeMagnifyingGlass = true; //Currently placing magnifying glass
            towers.push(new Tower(4, mousePos, towersContainer)); //Add the new tower to the towers array
            showSellButton(); //Show the sell button
        }
    }

    //addCannon() function - Adds a cannon tower
    function addCannon() {
        //If not paused and player has enough gold to buy it
        if(!paused && player.gold >= cannonCost) {
            player.gold -= cannonCost; //User pays the price
            placeCannon = true; //Currently placing cannon
            towers.push(new Tower(5, mousePos, towersContainer)); //Add the new tower to the towers array
            showSellButton(); //Show the sell button
        }
    }

    //addHoney() function - Adds a honey tower
    function addHoney() {
        //If not paused and player has enough gold to buy it
        if(!paused && player.gold >= honeyCost) {
            player.gold -= honeyCost; //User pays the price
            placeHoney = true; //Currently placing honey
            towers.push(new Tower(6, mousePos, towersContainer)); //Add the new tower to the towers array
            showSellButton(); //Show the sell button
        }
    }

    //nextWave() function - Loads and starts the next wave
    function nextWave() {
        playSymbol.visible = false; //Hide play symbol
        pauseSymbol.visible = true; //Show play symbol
        waveWonBool = false; //Wave not won yet
        multiButton.removeAllListeners(); //Remove all listeners
        multiText.text = "Pause"; //Update to "Pause" text
        multiText.position.x = (leftBarContainer.width/2)-(multiText.width/2); //Set x position
        multiText.position.y = multiButton.y+multiButton.height-multiText.height-5; //Set y position

        //Set button colour up again
        multiButton.clear();
        multiButton.beginFill(0xdddddd);
        multiButton.lineStyle(2, 0x000000);
        multiButton.drawRect(0, 0, leftBarContainer.width-2, 100);

        //Follows same mouse interaction logic as before
        multiButton.on("mouseover", () => {
            multiButton.clear();
            multiButton.beginFill(0xbbbbbb);
            multiButton.lineStyle(2, 0x000000);
            multiButton.drawRect(0, 0, leftBarContainer.width-2, 100);
            hideToolTip();
        });
        multiButton.on("mouseout", () => {
            multiButton.clear();
            multiButton.beginFill(0xdddddd);
            multiButton.lineStyle(2, 0x000000);
            multiButton.drawRect(0, 0, leftBarContainer.width-2, 100);
        });
        multiButton.on("pointertap", () => {
            playPause(); //Pauses or plays the game
        });

        //If game is not paused
        if(!paused) {
            //Iterate through all towers
            for(let i = 0; i < towers.length; i++) {
                towers[i].loaded = true; //Make all towers loaded
            }
            //Iterate through all projectiles
            for(let i = 0; i < projectiles.length; i++) {
                projectiles[i].alive = false; //Kill all projectiles so any leftovers will be removed before starting new game
            }
            waveNumber++; //Increment wave
            waveMaker(waveNumber); //Call waveMaker function to load the next wave
            if (paused) {
                playPause(); //Pause or play
            }
        }
    }

    //sellTower(index) function - Accepts an index and sells the corresponding tower
    function sellTower() {
        let index; //Declare index variable, keeps track of tower index
        //Iterate through all towers
        for(let i = 0; i < towers.length; i++) {
            //If the current tower is selected
            if(towers[i].selected) {
                index = i; //Assign the current index i to index
            }
        }
        //If that tower is not being placed, it means it has already been purchased
        if(!towers[index].placing) {
            player.gold += towers[index].cost*0.6; //Sell the tower for 60% of what the user paid
            hideInfoBar(); //Hide the info bar
            hideSellButton(); //Hide the sell button
        }
        //Else, the tower has not yet been placed
        else {
            player.gold += towers[index].cost; //Return player 100% of the money
        }
        //Remove sprite from the container
        towersContainer.removeChildAt(index); //Remove the previous tower from the scene
        towers.splice(index, 1); //Remove the previous tower from the tower object array
    }

    //enableTowerInteraction() function - Enables interaction and buttonMode of all towers
    function enableTowerInteraction() {
        //Iterate through all towers
        for(let i = 0 ; i < towers.length; i++) {
            towers[i].enable(); //Enable them
        }
    }

    //disableTowerInteraction() function - Disables interaction and buttonMode of all towers
    function disableTowerInteraction() {
        //Iterate through all towers
        for (let i = 0; i < towers.length; i++) {
            towers[i].disable(); //Disable them
        }
    }

    //playPause() function - Pauses and resumes the game
    function playPause() {
        //If the game is paused and button is clicked
        if(paused) {
            enableTowerInteraction(); //Enable tower interaction
            hideOverlayMenu(); //Hide the overlay menu
            playSymbol.visible = false; //Hide play symbol
            pauseSymbol.visible = true; //Show pause symbol
            paused = false; //Don't have to convert to pause button anymore
            multiButton.removeAllListeners(); //Remove listeners
            multiText.text = "Pause"; //Update text to "Pause"
            multiText.position.x = (leftBarContainer.width/2)-(multiText.width/2); //Set x position
            multiText.position.y = multiButton.y+multiButton.height-multiText.height-5; //Set y position

            //Button interaction, same logic as previously
            multiButton.on("mouseover", () => {
                multiButton.clear();
                multiButton.beginFill(darkGray);
                multiButton.lineStyle(2, 0x000000);
                multiButton.drawRect(0, 0, leftBarContainer.width-2, 100);
                hideToolTip();
            });
            multiButton.on("mouseout", () => {
                multiButton.clear();
                multiButton.beginFill(lightGray);
                multiButton.lineStyle(2, 0x000000);
                multiButton.drawRect(0, 0, leftBarContainer.width-2, 100);
            });
            multiButton.on("pointertap", () => {
                playPause(); //Pause or play
            });
        }
        //If the game is running and button is clicked - Follows same logic as above but shows play button
        else {
            disableTowerInteraction(); //Disable tower interaction
            playSymbol.visible = true; //Show it
            pauseSymbol.visible = false; //Hide it
            paused = true; //Don't have to convert to the play button anymore
            multiButton.removeAllListeners(); //Remove listeners
            multiText.text = "Play"; //Update text to "Play"
            multiText.position.x = (leftBarContainer.width/2)-(multiText.width/2); //Set x position
            multiText.position.y = multiButton.y+multiButton.height-multiText.height-5; //Set y position

            //Button interaction, same logic as previously
            multiButton.on("mouseover", () => {
                multiButton.clear();
                multiButton.beginFill(0xbbbbbb);
                multiButton.lineStyle(2, 0x000000);
                multiButton.drawRect(0, 0, leftBarContainer.width-2, 100);
                hideToolTip();
            });
            multiButton.on("mouseout", () => {
                multiButton.clear();
                multiButton.beginFill(0xdddddd);
                multiButton.lineStyle(2, 0x000000);
                multiButton.drawRect(0, 0, leftBarContainer.width-2, 100);
            });
            multiButton.on("pointertap", () => {
                playPause();
            });
        }
    }

    //Ant adding functions, passed int is the number of that type of ant to add to the ants array. "A" is armored, "R" is regenerative, and "C" is cloaked.
    //addBrown(int) function - Accepts an int and adds that many brown ants to the waveContainer
    function addBrown(int) {
        addAnts(ants, int, 1, false, false, false, waveContainer);
    }

    //addBrownA(int) function - Accepts an int and adds that many armoured brown ants to the waveContainer
    function addBrownA(int) {
        addAnts(ants, int, 1, true, false, false, waveContainer);
    }

    //addBrownR(int) function - Accepts an int and adds that many regenerative brown ants to the waveContainer
    function addBrownR(int) {
        addAnts(ants, int, 1, false, true, false, waveContainer);
    }

    //addBrownC(int) function - Accepts an int and adds that many cloaked brown ants to the waveContainer
    function addBrownC(int) {
        addAnts(ants, int, 1, false, false, true, waveContainer);
    }

    //addBlue(int) function - Accepts an int and adds that many blue ants to the waveContainer
    function addBlue(int) {
        addAnts(ants, int, 2, false, false, false, waveContainer);
    }

    //addBlueA(int) function - Accepts an int and adds that many armoured blue ants to the waveContainer
    function addBlueA(int) {
        addAnts(ants, int, 2, true, false, false, waveContainer);
    }

    //addBlueR(int) function - Accepts an int and adds that many regenerative blue ants to the waveContainer
    function addBlueR(int) {
        addAnts(ants, int, 2, false, true, false, waveContainer);
    }

    //addBlueC(int) function - Accepts an int and adds that many cloaked blue ants to the waveContainer
    function addBlueC(int) {
        addAnts(ants, int, 2, false, false, true, waveContainer);
    }

    //addGreen(int) function - Accepts an int and adds that many green ants to the waveContainer
    function addGreen(int) {
        addAnts(ants, int, 3, false, false, false, waveContainer);
    }

    //addGreenA(int) function - Accepts an int and adds that many armoured green ants to the waveContainer
    function addGreenA(int) {
        addAnts(ants, int, 3, true, false, false, waveContainer);
    }

    //addGreenR(int) function - Accepts an int and adds that many regenerative green ants to the waveContainer
    function addGreenR(int) {
        addAnts(ants, int, 3, false, true, false, waveContainer);
    }

    //addGreenCloaked(int) function - Accepts an int and adds that many cloaked green ants to the waveContainer
    function addGreenC(int) {
        addAnts(ants, int, 3, false, false, true, waveContainer);
    }

    //addYellow(int) function - Accepts an int and adds that many yellow ants to the waveContainer
    function addYellow(int) {
        addAnts(ants, int, 4, false, false, false, waveContainer);
    }

    //addYellowA(int) function - Accepts an int and adds that many armoured yellow ants to the waveContainer
    function addYellowA(int) {
        addAnts(ants, int, 4, true, false, false, waveContainer);
    }

    //addYellowR(int) function - Accepts an int and adds that many regenerative yellow ants to the waveContainer
    function addYellowR(int) {
        addAnts(ants, int, 4, false, true, false, waveContainer);
    }

    //addYellowC(int) function - Accepts an int and adds that many cloaked yellow ants to the waveContainer
    function addYellowC(int) {
        addAnts(ants, int, 4, false, false, true, waveContainer);
    }

    //addPurple(int) function - Accepts an int and adds that many purple ants to the waveContainer
    function addPurple(int) {
        addAnts(ants, int, 5, false, false, false, waveContainer);
    }

    //addPurpleA(int) function - Accepts an int and adds that many armoured purple ants to the waveContainer
    function addPurpleA(int) {
        addAnts(ants, int, 5, true, false, false, waveContainer);
    }

    //addPurpleR(int) function - Accepts an int and adds that many regenerative purple ants to the waveContainer
    function addPurpleR(int) {
        addAnts(ants, int, 5, false, true, false, waveContainer);
    }

    //addPurpleC(int) function - Accepts an int and adds that many cloaked purple ants to the waveContainer
    function addPurpleC(int) {
        addAnts(ants, int, 5, false, false, true, waveContainer);
    }

    //addBlack(int) function - Accepts an int and adds that many black ants to the waveContainer
    function addBlack(int) {
        addAnts(ants, int, 6, false, false, false, waveContainer);
    }

    //addBlackA(int) function - Accepts an int and adds that many armoured black ants to the waveContainer
    function addBlackA(int) {
        addAnts(ants, int, 6, true, false, false, waveContainer);
    }

    //addBlackR(int) function - Accepts an int and adds that many regenerative black ants to the waveContainer
    function addBlackR(int) {
        addAnts(ants, int, 6, false, true, false, waveContainer);
    }

    //addBlackC(int) function - Accepts an int and adds that many cloaked black ants to the waveContainer
    function addBlackC(int) {
        addAnts(ants, int, 6, false, false, true, waveContainer);
    }

    //addWhite(int) function - Accepts an int and adds that many white ants to the waveContainer
    function addWhite(int) {
        addAnts(ants, int, 7, false, false, false, waveContainer);
    }

    //addWhiteA(int) function - Accepts an int and adds that many armoured white ants to the waveContainer
    function addWhiteA(int) {
        addAnts(ants, int, 7, true, false, false, waveContainer);
    }

    //addWhiteR(int) function - Accepts an int and adds that many regenerative white ants to the waveContainer
    function addWhiteR(int) {
        addAnts(ants, int, 7, false, true, false, waveContainer);
    }

    //addWhiteC(int) function - Accepts an int and adds that many cloaked white ants to the waveContainer
    function addWhiteC(int) {
        addAnts(ants, int, 7, false, false, true, waveContainer);
    }

    //addRed(int) function - Accepts an int and adds that many red ants to the waveContainer
    function addRed(int) {
        addAnts(ants, int, 8, false, false, false, waveContainer);
    }

    //addRedA(int) function - Accepts an int and adds that many armoured red ants to the waveContainer
    function addRedA(int) {
        addAnts(ants, int, 8, true, false, false, waveContainer);
    }

    //addRedR(int) function - Accepts an int and adds that many regenerative red ants to the waveContainer
    function addRedR(int) {
        addAnts(ants, int, 8, false, true, false, waveContainer);
    }

    //addRedC(int) function - Accepts an int and adds that many cloaked red ants to the waveContainer
    function addRedC(int) {
        addAnts(ants, int, 8, false, false, true, waveContainer);
    }

    //addBeetle(int) function - Accepts an int and adds that many beetles to the waveContainer
    function addBeetle(int) {
        addAnts(ants, int, 9, false, false, false, waveContainer);
    }

    //addBeetleA(int) function - Accepts an int and adds that many armoured beetles to the waveContainer
    function addBeetleA(int) {
        addAnts(ants, int, 9, true, false, false, waveContainer);
    }

    //addBeetleC(int) function - Accepts an int and adds that many cloaked beetles to the waveContainer
    function addBeetleC(int) {
        addAnts(ants, int, 9, false, false, true, waveContainer);
    }

    //addGreenLeaf(int) function - Accepts an int and adds that many green leaves to the waveContainer
    function addGreenLeaf(int) {
        addAnts(ants, int, 10, false, false, false, waveContainer);
    }

    //addStyrofoamCup(int) function - Accepts an int and adds that many styrofoam cups to the waveContainer
    function addStyrofoamCup(int) {
        addAnts(ants, int, 11, false, false, false, waveContainer);
    }

    //addSodaCan(int) function - Accepts an int and adds that many soda cans to the waveContainer
    function addSodaCan(int) {
        addAnts(ants, int, 12, false, false, false, waveContainer);
    }

    //addRock(int) function - Accepts an int and adds that many rocks to the waveContainer
    function addRock(int) {
        addAnts(ants, int, 13, false, false, false, waveContainer);
    }

    //waveMaker(int) function - Accepts a wave number and adds respective ants to the current wave.
    function waveMaker(int) {
        waveContainer.removeChildren(); //Remove all children from the wave
        ants = []; //Clear ants array
        if(int === 1) { //INTRO ROUND
            antStagger = 500; //How long to stagger ants, in ms
            addBrown(1);
        }
        if(int === 2) {
            antStagger = 1000; //How long to stagger ants, in ms
            addBrown(20);
        }
        if(int === 3) {
            antStagger = 900; //How long to stagger ants, in ms
            addBrown(35);
        }
        if(int === 4) { //THEY GET FASTER ROUND
            antStagger = 800; //How long to stagger ants, in ms
            addBrown(25);
            addBlue(5);
        }
        if(int === 5) {
            antStagger = 700; //How long to stagger ants, in ms
            addBrown(35);
            addBlue(15);
        }
        if(int === 6) {
            antStagger = 600; //How long to stagger ants, in ms
            addBrown(5);
            addBlue(25);
        }
        if(int === 7) {
            antStagger = 500; //How long to stagger ants, in ms
            addBrown(15);
            addBlue(15);
            addGreen(5);
        }
        if(int === 8) {
            addBrown(20);
            addBlue(20);
            addGreen(5);
        }
        if(int === 9) {
            addBrown(10);
            addBlue(20);
            addGreen(15);
        }
        if(int === 10) {
            addGreen(30);
        }
        if(int === 11) {
            addBlue(100);
        }
        if(int === 12) {
            addBrown(5);
            addBlue(15);
            addGreen(10);
            addYellow(3);
        }
        if(int === 13) {
            addBlue(15);
            addGreen(10);
            addYellow(5);
        }
        if(int === 14) {
            addBlue(50);
            addGreen(20);
        }
        if(int === 15) {
            addBrown(50);
            addBlue(15);
            addGreen(10);
            addYellow(10);
        }
        if(int === 16) {
            addBrown(20);
            addBlue(15);
            addGreen(15);
            addYellow(10);
            addPurple(5);
        }
        if(int === 17) {
            addGreen(40);
            addYellow(10);
            addPurple(5);
        }
        if(int === 18) { //REGEN STARTS
            addYellowR(1);
        }
        if(int === 19) {
            addYellowR(12);
        }
        if(int === 20) {
            addGreen(75);
            addGreenR(5);
        }
        if(int === 21) {
            addGreen(10);
            addYellow(5);
            addYellowR(6);
            addPurple(13);
        }
        if(int === 22) { //FAST STARTS
            addBlack(5);
        }
        if(int === 23) {
            addYellowR(30);
            addPurple(20);
        }
        if(int === 24) { //HARD ROUND
            addBlack(15);
        }
        if(int === 25) { //CLOAKED STARTS
            addGreenC(1);
        }
        if(int === 26) {
            addBlue(20);
            addGreenC(5);
        }
        if(int === 27) {
            addYellowR(20);
            addPurple(10);
            addBlack(5);
        }
        if(int === 28) { //WHITE STARTS (Honey Resistance)
            addWhite(1);
        }
        if(int === 29) {
            addWhite(5); //DEADLY ROUND
        }
        if(int === 30) {
            addPurple(25);
            addWhite(4);
        }
        if(int === 31) {
            addBrown(100);
            addBlue(50);
            addGreen(50);
            addYellow(30);
        }
        if(int === 32) { //ARMOURED STARTS
            addYellowA(1);
        }
        if(int === 33) {
            addYellow(50);
            addGreenR(20);
        }
        if(int === 34) {
            addYellowA(5);
            addGreenA(5);
            addBlack(1);
            addWhite(1);
        }
        if(int === 35) {
            addBlack(15);
            addWhite(5);
            addWhiteR(5);
        }
        if(int === 36) {
            addPurple(10);
            addBlack(15);
            addBlackR(5);
            addWhite(7);
        }
        if(int === 37) {
            addPurpleC(10);
            addBlackC(5);
            addBlueC(5);
        }
        if(int === 38) {
            addYellow(80);
            addPurple(80);
            addWhite(5);
        }
        if(int === 39) { //RED STARTS (Magnifying Glass Resistance)
            addPurple(30);
            addBlack(40);
            addWhite(20);
            addRed(1);
        }
        if(int === 40) {
            antStagger = 100; //How long to stagger ants, in ms
            addPurple(100);
            addPurpleC(5);
            addPurpleR(10);
            addRed(5);
        }
        if(int === 41) {
            addBlack(40);
            addBlackC(10);
            addWhite(10);
            addWhiteA(10);
        }
        if(int === 42) { //BEETLE STARTS (Slingshot Resistance)
            addPurple(40);
            addBlack(20);
            addWhite(10);
            addBeetle(1);
        }
        if(int === 43) {
            addBlack(20);
            addWhite(20);
            addRed(20);
            addRedR(1);
        }
        if(int === 44) { //GREEN LEAF STARTS
            addGreenLeaf(1);
        }
        if(int === 45) {
            addBlack(50);
            addWhite(50);
        }
        if(int === 46) {
            addRedR(10);
            addRedC(10);
        }
        if(int === 47) {
            addRed(10);
            addBeetle(5);
        }
        if(int === 48) {
            addWhite(25);
            addWhiteR(15);
            addWhiteR(5);
        }
        if(int === 49) {
            addPurple(150);
            addPurpleC(20);
            addBeetleA(5);
            addWhite(20);
        }
        if(int === 50) {
            addBeetleA(10);
        }
        if(int === 51) {
            addPurpleC(60);
            addBeetle(15);
        }
        if(int === 52) {
            addPurpleR(40);
            addPurpleC(40);
            addRed(30);
            addBeetleA(5);
        }
        if(int === 53) {
            addBrown(100);
            addGreen(100);
            addYellow(100);
            addPurple(50);
            addWhite(20);
            addRed(20);
            addBeetleA(8);
        }
        if(int === 54) {
            addBrown(25);
            addPurpleA(10);
            addBeetleA(10);
            addGreenLeaf(2);
        }
        if(int === 55) { //CLOAKED BEETLE STARTS
            addRedR(10);
            addBeetleC(10);
        }
        if(int === 56) {
            addRed(25);
            addBeetle(10);
            addGreenLeaf(2);
        }
        if(int === 57) {
            addPurple(50);
            addBlack(10);
            addWhite(5);
            addGreenLeaf(3);
        }
        if(int === 58) {
            addBeetle(30);
            addGreenLeaf(2);
        }
        if(int === 59) {
            addBeetle(40);
            addGreenLeaf(1);
        }
        if(int === 60) {
            addBlackC(20);
            addRedC(20);
            addGreenLeaf(1);
        }
        if(int === 61) {
            addRed(50);
            addGreenLeaf(4);
        }
        if(int === 62) {
            addBeetle(15);
            addBeetleA(8);
            addGreenLeaf(5);
        }
        if(int === 63) {
            addPurpleA(25);
            addYellowA(25);
            addBeetle(20);
            addBeetleC(5);
        }
        if(int === 64) { //STYROFOAM CUP STARTS
            addStyrofoamCup(1);
        }
        if(int === 65) {
            addWhiteR(150);
            addGreenLeaf(5);
        }
        if(int === 66) {
            addBlack(125);
            addWhite(125);
            addRed(15);
            addGreenLeaf(10);
        }
        if(int === 67) {
            addPurpleA(75);
            addBeetle(100);
        }
        if(int === 68) {
            addGreenLeaf(10);
        }
        if(int === 69) {
            addWhite(100);
            addRed(50);
            addBeetle(50);
            addGreenLeaf(3);
            addStyrofoamCup(2);
        }
        if(int === 70) {
            addGreenLeaf(10);
        }
        if(int === 71) {
            addBeetleA(5);
            addGreenLeaf(10);
        }
        if(int === 72) {
            addGreenLeaf(5);
            addStyrofoamCup(1);
        }
        if(int === 73) {
            addBlackR(50);
            addBlackA(50);
            addBeetle(40);
        }
        if(int === 74) {
            addBlackR(50);
            addBlackC(50);
            addRed(100);
            addGreenLeaf(5);
        }
        if(int === 75) {
            addBeetle(50);
            addGreenLeaf(10);
        }
        if(int === 76) {
            addBeetleA(25);
            addStyrofoamCup(2);
        }
        if(int === 77) {
            addGreenLeaf(10);
            addStyrofoamCup(2);
        }
        if(int === 78) {
            addBeetle(50);
            addBeetleA(25);
            addBeetleC(25);
            addStyrofoamCup(1);
        }
        if(int === 79) {
            addBlackA(15);
            addWhiteA(15);
            addGreenLeaf(5);
            addStyrofoamCup(5);
        }
        if(int === 80) {
            addBeetle(50);
            addBeetleA(25);
        }
        if(int === 81) {
            addGreenLeaf(10);
            addStyrofoamCup(5);
        }
        if(int === 82) {
            addBlack(50);
            addRed(50);
            addWhite(50);
            addBeetle(50);
            addBeetleA(10);
            addStyrofoamCup(1);
        }
        if(int === 83) {
            addRedR(500);
            addStyrofoamCup(4);
        }
        if(int === 84) { //SODA CAN STARTS
            addSodaCan(1);
        }
        if(int === 85) {
            addStyrofoamCup(15);
        }
        if(int === 86) {
            addStyrofoamCup(20);
        }
        if(int === 87) {
            addBeetle(50);
            addBeetleA(25);
            addGreenLeaf(30);
        }
        if(int === 88) {
            addGreenLeaf(50);
            addStyrofoamCup(10);
        }
        if(int === 89) {
            addSodaCan(2);
        }
        if(int === 90) {
            addStyrofoamCup(15);
        }
        if(int === 91) {
            addSodaCan(5);
        }
        if(int === 92) {
            addGreenLeaf(15);
            addStyrofoamCup(8);
            addSodaCan(4);
        }
        if(int === 93) {
            addGreenLeaf(20);
            addStyrofoamCup(10);
            addSodaCan(2);
        }
        if(int === 94) { //ROCK STARTS
            addRock(1);
        }
        if(int === 95) {
            addPurpleA(20);
            addPurpleC(20);
            addBlackA(20);
            addWhiteC(20);
            addRock(1);
        }
        if(int === 96) {
            addBeetleA(100);
            addRock(3);
        }
        if(int === 97) {
            addBeetleA(50);
            addBeetleC(50);
            addBrown(5);
            addBlue(5);
            addGreen(5);
            addYellow(5);
            addPurple(5);
            addBlack(5);
            addWhite(5);
            addRed(5);
            addStyrofoamCup(20);
        }
        if(int === 98) {
            addGreenLeaf(25);
            addStyrofoamCup(10);
            addSodaCan(5);
        }
        if(int === 99) {
            addStyrofoamCup(25);
            addSodaCan(10);
        }
        if(int === 100) {
            addGreenLeaf(10);
            addStyrofoamCup(10);
            addSodaCan(10);
            addRock(5);
        }
        if(int >= 101) { //INSANE LEVEL (sends 100 of each ant type)
            addBrown(100);
            addBrownA(100);
            addBrownC(100);
            addBrownR(100);
            addBlue(100);
            addBlueA(100);
            addBlueC(100);
            addBlueR(100);
            addGreen(100);
            addGreenA(100);
            addGreenC(100);
            addGreenR(100);
            addYellow(100);
            addYellowA(100);
            addYellowC(100);
            addYellowR(100);
            addPurple(100);
            addPurpleA(100);
            addPurpleC(100);
            addPurpleR(100);
            addBlack(100);
            addBlackA(100);
            addBlackC(100);
            addBlackR(100);
            addWhite(100);
            addWhiteA(100);
            addWhiteC(100);
            addWhiteR(100);
            addRed(100);
            addRedA(100);
            addRedC(100);
            addRedR(100);
            addBeetle(100);
            addBeetleA(100);
            addBeetleC(100);
            addGreenLeaf(100);
            addStyrofoamCup(100);
            addSodaCan(100);
            addRock(100);
        }

        shuffleArray(ants); //Shuffle the array
        antStaggerTick = 0; //Ticker for ant staggering
        antsLength = 1; //Counter to track how many ants to update. This amount is updated after each antStagger is reached. Starts at 1, and 1 ant is animated, after antStagger is reached, it is 2, then 2 ants are updated, and so forth.
    }

    //shuffleArray(array) function - Shuffle the passed array
    function shuffleArray(array) {
        //Decrement through all objects in array
        for (let i = array.length-1; i > 0; i--) {
            let j = Math.floor(Math.random()*(i+1)); //Initialize random number
            [array[i], array[j]] = [array[j], array[i]]; //Swap array elements
        }
    }

    //rememberMe() function - Sets up cookie with unique auth token, adds auth token to database so user can stay logged in securely
    function rememberMe() {
        //Generate a unique random selector token to be stored on the database and in cookie
        let selector = "<?php
            //randomToken($length = 20) function - Generate a random auth token and return it to selector variable
            function randomToken($length = 20) {
                //return bin2hex(openssl_random_pseudo_bytes($length)); FOR PHP 5
                if(function_exists("random_bytes")) {
                    return bin2hex(random_bytes($length));
                }
            }
            echo RandomToken()?>";

        let validator = player.username; //Set the validator to be plaintext username
        document.cookie = selector+":"+validator; //Set the cookie as "selector:validator"

        let obj = {selector:selector, validator:validator, id:player.id}; //Create JSON object
        let json = JSON.stringify(obj); //Stringify the object

        let response; //xmlhttp response
        let xmlhttp = new XMLHttpRequest(); //xmlhttp request

        //xmlhttp callback - Is performed when xmlhttp response is received
        xmlhttp.onreadystatechange = function () {
            //If request is finished and response is ready
            if(xmlhttp.readyState === 4) {

                //If status is OK
                if(xmlhttp.status === 200) {
                    //console.log("Successfully updated user stats"); //For debugging
                }
                else {
                    //console.log("Failed to update user stats"); //For debugging
                }
            }
        };

        //Send as POST to addAuthToken.php
        xmlhttp.open("POST", "lib/addAuthToken.php?", true); //Asynchronously open xmlhttp to addAuthToken.php
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); //Set the request header
        xmlhttp.send(json); //Send JSON object
    }

    //updatePlayerStats() function - Updates the player stats to the database
    function updatePlayerStats() {
        //If the user is logged in
        if(loggedIn) {
            //Create the player object as a JSON object
            let obj = {id: player.id, email: player.email, password: player.password, xp:player.xp, slingshotPath1XP:player.slingshotPath1XP, slingshotPath2XP:player.slingshotPath2XP, hammerPath1XP:player.hammerPath1XP, hammerPath2XP:player.hammerPath2XP, bugSprayPath1XP:player.bugSprayPath1XP, bugSprayPath2XP:player.bugSprayPath2XP, magnifyingGlassPath1XP:player.magnifyingGlassPath1XP, magnifyingGlassPath2XP:player.magnifyingGlassPath2XP, cannonPath1XP:player.cannonPath1XP, cannonPath2XP:player.cannonPath2XP, honeyPath1XP:player.honeyPath1XP, honeyPath2XP:player.honeyPath2XP, windmillSetting:player.windmillSetting, firstLogin:player.firstLogin};
            let json = JSON.stringify(obj); //Stringify the object

            //AJAX
            let response; //xmlhttp response
            let xmlhttp = new XMLHttpRequest(); //xmlhttp request

            //xmlhttp callback - Is performed when xmlhttp response is received
            xmlhttp.onreadystatechange = function() {

                //If request is finished and response is ready
                if(xmlhttp.readyState === 4) {

                    //If status is OK
                    if(xmlhttp.status === 200) {
                        //console.log("Successfully updated user stats"); //For debugging
                    }
                    else {
                        //console.log("Failed to update user stats"); //For debugging
                    }
                }
            };

            //Send as POST to updatePlayerStats.php
            xmlhttp.open("POST", "lib/updatePlayerStats.php?", true); //Asynchronously open xmlhttp to updatePlayerStats.php
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); //Set the request header
            xmlhttp.send(json); //Send JSON object
        }
    }

    //addPlayer() function - Adds a player to the database
    function addPlayer() {
        let username = document.getElementById("signupusername").value; //Get username from sign up modal
        let email = document.getElementById("signupemail").value; //Get email from sign up modal
        let password = document.getElementById("signuppassword").value; //Get password from sign up modal

        let obj = {username:username, password:password, email:email}; //Create the player object as a JSON object
        let json = JSON.stringify(obj); //Stringify the object

        //AJAX
        let response; //xmlhttp response
        let xmlhttp = new XMLHttpRequest(); //xmlhttp request

        //xmlhttp callback - Is performed when xmlhttp response is received
        xmlhttp.onreadystatechange = function() {

            //If request is finished and response is ready
            if(xmlhttp.readyState === 4) {

                //If status is OK
                if(xmlhttp.status === 200) {
                    response = xmlhttp.responseText; //Assign xmlhttp response
                    //If the response is "exists' it means the email is already in use
                    if(response === "exists") {
                        document.getElementById("signupaccountexists").style.visibility = "visible"; //Show the alert saying the account already exists on the sign up modal
                        document.getElementById("signupemail").focus(); //Focus on the email form
                        document.getElementById("signupemail").select(); //Select the email form
                    }

                    //If the response is "success" it means the email is not taken and the user has been signed up successfully
                    if(response === "success") {
                        signupModal.style.display = "none"; //Hide the sign up modal
                        let obj = {email:email, password:password}; //Create the login JSON object
                        let json = JSON.stringify(obj); //Stringify the object

                        //AJAX
                        let response; //xmlhttp response
                        let xmlhttp = new XMLHttpRequest(); //xmlhttp request

                        //xmlhttp callback - Is performed when xmlhttp response is received
                        xmlhttp.onreadystatechange = function() {

                            //If request is finished and response is ready
                            if(xmlhttp.readyState === 4) {

                                //If status is OK
                                if(xmlhttp.status === 200) {
                                    response = JSON.parse(xmlhttp.responseText); //Parse JSON object and assign to response variable
                                    //If response is "logIn: F", the user is not logged in and will be redirected to the log in page
                                    if(response["logIn"] === "F") {
                                        document.getElementById("pta").style.visibility = "visible"; //Show the please try again message on the login modal
                                    }
                                    //Else, user is authenticated
                                    else {
                                        loginModal.style.display = "none"; //Hide the login modal
                                        player = new Player(response); //Create user object
                                        windmill = player.windmillSetting; //Set windmill
                                        hideMainMenu(); //Hide the main menu
                                        showLoggedInMenu(); //Show the logged in menu
                                        logIn(); //Call logIn()
                                    }
                                }
                                //Else, response not recieved
                                else {
                                    //console.log("Failed"); //For debugging
                                }
                            }
                        };

                        //Send as POST to login.php
                        xmlhttp.open("POST", "lib/login.php?", true); //Asynchronously open xmlhttp to login.php
                        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); //Set the request header
                        xmlhttp.send(json); //Send JSON object
                    }
                }
                else {
                    //console.log("Failed to update user stats"); //For debugging
                }
            }
        };

        //Send as POST to addPlayer.php
        xmlhttp.open("POST", "lib/addPlayer.php?", true); //Asynchronously open xmlhttp to addPlayer.php
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); //Set the request header
        xmlhttp.send(json); //Send JSON object
    }

    autoSaveTicker = 0; //Update autoSaveTicker to 0
//**Loop------------------------------------------------------------------------------------------
    app.ticker.add(delta => update(delta)); //Create ticker
    //update() function - Updates ants
    function update(delta) {
        updateToolTipPosition();
        //If the user is logged in
        if(loggedIn) {
            autoSaveTicker += app.ticker.elapsedMS; //Update autosave ticker
            //If 30 seconds has passed
            if(autoSaveTicker > 30000) {
                updatePlayerStats(); //Update the player stats
                autoSaveTicker = 0; //Reset auto save ticker
            }
        }
        //If the assets are not loaded yet
        if(!assetsLoaded) {
            percentageText.text = getProgress(); //Update loading screen
        }
        //If assets are loaded, play the game
        if(assetsLoaded) {
            //If initialization needs to occur
            if (init) {
                initialize(); //Initialize
                init = false; //No need to initialize anymore
            }
            //If the user is playing and not paused
            else if (playing && !paused && !lost && !won) {
                //If the player has enough money to buy a slingshot tower
                if(player.gold >= slingshotCost) {
                    //Set sprite alpha
                    slingshotButtonSprite.sprite1.alpha = 1;
                    slingshotButtonSprite.sprite2.alpha = 1;
                    slingshotButtonSprite.sprite3.alpha = 1;
                    
                    //Set text alpha
                    slingshotText.alpha = 1;
                    slingshotCostText.alpha = 1;
                    
                    //When hovered
                    slingshotButton.on("mouseover", () => {
                        slingshotButton.clear(); //Clear the button
                        slingshotButton.beginFill(0xbbbbbb); //Fill dark grey
                        slingshotButton.lineStyle(2, 0x000000); //Black stroke
                        slingshotButton.drawRect(0, 0, leftBarContainer.width-2, 140); //Draw it
                        updateToolTip("Buy slingshot tower\n("+slingshotCost+" gold)"); //Update tooltip text
                        showToolTip(); //Show tooltip
                    });
                }

                //Else, they can't afford it, they can't afford it
                else {
                    //Set sprite alpha
                    slingshotButtonSprite.sprite1.alpha = 0.25;
                    slingshotButtonSprite.sprite2.alpha = 0.25;
                    slingshotButtonSprite.sprite3.alpha = 0.25;
                    //Set text alpha
                    slingshotText.alpha = 0.25;
                    slingshotCostText.alpha = 0.25;

                    //When hovered
                    slingshotButton.on("mouseover", () => {
                        slingshotButton.clear(); //Clear the button
                        slingshotButton.beginFill(0xbbbbbb); //Fill dark grey
                        slingshotButton.lineStyle(2, 0x000000); //Black stroke
                        slingshotButton.drawRect(0, 0, leftBarContainer.width-2, 140); //Draw it
                        updateToolTip("Not enough gold"); //Update tooltip text
                        showToolTip(); //Show tooltip
                    });
                }

                //If the user can afford to buy the hammer tower
                if(player.gold >= hammerCost) {
                    hammerButtonSprite.sprite1.alpha = 1;
                    hammerButtonSprite.sprite2.alpha = 1;
                    hammerText.alpha = 1;
                    hammerCostText.alpha = 1;
                    hammerButton.on("mouseover", () => {
                        hammerButton.clear();
                        hammerButton.beginFill(0xbbbbbb);
                        hammerButton.lineStyle(2, 0x000000);
                        hammerButton.drawRect(0, 0, leftBarContainer.width-2, 140);
                        updateToolTip("Buy hammer tower\n("+hammerCost+" gold)"); //Update tooltip text
                        showToolTip(); //Show tooltip
                    });
                }

                //Else, they can't afford it
                else {
                    //Set sprite alpha
                    hammerButtonSprite.sprite1.alpha = 0.25;
                    hammerButtonSprite.sprite2.alpha = 0.25;

                    //Set text alpha
                    hammerText.alpha = 0.25;
                    hammerCostText.alpha = 0.25;

                    //When hovered
                    hammerButton.on("mouseover", () => {
                        hammerButton.clear();
                        hammerButton.beginFill(0xbbbbbb);
                        hammerButton.lineStyle(2, 0x000000);
                        hammerButton.drawRect(0, 0, leftBarContainer.width-2, 140);
                        updateToolTip("Not enough gold"); //Update tooltip text
                        showToolTip(); //Show tooltip
                    });
                }

                //If the user can afford to buy the bug spray tower
                if(player.gold >= bugSprayCost) {
                    bugSprayButtonSprite.sprite1.alpha = 1;
                    bugSprayButtonSprite.sprite2.alpha = 1;
                    bugSprayText.alpha = 1;
                    bugSprayCostText.alpha = 1;
                    bugSprayButton.on("mouseover", () => {
                        bugSprayButton.clear();
                        bugSprayButton.beginFill(0xbbbbbb);
                        bugSprayButton.lineStyle(2, 0x000000);
                        bugSprayButton.drawRect(0, 0, leftBarContainer.width-2, 140);
                        updateToolTip("Buy bug spray tower\n("+bugSprayCost+" gold)"); //Update tooltip text
                        showToolTip(); //Show tooltip
                    });
                }

                //Else, they can't afford it
                else {
                    //Set sprite alpha
                    bugSprayButtonSprite.sprite1.alpha = 0.25;
                    bugSprayButtonSprite.sprite2.alpha = 0.25;

                    //Set text alpha
                    bugSprayText.alpha = 0.25;
                    bugSprayCostText.alpha = 0.25;

                    //When hovered
                    bugSprayButton.on("mouseover", () => {
                        bugSprayButton.clear();
                        bugSprayButton.beginFill(0xbbbbbb);
                        bugSprayButton.lineStyle(2, 0x000000);
                        bugSprayButton.drawRect(0, 0, leftBarContainer.width-2, 140);
                        updateToolTip("Not enough gold"); //Update tooltip text
                        showToolTip(); //Show tooltip
                    });
                }

                //If the user can afford to buy the magnifying glass tower
                if(player.gold >= magnifyingGlassCost) {
                    magnifyingGlassButtonSprite.sprite1.alpha = 1;
                    magnifyingGlassButtonSprite.sprite2.alpha = 1;
                    magnifyingGlassText.alpha = 1;
                    magnifyingGlassCostText.alpha = 1;
                    magnifyingGlassButton.on("mouseover", () => {
                        magnifyingGlassButton.clear();
                        magnifyingGlassButton.beginFill(0xbbbbbb);
                        magnifyingGlassButton.lineStyle(2, 0x000000);
                        magnifyingGlassButton.drawRect(0, 0, leftBarContainer.width-2, 140);
                        updateToolTip("Buy magnifying glass tower\n("+magnifyingGlassCost+" gold)"); //Update tooltip text
                        showToolTip(); //Show tooltip
                    });
                }

                //Else, they can't afford it
                else {
                    //Set sprite alpha
                    magnifyingGlassButtonSprite.sprite1.alpha = 0.25;
                    magnifyingGlassButtonSprite.sprite2.alpha = 0.25;

                    //Set text alpha
                    magnifyingGlassText.alpha = 0.25;
                    magnifyingGlassCostText.alpha = 0.25;

                    //When hovered
                    magnifyingGlassButton.on("mouseover", () => {
                        magnifyingGlassButton.clear();
                        magnifyingGlassButton.beginFill(0xbbbbbb);
                        magnifyingGlassButton.lineStyle(2, 0x000000);
                        magnifyingGlassButton.drawRect(0, 0, leftBarContainer.width-2, 140);
                        updateToolTip("Not enough gold"); //Update tooltip text
                        showToolTip(); //Show tooltip
                    });
                }

                //If the user can afford to buy the cannon tower
                if(player.gold >= cannonCost) {
                    cannonButtonSprite.sprite1.alpha = 1;
                    cannonButtonSprite.sprite2.alpha = 1;
                    cannonText.alpha = 1;
                    cannonCostText.alpha = 1;
                    cannonButton.on("mouseover", () => {
                        cannonButton.clear();
                        cannonButton.beginFill(0xbbbbbb);
                        cannonButton.lineStyle(2, 0x000000);
                        cannonButton.drawRect(0, 0, leftBarContainer.width-2, 140);
                        updateToolTip("Buy cannon tower\n("+cannonCost+" gold)"); //Update tooltip text
                        showToolTip(); //Show tooltip
                    });
                }

                //Else, they can't afford it
                else {
                    //Set sprite alpha
                    cannonButtonSprite.sprite1.alpha = 0.25;
                    cannonButtonSprite.sprite2.alpha = 0.25;

                    //Set text alpha
                    cannonText.alpha = 0.25;
                    cannonCostText.alpha = 0.25;

                    //When hovered
                    cannonButton.on("mouseover", () => {
                        cannonButton.clear();
                        cannonButton.beginFill(0xbbbbbb);
                        cannonButton.lineStyle(2, 0x000000);
                        cannonButton.drawRect(0, 0, leftBarContainer.width-2, 140);
                        updateToolTip("Not enough gold"); //Update tooltip text
                        showToolTip(); //Show tooltip
                    });
                }

                //If the user can afford to buy the honey tower
                if(player.gold >= honeyCost) {
                    honeyButtonSprite.sprite1.alpha = 1;
                    honeyButtonSprite.sprite2.alpha = 1;
                    honeyText.alpha = 1;
                    honeyCostText.alpha = 1;
                    honeyButton.on("mouseover", () => {
                        honeyButton.clear();
                        honeyButton.beginFill(0xbbbbbb);
                        honeyButton.lineStyle(2, 0x000000);
                        honeyButton.drawRect(0, 0, leftBarContainer.width-2, 140);
                        updateToolTip("Buy honey tower\n("+honeyCost+" gold)"); //Update tooltip text
                        showToolTip(); //Show tooltip
                    });
                }

                //Else, they can't afford it
                else {
                    //Set sprite alpha
                    honeyButtonSprite.sprite1.alpha = 0.25;
                    honeyButtonSprite.sprite2.alpha = 0.25;

                    //Set text alpha
                    honeyText.alpha = 0.25;
                    honeyCostText.alpha = 0.25;

                    //When hovered
                    honeyButton.on("mouseover", () => {
                        honeyButton.clear();
                        honeyButton.beginFill(0xbbbbbb);
                        honeyButton.lineStyle(2, 0x000000);
                        honeyButton.drawRect(0, 0, leftBarContainer.width-2, 140);
                        updateToolTip("Not enough gold"); //Update tooltip text
                        showToolTip(); //Show tooltip
                    });
                }

                //If the user has enough money to buy the next tier in path 1 and it is unlocked
                if(player.gold >= currentTower.path1Cost && showPath1Green && currentTower.path1 < 4) {
                    path1Button.clear(); //Clear the button
                    path1Button.beginFill(darkGreen); //Fill dark green
                    path1Button.lineStyle(2, 0x000000); //Black stroke
                    path1Button.drawRect(0, 0, leftBarContainer.width - 2, nextPath1Description.height + 10); //Draw it
                    nextPath1Description.alpha = 1;
                }
                else {
                    path1Button.clear(); //Clear the button
                    path1Button.beginFill(darkGray); //Fill dark grey
                    path1Button.lineStyle(2, 0x000000); //Black stroke
                    path1Button.drawRect(0, 0, leftBarContainer.width - 2, nextPath1Description.height + 10); //Draw it
                    nextPath1Description.alpha = 0.25;
                }

                //If the user has enough money to buy the next tier in path 2 and it is unlocked
                if(player.gold >= currentTower.path2Cost && showPath2Green && currentTower.path2 < 4) {
                    path2Button.clear(); //Clear the button
                    path2Button.beginFill(darkGreen); //Fill dark green
                    path2Button.lineStyle(2, 0x000000); //Black stroke
                    path2Button.drawRect(0, 0, leftBarContainer.width - 2, nextPath2Description.height + 10); //Draw it
                    nextPath2Description.alpha = 1;
                }
                else {
                    path2Button.clear(); //Clear the button
                    path2Button.beginFill(darkGray); //Fill dark grey
                    path2Button.lineStyle(2, 0x000000); //Black stroke
                    path2Button.drawRect(0, 0, leftBarContainer.width - 2, nextPath2Description.height + 10); //Draw it
                    nextPath2Description.alpha = 0.25;
                }

                //If the user has upgraded past tier 2 in path 2, path 1 button should be dark gray
                if(currentTower.path2 > 2 && currentTower.path1 > 1) {
                    path1Button.clear(); //Clear the button
                    path1Button.beginFill(darkGray); //Fill dark grey
                    path1Button.lineStyle(2, 0x000000); //Black stroke
                    path1Button.drawRect(0, 0, leftBarContainer.width - 2, nextPath1Description.height + 10); //Draw it
                    nextPath1Description.alpha = 0.25;
                }

                //If the user has upgraded past tier 2 in path 1, path 2 button should be dark gray
                if(currentTower.path1 > 2 && currentTower.path2 > 1) {
                    path2Button.clear(); //Clear the button
                    path2Button.beginFill(darkGray); //Fill dark grey
                    path2Button.lineStyle(2, 0x000000); //Black stroke
                    path2Button.drawRect(0, 0, leftBarContainer.width - 2, nextPath2Description.height + 10); //Draw it
                    nextPath2Description.alpha = 0.25;
                }


                //If music is playing
                if(!music.paused) {
                    musicOnSprite.visible = true; //Show the music on sprite
                    musicOffSprite.visible = false; //Hide the music off sprite
                }

                //Else, if music is not playing
                else {
                    musicOnSprite.visible = false; //Hide the music on sprite
                    musicOffSprite.visible = true; //Show the music off sprite
                }
                playNextSong(); //Call playNextSong()
                setSizes(); //Set sizes
                updateWindmill(); //Update the windmill
                updateInfoText(); //Update the information text

                //If the game should be started
                if(startGameBool) {
                    //Load the first wave
                    if (loadWaveBool) {
                        waveMaker(1); //Set wave 1
                        loadWaveBool = false; //No need to load wave 1 anymore
                    }
                    antStaggerTick += app.ticker.elapsedMS * speedUp; //Update antStaggerTick

                    //If antStagger time has passed
                    if (antStaggerTick >= antStagger) {

                        //If antsLength is less than the size of the ants array, increment it (this staggers the ants so they don't all walk in one blob)
                        if (antsLength < ants.length) {
                            antsLength++; //Increment antsLength
                        }
                        antStaggerTick = 0; //Reset ticker
                    }

                    //Iterate through ants in array and update them
                    for (let i = 0; i < antsLength; i++) {
                        ants[i].update(); //Call update on ants

                        //If the current ant is dead
                        if (!ants[i].alive) {
                            antsLength--; //Decrement antsLength because ant is being removed
                            waveContainer.removeChild(ants[i]); //Remove it from the stage
                            ants.splice(i, 1); //Remove the ant from the array
                        }

                        //If antsLength is more than the actual number of elements int he array
                        if (antsLength >= ants.length) {
                            antsLength = ants.length; //Set antsLength to ants.length (avoid element index oob)
                        }

                    }
                }
                //Iterate through all towers and update them
                for (let i = 0; i < towers.length; i++) {
                    towers[i].update(); //Update tower

                    //If the current tower is selected, update selectedTowerIndex
                    if(towers[i].selected) {
                        selectedTowerIndex = i; //Update selectedTowerIndex
                    }
                }
                //If game should start
                if(startGameBool) {
                    //Iterate through all projectiles and update them
                    for (let i = 0; i < projectiles.length; i++) {
                        projectiles[i].update(); //Update projectile
                        //If the projectile is dead
                        if (!projectiles[i].alive) {
                            projectileContainer.removeChild(projectiles[i]); //Remove the projectile from the container
                            projectiles.splice(i, 1); //Remove projectile
                        }
                    }
                    //If ants are all dead
                    if (ants.length === 0 && !waveWonBool) {
                        waveWon(); //Call waveWon to set up for next wave
                    }
                }
            }
            //If the user has lost
            else if(lost) {
                lostGame(); //Call loseGame to end game
            }
            else if(won) {
                wonGame(); //Call wonGame to end game
            }
        }
    }

//**Handle input from HTML5------------------------------------------------------------------------------------------------------
    // Get the modals
    let loginModal = document.getElementById('loginpopup'); //Login modal
    let signupModal = document.getElementById('signuppopup'); //Sign up modal

    // When the user clicks anywhere outside of the modal, close it
    window.onmousedown = function(event) {
        //If the loginModal was selected
        if (event.target === loginModal) {
            loginModal.style.display = "none"; //Hide it
        }
        //If the signupModal was selected
        if(event.target === signupModal) {
            signupModal.style.display = "none"; //Hide it
        }
    };

    //Add event listener to submit button on login modal
    document.getElementById("loginform").addEventListener("submit", function(e) {
        e.preventDefault();
    });

    //Add event listener to submit button on sign up modal
    document.getElementById("signupform").addEventListener("submit", function(e) {
        e.preventDefault();
    });

    //login() function - Called when user attempts to log in in login modal
    function login() {

        let email = document.getElementById("email").value; //Get the email address
        let password = document.getElementById("password").value; //Get the password
        let obj = {email:email, password:password}; //Create JSON object
        let json = JSON.stringify(obj); //Stringify the JSON object

        //AJAX
        let response; //xmlhttp response
        let xmlhttp = new XMLHttpRequest(); //xmlhttp request

        //xmlhttp callback - Is performed when xmlhttp response is received
        xmlhttp.onreadystatechange = function() {

            //If request is finished and response is ready
            if(xmlhttp.readyState === 4) {

                //If status is OK
                if(xmlhttp.status === 200) {
                    response = JSON.parse(xmlhttp.responseText); //Parse JSON object into response
                    //If response is "logIn: F", the user is not logged in and will be redirected to the log in page
                    if(response["logIn"] === "F") {
                        document.getElementById("pta").style.visibility = "visible"; //Show the please try again message in the modal
                    }
                    //Else, user is authenticated
                    else {
                        loginModal.style.display = "none"; //Hide the modal
                        player = new Player(response); //Create user object
                        windmill = player.windmillSetting; //Set windmill
                        hideMainMenu(); //Hide the main menu
                        showLoggedInMenu(); //Show the logged in menu
                        logIn(); //Log in
                        //If the user wants to remember login
                        if(document.getElementById("remember").checked) {
                            rememberMe(); //Call rememberMe() to set up cookies
                        }
                    }
                }
                //Else, request failed
                else {
                    //console.log("Failed"); //For debugging
                }
            }
        };

        //Send as GET to login.php
        xmlhttp.open("POST", "lib/login.php?", true); //Asynchronously open xmlhttp to login.php
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); //Set the request header
        xmlhttp.send(json); //Send JSON object
    }
</script>
</body>
</html>