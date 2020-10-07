/*
* Author: Chad Cromwell
* Date: 2019-03-25
* Description: Projectile Sprite class, represents a projectile
* Functions:
*           Projectile(tower, target, paren=null) constructor - Accepts a tower, target (Ant object), and a parent container and creates a Projectile object
*           move() function - Moves ant based on orientation
*           update() function - Updates projectile
*/
class Projectile extends PIXI.Sprite {
    //Projectile(tower, target, paren=null) constructor - Accepts a tower, target (Ant object), and a parent container and creates a Projectile object
    constructor(tower, target, parent=null) {
        //If a slingshot tower
        if(tower.type === 1) {
            super(slingshotAmmo1T); //Super call to texture
        }

        //If a hammer tower
        if(tower.type === 2) {
            super(); //Empty super call because there is no projectile for the hammer
        }

        //If a Bug Spray tower
        if(tower.type === 3) {
            super(bugSprayAmmo1T); //Super call to texture
        }

        //If a magnifying glass tower
        if(tower.type === 4) {
            super(cannonAmmo5T); //Super call to texture
        }

        //If a cannon tower
        if(tower.type === 5) {
            super(cannonAmmo1T); //Super call to texture
        }

        //If a honey tower
        if(tower.type === 6) {
            super(honeyAmmo1T); //Super call to texture
        }

        const me = this; //This reference for pixi object

        //Variables
        me.tower = tower; //The tower that fired this projectile, used to account for kills
        me.range = tower.range; //The range the projectile can travel
        me.targets = tower.targets; //The number of targets the projectile can hit
        me.damage = tower.damage; //The amount of damage the projectile does
        me.damageType = tower.damageType; //The type of damage the projectile does
        me.hitArmored = tower.hitArmored; //If it can hurt armored ants
        me.x = tower.x; //The x position
        me.y = tower.y; //The y position
        me.startX = me.x; //The starting y position
        me.startY = me.y; //The starting x position
        me.init = true; //If the projectile needs to be initialized
        me.alive = true; //If the projectile is "alive" or not
        me.xSpeed = 0.001; //Projectile starting x speed
        me.ySpeed = 0.001; //Projectile starting y speed
        me.hits = 0; //Number of targets the projectile has hit
        me.speed = tower.projectileSpeed; //The speed in which the projectile can move
        me.hit = false; //If the projectile has hit the target
        me.aoe = tower.aoe; //The AOE radius
        me.slowAmount = tower.slowAmount; //The amount the projectile slows ants
        me.slowTime = tower.slowTime; //The amount of time the projectile slows ants
        me.path1 = tower.path1; //Path 1 upgrade tier
        me.path2 = tower.path2; //Path 2 upgrade tier
        me.canSlow = true; //If can slow ant or not
        me.slowTimer = 0; //Slow timer
        me.timer = 0; //Timer
        me.delay = 0; //Delay for when projectile is destroyed after hitting ant
        me.hitCloaked = tower.hitCloaked; //If it can hit a cloaked ant
        me.target = target; //The target
        me.targetReached = false; //If the target has been reached

        //If a slingshot tower
        if(tower.type === 1) {
            //If path 1 tier 2
            if(me.path1 === 2) {
                me.texture = slingshotAmmo2T; //Update texture
            }
            //If path 1 tier 3
            if(me.path1 === 3) {
                me.texture = slingshotFlame1T; //Update texture
            }
            //If path 1 tier 4
            if(me.path1 === 4) {
                me.texture = slingshotAmmo4T; //Update texture
            }
            //If path 2 tier 3
            if(me.path2 === 3) {
                me.texture = slingshotFlame2T; //Update texture
            }
            //If path 2 tier 4
            if(me.path2 === 4) {
                me.texture = slingshotFlame3T; //Update texture
            }
        }

        //If a bug spray tower
        if(tower.type === 3) {
            //If path 1 tier 1
            if(me.path1 === 1) {
                me.texture = bugSprayAmmo2T; //Update texture
            }
            //If path 1 tier 2
            if(me.path1 === 2) {
                me.texture = bugSprayAmmo3T; //Update texture
            }
            //If path 1 tier 3 or path 2 tier 3
            if(me.path1 === 3 || me.path2 === 3) {
                me.texture = bugSprayAmmo4T; //Update texture
            }
            //If path 1 tier 4 or path 2 tier 4
            if(me.path1 === 4 || me.path2 === 4) {
                me.texture = bugSprayAmmo5T; //Update texture
            }
        }

        //If a cannon tower
        if(tower.type === 5) {
            //If path 1 tier 1
            if(me.path1 === 1) {
                me.texture = cannonAmmo2T; //Update texture
            }
            //If path 1 tier 2
            if(me.path1 === 2) {
                me.texture = cannonAmmo3T; //Update texture
            }
            //If path 1 tier 3
            if(me.path1 === 3) {
                me.texture = cannonAmmo4T; //Update texture
            }
            //If path 1 tier 4
            if(me.path1 === 4) {
                me.texture = cannonAmmo5T; //Update texture
            }
        }

        //If a honey tower
        if(tower.type === 6) {
            //If path 1 tier 1
            if(me.path1 === 1) {
                me.texture = honeyAmmo2T; //Update texture
            }
            //If path 1 tier 2
            if(me.path1 === 2) {
                me.texture = honeyAmmo3T; //Update texture
            }
            //If path 1 tier 3
            if(me.path1 === 3) {
                me.texture = honeyAmmo4T; //Update texture
            }
            //If path 1 tier 4
            if(me.path1 === 4) {
                me.texture = honeyAmmo5T; //Update texture
            }
        }

        //If honey tower
        if(tower.type === 6) {
            me.alpha = .5; //Make transparent
        }

        //If target object is passed
        if(typeof me.target !== "string") {
            me.destX = me.target.x; //Set destination target x position
            me.destY = me.target.y; //Set destination target y position
        }

        //Otherwise, bug spray projectiles are to be generated
        //Shoot N
        else if (me.target === "1") {
            me.destX = me.x; //No x travel
            me.destY = me.y-me.range; //Full range y travel
            me.alpha = 0.5; //Alpha .5
        }
        //Shoot NE
        else if (me.target === "2") {
            me.destX = me.x+(me.range/2); //Half range x travel
            me.destY = me.y-(me.range/2); //Half range y travel
            me.alpha = 0.5; //Alpha .5
        }
        //Shoot E
        else if (me.target === "3") {
            me.destX = me.x+me.range; //Full range x travel
            me.destY = me.y; //No y travel
            me.alpha = 0.5; //Alpha .5
        }
        //Shoot SE
        else if (me.target === "4") {
            me.destX = me.x+(me.range/2); //Half range x travel
            me.destY = me.y+(me.range/2); //Half range y travel
            me.alpha = 0.5; //Alpha .5
        }
        //Shoot S
        else if (me.target === "5") {
            me.destX = me.x; //No x travel
            me.destY = me.y+me.range; //Full range y travel
            me.alpha = 0.5; //Alpha .5
        }
        //Shoot SW
        else if (me.target === "6") {
            me.destX = me.x-(me.range/2); //Half range x travel
            me.destY = me.y+(me.range/2); //Half range y travel
            me.alpha = 0.5; //Alpha .5
        }
        //Shoot W
        else if (me.target === "7") {
            me.destX = me.x-me.range; //Full range x travel
            me.destY = me.y; //No y travel
            me.alpha = 0.5; //Alpha .5
        }
        //Shoot NW
        else if (me.target === "8") {
            me.destX = me.x-(me.range/2); //Half range x travel
            me.destY = me.y-(me.range/2); //Half range y travel
            me.alpha = 0.5; //Alpha .5
        }
        //Shoot NNE
        else if (me.target === "9") {
            me.destX = me.x+(me.range/2); //Half range x travel
            me.destY = me.y-me.range; //Full range y travel
            me.alpha = 0.5; //Alpha .5
        }
        //Shoot ENE
        else if (me.target === "10") {
            me.destX = me.x+me.range; //Full range x travel
            me.destY = me.y-(me.range/2); //Half range y travel
            me.alpha = 0.5; //Alpha .5
        }
        //Shoot ESE
        else if (me.target === "11") {
            me.destX = me.x+me.range; //Full range x travel
            me.destY = me.y+(me.range/2); //Half range y travel
            me.alpha = 0.5; //Alpha .5
        }
        //Shoot SSE
        else if (me.target === "12") {
            me.destX = me.x+(me.range/2); //Half range x travel
            me.destY = me.y+(me.range); //Full range y travel
            me.alpha = 0.5; //Alpha .5
        }
        //Shoot SSW
        else if (me.target === "13") {
            me.destX = me.x-(me.range/2); //Half range x travel
            me.destY = me.y+(me.range); //Full range y travel
            me.alpha = 0.5; //Alpha .5
        }
        //Shoot WSW
        else if (me.target === "14") {
            me.destX = me.x-(me.range); //Full range x travel
            me.destY = me.y+(me.range/2); //Half range y travel
            me.alpha = 0.5; //Alpha .5
        }
        //Shoot WNW
        else if (me.target === "15") {
            me.destX = me.x-(me.range); //Full range x travel
            me.destY = me.y-(me.range/2); //Half range y travel
            me.alpha = 0.5; //Alpha .5
        }
        //Shoot NNW
        else if (me.target === "16") {
            me.destX = me.x-(me.range/2); //Half range x travel
            me.destY = me.y-(me.range); //Full range y travel
            me.alpha = 0.5; //Alpha .5
        }

        //If string passed, that means it's the bug spray tower and projectile needs to be rotated
        if(typeof me.target === "string") {
            me.p1 = {x: me.x, y: me.y}; //Origin pos
            me.p2 = {x: me.destX, y: me.destY}; //Destination pos
            me.orientation = Math.atan2(me.p2.y - me.p1.y, me.p2.x - me.p1.x) * 180 / Math.PI; //Get angle in degrees
            me.rot = rad(90+me.orientation); //Set rotation amount
            me.rotation = me.rot; //Rotate it
        }

        centerAnchor(me); //Center the anchor point of the sprite
        updateBoundaries(me); //Set boundary lines for collision detection

        //If parent argument is passed, add the child to the parent container
        if(parent) {
            parent.addChild(me); //Add the child to the parent container
        }

        //If target is an object
        if(typeof me.target !== "string") {
            //Calculate projectile velocity vector
            me.destination = intercept({x: me.target.x, y: me.target.y}, {x: (me.target.xSpeed), y: (me.target.ySpeed)}, {x: me.x, y: me.y}, me.speed); //Calculate future position of target
        }
        //Else, if it is bug spray
        else if (tower.type === 3){
            me.destination = {x: me.destX, y: me.destY}; //Always shoots, doesn't take into consideration if it can hit anything
        }
        //Else, don't shoot
        else {
            me.destination = null; //No destination
        }
        //If the projectile can intercept the target
        if(me.destination !== null) {
            me.xDiff = me.destination.x - me.x; //Calculate the x difference
            me.yDiff = me.destination.y - me.y; //Calculate the y difference
            me.pathLength = Math.sqrt(Math.pow(me.xDiff, 2) + Math.pow(me.yDiff, 2)); //Calculate the length of the path to target
            me.ratio = me.speed / me.pathLength; //Calculate time it would take to travel distance
            me.pathX = me.xDiff * me.ratio; //Calculate amount of x movement
            me.pathY = me.yDiff * me.ratio; //Calculate amount of y movement
            me.xSpeed += me.pathX; //Set xSpeed
            me.ySpeed += me.pathY; //Set ySpeed
        }
        //Else, the projectile cannot intercept the target
        else {
            me.alive = false; //Projectile can't intercept, so do not shoot
        }
        me.xTravelled = 0; //Set xTravelled to 0
        me.yTravelled = 0; //Set yTravelled to 0

        //move() function - Moves ant based on orientation
        function move() {
            me.x += me.xSpeed; //Increase x pos by xSpeed
            me.y += me.ySpeed; //Increase y pos by ySpeed
            me.xTravelled += me.xSpeed; //Update xTravelled
            me.yTravelled += me.ySpeed; //Update yTravelled
            updateBoundaries(me); //Update boundary lines for collision detection
        }

        //update() function - Updates projectile
        me.update = function() {
            //If slingshot, hammer, or magnifying glass and the target has been reached
            if(tower.type < 5 && tower.type !== 3 && me.targetReached && me.hits >= me.targets) {
                me.timer += app.ticker.elapsedMS*speedUp; //Increase timer
                //If the timer reached the delay
                if(me.timer >= me.delay) {
                    me.alive = false; //Kill the projectile
                }
            }
            //Else, if cannon, target reached, and delay met
            else if (tower.type === 5 && me.targetReached && me.timer >= me.delay) {
                me.alive = false; //Kill the projectile
            }
            //Else, if honey tower and slowTimer is reached
            else if (tower.type === 6 && me.slowTimer >= me.slowTime) {
                //Iterate through all ants
                for(let i = 0; i < ants.length; i++) {
                    ants[i].slowAmount = 1;
                }
                me.alive = false; //Kill the projectile
            }
            me.slowTimer += app.ticker.elapsedMS*speedUp; //Increment slowtimer
            //If alive
            if(me.alive) {
                me.visible = true; //Make visible
                move(); //Move it
                //If bug spray
                if(tower.type === 3) {
                    //If projectile has reached max range
                    if(distance(tower, me) > tower.range) {
                        me.alive = false; //Kill projectile
                    }
                }
                tower.frame1 = false; //Show frame 1 for tower animation
                //If slingshot
                if(tower.type === 1) {
                    //If the projectile can still hit more targets, hit them
                    if(me.hits < me.targets && me.target.active) {
                        me.target.hurt(me); //Hurt the ant
                        me.hits++; //Increment hits
                        player.slingshotPath1XP++;
                        player.slingshotPath2XP++;
                    }
                }
                //If hammer
                else if(tower.type === 2) {
                    //If the projectile can still hit more targets, hit them
                    if(me.hits < me.targets && me.target.active) {
                        me.target.hurt(me); //Hurt the ant
                        me.hits++; //Increment hits
                        player.hammerPath1XP++;
                        player.hammerPath2XP++;
                    }
                }
                //If bug spray
                else if(tower.type === 3) {
                    //Iterate through all ants
                    for(let i = 0; i < ants.length; i++) {
                        //If no collision
                        if(me.xMin > ants[i].xMax || me.xMax < ants[i].xMin || me.yMin > ants[i].yMax || me.yMax < ants[i].yMin) {
                        }
                        //If collision with ant
                        else {
                            //If the projectile can still hit more targets, hit them
                            if (me.hits < me.targets && ants[i].active && !ants[i].cloaked) {
                                ants[i].hurt(me); //Hurt the ant
                                me.hits++; //Increment hits
                                player.bugSprayPath1XP++;
                                player.bugSprayPath2XP++;
                            }
                            //If hit all targets
                            if (me.hits >= me.targets) {
                                me.alive = false; //Kill projectile
                            }
                        }
                    }
                }
                //If magnifying glass
                else if(tower.type === 4) {
                    //If the projectile can still hit more targets, hit them
                    if(me.hits < me.targets && me.target.active) {
                        me.target.hurt(me); //Hurt the ant
                        me.hits++; //Increment hits
                        player.magnifyingGlassPath1XP++;
                        player.magnifyingGlassPath2XP++;
                    }
                }
                //If the tower is a cannon tower, perform AOE
                else if(tower.type === 5) {
                    //Iterate through all ants
                    for(let i = 0; i < ants.length; i++) {
                        //If in range of the cannon ball AoE
                        if(inRange({x: target.x, y: target.y, range: me.aoe}, ants[i]) && ants[i].active) {
                            ants[i].hurt(me); //Hurt the ant
                            me.hits++; //Increment hits
                            player.cannonPath1XP++;
                            player.cannonPath2XP++;
                        }
                    }
                }
                //If honey
                else if(tower.type === 6) {
                    //Iterate through all ants
                    for(let i = 0; i < ants.length; i++) {
                        //If in range, slow
                        if (inRange({x: me.x, y: me.y, range: me.aoe}, ants[i]) && ants[i].active && ants[i].type !== 7) {
                            ants[i].slowAmount = me.slowAmount;
                            me.xSpeed = 0; //Stop it so it sits on the path
                            me.ySpeed = 0; //Stop it so it sits on the path
                            player.honeyPath1XP++;
                            player.honeyPath2XP++;
                        }
                    }
                }
                //If the projectile has reached the target, this is used instead of collision as the projectile moves too quick to be reliable for collision detection and subsequent removal
                if(Math.abs(me.xTravelled) >= Math.abs(me.xDiff) && Math.abs(me.yTravelled) >= Math.abs(me.yDiff)) {
                    me.targetReached = true; //Target is reached, the projectile will be removed
                }
            }
        }
    }
}