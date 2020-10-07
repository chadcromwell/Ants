/*
* Author: Chad Cromwell
* Date: 2019-03-25
* Description: Functions for the game
* Functions:
*           rad(degrees) function - Accepts a rotation amount in degrees and returns value in radians
*           spritePos(Sprite, x, y) function - Accepts a sprite, x, and y to set the x y position of the sprite
*           setInvisible(Sprite) function - Accepts a sprite and makes it invisible
*           setVisible(Sprite) function - Accepts a Sprite and makes it visible
*           centerAnchor(Sprite) function - Accepts a Sprite and centers the anchor (for rotation)
*           setSize(Sprite, widthPercentage, heightPercentage) function - Accepts a Sprite, height and width percentages to change Sprite size by percentage Ex. setSize(Sprite, .5, .5) will make the Sprite width and height 50% of original size
*           setAnchor(Sprite, x, y) function - Accepts a Sprite and sets the anchor with the pass x, y values
*           resetAnchor(Sprite) function - Accepts a Sprite and resets the anchor points to top-left 0,0
*           rotate(Sprite, rot, bool) function - Accepts a Sprite, rotation amount, and boolean. Rotates sprite by rot amount and if boolean is true it will rotate using a center anchor
*           resize() function - When window is resized, Pixi's app window is resized, centered and in reference to window width
*           polygonCollision(point, vs) function - Accepts a point and determines if it is within a polygon from substack: https://github.com/substack/point-in-polygon/blob/master/index.js
*           updateBoundaries(object) function - Accepts object and updates its boundary lines, used for collision detection
*           distance(ant) function - Accepts a source and target object with x and y properties and returns its distance from the source
*           inRange(ant) function - Accepts a source with properties of x, y, and range and a target object with properties of x and y and determines if the target is within range of the source
*           intercept(targetPos, targetSpeed, projectilePos, projectileSpeed) function - Accepts the start point of target, speed of target as a normalized vector, start vector of projectile, speed vector of projectile and returns interception point x,y from Jaran: http://jaran.de/goodbits/2011/07/17/calculating-an-intercept-course-to-a-target-with-constant-direction-and-velocity-in-a-2-dimensional-plane/
*           setMediumUpgradeCosts() function - Updates the upgrade costs for medium difficulty
*           setHardUpgradeCosts() function - Updates the upgrade costs for hard difficulty
*/

//rad(degrees) function - Accepts a rotation amount in degrees and returns value in radians
function rad(degrees) {
    let pi = Math.PI;
    return degrees*(pi/180);
}

//spritePos(Sprite, x, y) function - Accepts a sprite, x, and y to set the x y position of the sprite
function setPos(Sprite, x, y) {
    Sprite.position.set(x,y)
}

//setInvisible(Sprite) function - Accepts a sprite and makes it invisible
function setInvisible(Sprite) {
    Sprite.visible = false;
}

//setVisible(Sprite) function - Accepts a Sprite and makes it visible
function setVisible(Sprite) {
    Sprite.visible = true;
}

//setSize(Sprite, widthPercentage, heightPercentage) function - Accepts a Sprite, height and width percentages to change Sprite size by percentage Ex. setSize(Sprite, .5, .5) will make the Sprite width and height 50% of original size
function setSize(Sprite, widthPercentage, heightPercentage) {
    Sprite.scale.x = (Sprite.width*widthPercentage); //Set Sprite width
    Sprite.scale.y = (Sprite.height*heightPercentage); //Set Sprite height
}

//centerAnchor(Sprite) function - Accepts a Sprite and centers the anchor (for rotation)
function centerAnchor(Sprite) {
    Sprite.anchor.set(0.5, 0.5);
}

//setAnchor(Sprite, x, y) function - Accepts a Sprite and sets the anchor with the pass x, y values
function setAnchor(Sprite, x, y) {
    Sprite.anchor.set(x, y);
}

//resetAnchor(Sprite) function - Accepts a Sprite and resets the anchor points to top-left 0,0
function resetAnchor(Sprite) {
    Sprite.anchor.set(0, 0);
}

//rotate(Sprite, rot, bool) function - Accepts a Sprite, rotation amount, and boolean. Rotates sprite by rot amount and if boolean is true it will rotate using a center anchor
function rotate(Sprite, rot) {
    Sprite.rotation = rot; //Rotate the Sprite
}

