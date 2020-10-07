/*
* Author: Chad Cromwell
* Date: 2019-03-25
* Description: Contains variables for the game
* Functions:
*           setup() function - Sets up PIXI
*           onAssetsLoaded() function - Called once all assets are loaded
*           getProgress() function - Return true progress amount regardless of nested assets
*           onProgress() function - Called each time progress is made on the loader
*/
//Aliases
let Application = PIXI.Application,
    loader = PIXI.loader,
    resources = PIXI.loader.resources,
    Sprite = PIXI.Sprite,
    Texture = PIXI.Texture.from;

//Set up Pixi app/canvas
let width = window.innerWidth-(window.innerWidth*.025); //Set width
let height = ((width/16)*9); //Set height in reference to window width (16:9)
let ratio = width/height; //Resolution ratio
let appWidth = 1920; //Width
let appHeight = 1080; //Height
let app = new Application({width: appWidth, height: appHeight}); //Create pixi app, initialize as 1080
let resizeFactor = .90; //Factor to resize play area
let xPos = appWidth-(appWidth*resizeFactor); //x position of play area
let yPos = appHeight-(appHeight*resizeFactor); //y position of play area
let mousePos = app.renderer.plugins.interaction.mouse.global; //Mouse position
let selectedTowerIndex; //The index of the selected tower in towers array, used for populating tower menu data
let player = new Player("Chad", "PW"); //Player object
let guest = true; //If the player is a guest or not
let guestPlayer = new Player({"id":null,"username":"Guest","xp":0,"slingshotPath1XP":0,"slingshotPath2XP":0,"hammerPath1XP":0,"hammerPath2XP":0,"bugSprayPath1XP":0,"bugSprayPath2XP":0,"magnifyingGlassPath1XP":0,"magnifyingGlassPath2XP":0,"cannonPath1XP":0,"cannonPath2XP":0,"honeyPath1XP":0,"honeyPath2XP":0,"windmillSetting":1,"firstLogin":1});

//App CSS
app.renderer.view.style.display = "block"; //CSS block so we can center it
app.renderer.view.style.margin = "auto"; //CSS margin, centers it
app.renderer.autoResize = true; //Pixi autoresize
app.renderer.backgroundColor = 0xffffff; //Set background colour

document.body.appendChild(app.view); //Add the canvas that Pixi automatically created to the HTML document
resize(); //Resize to fit window (by initializing at 1080, then resizing, it prevents loss of quality when sprites are scaled large from a small window

//Sounds
let armoredDeflectSoundArray = []; //Array that holds pool of armor deflect Audio objects
let hitAntSoundArray = []; //Array that holds pool of hit ant Audio objects
let killAntSoundArray = []; //Array that holds pool of kill ant Audio objects
let hitWindmillSoundArray = []; //Array that holds pool of hit windmill Audio objects
let slingshotSoundArray = []; //Array that holds pool of slingshot Audio objects
let hammerSoundArray = []; //Array that holds pool of hammer Audio objects
let bugSpraySoundArray = []; //Array that holds pool of bug spray Audio objects
let magnifyingGlassSoundArray = []; //Array that holds pool of magnifying glass Audio objects
let cannonSoundArray = []; //Array that holds pool of cannon Audio objects
let honeySoundArray = []; //Array that holds pool of honey Audio obejects
let musicArray = []; //Array that holds background music Audio objects
let music; //Holds the current background song
let playMusic = true; //If the music should be played or not
let playSoundEffects = true; //If sound effects should be played or not

//Volumes
let musicVolume = 0.2; //Set volume
let armoredDeflectVolume = 0.05; //Set volume
let hitAntVolume = 0.1; //Set volume
let killAntVolume = 0.07; //Set volume
let hitWindmillVolume = 0.2; //Set volume
let slingshotVolume = 0.1; //Set volume
let hammerVolume = 0.2; //Set volume
let bugSprayVolume = 0.1; //Set volume
let magnifyingGlassVolume = 0.05; //Set volume
let cannonVolume = 0.2; //Set volume
let honeyVolume = 0.1; //Set volume

//Tooltip
let tooltipBox; //Tooltip box
let tooltipText; //Tooltip text
let tooltipAlpha = 0.25; //Tooltip alpha

//Media buttons
let sfxButton; //Sound effects button
let musicButton; //Music button

//Title menu variables
let titleMenuTitle; //Title menu title text
let titleMenuDescription; //Title menu description text
let titleMenuSignUpButton; //Title menu sign up button
let titleMenuSignUpButtonText; //Title menu sign up button text
let titleMenuGuestButton; //Login menu guest button
let titleMenuGuestButtonText; //Login menu guest button text
let titleMenuLoginButton; //Login menu log in button
let titleMenuLoginButtonText; //Login menu button text

//Logged in menu variables
let loggedInMenuTitle; //Logged in menu title
let loggedInMenuWindmillButton; //Logged in menu windmill button
let loggedInMenuWindmillButtonText; //Logged in menu windmill button text
let loggedInMenuTowersButton; //Logged in menu towers button
let loggedInMenuTowersButtonText; //Logged in menu tower button text
let loggedInMenuPlayButton; //Logged in menu play button
let loggedInMenuPlayButtonText; //Logged in menu play button text
let loggedInMenuLogOutButton; //Logged in menu log out button
let loggedInMenuLogOutButtonText; //Logged in menu log out button

//Windmill menu variables
let windmillMenuTitle; //Windmill menu title
let windmillMenuDescription; //Windmill menu titleMenuDescription
let windmillMenuWoodButton; //Windmill menu wood button
let windmillMenuWoodButtonText; //Windmill menu wood button text
let windmillMenuStoneButton; //Windmill menu stone button
let windmillMenuStoneButtonText; //Windmill menu stone button text
let windmillMenuConcreteButton; //Windmill menu concrete button
let windmillMenuConcreteButtonText; //Windmill menu concrete button text
let windmillMenuSteelButton; //Windmill menu steel button
let windmillMenuSteelButtonText; //Windmill menu steel button text
let windmillMenuBackButton; //Windmill menu back button
let windmillMenuBackButtonText; //Windmill menu back button text

//Towers menu variables
let towersMenuTitle; //Towers menu title
let towersMenuSlingshotImage; //Towers menu slingshot image
let towersMenuHammerImage; //Towers menu hammer image
let towersMenuBugSprayImage; //Towers menu bug spray image
let towersMenuMagnifyingGlassImage; //Towers menu magnifying glass image
let towersMenuCannonImage; //Towers menu cannon image
let towersMenuHoneyImage; //Towers menu honey image
let towersMenuSlingshotText; //Towers menu slingshot text for XP
let towersMenuHammerText; //Towers menu hammer text for XP
let towersMenuBugSprayText; //Towers menu bug spray text for XP
let towersMenuMagnifyingGlassText; //Towers menu magnifying glass text for XP
let towersMenuCannonText; //Towers menu cannon text for XP
let towersMenuHoneyText; //Towers menu honey text for XP
let towersMenuSlingshotTierText; //Towers menu slingshot tier text for XP
let towersMenuHammerTierText; //Towers menu hammer tier text for XP
let towersMenuBugSprayTierText; //Towers menu bug tier spray text for XP
let towersMenuMagnifyingGlassTierText; //Towers menu magnifying tier glass text for XP
let towersMenuCannonTierText; //Towers menu cannon tier text for XP
let towersMenuHoneyTierText; //Towers menu honey tier text for XP
let towersMenuBackButton; //Towers menu back button
let towersMenuBackButtonText; //Towers menu back button text
let slingshotP1Num = 0; //Holds path 1 tier number for slingshot
let slingshotP2Num = 0; //Holds path 2 tier number for slingshot
let hammerP1Num = 0; //Holds path 1 tier number for hammer
let hammerP2Num = 0; //Holds path 2 tier number for hammer
let bugSprayP1Num = 0; //Holds path 1 tier number for bug spray
let bugSprayP2Num = 0; //Holds path 2 tier number for bug spray
let magnifyingGlassP1Num = 0; //Holds path 1 tier number for magnifying glass
let magnifyingGlassP2Num = 0; //Holds path 2 tier number for magnifying glass
let cannonP1Num = 0; //Holds path 1 tier number for cannon
let cannonP2Num = 0; //Holds path 2 tier number for cannon
let honeyP1Num = 0; //Holds path 1 tier number for honey
let honeyP2Num = 0; //Holds path 2 tier number for honey

