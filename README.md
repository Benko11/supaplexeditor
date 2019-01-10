# Supaplex Editor (alpha)

This repository contains the source code for the game editor of an older game,
but, in my opinion, still great puzzle game - you've guessed it, [Supaplex](https://classicreload.com/supaplex.html).
To understand what I am going to be talking about regarding the project, you should be familiar with some Supaplex editors or at least the game itself.

The project is currently based on sole web technologies - PHP, HTML and JavaScript,
and it is its purpose to remain that way. Maybe, it would be good for you to have
an idea of what capabilities this app should have. Here are a few (if something doesn't
make sense to you, I advise that you do a bit of digging before asking):

- Be able to read other level formats (there is DAT, but also SP and MPX)
- Make the editor at least as functional and capable as Supaplex Editor by ElmerProductions
    - Box selection
    - Shuffle (the entire level or its part) and random level
    - Left and right click functionality with the elements
- Fix some glitches that that editor has
    - Having to change the level name at two places
    - Having to properly format the name
    - The ability to work with any size of level sets with any level sizes
- Ability for user accounts where their level sets would be stored and could be downloaded
- Give the user an ability to share their creations with the world, natively from the app.
- Be able to work offline and auto-update at launch
- Add toggle for gravity and freeze
- Streamline the logic of infotron and electron count (All)
- Add modes like:
    - Show dumb murphies
    - Warn about more murphies
    - Warn about no exit
    - Highlight special ports
    - Fix outer borders (will not be in the shuffle, cannot be changed)

The rest is (I hope) pretty self-explanatory.

## How to install

After cloning the project, you need to install Composer dependencies by running `composer update` or `composer install`:
After that you should be good to go. Remember that the route of your project is the `src` folder, so do take that into consideration when running this project.

## Branches

As of 18 March 2018, this repo has more than one branch publicly available. These are **master** and **dev**.

### Master

Represents the latest release where current major features should work, and the app itself should be at least somewhat user-friendly.

### Dev

Represents the release that includes huge feature implementations or refactors that are too big for a single commit/push. Plus, you can directly see on the way how I'm progressing and can add your notes on what you would change or improve.

# Changelog
- 0.3 dev
    - No longer needed to create `src/cache/` directory manually
- 0.2.2.1 (29 July 2018)
    - Fix of the wrong `LEVELS.DAT` file
    - Uniform GIT system across all branches
    
- 0.2.2 (29 July 2018)
    - Replace `LEVELS.DAT` file with the original level set, rather than mine
    - Use only the 8-bit colour palette in the editor (to give it a more retro DOS-like feel)
    - New icons for editing in multiple modes - mouse, empty square and full square (currently not working)
    - You can change level name now (up to 23 characters only because of the game limitations)
    - Bug fixes
    - The editor identifies itself in the browser console
    - Other minor changes and improvements

- 0.2.1 (16 July 2018)
    - Remove `vendor` and `cache` folders that were unnecessary for the repository (see the instructions for installation above)
    - Remove `routes` folder that didn't do much except for goofing around
    - You can now save changes made in a level (only the elements, the rest doesn't work yet)

- 0.2 (15 July 2018)
    - UI overhaul
    - Code refactor
    - Added instructions for installation
    - Preparations for level saving

- 0.1.1 (31 May 2018)
    - Bug fixes
    
- 0.1 (31 May 2018)
    - OO structure has been implemented, but the code is very buggy, many features don't work properly
    
- 0.0.x
    - Whipping up the project, the code, experimenting with different code structures