//resize() function - When window is resized, Pixi's app window is resized, centered and in reference to window width
function resize() {
    let h, w;
    width = window.innerWidth-(window.innerWidth*.025); //Update width
    height = ((width/16)*9); //Update height
    if(width/(window.innerHeight-(window.innerHeight*.025)) >= ratio) {
        w = (window.innerHeight-(window.innerHeight*.025))*ratio;
        h = (window.innerHeight-(window.innerHeight*.025));
    }
    else {
        w = width;
        h = width/ratio;
    }
    app.renderer.view.style.width = w + "px";
    app.renderer.view.style.height = h + "px";
}

//polygonCollision(point, vs) function - Accepts a point and determines if it is within a polygon from James Halliday's point-in-polygon.js (MIT LICENSE)
function polygonCollision (point, vs) {
    let x = point[0]; //Capture x
    let y = point[1]; //Capture y
    let inside = false; //If point is inside polygon or not

    //Iterate through all vertices of the polygon
    for (let i = 0, j = vs.length - 1; i < vs.length; j = i++) {
        let xi = vs[i][0]; //Point 1 x
        let yi = vs[i][1]; //Point 1 y
        let xj = vs[j][0]; //Point 2 x
        let yj = vs[j][1]; //Point 2 y
        let intersect = ((yi > y) !== (yj > y)) && (x < (xj - xi) * (y - yi) / (yj - yi) + xi); //Calculate if point is within points
        if (intersect) inside = !inside; //If intersect, true, else false
    }
    return inside; //Return result
}

//updateBoundaries(object) function - Accepts object and updates its boundary lines, used for collision detection
function updateBoundaries(object) {
    object.xMin = object.x-(object.width/2); //Update xMin
    object.xMax = object.x+(object.width/2); //Update xMax
    object.yMin = object.y-(object.height/2); //Update yMin
    object.yMax = object.y+(object.height/2); //Update yMax
}

//distance(ant) function - Accepts a source and target object with x and y properties and returns its distance from the source
function distance(source, target) {
    let x1 = source.x; //Update x1
    let y1 = source.y; //Update y1
    let x2 = target.x; //Update x2
    let y2 = target.y; //Update y2
    return Math.sqrt((x1-x2)*(x1-x2)+(y1-y2)*(y1-y2)); //Return the distance between the two points
}

//inRange(ant) function - Accepts a source with properties of x, y, and range and a target object with properties of x and y and determines if the target is within range of the source
function inRange(source, target) {
    return distance(source, target) < source.range; //Return true or false depending if target is within the range of the source
}

//intercept(targetPos, targetSpeed, projectilePos, projectileSpeed) function - Accepts the start point of target, speed of target as a normalized vector, start vector of projectile, speed vector of projectile and returns interception point x,y from Jaran: http://jaran.de/goodbits/2011/07/17/calculating-an-intercept-course-to-a-target-with-constant-direction-and-velocity-in-a-2-dimensional-plane/
function intercept(targetPos, targetVelocity, projectilePos, projectileVelocity) {
    let diffX = targetPos.x - projectilePos.x; //Set difference between x positions
    let diffY = targetPos.y - projectilePos.y; //Set difference between y positions
    let step1 = targetVelocity.x * targetVelocity.x + targetVelocity.y * targetVelocity.y - projectileVelocity * projectileVelocity; //Calculate the a^2+b^2-c^2 of quadratic equation
    let step2 = diffX * targetVelocity.x + diffY * targetVelocity.y; //Calculate other part of quadratic equation
    let time; //Declare time
    //If first calculation is 0, no need to perform other calculations
    if(step1 === 0) {
        time = -(diffX * diffX + diffY * diffY) / (2 * step2); //Assign time
    }
    //Else
    else {
        //Perform rest of calculations for quadratic formula
        let minusPHalf = -step2 / step1;
        let discriminant = minusPHalf *minusPHalf - (diffX * diffX + diffY * diffY) / step1;
        //If discriminant is negative, can't reach the target
        if (discriminant < 0) {
            return null; //Return null
        }
        //Otherwise, potential to reach target
        let root = Math.sqrt(discriminant); //Calculate the root
        let t1 = minusPHalf + root; //Calculate time1
        let t2 = minusPHalf - root; //Calculate time2
        let tMin = Math.min(t1, t2); //Find lowest time
        let tMax = Math.max(t1, t2); //Find longest time

        //If tMin is positive
        if (tMin > 0) {
            time = tMin; //Set time to tMin
        }
        //Else
        else {
            time = tMax; //Set time to tMax
        }

        //If time is negative, can't reach target
        if (time < 0) {
            return null; //Return null
        }
    }

    return {x: (targetPos.x + time * targetVelocity.x), y: (targetPos.y + time * targetVelocity.y)}; //Return the future target position to shoot at to hit the target
}