//Level menu variables
let levelMenuTitle; //Level menu title
let levelMenuEasyButton; //Easy level button
let levelMenuEasyButtonText; //Easy level button text
let levelMenuMediumButton; //Medium level button
let levelMenuMediumButtonText; //Medium level button text
let levelMenuHardButton; //Hard level button
let levelMenuHardButtonText; //Hard level button text
let levelMenuBackButton; //Back button
let levelMenuBackButtonText; //Back button text

//Difficulty menu variables
let difficultyMenuTitle; //Difficulty menu title
let difficultyMenuEasyButton; //Easy difficulty button
let difficultyMenuEasyButtonText; //Easy difficulty button text
let difficultyMenuMediumButton; //Medium difficulty button
let difficultyMenuMediumButtonText; //Medium difficulty button text
let difficultyMenuHardButton; //Hard difficulty button
let difficultyMenuHardButtonText; //Hard difficulty button text
let difficultyMenuBackButton; //Back button
let difficultyMenuBackButtonText; //Back button text

//Left bar variables
let menuButtonText; //Menu button titleMenuTitle
let menuButton; //Menu button
let slingshotText; //Slingshot button text
let slingshotCostText; //Slingshot button cost text
let hammerText; //Hammer button text
let hammerCostText; //Hammer button cost text
let bugSprayText; //Bug spray button text
let bugSprayCostText; //Bug spray button cost text
let magnifyingGlassText; //Magnifying glass button text
let magnifyingGlassCostText; //Magnifying glass button cost text
let cannonText; //Cannon button text
let cannonCostText; //Cannon button cost text
let honeyText; //Honey button text
let honeyCostText; //Honey button cost text
let multiText; //Multi button text
let multiButton; //Multi button
let speedText; //Speed button text
let speedButton; //Speed button
let playSymbol; //Play symbol
let pauseSymbol;  //Pause symbol
let slingshotButton; //Slingshot button
let hammerButton; //Hammer button
let bugSprayButton; //Bug spray button
let magnifyingGlassButton; //Magnifying glass button
let cannonButton; //Cannon button
let honeyButton; //Honey button
let sellButton; //Sell button
let sellText; //Sell button text

//Overlay menu variables
let overlayMenuBG; //Overlay menu background
let overlayMenuTitle; //Overlay menu titleMenuTitle
let overlayMenuQuitButton; //Quit button for overlay menu
let overlayMenuQuitButtonText; //Quit button text

//Loss screen variables
let lostTitle; //Lost menu title
let lostDescription; //Lost menu description
let lostQuitButton; //Lost quit button
let lostQuitButtonText; //Lost quit button text

//Won screen variables
let gameWonTitle; //Game won menu title
let gameWonDescription; //Game won menu description
let gameWonQuitButton; //Game won quit button
let gameWonQuitButtonText; //Game won quit button text
let gameWonContinueButton; //Game won continue button
let gameWonContinueButtonText; //Game won continue button text

//Selected tower info bar variables
let selectedTowerSpriteArray = []; //Array that holds tower sprites that are used in the info bar to display type of tower selected
let selectedSlingshotText; //Selected tower slingshot text
let selectedHammerText; //Selected tower hammer text
let selectedBugSprayText; //Selected tower bug spray text
let selectedMagnifyingGlassText; //Selected tower magnifying glass text
let selectedCannonText; //Selected tower cannon text
let selectedHoneyText; //Selected tower honey text
let targetingText; //Selected tower targeting text
let targetFirstButton; //Selected tower first button
let targetFirstButtonText; //Selected tower first button text
let targetClosestButton; //Selected tower closest button
let targetClosestButtonText; //Selected tower closest button text
let targetStrongestButton; //Selected tower strongest button
let targetStrongestButtonText; //Selected tower strongest button text
let targetLastButton; //Selected tower last button
let targetLastButtonText; //Selected tower last button text
let path1Button; //Path 1 button
let currentPath1Description; //Current path 1 tier description
let nextPath1Description; //Next path 1 tier description
let path2Button; //Path 2 button
let currentPath2Description; //Current path 2 tier description
let nextPath2Description; //Next path 2 tier description
let infoSellButton; //Selected tower sell button
let infoSellText; //Selected tower sell button text
let currentTowerText; //Selected tower text

//Container backgrounds
let topBarContainerBG; //Background of top bar
let leftBarContainerBG; //Background of left bar
let infoBarContainerBG; //Background of info bard

//Top bar variables
let infoText; //Text that holds wave number, difficulty, gold, health (top bar info)

//Game variables
let level = 1; //Level
let windmill = 1; //Windmill level
let difficulty = 1; //1 easy, 2 medium, 3 hard
let difficultyString; //String used to represent difficult in top bar
let startGold = 125; //Starting gold
let mediumStartGoldModifier = 1.25; //Medium difficulty start gold modifier
let hardStartGoldModifier = 1.5; //Hard difficulty start gold modifier
let speedUp = 1; //Play speed
let bonusGoldMultiplier = 10;
let easyMultiplier = 1; //Cost multiplier for easy difficulty
let mediumMultiplier = 1.25; //Cost multiplier for medium difficulty
let hardMultiplier = 1.5; //Cost multiplier for hard difficulty
let antStaggerTick = 0; //Ticker for ant staggering
let antStagger = 500; //How long to stagger ants, in ms
let antsLength = 1; //Counter to track how many ants to update. This amount is updated after each antStagger is reached. Starts at 1, and 1 ant is animated, after antStagger is reached, it is 2, then 2 ants are updated, and so forth.
let waveNumber = 1; //The starting wave number
let waveNumberWinTarget = 64; //The number of waves the user must beat to win
let autoSaveTicker = 0; //Ticker to keep track of auto save
let currentTower; //Holds current tower

//Tower costs
let slingshotCostOriginal = 100; //Slingshot cost
let hammerCostOriginal = 250; //Hammer cost
let bugSprayCostOriginal = 200; //Bug spray cost
let magnifyingGlassCostOriginal = 1650; //Magnifying glass cost
let cannonCostOriginal = 350; //Cannon cost
let honeyCostOriginal = 150; //Honey cost

let slingshotCost = slingshotCostOriginal; //Slingshot cost
let hammerCost = hammerCostOriginal; //Hammer cost
let bugSprayCost = bugSprayCostOriginal; //Bug spray cost
let magnifyingGlassCost = magnifyingGlassCostOriginal; //Magnifying glass cost
let cannonCost = cannonCostOriginal; //Cannon cost
let honeyCost = honeyCostOriginal; //Honey cost

//Tower upgrade costs for easy
//Slingshot path 1 tier costs
let slingShot11Cost = Math.ceil((slingshotCost*0.5)/50)*50; //Tier 1
let slingShot12Cost = Math.ceil((slingshotCost*0.75)/50)*50; //Tier 2
let slingShot13Cost = Math.ceil((slingshotCost*4)/50)*50; //Tier 3
let slingShot14Cost = Math.ceil((slingshotCost*8)/50)*50; //Tier 4

