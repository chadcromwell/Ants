/*
* Author: Chad Cromwell
* Date: 2019-03-25
* Description: Ant Sprite class, represents an ant
* Functions:
*           Ant(type, wps, armored, regenerative, cloaked, parent=null) constructor - Accepts a type, waypoint array, armored boolean, regenerative boolean, cloaked boolean, parent container and creates an Ant object
*           regenerate() function - If the ant is regenerative, it regains 1HP every 2 seconds
*           breakArmor() function - Breaks the armor off the Ant and changes the sprite to reflect proper sprite below armor
*           hurt(projectile) function - Accepts a projectile and hurts the ant for the projectiles amount of damage it does. If ant is resistant, nothing happens. If ant is armored and not resistant, calls breakArmor()
*           setGPS(destX, destY) function - Accepts a destination x and y and sets the ant destination
*           GPS() function - Calculates orientation ant needs to face and the xSpeed and ySpeed needed to move to the next point - Called on all ants that reach a waypoint to send them to the next waypoint
*           move() function - Moves ant
*           kill() function - Kills the ant
*           attack() function - Attacks the windmill
*           update() function - Update the sprite
*/
class Ant extends PIXI.Sprite {

    //Ant(type, wps, armored, regenerative, cloaked, parent=null) constructor - Accepts a type, waypoint array, armored boolean, regenerative boolean, cloaked boolean, parent container and creates an Ant object
    constructor(type, wps, armored, regenerative, cloaked, parent=null) {

        //Assign ant texture based on type passed
        //If brown ant
        if(type === 1) {
            //If armored
            if(armored) {
                super(armoredAntSpriteT); //Call super to texture
            }
            //Else, if regenerative
            else if(regenerative) {
                super(rBrownAntSpriteT); //Call super to texture
            }
            //Else, it's normal
            else {
                //Super call for Sprite texture
                super(brownAntSpriteT); //Call super to texture
            }
        }
        //If blue ant
        else if(type === 2) {
            //If armored
            if(armored) {
                super(armoredAntSpriteT); //Call super to texture
            }
            //Else, if regenerative
            else if(regenerative) {
                super(rBlueAntSpriteT); //Call super to texture
            }
            //Else, it's normal
            else {
                //Super call for Sprite texture
                super(blueAntSpriteT); //Call super to texture
            }
        }
        //If green ant
        else if(type === 3) {
            //If armored
            if(armored) {
                super(armoredAntSpriteT); //Call super to texture
            }
            //Else, if regenerative
            else if(regenerative) {
                super(rGreenAntSpriteT); //Call super to texture
            }
            //Else, it's normal
            else {
                //Super call for Sprite texture
                super(greenAntSpriteT); //Call super to texture
            }
        }
        //If yellow ant
        else if(type === 4) {
            //If armored
            if(armored) {
                super(armoredAntSpriteT); //Call super to texture
            }
            //Else, if regenerative
            else if(regenerative) {
                super(rYellowAntSpriteT); //Call super to texture
            }
            //Else, it's normal
            else {
                //Super call for Sprite texture
                super(yellowAntSpriteT); //Call super to texture
            }
        }
        //If purple ant
        else if(type === 5) {
            //If armored
            if(armored) {
                super(armoredAntSpriteT); //Call super to texture
            }
            //Else, if regenerative
            else if(regenerative) {
                super(rPurpleAntSpriteT); //Call super to texture
            }
            //Else, it's normal
            else {
                //Super call for Sprite texture
                super(purpleAntSpriteT); //Call super to texture
            }
        }
        //If black ant
        else if(type === 6) {
            //If armored
            if(armored) {
                super(armoredAntSpriteT); //Call super to texture
            }
            //Else, if regenerative
            else if(regenerative) {
                super(rBlackAntSpriteT); //Call super to texture
            }
            //Else, it's normal
            else {
                //Super call for Sprite texture
                super(blackAntSpriteT); //Call super to texture
            }
        }
        //If white ant
        else if(type === 7) {
            //If armored
            if(armored) {
                super(armoredAntSpriteT); //Call super to texture
            }
            //Else, if regenerative
            else if(regenerative) {
                super(rWhiteAntSpriteT); //Call super to texture
            }
            //Else, it's normal
            else {
                //Super call for Sprite texture
                super(whiteAntSpriteT); //Call super to texture
            }
        }
        //If red ant
        else if(type === 8) {
            //If armored
            if(armored) {
                super(armoredAntSpriteT); //Call super to texture
            }
            //Else, if regenerative
            else if(regenerative) {
                super(rRedAntSpriteT); //Call super to texture
            }
            //Else, it's normal
            else {
                //Super call for Sprite texture
                super(redAntSpriteT); //Call super to texture
            }
        }
        //If beetle
        else if(type === 9) {
            //If armored
            if(armored) {
                super(armoredBeetleSpriteT); //Call super to texture
            }
            //Else, it's normal
            else {
                //Super call for Sprite texture
                super(beetleSpriteT); //Call super to texture
            }
        }
        //If green leaf
        else if(type === 10) {
            //Super call for Sprite texture
            super(greenLeafSpriteT); //Call super to texture
        }
        //If styrofoam cup
        else if(type === 11) {
            //Super call for Sprite texture
            super(styrofoamCupSpriteT); //Call super to texture
        }
        //If soda can
        else if(type === 12) {
            //Super call for Sprite texture
            super(sodaCanSpriteT); //Call super to texture
        }
        //If rock
        else if(type === 13) {
            //Super call for Sprite texture
            super(rockSpriteT); //Call super to texture
        }
        const me = this; //create local reference for this, needed when making classes in pixi.js
        me.resistance = "none"; //Set default resistance to none

        //If white ant
        if(type === 7) {
            me.resistance = "Honey"; //Resistant to honey
        }
        //If red ant
        else if(type === 8) {
            me.resistance = "Magnifying Glass"; //Resistant to magnifying glass
        }
        //If beetle
        else if(type === 9) {
            me.resistance = "Slingshot"; //Resistant to slingshot
        }

        //Set the size of the sprite
        //If not shielded set to 10% size
        if(type < 10) {
            me.width = me.width * .10;
            me.height = me.height * .10;
        }
        //If green leaf set to 20% size
        if(type === 10) {
            me.width = me.width*.20;
            me.height = me.height*.20;
        }
        //If styrofoam cup set 18% size
        if(type === 11) {
            me.width = me.width*.18;
            me.height = me.height*.18;
        }
        //If soda can set to 30% size
        if(type === 12) {
            me.width = me.width*.30;
            me.height = me.height*.30;
        }
        //If rock set to 50% size
        if(type === 13) {
            me.width = me.width*.50;
            me.height = me.height*.50;
        }

        centerAnchor(me); //Center the anchor for rotation

        //If parent argument is passed, add the child to the parent container
        if(parent) {
            parent.addChild(me); //Add the child to the parent container
        }

        //Integers
        me.type = type; //Type of ant
        me.x = wps[0][0]; //x position
        me.y = wps[0][1]; //y position
        me.wps = wps; //Capture waypoints array
        me.hp = 0; //Hit points
        me.totalHP; //Total hp
        me.sprite; //Sprite
        me.speed; //Max speed the ant can move
        me.originalSpeed; //Store original max speed of ant
        me.xSpeed = .001; //Speed ant moves in x direction
        me.ySpeed = .001; //Speed ant moves in y direction
        me.oldXSpeed; //Holds old xSpeed, used to restore speed after unslowed
        me.oldYSpeed; //Holds old ySpeed, used to restore speed after unslowed
        me.slowAmount = 1; //How much ant is slowed by honey
        me.xErr; //Amount of x error
        me.yErr; //Amount of y error
        me.damage; //Amount of damage the ant does to the tower
        me.brownAntDamage = 1; //Damage brown ant does
        me.blueAntDamage = 2; //Damage blue ant does
        me.greenAntDamage = 3; //Damage green ant does
        me.yellowAntDamage = 4; //Damage yellow ant does
        me.purpleAntDamage = 5; //Damage purple ant does
        me.blackAntDamage = 7; //Damage black ant does
        me.whiteAntDamage = 7; //Damage white ant does
        me.redAntDamage = 7; //Damage red ant does
        me.beetleDamage = 10; //Damage beetle does
        me.greenLeafDamage = 25; //Damage green leaf does
        me.styrofoamCupDamage = 150; //Damage styrofoam cup does
        me.sodaCanDamage = 300; //Damage soda can does
        me.rockDamage = 600; //Damage rock does
        me.wpsIndex = 2; //Used for wps iteration/assignment
        me.brownHPA = 20; //HP for brown armored ant
        me.brownHP = 1; //HP for brown ant
        me.blueHPA = 20; //HP for blue armored ant
        me.blueHP = 2; //HP for blue ant
        me.greenHPA = 20; //HP for green armored ant
        me.greenHP = 3; //HP for green ant
        me.yellowHPA = 20; //HP for yellow armored ant
        me.yellowHP = 4; //HP for yellow ant
        me.purpleHPA = 20; //HP for purple armored ant
        me.purpleHP = 5; //HP for purple ant
        me.blackHPA = 20; //HP for black armored ant
        me.blackHP = 6; //HP for black ant
        me.whiteHPA = 20; //HP for white armored ant
        me.whiteHP = 25; //HP for white ant
        me.redHPA = 20; //HP for red armored ant
        me.redHP = 25; //HP for red ant
        me.beetleHPA = 20; //HP for armored beetle
        me.beetleHP = 50; //HP for beetle
        me.greenLeafHP = 25; //HP for green leaf
        me.styrofoamCupHP = 150; //HP for styrofoam cup
        me.sodaCanHP = 300; //HP for soda can
        me.rockHP = 600; //HP for rock

        //Strings
        me.resistance = "none"; //Damage type it resists "Honey" "Magnifying Glass" or "Slingshot"

        //Booleans
        me.armored = armored; //If it is armored
        me.cloaked = cloaked; //If it is cloaked
        me.regenerative = regenerative; //If it is regenerative
        me.alive = true; //If it is alive
        me.stopped = false; //If ant is stopped in honey
        me.slowDown = false; //If ant needs to be slowed
        me.active = false; //If the ant is active or not
        me.visible = false; //If the ant is visible or not, start as invisible so it is only seen once it is active
        me.spawnAnts = true; //If it should spawn ants or not

        updateBoundaries(me); //Update ant boundaries

        //If the ant is cloaked
        if(cloaked) {
            me.alpha = .6; //Set alpha to 50%
        }
        else {
            me.alpha = 1; //Set alpha to 100%
        }

        //Normal Ants
        //If type 1 (Brown)
        if (me.type === 1) {
            me.speed = 1; //Set speed
            me.originalSpeed = me.speed; //Capture original speed
            //If armored
            if(me.armored) {
                me.sprite = armoredAntSprite; //Set sprite
                me.hp = me.brownHPA; //Set hp
                me.totalHP = me.hp; //Capture total HP
            }
            //If regenerative
            else if(regenerative) {
                me.sprite = rBrownAntSprite; //Set sprite
                me.hp = me.brownHP; //Set hp
                me.totalHP = me.hp; //Capture total HP
            }
            //Else, normal ant
            else {
                me.sprite = brownAntSprite; //Set sprite
                me.hp = me.brownHP; //Set hp
                me.totalHP = me.hp; //Capture totalHP
            }
            me.damage = me.brownAntDamage; //Set damage
        }

        //If type 2 (Blue) - Same logic as above
        if (me.type === 2) {
            me.speed = 2;
            me.originalSpeed = me.speed;
            if(me.armored) {
                me.sprite = armoredAntSprite;
                me.hp = me.blueHPA;
                me.totalHP = me.hp;
            }
            else if(regenerative) {
                me.sprite = rBlueAntSprite;
                me.hp = me.blueHP;
                me.totalHP = me.hp;
            }
            else {
                me.sprite = blueAntSprite;
                me.hp = me.blueHP;
                me.totalHP = me.hp;
            }
            me.damage = me.blueAntDamage; //Set damage
        }

        //If type 3 (Green) - Same logic as above
        if (me.type === 3) {
            me.speed = 3;
            me.originalSpeed = me.speed;
            if(me.armored) {
                me.sprite = armoredAntSprite;
                me.hp = me.greenHPA;
                me.totalHP = me.hp;
            }
            else if(regenerative) {
                me.sprite = rGreenAntSprite;
                me.hp = me.greenHP;
                me.totalHP = me.hp;
            }
            else {
                me.sprite = greenAntSprite;
                me.hp = me.greenHP;
                me.totalHP = me.hp;
            }
            me.damage = me.greenAntDamage; //Set damage
        }

        //If type 4 (Yellow) - Same logic as above
        if (me.type === 4) {
            me.speed = 4;
            me.originalSpeed = me.speed;
            if(me.armored) {
                me.sprite = armoredAntSprite;
                me.hp = me.yellowHPA;
                me.totalHP = me.hp;
            }
            else if(regenerative) {
                me.sprite =rYellowAntSprite;
                me.hp = me.yellowHP;
                me.totalHP = me.hp;
            }
            else {
                me.sprite = yellowAntSprite;
                me.hp = me.yellowHP;
                me.totalHP = me.hp;
            }
            me.damage = me.yellowAntDamage; //Set damage
        }

        //If type 5 (Purple) - Same logic as above
        if (me.type === 5) {
            me.speed = 5;
            me.originalSpeed = me.speed;
            if(me.armored) {
                me.sprite = armoredAntSprite;
                me.hp = me.purpleHPA;
                me.totalHP = me.hp;
            }
            else if(regenerative) {
                me.sprite = rPurpleAntSprite;
                me.hp = me.purpleHP;
                me.totalHP = me.hp;
            }
            else {
                me.sprite = purpleAntSprite;
                me.hp = me.purpleHP;
                me.totalHP = me.hp;
            }
            me.damage = me.purpleAntDamage; //Set damage
        }

        //If type 6 (Black) - Same logic as above
        if (me.type === 6) {
            me.speed = 6;
            me.originalSpeed = me.speed;
            if(me.armored) {
                me.sprite = armoredAntSprite;
                me.hp = me.blackHPA;
                me.totalHP = me.hp;
            }
            else if(regenerative) {
                me.sprite = rBlackAntSprite;
                me.hp = me.blackHP;
                me.totalHP = me.hp;
            }
            else {
                me.sprite = blackAntSprite;
                me.hp = me.blackHP;
                me.totalHP = me.hp;
            }
            me.damage = me.blackAntDamage; //Set damage
        }

        //Strong Ants
        //If type 7 (White - Honey Resistant) - Same logic as above
        if (me.type === 7) {
            me.speed = 6;
            me.originalSpeed = me.speed;
            if(me.armored) {
                me.sprite = armoredAntSprite;
                me.hp = me.whiteHPA;
                me.totalHP = me.hp;
            }
            else if(regenerative) {
                me.sprite = rWhiteAntSprite;
                me.hp = me.whiteHP;
                me.totalHP = me.hp;
            }
            else {
                me.sprite = whiteAntSprite;
                me.hp = me.whiteHP;
                me.totalHP = me.hp;
            }
            me.resistance = "Honey"; //Set resistance
            me.damage = me.whiteAntDamage; //Set damage
        }

        //If type 8 (Red - Magnifying Glass Resistant) - Same logic as above
        if (me.type === 8) {
            me.speed = 6;
            me.originalSpeed = me.speed;
            if(me.armored) {
                me.sprite = armoredAntSprite;
                me.hp = me.redHPA;
                me.totalHP = me.hp;
            }
            else if(regenerative) {
                me.sprite = rRedAntSprite;
                me.hp = me.redHP;
                me.totalHP = me.hp;
            }
            else {
                me.sprite = redAntSprite;
                me.hp = me.redHP;
                me.totalHP = me.hp;
            }
            me.resistance = "Magnifying Glass";
            me.damage = me.redAntDamage; //Set damage
        }

        //If type 9 (Beetle - Slingshot Resistant) - Same logic as above
        if (me.type === 9) {
            me.speed = 6;
            me.originalSpeed = me.speed;
            if(me.armored) {
                me.sprite = armoredBeetleSprite;
                me.hp = me.beetleHPA;
                me.totalHP = me.hp;
            }
            else {
                me.sprite = beetleSprite;
                me.hp = me.beetleHP;
                me.totalHP = me.hp;
            }
            me.resistance = "Slingshot";
            me.damage = me.beetleDamage; //Set damage
        }

        //Shielded Ants
        //If type 10 (Green Leaf) - Same logic as above
        if (me.type === 10) {
            me.speed = 3;
            me.originalSpeed = me.speed;
            me.sprite = greenLeafSprite;
            me.hp = me.greenLeafHP;
            me.totalHP = me.hp;
            me.damage = me.greenLeafDamage; //Set damage
        }

        //If type 11 (Styrofoam Cup) - Same logic as above
        if (me.type === 11) {
            me.speed = 3;
            me.originalSpeed = me.speed;
            me.sprite = styrofoamCupSprite;
            me.hp = me.styrofoamCupHP;
            me.totalHP = me.hp;
            me.damage = me.styrofoamCupDamage; //Set damage
        }

        //If type 12 (Soda Can) - Same logic as above
        if (me.type === 12) {
            me.speed = 2;
            me.originalSpeed = me.speed;
            me.sprite = sodaCanSprite;
            me.hp = me.sodaCanHP;
            me.totalHP = me.hp;
            me.damage = me.sodaCanDamage; //Set damage
        }

        //If type 13 (Rock) - Same logic as above
        if (me.type === 13) {
            me.speed = 1;
            me.originalSpeed = me.speed;
            me.sprite = rockSprite;
            me.hp = me.rockHP;
            me.totalHP = me.hp;
            me.damage = me.rockDamage; //Set damage
        }

        //regenerate() function - If the ant is regenerative, it regains 1HP every 2 seconds
        me.regenerate = function() {
            //If the ant is not armored and is regenerative and has hp left to regenerate
            if(!me.armored && me.regenerative && me.hp < me.totalHP) {
                me.hp += 2; //Increment hp
                //If hp goes over totalHP
                if(me.hp > me.totalHP) {
                    me.hp = me.totalHP; //Set to max HP
                }
                //If brown through black ant and hp is 1
                if(me.type <= 6 && me.hp === 1) {
                    me.texture = rBrownAntSpriteT; //Make it brown
                    me.speed = 1; //Set speed
                }

                //If brown through black and hp is 2
                if(me.type <= 6 && me.hp === 2) {
                    me.texture = rBlueAntSpriteT; //Make it blue
                    me.speed = 2; //Set speed
                }

                //If brown through black and hp is 3
                if(me.type <= 6 && me.hp === 3) {
                    me.texture = rGreenAntSpriteT; //Make it green
                    me.speed = 3; //Set speed
                }

                //If brown through black and hp is 4
                if(me.type <= 6 && me.hp === 4) {
                    me.texture = rYellowAntSpriteT; //Make it yellow
                    me.speed = 4; //Set speed
                }

                //If brown through black and hp is 5
                if(me.type <= 6 && me.hp === 5) {
                    me.texture = rPurpleAntSpriteT; //Make it purple
                    me.speed = 5; //Set speed
                }

                //If brown through black and hp is 6
                if(me.type <= 6 && me.hp === 6) {
                    me.texture = rBlackAntSpriteT; //Make it black
                    me.speed = 6; //Set speed
                }
            }
        };

        //breakArmor() function - Breaks the armor off the Ant and changes the sprite to reflect proper sprite below armor
        me.breakArmor = function() {
            //If brown ant and armored
            if (me.type === 1 && me.armored) {
                me.texture = brownAntSpriteT; //Update texture
                me.hp = me.brownHP; //Update hp
                me.totalHP = me.hp; //Update totalHP
            }
            //If blue ant and armored - Follows same logic as above
            else if (me.type === 2 && me.armored) {
                me.texture = blueAntSpriteT;
                me.hp = me.blueHP; //Update hp
                me.totalHP = me.hp;
            }
            //If green ant and armored - Follows same logic as above
            else if (me.type === 3 && me.armored) {
                me.texture = greenAntSpriteT;
                me.hp = me.greenHP; //Update hp
                me.totalHP = me.hp;
            }
            //If yellow ant and armored - Follows same logic as above
            else if (me.type === 4 && me.armored) {
                me.texture = yellowAntSpriteT;
                me.hp = me.yellowHP; //Update hp
                me.totalHP = me.hp;
            }
            //If purple ant and armored - Follows same logic as above
            else if (me.type === 5 && me.armored) {
                me.texture = purpleAntSpriteT;
                me.hp = me.purpleHP; //Update hp
                me.totalHP = me.hp;
            }
            //If black ant and armored - Follows same logic as above
            else if (me.type === 6 && me.armored) {
                me.texture = blackAntSpriteT;
                me.hp = me.blackHP; //Update hp
                me.totalHP = me.hp;
            }
            //If white ant and armored - Follows same logic as above
            else if (me.type === 7 && me.armored) {
                me.texture = whiteAntSpriteT;
                me.hp = me.whiteHP; //Update hp
                me.totalHP = me.hp;
            }
            //If red ant and armored - Follows same logic as above
            else if (me.type === 8 && me.armored) {
                me.texture = redAntSpriteT;
                me.hp = me.redHP; //Update hp
                me.totalHP = me.hp;
            }
            //If beetle and armored - Follows same logic as above
            else if (me.type === 9 && me.armored) {
                me.texture = beetleSpriteT;
                me.hp = me.beetleHP; //Update hp
                me.totalHP = me.hp;
            }
            me.armored = false; //No longer armored
        };

        //hurt(projectile) function - Accepts a projectile and hurts the ant for the projectiles amount of damage it does. If ant is resistant, nothing happens. If ant is armored and not resistant, calls breakArmor()
        me.hurt = function(projectile) {
            //If the ant is armored, and the projectile can't hurt an armored ant
            if (me.armored && !projectile.hitArmored) {
                playDeflectSound(); //Play the deflect sound
            }
            //Else, the projectile can hurt an armored ant so play the hit sound
            else {
                playHitSound(); //Play the hit sound
            }

            //If ant is not resistant to the type of damage
            if (projectile.damageType !== me.resistance) {
                //If the ant is not armoured, or if the ant is armoured and the projectile can hit armoured ants
                if(!me.armored || me.armored && projectile.hitArmored) {
                    if(me.hp === 1) {
                        projectile.tower.kills++;
                    }
                    me.hp -= projectile.damage; //Lower hp by damage amount
                }
            }

            //If the ant is not armoured
            if (!me.armored) {
                //If normal ant reaches 1 hp
                if (me.type <= 6 && me.hp === 1) {
                    //If regenerative
                    if (me.regenerative) {
                        me.texture = rBrownAntSpriteT; //Set to brown regenerative texture
                    }
                    //Else,
                    else {
                        me.texture = brownAntSpriteT; //Set to brown texture
                    }
                    me.speed = 1; //Update speed
                    me.damage = me.brownAntDamage; //Update damage
                }

                //Follows same logic as above
                if (me.type <= 6 && me.hp === 2) {
                    if (me.regenerative) {
                        me.texture = rBlueAntSpriteT;
                    } else {
                        me.texture = blueAntSpriteT;
                    }
                    me.speed = 2;
                    me.damage = me.blueAntDamage;
                }

                //Follows same logic as above
                if (me.type <= 6 && me.hp === 3) {
                    if (me.regenerative) {
                        me.texture = rGreenAntSpriteT;
                    } else {
                        me.texture = greenAntSpriteT;
                    }
                    me.speed = 3;
                    me.damage = me.greenAntDamage;
                }

                //Follows same logic as above
                if (me.type <= 6 && me.hp === 4) {
                    if (me.regenerative) {
                        me.texture = rYellowAntSpriteT;
                    } else {
                        me.texture = yellowAntSpriteT;
                    }
                    me.speed = 4;
                    me.damage = me.yellowAntDamage;
                }

                //Follows same logic as above
                if (me.type <= 6 && me.hp === 5) {
                    if (me.regenerative) {
                        me.texture = rPurpleAntSpriteT;
                    } else {
                        me.texture = purpleAntSpriteT;
                    }
                    me.speed = 5;
                    me.damage = me.purpleAntDamage;
                }

                //Follows same logic as above
                if (me.type <= 6 && me.hp === 6) {
                    if (me.regenerative) {
                        me.texture = rBlackAntSpriteT;
                    } else {
                        me.texture = blackAntSpriteT;
                    }
                    me.speed = 6;
                    me.damage = me.blackAntDamage;
                }
            }

            //If the ant is armored, all armor hp are gone, and not resistant to type of damage, calls breakArmor() to remove armor
            if(me.hp <= 0 && me.armored && projectile.damageType !== me.resistance) {
                me.breakArmor(); //Call breakArmor()
            }

            //If shielded ant and hp falls below 0
            if(me.hp <= 0 && me.type >= 10 && me.type <= 13) {
                //If green leaf
                if(me.type === 10 && me.spawnAnts) {
                    let tempWPS = []; //Create temporary array of waypoints, holds wps that are left for the green leaf
                    tempWPS.push([[me.x],[me.y]]); //Push the green leaf's current position as the first wps in the array
                    //Iterate through all waypoints left in wps array
                    for(let i = me.wpsIndex-2; i < me.wps.length; i++) {
                        tempWPS.push(wps[i]); //Push the element into the tempWPS array
                    }

                    //Create new black ant
                    let newAnt = new Ant(6, tempWPS, false, false, false, waveContainer);
                    newAnt.setGPS(tempWPS[0][0], tempWPS[0][1]); //Set GPS
                    newAnt.x = me.x; //Set x position
                    newAnt.y = me.y; //Set y position
                    ants.unshift(newAnt); //Push to front of ants array

                    //Create new black ant
                    newAnt = new Ant(6, tempWPS, false, false, false, waveContainer);
                    newAnt.setGPS(tempWPS[0][0], tempWPS[0][1]); //Set GPS
                    newAnt.x = me.x; //Set x position
                    newAnt.y = me.y; //Set y position
                    ants.unshift(newAnt); //Push to front of ants array
                    antsLength += 2; //Update antsLength to reflect two new ants added
                    me.kill(); //Kill the green leaf
                    me.spawnAnts = false; //Do not spawn any more ants
                }

                //If styrofoam cup
                if(me.type === 11 && me.spawnAnts) {
                    let tempWPS = []; //Create temporary array of waypoints, holds wps that are left for the styrofoam cup
                    tempWPS.push([[me.x],[me.y]]); //Push the styrofoam cup's current position as the first wps in the array
                    //Iterate through all waypoints left in wps array
                    for(let i = me.wpsIndex-2; i < me.wps.length; i++) {
                        tempWPS.push(wps[i]); //Push the element into the tempWPS array
                    }

                    //Create new green leaf
                    let newAnt = new Ant(10, tempWPS, false, false, false, waveContainer);
                    newAnt.setGPS(tempWPS[0][0], tempWPS[0][1]); //Set GPS
                    newAnt.x = me.x; //Set x position
                    newAnt.y = me.y; //Set y position
                    ants.unshift(newAnt); //Push to front of ants array

                    //Create new green leaf
                    newAnt = new Ant(10, tempWPS, false, false, false, waveContainer);
                    newAnt.setGPS(tempWPS[0][0], tempWPS[0][1]); //Set GPS
                    newAnt.x = me.x; //Set x position
                    newAnt.y = me.y; //Set y position
                    ants.unshift(newAnt); //Push to front of ants array
                    antsLength += 2; //Update antsLength to reflect two new ants added
                    me.kill(); //Kill the styrofoam cup
                    me.spawnAnts = false; //Do not spawn any more ants
                }

                //If soda can
                if(me.type === 12 && me.spawnAnts) {
                    let tempWPS = []; //Create temporary array of waypoints, holds wps that are left for the soda can
                    tempWPS.push([[me.x],[me.y]]); //Push the soda can's current position as the first wps in the array
                    //Iterate through all waypoints left in wps array
                    for(let i = me.wpsIndex-2; i < me.wps.length; i++) {
                        tempWPS.push(wps[i]); //Push the element into the tempWPS array
                    }

                    //Create new styrofoam cup
                    let newAnt = new Ant(11, tempWPS, false, false, false, waveContainer);
                    newAnt.setGPS(tempWPS[0][0], tempWPS[0][1]); //Set GPS
                    newAnt.x = me.x; //Set x position
                    newAnt.y = me.y; //Set y position
                    ants.unshift(newAnt); //Push to front of ants array

                    //Create new styrofoam cup
                    newAnt = new Ant(11, tempWPS, false, false, false, waveContainer);
                    newAnt.setGPS(tempWPS[0][0], tempWPS[0][1]); //Set GPS
                    newAnt.x = me.x; //Set x position
                    newAnt.y = me.y; //Set y position
                    ants.unshift(newAnt); //Push to front of ants array
                    antsLength += 2; //Update antsLength to reflect two new ants added
                    me.kill(); //Kill the soda can
                    me.spawnAnts = false; //Do not spawn any more ants
                }

                //If rock
                if(me.type === 13 && me.spawnAnts) {
                    let tempWPS = []; //Create temporary array of waypoints, holds wps that are left for the rock
                    tempWPS.push([[me.x],[me.y]]); //Push the rock's current position as the first wps in the array
                    //Iterate through all waypoints left in wps array
                    for(let i = me.wpsIndex-2; i < me.wps.length; i++) {
                        tempWPS.push(wps[i]); //Push the element into the tempWPS array
                    }

                    //Create new soda can
                    let newAnt = new Ant(12, tempWPS, false, false, false, waveContainer);
                    newAnt.setGPS(tempWPS[0][0], tempWPS[0][1]); //Set GPS
                    newAnt.x = me.x; //Set x position
                    newAnt.y = me.y; //Set y position
                    ants.unshift(newAnt); //Push to front of ants array

                    //Create new soda can
                    newAnt = new Ant(12, tempWPS, false, false, false, waveContainer);
                    newAnt.setGPS(tempWPS[0][0], tempWPS[0][1]); //Set GPS
                    newAnt.x = me.x; //Set x position
                    newAnt.y = me.y; //Set y position
                    ants.unshift(newAnt); //Push to front of ants array

                    //Create new soda can
                    newAnt = new Ant(12, tempWPS, false, false, false, waveContainer);
                    newAnt.setGPS(tempWPS[0][0], tempWPS[0][1]); //Set GPS
                    newAnt.x = me.x; //Set x position
                    newAnt.y = me.y; //Set y position
                    ants.unshift(newAnt); //Push to front of ants array

                    //Create new soda can
                    newAnt = new Ant(12, tempWPS, false, false, false, waveContainer);
                    newAnt.setGPS(tempWPS[0][0], tempWPS[0][1]); //Set GPS
                    newAnt.x = me.x; //Set x position
                    newAnt.y = me.y; //Set y position
                    ants.unshift(newAnt); //Push to front of ants array
                    antsLength += 4; //Update antsLength to reflect two new ants added
                    me.kill(); //Kill the rock
                    me.spawnAnts = false; //Do not spawn any more ants
                }
            }

            //If the ant is not armored and lowered to 0 or less HP, it is dead
            if (!me.armored && me.hp <= 0) {
                me.kill(); //Kill the ant
            }

            //Recalculate new speed for change in ant
            me.xSpeed = 0; //Clear xSpeed
            me.ySpeed = 0; //Clear ySpeed

            //Declare points
            me.p1 = {x: me.x, y: me.y};
            me.p2 = {x: me.destX, y: me.destY};

            //Get angle in degrees
            me.orientation = Math.atan2(me.p2.y - me.p1.y, me.p2.x - me.p1.x) * 180 / Math.PI; //Calculate orientation
            rotate(me, rad(90+me.orientation)); //Rotate the ant
            me.bearing = rad(90+me.orientation); //bearing, copy of orientation to not ruin x,y movements
            me.rot = me.bearing; //rot, copy of bearing, used to store amount ant has rotated
            me.xDiff = me.destX-me.x; //Set xDiff
            me.yDiff = me.destY-me.y; //Set yDiff
            me.pathLength = Math.sqrt(Math.pow(me.xDiff,2)+Math.pow(me.yDiff,2)); //Set path length
            me.ratio = me.speed/me.pathLength; //Calculate ratio of speed for
            me.pathX = me.xDiff*me.ratio; //Calculate pathX movement speed
            me.pathY = me.yDiff*me.ratio; //Calculate pathY movement speed
            me.xSpeed += me.pathX; //Increase xSpeed
            me.ySpeed += me.pathY; //Increase ySpeed
        };

        //setGPS(destX, destY) function - Accepts a destination x and y and sets the ant destination
        me.setGPS = function(destX, destY) {
            me.destX = destX; //Capture destX
            me.destY = destY; //Capture destY
            me.init = true; //Initialize
            me.reachedDestination = false; //Haven't reached destination yet
        };

        //Calculate total distance ant must travel
        me.wpsCount = 0; //Holds total distance for waypoints
        me.wpsX = 0; //Waypoint x position
        me.wpsY = 0; //Waypoint y position
        me.distanceTravelled = 0; //Keeps track of distance the ant has travelled, used to determine which ant is in front or back
        //Iterate through all waypoints
        for(let i = 0; i < me.wps.length-1; i++) {
            me.wpsCount += (me.wps[i][0] + me.wps[i][1]); //Increment the wpsCount
            me.wpsX += Math.abs((Math.abs(me.wps[i+1][0])-Math.abs(me.wps[i][0]))); //Calculate distance travelled in x
            me.wpsY += Math.abs((Math.abs(me.wps[i+1][1])-Math.abs(me.wps[i][1]))); //Calculate distance travelled in y
        }
        me.distanceTravelled = (me.wpsX+me.wpsY); //Calculate total distance traveled

        //GPS() function - Calculates orientation ant needs to face and the xSpeed and ySpeed needed to move to the next point - Called on all ants that reach a waypoint to send them to the next waypoint
        me.GPS = function() {
            //If wp is reached
            if(me.x >= me.destX-10 && me.x <= me.destX+10 && me.y >= me.destY-10 && me.y <= me.destY+10) {
                me.reachedDestination = true; //Reached destination
                me.xSpeed = 0.001; //"stop" it
                me.ySpeed = 0.001; //"stop" it
                me.xErr = me.destX-me.x; //Update x error
                me.yErr = me.destY-me.y; //Update y error
                me.wpsCount -= me.xErr+me.yErr; //Lower wpsCount
                me.setGPS(me.wps[me.wpsIndex][0]-me.xErr, me.wps[me.wpsIndex][1]-me.yErr); //Set new waypoint
                //If there's still waypoints to go
                if(me.wpsIndex < me.wps.length-1) {
                    me.wpsIndex++; //Increment i
                }
                //Else, at the end of the path and can hit the windmill
                else {
                    me.attack(); //Attack windmill
                    me.alive = false; //Kill ant
                }
            }
            //If not at destination
            if(!me.reachedDestination) {
                //Declare points
                me.p1 = {x: me.x, y: me.y};
                me.p2 = {x: me.destX, y: me.destY};

                //If need to initialize rotation
                if(me.init) {
                    //Get angle in degrees
                    me.orientation = Math.atan2(me.p2.y - me.p1.y, me.p2.x - me.p1.x) * 180 / Math.PI; //Calculate orientation
                    rotate(me, rad(90+me.orientation)); //Rotate the ant
                    me.bearing = rad(90+me.orientation); //bearing, copy of orientation to not ruin x,y movements
                    me.rot = me.bearing; //rot, copy of bearing, used to store amount ant has rotated
                    me.xDiff = me.destX-me.x; //Set xDiff
                    me.yDiff = me.destY-me.y; //Set yDiff
                    me.pathLength = Math.sqrt(Math.pow(me.xDiff,2)+Math.pow(me.yDiff,2)); //Set path length
                    me.ratio = me.speed/me.pathLength; //Calculate ratio of speed for
                    me.pathX = me.xDiff*me.ratio; //Calculate pathX movement speed
                    me.pathY = me.yDiff*me.ratio; //Calculate pathY movement speed
                    me.xSpeed += me.pathX; //Increase xSpeed
                    me.ySpeed += me.pathY; //Increase ySpeed
                    me.init = false; //no need to initialize again until next wp
                }
            }
        };

        //Initialize rotation variables
        me.rotRight = true; //If ant should rotate right
        me.wiggleDeg = 5; //How much the ant should wiggle
        me.wiggleSpeed = 0.025; //How fast the ant should wiggle

        //move() function - Moves ant
        me.move = function() {
            //If the ant is not slowed
            if(me.slowAmount !== 0) {
                //If not rotated to the right wiggleDeg yet
                if (me.rot <= me.bearing + rad(me.wiggleDeg) && me.rotRight) {
                    me.rot += 0.025; //Rotate right
                }
                //If reached the right wiggleDeg bearing
                if (me.rot >= me.bearing + rad(me.wiggleDeg) && me.rotRight) {
                    me.rotRight = false; //Need to rotate left
                }
                //If not rotate to the left wiggleDeg yet
                if (me.rot >= me.bearing - rad(me.wiggleDeg) && !me.rotRight) {
                    me.rot -= 0.025; //Rotate left
                }
                //If reached the left wiggleDeg bearing
                if (me.rot <= me.bearing - rad(me.wiggleDeg) && !me.rotRight) {
                    me.rotRight = true; //Need to rotate right
                }
                rotate(me, me.rot); //Rotate the ant to cause wiggle
                me.x += me.xSpeed*speedUp*me.slowAmount; //Increase x pos by xSpeed
                me.y += me.ySpeed*speedUp*me.slowAmount; //Increase y pos by ySpeed
                me.distanceTravelled -= Math.abs((Math.abs(me.xSpeed*speedUp)+Math.abs(me.ySpeed*speedUp)));
                updateBoundaries(me); //Update ant boundaries
            }
        };

        //kill() function - Kills the ant
        me.kill = function() {
            playKillSound(); //Play kill sound
            me.alive = false; //Set ant alive to false
            //If brown ant
            if(me.type === 1) {
                //If cloaked and armored
                if(me.cloaked && me.armored) {
                    player.gold += 2; //Give player 2 gold
                    player.xp += 2; //give player 2 xp
                }
                //If cloaked or armored
                else if(me.cloaked || me.armored) {
                    player.gold += 1; //Give player 1 gold
                    player.xp += 1; //Give player 1 xp
                }
                //Else, give player 1 gold
                else {
                    player.gold += 1; //Give player 1 gold
                    player.xp += 1; //Give player 1 xp
                }
            }
            //Follows same logic as above, but more gold and xp
            if(me.type === 2) {
                if(me.cloaked && me.armored) {
                    player.gold += 3;
                    player.xp += 3;
                }
                else if(me.cloaked || me.armored) {
                    player.gold += 2;
                    player.xp += 2;
                }
                else {
                    player.gold += 1;
                    player.xp += 1;
                }
            }
            //Follows same logic as above, but more gold and xp
            if(me.type === 3) {
                if(me.cloaked && me.armored) {
                    player.gold += 5;
                    player.xp += 5;
                }
                else if(me.cloaked || me.armored) {
                    player.gold += 4;
                    player.xp += 6;
                }
                else {
                    player.gold += 3;
                    player.xp += 7;
                }
            }
            //Follows same logic as above, but more gold and xp
            if(me.type === 4) {
                if(me.cloaked && me.armored) {
                    player.gold += 6;
                    player.xp += 6;
                }
                else if(me.cloaked || me.armored) {
                    player.gold += 5;
                    player.xp += 5;
                }
                else {
                    player.gold += 4;
                    player.xp += 4;
                }
            }
            //Follows same logic as above, but more gold and xp
            if(me.type === 5) {
                if(me.cloaked && me.armored) {
                    player.gold += 8;
                    player.xp += 8;
                }
                else if(me.cloaked || me.armored) {
                    player.gold += 6;
                    player.xp += 6;
                }
                else {
                    player.gold += 5;
                    player.xp += 5;
                }
            }
            //Follows same logic as above, but more gold and xp
            if(me.type === 6) {
                if(me.cloaked && me.armored) {
                    player.gold += 9;
                    player.xp += 9;
                }
                else if(me.cloaked || me.armored) {
                    player.gold += 7;
                    player.xp += 7;
                }
                else {
                    player.gold += 6;
                    player.xp += 6;
                }
            }
            //Follows same logic as above, but more gold and xp
            if(me.type === 7) {
                if(me.cloaked && me.armored) {
                    player.gold += 38;
                    player.xp += 38;
                }
                else if(me.cloaked || me.armored) {
                    player.gold += 30;
                    player.xp += 30;
                }
                else {
                    player.gold += 25;
                    player.xp += 25;
                }
            }
            //Follows same logic as above, but more gold and xp
            if(me.type === 8) {
                if(me.cloaked && me.armored) {
                    player.gold += 38;
                    player.xp += 38;
                }
                else if(me.cloaked || me.armored) {
                    player.gold += 30;
                    player.xp += 30;
                }
                else {
                    player.gold += 25;
                    player.xp += 25;
                }
            }
            //Follows same logic as above, but more gold and xp
            if(me.type === 9) {
                if(me.cloaked && me.armored) {
                    player.gold += 90;
                    player.xp += 90;
                }
                else if(me.cloaked || me.armored) {
                    player.gold += 72;
                    player.xp += 72;
                }
                else {
                    player.gold += 60;
                    player.xp += 60;
                }
            }
            //Follows same logic as above, but more gold and xp
            if(me.type === 10) {
                if(me.cloaked && me.armored) {
                    player.gold += 38;
                    player.xp += 38;
                }
                else if(me.cloaked || me.armored) {
                    player.gold += 30;
                    player.xp += 30;
                }
                else {
                    player.gold += 25;
                    player.xp += 25;
                }
            }
            //Follows same logic as above, but more gold and xp
            if(me.type === 11) {
                if(me.cloaked && me.armored) {
                    player.gold += 225;
                    player.xp += 225;
                }
                else if(me.cloaked || me.armored) {
                    player.gold += 180;
                    player.xp += 180;
                }
                else {
                    player.gold += 150;
                    player.xp += 150;
                }
            }
            //Follows same logic as above, but more gold and xp
            if(me.type === 12) {
                if(me.cloaked && me.armored) {
                    player.gold += 450;
                    player.xp += 450;
                }
                else if(me.cloaked || me.armored) {
                    player.gold += 360;
                    player.xp += 360;
                }
                else {
                    player.gold += 300;
                    player.xp += 300;
                }
            }
            //Follows same logic as above, but more gold and xp
            if(me.type === 13) {
                if(me.cloaked && me.armored) {
                    player.gold += 900;
                    player.xp += 900;
                }
                else if(me.cloaked || me.armored) {
                    player.gold += 720;
                    player.xp += 720;
                }
                else {
                    player.gold += 600;
                    player.xp += 600;
                }
            }
        };

        //attack() function - Attacks the windmill
        me.attack = function() {
            playWindmillSound(); //Play hit windmill sound
            //If the windmill has hp
            if(windmillSprite.hp > 0) {
                windmillSprite.hp -= me.damage; //Damage windmill
            }
            //If hp drops below 0
            if(windmillSprite.hp < 0) {
                windmillSprite.hp = 0; //Set windmill hp to 0
            }
        };

        me.tick = 0; //Ticker to keep track of time passed
        //update() function - Update the sprite
        me.update = function() {
            me.visible = true; //If ant is being updated, it is visible
            me.active = true; //If ant is being updated, it is active
            //If the ant is alive
            if(me.alive) {

                //If hp drops below 0
                if (me.hp <= 0) {
                    me.kill(); //Kill the ant
                }
                me.tick += app.ticker.elapsedMS*speedUp; //Increment ticker by time in ms that has passed since last frame

                //If ticker goes over 2 seconds
                if (me.tick >= 2000) {
                    me.regenerate(); //Regenerate the ant
                    me.tick = 0; //Reset ticker to 0
                }
                me.GPS(); //Call GPS
                me.move(); //Move ant
            }
        }
    }
}