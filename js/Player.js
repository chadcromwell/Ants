/*
* Author: Chad Cromwell
* Date: 2019-04-01
* Description: Player class, represents a player. Parameters are assigned from data from the database
* Parameters:
**           id = player's unique id
*            username = player's username
*            slingshotPath1XP = player's slingshot path 1 xp
*            slingshotPath2XP = player's slingshot path 2 xp
*            hammerPath1XP = player's hammer path 1 xp
*            hammerPath2XP = player's hammer path 2 xp
*            bugSprayPath1XP = player's bug spray path 1 xp
*            bugSprayPath2XP = player's bug spray path 2 xp
*            magnifyingGlassPath1XP = player's magnifying glass path 1 xp
*            magnifyingGlassPath2XP = player's magnifying glass path 2 xp
*            cannonPath1XP = player's cannon path 1 xp
*            cannonPath2XP = player's cannon path 2 xp
*            honeyPath1XP = player's honey path 1 xp
*            honeyPath2XP = player's honey path 2 xp
*            xp = player's xp
*            windmillSetting = player's windmill setting
*            firstLogin = if the player has logged in before or not
*/
class Player {
    constructor(json) {
        this.id = json.id; //Player's id
        this.username = json.username; //Player's username
        this.slingshotPath1XP = json.slingshotPath1XP; //Player's slingshot path 1 xp
        this.slingshotPath2XP = json.slingshotPath2XP; //Player's slingshot path 2 xp
        this.hammerPath1XP = json.hammerPath1XP; //Player's hammer path 1 xp
        this.hammerPath2XP = json.hammerPath2XP; //Player's hammer path 2 xp
        this.bugSprayPath1XP = json.bugSprayPath1XP; //Player's bug spray path 1 xp
        this.bugSprayPath2XP = json.bugSprayPath2XP; //Player's bug spray path 2 xp
        this.magnifyingGlassPath1XP = json.magnifyingGlassPath1XP; //Player's magnifying glass path 1 xp
        this.magnifyingGlassPath2XP = json.magnifyingGlassPath2XP; //Player's magnifying glass path 2 xp
        this.cannonPath1XP = json.cannonPath1XP; //Player's cannon path 1 xp
        this.cannonPath2XP = json.cannonPath2XP; //Player's cannon path 2 xp
        this.honeyPath1XP = json.honeyPath1XP; //Player's honey path 1 xp
        this.honeyPath2XP = json.honeyPath2XP; //Player's honey path 2 xp
        this.xp = json.xp; //Player's XP
        this.windmillSetting = json.windmillSetting; //Player's windmill setting
        this.firstLogin = json.firstLogin; //If the player has logged in before or not
    }
}