//Slingshot path 2 tier costs
let slingShot21Cost = Math.ceil((slingshotCost*0.75)/50)*50; //Tier 1
let slingShot22Cost = Math.ceil((slingshotCost)/50)*50; //Tier 2
let slingShot23Cost = Math.ceil((slingshotCost*2)/50)*50; //Tier 3
let slingShot24Cost = Math.ceil((slingshotCost*4)/50)*50; //Tier 4

//Hammer path 1 tier costs
let hammer11Cost = Math.ceil((hammerCost*0.75)/50)*50; //Tier 1
let hammer12Cost = Math.ceil((hammerCost*1.25)/50)*50; //Tier 2
let hammer13Cost = Math.ceil((hammerCost*5)/50)*50; //Tier 3
let hammer14Cost = Math.ceil((hammerCost*10)/50)*50; //Tier 4

//Hammer path 2 tier costs
let hammer21Cost = Math.ceil((hammerCost*0.75)/50)*50; //Tier 1
let hammer22Cost = Math.ceil((hammerCost*1.25)/50)*50; //Tier 2
let hammer23Cost = Math.ceil((hammerCost*4)/50)*50; //Tier 3
let hammer24Cost = Math.ceil((hammerCost*8)/50)*50; //Tier 4

//Bug Spray path 1 tier costs
let bugSpray11Cost = Math.ceil((bugSprayCost*0.5)/50)*50; //Tier 1
let bugSpray12Cost = Math.ceil((bugSprayCost*0.75)/50)*50; //Tier 2
let bugSpray13Cost = Math.ceil((bugSprayCost*4)/50)*50; //Tier 3
let bugSpray14Cost = Math.ceil((bugSprayCost*8)/50)*50; //Tier 4

//Bug Spray path 2 tier costs
let bugSpray21Cost = Math.ceil((bugSprayCost*0.75)/50)*50; //Tier 1
let bugSpray22Cost = Math.ceil((bugSprayCost*1.25)/50)*50; //Tier 2
let bugSpray23Cost = Math.ceil((bugSprayCost*2)/50)*50; //Tier 3
let bugSpray24Cost = Math.ceil((bugSprayCost*8)/50)*50; //Tier 4

//Magnifying Glass path 1 tier costs
let magnifyingGlass11Cost = Math.ceil((magnifyingGlassCost*0.75)/50)*50; //Tier 1
let magnifyingGlass12Cost = Math.ceil((magnifyingGlassCost*1.25)/50)*50; //Tier 2
let magnifyingGlass13Cost = Math.ceil((magnifyingGlassCost*8)/50)*50; //Tier 3
let magnifyingGlass14Cost = Math.ceil((magnifyingGlassCost*12)/50)*50; //Tier 4

//Magnifying Glass path 2 tier costs
let magnifyingGlass21Cost = Math.ceil((magnifyingGlassCost*0.75)/50)*50; //Tier 1
let magnifyingGlass22Cost = Math.ceil((magnifyingGlassCost*1.5)/50)*50; //Tier 2
let magnifyingGlass23Cost = Math.ceil((magnifyingGlassCost*2)/50)*50; //Tier 3
let magnifyingGlass24Cost = Math.ceil((magnifyingGlassCost*8)/50)*50; //Tier 4

//Cannon path 1 tier costs
let cannon11Cost = Math.ceil((cannonCost*0.75)/50)*50; //Tier 1
let cannon12Cost = Math.ceil((cannonCost*1.25)/50)*50; //Tier 2
let cannon13Cost = Math.ceil((cannonCost*2)/50)*50; //Tier 3
let cannon14Cost = Math.ceil((cannonCost*4)/50)*50; //Tier 4

//Cannon path 2 tier costs
let cannon21Cost = Math.ceil((cannonCost*0.75)/50)*50; //Tier 1
let cannon22Cost = Math.ceil((cannonCost*1.5)/50)*50; //Tier 2
let cannon23Cost = Math.ceil((cannonCost*4)/50)*50; //Tier 3
let cannon24Cost = Math.ceil((cannonCost*8)/50)*50; //Tier 4

//Honey path 1 tier costs
let honey11Cost = Math.ceil((honeyCost*0.5)/50)*50; //Tier 1
let honey12Cost = Math.ceil((honeyCost*0.75)/50)*50; //Tier 2
let honey13Cost = Math.ceil((honeyCost*1.25)/50)*50; //Tier 3
let honey14Cost = Math.ceil((honeyCost*1.5)/50)*50; //Tier 4

//Honey path 2 tier costs
let honey21Cost = Math.ceil((honeyCost*0.75)/50)*50; //Tier 1
let honey22Cost = Math.ceil((honeyCost*1.25)/50)*50; //Tier 2
let honey23Cost = Math.ceil((honeyCost*4)/50)*50; //Tier 3
let honey24Cost = Math.ceil((honeyCost*8)/50)*50; //Tier 4

//Tower upgrade tier XP amounts
//Slingshot path 1
let slingshotP1T1UnlockXP = 200; //Tier 1
let slingshotP1T2UnlockXP = 600; //Tier 2
let slingshotP1T3UnlockXP = 2000; //Tier 3
let slingshotP1T4UnlockXP = 6000; //Tier 4

//Slingshot path 2
let slingshotP2T1UnlockXP = 150; //Tier 1
let slingshotP2T2UnlockXP = 500; //Tier 2
let slingshotP2T3UnlockXP = 1500; //Tier 3
let slingshotP2T4UnlockXP = 5000; //Tier 4

//Hammer path 1
let hammerP1T1UnlockXP = 250; //Tier 1
let hammerP1T2UnlockXP = 700; //Tier 2
let hammerP1T3UnlockXP = 2500; //Tier 3
let hammerP1T4UnlockXP = 6000; //Tier 4

//Hammer path 2
let hammerP2T1UnlockXP = 250; //Tier 1
let hammerP2T2UnlockXP = 700; //Tier 2
let hammerP2T3UnlockXP = 2500; //Tier 3
let hammerP2T4UnlockXP = 6000; //Tier 4

//Bug Spray path 1
let bugSprayP1T1UnlockXP = 400; //Tier 1
let bugSprayP1T2UnlockXP = 800; //Tier 2
let bugSprayP1T3UnlockXP = 2000; //Tier 3
let bugSprayP1T4UnlockXP = 8000; //Tier 4

//Bug Spray path 2
let bugSprayP2T1UnlockXP = 400; //Tier 1
let bugSprayP2T2UnlockXP = 800; //Tier 2
let bugSprayP2T3UnlockXP = 1500; //Tier 3
let bugSprayP2T4UnlockXP = 12000; //Tier 4

//Magnifying Glass path 1
let magnifyingGlassP1T1UnlockXP = 1000; //Tier 1
let magnifyingGlassP1T2UnlockXP = 2000; //Tier 3
let magnifyingGlassP1T3UnlockXP = 5000; //Tier 4
let magnifyingGlassP1T4UnlockXP = 15000; //Tier 4

//Magnifying Glass path 2
let magnifyingGlassP2T1UnlockXP = 1000; //Tier 1
let magnifyingGlassP2T2UnlockXP = 2000; //Tier 2
let magnifyingGlassP2T3UnlockXP = 4000; //Tier 3
let magnifyingGlassP2T4UnlockXP = 8000; //Tier 4

//Cannon path 1
let cannonP1T1UnlockXP = 1000; //Tier 1
let cannonP1T2UnlockXP = 2000; //Tier 2
let cannonP1T3UnlockXP = 6000; //Tier 3
let cannonP1T4UnlockXP = 12000; //Tier 4

//Cannon path 2
let cannonP2T1UnlockXP = 2000; //Tier 1
let cannonP2T2UnlockXP = 4000; //Tier 2
let cannonP2T3UnlockXP = 6000; //Tier 3
let cannonP2T4UnlockXP = 8000; //Tier 4

