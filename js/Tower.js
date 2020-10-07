/*
* Author: Chad Cromwell
* Date: 2019-03-25
* Description: Tower Sprite class, represents a tower
* Functions:
*           Tower(type, mousePos, parent=null) constructor - Accepts a type, mousePos, and parent container
*           update() function - update the sprite
*           animate() function - Animates the tower
*           attack() function - Causes tower to attack and hurt ants
*           scanForTargets() function - Scans for targets within the tower's range
*           upgradeTower(path) function - Accepts a path and upgrades that path
*           show() function - Shows the sprite
*           hide() function - Hides the sprite
*           setPosition(x, ,y) function - Accepts an x and y position and updates sprite's position
*           onClick() function - Performed when tower is selected
*           disable() function - Disables the sprite so it is no longer interactive or a button
*           enable() function - Enables the sprite so it is interactive and a button
*           updateRangeOverlay() function - Updates the position of the range overlay and position
*           hideRangeOverlay() function - Hides the range overlay
*           showRangeOverlay() function - Shows the range overlay
*/
class Tower extends PIXI.Sprite {

    //Tower(type, mousePos, parent=null) constructor - Accepts a type, mousePos, and parent container
    constructor(type, mousePos, parent=null) {
        //Assign tower texture based on type passed
        //If type 1, it is a slingshot tower
        if(type === 1) {
            super(slingshot20T); //Super call to slingshot texture
        }
        //Else, if type 2, it is a hammer tower
        else if(type === 2) {
            super(hammer10T); //Super call to hammer texture
        }
        //Else, if type 3, it is a bug spray tower
        else if(type === 3) {
            super(bugSpray10T); //Super call to bug spray texture
        }
        //Else, if type 4, it is a magnifying glass tower
        else if(type === 4) {
            super(magnifyingGlass10T); //Super call to magnifying glass texture
        }
        //Else, if type 5, it is a cannon tower
        else if(type === 5) {
            super(cannon10T); //Super call to cannon texture
        }
        //Else, if type 6, it is a honey tower
        else if(type === 6) {
            super(honey10T); //Super call to honey texture
        }

        const me = this; //create local reference for this, needed when making PIXI classes

        //Assign x,y pos based off of mousePos at time of creation
        me.x = mousePos.x;
        me.y = mousePos.y;

        //Variables
        me.type = type; //Type of tower
        me.sprite1; //Bottom sprite
        me.sprite2; //Top sprite
        me.sprite3; //Third sprite, for slingshot
        me.cost; //Cost of tower
        me.damage = 1; //Damage amount
        me.shots = 1; //Total projectiles in one shot
        me.targets = 1; //Total targets tower can hit
        me.range = 50; //Range of the tower
        me.path1 = 0; //Set starting tier of path 1
        me.path2 = 0; //Set starting tier of path 2
        me.tick = 0; //Ticker to keep track of time passed
        me.directions = 1; //Number of directions the tower can spray, used for bug spray tower
        me.range = 0; //Range of tower
        me.aoe = 0; //The radius of the projectiles AOE (used for cannon and honey/explosive projectiles)
        me.slowAmount = 1; //Amount tower projectile slows ants
        me.slowTime = 3000; //Time tower projectile slows ants
        me.targetsArray = []; //Targets within range of the tower
        me.allDir = false; //If bug spray tower is fully upgraded, hurts all ants in full radius
        me.attackSpeed; //Attack speed, the lower the number the faster the attack
        me.hitCloaked = false; //If the sprite can hurt cloaked ants
        me.hitArmored = false; //If the sprite can hurt armored ants
        me.placing = true; //If the sprite is currently being placed or not
        me.xMin; //Sprite's physical left pixel position
        me.xMax; //Sprite's physical right pixel position
        me.yMin; //Sprite's physical top pixel position
        me.yMax; //Sprite's physical bottom pixel position
        me.xMin2; //Sprite's visual left pixel position
        me.xMax2; //Sprite's visual right pixel position
        me.yMin2; //Sprite's visual top pixel position
        me.yMax2; //Sprite's visual bottom pixel position
        me.xWidth; //Sprite's width
        me.yHeight; //Sprite's height
        me.alpha = 1; //Tower's alpha, used to show if tower can be placed in position or not
        me.targetPriority = "closest"; //What target the tower prioritizes to attack can be "first" "last" "closest" "strongest" "weakest"
        me.selected = true; //If the tower is selected or not
        me.activated = false; //If the tower is activated yet or not, used to determine if it should be made interactive/a button yet
        me.projectileSpeed = 100; //Speed of projectile
        me.container = new PIXI.Container(); //Holds towers
        me.loaded = true; //If the tower has a projectile loaded
        me.animateTick = 0; //Animation ticker
        me.slingshotRangeMultiplier = 1.25; //Range multiplier for slingshot
        me.bugSprayRangeMultiplier = 1.1; //Range multiplier for bug spray
        me.magnifyingGlassRangeMultiplier = 1.25; //Range multiplier for magnifying glass
        me.cannonRangeMultiplier = 1.25; //Range multiplier for cannon
        me.honeyRangeMultiplier = 1.1; //Range multiplier for honey
        me.hammerSpeedMultiplier = .75; //Speed multiplier for hammer
        me.bugSpraySpeedMultiplier = .90; //Speed multiplier for bug spray
        me.cannonSpeedMultiplier = .75; //Speed multiplier for cannon
        me.name = ""; //Name of tower as a string
        me.currentPath1DescriptionText = "Path 1:\nNot Upgraded"; //Current path 1 description string
        me.currentPath2DescriptionText = "Path 2:\nNot Upgraded"; //Current path 2 description string
        me.nextPath1Description = ""; //Next path 1 tier description string
        me.nextPath2Description = ""; //Next path 2 tier description string
        me.currentPath1DescriptionTextModified = "Path 1: Not Upgraded"; //Current path 1 description string without line breaks
        me.currentPath2DescriptionTextModified = "Path 2: Not Upgraded"; //Current path 2 description string without line breaks
        me.path1Cost = 0; //Cost to upgrade path 1
        me.path2Cost = 0; //Cost to upgrade path 2
        me.rangeOverlay = new PIXI.Graphics(); //Overlay that shows the range of the tower
        me.rangeOverlay.beginFill(lightGreen); //Fill green
        me.rangeOverlay.drawCircle(0, 0, me.range); //Draw the range overlay circle
        me.rangeOverlay.alpha = 0.1; //Set the alpha to 0.1
        me.rangeOverlay.visible = false; //Hide it
        me.container.addChild(me.rangeOverlay); //Add range overlay to the passed container
        me.kills = 0; //Keeps track of kills the tower has made
        me.hovered = false; //If being overed or not

        //Assign ant texture based on type passed, as well as damage type
        //If slingshot tower
        if(type === 1) {
            me.name = "Slingshot"; //Assign tower name
            me.cost = slingshotCost; //Set cost
            me.attackSpeed = 1000; //Set attack speed
            me.range = 250; //Set range
            me.shots = 1; //Set number of shots it can make
            me.targets = 1; //Set number of targets it can hit
            me.damage = 1; //Set damage it does
            me.projectileSpeed = 100; //Set speed of projectile
            me.damageType = "Slingshot"; //Assign slingshot damage type
            me.sprite1 = new Sprite(slingshot20T); //Assign sprite 1
            me.sprite2 = new Sprite(slingshot10CirclesT); //Assign sprite 2
            me.sprite3 = new Sprite(slingshot10T); //Assign sprite 3
            me.sprite1Frame1 = slingshot20T; //Assign sprite 1 frame 1
            me.sprite2Frame1 = slingshot10CirclesT; //Assign sprite 2 frame 1
            me.sprite3Frame1 = slingshot10T; //Assign sprite 3 frame 1
            me.sprite1Frame2 = slingshot20T; //Assign sprite 1 frame 2
            me.sprite2Frame2 = slingshot10CirclesT; //Assign sprite 2 frame 2
            me.sprite3Frame2 = slingshot10T2; //Assign sprite 3 frame 2
            me.nextPath1Description = "Upgrade to:\n+1 Range\n("+slingShot11Cost+" gold)"; //Assign next path 1 tier description
            me.nextPath2Description = "Upgrade to:\n2 Shots\n("+slingShot21Cost+" gold)"; //Assign next path 2 tier description
            me.path1Cost = slingShot11Cost; //Assign path 1 cost
            me.path2Cost = slingShot21Cost; //Assign path 2 cost
        }

        //Else, if hammer tower
        else if(type === 2) {
            me.name = "Hammer"; //Assign tower name
            me.cost = hammerCost; //Set cost
            me.attackSpeed = 1000; //Set attack speed
            me.range = 150; //Set range
            me.shots = 1; //Set number of shots it can make
            me.targets = 1; //Set number of targets it can hit
            me.damage = 1; //Set damage it does
            me.projectileSpeed = 100; //Set speed of projectile
            me.hitArmored = true; //Can hit armoured ants
            me.damageType = "Hammer"; //Assign hammer damage type
            me.sprite1 = new Sprite(hammer10T); //Assign sprite 1
            me.sprite2 = new Sprite(hammer20T); //Assign sprite 2
            me.sprite1Frame1 = hammer10T; //Assign sprite 1 frame 1
            me.sprite2Frame1 = hammer20T; //Assign sprite 2 frame 1
            me.sprite1Frame2 = hammer10T2; //Assign sprite 1 frame 2
            me.sprite2Frame2 = hammer20T2; //Assign sprite 2 frame 2
            me.nextPath1Description = "Upgrade to:\n+1 Attack Speed\n("+hammer11Cost+" gold)"; //Assign next path 1 tier description
            me.nextPath2Description = "Upgrade to:\n2 Damage\n("+hammer21Cost+" gold)"; //Assign next path 2 tier description
            me.path1Cost = hammer11Cost; //Assign path 1 cost
            me.path2Cost = hammer21Cost; //Assign path 2 cost
        }

        //Else, if bug spray tower
        else if(type === 3) {
            me.name = "Bug spray"; //Assign tower name
            me.cost = bugSprayCost; //Set cost
            me.attackSpeed = 1000; //Set attack speed
            me.range = 200; //Set range
            me.shots = 1; //Set number of shots it can make
            me.targets = 1; //Set number of targets it can hit
            me.damage = 1; //Set damage it does
            me.directions = 8; //Set number of direction it shoots
            me.projectileSpeed = 10; //Set speed of projectile
            me.sprite1 = new Sprite(bugSpray10T); //Assign sprite 1
            me.sprite2 = new Sprite(bugSpray20T); //Assign sprite 2
            me.damageType = "Bug Spray"; //Assign bug spray damage type
            me.nextPath1Description = "Upgrade to:\n+1 Range\n("+bugSpray11Cost+" gold)"; //Assign next path 1 tier description
            me.nextPath2Description = "Upgrade to:\n+1 Attack Speed\n("+bugSpray21Cost+" gold)"; //Assign next path 2 tier description
            me.path1Cost = bugSpray11Cost; //Assign path 1 cost
            me.path2Cost = bugSpray21Cost; //Assign path 2 cost
        }

        //Else, if magnifying glass tower
        else if(type === 4) {
            me.name = "Magnifying glass"; //Assign tower name
            me.cost = magnifyingGlassCost; //Set cost
            me.attackSpeed = 750; //Set attack speed
            me.range = 400; //Set range
            me.shots = 1; //Set number of shots it can make
            me.targets = 1; //Set number of targets it can hit
            me.damage = 5; //Set damage it does
            me.projectileSpeed = 100; //Set speed of projectile
            me.sprite1 = new Sprite(magnifyingGlass20T); //Assign sprite 1
            me.sprite2 = new Sprite(magnifyingGlass10T); //Assign sprite 2
            me.damageType = "Magnifying Glass"; //Assign bug spray damage type
            me.nextPath1Description = "Upgrade to:\n+1 Range\n("+magnifyingGlass11Cost+" gold)"; //Assign next path 1 tier description
            me.nextPath2Description = "Upgrade to:\n2 Shots\n("+magnifyingGlass21Cost+" gold)"; //Assign next path 2 tier description
            me.path1Cost = magnifyingGlass11Cost; //Assign path 1 cost
            me.path2Cost = magnifyingGlass21Cost; //Assign path 2 cost
        }

        //Else, if cannon tower
        else if(type === 5) {
            me.name = "Cannon"; //Assign tower name
            me.cost = cannonCost; //Set cost
            me.attackSpeed = 10000; //Set attack speed
            me.range = 250; //Set range
            me.shots = 1; //Set number of shots it can make
            me.targets = 1000; //Set number of targets it can hit
            me.damage = 1; //Set damage it does
            me.projectileSpeed = 100; //Set speed of projectile
            me.aoe = 150; //Set AoE of projectile (area of effect/splash damage)
            me.sprite1 = new Sprite(cannon20T); //Assign sprite 1
            me.sprite2 = new Sprite(cannon10T); //Assign sprite 2
            me.damageType = "Cannon"; //Assign cannon damage type
            me.nextPath1Description = "Upgrade to:\n+1 Range\n("+cannon11Cost+" gold)"; //Assign next path 1 tier description
            me.nextPath2Description = "Upgrade to:\n2 Damage\n("+cannon21Cost+" gold)"; //Assign next path 2 tier description
            me.path1Cost = cannon11Cost; //Assign path 1 cost
            me.path2Cost = cannon21Cost; //Assign path 2 cost
        }

        //Else, if honey tower
        else if(type === 6) {
            me.name = "Honey"; //Assign tower name
            me.cost = honeyCost;  //Set cost
            me.attackSpeed = 10000; //Set attack speed
            me.range = 150; //Set range
            me.shots = 1; //Set number of shots it can make
            me.targets = 1000; //Set number of targets it can hit
            me.damage = 0; //Set damage it does
            me.slowAmount = 0.70; //Set amount of slow. 0 is stopped, 1 is normal ant speed.
            me.slowTime = 3000; //Set slow duration time
            me.projectileSpeed = 100; //Set speed of projectile
            me.aoe = 90; //Projectile AoE
            me.sprite1 = new Sprite(honey20T); //Assign sprite 1
            me.sprite2 = new Sprite(honey10T); //Assign sprite 2
            me.damageType = "Honey"; //Assign honey damage type
            me.nextPath1Description = "Upgrade to:\n+1 Slow Time\n("+honey11Cost+" gold)"; //Assign next path 1 tier description
            me.nextPath2Description = "Upgrade to:\n+1 Slow Amount\n("+honey21Cost+" gold)"; //Assign next path 2 tier description
            me.path1Cost = honey11Cost; //Assign path 1 cost
            me.path2Cost = honey21Cost; //Assign path 2 cost
        }

        //Center the anchor for sprite rotation
        centerAnchor(me.sprite1);
        centerAnchor(me.sprite2);
        //If slingshot tower, there's a third sprite that needs to be accounted for
        if(type === 1) {
            centerAnchor(me.sprite3); //Center the anchor for sprite rotation
        }

        //Set sprite size
        //If slingshot, make 40% size
        if(type === 1) {
            me.sprite1.width = me.sprite1.width*0.4;
            me.sprite1.height = me.sprite1.height*0.4;
            me.sprite2.width = me.sprite2.width*0.4;
            me.sprite2.height = me.sprite2.height*0.4;
            me.sprite3.width = me.sprite3.width * 0.4;
            me.sprite3.height = me.sprite3.height * 0.4;
        }
        //If hammer, make 40% size
        if(type === 2) {
            me.sprite1.width = me.sprite1.width*0.4;
            me.sprite1.height = me.sprite1.height*0.4;
            me.sprite2.width = me.sprite2.width*0.4;
            me.sprite2.height = me.sprite2.height*0.4;
        }
        //If bug spray, make 40% size
        if(type === 3) {
            me.sprite1.width = me.sprite1.width*0.3;
            me.sprite1.height = me.sprite1.height*0.3;
            me.sprite2.width = me.sprite2.width*0.3;
            me.sprite2.height = me.sprite2.height*0.3;
        }
        //If magnifying glass, make 40% size
        if(type === 4) {
            me.sprite1.width = me.sprite1.width*0.4;
            me.sprite1.height = me.sprite1.height*0.4;
            me.sprite2.width = me.sprite2.width*0.4;
            me.sprite2.height = me.sprite2.height*0.4;
        }
        //If cannon, make 40% size
        if(type === 5) {
            me.sprite1.width = me.sprite1.width*0.4;
            me.sprite1.height = me.sprite1.height*0.4;
            me.sprite2.width = me.sprite2.width*0.4;
            me.sprite2.height = me.sprite2.height*0.4;
        }
        //If honey, make 40% size
        if(type === 6) {
            me.sprite1.width = me.sprite1.width*0.4;
            me.sprite1.height = me.sprite1.height*0.4;
            me.sprite2.width = me.sprite2.width*0.4;
            me.sprite2.height = me.sprite2.height*0.4;
        }

        //If parent argument is passed, add the child to the parent container
        if(parent) {
            me.container.addChild(me.sprite1); //Add sprite 1 to passed container
            me.container.addChild(me.sprite2); //Add sprite 2 to passed container
            //If slingshot
            if(type === 1) {
                me.container.addChild(me.sprite3); //Add sprite 3 to passed container
            }
            parent.addChild(me.container); //Add to the container
        }

        updateRangeOverlay();

        //On sprite 1 mouseover
        me.sprite1.mouseover = function(mouseData) {
            me.hovered = true;
            updateToolTip(me.name+"\n" + me.currentPath1DescriptionTextModified + "\n" + me.currentPath2DescriptionTextModified + "\nTargeting: " + me.targetPriority + "\n Kills: " + me.kills); //Update tooltip text
            showToolTip(); //Show tooltip
        };

        //On sprite 2 mouseover
        me.sprite2.mouseover = function(mouseData) {
            me.hovered = true;
            updateToolTip(me.name+"\n" + me.currentPath1DescriptionTextModified + "\n" + me.currentPath2DescriptionTextModified + "\nTargeting: " + me.targetPriority + "\n Kills: " + me.kills); //Update tooltip text
            showToolTip(); //Show tooltip
        };

        //update() function - update the sprite
        me.update = function() {
            updateRangeOverlay();
            //If being placed
            if(me.placing) {
                me.showRangeOverlay();
                me.x = mousePos.x; //Update x pos to match mouse pos
                me.y = mousePos.y; //Update y pos to match mouse pos
                me.sprite1.x = 0;//mousePos.x;
                me.sprite1.y = 0;//mousePos.y;
                me.sprite2.x = 0;//mousePos.x;
                me.sprite2.y = 0;//mousePos.y;

                //If slingshot, need to account for third sprite
                if(type === 1) {
                    me.sprite3.x = 0; //Update x pos
                    me.sprite3.y = me.sprite1.height * 0.61; //Update y pos
                }

                //Alpha while placing, if placeable 1.0, if not, 0.5
                let check = 0; //Check counter
                //Iterate through placement area
                for(let i = 0; i < placementArea.length; i++) {
                    //If tower is within the placement area
                    if(polygonCollision([towers[towers.length-1].xMin, towers[towers.length-1].yMin], placementArea[i]) && polygonCollision([towers[towers.length-1].xMax, towers[towers.length-1].yMin], placementArea[i]) && polygonCollision([towers[towers.length-1].xMax, towers[towers.length-1].yMax], placementArea[i]) && polygonCollision([towers[towers.length-1].xMin, towers[towers.length-1].yMax], placementArea[i])) {
                        check++; //Increment check
                    }
                }
                //If the tower is currently in a placeable area
                if(check !== 0) {
                    //Iterate through all towers
                    for (let i = 0; i < towers.length - 1; i++) {
                        //If the tower is collided with another one
                        if (towers[towers.length - 1].xMin2 < towers[i].xMax2 && towers[towers.length - 1].xMax2 > towers[i].xMin2 && towers[towers.length - 1].yMin2 < towers[i].yMax2 && towers[towers.length - 1].yMax2 > towers[i].yMin2) {
                            check = 0; //Check is 0, cannot place tower
                        }
                    }
                }
                //If check is not 0, can place tower
                if(check !== 0) {
                    me.alpha = 1; //Set alpha to 1
                }
                //Else, set alpha to .5 because tower cannot be placed
                else {
                    me.alpha = 0.5;
                }
                me.sprite1.alpha = me.alpha; //Update alpha
                me.sprite2.alpha = me.alpha; //Update alpha
                //If slingshot, account for 3rd sprite
                if(type === 1) {
                    me.sprite3.alpha = me.alpha;
                }
                //If slingshot, set biggest width of all sprites as xWidth same for height
                if(type === 1) {
                    me.xWidth = Math.max(me.sprite1.width, me.sprite2.width, me.sprite3.width);
                    me.yHeight = Math.max(me.sprite1.height, me.sprite2.height, me.sprite3.height);
                }
                //Else, not slingshot and follow same logic as above but for 2 sprites, not 3
                else {
                    me.xWidth = Math.max(me.sprite1.width, me.sprite2.width);
                    me.yHeight = Math.max(me.sprite1.height, me.sprite2.height);
                }
                //If slingshot, update container size
                if(type === 1) {
                    me.xMin = me.container.x-(me.xWidth/24);
                    me.xMax = me.container.x+(me.xWidth/24);
                    me.yMin = me.container.y-(me.yHeight/4);
                    me.yMax = me.container.y+(me.yHeight/4);
                    me.xMin2 = me.container.x-(me.xWidth/2);
                    me.xMax2 = me.container.x+(me.xWidth/2);
                    me.yMin2 = me.container.y-(me.yHeight/2);
                    me.yMax2 = me.container.y+(me.yHeight/2);
                }
                //If hammer, update container size
                if(type === 2) {
                    me.xMin = me.container.x-(me.xWidth/8);
                    me.xMax = me.container.x+(me.xWidth/8);
                    me.yMin = me.container.y-(me.yHeight/8);
                    me.yMax = me.container.y+(me.yHeight/8);
                    me.xMin2 = me.container.x-(me.xWidth/2);
                    me.xMax2 = me.container.x+(me.xWidth/2);
                    me.yMin2 = me.container.y-(me.yHeight/2);
                    me.yMax2 = me.container.y+(me.yHeight/2);
                }
                //If bug spray, update container size
                if(type === 3) {
                    me.xMin = me.container.x-(me.xWidth/4);
                    me.xMax = me.container.x+(me.xWidth/4);
                    me.yMin = me.container.y-(me.yHeight/4);
                    me.yMax = me.container.y+(me.yHeight/4);
                    me.xMin2 = me.container.x-(me.xWidth/2);
                    me.xMax2 = me.container.x+(me.xWidth/2);
                    me.yMin2 = me.container.y-(me.yHeight/2);
                    me.yMax2 = me.container.y+(me.yHeight/2);
                }
                //If magnifying glass, update container size
                if(type === 4) {
                    me.xMin = me.container.x-(me.xWidth/8);
                    me.xMax = me.container.x+(me.xWidth/8);
                    me.yMin = me.container.y-(me.yHeight/8);
                    me.yMax = me.container.y+(me.yHeight/8);
                    me.xMin2 = me.container.x-(me.xWidth/4);
                    me.xMax2 = me.container.x+(me.xWidth/4);
                    me.yMin2 = me.container.y-(me.yHeight/2);
                    me.yMax2 = me.container.y+(me.yHeight/2);
                }
                //If cannon, update container size
                if(type === 5) {
                    me.xMin = me.container.x-(me.xWidth/8);
                    me.xMax = me.container.x+(me.xWidth/8);
                    me.yMin = me.container.y-(me.yHeight/8);
                    me.yMax = me.container.y+(me.yHeight/8);
                    me.xMin2 = me.container.x-(me.xWidth/2);
                    me.xMax2 = me.container.x+(me.xWidth/2);
                    me.yMin2 = me.container.y-(me.yHeight/4);
                    me.yMax2 = me.container.y+(me.yHeight/4);
                }
                //If honey, update container size
                if(type === 6) {
                    me.xMin = me.container.x-(me.xWidth/8);
                    me.xMax = me.container.x+(me.xWidth/8);
                    me.yMin = me.container.y-(me.yHeight/8);
                    me.yMax = me.container.y+(me.yHeight/8);
                    me.xMin2 = me.container.x-(me.xWidth/2);
                    me.xMax2 = me.container.x+(me.xWidth/2);
                    me.yMin2 = me.container.y-(me.yHeight/2);
                    me.yMax2 = me.container.y+(me.yHeight/2);
                }
                me.x = mousePos.x; //Update final x position
                me.y = mousePos.y; //Update final y position
                me.container.x = mousePos.x; //Update container x position
                me.container.y = mousePos.y; //Update container y position
            }
            //If not yet active
            else if(!me.activated) {
                //Make tower interactive and a button so user can click it
                me.sprite1.interactive = true;
                me.sprite1.buttonMode = true;
                me.sprite2.interactive = true;
                me.sprite2.buttonMode = true;
                //If slingshot, do it for 3rd sprite
                if(me.type === 1) {
                    me.sprite3.interactive = true;
                    me.sprite3.buttonMode = true;
                }
                me.activated = true; //Activate sprite
            }

            me.tick += app.ticker.elapsedMS*speedUp; //Increment ticker by time in ms that has passed since last frame

            //If ticker goes over 2 seconds
            if (me.activated && me.loaded) {
                attack(); //Attack
            }

            //If activated, not loaded, and attackSpeed has been reached, load projectile
            if(me.activated && !me.loaded && me.tick >= me.attackSpeed) {
                me.loaded = true; //Projectile is loaded
            }

            me.animate(); //Animate the tower
            if(me.hovered) {
                updateToolTip(me.name+"\n" + me.currentPath1DescriptionTextModified + "\n" + me.currentPath2DescriptionTextModified + "\nTargeting: " + me.targetPriority + "\n Kills: " + me.kills); //Update tooltip text
            }
        };

        me.frame1 = true; //Set tower frame to 1

        //animate() function - Animates the tower
        me.animate = function() {
            me.animateTick += app.ticker.elapsedMS*speedUp; //Increment ticker
            me.animateTime = me.attackSpeed; //Set animateTime to attackSpeed, just for syntax
            //If on frame 1
            if(me.frame1) {
                //Set sprite y positions so they line up
                me.sprite1.y = 0;
                me.sprite2.y = 0;
                //If slingshot, set 3rd sprite y position
                if(type === 1) {
                    me.sprite3.y = 38;
                }
                //If slingshot or hammer
                if(type < 3) {
                    //Set sprite size to 40%
                    me.sprite1.height = me.sprite1Frame1.height * 0.4;
                    me.sprite2.height = me.sprite2Frame1.height * 0.4;
                    me.sprite1.width = me.sprite1Frame1.width * 0.4;
                    me.sprite2.width = me.sprite2Frame1.width * 0.4;
                    //If slingshot, set 3rd sprite size to 40%
                    if (type === 1) {
                        me.sprite3.height = me.sprite3Frame2.height * 0.4;
                        me.sprite3.width = me.sprite3Frame2.width * 0.4;
                    }
                    //Set textures
                    me.sprite1.texture = me.sprite1Frame1;
                    me.sprite2.texture = me.sprite2Frame1;
                    //If slingshot, set 3rd sprite texture
                    if (type === 1) {
                        me.sprite3.texture = me.sprite3Frame2;
                    }
                }
            }
            //Else, do the same above but for frame 2 with different positions so the sprites line up
            else {
                //Slingshot
                if(type === 1) {
                    me.sprite3.y = 20; //Adjust y position of sprite 3

                    //Set sizes to 40%
                    me.sprite1.height = me.sprite1Frame1.height * 0.4;
                    me.sprite1.width = me.sprite1Frame1.width * 0.4;
                    me.sprite3.height = me.sprite3Frame1.height * 0.4;
                    me.sprite3.width = me.sprite3Frame1.width * 0.4;

                    //Set textures to frame 1
                    me.sprite1.texture = me.sprite1Frame1;
                    me.sprite2.texture = me.sprite2Frame1;
                        me.sprite3.texture = me.sprite3Frame1;
                }
                //Hammer
                if(type === 2) {
                    me.sprite1.y = -50; //Adjust y position of sprite 1
                    me.sprite2.y = -125; //Adjust y position of sprite 2

                    //Set sizes to 40%
                    me.sprite1.height = me.sprite1Frame2.height * 0.4;
                    me.sprite2.height = me.sprite2Frame2.height * 0.4;
                    me.sprite1.width = me.sprite1Frame2.width * 0.4;
                    me.sprite2.width = me.sprite2Frame2.width * 0.4;

                    //Set textures to frame 2
                    me.sprite1.texture = me.sprite1Frame2;
                    me.sprite2.texture = me.sprite2Frame2;
                }

                //If it is time to animate
                if(me.animateTick >= me.animateTime+100) {
                    me.animateTick = 0; //Reset animate tick
                    me.frame1 = true; //Go back to frame 1
                }
            }
        };

        //attack() function - Causes tower to attack and hurt ants
        function attack() {
            me.targetCounter = 0; //Initialize targetCounter
            scanForTargets(); //Scan for targets
            //If there are targets to shoot
            if(me.targetsArray !== "undefined" && me.targetsArray.length > 0) {
                me.p1 = {x: me.x, y: me.y}; //Set source point
                me.p2 = {x: me.targetsArray[0].x, y: me.targetsArray[0].y}; //Set target point
                //Get angle in degrees
                me.orientation = Math.atan2(me.p2.y - me.p1.y, me.p2.x - me.p1.x) * 180 / Math.PI;
                me.rot = rad(90+me.orientation); //Set rotation amount in radians
                me.container.rotation = me.rot; //Rotate sprite container
                //If not bug spray
                if(me.type !== 3) {
                    //Iterate through how many shots the tower can take
                    for(let i = 0; i < me.shots; i++) {
                        //If targetsArray exists
                        if(typeof me.targetsArray[i] != "undefined") {
                            projectiles.push(new Projectile(me, me.targetsArray[i], projectileContainer)); //Create a projectile
                            //If slingshot
                            if(me.type === 1) {
                                playSlingshotSound(); //Play slingshot sound
                            }
                            //If hammer
                            else if(me.type === 2) {
                                playHammerSound(); //Play hammer sound
                            }
                            //If magnifying glass
                            else if(me.type === 4) {
                                playMagnifyingGlassSound(); //Play magnifying glass sound
                            }
                            //If cannon
                            else if(me.type === 5) {
                                playCannonSound(); //Play cannon sound
                            }
                            //If honey
                            else if(me.type === 6) {
                                playHoneySound(); //Play honey sound
                            }
                        }
                    }
                }
                //If bug spray, create 8 projectiles without targets
                else {
                    //If can shoot in 8 directions
                    if(me.directions === 8) {
                        projectiles.push(new Projectile(me, "1", projectileContainer));
                        projectiles.push(new Projectile(me, "2", projectileContainer));
                        projectiles.push(new Projectile(me, "3", projectileContainer));
                        projectiles.push(new Projectile(me, "4", projectileContainer));
                        projectiles.push(new Projectile(me, "5", projectileContainer));
                        projectiles.push(new Projectile(me, "6", projectileContainer));
                        projectiles.push(new Projectile(me, "7", projectileContainer));
                        projectiles.push(new Projectile(me, "8", projectileContainer));
                    }
                    //If can shoot in 16 directions
                    if(me.directions === 16) {
                        projectiles.push(new Projectile(me, "1", projectileContainer));
                        projectiles.push(new Projectile(me, "2", projectileContainer));
                        projectiles.push(new Projectile(me, "3", projectileContainer));
                        projectiles.push(new Projectile(me, "4", projectileContainer));
                        projectiles.push(new Projectile(me, "5", projectileContainer));
                        projectiles.push(new Projectile(me, "6", projectileContainer));
                        projectiles.push(new Projectile(me, "7", projectileContainer));
                        projectiles.push(new Projectile(me, "8", projectileContainer));
                        projectiles.push(new Projectile(me, "9", projectileContainer));
                        projectiles.push(new Projectile(me, "10", projectileContainer));
                        projectiles.push(new Projectile(me, "11", projectileContainer));
                        projectiles.push(new Projectile(me, "12", projectileContainer));
                        projectiles.push(new Projectile(me, "13", projectileContainer));
                        projectiles.push(new Projectile(me, "14", projectileContainer));
                        projectiles.push(new Projectile(me, "15", projectileContainer));
                        projectiles.push(new Projectile(me, "16", projectileContainer));
                    }
                    playBugSpraySound(); //Play bug spray sound
                }
                me.loaded = false; //Tower fired so it is not loaded
                me.tick = 0; //Reset tick
            }
        }

        //scanForTargets() function - Scans for targets within the tower's range
        function scanForTargets() {
            me.targetsArray = []; //Clear the targetsArray
            //Iterate through all ants
            for(let i = 0; i < ants.length; i++) {
                if(ants[i].active) {
                    //If the ant is within the tower's range and it can get hit
                    if (inRange(me, ants[i]) && intercept(ants[i], {x: (ants[i].xSpeed), y: (ants[i].ySpeed)}, me, me.projectileSpeed) !== null) {
                        if(ants[i].cloaked && me.hitCloaked) {
                            me.targetsArray.push(ants[i]); //Add ant to the target array
                        }
                        else if(!ants[i].cloaked){
                            me.targetsArray.push(ants[i]); //Add ant to the target array
                        }
                    }
                }
            }

            //If targetPriority is first
            if(me.targetPriority === "first") {
                me.targetsArray.sort(function(a,b) {return a.distanceTravelled - b.distanceTravelled;}); //Sort first to last
            }
            //If targetPriority is farthest
            if(me.targetPriority === "last") {
                me.targetsArray.sort(function(a,b) {return b.distanceTravelled - a.distanceTravelled;}); //Sort last to first
            }
            //If targetPriority is closest
            if(me.targetPriority === "closest") {
                me.targetsArray.sort(function(a,b) {return distance(me,a) - distance(me,b);}); //Sort by closest to tower
            }
            //If targetPriority is strongest
            if(me.targetPriority === "strongest") {
                me.targetsArray.sort(function(a,b) {return b.hp - a.hp;}); //Sort by strongest
            }
        }

        me.path1CanUpgrade = true; //Path 1 can upgrade
        me.path2CanUpgrade = true; //Path 2 can upgrade

        //upgradeTower(path) function - Accepts a path and upgrades that path
        me.upgradeTower = function(path) {
            //If path 1 is upgraded past tier 2 and path 2 is at tier 2, the user cannot upgrade path 2 any higher
            if(me.path1 > 2 && me.path2 > 1) {
                me.path2CanUpgrade = false; //Can't upgrade path 2
            }
            //If path 2 is upgraded past tier 2 and path 1 is at tier 2, the user cannot upgrade path 1 any higher
            if(me.path2 > 2 && me.path1 > 1) {
                me.path1CanUpgrade = false; //Can't upgrade path 1
            }
            //If 1 is passed and it can be upgraded
            if(path === 1 && me.path1CanUpgrade) {
                //If path 1 is not fully upgraded yet
                if(me.path1 < 4) {
                    me.path1++; //Upgrade path 1
                }
                //If slingshot tower
                if (type === 1) {
                    //If path 1 is tier 1
                    if (me.path1 === 1) {
                        me.sprite2.texture = slingshot11CirclesT; //Update texture
                        me.sprite3.texture = slingshot11T; //Update texture
                        me.sprite2Frame1 = slingshot11CirclesT; //Update texture
                        me.sprite3Frame1 = slingshot11T; //Update texture
                        me.sprite3Frame2 = slingshot11T2; //Update texture
                    }
                    //If path 1 is tier 2
                    if (me.path1 === 2) {
                        me.sprite2.texture = slingshot12CirclesT; //Update texture
                        me.sprite3.texture = slingshot12T; //Update texture
                        me.sprite2Frame1 = slingshot12CirclesT; //Update texture
                        me.sprite3Frame1 = slingshot12T; //Update texture
                        me.sprite3Frame2 = slingshot12T2; //Update texture
                    }
                }
                //If hammer tower
                if(type === 2) {
                    //If path 1 is tier 1
                    if(me.path1 === 1) {
                        me.sprite1.texture = hammer11T; //Update texture
                        me.sprite1Frame1 = hammer11T; //Update texture
                        me.sprite1Frame2 = hammer11T2; //Update texture
                    }
                    //If path 1 is tier 2
                    if(me.path1 === 2) {
                        me.sprite1.texture = hammer12T; //Update texture
                        me.sprite1Frame1 = hammer12T; //Update texture
                        me.sprite1Frame2 = hammer12T2; //Update texture
                    }
                    //If path 1 is tier 3
                    if(me.path1 === 3) {
                        me.sprite1.texture = hammer13T; //Update texture
                        me.sprite1Frame1 = hammer13T; //Update texture
                        me.sprite1Frame2 = hammer13T2; //Update texture
                    }
                    //If path 1 is tier 4
                    if(me.path1 === 4) {
                        me.sprite1.texture = hammer14T; //Update texture
                        me.sprite1Frame1 = hammer14T; //Update texture
                        me.sprite1Frame2 = hammer14T2; //Update texture
                    }
                }
                //If bug spray tower
                if(type === 3) {
                    //If path 1 is tier 1
                    if(me.path1 === 1) {
                        me.sprite1.texture = bugSpray11T; //Update texture
                    }
                    //If path 1 is tier 2
                    if(me.path1 === 2) {
                        me.sprite1.texture = bugSpray12T; //Update texture
                    }
                    //If path 1 is tier 3
                    if(me.path1 === 3) {
                        me.sprite1.texture = bugSpray13T; //Update texture
                    }
                    //If path 1 is tier 4
                    if(me.path1 === 4) {
                        me.sprite1.texture = bugSpray14T; //Update texture
                    }
                }
                //If magnifying glass tower
                if(type === 4) {
                    //If path 1 is tier 1
                    if(me.path1 === 1) {
                        me.sprite1.texture = magnifyingGlass21T; //Update texture
                    }
                    //If path 1 is tier 2
                    if(me.path1 === 2) {
                        me.sprite1.texture = magnifyingGlass22T; //Update texture
                    }
                    //If path 1 is tier 3
                    if(me.path1 === 3) {
                        me.sprite1.texture = magnifyingGlass23T; //Update texture
                    }
                    //If path 1 is tier 4
                    if(me.path1 === 4) {
                        me.sprite1.texture = magnifyingGlass24T; //Update texture
                    }
                }
                //If cannon tower
                if(type === 5) {
                    //If path 1 is tier 1
                    if(me.path1 === 1) {
                        me.sprite1.texture = cannon21T; //Update texture
                    }
                    //If path 1 is tier 2
                    if(me.path1 === 2) {
                        me.sprite1.texture = cannon22T; //Update texture
                    }
                    //If path 1 is tier 3
                    if(me.path1 === 3) {
                        me.sprite1.texture = cannon23T; //Update texture
                    }
                    //If path 1 is tier 4
                    if(me.path1 === 4) {
                        me.sprite1.texture = cannon24T; //Update texture
                    }
                }
                //If honey tower
                if(type === 6) {
                    //If path 1 is tier 1
                    if(me.path1 === 1) {
                        me.sprite1.texture = honey11T; //Update texture
                    }
                    //If path 1 is tier 2
                    if(me.path1 === 2) {
                        me.sprite1.texture = honey12T; //Update texture
                    }
                    //If path 1 is tier 3
                    if(me.path1 === 3) {
                        me.sprite1.texture = honey13T; //Update texture
                    }
                    //If path 1 is tier 4
                    if(me.path1 === 4) {
                        me.sprite1.texture = honey14T; //Update texture
                    }
                }
            }
            //If 2 is passed and it can be upgraded
            if (path === 2 && me.path2CanUpgrade) {
                //If path 2 is not fully upgraded yet
                if(me.path2 < 4) {
                    me.path2++; //Upgrade path 2
                }
                //If slingshot tower
                if(type === 1) {
                    //If path 2 is tier 1
                    if (me.path2 === 1) {
                        me.sprite1.texture = slingshot21T; //Update texture
                        me.sprite1Frame1 = slingshot21T; //Update texture
                    }
                    //If path 2 is tier 2
                    if (me.path2 === 2) {
                        me.sprite1.texture = slingshot22T; //Update texture
                        me.sprite1Frame1 = slingshot22T; //Update texture
                    }
                    //If path 2 is tier 3
                    if (me.path2 === 3) {
                        me.sprite1.texture = slingshot23T; //Update texture
                        me.sprite1Frame1 = slingshot23T; //Update texture
                    }
                }
                //If hammer tower
                if(type === 2) {
                    //If path 2 is tier 1
                    if(me.path2 === 1) {
                        me.sprite2.texture = hammer21T; //Update texture
                        me.sprite2Frame1 = hammer21T; //Update texture
                        me.sprite2Frame2 = hammer21T2; //Update texture
                    }
                    //If path 2 is tier 2
                    if(me.path2 === 2) {
                        me.sprite2.texture = hammer22T; //Update texture
                        me.sprite2Frame1 = hammer22T; //Update texture
                        me.sprite2Frame2 = hammer22T2; //Update texture
                    }
                    //If path 2 is tier 3
                    if(me.path2 === 3) {
                        me.sprite2.texture = hammer23T; //Update texture
                        me.sprite2Frame1 = hammer23T; //Update texture
                        me.sprite2Frame2 = hammer23T2; //Update texture
                    }
                    //If path 2 is tier 4
                    if(me.path2 === 4) {
                        me.sprite2.texture = hammer24T; //Update texture
                        me.sprite2Frame1 = hammer24T; //Update texture
                        me.sprite2Frame2 = hammer24T2; //Update texture
                    }
                }
                //If bug spray tower
                if(type === 3) {
                    //If path 2 is tier 1
                    if(me.path2 === 1) {
                        me.sprite2.texture = bugSpray21T; //Update texture
                    }
                    //If path 2 is tier 2
                    if(me.path2 === 2) {
                        me.sprite2.texture = bugSpray22T; //Update texture
                    }
                    //If path 2 is tier 3
                    if(me.path2 === 3) {
                        me.sprite2.texture = bugSpray23T; //Update texture
                    }
                    //If path 2 is tier 4
                    if(me.path2 === 4) {
                        me.sprite2.texture = bugSpray24T; //Update texture
                    }
                }
                //If magnifying glass tower
                if(type === 4) {
                    //If path 2 is tier 1
                    if(me.path2 === 1) {
                        me.sprite2.texture = magnifyingGlass11T; //Update texture
                    }
                    //If path 2 is tier 2
                    if(me.path2 === 2) {
                        me.sprite2.texture = magnifyingGlass12T; //Update texture
                    }
                    //If path 2 is tier 3
                    if(me.path2 === 3) {
                        me.sprite2.texture = magnifyingGlass13T; //Update texture
                    }
                    //If path 2 is tier 4
                    if(me.path2 === 4) {
                        me.sprite2.texture = magnifyingGlass14T; //Update texture
                    }
                }
                //If cannon tower
                if(type === 5) {
                    //If path 2 is tier 1
                    if(me.path2 === 1) {
                        me.sprite2.texture = cannon11T; //Update texture
                    }
                    //If path 2 is tier 2
                    if(me.path2 === 2) {
                        me.sprite2.texture = cannon12T; //Update texture
                    }
                    //If path 2 is tier 3
                    if(me.path2 === 3) {
                        me.sprite2.texture = cannon13T; //Update texture
                    }
                    //If path 2 is tier 4
                    if(me.path2 === 4) {
                        me.sprite2.texture = cannon14T; //Update texture
                    }
                }
                //If honey tower
                if(type === 6) {
                    //If path 2 is tier 1
                    if(me.path2 === 1) {
                        me.sprite2.texture = honey21T; //Update texture
                    }
                    //If path 2 is tier 2
                    if(me.path2 === 2) {
                        me.sprite2.texture = honey22T; //Update texture
                    }
                    //If path 2 is tier 3
                    if(me.path2 === 3) {
                        me.sprite2.texture = honey23T; //Update texture
                    }
                    //If path 2 is tier 4
                    if(me.path2 === 4) {
                        me.sprite2.texture = honey24T; //Update texture
                    }
                }
            }

            //If slingshot
            if(me.type === 1) {
                //If path 1 and can upgrade
                if(path === 1 && me.path1CanUpgrade) {
                    //If path1 tier 1
                    if (me.path1 === 1) {
                        player.gold -= slingShot11Cost; //User pays
                        me.range *= me.slingshotRangeMultiplier; //Increase range
                        me.currentPath1DescriptionText = "Path 1:\n+1 Range"; //Update current path description text
                        me.nextPath1Description = "Upgrade to:\n+2 Range\n("+slingShot12Cost+" gold)"; //Update next path tier description text
                        me.path1Cost = slingShot12Cost; //Update the next tier's cost
                    }
                    //If path 1 tier 2
                    if (me.path1 === 2) {
                        player.gold -= slingShot12Cost; //User pays
                        me.range *= me.slingshotRangeMultiplier; //Increase range
                        me.currentPath1DescriptionText = "Path 1:\n+2 Range"; //Update current path description text
                        me.nextPath1Description = "Upgrade to:\nCloaked Vision\n("+slingShot13Cost+" gold)"; //Update next path tier description text
                        me.path1Cost = slingShot13Cost; //Update the next tier's cost
                    }
                    //If path 1 tier 3
                    if (me.path1 === 3) {
                        player.gold -= slingShot13Cost; //User pays
                        me.hitCloaked = true; //Can hit cloaked ants
                        me.currentPath1DescriptionText = "Path 1:\n+2 Range\nCloaked Vision"; //Update current path description text
                        me.nextPath1Description = "Upgrade to:\n10 Damage\n("+slingShot14Cost+" gold)"; //Update next path tier description text
                        me.path1Cost = slingShot14Cost; //Update the next tier's cost
                    }
                    //If path 1 tier 4
                    if (me.path1 === 4) {
                        player.gold -= slingShot14Cost; //User pays
                        me.damage = 10; //Increase damage
                        me.currentPath1DescriptionText = "Path 1:\n+2 Range\nCloaked Vision\n10 Damage"; //Update current path description text
                        me.nextPath1Description = "Fully Upgraded"; //Update next path tier description text
                    }
                }
                if(path === 2 && me.path2CanUpgrade) {
                    //If path 2 tier 1
                    if (me.path2 === 1) {
                        player.gold -= slingShot21Cost; //User pays
                        me.shots = 2; //Can shoot 2 projectiles
                        me.currentPath2DescriptionText = "Path 2:\n2 Shots"; //Update current path description text
                        me.nextPath2Description = "Upgrade to:\n3 Shots\n("+slingShot22Cost+" gold)"; //Update next path tier description text
                        me.path2Cost = slingShot22Cost; //Update the next tier's cost
                    }
                    //If path 2 tier 2
                    if (me.path2 === 2) {
                        player.gold -= slingShot22Cost; //User pays
                        me.shots = 3; //Can shoot 3 projectiles
                        me.currentPath2DescriptionText = "Path 2:\n3 Shots"; //Update current path description text
                        me.nextPath2Description = "Upgrade to:\n4 Shots\n("+slingShot23Cost+" gold)"; //Update next path tier description text
                        me.path2Cost = slingShot23Cost; //Update the next tier's cost
                    }
                    //If path 2 tier 3
                    if (me.path2 === 3) {
                        player.gold -= slingShot23Cost; //User pays
                        me.shots = 4; //Can shoot 4 projectiles
                        me.currentPath2DescriptionText = "Path 2:\n4 Shots"; //Update current path description text
                        me.nextPath2Description = "Upgrade to:\n2 Damage\n("+slingShot24Cost+" gold)"; //Update next path tier description text
                        me.path2Cost = slingShot24Cost; //Update the next tier's cost
                    }
                    //If path 2 tier 4
                    if (me.path2 === 4) {
                        player.gold -= slingShot24Cost; //User pays
                        me.damage = 2; //Does 2 damage
                        me.currentPath2DescriptionText = "Path 2:\n4 Shots\n2 Damage"; //Update current path description text
                        me.nextPath2Description = "Fully Upgraded"; //Update next path tier description text
                    }
                }
            }
            //Follows same logic as above
            if(me.type === 2) {
                if(path ===1 && me.path1CanUpgrade) {
                    if (me.path1 === 1) {
                        player.gold -= hammer11Cost; //User pays
                        me.attackSpeed *= me.hammerSpeedMultiplier; //Update attack speed
                        me.currentPath1DescriptionText = "Path 1:\n+1 Attack Speed"; //Update current path description text
                        me.nextPath1Description = "Upgrade to:\n+2 Attack Speed\n(" + hammer12Cost + " gold)"; //Update next path tier description text
                        me.path1Cost = hammer12Cost; //Update the next tier's cost
                    }
                    if (me.path1 === 2) {
                        player.gold -= hammer12Cost; //User pays
                        me.attackSpeed *= me.hammerSpeedMultiplier; //Update attack speed
                        me.currentPath1DescriptionText = "Path 1:\n+2 Attack Speed"; //Update current path description text
                        me.nextPath1Description = "Upgrade to:\n3 Targets\n(" + hammer13Cost + " gold)"; //Update next path tier description text
                        me.path1Cost = hammer13Cost; //Update the next tier's cost
                    }
                    if (me.path1 === 3) {
                        player.gold -= hammer13Cost; //User pays
                        me.shots = 3; //Update shots
                        me.currentPath1DescriptionText = "Path 1:\n+2 Attack Speed\n3 Targets"; //Update current path description text
                        me.nextPath1Description = "Upgrade to:\n6 Targets\n(" + hammer14Cost + " gold)"; //Update next path tier description text
                        me.path1Cost = hammer14Cost; //Update the next tier's cost
                    }
                    if (me.path1 === 4) {
                        player.gold -= hammer14Cost; //User pays
                        me.shots = 6; //Update shots
                        me.currentPath1DescriptionText = "Path 1:\n+2 Attack Speed\n6 Targets"; //Update current path description text
                        me.nextPath1Description = "Fully Upgraded"; //Update next path tier description text
                    }
                }
                if(path === 2 && me.path2CanUpgrade) {
                    if (me.path2 === 1) {
                        player.gold -= hammer21Cost; //User pays
                        me.damage = 2; //Update damage
                        me.currentPath2DescriptionText = "Path 2:\n2 Damage"; //Update current path description text
                        me.nextPath2Description = "Upgrade to:\n3 Damage\n(" + hammer22Cost + " gold)"; //Update next path tier description text
                        me.path2Cost = hammer22Cost; //Update the next tier's cost
                    }
                    if (me.path2 === 2) {
                        player.gold -= hammer22Cost; //User pays
                        me.damage = 3; //Update damage
                        me.currentPath2DescriptionText = "Path 2:\n3 Damage"; //Update current path description text
                        me.nextPath2Description = "Upgrade to:\n6 Damage\n(" + hammer23Cost + " gold)"; //Update next path tier description text
                        me.path2Cost = hammer23Cost; //Update the next tier's cost
                    }
                    if (me.path2 === 3) {
                        player.gold -= hammer23Cost; //User pays
                        me.damage = 6; //Update damage
                        me.currentPath2DescriptionText = "Path 2:\n6 Damage"; //Update current path description text
                        me.nextPath2Description = "Upgrade to:\n12 Damage\n(" + hammer24Cost + " gold)"; //Update next path tier description text
                        me.path2Cost = hammer24Cost; //Update the next tier's cost
                    }
                    if (me.path2 === 4) {
                        player.gold -= hammer24Cost; //User pays
                        me.damage = 12; //Update damage
                        me.currentPath2DescriptionText = "Path 2:\n12 Damage"; //Update current path description text
                        me.nextPath2Description = "Fully Upgraded"; //Update next path tier description text
                    }
                }
            }
            //Follows same logic as above
            if(me.type === 3) {
                if(path ===1 && me.path1CanUpgrade) {
                    if (me.path1 === 1) {
                        player.gold -= bugSpray11Cost; //User pays
                        me.range *= me.bugSprayRangeMultiplier; //Update range
                        me.currentPath1DescriptionText = "Path 1:\n+1 Range"; //Update current path description text
                        me.nextPath1Description = "Upgrade to:\n+2 Range\n(" + bugSpray12Cost + " gold)"; //Update next path tier description text
                        me.path1Cost = bugSpray12Cost; //Update the next tier's cost
                    }
                    if (me.path1 === 2) {
                        player.gold -= bugSpray12Cost; //User pays
                        me.range *= me.bugSprayRangeMultiplier; //Update range
                        me.currentPath1DescriptionText = "Path 1:\n+2 Range"; //Update current path description text
                        me.nextPath1Description = "Upgrade to:\n2 Targets\n(" + bugSpray13Cost + " gold)"; //Update next path tier description text
                        me.path1Cost = bugSpray13Cost; //Update the next tier's cost
                    }
                    if (me.path1 === 3) {
                        player.gold -= bugSpray13Cost; //User pays
                        me.targets = 2; //Update targets
                        me.currentPath1DescriptionText = "Path 1:\n+2 Range\n2 Targets"; //Update current path description text
                        me.nextPath1Description = "Upgrade to:\n8 Damage\n(" + bugSpray14Cost + " gold)"; //Update next path tier description text
                        me.path1Cost = bugSpray14Cost; //Update the next tier's cost
                    }
                    if (me.path1 === 4) {
                        player.gold -= bugSpray14Cost; //User pays
                        me.damage = 8; //Update damage
                        me.currentPath1DescriptionText = "Path1 :\n+2 Range\n2 Targets\n8 Damage"; //Update current path description text
                        me.nextPath1Description = "Fully Upgraded"; //Update next path tier description text
                    }
                }
                if(path === 2 && me.path2CanUpgrade) {
                    if (me.path2 === 1) {
                        player.gold -= bugSpray21Cost; //User pays
                        me.attackSpeed *= me.bugSpraySpeedMultiplier; //Update attack speed
                        me.currentPath2DescriptionText = "Path 2:\n+1 Attack Speed"; //Update current path description text
                        me.nextPath2Description = "Upgrade to:\n+2 Attack Speed\n(" + bugSpray22Cost + " gold)"; //Update next path tier description text
                        me.path2Cost = bugSpray22Cost; //Update the next tier's cost
                    }
                    if (me.path2 === 2) {
                        player.gold -= bugSpray22Cost; //User pays
                        me.attackSpeed *= me.bugSpraySpeedMultiplier; //Update attack speed
                        me.currentPath2DescriptionText = "Path 2:\n+2 Attack Speed"; //Update current path description text
                        me.nextPath2Description = "Upgrade to:\n+3 Attack Speed\n(" + bugSpray23Cost + " gold)"; //Update next path tier description text
                        me.path2Cost = bugSpray23Cost; //Update the next tier's cost
                    }
                    if (me.path2 === 3) {
                        player.gold -= bugSpray23Cost; //User pays
                        me.attackSpeed *= me.bugSpraySpeedMultiplier; //Update attack speed
                        me.currentPath2DescriptionText = "Path 2:\n+3 Attack Speed"; //Update current path description text
                        me.nextPath2Description = "Upgrade to:\n360 Spray\n(" + bugSpray24Cost + " gold)"; //Update next path tier description text
                        me.path2Cost = bugSpray24Cost; //Update the next tier's cost
                    }
                    if (me.path2 === 4) {
                        player.gold -= bugSpray24Cost; //User pays
                        me.directions = 16; //Update directions
                        me.currentPath2DescriptionText = "Path 2:\n+3 Attack Speed\n360 Spray"; //Update current path description text
                        me.nextPath2Description = "Fully Upgraded"; //Update next path tier description text
                    }
                }
            }
            //Follows same logic as above
            if(me.type === 4) {
                if(path ===1 && me.path1CanUpgrade) {
                    if (me.path1 === 1) {
                        player.gold -= magnifyingGlass11Cost; //User pays
                        me.range *= me.magnifyingGlassRangeMultiplier; //Update range
                        me.currentPath1DescriptionText = "Path 1:\n+1 Range"; //Update current path description text
                        me.nextPath1Description = "Upgrade to:\n+2 Range\n(" + magnifyingGlass12Cost + " gold)"; //Update next path tier description text
                        me.path1Cost = magnifyingGlass12Cost; //Update the next tier's cost
                    }
                    if (me.path1 === 2) {
                        player.gold -= magnifyingGlass12Cost; //User pays
                        me.range *= me.magnifyingGlassRangeMultiplier; //Update range
                        me.currentPath1DescriptionText = "Path 1:\n+2 Range"; //Update current path description text
                        me.nextPath1Description = "Upgrade to:\n10 Damage\n(" + magnifyingGlass13Cost + " gold)"; //Update next path tier description text
                        me.path1Cost = magnifyingGlass13Cost; //Update the next tier's cost
                    }
                    if (me.path1 === 3) {
                        player.gold -= magnifyingGlass13Cost; //User pays
                        me.damage = 10; //Update damage
                        me.currentPath1DescriptionText = "Path 1:\n+2 Range\n10 Damage"; //Update current path description text
                        me.nextPath1Description = "Upgrade to:\n20 Damage\n(" + magnifyingGlass14Cost + " gold)"; //Update next path tier description text
                        me.path1Cost = magnifyingGlass14Cost; //Update the next tier's cost
                    }
                    if (me.path1 === 4) {
                        player.gold -= magnifyingGlass14Cost; //User pays
                        me.damage = 20; //Update damage
                        me.currentPath1DescriptionText = "Path 1:\n+2 Range\n20 Damage"; //Update current path description text
                        me.nextPath1Description = "Fully Upgraded"; //Update next path tier description text
                    }
                }
                if(path === 2 && me.path2CanUpgrade) {
                    if (me.path2 === 1) {
                        player.gold -= magnifyingGlass21Cost; //User pays
                        me.shots = 2; //Update shots
                        me.currentPath2DescriptionText = "Path 2:\n2 Shots"; //Update current path description text
                        me.nextPath2Description = "Upgrade to:\n3 Shots\n(" + magnifyingGlass22Cost + " gold)"; //Update next path tier description text
                        me.path2Cost = magnifyingGlass22Cost; //Update the next tier's cost
                    }
                    if (me.path2 === 2) {
                        player.gold -= magnifyingGlass22Cost; //User pays
                        me.shots = 3; //Update shots
                        me.currentPath2DescriptionText = "Path 2:\n3 Shots"; //Update current path description text
                        me.nextPath2Description = "Upgrade to:\n4 Shots\n(" + magnifyingGlass23Cost + " gold)"; //Update next path tier description text
                        me.path2Cost = magnifyingGlass23Cost; //Update the next tier's cost
                    }
                    if (me.path2 === 3) {
                        player.gold -= magnifyingGlass23Cost; //User pays
                        me.shots = 4; //Update shots
                        me.currentPath2DescriptionText = "Path 2:\n4 Shots"; //Update current path description text
                        me.nextPath2Description = "Upgrade to:\n6 Shots\n(" + magnifyingGlass24Cost + " gold)"; //Update next path tier description text
                        me.path2Cost = magnifyingGlass24Cost; //Update the next tier's cost
                    }
                    if (me.path2 === 4) {
                        player.gold -= magnifyingGlass24Cost; //User pays
                        me.shots = 6; //Update shots
                        me.currentPath2DescriptionText = "Path 2:\n6 Shots"; //Update current path description text
                        me.nextPath2Description = "Fully Upgraded"; //Update next path tier description text
                    }
                }
            }
            //Follows same logic as above
            if(me.type === 5) {
                if(path ===1 && me.path1CanUpgrade) {
                    if (me.path1 === 1) {
                        player.gold -= cannon11Cost; //User pays
                        me.range *= me.cannonRangeMultiplier; //Update range
                        me.currentPath1DescriptionText = "Path 1:\n+1 Range"; //Update current path description text
                        me.nextPath1Description = "Upgrade to:\n+2 Range\n(" + cannon12Cost + " gold)"; //Update next path tier description text
                        me.path1Cost = cannon12Cost; //Update the next tier's cost
                    }
                    if (me.path1 === 2) {
                        player.gold -= cannon12Cost; //User pays
                        me.range *= me.cannonRangeMultiplier; //Update range
                        me.currentPath1DescriptionText = "Path 1:\n+2 Range"; //Update current path description text
                        me.nextPath1Description = "Upgrade to:\n+1 Attack Speed\n(" + cannon13Cost + " gold)"; //Update next path tier description text
                        me.path1Cost = cannon13Cost; //Update the next tier's cost
                    }
                    if (me.path1 === 3) {
                        player.gold -= cannon13Cost; //User pays
                        me.attackSpeed *= me.cannonSpeedMultiplier; //Update attack speed
                        me.currentPath1DescriptionText = "Path 1:\n+2 Range\n+1 Attack Speed"; //Update current path description text
                        me.nextPath1Description = "Upgrade to:\n+2 Attack Speed\n(" + cannon14Cost + " gold)"; //Update next path tier description text
                        me.path1Cost = cannon14Cost; //Update the next tier's cost
                    }
                    if (me.path1 === 4) {
                        player.gold -= cannon14Cost; //User pays
                        me.attackSpeed *= me.cannonSpeedMultiplier; //Update attack speed
                        me.currentPath1DescriptionText = "Path 1:\n+2 Range\n+2 Attack Speed"; //Update current path description text
                        me.nextPath1Description = "Fully Upgraded"; //Update next path tier description text
                    }
                }
                if(path === 2 && me.path2CanUpgrade) {
                    if (me.path2 === 1) {
                        player.gold -= cannon21Cost; //User pays
                        me.damage = 2; //Update damage
                        me.currentPath2DescriptionText = "Path 2:\n2 Damage"; //Update current path description text
                        me.nextPath2Description = "Upgrade to:\n4 Damage\n(" + cannon22Cost + " gold)"; //Update next path tier description text
                        me.path2Cost = cannon22Cost; //Update the next tier's cost
                    }
                    if (me.path2 === 2) {
                        player.gold -= cannon22Cost; //User pays
                        me.damage = 4; //Update damage
                        me.currentPath2DescriptionText = "Path 2:\n4 Damage"; //Update current path description text
                        me.nextPath2Description = "Upgrade to:\n6 Damage\n(" + cannon23Cost + " gold)"; //Update next path tier description text
                        me.path2Cost = cannon23Cost; //Update the next tier's cost
                    }
                    if (me.path2 === 3) {
                        player.gold -= cannon23Cost; //User pays
                        me.damage = 6; //Update damage
                        me.currentPath2DescriptionText = "Path 2:\n6 Damage"; //Update current path description text
                        me.nextPath2Description = "Upgrade to:\n8 Damage\n(" + cannon24Cost + " gold)"; //Update next path tier description text
                        me.path2Cost = cannon24Cost; //Update the next tier's cost
                    }
                    if (me.path2 === 4) {
                        player.gold -= cannon24Cost; //User pays
                        me.damage = 8; //Update damage
                        me.currentPath2DescriptionText = "Path 2:\n8 Damage"; //Update current path description text
                        me.nextPath2Description = "Fully Upgraded"; //Update next path tier description text
                    }
                }
            }
            //Follows same logic as above
            if(me.type === 6) {
                if(path ===1 && me.path1CanUpgrade) {
                    if (me.path1 === 1) {
                        player.gold -= honey11Cost; //User pays
                        me.slowTime = 4000; //Update slow time
                        me.currentPath1DescriptionText = "Path 1:\n+1 Slow Time"; //Update current path description text
                        me.nextPath1Description = "Upgrade to:\n+2 Slow Time\n(" + honey12Cost + " gold)"; //Update next path tier description text
                        me.path1Cost = honey12Cost; //Update the next tier's cost
                    }
                    if (me.path1 === 2) {
                        player.gold -= honey12Cost; //User pays
                        me.slowTime = 5000; //Update slow time
                        me.currentPath1DescriptionText = "Path 1:\n+2 Slow Time"; //Update current path description text
                        me.nextPath1Description = "Upgrade to:\n+3 Slow Time\n(" + honey13Cost + " gold)"; //Update next path tier description text
                        me.path1Cost = honey13Cost; //Update the next tier's cost
                    }
                    if (me.path1 === 3) {
                        player.gold -= honey13Cost; //User pays
                        me.slowTime = 6000; //Update slow time
                        me.currentPath1DescriptionText = "Path 1:\n+3 Slow Time"; //Update current path description text
                        me.nextPath1Description = "Upgrade to:\n+4 Slow Time\n(" + honey14Cost + " gold)"; //Update next path tier description text
                        me.path1Cost = honey14Cost; //Update the next tier's cost
                    }
                    if (me.path1 === 4) {
                        player.gold -= honey14Cost; //User pays
                        me.slowtime = 7000; //Update slow time
                        me.currentPath1DescriptionText = "Path 1:\n+4 Slow Time"; //Update current path description text
                        me.nextPath1Description = "Fully Upgraded"; //Update next path tier description text
                    }
                }
                if(path === 2 && me.path2CanUpgrade) {
                    if (me.path2 === 1) {
                        player.gold -= honey21Cost; //User pays
                        me.slowAmount = 0.60; //Update slow amount
                        me.currentPath2DescriptionText = "Path 2:\n+1 Slow Amount"; //Update current path description text
                        me.nextPath2Description = "Upgrade to:\n+2 Slow Amount\n(" + honey22Cost + " gold)"; //Update next path tier description text
                        me.path2Cost = honey22Cost; //Update the next tier's cost
                    }
                    if (me.path2 === 2) {
                        player.gold -= honey22Cost; //User pays
                        me.slowamount = 0.40; //Update slow amount
                        me.currentPath2DescriptionText = "Path 2:\n+2 Slow Amount"; //Update current path description text
                        me.nextPath2Description = "Upgrade to:\n+3 Slow Amount\n(" + honey23Cost + " gold)"; //Update next path tier description text
                        me.path2Cost = honey23Cost; //Update the next tier's cost
                    }
                    if (me.path2 === 3) {
                        player.gold -= honey23Cost; //User pays
                        me.slowAmount = .20; //Update slow amount
                        me.currentPath2DescriptionText = "Path 2:\n+3 Slow Amount"; //Update current path description text
                        me.nextPath2Description = "Upgrade to:\nStop Ants\n(" + honey24Cost + " gold)"; //Update next path tier description text
                        me.path2Cost = honey24Cost; //Update the next tier's cost
                    }
                    if (me.path2 === 4) {
                        player.gold -= honey24Cost; //User pays
                        me.slowAmount = 0; //Update slow amount
                        me.currentPath2DescriptionText = "Path 2:\nStop Ants"; //Update current path description text
                        me.nextPath2Description = "Fully Upgraded"; //Update next path tier description text
                    }
                }
            }

            //Create modified string to be used for tooltip
            me.currentPath1DescriptionTextModified = me.currentPath1DescriptionText.replace("\n", " "); //Remove first line break and replace it with a space
            me.currentPath2DescriptionTextModified = me.currentPath2DescriptionText.replace("\n", " "); //Remove first line break and replace it with a space
            me.currentPath1DescriptionTextModified = me.currentPath1DescriptionTextModified.replace(/\n/g, ", "); //Remove subsequent line breaks and replace with a comma+space
            me.currentPath2DescriptionTextModified = me.currentPath2DescriptionTextModified.replace(/\n/g, ", "); //Remove subsequent line breaks and replace with a comma+space
        };

        //show() function - Shows the sprite
        me.show = function() {
            me.sprite1.visible = true; //Show sprite 1
            me.sprite2.visible = true; //Show sprite 2
            //If slingshot
            if(me.type === 1) {
                me.sprite3.visible = true; //Show sprite 3
            }
        };

        //hide() function - Hides the sprite
        me.hide = function() {
            me.sprite1.visible = false; //Hide sprite 1
            me.sprite2.visible = false; //Hide sprite 2
            //If slingshot
            if(me.type === 1) {
                me.sprite3.visible = false; //Hide sprite 3
            }
        };

        //setPosition(x, ,y) function - Accepts an x and y position and updates sprite's position
        me.setPosition = function(x, y) {
            me.x = x; //Capture x position
            me.y = y; //Capture y position
            me.sprite1.x = x; //Set sprite 1 x
            me.sprite1.y = y; //Set sprite 1 y
            me.sprite2.x = x; //Set sprite 2 x
            me.sprite2.y = y; //Set sprite 2 y
            //If slingshot
            if(me.type === 1) {
                me.sprite3.x = x; //Set sprite 3 x
                me.sprite3.y = y; //Set sprite 3 y
            }
        };

        //onClick() function - Performed when tower is selected
        function onClick() {
            for(let i = 0; i < towers.length; i++) {
                towers[i].hideRangeOverlay();
            }
            //If a tower is not placed, show the overlay if the user clicks on this already placed tower
            if(!towers[towers.length-1].placing) {
                me.showRangeOverlay();
            }
            //If the user is not currently placing a tower, allow them to select a placed tower
            if(towers[towers.length-1].placing === false) {
                currentTower = me; //Update current tower
                showInfoBar(); //Show the info bar
                updateInfoBar(); //Update the info bar

                //Hide info tower sprites
                selectedTowerSpriteArray["slingshot"].hide();
                selectedTowerSpriteArray["hammer"].hide();
                selectedTowerSpriteArray["bugSpray"].hide();
                selectedTowerSpriteArray["magnifyingGlass"].hide();
                selectedTowerSpriteArray["cannon"].hide();
                selectedTowerSpriteArray["honey"].hide();

                //If slingshot tower is clicked, show it
                if (me.type === 1) {
                    selectedTowerSpriteArray["slingshot"].show();

                }
                //If hammer tower is clicked, show it
                if (me.type === 2) {
                    selectedTowerSpriteArray["hammer"].show();
                }
                //If bug spray tower is clicked, show it
                if (me.type === 3) {
                    selectedTowerSpriteArray["bugSpray"].show();
                }
                //If magnifying glass tower is clicked, show it
                if (me.type === 4) {
                    selectedTowerSpriteArray["magnifyingGlass"].show();
                }
                //If cannon tower is clicked, show it
                if (me.type === 5) {
                    selectedTowerSpriteArray["cannon"].show();
                }
                //If honey tower is clicked, show it
                if (me.type === 6) {
                    selectedTowerSpriteArray["honey"].show();
                }

                //If the tower has been placed
                if (!me.placing) {
                    //If the tower is not already selected
                    if (!me.selected) {
                        //Iterate through all towers and unselect them all
                        for (let i = 0; i < towers.length; i++) {
                            towers[i].selected = false; //Unselect tower
                        }
                        me.selected = true; //Select tower
                    }
                }
            }
        }

        //When the user clicks on the tower (any sprite layer), select it and bring up the tower menu
        me.sprite1.on("pointertap", () => {
            onClick(); //Call onClick()
        });
        me.sprite2.on("pointertap", () => {
            onClick(); //Call onClick()
        });
        //If slingshot
        if(type === 1) {
            me.sprite3.on("pointertap", () => {
                onClick(); //Call onClick()
            });
        }

        //disable() function - Disables the sprite so it is no longer interactive or a button
        me.disable = function() {
            //Make tower interactive and a button so user can click it
            me.sprite1.interactive = false;
            me.sprite1.buttonMode = false;
            me.sprite2.interactive = false;
            me.sprite2.buttonMode = false;
            //If slingshot, do it for 3rd sprite
            if(me.type === 1) {
                me.sprite3.interactive = false;
                me.sprite3.buttonMode = false;
            }
        };

        //enable() function - Enables the sprite so it is interactive and a button
        me.enable = function() {
            //Make tower interactive and a button so user can click it
            me.sprite1.interactive = true;
            me.sprite1.buttonMode = true;
            me.sprite2.interactive = true;
            me.sprite2.buttonMode = true;
            //If slingshot, do it for 3rd sprite
            if(me.type === 1) {
                me.sprite3.interactive = true;
                me.sprite3.buttonMode = true;
            }
        };

        //updateRangeOverlay() function - Updates the position of the range overlay and position
        function updateRangeOverlay() {
            me.rangeOverlay.clear();
            me.rangeOverlay.beginFill(lightGreen); //Fill green
            me.rangeOverlay.drawCircle(0, 0, me.range);
        }

        //hideRangeOverlay() function - Hides the range overlay
        me.hideRangeOverlay = function() {
            me.rangeOverlay.visible = false; //Hide it
        };

        //showRangeOverlay() function - Shows the range overlay
        me.showRangeOverlay = function() {
            me.rangeOverlay.visible = true; //Show it
        };
    }
}