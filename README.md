# Supaplex Editor (alpha)

This repository contains the source code for the game editor of an older game,
but, in my opinion, still great puzzle game - you've guessed it, [Supaplex](https://classicreload.com/supaplex.html).
To understand what I am going to be talking about regarding the project, you should be familiar with some Supaplex editors or at least the game itself.

## Try it out

Before we get to the nitty-gritty of programming stuff, you may want to know you can [try out Supaplex Editor online](https://www.supaplexeditor.imbenjamin.co.uk) (the latest **master** commit).

## Introduction and features

The project is to be based solely on web technologies, that is, PHP, HTML and JavaScript. Maybe, it would be good for you to have
an idea of what capabilities this app should have. Here are a few (if something doesn't
make sense to you, I advise that you do a bit of digging before asking):

- Be able to read other level formats (there is DAT, but also SP and MPX)
- Make the editor at least as functional and capable as Supaplex Editor by [ElmerProductions](https://www.elmerproductions.com)
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

These enhancement are subject to future updates.

## How to install

### Requirements

- PHP 7.0 or higher
- Composer
- Node.JS

### Step 1: Get the `src` directory working

Enter the `src` folder and inside it run commands: `composer install` and `npm install`. To be able to view the project, you may set up a virtual PHP server where you can listen to any port you like, for instance:

```
php -S localhost:3000
```

### Step 2: Get the `api` directory working

Starting with the version `0.3`, Supaplex Editor uses separate API for loading level data, and it is therefore required to get the separate server working as well. By default, the app will listen for the port 3001, but you can configure it to your liking in `src/resources/js/constants.js` where you can customize the URL:

```
API_URL = 'http://localhost:3001';
```

After running these steps, you should be good to go. If you encounter a problem, you can let me know by reporting an issue.

## Branches

As of 18 March 2018, this repo has more than one branch publicly available. These are **master** and **dev**.

### Master

Represents the latest release where current major features should work, and the app itself should be at least somewhat user-friendly.

### Dev

Represents the release that includes huge feature implementations or refactors that are too big for a single commit/push. Plus, you can directly see on the way how I'm progressing and can add your notes on what you would change or improve.

# Changelog
- 0.3 dev
    - No longer needed to create `src/cache/` directory manually
    - Redisgned editor elements
    - Bootstrap and NPM implementation
    - Brand new API
    - Highlight special ports (green colour)
    - TBD:
        - implement new API
        - view all levels within a file
        - make selection buttons into labels
        - implement functionalities into selection buttons
        - add link for the author
        - add support for LST files
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
    - Remove `vendor` and `cache` folders that were unnecessary for the repository
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