//Honey path 1
let honeyP1T1UnlockXP = 2000; //Tier 1
let honeyP1T2UnlockXP = 4000; //Tier 2
let honeyP1T3UnlockXP = 6000; //Tier 3
let honeyP1T4UnlockXP = 8000; //Tier 4

//Honey path 2
let honeyP2T1UnlockXP = 4000; //Tier 1
let honeyP2T2UnlockXP = 8000; //Tier 2
let honeyP2T3UnlockXP = 12000; //Tier 3
let honeyP2T4UnlockXP = 16000; //Tier 4

//Button colours
let lightGreen = 0xafffaf; //Light green, used to show available to click
let darkGreen = 0x70ff70; //Dark green, used to show hover
let lightGray = 0xdddddd; //Light grey, normal button colour
let darkGray = 0xbbbbbb; //Dark grey, used to show hover

//Arrays
let wps = []; //Hold GPS coords
let ants = []; //Holds all ants in the wave
let towers = []; //Holds all towers
let projectiles = []; //Holds projectiles
let placementArea = []; //Holds coords of placement area

//Booleans
let loadWaveBool = true; //If wave needs to be loaded
let percentageText = new PIXI.Text("", {fontFamily: "Arial", fontSize: 24, fill: 0x000000, align: "center"}); //Loading screen text
percentageText.x = appWidth/2; //Set x pos of text
percentageText.y = appHeight/2; //Set y pos of text
let placeSlingshot = false; //If placing slingshot tower
let placeHammer = false; //If placing hammer tower
let placeBugSpray = false; //If placing bug spray tower
let placeMagnifyingGlass = false; //If placing magnifying glass tower
let placeCannon = false; //If placing cannon tower
let placeHoney = false; //If placing honey tower
let canClick = true; //Whether the user can click to add another tower or not. If currently placing a tower, they cannot click to add another.
let checkTowerCollision = false; //Initially, do not check for tower collision as there is no towers to check for.
let lost = false; //If the user has lost
let won = false;// If the user has won
let playing = false; //If the user is playing
let waveWonBool = false; //If the wave is won or not
let startGameBool = false; //If game is starting
let setSizesBool = true; //If sizes need to be set
let reset = true; //If the player lost
let assetsLoaded = false; //If the assets are loaded yet
let init = true; //If the game needs to be initialized
let paused = false; //If the game is paused or not
let nextWaveBool = false; //If the game needs to load the next wave or not
let overlayMenu = false; //If the game needs to show the overlay menu or not
let debugMode = false;
let showPath1Green = false; //If upgrade button should be highlighted green or not
let showPath2Green = false; //If upgrade button should be highlighted green or not
let loggedIn = false; //If the user is logged in or not


//Create containers
let levelContainerBG = new PIXI.Container(); //Holds level BG sprite
let levelContainerFG = new PIXI.Container(); //Holds level FG sprite
let windmillContainer = new PIXI.Container(); //Holds the windmill
let waveContainer = new PIXI.Container(); //Holds ants
let towersContainer = new PIXI.Container(); //Holds towers
let projectileContainer = new PIXI.Container(); //Holds projectiles
let menuContainer = new PIXI.Container(); //Holds menu graphics
let leftBarContainer = new PIXI.Container(); //Left menu bar
let leftBarTowerSpritesContainer = new PIXI.Container(); //Left menu overlay, holds tower sprite images
let topBarContainer = new PIXI.Container(); //Top menu bar
let infoBarContainer = new PIXI.Container(); //Tower info bar (upgrade bar)
let overlayMenuContainer = new PIXI.Container(); //Overlay menu container
let mediaContainer = new PIXI.Container(); //Media keys container
let tooltipContainer = new PIXI.Container(); //Tooltip container

//Sprite variables
//Media icons
let musicOnSprite;
let musicOffSprite;
let sfxOnSprite;
let sfxOffSprite;

//Ants
let armoredAntSprite;
let armoredBeetleSprite;
let beetleSprite;
let blackAntSprite;
let blueAntSprite;
let brownAntSprite;
let greenAntSprite;
let purpleAntSprite;
let redAntSprite;
let whiteAntSprite;
let yellowAntSprite;

//Regenerative
let rBlackAntSprite;
let rBlueAntSprite;
let rBrownAntSprite;
let rGreenAntSprite;
let rPurpleAntSprite;
let rRedAntSprite;
let rWhiteAntSprite;
let rYellowAntSprite;

//Shields
let greenLeafSprite;
let rockSprite;
let sodaCanSprite;
let styrofoamCupSprite;

//Towers (1 for base, 2 for top. Layered to complete whole tower based on path/tier upgrades)
let slingshotButtonSprite;
let hammerButtonSprite;
let bugSprayButtonSprite;
let magnifyingGlassButtonSprite;
let cannonButtonSprite;
let honeyButtonSprite;

//Windmill
let windmillSprite;
let windmillSprite1;
let windmillSprite2;
let windmillSprite3;
let windmillSprite4;
let windmillDamageSprite;

//Level
let levelBGSprite; //Level BG sprite
let levelFGSprite; //Level FG sprite
let level1BGSprite; //For level 1 base layer
let level1FGSprite; //For level 1 obstacle layer
let level2BGSprite; //For level 2 base layer
let level2FGSprite; //For level 2 obstacle layer
let level3BGSprite; //For level 3 base layer
let level3FGSprite; //For level 3 obstacle layer
let level1CollisionSprite; //For level 1 collision layer
let level2CollisionSprite; //For level 2 collision layer
let level3CollisionSprite; //For level 3 collision layer

//Texture variables---------------------------------------
//Media icons
let musicOnT;
let musicOffT;
let sfxOnT;
let sfxOffT;

//Ants
let armoredAntSpriteT;
let armoredBeetleSpriteT;
let beetleSpriteT;
let blackAntSpriteT;
let blueAntSpriteT;
let brownAntSpriteT;
let greenAntSpriteT;
let purpleAntSpriteT;
let redAntSpriteT;
let whiteAntSpriteT;
let yellowAntSpriteT;

//Regenerative
let rBlackAntSpriteT;
let rBlueAntSpriteT;
let rBrownAntSpriteT;
let rGreenAntSpriteT;
let rPurpleAntSpriteT;
let rRedAntSpriteT;
let rWhiteAntSpriteT;
let rYellowAntSpriteT;

//Shields
let greenLeafSpriteT;
let rockSpriteT;
let sodaCanSpriteT;
let styrofoamCupSpriteT;

//Towers
//Bug Spray
let bugSpray10T;
let bugSpray11T;
let bugSpray12T;
let bugSpray13T;
let bugSpray14T;
let bugSpray20T;
let bugSpray21T;
let bugSpray22T;
let bugSpray23T;
let bugSpray24T;
let bugSprayAmmo1T;
let bugSprayAmmo2T;
let bugSprayAmmo3T;
let bugSprayAmmo4T;
let bugSprayAmmo5T;

//Cannon
let cannon10T;
let cannon11T;
let cannon12T;
let cannon13T;
let cannon14T;
let cannon20T;
let cannon21T;
let cannon22T;
let cannon23T;
let cannon24T;
let cannonAmmo1T;
let cannonAmmo2T;
let cannonAmmo3T;
let cannonAmmo4T;
let cannonAmmo5T;

//Hammer
let hammer10T;
let hammer11T;
let hammer12T;
let hammer13T;
let hammer14T;
let hammer20T;
let hammer21T;
let hammer22T;
let hammer23T;
let hammer24T;
let hammer10T2;
let hammer11T2;
let hammer12T2;
let hammer13T2;
let hammer14T2;
let hammer20T2;
let hammer21T2;
let hammer22T2;
let hammer23T2;
let hammer24T2;