//setMediumUpgradeCosts() function - Updates the upgrade costs for medium difficulty
function setMediumUpgradeCosts() {
    slingShot11Cost = Math.ceil(((slingshotCost*0.5)*mediumMultiplier)/5)*5; //Tier 1
    slingShot12Cost = Math.ceil(((slingshotCost*0.75)*mediumMultiplier)/5)*5; //Tier 2
    slingShot13Cost = Math.ceil(((slingshotCost*4)*mediumMultiplier)/5)*5; //Tier 3
    slingShot14Cost = Math.ceil(((slingshotCost*8)*mediumMultiplier)/5)*5; //Tier 4

    //Slingshot path 2 tier costs
    slingShot21Cost = Math.ceil(((slingshotCost*0.75)*mediumMultiplier)/5)*5; //Tier 1
    slingShot22Cost = Math.ceil(((slingshotCost)*mediumMultiplier)/5)*5; //Tier 2
    slingShot23Cost = Math.ceil(((slingshotCost*2)*mediumMultiplier)/5)*5; //Tier 3
    slingShot24Cost = Math.ceil(((slingshotCost*4)*mediumMultiplier)/5)*5; //Tier 4

    //Hammer path 1 tier costs
    hammer11Cost = Math.ceil(((hammerCost*0.75)*mediumMultiplier)/5)*5; //Tier 1
    hammer12Cost = Math.ceil(((hammerCost*1.25)*mediumMultiplier)/5)*5; //Tier 2
    hammer13Cost = Math.ceil(((hammerCost*5)*mediumMultiplier)/5)*5; //Tier 3
    hammer14Cost = Math.ceil(((hammerCost*10)*mediumMultiplier)/5)*5; //Tier 4

    //Hammer path 2 tier costs
    hammer21Cost = Math.ceil(((hammerCost*0.75)*mediumMultiplier)/5)*5; //Tier 1
    hammer22Cost = Math.ceil(((hammerCost*1.25)*mediumMultiplier)/5)*5; //Tier 2
    hammer23Cost = Math.ceil(((hammerCost*4)*mediumMultiplier)/5)*5; //Tier 3
    hammer24Cost = Math.ceil(((hammerCost*8)*mediumMultiplier)/5)*5; //Tier 4

    //Bug Spray path 1 tier costs
    bugSpray11Cost = Math.ceil(((bugSprayCost*0.5)*mediumMultiplier)/5)*5; //Tier 1
    bugSpray12Cost = Math.ceil(((bugSprayCost*0.75)*mediumMultiplier)/5)*5; //Tier 2
    bugSpray13Cost = Math.ceil(((bugSprayCost*4)*mediumMultiplier)/5)*5; //Tier 3
    bugSpray14Cost = Math.ceil(((bugSprayCost*8)*mediumMultiplier)/5)*5; //Tier 4

    //Bug Spray path 2 tier costs
    bugSpray21Cost = Math.ceil(((bugSprayCost*0.75)*mediumMultiplier)/5)*5; //Tier 1
    bugSpray22Cost = Math.ceil(((bugSprayCost*1.25)*mediumMultiplier)/5)*5; //Tier 2
    bugSpray23Cost = Math.ceil(((bugSprayCost*2)*mediumMultiplier)/5)*5; //Tier 3
    bugSpray24Cost = Math.ceil(((bugSprayCost*8)*mediumMultiplier)/5)*5; //Tier 4

    //Magnifying Glass path 1 tier costs
    magnifyingGlass11Cost = Math.ceil(((magnifyingGlassCost*0.75)*mediumMultiplier)/5)*5; //Tier 1
    magnifyingGlass12Cost = Math.ceil(((magnifyingGlassCost*1.25)*mediumMultiplier)/5)*5; //Tier 2
    magnifyingGlass13Cost = Math.ceil(((magnifyingGlassCost*4)*mediumMultiplier)/5)*5; //Tier 3
    magnifyingGlass14Cost = Math.ceil(((magnifyingGlassCost*8)*mediumMultiplier)/5)*5; //Tier 4

    //Magnifying Glass path 2 tier costs
    magnifyingGlass21Cost = Math.ceil(((magnifyingGlassCost*0.75)*mediumMultiplier)/5)*5; //Tier 1
    magnifyingGlass22Cost = Math.ceil(((magnifyingGlassCost*1.5)*mediumMultiplier)/5)*5; //Tier 2
    magnifyingGlass23Cost = Math.ceil(((magnifyingGlassCost*2)*mediumMultiplier)/5)*5; //Tier 3
    magnifyingGlass24Cost = Math.ceil(((magnifyingGlassCost*3.5)*mediumMultiplier)/5)*5; //Tier 4

    //Cannon path 1 tier costs
    cannon11Cost = Math.ceil(((cannonCost*0.75)*mediumMultiplier)/5)*5; //Tier 1
    cannon12Cost = Math.ceil(((cannonCost*1.25)*mediumMultiplier)/5)*5; //Tier 2
    cannon13Cost = Math.ceil(((cannonCost*2)*mediumMultiplier)/5)*5; //Tier 3
    cannon14Cost = Math.ceil(((cannonCost*4)*mediumMultiplier)/5)*5; //Tier 4

    //Cannon path 2 tier costs
    cannon21Cost = Math.ceil(((cannonCost*0.75)*mediumMultiplier)/5)*5; //Tier 1
    cannon22Cost = Math.ceil(((cannonCost*1.5)*mediumMultiplier)/5)*5; //Tier 2
    cannon23Cost = Math.ceil(((cannonCost*4)*mediumMultiplier)/5)*5; //Tier 3
    cannon24Cost = Math.ceil(((cannonCost*8)*mediumMultiplier)/5)*5; //Tier 4

    //Honey path 1 tier costs
    honey11Cost = Math.ceil(((honeyCost*0.5)*mediumMultiplier)/5)*5; //Tier 1
    honey12Cost = Math.ceil(((honeyCost*0.75)*mediumMultiplier)/5)*5; //Tier 2
    honey13Cost = Math.ceil(((honeyCost*1.25)*mediumMultiplier)/5)*5; //Tier 3
    honey14Cost = Math.ceil(((honeyCost*1.5)*mediumMultiplier)/5)*5; //Tier 4

    //Honey path 2 tier costs
    honey21Cost = Math.ceil(((honeyCost*0.75)*mediumMultiplier)/5)*5; //Tier 1
    honey22Cost = Math.ceil(((honeyCost*1.25)*mediumMultiplier)/5)*5; //Tier 2
    honey23Cost = Math.ceil(((honeyCost*4)*mediumMultiplier)/5)*5; //Tier 3
    honey24Cost = Math.ceil(((honeyCost*8)*mediumMultiplier)/5)*5; //Tier 4
}