//Honey
let honey10T;
let honey11T;
let honey12T;
let honey13T;
let honey14T;
let honey20T;
let honey21T;
let honey22T;
let honey23T;
let honey24T;
let honeyAmmo1T;
let honeyAmmo2T;
let honeyAmmo3T;
let honeyAmmo4T;
let honeyAmmo5T;

//Magnifying Glass
let magnifyingGlass10T;
let magnifyingGlass11T;
let magnifyingGlass12T;
let magnifyingGlass13T;
let magnifyingGlass14T;
let magnifyingGlass20T;
let magnifyingGlass21T;
let magnifyingGlass22T;
let magnifyingGlass23T;
let magnifyingGlass24T;

//Slingshot
let slingshot10T;
let slingshot10CirclesT;
let slingshot11T;
let slingshot11CirclesT;
let slingshot12T;
let slingshot12CirclesT;
let slingshot20T;
let slingshot21T;
let slingshot22T;
let slingshot23T;
let slingshot10T2;
let slingshot11T2;
let slingshot12T2;
let slingshotAmmo1T;
let slingshotAmmo2T;
let slingshotAmmo4T;
let slingshotFlame1T;
let slingshotFlame2T;
let slingshotFlame3T;

//Windmill
let windmill1T; //For wood
let windmill2T; //For stone
let windmill3T; //For concrete
let windmill4T; //For steel
let windmillDamage1T; //For damage level 1
let windmillDamage2T; //For damage level 2
let windmillDamage3T; //For damage level 3

//Level
let level1BGT; //For level 1 base
let level1FGT; //For level 1 obstacles
let level2BGT; //For level 2 base
let level2FGT; //For level 2 obstacles
let level3BGT; //For level 3 base
let level3FGT; //For level 3 obstacles
let level1CollisionT; //For level 1 collision map
let level2CollisionT; //For level 2 collision map
let level3CollisionT; //For level 3 collision map

//Load assets
loader
    .add([
        //Media icons
        "Assets/Media/musicOff.png",
        "Assets/Media/musicOn.png",
        "Assets/Media/sfxOff.png",
        "Assets/Media/sfxOn.png",

        //Ants
        "Assets/Ants/ArmoredAnt.png",
        "Assets/Ants/ArmoredBeetle.png",
        "Assets/Ants/Beetle.png",
        "Assets/Ants/BlackAnt.png",
        "Assets/Ants/BlueAnt.png",
        "Assets/Ants/BrownAnt.png",
        "Assets/Ants/GreenAnt.png",
        "Assets/Ants/PurpleAnt.png",
        "Assets/Ants/RedAnt.png",
        "Assets/Ants/WhiteAnt.png",
        "Assets/Ants/YellowAnt.png",

        //Regenerative
        "Assets/Ants/RegenerativeBlackAnt.png",
        "Assets/Ants/RegenerativeBlueAnt.png",
        "Assets/Ants/RegenerativeBrownAnt.png",
        "Assets/Ants/RegenerativeGreenAnt.png",
        "Assets/Ants/RegenerativePurpleAnt.png",
        "Assets/Ants/RegenerativeRedAnt.png",
        "Assets/Ants/RegenerativeWhiteAnt.png",
        "Assets/Ants/RegenerativeYellowAnt.png",

        //Shields
        "Assets/Shields/GreenLeaf.png",
        "Assets/Shields/Rock.png",
        "Assets/Shields/SodaCan.png",
        "Assets/Shields/StyrofoamCup.png",

        //Towers
        "Assets/Towers/Bug Spray/Path1/Tier0/1.png",
        "Assets/Towers/Bug Spray/Path1/Tier1/1.png",
        "Assets/Towers/Bug Spray/Path1/Tier2/1.png",
        "Assets/Towers/Bug Spray/Path1/Tier3/1.png",
        "Assets/Towers/Bug Spray/Path1/Tier4/1.png",
        "Assets/Towers/Bug Spray/Path2/Tier0/1.png",
        "Assets/Towers/Bug Spray/Path2/Tier1/1.png",
        "Assets/Towers/Bug Spray/Path2/Tier2/1.png",
        "Assets/Towers/Bug Spray/Path2/Tier3/1.png",
        "Assets/Towers/Bug Spray/Path2/Tier4/1.png",
        "Assets/Towers/Bug Spray/Ammo1.png",
        "Assets/Towers/Bug Spray/Ammo2.png",
        "Assets/Towers/Bug Spray/Ammo3.png",
        "Assets/Towers/Bug Spray/Ammo4.png",
        "Assets/Towers/Bug Spray/Ammo5.png",
        "Assets/Towers/Cannon/Path1/Tier0/1.png",
        "Assets/Towers/Cannon/Path1/Tier1/1.png",
        "Assets/Towers/Cannon/Path1/Tier2/1.png",
        "Assets/Towers/Cannon/Path1/Tier3/1.png",
        "Assets/Towers/Cannon/Path1/Tier4/1.png",
        "Assets/Towers/Cannon/Path2/Tier0/1.png",
        "Assets/Towers/Cannon/Path2/Tier1/1.png",
        "Assets/Towers/Cannon/Path2/Tier2/1.png",
        "Assets/Towers/Cannon/Path2/Tier3/1.png",
        "Assets/Towers/Cannon/Path2/Tier4/1.png",
        "Assets/Towers/Cannon/Ammo1.png",
        "Assets/Towers/Cannon/Ammo2.png",
        "Assets/Towers/Cannon/Ammo3.png",
        "Assets/Towers/Cannon/Ammo4.png",
        "Assets/Towers/Cannon/Ammo5.png",
        "Assets/Towers/Hammer/Path1/Tier0/1.png",
        "Assets/Towers/Hammer/Path1/Tier1/1.png",
        "Assets/Towers/Hammer/Path1/Tier2/1.png",
        "Assets/Towers/Hammer/Path1/Tier3/1.png",
        "Assets/Towers/Hammer/Path1/Tier4/1.png",
        "Assets/Towers/Hammer/Path2/Tier0/1.png",
        "Assets/Towers/Hammer/Path2/Tier1/1.png",
        "Assets/Towers/Hammer/Path2/Tier2/1.png",
        "Assets/Towers/Hammer/Path2/Tier3/1.png",
        "Assets/Towers/Hammer/Path2/Tier4/1.png",
        "Assets/Towers/Hammer/Path1/Tier0/2.png",
        "Assets/Towers/Hammer/Path1/Tier1/2.png",
        "Assets/Towers/Hammer/Path1/Tier2/2.png",
        "Assets/Towers/Hammer/Path1/Tier3/2.png",
        "Assets/Towers/Hammer/Path1/Tier4/2.png",
        "Assets/Towers/Hammer/Path2/Tier0/2.png",
        "Assets/Towers/Hammer/Path2/Tier1/2.png",
        "Assets/Towers/Hammer/Path2/Tier2/2.png",
        "Assets/Towers/Hammer/Path2/Tier3/2.png",
        "Assets/Towers/Hammer/Path2/Tier4/2.png",
        "Assets/Towers/Honey/Path1/Tier0/1.png",
        "Assets/Towers/Honey/Path1/Tier1/1.png",
        "Assets/Towers/Honey/Path1/Tier2/1.png",
        "Assets/Towers/Honey/Path1/Tier3/1.png",
        "Assets/Towers/Honey/Path1/Tier4/1.png",
        "Assets/Towers/Honey/Path2/Tier0/1.png",
        "Assets/Towers/Honey/Path2/Tier1/1.png",
        "Assets/Towers/Honey/Path2/Tier2/1.png",
        "Assets/Towers/Honey/Path2/Tier3/1.png",
        "Assets/Towers/Honey/Path2/Tier4/1.png",
        "Assets/Towers/Honey/Ammo1.png",
        "Assets/Towers/Honey/Ammo2.png",
        "Assets/Towers/Honey/Ammo3.png",
        "Assets/Towers/Honey/Ammo4.png",
        "Assets/Towers/Honey/Ammo5.png",
        "Assets/Towers/Magnifying Glass/Path1/Tier0/1.png",
        "Assets/Towers/Magnifying Glass/Path1/Tier1/1.png",
        "Assets/Towers/Magnifying Glass/Path1/Tier2/1.png",
        "Assets/Towers/Magnifying Glass/Path1/Tier3/1.png",
        "Assets/Towers/Magnifying Glass/Path1/Tier4/1.png",
        "Assets/Towers/Magnifying Glass/Path2/Tier0/1.png",
        "Assets/Towers/Magnifying Glass/Path2/Tier1/1.png",
        "Assets/Towers/Magnifying Glass/Path2/Tier2/1.png",
        "Assets/Towers/Magnifying Glass/Path2/Tier3/1.png",
        "Assets/Towers/Magnifying Glass/Path2/Tier4/1.png",
        "Assets/Towers/Slingshot/Path1/Tier0/1.png",
        "Assets/Towers/Slingshot/Path1/Tier0/2.png",
        "Assets/Towers/Slingshot/Path1/Tier0/Circles.png",
        "Assets/Towers/Slingshot/Path1/Tier1/1.png",
        "Assets/Towers/Slingshot/Path1/Tier1/2.png",
        "Assets/Towers/Slingshot/Path1/Tier1/Circles.png",
        "Assets/Towers/Slingshot/Path1/Tier2/1.png",
        "Assets/Towers/Slingshot/Path1/Tier2/2.png",
        "Assets/Towers/Slingshot/Path1/Tier2/Circles.png",
        "Assets/Towers/Slingshot/Path2/Tier0/1.png",
        "Assets/Towers/Slingshot/Path2/Tier1/1.png",
        "Assets/Towers/Slingshot/Path2/Tier2/1.png",
        "Assets/Towers/Slingshot/Path2/Tier3/1.png",
        "Assets/Towers/Slingshot/Ammo1.png",
        "Assets/Towers/Slingshot/Ammo2.png",
        "Assets/Towers/Slingshot/Ammo4.png",
        "Assets/Towers/Slingshot/Flame1.png",
        "Assets/Towers/Slingshot/Flame2.png",
        "Assets/Towers/Slingshot/Flame3.png",

        //Windmill
        "Assets/Windmill/WoodWindmill.png",
        "Assets/Windmill/StoneWindmill.png",
        "Assets/Windmill/ConcreteWindmill.png",
        "Assets/Windmill/SteelWindmill.png",
        "Assets/Windmill/WindmillDamage1.png",
        "Assets/Windmill/WindmillDamage2.png",
        "Assets/Windmill/WindmillDamage3.png",

        //Levels
        "Assets/Levels/Level1/1.png",
        "Assets/Levels/Level1/2.png",
        "Assets/Levels/Level2/1.png",
        "Assets/Levels/Level2/2.png",
        "Assets/Levels/Level3/1.png",
        "Assets/Levels/Level3/2.png"
    ]);
loader.once("complete", onAssetsLoaded); //Once completed loading assets, call onAssetsLoaded()
loader.on("progress", onProgress); //When progress is made, call onProgress()
loader.load(setup); //When loaded, call setup()

//setup() function - Sets up PIXI
function setup() {
    //Load Textures
    //Media icons
    musicOnT = new Texture("Assets/Media/musicOn.png");
    musicOffT = new Texture("Assets/Media/musicOff.png");
    sfxOnT = new Texture("Assets/Media/sfxOn.png");
    sfxOffT = new Texture("Assets/Media/sfxOff.png");

    //Ants
    armoredAntSpriteT = new Texture("Assets/Ants/ArmoredAnt.png");
    armoredBeetleSpriteT = new Texture("Assets/Ants/ArmoredBeetle.png");
    beetleSpriteT = new Texture("Assets/Ants/Beetle.png");
    blackAntSpriteT = new Texture("Assets/Ants/BlackAnt.png");
    blueAntSpriteT = new Texture("Assets/Ants/BlueAnt.png");
    brownAntSpriteT = new Texture("Assets/Ants/BrownAnt.png");
    greenAntSpriteT = new Texture("Assets/Ants/GreenAnt.png");
    purpleAntSpriteT = new Texture("Assets/Ants/PurpleAnt.png");
    redAntSpriteT = new Texture("Assets/Ants/RedAnt.png");
    whiteAntSpriteT = new Texture("Assets/Ants/WhiteAnt.png");
    yellowAntSpriteT = new Texture("Assets/Ants/YellowAnt.png");

    //Regenerative
    rBlackAntSpriteT = new Texture("Assets/Ants/RegenerativeBlackAnt.png");
    rBlueAntSpriteT = new Texture("Assets/Ants/RegenerativeBlueAnt.png");
    rBrownAntSpriteT = new Texture("Assets/Ants/RegenerativeBrownAnt.png");
    rGreenAntSpriteT = new Texture("Assets/Ants/RegenerativeGreenAnt.png");
    rPurpleAntSpriteT = new Texture("Assets/Ants/RegenerativePurpleAnt.png");
    rRedAntSpriteT = new Texture("Assets/Ants/RegenerativeRedAnt.png");
    rWhiteAntSpriteT = new Texture("Assets/Ants/RegenerativeWhiteAnt.png");
    rYellowAntSpriteT = new Texture("Assets/Ants/RegenerativeYellowAnt.png");

    //Shields
    greenLeafSpriteT = new Texture("Assets/Shields/GreenLeaf.png");
    rockSpriteT = new Texture("Assets/Shields/Rock.png");
    sodaCanSpriteT = new Texture("Assets/Shields/SodaCan.png");
    styrofoamCupSpriteT = new Texture("Assets/Shields/StyrofoamCup.png");

    //Tower Textures - Naming convention towerName(num1)(num2)T - num1 = path, num2 = tier, T for texture. Ex. Bug Spray path 1 tier 0 = bugSpray10T
    //Bug Spray-----------------------------------------------------------------------------
    //Path 1
    //Tier 0
    bugSpray10T = new Texture("Assets/Towers/Bug Spray/Path1/Tier0/1.png");

    //Tier 1
    bugSpray11T = new Texture("Assets/Towers/Bug Spray/Path1/Tier1/1.png");

    //Tier 2
    bugSpray12T = new Texture("Assets/Towers/Bug Spray/Path1/Tier2/1.png");

    //Tier 3
    bugSpray13T = new Texture("Assets/Towers/Bug Spray/Path1/Tier3/1.png");

    //Tier 4
    bugSpray14T = new Texture("Assets/Towers/Bug Spray/Path1/Tier4/1.png");

    //Path 2
    //Tier 0
    bugSpray20T = new Texture("Assets/Towers/Bug Spray/Path2/Tier0/1.png");

    //Tier 1
    bugSpray21T = new Texture("Assets/Towers/Bug Spray/Path2/Tier1/1.png");

    //Tier 2
    bugSpray22T = new Texture("Assets/Towers/Bug Spray/Path2/Tier2/1.png");

    //Tier 3
    bugSpray23T = new Texture("Assets/Towers/Bug Spray/Path2/Tier3/1.png");

    //Tier 4
    bugSpray24T = new Texture("Assets/Towers/Bug Spray/Path2/Tier4/1.png");

    //Ammunition
    //Ammo 1
    bugSprayAmmo1T = new Texture("Assets/Towers/Bug Spray/Ammo1.png");

    //Ammo 2
    bugSprayAmmo2T = new Texture("Assets/Towers/Bug Spray/Ammo2.png");

    //Ammo 3
    bugSprayAmmo3T = new Texture("Assets/Towers/Bug Spray/Ammo3.png");

    //Ammo 4
    bugSprayAmmo4T = new Texture("Assets/Towers/Bug Spray/Ammo4.png");

    //Ammo 5
    bugSprayAmmo5T = new Texture("Assets/Towers/Bug Spray/Ammo5.png");


    //Cannon-----------------------------------------------------------------------------
    //Path 1
    //Tier 0
    cannon10T = new Texture("Assets/Towers/Cannon/Path1/Tier0/1.png");

    //Tier 1
    cannon11T = new Texture("Assets/Towers/Cannon/Path1/Tier1/1.png");

    //Tier 2
    cannon12T = new Texture("Assets/Towers/Cannon/Path1/Tier2/1.png");

    //Tier 3
    cannon13T = new Texture("Assets/Towers/Cannon/Path1/Tier3/1.png");

    //Tier 4
    cannon14T = new Texture("Assets/Towers/Cannon/Path1/Tier4/1.png");

    //Path 2
    //Tier 0
    cannon20T = new Texture("Assets/Towers/Cannon/Path2/Tier0/1.png");

    //Tier 1
    cannon21T = new Texture("Assets/Towers/Cannon/Path2/Tier1/1.png");

    //Tier 2
    cannon22T = new Texture("Assets/Towers/Cannon/Path2/Tier2/1.png");

    //Tier 3
    cannon23T = new Texture("Assets/Towers/Cannon/Path2/Tier3/1.png");

    //Tier 4
    cannon24T = new Texture("Assets/Towers/Cannon/Path2/Tier4/1.png");

    //Ammunition
    //Ammo 1
    cannonAmmo1T = new Texture("Assets/Towers/Cannon/Ammo1.png");

    //Ammo 2
    cannonAmmo2T = new Texture("Assets/Towers/Cannon/Ammo2.png");

    //Ammo 3
    cannonAmmo3T = new Texture("Assets/Towers/Cannon/Ammo3.png");

    //Ammo 4
    cannonAmmo4T = new Texture("Assets/Towers/Cannon/Ammo4.png");

    //Ammo 5
    cannonAmmo5T = new Texture("Assets/Towers/Cannon/Ammo5.png");


    //Hammer-----------------------------------------------------------------------------
    //Path 1
    //Tier 0
    hammer10T = new Texture("Assets/Towers/Hammer/Path1/Tier0/1.png");
    hammer10T2 = new Texture("Assets/Towers/Hammer/Path1/Tier0/2.png");

    //Tier 1
    hammer11T = new Texture("Assets/Towers/Hammer/Path1/Tier1/1.png");
    hammer11T2 = new Texture("Assets/Towers/Hammer/Path1/Tier1/2.png");

    //Tier 2
    hammer12T = new Texture("Assets/Towers/Hammer/Path1/Tier2/1.png");
    hammer12T2 = new Texture("Assets/Towers/Hammer/Path1/Tier2/2.png");

    //Tier 3
    hammer13T = new Texture("Assets/Towers/Hammer/Path1/Tier3/1.png");
    hammer13T2 = new Texture("Assets/Towers/Hammer/Path1/Tier3/2.png");

    //Tier 4
    hammer14T = new Texture("Assets/Towers/Hammer/Path1/Tier4/1.png");
    hammer14T2 = new Texture("Assets/Towers/Hammer/Path1/Tier4/2.png");

    //Path 2
    //Tier 0
    hammer20T = new Texture("Assets/Towers/Hammer/Path2/Tier0/1.png");
    hammer20T2 = new Texture("Assets/Towers/Hammer/Path2/Tier0/2.png");

    //Tier 1
    hammer21T = new Texture("Assets/Towers/Hammer/Path2/Tier1/1.png");
    hammer21T2 = new Texture("Assets/Towers/Hammer/Path2/Tier1/2.png");

    //Tier 2
    hammer22T = new Texture("Assets/Towers/Hammer/Path2/Tier2/1.png");
    hammer22T2 = new Texture("Assets/Towers/Hammer/Path2/Tier2/2.png");

    //Tier 3
    hammer23T = new Texture("Assets/Towers/Hammer/Path2/Tier3/1.png");
    hammer23T2 = new Texture("Assets/Towers/Hammer/Path2/Tier3/2.png");

    //Tier 4
    hammer24T = new Texture("Assets/Towers/Hammer/Path2/Tier4/1.png");
    hammer24T2 = new Texture("Assets/Towers/Hammer/Path2/Tier4/2.png");


    //Honey-----------------------------------------------------------------------------
    //Path 1
    //Tier 0
    honey10T = new Texture("Assets/Towers/Honey/Path1/Tier0/1.png");

    //Tier 1
    honey11T = new Texture("Assets/Towers/Honey/Path1/Tier1/1.png");

    //Tier 2
    honey12T = new Texture("Assets/Towers/Honey/Path1/Tier2/1.png");

    //Tier 3
    honey13T = new Texture("Assets/Towers/Honey/Path1/Tier3/1.png");

    //Tier 4
    honey14T = new Texture("Assets/Towers/Honey/Path1/Tier4/1.png");

    //Path 2
    //Tier 0
    honey20T = new Texture("Assets/Towers/Honey/Path2/Tier0/1.png");

    //Tier 1
    honey21T = new Texture("Assets/Towers/Honey/Path2/Tier1/1.png");

    //Tier 2
    honey22T = new Texture("Assets/Towers/Honey/Path2/Tier2/1.png");

    //Tier 3
    honey23T = new Texture("Assets/Towers/Honey/Path2/Tier3/1.png");

    //Tier 4
    honey24T = new Texture("Assets/Towers/Honey/Path2/Tier4/1.png");

    //Ammunition
    //Ammo 1
    honeyAmmo1T = new Texture("Assets/Towers/Honey/Ammo1.png");

    //Ammo 2
    honeyAmmo2T = new Texture("Assets/Towers/Honey/Ammo2.png");

    //Ammo 3
    honeyAmmo3T = new Texture("Assets/Towers/Honey/Ammo3.png");

    //Ammo 4
    honeyAmmo4T = new Texture("Assets/Towers/Honey/Ammo4.png");

    //Ammo 5
    honeyAmmo5T = new Texture("Assets/Towers/Honey/Ammo5.png");


    //Magnifying Glass-----------------------------------------------------------------------------
    //Path 1
    //Tier 0
    magnifyingGlass10T = new Texture("Assets/Towers/Magnifying Glass/Path1/Tier0/1.png");

    //Tier 1
    magnifyingGlass11T = new Texture("Assets/Towers/Magnifying Glass/Path1/Tier1/1.png");

    //Tier 2
    magnifyingGlass12T = new Texture("Assets/Towers/Magnifying Glass/Path1/Tier2/1.png");

    //Tier 3
    magnifyingGlass13T = new Texture("Assets/Towers/Magnifying Glass/Path1/Tier3/1.png");

    //Tier 4
    magnifyingGlass14T = new Texture("Assets/Towers/Magnifying Glass/Path1/Tier4/1.png");

    //Path 2
    //Tier 0
    magnifyingGlass20T = new Texture("Assets/Towers/Magnifying Glass/Path2/Tier0/1.png");

    //Tier 1
    magnifyingGlass21T = new Texture("Assets/Towers/Magnifying Glass/Path2/Tier1/1.png");

    //Tier 2
    magnifyingGlass22T = new Texture("Assets/Towers/Magnifying Glass/Path2/Tier2/1.png");

    //Tier 3
    magnifyingGlass23T = new Texture("Assets/Towers/Magnifying Glass/Path2/Tier3/1.png");

    //Tier 4
    magnifyingGlass24T = new Texture("Assets/Towers/Magnifying Glass/Path2/Tier4/1.png");


    //Slingshot-----------------------------------------------------------------------------
    //Path 1
    //Tier 0
    slingshot10T = new Texture("Assets/Towers/Slingshot/Path1/Tier0/1.png");
    slingshot10T2 = new Texture("Assets/Towers/Slingshot/Path1/Tier0/2.png");
    slingshot10CirclesT = new Texture("Assets/Towers/Slingshot/Path1/Tier0/Circles.png");

    //Tier 1
    slingshot11T = new Texture("Assets/Towers/Slingshot/Path1/Tier1/1.png");
    slingshot11T2 = new Texture("Assets/Towers/Slingshot/Path1/Tier1/2.png");
    slingshot11CirclesT = new Texture("Assets/Towers/Slingshot/Path1/Tier1/Circles.png");

    //Tier 2
    slingshot12T = new Texture("Assets/Towers/Slingshot/Path1/Tier2/1.png");
    slingshot12T2 = new Texture("Assets/Towers/Slingshot/Path1/Tier2/2.png");
    slingshot12CirclesT = new Texture("Assets/Towers/Slingshot/Path1/Tier2/Circles.png");

    //Path 2
    //Tier 0
    slingshot20T = new Texture("Assets/Towers/Slingshot/Path2/Tier0/1.png");

    //Tier 1
    slingshot21T = new Texture("Assets/Towers/Slingshot/Path2/Tier1/1.png");

    //Tier 2
    slingshot22T = new Texture("Assets/Towers/Slingshot/Path2/Tier2/1.png");

    //Tier 3
    slingshot23T = new Texture("Assets/Towers/Slingshot/Path2/Tier3/1.png");

    //Ammunition
    //Ammo 1
    slingshotAmmo1T = new Texture("Assets/Towers/Slingshot/Ammo1.png");

    //Ammo 2
    slingshotAmmo2T = new Texture("Assets/Towers/Slingshot/Ammo2.png");

    //Ammo 4
    slingshotAmmo4T = new Texture("Assets/Towers/Slingshot/Ammo4.png");

    //Flame 1
    slingshotFlame1T = new Texture("Assets/Towers/Slingshot/Flame1.png");

    //Flame 2
    slingshotFlame2T = new Texture("Assets/Towers/Slingshot/Flame2.png");

    //Flame 3
    slingshotFlame3T = new Texture("Assets/Towers/Slingshot/Flame3.png");


    //Windmill Textures-----------------------------------------------------------------------------
    //Tier 1 (wood)
    windmill1T = new Texture("Assets/Windmill/WoodWindmill.png");

    //Tier 2 (stone)
    windmill2T = new Texture("Assets/Windmill/StoneWindmill.png");

    //Tier 3 (Concrete)
    windmill3T = new Texture("Assets/Windmill/ConcreteWindmill.png");

    //Tier 4 (Steel)
    windmill4T = new Texture("Assets/Windmill/SteelWindmill.png");

    //Damage 1
    windmillDamage1T = new Texture("Assets/Windmill/WindmillDamage1.png");

    //Damage 2
    windmillDamage2T = new Texture("Assets/Windmill/WindmillDamage2.png");

    //Damage 3
    windmillDamage3T = new Texture("Assets/Windmill/WindmillDamage3.png");

    //Level Textures-------------------------------------------------------------------------------
    //Level 1
    level1BGT = new Texture("Assets/Levels/Level1/1.png");
    level1FGT = new Texture("Assets/Levels/Level1/2.png");
    level1CollisionT = new Texture("Assets/Levels/Level1/3.png");

    level2BGT = new Texture("Assets/Levels/Level2/1.png");
    level2FGT = new Texture("Assets/Levels/Level2/2.png");
    level2CollisionT = new Texture("Assets/Levels/Level2/3.png");

    level3BGT = new Texture("Assets/Levels/Level3/1.png");
    level3FGT = new Texture("Assets/Levels/Level3/2.png");
    level3CollisionT = new Texture("Assets/Levels/Level3/3.png");

    //Create Sprites with default Textures----------------------------------------------------------
    //Music icons
    musicOnSprite = new Sprite(musicOnT);
    musicOffSprite = new Sprite(musicOffT);
    sfxOnSprite = new Sprite(sfxOnT);
    sfxOffSprite = new Sprite(sfxOffT);

    //Ants
    armoredAntSprite = new Sprite(armoredAntSpriteT);
    armoredBeetleSprite = new Sprite(armoredBeetleSpriteT);
    beetleSprite = new Sprite(beetleSpriteT);
    blackAntSprite = new Sprite(blackAntSpriteT);
    blueAntSprite = new Sprite(blueAntSpriteT);
    brownAntSprite = new Sprite(brownAntSpriteT);
    greenAntSprite = new Sprite(greenAntSpriteT);
    purpleAntSprite = new Sprite(purpleAntSpriteT);
    redAntSprite = new Sprite(redAntSpriteT);
    whiteAntSprite = new Sprite(whiteAntSpriteT);
    yellowAntSprite = new Sprite(yellowAntSpriteT);

    //Regenerative
    rBlackAntSprite = new Sprite(rBlackAntSpriteT);
    rBlueAntSprite = new Sprite(rBlueAntSpriteT);
    rBrownAntSprite = new Sprite(rBrownAntSpriteT);
    rGreenAntSprite = new Sprite(rGreenAntSpriteT);
    rPurpleAntSprite = new Sprite(rPurpleAntSpriteT);
    rRedAntSprite = new Sprite(rRedAntSpriteT);
    rWhiteAntSprite = new Sprite(rWhiteAntSpriteT);
    rYellowAntSprite = new Sprite(rYellowAntSpriteT);

    //Shields
    greenLeafSprite = new Sprite(greenLeafSpriteT);
    rockSprite = new Sprite(greenLeafSpriteT);
    sodaCanSprite = new Sprite(greenLeafSpriteT);
    styrofoamCupSprite = new Sprite(styrofoamCupSpriteT);

    //Windmill
    windmillSprite1 = new Sprite(windmill1T);
    windmillSprite2 = new Sprite(windmill2T);
    windmillSprite3 = new Sprite(windmill3T);
    windmillSprite4 = new Sprite(windmill4T);
    windmillDamageSprite = new Sprite(windmillDamage1T);
    windmillSprite = windmillSprite1;

    //Levels
    level1BGSprite = new Sprite(level1BGT);
    level1FGSprite = new Sprite(level1FGT);
    level1CollisionSprite = new Sprite(level1CollisionT);
    level2BGSprite = new Sprite(level2BGT);
    level2FGSprite = new Sprite(level2FGT);
    level2CollisionSprite = new Sprite(level2CollisionT);
    level3BGSprite = new Sprite(level3BGT);
    level3FGSprite = new Sprite(level3FGT);
    level3CollisionSprite = new Sprite(level3CollisionT);
}

//onAssetsLoaded() function - Called once all assets are loaded
function onAssetsLoaded() {
    assetsLoaded = true; //Assets are now loaded
}

let tick = 0; //Tick used to count frame for animating loading screen
//getProgress() function - Return true progress amount regardless of nested assets
function getProgress() {
    //If tick is 0
    if(tick === 0) {
        tick++; //Increment tick
        return "Loading."; //Return Loading.
    }
    //If tick is 1
    if(tick === 1) {
        tick++; //Increment tick
        return "Loading.."; //Return Loading..
    }
    //If tick is 2
    if(tick === 2) {
        tick = 0; //Reset tick to 0
        return "Loading..."; //Return Loading...
    }
}

//onProgress() function - Called each time progress is made on the loader
function onProgress() {
    //console.log(getProgress()+"%"); //For debugging
}