//setHardUpgradeCosts() function - Updates the upgrade costs for hard difficulty
function setHardUpgradeCosts() {
    //Update upgrade costs for hard difficulty
    slingShot11Cost = Math.ceil(((slingshotCost*0.5)*hardMultiplier)/5)*5; //Tier 1
    slingShot12Cost = Math.ceil(((slingshotCost*0.75)*hardMultiplier)/5)*5; //Tier 2
    slingShot13Cost = Math.ceil(((slingshotCost*4)*hardMultiplier)/5)*5; //Tier 3
    slingShot14Cost = Math.ceil(((slingshotCost*8)*hardMultiplier)/5)*5; //Tier 4

    //Slingshot path 2 tier costs
    slingShot21Cost = Math.ceil(((slingshotCost*0.75)*hardMultiplier)/5)*5; //Tier 1
    slingShot22Cost = Math.ceil(((slingshotCost)*hardMultiplier)/5)*5; //Tier 2
    slingShot23Cost = Math.ceil(((slingshotCost*2)*hardMultiplier)/5)*5; //Tier 3
    slingShot24Cost = Math.ceil(((slingshotCost*4)*hardMultiplier)/5)*5; //Tier 4

    //Hammer path 1 tier costs
    hammer11Cost = Math.ceil(((hammerCost*0.75)*hardMultiplier)/5)*5; //Tier 1
    hammer12Cost = Math.ceil(((hammerCost*1.25)*hardMultiplier)/5)*5; //Tier 2
    hammer13Cost = Math.ceil(((hammerCost*5)*hardMultiplier)/5)*5; //Tier 3
    hammer14Cost = Math.ceil(((hammerCost*10)*hardMultiplier)/5)*5; //Tier 4

    //Hammer path 2 tier costs
    hammer21Cost = Math.ceil(((hammerCost*0.75)*hardMultiplier)/5)*5; //Tier 1
    hammer22Cost = Math.ceil(((hammerCost*1.25)*hardMultiplier)/5)*5; //Tier 2
    hammer23Cost = Math.ceil(((hammerCost*4)*hardMultiplier)/5)*5; //Tier 3
    hammer24Cost = Math.ceil(((hammerCost*8)*hardMultiplier)/5)*5; //Tier 4

    //Bug Spray path 1 tier costs
    bugSpray11Cost = Math.ceil(((bugSprayCost*0.5)*hardMultiplier)/5)*5; //Tier 1
    bugSpray12Cost = Math.ceil(((bugSprayCost*0.75)*hardMultiplier)/5)*5; //Tier 2
    bugSpray13Cost = Math.ceil(((bugSprayCost*4)*hardMultiplier)/5)*5; //Tier 3
    bugSpray14Cost = Math.ceil(((bugSprayCost*8)*hardMultiplier)/5)*5; //Tier 4

    //Bug Spray path 2 tier costs
    bugSpray21Cost = Math.ceil(((bugSprayCost*0.75)*hardMultiplier)/5)*5; //Tier 1
    bugSpray22Cost = Math.ceil(((bugSprayCost*1.25)*hardMultiplier)/5)*5; //Tier 2
    bugSpray23Cost = Math.ceil(((bugSprayCost*2)*hardMultiplier)/5)*5; //Tier 3
    bugSpray24Cost = Math.ceil(((bugSprayCost*8)*hardMultiplier)/5)*5; //Tier 4

    //Magnifying Glass path 1 tier costs
    magnifyingGlass11Cost = Math.ceil(((magnifyingGlassCost*0.75)*hardMultiplier)/5)*5; //Tier 1
    magnifyingGlass12Cost = Math.ceil(((magnifyingGlassCost*1.25)*hardMultiplier)/5)*5; //Tier 2
    magnifyingGlass13Cost = Math.ceil(((magnifyingGlassCost*4)*hardMultiplier)/5)*5; //Tier 3
    magnifyingGlass14Cost = Math.ceil(((magnifyingGlassCost*8)*hardMultiplier)/5)*5; //Tier 4

    //Magnifying Glass path 2 tier costs
    magnifyingGlass21Cost = Math.ceil(((magnifyingGlassCost*0.75)*hardMultiplier)/5)*5; //Tier 1
    magnifyingGlass22Cost = Math.ceil(((magnifyingGlassCost*1.5)*hardMultiplier)/5)*5; //Tier 2
    magnifyingGlass23Cost = Math.ceil(((magnifyingGlassCost*2)*hardMultiplier)/5)*5; //Tier 3
    magnifyingGlass24Cost = Math.ceil(((magnifyingGlassCost*3.5)*hardMultiplier)/5)*5; //Tier 4

    //Cannon path 1 tier costs
    cannon11Cost = Math.ceil(((cannonCost*0.75)*hardMultiplier)/5)*5; //Tier 1
    cannon12Cost = Math.ceil(((cannonCost*1.25)*hardMultiplier)/5)*5; //Tier 2
    cannon13Cost = Math.ceil(((cannonCost*2)*hardMultiplier)/5)*5; //Tier 3
    cannon14Cost = Math.ceil(((cannonCost*4)*hardMultiplier)/5)*5; //Tier 4

    //Cannon path 2 tier costs
    cannon21Cost = Math.ceil(((cannonCost*0.75)*hardMultiplier)/5)*5; //Tier 1
    cannon22Cost = Math.ceil(((cannonCost*1.5)*hardMultiplier)/5)*5; //Tier 2
    cannon23Cost = Math.ceil(((cannonCost*4)*hardMultiplier)/5)*5; //Tier 3
    cannon24Cost = Math.ceil(((cannonCost*8)*hardMultiplier)/5)*5; //Tier 4

    //Honey path 1 tier costs
    honey11Cost = Math.ceil(((honeyCost*0.5)*hardMultiplier)/5)*5; //Tier 1
    honey12Cost = Math.ceil(((honeyCost*0.75)*hardMultiplier)/5)*5; //Tier 2
    honey13Cost = Math.ceil(((honeyCost*1.25)*hardMultiplier)/5)*5; //Tier 3
    honey14Cost = Math.ceil(((honeyCost*1.5)*hardMultiplier)/5)*5; //Tier 4

    //Honey path 2 tier costs
    honey21Cost = Math.ceil(((honeyCost*0.75)*hardMultiplier)/5)*5; //Tier 1
    honey22Cost = Math.ceil(((honeyCost*1.25)*hardMultiplier)/5)*5; //Tier 2
    honey23Cost = Math.ceil(((honeyCost*4)*hardMultiplier)/5)*5; //Tier 3
    honey24Cost = Math.ceil(((honeyCost*8)*hardMultiplier)/5)*5; //Tier 4
}